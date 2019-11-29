<?php
    include 'content/blog/php/Post.php';
    $POST = Post::from_url(Ethenis::get_path());
?>

<script>
  history.replaceState('', '', '<?php echo $POST->title ?>')
  document.title = '<?php echo $POST->title ?>'
</script>

<style>
    header { display: none }
    <?php include "content/blog/css/blog.css" ?>
</style>

<article id="blog-post-container">
    <h1><?php echo $POST->title ?></h1>
    <time datetime="<?php echo $POST->date_time ?>"><?php echo $POST->date_string ?></time>
    <br>
    <?php echo $POST->content ?>
</article>
