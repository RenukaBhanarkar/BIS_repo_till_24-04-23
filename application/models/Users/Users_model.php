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

                    $this->users_model->insertQuestion($formdata);

                    $successCount++;
                    if ($successCount == $number) 
                    {
                       $this->session->set_flashdata('MSG', ShowAlert("Submission Successfully", "SS"));
                        redirect(base_url() . "users/quiz_submission", 'refresh');

                    }

                }
                $j++;
            }
                
                    $formdata2 = array();
                    $formdata2['user_id'] = $user_id; 
                    $formdata2['quiz_id'] = $quiz_id;
                    $formdata2['start_time'] = $start_time; 
                    $formdata2['end_time'] = date('h:i:s');  

                    $this->users_model->insertQuestionTime($formdata2);
                }
            }
    public function quiz_submission(){
        $this->load->view('users/headers/header');
        $this->load->view('users/quiz_submission');
        $this->load->view('users/footers/footer');  
    }
}