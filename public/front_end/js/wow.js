!function(d,a){if("function"==typeof define&&define.amd)define(["module","exports"],a);else if("undefined"!=typeof exports)a(module,exports);else{var b={exports:{}};a(b,b.exports),d.WOW=b.exports}}(this,function(s,a){"use strict";function t(c,a){if(!(c instanceof a))throw new TypeError("Cannot call a class as a function")}function u(c,a){return 0<=a.indexOf(c)}function c(e,a){for(var b in a)if(null==e[b]){var c=a[b];e[b]=c}return e}function b(b){return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(b)}function d(f){var a,g=!(1>=arguments.length||void 0===arguments[1])&&arguments[1],b=!(2>=arguments.length||void 0===arguments[2])&&arguments[2],c=3>=arguments.length||void 0===arguments[3]?null:arguments[3];return null==document.createEvent?null==document.createEventObject?a.eventName=f:(a=document.createEventObject(),a.eventType=f):(a=document.createEvent("CustomEvent"),a.initCustomEvent(f,g,b,c)),a}function e(c,a){null==c.dispatchEvent?a in(null!=c)?c[a]():"on"+a in(null!=c)&&c["on"+a]():c.dispatchEvent(a)}function f(d,a,b){null==d.addEventListener?null==d.attachEvent?d[a]=b:d.attachEvent("on"+a,b):d.addEventListener(a,b,!1)}function g(d,a,b){null==d.removeEventListener?null==d.detachEvent?delete d[a]:d.detachEvent("on"+a,b):d.removeEventListener(a,b,!1)}function h(){return"innerHeight"in window?window.innerHeight:document.documentElement.clientHeight}Object.defineProperty(a,"__esModule",{value:!0});var i,j,k=function(){function e(e,a){for(var b,f=0;f<a.length;f++)b=a[f],b.enumerable=b.enumerable||!1,b.configurable=!0,"value"in b&&(b.writable=!0),Object.defineProperty(e,b.key,b)}return function(a,b,c){return b&&e(a.prototype,b),c&&e(a,c),a}}(),n=window.WeakMap||window.MozWeakMap||function(){function b(){t(this,b),this.keys=[],this.values=[]}return k(b,[{key:"get",value:function(d){for(var a,e=0;e<this.keys.length;e++)if(a=this.keys[e],a===d)return this.values[e]}},{key:"set",value:function(e,a){for(var b,f=0;f<this.keys.length;f++)if(b=this.keys[f],b===e)return this.values[f]=a,this;return this.keys.push(e),this.values.push(a),this}}]),b}(),o=window.MutationObserver||window.WebkitMutationObserver||window.MozMutationObserver||(j=i=function(){function b(){t(this,b),"undefined"!=typeof console&&null!==console&&(console.warn("MutationObserver is not supported by your browser."),console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content."))}return k(b,[{key:"observe",value:function(){}}]),b}(),i.notSupported=!0,j),p=window.getComputedStyle||function(e){var a=/(\-([a-z]){1})/g;return{getPropertyValue:function(b){"float"===b&&(b="styleFloat"),a.test(b)&&b.replace(a,function(c,a){return a.toUpperCase()});var f=e.currentStyle;return(null==f?void 0:f[b])||null}}},q=function(){function i(){var a=0>=arguments.length||void 0===arguments[0]?{}:arguments[0];t(this,i),this.defaults={boxClass:"wow",animateClass:"animated",offset:0,mobile:!0,live:!0,callback:null,scrollContainer:null,resetAnimation:!0},this.animate=function(){return"requestAnimationFrame"in window?function(b){return window.requestAnimationFrame(b)}:function(b){return b()}}(),this.vendors=["moz","webkit"],this.start=this.start.bind(this),this.resetAnimation=this.resetAnimation.bind(this),this.scrollHandler=this.scrollHandler.bind(this),this.scrollCallback=this.scrollCallback.bind(this),this.scrolled=!0,this.config=c(a,this.defaults),null!=a.scrollContainer&&(this.config.scrollContainer=document.querySelector(a.scrollContainer)),this.animationNameCache=new n,this.wowEvent=d(this.config.boxClass)}return k(i,[{key:"init",value:function(){this.element=window.document.documentElement,u(document.readyState,["interactive","complete"])?this.start():f(document,"DOMContentLoaded",this.start),this.finished=[]}},{key:"start",value:function(){var g=this;if(this.stopped=!1,this.boxes=[].slice.call(this.element.querySelectorAll("."+this.config.boxClass)),this.all=this.boxes.slice(0),this.boxes.length)if(this.disabled())this.resetStyle();else for(var a,e=0;e<this.boxes.length;e++)a=this.boxes[e],this.applyStyle(a,!0);if(this.disabled()||(f(this.config.scrollContainer||window,"scroll",this.scrollHandler),f(window,"resize",this.scrollHandler),this.interval=setInterval(this.scrollCallback,50)),this.config.live){var h=new o(function(a){for(var b=0;b<a.length;b++)for(var h,i=a[b],d=0;d<i.addedNodes.length;d++)h=i.addedNodes[d],g.doSync(h)});h.observe(document.body,{childList:!0,subtree:!0})}}},{key:"stop",value:function(){this.stopped=!0,g(this.config.scrollContainer||window,"scroll",this.scrollHandler),g(window,"resize",this.scrollHandler),null!=this.interval&&clearInterval(this.interval)}},{key:"sync",value:function(){o.notSupported&&this.doSync(this.element)}},{key:"doSync",value:function(d){if("undefined"!=typeof d&&null!==d||(d=this.element),1===d.nodeType){d=d.parentNode||d;for(var f,g=d.querySelectorAll("."+this.config.boxClass),b=0;b<g.length;b++)f=g[b],u(f,this.all)||(this.boxes.push(f),this.all.push(f),this.stopped||this.disabled()?this.resetStyle():this.applyStyle(f,!0),this.scrolled=!0)}}},{key:"show",value:function(b){return this.applyStyle(b),b.className=b.className+" "+this.config.animateClass,null!=this.config.callback&&this.config.callback(b),e(b,this.wowEvent),this.config.resetAnimation&&(f(b,"animationend",this.resetAnimation),f(b,"oanimationend",this.resetAnimation),f(b,"webkitAnimationEnd",this.resetAnimation),f(b,"MSAnimationEnd",this.resetAnimation)),b}},{key:"applyStyle",value:function(g,a){var b=this,c=g.getAttribute("data-wow-duration"),d=g.getAttribute("data-wow-delay"),e=g.getAttribute("data-wow-iteration");return this.animate(function(){return b.customStyle(g,a,c,d,e)})}},{key:"resetStyle",value:function(){for(var c,d=0;d<this.boxes.length;d++)c=this.boxes[d],c.style.visibility="visible"}},{key:"resetAnimation",value:function(c){if(0<=c.type.toLowerCase().indexOf("animationend")){var a=c.target||c.srcElement;a.className=a.className.replace(this.config.animateClass,"").trim()}}},{key:"customStyle",value:function(f,a,b,c,d){return a&&this.cacheAnimationName(f),f.style.visibility=a?"hidden":"visible",b&&this.vendorSet(f.style,{animationDuration:b}),c&&this.vendorSet(f.style,{animationDelay:c}),d&&this.vendorSet(f.style,{animationIterationCount:d}),this.vendorSet(f.style,{animationName:a?"none":this.cachedAnimationName(f)}),f}},{key:"vendorSet",value:function(g,a){for(var b in a)if(a.hasOwnProperty(b)){var c=a[b];g[""+b]=c;for(var d,h=0;h<this.vendors.length;h++)d=this.vendors[h],g[""+d+b.charAt(0).toUpperCase()+b.substr(1)]=c}}},{key:"vendorCSS",value:function(g,a){for(var b,h=p(g),c=h.getPropertyCSSValue(a),i=0;i<this.vendors.length;i++)b=this.vendors[i],c=c||h.getPropertyCSSValue("-"+b+"-"+a);return c}},{key:"animationName",value:function(d){var a;try{a=this.vendorCSS(d,"animation-name").cssText}catch(b){a=p(d).getPropertyValue("animation-name")}return"none"===a?"":a}},{key:"cacheAnimationName",value:function(b){return this.animationNameCache.set(b,this.animationName(b))}},{key:"cachedAnimationName",value:function(b){return this.animationNameCache.get(b)}},{key:"scrollHandler",value:function(){this.scrolled=!0}},{key:"scrollCallback",value:function(){if(this.scrolled){this.scrolled=!1;for(var d,e=[],a=0;a<this.boxes.length;a++)if(d=this.boxes[a],d){if(this.isVisible(d)){this.show(d);continue}e.push(d)}this.boxes=e,this.boxes.length||this.config.live||this.stop()}}},{key:"offsetTop",value:function(c){for(;void 0===c.offsetTop;)c=c.parentNode;for(var d=c.offsetTop;c.offsetParent;)c=c.offsetParent,d+=c.offsetTop;return d}},{key:"isVisible",value:function(g){var a=g.getAttribute("data-wow-offset")||this.config.offset,b=this.config.scrollContainer&&this.config.scrollContainer.scrollTop||window.pageYOffset,c=b+Math.min(this.element.clientHeight,h())-a,d=this.offsetTop(g),e=d+g.clientHeight;return c>=d&&e>=b}},{key:"disabled",value:function(){return!this.config.mobile&&b(navigator.userAgent)}}]),i}();a["default"]=q,s.exports=a["default"]});