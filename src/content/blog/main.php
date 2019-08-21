<style>
    header { display: none; }

    #blog-container {
        max-width: 650px;
        padding: 20px;
        margin: auto auto 50px;
        width: 95%;
    }

    article > a > h1 { margin: 0 0 15px; }

    article > a:hover { text-decoration: none !important; }

    article > a.read-more-button {
        line-height: 42px;
        border-radius: 100px;
        text-align: center;
        margin: 30px auto;
        text-shadow: 0 0 1px white;
        color: #666;
        display: block;
        transition: transform .2s;
        border: 3px solid #E9E9E9;
        width: 120px;
    }

    article > a.read-more-button:hover {
        transform: scale(1.05);
        text-decoration: none;
    }

    article { margin: 50px 0; }

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

    article > p * { color: inherit !important; }

    #blog-container > hr {
        width: 0;
        box-shadow: 0 7px rgba(0, 0, 0, .3);
    }
</style>
<div id="blog-container">
    <?php
        include "content/blog/php/Post.php";
        $post_files = array_diff(scandir("content/blog/posts"), [".", ".."]);
        foreach (array_reverse($post_files) as $file) {
            $post = new Post($file);
            ?>

            <article>
                <a href="/blog/<?php echo $post->title ?>" class="__eth-link"><h1><?php echo $post->title ?></h1></a>
                <time datetime='<?php echo $post->datetime ?>'><?php echo $post->date_string ?></time>
                <br/>

                <?php echo $post->preview; ?>
                <a class="read-more-button __eth-link" href="/blog/<?php echo $post->title ?>">Read more ↦</a>
            </article>
            <hr/>
            <?php
        }
    ?>
</div>
