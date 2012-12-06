
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modify_comment extends CI_Controller {

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
				if (checksession() || 1){
			$this->load->model('posts_model');
			//$username = $this->input->post('username');
			$posts = $this->posts_model->posts_select();
			//var_dump($posts);
			$data['posts'] = $posts;
			//echo $data['post_url'];
			$this->load->view('header',$data);
			$this->load->view('home_view');
			$this->load->view('footer');
		}
		else{	
			login_page();
		}
	}
	
	public function add($post_id, $stat = 0){
		$this->load->helper('my_helper');
		$do_db = true;
		if (checksession()){
			$data['title'] = htmlentities($this->input->post('title'));
			$data['body'] = htmlentities($this->input->post('body'));
			$user_id = $this->session->userdata('user_id');
			$data['post_id'] = $post_id;
		//	$data['post_id'] = NULL;
			if(0 != $stat){
				if(NULL == $data['title']){
					echo "标题不能为空 <br />";
					$do_db = false;
				}
				if(NULL == $data['body']){
					echo "内容不能为空<br />";
					$do_db = false;
				}
				if(strlen_utf8($data['title']) >= 150 ){
					echo "您这标题也太长了吧… <br />";
					$do_db = false;
				}
				if ($do_db){
					$this->load->model('comments_model');
					$result = $this->comments_model->comment_insert($user_id, $post_id, $data['title'],$data['body']);
					$this->load->view('header',$data);
					$this->load->view('do_success_view');
					$this->load->view('footer');
					
					return;
				}	
			}
			
			$this->load->view('header',$data);
			$this->load->view('modify_comment_view');
			$this->load->view('footer');
		}
		else{	
			login_page();
		}
		
	}
	

	public function delete($comment_id){
		$this->load->helper('my_helper');
		if (checksession()){
			$user_id = $this->session->userdata('user_id');
			$this->load->model('comments_model');
			$data['post_id'] = $this->comments_model->select_post_id($comment_id);
			$this->comments_model->comment_delete($comment_id,$user_id);
			$this->load->view('header',$data);
			$this->load->view('do_success_view');
			$this->load->view('footer');
		}
		else{	
			login_page();
		}
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
