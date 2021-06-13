<?php
class PasswordResets extends CI_Model
{
    public function insert_PasswordReset($data)
    {
        return  $this->db->insert('passwordresets', $data);
    }

    public function delete_PasswordReset($email)
    {
        return $this->db->delete('passwordresets', array('email' => $email));
    }
    public function get_PasswordReset($email)
    {
        return $this->db->get_where('passwordresets', array('email' => $email))->result();
    }
}
