<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function index(){
		$this->load->helper('my_helper');
		$this->load->helper('url');
		if (checksession() || 1){
			$this->load->model('posts_model');
			//$username = $this->input->post('username');
			$posts = $this->posts_model->posts_select();
			//var_dump($posts);
			$data['posts'] = $posts;
			//$data['post_url'] = "//".site_url("post")."/index/";
			//$data['logout_url'] = "//".site_url("login/logout");
			//echo $data['post_url'];
			$this->load->view('header',$data);
			$this->load->view('home_view');
			$this->load->view('footer');
		}
		else{	
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
		}
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
