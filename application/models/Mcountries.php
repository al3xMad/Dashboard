<?php
class Mcountries extends CI_Model {

    public function getAllCountries() {
        $query = $this->db->get('country');

        return $query->result();
    }

    public function getAllCountriesWithUsers($params = [])
    {
        $this->db->select('n.name, c.id, COUNT(DISTINCT u.id) AS totalUsers')
            ->from('country c')
            ->join('users u', 'c.id = u.country_id')
            ->join('countryName n', 'n.iso = c.id', 'left')
            ->group_by('c.id')
            ->order_by('totalUsers', 'DESC');

        if (isset($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        $query = $this->db->get();

        return $query->result();
    }

    public function getCountAllCountriesWithUsers()
    {
        $this->db->select('n.name, c.id, COUNT(DISTINCT u.id) AS totalUsers')
            ->from('country c')
            ->join('users u', 'c.id = u.country_id')
            ->join('countryName n', 'n.iso = c.id', 'left')
            ->group_by('c.id')
            ->order_by('totalUsers', 'DESC');

        return $this->db->count_all_results();
    }

    public function getCountAllCountriesWithUsersByGroupId($groupId)
    {
        if (empty($groupId)) {
            return false;
        }

        $this->db->select('n.name, c.id, COUNT(DISTINCT u.id) AS totalUsers')
            ->from('country c')
            ->join('users u', 'c.id = u.country_id')
            ->join('countryName n', 'n.iso = c.id', 'left')
            ->join('groupusers gr', 'gr.id_user = u.id', 'left')
            ->group_by('c.id')
            ->order_by('totalUsers', 'DESC')
            ->where('gr.id_group', $groupId);

        return $this->db->count_all_results();
    }

    public function getAllCountriesWithUsersByGroupId($groupId, $params = [])
    {
        $this->db->select('n.name, c.id, COUNT(DISTINCT u.id) AS totalUsers')
            ->from('country c')
            ->join('users u', 'c.id = u.country_id')
            ->join('countryName n', 'n.iso = c.id', 'left')
            ->join('groupusers gr', 'gr.id_user = u.id', 'left')
            ->group_by('c.id')
            ->order_by('totalUsers', 'DESC')
            ->where('gr.id_group', $groupId);

        if (isset($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        $query = $this->db->get();

        return $query->result();
    }
}
