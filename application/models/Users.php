<?php
class Users extends CI_Model
{
  public function insert_data($data)
  {
    //sql query to insert_data
    return  $this->db->insert('users', $data); //table name
  }
  public function getAll_users()
  {
    //$this->db->order_by('userId','ASC');
    return  $this->db->get('users')->result();
  }
  public function get_roles()
  {
    //$this->db->order_by('userId','ASC');
    return $this->db->get('roles')->result();
  }
  public function delete_user($id)
  {
    return $this->db->delete('users', array('userId' => $id));
  }
  public function get_user($id)
  {
    return $this->db->get_where('users', array('userId' => $id))->result();
  }

  public function update_data($id, $data)
  {
    $this->db->where('userId', $id);
    return $this->db->update('users', $data);
  }
  public function updatebyEmail($email, $data)
  {
    $this->db->where('email', $email);
    return $this->db->update('users', $data);
  }

  function canLogin($email,$password){
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $result = $this->db->get('users');
    if ($result->num_rows()>0) {
      return true;
      # code...
    }
    else{
      return false;
    }
}
}
