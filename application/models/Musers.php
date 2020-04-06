<?php
class Musers extends CI_Model {

    public function getAllUsers() {
        $query = $this->db->get('users');

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
}
