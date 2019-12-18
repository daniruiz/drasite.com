<!DOCTYPE html>

<html lang="en">
    <head>

        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="description" content="Daniel Ruiz de Alegría's open source projects.">

        <!-- Title -->
        <title>DяA | Daniel Ruiz de Alegría</title>
        <meta name="apple-mobile-web-app-title" content="DяA">

        <!-- Theme Colors -->
        <meta name="theme-color" content="black">
        <meta name="msapplication-navbutton-color" content="black">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <!-- Icons -->
        <link rel="shortcut icon" href="/img/favicon.png">
        <link rel="icon" type="image/png" href="/img/DRA.png">
        <link rel="apple-touch-icon-precomposed" href="/img/DRA.png">

        <!-- Twitter Optimization  -->
        <meta name="twitter:card" content="Daniel Ruiz de Alegría's open source projects.">
        <meta name="twitter:title" content="DяA | drasite.com">
        <meta name="twitter:description" content="Daniel Ruiz de Alegría's open source projects.">
        <meta name="twitter:image" content="https://drasite.com/img/promo.png"/>
        <meta name="twitter:card" content="https://drasite.com/img/promo.png"/>
        <meta name="twitter:url" content="https://drasite.com/"/>

        <!-- Facebook Optimization -->
        <meta property="og:site_name" content="drasite.com"/>
        <meta property="og:title" content="DяA | drasite.com"/>
        <meta property="og:description" content="Daniel Ruiz de Alegría's open source projects."/>
        <meta property="og:image" content="https://drasite.com/img/promo.png"/>

        <!-- Google Optimization -->
        <meta itemprop="name" content="DяA | drasite.com"/>
        <meta itemprop="description" content="Daniel Ruiz de Alegría's open source projects."/>
        <meta itemprop="image" content="https://drasite.com/img/promo.png"/>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-43282075-1"></script>
        <script>
          let host = window.location.hostname;
          if(host != "localhost") {
            window.dataLayer = window.dataLayer || []

            function gtag () {dataLayer.push(arguments)}

            gtag('js', new Date())
            gtag('config', 'UA-43282075-1')
          }
        </script>

        <!-- OpenDesktop Verification -->
        <meta name="ocs-site-verification" content="084f4288d669ee68c92d22ebe5c44d97"/>

        <style><?php include "content/css/min.css" ?></style>
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
        <div id="back-to-top" title="⇡ Back to top" class="with-shadow">
            <i class="fas fa-chevron-up""></i>
        </div>
        <div id="loading-animation">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>

        <hr class="separator">

        <div id="content">
            <?php function show_projects ($position) {
                $path = Ethenis::get_path();
                $is_blog_post = preg_match('/^blog\/.+$/', $path); ?>
                <div class="projects-preview" style="<?php if (($position == 'first' && $is_blog_post) || ($position == 'last' && !$is_blog_post)) echo 'display:none' ?>">
                    <h1>Projects</h1>
                    <a class="paper __eth-link" href="/flat-remix" data-github="flat-remix">
                        <div class="project-img">
                            <img src="/img/flat-remix.jpg" alt="Flat Remix cover">
                        </div>
                        <h4>Flat Remix ICON theme</h4>
                    </a>
                    <a class="paper __eth-link" href="/flat-remix-gnome" data-github="flat-remix-gnome">
                        <div class="project-img">
                            <img src="/img/flat-remix-gnome.jpg" alt="Flat Remix GNOME theme">
                        </div>
                        <h4>Flat Remix GNOME theme</h4>
                    </a>
                    <a class="paper __eth-link" href="/flat-remix-gtk" data-github="flat-remix-gtk">
                        <div class="project-img">
                            <img src="/img/flat-remix-gtk.jpg" alt="Flat Remix GTK theme">
                        </div>
                        <h4>Flat Remix GTK theme</h4>
                    </a>
                    <a class="paper __eth-link" href="/flat-remix-css" data-github="flat-remix-css">
                        <div class="project-img">
                            <img src="/img/flat-remix-css.jpg" alt="Flat Remix css library">
                        </div>
                        <h4>Flat Remix CSS Library</h4>
                    </a>
                    <a class="paper __eth-link" href="/dotfiles" data-github="dotfiles">
                        <div class="project-img">
                            <img src="/img/dotfiles.svg" alt="~/.dotfiles">
                        </div>
                        <h4>~/.dotfiles</h4>
                    </a>
                    <a class="paper __eth-link" href="/AI-robot" data-github="Cleaning-Robot-AI">
                        <div class="project-img">
                            <img src="/img/AI-robot.svg" alt="Neural network with genetic algorithms in Unity3d">
                        </div>
                        <h4>Neural network with genetic algorithms</h4>
                    </a>
                    <a class="paper __eth-link" href="/flat-remix-kde" data-github="flat-remix-kde">
                        <div class="project-img">
                            <img src="/img/flat-remix-kde.jpg" alt="Flat Remix KDE themes">
                        </div>
                        <h4>Flat Remix KDE themes</h4>
                    </a>
                    <a class="paper __eth-link" href="/ethenis" data-github="Ethenis-Framework">
                        <div class="project-img">
                            <img src="/img/ethenis.svg" alt="Ethenis Framework logo">
                        </div>
                        <h4>Ethenis Framework</h4>
                    </a>
                    <a class="paper __eth-link" href="/color-fixer" data-github="Color-Fixer">
                        <div class="project-img">
                            <img src="/img/color-fixer.jpg" alt="Color Fixer logo">
                        </div>
                        <h4>Color Fixer</h4>
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
                        <a class="__eth-link" href="/blog/<?php echo $post->title ?>"><h1><?php echo $post->title ?></h1></a>
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
            <a href="/supporters">Supporters</a>
        </footer>

        <a id="support-banner" target="_blank" href="https://www.paypal.me/daniruizdealegria">Consider supporting my
            work with a <span>Donation</span> 😉</a>

        <!-- Flat-Remix.css -->
        <style><?php include "css/flat-remix.css" ?></style>

        <style><?php include "content/css/main.css" ?></style>

        <!-- FontAwesome -->
        <link rel="stylesheet" crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">

        <script><?php include "content/js/main.js" ?></script>
    </body>
</html>

