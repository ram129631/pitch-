<?php
/**
* This class is used to handle the customer related info.
* Develope on 19th July'2016 by Hemanth Kumar
*/
class Admin_model extends CI_Model
{
	function __construct() 
  	{
    	parent::__construct();
  	}
	
	function Login()
	{
		if(sizeof($_POST) > 0)
		{
			
			$strUserName = $_POST['userame'];

			$strPassword = md5($_POST['password']);

			$strQuery = 'SELECT * FROM aims_employees WHERE username LIKE "'.$strUserName.'"';

			$objQuery = $this->db->query($strQuery);

			if($objQuery->num_rows() > 0)
			{
				$arrResult = $objQuery->result_array();

				$arrEmployee = $arrResult[0];

				if($arrEmployee['passwd'] == $strPassword && $arrEmployee['active'] == 1)
				{
					$this->session->set_userdata('EmployeeID', $arrEmployee['id']);

					$this->session->set_userdata('EmployeeFName', $arrEmployee['firstname']);

					$this->session->set_userdata('EmployeeLName', $arrEmployee['lastname']);

					return 1;
				}elseif($arrEmployee['passwd'] != $strPassword)
				{
					$this->session->set_flashdata('Errors', 'Password is not matching with the records.');
					return 0;
				}elseif($arrEmployee['active'] !== 1)
				{
					$this->session->set_flashdata('Errors', 'User is not active.');
					return 0;
				}
			}else
			{
				$this->session->set_flashdata('Errors', 'User is not registered with us. Please check username entered.');
				return 0;
			}

		}
	}

	function FetchQuestions()
	{
		$strQuery = 'SELECT * FROM aims_questions';

		$objQuery = $this->db->query($strQuery);

		if($objQuery->num_rows())
		{
			return $objQuery->result_array();
		}else
		{
			return array();
		}
	}

	function UploadQuestion()
	{
		if(sizeof($_POST))
		{
			$strQuestionCode = $_POST['questioncode'];

			//$strOptionsCount = $_POST['optionscount'];

			//$strQuestionLevel = $_POST['questionlevel'];

			//$strOptionColor = $_POST['optioncolor'];

			$target_file1 = false;

			$strNewFileName = false;

			if($strQuestionCode)
			{
				$fileName = '';

				if($_FILES && $_POST['id'] == -1)
				{
					$target_dir = "uploads/";

			        $path = $target_dir.date('Ymd');
			        
			        if(!file_exists($path)) 
			        {
			        	$oldmask = umask(0);
			        	mkdir($path, 0777);
			        	umask($oldmask);
			        }

			        $fileInfo = pathinfo($_FILES["audioname"]["name"]);
			        
			        $strNewFileName = date('YmdHis').'.'.$fileInfo['extension'];
					
					$target_file = $path ."/". basename($_FILES["audioname"]["name"]);
				
			        $target_file1 = $path."/".$strNewFileName;
				
					if(!move_uploaded_file($_FILES["audioname"]["tmp_name"], $target_file1))
			        {
			    		return 0;
			        }
				}

				if($_POST['id'] == -1)
				{
					$arrData = array(
						'questioncode'  => $strQuestionCode, 
						//'optionscount'  => $strOptionsCount,
						//'optioncolor' 	=> $strOptionColor,
						//'questionlevel' => $strQuestionLevel,
						'addeddate'	    => date('Y-m-d H:m:s'),
						'audiopath'		=> $target_file1,
						'audiofilename' => $strNewFileName,
						'answer' 		=> $_POST['answer']
					);
				}else
				{
					$arrData = array(
						'questioncode'  => $strQuestionCode, 
						//'optionscount'  => $strOptionsCount,
						//'optioncolor' 	=> $strOptionColor,
						//'questionlevel' => $strQuestionLevel,
						'answer' 		=> $_POST['answer']
					);
				}

				if($_POST['id'] == -1)
				{
					$result = $this->db->insert('aims_questions', $arrData);
				}
				else
				{
					$this->db->where('id', $_POST['id']);

					$result = $this->db->update('aims_questions', $arrData);
				}

				if($result)
				{
					return $result;
				}else
				{
					return 0;
				}
			}
		}
	}

	function FetchUsers()
	{
		$strQuery = 'SELECT * FROM aims_users ORDER BY id DESC';

		$objQuery = $this->db->query($strQuery);

		return $objQuery->result_array();
	}

	function FetchUserResult($id_user)
	{
		$arrTemp = $this->_userResults($id_user);

		$intCounter = 0;

		foreach ($arrTemp as $key => $value) {
			if($value['includeinscoring'] && ($value['optionid'] == $value['answer']))
			{
				$intCounter = $intCounter + 1;
			}
		}

		return $intCounter;
	}

	function FetchCertile()
	{
		$strQuery = 'SELECT * FROM aims_certile ORDER BY id DESC';

		$objQuery = $this->db->query($strQuery);

		return $objQuery->result_array();
	}

	function FetchCertileWRT($p_intScore)
	{
		$strQuery = 'SELECT certile FROM aims_certile WHERE score = '.$p_intScore;

		$objQuery = $this->db->query($strQuery);

		if($objQuery->num_rows())
		{
			$temp = $objQuery->row_array();

			return $temp['certile'];
		}else
		{
			return 0;
		}

		return $objQuery->result_array();
	}

	function FetchFilteredUsers()
	{
		$search_query = $_GET['search_query'];

		$arrTemp = explode("-", $search_query);

		if(count($arrTemp) == 3)
		{
			if($arrTemp[0] == 1)
				$strGender = "female";
			else
				$strGender = "male";

			$strQuery = $this->db->get_where('aims_users',array('gender ='=>$strGender, 'age >= ' => $arrTemp[1], 'age <= ' => $arrTemp[2]));

			if($strQuery->num_rows())
			{
				return $strQuery->result_array();
			}else
			{
				return array();
			}


		}elseif(count($arrTemp) == 2)
		{
			if($arrTemp[0] == 1)
				$strGender = "female";
			else
				$strGender = "male";

			$strQuery = $this->db->get_where('aims_users',array('age >= ' => $arrTemp[0], 'age <= ' => $arrTemp[1]));

			if($strQuery->num_rows())
			{
				return $strQuery->result_array();
			}else
			{
				return array();
			}
		}

		/*elseif(count($arrTemp) == 1)
		{
			if($arrTemp[0] == 1)
				$strGender = "female";
			else
				$strGender = "male";

			$strQuery = $this->db->get_where('aims_users',array('gender ='=>'$strGender'));

			if($strQuery->num_rows())
			{
				return $strQuery->result_array();
			}else
			{
				return array();
			}
		}*/

	}

	function _userResults($id_user)
	{
		
		$strQuery = 'SELECT ua.`questionid`, ua.`optionid`, q.`answer`, q.includeinscoring FROM aims_user_answers ua INNER JOIN aims_questions q ON q.id = ua.`questionid` WHERE userid = '.$id_user;

		$objQuery = $this->db->query($strQuery);

		if($objQuery->num_rows() > 0)
		{
			return $objQuery->result_array();
		}else
		{
			return array();
		}
	}

	function FetchTestResult()
	{
		$arrUsers = $this->FetchUsers();
		foreach ($arrUsers as $key => &$value) {
			$value['test_result'] = $this->_userResults($value['id']);
		}
		
		return $arrUsers;
	}

	function DeleteQuestion()
	{
		$id = $_POST['questionid'];

		$status = $_POST['active'];

		if($id)
		{
			$arrData = array(
                'active' => $status
            );

	 		$this->db->where('id', $id);

			$this->db->update('aims_questions', $arrData);
		}else
		{
			return false;
		}
	}

	function UpdateIncludeInScore()
	{
		$id = $_POST['questionid'];

		$status = $_POST['includeinscore'];

		if($id)
		{
			$arrData = array(
                'includeinscoring' => $status
            );

	 		$this->db->where('id', $id);

			$this->db->update('aims_questions', $arrData);
		}else
		{
			return false;
		}
	}
        
        
        public function update_certile_score($id,$ages,$gender,$score,$certile){
            
            $this->db->query("update aims_certilescore set ages='$ages',gender='$gender',score='$score',certile='$certile' where id=$id");
            
        }
        
        public function delete_certile_score($id){
            $this->db->query("delete from aims_certilescore where id=$id");
        }
        
        public function insert_certile_score($ages,$gender,$score,$certile){
            $this->db->query("insert into aims_certilescore(ages,gender,score,certile) values('$ages','$gender','$score','$certile')");
        }
}
?>