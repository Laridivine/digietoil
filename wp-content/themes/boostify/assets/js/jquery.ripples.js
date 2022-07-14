/*!
 * jQuery Ripples plugin v0.5.3 / https://github.com/sirxemic/jquery.ripples
 * MIT License
 * @author sirxemic / https://sirxemic.com/
 */

/* !function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e("object"==typeof exports?require("jquery"):jQuery)}(function(e){"use strict";function t(e){return"%"==e[e.length-1]}function r(){function e(e,t){var i="OES_texture_"+e,o=i+"_linear",n=o in r,a=[i];return n&&a.push(o),{type:t,linearSupport:n,extensions:a}}var t=document.createElement("canvas");if(h=t.getContext("webgl")||t.getContext("experimental-webgl"),!h)return null;var r={};if(["OES_texture_float","OES_texture_half_float","OES_texture_float_linear","OES_texture_half_float_linear"].forEach(function(e){var t=h.getExtension(e);t&&(r[e]=t)}),!r.OES_texture_float)return null;var i=[];i.push(e("float",h.FLOAT)),r.OES_texture_half_float&&i.push(e("half_float",r.OES_texture_half_float.HALF_FLOAT_OES));var o=h.createTexture(),n=h.createFramebuffer();h.bindFramebuffer(h.FRAMEBUFFER,n),h.bindTexture(h.TEXTURE_2D,o),h.texParameteri(h.TEXTURE_2D,h.TEXTURE_MIN_FILTER,h.NEAREST),h.texParameteri(h.TEXTURE_2D,h.TEXTURE_MAG_FILTER,h.NEAREST),h.texParameteri(h.TEXTURE_2D,h.TEXTURE_WRAP_S,h.CLAMP_TO_EDGE),h.texParameteri(h.TEXTURE_2D,h.TEXTURE_WRAP_T,h.CLAMP_TO_EDGE);for(var a=null,s=0;s<i.length;s++)if(h.texImage2D(h.TEXTURE_2D,0,h.RGBA,32,32,0,h.RGBA,i[s].type,null),h.framebufferTexture2D(h.FRAMEBUFFER,h.COLOR_ATTACHMENT0,h.TEXTURE_2D,o,0),h.checkFramebufferStatus(h.FRAMEBUFFER)===h.FRAMEBUFFER_COMPLETE){a=i[s];break}return a}function i(e,t){try{return new ImageData(e,t)}catch(i){var r=document.createElement("canvas");return r.getContext("2d").createImageData(e,t)}}function o(e){var t=e.split(" ");if(1!==t.length)return t.map(function(t){switch(e){case"center":return"50%";case"top":case"left":return"0";case"right":case"bottom":return"100%";default:return t}});switch(e){case"center":return["50%","50%"];case"top":return["50%","0"];case"bottom":return["50%","100%"];case"left":return["0","50%"];case"right":return["100%","50%"];default:return[e,"50%"]}}function n(e,t,r){function i(e,t){var r=h.createShader(e);if(h.shaderSource(r,t),h.compileShader(r),!h.getShaderParameter(r,h.COMPILE_STATUS))throw new Error("compile error: "+h.getShaderInfoLog(r));return r}var o={};if(o.id=h.createProgram(),h.attachShader(o.id,i(h.VERTEX_SHADER,e)),h.attachShader(o.id,i(h.FRAGMENT_SHADER,t)),h.linkProgram(o.id),!h.getProgramParameter(o.id,h.LINK_STATUS))throw new Error("link error: "+h.getProgramInfoLog(o.id));o.uniforms={},o.locations={},h.useProgram(o.id),h.enableVertexAttribArray(0);for(var n,a,s=/uniform (\w+) (\w+)/g,u=e+t;null!=(n=s.exec(u));)a=n[2],o.locations[a]=h.getUniformLocation(o.id,a);return o}function a(e,t){h.activeTexture(h.TEXTURE0+(t||0)),h.bindTexture(h.TEXTURE_2D,e)}function s(e){var t=/url\(["']?([^"']*)["']?\)/.exec(e);return null==t?null:t[1]}function u(e){return e.match(/^data:/)}var h,c=e(window),d=r(),f=i(32,32);e("head").prepend("<style>.jquery-ripples { position: relative; z-index: 0; }</style>");var l=function(t,r){function i(){o.step(),requestAnimationFrame(i)}var o=this;this.$el=e(t),this.interactive=r.interactive,this.resolution=r.resolution,this.textureDelta=new Float32Array([1/this.resolution,1/this.resolution]),this.perturbance=r.perturbance,this.dropRadius=r.dropRadius,this.crossOrigin=r.crossOrigin,this.imageUrl=r.imageUrl;var n=document.createElement("canvas");n.width=this.$el.innerWidth(),n.height=this.$el.innerHeight(),this.canvas=n,this.$canvas=e(n),this.$canvas.css({position:"absolute",left:0,top:0,right:0,bottom:0,zIndex:-1}),this.$el.addClass("jquery-ripples").append(n),this.context=h=n.getContext("webgl")||n.getContext("experimental-webgl"),d.extensions.forEach(function(e){h.getExtension(e)}),e(window).on("resize",function(){var e=o.$el.innerWidth(),t=o.$el.innerHeight();e==o.canvas.width&&t==o.canvas.height||(n.width=e,n.height=t)}),this.textures=[],this.framebuffers=[],this.bufferWriteIndex=0,this.bufferReadIndex=1;for(var a=0;a<2;a++){var s=h.createTexture(),u=h.createFramebuffer();h.bindFramebuffer(h.FRAMEBUFFER,u),u.width=this.resolution,u.height=this.resolution,h.bindTexture(h.TEXTURE_2D,s),h.texParameteri(h.TEXTURE_2D,h.TEXTURE_MIN_FILTER,d.linearSupport?h.LINEAR:h.NEAREST),h.texParameteri(h.TEXTURE_2D,h.TEXTURE_MAG_FILTER,d.linearSupport?h.LINEAR:h.NEAREST),h.texParameteri(h.TEXTURE_2D,h.TEXTURE_WRAP_S,h.CLAMP_TO_EDGE),h.texParameteri(h.TEXTURE_2D,h.TEXTURE_WRAP_T,h.CLAMP_TO_EDGE),h.texImage2D(h.TEXTURE_2D,0,h.RGBA,this.resolution,this.resolution,0,h.RGBA,d.type,null),h.framebufferTexture2D(h.FRAMEBUFFER,h.COLOR_ATTACHMENT0,h.TEXTURE_2D,s,0),this.textures.push(s),this.framebuffers.push(u)}this.quad=h.createBuffer(),h.bindBuffer(h.ARRAY_BUFFER,this.quad),h.bufferData(h.ARRAY_BUFFER,new Float32Array([-1,-1,1,-1,1,1,-1,1]),h.STATIC_DRAW),this.initShaders(),this.initTexture(),this.setTransparentTexture(),this.loadImage(),h.clearColor(0,0,0,0),h.blendFunc(h.SRC_ALPHA,h.ONE_MINUS_SRC_ALPHA),this.visible=!0,this.running=!0,this.inited=!0,this.setupPointerEvents(),requestAnimationFrame(i)};l.DEFAULTS={imageUrl:null,resolution:256,dropRadius:20,perturbance:.03,interactive:!0,crossOrigin:""},l.prototype={setupPointerEvents:function(){function e(){return r.visible&&r.running&&r.interactive}function t(t,i){e()&&r.dropAtPointer(t,r.dropRadius*(i?1.5:1),i?.14:.01)}var r=this;this.$el.on("mousemove.ripples",function(e){t(e)}).on("touchmove.ripples, touchstart.ripples",function(e){for(var r=e.originalEvent.changedTouches,i=0;i<r.length;i++)t(r[i])}).on("mousedown.ripples",function(e){t(e,!0)})},loadImage:function(){var e=this;h=this.context;var t=this.imageUrl||s(this.originalCssBackgroundImage)||s(this.$el.css("backgroundImage"));if(t!=this.imageSource){if(this.imageSource=t,!this.imageSource)return void this.setTransparentTexture();var r=new Image;r.onload=function(){function t(e){return 0==(e&e-1)}h=e.context;var i=t(r.width)&&t(r.height)?h.REPEAT:h.CLAMP_TO_EDGE;h.bindTexture(h.TEXTURE_2D,e.backgroundTexture),h.texParameteri(h.TEXTURE_2D,h.TEXTURE_WRAP_S,i),h.texParameteri(h.TEXTURE_2D,h.TEXTURE_WRAP_T,i),h.texImage2D(h.TEXTURE_2D,0,h.RGBA,h.RGBA,h.UNSIGNED_BYTE,r),e.backgroundWidth=r.width,e.backgroundHeight=r.height,e.hideCssBackground()},r.onerror=function(){h=e.context,e.setTransparentTexture()},r.crossOrigin=u(this.imageSource)?null:this.crossOrigin,r.src=this.imageSource}},step:function(){h=this.context,this.visible&&(this.computeTextureBoundaries(),this.running&&this.update(),this.render())},drawQuad:function(){h.bindBuffer(h.ARRAY_BUFFER,this.quad),h.vertexAttribPointer(0,2,h.FLOAT,!1,0,0),h.drawArrays(h.TRIANGLE_FAN,0,4)},render:function(){h.bindFramebuffer(h.FRAMEBUFFER,null),h.viewport(0,0,this.canvas.width,this.canvas.height),h.enable(h.BLEND),h.clear(h.COLOR_BUFFER_BIT|h.DEPTH_BUFFER_BIT),h.useProgram(this.renderProgram.id),a(this.backgroundTexture,0),a(this.textures[0],1),h.uniform1f(this.renderProgram.locations.perturbance,this.perturbance),h.uniform2fv(this.renderProgram.locations.topLeft,this.renderProgram.uniforms.topLeft),h.uniform2fv(this.renderProgram.locations.bottomRight,this.renderProgram.uniforms.bottomRight),h.uniform2fv(this.renderProgram.locations.containerRatio,this.renderProgram.uniforms.containerRatio),h.uniform1i(this.renderProgram.locations.samplerBackground,0),h.uniform1i(this.renderProgram.locations.samplerRipples,1),this.drawQuad(),h.disable(h.BLEND)},update:function(){h.viewport(0,0,this.resolution,this.resolution),h.bindFramebuffer(h.FRAMEBUFFER,this.framebuffers[this.bufferWriteIndex]),a(this.textures[this.bufferReadIndex]),h.useProgram(this.updateProgram.id),this.drawQuad(),this.swapBufferIndices()},swapBufferIndices:function(){this.bufferWriteIndex=1-this.bufferWriteIndex,this.bufferReadIndex=1-this.bufferReadIndex},computeTextureBoundaries:function(){var e,r=this.$el.css("background-size"),i=this.$el.css("background-attachment"),n=o(this.$el.css("background-position"));if("fixed"==i?(e={left:window.pageXOffset,top:window.pageYOffset},e.width=c.width(),e.height=c.height()):(e=this.$el.offset(),e.width=this.$el.innerWidth(),e.height=this.$el.innerHeight()),"cover"==r)var a=Math.max(e.width/this.backgroundWidth,e.height/this.backgroundHeight),s=this.backgroundWidth*a,u=this.backgroundHeight*a;else if("contain"==r)var a=Math.min(e.width/this.backgroundWidth,e.height/this.backgroundHeight),s=this.backgroundWidth*a,u=this.backgroundHeight*a;else{r=r.split(" ");var s=r[0]||"",u=r[1]||s;t(s)?s=e.width*parseFloat(s)/100:"auto"!=s&&(s=parseFloat(s)),t(u)?u=e.height*parseFloat(u)/100:"auto"!=u&&(u=parseFloat(u)),"auto"==s&&"auto"==u?(s=this.backgroundWidth,u=this.backgroundHeight):("auto"==s&&(s=this.backgroundWidth*(u/this.backgroundHeight)),"auto"==u&&(u=this.backgroundHeight*(s/this.backgroundWidth)))}var h=n[0],d=n[1];h=t(h)?e.left+(e.width-s)*parseFloat(h)/100:e.left+parseFloat(h),d=t(d)?e.top+(e.height-u)*parseFloat(d)/100:e.top+parseFloat(d);var f=this.$el.offset();this.renderProgram.uniforms.topLeft=new Float32Array([(f.left-h)/s,(f.top-d)/u]),this.renderProgram.uniforms.bottomRight=new Float32Array([this.renderProgram.uniforms.topLeft[0]+this.$el.innerWidth()/s,this.renderProgram.uniforms.topLeft[1]+this.$el.innerHeight()/u]);var l=Math.max(this.canvas.width,this.canvas.height);this.renderProgram.uniforms.containerRatio=new Float32Array([this.canvas.width/l,this.canvas.height/l])},initShaders:function(){var e=["attribute vec2 vertex;","varying vec2 coord;","void main() {","coord = vertex * 0.5 + 0.5;","gl_Position = vec4(vertex, 0.0, 1.0);","}"].join("\n");this.dropProgram=n(e,["precision highp float;","const float PI = 3.141592653589793;","uniform sampler2D texture;","uniform vec2 center;","uniform float radius;","uniform float strength;","varying vec2 coord;","void main() {","vec4 info = texture2D(texture, coord);","float drop = max(0.0, 1.0 - length(center * 0.5 + 0.5 - coord) / radius);","drop = 0.5 - cos(drop * PI) * 0.5;","info.r += drop * strength;","gl_FragColor = info;","}"].join("\n")),this.updateProgram=n(e,["precision highp float;","uniform sampler2D texture;","uniform vec2 delta;","varying vec2 coord;","void main() {","vec4 info = texture2D(texture, coord);","vec2 dx = vec2(delta.x, 0.0);","vec2 dy = vec2(0.0, delta.y);","float average = (","texture2D(texture, coord - dx).r +","texture2D(texture, coord - dy).r +","texture2D(texture, coord + dx).r +","texture2D(texture, coord + dy).r",") * 0.25;","info.g += (average - info.r) * 2.0;","info.g *= 0.995;","info.r += info.g;","gl_FragColor = info;","}"].join("\n")),h.uniform2fv(this.updateProgram.locations.delta,this.textureDelta),this.renderProgram=n(["precision highp float;","attribute vec2 vertex;","uniform vec2 topLeft;","uniform vec2 bottomRight;","uniform vec2 containerRatio;","varying vec2 ripplesCoord;","varying vec2 backgroundCoord;","void main() {","backgroundCoord = mix(topLeft, bottomRight, vertex * 0.5 + 0.5);","backgroundCoord.y = 1.0 - backgroundCoord.y;","ripplesCoord = vec2(vertex.x, -vertex.y) * containerRatio * 0.5 + 0.5;","gl_Position = vec4(vertex.x, -vertex.y, 0.0, 1.0);","}"].join("\n"),["precision highp float;","uniform sampler2D samplerBackground;","uniform sampler2D samplerRipples;","uniform vec2 delta;","uniform float perturbance;","varying vec2 ripplesCoord;","varying vec2 backgroundCoord;","void main() {","float height = texture2D(samplerRipples, ripplesCoord).r;","float heightX = texture2D(samplerRipples, vec2(ripplesCoord.x + delta.x, ripplesCoord.y)).r;","float heightY = texture2D(samplerRipples, vec2(ripplesCoord.x, ripplesCoord.y + delta.y)).r;","vec3 dx = vec3(delta.x, heightX - height, 0.0);","vec3 dy = vec3(0.0, heightY - height, delta.y);","vec2 offset = -normalize(cross(dy, dx)).xz;","float specular = pow(max(0.0, dot(offset, normalize(vec2(-0.6, 1.0)))), 4.0);","gl_FragColor = texture2D(samplerBackground, backgroundCoord + offset * perturbance) + specular;","}"].join("\n")),h.uniform2fv(this.renderProgram.locations.delta,this.textureDelta)},initTexture:function(){this.backgroundTexture=h.createTexture(),h.bindTexture(h.TEXTURE_2D,this.backgroundTexture),h.pixelStorei(h.UNPACK_FLIP_Y_WEBGL,1),h.texParameteri(h.TEXTURE_2D,h.TEXTURE_MAG_FILTER,h.LINEAR),h.texParameteri(h.TEXTURE_2D,h.TEXTURE_MIN_FILTER,h.LINEAR)},setTransparentTexture:function(){h.bindTexture(h.TEXTURE_2D,this.backgroundTexture),h.texImage2D(h.TEXTURE_2D,0,h.RGBA,h.RGBA,h.UNSIGNED_BYTE,f)},hideCssBackground:function(){var e=this.$el[0].style.backgroundImage;"none"!=e&&(this.originalInlineCss=e,this.originalCssBackgroundImage=this.$el.css("backgroundImage"),this.$el.css("backgroundImage","none"))},restoreCssBackground:function(){this.$el.css("backgroundImage",this.originalInlineCss||"")},dropAtPointer:function(e,t,r){var i=parseInt(this.$el.css("border-left-width"))||0,o=parseInt(this.$el.css("border-top-width"))||0;this.drop(e.pageX-this.$el.offset().left-i,e.pageY-this.$el.offset().top-o,t,r)},drop:function(e,t,r,i){h=this.context;var o=this.$el.innerWidth(),n=this.$el.innerHeight(),s=Math.max(o,n);r/=s;var u=new Float32Array([(2*e-o)/s,(n-2*t)/s]);h.viewport(0,0,this.resolution,this.resolution),h.bindFramebuffer(h.FRAMEBUFFER,this.framebuffers[this.bufferWriteIndex]),a(this.textures[this.bufferReadIndex]),h.useProgram(this.dropProgram.id),h.uniform2fv(this.dropProgram.locations.center,u),h.uniform1f(this.dropProgram.locations.radius,r),h.uniform1f(this.dropProgram.locations.strength,i),this.drawQuad(),this.swapBufferIndices()},destroy:function(){this.$el.off(".ripples").removeClass("jquery-ripples").removeData("ripples"),this.$canvas.remove(),this.restoreCssBackground()},show:function(){this.visible=!0,this.$canvas.show(),this.hideCssBackground()},hide:function(){this.visible=!1,this.$canvas.hide(),this.restoreCssBackground()},pause:function(){this.running=!1},play:function(){this.running=!0},set:function(e,t){switch(e){case"dropRadius":case"perturbance":case"interactive":case"crossOrigin":this[e]=t;break;case"imageUrl":this.imageUrl=t,this.loadImage()}}};var g=e.fn.ripples;e.fn.ripples=function(t){if(!d)throw new Error("Your browser does not support WebGL, the OES_texture_float extension or rendering to floating point textures.");var r=arguments.length>1?Array.prototype.slice.call(arguments,1):void 0;return this.each(function(){var i=e(this),o=i.data("ripples"),n=e.extend({},l.DEFAULTS,i.data(),"object"==typeof t&&t);(o||"string"!=typeof t)&&(o?"string"==typeof t&&l.prototype[t].apply(o,r):i.data("ripples",o=new l(this,n)))})},e.fn.ripples.Constructor=l,e.fn.ripples.noConflict=function(){return e.fn.ripples=g,this}}); */

+(function ($) {
    var gl;
    var $window = $(window); // There is only one window, so why not cache the jQuery-wrapped window?

    String.prototype.endsWith = function (suffix) {
        return this.indexOf(suffix, this.length - suffix.length) !== -1;
    }; // Stupid Chrome

    function hasWebGLSupport() {
        var canvas = document.createElement("canvas");
        var context = canvas.getContext("webgl") || canvas.getContext("experimental-webgl");
        var result = context && context.getExtension("OES_texture_float") && context.getExtension("OES_texture_float_linear");
        canvas.remove();
        return result;
    }

    var supportsWebGL = hasWebGLSupport();

    function createProgram(vertexSource, fragmentSource, uniformValues) {
        function compileSource(type, source) {
            var shader = gl.createShader(type);
            gl.shaderSource(shader, source);
            gl.compileShader(shader);
            if (!gl.getShaderParameter(shader, gl.COMPILE_STATUS)) {
                throw new Error("compile error: " + gl.getShaderInfoLog(shader));
            }
            return shader;
        }

        var program = {};

        program.id = gl.createProgram();
        gl.attachShader(program.id, compileSource(gl.VERTEX_SHADER, vertexSource));
        gl.attachShader(program.id, compileSource(gl.FRAGMENT_SHADER, fragmentSource));
        gl.linkProgram(program.id);
        if (!gl.getProgramParameter(program.id, gl.LINK_STATUS)) {
            throw new Error("link error: " + gl.getProgramInfoLog(program.id));
        }

        // Fetch the uniform and attribute locations
        program.uniforms = {};
        program.locations = {};
        gl.useProgram(program.id);
        gl.enableVertexAttribArray(0);
        var name,
            type,
            regex = /uniform (\w+) (\w+)/g,
            shaderCode = vertexSource + fragmentSource;
        while ((match = regex.exec(shaderCode)) != null) {
            name = match[2];
            program.locations[name] = gl.getUniformLocation(program.id, name);
        }

        return program;
    }

    function bindTexture(texture, unit) {
        gl.activeTexture(gl.TEXTURE0 + (unit || 0));
        gl.bindTexture(gl.TEXTURE_2D, texture);
    }

    // RIPPLES CLASS DEFINITION
    // =========================

    var Ripples = function (el, options) {
        var that = this;

        this.$el = $(el);
        this.$el.addClass("ripples");

        // If this element doesn't have a background image, don't apply this effect to it
        var backgroundUrl = /url\(["']?([^"']*)["']?\)/.exec(this.$el.css("background-image"));
        //alert(backgroundUrl);
        if (backgroundUrl == null) return;
        backgroundUrl = backgroundUrl[1];

        this.resolution = options.resolution || 256;
        this.textureDelta = new Float32Array([1 / this.resolution, 1 / this.resolution]);

        this.perturbance = options.perturbance;

        var canvas = document.createElement("canvas");
        canvas.width = this.$el.outerWidth();
        canvas.height = this.$el.outerHeight();
        this.canvas = canvas;

        this.$el.append(canvas);
        this.context = gl = canvas.getContext("webgl") || canvas.getContext("experimental-webgl");

        // Load extensions
        gl.getExtension("OES_texture_float");
        gl.getExtension("OES_texture_float_linear");

        // Init events
        $(window).on("resize", function () {
            if (that.$el.outerWidth() != that.canvas.width || that.$el.outerHeight() != that.canvas.height) {
                canvas.width = that.$el.outerWidth();
                canvas.height = that.$el.outerHeight();
            }
        });
        this.$el.on("mousemove", $.proxy(this.mousemove, this));
        this.$el.on("mousemoverel", $.proxy(this.mousemove, this));
        this.$el.on("mousedown", $.proxy(this.mousedown, this));

        // Init textures

        var image = new Image();
        image.crossOrigin = "";
        image.onload = function () {
            gl = that.context;

            function isPowerOfTwo(x) {
                return (x & (x - 1)) == 0;
            }

            var wrapping = isPowerOfTwo(image.width) && isPowerOfTwo(image.height) ? gl.REPEAT : gl.CLAMP_TO_EDGE;

            that.backgroundWidth = image.width;
            that.backgroundHeight = image.height;

            var texture = gl.createTexture();

            gl.bindTexture(gl.TEXTURE_2D, texture);
            gl.pixelStorei(gl.UNPACK_FLIP_Y_WEBGL, 1);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_MAG_FILTER, gl.LINEAR);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_MIN_FILTER, gl.LINEAR);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_S, wrapping);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_T, wrapping);
            gl.texImage2D(gl.TEXTURE_2D, 0, gl.RGBA, gl.RGBA, gl.UNSIGNED_BYTE, image);

            that.backgroundTexture = texture;
        };
        image.src = backgroundUrl;

        this.textures = [];
        this.framebuffers = [];

        for (var i = 0; i < 2; i++) {
            var texture = gl.createTexture();
            var framebuffer = gl.createFramebuffer();

            gl.bindFramebuffer(gl.FRAMEBUFFER, framebuffer);
            framebuffer.width = this.resolution;
            framebuffer.height = this.resolution;

            gl.bindTexture(gl.TEXTURE_2D, texture);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_MIN_FILTER, gl.LINEAR);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_MAG_FILTER, gl.LINEAR);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_S, gl.CLAMP_TO_EDGE);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_T, gl.CLAMP_TO_EDGE);
            gl.texImage2D(gl.TEXTURE_2D, 0, gl.RGBA, this.resolution, this.resolution, 0, gl.RGBA, gl.FLOAT, null);

            var renderbuffer = gl.createRenderbuffer();
            gl.bindRenderbuffer(gl.RENDERBUFFER, renderbuffer);
            gl.renderbufferStorage(gl.RENDERBUFFER, gl.DEPTH_COMPONENT16, this.resolution, this.resolution);

            gl.framebufferTexture2D(gl.FRAMEBUFFER, gl.COLOR_ATTACHMENT0, gl.TEXTURE_2D, texture, 0);
            gl.framebufferRenderbuffer(gl.FRAMEBUFFER, gl.DEPTH_ATTACHMENT, gl.RENDERBUFFER, renderbuffer);
            if (gl.checkFramebufferStatus(gl.FRAMEBUFFER) != gl.FRAMEBUFFER_COMPLETE) {
                throw new Error("Rendering to this texture is not supported (incomplete framebuffer)");
            }

            gl.bindTexture(gl.TEXTURE_2D, null);
            gl.bindRenderbuffer(gl.RENDERBUFFER, null);
            gl.bindFramebuffer(gl.FRAMEBUFFER, null);

            this.textures.push(texture);
            this.framebuffers.push(framebuffer);
        }

        // Init GL stuff
        this.quad = gl.createBuffer();
        gl.bindBuffer(gl.ARRAY_BUFFER, this.quad);
        gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1, -1, +1, -1, +1, +1, -1, +1]), gl.STATIC_DRAW);

        this.initShaders();

        // Init animation
        function step() {
            that.update();
            requestAnimationFrame(step);
        }

        requestAnimationFrame(step);
    };

    Ripples.DEFAULTS = {
        resolution: 256,
        perturbance: 0.03,
    };

    Ripples.prototype = {
        update: function () {
            gl = this.context;

            if (!this.backgroundTexture) return;

            this.updateTextures();
            this.render();
        },

        drawQuad: function () {
            gl.bindBuffer(gl.ARRAY_BUFFER, this.quad);
            gl.vertexAttribPointer(0, 2, gl.FLOAT, false, 0, 0);
            gl.drawArrays(gl.TRIANGLE_FAN, 0, 4);
        },

        render: function () {
            gl.viewport(0, 0, this.canvas.width, this.canvas.height);
            gl.clear(gl.COLOR_BUFFER_BIT | gl.DEPTH_BUFFER_BIT);

            gl.useProgram(this.renderProgram.id);

            bindTexture(this.backgroundTexture, 0);
            bindTexture(this.textures[0], 1);

            gl.uniform2fv(this.renderProgram.locations.topLeft, this.renderProgram.uniforms.topLeft);
            gl.uniform2fv(this.renderProgram.locations.bottomRight, this.renderProgram.uniforms.bottomRight);
            gl.uniform2fv(this.renderProgram.locations.containerRatio, this.renderProgram.uniforms.containerRatio);
            gl.uniform1i(this.renderProgram.locations.samplerBackground, 0);
            gl.uniform1i(this.renderProgram.locations.samplerRipples, 1);

            this.drawQuad();
        },

        updateTextures: function () {
            this.computeTextureBoundaries();

            gl.viewport(0, 0, this.resolution, this.resolution);

            for (var i = 0; i < 2; i++) {
                gl.bindFramebuffer(gl.FRAMEBUFFER, this.framebuffers[i]);
                bindTexture(this.textures[1 - i]);
                gl.useProgram(this.updateProgram[i].id);

                this.drawQuad();
            }

            gl.bindFramebuffer(gl.FRAMEBUFFER, null);
        },

        computeTextureBoundaries: function () {
            var backgroundSize = this.$el.css("background-size");
            var backgroundAttachment = this.$el.css("background-attachment");
            var backgroundPosition = this.$el.css("background-position").split(" ");

            // Here the 'window' is the element which the background adapts to
            // (either the chrome window or some element, depending on attachment)
            var parElement = backgroundAttachment == "fixed" ? $window : this.$el;
            var winOffset = parElement.offset() || { left: pageXOffset, top: pageYOffset };
            var winWidth = parElement.outerWidth();
            var winHeight = parElement.outerHeight();

            // TODO: background-clip
            if (backgroundSize == "cover") {
                var scale = Math.max(winWidth / this.backgroundWidth, winHeight / this.backgroundHeight);

                var backgroundWidth = this.backgroundWidth * scale;
                var backgroundHeight = this.backgroundHeight * scale;
            } else if (backgroundSize == "contain") {
                var scale = Math.min(winWidth / this.backgroundWidth, winHeight / this.backgroundHeight);

                var backgroundWidth = this.backgroundWidth * scale;
                var backgroundHeight = this.backgroundHeight * scale;
            } else {
                backgroundSize = backgroundSize.split(" ");
                var backgroundWidth = backgroundSize[0];
                var backgroundHeight = backgroundSize[1] || backgroundSize[0];

                if (backgroundWidth.endsWith("%")) backgroundWidth = (winWidth * parseFloat(backgroundWidth)) / 100;
                else if (backgroundWidth == "auto") backgroundWidth = this.backgroundWidth;
                else backgroundWidth = parseFloat(backgroundWidth);

                if (backgroundHeight.endsWith("%")) backgroundHeight = (winHeight * parseFloat(backgroundHeight)) / 100;
                else if (backgroundHeight == "auto") backgroundHeight = this.backgroundHeight;
                else backgroundHeight = parseFloat(backgroundHeight);
            }

            // Compute backgroundX and backgroundY in page coordinates
            var backgroundX = backgroundPosition[0];
            var backgroundY = backgroundPosition[1];

            if (backgroundX == "left") backgroundX = winOffset.left;
            else if (backgroundX == "center") backgroundX = winOffset.left + winWidth / 2 - backgroundWidth / 2;
            else if (backgroundX == "right") backgroundX = winOffset.left + winWidth - backgroundWidth;
            else if (backgroundX.endsWith("%")) {
                backgroundX = winOffset.left + ((winWidth - backgroundWidth) * parseFloat(backgroundX)) / 100;
            } else {
                backgroundX = parseFloat(backgroundX);
            }

            if (backgroundY == "top") backgroundY = winOffset.top;
            else if (backgroundY == "center") backgroundY = winOffset.top + winHeight / 2 - backgroundHeight / 2;
            else if (backgroundY == "bottom") backgroundY = winOffset.top + winHeight - backgroundHeight;
            else if (backgroundY.endsWith("%")) {
                backgroundY = winOffset.top + ((winHeight - backgroundHeight) * parseFloat(backgroundY)) / 100;
            } else {
                backgroundY = parseFloat(backgroundY);
            }

            var elementOffset = this.$el.offset();

            this.renderProgram.uniforms.topLeft = new Float32Array([(elementOffset.left - backgroundX) / backgroundWidth, (elementOffset.top - backgroundY) / backgroundHeight]);
            this.renderProgram.uniforms.bottomRight = new Float32Array([this.renderProgram.uniforms.topLeft[0] + this.$el.outerWidth() / backgroundWidth, this.renderProgram.uniforms.topLeft[1] + this.$el.outerHeight() / backgroundHeight]);

            var maxSide = Math.max(this.canvas.width, this.canvas.height);

            this.renderProgram.uniforms.containerRatio = new Float32Array([this.canvas.width / maxSide, this.canvas.height / maxSide]);
        },

        initShaders: function () {
            var vertexShader = ["attribute vec2 vertex;", "varying vec2 coord;", "void main() {", "coord = vertex * 0.5 + 0.5;", "gl_Position = vec4(vertex, 0.0, 1.0);", "}"].join("\n");

            this.dropProgram = createProgram(
                vertexShader,
                [
                    "precision highp float;",

                    "const float PI = 3.141592653589793;",
                    "uniform sampler2D texture;",
                    "uniform vec2 center;",
                    "uniform float radius;",
                    "uniform float strength;",

                    "varying vec2 coord;",

                    "void main() {",
                    "vec4 info = texture2D(texture, coord);",

                    "float drop = max(0.0, 1.0 - length(center * 0.5 + 0.5 - coord) / radius);",
                    "drop = 0.5 - cos(drop * PI) * 0.5;",

                    "info.r += drop * strength;",

                    "gl_FragColor = info;",
                    "}",
                ].join("\n")
            );

            this.updateProgram = [0, 0];
            this.updateProgram[0] = createProgram(
                vertexShader,
                [
                    "precision highp float;",

                    "uniform sampler2D texture;",
                    "uniform vec2 delta;",

                    "varying vec2 coord;",

                    "void main() {",
                    "vec4 info = texture2D(texture, coord);",

                    "vec2 dx = vec2(delta.x, 0.0);",
                    "vec2 dy = vec2(0.0, delta.y);",

                    "float average = (",
                    "texture2D(texture, coord - dx).r +",
                    "texture2D(texture, coord - dy).r +",
                    "texture2D(texture, coord + dx).r +",
                    "texture2D(texture, coord + dy).r",
                    ") * 0.25;",

                    "info.g += (average - info.r) * 2.0;",
                    "info.g *= 0.995;",
                    "info.r += info.g;",

                    "gl_FragColor = info;",
                    "}",
                ].join("\n")
            );
            gl.uniform2fv(this.updateProgram[0].locations.delta, this.textureDelta);

            this.updateProgram[1] = createProgram(
                vertexShader,
                [
                    "precision highp float;",

                    "uniform sampler2D texture;",
                    "uniform vec2 delta;",

                    "varying vec2 coord;",

                    "void main() {",
                    "vec4 info = texture2D(texture, coord);",

                    "vec3 dx = vec3(delta.x, texture2D(texture, vec2(coord.x + delta.x, coord.y)).r - info.r, 0.0);",
                    "vec3 dy = vec3(0.0, texture2D(texture, vec2(coord.x, coord.y + delta.y)).r - info.r, delta.y);",
                    "info.ba = normalize(cross(dy, dx)).xz;",

                    "gl_FragColor = info;",
                    "}",
                ].join("\n")
            );
            gl.uniform2fv(this.updateProgram[1].locations.delta, this.textureDelta);

            this.renderProgram = createProgram(
                [
                    "precision highp float;",

                    "attribute vec2 vertex;",
                    "uniform vec2 topLeft;",
                    "uniform vec2 bottomRight;",
                    "uniform vec2 containerRatio;",
                    "varying vec2 ripplesCoord;",
                    "varying vec2 backgroundCoord;",
                    "void main() {",
                    "backgroundCoord = mix(topLeft, bottomRight, vertex * 0.5 + 0.5);",
                    "backgroundCoord.y = 1.0 - backgroundCoord.y;",
                    "ripplesCoord = vec2(vertex.x, -vertex.y) * containerRatio * 0.5 + 0.5;",
                    "gl_Position = vec4(vertex.x, -vertex.y, 0.0, 1.0);",
                    "}",
                ].join("\n"),
                [
                    "precision highp float;",

                    "uniform sampler2D samplerBackground;",
                    "uniform sampler2D samplerRipples;",
                    "uniform float perturbance;",
                    "varying vec2 ripplesCoord;",
                    "varying vec2 backgroundCoord;",

                    "void main() {",
                    "vec2 offset = -texture2D(samplerRipples, ripplesCoord).ba;",
                    "float specular = pow(max(0.0, dot(offset, normalize(vec2(-0.6, 1.0)))), 4.0);",
                    "gl_FragColor = texture2D(samplerBackground, backgroundCoord + offset * perturbance) + specular;",
                    "}",
                ].join("\n")
            );
            gl.uniform1f(this.renderProgram.locations.perturbance, this.perturbance);
        },

        dropAtMouse: function (e, radius, strength) {
            var that = this;

            gl = this.context;

            e.offsetX = e.offsetX || e.pageX - this.$el.offset().left;
            e.offsetY = e.offsetY || e.pageY - this.$el.offset().top;

            var elWidth = this.$el.outerWidth();
            var elHeight = this.$el.outerHeight();
            var longestSide = Math.max(elWidth, elHeight);

            var dropPosition = new Float32Array([(2 * e.offsetX - elWidth) / longestSide, (elHeight - 2 * e.offsetY) / longestSide]);

            gl.viewport(0, 0, this.resolution, this.resolution);

            // Render onto texture/framebuffer 0
            gl.bindFramebuffer(gl.FRAMEBUFFER, this.framebuffers[0]);

            // Using texture 1
            bindTexture(this.textures[1]);

            gl.useProgram(this.dropProgram.id);
            gl.uniform2fv(this.dropProgram.locations.center, dropPosition);
            gl.uniform1f(this.dropProgram.locations.radius, radius);
            gl.uniform1f(this.dropProgram.locations.strength, strength);

            this.drawQuad();

            // Switch textures
            var t = this.framebuffers[0];
            this.framebuffers[0] = this.framebuffers[1];
            this.framebuffers[1] = t;
            t = this.textures[0];
            this.textures[0] = this.textures[1];
            this.textures[1] = t;

            gl.bindFramebuffer(gl.FRAMEBUFFER, null);
        },

        mousemove: function (e) {
            this.dropAtMouse(e, 0.03, 0.01);
        },

        mousedown: function (e) {
            this.dropAtMouse(e, 0.09, 0.14);
        },
    };

    // RIPPLES PLUGIN DEFINITION
    // ==========================

    var old = $.fn.ripples;

    $.fn.ripples = function (option) {
        return this.each(function () {
            if (!supportsWebGL) throw new Error("Your browser does not support at least one of the following: WebGL, OES_texture_float extension, OES_texture_float_linear extension.");

            var $this = $(this);
            var data = $this.data("ripples");
            var options = $.extend({}, Ripples.DEFAULTS, $this.data(), typeof option == "object" && option);

            if (!data) $this.data("ripples", new Ripples(this, options));
        });
    };

    $.fn.ripples.Constructor = Ripples;

    // RIPPLES NO CONFLICT
    // ====================

    $.fn.ripples.noConflict = function () {
        $.fn.ripples = old;
        return this;
    };
})(window.jQuery);
