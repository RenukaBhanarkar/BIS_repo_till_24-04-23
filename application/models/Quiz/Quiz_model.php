 <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz_model extends CI_Model {

    public function insertQuiz($formdata)
    {
        $this->db->insert('tbl_quiz_details',$formdata); 
        return $insert_id = $this->db->insert_id();
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

    public function insertPrize($formdata)
    {
        $this->db->insert('tbl_prizes',$formdata); 
        // return $insert_id = $this->db->insert_id(); 

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
            tbl_mst_quiz_level.title as level
            ');
        $this->db->where('tbl_quiz_details.id',$id);
        $this->db->join('tbl_mst_language','tbl_mst_language.id = tbl_quiz_details.language_id');
        $this->db->join('tbl_mst_quiz_availability','tbl_mst_quiz_availability.id = tbl_quiz_details.availability_id');
        $this->db->join('tbl_mst_quiz_level','tbl_mst_quiz_level.id = tbl_quiz_details.quiz_level_id');
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
        $this->db->where('tbl_quiz_details.status',5); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_quiz_details.status');  
        return $this->db->get('tbl_quiz_details')->result_array(); 
    }

    public function getQuizSubmissionUsers($id)
    { 
       $this->db->select('tbl_mst_quzi_submission_details.*,
            tbl_users.user_name,
            tbl_users.email,
            tbl_users.user_mobile'); 
        $this->db->where('tbl_mst_quzi_submission_details.quiz_id',$id); 
        $this->db->join('tbl_users','tbl_users.user_id = tbl_mst_quzi_submission_details.user_id');
        $this->db->order_by('score', 'desc');    
        return $this->db->get('tbl_mst_quzi_submission_details')->result_array(); 
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


     
}