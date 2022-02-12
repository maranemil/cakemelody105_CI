<?php /** @noinspection PhpMissingParentConstructorInspection */
/** @noinspection AutoloadingIssuesInspection */
/** @noinspection PhpUnused */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * @property $db
 */
class Model_Category extends Model
{

    //public $tables = array();

    public function __construct()
    {
        $this->Model();
    }

    public function get()
    {
        $this->db->order_by('name ASC');
        return $this->db->get('categories');
    }

    public function count_all()
    {
        $this->db->order_by('id DESC');
        return $this->db->get('categories');
    }

    public function update($idcat, $data)
    {
        $this->db->where(array('id' => $idcat));
        $this->db->update('categories', $data);
    }

    public function add($data)
    {
        $this->db->insert('categories', $data);
    }

    public function getMaxId()
    {
        $this->db->select_max('id');
        return $this->db->get('categories');
    }

    public function getbyid($idcat)
    {
        $this->db->where(array("id" => trim($idcat)));
        $this->db->limit(1);
        return $this->db->get('categories');
    }

}