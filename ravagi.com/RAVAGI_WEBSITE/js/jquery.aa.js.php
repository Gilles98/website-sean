
$(function() {

	$('#fb-page-msg-icon').click(function () {
		$(this).hide();
		$('#overlay').addClass('active');
		$('#fb-page-msg-cn').toggle('fast');
  });
	
	$('#fb-page-msg-cn .close').click(function () {
		$('#overlay').removeClass('active');
		$('#fb-page-msg-cn').toggle('fast');
		$('#fb-page-msg-icon').show();
  });
	
	$('#priority-message').click(function () {
		$(this).toggleClass('active');
		$('#overlay').toggleClass('active');		
	});
	
	if (window.location.hash) {
		var thisFlow = window.location.hash.substring(1);
		$('.menu a').removeClass('active');
		$('.menu a[data-flow = '+thisFlow+']').addClass('active');
	} // end if	
	$('a.flow').click(function(){
    $('html, body').animate({ scrollTop: $( $.attr(this, 'href') ).offset().top }, 1200);
		if ($(this).parents('[id^=header]').length) {
			var thisFlow = $(this).data("flow");
			$('.menu a').removeClass('active');
			$('.menu a[data-flow = '+thisFlow+']').addClass('active');
		}
    return false;
	});

	$(".showtime").css("opacity",0);	
	$(".showtime").each(function(index) { $(this).delay(50*index*(1+ Math.floor(Math.random() * 1.2))).animate({opacity: '1'},400); });	

	$(".share").css("opacity",0).delay(800).animate({opacity: '1'},400);	

	$('#menu-responsive-btn').on('click', function(e) {
		e.preventDefault();
		$('.menu').stop().slideToggle(200);
	});
	$('#lang-responsive-btn').on('click', function(e) {
		e.preventDefault();
		$('.lang').slideToggle(200);
	});
	
	$('#header-responsive .menu a').on('click',function(e) {
		$('#header-responsive .menu').stop().slideToggle(200);
	});
	
	$(document).keydown(function(e){
		if (e.keyCode == 38 && $('#ibox-close').length) { window.location = $('#ibox-close').attr("href"); } // end if
		if (e.keyCode == 39 && $('#ibox-next').length) { window.location = $('#ibox-next').attr("href"); } // end if
		if (e.keyCode == 37 && $('#ibox-prev').length) { window.location = $('#ibox-prev').attr("href"); } // end if		
	});
	
	$('.windowheight').each(function(index) { $(this).css({'height': $(window).height()*(($(this).attr('data-percent-visible') || 100)/100)+ 'px'}); });

	$('.responsive-dropdown select').change(function () { window.location = $(this).val(); });
	
	$('input, textarea').placeholder();
	
	$('.fb-post').each(function(index) { $(this).attr('data-width', $(this).parent().width() + 'px');	});
	
	$('.animate-count').each(function () {
		var $this = $(this);
		jQuery({ c: 0 }).animate({ c: $this.text() }, { duration: 5000, easing: 'swing', step: function (now) { $this.text(addNumberFormat(Math.ceil(now))); } });
	});

	contentLoaded();
	
});

function addNumberFormat(str) {
	var parts = (str + "").split(","), main = parts[0], len = main.length, output = "", first = main.charAt(0), i;
	if (first === '-') {
		main = main.slice(1);
		len = main.length;    
	} else {
		first = "";
	}
	i = len - 1;
	while(i >= 0) {
		output = main.charAt(i) + output;
		if ((len - i) % 3 === 0 && i > 0) { output = "." + output; }
		--i;
	}
	output = first + output;
	if (parts.length > 1) { output += "," + parts[1]; }
	return output;
}

function contentLoaded() {
	$('body').imagesLoaded( function() {
		$('.equalheights').matchHeight('remove').matchHeight();
		 
	});
	
	$(".linkable").on("click", function(e) {
		e.preventDefault();
		if ($(this).find("a").attr('target') == '_blank') {
			window.open($(this).find("a").attr("href"));
		} else {
			window.location = $(this).find("a").attr("href");
		} // end if
	});
} // end function

function scrollMonkey() {
	$(window).scroll(function() {
		if ($(window).width() > 820) {
			if($(this).scrollTop() > 160) {
				$('#header-fixed').fadeIn(100);
			} else {
				$('#header-fixed').fadeOut(100);
			}
		} // end if
	});
 
	$('#btn-top').click(function() {
		$('body,html').animate({scrollTop:0},"fast");
	});	
} // end function

/* HTML5 Placeholder jQuery Plugin - v2.1.0
 * Copyright (c)2015 Mathias Bynens
 * 2015-01-27
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){function b(b){var c={},d=/^jQuery\d+$/;return a.each(b.attributes,function(a,b){b.specified&&!d.test(b.name)&&(c[b.name]=b.value)}),c}function c(b,c){var d=this,f=a(d);if(d.value==f.attr("placeholder")&&f.hasClass(m.customClass))if(f.data("placeholder-password")){if(f=f.hide().nextAll('input[type="password"]:first').show().attr("id",f.removeAttr("id").data("placeholder-id")),b===!0)return f[0].value=c;f.focus()}else d.value="",f.removeClass(m.customClass),d==e()&&d.select()}function d(){var d,e=this,f=a(e),g=this.id;if(""===e.value){if("password"===e.type){if(!f.data("placeholder-textinput")){try{d=f.clone().attr({type:"text"})}catch(h){d=a("<input>").attr(a.extend(b(this),{type:"text"}))}d.removeAttr("name").data({"placeholder-password":f,"placeholder-id":g}).bind("focus.placeholder",c),f.data({"placeholder-textinput":d,"placeholder-id":g}).before(d)}f=f.removeAttr("id").hide().prevAll('input[type="text"]:first').attr("id",g).show()}f.addClass(m.customClass),f[0].value=f.attr("placeholder")}else f.removeClass(m.customClass)}function e(){try{return document.activeElement}catch(a){}}var f,g,h="[object OperaMini]"==Object.prototype.toString.call(window.operamini),i="placeholder"in document.createElement("input")&&!h,j="placeholder"in document.createElement("textarea")&&!h,k=a.valHooks,l=a.propHooks;if(i&&j)g=a.fn.placeholder=function(){return this},g.input=g.textarea=!0;else{var m={};g=a.fn.placeholder=function(b){var e={customClass:"placeholder"};m=a.extend({},e,b);var f=this;return f.filter((i?"textarea":":input")+"[placeholder]").not("."+m.customClass).bind({"focus.placeholder":c,"blur.placeholder":d}).data("placeholder-enabled",!0).trigger("blur.placeholder"),f},g.input=i,g.textarea=j,f={get:function(b){var c=a(b),d=c.data("placeholder-password");return d?d[0].value:c.data("placeholder-enabled")&&c.hasClass(m.customClass)?"":b.value},set:function(b,f){var g=a(b),h=g.data("placeholder-password");return h?h[0].value=f:g.data("placeholder-enabled")?(""===f?(b.value=f,b!=e()&&d.call(b)):g.hasClass(m.customClass)?c.call(b,!0,f)||(b.value=f):b.value=f,g):b.value=f}},i||(k.input=f,l.value=f),j||(k.textarea=f,l.value=f),a(function(){a(document).delegate("form","submit.placeholder",function(){var b=a("."+m.customClass,this).each(c);setTimeout(function(){b.each(d)},10)})}),a(window).bind("beforeunload.placeholder",function(){a("."+m.customClass).each(function(){this.value=""})})}});
//# sourceMappingURL=jquery.placeholder.min.js.map


/**
* jquery.matchHeight-min.js master
* http://brm.io/jquery-match-height/
* License: MIT
*/
(function(c){var n=-1,f=-1,g=function(a){return parseFloat(a)||0},r=function(a){var b=null,d=[];c(a).each(function(){var a=c(this),k=a.offset().top-g(a.css("margin-top")),l=0<d.length?d[d.length-1]:null;null===l?d.push(a):1>=Math.floor(Math.abs(b-k))?d[d.length-1]=l.add(a):d.push(a);b=k});return d},p=function(a){var b={byRow:!0,property:"height",target:null,remove:!1};if("object"===typeof a)return c.extend(b,a);"boolean"===typeof a?b.byRow=a:"remove"===a&&(b.remove=!0);return b},b=c.fn.matchHeight=
function(a){a=p(a);if(a.remove){var e=this;this.css(a.property,"");c.each(b._groups,function(a,b){b.elements=b.elements.not(e)});return this}if(1>=this.length&&!a.target)return this;b._groups.push({elements:this,options:a});b._apply(this,a);return this};b._groups=[];b._throttle=80;b._maintainScroll=!1;b._beforeUpdate=null;b._afterUpdate=null;b._apply=function(a,e){var d=p(e),h=c(a),k=[h],l=c(window).scrollTop(),f=c("html").outerHeight(!0),m=h.parents().filter(":hidden");m.each(function(){var a=c(this);
a.data("style-cache",a.attr("style"))});m.css("display","block");d.byRow&&!d.target&&(h.each(function(){var a=c(this),b=a.css("display");"inline-block"!==b&&"inline-flex"!==b&&(b="block");a.data("style-cache",a.attr("style"));a.css({display:b,"padding-top":"0","padding-bottom":"0","margin-top":"0","margin-bottom":"0","border-top-width":"0","border-bottom-width":"0",height:"100px"})}),k=r(h),h.each(function(){var a=c(this);a.attr("style",a.data("style-cache")||"")}));c.each(k,function(a,b){var e=c(b),
f=0;if(d.target)f=d.target.outerHeight(!1);else{if(d.byRow&&1>=e.length){e.css(d.property,"");return}e.each(function(){var a=c(this),b=a.css("display");"inline-block"!==b&&"inline-flex"!==b&&(b="block");b={display:b};b[d.property]="";a.css(b);a.outerHeight(!1)>f&&(f=a.outerHeight(!1));a.css("display","")})}e.each(function(){var a=c(this),b=0;d.target&&a.is(d.target)||("border-box"!==a.css("box-sizing")&&(b+=g(a.css("border-top-width"))+g(a.css("border-bottom-width")),b+=g(a.css("padding-top"))+g(a.css("padding-bottom"))),
a.css(d.property,f-b+"px"))})});m.each(function(){var a=c(this);a.attr("style",a.data("style-cache")||null)});b._maintainScroll&&c(window).scrollTop(l/f*c("html").outerHeight(!0));return this};b._applyDataApi=function(){var a={};c("[data-match-height], [data-mh]").each(function(){var b=c(this),d=b.attr("data-mh")||b.attr("data-match-height");a[d]=d in a?a[d].add(b):b});c.each(a,function(){this.matchHeight(!0)})};var q=function(a){b._beforeUpdate&&b._beforeUpdate(a,b._groups);c.each(b._groups,function(){b._apply(this.elements,
this.options)});b._afterUpdate&&b._afterUpdate(a,b._groups)};b._update=function(a,e){if(e&&"resize"===e.type){var d=c(window).width();if(d===n)return;n=d}a?-1===f&&(f=setTimeout(function(){q(e);f=-1},b._throttle)):q(e)};c(b._applyDataApi);c(window).bind("load",function(a){b._update(!1,a)});c(window).bind("resize orientationchange",function(a){b._update(!0,a)})})(jQuery);

