<?php
class Categories_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function categories_select_all(){
		$this->db->select('*');
		$query = $this->db->get('categories');
		return $query->result();
	}
	
	function categories_select(){
		$this->db->select('*');
		$this->db->where('category_id <> 1');
		$query = $this->db->get('categories');
		return $query->result();
	}
	
	function post_select($post_id){
		/*$this->db->where('post_id',$post_id);
		$this->db->select('*');
		$query=$this->db->get('posts');*/
		$sql = "SELECT * FROM users NATURAL JOIN posts NATURAL JOIN categories WHERE post_id = ".$post_id;
		$query = $this->db->query($sql);
		return $query->result();
	}
	function post_delete($post_id,$user_id){
	//	$sql1 = "DELETE FROM comments natural jion posts where post_id = $post_id";
		$sql = "DELETE FROM posts where post_id = $post_id and user_id = $user_id";
	//	$query = $this->db->query($sql1);
		$query = $this->db->query($sql);
		//return $query->result();
	}
	function comments_select($post_id){
		$sql = "SELECT * FROM users NATURAL JOIN comments WHERE post_id = ".$post_id;
		$query = $this->db->query($sql);
		return $query->result();
	}
	function post_insert($user_id, $title, $body){
		$this->title = $title;
		$this->user_id = $user_id;
		$this->body = $body;		
		$this->category_id = 1;
		$this->db->insert('posts',$this);
		return $this->db->insert_id();
		//return $query->result();
	}
	function comments_delete_by_post($post_id){
		$this->db->where('post_id',$post_id);
		$query = $this->db->delete('comments');
	//	return $query->result();
	}
	function post_update($post_id,$user_id, $title, $body){
		$this->db->where('post_id', $post_id);
		$this->title = $title;
		$this->user_id = $user_id;
		$this->body = $body;		
		$this->category_id = 1;
		$this->db->update('posts',$this);
		//return $query->result();
	}
	
	
}

 ?>