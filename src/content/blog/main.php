<?php
    include 'content/blog/php/Post.php';
    $POSTS = Post::get_posts();
?>

<script>document.title = "DяA | Blog"</script>

<style><?php include "content/blog/css/blog.css" ?></style>

<div id="blog-container">
    <?php foreach ($POSTS as $post) { ?>
        <article>
            <a class="__eth-link" href="/blog/<?php echo $post->title ?>"><h1><?php echo $post->title ?></h1></a>
            <time datetime="<?php echo $post->date_time ?>"><?php echo $post->date_string ?></time>
            <br>
            <?php echo $post->preview; ?>
            <a class="read-more-button __eth-link" href="/blog/<?php echo $post->title ?>">Read more ↦</a>
        </article>
        <hr/>
    <?php } ?>
</div>
