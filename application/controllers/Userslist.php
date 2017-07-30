<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userslist extends CI_Controller {

	/**
	 * This is TonalTest page controller.
	 * Develope on 21th July'2016 by Hemanth Kumar
	 */
	public function index($num=1)
	{
		if(isset($this->session->userdata['EmployeeID']))
		{
			$this->load->model('admin_model');
                        $this->load->library('pagination');
                        $this->load->helper('basic_helper');
                        $complaints = "select count(*) as count_val from pitch_users ";
                        $query = $this->db->query($complaints);
                        $row = $query->row();
                        $config = pag_config($row->count_val,25,site_url('userslist'));
                        $this->pagination->initialize($config);
                        $arrData['pagination_links'] =  $this->pagination->create_links();
                        if($num == 1){
                             $this->session->itr = $num;
                            $limit = "limit 0,25";
                        }else{
                            $this->session->itr = ($num*25-25)+1;
                            $num *=25;
                            $num -=25;
                            $limit = "limit $num,25";
                        }
                        $query = $this->db->query("SELECT * FROM pitch_users ORDER BY id DESC $limit");
                        $data['query'] = $query;
                        
                        $arrData['Users'] = $query->result_array();//$this->admin_model->FetchUsers();

			foreach ($arrData['Users'] as $key => &$value) {
				$intScore = $this->admin_model->FetchUserResult($value['id']);

				$value['score'] = $intScore;

				$value['certile'] = get_certile_age_gender($value['age'],$value['gender'],$intScore);//.$this->admin_model->FetchCertileWRT($intScore);
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
