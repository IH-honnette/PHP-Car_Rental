<?php
class Passwordresets extends CI_Model
{

    public function insert_passwordreset($data)
    {
        return $this->db->insert('passwordresets', $data);
    }
    public function get_passwordresests($email)
    {
        return $this->db->get_where('passwordresets', array('email' => $email))->result();
    }
    //getting logged in user
    public function delete_passwordresets($email)
    {
        return $this->db->delete('passwordresets', array('email' => $email))->result();
    }
}
