<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller 
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model("ModCRUD");
		$allData = $this->ModCRUD->getAllData();
		
		$data['emplist'] = $allData;
		$data['show_error'] = false;
		if($this->session->flashdata("show_error") !== null)
			$data['show_error'] = $this->session->flashdata("show_error");
		
		$this->load->view('pages/templates/header');
		$this->load->view('pages/employeelist', $data);
		$this->load->view('pages/templates/footer');
	}

	public function addEmployee()
	{
		$this->load->model("ModCRUD");
		$AI = $this->ModCRUD->get_AI();
		
		$data['tblAI'] = $AI;
		$data['show_error'] = false;
		if($this->session->flashdata("show_error") !== null)
			$data['show_error'] = $this->session->flashdata("show_error");
		
		$this->load->view('pages/templates/header');
		$this->load->view('pages/newemployee', $data);
		$this->load->view('pages/templates/footer');	
	}
	
	public function saveEmployee()
	{
		$this->load->model("ModCRUD");
		$emmpno   = $this->input->post('txtempno');
		$fname    = $this->input->post('txtfname');
		$mname    = $this->input->post('txtmname');
		$lname    = $this->input->post('txtlname');
		$address  = $this->input->post('txtaddress');
		$email    = $this->input->post('txtemail');
		$contact  = $this->input->post('txtcontact');
		
		$dataArr = array(
							'empno' 	=> $emmpno, 
							'fname' 	=> $fname, 
							'mname' 	=> $mname, 
							'lname' 	=> $lname, 
							'email' 	=> $email, 
							'contactno' => $contact, 
							'address' 	=> $address
						);
		$ret = $this->ModCRUD->addEmployee($dataArr);
		$errorVal = "";
		if(is_numeric($ret))
		{
			$errorVal = "EMP0001";
		}
		else if(is_string($ret))
		{
			$errorVal = $ret;
		}
		
		$this->session->set_flashdata("show_error", $errorVal);
		redirect('MainController/addEmployee');
	}
	
	public function getIndiData()
	{
		$id = $this->input->post('id');
		$this->load->model("ModCRUD");
		$ret = $this->ModCRUD->getIndiData($id);
		echo json_encode($ret);
	}
	
	public function updateAjax()
	{
		$id = $this->input->post('id');
		$this->load->model("ModCRUD");
		$ret = $this->ModCRUD->getIndiData($id);
		$data['info'] = $ret;
		$this->load->view('pages/updateajax', $data);
	}
	
	public function updateEmp()
	{
		$this->load->model("ModCRUD");
		$emmpno   = $this->input->post('txtempno');
		$fname    = $this->input->post('txtfname');
		$mname    = $this->input->post('txtmname');
		$lname    = $this->input->post('txtlname');
		$address  = $this->input->post('txtaddress');
		$email    = $this->input->post('txtemail');
		$contact  = $this->input->post('txtcontact');
		
		$dataArr = array(
							'empno' 	=> $emmpno, 
							'fname' 	=> $fname, 
							'mname' 	=> $mname, 
							'lname' 	=> $lname, 
							'email' 	=> $email, 
							'contactno' => $contact, 
							'address' 	=> $address
						);
		$ret = $this->ModCRUD->updateInfo($dataArr);
		$errorVal = "";
		if($ret)
		{
			$errorVal = "UPT0001";
		}
		else if(is_string($ret))
		{
			$errorVal = $ret;
		}
		
		$this->session->set_flashdata("show_error", $errorVal);
		redirect('MainController/index');
	}
	
	public function deleteInfo($id)
	{
		$this->load->model("ModCRUD");
		$delete_part = $this->ModCRUD->deleteInfo($id);
		if($delete_part)
		{
			$this->session->set_flashdata('show_error', 'DEL0001');
		}
		else
		{
			$this->session->set_flashdata('show_error', $delete_part);	
		}
		redirect('MainController/index');
	}
	
	
}
?>