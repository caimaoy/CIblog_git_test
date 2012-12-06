<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
	function __construct()
 {
  parent::__construct();
 }
	
	public function index(){
		$this->load->helper('url');
		
		$this->load->view('header');
		$this->load->view('login2');
		//$this->load->view('footer');
	}
	
	public function checklogin(){
		
		$this->load->model('users_model');
		$username = $this->input->post('username');
		$user = $this->users_model->user_select($username);
		//echo $_POST['username'];
		//var_dump($user);
		
		if($user){
			$this->load->helper('url');
			//$logout_url = "//".site_url("login/logout");
			//echo $logout_url;
			
			@$count = file_get_contents('./num.txt');
			$count = $count?$count:0;
			$count++;
			//$data = array('v_count'=>$count,'logout_url'=>$logout_url);
			$re = fopen('./num.txt','w');
			fwrite($re, $count);
			fclose($re);
			$data = array('username' => $username,'v_count'=>$count);
			$this->load->view('header',$data);
		    $this->load->view('login_success');
			if($user[0]->password == md5($this->input->post('password'))){
				
				$this->load->library('session');
				$arr = array('user_id'=>$user[0]->user_id, 'username'=>$user[0]->username);
				$this->session->set_userdata($arr);
				
			//	echo $this->session->userdata('user_id');
			}
			else{
				echo '密码错误';
			}
		}
		else{
			echo '用户不存在';
		}
	}
	public function checksession(){
        $this->load->library('session');
        if($this->session->userdata('user_id')){
            echo '已经登录';
        }
        else{
            echo '没有登录';
        }
	}
    public function logout(){ 
        $this->load->library('session');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        //echo '退出成功';
        $this->load->view('header');
        $this->load->view('logout_view');
        $this->load->view('footer');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
