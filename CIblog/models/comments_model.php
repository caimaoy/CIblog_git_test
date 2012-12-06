<?php
class Comments_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	
	function comment_insert($user_id, $post_id, $title, $body){
		$this->title = $title;
		$this->user_id = $user_id;
		$this->post_id = $post_id;
		$this->body = $body;
		$this->db->insert('comments',$this);
		//return $this->db->insert_id();
		//return $query->result();
	}
	
	function comment_delete($comment_id, $user_id){
		$this->db->where('user_id',$user_id);
		$this->db->where('comment_id',$comment_id);
		$this->db->delete('comments');
	//	return $query->result();
	}
	
	function select_post_id($comment_id){
		$this->db->where('comment_id',$comment_id);
		$query = $this->db->get('comments');
		$re = $query->result();
		return $re[0]->post_id;
		
	}
	
	
	//////////////////////////////////////////////////////////////////////////////////////////////
	function posts_select(){
		$query = $this->db->query("SELECT * FROM users NATURAL JOIN posts NATURAL JOIN categories ORDER BY posted DESC");
	/*	$this->db-order_by('posted','desc');
		$this->db->select('*');
		$this->db->from('users','posts','categories');
		$this->db->jion('users','posts','categories');
	*/
/*		$this->db->select('*');
		$this->db->from('posts');
		$this->db->jion('users','users.user_id = posts.user_id');
		$query=$this->db->get();
	//	echo $this->db->last_query();*/
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