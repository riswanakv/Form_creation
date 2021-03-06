<?php

class User extends CI_Controller {

	function index(){

		$this->load->model('User_model');
		$users=$this->User_model->view();
		$data=array();
		$data['users']=$users;

		$this->load->view('list',$data);
		}


	 function create(){

		$this->load->model('User_model');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');

			if ($this->form_validation->run() == FALSE){

				$this->load->view('create');
				}
			else
				{
			     //save recod into database
					$formarray=array();
					$formarray['name']=$this->input->post('name');
					$formarray['email']=$this->input->post('email');
					$formarray['created_at']=date('Y-m-d');
					$this->User_model->create($formarray);
					$this->session->set_flashdata('success','Record added successfully');
					redirect(base_url().'index.php/user/index');	
				}
				
		}

	function edit($edit_id){

		 $this->load->model('User_model');
		 $user=$this->User_model->edit($edit_id);

		$data=array();
		$data['user']=$user;

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');

		if ($this->form_validation->run()==false) {

			$this->load->view('edit',$data);
		}
		else
		{
			$formarray=array();
			$formarray['name']=$this->input->post('name');
			$formarray['email']=$this->input->post('email');
			$res =$this->User_model->update($edit_id,$formarray);

			$this->session->set_flashdata('success','Record updated successfully');
			redirect(base_url().'index.php/user/index');
		}
		
	}

	function delete($userId){

		$this->load->model('User_model');
		$user=$this->User_model->edit($userId);
		
		if (empty($user)) {

			$this->session->set_flashdata('Failure','Record not found');
			redirect(base_url().'index.php/user/index');
		}
			$this->User_model->delete($userId);
			$this->session->set_flashdata('success','Record successfully deleted');
			redirect(base_url().'index.php/user/index');
	}

}
?>