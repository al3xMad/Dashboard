<?php
class Msubjects extends CI_Model {

    public function getAllSubjects() {
        return $this->db->get('subjects')->result();
    }

    public function getAllGroups() {
        $this->db->select('g.*')
            ->from('`group` g')
            ->join('subject_groups rel_g', 'rel_g.groupId = g.id', 'left')
            ->order_by('g.name', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getAllGroupsBySubjectId($id = null)
    {
        if (empty($id)) {
            return false;
        }

        $this->db->select('g.*')
            ->from('`group` g')
            ->join('subject_groups rel_g', 'rel_g.groupId = g.id', 'left')
            ->where('rel_g.subjectId', $id)
            ->order_by('g.name', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function getSubjectById($id)
    {
        if (empty($id)) {
            return false;
        }

        $query = $this->db->get_where('subjects',['id' => $id]);

        return $query->row();
    }

    public function getGroupById($id) {
        if (empty($id)) {
            return false;
        }

        $query = $this->db->get_where('group',['id' => $id]);

        return $query->row();
    }
}
