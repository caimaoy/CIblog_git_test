
<div id="container">
 
<h1>caimaoy's Blog</h1> 

<ul>
<?php foreach ($comments as $comment):?>

<li><code><?php echo $comment->title;?><ul>
<li><?php echo $comment->body;?>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $post->posted;?> </li>
</ul></code>
</li>

<?php endforeach;?>
</ul>
</div>


