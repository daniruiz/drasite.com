<?php
    include 'content/blog/php/Post.php';
    $POST = Post::from_url(Ethenis::get_path());
    $_SHARE_TEXT = 'drasite.com | DяA  ::  '.$POST->title;
    $_SHARE_TEXT_ENCODED = urlencode($_SHARE_TEXT);
    $_SHARE_URL = 'https://drasite.com/blog/'.str_replace(' ', '+', $POST->title);
    $_SHARE_URL_ENCODED = urlencode($_SHARE_URL);
?>

<style>
    header { display: none }
    <?php include "content/blog/css/blog.css" ?>
</style>

<article id="blog-post-container">
    <h1><?php echo $POST->title ?></h1>
    <time datetime="<?php echo $POST->date_time ?>"><?php echo $POST->date_string ?></time>
    <span id="share-buttons-wrapper">
        <a class="share-button fab fa-twitter"
            href="https://twitter.com/intent/tweet?text=<?php echo $_SHARE_TEXT_ENCODED ?>&url=<?php echo $_SHARE_URL_ENCODED ?>"
            title="Share on twitter"
            style="color: #4a88f1"
            target="_blank">
        </a>
        <a class="share-button fab fa-facebook"
            href="https://facebook.com/sharer/sharer.php?t=<?php echo $_SHARE_TEXT_ENCODED ?>&u=<?php echo $_SHARE_URL_ENCODED ?>"
            title="Share on facebook"
            style="color: #265ab1"
            target="_blank">
        </a>
        <a class="share-button fas fa-share-alt"
            title="Share"
            style="color: #c64570"
            id="share-button">
        </a>
    </span>
    <br>
    <?php echo $POST->content ?>
</article>

<script>
  history.replaceState('', '', '<?php echo $POST->title ?>')
  document.title = '<?php echo $POST->title ?>'

  $('#share-button').onclick = () => {
    if (navigator.share) {
      navigator.share({
        title: '<?php echo $_SHARE_TEXT ?>',
        url: '<?php echo $_SHARE_URL ?>'
      })
    } else {
      let input = document.createElement('INPUT')
      document.body.appendChild(input).value = '<?php echo $_SHARE_URL ?>'
      input.select()
      document.execCommand('copy')
      input.remove()
      alert('The url was copied to the clipboard')
    }
  }
</script>
