<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Admin_model');
        $this->load->model('Quiz/Quiz_model');
       
    }
    public function index()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/organizing_quiz_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function organizing_quiz()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/organizing_quiz_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function quiz_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/quiz_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function ongoing_quiz_list()
    {
        $allquize = $this->Admin_model->onGoingQuiz();
        $data = array();
        $data['allquize'] = $allquize;
        $this->load->view('admin/headers/admin_header');;
        $this->load->view('Quiz/ongoing_quiz_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function ongoing_quiz_view() 
    {
        // $data=array();
        // $quiz = $this->Quiz_model->viewQuiz($id);
        // $quizdata=array();
        // $data['quizdata']=$quiz; 
        
        $this->load->view('admin/headers/admin_header');
        $this->load->view('Quiz/ongoing_quiz_view'); 
        $this->load->view('admin/footers/admin_footer');
    }
    public function closed_quiz_list()
    {
        $ClosedQuiz = $this->Quiz_model->getAllClosedQuize();
        $data = array();
        $data['ClosedQuiz'] = $ClosedQuiz; 
         

        $this->load->view('admin/headers/admin_header');
        $this->load->view('Quiz/closed_quiz_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function closed_quiz_view()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->view('Quiz/closed_quiz_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function editquiz($id)
    {
       $this->load->view('admin/headers/admin_header');
      
        $quizlavel = $this->Quiz_model->getQuizLevel();
        $getAvailability = $this->Quiz_model->getAvailability();
        $getQuizLanguage = $this->Quiz_model->getQuizLanguage(); 
        $getAllQb = $this->Quiz_model->getAllQb(); 
            
        //quize Data 
        $data=array();
        $quiz = $this->Quiz_model->getQuiz($id);
        $quizdata=array();
        $data['quizdata']=$quiz; 
        //End Quize Data

        //Get First Prize data
        $prize_id=1;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['firstprize']=$prize;
        //end First Prizr Data

        //get Second Prize Data
        $prize_id=2;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['secondprize']=$prize;
        //End Second Prize data

        //get Third Prize Data
        $prize_id=3;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['thirdprize']=$prize;
        //End Third Prize data

        //get Fourth Prize Data
        $prize_id=4;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['fourthprize']=$prize; 

        $data['quizlavel']=$quizlavel;
        $data['getAvailability']=$getAvailability;
        $data['getQuizLanguage']=$getQuizLanguage;
        $data['getAllQb']=$getAllQb;
         
        if ($this->form_validation->run('quiz_form_validation_rule') == FALSE) 
        {
            $this->load->view('quiz/edit_quiz',$data);
        } 
        else 
        {
            $banner_imgsize=$_FILES['banner_img']['size'];
            $fprize_imgsize=$_FILES['fprize_img']['size'];
            $sprize_imgsize=$_FILES['sprize_img']['size'];
            $tprize_imgsize=$_FILES['tprize_img']['size'];
            if ($banner_imgsize > 0 ) 
            {
                $bannerpath = 'uploads/quiz_img/'; 
                $banner_imglocation = $bannerpath . time() .'quiz_banner_img'. $_FILES['banner_img']['name']; 
                move_uploaded_file($_FILES['banner_img']['tmp_name'], $banner_imglocation);
            }
            else
            {
                $banner_imglocation=$this->input->post('lastbanner');
            }
            $prizepath = 'uploads/prize_img/';
            if ($fprize_imgsize > 0) 
            {
                $fprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['fprize_img']['name']; 
                move_uploaded_file($_FILES['fprize_img']['tmp_name'], $fprize_imglocation); 
            }
            else
            {
                $fprize_imglocation=$this->input->post('lastfprize_img');
            }

            if ($sprize_imgsize > 0) 
            {
                $sprize_imglocation = $prizepath . time()  .'prize_img'.$_FILES['sprize_img']['name']; 
                move_uploaded_file($_FILES['sprize_img']['tmp_name'], $sprize_imglocation);
            } 
            else
            {
                $sprize_imglocation=$this->input->post('lastsprize_img');
            }

            if ($tprize_imgsize > 0) 
            {
                $tprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['tprize_img']['name']; 
                move_uploaded_file($_FILES['tprize_img']['tmp_name'], $tprize_imglocation);
            } 
            else
            {
                $tprize_imglocation=$this->input->post('lasttprize_img');
            }
                             
            $formdata = array(); 
            $formdata['title'] = $this->input->post('title');
            $formdata['description'] = $this->input->post('description');
            $formdata['terms_conditions'] = $this->input->post('terms_conditions');
            $formdata['duration'] = $this->input->post('duration');
            $formdata['total_question'] = $this->input->post('total_question');
            $formdata['total_mark'] = $this->input->post('total_mark');
            $formdata['start_date'] = $this->input->post('start_date');
            $formdata['start_time'] = $this->input->post('start_time');
            $formdata['end_date'] = $this->input->post('end_date');
            $formdata['end_time'] = $this->input->post('end_time');
            $formdata['quiz_level_id'] = $this->input->post('quiz_level_id');
            $formdata['banner_img'] = $banner_imglocation;
            $formdata['language_id'] = $this->input->post('language_id');
            $formdata['availability_id'] = $this->input->post('availability_id');
            $formdata['que_bank_id'] = $this->input->post('que_bank_id');
            $formdata['qbquestion'] = $this->input->post('qbquestion');
            $formdata['status'] = 1;

            $encAdminId = $this->session->userdata('admin_id');
            $modify_by = encryptids("D", $encAdminId);
            $formdata['modify_by'] = $modify_by;
            $formdata['modify_on'] = date('Y-m-d : h:i:s');

            $quiz_id = $this->Quiz_model->updateQuiz($id,$formdata);

            if ($quiz_id) 
            { 
                $fprize_id = 1;
                $formdata1['no_of_prize'] = $this->input->post('fprize');
                $formdata1['prize_details'] = $this->input->post('fdetails'); 
                $formdata1['prize_img'] = $fprize_imglocation;

                $sprize_id = 2;
                $formdata2['no_of_prize'] = $this->input->post('sprize');
                $formdata2['prize_details'] = $this->input->post('sdetails');
                $formdata2['prize_img'] = $sprize_imglocation;

                $tprize_id = 3;
                $formdata3['no_of_prize'] = $this->input->post('tprize');
                $formdata3['prize_details'] = $this->input->post('tdetails');
                $formdata3['prize_img'] =$tprize_imglocation;
     
                $cprize_id = 4;
                $formdata4['no_of_prize'] = $this->input->post('cprize');
                $formdata4['prize_details'] = $this->input->post('cdetails');
                $formdata4['prize_img'] = "NA";

                $this->Quiz_model->updatePrize($fprize_id,$id,$formdata1);
                $this->Quiz_model->updatePrize($sprize_id,$id,$formdata2);
                $this->Quiz_model->updatePrize($tprize_id,$id,$formdata3);
                $this->Quiz_model->updatePrize($cprize_id,$id,$formdata4);  

                $this->session->set_flashdata('MSG', ShowAlert("Record Update Successfully", "SS"));
                redirect(base_url() . "quiz/quiz_list", 'refresh');
            } 
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to quiz Updation  ,Please try again", "DD"));
                redirect(base_url() . "quiz/editquiz", 'refresh');
            }
        }
        $this->load->view('admin/footers/admin_footer');
    }

  
   
    public function quiz_edit()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/quiz_edit');
        $this->load->view('admin/footers/admin_footer');
    }
 
   
   //ajax
   public function getAllRegions(){
    $region_id = $this->input->post('id');

    $details = array();
    $details = $this->Quiz_model->getAllRegions($region_id);
    if (empty($details)) {
        $data['status'] = 0;
        $data['message'] = 'Failed to get details , Please try again.';
        $data['region'] = $details;
    } else {
        $data['status'] = 1;
        $data['message'] = 'Details Available.';
        $data['region'] = $details;
    }
    echo  json_encode($data);
    exit();
   }
    public function quiz_reg()
    {
         
        $quizlavel = $this->Quiz_model->getQuizLevel();
        $getAvailability = $this->Quiz_model->getAvailability();
        $getQuizLanguage = $this->Quiz_model->getQuizLanguage();
        $getAllQb = $this->Quiz_model->getAllQb();
       
        $formdataall=array();
        $formdataall['quizlavel']=$quizlavel;
        $formdataall['getAvailability']=$getAvailability;
        $formdataall['getQuizLanguage']=$getQuizLanguage;
        $formdataall['getAllQb']=$getAllQb;
       

        $this->load->view('admin/headers/admin_header'); 
        if ($this->form_validation->run('quiz_form_validation_rule') == FALSE) 
        {
            $this->load->view('quiz/quiz_form',$formdataall);
        }
        else
        {
            $bannerpath = 'uploads/quiz_img/'; 
            $banner_imglocation = $bannerpath . time() .'quiz_banner_img'. $_FILES['banner_img']['name']; 
            move_uploaded_file($_FILES['banner_img']['tmp_name'], $banner_imglocation);

            $prizepath = 'uploads/prize_img/'; 
            if (!empty($_FILES['fprize_img']['tmp_name'])) {
            $fprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['fprize_img']['name']; 
            move_uploaded_file($_FILES['fprize_img']['tmp_name'], $fprize_imglocation); }

            if (!empty($_FILES['sprize_img']['tmp_name'])) {
            $sprize_imglocation = $prizepath . time()  .'prize_img'.$_FILES['sprize_img']['name']; 
            move_uploaded_file($_FILES['sprize_img']['tmp_name'], $sprize_imglocation);}

            if (!empty($_FILES['tprize_img']['tmp_name'])) {
            $tprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['tprize_img']['name']; 
            move_uploaded_file($_FILES['tprize_img']['tmp_name'], $tprize_imglocation);}

            if (!empty($_FILES['cprize_img']['tmp_name'])) {
                $cprize_imglocation = $prizepath . time() .'prize_img'. $_FILES['cprize_img']['name']; 
                move_uploaded_file($_FILES['cprize_img']['tmp_name'], $cprize_imglocation);}

            $encAdminId = $this->session->userdata('admin_id');
            $created_by = encryptids("D", $encAdminId);            
           
            $formdata = array();
            $formdata['quiz_id'] = date('mdy').$this->random_strings(4);
            $formdata['title'] = $this->input->post('title');
            $formdata['title_hindi'] = $this->input->post('title_hindi');
            $formdata['description'] = $this->input->post('description');
            $formdata['terms_conditions'] = $this->input->post('terms_conditions');
            $formdata['duration'] = $this->input->post('duration');
            $formdata['total_question'] = $this->input->post('total_question');
            $formdata['total_mark'] = $this->input->post('total_mark');
            $formdata['start_date'] = $this->input->post('start_date');
            $formdata['start_time'] = $this->input->post('start_time');
            $formdata['end_date'] = $this->input->post('end_date');
            $formdata['end_time'] = $this->input->post('end_time');
            $formdata['quiz_level_id'] = $this->input->post('quiz_level_id');
            if($this->input->post('quiz_level_id')!= 1){
                $formdata['region_id'] = $this->input->post('region_id');
            }
         
            $formdata['switching_type'] = $this->input->post('switching_type');
            $formdata['banner_img'] = $banner_imglocation;
            $formdata['language_id'] = $this->input->post('language_id');
            $formdata['availability_id'] = $this->input->post('availability_id');
            $formdata['que_bank_id'] = $this->input->post('que_bank_id');
            $formdata['que_bank_id'] = $this->input->post('que_bank_id');
            $formdata['qbquestion'] = $this->input->post('qbquestion');

            $formdata['created_by'] = $created_by;
            $formdata['status'] = 1;

            $quiz_id = $this->Quiz_model->insertQuiz($formdata);

            if ($quiz_id) {

                $formdata1['quiz_id'] = $quiz_id;
                $formdata1['prize_id'] = 1;
                $formdata1['no_of_prize'] = $this->input->post('fprize');
                $formdata1['prize_details'] = $this->input->post('fdetails');
                $formdata1['prize_img'] = $fprize_imglocation;

                if($this->input->post('sprize')!= ""){
                    $formdata2['quiz_id'] = $quiz_id;
                    $formdata2['prize_id'] = 2;
                    $formdata2['no_of_prize'] = $this->input->post('sprize');
                    $formdata2['prize_details'] = $this->input->post('sdetails');
                    $formdata2['prize_img'] = $sprize_imglocation; 
                }
              
                if($this->input->post('tprize')!= ""){
                $formdata3['quiz_id'] = $quiz_id;
                $formdata3['prize_id'] = 3;
                $formdata3['no_of_prize'] = $this->input->post('tprize');
                $formdata3['prize_details'] = $this->input->post('tdetails');
                $formdata3['prize_img'] =$tprize_imglocation; 
                }

                if($this->input->post('cprize')!= ""){
                $formdata4['quiz_id'] = $quiz_id;
                $formdata4['prize_id'] = 4;
                $formdata4['no_of_prize'] = $this->input->post('cprize');
                $formdata4['prize_details'] = $this->input->post('cdetails');
                $formdata4['prize_img'] = $cprize_imglocation;
                }

                $this->Quiz_model->insertPrize($formdata1);
                $this->Quiz_model->insertPrize($formdata2);
                $this->Quiz_model->insertPrize($formdata3);
                $this->Quiz_model->insertPrize($formdata4);

                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "quiz/quiz_list", 'refresh');
            }
            else
            {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new admin,Please try again", "DD"));
                redirect(base_url() . "quiz/quiz_reg", 'refresh');
            }
        }
        $this->load->view('admin/footers/admin_footer');
    }
    public function quiz_list()
    {
        
      
        $allquize = $this->Quiz_model->getAllQuize();
        $data = array();
        $data['allquize'] = $allquize;

        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/quiz_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function quiz_competition_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/quiz_competition_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function quiz_view($id)
    {
        $this->load->view('admin/headers/admin_header');
      
         
        $data=array();
        $quiz = $this->Quiz_model->viewQuiz($id);
        $quizdata=array();
        $data['quizdata']=$quiz; 
        //End Quize Data
          
        //Get First Prize data
        $prize_id=1;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['firstprize']=$prize;
        //end First Prizr Data

        //get Second Prize Data
        $prize_id=2;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['secondprize']=$prize;
        //End Second Prize data

        //get Third Prize Data
        $prize_id=3;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['thirdprize']=$prize;
        //End Third Prize data

        //get Fourth Prize Data
        $prize_id=4;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['fourthprize']=$prize;
        
        $this->load->view('quiz/quiz_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    
    // Ajax Call Function
    public function getQbdata($id)
    {
      
        $data['result'] = $this->Quiz_model->getQbdataa($id);
        echo  json_encode($data); 
    }

    public function sendApprove($id)
    {
      
       
        $encAdminId = $this->session->userdata('admin_id');
        $modify_by = encryptids("D", $encAdminId);

        $formdata['modify_by'] = $modify_by;
        $formdata['modify_on'] = date('Y-m-d : h:i:s');
        $formdata['status']=2;
        
        $quiz_id = $this->Quiz_model->sendToApprove($id,$formdata);
        if ($quiz_id==1) 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Quiz Send for Approve", "SS"));
            redirect(base_url() . "quiz/quiz_list", 'refresh');
        }
        else 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Send for Approve admin,Please try again", "DD"));
            redirect(base_url() . "quiz/quiz_reg", 'refresh');
        }
    }

    public function publishQuiz($id)
    {
      

        $encAdminId = $this->session->userdata('admin_id');
        $modify_by = encryptids("D", $encAdminId);
        $formdata['modify_by'] = $modify_by;
        $formdata['modify_on'] = date('Y-m-d : h:i:s'); 
        $formdata['status']=5;
        $quiz_id = $this->Quiz_model->updatepublish($id,$formdata);
        if ($quiz_id==1) 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Quiz Published", "SS"));
            redirect(base_url() . "quiz/manage_quiz_list", 'refresh');
        }
        else 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Send for Approve admin,Please try again", "DD"));
            redirect(base_url() . "quiz/quiz_reg", 'refresh');
        }
    }
    public function unPublishQuiz($id)
    {
      
        $encAdminId = $this->session->userdata('admin_id');
        $modify_by = encryptids("D", $encAdminId);
        $formdata['modify_by'] = $modify_by;
        $formdata['modify_on'] = date('Y-m-d : h:i:s'); 
        $formdata['status']=6;
        $quiz_id = $this->Quiz_model->updatepublish($id,$formdata);
        if ($quiz_id==1) 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Quiz Un-Published", "SS"));
            redirect(base_url() . "quiz/manage_quiz_list", 'refresh');
        }
        else 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Send for Approve admin,Please try again", "DD"));
            redirect(base_url() . "quiz/quiz_reg", 'refresh');
        }
    }

    public function manage_quiz_list()
    {
       
        $allquize = $this->Admin_model->getAllManageQuiz();
        $data = array();
        $data['allquize'] = $allquize; 

        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/manage_quiz_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function manage_quiz_view($id)
    {
             
        $data=array();
        $quiz = $this->Quiz_model->viewQuiz($id);
        $quizdata=array();
        $data['quizdata']=$quiz; 
        //End Quize Data

        //Get First Prize data
        $prize_id=1;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['firstprize']=$prize;
        //end First Prizr Data

        //get Second Prize Data
        $prize_id=2;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['secondprize']=$prize;
        //End Second Prize data

        //get Third Prize Data
        $prize_id=3;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['thirdprize']=$prize;
        //End Third Prize data

        //get Fourth Prize Data
        $prize_id=4;
        $prize = $this->Quiz_model->getPrizeId($prize_id,$id); 
        $data['fourthprize']=$prize;

        $this->load->view('admin/headers/admin_header');
        $this->load->view('Quiz/manage_quiz_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }
   
 
   
   
    
    public function closed_quiz_submission($id)
    {
        $data=array();

        $users = $this->Quiz_model->getQuizSubmissionUsers($id); 
        $data['UsersDetails']=$users; 

        $this->load->view('admin/headers/admin_header');
        $this->load->view('Quiz/closed_quiz_submission',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function random_strings($length_of_string)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result), 0, $length_of_string );
    }
    public function quiz_archive(){        
        $this->load->view('admin/headers/admin_header');;
        $this->load->view('Quiz/quiz_archive');
        $this->load->view('admin/footers/admin_footer');
    }
    public function result_declaration_list(){        
        $this->load->view('admin/headers/admin_header');;
        $this->load->view('Quiz/result_declaration_list');
        $this->load->view('admin/footers/admin_footer');
    }

}
