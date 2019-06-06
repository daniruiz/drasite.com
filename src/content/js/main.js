const extendFunctions = (father, son) => () => {
  if (typeof father === 'function') father()
  son()
}

function getGithubApiInfo (fnc) {
  if (localStorage.getItem('github') === null) {
    let request = new XMLHttpRequest()
    request.open('GET', 'https://api.github.com/users/daniruiz/repos')
    request.onload = () => {
      if (JSON.parse(request.response).message === undefined) {
        localStorage.setItem('github', request.response)
        fnc()
      }
    }
    request.send()
  } else fnc()
}

function loadProjectLinkGithubInfo () {
  let data = JSON.parse(localStorage.getItem('github'))
  data.forEach(function (obj) {
    let e = $(`#content a[data-github="${obj.name}"]`)
    if (e === undefined) return
    let githubHTML = `<a class="github"><i class="far fa-heart"></i>${obj.stargazers_count}<i class="fas fa-code-branch"></i>${obj.forks}</a>`
    e.innerHTML = githubHTML + e.innerHTML
  })
}

function startGithubBannerLoader () {
  loadGithubBanner()
  __ETHENIS.onLoad = extendFunctions(__ETHENIS.onLoad, loadGithubBanner)
}

function loadGithubBanner () {
  let e = $('.download-box[data-github]')
  if (e === undefined) return
  let repo = e.dataset.github
  let [data] = JSON.parse(localStorage.getItem('github'))
    .filter(obj => obj.name === repo ? obj : false)
  e.innerHTML += `<a class="github" href="${data.html_url}" target="_blank"><i class="far fa-heart"></i>${data.stargazers_count}<i class="fas fa-code-branch"></i>${data.forks}</a>`
}

{
  window.addEventListener('scroll', () => {
    scroll = window.scrollY
    $('header').style.height = 500 - (scroll * 0.5) + 'px'

    if (window.scrollY > 500)
      $('#back-to-top').style.display = 'block'
    else
      $('#back-to-top').style.display = 'none'
  })

  $('#back-to-top').onclick = () => {
    const scrollDuration = 300
    let scrollInterval
    const stopScrollToTop = () => {
      window.removeEventListener('wheel', stopScrollToTop)
      window.removeEventListener('touchmove', stopScrollToTop)
      clearInterval(scrollInterval)
    }

    window.addEventListener('wheel', stopScrollToTop)
    window.addEventListener('touchmove', stopScrollToTop)

    let scrollStep = -window.scrollY / (scrollDuration / 15)
    scrollInterval = setInterval(() => {
      if (window.scrollY != 0)
        window.scrollBy(0, scrollStep)
      else
        stopScrollToTop()
    }, 15)
  }

  getGithubApiInfo(() => {
    loadProjectLinkGithubInfo()
    startGithubBannerLoader()
  })
}

