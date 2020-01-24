<?php
    include 'content/blog/php/Post.php';
    $POST = Post::from_url(Ethenis::get_path());
    $_TWITTER_TEXT = urlencode('drasite.com | DяA  ::  '.$POST->title);
    $_TWITTER_URL = urlencode('https://drasite.com/blog/'.str_replace(' ', '+', $POST->title));
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
    <a id="twitter-button" href="https://twitter.com/intent/tweet?text=<?php echo $_TWITTER_TEXT ?>&url=<?php echo $_TWITTER_URL ?>" target="_blank">
        <i class="fab fa-twitter"></i>
    </a>
    <br>
    <?php echo $POST->content ?>
</article>
