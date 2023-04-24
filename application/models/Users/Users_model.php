 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Users_model extends CI_Model
    {
        public function  insertData($data)
        {
            if ($this->db->insert('tbl_users', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }

        //  public function checkUniqueEmail($email)
        //  {
        //      $myQuery = "SELECT a.email_id FROM  tbl_admin a WHERE a.user_email = '{$email}' ";
        //      $query = $this->db->query($myQuery);
        //      if ($query->num_rows() > 0) {
        //          return true;
        //      } else {
        //          return false;
        //      }
        //  }
        public function updateData($id, $data)
        {
            $this->db->where('id', $id);
            if ($this->db->update('tbl_users', $data)) {
                return true;
            } else {
                return false;
            }
        }

        public function deleteData($id)
        {
            $this->db->where('id', $id);
            if ($this->db->delete('tbl_users')) {
                return true;
            } else {
                return false;
            }
        }

        public function toCheckUserExist($user_id)
        {
            $this->db->where('user_id', $user_id);

            $query = $this->db->get('tbl_users');
            $row = array();
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function checkAdminLogin()
        {
            $enc_user_id = $this->session->userdata('admin_id');
            if ($enc_user_id) {
                $dec_user_id = encryptids("D", $enc_user_id);
                if ($dec_user_id > 0) {
                    $is_gen_user = $this->db->get_where("tbl_users", array("user_id" => $dec_user_id, "status_id" => 1))->num_rows();
                    if ($is_gen_user > 0) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        public function getUsersDetailsByUserId($user_id)
        {
            $this->db->where('user_id', $user_id);
            $this->db->where('status_id',1);           
            $query = $this->db->get('tbl_users');
            $row = array();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
            }
            return $row;
        }
        // public function getLoginUsers($username,$password)
        // {
        //     $this->db->where('username',$username);
        // 	$this->db->where('password',$password);
        //     //$this->db->where('is_active',1);
        // 	$query=$this->db->get('tbl_admin');  
        //     $row=array();
        //     if ($query->num_rows() > 0){
        //         $row = $query->row_array();
        //     }
        //     return $row;          	

        // }
        public function viewQuiz($id)
        {
            $this->db->select('tbl_quiz_details.*,
            tbl_mst_language.title as language,
            tbl_mst_quiz_availability.title as availability,
            tbl_mst_quiz_level.title as level,
            tbl_mst_regions.uvc_region_title as region
            ');
            $this->db->where('tbl_quiz_details.id', $id);
            $this->db->join('tbl_mst_language', 'tbl_mst_language.id = tbl_quiz_details.language_id');
            $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id = tbl_quiz_details.availability_id');
            $this->db->join('tbl_mst_quiz_level', 'tbl_mst_quiz_level.id = tbl_quiz_details.quiz_level_id');
            $this->db->join('tbl_mst_regions', 'tbl_mst_regions.pki_region_id = tbl_quiz_details.region_id','left');
            return $this->db->get('tbl_quiz_details')->row_array();
        }

    public function viewQuestion($id)
    {  
        $this->db->where('id',$id); 
        $quiz = $this->db->get('tbl_quiz_details')->row_array();
        $que_bank_id= $quiz['que_bank_id'];
        $total_question= $quiz['total_question'];
        $query = $this->db->query("SELECT * FROM tbl_que_details WHERE que_bank_id='$que_bank_id' ORDER BY RAND ( ) LIMIT $total_question");
        return $query->result_array();   
    }  
    

    public function insertQuestion($formdata)
    {
        $this->db->insert('tbl_user_quiz',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
   

    public function getAllQuize()
    {   
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status'); 
        return $this->db->get('tbl_quiz_details')->result_array();  
    }

      

    public function insertQuziSubmission($formdata)
    { 
        $this->db->insert('tbl_quiz_submission_details',$formdata); 
        return $insert_id = $this->db->insert_id();
    } 
    public function getCorrectAns($quiz_id,$user_id)
    {  
         $query = $this->db->query("SELECT * FROM tbl_user_quiz WHERE selected_op=corr_opt AND user_id='$user_id' AND quiz_id='$quiz_id'");
        return $query->num_rows();
    }
    public function getWrongAns($quiz_id,$user_id)
    {  
         $query = $this->db->query("SELECT * FROM tbl_user_quiz WHERE selected_op!=corr_opt AND user_id='$user_id' AND quiz_id='$quiz_id'");
        return $query->num_rows();
    }

    public function getNotSelected($quiz_id,$user_id)
    {  
         $query = $this->db->query("SELECT * FROM tbl_user_quiz WHERE selected_op=0 AND user_id='$user_id' AND quiz_id='$quiz_id'");
        return $query->num_rows();
    }
    public function getTotalmarkAndQuestion($id)
    {  
         $this->db->where('id',$id); 
         return $quiz = $this->db->get('tbl_quiz_details')->row_array(); 
    }

    
    public function checkUserAvailable($quiz_id,$user_id)
    {  
         $query = $this->db->query("SELECT * FROM tbl_quiz_submission_details WHERE user_id='$user_id' AND quiz_id='$quiz_id'");
        return $query->num_rows();
    }

    public function getUserAllQuize()
    {   
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name'); 
        $this->db->where('(date(now()) BETWEEN start_date AND end_date)'); 
        $this->db->where('tbl_quiz_details.status',5); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status'); 
        return $this->db->get('tbl_quiz_details')->result_array();  
    }

    public function getStdClubQuize($user_region_id,$user_branch_id)
    {   
        $t=time();

        $current_time = (date("H:i:s",$t));
        $this->db->select('quiz.*,st.status_name'); 
        $this->db->from('tbl_quiz_details quiz');
        $this->db->join('tbl_mst_status st','st.id = quiz.status'); 
        $this->db->where('(date(now()) BETWEEN quiz.start_date AND quiz.end_date)'); 
        // $this->db->where('('.$current_time.' BETWEEN quiz.start_time AND quiz.end_time)'); 
        $this->db->where('quiz.start_time <=' ,$current_time); 
        $this->db->where('quiz.end_time >=' ,$current_time); 
        $this->db->where('quiz.status',5); 
      
        //$this->db->where_in('quiz.branch_id',array($user_branch_id,0));
        $this->db->where_in('quiz.region_id',array($user_region_id,0));
        $rs = array();
        $query=$this->db->get();
        if($query->num_rows() > 0){
            $rs = $query->result_array();
        }
        return $rs;  
    }
    public function contact_us(){
        $this->db->select('*');
        $this->db->from('tbl_contact_us_detail');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res[0];

    }
     
   public function about_exchange_forum(){
    $this->db->select('*');
    $this->db->from('tbl_about_exchange_forum');
    $query=$this->db->get();
        $res=$query->result_array();
        return $res[0];
   }
   public function get_legal_data($data){
    $this->db->select($data);
    $this->db->from('tbl_legel');
    $query=$this->db->get();
    $data=$query->result_array();
    return $data[0];
 }

  
    public function checkUserAttempt($user_id='',$quiz_id='')
   {
        $this->db->where('user_id',$user_id); 
        $this->db->where('quiz_id',$quiz_id); 
        $quiz = $this->db->get('tbl_user_quiz_attempt')->row_array();
        if (empty($quiz))
        {
            $formdata['user_id']=$user_id;
            $formdata['quiz_id']=$quiz_id;
            $formdata['user_counter']=1;
             $this->db->insert('tbl_user_quiz_attempt',$formdata); 
             $insert_id = $this->db->insert_id();
             if ($insert_id) {
                $this->db->where('user_id',$user_id); 
                $this->db->where('quiz_id',$quiz_id); 
                return $this->db->get('tbl_user_quiz_attempt')->row_array();
            }
        }
        else
        {   
            $formdata['user_counter']=2;
            $this->db->where('user_id', $user_id);
            $this->db->where('quiz_id', $quiz_id);
            $update = $this->db->update('tbl_user_quiz_attempt', $formdata); 
            if ($update==1) {
                $this->db->where('user_id',$user_id); 
                $this->db->where('quiz_id',$quiz_id); 
                return $this->db->get('tbl_user_quiz_attempt')->row_array();
            }

        }
        
   }
   // In Conversation With Experts  Function Start For FrontEnd
    public function getPublishedConversation()
    {   
        $this->db->select('tbl_inconversation_with_expert.*,tbl_mst_status.status_name'); 
         $this->db->where('status ',5); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_inconversation_with_expert.status'); 
        return $this->db->get('tbl_inconversation_with_expert')->result_array();  
    }

    public function getRecentSearch()
    {   
        $this->db->select('tbl_inconversation_with_expert.*,tbl_mst_status.status_name'); 
         $this->db->where('status ',5); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_inconversation_with_expert.status'); 
        $this->db->limit(5);
        return $this->db->get('tbl_inconversation_with_expert')->result_array();  
    }
    public function getConversation($id)
    {
        $this->db->where('id',$id); 
        return $quiz = $this->db->get('tbl_inconversation_with_expert')->row_array();
    }
    public function checkConversationView($id,$ip_address)
    {
        $this->db->where('conversation_id',$id); 
        $this->db->where('ip_address',$ip_address); 
        $info = $this->db->get('tbl_conversation_video_info')->row_array();
        if (empty($info))
        {
            $formdata['conversation_id']=$id;
            $formdata['ip_address']=$ip_address;
            $formdata['user_view']=1; 
             $this->db->insert('tbl_conversation_video_info',$formdata); 
             $insert_id = $this->db->insert_id();
             if ($insert_id) {
                $query = $this->db->query("SELECT * FROM tbl_conversation_video_info");
                $viewcount=$query->num_rows();
                $formdata2['views']=$viewcount;
                $this->db->where('id',$id); 
                return $update = $this->db->update('tbl_inconversation_with_expert', $formdata2); 
            }
        }
        else
        {   
            return 0;  
        }
    }

    public function CheckLiveSessionlike($id,$admin_id)
     { 

        $this->db->where('classroom_id',$id); 
        $this->db->where('admin_id',$admin_id); 
       return $info = $this->db->get('tbl_join_the_classroom_info')->row_array(); 
    }

    public function getLikes($id,$ip_address)
    { 
        $this->db->where('conversation_id',$id); 
        $this->db->where('ip_address',$ip_address); 
        return $info = $this->db->get('tbl_conversation_video_info')->row_array(); 
    }

     public function updateLikes($id,$ip_address)
     {
        $this->db->where('conversation_id', $id);
        $this->db->where('ip_address', $ip_address);
        $data['user_like']=1;
        if ($this->db->update('tbl_conversation_video_info', $data)) 
        {
            $query = $this->db->query("SELECT * FROM tbl_conversation_video_info WHERE user_like=1 AND conversation_id=$id");
            $viewcount=$query->num_rows();
            $formdata2['likes']=$viewcount;
            $this->db->where('id',$id); 
            $update = $this->db->update('tbl_inconversation_with_expert', $formdata2);
            if ($update) 
            {
                return true;
            }
            else
            {
                return false;
            }
            
        } 
        else  { return false; }
    }
    public function updateLiveSessionLikes($id,$admin_id)
     {
        $this->db->where('classroom_id', $id);
        $this->db->where('admin_id', $admin_id);
        $data['user_likes']=1;
        if ($this->db->update('tbl_join_the_classroom_info', $data)) 
        {
            $query = $this->db->query("SELECT * FROM tbl_join_the_classroom_info WHERE user_likes=1 AND classroom_id=$id");
            $viewcount=$query->num_rows();
            $formdata2['likes']=$viewcount;
            $this->db->where('id',$id); 
            $update = $this->db->update('tbl_join_the_classroom', $formdata2);
            if ($update) 
            {
                return true;
            }
            else
            {
                return false;
            }
            
        } 
        else  { return false; }
    }
   // In Conversation With Experts  Function End For FrontEnd

    // Item Proposal Function Start For FrontEnd
    public function insertItemProposal($formdata)
    { 
        $this->db->replace('tbl_item_proposal',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function ItemProposalCount()
    {
        return $quiz = $this->db->get('tbl_item_proposal')->result_array(); 
    }
    public function getItemProposal($id)
    {   
        $this->db->where('id',$id); 
        return $quiz = $this->db->get('tbl_item_proposal')->row_array();
    }
    // Item Proposal Function End For FrontEnd

    // Join The classroom Function Start For FrontEnd
    public function getUpcomingsSessions()
    {
        $this->db->where('status ',5); 
        $this->db->order_by('created_on', 'desc'); 
       return $quiz = $this->db->get('tbl_join_the_classroom')->result_array();
    }
    public function getLiveSessions()
    {
        $this->db->where('type_of_post',3); 
        $this->db->where('status ',5); 
        $this->db->order_by('created_on', 'desc'); 
        return $quiz = $this->db->get('tbl_join_the_classroom')->result_array();
    }

    public function getLatestPosts()
    {
        $this->db->where('type_of_post',1); 
        $this->db->where('status ',5); 
        $this->db->order_by('created_on', 'desc'); 
       return $quiz = $this->db->get('tbl_join_the_classroom')->result_array();
    }
    public function getInformativeVideo()
    {
        $this->db->where('type_of_post',2); 
        $this->db->where('status ',5); 
        $this->db->order_by('created_on', 'desc'); 
       return $quiz = $this->db->get('tbl_join_the_classroom')->result_array();
    }

    public function getJoinTheClassroomContaint($id)
    {   
        $this->db->where('id',$id);  
        return $quiz = $this->db->get('tbl_join_the_classroom')->row_array();
    } 
    // Join The classroom Function End For FrontEnd

    // learning Standerd Function Start For FrontEnd
    public function getlearningStanderdSessions()
    {
        $this->db->where('type_of_post',3); 
        $this->db->where('status ',5); 
        $this->db->order_by('created_on', 'desc'); 
       return $quiz = $this->db->get('tbl_learning_science_via_standards')->result_array();
    }

    public function getlearningStanderdPosts()
    {
        $this->db->where('type_of_post',1); 
        $this->db->where('status ',5); 
        $this->db->order_by('created_on', 'desc'); 
       return $quiz = $this->db->get('tbl_learning_science_via_standards')->result_array();
    }
    public function getlearningStanderdInformativeVideo()
    {
        $this->db->where('type_of_post',2); 
        $this->db->where('status ',5); 
        $this->db->order_by('created_on', 'desc'); 
       return $quiz = $this->db->get('tbl_learning_science_via_standards')->result_array();
    }

    public function getContaintlearningStanderd($id)
    {   
        $this->db->where('id',$id);  
        return $quiz = $this->db->get('tbl_learning_science_via_standards')->row_array();
    }
    // learning Standerd Function End For FrontEnd


public function checkClassroomView($id,$admin_id)
    {
        $this->db->where('classroom_id',$id); 
        $this->db->where('admin_id',$admin_id); 
        $info = $this->db->get('tbl_join_the_classroom_info')->row_array();
        if (empty($info))
        {
            $formdata['classroom_id']=$id;
            $formdata['admin_id']=$admin_id;
            $formdata['user_view']=1; 
             $this->db->insert('tbl_join_the_classroom_info',$formdata); 
             $insert_id = $this->db->insert_id();
             if ($insert_id) {
                $query = $this->db->query("SELECT * FROM tbl_join_the_classroom_info WHERE classroom_id='$id'");
                $viewcount=$query->num_rows();
                $formdata2['views']=$viewcount;
                $this->db->where('id',$id); 
                return $update = $this->db->update('tbl_join_the_classroom', $formdata2); 
            }
        }
        else
        {   
            return 0;  
        }
    }


    public function checkleasrningView($id,$admin_id)
    {
        $this->db->where('learning_id',$id); 
        $this->db->where('admin_id',$admin_id); 
        $info = $this->db->get('tbl_learning_science_info')->row_array();
        if (empty($info))
        {
            $formdata['learning_id']=$id;
            $formdata['admin_id']=$admin_id;
            $formdata['user_view']=1; 
             $this->db->insert('tbl_learning_science_info',$formdata); 
             $insert_id = $this->db->insert_id();
             if ($insert_id) {
                $query = $this->db->query("SELECT * FROM tbl_learning_science_info WHERE learning_id='$id'");
                $viewcount=$query->num_rows();
                $formdata2['views']=$viewcount;
                $this->db->where('id',$id); 
                return $update = $this->db->update('tbl_learning_science_via_standards', $formdata2); 
            }
        }
        else
        {   
            return 0;  
        }
    }


public function Checkleasrninglike($id,$admin_id)
    { 
        $this->db->where('learning_id',$id); 
        $this->db->where('admin_id',$admin_id); 
        return $info = $this->db->get('tbl_learning_science_info')->row_array(); 
    }
     public function updateUpdateleasrningLikes($id,$admin_id)
     {
        $this->db->where('learning_id', $id);
        $this->db->where('admin_id', $admin_id);
        $data['user_like']=1;
        if ($this->db->update('tbl_learning_science_info', $data)) 
        {
            $query = $this->db->query("SELECT * FROM tbl_learning_science_info WHERE user_like=1 AND learning_id=$id");
            $viewcount=$query->num_rows();
            $formdata2['likes']=$viewcount;
            $this->db->where('id',$id); 
            $update = $this->db->update('tbl_learning_science_via_standards', $formdata2);
            if ($update) 
            {
                return true;
            }
            else
            {
                return false;
            }
            
        } 
        else  { return false; }
    }
     
}