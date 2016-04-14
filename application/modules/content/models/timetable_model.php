<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timetable_model extends CI_Model
{	
    function get_timetable($week_day_id)
    {
    	$this->db->where('week_day_id',$week_day_id);
    	$query=$this->db->get('timetable');

    	return $result = $query->result();

    }
    function get_onetimetable($id)
    {
    	$this->db->where('id',$id);
    	$query=$this->db->get('timetable');

    	return $result = $query->row();

    }
}