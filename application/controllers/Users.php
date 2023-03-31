<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
    {
        
        parent::__construct();
        $this->load->model('Quiz/quiz_model');
        $this->load->model('Users/users_model');
    }
	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }   
    public function index()
	{
        $this->load->view('users/headers/header');
		$this->load->view('users/welcome_page');
        $this->load->view('users/footers/footer'); 
	}
    public function login()
	{
       $this->load->view('users/headers/login_header');
		$this->load->view('users/login');
        $this->load->view('users/footers/login_footer'); 
	}
    public function contact_us()
	{
        $this->load->view('users/headers/header');
		$this->load->view('users/contact_us');
        $this->load->view('users/footers/footer'); 
	}
    public function about_exchange_forum(){
        $this->load->view('users/headers/header');
        $this->load->view('users/about_exchange_forum');       
        $this->load->view('users/footers/footer');       
    }
    public function hyperlinking_policy(){
        $this->load->view('users/headers/header');
        $this->load->view('users/hyperlinking_policy');
        $this->load->view('users/footers/footer');  
    }
    public function standard(){
        $data = array();
        $this->load->model('admin/admin_model');
        $data['images']=$this->admin_model->images();
        $allquize = $this->users_model->getAllQuize();
        $data['allquize'] = $allquize; 
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_club',$data);


        $this->load->view('users/headers/header');
        $this->load->view('users/standard_club',$data);
        $this->load->view('users/footers/footer');  
    }
    public function quality_index(){
        $this->load->view('users/headers/header');
        $this->load->view('users/world_of_standards');
        $this->load->view('users/footers/footer');  
    }
    public function privacy_policy(){
        $this->load->view('users/headers/header');
        $this->load->view('users/privacy_policy');
        $this->load->view('users/footers/footer');  
    }
     
    
    public function cap(){
        $this->load->view('users/headers/header');
        $this->load->view('users/content_archival_policy');
        $this->load->view('users/footers/footer');  
    }
    public function cmap(){
        $this->load->view('users/headers/header');
        $this->load->view('users/cmap');
        $this->load->view('users/footers/footer');  
    }
    public function copyright(){
        $this->load->view('users/headers/header');
        $this->load->view('users/copyright');
        $this->load->view('users/footers/footer');  
    }
    public function content_review_policy(){
        $this->load->view('users/headers/header');
        $this->load->view('users/content_review_policy');
        $this->load->view('users/footers/footer');  
    }
    public function disclaimer(){
        $this->load->view('users/headers/header');
        $this->load->view('users/disclaimer');
        $this->load->view('users/footers/footer');  
    }
    public function quiz(){
        $this->load->view('users/headers/header');
        $this->load->view('users/quiz');
        $this->load->view('users/footers/footer');  
    }
    public function sitemap(){
        $this->load->view('users/headers/header');
        $this->load->view('users/sitemap');
        $this->load->view('users/footers/footer');  
    }
    public function terms_condition(){
        $this->load->view('users/headers/header');
        $this->load->view('users/terms_condition');
        $this->load->view('users/footers/footer');  
    }
    public function user_management(){
        $this->load->view('users/headers/header');
        $this->load->view('users/user_management');
        $this->load->view('users/footers/footer');  
    }
    public function winners(){
        $this->load->view('users/headers/header');
        $this->load->view('users/winners');
        $this->load->view('users/footers/footer');  
    }
    public function yourwall(){
        $this->load->model('admin/your_wall_model');
        $data['published_wall']=$this->your_wall_model->getPublishedWall();
        $this->load->view('users/headers/header');
        $this->load->view('users/yourwall',$data);
        $this->load->view('users/footers/footer');  
    }
	  public function yourwallview($id){
        $this->load->model('admin/your_wall_model');
        $data['published_wall']=$this->your_wall_model->get_yourwallData($id);
        $this->load->view('users/headers/header');
        $this->load->view('users/yourwallview',$data);
        $this->load->view('users/footers/footer');  
    }
    public function add_your_wall(){
        $admin_id = encryptids("D", $this->session->userdata('admin_id'));
        if(!$admin_id){
            redirect(base_url() . "users/login", 'refresh');
        }
        $banner_img = "yourwall" . time() . '.jpg';
        $config['upload_path'] = './uploads/your_wall/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '10000';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';
   
        $config['file_name'] = $banner_img;
       
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) 
        {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
        }

        
        $formdata['title'] = $this->input->post('title');
        $formdata['description'] = $this->input->post('description');
        $formdata['status'] = '1';
        $formdata['image'] = $banner_img;    
        $formdata['user_id'] = $admin_id;
        //print_r($formdata); die;    
        $this->load->model('admin/your_wall_model');
        $id=$this->your_wall_model->addYourWall($formdata);
        if($id){
            $this->session->set_flashdata('MSG', ShowAlert("Response Submitted Successfully", "SS"));
            redirect(base_url() . "users/yourwall", 'refresh');
        }else{

        }
        
    }
    public function byTheMentor(){
        $this->load->view('users/headers/header');
        $this->load->view('users/users_by_the_mentor');
        $this->load->view('users/footers/footer'); 
    }

    public function add_btm(){
        $title = $this->input->post('title');
        $description = $this->input->post('description');

        if(isset($_FILES['image'])){
           // echo "image";
                $btm_img = "btm_image" . time() . '.jpg';
                $config['upload_path'] = './uploads/by_the_mentors/img/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']    = '10000';
                $config['max_width']  = '3024';
                $config['max_height']  = '2024';
        
                $config['file_name'] = $btm_img;
            
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) 
                {
                    $data['status'] = 0;
                    $data['message'] = $this->upload->display_errors();
                }
        }
        if(isset($_FILES['document'])){
          //  echo "document";
          
                $btm_document = "btm_document" . time() . '.pdf';
                $btm_path="uploads/by_the_mentors/doc/".$btm_document;

        //         $config1['upload_path'] = './uploads';
        //         $config1['allowed_types'] = 'application/pdf';
        //         $config1['max_size']    = '100000000';
        //         $config1['max_width']  = '3024';
        //         $config1['max_height']  = '2024';
        
        //         $config1['file_name'] = $btm_document;
        //    // print_r($_FILES['document']); die;
        //         $this->load->library('upload', $config1);
        //         if (!$this->upload->do_upload('document')) 
        //         {
        //             $data['status'] = 0;
        //             $data['message'] = $this->upload->display_errors();
        //             $this->session->set_flashdata('MSG', ShowAlert($data['message'], "SS"));
        //             redirect(base_url() . "users/byTheMentor", 'refresh');
        //         }else{
        //             print_r($this->upload->data());
        //         }
                $target_dir = "uploads/by_the_mentots/doc";
                move_uploaded_file($_FILES["document"]["tmp_name"],$btm_path);
               // die;
        }

        $formdata['title']=$title;
        $formdata['description']=$description;
        $formdata['image']=$btm_img;
        $formdata['document']=$btm_document;
        $formdata['status']="1";
        //print_r($formdata); die;
        $this->load->model('admin/by_the_mentor_model');
        $id=$this->by_the_mentor_model->add_btm($formdata);
        if($id){
            $this->session->set_flashdata('MSG', ShowAlert("Response Submitted Successfully", "SS"));
            redirect(base_url() . "users/byTheMentor", 'refresh');
        }else{
            $this->session->set_flashdata('MSG', ShowAlert("Failed! Response not submitted.", "SS"));
            redirect(base_url() . "users/byTheMentor", 'refresh');
        }        
        
    }

    public function about_quiz($id)
    {  
         
        $data=array(); 
        $quiz = $this->users_model->viewQuiz($id);
        $quizdata=array();
        $data['quizdata']=$quiz;
        $this->load->view('users/headers/header');
        $this->load->view('users/about_quiz',$data);
        $this->load->view('users/footers/footer');  
    }
    public function quiz_start($quiz_id)
    { 
        $data=array();
        $que_details = $this->users_model->viewQuestion($quiz_id);
        $data['que_details']=$que_details; 

        $quiz = $this->users_model->viewQuiz($quiz_id); 
        $data['quizdata']=$quiz; 

        $this->load->view('users/quiz_start',$data); 
    }
    public function quiz_submit()
    {
        $que_id= $this->input->post("que_id");
        $number = count($que_id);
        if ($number > 0) 
        {
            $successCount = 0;
            $j = 1;
            for ($i = 0; $i < $number; $i++)
            {
                if (trim($que_id[$i] != ''))
                { 
                    $ques_id =  $que_id[$i]; 
                    
                    if ($_POST['option'.$ques_id.$j] != "") 
                    {
                        $selected_op = $_POST['option'.$ques_id.$j];
                    }
                    else
                    {
                        $selected_op=0;
                    }

                    $formdata = array();
                    $formdata['user_id']=1; 
                    $formdata['quiz_id'] = 2;
                    $formdata['ques_id'] = $ques_id;
                    $formdata['selected_op'] = $selected_op; 
                    $quiz_id = $this->users_model->insertQuestion($formdata);

                    $successCount++;
                    if ($successCount == $number) 
                    {
                       $this->session->set_flashdata('MSG', ShowAlert("Submission Successfully", "SS"));
                        redirect(base_url() . "users/quiz_submission", 'refresh');

                    }

                }
                $j++;
            }
        }


    }
    public function quiz_submission(){
        $this->load->view('users/headers/header');
        $this->load->view('users/quiz_submission');
        $this->load->view('users/footers/footer');  
    }


}