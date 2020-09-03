const bodyElement = document.querySelector('body')

function initFadedNavigation(bg=undefined) {
    jQuery.holdReady(true)
    jQuery("body").css("opacity", 0)
    jQuery.holdReady(false)
    jQuery(function ($) {
        $("body").fadeTo(400, 1, () => {
            if (bg)
                bodyElement.style.backgroundImage = 'url(' + bg + ')'
        })
        $(document).on("click", "a", function (event) {
            if ($(this)[0].download != undefined)
                return
            bodyElement.style.background = 'white'
            var newUrl = $(this).attr("href")
            event.preventDefault()
            $("body").fadeTo(400, 0, function () {
                if (!newUrl || newUrl[0] === "#") {
                    location.hash = newUrl
                    return
                }
                location = newUrl
                return false
            })
        })
    })
}
