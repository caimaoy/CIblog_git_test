
<div id="container">
 
<h1>caimaoy's Blog</h1> 

<ul><code><h2><?php echo $post->title;?></h2></code>
<li><code><?php echo $post->body;?></code>
<ul>
<li>作者:<?php echo $post->username;?>  &nbsp; 分类:<?php echo $post->category;?> &nbsp; <?php echo $post->posted;?> </li>


<?php if($post->user_id == $session_user_id){
	echo ('<a href = "/CIBlog/index.php/modify_post/edit/'.$post->post_id.'">编辑</a>&nbsp;&nbsp;
	<a href = "/CIBlog/index.php/modify_post/delete/'.$post->post_id.'">删除</a>&nbsp;&nbsp;');
	}
	echo ('<a href = "/CIBlog/index.php/modify_comment/add/'.$post->post_id.'">评论</a>
	');
?> </ul>
</li>
</ul>
</div>

<code><a href = "/CIBlog/index.php/modify_post/add">点我啊，来一发</a></code>

<?php 
if($comments != NULL){
	echo('<div id="container">
 
<h1>评论</h1>
<ul>');
foreach ($comments as $comment){

echo "<li><code> $comment->title</code> ";
echo('
<ul> <li><code>'.$comment->body.'</code>');
echo "评论员: $comment->username&nbsp;&nbsp;&nbsp;&nbsp;$comment->posted &nbsp;&nbsp;&nbsp;&nbsp;"; 
if($comment->user_id == $session_user_id){
	echo ('<a href = "/CIBlog/index.php/modify_comment/delete/'.$comment->comment_id.'">删除</a>');
}
echo('
</ul>
</li>');
}
echo ('
</ul>
</div>');
}?>






		<code><pre><a href = '/CIBlog/index.php/home/'>首页</a>    <a href ="/CIBlog/index.php/login/logout">退出</a></pre></code>
</html>
