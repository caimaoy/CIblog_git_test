<?php


 function checksession(){
 	$CI =&get_instance();
       // $this->load->library('session');
       $CI->load->library('session');
 		$CI->load->helper('url');
       
        if($CI->session->userdata('user_id')){
            return true;
        }
        else{
           /* echo '没有登录!!!';
            echo '<br/>';
            //echo $CI->load->view('login',true);"//".site_url("login
            echo ('
           	请<a href = "//'.site_url("login").'">登录</a>
            ');*/
            return false;
        }
	}
	
	function login_page(){
		$CI =&get_instance();
		$CI->load->view('header');
		$CI->load->view('login');
		$CI->load->view('footer');
	}
	
	
	function strlen_utf8($str) {  
	$i = 0;  
	$count = 0;  
	$len = strlen ($str);  
	while ($i < $len) {  
		$chr = ord ($str[$i]);  
		$count++;  
		$i++;  
		if($i >= $len) break;  
		if($chr & 0x80) {  
			$chr <<= 1;  
			while ($chr & 0x80) {  
			$i++;  
			$chr <<= 1;  
			}  
		}  
	}  
	return $count;  
}  
	
	?>
