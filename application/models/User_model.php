<?php

class User_model extends CI_model
{
	
	function create($formarray){

		$this->db->insert('users',$formarray);
	}

	function view(){

		return $users=$this->db->get('users')->result_array();
	}


	function edit($edit_id){

		$this->db->where('user_id',$edit_id);
		return $user=$this->db->get('users')->row_array();
	}

	function update($user_id,$formarray){
		
		$this->db->where('user_id',$user_id);
		$this->db->update('users',$formarray);
	}

	function delete($userId){

		$this->db->where('user_id',$userId);
		$this->db->delete('users');
	}
}


?>