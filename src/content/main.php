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
          window.dataLayer = window.dataLayer || []

          function gtag () {dataLayer.push(arguments)}

          gtag('js', new Date())

          gtag('config', 'UA-43282075-1')
        </script>

        <!-- OpenDesktop Verification -->
        <meta name="ocs-site-verification" content="084f4288d669ee68c92d22ebe5c44d97"/>

        <style>
            body {
                min-width: 320px;
                padding-top: 50px;
                font-family: sans-serif;
            }
            
            header {
                position: absolute;
                height: 500px;
                width: 95%;
                border-radius: 2px;
                left: 50%;
                transform: translateX(-50%);
                background: linear-gradient(203deg, rgba(124, 69, 152, 1) 17%, rgb(34, 0, 221) 100%);
                top: 0;
                z-index: -1;
                box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12), inset 0 -10px 0px 0 rgba(0, 0, 0, .1);
            }

            nav {
                height: 50px;
                background: white;
                font-size: 20px;
                position: fixed;
                line-height: 50px;
                top: 0;
                right: 0;
                left: 0;
                z-index: 10;
            }

            nav a {
                color: black !important;
                padding: 0 30px;
                text-align: right;
                height: 50px;
                line-height: 50px;
                display: inline-block;
                text-decoration: none !important;
            }

            nav a span {
                font-weight: 400;
                letter-spacing: 1px;
            }
            
            main {
                min-height: 450px;
            }
            
            .paper {
                font-size: 16px;
                padding: 10px 20px;
                background-color: white;
                margin-top: 20px;
                min-height: 100px;
            }
            
            .paper a.blue-button-link, .paper a.blue-button-link, article a.blue-button-link {
                color: white;
                line-height: 50px;
                border-radius: 2px;
                background: blue;
                width: 236px;
                text-align: center;
                margin: 30px auto;
                text-shadow: 0 0 1px white;
                color: white;
                display: block;
                transition: transform .2s;
            }
            
            .paper.download-box {
                max-width: 600px;
                padding: 10px 20px;
                margin: auto auto 50px;
                width: 95%;
                position: relative;
                padding-bottom: 50px;
            }
            
            .paper.download-box a.blue-button-link {
                margin: 10px auto;
            }
            
            .paper.download-box > a:nth-child(2) {
                font-size: 20px;
                display: block;
                text-align: center;
                margin: 25px 0;
            }
            
            .paper.download-box .github {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: #041926;
                line-height: 40px;
                color: white;
                text-align: center;
                font-weight: bold;
                height: 40px;
            }
            .paper.download-box .github i {
                margin: 0 10px;
            }
            .paper.download-box .github i:last-child {
                margin-left: 20px;
            }
        </style>
    </head>
    <body>
        <header></header>
        <nav class="with-shadow">
            <a href="/" class="__eth-link" title="↤ Go to main page">
                <i class="fas fa-chevron-left"></i>
                <span>D<span style="display: inline-block;transform: rotateY(180deg) translateX(1px);">R</span>A</span>
            </a>
        </nav>
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
            <h1>Projects</h1>
            <a class="paper __eth-link" href="/flat-remix" data-github="flat-remix">
                <div class="content-img">
                    <img src="/img/flat-remix.png" alt="Flat Remix cover">
                </div>
                <h4>Flat Remix ICON theme</h4>
            </a>
            <a class="paper __eth-link" href="flat-remix-gnome" data-github="flat-remix-gnome">
                <div class="content-img">
                    <img src="/img/flat-remix-gnome.jpg" alt="Flat Remix GNOME theme">
                </div>
                <h4>Flat Remix GNOME theme</h4>
            </a>
            <a class="paper __eth-link" href="/flat-remix-gtk" data-github="flat-remix-gtk">
                <div class="content-img">
                    <img src="/img/flat-remix-gtk.jpg" alt="Flat Remix GTK theme">
                </div>
                <h4>Flat Remix GTK theme</h4>
            </a>
            <a class="paper __eth-link" href="/flat-remix-css" data-github="Flat-Remix-CSS-library">
                <div class="content-img">
                    <img src="/img/flat-remix-css.jpg" alt="Flat Remix css library">
                </div>
                <h4>Flat Remix CSS Library</h4>
            </a>
            <a class="paper __eth-link" href="/AI-robot" data-github="Cleaning-Robot-AI">
                <div class="content-img">
                    <img src="/img/AI-robot.png" alt="Neural network with genetic algorithms in Unity3d">
                </div>
                <h4>Neural network with genetic algorithms</h4>
            </a>
            <a class="paper __eth-link" href="/ethenis" data-github="Ethenis-Framework">
                <div class="content-img">
                    <img src="/img/ethenis.svg" alt="Ethenis Framework logo">
                </div>
                <h4>Ethenis Framework</h4>
            </a>
            <a target="_blank" href="https://assafpb.com" class="paper">
                <div class="content-img">
                    <img src="/img/assafpb.svg" alt="AssafPB.com logo">
                </div>
                <h4>AssafPB</h4>
            </a>
        </div>

    </body>
</html>

<!-- Flat-Remix.css -->
<link rel="stylesheet" type="text/css" href="/css/flat-remix.css">

<!-- FontAwesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<style>
    paper a.blue-button-link:hover, .paper a.blue-button-link:hover article a.blue-button-link:hover {
        transform: scale(1.02);
        text-decoration: none;
    }

    article img {
        box-shadow: 0 5px 30px 0 rgba(0, 0, 0, .3);
        margin: 20px 0;
        border-radius: 3px;
        max-width: 100%;
    }

    #back-to-top {
        display: none;
        width: 60px;
        height: 60px;
        position: fixed;
        right: 30px;
        bottom: 30px;
        border-radius: 30px;
        background: black;
        font-size: 41px;
        line-height: 61px;
        text-align: center;
        z-index: 100;
        cursor: pointer;
        color: white;
    }

    #back-to-top i {
        cursor: pointer;
    }
    
    .separator {
        margin: 100px auto;
    }

    #content {
        margin: auto;
        margin-bottom: 200px;
        text-align: center;
        max-width: 1300px;
    }

    #content .paper {
        display: inline-block;
        vertical-align: top;
        padding: 0;
        width: 300px;
        margin: 10px;
        height: 510px;
        text-align: left;
        transition: transform .2s;
        position: relative;
    }

    #content .paper:hover {
        transform: scale(1.03)
    }

    #content a, #content a:hover, #content a:active {
        text-decoration: none;
        color: black;
        font-weight: inherit;
    }

    #content .paper h4 {
        margin: 20px;
    }

    .content-img {
        height: 390px;
        display: block;
        line-height: 390px;
        background: white;
    }

    .content-img img {
        width: 100%;
        display: inline-block;
        vertical-align: middle;
    }
    
    #content .github {
        height: 45px;
        width: 100%;
        position: absolute;
        bottom: 135px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(2px);
        text-align: right;
        padding: 8px 15px;
        color: #041926;
        font-weight: bold;
    }
    
    #content .github i:last-child {
        margin-left: 11px;
    }
    
    #content .github i {
        margin: 0 5px;
    }

    @media screen and (max-width: 570px) {
        .bash {
            padding-left: 20px;
            font-size: 10px;
        }

        h1 {
            font-size: 45px;
        }

        h1 {
            font-size: 40px;
            line-height: 60px;
        }

        h2 {
            font-size: 32px;
            font-weight: lighter;
            line-height: 40px;
        }

        h3 {
            font-size: 26px;
        }

        h4 {
            font-size: 20px;
        }

        h5 {
            font-size: 18px;
            padding: 0;
        }

        h6 {
            font-size: 15px;
            padding: 0;
        }
    }
    
    @keyframes loading-element {
        0% {
            width: 0;
        }
        5% {
            transform: none;
            width: 20%;
        }
        10% {
            transform: translateX(20vw);
            width: 4px;
        }
        35% {
            transform: translateX(80vw);
            width: 4px;
        }
        40% {
            width: 30%;
            transform: translateX(80vw);
        }
        45% {
            transform: translateX(110vw);
        }
        46% {
            visibility: hidden;
        }
        100% {
            visibility: hidden;
        }
    }

    body.loading #loading-animation div {
        display: block;
    }

    #loading-animation div {
        left: 0;
        top: 2px;
        display: none;
        position: fixed;
        z-index: 1000;
        height: 4px;
        border-radius: 4px;
        background: #ba174e;
        box-shadow: 0 1px 0 black;
        animation: loading-element 5s infinite;
    }

    #loading-animation div:nth-child(2) {
        margin-left: -8px;
        animation-delay: .25s;
    }

    #loading-animation div:nth-child(3) {
        margin-left: -16px;
        animation-delay: .5s;
    }

    #loading-animation div:nth-child(4) {
        margin-left: -24px;
        animation-delay: .75s;
    }

    #loading-animation div:nth-child(5) {
        margin-left: -32px;
        animation-delay: 1s;
    }
</style>

<script>
  function $ (query) {
    return document.querySelector(query)
  }

  (function () {
    window.addEventListener('scroll', function () {
      scroll = window.scrollY
      $('header').style.height = 500 - (scroll * 0.5) + 'px'

      if (window.scrollY > 500)
        $('#back-to-top').style.display = 'block'
      else
        $('#back-to-top').style.display = 'none'
    })

    $('#back-to-top').onclick = function () {
      window.addEventListener('wheel', stopScrollToTop)
      window.addEventListener('touchmove', stopScrollToTop)

      var scrollDuration = 300,
        scrollStep = -window.scrollY / (scrollDuration / 15),
        scrollInterval =
          setInterval(function () {
            if (window.scrollY != 0)
              window.scrollBy(0, scrollStep)
            else stopScrollToTop()
          }, 15)

      function stopScrollToTop () {
        window.removeEventListener('wheel', stopScrollToTop)
        window.removeEventListener('touchmove', stopScrollToTop)
        clearInterval(scrollInterval)
      }
    }

    ;(function () {
      function loadGithubInfo () {
        var data = JSON.parse(localStorage.getItem("github"))
        data.forEach(function (obj) {
          var e = $('#content a[data-github="' + obj.name + '"]')
          if (e === null) return
          var githubHTML = "<div class=\"github\"><i class=\"far fa-heart\"></i>" + obj.stargazers_count + "<i class=\"fas fa-code-branch\"></i>" + obj.forks + "</div>"
          e.innerHTML = githubHTML + e.innerHTML
        })
      }
       
      function loadDownloadBannerGithubInfo () {
        var e = $('.download-box[data-github]')
        if (e === null) return
        var repo = e.dataset.github
        var data = JSON.parse(localStorage.getItem('github')).filter(function(obj) {
           return obj.name === repo ? obj : false
        })[0]
        e.innerHTML += "<div class=\"github\"><i class=\"far fa-heart\"></i>" + data.stargazers_count + "<i class=\"fas fa-code-branch\"></i>" + data.forks + "</div>"
      }

      if (localStorage.getItem('github') === null) {
        var request = new XMLHttpRequest()
        request.open('GET', 'https://api.github.com/users/daniruiz/repos')
        request.onload = function () {
          localStorage.setItem("github", request.response)
          loadGithubInfo()
          loadDownloadBannerGithubInfo()
          __ETHENIS.onLoad = loadDownloadBannerGithubInfo
        }
        request.send()
      } else {
          loadGithubInfo()
          __ETHENIS.onLoad = loadDownloadBannerGithubInfo
      }
    })()
  })()
</script>

