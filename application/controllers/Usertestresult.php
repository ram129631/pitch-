<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usertestresult extends CI_Controller {

	/**
	 * This is NewExampleInfo page controller.
	 * Develope on 19th July'2016 by Hemanth Kumar
	 */
	public function index()
	{
		$this->load->model('admin_model');

		$arrData['TestResults'] = $this->admin_model->FetchTestResult();

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
