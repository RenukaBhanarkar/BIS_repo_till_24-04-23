<?php
defined('BASEPATH') or exit('No direct script access allowed');

class By_the_mentor_model extends CI_Model {

    public function  add_btm($data)
    {
        if ($this->db->insert('tbl_by_the_mentors', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function allbtm(){
        
        $this->db->select('btm.*,tms.status_name');
        $this->db->from('tbl_by_the_mentors as btm');
        $this->db->join('tbl_mst_status tms','tms.id=btm.status');
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
       
    }
    public function get_btm($id){
        
        //$this->db->select('tyw.*,ta.name,ta.email_id,tms.status_name');
        $this->db->select('btm.*,tms.status_name');
        $this->db->from('tbl_by_the_mentors as btm');
       // $this->db->join('tbl_admin ta','ta.id=tyw.user_id');
        $this->db->join('tbl_mst_status tms','tms.id=btm.status');
        $this->db->where('btm.id',$id);
        $query=$this->db->get();
        $res=$query->result_array();
        return $res[0];
    }

    public function approveYourwall($id){
        $this->db->update('tbl_your_wall',['status'=>'3'],['id'=>$id]);
    }
    public function btmPublish($id){
        $this->db->update('tbl_by_the_mentors',['status'=>'5'],['id'=>$id]);
    }
    public function getPublishedbtm(){
        $this->db->select('*');
        $this->db->from('tbl_by_the_mentors');        
        $this->db->where('status','5');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function delet_btm($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_by_the_mentors')) {
             return true;
         } else {
             return false;
         }
    }
    public function btm_Unpublish($id){
        $this->db->update('tbl_by_the_mentors',['status'=>'6'],['id'=>$id]);
    }

}