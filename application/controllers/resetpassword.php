<link rel="stylesheet" href="http://localhost/PHP-Car_Rental/index.php/../css/bootstrap.min.css">

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class resetpassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Passwordresets');
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
            $this->load->model('Passwordresets');
            $expires = Date('U') + 3000;
            $emailhash = $this->encryption->encrypt($email);
            $token = bin2hex(random_bytes(20));
            $url = base_url('resetpassword/newpassword?auth=' . $emailhash . '&token=' . $token);
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
                $this->load->model('Passwordresets');
                // $checkresets = $this->Passwordresets->get_passwordresests($email);
                // if ($checkresets) {
                //     foreach ($checkresets as $prevresets) {
                //         $this->Passwordresets->delete_passwordresets($prevresets->email);
                //     }
                // }
                $data = array('email' => $email, 'token' => $token, 'expires' => $expires);
                $this->Passwordresets->insert_passwordreset($data);
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
                $this->load->model('Passwordresets');
                $data = $this->Passwordresets->get_passwordresests($email);
                foreach ($data as $row) {
                    $userToken = $row->token;
                    $expires = $row->expires;
                    // echo $expires;
                    // echo $userToken;
                }
                if ($token == $userToken) {
                    $currentTime = Date('U');
                    if (($currentTime < $expires)) {
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
}

?>