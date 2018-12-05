<?php
 
class Export_model extends CI_Model
{
	 
	 public function employeelist()
	 {
	 	$query=$this->db->select(['name','email_id','feedback1'])
	 	->from('feedback')
	 	->get();

	 	return $query->result();

	 }
}
?>