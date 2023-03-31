<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wall_of_wisdom_model extends CI_Model {

    public function insertWOW($data){
        if ($this->db->insert('tbl_wall_of_wisdom', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function getAllWOW(){
        $this->db->select('wow.*,tms.status_name');
        $this->db->from('tbl_wall_of_wisdom wow');
        $this->db->join('tbl_mst_status tms','tms.id=wow.status');
        //$this->db->where('is_active',1); 
       // $this->db->where('admin_type',2); 
       // $this->db->order_by('id', 'ASC');
         $query = $this->db->get();
        $rs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($rs,$row);
            }
        }
        return $rs;
    }
    public function wowPublish($id){
        $this->db->where('id', $id);
         if ($this->db->update('tbl_wall_of_wisdom', ['status'=>'5'])) {
             return true;
         } else {
             return false;
         }
    }
    public function wowDelete($id){
        $this->db->where('id', $id);
        if ($this->db->delete('tbl_wall_of_wisdom')) {
            return true;
        } else {
            return false;
        }
    }
    public function wowUnpublish($id){
        $this->db->where('id', $id);
        if ($this->db->update('tbl_wall_of_wisdom', ['status'=>'6'])) {
            return true;
        } else {
            return false;
        } 
    }
    public function all_wallofwisdom(){
        $this->db->select('*');
        $this->db->from('tbl_wall_of_wisdom');        
        $this->db->where('status','5');
        //$this->db->order_by('');
        $this->db->limit(6);
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
}