<?php

class User_model extends CI_model
{
	
	function create($formarray)
	{
		$this->db->insert('users',$formarray);
	}

	function view()
	{
	return $users=$this->db->get('users')->result_array();
	}
}





?>