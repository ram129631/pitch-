<?php


class Certilescores extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        
        if(isset($this->session->userdata['EmployeeID'])){
            ///echo "done";
            $this->load->view('admin/certilescore');
        }else{
            redirect('/admin', 'refresh');
        }
        
        
    }
    
    public function add_certile_score(){
        if(isset($this->session->userdata['EmployeeID'])){
            ///echo "done";
            $this->load->view('admin/add-certilescore');
        }else{
            redirect('/admin', 'refresh');
        }
    }
    
     public function add_update_certile_score(){
        if(isset($this->session->userdata['EmployeeID'])){
            $this->load->model('admin_model');
            $ages = $this->input->get('ages');
            $gender = $this->input->get('gender');
            $score = $this->input->get('score');
            $certile = $this->input->get('certile');
            $this->admin_model->insert_certile_score($ages,$gender,$score,$certile);
            $register_msg = "<div class='alert alert-warning' role='alert'>
                          <button class='close' data-dismiss='alert'></button>
                          <strong>Certile Added Successfully</strong>
                        </div>"; 
            $this->session->set_flashdata('certile_info', $register_msg);
            redirect('certile-scores');
        }else{
            redirect('/admin', 'refresh');
        }
    }
    
    public function edit_certile_score($id){
        if(isset($this->session->userdata['EmployeeID'])){
            ///echo "done";
            $data['id'] = $id;
            $this->load->view('admin/edit-certilescore',$data);
        }else{
            redirect('/admin', 'refresh');
        }
    }
    public function delete_certile_score($id){
        if(isset($this->session->userdata['EmployeeID'])){
       $this->load->model('admin_model');
        $this->admin_model->delete_certile_score($id);
        $register_msg = "<div class='alert alert-warning' role='alert'>
                      <button class='close' data-dismiss='alert'></button>
                      <strong>Certile Deleted Successfully</strong>
                    </div>"; 
        $this->session->set_flashdata('certile_info', $register_msg);
        redirect('certile-scores');
            
        }else{
            redirect('/admin', 'refresh');
        }
    }
    
    
    public function edit_update_certile_score(){
        $this->load->model('admin_model');
        
        $ages = $this->input->get('ages');
        $gender = $this->input->get('gender');
        $score = $this->input->get('score');
        $certile = $this->input->get('certile');
        $id = $this->input->get('id');
        
        $this->admin_model->update_certile_score($id,$ages,$gender,$score,$certile);
        $register_msg = "<div class='alert alert-warning' role='alert'>
                      <button class='close' data-dismiss='alert'></button>
                      <strong>Certile Updated Successfully</strong>
                    </div>"; 
        $this->session->set_flashdata('certile_info', $register_msg);
        redirect('certile-scores');
        
        
    }
}
