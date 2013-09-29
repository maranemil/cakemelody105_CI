<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Category extends Model
{

	//public $tables = array();

	function Model_Category(){
		parent::Model();
	}

	function get(){
		$this->db->order_by('name ASC');
		return $this->db->get('categories');
	}

	function count_all(){
		$this->db->order_by('id DESC');
		return $this->db->get('categories');
	}	

	function update($idcat,$data){
		$this->db->where(array('id'=>$idcat));
		$this->db->update('categories',$data);
	}

	function add($data){
		$this->db->insert('categories',$data);
	}

	function getMaxId(){
		$this->db->select_max('id');
		return $this->db->get('categories');
	}

	function getbyid($idcat){
		$this->db->where(array("id"=> trim($idcat)));
		$this->db->limit(1);
		return $this->db->get('categories');

	}

}