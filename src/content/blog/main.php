<style>
    header {
        display: none;
    }

    article {
        max-width: 880px;
        padding: 20px;
        margin: auto auto 50px;
        width: 95%;
    }
</style>

<?php
    include "content/blog/php/Post.php";
    $post_files = array_diff(scandir("content/blog/posts"), [".", ".."]);
    foreach (array_reverse($post_files) as $file) {
        $post = new Post($file);
        ?>

        <h1><?php echo $post->title ?></h1>
        <time datetime='<?php echo $post->datetime ?>'><?php echo $post->date_string ?></time>
        <br/>

        <?php
        echo $post->content;
    }
?>
