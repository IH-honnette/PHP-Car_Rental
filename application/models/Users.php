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
    $this->db->order_by('userId','ASC');
    return  $this->db->get('users')->result();
  }
  // public function get_roles()
  // {
  //   //$this->db->order_by('userId','ASC');
  //   return $this->db->get('roles')->result();
  // }
  public function delete_user($id)
  {
    return $this->db->delete('users', array('userId' => $id));
  }
  public function get_user($id)
  {
    return $this->db->get_where('users', array('userId' => $id))->result();
  }

  public function updatebyEmail($email, $data)
  {
    $this->db->where('email', $email);
    return $this->db->update('users', $data);
  }

  function canLogin($email, $password)
  {
    $this->db->where('email', $email);
    $this->db->where('password', $password);
    $result = $this->db->get('users');
    if ($result->num_rows() > 0) {
      return true;
      # code...
    } else {
      return false;
    }
  }
  public function update_data($id, $data)
  {
    $this->db->where('userId', $id);
    return $this->db->update('users', $data);
  }
  function gettingUser($email)
  {
    $this->db->where('email', $email);
    return $this->db->get('users');
  }

  public function get_districts()
  {
     $this->db->order_by('districtName','ASC');
    return $this->db->get('districts')->result();
  }
  public function get_sectors()
  {
    $this->db->order_by('sectorName','ASC');
    return $this->db->get('sectors')->result();
  }
  public function retrieve_sector($districtId)
  {
    if ($districtId == "") :
      return  $this->db->get('sectors')->result();
    else :
      return $this->db->get_where('sectors', array('districtId' => $districtId));
    endif;
  }
  public function get_district($sectorId)
  {
    $sect_ql = $this->db->get_where('sectors', array('sectorId' => $sectorId));
    foreach ($sect_ql->result_array() as $row) {
      $district_Id = $row['districtId'];
    }
    return $this->db->get_where('districts', array('districtId' => $district_Id));
  }
  //getting logged in user
   public function getLoggedInUser($email)
  {
   $this->db->select('roleId,username,userId');
    $this->db->from('users');
    $this->db->where('email',$email);
    $data=$this->db->get()->result();
    return $data;
  }
}
