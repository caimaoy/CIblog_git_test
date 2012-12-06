
<div id="container">
 
<h1>caimaoy's Blog</h1> 

<ul>
<?php foreach ($posts as $post):?>

<li><code><a href ="/CIBlog/index.php/post/index/<?php echo $post->post_id?>"><?php echo $post->title;?></a>
<ul>
<li>作者：<?php echo $post->username;?>&nbsp;&nbsp;&nbsp;&nbsp; 分类：<?php echo $post->category;?>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $post->posted;?> </li>
</ul></code>
</li>

<?php endforeach;?>
</ul>
</div>








<code><a href = "/CIBlog/index.php/modify_post/add">点我啊，来一发</a></code>
		<code><pre><a href = '/CIBlog/index.php/home/'>首页</a>    <a href ="/CIBlog/index.php/login/logout/">退出</a></pre></code>





