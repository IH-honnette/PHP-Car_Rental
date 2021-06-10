<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
    protected $CI;
    function __construct()
    {
        parent::__construct();

        $this->CI = &get_instance();
    }
    function check_emailexist($email)
    {
        $this->load->model('Users');
        $query = $this->Users->gettingUser($email);
        $this->form_validation->set_message('check_emailexist', 'There  %s is no user with');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
