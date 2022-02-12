<?php /** @noinspection PhpMissingParentConstructorInspection */
/** @noinspection AutoloadingIssuesInspection */
/** @noinspection PhpUnused */

/**
 * @property $db
 */
class Model_Video extends Model {

   public function __construct() {
	  $this->Model();
   }

   public function get() {
	  $this->db->order_by('id DESC');
	  return $this->db->get('videos');
   }

   public function count_all() {
	  $this->db->order_by('id DESC');
	  return $this->db->get('videos');
   }

   public function count_allbycat($catId) {
	  $this->db->where(array('category_id' => $catId));
	  $this->db->order_by('id DESC');
	  return $this->db->get('videos');
   }

   public function getbypagination($limit, $offset, $sort) {
	  $this->db->order_by($sort . ' DESC');
	  return $this->db->get('videos', $limit, $offset);
   }

   public function getbypaginationandcat($limit, $offset, $sort, $catId) {
	  //echo $limit."--".$offset."--".$sort."--".$catId;

	  $this->db->where(array('category_id' => $catId));
	  $this->db->order_by($sort . ' DESC');
	  $this->db->limit($limit, $offset);
	  //return $this->db->get('videos',$limit,$offset);
	  return $this->db->get('videos');
   }

   public function update($idvideo, $data) {
	  $this->db->where(array('id' => $idvideo));
	  $this->db->update('videos', $data);
   }

   public function updateTable($table, $fieldArray, $conditionArray) {
	  if (trim($table) !== '' && !empty($fieldArray) && !empty($conditionArray)) {
		 foreach ($conditionArray as $key => $value) {
             $this->db->where($key, $value);
         }
		 $this->db->limit(1);
		 $this->db->update(trim($table), $fieldArray);
		 return true;
	  }

       return false;
   }

   public function add($data) {
	  $this->db->insert('videos', $data);
   }

   public function getMaxId() {
	  $this->db->select_max('id');
	  return $this->db->get('videos');
   }

   public function delete($idval) {
	  $this->db->delete('videos', array('id' => $idval));
   }

   public function getbyid($idvideo) {
	  $this->db->where(array('id' => $idvideo));
	  return $this->db->get('videos');
   }

}

