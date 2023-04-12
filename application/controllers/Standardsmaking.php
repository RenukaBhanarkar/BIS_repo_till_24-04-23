<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Standardsmaking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Admin_model');
        $this->load->model('subadmin/Que_bank_model');
        $this->load->model('subadmin/Questions_model');
        $this->load->model('Admin/Your_wall_model');
        $this->load->model('Standards_Making/Standards_Making_model');
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
  
     
    public function conversation_list()
    {
        $Conversation = $this->Standards_Making_model->getConversationAll();
        $data = array();
        $data['Conversation'] = $Conversation;

        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/conversation_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function conversation_form()
    {  
        $this->load->view('admin/headers/admin_header'); 
        if ($this->form_validation->run('conversation_form') == FALSE) 
        {
            $this->load->view('Standardsmaking/conversation_form');
        } 
        else 
        {
            if (!file_exists('uploads/conversation_form/video')) 
            {
                mkdir('uploads/conversation_form/video', 0777, true);
            }
            if (!file_exists('uploads/conversation_form/video_thumbnail')) 
            {
                mkdir('uploads/conversation_form/video_thumbnail', 0777, true);
            }

            $videopath = 'uploads/conversation_form/video/'; 
            $videolocation = $videopath . time() .'video'. $_FILES['video']['name']; 
            move_uploaded_file($_FILES['video']['tmp_name'], $videolocation);

            $thumbnailpath = 'uploads/conversation_form/video_thumbnail/'; 
            $thumbnaillocation = $thumbnailpath . time() .'video_thumbnail'. $_FILES['video_thumbnail']['name']; 
            move_uploaded_file($_FILES['video_thumbnail']['tmp_name'], $thumbnaillocation);

            $formdata = array(); 
            $formdata['title'] = $this->input->post('title');
            $formdata['description'] = $this->input->post('description'); 
            $formdata['video_thumbnail'] =$thumbnaillocation; 
            $formdata['video'] = $videolocation;
            $formdata['created_on'] = date('Y-m-d'); 
            $id = $this->Standards_Making_model->conversationForm($formdata);
            if ($id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new admin,Please try again", "DD"));
                redirect(base_url() . "Standardsmaking/conversation_form", 'refresh');
            }
        }
        
        $this->load->view('admin/footers/admin_footer');
    } 

    public function conversation_archives()
    {
        $Conversation = $this->Standards_Making_model->getConversationArchives();
        $data = array();
        $data['Conversation'] = $Conversation;

        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/conversation_archives',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function conversation_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/conversation_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }

    

    public function conversation_view($id)
    {
        
        $data=array();
        $conversation = $this->Standards_Making_model->conversationView($id);
        $conversationdata=array();
        $data['conversationdata']=$conversation; 
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/conversation_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }


     public function conversation_edit($id)
    {
        $data=array();
        $conversation = $this->Standards_Making_model->getConversation($id);
        $conversationdata=array();
        $data['conversationdata']=$conversation;  

        $this->load->view('admin/headers/admin_header');

        if ($this->form_validation->run('conversation_form') == FALSE) 
        { 
             $this->load->view('Standardsmaking/conversation_edit',$data);
        } 
        else 
        {
            $videosize=$_FILES['video']['size'];
            $video_thumbnailsize=$_FILES['video_thumbnail']['size']; 
            if ($videosize > 0 ) 
            {
                $videopath = 'uploads/conversation_form/video/'; 
                $videolocation = $videopath . time() .'video'. $_FILES['video']['name']; 
                move_uploaded_file($_FILES['video']['tmp_name'], $videolocation);
            }
            else
            {
                $videolocation=$this->input->post('lastvideo');
            }
            if ($video_thumbnailsize > 0 ) 
            {
                $thumbnailpath = 'uploads/conversation_form/video_thumbnail/'; 
                $thumbnaillocation = $thumbnailpath . time() .'video_thumbnail'. $_FILES['video_thumbnail']['name']; 
                move_uploaded_file($_FILES['video_thumbnail']['tmp_name'], $thumbnaillocation);
            }
            else
            {
                $thumbnaillocation=$this->input->post('lastthumbnail');
            }
            $formdata = array(); 
            $formdata['title'] = $this->input->post('title');
            $formdata['description'] = $this->input->post('description'); 
            $formdata['video_thumbnail'] =$thumbnaillocation; 
            $formdata['video'] = $videolocation;
            $formdata['created_on'] = date('Y-m-d'); 
            $formdata['status'] = 1; 
            $id = $this->Standards_Making_model->updateConversation($id,$formdata);
            if ($id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
                redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new admin,Please try again", "DD"));
                redirect(base_url() . "Standardsmaking/conversation_form", 'refresh');
            }
        }
       
        $this->load->view('admin/footers/admin_footer');
    }

    public function conversation_delete($id)
    {
        $id = $this->Standards_Making_model->deleteConversation($id);
        if ($id)
        {
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));
            redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
        }
        else
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Delete,Please try again", "DD"));
            redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
        } 
    }

public function publish($id)
    {
        $formdata=array();
        $formdata['status']=5;
        $id = $this->Standards_Making_model->ChangeStatusConversation($id,$formdata);
        if ($id)
        {
            $this->session->set_flashdata('MSG', ShowAlert("Publish Successfully", "SS"));
            redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
        }
        else
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Publish,Please try again", "DD"));
            redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
        } 
    }
    public function unpublish($id)
    {
        $formdata=array();
        $formdata['status']=6;
        $id = $this->Standards_Making_model->ChangeStatusConversation($id,$formdata);
        if ($id)
        {
            $this->session->set_flashdata('MSG', ShowAlert("UnPublish Successfully", "SS"));
            redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
        }
        else
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to UnPublish,Please try again", "DD"));
            redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
        } 
    }

    public function restore($id)
    {
        $formdata=array();
        $formdata['status']=1;
        $id = $this->Standards_Making_model->ChangeStatusConversation($id,$formdata);
        if ($id)
        {
            $this->session->set_flashdata('MSG', ShowAlert("Restore  Successfully", "SS"));
            redirect(base_url() . "Standardsmaking/conversation_Archives", 'refresh');
        }
        else
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Restore,Please try again", "DD"));
            redirect(base_url() . "Standardsmaking/conversation_Archives", 'refresh');
        } 
    }

    public function archives($id)
    {
        $formdata=array();
        $formdata['status']=9;
        $id = $this->Standards_Making_model->ChangeStatusConversation($id,$formdata);
        if ($id)
        {
            $this->session->set_flashdata('MSG', ShowAlert("Archives  Successfully", "SS"));
            redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
        }
        else
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Archives,Please try again", "DD"));
            redirect(base_url() . "Standardsmaking/conversation_list", 'refresh');
        } 
    }

    public function join_the_classroom_dashboard(){
        $this->load->view('admin/headers/admin_header');
         $this->load->view('Standardsmaking/join_the_classroom_dashboard');
         $this->load->view('admin/footers/admin_footer');
    }
    public function live_session_list(){
        $LiveSessionList = $this->Standards_Making_model->getLiveSessionList();
        $data = array();
        $data['liveSessionList'] = $LiveSessionList;

        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/live_session_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function live_session_form()
    {
        $this->load->view('admin/headers/admin_header'); 
        if ($this->form_validation->run('live_session_form') == FALSE) 
        {
            $this->load->view('Standardsmaking/live_session_form');
        } 
        else 
        {
            if (!file_exists('uploads/live_session_form/video')) { mkdir('uploads/live_session_form/video', 0777, true); }

            if (!file_exists('uploads/live_session_form/thumbnail')) { mkdir('uploads/live_session_form/thumbnail', 0777, true); }

            if (!file_exists('uploads/live_session_form/doc_pdf')) { mkdir('uploads/live_session_form/doc_pdf', 0777, true); }

            if (!file_exists('uploads/live_session_form/image')) { mkdir('uploads/live_session_form/image', 0777, true); }

            $videosize=$_FILES['video']['size'];  
            if ($videosize > 0 ) 
            {
                $videopath = 'uploads/live_session_form/video/'; 
                $videolocation = $videopath . time() .'video'. $_FILES['video']['name']; 
                move_uploaded_file($_FILES['video']['tmp_name'], $videolocation);
            }
            else
            {
                $videolocation='';
                // $videolocation=$this->input->post('lastvideo');
            }

            $thumbnailsize=$_FILES['thumbnail']['size']; 
            if ($thumbnailsize > 0 ) 
            {
                $thumbnailpath = 'uploads/live_session_form/thumbnail/'; 
                $thumbnaillocation = $thumbnailpath . time() .'thumbnail'. $_FILES['thumbnail']['name']; 
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnaillocation);
            }
            else
            {
                $thumbnaillocation='';
                // $videolocation=$this->input->post('lastvideo');
            }
             $imagesize=$_FILES['image']['size']; 
            if ($imagesize > 0 ) 
            {
                $imagepath = 'uploads/live_session_form/image/'; 
                $imagelocation = $imagepath . time() .'image'. $_FILES['image']['name']; 
                move_uploaded_file($_FILES['image']['tmp_name'], $imagelocation);
            }
            else
            {
                $imagelocation='';
                // $videolocation=$this->input->post('lastvideo');
            }

             $doc_pdfsize=$_FILES['doc_pdf']['size']; 
            if ($doc_pdfsize > 0 ) 
            {
                $doc_pdfpath = 'uploads/live_session_form/doc_pdf/'; 
                $doc_pdflocation = $doc_pdfpath . time() .'doc_pdf'. $_FILES['doc_pdf']['name']; 
                move_uploaded_file($_FILES['doc_pdf']['tmp_name'], $doc_pdflocation);
            }
            else
            {
                $doc_pdflocation='';
                // $videolocation=$this->input->post('lastvideo');
            } 

            $formdata = array(); 
            $formdata['type_of_post'] = $this->input->post('type_of_post');
            $formdata['title'] = $this->input->post('title');
            $formdata['description'] = $this->input->post('description'); 
            $formdata['session_link'] = $this->input->post('session_link'); 
            $formdata['thumbnail'] =$thumbnaillocation; 
            $formdata['video'] = $videolocation;
            $formdata['image'] = $imagelocation;
            $formdata['doc_pdf'] = $doc_pdflocation;
            $formdata['created_on'] = date('Y-m-d h:i:s'); 
            $id = $this->Standards_Making_model->joinclassroomForm($formdata);
            if ($id)
            {
                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "Standardsmaking/live_session_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new post/ live session, Please try again", "DD"));
                redirect(base_url() . "Standardsmaking/live_session_form", 'refresh');
            }
        }
        
        $this->load->view('admin/footers/admin_footer');
    }
    public function manage_session_list(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/manage_session_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function publish_list(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/publish_list');
        $this->load->view('admin/footers/admin_footer');
    }

    public function live_session_view(){
        $this->load->view('admin/headers/admin_header');
         $this->load->view('Standardsmaking/live_session_view');
         $this->load->view('admin/footers/admin_footer');
    }
    public function live_session_edit(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/live_session_edit');
        $this->load->view('admin/footers/admin_footer');
    }
    public function live_session_archived(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Standardsmaking/live_session_archived');
        $this->load->view('admin/footers/admin_footer');
    }
     
}
