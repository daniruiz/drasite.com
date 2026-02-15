(function () {
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
      $$(`#content a[data-github="${obj.name}"]`).forEach(e => {
        if (e !== undefined) {
          e.innerHTML = `
                <a class="github">
                    <i class="far fa-heart"></i>${obj.stargazers_count}<i class="fas fa-code-branch"></i>${obj.forks}
                </a>
                ${e.innerHTML}`
        }
      })
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
  })

  getGithubAPIInfo().then(() => {
    startGithubBannerLoader()
    loadProjectLinkGithubInfo()
  })

  __ETHENIS.onLoad = (prevOnLoad => () => {
    if (typeof prevOnLoad === 'function') prevOnLoad()
    $('#blog-preview-container').style.display = 'block'
    $$('.projects-preview')[0].style.display = 'block'
    $$('.projects-preview')[1].style.display = 'none'
    if (location.pathname === '/blog')
      $('#blog-preview-container').style.display = 'none'
    if (/^\/blog\/.+$/.test(location.pathname)) {
      $$('.projects-preview')[0].style.display = 'none'
      $$('.projects-preview')[1].style.display = 'block'
    }
  })(__ETHENIS.onLoad)
})()

