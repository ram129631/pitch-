<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestUpload extends CI_Controller {

	/**
	 * This is NewExampleInfo page controller.
	 * Develope on 19th July'2016 by Hemanth Kumar
	 */
	public function index()
	{
		$this->load->view('test_upload');
	}
}
