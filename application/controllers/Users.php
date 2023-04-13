<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
    {
        
        parent::__construct();
        $this->load->model('Admin/Admin_model');
        $this->load->model('Quiz/quiz_model');
        $this->load->model('Users/Users_model');
        $this->load->model('Admin/Wall_of_wisdom_model', 'wow');
        
        date_default_timezone_set("Asia/Calcutta");
    }
    public function index()
    {
        if ($this->Users_model->checkAdminLogin()) {
            $sess_admin_type = encryptids("D",$this->session->userdata($sess_arr['admin_type']));
            if($sess_admin_type == 1 || $sess_admin_type == 2 || $sess_admin_type == 3){
                redirect(base_url() . "Admin/dashboard", 'refresh');
            }else{
                redirect(base_url() . "Users/welcome", 'refresh');
            }
         
        } else {
            redirect(base_url() . "Users/welcome", 'refresh');
        }
        return true;
    }
  
    public function login()
    {
        $this->load->view('users/headers/login_header');
        $this->load->view('users/login');
        $this->load->view('users/footers/login_footer');
    }
    public function authUser()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[30]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('MSG', ShowAlert(validation_errors(), "DD"));
            redirect(base_url() . "Users/login", 'refresh');
            return false;
        } else {

            $username        = clearText($this->input->post('username'));
            $password        = clearText($this->input->post('password'));

            //////////////////////START/////////////
          
        $curl_req = curl_init();
       // $parameters = json_encode(array("userid" => $username, "password" => $password));
        $parameters  = "userid=".$username."&password=".$password;
        curl_setopt_array($curl_req, array(
            CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Auth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => $parameters,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Accept: application/json'
            ),
        ));
        $response = curl_exec($curl_req);
        curl_close($curl_req);
        $output = json_decode($response, true);
             
        $userData = array();
        if($output['status_code'] == 1 ){
            $userData = $output['data'];
            //echo json_encode($userData);echo "<br>";
            $user_id = $userData['UserID'];
            $exist_user = $this->Users_model->toCheckUserExist($user_id);
            if(!$exist_user){
                $comm_id = "";
                $comm_name = "";
                if(!empty($userData['assignedCommitte'])){
                    $comm_id = $userData['assignedCommitte']['comm_id'];
                    $comm_name = $userData['assignedCommitte']['comm_name'];
                }
                // echo  $user_id."<br>";
                $data = array(
                    'user_id' => $userData['UserID'], 
                    'emp_no' =>  $userData['EmployeeNumber'],
                    'status_id' =>  $userData['StatusID'],
                    'status_title' =>  $userData['StatusTitle'],
    
                    'user_title' =>  $userData['UserTitle'],
                    'user_name' =>  $userData['UserName'],
                    'user_doc_no' =>  $userData['UserDocumentNo'],
    
                    'date_of_birth' =>  $userData['DateOfBirth'],
                    'date_of_joining' =>  $userData['DateOfJoining'],
                    'user_mobile' =>  $userData['UserMobile'],
                    'email' =>  $userData['Email'],
                    'role' =>  $userData['role'],
    
                    'emp_desi_id' =>  $userData['EmployeeDesignationID'],
                    'emp_desi' =>  $userData['EmployeeDesignation'],
    
                  
                    'created_on' =>  $userData['created_on'],
                    'user_type' =>  $userData['user_type'],
                    'member_id' =>  $userData['MemberID'],
    
                    'standard_club_id' =>  $userData['StandardClubID'],
                    'standard_club_name' =>  $userData['StandardClubName'],
                    'standard_club_branch_id' =>  $userData['StandardClubBranchID'],              
                    'standard_club_dept_id' =>  $userData['StandardClubDeptID'],
                    'standard_club_region' =>  $userData['StandardClubRegion'],
    
                    'comm_id' =>  $comm_id,
                    'comm_name' =>  $comm_name,
                    
    
                );
               // echo json_encode($data); exit();
                $userId = $this->Users_model->insertData($data);
               
            }
            $user_details = $this->Users_model->getUsersDetailsByUserId($user_id);
            $admin_id        = encryptids("E", $user_details['user_id']);
            $admin_email        = encryptids("E", $user_details['email']);
            $admin_name      = encryptids("E", $user_details['user_name']);
            $admin_type        = encryptids("E", $user_details['user_type']);
            $admin_post        = encryptids("E", $user_details['emp_desi']);
            $admin       = encryptids("E",0);
            $sess_arr         = array("admin_id" => $admin_id, "admin_email" => $admin_email, "admin_type" => $admin_type, "admin_post" => $admin_post, "admin_name" => $admin_name, "admin" => $admin);
           

            $this->session->set_userdata($sess_arr);
            redirect(base_url() . "Users/welcome", 'refresh');
            return true;
            
          

        }else{
            $user = $this->Admin_model->getLoginUsers($username, $password);
            if (empty($user)) {
                $this->session->set_flashdata('MSG', ShowAlert("Invalid username or password.", "DD"));
                redirect(base_url() . "Users/login", 'refresh');
                return true;
            }
            // if(!password_verify($u_pass, $user_res[0]->user_password))
            // {
            // 	$this->session->set_flashdata('MSG', ShowAlert("Invalid username or password.","DD"));
            // 	if($param == "inslogin")
            // 		redirect(base_url()."Administrator/iLogin", 'refresh');
            // 	else
            // 		redirect(base_url()."Administrator", 'refresh');
            // 	return true;
            // }
            else {
                $admin_id        = encryptids("E", $user['id']);
                $admin_email        = encryptids("E", $user['email_id']);
                $admin_name      = encryptids("E", $user['name']);
                $admin_type        = encryptids("E", $user['admin_type']);
                $admin_post        = encryptids("E", $user['post']);
                $admin       = encryptids("E",1);
                $sess_arr         = array("admin_id" => $admin_id, "admin_email" => $admin_email, "admin_type" => $admin_type, "admin_post" => $admin_post, "admin_name" => $admin_name, "admin" => $admin);
                if ($user['admin_type'] == 1 || $user['admin_type'] == 2 || $user['admin_type'] == 3) {

                    $this->session->set_userdata($sess_arr);
                    redirect(base_url() . "Admin/Dashboard", 'refresh');
                    return true;
                }  else{
                    $this->session->set_flashdata('MSG',  ShowAlert("Invalid username or password.", "DD"));
                    redirect(base_url() . "Users/login", 'refresh');
                    return true;
                }
            }

        }

            ///////////////////////END/////////////


        }
    }
    public function logout()
    {
        $this->Admin_model->adminLogout();
        //$this->session->session_unset();
        $this->session->sess_destroy();
        redirect(base_url() . 'Users/login');
        exit();
    }
    public function welcome()
	{
        $this->load->view('users/headers/header');
		$this->load->view('users/welcome');
        $this->load->view('users/footers/footer'); 
	}
    // public function login()
	// {
    //    $this->load->view('users/headers/login_header');
	// 	$this->load->view('users/login');
    //     $this->load->view('users/footers/login_footer'); 
	// }
    public function contact_us()
	{
        $data['contact']=$this->Users_model->contact_us();
        $this->load->view('users/headers/header');
		$this->load->view('users/contact_us',$data);
        $this->load->view('users/footers/footer'); 
	}
    public function about_exchange_forum(){
        $data['about_exchange_forum']=$this->Users_model->about_exchange_forum();
        $data['about_exchange_forum']=$this->Users_model->about_exchange_forum();
        $this->load->view('users/headers/header');
        $this->load->view('users/about_exchange_forum',$data);       
        $this->load->view('users/footers/footer');       
    }
    public function hyperlinking_policy(){
        $data=$this->Users_model->get_legal_data('hlp');
        $this->load->view('users/headers/header');
        $this->load->view('users/hyperlinking_policy',$data);
        $this->load->view('users/footers/footer');  
    }
    public function standard(){
        $data = array();
        $this->load->model('admin/admin_model');
        $data['banner_data']=$this->admin_model->bannerAllData();
        $data['images']=$this->admin_model->images();
        $data['videos']=$this->admin_model->videos();
        $allquize = $this->Users_model->getUserAllQuize();
        $data['allquize'] = $allquize;  
        // $this->load->view('users/standard_club',$data);
        // print_r($data); die;

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
        $data=$this->Users_model->get_legal_data('policy_p');
        $this->load->view('users/headers/header');
        $this->load->view('users/privacy_policy',$data);
        $this->load->view('users/footers/footer');  
    }
    public function item_proposal_list(){
        $this->load->view('users/headers/header');
        $curl_req1 = curl_init(); 
        curl_setopt_array($curl_req1, array(
            CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/dgdashboard/Standards_master/get_nwip_report_data',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => false, 
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));
        $responseNew = curl_exec($curl_req1);
        $responseNew = json_decode($responseNew, true); 
        $newCount =count($responseNew['nwip_data']);
        $arr=array();
        $getAll= $this->Users_model->ItemProposalCount();
        $arr['getAll']=$getAll;
        $insertedCount = count($getAll); 
        if ($newCount > $insertedCount ) 
        {
            foreach($responseNew['nwip_data'] as $data)
                { 
                    $this->Users_model->insertItemProposal($data);
                }
        }


        $this->load->view('users/item_proposal_list',$arr);
        $this->load->view('users/footers/footer'); 
    }
    public function item_proposal_view($id){

        $id = encryptids("D", $id);
        $itemProposal = $this->Users_model->getItemProposal($id);
        $data = array();
        $data['itemProposal'] = $itemProposal;

         

        $this->load->view('users/headers/header');
        $this->load->view('users/item_proposal_view',$data);
        $this->load->view('users/footers/footer'); 
    }
    public function important_draft(){
        $this->load->view('users/headers/header');
        $this->load->view('users/important_draft');
        $this->load->view('users/footers/footer'); 
    }
    public function important_draft_list(){
        $this->load->view('users/headers/header');
        $this->load->view('users/important_draft_list');
        $this->load->view('users/footers/footer'); 
    }
    public function important_draft_view(){
        $this->load->view('users/headers/header');
        $this->load->view('users/important_draft_view');
        $this->load->view('users/footers/footer'); 
    }
    public function standard_publish_List(){
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_publish_List');
        $this->load->view('users/footers/footer'); 
    }
    public function standard_publish_view(){
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_publish_view');
        $this->load->view('users/footers/footer'); 
    }
    public function standard_under_list(){
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_under_list');
        $this->load->view('users/footers/footer'); 
    }
    public function standard_under_view(){
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_under_view');
        $this->load->view('users/footers/footer'); 
    }
    public function standard_revised_list(){
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_revised_list');
        $this->load->view('users/footers/footer'); 
    }
    public function standard_revised_view(){
        $this->load->view('users/headers/header');
        $this->load->view('users/standard_revised_view');
        $this->load->view('users/footers/footer'); 
    }
    public function new_work_list(){
        $this->load->view('users/headers/header');
        $this->load->view('users/new_work_list');
        $this->load->view('users/footers/footer'); 
    }
    public function new_work_view(){
        $this->load->view('users/headers/header');
        $this->load->view('users/new_work_view');
        $this->load->view('users/footers/footer'); 
    }
    public function new_work_view_comments(){
        $this->load->view('users/headers/header');
        $this->load->view('users/new_work_view_comments');
        $this->load->view('users/footers/footer'); 
    }
    public function share_your_thoughts(){
        $this->load->view('users/headers/header');
        $this->load->view('users/share_your_thoughts');
        $this->load->view('users/footers/footer'); 
    } 
    public function join_the_classroom(){
        $this->load->view('users/headers/header');
        $this->load->view('users/join_the_classroom');
        $this->load->view('users/footers/footer'); 
    }
    public function join_the_classroom_view(){
        $this->load->view('users/headers/header');
        $this->load->view('users/join_the_classroom_view');
        $this->load->view('users/footers/footer'); 
    }
    public function join_the_classroom_watch_now(){
        $this->load->view('users/headers/header');
        $this->load->view('users/join_the_classroom_watch_now');
        $this->load->view('users/footers/footer'); 
    }
    public function conversation_with_experts(){
        $Conversation = $this->Users_model->getPublishedConversation();
        $data = array();
        $data['Conversation'] = $Conversation;

        $this->load->view('users/headers/header');
        $this->load->view('users/conversation_with_experts',$data);
        $this->load->view('users/footers/footer'); 
    }
    public function conversation_video($id){

        $getRecentSearch = $this->Users_model->getRecentSearch();
        $data = array();
        $data['getRecentSearch'] = $getRecentSearch;
         
        $id = encryptids("D", $id);
        $Conversation = $this->Users_model->getConversation($id);
        $data['Conversation'] = $Conversation;

        $this->load->view('users/headers/header');
        $this->load->view('users/conversation_video',$data);
        $this->load->view('users/footers/footer'); 
    }
    // public function join_the_classroom(){
    //     $this->load->view('users/headers/header');
    //     $this->load->view('users/join_the_classroom');
    //     $this->load->view('users/footers/footer'); 
    // }


    public function wall_of_wisdom_view($id){
       // $this->load->model('Admin/Wall_of_wisdom_model wow');
        $data['wow']=$this->wow->get_wow($id);
       // print_r($data['wow']); die;
        $this->load->view('users/headers/header');
        $this->load->view('wall_of_wisdom/wall_of_wisdom_description',$data);
        $this->load->view('users/footers/footer'); 
    }
    public function all_wall_of_wisdom(){
        $data['wow']=$this->wow->get_allwow();
        $this->load->view('users/headers/header');
        $this->load->view('wall_of_wisdom/wall_of_wisdom_view_1',$data);
        $this->load->view('users/footers/footer'); 
    }
    public function all_by_the_mentors(){
        $this->load->model('Admin/by_the_mentor_model');
        $data['by_the_mentor']=$this->by_the_mentor_model->getPublishedbtm();
        $this->load->view('users/headers/header');
        $this->load->view('users/all_by_the_mentors',$data);
        $this->load->view('users/footers/footer');
    }
    public function get_legal_data(){
        
        $data=$this->Users_model->get_legal_data('cap');
        print_r($data);
    }
    
    public function cap(){
        $data=$this->Users_model->get_legal_data('cap');
        $this->load->view('users/headers/header');
        $this->load->view('users/content_archival_policy',$data);
        $this->load->view('users/footers/footer');  
    }
    public function cmap(){
        $data=$this->Users_model->get_legal_data('cmap');
        $this->load->view('users/headers/header');
        $this->load->view('users/cmap',$data);
        $this->load->view('users/footers/footer');  
    }
    public function copyright(){
        $data=$this->Users_model->get_legal_data('copyright_policy');
        $this->load->view('users/headers/header');
        $this->load->view('users/copyright',$data);
        $this->load->view('users/footers/footer');  
    }
    public function content_review_policy(){
        $data=$this->Users_model->get_legal_data('crp');
        $this->load->view('users/headers/header');
        $this->load->view('users/content_review_policy',$data);
        $this->load->view('users/footers/footer');  
    }
    public function disclaimer(){
        $data=$this->Users_model->get_legal_data('disclamer');
        $this->load->view('users/headers/header');
        $this->load->view('users/disclaimer',$data);
        $this->load->view('users/footers/footer');  
    }
    public function quiz(){

        $getUserAllQuize = $this->Users_model->getUserAllQuize();
        $data = array();
        $data['getUserAllQuize'] = $getUserAllQuize; 
        $this->load->view('users/headers/header');
        $this->load->view('users/quiz',$data);
        $this->load->view('users/footers/footer');  
    }
    public function sitemap(){
        $this->load->view('users/headers/header');
        $this->load->view('users/sitemap');
        $this->load->view('users/footers/footer');  
    }
    public function terms_condition(){
        $data=$this->Users_model->get_legal_data('tc');
        $this->load->view('users/headers/header');
        $this->load->view('users/terms_condition',$data);
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
        $this->load->view('users/yourwall_new',$data);
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
        // $admin_id = encryptids("D", $this->session->userdata('admin_id'));
        // $formdata['user_id'] = $admin_id;
        // if(!$admin_id){
        //     redirect(base_url() . "users/login", 'refresh');
        // }
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
        $this->load->model('Admin/by_the_mentor_model');
        $data['by_the_mentor']=$this->by_the_mentor_model->getThreeBTM();
        $this->load->view('users/headers/header');
        $this->load->view('users/users_by_the_mentor',$data);
        $this->load->view('users/footers/footer'); 
    }

    public function add_btm(){
        $formdata1['user_id']= encryptids("D", $_SESSION['admin_id']);
        $formdata1['email']= encryptids("D", $_SESSION['admin_email']);
        $formdata1['user_name']=  encryptids("D", $_SESSION['admin_name']);
        // $formdata1['admin']=  encryptids("D", $_SESSION['admin']);
        $formdata1['user_type']=  encryptids("D", $_SESSION['admin_type']);
        // $formdata1['user_post']= encryptids("D", $_SESSION['admin_post']);
        // print_r($formdata); 
        // die;
        if(isset($_SESSION['admin_id'])){
            // $formdata['user_id']=$_SESSION['admin_id'];
            $formdata['user_id']= encryptids("D", $_SESSION['admin_id']);
        }else{
            // die;
            $this->session->set_flashdata('MSG', ShowAlert("Please Login", "SS"));
            redirect(base_url() . "users/byTheMentor", 'refresh');
        }
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
        $this->load->model('admin/by_the_mentor_model');
        $uid=$this->by_the_mentor_model->add_user($formdata1);

        // print_r($uid);

        $formdata['title']=$title;
        $formdata['description']=$description;
        $formdata['image']=$btm_img;
        $formdata['document']=$btm_document;
        $formdata['status']="1";
        // print_r($formdata); die;
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
        $quiz = $this->Users_model->viewQuiz($id);
        $quizdata=array();
        $data['quizdata']=$quiz;
        $this->load->view('users/headers/header');
        $this->load->view('users/about_quiz',$data);
        $this->load->view('users/footers/footer');  
    }
    public function quiz_start($quiz_id)
    { 
        $UserId = $this->session->userdata('admin_id'); 
        // $user_id = encryptids("D", $UserId);
        $user_id = 213456;
        $checkUserAvailable=$this->Users_model->checkUserAvailable($quiz_id,$user_id);
        if ($checkUserAvailable > 0) 
        {
             $this->session->set_flashdata('MSG', ShowAlert("You have Already taken this Quiz.", "SS"));
            redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh'); 
        }
        else
        {
            $data=array();
            $que_details = $this->Users_model->viewQuestion($quiz_id);
            $data['que_details']=$que_details;
            $quiz = $this->Users_model->viewQuiz($quiz_id); 
            $data['quizdata']=$quiz; 
            $this->load->view('users/quiz_start',$data);
        } 
    }
    public function quiz_submit()
    {
        
        $que_id= $this->input->post("que_id");
        $corr_opts= $this->input->post("corr_opt");
        $user_id= $this->input->post("user_id");
        $quiz_id= $this->input->post("quiz_id");
        $start_time= $this->input->post("start_time");
        $end_time= $this->input->post("end_time");
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
                    $corr_opt =  $corr_opts[$i]; 
                    
                    if ($_POST['option'.$ques_id.$j] != "") 
                    {
                        $selected_op = $_POST['option'.$ques_id.$j];
                    }
                    else
                    {
                        $selected_op=0;
                    }

                    $formdata = array();
                    $formdata['user_id'] = $user_id; 
                    $formdata['quiz_id'] = $quiz_id;
                    $formdata['ques_id'] = $ques_id; 
                    $formdata['selected_op'] = $selected_op; 
                    $formdata['corr_opt'] = $corr_opt; 
                    // print_r($formdata);

                    $this->Users_model->insertQuestion($formdata);

                    $successCount++;
                    if ($successCount == $number) 
                    {
                        $wrong_ques=$this->Users_model->getWrongAns($quiz_id,$user_id); 
                        $correct_ques=$this->Users_model->getCorrectAns($quiz_id,$user_id); 
                        $not_ans_ques=$this->Users_model->getNotSelected($quiz_id,$user_id); 
                        $quiz = $this->Users_model->getTotalmarkAndQuestion($quiz_id);

                        $formdata2 = array();
                        $formdata2['user_id'] = $user_id; 
                        $formdata2['quiz_id'] = $quiz_id;
                        $total_question=$quiz['total_question'];
                        $total_mark=$quiz['total_mark'];

                        $formdata2['total_question'] = $total_question; 
                        $formdata2['total_mark'] = $total_mark; 
                        $formdata2['start_time'] = $start_time; 
                        $formdata2['end_time'] = date('h:i:s');
                        $formdata2['correct_ques'] = $correct_ques; 
                        $formdata2['wrong_ques'] = $wrong_ques; 
                        $formdata2['not_ans_ques'] = $not_ans_ques; 


                        $ans = $total_mark/$total_question;
                        $score=$ans*$correct_ques;
                        


                        $formdata2['score'] = $score;  
                        if ($this->Users_model->insertQuziSubmission($formdata2)) 
                        {
                            $this->session->set_flashdata('MSG', ShowAlert("Submission Successfully", "SS"));
                            redirect(base_url() . "users/quiz_submission", 'refresh');
                        }
                        else
                        {  
                             $this->session->set_flashdata('MSG', ShowAlert("Quiz not submitted please contact admin OR try agen.", "SS"));
                             redirect(base_url() . "users/about_quiz/$quiz_id", 'refresh');
                        }

                        

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
     public function by_the_mentor_detail($id){
        $this->load->model('Admin/by_the_mentor_model');
        $data['by_the_mentor']=$this->by_the_mentor_model->get_btm($id);
        $this->load->view('users/headers/header');
        $this->load->view('users/users_by_the_mentor_detail',$data);
        $this->load->view('users/footers/footer'); 
    }
    public function all_your_wall(){
        $this->load->model('admin/your_wall_model');
        $data['published_wall']=$this->your_wall_model->getPublishedWall();        
        $this->load->view('users/headers/header');
        $this->load->view('users/all_your_wall',$data);
        $this->load->view('users/footers/footer');
    }
    public function checkUserAttempt()
     {
        $user_id = $this->input->post('user_id');
        $quiz_id = $this->input->post('quiz_id');
        $attempt = $this->Users_model->checkUserAttempt($user_id,$quiz_id); 
        $user_counter=$attempt['user_counter'];
        $data['userAttempt'] = $user_counter; 
        echo  json_encode($data);
        return true; 

    }
    public function user_attempt(){        
        $this->load->view('users/headers/header');
        $this->load->view('users/user_attempt');
        $this->load->view('users/footers/footer');
    }


}