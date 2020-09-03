function initMplayer(popupMenus) {
    let openMplayerMethods = []
    for (let name of Object.keys(popupMenus)) {
        let menu = popupMenus[name]
        openMplayerMethods.push(() => { return setupMplayer(menu) })
    }

    function setupMplayer(menu) {
        let popup = document.querySelector('#media-player'),
            popupVideo = document.querySelector('#media-player video'),
            popupImg = document.querySelector('#media-player .right img'),
            popupSubtitle = document.querySelector('.popup .right h3'),
            popupDescription = document.querySelector('.popup .right p'),
            btnClose = document.querySelector('#media-player .popup-close'),
            menuContainer = document.querySelector('#media-player-menu'),
            popupTitle = document.querySelector('#media-player .titlebar h2'),
            popupMenuTitle = document.querySelector('#media-player .left h2'),
            popupContent = document.querySelector('#media-player .content')

        let onclickListeners = [],
            menuItems = [],
            clickableItems = []  // for removing "active" class name
        menuContainer.innerHTML = ''
        for (let m of menu) {
            if (m.grouptitle) {
                let item = document.createElement('h3')
                item.textContent = m.grouptitle
                menuContainer.appendChild(item)
                menuItems.push(item)
                continue
            }

            let item = document.createElement('div')
            if (m.issubitem)
                item.className = 'subitem'

            let btnTechsheet = undefined,
                btnImage = undefined,
                btnVideo = undefined
            let btnItem = document.createElement('span')
            btnItem.className = 'text'
            btnItem.textContent = m.title
            item.appendChild(btnItem)
            clickableItems.push(btnItem)

            if (m.techsheet) {
                btnTechsheet = document.createElement('span')
                btnTechsheet.className = 'techsheet'
                btnTechsheet.onclick = () => {
                    removeActiveClass()
                    btnTechsheet.classList.add('active')
                    btnItem.classList.add('active')
                    showData({ title: m.title, menutitle: m.menutitle, techsheet: m.techsheet, subtitle: m.subtitle, description: m.description }) }
                item.appendChild(btnTechsheet)
                clickableItems.push(btnTechsheet)
            }

            if (m.image) {
                btnImage = document.createElement('span')
                btnImage.className = 'image'
                btnImage.onclick = () => {
                    removeActiveClass()
                    btnImage.classList.add('active')
                    btnItem.classList.add('active')
                    showData({ title: m.title, menutitle: m.menutitle, image: m.image, subtitle: m.subtitle, description: m.description }) }
                item.appendChild(btnImage)
                clickableItems.push(btnImage)
            }

            if (m.video) {
                btnVideo = document.createElement('span')
                btnVideo.className = 'video'
                btnVideo.onclick = () => {
                    removeActiveClass()
                    btnVideo.classList.add('active')
                    btnItem.classList.add('active')
                    showData({ title: m.title, menutitle: m.menutitle, video: m.video, subtitle: m.subtitle, description: m.description }) }
                item.appendChild(btnVideo)
                clickableItems.push(btnVideo)
            }

            if (m.defaultclick)
                btnItem.onclick = [btnTechsheet, btnImage, btnVideo][m.defaultclick]
            else {
                if (btnTechsheet)
                    btnItem.onclick = btnTechsheet.onclick
                else if (btnImage)
                    btnItem.onclick = btnImage.onclick
                else if (btnVideo)
                    btnItem.onclick = btnVideo.onclick
            }

            onclickListeners.push(btnItem.onclick)
            menuContainer.appendChild(item)
            menuItems.push(item)
        }

        function removeActiveClass() {
            for (let item of clickableItems)
                item.classList.remove('active')
        }

        function hide_popup() {
            popup.style.opacity = '0'
            $(".infoButton").fadeIn( "fast", () => {});
        }

        btnClose.onclick = hide_popup

        popup.addEventListener('transitionend', () => {
            if (popup.style.opacity == '1') {
                popupVideo.play()
            } else {
                popup.style.visibility = 'hidden'
                popupVideo.pause()
                popupVideo.currentTime = 0
                popupVideo.src = ''
                video_resize()
            }
        })

        function showData(m) {
            popupTitle.textContent = m.title
            if (m.menutitle)
                popupMenuTitle.textContent = m.menutitle
            popupVideo.pause()
            if (m.video) {
                popupVideo.src = m.video
                popupVideo.style.display = 'initial'
                popupImg.style.display = 'none'
                if (popup.style.opacity = '1')
                    popupVideo.play()
            } else if (m.image) {
                popupImg.src = m.image
                popupVideo.style.display = 'none'
                popupImg.style.display = 'initial'
            } else if (m.techsheet) {
                popupImg.src = m.techsheet
                popupVideo.style.display = 'none'
                popupImg.style.display = 'initial'
            }

            popup.style.visibility = 'visible'
            popup.style.opacity = '1'

            popupSubtitle.textContent = m.subtitle
            popupDescription.textContent = m.description

            $(".infoButton").fadeOut( "fast", () => {})
            popupContent.scrollTop = popupVideo.offsetTop - 24
        }

        return onclickListeners
    }
    return openMplayerMethods
}
