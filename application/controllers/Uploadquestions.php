<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadquestions extends CI_Controller {

	/**
	 * This is NewExampleInfo page controller.
	 * Develope on 19th July'2016 by Hemanth Kumar
	 */
	public function index()
	{
		if(isset($this->session->userdata['EmployeeID']))
		{
			$this->load->model('admin_model');

			$arrQuestions = $this->admin_model->FetchQuestions();

			$arrData = array
			(
				'Questions' => $arrQuestions,
			);
			$this->load->view('upload_qtns', $arrData);
		}else
		{
			redirect('/admin', 'refresh');
		}
	}

	public function uploadquestion()
	{
		$this->load->model('admin_model');

		$result = $this->admin_model->UploadQuestion();

		if($result)
		{
			redirect('/uploadquestions', 'refresh');
		}else
		{
			$this->session->set_flashdata('Errors', array('Unable to upload question. Please try again later.'));

			redirect('/uploadquestions', 'refresh');
		}
	}

	function deletequestion()
	{
		$this->load->model('admin_model');

		$result = $this->admin_model->DeleteQuestion();

		if($result)
		{
			redirect('/uploadquestions', 'refresh');
		}else
		{
			$this->session->set_flashdata('Errors', array('Unable to upload question. Please try again later.'));

			redirect('/uploadquestions', 'refresh');
		}
	}

	function includeinscore()
	{
		$this->load->model('admin_model');

		$result = $this->admin_model->UpdateIncludeInScore();

		if($result)
		{
			redirect('/uploadquestions', 'refresh');
		}else
		{
			$this->session->set_flashdata('Errors', array('Unable to update question. Please try again later.'));

			redirect('/uploadquestions', 'refresh');
		}
	}
}
