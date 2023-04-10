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
            tbl_mst_quiz_level.title as level
            ');
            $this->db->where('tbl_quiz_details.id', $id);
            $this->db->join('tbl_mst_language', 'tbl_mst_language.id = tbl_quiz_details.language_id');
            $this->db->join('tbl_mst_quiz_availability', 'tbl_mst_quiz_availability.id = tbl_quiz_details.availability_id');
            $this->db->join('tbl_mst_quiz_level', 'tbl_mst_quiz_level.id = tbl_quiz_details.quiz_level_id');
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
        $this->db->insert('tbl_mst_quzi_submission_details',$formdata); 
        return $insert_id = $this->db->insert_id();
    } 
    public function getCorrectAns($quiz_id,$user_id)
    {  
         $query = $this->db->query("SELECT * FROM tbl_user_quiz WHERE selected_op=corr_opt AND user_id='$user_id' AND quiz_id='$quiz_id'");
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

    public function getWrongAns($quiz_id,$user_id)
    {  
         $query = $this->db->query("SELECT * FROM tbl_user_quiz WHERE selected_op!=corr_opt AND user_id='$user_id' AND quiz_id='$quiz_id'");
        return $query->num_rows();
    }

    public function checkUserAvailable($quiz_id,$user_id)
    {  
         $query = $this->db->query("SELECT * FROM tbl_mst_quzi_submission_details WHERE user_id='$user_id' AND quiz_id='$quiz_id'");
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

  public function getPublishedConversation()
    {   
        $this->db->select('tbl_inconversation_with_expert.*,tbl_mst_status.status_name'); 
         $this->db->where('status ',5); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_inconversation_with_expert.status'); 
        return $this->db->get('tbl_inconversation_with_expert')->result_array();  
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

   public function getConversation($id)
    {   
        $this->db->where('id',$id); 
        return $quiz = $this->db->get('tbl_inconversation_with_expert')->row_array();
    }

}