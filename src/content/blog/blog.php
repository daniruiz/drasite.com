<?php
    include 'content/blog/php/Post.php';
    $POST = Post::from_url(Ethenis::get_path());
?>

<style><?php include "content/blog/css/blog.css" ?></style>

<article>
    <h1><?php echo $POST->title ?></h1>
    <time datetime="<?php echo $POST->date_time ?>"><?php echo $POST->date_string ?></time>
    <br>
    <?php echo $POST->content ?>
</article>

<script>
  history.replaceState('', '', '<?php echo $POST->title ?>')
  document.title = '<?php echo $POST->title ?>'
</script>
