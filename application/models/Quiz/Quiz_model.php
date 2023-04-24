 <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz_model extends CI_Model {

    public function insertQuiz($data)
    {
        if($this->db->insert('tbl_quiz_details',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
       
    }
    public function getQuiz($id)
    {
        $this->db->where('id',$id); 
        return $quiz = $this->db->get('tbl_quiz_details')->row_array();
    }

    public function getPrizeId($prize_id,$quiz_id)
    {
        $this->db->where('prize_id',$prize_id); 
        $this->db->where('quiz_id',$quiz_id); 
        return $quiz = $this->db->get('tbl_prizes')->row_array();
    }
    public function getAllQuize()
    {   
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status'); 
        $this->db->where_in('tbl_quiz_details.status',array(1,2,3,4,5,6)); 
        return $this->db->get('tbl_quiz_details')->result_array();  
    }
   /*  public function getAllQuizeCreated()
    {   
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status');
        $this->db->where('tbl_quiz_details.status',1);
        return $this->db->get('tbl_quiz_details')->result_array();  
    }*/
    
    public function getAvailability()
    { 
         return $this->db->get("tbl_mst_quiz_availability")->result_array();
    }
    public function getAllRegions()
    { 
         return $this->db->get("tbl_mst_regions")->result_array();
    }
    
    
    public function getQuizLevel()
    { 
         return $this->db->get("tbl_mst_quiz_level")->result_array();
    }
    public function getQuizLanguage()
    { 
         return $this->db->get("tbl_mst_language")->result_array();
    }
    public function getPrize()
    { 
         return $this->db->get("tbl_mst_prizes")->result();
    }

    public function insertPrize($data)
    {
       
        if($this->db->insert('tbl_prizes',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
    }
    

public function updateQuiz($id,$formdata)
{
    $this->db->where('id', $id);
    return $this->db->update('tbl_quiz_details', $formdata);
}

public function updatePrize($prize_id,$quiz_id,$formdata)
{
   
    $this->db->where('prize_id', $prize_id);
    $this->db->where('quiz_id',$quiz_id);
    $this->db->update('tbl_prizes', $formdata);
}

 public function viewQuiz($id)
    { 
        $this->db->select('tbl_quiz_details.*,
            tbl_mst_language.title as language,
            tbl_mst_quiz_availability.title as availability,
            tbl_mst_quiz_level.title as level,
            tbl_que_bank.no_of_ques
            ');
        $this->db->where('tbl_quiz_details.id',$id);
        $this->db->join('tbl_mst_language','tbl_mst_language.id = tbl_quiz_details.language_id');
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_quiz_details.availability_id');
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_quiz_details.quiz_level_id');
        $this->db->join('tbl_que_bank','tbl_que_bank.que_bank_id = tbl_quiz_details.que_bank_id');
        return $this->db->get('tbl_quiz_details')->row_array(); 
    }
    public function getAllQb()
    { 
         return $this->db->get("tbl_que_bank")->result_array();
    }
    public function getQbdataa($id)
    { 
        $this->db->where('que_bank_id ',$id); 
        return $this->db->get("tbl_que_bank")->row_array(); 
    }

    public function sendToApprove($id,$formdata)
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

    public function updatepublish($id,$formdata)
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


// SELECT `tbl_quiz_details`.*, `tbl_mst_status`.`status_name` FROM `tbl_quiz_details` JOIN `tbl_mst_status` ON `tbl_mst_status`.`id` = `tbl_quiz_details`.`status` WHERE `end_date` <= now() AND `end_time` >= TIME(now());

    public function getAllClosedQuize()
    { 
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name');
        $this->db->where('end_date <= now()'); 
        $this->db->where('end_time <= TIME(now())'); 
       
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status');  
        return $this->db->get('tbl_quiz_details')->result_array(); 
    }
    public function getAllClosedQuizeNew()
    { 
        $t=time();

        $current_time = (date("H:i:s",$t));
        $current_date= date('Y-m-d');
        $this->db->select('quiz.*,st.status_name,que.no_of_ques'); 
        $this->db->from('tbl_quiz_details quiz');
        $this->db->join('tbl_mst_status st','st.id = quiz.status'); 
        $this->db->join('tbl_que_bank que','que.que_bank_id = quiz.que_bank_id'); 
        $this->db->where('quiz.end_date <=', $current_date); 
      
        
        //$this->db->where('quiz.end_time <=' ,$current_time); 
       
        $rs = array();
        $query=$this->db->get();
        if($query->num_rows() > 0){
            $rs = $query->result_array();
        }
        return $rs; 

       
    }
   

    public function getQuizSubmissionUsers($id)
    { 
       $this->db->select('tbl_quiz_submission_details.*,
            tbl_users.user_name,
            tbl_users.email,
            tbl_users.user_mobile'); 
        $this->db->where('tbl_quiz_submission_details.quiz_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_quiz_submission_details.user_id');
        $this->db->order_by('score', 'desc');    
        return $this->db->get('tbl_quiz_submission_details')->result_array(); 
    }
    public function resultDeclarationList($id)
    { 
       $this->db->select('tbl_quiz_submission_details.*,
            tbl_users.user_name,
            tbl_users.email,
            tbl_users.user_mobile'); 
        $this->db->where('tbl_quiz_submission_details.quiz_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_quiz_submission_details.user_id');
        $this->db->order_by('score', 'desc');    
        return $this->db->get('tbl_quiz_submission_details')->result_array(); 
    }
    
    public function published_quiz(){
        $this->db->select('title,id');
        $this->db->from('tbl_quiz_details');
        $this->db->where('status','5');
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }
   /* public function getAllClosedQuize($id)
    {
        $this->db->where('status',7); 
        return $quiz = $this->db->get('tbl_quiz_details')->row_array();
    }*/

    // REnu ajax
    public function fetchQueBankForQuiz($total_question,$language_id){        
        if($language_id == 1){
            $lang =array(1,3);
        }else if($language_id == 2){
            $lang =array(2,3);
        } else{
            $lang =array(3);
        }
        //SELECT `qb`.`que_bank_id`, `qb`.`title` FROM `tbl_que_bank` `qb` WHERE `qb`.`status` = 3 AND `qb`.`is_active` = 1 AND `qb`.`quiz_linked_id` = `=` 0 AND `qb`.`no_of_ques` >= '4' AND `qb`.`language` IN(1, 3)
        $query = $this->db->select('qb.que_bank_id,qb.title')
            ->from('tbl_que_bank qb')          
            
            ->where('qb.status', 3)
            ->where ('qb.is_active', 1)
            ->where ('qb.quiz_linked_id ', 0)
            ->where ('qb.no_of_ques >=', $total_question)
            ->where_in ('qb.language', $lang)
            ->get();
       
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }
    public function getListOfArchiveQuiz(){
        $this->db->select('tbl_quiz_details.*,tbl_mst_status.status_name'); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status'); 
        $query =  $this->db->get('tbl_quiz_details'); 
        // $query = $this->db->select('*')
        //     ->from('tbl_quiz_details')          
        //     ->where_in('status', array(9))
        //     ->get();
       
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }
    public function updateData($quiz_id, $data)
    {   
        
        $this->db->where('quiz_id', $quiz_id);
        if ($this->db->update('tbl_quiz_details', $data)) {
            return true;
        } else {
            return false;
        }
    }
     
}