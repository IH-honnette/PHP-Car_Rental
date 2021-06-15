<link rel="stylesheet" href="http://localhost/PHP-Car_Rental/index.php/../css/bootstrap.min.css">
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyCars extends CI_Controller{

    public function regcar()
	{
		$this->load->view('template/header');
		$this->load->view('template/regcar');
	}

	public function hirecar()
	{	
		$this->load->model('Cars');
		$data['cars_info'] = $this->Cars->get_cars_nothired();
		$this->load->view('template/header');
		$this->load->view('template/hirecar',$data);
	}

    public function hireValidation()
	{
		//validation goes here
		$this->form_validation->set_rules('car', 'Car', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run()) {
			$car = $this->input->post('car');
			$data = array('hired' => True);
			$this->load->model('Cars');
			if ($this->Cars->update_car($car, $data)) {
				$this->session->set_flashdata('success_msg', 'Successfully hired a car');
				redirect(base_url('MyCars/hired'));
}}}

public function hired()
	{
		$this->load->view('template/header');
		$this->load->view('template/hired');
	}

	public function carValidation()
	{
		$config['upload_path'] =  FCPATH . 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = true;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		//validation goes here
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('model', 'Model', 'required');
		$this->form_validation->set_rules('seats', 'Seats', 'required');
		$this->form_validation->set_rules('price', 'Hireprice', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$carimage = 'carimage';
		if ($this->form_validation->run()) {
			if ($this->upload->do_upload($carimage)) {
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
				//  $this->set_flashdata('success_msg', 'New car successfully registered');
				redirect(base_url('MyApp/index'));
			} else {
				print_r($this->upload->display_errors());
			}
		}
	}

	public function viewcars()
	{
		$this->load->model('Cars');
		$data['cars_info'] = $this->Cars->getAll_cars();
		$this->load->view('template/header');
		$this->load->view('template/viewcars', $data);
	}

    public function edit_car()
	{
		$id = $this->uri->segment(3);
		$this->load->model('Cars');
		$data['cars'] = $this->Cars->get_car($id);
		//return the form
		$this->load->view('template/header');
		$this->load->view('template/edit_car', $data);
	}

	public function delete_car()
	{
		$id = $this->uri->segment(3);
		$this->load->model('Cars');
		if ($this->Cars->delete_cars($id)) {
			echo "<script>alert('Car Deleted');window.location.href=
				'" . base_url('MyApp/dashboard') . "';</script>";
		} else {
			echo "<script>alert(' Unable to delete');window.location.href=
				'" . base_url('MyApp/dashboard') . "';</script>";
		}
	}
    
	public function edit_car_()
	{
		$config['upload_path'] =  FCPATH . 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = true;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		//validation goes here
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('model', 'Model', 'required');
		$this->form_validation->set_rules('seats', 'Seats', 'required');
		$this->form_validation->set_rules('price', 'Hireprice', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$carimage = 'carimage';
		if ($this->form_validation->run()) {
			if ($this->upload->do_upload($carimage)) {
				$id = $this->uri->segment(3);
				$image_name = $this->upload->data();
				$name = $this->input->post('name');
				$model = $this->input->post('model');
				$seats = $this->input->post('seats');
				$price = $this->input->post('price');
				$carimage = $image_name['file_name'];

				$data = array('name' => $name, 'model' => $model, 'seats' => $seats, 'price' => $price, 'carimage' => $carimage);
				//send the data to the model and
				$this->load->model('Cars');
				$this->Cars->update_car($id, $data);
				echo "<script>alert('Car Update');window.location.href=
				'" . base_url('MyApp/dashboard') . "';</script>";
			} else {
				print_r($this->upload->display_errors());
			}
		}
	}

}