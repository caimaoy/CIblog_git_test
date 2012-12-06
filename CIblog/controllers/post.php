<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($post_id)
	{
		$this->load->library('session');
		$this->load->model('posts_model');
		$post = $this->posts_model->post_select($post_id);
		$comments = $this->posts_model->comments_select($post_id);
		$data['post']=$post[0];
		$data['session_user_id'] = $this->session->userdata('user_id');
		$data['comments'] = $comments;
		$this->load->view('header',$data);
		$this->load->view('post_view');
		if ($comments != null){
		//	$this->load->view('comments_view');
		}
		$this->load->view('footer');
		//var_dump($comments);		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */