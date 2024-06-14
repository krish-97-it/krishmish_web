jQuery(document).ready(function(){
    createProgressBar();

    // Progress bar on reading post below navbar
    function createProgressBar(){
        const readingProgress = document.querySelector('#post-progress-bar');
        if(readingProgress){
            const footerHeight = 250;
            document.addEventListener('scroll', function(e) {
            let w = (document.body.scrollTop || document.documentElement.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight - footerHeight) * 100;
            readingProgress.style.setProperty('width', w + '%');
            });
        }
    }

        //Right side sticky widgets
        var CURRENT_SCROLL_TOP = jQuery(window).scrollTop();
        var WINDOW_WIDTH = jQuery(window).outerWidth();
        var WINDOW_HEIGHT = jQuery(window).outerHeight();
        var IS_MOBILE = WINDOW_WIDTH <= 767.99999 ? 1 : 0;
        var IS_WINDOW_BELLOW_992 = WINDOW_WIDTH <= 991.99999 ? 1 : 0;
        jQuery(window).resize(function () {
            WINDOW_WIDTH = jQuery(window).outerWidth();
            WINDOW_HEIGHT = jQuery(window).outerHeight();
            CURRENT_SCROLL_TOP = jQuery(window).scrollTop();
            IS_MOBILE = WINDOW_WIDTH <= 767.99999 ? 1 : 0;
            IS_WINDOW_BELLOW_992 = WINDOW_WIDTH <= 991.99999 ? 1 : 0;
        });
        (function () {
        if (IS_MOBILE) return;
        var leftBlock = jQuery('[data-scroll-left]');
        var rightBlock = jQuery('[data-scroll-right]');
        if (!leftBlock.length || !rightBlock.length) return; // if data-scroll-left-container, data-scroll-right-container does not exist, just exit from here.
        var leftBlockContainer = leftBlock.find('[data-scroll-left-container]');
        var rightBlockContainer = rightBlock.find('[data-scroll-right-container]');
        if (!leftBlockContainer.length || !rightBlockContainer.length) return; // if data-scroll-left-container, data-scroll-right-container does not exist just exit from here.
        var lbh = leftBlock.outerHeight();
        var rbh = rightBlock.outerHeight();
        var lbch = leftBlockContainer.outerHeight();
        var rbch = rightBlockContainer.outerHeight();
        var smallBlockIs = lbh > rbh ? 'rightBlock' : 'leftBlock'; // finding small block
        var moreHeight = smallBlockIs === 'rightBlock' ? lbh : rbh; // finding which side has more height
        function twoColumnLayoutAnimator() {
            leftBlock = jQuery('[data-scroll-left]');
            rightBlock = jQuery('[data-scroll-right]');
            leftBlock.removeAttr("style"); // Removing styles on page load
            rightBlock.removeAttr("style");
            leftBlockContainer.removeAttr("style");
            rightBlockContainer.removeAttr("style");
            lbh = leftBlock.outerHeight();
            var lbw = leftBlock.outerWidth();
            var leftBlockOffset = leftBlock.offset().top;
            rbh = rightBlock.outerHeight();
            var rbw = rightBlock.outerWidth();
            var rightBlockOffset = rightBlock.offset().top;
            smallBlockIs = lbh > rbh ? 'rightBlock' : 'leftBlock'; // finding small block
            // setting height in variable
            moreHeight = smallBlockIs === 'rightBlock' ? lbh : rbh; // finding which side has more height
            leftBlock.css({
                'height': moreHeight + 'px',
                'position': 'relative'
            }); // Adding styles for animation
            rightBlock.css({
                'height': moreHeight + 'px',
                'position': 'relative'
            });
            rightBlockContainer.css({
                'width': rbw + 'px'
            });
            leftBlockContainer.css({
                'width': lbw + 'px'
            });
            var selectedBlockContainer = smallBlockIs === 'rightBlock' ? rightBlockContainer : leftBlockContainer;
            var blankSpace = smallBlockIs === 'rightBlock' ? moreHeight - rbch : moreHeight - lbch; // blank space calculator
            var leastScroll = moreHeight + leftBlockOffset - blankSpace; // finding least scroll by considering blank top position
            var lastScroll = moreHeight + leftBlockOffset // finding last scroll by considering blank top position
            var smallContainer = rbh < WINDOW_HEIGHT ? rbh : lbh; // Checking container height with window height
            var smallContainerHeight = smallContainer === rbh ? rbch : lbch;
            // On Page Load
            if (CURRENT_SCROLL_TOP <= rightBlockOffset) {
                selectedBlockContainer.css({
                    'position': 'static',
                    'bottom': 'auto',
                    'top': 'auto'
                });
            } else if (smallContainer < WINDOW_HEIGHT) { // Checking container height with window height
                selectedBlockContainer.css({
                    'position': 'fixed',
                    'bottom': 'auto',
                    'top': 0
                });
            } else if (CURRENT_SCROLL_TOP + WINDOW_HEIGHT >= leastScroll && CURRENT_SCROLL_TOP + WINDOW_HEIGHT < lastScroll) {
                selectedBlockContainer.css({
                    'position': 'fixed',
                    'bottom': 0
                })
            } else if (CURRENT_SCROLL_TOP + WINDOW_HEIGHT + rightBlockOffset >= lastScroll) {
                selectedBlockContainer.css({
                    'position': 'absolute',
                    'bottom': 0
                })
            }
            // to detect direction of scroll
            var lastScrollTop = 0;
            jQuery(window).scroll(function (event) {
                var currentScroll = jQuery(this).scrollTop();
                if (currentScroll > lastScrollTop) { // downscroll
                    scrollInteractor('down', currentScroll)
                } else { // upscroll
                    scrollInteractor('up', currentScroll)
                }
                lastScrollTop = currentScroll;
            });
            // end
            // function to set the position for container on basis of condition
            function scrollInteractor(direction, hScroll) {
                if (hScroll <= rightBlockOffset) {
                    selectedBlockContainer.css({
                        'position': 'static',
                        'bottom': 'auto',
                        'top': 'auto'
                    });
                }
                if (smallContainer < WINDOW_HEIGHT && hScroll > rightBlockOffset) { // when container is less than WH
                    selectedBlockContainer.css({
                        'position': 'fixed',
                        'top': 0,
                        'bottom': 'auto'
                    })
                }
                if (smallContainer < WINDOW_HEIGHT) { // for container is less then window height
                    if (hScroll >= rightBlockOffset) {
                        if (direction === 'up') {
                            if (hScroll < rightBlockOffset + blankSpace) {
                                selectedBlockContainer.css({
                                    'position': 'fixed',
                                    'top': 0,
                                    'bottom': 'auto'
                                })
                            } else {
                                selectedBlockContainer.css({
                                    'position': 'absolute',
                                    'top': 'auto',
                                    'bottom': 0
                                })
                            }
                        } else {
                            if (hScroll < moreHeight + leftBlock.offset().top - smallContainerHeight) {
                                selectedBlockContainer.css({
                                    'position': 'fixed',
                                    'top': 0,
                                    'bottom': 'auto'
                                })
                            } else {
                                selectedBlockContainer.css({
                                    'position': 'absolute',
                                    'top': 'auto',
                                    'bottom': 0
                                })
                            }
                        }
                    }
                } else {
                    if (hScroll >= rightBlockOffset + selectedBlockContainer.outerHeight() - WINDOW_HEIGHT) {
                        if (direction === 'up') {
                            if ((hScroll + WINDOW_HEIGHT >= selectedBlockContainer.outerHeight() + rightBlockOffset) &&
                                (hScroll + WINDOW_HEIGHT < moreHeight + rightBlockOffset)
                            ) { // fixed to bottom when child reaches bottom
                                selectedBlockContainer.css({
                                    'position': 'fixed',
                                    'bottom': 0,
                                    'top': 'auto'
                                })
                            }
                        } else {
                            if (!(hScroll + WINDOW_HEIGHT >= jQuery('[data-scroll-right-container]').outerHeight() + rightBlockOffset)) {
                                selectedBlockContainer.css({
                                    'position': 'fixed',
                                    'bottom': 0,
                                    'top': 'auto'
                                })
                            } else if ((hScroll + WINDOW_HEIGHT >= jQuery('[data-scroll-right-container]').outerHeight() + rightBlockOffset) && (hScroll + WINDOW_HEIGHT < moreHeight + rightBlockOffset)) { // fixed to bottom when child reaches bottom
                                selectedBlockContainer.css({
                                    'position': 'fixed',
                                    'bottom': 0,
                                    'top': 'auto'
                                })
                            } else { // when child reaches footer
                                selectedBlockContainer.css({
                                    'position': 'absolute',
                                    'bottom': 0,
                                    'top': 'auto'
                                })
                            }
                        }
                    } else if (direction === 'up') {
                        selectedBlockContainer.css({
                            'position': 'absolute',
                            'bottom': 'auto',
                            'top': 0
                        })
                    }
                }
            }
        }
        jQuery(window).on('load resize', function () {
            twoColumnLayoutAnimator();
        });
        jQuery(window).scroll(function (event) {
            if ((Math.abs(leftBlockContainer.outerHeight().toFixed(0) - lbch.toFixed(0)) > 50) || (Math.abs(rightBlockContainer.outerHeight().toFixed(0) - rbch.toFixed(0)) > 50)) {
                twoColumnLayoutAnimator();
                lbch = leftBlockContainer.outerHeight();
                rbch = rightBlockContainer.outerHeight();
            }
        });
    })();
})