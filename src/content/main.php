<!DOCTYPE html>

<html lang="en">
    <head>

        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="description" content="Daniel Ruiz de Alegría's projects [ DяA ] :: Open Source Developer ❤️">

        <!-- Title -->
        <title>DяA | Daniel Ruiz de Alegría</title>
        <meta name="apple-mobile-web-app-title" content="DяA">

        <!-- Theme Colors -->
        <meta name="theme-color" content="white">
        <meta name="msapplication-navbutton-color" content="white">
        <meta name="apple-mobile-web-app-status-bar-style" content="white">

        <!-- Icons -->
        <link rel="icon" type="image/png" href="/content/img/favicon.png" sizes="16x16 32x32">
        <link rel="icon" type="image/png" href="/content/img/DRA.png" sizes="64x64">
        <link rel="apple-touch-icon-precomposed" href="/content/img/DRA.png">

        <!-- Minimum CSS styles -->
        <style><?php include "content/css/min.css" ?></style>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-G975NQNE8M"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-G975NQNE8M');
        </script>
    </head>
    <body>
        <header></header>
        <nav class="with-shadow">
            <a href="." class="__eth-link" title="↤ Go back">
                <i class="fas fa-chevron-left"></i>
            </a>
            <span>D<span style="display: inline-block;transform: rotateY(180deg) translateX(1px);">R</span>A</span>
        </nav>
        <script><?php include "content/js/common.js" ?></script>
        <main><{ content }></main>
        <div id="loading-animation">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div id="content">
            <?php function show_projects ($position) {
                $path = Ethenis::get_path();
                $is_blog_post = preg_match('/^blog\/.+$/', $path);
                $show_projects = ($position == 'first' && $is_blog_post) || ($position == 'last' && !$is_blog_post) ?>
                <div class="projects-preview"
                    style="<?php if(!$show_projects) echo 'display:none' ?>">
                    <h1>My projects</h1>
                    <a class="paper" href="https://gitlab.com/kalilinux/packages/kali-themes" target="_blank">
                        <div class="project-img" style="background-image: linear-gradient(120deg, #23bac2, #3b6ab9)">
                            <img src="/content/img/kali-dragon-icon.svg" alt="Kali Linux Dragon logo">
                        </div>
                        <h4>Kali Linux themes</h4>
                    </a>
                    <a class="paper __eth-link" href="/flat-remix" data-github="flat-remix">
                        <div class="project-img">
                            <img src="/content/img/flat-remix.jpg" alt="Flat Remix cover">
                        </div>
                        <h4>Flat Remix ICON theme</h4>
                    </a>
                    <a class="paper __eth-link" href="/flat-remix-gnome" data-github="flat-remix-gnome">
                        <div class="project-img">
                            <img src="/content/img/flat-remix-gnome.jpg" alt="Flat Remix GNOME theme">
                        </div>
                        <h4>Flat Remix GNOME theme</h4>
                    </a>
                    <a class="paper __eth-link" href="/flat-remix-gtk" data-github="flat-remix-gtk">
                        <div class="project-img">
                            <img src="/content/img/flat-remix-gtk.jpg" alt="Flat Remix GTK theme">
                        </div>
                        <h4>Flat Remix GTK theme</h4>
                    </a>
                    <a class="paper __eth-link" href="/dotfiles" data-github="dotfiles">
                        <div class="project-img">
                            <img src="/content/img/dotfiles.svg" alt="~/.dotfiles">
                        </div>
                        <h4>~/.dotfiles</h4>
                    </a>
                    <a class="paper __eth-link" href="/skeuos-gtk" data-github="skeuos-gtk">
                        <div class="project-img">
                            <img src="/content/img/skeuos-gtk.jpg" alt="Skeuos GTK theme">
                        </div>
                        <h4>Skeuos GTK theme</h4>
                    </a>
                    <a class="paper __eth-link" href="/flat-remix-css" data-github="flat-remix-css">
                        <div class="project-img">
                            <img src="/content/img/flat-remix-css.jpg" alt="Flat Remix css library">
                        </div>
                        <h4>Flat Remix CSS Library</h4>
                    </a>
                    <a class="paper __eth-link" href="/skeuos-css" data-github="skeuos-css">
                        <div class="project-img">
                            <img src="/content/img/skeuos-css.jpg" alt="Skeuos CSS Library">
                        </div>
                        <h4>Skeuos CSS Library</h4>
                    </a>
                    <a class="paper __eth-link" href="/flat-remix-kde" data-github="flat-remix-kde">
                        <div class="project-img">
                            <img src="/content/img/flat-remix-kde.jpg" alt="Flat Remix KDE themes">
                        </div>
                        <h4>Flat Remix KDE themes</h4>
                    </a>
                    <a class="paper __eth-link" href="/color-fixer" data-github="Color-Fixer">
                        <div class="project-img">
                            <img src="/content/img/color-fixer.jpg" alt="Color Fixer logo">
                        </div>
                        <h4>Color Fixer</h4>
                    </a>
                    <a class="paper __eth-link" href="/AI-robot" data-github="Cleaning-Robot-AI">
                        <div class="project-img">
                            <img src="/content/img/AI-robot.svg" alt="Neural network with genetic algorithms in Unity3d">
                        </div>
                        <h4>Neural network with genetic algorithms</h4>
                    </a>
                    <a class="paper __eth-link" href="/gnome-4x-themes" data-github="GNOME-4X-themes">
                        <div class="project-img">
                            <img src="/content/img/gnome-4x.jpg" alt="GNOME 4X themes">
                        </div>
                        <h4>GNOME 4X themes</h4>
                    </a>
                    <a class="paper __eth-link" href="/tetris" data-github="tetris-js">
                        <div class="project-img">
                            <img src="/content/img/tetris.jpg" alt="Tetяis JS">
                        </div>
                        <h4>Tetяis JS</h4>
                    </a>
                    <a class="paper __eth-link" href="/ethenis" data-github="Ethenis-Framework">
                        <div class="project-img">
                            <img src="/content/img/ethenis.svg" alt="Ethenis Framework logo">
                        </div>
                        <h4>Ethenis Framework</h4>
                    </a>
                    <a class="paper" href="https://github.com/daniruiz/AC_MAZDA_MX5-ND2"  data-github="AC_MAZDA_MX5-ND2" target="_blank">
                        <div class="project-img">
                            <img src="/content/img/mx5-nd2.jpg" alt="Linux From Scratch">
                        </div>
                        <h4>Mazda MX5 ND2 for Assetto Corsa</h4>
                    </a>
                    <a class="paper __eth-link" href="/linux-from-scratch">
                        <div class="project-img">
                            <img src="/content/img/lfs.jpg" alt="Linux From Scratch">
                        </div>
                        <h4>Linux From Scratch</h4>
                    </a>
                    <hr class="separator">
                </div>
            <?php } ?>

            <?php show_projects('first') ?>

            <?php
                include_once 'content/blog/php/Post.php';
                $POSTS = Post::get_posts();
            ?>
            <div id="blog-preview-container" style="<?php if (Ethenis::get_path() == 'blog') echo 'display:none' ?>">
                <h1>Latest posts</h1>
                <?php foreach ($POSTS as $post) { ?>
                    <article>
                        <a class="__eth-link" href="/blog/<?php echo $post->title ?>">
                            <h1><?php echo $post->title ?></h1>
                        </a>
                        <time datetime="<?php echo $post->date_time ?>"><?php echo $post->date_string ?></time>
                        <br>
                        <?php echo $post->preview; ?>
                        <a class="read-more-button __eth-link" href="/blog/<?php echo $post->title ?>">Read more ↦</a>
                    </article>
                    <hr/>
                <?php } ?>
                <hr class="separator">
            </div>

            <?php show_projects('last') ?>
        </div>

        <footer>
            <a href="/supporters" class="__eth-link">Supporters</a>
        </footer>

        <a id="support-banner" target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LXCXPZKEU3L24&source=url">Consider supporting my
            work with a <span>Donation</span> 😉</a>

        <!-- Flat-Remix.css -->
        <style><?php include "css/flat-remix-css/css/flat-remix.css" ?></style>

        <style><?php include "content/css/main.css" ?></style>

        <!-- FontAwesome -->
        <link rel="stylesheet" crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

        <!-- main.js -->
        <script><?php include "content/js/main.js" ?></script>
    </body>
</html>

