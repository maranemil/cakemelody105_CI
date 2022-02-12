<?php /** @noinspection AutoloadingIssuesInspection */
/** @noinspection PhpUnused */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * @property $db
 */
class Model_User extends Model
{

    //public $tables = array();

    public function __construct()
    {
        $this->Model();
    }

    public function get()
    {
        $this->db->order_by('id DESC');
        return $this->db->get('users');
    }

    public function count_all()
    {
        $this->db->order_by('id DESC');
        return $this->db->get('users');
    }

    public function getbypagination($limit, $offset, $sort)
    {
        $this->db->order_by($sort . ' DESC');
        return $this->db->get('users', $limit, $offset);
    }

    public function update($idvideo, $data)
    {
        $this->db->where(array('id' => $idvideo));
        $this->db->update('users', $data);
    }

    public function add($data)
    {
        $this->db->insert('users', $data);
    }

    public function getMaxId()
    {
        $this->db->select_max('id');
        return $this->db->get('users');
    }

    public function getbylogin($loguser, $logpassword)
    {
        //$this->db->select('username,password');
        $this->db->where(array("username" => trim($loguser), "password" => md5($logpassword)));
        $this->db->limit(1);
        return $this->db->get('users');

        // Alternativ classic way
        //$sSQL = 'SELECT * FROM users WHERE username = "'.trim($loguser).'" AND password = "'.md5($logpassword).'" LIMIT 1';
        //return $this->db->query($sSQL);
    }


    /*
        //get the user
            $query = $this->db->select($this->identity_column.', id, group_id')
                              ->where($this->identity_column, get_cookie('identity'))
                              ->where('remember_code', get_cookie('remember_code'))
                              ->limit(1)
                              ->get($this->tables['users']);
    */


} 