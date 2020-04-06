<?php
class Mcategories extends CI_Model {

    const DEFAULT_ORDER_CRITERIA = 'cat.totalAC';
    const DEFAULT_ORDER_DIRECTION = 'DESC';

    public function getAllCategories($params = []) {
        $this->db->select('
                cat.id, 
                cat.totalAC, 
                cat.numOfProblems, 
                sub.name, 
                sub.description
        ')
            ->from('category cat')
            ->join('subjectcategories sub', 'cat.id = sub.categoryId')
            ->where('cat.parent', null);


        $criteria = isset($params['order']['criteria']) ? $params['order']['criteria'] : self::DEFAULT_ORDER_CRITERIA;
        $direction = isset($params['order']['direction']) ? $params['order']['direction'] : self::DEFAULT_ORDER_DIRECTION;

        $this->db->order_by($criteria, $direction);


        $query = $this->db->get();

        return $query->result();
    }

    public function getCategoryById($id)
    {
        if (empty($id)) {
            return null;
        }

        $this->db->select('cat.id, cat.totalAC, sub.name, sub.description')
            ->from('category cat')
            ->join('subjectcategories sub', 'cat.id = sub.categoryId', 'left')
            ->where('cat.id', $id);

        $query = $this->db->get();

        return $query->row();
    }

    public function getSubCategoryById($id)
    {
        if (empty($id)) {
            return null;
        }

        $this->db->select('cat.id, cat.totalAC, sub.name, sub.description')
            ->from('category cat')
            ->join('subjectcategories sub', 'cat.id = sub.categoryId', 'left')
            ->where('cat.parent', $id);

        $query = $this->db->get();

        return $query->result();
    }
}
