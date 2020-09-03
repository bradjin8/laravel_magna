const iframePopup = document.querySelector('#iframe-popup'),
      btnCloseIframePopup = document.querySelector('#iframe-popup .popup-close'),
      iframe = document.querySelector('#iframe-popup iframe')

const hide_iframe_popup = () => {
    $(".infoButton").fadeIn( "fast", () => {})
    iframePopup.style.opacity = '0'
}
const show_iframe_popup = () => {
    $(".infoButton").fadeOut( "fast", () => {});
    iframePopup.style.opacity = '1'
    iframePopup.style.visibility = 'visible'
}

video.onclick = show_iframe_popup
btnCloseIframePopup.onclick = hide_iframe_popup

iframePopup.addEventListener('transitionend', () => {
    if (iframePopup.style.opacity == '0')
        iframePopup.style.visibility = 'hidden'
})
