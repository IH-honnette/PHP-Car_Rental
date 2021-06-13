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
    return $this->db->get('roles')->result();
  }
  public function get_districts(){
    return $this->db->get('districts')->result();
  }
  public function get_sectors(){
    return $this->db->get('sectors')->result();
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
  public function gettingUser($email)
  {
    return $this->db->get_where('users', array('email' => $email));
  }

 public function retrieve_sector($districtId){
    if($districtId == ""): 
     return  $this->db->get('sectors')->result();
    else: 
      return $this->db->get_where('sectors', array('districtId' =>$districtId));
  endif;
 }
 public function get_district($sectorId){
        $sect_ql =$this->db->get_where('sectors', array('sectorId' =>$sectorId));
        foreach($sect_ql->result_array() as $row){
          $district_Id =$row['districtId'];
        }
        return $this->db->get_where('districts', array('districtId' =>$district_Id));
 }
}

