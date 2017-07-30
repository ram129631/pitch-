<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {	
	/**
	 * This is Home page controller.
	 * Develope on 19th July'2016 by Hemanth Kumar
	 * Modified on 24th.
	 */ 
        public function __construct() {
            parent::__construct();
        }
        public function index()
	{
		/**
		* Checking the session and redirecting to respective pages
		*/
		if(isset($this->session->userdata['UserID']))
		{
			redirect('/welcome', 'refresh');
		}else
		{
			$arrData['Title'] = 'Pitch Discrimination ';

			$Header = $this->load->view('header', $arrData,true);

			$arrData['Header'] = $Header;

			$arrData['Footer'] = $this->load->view('footer', $arrData,true);

			$this->load->view('home', $arrData);
		}
	}

	public function logout()
	{
		//$this->session->session_destroy();

		$this->session->unset_userdata('UserID');
		
		redirect('/', 'refresh');
	}
        
        public function registerpage(){
            /**
		* Checking the session and redirecting to respective pages
		*/
		if(isset($this->session->userdata['UserID']))
		{
			redirect('/welcome', 'refresh');
		}else
		{
			$arrData['Title'] = 'Pitch Discrimination ';

			$Header = $this->load->view('header', $arrData, true);

			$arrData['Header'] = $Header;

			$arrData['Footer'] = $this->load->view('footer', $arrData, true);

			$this->load->view('home_1', $arrData);
		}
        }

        

        public function checkuser(){
           $this->load->model('register_model');
           $filename = $this->input->post('filenumber');
           $ret_val = $this->register_model->check_user($filename);
           if($ret_val == 1){
               redirect('welcome');
           }elseif($ret_val == 0){
               $file_number = $this->input->post_get('filenumber');
               $this->session->temp_filenumber = $file_number;
               redirect('home/registerpage');
           }
           
        }

        public function register()
	{
		/* Load the database model:
      	/application/models/Register.php */

    	$this->load->model('register_model');

    	$result = $this->register_model->RegisterUser();

    	if(is_integer($result))
    	{
    		 redirect('/welcome', 'refresh');
    	}else
    	{
    		$this->session->set_flashdata('Errors', array($result)); 

    		redirect('/', 'refresh');
    	}

	}
}
