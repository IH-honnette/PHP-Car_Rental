<link rel="stylesheet" href="http://localhost/PHP-Car_Rental/index.php/../css/bootstrap.min.css">

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
		$data['roles'] = $this->Users->get_roles();
		$this->load->view('template/header');
		$this->load->view('template/signup', $data);
	}

	public function regcar()
	{
		$this->load->view('template/header');
		$this->load->view('template/regcar');
	}

	public function carValidation()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		//validation goes here
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('model', 'Model', 'required');
		$this->form_validation->set_rules('seats', 'Seats', 'required');
		$this->form_validation->set_rules('price', 'Hireprice', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run()) {
			if ($this->upload->do_upload('carimage')) {
				$image_name = $this->upload->data();
				$name = $this->input->post('name');
				$model = $this->input->post('model');
				$seats = $this->input->post('seats');
				$price = $this->input->post('price');
				$carimage = $image_name['file_name'];

				$data = array('name' => $name, 'model' => $model, 'seats' => $seats, 'price' => $price, 'carimage' => $carimage);
				//send the data to the model and
				$this->load->model('Cars');
				$this->Cars->insert_data($data);
				$this->set_flashdata('success_msg', 'New car successfully registered');
				redirect(base_url('MyApp/index'));
			} else {
				$this->set_flashdata('error_msg', 'Failed to upload image');
				$this->load->view('template/header');
				$this->load->view('template/regcar');
			}
		} else {
			$this->load->view('template/header');
			$this->load->view('template/regcar');
		}
	}

	public function viewcars()
	{
		$this->load->model('Cars');
		$data['cars'] = $this->Cars->getAll_cars();

		$this->load->view('template/header');
		$this->load->view('template/viewcars', $data);
	}

	public function isDigits(string $s, int $minDigits = 9, int $maxDigits = 14): bool
	{
		return preg_match('/^[0-9]{' . $minDigits . ',' . $maxDigits . '}\z/', $s);
	}
	public function isValidTelephoneNumber(string $telephone, int $minDigits = 9, int $maxDigits = 14): bool
	{
		if (preg_match('/^[+][0-9]/', $telephone)) { //is the first character + followed by a digit
			$count = 1;
			$telephone = str_replace(['+'], '', $telephone, $count); //remove +
		}
	}

	public function checkName($name)
	{
		if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
			$this->form_validation->set_message('checkName', 'Only letters and white space are allowed for names*.');
			return false;
		} else {
			return true;
		}
	}
	public function validateEmail()
	{
		$this->load->library('encryption');
		$this->load->library('form_validation');
		$this->form_validation->CI = &$this;
		$this->load->library('email');
		$this->load->helper(array('cookie', 'url'));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[50]|callback_check_emailexist');
		$this->form_validation->set_error_delimiters('<div class="m-2 alert-danger p-3">', '</div>');
		$this->form_validation->set_message('check_emailexist', 'No Such User Found.');
		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$this->load->model('Users');
			$expires = Date('U') + 3000;
			$emailhash = $this->encryption->encrypt($email);
			$token = bin2hex(random_bytes(20));
			$url = base_url('MyApp/newpassword?auth=' . $emailhash . '&token=' . $token);
			//SMTP & mail configuration
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'uwenayoallain@gmail.com',
				'smtp_pass' => 'Yarrisongmail.com',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1'
			);
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			//Email content
			$htmlContent = '<h1>Password Reset</h1>';
			$htmlContent .= '<p>Click on the button below to change your password</p>';
			$htmlContent .= "<a href=$url>$url</a>";
			$htmlContent .= "<p>if you don't know us,simply ignore this.</p>";
			$this->email->to('uwenayoallain@gmail.com');
			$this->email->from('carrentalapponline@gmail.com', 'Car-Rental');
			$this->email->subject('Password Reset');
			$this->email->message($htmlContent);
			//Send email
			if ($this->email->send()) {
				setcookie('expires', $expires, time() + 60 * 5);
				setcookie('token', $token, time() + 60 * 5);
				echo "<div class='mt-5 fs-4'><div class='m-5 alert-success p-5 m-auto col-lg-6'>Email sent,check your email</div><div>";
			} else {
				$this->load->view('template/passwordreset');
			}
		} else {
			$error = "<div class='alert alert-danger'>Error:No Such User Found";
			$error .= "</div><div><a href='javascript:history.go(-1)'>Back</a></div>";
			echo $error;
		}
	}

	public function checkPassword($password)
	{
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);
		if (!$uppercase || !$lowercase || !$number || !$specialChars) {
			$this->form_validation->set_message('checkPassword', 'Password should include at least one upper case letter, one number, and one special character*.');
			return false;
		} else {
			return true;
		}
	}
	public function checkEmail($email)
	{
		if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})*$/", $email)) {
			$this->form_validation->set_message('checkEmail', 'Invalid Email*');
			return false;
		} else {
			return true;
		}
	}
	function check_emailexist($email)
	{
		$this->load->model('Users');
		$query = $this->Users->gettingUser($email);
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	public function checkValildation()
	{
		//validation goes here
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[200]|callback_checkName');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[50]|is_unique[users.email]|callback_checkEmail');
		$this->form_validation->set_rules('pswd', 'Password', 'required|min_length[6]|max_length[15]|callback_checkPassword');
		$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]|max_length[14]|callback_checkPhone');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]|is_unique[users.username]|alpha_numeric');
		$this->form_validation->set_rules('roles', 'Role', 'required');
		// $this->form_validation->set_rules('username','Username','required|matches[password]');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run()) {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$pswd = $this->input->post('pswd');
			$username = $this->input->post('username');
			$role = $this->input->post('roles');
			$final_pswd = hash('SHA512', $pswd);
			$data = array('name' => $name, 'email' => $email, 'phone' => $phone, 'password' => $final_pswd, 'username' => $username, 'roleId' => $role);
			//send the data to the model and
			$this->load->model('Users');
			if ($this->Users->insert_data($data)) {
				$this->load->view('template/welcome');
			}
			// $this->load->view('template/header');
			// $this->load->view('template/view_users',$data);
			else {

				$this->load->model('Users');
				if ($this->Users->insert_data($data)) {
					$this->load->view('template/welcome');
				} else {
					$this->load->model('Users');
					$data['roles'] = $this->Users->get_roles();
					$this->load->view('template/header');
					$this->load->view('template/view_users', $data);
				}
				// $this->load->view('template/header');
				// $this->load->view('template/view_users',$data);
			}
		}
	}

	public function newpassword()
	{
		$this->load->library('encryption');
		$this->load->helper(array('cookie', 'url'));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('password-confirm', 'Password', 'required|min_length[6]|max_length[15]');
		$this->form_validation->set_error_delimiters('<div class="my-2 rounded p-2 alert-danger">', '</div>');
		if ($this->form_validation->run()) {
			$newpassword = $this->input->post('password');
			$newpassword_confirm = $this->input->post('password-confirm');
			$token = $this->input->get('token');
			$auth = $this->input->get('auth');
			$email = $this->encryption->decrypt($auth);
			if (($newpassword  == $newpassword_confirm) && ($token == get_cookie('token'))) {
				if ((Date('U') >= get_cookie('expires'))) {
					$this->load->model('Users');
					$passwordhash = hash("SHA512", $newpassword);
					$data = array('password' => $passwordhash);
					$this->Users->updatebyEmail($email, $data);
					echo "<div class='m-2 p-2 alert-success' >Success</a>";
				} else {
					$this->load->view('template/newpassword');
				}
			} else {
				$this->load->view('template/newpassword');
			}
		} else {
			$this->load->view('template/newpassword');
		}
	}



	public function users()
	{
		$this->load->model('Users');
		$data['users'] = $this->Users->getAll_users();

		$this->load->view('template/header');
		$this->load->view('template/view_users', $data);
		$this->load->view('template/footer');
	}
	public function delete_user()
	{
		$id = $this->uri->segment(3);
		$this->load->model('Users');
		if ($this->Users->delete_user($id)) {
			echo "<script>alert('User Deleted');window.location.href=
				'" . base_url() . "';</script>";
		} else {
			echo "<script>alert(' Unable to delete');window.location.href=
				'" . base_url() . "';</script>";
		}
	}

	public function login()
	{
		$this->load->view('template/header');
		$this->load->view('template/login');
	}

	public function getLoginInfo()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('pswd', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$pswd = $this->input->post('pswd');
			$hashedPassword = hash("SHA512", $pswd);
			$this->load->model("Users");
			$user = $this->Users->gettingUser($email);
			if (!$user) {
				echo "no user found";
			} else {
				foreach ($user->result() as $row) {
					$userPass = $row->password;
					if ($hashedPassword !== $userPass) {
						echo "invalid email or password";
					} else {
						$this->load->view('template/viewcars');
					}
				}
			}
		} else {
			$this->load->view('template/header');
			$this->load->view('template/login');
		}
	}
	public function edit_user()
	{
		$id = $this->uri->segment(3);
		$this->load->model('Users');
		$data['users'] = $this->Users->get_user($id);
		//return the form
		$this->load->view('template/header');
		$this->load->view('template/edit_data', $data);
	}
	public function edit_record()
	{
		$id = $this->uri->segment(3);
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$username = $this->input->post('username');
		$data = array('name' => $name, 'email' => $email, 'phone' => $phone, 'username' => $username);
		//send the data to the model and
		$this->load->model('Users');
		if ($this->Users->update_data($id, $data)) {
			echo "<script>alert('User Updated');window.location.href=
				'" . base_url('MyApp/users') . "';</script>";
		}
	}
}
