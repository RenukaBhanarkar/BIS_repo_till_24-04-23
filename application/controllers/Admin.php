<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
  
    public function login()
    {
        $this->load->view('Users/headers/login_header');
        $this->load->view('Admin/login');
        $this->load->view('Users/footers/login_footer');
    }
    
    public function authUser()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[30]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('MSG', ShowAlert(validation_errors(), "DD"));
            redirect(base_url() . "Admin/login", 'refresh');
            return false;
        } else {

            $username        = clearText($this->input->post('username'));
            $password        = clearText($this->input->post('password'));
            $user        = $this->Admin_model->getLoginUsers($username, $password);
            //echo json_encode( $user ); exit();
            if (empty($user)) {
                $this->session->set_flashdata('MSG', ShowAlert("Invalid username or password.", "DD"));
                redirect(base_url() . "Admin/login", 'refresh');
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
                $sess_arr         = array("admin_id" => $admin_id, "admin_email" => $admin_email, "admin_type" => $admin_type, "admin_post" => $admin_post, "admin_name" => $admin_name);
                if ($user['admin_type'] == 1 || $user['admin_type'] == 2 || $user['admin_type'] == 3) {

                    $this->session->set_userdata($sess_arr);
                    redirect(base_url() . "Admin/Dashboard", 'refresh');
                    return true;
                }  else{

                    $this->session->set_flashdata('MSG',  ShowAlert("Invalid username or password.", "DD"));
                    redirect(base_url() . "Admin/login", 'refresh');
                    return true;
                }
            }
        }
    }
    public function logout()
    {
        $this->Admin_model->adminLogout();
        //$this->session->session_unset();
        $this->session->sess_destroy();
        redirect(base_url() . 'Users');
        exit();
    }
    public function users()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/user_management');
        $this->load->view('admin/footers/admin_footer');
    }
    public function feedback()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/feedback');
        $this->load->view('admin/footers/admin_footer');
    }
    public function feedback_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/feedback_view');
        $this->load->view('admin/footers/admin_footer');
    }
    //ajax call 
    public function getDetailsByuserId()
    {
        $response = array();
        $user_id = 'EXF090323';
        $password = '7696a05fbec5e54051b2e617a9';
        $curl_req = curl_init();
        $parameters = json_encode(array("user_id"=>$user_id,"password"=>$password));
        curl_setopt_array($curl_req, array(
            CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/sso_api/Sso_exchange_api/Authenticate',
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
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));
        $response = curl_exec($curl_req);
       // echo json_encode($response);exit();
        // if (curl_errno($curl_req)) {
        //     $error_msg = curl_error($curl_req);
        // }
        // curl_close($curl_req);

        // if (isset($error_msg)) {
        //     echo $error_msg;
        // }else{
        //     echo "Success";
        // }
       curl_close($curl_req);
       // exit();
       // var_dump(json_decode($response, true));
         $output = json_decode($response, true);
        
         $token = $output['data']['auth_token'];
         //echo $token;
        // echo json_encode($output);
        $input = $this->input->post('uid');
        $curl_req1 = curl_init();
        $parametersNew = json_encode(array("token"=>$token ,
        "input"=>$input,
         "search_by"=>2,   
           "user_id"=>"EXF090323"));
        curl_setopt_array($curl_req1, array(
            CURLOPT_URL => 'http://203.153.41.213:8071/php/BIS_2.0/sso_api/Sso_exchange_api/GetData',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => $parametersNew,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));
        $responseNew = curl_exec($curl_req1);
        $responseNew = json_decode($responseNew, true);
        // echo json_encode($output);
        // exit();

        // $response = array(
        //     'user_id' => 1800003549,
        //     'name' => 'D K AGRAWAL',
        //     'email' => 'agrawal@bis.org.in',
        //     'designation' => 'dummy1',
        //     'branch' => 'dummy2',
        //     'post' => 'dummy3',
        //     'department' => 'dummy4',
        // );


        // echo json_encode($response);exit();
        if (empty($responseNew)) {
            $data['status'] = 0;
            $data['message'] = 'Failed to get details , Please enter valid USER ID.';
        } else {
            $data['status'] = 1;
            $data['message'] = 'Details Available.';
            $data['data'] = $responseNew;
            $data['user'] = $responseNew['data'][0];
        }
        echo  json_encode($data);
    }
    public function admin_creation_form()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/admin_creation_form');
        $this->load->view('admin/footers/admin_footer');
    }

    public function addAdmin()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|max_length[30]|valid_email');
        // $this->form_validation->set_rules('designation', 'Designation', 'required|trim|max_length[50]');
        // $this->form_validation->set_rules('branch', 'Branch', 'required|trim|max_length[50]');
        // $this->form_validation->set_rules('post', 'Post', 'required|trim|max_length[50]');
        // $this->form_validation->set_rules('department', 'Department', 'required|trim|max_length[50]');
        // $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('MSG', ShowAlert(validation_errors(), "DD"));
            redirect(base_url() . "Admin/admin_creation_form", 'refresh');
            return false;
        } else {
            $uid        = clearText($this->input->post('uid'));
            $name        = clearText($this->input->post('name'));
            $email_id        = clearText($this->input->post('email'));
            // $designation        = clearText($this->input->post('designation'));
            // $branch        = clearText($this->input->post('branch'));
            // $post        = clearText($this->input->post('post'));
            // $department        = clearText($this->input->post('department'));
            // $username        = clearText($this->input->post('username'));
            //$random_pass	 = $this->randomPassword();
            $random_pass     = 12345678;
            //$newPw = password_hash($random_pass, PASSWORD_BCRYPT);
            $admin_type = 2;
            $data = array(
                'user_uid' => $uid,
                'name' => $name,
                'email_id' => $email_id,
                // 'designation' => $designation,
                // 'branch' => $branch,
                // 'post' => $post,
                // 'department' => $department,
                'is_active' => 1,
                'username' => $email_id,
                'password' => $random_pass,              
                'admin_type' => $admin_type
                //'created_on' => GetCurrentDateTime('Y-m-d h:i:s'),
            );
            $admin_id = $this->Admin_model->insertData($data);

            if ($admin_id) {

                // email to Admin to notify  start
                /*  $msg = "Dear " . $name .
                    " <p>You are added on the BIS Portal as Admin . Your login credentials for the portal are:
                    </p>
                    <p>Username: " . $username . "</p>
                    <p>Password: " . $random_pass . "</p>";
                $subject = "Login Credentials for the BIS Portal.";

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'exchangeforum1@gmail.com',
                    'smtp_pass' => 'niycbrjxnzfazrud',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                );

                $this->load->library('email', $config);
                $this->email->initialize($config); // add this line
                $this->email->set_newline("\r\n");
                $this->email->from('exchangeforum1@gmail.com', 'BIS');
                $this->email->to($email_id);
                $this->email->subject($subject);
                $this->email->message($msg);
                $this->email->send();
                // email code end
                */

                $this->session->set_flashdata('MSG', ShowAlert("New Admin added successfully", "SS"));
                redirect(base_url() . "Admin/admin_creation_list", 'refresh');
            } else {
                $this->session->set_flashdata('MSG', ShowAlert("Failed to create new admin,Please try again", "DD"));
                redirect(base_url() . "Admin/admin_creation_list", 'refresh');
            }
        }
    }
    public function getUniqueEmail()
    {
        $email = $this->input->get("email");
        $data = array();

        if ($email == '') {
            $data['status'] = 0;
            $data['message'] = 'Please enter email';
           
        } else if ($this->Admin_model->checkUniqueEmail($email)) {
            $data['status'] = 0;
            $data['message'] = 'This email already Exist.Please enter new Email address';
        } else {

            $data['status'] = 1;
            $data['message'] = 'New Email';
            //$data['data'] = $sub_categories;
        }
        echo  json_encode($data);
    }
    public function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function addbannerimg()
    {
       
        $banner_img = "bannerimg" . time() . '.jpg';
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '10000';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';
   
        $config['file_name'] = $banner_img;
       
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bannerimg')) 
        {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
        }
        $formdata['caption'] = $this->input->post('banner_caption');
        $formdata['banner_images'] = $banner_img;
   
        $this->Admin_model->bannerinsertData($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "admin/banner_image_list", 'refresh');
    }
   
    public function dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
 
    public function manageQuizList()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/manage_quiz_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function ongoingQuizList()
    {

         $getAllQb = $this->quiz_model->onGoingQuiz();
         print_r($getAllQb);
         exit;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/ongoing_quiz_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function closedQuizList()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/closed_quiz_list');
        $this->load->view('admin/footers/admin_footer');
    }       
    public function questionBankList()
    {
        $data = array();
        $data['allRecords'] = $this->Que_bank_model->getAllQueBankForApproval();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quebank/question_bank_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
   
    public function quiz(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/quiz_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
 
    public function exchange_forum()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/exchange_forum');
        $this->load->view('admin/footers/admin_footer');
    }
    public function cmsManagenent_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/cmsManagenent_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }

    public function banner_image_list()
    {
       
        $data['banner_data']=$this->Admin_model->bannerAllData();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/banner_image_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function edit_bannerimage($id){
        $data=$this->Admin_model->edit_bannerimage($id);
        //print_r($data); die;
        echo $data;
    }
    public function update_bannnerimage(){
       // print_r($_POST); die;
        $formdata['id'] = $this->input->post('id');
        //$formdata['title'] = $this->input->post('title');
        $formdata['caption'] = $this->input->post('banner_caption');  
      //  $formdata['image'] = $this->input->post('old_doc');   

       $oldDocument = "";
       $oldDocument = $this->input->post('old_img');
       $document = "";

            if (!empty($_FILES['bannerimg']['tmp_name'])) {
                $document = "banner_image" . time() . '.jpg';
                $config['upload_path'] = './uploads';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']    = '100000';
                $config['max_width']  = '3024';
                $config['max_height']  = '2024';
                $config['file_name'] = $document;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('bannerimg')) {
                    //$err[]=$this->upload->display_errors();
                    $data['status'] = 0;
                    $data['message'] = $this->upload->display_errors();
                }
                } else {
                    if (!empty($oldDocument)) {
                        $document =  $oldDocument;
                    }
                }   

        if($document){          
            $formdata['banner_images']=$document;
        }
        // $formdata['status']="1";
        $id = $this->Admin_model->updateBannerImage($formdata);
        if($id){
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "admin/banner_image_list", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "admin/banner_image_list", 'refresh');
        }
    }
    public function deleteBanner(){
        try {            
            $que_id = $this->input->post('que_id');
            $id = $this->Admin_model->deleteBanner($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));            

        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/banner_image_list", 'refresh');
    }

    public function about_exchange_forum()
    {
        $this->load->model('admin_model');     
        $data['about_exchange_forum']=$this->admin_model->aboutExchangeForumData();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/about_exchange_forum',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function add_about_exchange_forum(){
        $banner_img = "about_exchange_forum" . time() . '.jpg';
        $config['upload_path'] = './uploads';
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
        $formdata['description'] = $this->input->post('description');
        $formdata['image'] = $banner_img;
        $formdata['status']="created";

        $this->Admin_model->aboutExchangeForuminsertData($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "admin/about_exchange_forum", 'refresh'); 
    }
    public function update_about_exchange_forum(){
        //print_r([$_POST['old_image']]); die;
        $formdata['id'] = $this->input->post('id');
        //$formdata['title'] = $this->input->post('title');
        $formdata['description'] = $this->input->post('description');  
      //  $formdata['image'] = $this->input->post('old_doc');   

       $oldDocument = "";
       $oldDocument = $this->input->post('old_image');
       $document = "";

            if (!empty($_FILES['image']['tmp_name'])) {
                $document = "banner_image" . time() . '.jpg';
                $config['upload_path'] = './uploads';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']    = '250';
                $config['max_width']  = '3024';
                $config['max_height']  = '2024';
                $config['file_name'] = $document;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    //$err[]=$this->upload->display_errors();
                    $data['status'] = 0;
                    $data['message'] = $this->upload->display_errors();
                }
                } else {
                    if (!empty($oldDocument)) {
                        $document =  $oldDocument;
                    }
                }   
                // print_r($formdata); die;
        if($document){          
            $formdata['image']=$document;
        }
        // $formdata['status']="1";
        $id = $this->Admin_model->aboutExchangeForumupdateData($formdata);
        if($id){
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "admin/about_exchange_forum", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "admin/about_exchange_forum", 'refresh');
        }
    }
    public function deletExngForum(){
        try {            
            $que_id = $this->input->post('que_id');
            $id = $this->Admin_model->deletExngForum($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';

            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));            

        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/about_exchange_forum", 'refresh');
    }

    public function contact_us()
    {
        $this->load->model('admin_model');     
        $data['contact_us']=$this->admin_model->contactUsData();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/contact_us',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function add_contact_us(){
        $formdata['contact_no'] = $this->input->post('contact_no');
        $formdata['address'] = $this->input->post('address');
        $formdata['email'] = $this->input->post('email');
        $formdata['tele_fax'] = $this->input->post('tele_tax');
        $formdata['location'] = $this->input->post('location_url');
        //$formdata['image'] = $banner_img;
        //$formdata['status']="created";

        $this->Admin_model->addContactUsData($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "admin/contact_us", 'refresh');
    }
    public function edit_contactus($id){
        //echo "hello"; die;
        $this->load->model('admin_model');     
        $data=$this->admin_model->edit_contactus($id);
        //print_r($data); die;
        echo $data;
    }
    public function update_contactus(){
        $formdata['contact_no'] = $this->input->post('contact_no');
        $formdata['address'] = $this->input->post('address');
        $formdata['email'] = $this->input->post('email');
        $formdata['tele_fax'] = $this->input->post('tele_tax');
        $formdata['location'] = $this->input->post('location_url');
        $formdata['id'] = $this->input->post('id');

        $this->Admin_model->updateContactUsData($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
        //die;
        redirect(base_url() . "admin/contact_us", 'refresh');
    }

    public function deletContactus(){
        try {            
            $que_id = $this->input->post('que_id');
            $id = $this->Admin_model->deletContactus($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';

            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));            

        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/contact_us", 'refresh');
    }


    public function footer_links()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/footer_links');
        $this->load->view('admin/footers/admin_footer');
    }

    public function accessibility_Help()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/accessibility_Help');
        $this->load->view('admin/footers/admin_footer');
    }

    public function legal_view()
    {
        $this->load->model('admin_model');
        $data['legal']=$this->admin_model->legal();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/legal_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }

    public function other_links()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/other_links');
        $this->load->view('admin/footers/admin_footer');
    }

    public function useful_links()
    {
        $this->load->model('admin_model');
        $data['useful_link']=$this->admin_model->useful_links();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/useful_links',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function useful_links_web(){        
         $this->load->model('admin_model');
         $data=$this->admin_model->useful_links_web();
          echo $data;   
     }
    public function add_useful_links(){
        $banner_img = "useful_links" . time() . '.jpg';
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']    = '500';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';

        $config['file_name'] = $banner_img;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) 
        {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
            $this->session->set_flashdata('MSG', ShowAlert($data['message'], "SS"));
            // print_r( $data['message']);
            // die;
        }else{
            $formdata['title'] = $this->input->post('title');
            $formdata['image'] = $banner_img;
            $formdata['link']=$this->input->post('link');
            $this->load->model('admin_model');
            $this->Admin_model->add_useful_links($formdata);
            $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        }
       
        redirect(base_url() . "admin/useful_links", 'refresh');
    }

    public function edit_useful_links($id){
       // $this->load->model('admin_model');     
        $data=$this->Admin_model->edit_useful_links($id);
        //print_r($data); die;
        echo $data;
    }
    public function update_useful_links(){
        $formdata['id'] = $this->input->post('id');
        $formdata['title'] = $this->input->post('title');
       // $formdata['caption'] = $this->input->post('banner_caption');  
       $formdata['link'] = $this->input->post('link');   

       $oldDocument = "";
       $oldDocument = $this->input->post('old_img');
       $document = "";

            if (!empty($_FILES['image']['tmp_name'])) {
                $document = "banner_image" . time() . '.jpg';
                $config['upload_path'] = './uploads';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']    = '500';
                $config['max_width']  = '3024';
                $config['max_height']  = '2024';
                $config['file_name'] = $document;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    //$err[]=$this->upload->display_errors();
                    $data['status'] = 0;
                    $data['message'] = $this->upload->display_errors();
                }
                } else {
                    if (!empty($oldDocument)) {
                        $document =  $oldDocument;
                    }
                }   

        if($document){          
            $formdata['image']=$document;
        }
        // $formdata['status']="1";
        $id = $this->Admin_model->updateUsefulLinks($formdata);
        if($id){
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "admin/useful_links", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "admin/useful_links", 'refresh');
        } 
    }
    public function deleteUsefulLinks(){
        try{
        $que_id = $this->input->post('que_id');
            $id = $this->Admin_model->deleteUsefulLinks($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';

            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';

            }
            // echo  json_encode($data);
            // return true;
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));


        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/useful_links", 'refresh');
    }

    public function follow_us()
    {
        $this->load->model('admin_model');
        $data['follow_us']=$this->admin_model->follow_us();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/follow_us',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function followus_links_web(){
        $this->load->model('admin_model');
        $data=$this->admin_model->followus_links_web();
        // print_r($data); 
         echo $data;
    }
    public function add_follow_us(){
        $banner_img = "follow_us" . time() . '.jpg';
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '10000';
        $config['max_width']  = '3024';
        $config['max_height']  = '2024';

        $config['file_name'] = $banner_img;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('follow_us')) 
        {
            $data['status'] = 0;
            $data['message'] = $this->upload->display_errors();
        }
        //print_r($data); die;
        $formdata['title'] = $this->input->post('title');
        $formdata['icon'] = $banner_img;
        $formdata['link']=$this->input->post('link');
        $this->load->model('admin_model');
        $this->Admin_model->add_follow_us($formdata);
        $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
        redirect(base_url() . "admin/follow_us", 'refresh');
    }

    public function edit_followus($id){
        $data=$this->Admin_model->edit_followus($id);
        //print_r($data); die;
        echo $data;
    }
    public function update_followus(){
        $formdata['id'] = $this->input->post('id');
        $formdata['title'] = $this->input->post('title');
       // $formdata['caption'] = $this->input->post('banner_caption');  
       $formdata['link'] = $this->input->post('link');   

       $oldDocument = "";
       $oldDocument = $this->input->post('old_img');
       $document = "";

            if (!empty($_FILES['follow_us']['tmp_name'])) {
                $document = "banner_image" . time() . '.jpg';
                $config['upload_path'] = './uploads';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']    = '100000';
                $config['max_width']  = '3024';
                $config['max_height']  = '2024';
                $config['file_name'] = $document;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('follow_us')) {
                    //$err[]=$this->upload->display_errors();
                    $data['status'] = 0;
                    $data['message'] = $this->upload->display_errors();
                }
                } else {
                    if (!empty($oldDocument)) {
                        $document =  $oldDocument;
                    }
                }   

        if($document){          
            $formdata['icon']=$document;
        }
        // $formdata['status']="1";
        $id = $this->Admin_model->updateFollowUs($formdata);
        if($id){
            $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
            redirect(base_url() . "admin/follow_us", 'refresh');
        } else {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
            redirect(base_url() . "admin/follow_us", 'refresh');
        } 
    }
    public function deleteFollowUs(){
        try {
            //$encUserId = $this->session->userdata('user_id');
            //$user = encryptids("D", $encUserId);
            $que_id = $this->input->post('que_id');
            $id = $this->Admin_model->deleteFollowUs($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';

            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';

            }
            // echo  json_encode($data);
            // return true;
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));


        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/follow_us", 'refresh');
    }


    public function gallery()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/gallery');
        $this->load->view('admin/footers/admin_footer');
    }


    public function photos()
    {
        $this->load->model('admin_model');
        $data['photos']=$this->admin_model->allPhotos();        
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/photos',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function add_photos(){
        //    print_r($_POST); die;
            $banner_img = "photos" . time() . '.jpg';
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']    = '500';
            $config['max_width']  = '3024';
            $config['max_height']  = '2024';
    
            $config['file_name'] = $banner_img;
    
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) 
            {
                $data['status'] = 0;
                $data['message'] = $this->upload->display_errors();
            }
            //print_r($data); die;
            $formdata['title'] = $this->input->post('title');
            $formdata['image'] = $banner_img;    
            //print_r($formdata); die;    
            $this->load->model('admin_model');
            $this->Admin_model->addPhotos($formdata);
            $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
            redirect(base_url() . "admin/photos", 'refresh');
        }
    
        public function deletePhotos($que_id){
            // echo $que_id; die;
            $id=encryptids("D", $que_id);
            try {
                
                $id = $this->Admin_model->deletePhotos($id);
                if ($id) {
                    $data['status'] = 1;
                    $data['message'] = 'Deleted successfully.';
    
                } else {
                    $data['status'] = 0;
                    $data['message'] = 'Failed to delete, Please try again.';
    
                }              
                $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));
    
    
            } catch (Exception $e) {
                echo json_encode([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                ]);
                return true;
            }
            redirect(base_url() . "admin/photos", 'refresh');
        }
        public function edit_photos($id){
            $data=$this->Admin_model->edit_photos($id);
            //print_r($data); die;
            echo $data;
        }

        public function update_photo(){
            // print_r($_POST); die;
             $formdata['id'] = $this->input->post('id');
             //$formdata['title'] = $this->input->post('title');
             $formdata['title'] = $this->input->post('banner_caption');  
           //  $formdata['image'] = $this->input->post('old_doc');   
     
            $oldDocument = "";
            $oldDocument = $this->input->post('old_img');
            $document = "";
     
                 if (!empty($_FILES['bannerimg']['tmp_name'])) {
                     $document = "banner_image" . time() . '.jpg';
                     $config['upload_path'] = './uploads';
                     $config['allowed_types'] = 'gif|jpg|png|jpeg';
                     $config['max_size']    = '100000';
                     $config['max_width']  = '3024';
                     $config['max_height']  = '2024';
                     $config['file_name'] = $document;
     
                     $this->load->library('upload', $config);
     
                     if (!$this->upload->do_upload('bannerimg')) {
                         //$err[]=$this->upload->display_errors();
                         $data['status'] = 0;
                         $data['message'] = $this->upload->display_errors();
                     }
                     } else {
                         if (!empty($oldDocument)) {
                             $document =  $oldDocument;
                         }
                     }   
     
             if($document){          
                 $formdata['image']=$document;
             }
             // $formdata['status']="1";
             $id = $this->Admin_model->updatePhoto($formdata);
             if($id){
                 $this->session->set_flashdata('MSG', ShowAlert("Record Updated Successfully", "SS"));
                 redirect(base_url() . "admin/photos", 'refresh');
             } else {
                 $this->session->set_flashdata('MSG', ShowAlert("Failed to update record,Please try again", "DD"));
                 redirect(base_url() . "admin/photos", 'refresh');
             }
         }

        public function videos()
        {
            if($this->Admin_model->checkAdminLogin()){
            $this->load->model('Admin/Admin_model');
            $data['video'] = $this->Admin_model->allVideos();
            $this->load->view('admin/headers/admin_header');
            $this->load->view('admin/videos',$data);
            $this->load->view('admin/footers/admin_footer');
            }else{
                redirect(base_url()."Admin/login",'refresh');
            }
        }
        public function add_video(){
            $banner_img = "video" . time() . '.mp4';
                $config['upload_path'] = './uploads';
                $config['allowed_types'] = 'avi|mp4|3gp|mpeg|mpg|mov|mp3|flv|wmv';
                $config['max_size']    = '';
               
        
                $config['file_name'] = $banner_img;
        
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('video')) 
                {
                    $data['status'] = 0;
                    $data['message'] = $this->upload->display_errors();
                }
                //print_r($data); die;
                $formdata['title'] = $this->input->post('title');
                $formdata['video'] = $banner_img;    
                //print_r($formdata); die;    
                $this->load->model('admin_model');
                $this->Admin_model->addVideos($formdata);
                $this->session->set_flashdata('MSG', ShowAlert("Record Inserted Successfully", "SS"));
                redirect(base_url() . "admin/videos", 'refresh');
        }
        public function delete_video($que_id){
            try {
                //$encUserId = $this->session->userdata('user_id');
                //$user = encryptids("D", $encUserId);
                $que_id = $this->input->post('que_id');
                $id = $this->Admin_model->deleteVideos($que_id);
                if ($id) {
                    $data['status'] = 1;
                    $data['message'] = 'Deleted successfully.';
    
                } else {
                    $data['status'] = 0;
                    $data['message'] = 'Failed to delete, Please try again.';
    
                }
               
                $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));
    
    
            } catch (Exception $e) {
                echo json_encode([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                ]);
                return true;
            }
            redirect(base_url() . "admin/videos", 'refresh');
        }
    public function quiz_competition_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('quiz/quiz_competition_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function quiz_dashboard()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/quiz_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function admin_manage_quiz_list()
    {
        

      
        $allquize = $this->Admin_model->getAllQuize();
        $data = array();
        $data['allquize'] = $allquize; 
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/admin_manage_quiz_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function admin_manage_quiz_view($id)
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->model('Quiz/quiz_model');
        $data=array();
        $quiz = $this->quiz_model->viewQuiz($id);
        $quizdata=array();
        $data['quizdata']=$quiz; 
        //End Quize Data

        //Get First Prize data
        $prize_id=1;
        $prize = $this->quiz_model->getPrizeId($prize_id,$id); 
        $data['firstprize']=$prize;
        //end First Prizr Data

        //get Second Prize Data
        $prize_id=2;
        $prize = $this->quiz_model->getPrizeId($prize_id,$id); 
        $data['secondprize']=$prize;
        //End Second Prize data

        //get Third Prize Data
        $prize_id=3;
        $prize = $this->quiz_model->getPrizeId($prize_id,$id); 
        $data['thirdprize']=$prize;
        //End Third Prize data

        //get Fourth Prize Data
        $prize_id=4;
        $prize = $this->quiz_model->getPrizeId($prize_id,$id); 
        $data['fourthprize']=$prize;
        
        $this->load->view('admin/admin_manage_quiz_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function admin_ongoing_quiz_list()
    {
        $this->load->view('admin/headers/admin_header');;
        $this->load->model('admin_model');
        $allquize = $this->admin_model->onGoingQuiz();
        $data = array();
        $data['allquize'] = $allquize;
        $this->load->view('admin/admin_ongoing_quiz_list', $data);
        $this->load->view('admin/footers/admin_footer');
    }
 
    public function admin_ongoing_quiz_view() 
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->model('Admin/quiz_model');
        $data=array();
        $quiz = $this->quiz_model->viewQuiz($id);
        $quizdata=array();
        $data['quizdata']=$quiz; 
        
        
        $this->load->view('admin/admin_ongoing_quiz_view',$data); 
        $this->load->view('admin/footers/admin_footer');
    }
    public function admin_closed_quiz_list()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/admin_closed_quiz_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function admin_closed_quiz_view()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/admin_closed_quiz_view');
        $this->load->view('admin/footers/admin_footer');
    }
    
    public function admin_closed_quiz_submission()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/admin_closed_quiz_submission');
        $this->load->view('admin/footers/admin_footer');
    }
    public function question_bank_list()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/question_bank_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function question_bank_view()
    {

        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/question_bank_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function admin_creation_list()
    {
        $pageData = array();
        $encAdminId = $this->session->userdata('admin_id');
        $admin_id = encryptids("D", $encAdminId);

        $pageData['page_menu_select'] = "view_admin";
        $admintype = encryptids("D", $this->session->userdata('admin_type'));
        $allRecords = $this->Admin_model->getAllAdmin();
        $pageData['allRecords'] = $allRecords;

        if ($admintype == 1) {
            if (!$this->Admin_model->checkAdminLogin()) {
                redirect(base_url() . "Admin", 'refresh');
                return true;
            }
            $pageData['page_title'] = 'Add Admin';
            $this->load->view('admin/headers/admin_header');
            $this->load->view('admin/admin_creation_list', $pageData);
            $this->load->view('admin/footers/admin_footer');
        }else{
           // echo "You are not allowed";
            $this->session->set_flashdata('MSG', ShowAlert("Sorry! You are Not eligible to perform this action", "DD"));
                redirect(base_url() . "Admin/dashboard", 'refresh');
        }
    }
    public function admin_creation_view()
    {
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/admin_creation_view');
        $this->load->view('admin/footers/admin_footer'); 
    }  

    public function updateQuizStatus($id)
    {
        $this->load->model('Admin/Admin_model');
        $formdata['status'] = $this->input->post('status_id');
        $formdata['remark'] = $this->input->post('remark');

        $encAdminId = $this->session->userdata('admin_id');
            $modify_by = encryptids("D", $encAdminId);

            $formdata['modify_by'] = $modify_by;
            $formdata['modify_on'] = date('Y-m-d : h:i:s'); 
        $quiz_id = $this->Admin_model->updateQuizStatus($id,$formdata);
        if ($quiz_id==1) 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Quiz Send for Approve", "SS"));
                redirect(base_url() . "Quiz/quiz_list", 'refresh');
        }
        else 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Send for Approve admin,Please try again", "DD"));
            redirect(base_url() . "Quiz/quiz_list", 'refresh');
        }
    }  
 
      
    public function your_wall_list(){
          
        // $data['yourwall']=$this->Your_wall_model->allYourwall();
      //  print_r($data['yourwall']); die;
      $data['archive']=$this->Your_wall_model->all_archievd(); 
      $data['created']=$this->Your_wall_model->allbycreated();
      $data['approved']=$this->Your_wall_model->allbyapproved();
      $data['rejected']=$this->Your_wall_model->allbyrejected();
    // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/your_wall_list_new',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function approve_yourwall(){
        try {            
            $this->load->model('admin/Your_wall_model');
            $que_id = $this->input->post('que_id');
            $id = $this->Your_wall_model->approveYourwall($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Approved successfully.';                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to approve, Please try again.';               
            }
            // echo  json_encode($data);
            // return true;
            $this->session->set_flashdata('MSG', ShowAlert($data['message'], "SS"));           
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/your_wall_list", 'refresh');
    }
    public function your_wall_view($id){
        $id = encryptids("D", $id);
        $data['data']=$this->Your_wall_model->get_yourwallData($id);
       // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/your_wall_view',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function approveYourwall(){
        try {            
            $this->load->model('admin/Your_wall_model');
            $que_id = $this->input->post('que_id');
            $id = $this->Your_wall_model->approveYourwall($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }           
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/photos", 'refresh');
    }
    public function reject_yourwall(){
        $this->load->model('admin/Your_wall_model');   
         $formdata['id'] = $this->input->post('id');
         $formdata['reject_reason'] = $this->input->post('reason');
         $formdata['status']="4";
 
         $id = $this->Your_wall_model->reject($formdata);
        //  print_r($id); die;
         if($id){
             $this->session->set_flashdata('MSG', ShowAlert("Record Rejected", "SS"));
             redirect(base_url() . "admin/your_wall_list", 'refresh');
         } else {
             $this->session->set_flashdata('MSG', ShowAlert("Failed to update reject,Please try again", "DD"));
             redirect(base_url() . "admin/your_wall_list", 'refresh');
         } 
    }
    public function restore_yourwall(){
        try {            
            $this->load->model('admin/Your_wall_model');
            $que_id = $this->input->post('que_id');
            $id = $this->Your_wall_model->restore($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Approved successfully.';                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to approve, Please try again.';               
            }
            // echo  json_encode($data);
            // return true;
            $this->session->set_flashdata('MSG', ShowAlert($data['message'], "SS"));           
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/your_wall_list", 'refresh');
    }
    public function archive_yourwall(){
        try {            
            $this->load->model('admin/Your_wall_model');
            $que_id = $this->input->post('que_id');
            $id = $this->Your_wall_model->archive($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Approved successfully.';                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to approve, Please try again.';               
            }
            // echo  json_encode($data);
            // return true;
            $this->session->set_flashdata('MSG', ShowAlert($data['message'], "SS"));           
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/your_wall_list", 'refresh');
    }
    public function yourwallPublish(){
        try {            
            $this->load->model('admin/Your_wall_model');
            $que_id = $this->input->post('que_id');
            $id = $this->Your_wall_model->yourwallPublish($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';
               
            }
            // echo  json_encode($data);
            // return true;
            $this->session->set_flashdata('MSG', ShowAlert("Record Published Successfully", "SS"));
            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/view_yourwall", 'refresh');
    }
    public function deletYourwall(){
        try {   
                 
            $que_id = $this->input->post('que_id');
            $id = $this->Your_wall_model->deletYourwall($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/yourwall", 'refresh');
    }
    public function yourwallUnpublish(){
      //  echo "hi"; die;
        try {   
                 
            $que_id = $this->input->post('que_id');
            $id = $this->Your_wall_model->yourwallUnpublish($que_id);
            if ($id) {
                $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));
                
            } else {
                $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));               
            }
            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/yourwall", 'refresh');
    } 
    public function byTheMentors(){
        $this->load->model('admin/By_the_mentor_model');  
        // $this->load->model('admin/By_the_mentor_model');        
        $data['archive']=$this->By_the_mentor_model->all_archievd_btm();      
        // $data['bythementors']=$this->By_the_mentor_model->allbtm();
        $data['created']=$this->By_the_mentor_model->allbtmbycreated();
        $data['approved']=$this->By_the_mentor_model->allbtmbyapproved();
        $data['rejected']=$this->By_the_mentor_model->allbtmbyrejected();
        // print_r($data); die;
    //    print_r($data['bythementors']); die;
        $this->load->view('admin/headers/admin_header');
       // $this->load->view('users/by_the_montor_list',$data);
        $this->load->view('users/btm_list_new',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function rejectbtTheMentor(){
        // print_r($_POST);
        // die;
        $this->load->model('admin/By_the_mentor_model');   
         $formdata['id'] = $this->input->post('id');
         $formdata['reject_reason'] = $this->input->post('reason');
         $formdata['status']="4";
 
         $id = $this->By_the_mentor_model->rejectbtm($formdata);
        //  print_r($id); die;
         if($id){
             $this->session->set_flashdata('MSG', ShowAlert("Record Rejected", "SS"));
             redirect(base_url() . "admin/byTheMentors", 'refresh');
         } else {
             $this->session->set_flashdata('MSG', ShowAlert("Failed to update reject,Please try again", "DD"));
             redirect(base_url() . "admin/byTheMentors", 'refresh');
         } 
      }
    public function view_btm($id){
        $this->load->model('admin/By_the_mentor_model');
        $data['data']=$this->By_the_mentor_model->get_btm($id);
       // print_r($data); die;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('users/view_by_the_mentors_details',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function bythementor_archivelist(){
        $this->load->model('admin/By_the_mentor_model');        
        $data['bythementors']=$this->By_the_mentor_model->all_archievd_btm();
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/archived_by_the_mentors',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function btm_publish(){
        try {            
            $this->load->model('admin/By_the_mentor_model');
            $que_id = $this->input->post('que_id');
            $id = $this->By_the_mentor_model->btmPublish($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Publish successfully.';
                
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to publish, Please try again.';
                // $this->session->set_flashdata('MSG', ShowAlert("Failed!", "SS"));
            }   
            $this->session->set_flashdata('MSG', ShowAlert("Record Published Successfully", "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/view_btm", 'refresh');
    }
    public function btm_unpublish(){
        try {   
            $this->load->model('admin/By_the_mentor_model');         
            $que_id = $this->input->post('que_id');
            $id = $this->By_the_mentor_model->btm_Unpublish($que_id);
            if ($id) {
                
                $data['status'] = 1;
                $data['message'] = 'Record Unpublished.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to unpublish.';           
            }
            
            $this->session->set_flashdata('MSG', ShowAlert("Record UnPublished Successfully", "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/view_btm", 'refresh');
    }
    public function btm_archive(){
        try {   
            $this->load->model('admin/By_the_mentor_model');         
            $que_id = $this->input->post('que_id');
            $id = $this->By_the_mentor_model->btm_archive($que_id);
            if ($id) {
                
                $data['status'] = 1;
                $data['message'] = 'Record Archived.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to Archive.';           
            }
            
            $this->session->set_flashdata('MSG', ShowAlert("Record Archives Successfully", "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/bythementor_archivelist", 'refresh');
    } 

    public function btm_unarchive(){
        try {   
            $this->load->model('admin/By_the_mentor_model');         
            $que_id = $this->input->post('que_id');
            $id = $this->By_the_mentor_model->btm_unarchive($que_id);
            if ($id) {
                
                $data['status'] = 1;
                $data['message'] = 'Record Unarchived.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to Unarchive.';           
            }
            return $data;
            
           // $this->session->set_flashdata('MSG', ShowAlert("Record Unarchives Successfully", "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/byTheMentors", 'refresh');
    } 
    public function approve_btm(){
        try {   
            $this->load->model('admin/By_the_mentor_model');         
            $que_id = $this->input->post('que_id');
            $id = $this->By_the_mentor_model->btm_approve($que_id);
            if ($id) {
                
                $data['status'] = 1;
                $data['message'] = 'Record Archived.';
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to Archive.';           
            }
            
            $this->session->set_flashdata('MSG', ShowAlert("Record Approve Successfully", "SS"));
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/byTheMentors", 'refresh');
    }
    
    public function deleteByTheMentor(){
        try {   
            $this->load->model('admin/By_the_mentor_model');         
            $que_id = $this->input->post('que_id');
            $id = $this->By_the_mentor_model->delet_btm($que_id);
            if ($id) {
                $data['status'] = 1;
                $data['message'] = 'Deleted successfully.';
                
            } else {
                $data['status'] = 0;
                $data['message'] = 'Failed to delete, Please try again.';               
            }
            $this->session->set_flashdata('MSG', ShowAlert("Record Deleted Successfully", "SS"));            
            
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
            return true;
        }
        redirect(base_url() . "admin/view_btm", 'refresh');
    }
    // public function join_the_classroom(){
    //     $this->load->view('admin/headers/admin_header');
    //     $this->load->view('users/join_the_classroom',$data);
    //     $this->load->view('admin/footers/admin_footer');
    // }

    public function join_the_classroom_dashboard(){
        $this->load->view('admin/headers/admin_header');
         $this->load->view('admin/join_the_classroom_dashboard');
         $this->load->view('admin/footers/admin_footer');
    } 
    public function Manage_session_list(){

        $newRequest = $this->Standards_Making_model->getnewRequest();
        $ApprovedRequest = $this->Standards_Making_model->getApprovedRequest();
        $RejectedRequest = $this->Standards_Making_model->getRejectedRequest();
        $PublishedRequest = $this->Standards_Making_model->getPublishedRequest();
        $ArchiveRequest = $this->Standards_Making_model->getArchiveRequest();
        $data = array();
        $data['newRequest'] = $newRequest;
        $data['ApprovedRequest'] = $ApprovedRequest;
        $data['RejectedRequest'] = $RejectedRequest;
        $data['PublishedRequest'] = $PublishedRequest;
        $data['ArchiveRequest'] = $ArchiveRequest;
        $this->load->view('admin/headers/admin_header');
         $this->load->view('admin/Manage_session_list',$data);
         $this->load->view('admin/footers/admin_footer');
    }

    public function manage_lsv_standards_list(){

        $newRequest = $this->Learningscience_model->getnewRequest();
        $ApprovedRequest = $this->Learningscience_model->getApprovedRequest();
        $RejectedRequest = $this->Learningscience_model->getRejectedRequest();
        $PublishedRequest = $this->Learningscience_model->getPublishedRequest();
        $ArchiveRequest = $this->Learningscience_model->getArchiveRequest();

        $data = array();
        $data['newRequest'] = $newRequest;
        $data['ApprovedRequest'] = $ApprovedRequest;
        $data['RejectedRequest'] = $RejectedRequest;
        $data['PublishedRequest'] = $PublishedRequest;
        $data['ArchiveRequest'] = $ArchiveRequest;
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/manage_lsv_standards_list',$data);
        $this->load->view('admin/footers/admin_footer');
    }
    public function live_session_view($id){
        $id = encryptids("D", $id);
        $data=array();
        $liveSessionView = $this->Standards_Making_model->liveSessionViewView($id); 
        $data['liveSession']=$liveSessionView;

        $this->load->view('admin/headers/admin_header');
         $this->load->view('admin/live_session_view',$data);
         $this->load->view('admin/footers/admin_footer');
    }
     public function lsv_standards_view($id){
        $id = encryptids("D", $id);
        $data=array();
        $liveSessionView = $this->Learningscience_model->lsvStandardsViewAdmin($id); 
        $data['liveSession']=$liveSessionView;

        $this->load->view('admin/headers/admin_header');
         $this->load->view('admin/lsv_standards_view',$data);
         $this->load->view('admin/footers/admin_footer');
    }
    
    public function live_session_list(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/live_session_list');
        $this->load->view('admin/footers/admin_footer');
    }
 

    public function updateLiveSessiionStatus($id)
    {
        $this->load->model('Admin/Admin_model');
        $formdata['status'] = $this->input->post('status_id');
        $formdata['reason'] = $this->input->post('remark');

        $encAdminId = $this->session->userdata('admin_id');
            $modify_by = encryptids("D", $encAdminId);

            $formdata['modify_by'] = $modify_by;
            $formdata['updated_on'] = date('Y-m-d : h:i:s'); 
        $quiz_id = $this->Admin_model->updateLiveSessiionStatus($id,$formdata);
        if ($quiz_id==1) 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Status Updated", "SS"));
                redirect(base_url() . "admin/Manage_session_list", 'refresh');
        }
        else 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Update,Please try again", "DD"));
            redirect(base_url() . "Quiz/quiz_list", 'refresh');
        }
    } 

    public function updateLvsStandarStatus($id)
    {
        $this->load->model('Admin/Admin_model');
        $formdata['status'] = $this->input->post('status_id');
        $formdata['reason'] = $this->input->post('remark');

        $encAdminId = $this->session->userdata('admin_id');
            $modify_by = encryptids("D", $encAdminId);

            $formdata['modify_by'] = $modify_by;
            $formdata['updated_on'] = date('Y-m-d : h:i:s'); 
        $quiz_id = $this->Learningscience_model->updateLvsStandarStatus($id,$formdata);
        if ($quiz_id==1) 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Status Updated", "SS"));
                redirect(base_url() . "admin/manage_lsv_standards_list", 'refresh');
        }
        else 
        {
            $this->session->set_flashdata('MSG', ShowAlert("Failed to Update,Please try again", "DD"));
            redirect(base_url() . "admin/manage_lsv_standards_list", 'refresh');
        }
    }

 
    public function learning_science_list(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/learning_science_list');
        $this->load->view('admin/footers/admin_footer');
    }
    public function learning_science_form(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/learning_science_form');
        $this->load->view('admin/footers/admin_footer');
    }
    public function learning_science_edit(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/learning_science_edit');
        $this->load->view('admin/footers/admin_footer');
    }
    public function learning_science_view(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/learning_science_view');
        $this->load->view('admin/footers/admin_footer');
    }
    public function learning_science_archived(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/learning_science_archived');
        $this->load->view('admin/footers/admin_footer');
    }
    public function learning_science_dashboard(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/learning_science_dashboard');
        $this->load->view('admin/footers/admin_footer');
    }
    public function bt_the_mentorList(){
        $this->load->view('admin/headers/admin_header');
        $this->load->view('admin/bt_the_mentorList');
        $this->load->view('admin/footers/admin_footer');
    }
  
 
    
}
