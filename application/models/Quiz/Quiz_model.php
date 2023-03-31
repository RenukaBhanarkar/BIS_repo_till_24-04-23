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
    public function getAvailability()
    { 
         return $this->db->get("tbl_mst_quiz_availability")->result_array();
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


     
}