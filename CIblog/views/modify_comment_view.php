
<div id="container">
 
<h1>caimaoy's Blog</h1> 

<form action ="/CIBlog/index.php/modify_comment/add/<?php  echo $post_id;?>/1" method = "POST">
<center>
<label>
<input type = "text" name = "title" size = "110" value = "<?php echo $title;?>">
<br /><br />
</label>
<label>
<textarea name = "body" cols = "100" rows = "10" wrap="physical"><?php echo $body;?></textarea>


</label>
<br />
<input type = "submit" name= "submit" value = "发布"></center>
</form>


		<code><pre><a href = '/CIBlog/index.php/home/'>首页</a>    <a href ="/CIBlog/index.php/login/logout">退出</a></pre></code>
</div>
</html>
