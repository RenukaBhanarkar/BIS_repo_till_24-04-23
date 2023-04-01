<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function getLoginUsers($username,$password)
    {
        $this->db->where('username',$username);
		$this->db->where('password',$password);
        //$this->db->where('is_active',1);
		$query=$this->db->get('tbl_admin');  
        $row=array();
        if ($query->num_rows() > 0){
            $row = $query->row_array();
        }
        return $row;          	
       
    }
    public function checkAdminLogin()
    {
        $enc_admin_id = $this->session->userdata('admin_id');       
        if ($enc_admin_id ) {
            $dec_admin_id = encryptids("D", $enc_admin_id);
            if ($dec_admin_id > 0) {
                $is_gen_user = $this->db->get_where("tbl_admin", array("id" => $dec_admin_id,"is_active"=>1))->num_rows();
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
    public function getAllAdmin(){      
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('is_active',1); 
        $this->db->where('admin_type',2); 
        $this->db->order_by('id', 'ASC');
         $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }
    public function getAllSubAdmin(){      
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('is_active',1); 
        $this->db->where('admin_type',3); 
        $this->db->order_by('id', 'ASC');
         $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }


    public function adminLogout(){        
        // print_r($this->session); die;
       
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_email');
        $this->session->unset_userdata('admin_name');       
        $this->session->unset_userdata('admin_type');
        $this->session->unset_userdata('admin_post');
        //$this->session->unset_userdata('is_loggedin');
      
     }
    
     public function  insertData($data)
     {
         if ($this->db->insert('tbl_admin', $data)) {
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
         if ($this->db->update('tbl_admin', $data)) {
             return true;
         } else {
             return false;
         }
     }
 
     public function deleteData($id)
     {
         $this->db->where('id', $id);
         if ($this->db->delete('tbl_admin')) {
             return true;
         } else {
             return false;
         }
     }
    public function checkUniqueEmail($email)
    {
        $myQuery = "SELECT email_id FROM  tbl_admin  WHERE email_id = '{$email}' ";
        $query = $this->db->query($myQuery);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function  bannerinsertData($data)
     {
         if ($this->db->insert('tbl_banner_img', $data)) {
             return $this->db->insert_id();
         } else {
             return false;
         }
     }

     public function  bannerAllData()
     {
        $myQuery = "SELECT * FROM  tbl_banner_img ";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }

     public function deleteBanner($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_banner_img')) {
             return true;
         } else {
             return false;
         }
     }

     public function aboutExchangeForuminsertData($data){
        if ($this->db->insert('tbl_about_exchange_forum', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }

     public function aboutExchangeForumData(){
        $myQuery = "SELECT * FROM  tbl_about_exchange_forum";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }
     public function deletExngForum($id){
        $this->db->where('id', $id);
        if ($this->db->delete('tbl_about_exchange_forum')) {
            return true;
        } else {
            return false;
        }
     }

     public function contactUsData(){
        $myQuery = "SELECT * FROM  tbl_contact_us_detail";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }

     public function addContactUsData($data){
        if ($this->db->insert('tbl_contact_us_detail', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }

     public function addLegalData($data){
        if ($this->db->insert('tbl_legel', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }

     public function legal(){
        $myQuery = "SELECT * FROM  tbl_legel";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result[0];
     }

     public function update_legal($data){
        $this->db->where('id', '1');
         if ($this->db->update('tbl_legel', $data)) {
             return true;
         } else {
             return false;
         }
     }

     public function useful_links(){
        $myQuery = "SELECT * FROM  useful_links";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }

     public function add_useful_links($data){
        if ($this->db->insert('useful_links', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }
     public function deleteUsefulLinks($id){
        $this->db->where('id', $id);
         if ($this->db->delete('useful_links')) {
             return true;
         } else {
             return false;
         }
     }

     public function follow_us(){
        $myQuery = "SELECT * FROM  tbl_follow_us_link";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }

     public function add_follow_us($data){
        if ($this->db->insert('tbl_follow_us_link', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }

     public function deleteFollowUs($id)
     {
         $this->db->where('id', $id);
         if ($this->db->delete('tbl_follow_us_link')) {
             return true;
         } else {
             return false;
         }
     }

     public function allPhotos(){
        $myQuery = "SELECT * FROM  tbl_photos";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }
     public function addPhotos($data){
       // print_r($data); die;
        if ($this->db->insert('tbl_photos', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }
     public function deletePhotos($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_photos')) {
             return true;
         } else {
             return false;
         }
     }

     public function updateQuizStatus($id,$formdata)
    {
        $this->db->where('id',$id); 
        $quiz = $this->db->get('tbl_quiz_details')->row_array();
        if ($quiz) 
        {
            $this->db->where('id', $id);
            return $this->db->update('tbl_quiz_details', $formdata);
        }
        else
        {
            return 2;
        } 
    }
    public function getAllQuize()
    { 
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name'); 
        $this->db->where_in('tbl_quiz_details.status',array(2,3));
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status'); 
        return $this->db->get('tbl_quiz_details')->result_array(); 

    }
    public function getAllManageQuiz()
    { 
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name'); 
        $this->db->where_in('tbl_quiz_details.status',array(2,3,5,6));
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status'); 
        return $this->db->get('tbl_quiz_details')->result_array(); 

    }
   
    public function onGoingQuiz()
    {
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name');
        $this->db->where('(NOW() BETWEEN start_date AND end_date)'); 
        $this->db->where('tbl_quiz_details.status',5); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status');  
         return $this->db->get('tbl_quiz_details')->result_array(); 
    }
    public function images(){
        $this->db->select('*');
        $this->db->from('tbl_photos');
        $this->db->order_by('created_on','ASC');
        $query=$this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
    public function allVideos(){
        $myQuery = "SELECT * FROM  tbl_videos";
        $query = $this->db->query($myQuery);
        $result=$query->result_array();
        return $result;
     }
     public function addVideos($data){
       // print_r($data); die;
        if ($this->db->insert('tbl_videos', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
     }
     public function deleteVideos($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_videos')) {
             return true;
         } else {
             return false;
         }
     }
     public function prises(){
        $this->db->select('*');
        $this->db->from('tbl_mst_prizes');
       // $this->db->order_by('created_on','ASC');
        $query=$this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
    public function winner_wall_list(){
        $this->db->select('tmw.*,tmp.title');
        $this->db->from('tbl_mst_winner tmw');
        $this->db->join('tbl_mst_prizes tmp','tmp.id=tmw.prise');
        //$this->db->order_by('created_on','ASC');
        $query=$this->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
    public function add_winner($data){
        if ($this->db->insert('tbl_mst_winner', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function deleteWinner($id){
        $this->db->where('id', $id);
        if ($this->db->delete('tbl_mst_winner')) {
            return true;
        } else {
            return false;
        }
    }
    public function toCheckNoOfQueInBank($que_bank_id,$no_of_que)
    {
        $arr = array();
        $myQuery = "SELECT COUNT(que_id) AS cnt FROM  tbl_que_details  WHERE que_bank_id = '{$que_bank_id}' ";
        $query = $this->db->query($myQuery);
        if ($query->num_rows() > 0) {
            $arr = $query->row_array();
            $cnt =  $arr['cnt'];
        
        if ($cnt == $no_of_que) {
            return true;
        } else {
            return false;
        }
        }
    }
}