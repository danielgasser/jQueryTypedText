/**
 * jQuery Plugin frame
 */
(function ($) {
    "use strict";
    $.fn.typedText = function (options) {
        var settings = $.extend(
                {
                    textToType: ['This is a string', 'This is one too'],
                    textSeparator: 'div',
                    cursorTimer: 2000,
                    startDelay: 2000,
                    counter: 3400
                },
                options
            ),
            instance = this,
            blinkerTimer = null,
            arrayText = [],
            blinker = function () {
                blinkerTimer = window.setInterval(function () {
                    return instance.toggleClass('the-cursor');
                }, settings.cursorTimer);
            },
            typeEach = function (x) {
                instance.append(x);
                return;
            },
            clearBlinker = function () {
                window.clearInterval(blinkerTimer);
                instance.removeClass('the-cursor');
            },
            typeIt = function (arr) {
                var i = 0,
                    j,
                    d,
                    e;
                arrayText = arr;
                for (j = 0; j < arrayText[i].length; j += 1) {
                    e = arrayText[i][j];
                    d = (j % 2 === 0) ? 100 : 97;
                    d *= j;
                    window.setTimeout(typeEach, d, e);
                }
                i += 1;
                window.setTimeout(clearBlinker, settings.counter);
            },
            waitABit = function () {
                var i;
                window.setTimeout(function () {
                    typeIt(settings.textToType);
                }, 2050);
                    //window.console.log('hh');
            };

        blinker();
        return this.html(waitABit());
    };
}(jQuery));
