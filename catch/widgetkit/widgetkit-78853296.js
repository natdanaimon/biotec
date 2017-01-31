window["WIDGETKIT_URL"] = "/media/widgetkit";

function wk_ajax_render_url(widgetid) {
    return "/en/component/widgetkit/?format=raw&id=" + widgetid
}
(function($, win) {
    var loaded_scripts = {},
        $win = $(window);
    win.$widgetkit = {
        version: "1.4.9",
        lazyloaders: {},
        load: function(script) {
            if (!loaded_scripts[script]) {
                var url = script + "?wkv=" + this.version;
                loaded_scripts[script] = $.ajax({
                    dataType: "script",
                    cache: true,
                    url: url
                })
            }
            return loaded_scripts[script]
        },
        lazyload: function(context) {
            context = context || document;
            $("[data-widgetkit]", context).each(function() {
                var ele = $(this),
                    type = ele.data("widgetkit"),
                    options = ele.data("options") || {};
                if (!ele.data("wk-loaded") && $widgetkit.lazyloaders[type]) {
                    $widgetkit.lazyloaders[type](ele, options);
                    ele.data("wk-loaded", true)
                }
            })
        }
    };
    $(function() {
        $widgetkit.lazyload()
    });
    $win.on("load", function() {
        $win.resize()
    });
    var div = document.createElement("div"),
        divStyle = div.style,
        transition = false,
        prefixes = "-webkit- -moz- -o- -ms- -khtml-".split(" "),
        domPrefixes = "Webkit Moz O ms Khtml".split(" "),
        prefix = "";
    for (var i = 0; i < domPrefixes.length; i++) {
        if (divStyle[domPrefixes[i] + "Transition"] === "") {
            transition = domPrefixes[i] + "Transition";
            prefix = prefixes[i];
            break
        }
    }
    $widgetkit.prefix = prefix;
    $widgetkit.support = {
        transition: transition,
        css3d: transition && ("WebKitCSSMatrix" in window && "m11" in new WebKitCSSMatrix && !navigator.userAgent.match(/Chrome/i)),
        canvas: function() {
            var check, elem = document.createElement("canvas");
            check = !!(elem.getContext && elem.getContext("2d"));
            elem = null;
            return check
        }()
    };
    $widgetkit.css3 = function(cssprops) {
        cssprops = cssprops || {};
        if (cssprops["transition"]) {
            cssprops[prefix + "transition"] = cssprops["transition"]
        }
        if (cssprops["transform"]) {
            cssprops[prefix + "transform"] = cssprops["transform"]
        }
        if (cssprops["transform-origin"]) {
            cssprops[prefix + "transform-origin"] = cssprops["transform-origin"]
        }
        return cssprops
    };
    $.browser = $.browser || function(ua) {
        ua = ua.toLowerCase();
        var browser = {},
            match = /(chrome)[ \/]([\w.]+)/.exec(ua) || /(webkit)[ \/]([\w.]+)/.exec(ua) || /(opera)(?:.*version)?[ \/]([\w.]+)/.exec(ua) || /(msie) ([\w.]+)/.exec(ua) || ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+))?/.exec(ua) || [];
        if (match) {
            browser[match[1]] = true;
            browser["version"] = match[2] || "0"
        }
        return browser
    }(navigator.userAgent);
    div = null
})(jQuery, window);
(function($) {
    var ie = function() {
        try {
            return parseInt(navigator.appVersion.match(/MSIE (\d\.\d)/)[1], 10)
        } catch (e) {}
        return false
    }();
    if (ie && ie < 9) {
        $(document).ready(function() {
            $("body").addClass("wk-ie wk-ie" + ie)
        });
        $.each(["abbr", "article", "aside", "audio", "canvas", "details", "figcaption", "figure", "footer", "header", "hgroup", "mark", "meter", "nav", "output", "progress", "section", "summary", "time", "video"], function() {
            document.createElement(this)
        })
    }
})(jQuery);
(function($, win) {
    win.$widgetkit.trans = {
        __data: {},
        addDic: function(dic) {
            $.extend(this.__data, dic)
        },
        add: function(key, data) {
            this.__data[key] = data
        },
        get: function(key) {
            if (!this.__data[key]) {
                return key
            }
            var args = arguments.length == 1 ? [] : Array.prototype.slice.call(arguments, 1),
                ret = String(this.__data[key]);
            return this.printf(ret, args)
        },
        printf: function(S, L) {
            if (!L) return S;
            var nS = "",
                tS = S.split("%s");
            if (tS.length == 1) return S;
            for (var i = 0; i < L.length; i++) {
                if (tS[i].lastIndexOf("%") == tS[i].length - 1 && i != L.length - 1) tS[i] += "s" + tS.splice(i + 1, 1)[0];
                nS += tS[i] + L[i]
            }
            return nS + tS[tS.length - 1]
        }
    }
})(jQuery, window);
(function(jQuery) {
    jQuery.easing["jswing"] = jQuery.easing["swing"];
    jQuery.extend(jQuery.easing, {
        def: "easeOutQuad",
        swing: function(x, t, b, c, d) {
            return jQuery.easing[jQuery.easing.def](x, t, b, c, d)
        },
        easeInQuad: function(x, t, b, c, d) {
            return c * (t /= d) * t + b
        },
        easeOutQuad: function(x, t, b, c, d) {
            return -c * (t /= d) * (t - 2) + b
        },
        easeInOutQuad: function(x, t, b, c, d) {
            if ((t /= d / 2) < 1) return c / 2 * t * t + b;
            return -c / 2 * (--t * (t - 2) - 1) + b
        },
        easeInCubic: function(x, t, b, c, d) {
            return c * (t /= d) * t * t + b
        },
        easeOutCubic: function(x, t, b, c, d) {
            return c * ((t = t / d - 1) * t * t + 1) + b
        },
        easeInOutCubic: function(x, t, b, c, d) {
            if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
            return c / 2 * ((t -= 2) * t * t + 2) + b
        },
        easeInQuart: function(x, t, b, c, d) {
            return c * (t /= d) * t * t * t + b
        },
        easeOutQuart: function(x, t, b, c, d) {
            return -c * ((t = t / d - 1) * t * t * t - 1) + b
        },
        easeInOutQuart: function(x, t, b, c, d) {
            if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
            return -c / 2 * ((t -= 2) * t * t * t - 2) + b
        },
        easeInQuint: function(x, t, b, c, d) {
            return c * (t /= d) * t * t * t * t + b
        },
        easeOutQuint: function(x, t, b, c, d) {
            return c * ((t = t / d - 1) * t * t * t * t + 1) + b
        },
        easeInOutQuint: function(x, t, b, c, d) {
            if ((t /= d / 2) < 1) return c / 2 * t * t * t * t * t + b;
            return c / 2 * ((t -= 2) * t * t * t * t + 2) + b
        },
        easeInSine: function(x, t, b, c, d) {
            return -c * Math.cos(t / d * (Math.PI / 2)) + c + b
        },
        easeOutSine: function(x, t, b, c, d) {
            return c * Math.sin(t / d * (Math.PI / 2)) + b
        },
        easeInOutSine: function(x, t, b, c, d) {
            return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b
        },
        easeInExpo: function(x, t, b, c, d) {
            return t == 0 ? b : c * Math.pow(2, 10 * (t / d - 1)) + b
        },
        easeOutExpo: function(x, t, b, c, d) {
            return t == d ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b
        },
        easeInOutExpo: function(x, t, b, c, d) {
            if (t == 0) return b;
            if (t == d) return b + c;
            if ((t /= d / 2) < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
            return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b
        },
        easeInCirc: function(x, t, b, c, d) {
            return -c * (Math.sqrt(1 - (t /= d) * t) - 1) + b
        },
        easeOutCirc: function(x, t, b, c, d) {
            return c * Math.sqrt(1 - (t = t / d - 1) * t) + b
        },
        easeInOutCirc: function(x, t, b, c, d) {
            if ((t /= d / 2) < 1) return -c / 2 * (Math.sqrt(1 - t * t) - 1) + b;
            return c / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + b
        },
        easeInElastic: function(x, t, b, c, d) {
            var s = 1.70158;
            var p = 0;
            var a = c;
            if (t == 0) return b;
            if ((t /= d) == 1) return b + c;
            if (!p) p = d * .3;
            if (a < Math.abs(c)) {
                a = c;
                var s = p / 4
            } else var s = p / (2 * Math.PI) * Math.asin(c / a);
            return -(a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b
        },
        easeOutElastic: function(x, t, b, c, d) {
            var s = 1.70158;
            var p = 0;
            var a = c;
            if (t == 0) return b;
            if ((t /= d) == 1) return b + c;
            if (!p) p = d * .3;
            if (a < Math.abs(c)) {
                a = c;
                var s = p / 4
            } else var s = p / (2 * Math.PI) * Math.asin(c / a);
            return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b
        },
        easeInOutElastic: function(x, t, b, c, d) {
            var s = 1.70158;
            var p = 0;
            var a = c;
            if (t == 0) return b;
            if ((t /= d / 2) == 2) return b + c;
            if (!p) p = d * (.3 * 1.5);
            if (a < Math.abs(c)) {
                a = c;
                var s = p / 4
            } else var s = p / (2 * Math.PI) * Math.asin(c / a);
            if (t < 1) return -.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
            return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b
        },
        easeInBack: function(x, t, b, c, d, s) {
            if (s == undefined) s = 1.70158;
            return c * (t /= d) * t * ((s + 1) * t - s) + b
        },
        easeOutBack: function(x, t, b, c, d, s) {
            if (s == undefined) s = 1.70158;
            return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b
        },
        easeInOutBack: function(x, t, b, c, d, s) {
            if (s == undefined) s = 1.70158;
            if ((t /= d / 2) < 1) return c / 2 * (t * t * (((s *= 1.525) + 1) * t - s)) + b;
            return c / 2 * ((t -= 2) * t * (((s *= 1.525) + 1) * t + s) + 2) + b
        },
        easeInBounce: function(x, t, b, c, d) {
            return c - jQuery.easing.easeOutBounce(x, d - t, 0, c, d) + b
        },
        easeOutBounce: function(x, t, b, c, d) {
            if ((t /= d) < 1 / 2.75) {
                return c * (7.5625 * t * t) + b
            } else if (t < 2 / 2.75) {
                return c * (7.5625 * (t -= 1.5 / 2.75) * t + .75) + b
            } else if (t < 2.5 / 2.75) {
                return c * (7.5625 * (t -= 2.25 / 2.75) * t + .9375) + b
            } else {
                return c * (7.5625 * (t -= 2.625 / 2.75) * t + .984375) + b
            }
        },
        easeInOutBounce: function(x, t, b, c, d) {
            if (t < d / 2) return jQuery.easing.easeInBounce(x, t * 2, 0, c, d) * .5 + b;
            return jQuery.easing.easeOutBounce(x, t * 2 - d, 0, c, d) * .5 + c * .5 + b
        }
    })
})(jQuery);
(function(factory) {
    if (typeof define === "function" && define.amd) {
        define(["jquery"], factory)
    } else if (typeof exports === "object") {
        module.exports = factory
    } else {
        factory(jQuery)
    }
})(function($) {
    var toFix = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
        toBind = "onwheel" in document || document.documentMode >= 9 ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"],
        slice = Array.prototype.slice,
        nullLowestDeltaTimeout, lowestDelta;
    if ($.event.fixHooks) {
        for (var i = toFix.length; i;) {
            $.event.fixHooks[toFix[--i]] = $.event.mouseHooks
        }
    }
    var special = $.event.special.mousewheel = {
        version: "3.1.11",
        setup: function() {
            if (this.addEventListener) {
                for (var i = toBind.length; i;) {
                    this.addEventListener(toBind[--i], handler, false)
                }
            } else {
                this.onmousewheel = handler
            }
            $.data(this, "mousewheel-line-height", special.getLineHeight(this));
            $.data(this, "mousewheel-page-height", special.getPageHeight(this))
        },
        teardown: function() {
            if (this.removeEventListener) {
                for (var i = toBind.length; i;) {
                    this.removeEventListener(toBind[--i], handler, false)
                }
            } else {
                this.onmousewheel = null
            }
            $.removeData(this, "mousewheel-line-height");
            $.removeData(this, "mousewheel-page-height")
        },
        getLineHeight: function(elem) {
            var $parent = $(elem)["offsetParent" in $.fn ? "offsetParent" : "parent"]();
            if (!$parent.length) {
                $parent = $("body")
            }
            return parseInt($parent.css("fontSize"), 10)
        },
        getPageHeight: function(elem) {
            return $(elem).height()
        },
        settings: {
            adjustOldDeltas: true,
            normalizeOffset: true
        }
    };
    $.fn.extend({
        mousewheel: function(fn) {
            return fn ? this.bind("mousewheel", fn) : this.trigger("mousewheel")
        },
        unmousewheel: function(fn) {
            return this.unbind("mousewheel", fn)
        }
    });

    function handler(event) {
        var orgEvent = event || window.event,
            args = slice.call(arguments, 1),
            delta = 0,
            deltaX = 0,
            deltaY = 0,
            absDelta = 0,
            offsetX = 0,
            offsetY = 0;
        event = $.event.fix(orgEvent);
        event.type = "mousewheel";
        if ("detail" in orgEvent) {
            deltaY = orgEvent.detail * -1
        }
        if ("wheelDelta" in orgEvent) {
            deltaY = orgEvent.wheelDelta
        }
        if ("wheelDeltaY" in orgEvent) {
            deltaY = orgEvent.wheelDeltaY
        }
        if ("wheelDeltaX" in orgEvent) {
            deltaX = orgEvent.wheelDeltaX * -1
        }
        if ("axis" in orgEvent && orgEvent.axis === orgEvent.HORIZONTAL_AXIS) {
            deltaX = deltaY * -1;
            deltaY = 0
        }
        delta = deltaY === 0 ? deltaX : deltaY;
        if ("deltaY" in orgEvent) {
            deltaY = orgEvent.deltaY * -1;
            delta = deltaY
        }
        if ("deltaX" in orgEvent) {
            deltaX = orgEvent.deltaX;
            if (deltaY === 0) {
                delta = deltaX * -1
            }
        }
        if (deltaY === 0 && deltaX === 0) {
            return
        }
        if (orgEvent.deltaMode === 1) {
            var lineHeight = $.data(this, "mousewheel-line-height");
            delta *= lineHeight;
            deltaY *= lineHeight;
            deltaX *= lineHeight
        } else if (orgEvent.deltaMode === 2) {
            var pageHeight = $.data(this, "mousewheel-page-height");
            delta *= pageHeight;
            deltaY *= pageHeight;
            deltaX *= pageHeight
        }
        absDelta = Math.max(Math.abs(deltaY), Math.abs(deltaX));
        if (!lowestDelta || absDelta < lowestDelta) {
            lowestDelta = absDelta;
            if (shouldAdjustOldDeltas(orgEvent, absDelta)) {
                lowestDelta /= 40
            }
        }
        if (shouldAdjustOldDeltas(orgEvent, absDelta)) {
            delta /= 40;
            deltaX /= 40;
            deltaY /= 40
        }
        delta = Math[delta >= 1 ? "floor" : "ceil"](delta / lowestDelta);
        deltaX = Math[deltaX >= 1 ? "floor" : "ceil"](deltaX / lowestDelta);
        deltaY = Math[deltaY >= 1 ? "floor" : "ceil"](deltaY / lowestDelta);
        if (special.settings.normalizeOffset && this.getBoundingClientRect) {
            var boundingRect = this.getBoundingClientRect();
            offsetX = event.clientX - boundingRect.left;
            offsetY = event.clientY - boundingRect.top
        }
        event.deltaX = deltaX;
        event.deltaY = deltaY;
        event.deltaFactor = lowestDelta;
        event.offsetX = offsetX;
        event.offsetY = offsetY;
        event.deltaMode = 0;
        args.unshift(event, delta, deltaX, deltaY);
        if (nullLowestDeltaTimeout) {
            clearTimeout(nullLowestDeltaTimeout)
        }
        nullLowestDeltaTimeout = setTimeout(nullLowestDelta, 200);
        return ($.event.dispatch || $.event.handle).apply(this, args)
    }

    function nullLowestDelta() {
        lowestDelta = null
    }

    function shouldAdjustOldDeltas(orgEvent, absDelta) {
        return special.settings.adjustOldDeltas && orgEvent.type === "mousewheel" && absDelta % 120 === 0
    }
});
(function($) {
    function supportAjaxUploadWithProgress() {
        return supportFileAPI() && supportAjaxUploadProgressEvents() && supportFormData();

        function supportFileAPI() {
            var fi = document.createElement("INPUT");
            fi.type = "file";
            return "files" in fi
        }

        function supportAjaxUploadProgressEvents() {
            var xhr = new XMLHttpRequest;
            return !!(xhr && "upload" in xhr && "onprogress" in xhr.upload)
        }

        function supportFormData() {
            return !!window.FormData
        }
    }
    $.support.ajaxupload = supportAjaxUploadWithProgress();
    if ($.support.ajaxupload) {
        $.event.props.push("dataTransfer")
    }
    $.fn.uploadOnDrag = function(options) {
        if (!$.support.ajaxupload) {
            return this
        }
        return this.each(function() {
            var ele = $(this),
                settings = $.extend({
                    action: "",
                    single: false,
                    method: "POST",
                    params: {},
                    loadstart: function() {},
                    load: function() {},
                    loadend: function() {},
                    progress: function() {},
                    complete: function() {},
                    allcomplete: function() {},
                    readystatechange: function() {}
                }, options);
            ele.on("drop", function(e) {
                e.stopPropagation();
                e.preventDefault();
                var files = e.dataTransfer.files;
                if (settings.single) {
                    var count = e.dataTransfer.files.length,
                        uploaded = 0,
                        complete = settings.complete;
                    settings.complete = function(response, xhr) {
                        uploaded = uploaded + 1;
                        complete(response, xhr);
                        if (uploaded < count) {
                            upload([files[uploaded]], settings)
                        } else {
                            settings.allcomplete()
                        }
                    };
                    upload([files[0]], settings)
                } else {
                    upload(files, settings)
                }

                function upload(files, settings) {
                    var formData = new FormData,
                        xhr = new XMLHttpRequest;
                    for (var i = 0, f; f = files[i]; i++) {
                        formData.append("files[]", f)
                    }
                    for (var p in settings.params) {
                        formData.append(p, settings.params[p])
                    }
                    xhr.upload.addEventListener("progress", function(e) {
                        var percent = e.loaded / e.total * 100;
                        settings.progress(percent, e)
                    }, false);
                    xhr.addEventListener("loadstart", function(e) {
                        settings.loadstart(e)
                    }, false);
                    xhr.addEventListener("load", function(e) {
                        settings.load(e)
                    }, false);
                    xhr.addEventListener("loadend", function(e) {
                        settings.loadend(e)
                    }, false);
                    xhr.addEventListener("error", function(e) {
                        settings.error(e)
                    }, false);
                    xhr.addEventListener("abort", function(e) {
                        settings.abort(e)
                    }, false);
                    xhr.open(settings.method, settings.action, true);
                    xhr.onreadystatechange = function() {
                        settings.readystatechange(xhr);
                        if (xhr.readyState == 4) {
                            var response = xhr.responseText;
                            if (settings.type == "json") {
                                try {
                                    response = $.parseJSON(response)
                                } catch (e) {
                                    response = false
                                }
                            }
                            settings.complete(response, xhr)
                        }
                    };
                    xhr.send(formData)
                }
            }).on("dragover", function(e) {
                e.stopPropagation();
                e.preventDefault()
            })
        })
    };
    $.fn.ajaxform = function(options) {
        if (!$.support.ajaxupload) {
            return this
        }
        return this.each(function() {
            var form = $(this),
                settings = $.extend({
                    action: form.attr("action"),
                    method: form.attr("method"),
                    loadstart: function() {},
                    load: function() {},
                    loadend: function() {},
                    progress: function() {},
                    complete: function() {},
                    readystatechange: function() {}
                }, options);
            form.on("submit", function(e) {
                e.preventDefault();
                var formData = new FormData(this),
                    xhr = new XMLHttpRequest;
                formData.append("formdata", "1");
                xhr.upload.addEventListener("progress", function(e) {
                    var percent = e.loaded / e.total * 100;
                    settings.progress(percent, e)
                }, false);
                xhr.addEventListener("loadstart", function(e) {
                    settings.loadstart(e)
                }, false);
                xhr.addEventListener("load", function(e) {
                    settings.load(e)
                }, false);
                xhr.addEventListener("loadend", function(e) {
                    settings.loadend(e)
                }, false);
                xhr.addEventListener("error", function(e) {
                    settings.error(e)
                }, false);
                xhr.addEventListener("abort", function(e) {
                    settings.abort(e)
                }, false);
                xhr.open(settings.method, settings.action, true);
                xhr.onreadystatechange = function() {
                    settings.readystatechange(xhr);
                    if (xhr.readyState == 4) {
                        var response = xhr.responseText;
                        if (settings.type == "json") {
                            try {
                                response = $.parseJSON(response)
                            } catch (e) {
                                response = false
                            }
                        }
                        settings.complete(response, xhr)
                    }
                };
                xhr.send(formData)
            })
        })
    };
    if (!$.event.special.debouncedresize) {
        var $event = $.event,
            $special, resizeTimeout;
        $special = $event.special.debouncedresize = {
            setup: function() {
                $(this).on("resize", $special.handler)
            },
            teardown: function() {
                $(this).off("resize", $special.handler)
            },
            handler: function(event, execAsap) {
                var context = this,
                    args = arguments,
                    dispatch = function() {
                        event.type = "debouncedresize";
                        $event.dispatch.apply(context, args)
                    };
                if (resizeTimeout) {
                    clearTimeout(resizeTimeout)
                }
                execAsap ? dispatch() : resizeTimeout = setTimeout(dispatch, $special.threshold)
            },
            threshold: 150
        }
    }
})(jQuery);
(function(nav, win, doc) {
    if (win.matchMedia && !nav.userAgent.match(/(iPhone|iPod|iPad)/i)) {
        return
    }
    var bool, docElem = doc.documentElement,
        refNode = docElem.firstElementChild || docElem.firstChild,
        fakeBody = doc.createElement("body"),
        div = doc.createElement("div");
    div.id = "mq-test-1";
    div.style.cssText = "position:absolute;top:-100em";
    fakeBody.style.background = "none";
    fakeBody.appendChild(div);

    function check(q) {
        div.innerHTML = '&shy;<style media="' + q + '"> #mq-test-1 { width: 42px; }</style>';
        docElem.insertBefore(fakeBody, refNode);
        bool = div.offsetWidth == 42;
        docElem.removeChild(fakeBody);
        return bool
    }

    function update(query) {
        var matches = check(query.media);
        if (query._listeners && query.matches != matches) {
            query.matches = matches;
            for (var i = 0, len = query._listeners.length; i < len; i++) {
                query._listeners[i](query)
            }
        }
    }

    function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this,
                args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args)
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args)
        }
    }
    win.matchMedia = function(q) {
        var query, ls = [];
        query = {
            matches: check(q),
            media: q,
            _listeners: ls,
            addListener: function(listener) {
                if (typeof listener === "function") ls.push(listener)
            },
            removeListener: function(listener) {
                for (var i = 0, len = ls.length; i < len; i++)
                    if (ls[i] === listener) delete ls[i]
            }
        };
        if (win.addEventListener) {
            win.addEventListener("resize", debounce(function() {
                update(query)
            }, 150), false)
        }
        if (doc.addEventListener) {
            doc.addEventListener("orientationchange", function() {
                update(query)
            }, false)
        }
        return query
    }
})(navigator, window, document);
(function($, win, doc) {
    if ($["onMediaQuery"]) return;
    var queries = {},
        supported = win.matchMedia && win.matchMedia("only all").matches;
    $(doc).ready(function() {
        for (var q in queries) {
            var query = $(queries[q]).trigger("init");
            if (queries[q].matches) {
                $(queries[q]).trigger("valid")
            }
        }
    });
    $(win).bind("load", function() {
        for (var q in queries) {
            if (queries[q].matches) {
                $(queries[q]).trigger("valid")
            }
        }
    });
    $.onMediaQuery = function(q, events) {
        var query = q && queries[q];
        if (!query) {
            query = queries[q] = win.matchMedia(q);
            query.supported = supported;
            query.addListener(function() {
                $(query).trigger(query.matches ? "valid" : "invalid")
            })
        }
        $(query).bind(events);
        return query
    }
})(jQuery, window, document);
(function($) {
    var Plugin = function() {};
    Plugin.prototype = $.extend(Plugin.prototype, {
        name: "accordion",
        options: {
            index: 0,
            duration: 500,
            easing: "easeOutQuart",
            animated: "slide",
            event: "click",
            collapseall: true,
            matchheight: true,
            toggler: ".toggler",
            content: ".content"
        },
        initialize: function(element, options) {
            var options = $.extend({}, this.options, options),
                togglers = element.find(options.toggler),
                display = function(index) {
                    var show = togglers.eq(index).hasClass("active") ? $([]) : togglers.eq(index),
                        hide = togglers.eq(index).hasClass("active") ? togglers.eq(index) : $([]);
                    if (show.hasClass("active")) {
                        hide = show;
                        show = $([])
                    }
                    if (options.collapseall) {
                        hide = togglers.filter(".active")
                    }
                    switch (options.animated) {
                        case "slide":
                            show.next().stop().show().animate({
                                height: show.next().data("height")
                            }, {
                                easing: options.easing,
                                duration: options.duration
                            });
                            hide.next().stop().animate({
                                height: 0
                            }, {
                                easing: options.easing,
                                duration: options.duration,
                                complete: function() {
                                    hide.next().hide()
                                }
                            });
                            break;
                        default:
                            show.next().show().css("height", show.next().data("height"));
                            hide.next().hide().css("height", 0)
                    }
                    show.addClass("active");
                    hide.removeClass("active")
                },
                calcHeights = function() {
                    var matchheight = 0;
                    if (options.matchheight) {
                        element.find(options.content).css("min-height", "").css("height", "").each(function() {
                            matchheight = Math.max(matchheight, $(this).height())
                        }).css("min-height", matchheight)
                    }
                    togglers.each(function(i) {
                        var toggler = $(this),
                            content = toggler.next();
                        content.data("height", content.css("height", "").show().height());
                        if (toggler.hasClass("active")) {
                            content.show()
                        } else {
                            content.hide().css("height", 0)
                        }
                    })
                };
            togglers.each(function(i) {
                var toggler = $(this).bind(options.event, function() {
                        display(i)
                    }),
                    content = toggler.next().css("overflow", "hidden").addClass("content-wrapper");
                if (i == options.index || options.index == "all") {
                    toggler.addClass("active");
                    content.show()
                } else {
                    content.hide().css("height", 0)
                }
            });
            calcHeights();
            $(window).bind("debouncedresize", function() {
                calcHeights()
            })
        }
    });
    $.fn[Plugin.prototype.name] = function() {
        var args = arguments;
        var method = args[0] ? args[0] : null;
        return this.each(function() {
            var element = $(this);
            if (Plugin.prototype[method] && element.data(Plugin.prototype.name) && method != "initialize") {
                element.data(Plugin.prototype.name)[method].apply(element.data(Plugin.prototype.name), Array.prototype.slice.call(args, 1))
            } else if (!method || $.isPlainObject(method)) {
                var plugin = new Plugin;
                if (Plugin.prototype["initialize"]) {
                    plugin.initialize.apply(plugin, $.merge([element], args))
                }
                element.data(Plugin.prototype.name, plugin)
            } else {
                $.error("Method " + method + " does not exist on jQuery." + Plugin.name)
            }
        })
    };
    if (!window["$widgetkit"]) return;
    $widgetkit.lazyloaders["accordion"] = function(element, options) {
        $(element).accordion(options)
    }
})(jQuery);
(function($) {
    $widgetkit.lazyloaders["gallery-slider"] = function(element, options) {
        var ul = element.find(".slides:first"),
            items = ul.children(),
            totalW = options.total_width == "auto" ? element.width() : options.total_width > element.width() ? element.width() : options.total_width,
            min = totalW / items.length - options.spacing,
            width = options.width,
            height = options.height;
        if (options.total_width == "auto" || options.total_width >= totalW) {
            var ratio = options.width / (totalW / 2),
                ratio_height = options.height / ratio;
            width = options.width / ratio;
            height = options.height / ratio;
            items.css("background-size", width + "px " + height + "px")
        }
        items.css({
            width: min,
            "margin-right": options.spacing
        });
        ul.width(items.eq(0).width() * items.length * 2);
        element.css({
            width: totalW,
            height: height
        });
        $widgetkit.load(WIDGETKIT_URL + "/widgets/gallery/js/slider.js").done(function() {
            element.galleryslider(options)
        })
    }
})(jQuery);
$widgetkit.load('/media/widgetkit/widgets/lightbox/js/lightbox.js').done(function() {
    jQuery(function($) {
        setTimeout(function() {
            $('a[data-lightbox]').lightbox({
                "titlePosition": "float",
                "transitionIn": "fade",
                "transitionOut": "fade",
                "overlayShow": 1,
                "overlayColor": "#777",
                "overlayOpacity": 0.7
            });
        }, 500);
    });
});
(function($) {
    $widgetkit.lazyloaders["googlemaps"] = function(element, options) {
        $widgetkit.load(WIDGETKIT_URL + "/widgets/map/js/map.js").done(function() {
            element.googlemaps(options)
        })
    }
})(jQuery);
$widgetkit.trans.addDic({
    "FROM_ADDRESS": "From address: ",
    "GET_DIRECTIONS": "Get directions",
    "FILL_IN_ADDRESS": "Please fill in your address.",
    "ADDRESS_NOT_FOUND": "Sorry, address not found!",
    "LOCATION_NOT_FOUND": ", not found!"
});
if (!window['mejs']) {
    $widgetkit.load('/media/widgetkit/widgets/mediaplayer/mediaelement/mediaelement-and-player.js').done(function() {
        jQuery(function($) {
            mejs.MediaElementDefaults.pluginPath = '/media/widgetkit/widgets/mediaplayer/mediaelement/';
            $('video,audio').each(function() {
                var ele = $(this);
                if (!ele.parent().hasClass('mejs-mediaelement')) {
                    ele.data('mediaelement', new mejs.MediaElementPlayer(this, {
                        "pluginPath": "\/media\/widgetkit\/widgets\/mediaplayer\/mediaelement\/"
                    }));
                    var w = ele.data('mediaelement').width,
                        h = ele.data('mediaelement').height;
                    $.onMediaQuery('(max-width: 767px)', {
                        valid: function() {
                            ele.data('mediaelement').setPlayerSize('100%', ele.is('video') ? '100%' : h);
                        },
                        invalid: function() {
                            var parent_width = ele.parent().width();
                            if (w > parent_width) {
                                ele.css({
                                    width: '',
                                    height: ''
                                }).data('mediaelement').setPlayerSize('100%', '100%');
                            } else {
                                ele.css({
                                    width: '',
                                    height: ''
                                }).data('mediaelement').setPlayerSize(w, h);
                            }
                        }
                    });
                    if ($(window).width() <= 767) {
                        ele.data('mediaelement').setPlayerSize('100%', ele.is('video') ? '100%' : h);
                    }
                }
            });
        });
    });
} else {
    jQuery(function($) {
        mejs.MediaElementDefaults.pluginPath = '/media/widgetkit/widgets/mediaplayer/mediaelement/';
        $('video,audio').each(function() {
            var ele = $(this);
            if (!ele.parent().hasClass('mejs-mediaelement')) {
                ele.data('mediaelement', new mejs.MediaElementPlayer(this, {
                    "pluginPath": "\/media\/widgetkit\/widgets\/mediaplayer\/mediaelement\/"
                }));
                var w = ele.data('mediaelement').width,
                    h = ele.data('mediaelement').height;
                $.onMediaQuery('(max-width: 767px)', {
                    valid: function() {
                        ele.data('mediaelement').setPlayerSize('100%', ele.is('video') ? '100%' : h);
                    },
                    invalid: function() {
                        var parent_width = ele.parent().width();
                        if (w > parent_width) {
                            ele.css({
                                width: '',
                                height: ''
                            }).data('mediaelement').setPlayerSize('100%', '100%');
                        } else {
                            ele.css({
                                width: '',
                                height: ''
                            }).data('mediaelement').setPlayerSize(w, h);
                        }
                    }
                });
                if ($(window).width() <= 767) {
                    ele.data('mediaelement').setPlayerSize('100%', ele.is('video') ? '100%' : h);
                }
            }
        });
    });;
}
(function($) {
    $widgetkit.lazyloaders["slideset"] = function(element, options) {
        element.css("visibility", "hidden");
        var set_container = element.find(".sets:first"),
            maxwidth = set_container.css({
                width: ""
            }).width(),
            sets = element.find("ul.set").show(),
            optimalwidth = 0,
            gwidth = options.width == "auto" ? element.width() : options.width,
            gheight = options.height == "auto" ? sets.eq(0).children().eq(0).outerHeight(true) : options.height;
        sets.each(function(setindex) {
            var set = $(this).show(),
                childs = $(this).children(),
                tmp = 0;
            childs.each(function(index) {
                var child = $(this);
                child.css("left", tmp);
                tmp += child.width()
            });
            optimalwidth = Math.max(optimalwidth, tmp);
            set.css("width", tmp).data("width", tmp).hide()
        });
        sets.eq(0).show();
        set_container.css({
            height: gheight
        });
        if (optimalwidth > maxwidth) {
            var ratio = optimalwidth / maxwidth;
            sets.css($widgetkit.css3({
                transform: "scale(" + 1 / ratio + ")"
            }));
            set_container.css("height", gheight / ratio)
        }
        sets.css({
            height: gheight
        });
        $widgetkit.load(WIDGETKIT_URL + "/widgets/slideset/js/slideset.js").done(function() {
            element.slideset(options).css("visibility", "visible");
            element.find("img[data-src]").each(function() {
                var img = $(this),
                    src = img.data("src");
                setTimeout(function() {
                    img.attr("src", src)
                }, 1)
            })
        })
    }
})(jQuery);
(function($) {
    $widgetkit.lazyloaders["slideshow"] = function(element, options) {
        if ($widgetkit.support.canvas) {
            element.find("img[data-src]").each(function() {
                var img = $(this),
                    canvas = document.createElement("canvas"),
                    ctx = canvas.getContext("2d");
                canvas.width = img.attr("width");
                canvas.height = img.attr("height");
                ctx.drawImage(this, 0, 0);
                img.attr("src", canvas.toDataURL("image/png"))
            })
        }
        element.css("visibility", "hidden");
        var o_width = options.width,
            o_height = options.height,
            ul = element.find("ul.slides:first"),
            slides = ul.children(),
            delayed = false;
        slides.css("width", "");
        slides.css("height", "");
        ul.css("height", "");
        element.css("width", "");
        if (o_width != "auto" && element.width() < o_width) {
            o_width = "auto";
            o_height = "auto";
            delayed = true
        }
        element.css({
            width: o_width == "auto" ? element.width() : o_width
        });
        var width = ul.width(),
            height = o_height;
        if (height == "auto") {
            height = slides.eq(0).show().height()
        }
        slides.css({
            height: height
        });
        ul.css("height", height);
        $widgetkit.load(WIDGETKIT_URL + "/widgets/slideshow/js/slideshow.js").done(function() {
            element.find("img[data-src]").each(function() {
                var img = $(this),
                    src = img.data("src");
                setTimeout(function() {
                    img.attr("src", src)
                }, 1)
            });
            element.slideshow(options).css("visibility", "visible")
        })
    };
    $widgetkit.lazyloaders["showcase"] = function(element, options) {
        var slideshow = element.find(".wk-slideshow").css("visibility", "hidden"),
            slideset = element.find(".wk-slideset").css("visibility", "hidden"),
            setlis = slideset.find("ul.set > li"),
            width = options.width;
        $widgetkit.lazyloaders["slideshow"](slideshow, options);
        $widgetkit.lazyloaders["slideset"](slideset, $.extend({}, options, {
            width: "auto",
            height: "auto",
            autoplay: false,
            duration: options.slideset_effect_duration,
            index: parseInt(options.index / options.items_per_set)
        }));
        $(window).bind("resize", function() {
            var resize = function() {
                element.css("width", "");
                if (options.width == "auto" || options.width > element.width()) {
                    element.width(element.width())
                } else {
                    element.width(options.width)
                }
            };
            resize();
            return resize
        }());
        $.when($widgetkit.load(WIDGETKIT_URL + "/widgets/slideset/js/slideset.js"), $widgetkit.load(WIDGETKIT_URL + "/widgets/slideshow/js/slideshow.js")).done(function() {
            slideshow.css("visibility", "visible");
            slideset.css("visibility", "visible");
            var sshow = slideshow.data("slideshow"),
                sset = slideset.data("slideset");
            setlis.eq(sshow.index).addClass("active");
            slideshow.bind("slideshow-show", function(e, currentindex, newindex) {
                var li = setlis.removeClass("active").eq(newindex).addClass("active");
                if (!li.parent().is(":visible")) {
                    switch (newindex) {
                        case 0:
                            sset.show(0);
                            break;
                        case setlis.length - 1:
                            sset.show(sset.sets.length - 1);
                            break;
                        default:
                            sset[newindex > currentindex ? "next" : "previous"]()
                    }
                }
            });
            setlis.each(function(index) {
                $(this).bind("click", function() {
                    sshow.stop();
                    sshow.show(index)
                })
            })
        })
    }
})(jQuery);
$widgetkit.load('/media/widgetkit/widgets/spotlight/js/spotlight.js').done(function() {
    jQuery(function($) {
        $('[data-spotlight]').spotlight({
            "duration": 300
        });
    });
});
jQuery(function($) {
    var relativeTime = function(time_value) {
        var parsed_date = new Date(Date.parse(time_value.replace(/(\d+)-(\d+)-(\d+)T(.+)([-\+]\d+):(\d+)/g, "$1/$2/$3 $4 UTC$5$6")));
        var relative_to = arguments.length > 1 ? arguments[1] : new Date;
        var delta = parseInt((relative_to.getTime() - parsed_date) / 1e3);
        if (delta < 60) {
            return $widgetkit.trans.get("LESS_THAN_A_MINUTE_AGO")
        } else if (delta < 120) {
            return $widgetkit.trans.get("ABOUT_A_MINUTE_AGO")
        } else if (delta < 45 * 60) {
            return $widgetkit.trans.get("X_MINUTES_AGO", parseInt(delta / 60).toString())
        } else if (delta < 90 * 60) {
            return $widgetkit.trans.get("ABOUT_AN_HOUR_AGO")
        } else if (delta < 24 * 60 * 60) {
            return $widgetkit.trans.get("X_HOURS_AGO", parseInt(delta / 3600).toString())
        } else if (delta < 48 * 60 * 60) {
            return $widgetkit.trans.get("ONE_DAY_AGO")
        } else {
            return $widgetkit.trans.get("X_DAYS_AGO", parseInt(delta / 86400).toString())
        }
    };
    $(".wk-twitter time").each(function() {
        $(this).html(relativeTime($(this).attr("datetime")))
    });
    var bubbles = $(".wk-twitter-bubbles");
    if (bubbles.length) {
        var matchBubblesHeight = function() {
            bubbles.each(function() {
                var maxheight = 0;
                $(this).find("p.content").each(function() {
                    var h = $(this).height();
                    if (h > maxheight) maxheight = h
                }).css("min-height", maxheight)
            })
        };
        matchBubblesHeight();
        $(window).bind("load", matchBubblesHeight)
    }
});
$widgetkit.trans.addDic({
    "LESS_THAN_A_MINUTE_AGO": "less than a minute ago",
    "ABOUT_A_MINUTE_AGO": "about a minute ago",
    "X_MINUTES_AGO": "%s minutes ago",
    "ABOUT_AN_HOUR_AGO": "about an hour ago",
    "X_HOURS_AGO": "about %s hours ago",
    "ONE_DAY_AGO": "1 day ago",
    "X_DAYS_AGO": "%s days ago"
});