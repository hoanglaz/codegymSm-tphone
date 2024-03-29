﻿(function ($) {
    $.fn.imageTooltip = function (options) {

        var defaults = {
            imgWidth: 'initial',
            backgroundColor: '#fff'
        };

        if (typeof (options) === 'object') {
            options = $.extend(defaults, options);
        } else {
            var tempOptions = {};
            tempOptions.imgWidth = arguments[0] || defaults.imgWidth;
            tempOptions.backgroundColor = arguments[1] || defaults.backgroundColor;
            options = tempOptions;
        }

        function calLeft(x, imgWidth) {
            return window.innerWidth - x > imgWidth ? x : x - imgWidth;
        }

        function calTop(y, imgHeight) {
            return window.innerHeight - y > imgHeight ? y : y - imgHeight - 25;
        }

        return this.each(function () {

            var imgContainer = $('<p>', {
                css: {
                    display: 'none',
                    backgroundColor: options.backgroundColor,
                    padding: '8px',
                    position: 'fixed',
                    border: '1px solid blue'
                }
            });

            var img = $('<img>', {
                src: $(this).data('image-tooltip') || $(this).attr('src'),
                alt: 'Image Not Available',
                width: '300px',
                height:'300px'
            });

            imgContainer.append(img);

            $(this).hover(
                function (e) {
                    imgContainer.css({
                        left: calLeft(e.clientX, imgContainer.outerWidth()) + 'px',
                        top: calTop(e.clientY, imgContainer.outerHeight()) + 'px'
                    });
                    $('body').append(imgContainer);
                    imgContainer.fadeIn('fast');
                },
                function () {
                    imgContainer.remove();
                }
            ).mousemove(function (e) {
                imgContainer.css({
                    left: calLeft(e.clientX, imgContainer.outerWidth()) + 'px',
                    top: calTop(e.clientY, imgContainer.outerHeight()) + 'px'
                });
            });
        });
    };
}(jQuery));