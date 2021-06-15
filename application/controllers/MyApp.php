<link rel="stylesheet" href="http://localhost/PHP-Car_Rental/index.php/../css/bootstrap.min.css">
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyApp extends CI_Controller
{
	public function index()
	{
		$this->load->view('template/header2');
		$this->load->view('template/index'); //your web page goes here going to use index.php as homepage
	}
	public function passwordreset()
	{
		$this->load->view('template/passwordreset');
	}

	public function check_emailexist($email)
	{
		$this->load->model('Users');
		$query = $this->Users->gettingUser($email);
		if ($query->num_rows()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function validateEmail()
	{
		$this->load->library('encryption');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper(array('cookie', 'url'));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[50]|callback_check_emailexist');
		$this->form_validation->set_message('check_emailexist', 'No User found with that %s.');
		$this->form_validation->set_error_delimiters('<div class="my-2 rounded p-2 alert-danger">', '</div>');
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
			$this->email->to($email);
			$this->email->from('carrentalapponline@gmail.com', 'Car-Rental');
			$this->email->subject('Password Reset');
			$this->email->message($htmlContent);
			//Send email
			if ($this->email->send()) {
				setcookie('expires', $expires, time() + 60 * 5);
				setcookie('token', $token, time() + 60 * 5);
				echo "<div class='mt-5 fs-4'><div class='m-5 alert-success p-3 m-auto col-lg-6'>Email sent,check your email</div><div>";
			} else {
				echo "Error";
			}
		} else {
			$this->load->view('template/passwordreset');
		}
	}

	public function newpassword()
	{
		$this->load->library('encryption');
		$this->load->helper(array('cookie', 'url'));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[25]');
		$this->form_validation->set_rules('password-confirm', 'Password', 'required|min_length[6]|max_length[25]');
		$this->form_validation->set_error_delimiters('<div class="my-2 rounded p-2 alert-danger">', '</div>');
		if ($this->form_validation->run()) {
			$newpassword = $this->input->post('password');
			$newpassword_confirm = $this->input->post('password-confirm');
			$token = $this->input->get('token');
			$auth = $this->input->get('auth');
			$email = $this->encryption->decrypt($auth);
			if (($newpassword  == $newpassword_confirm)) {
				$tokencookie = get_cookie('token');
				if ($token == $tokencookie) {
					$currentTime = Date('U');
					$expirescookie = get_cookie('expires');
					if (($currentTime < $expirescookie)) {
						$this->load->model('Users');
						$passwordhash = hash("SHA512", $newpassword);
						$data = array('password' => $passwordhash);
						$this->Users->updatebyEmail($email, $data);
						$this->load->view('template/header');
						$this->load->view('template/login');
					} else {
						echo "<div class='m-2 p-2 alert-danger'>Token Expired!</div>";
						$this->load->view('template/newpassword');
					}
				} else {
					echo "<div class='m-2 p-2 alert-danger' >Failed:Token Not Found!</div>";
					$this->load->view('template/newpassword');
				}
			} else {
				echo "<div class='m-2 p-2 alert-danger' >Password Not Match</div>";
				$this->load->view('template/newpassword');
			}
		} else {
			$this->load->view('template/newpassword');
		}
	}


	public function login()
	{
		$this->load->view('template/header2');
		$this->load->view('template/login');
	}
	public function dashboard()
	{
		$this->load->model('Cars');
		$data['cars'] = $this->Cars->getAll_cars();
		$this->load->view('template/header');
		$this->load->view('template/dashboard', $data);
	}

	public function getLoginInfo()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('pswd', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$password = hash('sha512', $this->input->post('pswd'));
			$this->load->model('Users');
			if ($this->Users->canLogin($email, $password)) {
				//getting logged in user;
				$this->load->model('Users');
				$roleId=$this->Users->getLoggedInUser($email);
				$session_data = array(
					'roleId' =>$roleId,
					'email' =>$email
				);
				$this->session->set_userdata($session_data);
				redirect(base_url('/MyApp/dashboard'));
			}
			$this->load->view('template/header');
			$error = "invalid email or password";
			$this->load->view('template/login', compact('error'));
		} else {
			$this->load->view('template/header');
			$this->load->view('template/login');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		redirect(base_url('MyApp/login'));
	}

		public function get_pdf(){
		$this->load->model('Users'); 
		$data= $this->Users->getAll_users();
		$this->load->library('fpdf183/fpdf');
		ob_start();
		$this->fpdf = new fpdf('P', 'mm', 'A4');
		$this->fpdf->SetTitle('List Of All Users');
		$this->fpdf->SetMargins(22, 10, 1);
		$this->fpdf->AddPage();
		$this->fpdf->SetFont('Arial','B', 15);
		$this->fpdf->Cell(70, 10,"Names",1);
		$this->fpdf->Cell(60, 10,"Email", 1);
		$this->fpdf->Cell(40, 10,"Phone",1);
		$this->fpdf->Ln();
		foreach($data as $user){
			$this->fpdf->SetFont('Arial','',12);
			
			$this->fpdf->Cell(70, 10,$user->name,1);
			$this->fpdf->Cell(60, 10,$user->email, 1);
			$this->fpdf->Cell(40, 10,$user->phone,1);
			$this->fpdf->Ln();
			ob_clean();
		}
		$this->fpdf->Output();
	}
}
