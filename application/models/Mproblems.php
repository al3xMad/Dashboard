<?php
class Mproblems extends CI_Model {

    const DEFAULT_ORDER_CRITERIA = '';
    const DEFAULT_ORDER_DIRECTION = 'DESC';
    const DEFAULT_LAST_ATTEMPTS_LIMIT = 50;

    public function getProblemsByCategoryId($id)
    {
        if (empty($id)) {
            return null;
        }

        $this->db->select('
            p.*, 
            FLOOR((p.totalAC / p.totalSubs) * 100) as AC1,
            FLOOR((p.totalDistinctUsers / p.totalAC) * 100) as AC2
            ')
            ->from('problem p')
            ->join('problemcategories cat', 'cat.problemId = p.internalId', 'left')
            ->where('cat.categoryId', $id);

        $query = $this->db->get();

        return $query->result();
    }

    public function getAllProblems($params)
    {
        $this->db->select()
            ->from('problem p')
            ->join('problem_details d', 'd.id = p.internalId')
            ->order_by('name', 'ASC');

        if (isset($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        /*if (isset($params['order'])) {
            $this->db->order_by($params['order'], $params['direction']);
        }*/

        $query = $this->db->get();

        return $query->result();
    }

    public function getProblemById($id = null)
    {
        if (empty($id)) {
            return false;
        }

        $this->db->select()
            ->from('problem p')
            ->join('problem_details d', 'd.id = p.internalId', 'left')
            ->where('p.internalId', $id);

        $query = $this->db->get();

        return $query->row();
    }

    public function getSumAllAttempts()
    {
        $this->db->select('SUM(totalSubs) AS total')
            ->from('problem');

        $query = $this->db->get();

        return $query->row();
    }

    public function getSumAllAttemptsByGroupId($groupId)
    {
        if (empty($groupId)) {
            return false;
        }

        $this->db->select('COUNT((s.id)) as total')
            ->from('submission s')
            ->join('groupusers gr', 'gr.id_user = s.user_id', 'left')
            ->where('gr.id_group', $groupId)
            ->where('s.submissionDate  BETWEEN "'. (date('Y') -1) . '-10-20" and "'. date('Y') . '-08-31"');

        $query = $this->db->get();

        return $query->row();
    }

    public function getLastUsersAttemptsByProblemId($id = null, $params = [])
    {
        if (empty($id)) {
            return false;
        }

        $limit = isset($params['limit']) ? $params['limit'] : self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
            SELECT 
                u.id AS 'user_id', `udata`.*, `s`.`problem_id`, 
                COUNT(s.id) AS 'attempts', GROUP_CONCAT(DISTINCT(s.language)) AS 'languages', s.submissionDate AS 'last_date_attempt',
                (
                    
                SELECT 
                    count(s1.id)
                FROM `submission` `s1`
                LEFT JOIN `users` `u1` ON `s1`.`user_id` = `u1`.`id`
                JOIN `userdata` `udata1` ON `udata1`.`id` = `u1`.`id`
                WHERE `s1`.`problem_id` = $id and s1.`status` = 'AC' and u1.id = u.id
                
                ) as accepted,
                (		
                SELECT 
                    s2.`status`
                FROM `submission` `s2`
                LEFT JOIN `users` `u2` ON `s2`.`user_id` = `u2`.`id`
                JOIN `userdata` `udata2` ON `udata2`.`id` = `u2`.`id`
                WHERE `s2`.`problem_id` = $id and u2.id = u.id ORDER BY s2.submissionDate DESC LIMIT 1	
                ) as lastAttempt
            FROM `submission` `s`
            LEFT JOIN `users` `u` ON `s`.`user_id` = `u`.`id`
            JOIN `userdata` `udata` ON `udata`.`id` = `u`.`id`
            WHERE `s`.`problem_id` = $id
            GROUP BY `u`.`id`
            ORDER BY `s`.`submissionDate` DESC
            LIMIT $limit
        ";

        return $this->db->query($sql)->result();
    }

    public function getLastProblemsAttempts($params = [])
    {
        $limit = isset($params['limit']) ? $params['limit'] : self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
            SELECT 
                udata.id,
                udata.first_name,
                udata.last_name,
                udata.email,
                s.`language`, s.`status`, s.submissionDate,
                pr.`name`,
                p.internalId,
                p.totalAC,
                p.totalSubs,
                p.totalDACU,
                p.totalDistinctUsers,
                p.publicationDate
            FROM submission s 
            LEFT JOIN userdata udata ON s.user_id = udata.id
            INNER JOIN problem p ON s.problem_id = p.internalId
            INNER JOIN problem_details pr ON s.problem_id = pr.id
            
            ORDER BY s.submissionDate DESC
            LIMIT $limit;
        ";

        return $this->db->query($sql)->result();
    }

    public function getLastProblemsAttemptsByGroupId($groupId, $params = [])
    {
        $limit = isset($params['limit']) ? $params['limit'] : self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
            SELECT 
                udata.id,
                udata.first_name,
                udata.last_name,
                udata.email,
                gu.id_group,
                s.`language`, s.`status`, s.submissionDate,
                pr.`name`,
                p.internalId,
                p.totalAC,
                p.totalSubs,
                p.totalDACU,
                p.totalDistinctUsers,
                p.publicationDate
            FROM submission s 
            LEFT JOIN userdata udata ON s.user_id = udata.id
            LEFT JOIN groupusers gu ON gu.id_user = udata.id
            INNER JOIN problem p ON s.problem_id = p.internalId
            INNER JOIN problem_details pr ON s.problem_id = pr.id
            WHERE gu.id_group = $groupId
            AND s.submissionDate  BETWEEN '" . (date('Y') -1) . "-10-20' and '" . date('Y') . "-08-31'
            ORDER BY s.submissionDate DESC
            LIMIT $limit;
        ";

        return $this->db->query($sql)->result();
    }

    public function getLastWeekProblems()
    {
        $sql = "
        SELECT COUNT(p.internalId) as lastWeeProblems FROM problem p
        WHERE p.publicationDate >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
        AND p.publicationDate < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY
        ";

        return $this->db->query($sql)->row();
    }

    public function getProblemsRanking($params = [])
    {
        $limit = isset($params['limit']) ? $params['limit'] : self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
            SELECT 	
                (
                    SELECT GROUP_CONCAT(DISTINCT(s.`language`))
                    FROM submission s
                    WHERE s.problem_id = p.internalId	
                ) AS languages,
                (
                    SELECT s.submissionDate
                    FROM submission s
                    WHERE s.problem_id = p.internalId
                    ORDER BY s.submissionDate DESC
                    LIMIT 1
                ) AS last_date_attempt,
                (
                    SELECT s.`status`
                    FROM submission s
                    WHERE s.problem_id = p.internalId
                    ORDER BY s.submissionDate DESC
                    LIMIT 1
                ) AS last_status,
                pr.`name`,
                p.*                
            FROM problem p
            INNER JOIN problem_details pr ON p.internalId = pr.id
            
            GROUP BY p.internalId
            ORDER BY totalDACU DESC
            
            LIMIT $limit;
        ";

        return $this->db->query($sql)->result();
    }

    public function getChartSubmissionsByUserId($id)
    {
        if (empty($id)) {
            return false;
        }

        $sql = "SELECT 	         
          SUM(CASE WHEN STATUS = 'AC' THEN 1 ELSE 0 END) AC, 
          SUM(CASE WHEN STATUS = 'CE' THEN 1 ELSE 0 END) CE, 
          SUM(CASE WHEN STATUS = 'IR' THEN 1 ELSE 0 END) IR, 
          SUM(CASE WHEN STATUS = 'ML' THEN 1 ELSE 0 END) ML, 
          SUM(CASE WHEN STATUS = 'OL' THEN 1 ELSE 0 END) OL, 
          SUM(CASE WHEN STATUS = 'PE' THEN 1 ELSE 0 END) PE, 
          SUM(CASE WHEN STATUS = 'RF' THEN 1 ELSE 0 END) RF, 
          SUM(CASE WHEN STATUS = 'RTE' THEN 1 ELSE 0 END) RTE, 
          SUM(CASE WHEN STATUS = 'TL' THEN 1 ELSE 0 END) TL, 
          SUM(CASE WHEN STATUS = 'WA' THEN 1 ELSE 0 END) WA        
        FROM submission s
        WHERE s.user_id = $id
        GROUP BY s.user_id;";

        return $this->db->query($sql)->result();
    }

    public function getChartSubmissionsByUserIdAndGroupId($userId = null, $groupId = null)
    {
        if (empty($userId)) {
            return false;
        }
        if (empty($groupId)) {
            return false;
        }

        $sql = "SELECT 	         
          SUM(CASE WHEN STATUS = 'AC' THEN 1 ELSE 0 END) AC, 
          SUM(CASE WHEN STATUS = 'CE' THEN 1 ELSE 0 END) CE, 
          SUM(CASE WHEN STATUS = 'IR' THEN 1 ELSE 0 END) IR, 
          SUM(CASE WHEN STATUS = 'ML' THEN 1 ELSE 0 END) ML, 
          SUM(CASE WHEN STATUS = 'OL' THEN 1 ELSE 0 END) OL, 
          SUM(CASE WHEN STATUS = 'PE' THEN 1 ELSE 0 END) PE, 
          SUM(CASE WHEN STATUS = 'RF' THEN 1 ELSE 0 END) RF, 
          SUM(CASE WHEN STATUS = 'RTE' THEN 1 ELSE 0 END) RTE, 
          SUM(CASE WHEN STATUS = 'TL' THEN 1 ELSE 0 END) TL, 
          SUM(CASE WHEN STATUS = 'WA' THEN 1 ELSE 0 END) WA        
        FROM submission s
        INNER JOIN groupusers gu ON s.user_id = gu.id_user
        WHERE s.user_id = $userId
        AND gu.id_group = $groupId        
        AND s.submissionDate  BETWEEN '" . (date('Y') -1) . "-10-20' and '" . date('Y') . "-08-31'        
        GROUP BY s.user_id;";

        return $this->db->query($sql)->result();
    }

    public function getProblemsRankingByUserId($id, $params = []){
        if (empty($id)) {
            return false;
        }

        $limit = isset($params['limit']) ? $params['limit'] : self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
            SELECT
                (
                    SELECT GROUP_CONCAT(DISTINCT(s.`language`))
                    FROM submission s
                    WHERE s.problem_id = p.internalId and s.user_id = $id
                    ) AS languages,
                (
                    SELECT s.submissionDate
                    FROM submission s
                    WHERE s.problem_id = p.internalId and s.user_id = $id
                    ORDER BY s.submissionDate DESC
                    LIMIT 1
                ) AS last_date_attempt,
                (
                    SELECT s.`status`
                    FROM submission s
                    WHERE s.problem_id = p.internalId and s.user_id = $id
                    ORDER BY s.submissionDate DESC
                    LIMIT 1
                ) AS last_status,
                (
                    SELECT COUNT(s.id)
                    FROM submission s
                    WHERE s.user_id = $id AND s.problem_id = p.internalId
                ) AS totalSubs,
                    (
                    SELECT COUNT(s.id)
                    FROM submission s
                    WHERE s.user_id = $id AND s.problem_id = p.internalId AND s.`status` = 'AC'
                ) AS totalAC,
            
                pr.`name`,
                p.internalId,
                p.publicationDate
            
            FROM problem p
            INNER JOIN problem_details pr ON p.internalId = pr.id
            INNER  JOIN submission s ON s.problem_id = p.internalId
            WHERE s.user_id = $id
            
            GROUP BY p.internalId
            ORDER BY totalAC DESC

            LIMIT $limit;";

        return $this->db->query($sql)->result();
    }

    public function getProblemsRankingByUserIdAndGroupId($userId = null, $groupId = null,  $params = []){
        if (empty($userId)) {
            return false;
        }

        if (empty($groupId)) {
            return false;
        }

        $limit = isset($params['limit']) ? $params['limit'] : self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
            SELECT
                (
                    SELECT GROUP_CONCAT(DISTINCT(s.`language`))
                    FROM submission s
                    WHERE s.problem_id = p.internalId and s.user_id = $userId
                    ) AS languages,
                (
                    SELECT s.submissionDate
                    FROM submission s
                    WHERE s.problem_id = p.internalId and s.user_id = $userId
                    ORDER BY s.submissionDate DESC
                    LIMIT 1
                ) AS last_date_attempt,
                (
                    SELECT s.`status`
                    FROM submission s
                    WHERE s.problem_id = p.internalId and s.user_id = $userId
                    ORDER BY s.submissionDate DESC
                    LIMIT 1
                ) AS last_status,
                (
                    SELECT COUNT(s.id)
                    FROM submission s
                    WHERE s.user_id = $userId AND s.problem_id = p.internalId
                ) AS totalSubs,
                    (
                    SELECT COUNT(s.id)
                    FROM submission s
                    WHERE s.user_id = $userId AND s.problem_id = p.internalId AND s.`status` = 'AC'
                ) AS totalAC,
            
                pr.`name`,
                p.internalId,
                p.publicationDate
            
            FROM problem p
            INNER JOIN problem_details pr ON p.internalId = pr.id
            INNER  JOIN submission s ON s.problem_id = p.internalId
            INNER JOIN groupusers gu ON s.user_id = gu.id_user
            WHERE s.user_id = $userId
            AND gu.id_group = $groupId
            AND s.submissionDate  BETWEEN '" . (date('Y') -1) . "-10-20' and '" . date('Y') . "-08-31'              
            GROUP BY p.internalId
            ORDER BY totalSubs DESC

            LIMIT $limit;";

        return $this->db->query($sql)->result();
    }

    public function getProblemsSubmittedByUserId($id, $params = []){
        if (empty($id)) {
            return false;
        }

        $sql = "
            SELECT
                (
                    SELECT s.`status`
                    FROM submission s
                    WHERE s.problem_id = p.internalId and s.user_id = $id
                    ORDER BY s.submissionDate DESC
                    LIMIT 1
                ) AS last_status,
                (
                    SELECT COUNT(s.id)
                    FROM submission s
                    WHERE s.user_id = $id AND s.problem_id = p.internalId
                ) AS totalSubs,
                    (
                    SELECT COUNT(s.id)
                    FROM submission s
                    WHERE s.user_id = $id AND s.problem_id = p.internalId AND s.`status` = 'AC'
                ) AS totalAC,
            
                pr.`name`,
                p.internalId,
                p.publicationDate
            
            FROM problem p
            INNER JOIN problem_details pr ON p.internalId = pr.id
            INNER  JOIN submission s ON s.problem_id = p.internalId
            WHERE s.user_id = $id
            
            GROUP BY p.internalId
            ORDER BY p.internalId ASC;";

        return $this->db->query($sql)->result();
    }

    public function getProblemsSubmittedByUserIdAndGroupId($userId = null, $groupId = null, $params = []){
        if (empty($userId)) {
            return false;
        }
        if (empty($groupId)) {
            return false;
        }

        $sql = "
            SELECT
                (
                    SELECT s.`status`
                    FROM submission s
                    WHERE s.problem_id = p.internalId and s.user_id = $userId
                    ORDER BY s.submissionDate DESC
                    LIMIT 1
                ) AS last_status,
                (
                    SELECT COUNT(s.id)
                    FROM submission s
                    WHERE s.user_id = $userId AND s.problem_id = p.internalId
                ) AS totalSubs,
                    (
                    SELECT COUNT(s.id)
                    FROM submission s
                    WHERE s.user_id = $userId AND s.problem_id = p.internalId AND s.`status` = 'AC'
                ) AS totalAC,
            
                pr.`name`,
                p.internalId,
                p.publicationDate
            
            FROM problem p
            INNER JOIN problem_details pr ON p.internalId = pr.id
            INNER  JOIN submission s ON s.problem_id = p.internalId
            INNER JOIN groupusers gu ON s.user_id = gu.id_user
            WHERE gu.id_group = $groupId AND s.user_id = $userId
            AND s.submissionDate  BETWEEN '" . (date('Y') -1) . "-10-20' and '" . date('Y') . "-08-31'
            GROUP BY p.internalId
            ORDER BY p.internalId ASC;";

        return $this->db->query($sql)->result();
    }

    public function getLastProblemsAttemptsByUserId($id = null, $params = [])
    {
        if (empty($id)) {
            return false;
        }

        $limit = isset($params['limit']) ? $params['limit'] : self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
            SELECT 
	          s.*, 
	          GROUP_CONCAT(DISTINCT(s.language)) AS 'languages',
	          s.submissionDate AS 'last_date_attempt',
	          det.name AS problem_name,
	          det.id AS problem_id, 
	          SUM(CASE WHEN STATUS = 'AC' THEN 1 ELSE 0 END) AC, 
	          SUM(CASE WHEN STATUS = 'CE' THEN 1 ELSE 0 END) CE, 
	          SUM(CASE WHEN STATUS = 'IR' THEN 1 ELSE 0 END) IR, 
	          SUM(CASE WHEN STATUS = 'ML' THEN 1 ELSE 0 END) ML, 
	          SUM(CASE WHEN STATUS = 'OL' THEN 1 ELSE 0 END) OL, 
	          SUM(CASE WHEN STATUS = 'PE' THEN 1 ELSE 0 END) PE, 
	          SUM(CASE WHEN STATUS = 'RF' THEN 1 ELSE 0 END) RF, 
	          SUM(CASE WHEN STATUS = 'RTE' THEN 1 ELSE 0 END) RTE, 
	          SUM(CASE WHEN STATUS = 'TL' THEN 1 ELSE 0 END) TL, 
	          SUM(CASE WHEN STATUS = 'WA' THEN 1 ELSE 0 END) WA, 
	          (		
                SELECT 
                    s2.`status`
                FROM `submission` `s2`                
                WHERE `s2`.`problem_id` = s.problem_id and s2.user_id = $id ORDER BY s2.submissionDate DESC LIMIT 1	
                ) as lastAttempt,
	          COUNT(*) AS totalAttempts
            FROM submission s
            LEFT JOIN problem_details det ON det.id = s.problem_id
            WHERE s.user_id = $id AND det.id IS NOT NULL
            GROUP BY s.problem_id
            ORDER BY `s`.`submissionDate` DESC, last_date_attempt DESC
            LIMIT $limit;
        ";

        return $this->db->query($sql)->result();
    }

    public function getLastProblemsAttemptsByUserIdAndGroupId($userId = null, $groupId = null, $params = [])
    {
        if (empty($userId)) {
            return false;
        }

        if (empty($groupId)) {
            return false;
        }

        $limit = isset($params['limit']) ? $params['limit'] : self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
            SELECT 
	          s.*, 
	          GROUP_CONCAT(DISTINCT(s.language)) AS 'languages',
	          s.submissionDate AS 'last_date_attempt',
	          det.name AS problem_name,
	          det.id AS problem_id, 
	          SUM(CASE WHEN STATUS = 'AC' THEN 1 ELSE 0 END) AC, 
	          SUM(CASE WHEN STATUS = 'CE' THEN 1 ELSE 0 END) CE, 
	          SUM(CASE WHEN STATUS = 'IR' THEN 1 ELSE 0 END) IR, 
	          SUM(CASE WHEN STATUS = 'ML' THEN 1 ELSE 0 END) ML, 
	          SUM(CASE WHEN STATUS = 'OL' THEN 1 ELSE 0 END) OL, 
	          SUM(CASE WHEN STATUS = 'PE' THEN 1 ELSE 0 END) PE, 
	          SUM(CASE WHEN STATUS = 'RF' THEN 1 ELSE 0 END) RF, 
	          SUM(CASE WHEN STATUS = 'RTE' THEN 1 ELSE 0 END) RTE, 
	          SUM(CASE WHEN STATUS = 'TL' THEN 1 ELSE 0 END) TL, 
	          SUM(CASE WHEN STATUS = 'WA' THEN 1 ELSE 0 END) WA, 
	          (		
                SELECT 
                    s2.`status`
                FROM `submission` `s2`                
                WHERE `s2`.`problem_id` = s.problem_id and s2.user_id = $userId ORDER BY s2.submissionDate DESC LIMIT 1	
                ) as lastAttempt,
	          COUNT(*) AS totalAttempts
            FROM submission s
            LEFT JOIN problem_details det ON det.id = s.problem_id
            INNER JOIN groupusers gu ON s.user_id = gu.id_user
            WHERE gu.id_group = $groupId AND s.user_id = $userId AND det.id IS NOT NULL
            /*AND s.submissionDate  BETWEEN '" . (date('Y') -1) . "-10-20' and '" . date('Y') . "-08-31'*/
            GROUP BY s.problem_id
            ORDER BY `s`.`submissionDate` DESC, last_date_attempt DESC
            LIMIT $limit;
        ";

        return $this->db->query($sql)->result();
    }

    public function getChartLanguages()
    {
        $this->db->select('language, count(language) AS totals')
            ->from('submission')
            ->group_by('language')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getChartLanguagesByGroupId($groupId)
    {
        if (empty($groupId)) {
            return false;
        }

        $this->db->select('s.language, COUNT(s.language) AS totals')
            ->from('submission s')
            ->join('groupusers gr', 'gr.id_user = s.user_id', 'left')
            ->where('gr.id_group', $groupId)
            ->where('s.submissionDate  BETWEEN "'. (date('Y') -1) . '-10-20" and "'. date('Y') . '-08-31"')
            ->group_by('language')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getChartLanguagesByUserId($userId)
    {
        if (empty($userId)) {
            return false;
        }

        $this->db->select('s.language, COUNT(s.language) AS totals')
            ->from('submission s')
            ->where('s.user_id', $userId)
            ->group_by('language')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getChartLanguagesByUserIdAndGroupId($userId = null, $groupId = null)
    {
        if (empty($userId)) {
            return false;
        }

        if (empty($groupId)) {
            return false;
        }

        $this->db->select('s.language, COUNT(s.language) AS totals')
            ->from('submission s')
            ->join('groupusers gr', 'gr.id_user = s.user_id', 'left')
            ->where('gr.id_group', $groupId)
            ->where('s.user_id', $userId)
            /*->where('s.submissionDate  BETWEEN "'. (date('Y') -1) . '-10-20" and "'. date('Y') . '-08-31"')*/
            ->group_by('language')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getChartLanguagesByProblemId($id = null)
    {
        if (empty($id)) {
            return false;
        }

        $this->db->select('language, count(language) AS totals')
            ->from('submission')
            ->where('problem_id', $id)
            ->group_by('language')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getChartErrors()
    {
        $this->db->select('status, count(status) AS totals')
            ->from('submission')
            ->where('status <>', 'AC')
            ->group_by('status')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getChartErrorsByGroupId($groupId)
    {
        if (empty($groupId)) {
            return false;
        }

        $this->db->select('s.status, count(s.status) AS totals')
            ->from('submission s')
            ->where('s.status <>', 'AC')
            ->join('groupusers gr', 'gr.id_user = s.user_id', 'left')
            ->where('gr.id_group', $groupId)
            ->where('s.submissionDate  BETWEEN "'. (date('Y') -1) . '-10-20" and "'. date('Y') . '-08-31"')
            ->group_by('s.status')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getChartErrorsByUserId($userId)
    {
        if (empty($userId)) {
            return false;
        }

        $this->db->select('s.status, count(s.status) AS totals')
            ->from('submission s')
            ->where('s.status <>', 'AC')
            ->where('s.user_id', $userId)
            ->group_by('s.status')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getChartErrorsByUserIdAndGroupId($userId = null, $groupId = null)
    {
        if (empty($userId)) {
            return false;
        }
        if (empty($groupId)) {
            return false;
        }

        $this->db->select('s.status, count(s.status) AS totals')
            ->from('submission s')
            ->join('groupusers gr', 'gr.id_user = s.user_id', 'left')
            ->where([
                's.status <>' => 'AC',
                'gr.id_group' => $groupId,
                's.user_id' => $userId
            ])
            ->group_by('s.status')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }


    public function getChartErrorsByProblemId($id = null)
    {
        if (empty($id)) {
            return false;
        }

        $this->db->select('status, count(status) AS totals')
            ->from('submission')
            ->where([
                'problem_id' => $id,
                'status <>' => 'AC'
            ])
            ->group_by('status')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getChartErrorsTableByProblemId($id = null)
    {
        if (empty($id)) {
            return false;
        }

        $this->db->select('s.status, e.name, count(s.status) AS totals')
            ->from('submission s')
            ->join('status e', 'e.id = s.status', 'left')
            ->where([
                's.problem_id' => $id,
                's.status <>' => 'AC'
            ])
            ->group_by('s.status')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getChartErrorsTableByUserId($userId = null)
    {
        if (empty($userId)) {
            return false;
        }

        $this->db->select('s.status, e.name, count(s.status) AS totals')
            ->from('submission s')
            ->join('status e', 'e.id = s.status', 'left')
            ->where([
                's.user_id' => $userId,
                's.status <>' => 'AC'
            ])
            ->group_by('s.status')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getChartSubmissionTableByUserId($userId = null)
    {
        if (empty($userId)) {
            return false;
        }

        $this->db->select('s.status, e.name, count(s.status) AS totals')
            ->from('submission s')
            ->join('status e', 'e.id = s.status', 'left')
            ->where([
                's.user_id' => $userId
            ])
            ->group_by('s.status')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getChartSubmissionsByGroupId($groupId = null)
    {
        if (empty($groupId)) {
            return false;
        }

        $sql = "SELECT 	         
	          SUM(CASE WHEN STATUS = 'AC' THEN 1 ELSE 0 END) AC, 
	          SUM(CASE WHEN STATUS = 'CE' THEN 1 ELSE 0 END) CE, 
	          SUM(CASE WHEN STATUS = 'IR' THEN 1 ELSE 0 END) IR, 
	          SUM(CASE WHEN STATUS = 'ML' THEN 1 ELSE 0 END) ML, 
	          SUM(CASE WHEN STATUS = 'OL' THEN 1 ELSE 0 END) OL, 
	          SUM(CASE WHEN STATUS = 'PE' THEN 1 ELSE 0 END) PE, 
	          SUM(CASE WHEN STATUS = 'RF' THEN 1 ELSE 0 END) RF, 
	          SUM(CASE WHEN STATUS = 'RTE' THEN 1 ELSE 0 END) RTE, 
	          SUM(CASE WHEN STATUS = 'TL' THEN 1 ELSE 0 END) TL, 
	          SUM(CASE WHEN STATUS = 'WA' THEN 1 ELSE 0 END) WA
            FROM submission s
            INNER JOIN groupusers gu ON s.user_id = gu.id_user
            WHERE gu.id_group = $groupId
            AND s.submissionDate  BETWEEN '". (date('Y') -1) . "-10-20' and '" . date('Y') . "-08-31';";

        return $this->db->query($sql)->result();
    }

    public function getLastIR() {
        $this->db->select('*')
            ->from('submission s')
            ->where('s.submissionDate BETWEEN date_sub(now(),INTERVAL 1 WEEK) and NOW()')
            ->where('s.status', 'IR');

        $query = $this->db->get();
        return $query->result();
    }

    public function getSumAllIR()
    {
        $this->db->select('count(*) AS total')
            ->from('submission s')
            ->where('s.status', 'IR');

        $query = $this->db->get();

        return $query->row();
    }

    public function getSumAllAccepted()
    {
        $this->db->select('count(*) AS total')
            ->from('submission s')
            ->where('s.status', 'AC');

        $query = $this->db->get();

        return $query->row();
    }

    public function getSumAllAcceptedByGroupId($groupId)
    {
        if (empty($groupId)) {
            return false;
        }

        $this->db->select('*')
            ->from('submission s')
            ->join('groupusers gr', 'gr.id_user = s.user_id', 'left')
            ->where('gr.id_group', $groupId)
            ->where('s.status', 'AC')
            ->where('s.submissionDate  BETWEEN "'. (date('Y') -1) . '-10-20" and "'. date('Y') . '-08-31"')
            ->group_by('s.id');

        $query = $this->db->get();

        return $query->num_rows();
    }

    public function getProblemAttemptsEvolutionByProblemId($id = null)
    {
        if (empty($id)) {
            return false;
        }

        $this->db->select('DATE_FORMAT(s.submissionDate, "%d/%m/%Y") AS preetyDate, s.submissionDate, COUNT(s.id) AS attempts')
            ->from('submission s')
            ->where('s.problem_id', $id)
            ->group_by('YEAR(s.submissionDate), MONTH(s.submissionDate), DAY(s.submissionDate)')
            ->order_by('s.submissionDate', 'ASC');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function getAcceptedByCountryByProblemId($id = null)
    {
        if (empty($id)) {
            return false;
        }

        $this->db->select('count(s.id) as accepted, u.country_id')
            ->from('submission s')
            ->join('users u', 's.user_id = u.id', 'left')
            ->where([
                's.problem_id' => $id,
                's.status' => 'AC'])
            ->where('u.country_id is not null')
            ->group_by('u.country_id')
            ->order_by('accepted', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getAllProblemsSubmittedByGroup($groupId, $params = [])
    {
        if (empty($groupId)) {
            return false;
        }

        $this->db->select('det.name, p.*, s.status')
            ->from('problem p')
            ->join('problem_details det', 'p.internalId = det.id', 'left')
            ->join('submission s', 's.problem_id = p.internalId', 'left')
            ->join('groupusers gr', 'gr.id_user = s.user_id', 'left')
            ->where('gr.id_group', $groupId)
            ->where('s.submissionDate  BETWEEN "'. (date('Y') -1) . '-10-20" and "'. date('Y') . '-08-31"')
            //->where('det.name IS NOT NULL')
            ->group_by('p.internalId')
            ->order_by('p.totalDACU', 'DESC');

        if (isset($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        /*if (isset($params['order'])) {
            $this->db->order_by($params['order'], $params['direction']);
        }*/

        $query = $this->db->get();

        return $query->result();
    }

    public function getAllProblemsSubmittedByUserId($userId, $params = [])
    {
        if (empty($userId)) {
            return false;
        }

        $this->db->select('det.name, p.*, s.*')
            ->from('problem p')
            ->join('problem_details det', 'p.internalId = det.id', 'left')
            ->join('submission s', 's.problem_id = p.internalId', 'left')
            ->where('s.user_id', $userId)
            ->where('det.name IS NOT NULL')
            ->group_by('p.internalId');

        if (isset($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        if (isset($params['order'])) {
            $this->db->order_by($params['order'], $params['direction']);
        }

        $query = $this->db->get();

        return $query->result();
    }

    function getTotalSubmissionsInLastYear() {

        $sql = 'SELECT 
            y, 
            MONTHNAME(STR_TO_DATE(m, "%m")) AS month, 
            COUNT(submissionDate) AS total_submissions
        FROM (
          SELECT y, m
          FROM
            (SELECT YEAR(CURDATE()) y UNION ALL SELECT YEAR(CURDATE())-1) years,
            (SELECT 1 m UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
              UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8
              UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12) months) ym
          LEFT JOIN submission s
          ON ym.y = YEAR(s.submissionDate)
             AND ym.m = MONTH(s.submissionDate)
        WHERE
          (y=YEAR(CURDATE()) AND m<=MONTH(CURDATE()))
          OR
          (y<YEAR(CURDATE()) AND m>MONTH(CURDATE()))
        GROUP BY y, m';

        return $this->db->query($sql)->result_array();
    }

    function getTotalAcceptedInLastYear() {

        $sql = 'SELECT 
            y, 
            MONTHNAME(STR_TO_DATE(m, "%m")) AS month, 
            COUNT(submissionDate) AS total_submissions
        FROM (
          SELECT y, m
          FROM
            (SELECT YEAR(CURDATE()) y UNION ALL SELECT YEAR(CURDATE())-1) years,
            (SELECT 1 m UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
              UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8
              UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12) months) ym
          LEFT JOIN submission s
          ON ym.y = YEAR(s.submissionDate)
             AND ym.m = MONTH(s.submissionDate)
             AND s.status = "AC"
        WHERE
          (y=YEAR(CURDATE()) AND m<=MONTH(CURDATE()))
          OR
          (y<YEAR(CURDATE()) AND m>MONTH(CURDATE()))
        GROUP BY y, m';

        return $this->db->query($sql)->result();
    }

    function getTotalSubmissionsByMonthAndGroupId($groupId) {
        if (empty($groupId)) {
            return [];
        }

        $sql = "SELECT 
            y, 
            MONTHNAME(STR_TO_DATE(m, '%m')) AS month, 
            COUNT(submissionDate) AS total_submissions
        FROM (
          SELECT y, m
          FROM
            (SELECT YEAR(CURDATE()) y UNION ALL SELECT YEAR(CURDATE())-1) years,
            (SELECT 1 m UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
              UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8
              UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12) months) ym
          LEFT JOIN submission s
              ON ym.y = YEAR(s.submissionDate)
                 AND ym.m = MONTH(s.submissionDate)
          LEFT JOIN groupusers gr
              ON gr.id_user = s.user_id
        WHERE  gr.id_group = $groupId        
        AND s.submissionDate  BETWEEN '" . (date('Y') -1) . "-10-20' and '" . date('Y') . "-08-31'
        AND
          (y=YEAR(CURDATE()) AND m<=MONTH(CURDATE()))
          OR
          (y<YEAR(CURDATE()) AND m>MONTH(CURDATE()))
        GROUP BY y, m";

        return $this->db->query($sql)->result_array();
    }

    function getTotalAcceptedByMonthAndGroupId($groupId) {
        if (empty($groupId)) {
            return [];
        }

        $sql = '
        SELECT 
            y, 
            MONTHNAME(STR_TO_DATE(m, "%m")) AS month, 
            COUNT(submissionDate) AS total_submissions
        FROM (
          SELECT y, m
          FROM
            (SELECT YEAR(CURDATE()) y UNION ALL SELECT YEAR(CURDATE())-1) years,
            (SELECT 1 m UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
              UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8
              UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12) months) ym
          LEFT JOIN submission s
              ON ym.y = YEAR(s.submissionDate)
                 AND ym.m = MONTH(s.submissionDate)
                 AND s.`status` = "AC"
          LEFT JOIN groupusers gr
              ON gr.id_user = s.user_id
        WHERE  gr.id_group = \' . $groupId . \'
        AND s.submissionDate  BETWEEN "'. (date('Y') -1) . '-10-20" and "'. date('Y') . '-08-31"
        AND
          (y=YEAR(CURDATE()) AND m<=MONTH(CURDATE()))
          OR
          (y<YEAR(CURDATE()) AND m>MONTH(CURDATE()))
        GROUP BY y, m';

        return $this->db->query($sql)->result();
    }

    function getTotalSubmissionsInLastYearByUserId($userId) {
        if (empty($userId)) {
            return [];
        }

        $sql = 'SELECT 
            y, 
            MONTHNAME(STR_TO_DATE(m, "%m")) AS month, 
            COUNT(submissionDate) AS total_submissions
        FROM (
          SELECT y, m
          FROM
            (SELECT YEAR(CURDATE()) y UNION ALL SELECT YEAR(CURDATE())-1) years,
            (SELECT 1 m UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
              UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8
              UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12) months) ym
          LEFT JOIN submission s
          ON ym.y = YEAR(s.submissionDate)
             AND ym.m = MONTH(s.submissionDate)
             AND s.user_id = ' . $userId . '
        WHERE
          (y=YEAR(CURDATE()) AND m<=MONTH(CURDATE()))
          OR
          (y<YEAR(CURDATE()) AND m>MONTH(CURDATE()))
        GROUP BY y, m';

        return $this->db->query($sql)->result_array();
    }

    function getTotalAcceptedInLastYearByUserId($userId) {
        if (empty($userId)) {
            return [];
        }

        $sql = 'SELECT 
            y, 
            MONTHNAME(STR_TO_DATE(m, "%m")) AS month, 
            COUNT(submissionDate) AS total_submissions
        FROM (
          SELECT y, m
          FROM
            (SELECT YEAR(CURDATE()) y UNION ALL SELECT YEAR(CURDATE())-1) years,
            (SELECT 1 m UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
              UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8
              UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12) months) ym
          LEFT JOIN submission s
          ON ym.y = YEAR(s.submissionDate)
             AND ym.m = MONTH(s.submissionDate)
             AND s.user_id = ' . $userId . '
             AND s.status = "AC"
        WHERE
          (y=YEAR(CURDATE()) AND m<=MONTH(CURDATE()))
          OR
          (y<YEAR(CURDATE()) AND m>MONTH(CURDATE()))
        GROUP BY y, m';

        return $this->db->query($sql)->result();
    }

    function getTotalSubmissionsByMonthAndUserId($userId) {
        if (empty($userId)) {
            return [];
        }

        $sql = '
            SELECT 	
                COUNT(i.submissionDate) AS total_submissions,
                `month`
            FROM (select 1 AS `month` union all select 2 union all select 3 union all select 4 union all
              select 5 union all select 6 union all select 7 union all select 8 union all
              select 9 union all select 10 union all select 11 union all select 12
             ) m 
            LEFT OUTER JOIN
                submission i
                ON m.`month` = MONTH(i.submissionDate) 
                AND YEAR(i.submissionDate) = YEAR(CURDATE())
                AND i.user_id = ' . $userId . '
            GROUP BY m.`month`;';

        return $this->db->query($sql)->result();
    }

    function getTotalAcceptedByMonthAndUserId($userId) {
        if (empty($userId)) {
            return [];
        }

        $sql = '
            SELECT 	
                COUNT(i.submissionDate) AS total_submissions,
                `month`
            FROM (select 1 AS `month` union all select 2 union all select 3 union all select 4 union all
              select 5 union all select 6 union all select 7 union all select 8 union all
              select 9 union all select 10 union all select 11 union all select 12
             ) m 
            LEFT OUTER JOIN
                submission i
                ON m.`month` = MONTH(i.submissionDate) 
                    AND YEAR(i.submissionDate) = YEAR(CURDATE()) 
                    AND i.`status` = "AC"
                    AND i.user_id = ' . $userId . '
            GROUP BY m.`month`;';

        return $this->db->query($sql)->result();
    }

    function getTotalSubmissionsInLastYearByProblemId($problemId) {
        if (empty($problemId)) {
            return [];
        }

        $sql = 'SELECT 
            y, 
            MONTHNAME(STR_TO_DATE(m, "%m")) AS month, 
            COUNT(submissionDate) AS total_submissions
        FROM (
          SELECT y, m
          FROM
            (SELECT YEAR(CURDATE()) y UNION ALL SELECT YEAR(CURDATE())-1) years,
            (SELECT 1 m UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
              UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8
              UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12) months) ym
          LEFT JOIN submission s
          ON ym.y = YEAR(s.submissionDate)
             AND ym.m = MONTH(s.submissionDate)
             AND s.problem_id = ' . $problemId . '
        WHERE
          (y=YEAR(CURDATE()) AND m<=MONTH(CURDATE()))
          OR
          (y<YEAR(CURDATE()) AND m>MONTH(CURDATE()))
        GROUP BY y, m';

        return $this->db->query($sql)->result_array();
    }

    function getTotalAcceptedInLastYearByProblemId($problemId) {
        if (empty($problemId)) {
            return [];
        }

        $sql = 'SELECT 
            y, 
            MONTHNAME(STR_TO_DATE(m, "%m")) AS month, 
            COUNT(submissionDate) AS total_submissions
        FROM (
          SELECT y, m
          FROM
            (SELECT YEAR(CURDATE()) y UNION ALL SELECT YEAR(CURDATE())-1) years,
            (SELECT 1 m UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
              UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8
              UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12) months) ym
          LEFT JOIN submission s
          ON ym.y = YEAR(s.submissionDate)
             AND ym.m = MONTH(s.submissionDate)
             AND s.problem_id = ' . $problemId . '
             AND s.status = "AC"
        WHERE
          (y=YEAR(CURDATE()) AND m<=MONTH(CURDATE()))
          OR
          (y<YEAR(CURDATE()) AND m>MONTH(CURDATE()))
        GROUP BY y, m';

        return $this->db->query($sql)->result();
    }

    function getTotalSubmissionsByMonthAndProblemId($problemId) {
        if (empty($problemId)) {
            return [];
        }

        $sql = '
            SELECT 	
                COUNT(i.submissionDate) AS total_submissions,
                `month`
            FROM (select 1 AS `month` union all select 2 union all select 3 union all select 4 union all
              select 5 union all select 6 union all select 7 union all select 8 union all
              select 9 union all select 10 union all select 11 union all select 12
             ) m 
            LEFT OUTER JOIN
                submission i
                ON m.`month` = MONTH(i.submissionDate) 
                AND YEAR(i.submissionDate) = YEAR(CURDATE())
                AND i.problem_id = ' . $problemId . '
            GROUP BY m.`month`;';

        return $this->db->query($sql)->result();
    }

    function getTotalAcceptedByMonthAndProblemId($problemId) {
        if (empty($problemId)) {
            return [];
        }

        $sql = '
            SELECT 	
                COUNT(i.submissionDate) AS total_submissions,
                `month`
            FROM (select 1 AS `month` union all select 2 union all select 3 union all select 4 union all
              select 5 union all select 6 union all select 7 union all select 8 union all
              select 9 union all select 10 union all select 11 union all select 12
             ) m 
            LEFT OUTER JOIN
                submission i
                ON m.`month` = MONTH(i.submissionDate) 
                    AND YEAR(i.submissionDate) = YEAR(CURDATE()) 
                    AND i.`status` = "AC"
                    AND i.problem_id = ' . $problemId . '
            GROUP BY m.`month`;';

        return $this->db->query($sql)->result();
    }

    public function getProblemByIdAndGroupId($id = null, $groupId){
        if (empty($id) || empty($groupId)) {
            return false;
        }

        $this->db->select()
            ->from('problem p')
            ->join('problem_details d', 'd.id = p.internalId', 'left')
            ->join('submission s', 's.problem_id = p.internalId', 'left')
            ->join('groupusers gr','gr.id_user = s.user_id', 'left')
            ->where('p.internalId', $id)
            ->where('gr.id_group', $groupId)
            ->where('s.submissionDate  BETWEEN "'. (date('Y') -1) . '-10-20" and "'. date('Y') . '-08-31"');

        $query = $this->db->get();

        return $query->row();
    }

    public function getLastUsersAttemptsByProblemIdAndGroupId($id = null, $groupId, $params = []){
        if (empty($id) || empty($groupId)) {
            return false;
        }

        $limit = isset($params['limit']) ? $params['limit'] : self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
            SELECT 
            u.id AS 'user_id', udata.*, s.problem_id, 
            COUNT(s.id) AS 'attempts', GROUP_CONCAT(DISTINCT(s.language)) AS 'languages', s.submissionDate AS 'last_date_attempt',
            (
                    
            SELECT 
                count(s1.id)
            FROM submission s1
            LEFT JOIN users u1 ON s1.user_id = u1.id
            JOIN userdata udata1 ON udata1.id = u1.id
            WHERE s1.problem_id = $id and s1.status = 'AC' and u1.id = u.id
                
            ) as accepted,
            (		
            SELECT 
                s2.status
            FROM submission s2
            LEFT JOIN users u2 ON s2.user_id = u2.id
            JOIN userdata udata2 ON udata2.id = u2.id
            WHERE s2.problem_id = $id and u2.id = u.id ORDER BY s2.submissionDate DESC LIMIT 1	
            ) as lastAttempt
        FROM submission s
        LEFT JOIN users u ON s.user_id = u.id
        LEFT JOIN userdata udata ON udata.id = u.id        
        LEFT JOIN groupusers gu ON gu.id_user = udata.id        
        WHERE s.problem_id = $id
        AND gu.id_group = $groupId
        AND s.submissionDate  BETWEEN '" . (date('Y') -1) . "-10-20' and '" . date('Y') . "-08-31'
        GROUP BY u.id
        ORDER BY s.submissionDate DESC
        LIMIT $limit
        ";

        return $this->db->query($sql)->result();
    }

    public function getChartLanguagesByProblemIdAndGroupId($id = null, $groupId){
        if (empty($id) || empty($groupId)) {
            return false;
        }

        $this->db->select('language, count(language) AS totals')
            ->from('submission s')
            ->where('problem_id', $id)
            ->join('groupusers gr', 'gr.id_user = s.user_id', 'left')
            ->where('gr.id_group', $groupId)
            ->where('s.submissionDate  BETWEEN "'. (date('Y') -1) . '-10-20" and "'. date('Y') . '-08-31"')
            ->group_by('language')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }


    public function getChartErrorsByProblemIdAndGroupId($id, $groupId){
        if (empty($id) || empty($groupId)) {
            return false;
        }

        $this->db->select('s.status, count(s.status) AS totals')
            ->from('submission s')
            ->where([
                'problem_id' => $id,
                's.status <>', 'AC'
            ])
            ->join('groupusers gr', 'gr.id_user = s.user_id', 'left')
            ->where('gr.id_group', $groupId)
            ->where('s.submissionDate  BETWEEN "'. (date('Y') -1) . '-10-20" and "'. date('Y') . '-08-31"')
            ->group_by('s.status')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getChartErrorsTableByProblemIdAndGroupId($id = null, $groupId){
        if (empty($id) || empty($groupId)) {
            return false;
        }

        $this->db->select('s.status, e.name, count(s.status) AS totals')
            ->from('submission s')
            ->join('status e', 'e.id = s.status', 'left')
            ->where([
                's.problem_id' => $id,
                's.status <>' => 'AC'
            ])
            ->join('groupusers gr', 'gr.id_user = s.user_id', 'left')
            ->where('gr.id_group', $groupId)
            ->where('s.submissionDate  BETWEEN "'. (date('Y') -1) . '-10-20" and "'. date('Y') . '-08-31"')
            ->group_by('s.status')
            ->order_by('totals', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getProblemAttemptsEvolutionByProblemIdAndGroupId($id = null, $groupId){
        if (empty($id) || empty($groupId)) {
            return false;
        }

        $this->db->select('DATE_FORMAT(s.submissionDate, "%d/%m/%Y") AS preetyDate, s.submissionDate, COUNT(s.id) AS attempts')
            ->from('submission s')
            ->where('s.problem_id', $id)
            ->join('groupusers gr', 'gr.id_user = s.user_id', 'left')
            ->where('gr.id_group', $groupId)
            ->where('s.submissionDate  BETWEEN "'. (date('Y') -1) . '-10-20" and "'. date('Y') . '-08-31"')
            ->group_by('YEAR(s.submissionDate), MONTH(s.submissionDate), DAY(s.submissionDate)')
            ->order_by('s.submissionDate', 'ASC');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function getAcceptedByCountryByProblemIdAndGroupId($id = null, $groupId){
        if (empty($id) || empty($groupId)) {
            return false;
        }

        $this->db->select('count(s.id) as accepted, u.country_id')
            ->from('submission s')
            ->join('users u', 's.user_id = u.id', 'left')
            ->where([
                's.problem_id' => $id,
                's.status' => 'AC'])
            ->where('u.country_id is not null')
            ->join('groupusers gr', 'gr.id_user = s.user_id', 'left')
            ->where('gr.id_group', $groupId)
            ->where('s.submissionDate  BETWEEN "'. (date('Y') -1) . '-10-20" and "'. date('Y') . '-08-31"')
            ->group_by('u.country_id')
            ->order_by('accepted', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    function getTotalSubmissionsByMonthAndProblemIdAndGroupId($id, $groupId){
        if (empty($id) || empty($groupId)) {
            return [];
        }

        $sql = "
        SELECT 	
            COUNT(s.submissionDate) AS total_submissions,
            `month`
        FROM (select 1 AS `month` union all select 2 union all select 3 union all select 4 union all
            select 5 union all select 6 union all select 7 union all select 8 union all
            select 9 union all select 10 union all select 11 union all select 12
            ) m 
        LEFT OUTER JOIN
            submission s
            ON m.`month` = MONTH(s.submissionDate) 
            AND YEAR(s.submissionDate) = YEAR(CURDATE())
            AND s.problem_id = $id
        LEFT JOIN
            groupusers gr
            ON gr.id_user = s.user_id
        WHERE  gr.id_group = $groupId
        AND s.submissionDate  BETWEEN '" . (date('Y') -1) . "-10-20' and '" . date('Y') . "-08-31'
        GROUP BY m.`month`;";

        return $this->db->query($sql)->result_array();
    }


    function getTotalAcceptedByMonthAndProblemIdAndGroupId($id, $groupId){
        if (empty($id) || empty($groupId)) {
            return [];
        }

        $sql = "
        SELECT 	
            COUNT(s.submissionDate) AS total_submissions,
            `month`
        FROM (select 1 AS `month` union all select 2 union all select 3 union all select 4 union all
            select 5 union all select 6 union all select 7 union all select 8 union all
            select 9 union all select 10 union all select 11 union all select 12
            ) m 
        LEFT OUTER JOIN
            submission s
            ON m.`month` = MONTH(s.submissionDate) 
                AND YEAR(s.submissionDate) = YEAR(CURDATE()) 
                AND s.status = 'AC'
                AND s.problem_id = $id
        LEFT JOIN
            groupusers gr
            ON gr.id_user = s.user_id
        WHERE  gr.id_group = $groupId
        AND s.submissionDate  BETWEEN '" . (date('Y') -1) . "-10-20' and '" . date('Y') . "-08-31'
        GROUP BY m.`month`;";

        return $this->db->query($sql)->result();
    }
}
