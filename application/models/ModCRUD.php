<?php
class ModCRUD extends CI_Model
{	
	public function addEmployee($data)
	{
		$employeeDetails = array(
							'emp_no'    => $data['empno'],
							'f_name'	=> $data['fname'],
							'm_name'	=> $data['mname'],
							'l_name'	=> $data['lname'],
							'email'		=> $data['email'],
							'contact'	=> $data['contactno'],
							'address'	=> $data['address']
						);
		$this->db->insert('tbl_employee', $employeeDetails);
		$insert_id = $this->db->insert_id();
		if($this->db->affected_rows() > 0)
		{
			return $insert_id; //Success 
		}
		else
		{
			return "DB0002"; //Error Code
		}
	}
	public function get_AI()
	{
		$sql = "SHOW TABLE STATUS LIKE 'tbl_employee'";
		if($query = $this->db->query($sql))
		{
			$result = $query->result_array();
			return $result[0]['Auto_increment'];
		}
	}
	
	public function getAllData()
	{
		$sql = "SELECT * FROM tbl_employee";
		if($query = $this->db->query($sql))
		{
			$result = $query->result_array();
			return $result;
		}
	}
	
	public function getIndiData($id)
	{
		$sql = "SELECT * FROM tbl_employee WHERE emp_id = '$id'";
		if($query = $this->db->query($sql))
		{
			$result = $query->result_array();
			return $result[0];
		}
	}
	
	public function deleteInfo($id)
	{
		$this->db->delete('tbl_employee', array('emp_id' => $id));  
		if($this->db->affected_rows() > 0)
		{
			return true; //Success 
		}
		else
		{
			return "DB0003"; //Error Code
		}
	}
	
	public function updateInfo($data)
	{
		$employeeDetails = array(
							'emp_no'    => $data['empno'],
							'f_name'	=> $data['fname'],
							'm_name'	=> $data['mname'],
							'l_name'	=> $data['lname'],
							'email'		=> $data['email'],
							'contact'	=> $data['contactno'],
							'address'	=> $data['address']
						);
		$this->db->where('emp_no', $data['empno']);
		$this->db->update('tbl_employee', $employeeDetails);
		if($this->db->affected_rows() > 0)
		{
			return true; //Success 
		}
		else
		{
			return "DB0001"; //Error Code
		}
	}
	
}
?>