/*
 * jQuery Impromptu
 * By: Trent Richardson [http://trentrichardson.com]
 * Version 3.1
 * Last Modified: 3/30/2010
 * 
 * Copyright 2010 Trent Richardson
 * Dual licensed under the MIT and GPL licenses.
 * http://trentrichardson.com/Impromptu/GPL-LICENSE.txt
 * http://trentrichardson.com/Impromptu/MIT-LICENSE.txt
 * 
 */

(function ($) {
    $.prompt = function (message, options) {
        const removePrompt = function (callCallback, clicked, msg, formvals) {
            $jqi.remove();
            //ie6, remove the scroll event
            if (ie6) {
                $body.unbind('scroll', ie6scroll);
            }
            $window.unbind('resize', positionPrompt);
            $jqif.fadeOut(options.overlayspeed, function () {
                $jqif.unbind('click', fadeClicked);
                $jqif.remove();
                if (callCallback) {
                    options.callback(clicked, msg, formvals);
                }
                $jqib.unbind('keypress', keyPressEventHandler);
                $jqib.remove();
                if (ie6 && !options.useiframe) {
                    $('select').css('visibility', 'visible');
                }
            });
        };
        options = $.extend({}, $.prompt.defaults, options);
        $.prompt.currentPrefix = options.prefix;

        const ie6 = ($.browser.msie && $.browser.version < 7);
        const $body = $(document.body);
        const $window = $(window);

        options.classes = $.trim(options.classes);
        if (options.classes !== '')
            options.classes = ' ' + options.classes;

        //build the box and fade
        let msgbox = '<div class="' + options.prefix + 'box' + options.classes + '" id="' + options.prefix + 'box">';
        if (options.useiframe && (($('object, applet').length > 0) || ie6)) {
            msgbox += '<iframe src="javascript:false;" style="display:block;position:absolute;z-index:-1;" class="' + options.prefix + 'fade" id="' + options.prefix + 'fade"></iframe>';
        } else {
            if (ie6) {
                $('select').css('visibility', 'hidden');
            }
            msgbox += '<div class="' + options.prefix + 'fade" id="' + options.prefix + 'fade"></div>';
        }
        msgbox += '<div class="' + options.prefix + '" id="' + options.prefix + '"><div class="' + options.prefix + 'container"><div class="';
        msgbox += options.prefix + 'close">X</div><div id="' + options.prefix + 'states"></div>';
        msgbox += '</div></div></div>';

        const $jqib = $(msgbox).appendTo($body);
        const $jqi = $jqib.children('#' + options.prefix);
        const $jqif = $jqib.children('#' + options.prefix + 'fade');

        //if a string was passed, convert to a single state
        if (message.constructor === String) {
            message = {
                state0: {
                    html: message,
                    buttons: options.buttons,
                    focus: options.focus,
                    submit: options.submit
                }
            };
        }

        //build the states
        let states = "";

        $.each(message, function (statename, stateobj) {
            stateobj = $.extend({}, $.prompt.defaults.state, stateobj);
            message[statename] = stateobj;

            states += '<div id="' + options.prefix + '_state_' + statename + '" class="' + options.prefix + '_state" style="display:none;"><div class="' + options.prefix + 'message">' + stateobj.html + '</div><div class="' + options.prefix + 'buttons">';
            $.each(stateobj.buttons, function (k, v) {
                if (typeof v == 'object')
                    states += '<button name="' + options.prefix + '_' + statename + '_button' + v.title.replace(/[^a-z0-9]+/gi, '') + '" id="' + options.prefix + '_' + statename + '_button' + v.title.replace(/[^a-z0-9]+/gi, '') + '" value="' + v.value + '">' + v.title + '</button>';
                else states += '<button name="' + options.prefix + '_' + statename + '_button' + k + '" id="' + options.prefix + '_' + statename + '_button' + k + '" value="' + v + '">' + k + '</button>';
            });
            states += '</div></div>';
        });

        //insert the states...
        $jqi.find('#' + options.prefix + 'states').html(states).children('.' + options.prefix + '_state:first').css('display', 'block');
        $jqi.find('.' + options.prefix + 'buttons:empty').css('display', 'none');

        //Events
        $.each(message, function (statename, stateobj) {
            const $state = $jqi.find('#' + options.prefix + '_state_' + statename);

            $state.children('.' + options.prefix + 'buttons').children('button').click(function () {
                const msg = $state.children('.' + options.prefix + 'message');
                let clicked = stateobj.buttons[$(this).text()];
                if (clicked === undefined) {
                    for (const i in stateobj.buttons)
                        if (stateobj.buttons[i].title === $(this).text())
                            clicked = stateobj.buttons[i].value;
                }

                if (typeof clicked == 'object')
                    clicked = clicked.value;
                const forminputs = {};

                //collect all form element values from all states
                $.each($jqi.find('#' + options.prefix + 'states :input').serializeArray(), function (i, obj) {
                    if (forminputs[obj.name] === undefined) {
                        forminputs[obj.name] = obj.value;
                    } else if (typeof forminputs[obj.name] == 'object') {
                        forminputs[obj.name].push(obj.value);
                    } else {
                        forminputs[obj.name] = [forminputs[obj.name], obj.value];
                    }
                });

                const close = stateobj.submit(clicked, msg, forminputs);
                if (close === undefined || close) {
                    removePrompt(true, clicked, msg, forminputs);
                }
            });
            $state.find('.' + options.prefix + 'buttons button:eq(' + stateobj.focus + ')').addClass(options.prefix + 'defaultbutton');

        });

        const ie6scroll = function () {
            $jqib.css({top: $window.scrollTop});
        };

        const fadeClicked = function () {
            if (options.persistent) {
                let i = 0;
                $jqib.addClass(options.prefix + 'warning');
                const intervalid = setInterval(function () {
                    $jqib.toggleClass(options.prefix + 'warning');
                    if (i++ > 1) {
                        clearInterval(intervalid);
                        $jqib.removeClass(options.prefix + 'warning');
                    }
                }, 100);
            } else {
                removePrompt();
            }
        };

        const keyPressEventHandler = function (e) {
            const key = (window.event) ? event.keyCode : e.keyCode; // MSIE or Firefox?

            //escape key closes
            if (key === 27) {
                fadeClicked();
            }

            //constrain tabs
            if (key === 9) {
                const $inputels = $(':input:enabled:visible', $jqib);
                const fwd = !e.shiftKey && e.target === $inputels[$inputels.length - 1];
                const back = e.shiftKey && e.target === $inputels[0];
                if (fwd || back) {
                    setTimeout(function () {
                        if (!$inputels)
                            return;
                        const el = $inputels[back === true ? $inputels.length - 1 : 0];

                        if (el)
                            el.focus();
                    }, 10);
                    return false;
                }
            }
        };

        const positionPrompt = function () {
            $jqib.css({
                position: (ie6) ? "absolute" : "fixed",
                height: $window.height(),
                width: "100%",
                top: (ie6) ? $window.scrollTop : 0,
                left: 0,
                right: 0,
                bottom: 0
            });
            $jqif.css({
                position: "absolute",
                height: $window.height(),
                width: "100%",
                top: 0,
                left: 0,
                right: 0,
                bottom: 0
            });
            $jqi.css({
                position: "absolute",
                top: options.top,
                left: "50%",
                marginLeft: (($jqi.outerWidth() / 2) * -1)
            });
        };

        const stylePrompt = function () {
            $jqif.css({
                zIndex: options.zIndex,
                display: "none",
                opacity: options.opacity
            });
            $jqi.css({
                zIndex: options.zIndex + 1,
                display: "none"
            });
            $jqib.css({
                zIndex: options.zIndex
            });
        };


        positionPrompt();
        stylePrompt();

        //ie6, add a scroll event to fix position:fixed
        if (ie6) {
            $window.scroll(ie6scroll);
        }
        $jqif.click(fadeClicked);
        $window.resize(positionPrompt);
        $jqib.bind("keydown keypress", keyPressEventHandler);
        $jqi.find('.' + options.prefix + 'close').click(removePrompt);

        //Show it
        $jqif.fadeIn(options.overlayspeed);
        $jqi[options.show](options.promptspeed, options.loaded);
        $jqi.find('#' + options.prefix + 'states .' + options.prefix + '_state:first .' + options.prefix + 'defaultbutton').focus();

        if (options.timeout > 0)
            setTimeout($.prompt.close, options.timeout);

        return $jqib;
    };

    $.prompt.defaults = {
        prefix: 'jqi',
        classes: '',
        buttons: {
            Ok: true
        },
        loaded: function () {

        },
        submit: function () {
            return true;
        },
        callback: function () {

        },
        opacity: 0.6,
        zIndex: 999,
        overlayspeed: 'slow',
        promptspeed: 'fast',
        show: 'fadeIn',
        focus: 0,
        useiframe: false,
        top: "15%",
        persistent: true,
        timeout: 0,
        state: {
            html: '',
            buttons: {
                Ok: true
            },
            focus: 0,
            submit: function () {
                return true;
            }
        }
    };

    $.prompt.currentPrefix = $.prompt.defaults.prefix;

    $.prompt.setDefaults = function (o) {
        $.prompt.defaults = $.extend({}, $.prompt.defaults, o);
    };

    $.prompt.setStateDefaults = function (o) {
        $.prompt.defaults.state = $.extend({}, $.prompt.defaults.state, o);
    };

    $.prompt.getStateContent = function (state) {
        return $('#' + $.prompt.currentPrefix + '_state_' + state);
    };

    $.prompt.getCurrentState = function () {
        return $('.' + $.prompt.currentPrefix + '_state:visible');
    };

    $.prompt.getCurrentStateName = function () {
        const stateid = $.prompt.getCurrentState().attr('id');

        return stateid.replace($.prompt.currentPrefix + '_state_', '');
    };

    $.prompt.goToState = function (state, callback) {
        $('.' + $.prompt.currentPrefix + '_state').slideUp('slow');
        $('#' + $.prompt.currentPrefix + '_state_' + state).slideDown('slow', function () {
            $(this).find('.' + $.prompt.currentPrefix + 'defaultbutton').focus();
            if (typeof callback == 'function')
                callback();
        });
    };

    $.prompt.nextState = function (callback) {
        const $next = $('.' + $.prompt.currentPrefix + '_state:visible').next();

        $('.' + $.prompt.currentPrefix + '_state').slideUp('slow');

        $next.slideDown('slow', function () {
            $next.find('.' + $.prompt.currentPrefix + 'defaultbutton').focus();
            if (typeof callback == 'function')
                callback();
        });
    };

    $.prompt.prevState = function (callback) {
        const $next = $('.' + $.prompt.currentPrefix + '_state:visible').prev();

        $('.' + $.prompt.currentPrefix + '_state').slideUp('slow');

        $next.slideDown('slow', function () {
            $next.find('.' + $.prompt.currentPrefix + 'defaultbutton').focus();
            if (typeof callback == 'function')
                callback();
        });
    };

    $.prompt.close = function () {
        $('#' + $.prompt.currentPrefix + 'box').fadeOut('fast', function () {
            $(this).remove();
        });
    };

    $.fn.prompt = function (options) {
        if (options === undefined)
            options = {};
        if (options.withDataAndEvents === undefined)
            options.withDataAndEvents = false;

        $.prompt($(this).clone(options.withDataAndEvents).html(), options);
    }

})(jQuery);
