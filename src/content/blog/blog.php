<?php
    include 'content/blog/php/Post.php';
    $POST = Post::from_url(Ethenis::get_path());

    $document = new DOMDocument();
    $document->loadHTML($POST->content);
    $xpath = new DOMXPath($document);

    $_SHARE_CARD_IMAGE = $xpath->evaluate("string(//img/@src)");
    $_SHARE_TEXT = $POST->title.' | DяA';
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
            href="https://facebook.com/sharer/sharer.php?display=page&u=<?php echo $_SHARE_URL_ENCODED ?>"
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
  document.title = '<?php echo $POST->title ?> | DяA'

  $('#share-button').onclick = () => {
    if (navigator.share) {
      navigator.share({
        text: '<?php echo $_SHARE_TEXT ?>',
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


<!-- Meta -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="drasite.com | DяA">
<meta name="twitter:description" content="<?php echo $POST->title ?> :: Daniel Ruiz de Alegría's open source projects">
<meta name="twitter:image" content="https://drasite.com<?php echo $_SHARE_CARD_IMAGE ?>">
<meta name="twitter:url" content="<?php echo $_SHARE_URL ?>">
