<?php
/**
* This class is used to handle the customer related info.
* Develope on 19th July'2016 by Hemanth Kumar
*/
class Register_model extends CI_Model
{
	function __construct() 
  	{
    	parent::__construct();
  	}
	
	function RegisterUser()
	{
		if(sizeof($_POST) >= 2)
		{
			$arrUserData = array
			(
				'firstname'  	=> $_POST['firstname'],
				'lastname' 		=> $_POST['lastname'],
				'age'			=> $_POST['age'],
				'gender'		=> $_POST['gender'],
				'filenumber'	=> $_POST['filenumber'],
				'addeddate'		=> date('Y-m-d H:m:s'),
				'active'		=> 1,
			);

			$result = $this->db->insert('aims_users', $arrUserData);

			if($result)
			{
				$intUserID = $this->db->insert_id();

				$this->session->set_userdata("UserName", $_POST['firstname']);
				$this->session->set_userdata("LastName", $_POST['lastname']);
				$this->session->set_userdata("Gender", $_POST['gender']);
				$this->session->set_userdata("UserID", $intUserID);
				return $intUserID;
			}else
			{
				return array('OOPS...! We are not able to register you now. Please try again later.');
			}
		}
	}
        
        public function check_user($filename){
             $query = $this->db->query("select * from aims_users where filenumber='$filename'");
             if($query->num_rows() == 1){
                 $info = $query->row();
                $this->session->set_userdata("UserName", $info->firstname);
                $this->session->set_userdata("LastName", $info->lastname);
                $this->session->set_userdata("Gender", $info->gender);
                $this->session->set_userdata("UserID", $info->id);
                 return 1;
             }else if($query->num_rows() < 1){
                
                 
                 return 0;
             }
        }
}
?>