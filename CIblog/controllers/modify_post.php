
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modify_post extends CI_Controller {

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
	
	public function add($stat = 0){
		$this->load->helper('my_helper');
		$do_db = true;
		if (checksession()){
			$data['title'] = htmlentities($this->input->post('title'));
			$data['body'] = htmlentities($this->input->post('body'));
			$data['category_id'] = $this->input->post('category_id');
			$user_id = $this->session->userdata('user_id');
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
					$this->load->model('posts_model');
					$result = $this->posts_model->post_insert($user_id,$data['title'],$data['body'],$data['category_id']);
					//var_dump($result); //成功：NULL;
					if (NULL != $result){
						$data['post_id'] = $result;
						$this->load->view('header',$data);
						$this->load->view('do_success_view');
						$this->load->view('footer');
					}
					return;
				}	
			}
			$data['action'] = 'add/1';
			$this->load->model('categories_model');
			$categories = $this->categories_model->Categories_select_all();
			//var_dump($categories);
			$data['categories'] = $categories;
			$this->load->view('header',$data);
			$this->load->view('modify_post_view');
			$this->load->view('footer');
		}
		else{	
			login_page();
		}
		
	}
	
	public function edit($post_id, $stat = 0){
		$this->load->helper('my_helper');
		//echo $post_id;
		$do_db = true;
		if (checksession()){
			$this->load->model('posts_model');
			$post = $this->posts_model->post_select($post_id);	
			//var_dump($post);
			$user_id = $this->session->userdata('user_id');
			$data['post_id'] = $post_id;
			if (0 == $stat){
					$data['title'] = $post[0]->title;
					$data['body'] = $post[0]->body;
					$data['category_id'] = $post[0]->category_id;
			}
		
		//	$data['post_id'] = NULL;
			if(0 != $stat){
				$data['title'] = htmlentities($this->input->post('title'));
				$data['body'] = htmlentities($this->input->post('body'));
				$data['category_id'] = $this->input->post('category_id');
				if(NULL == $data['title']){
					echo "标题不能为空 <br />";
					$data['title'] = $data['title'] = $posts[0]->title;
					$do_db = false;
				}
				if(NULL == $data['body']){
					echo "内容不能为空<br />";
					$data['body'] = $data['body'] = $posts[0]->body;
					$do_db = false;
				}
				if(strlen_utf8($data['title']) >= 150 ){
					echo "您这标题也太长了吧… <br />";
					$do_db = false;
				}
				if ($do_db){
					$this->load->model('posts_model');
					$this->posts_model->post_update($post_id, $user_id,$data['title'],$data['body'],$data['category_id']);
					
						$this->load->view('header', $data);
						$this->load->view('do_success_view');
						$this->load->view('footer');
					
					return;
				}
			}
			$data['action'] = "edit/$post_id/1";
				$this->load->model('categories_model');
			$categories = $this->categories_model->Categories_select_all();
			//var_dump($categories);
			$data['categories'] = $categories;
			$this->load->view('header',$data);
			$this->load->view('modify_post_view');
			$this->load->view('footer');
		}
		else{	
			login_page();
		}
	}
	
	public function delete($post_id){
		$this->load->helper('my_helper');
		if (checksession()){
			$user_id = $this->session->userdata('user_id');
			$this->load->model('posts_model');
			$this->posts_model->post_delete($post_id,$user_id);
			$this->posts_model->comments_delete_by_post($post_id,$user_id);
			$this->load->view('header');
			$this->load->view('delete_success_view');
			$this->load->view('footer');
		}
		else{	
			login_page();
		}
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
