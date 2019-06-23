!function () {
  const getGithubAPIInfo = (forceFetch = false) => {
    if (forceFetch) return fetch('https://api.github.com/users/daniruiz/repos')
      .then(response => response.json())
      .then(responseObject => {
        if (responseObject.message === undefined) {
          localStorage.setItem('github', JSON.stringify({
            repos: responseObject,
            date: new Date
          }))
          return responseObject
        }
        return {}
      })

    const data = JSON.parse(localStorage.getItem('github')) || {}
    let yesterday = new Date
    yesterday.setDate((new Date).getDate() - 1)
    return new Date(data.date) > yesterday
      ? Promise.resolve(data)
      : getGithubAPIInfo(true)
  }

  const loadProjectLinkGithubInfo = () => {
    let { repos } = JSON.parse(localStorage.getItem('github'))
    repos.forEach(function (obj) {
      let e = $(`#content a[data-github="${obj.name}"]`)
      if (e !== undefined) e.innerHTML = `
        <a class="github">
            <i class="far fa-heart"></i>${obj.stargazers_count}<i class="fas fa-code-branch"></i>${obj.forks}
        </a>
        ${e.innerHTML}
      `
    })
  }

  const startGithubBannerLoader = () => {
    const loadGithubBanner = () => {
      let e = $('.download-box[data-github]')
      if (e === undefined) return
      let repo = e.dataset.github
      let [data] = JSON.parse(localStorage.getItem('github'))
        .repos
        .filter(obj => obj.name === repo ? obj : false)
      e.innerHTML += `<a class="github" href="${data.html_url}" target="_blank"><i class="far fa-heart"></i>${data.stargazers_count}<i class="fas fa-code-branch"></i>${data.forks}</a>`
    }

    loadGithubBanner()
    __ETHENIS.onLoad = (prevOnLoad => () => {
      if (typeof prevOnLoad === 'function') prevOnLoad()
      loadGithubBanner()
    })(__ETHENIS.onLoad)
  }

  window.addEventListener('scroll', () => {
    let scroll = window.scrollY
    $('header').style.height = `${500 - (scroll * 0.5)}px`

    if (window.scrollY > 500) $('#back-to-top').style.display = 'block'
    else $('#back-to-top').style.display = 'none'
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
      if (window.scrollY != 0) window.scrollBy(0, scrollStep)
      else stopScrollToTop()
    }, 15)
  }

  getGithubAPIInfo().then(() => {
    startGithubBannerLoader()
    loadProjectLinkGithubInfo()
  })
}()

