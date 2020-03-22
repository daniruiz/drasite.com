$$ = query => document.querySelectorAll(query)
$ = query => document.querySelector(query) || undefined

const updateMetaData = (() => {
  const defaultTitle = document.title
  const defaultDescription = $('meta[name=description]').content

  return (obj) => {
    document.title = obj && obj.title || defaultTitle

    $('meta[name=description]').remove()
    document.head.appendChild(
      Object.assign(document.createElement('META'), {
        name: 'description',
        content: obj && obj.description || defaultDescription
      }))
  }
})()
