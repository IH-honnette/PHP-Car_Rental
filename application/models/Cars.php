<?php
class Cars extends CI_Model{
    public function insert_data($data){
//sql query to insert_data
      return  $this->db->insert('cars',$data);//table name
    }

    public function getAll_cars(){
        //$this->db->order_by('carId','ASC');
      return  $this->db->get('cars')->result();
    }
    public function delete_cars($id){
        return $this->db->delete('cars',array('carId' => $id)); 
    }
    public function get_car($id){
       return $this->db->get_where('cars',array('carId' => $id))->result();
    }

    public function update_car($id,$data){
        $this->db->where('carId',$id);
        return $this->db->update('cars',$data);
    }
}



?>