<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Winnerwall extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Admin_model');
        $this->load->model('subadmin/Que_bank_model');
        $this->load->model('subadmin/Questions_model');
        $this->load->model('Admin/Your_wall_model');
        $this->load->model('Standards_Making/Standards_Making_model');
        $this->load->model('Learningscience/Learningscience_model');
        $this->load->model('Winnerwall/Winnerwall_model');
        date_default_timezone_set("Asia/Calcutta");
         
    } 
    public function index()
    {
        if ($this->Admin_model->checkAdminLogin()) {
            redirect(base_url() . "Admin/dashboard", 'refresh');
        } else {
            redirect(base_url() . "Admin/login", 'refresh');
        }
        return true;
    }

    public function winner_wall_list()
    { 
        $this->load->view('admin/headers/admin_header');
        $this->load->view('winnerwall/winner_wall_list');
        $this->load->view('admin/footers/admin_footer');
    }

    public function winner_wall_form()
    {   
        $this->load->view('admin/headers/admin_header');

        $data['prises']=$this->Winnerwall_model->prises();
        $data['competation']=$this->Winnerwall_model->published_quiz();

        if ($this->form_validation->run('winner_wall_form') == FALSE) 
        {
            $this->load->view('winnerwall/winner_wall_form',$data);
        } 
        else 
        {
            if (!file_exists('uploads/winnerwall')) { mkdir('uploads/winnerwall', 0777, true); }
            $imagesize=$_FILES['image']['size'];  
            if ($imagesize > 0 ) 
            {
                $imagepath = 'uploads/winnerwall/'; 
                $imagelocation = $imagepath . time() .'image'. $_FILES['image']['name']; 
                move_uploaded_file($_FILES['image']['tmp_name'], $imagelocation);
            }

            $formdata['quiz_id'] = $this->input->post('quiz_id');
            $formdata['quiz_date'] = $this->input->post('quiz_date');
            $formdata['prize'] = $this->input->post('prize');
            $formdata['name'] = $this->input->post('name');
            $formdata['email'] = $this->input->post('email');
            $formdata['contact_no'] = $this->input->post('contact_no');
            $formdata['location'] = $this->input->post('location');
            $formdata['image'] = $imagelocation;
            $dataadd = $this->Winnerwall_model->insertWinnerwall($formdata);

 
            if ($dataadd) {
                $data1['status'] = 1;
                $data1['message'] = 'Deleted successfully.'; 
                
            } else {
                $data1['status'] = 0;
                $data1['message'] = 'Failed to delete, Please try again.';              
            }
            echo json_encode($data1);
            exit;

        } 
        $this->load->view('admin/footers/admin_footer'); 
    }

    public function winner_wall_archive()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('winnerwall/winner_wall_archive');
        $this->load->view('admin/footers/admin_footer');
    }
}