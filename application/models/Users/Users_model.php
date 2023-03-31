 <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model 
{
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

    public function viewQuestion($id)
    { 
        $this->db->where('id',$id); 
         $quiz = $this->db->get('tbl_quiz_details')->row_array();
         $que_bank_id= $quiz['que_bank_id'];

        $this->db->where('que_bank_id',$que_bank_id); 
        return $que_details = $this->db->get('tbl_que_details')->result_array();   
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
}