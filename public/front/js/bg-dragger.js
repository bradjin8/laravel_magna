const bg = document.querySelector('body > div.container')
const body = document.querySelector('body')
const btnMenuClose = document.querySelector('body > aside > label > img')
const buffer = {
  x: null,
  listener: null
}
bg.onmousedown = function(e) {
  if (buffer.x == null)
    buffer.x = e.pageX
  if (buffer.listener != null)
    document.removeEventListener('mousemove', buffer.listener)
  btnMenuClose.style.opacity = '0'
  body.style.transition = 'all 320ms cubic-bezier(0.4, 0.0, 0.2, 1)'
  body.style.transition = 'none'

  function mouseMove(e) { body.style.transform = 'translateX(' + (e.pageX - buffer.x) + 'px)' }

  document.addEventListener('mousemove', mouseMove)
  buffer.listener = mouseMove

  bg.onmouseup = function() {
    document.removeEventListener('mousemove', mouseMove)
    bg.onmouseup = null
    buffer.x = null

    body.style.transition = 'all 320ms cubic-bezier(0.4, 0.0, 0.2, 1)'
    body.style.transform = 'none'
    body.addEventListener('transitionend', () => {
      btnMenuClose.style.opacity = '1'
      body.style.transition = 'none'
    })
  }
}
