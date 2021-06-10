<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyApp extends CI_Controller {
	
	public function index()
	{

		$this->load->view('template/header');
		$this->load->view('template/index');//your web page goes here going to use index.php as homepage
	}

	public function signup(){
		$this->load->view('template/header');
		$this->load->view('template/signup');
	}

	public function regcar(){
		$this->load->view('template/header');
		$this->load->view('template/regcar');
	}

	public function carValidation(){
		//validation goes here
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('model','Model','required');
		$this->form_validation->set_rules('seats','Seats','required');
		$this->form_validation->set_rules('price','Hireprice','required');
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		if($this->form_validation->run())
		{
			$name = $this->input->post('name');
			$model = $this->input->post('model');
			$seats =$this->input->post('seats');
			$price = $this->input->post('price');

			$data =array('name' => $name, 'model' => $model, 'seats' =>$seats ,'price'=>$price);
			//send the data to the model and
			 $this->load->model('Cars');
			 $this->Cars->insert_data($data);
			 $this->load->view('template/index');

		}else{
			$this->load->view('template/header');
			$this->load->view('template/regcar');
		}
	
	}

	public function viewcars(){
		$this->load->model('Cars');
		 $data['cars']= $this->Cars->getAll_cars(); 

		$this->load->view('template/header');
		$this->load->view('template/viewcars');
	}

	public function checkValildation(){
		//validation goes here
		$this->form_validation->set_rules('name','Name','required|min_length[5]');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('pswd','Password','required');
		$this->form_validation->set_rules('phone','Phone','required');
		$this->form_validation->set_rules('username','Username','required|min_length[5]');
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		if($this->form_validation->run())
		{
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$phone =$this->input->post('phone');
			$pswd = $this->input->post('pswd');
			$username = $this->input->post('username');

			$data =array('name' => $name, 'email' => $email, 'phone' =>$phone ,'password'=>$pswd,'username' =>$username);
			//send the data to the model and
			 $this->load->model('Users');
			 $this->Users->insert_data($data);

		}else{
			$this->load->view('template/header');
			$this->load->view('template/signup');
		}
	
	}

	public function users(){
		$this->load->model('Users');
		 $data['users']= $this->Users->getAll_users(); 

		$this->load->view('template/header');
		$this->load->view('template/view_users',$data);
	}

	public function delete_user(){
	 $id =$this->uri->segment(3);
	$this->load->model('Users');
	if($this->Users->delete_user($id)){
		echo "<script>alert('User Deleted');window.location.href=
		'".base_url()."';</script>";
	}else{
		echo "<script>alert(' Unable to delete');window.location.href=
		'".base_url()."';</script>";
	}
	}
	public function edit_user(){
		$id =$this->uri->segment(3);
	   $this->load->model('Users');
	   $data['users']=$this->Users->get_user($id);
		 //return the form
	   $this->load->view('template/header');
	   $this->load->view('template/edit_data',$data); 
	   }
	public function edit_record(){
		$id =$this->uri->segment(3);
		$name = $this->input->post('name');
			$email = $this->input->post('email');
			$phone =$this->input->post('phone');
			$username = $this->input->post('username');
			$data =array('name' => $name, 'email' => $email, 'phone' =>$phone ,'username' =>$username);
			//send the data to the model and
			 $this->load->model('Users');
			if( $this->Users->update_data($id,$data)){
				echo "<script>alert('User Updated');window.location.href=
		'".base_url('MyApp/users')."';</script>";
			}
	}   
}
