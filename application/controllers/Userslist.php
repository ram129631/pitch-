<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userslist extends CI_Controller {

	/**
	 * This is TonalTest page controller.
	 * Develope on 21th July'2016 by Hemanth Kumar
	 */
	public function index()
	{
		if(isset($this->session->userdata['EmployeeID']))
		{
			$this->load->model('admin_model');

			$arrData['Users'] = $this->admin_model->FetchUsers();

			foreach ($arrData['Users'] as $key => &$value) {
				$intScore = $this->admin_model->FetchUserResult($value['id']);

				$value['score'] = $intScore;

				$value['certile'] = $this->admin_model->FetchCertileWRT($intScore);
			}

			$this->load->view('userslist', $arrData);
		}else
		{
			redirect('/admin', 'refresh');
		}

	}

	public function getusers()
	{
		$search_query = $_GET['search_query'];

		$this->load->model('admin_model');

		$arrData['Users'] = $this->admin_model->FetchFilteredUsers();
		
		foreach ($arrData['Users'] as $key => &$value) {
			$intScore = $this->admin_model->FetchUserResult($value['id']);

			$value['score'] = $intScore;

			$value['certile'] = $this->admin_model->FetchCertileWRT($intScore);
		}

		echo json_encode(array('Users' => $arrData['Users']));
	}

	public function export()
	{
		$this->load->model('admin_model');

		$arrData['Users'] = $this->admin_model->FetchUsers();

		foreach ($arrData['Users'] as $key => &$value) {
			$intScore = $this->admin_model->FetchUserResult($value['id']);

			$value['score'] = $intScore;

			$value['certile'] = $this->admin_model->FetchCertileWRT($intScore);
		}

		// Enable to download this file
		$filename = "UsersList.csv";
		 
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Content-Type: text/csv");
		 
		$display = fopen("php://output", 'w');
		 
		$arrHeaders = array('ID', 'First Name', 'Last Name', 'Age', 'Gender', 'File Number', 'Created Date', 'Active', 'Score', 'Certile');
		$flag = false;
		if(count($arrData['Users'])) {
		    if(!$flag) {
		      // display field/column names as first row
		      fputcsv($display, array_values($arrHeaders), ",", '"');
		      $flag = true;
		    }
		    foreach ($arrData['Users'] as $key => $value) {
			    fputcsv($display, array_values($value), ",", '"');
			}
		  }
		 
		fclose($display);
	}
}
