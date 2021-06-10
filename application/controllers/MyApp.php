<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyApp extends CI_Controller
{

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/index'); //your web page goes here going to use index.php as homepage
	}

	public function passwordreset()
	{
		$this->load->view('template/passwordreset');
	}

	public function signup()
	{
		$this->load->model('Users');
		$data['roles']= $this->Users->get_roles(); 
		$this->load->view('template/header');
		$this->load->view('template/signup',$data);
	}

	public function regcar()
	{
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
			redirect(base_url('MyApp/index'));

		}else{
			$this->load->view('template/header');
			$this->load->view('template/regcar');
		}
	}

	public function viewcars(){
		$this->load->model('Cars');
		 $data['cars']= $this->Cars->getAll_cars(); 

		$this->load->view('template/header');
		$this->load->view('template/viewcars',$data);
	}

		public function isDigits(string $s, int $minDigits = 9, int $maxDigits = 14): bool {
				return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $s);
			}
		public function isValidTelephoneNumber(string $telephone, int $minDigits = 9, int $maxDigits = 14): bool {
				if (preg_match('/^[+][0-9]/', $telephone)) { //is the first character + followed by a digit
					$count = 1;
					$telephone = str_replace(['+'], '', $telephone, $count); //remove +
				}
				$telephone = str_replace([' ', '.', '-', '(', ')'], '', $telephone); 
				return $this->isDigits($telephone, $minDigits, $maxDigits); 
			}
		public	function normalizeTelephoneNumber(string $telephone): string {
				$telephone = str_replace([' ', '.', '-', '(', ')'], '', $telephone);
				return $telephone;
		}
		public function checkName($name){
			if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
				$this->form_validation->set_message('checkName','Only letters and white space are allowed for names*.');
				return false;
			}else{
				return true;
			}
		}
		public function checkPhone($phone){
			if(!$this->isValidTelephoneNumber($this->normalizeTelephoneNumber($phone))){
				$this->form_validation->set_message('checkPhone','Invalid Phone Number*.');
				return false;
			}else{
				return true;
			}
		}

		public function checkPassword($password){
			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number    = preg_match('@[0-9]@', $password);
			$specialChars = preg_match('@[^\w]@', $password); 
			if(!$uppercase || !$lowercase || !$number || !$specialChars){
				$this->form_validation->set_message('checkPassword','Password should include at least one upper case letter, one number, and one special character*.');
				return false;
			}else{
				return true;
			}	
		}
			public function checkEmail($email){
			if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})*$/",$email)){
				$this->form_validation->set_message('checkEmail','Invalid Email*');
				return false;
			}else{
				return true;
			}
			}

			public function checkValildation(){
				//validation goes here
				$this->form_validation->set_rules('name','Name','required|min_length[5]|max_length[200]|callback_checkName');
				$this->form_validation->set_rules('email','Email','required|valid_email|max_length[20]|is_unique[users.email]|callback_checkEmail');
				$this->form_validation->set_rules('pswd','Password','required|min_length[6]|max_length[15]|callback_checkPassword');
				$this->form_validation->set_rules('phone','Phone','required|min_length[10]|max_length[14]|callback_checkPhone');
				$this->form_validation->set_rules('username','Username','required|min_length[5]|max_length[15]|is_unique[users.username]|alpha_numeric');
				$this->form_validation->set_rules('roles','Role','required');
				// $this->form_validation->set_rules('username','Username','required|matches[password]');
				$this->form_validation->set_error_delimiters('<div class="error">','</div>');
				if($this->form_validation->run())
				{
					$name = $this->input->post('name');
					$email = $this->input->post('email');
					$phone =$this->input->post('phone');
					$pswd = $this->input->post('pswd');
					$username = $this->input->post('username');
					$role = $this->input->post('roles');
					$final_pswd =hash('SHA512',$pswd);
					$data =array('name' => $name, 'email' => $email, 'phone' =>$phone ,'password'=>$final_pswd,'username' =>$username,'roleId' =>$role);
					//send the data to the model and
					$this->load->model('Users');
					if($this->Users->insert_data($data)){
						$this->load->view('template/welcome');
					}
				// $this->load->view('template/header');
				// $this->load->view('template/view_users',$data);
			}else{
			$this->load->model('Users');
			$data['roles']= $this->Users->get_roles(); 
			$this->load->view('template/header');
			$this->load->view('template/signup',$data);
			}
		} 

		public function users(){
			$this->load->model('Users');
			$data['users']= $this->Users->getAll_users(); 

			$this->load->view('template/header');
			$this->load->view('template/view_users',$data);
			$this->load->view('template/footer');
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
	 
public function login(){
	$this->load->view('template/header');
	$this->load->view('template/login');
}
public function getLoginInfo(){
	$this->form_validation->set_rules('email','Email','required');
	$this->form_validation->set_rules('pswd','Password','required');
	$this->form_validation->set_error_delimiters('<div class="error">','</div>');
	if($this->form_validation->run())
		{
			$email = $this->input->post('email');
			$pswd = $this->input->post('pswd');
			$hashedPassword=hash("SHA512",$pswd);
			$this->load->model("Users");
		    $user=$data['users']=$this->Users->gettingUser($email);
			if(!$user){
				echo "invalid email or password";
			}
			else{
				foreach ($user->result() as $row) {
				$userPass = $row->password;
				if($hashedPassword!==$userPass){
					echo "invalid email or password";
				}
				else{
					echo "logged in successfully";
				}
	}
			}

}
else{
$this->load->view('template/header');
$this->load->view('template/login');
}
}

}
