<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Your_wall_model extends CI_Model {

    public function  addYourWall($data)
    {
        if ($this->db->insert('tbl_your_wall', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function allYourwall(){
        // $myQuery = "SELECT * FROM  tbl_your_wall ";
        // $query = $this->db->query($myQuery);
        // $result=$query->result_array();
        // return $result;
       // $this->db->select('tyw.title','tyw.description','tyw.image','tyw.status','tyw.created_on','tyw.user_id','ta.name','ta.email_id');
       $this->db->select('tyw.*,ta.name,ta.email_id,tms.status_name');
        $this->db->from('tbl_your_wall as tyw');
        $this->db->join('tbl_admin ta','ta.id=tyw.user_id','left');
        $this->db->join('tbl_mst_status tms','tms.id=tyw.status','left');
       // $this->db->where('status',$status);
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function get_yourwallData($id){
        
        //$this->db->select('tyw.*,ta.name,ta.email_id,tms.status_name');
        $this->db->select('tyw.*,tms.status_name');
        $this->db->from('tbl_your_wall as tyw');
       // $this->db->join('tbl_admin ta','ta.id=tyw.user_id');
        $this->db->join('tbl_mst_status tms','tms.id=tyw.status');
        $this->db->where('tyw.id',$id);
        $query=$this->db->get();
        $res=$query->result_array();
        return $res[0];
    }

    public function approveYourwall($id){
        $this->db->update('tbl_your_wall',['status'=>'3'],['id'=>$id]);
    }
    public function yourwallPublish($id){
        $this->db->update('tbl_your_wall',['status'=>'5'],['id'=>$id]);
    }
    public function getPublishedWall(){
        $this->db->select('*');
        $this->db->from('tbl_your_wall');        
        $this->db->where('status','5');
        $query=$this->db->get();
        $res=$query->result_array();
        return $res;
    }
    public function deletYourwall($id){
        $this->db->where('id', $id);
         if ($this->db->delete('tbl_your_wall')) {
             return true;
         } else {
             return false;
         }
    }
    public function yourwallUnpublish($id){
        $this->db->update('tbl_your_wall',['status'=>'6'],['id'=>$id]);
    }

}