<?php
class UserModel extends CI_Model{

    public function getAll(){
        $query = $this->db->get('article');
        return $query->result();
    }
    public function insertUser($data){
        return $this->db->insert('article',$data);
    }

    public function getById($id) {
        $query = $this->db->get_where('article',array('id'=>$id));
        return $query->row();
        // return $query->row_array();
    }

    public function updateData($id,$data){
        return $this->db->update('article',$data,['id'=> $id]);
        // $this->db->where('id',$id);
        // $this->db->update('article',$data);
    }

    public function deleteArticle($id){
        return $this->db->delete('article',['id'=>$id]);
    }
}
?>