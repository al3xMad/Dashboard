<?php
class Musers extends CI_Model {

    const DEFAULT_LAST_ATTEMPTS_LIMIT = 100;

    public function getAllUsers() {
        $this->db->select('u.id, data.*')
            ->from('users u')
            ->join('userdata data', 'u.id = data.id');

        $query = $this->db->get();
        return $query->result();
    }

    public function getLastRegisteredUsers() {
        $this->db->select('u.id, data.*')
            ->from('users u')
            ->join('userdata data', 'u.id = data.id')
            ->where('u.registrationDate BETWEEN date_sub(now(),INTERVAL 1 WEEK) and NOW()');

        $query = $this->db->get();
        return $query->result();
    }

    public function getAllUsersByGroupId($groupId) {
        if (empty($groupId)) {
            return false;
        }

        $this->db->select('u.*')
            ->from('users u')
            ->join('groupusers gr', 'gr.id_user = u.id', 'left')
            ->where('gr.id_group', $groupId);

        $query = $this->db->get();

        return $query->result();
    }

    public function getAllUsersData() {
        $limit = self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
            SELECT `udata`.*, `u`.`gender`, `u`.`registrationDate`, `u`.`country_id`, `u`.`institution_id`,
            (
                SELECT count(*) from submission s where s.user_id = u.id
            ) as TotalSubmissions, (
                SELECT count(*) from submission s where s.user_id = u.id and s.`status` = 'AC'
            ) as TotalAC,
            (
                SELECT s.submissionDate from submission s where s.user_id = u.id order by s.submissionDate DESC limit 1
            ) as LastSubmission
    
            FROM `users` `u`
            LEFT JOIN `userdata` `udata` ON `udata`.`id` = `u`.`id`
            ORDER BY TotalSubmissions DESC, TotalAC DESC
            LIMIT $limit;";

        return $this->db->query($sql)->result();
    }

    public function getAllUsersDataByGroupId($groupId) {
        if (empty($groupId)) {
            return false;
        }

        $sql = "
          SELECT `udata`.*, `u`.`gender`, `u`.`registrationDate`, `u`.`country_id`, `u`.`institution_id`,(
            SELECT count(*) from submission s where s.user_id = u.id
          ) as TotalSubmissions, (
            SELECT count(*) from submission s where s.user_id = u.id and s.`status` = 'AC'
          ) as TotalAC,
          (
		    SELECT s.submissionDate from submission s where s.user_id = u.id order by s.submissionDate DESC limit 1
	      ) as LastSubmission

            FROM `users` `u`
            LEFT JOIN `groupusers` `gr` ON `gr`.`id_user` = `u`.`id`
            LEFT JOIN `userdata` `udata` ON `udata`.`id` = `u`.`id`

            WHERE `gr`.`id_group` = $groupId
            ORDER BY TotalSubmissions DESC, TotalAC DESC";


        return $this->db->query($sql)->result();
    }

    public function getAllUserDataById($userId) {
        if (empty($userId)) {
            return false;
        }

        $sql = "
          SELECT `udata`.*, `u`.`gender`, `u`.`registrationDate`, `u`.`country_id`, `u`.`institution_id`,(
            SELECT count(*) from submission s where s.user_id = u.id
          ) as TotalSubmissions, (
            SELECT count(*) from submission s where s.user_id = u.id and s.`status` = 'AC'
          ) as TotalAC,
          (
		    SELECT s.submissionDate from submission s where s.user_id = u.id order by s.submissionDate DESC limit 1
	      ) as LastSubmission, (
	        SELECT COUNT(DISTINCT(s.problem_id)) FROM submission s where s.user_id = u.id 
	      ) as problemAttempted, (
	        SELECT COUNT(DISTINCT(s.problem_id)) FROM submission s where s.user_id = u.id and s.`status` = 'AC'
	      ) as problemResolved

            FROM `users` `u`
            LEFT JOIN `groupusers` `gr` ON `gr`.`id_user` = `u`.`id`
            LEFT JOIN `userdata` `udata` ON `udata`.`id` = `u`.`id`

            WHERE `u`.`id` = $userId
            ORDER BY TotalSubmissions DESC, TotalAC DESC";


        return $this->db->query($sql)->row();
    }

    public function getAllUserDataByIdAndGroupId($userId, $groupId)
    {
        if (empty($userId) || empty($groupId)) {
            return false;
        }

        $sql = "
          SELECT `udata`.*, `u`.`gender`, `u`.`registrationDate`, `u`.`country_id`, `u`.`institution_id`,(
            SELECT count(*) from submission s where s.user_id = u.id
          ) as TotalSubmissions, (
            SELECT count(*) from submission s where s.user_id = u.id and s.`status` = 'AC'
          ) as TotalAC,
          (
		    SELECT s.submissionDate from submission s where s.user_id = u.id order by s.submissionDate DESC limit 1
	      ) as LastSubmission, (
	        SELECT COUNT(DISTINCT(s.problem_id)) FROM submission s where s.user_id = u.id 
	      ) as problemAttempted, (
	        SELECT COUNT(DISTINCT(s.problem_id)) FROM submission s where s.user_id = u.id and s.`status` = 'AC'
	      ) as problemResolved

            FROM `users` `u`
            LEFT JOIN `groupusers` `gr` ON `gr`.`id_user` = `u`.`id`
            LEFT JOIN `userdata` `udata` ON `udata`.`id` = `u`.`id`

            WHERE `u`.`id` = $userId AND gr.id_group = $groupId
            ORDER BY TotalSubmissions DESC, TotalAC DESC";


        return $this->db->query($sql)->row();
    }

    public function getUsersRanking($params = []) {

        $limit = isset($params['limit']) ? $params['limit'] : self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
            SELECT `u`.*,(
                SELECT group_concat(DISTINCT(s.language)) from submission s where s.user_id = u.id
            ) as languages, (
            SELECT COUNT(*) from submission s2 where s2.user_id = u.id
               ) as totalSubs, (
            SELECT COUNT(*) from submission s3 where s3.user_id = u.id and s3.`status` = 'AC'
               ) as totalAC, (
            SELECT count(DISTINCT(s4.problem_id)) from submission s4 where s4.user_id = u.id and s4.`status` = 'AC'
               ) as unique_totalAC, (
            SELECT s4.submissionDate from submission s4 where s4.user_id = u.id order by s4.submissionDate DESC limit 1
            ) as last_submission from userdata u order by unique_totalAC DESC LIMIT $limit";

        return $this->db->query($sql)->result();
    }

    public function getUsersRankingByProblemId($id, $params = []){
        if (empty($id)) {
            return false;
        }

        $limit = isset($params['limit']) ? $params['limit'] : self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
            SELECT 
                p.internalId, 
                p.publicationDate,
                pd.*,
                udata.*,
                (
                SELECT COUNT(s.id)
                FROM submission s
                WHERE s.problem_id = p.internalId AND s.user_id = udata.id
                ) AS totalSubs,
                (
                SELECT COUNT(s.id)
                FROM submission s
                WHERE s.problem_id = p.internalId AND s.user_id = udata.id AND s.`status` = 'AC'
                ) AS totalAC,
                (
                SELECT s.submissionDate
                FROM submission s
                WHERE s.problem_id = p.internalId AND s.user_id = udata.id
                ORDER BY s.submissionDate DESC
                LIMIT 1
                ) AS last_submission
            FROM problem p
            LEFT JOIN problem_details pd ON pd.id = p.internalId
            LEFT JOIN submission s ON s.problem_id = p.internalId
            LEFT JOIN userdata udata ON udata.id = s.user_id
            WHERE p.internalId = $id
            GROUP BY udata.id
            ORDER BY totalAC DESC
            LIMIT $limit";

        return $this->db->query($sql)->result();
    }

    public function getUsersRankingByGroup($groupId, $params = []){
        if (empty($groupId)) {
            return false;
        }

        $limit = isset($params['limit']) ? $params['limit'] : self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
            SELECT 
            `u`.*,(
            SELECT COUNT(*) 
            from submission s2 
            where s2.user_id = u.id
               ) as totalSubs, 
               (
            SELECT COUNT(*) 
            from submission s3 
            where s3.user_id = u.id and s3.`status` = 'AC'
               ) as totalAC, 
               (
            SELECT s4.submissionDate 
            from submission s4 
            where s4.user_id = u.id 
            order by s4.submissionDate 
            DESC limit 1
            ) as last_submission 
            from userdata u
            LEFT JOIN groupusers g ON g.id_user = u.id
            WHERE g.id_group = $groupId
            ORDER BY totalAC DESC
            LIMIT $limit";

        return $this->db->query($sql)->result();
    }
    public function getUsersRankingByProblemIdAndGroupId($id, $groupId, $params = []){
        if (empty($id) || empty($groupId)) {
            return false;
        }

        $limit = isset($params['limit']) ? $params['limit'] : self::DEFAULT_LAST_ATTEMPTS_LIMIT;

        $sql = "
        SELECT 
            p.internalId, 
            p.publicationDate,
            pd.*,
            udata.*,
            (
            SELECT COUNT(s.id)
            FROM submission s
            WHERE s.problem_id = p.internalId AND s.user_id = udata.id
            ) AS totalSubs,
            (
            SELECT COUNT(s.id)
            FROM submission s
            WHERE s.problem_id = p.internalId AND s.user_id = udata.id AND s.`status` = 'AC'
            ) AS totalAC,
            (
            SELECT s.submissionDate
            FROM submission s
            WHERE s.problem_id = p.internalId AND s.user_id = udata.id
            ORDER BY s.submissionDate DESC
            LIMIT 1
            ) AS last_submission
        FROM problem p
        LEFT JOIN problem_details pd ON pd.id = p.internalId
        LEFT JOIN submission s ON s.problem_id = p.internalId
        LEFT JOIN userdata udata ON udata.id = s.user_id
        LEFT JOIN groupusers gu ON gu.id_user = udata.id
        WHERE p.internalId = $id
        AND gu.id_group = $groupId
        GROUP BY udata.id
        ORDER BY totalAC DESC
        LIMIT $limit";

        return $this->db->query($sql)->result();
    }
}
