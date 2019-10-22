<?php
    include 'content/blog/php/Post.php';
    $name_pattern = urldecode(basename(Ethenis::get_path()));
    $POST = Post::from_pattern($name_pattern);
?>

<style>
    header { display: none; }

    article {
        max-width: 650px;
        padding: 20px;
        margin: auto auto 50px;
        width: 95%;
        font-size: 15px;
    }

    article time {
        background-color: #eee;
        border: solid 1px #ddd;
        border-radius: 3px;
    }

    article time::before {
        content: "";
        width: 16px;
        height: 16px;
        padding: 0;
        margin: 0 2px 0 0;
        display: inline-block;
        vertical-align: middle;
        background-repeat: no-repeat;
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAAW0lEQVR4AWMgAcyYicZGgKke0x/N/I8Opz+a7AlVAOTigHAF2C0lSQGcBcOkmgAhqWcCpoJnk2Qw9U+SmfkMFrAdM7fBlSCkt83ogJnAClTyDC0UnwHFWBmoAABeoGyUiuDGtQAAAABJRU5ErkJggg==');
        position: relative;
        top: -1px;
    }
</style>
<article>
    <h1><?php echo $POST->title ?></h1>
    <time datetime='<?php echo $POST->datetime ?>'><?php echo $POST->date_string ?></time>
    <br/>
    <?php echo $POST->content ?>
</article>

<script>
  history.replaceState('', '', $('article > h1').innerText)
  document.title = "<?php echo $POST->title ?>"
</script>
