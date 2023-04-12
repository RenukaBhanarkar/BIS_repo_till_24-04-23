 <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Standards_Making_model extends CI_Model {

    public function conversationForm($formdata)
    {
        $this->db->insert('tbl_inconversation_with_expert',$formdata); 
        return $insert_id = $this->db->insert_id();
    }
    public function getConversationAll()
    {   
        $this->db->select('tbl_inconversation_with_expert.*,tbl_mst_status.status_name'); 
         $this->db->where_not_in('status ',9); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_inconversation_with_expert.status'); 
        return $this->db->get('tbl_inconversation_with_expert')->result_array();  
    }

     public function conversationView($id)
    { 
        $this->db->where('id ',$id);  
        return $this->db->get("tbl_inconversation_with_expert")->row_array();
    }
     public function getConversation($id)
    {
        $this->db->where('id',$id); 
        return $quiz = $this->db->get('tbl_inconversation_with_expert')->row_array();
    }

    public function updateConversation($id,$formdata)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_inconversation_with_expert', $formdata);
    }
    public function deleteConversation($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_inconversation_with_expert');
    }

    public function ChangeStatusConversation($id,$formdata)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_inconversation_with_expert', $formdata);
    }

    public function getConversationArchives()
    {   
        $this->db->select('tbl_inconversation_with_expert.*,tbl_mst_status.status_name'); 
        $this->db->where('tbl_inconversation_with_expert.status',9); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_inconversation_with_expert.status'); 
        return $this->db->get('tbl_inconversation_with_expert')->result_array();  
    }

    public function joinclassroomForm($formdata)
    {
        $this->db->insert('tbl_join_the_classroom',$formdata); 
        return $insert_id = $this->db->insert_id();
    }

    public function getLiveSessionList()
    {   
        $this->db->select('tbl_join_the_classroom.*,tbl_mst_status.status_name'); 
         $this->db->where_not_in('status ',9); 
        $this->db->join('tbl_mst_status','tbl_mst_status.id = tbl_join_the_classroom.status'); 
        return $this->db->get('tbl_join_the_classroom')->result_array();  
    }
    
     
}