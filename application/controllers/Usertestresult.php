<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usertestresult extends CI_Controller {

	/**
	 * This is NewExampleInfo page controller.
	 * Develope on 19th July'2016 by Hemanth Kumar
	 */
	public function index($num=1)
	{
		$this->load->model('admin_model');
                $this->load->library('pagination');
                $this->load->helper('basic_helper');
                $complaints = "select count(*) as count_val from pitch_users ";
                $query = $this->db->query($complaints);
                $row = $query->row();
                $config = pag_config($row->count_val,5,site_url('usertestresult'));
                $this->pagination->initialize($config);
                $arrData['pagination_links'] =  $this->pagination->create_links();
                if($num == 1){
                     $this->session->itr = $num; 
                    $limit = "limit 0,5";
                }else{
                    $this->session->itr = ($num*5-5)+1;
                    $num *=5;
                    $num -=5;
                    $limit = "limit $num,5";
                }
                
                $query = $this->db->query("SELECT * FROM pitch_users ORDER BY id DESC $limit");
                $arrUsers = $query->result_array();;
		foreach ($arrUsers as $key => &$value) {
			$value['test_result'] = $this->admin_model->_userResults($value['id']);
		}
		
		//return $arrUsers;
                
                
		$arrData['TestResults'] =  $arrUsers;//$this->admin_model->FetchTestResult();

		$arrData['Certiles'] = $this->admin_model->FetchCertile();

		$this->load->view('user_test_result', $arrData);
	}

	public function export()
	{
		$this->load->model('admin_model');

		$arrResult = $this->admin_model->FetchTestResult();

		$arrTemp = array();

		$arrHeaders = array('ID','First Name', 'Last Name', 'Age', 'Gender', 'File Number');

		foreach ($arrResult as $key => &$value) {
			$intQt = 1;
			if(count($value['test_result']) > 0)
			{
				foreach ($value['test_result'] as $key => $qt) {
					$value['Answer '.$intQt] = $qt['answer'];
					$arrHeaders[] = $intQt;
					$intQt++;
				}
			}

			$arrTempRow = $value;
			unset($arrTempRow['test_result']);
			unset($arrTempRow['active']);
			unset($arrTempRow['addeddate']);
			$arrTemp[] = $arrTempRow;
		}
		
		$maxColumns = max(array_map(function($row){
			    return count($row);
			}, $arrTemp));

		//$this->cleanArray($arrTemp);

		

		foreach ($arrTemp as &$value) {
			$intTempCount = count($value);
			if($maxColumns > $intTempCount)
			{
				for($intCtr = ($intTempCount-6); $intCtr < ($maxColumns-$intTempCount); $intCtr++)
				{
					$value['Answer '.($intCtr+1)] = ' ';
				}
			}
		}
		//print_r($arrTemp); exit;
		foreach ($arrTemp as $key => &$value) {
			$intScore = $this->admin_model->FetchUserResult($value['id']);

			$value['score'] = $intScore;

			$value['certile'] = $this->admin_model->FetchCertileWRT($intScore);
		}

		$arrHeaders[] = 'Score';
		$arrHeaders[] = 'Certile';

		$arrHeaders = array_unique($arrHeaders);
		
		// Enable to download this file
		$filename = "UsersTestResult.csv";
		 		
		header("Pragma: public");
		header("Content-Type: text/plain");
		header("Content-Disposition: attachment; filename=\"$filename\"");

		ob_clean();

		$display = fopen("php://output", 'w');

		fputcsv($display, array_values($arrHeaders), ",", '"');
		
		foreach ($arrTemp as $file) {
		    $result = [];
		    array_walk_recursive($file, function($item) use (&$result) {
		        $result[] = $item;
		    });
		    fputcsv($display, $result);
		}

		$flag = false;
		/*if(count($arrTemp)) {
		    if(!$flag) {
		      // display field/column names as first row
		      fputcsv($display, array_values($arrHeaders), ",", '"');
		      $flag = true;
		    }
		    foreach ($arrTemp as $key => $value) {
			    fputcsv($display, array_values($value), ",", '"');
			}
		  }*/
		 
		fclose($display);

	}

	function cleanArray(&$array)
	{
	    end($array);
	    $max = key($array); //Get the final key as max!
	    for($i = 0; $i < $max; $i++)
	    {
	        if(!isset($array[$i]))
	        {
	            $array[$i] = '';
	        }
	    }
	}
}
