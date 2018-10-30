/*! Lazy Load 1.9.7 - MIT license - Copyright 2010-2015 Mika Tuupola */
!function(a,b,c,d){var e=a(b);a.fn.lazyload=function(f){function g(){var b=0;i.each(function(){var c=a(this);if(!j.skip_invisible||c.is(":visible"))if(a.abovethetop(this,j)||a.leftofbegin(this,j));else if(a.belowthefold(this,j)||a.rightoffold(this,j)){if(++b>j.failure_limit)return!1}else c.trigger("appear"),b=0})}var h,i=this,j={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:b,data_attribute:"original",skip_invisible:!1,appear:null,load:null,placeholder:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"};return f&&(d!==f.failurelimit&&(f.failure_limit=f.failurelimit,delete f.failurelimit),d!==f.effectspeed&&(f.effect_speed=f.effectspeed,delete f.effectspeed),a.extend(j,f)),h=j.container===d||j.container===b?e:a(j.container),0===j.event.indexOf("scroll")&&h.bind(j.event,function(){return g()}),this.each(function(){var b=this,c=a(b);b.loaded=!1,(c.attr("src")===d||c.attr("src")===!1)&&c.is("img")&&c.attr("src",j.placeholder),c.one("appear",function(){if(!this.loaded){if(j.appear){var d=i.length;j.appear.call(b,d,j)}a("<img />").bind("load",function(){var d=c.attr("data-"+j.data_attribute);c.hide(),c.is("img")?c.attr("src",d):c.css("background-image","url('"+d+"')"),c[j.effect](j.effect_speed),b.loaded=!0;var e=a.grep(i,function(a){return!a.loaded});if(i=a(e),j.load){var f=i.length;j.load.call(b,f,j)}}).attr("src",c.attr("data-"+j.data_attribute))}}),0!==j.event.indexOf("scroll")&&c.bind(j.event,function(){b.loaded||c.trigger("appear")})}),e.bind("resize",function(){g()}),/(?:iphone|ipod|ipad).*os 5/gi.test(navigator.appVersion)&&e.bind("pageshow",function(b){b.originalEvent&&b.originalEvent.persisted&&i.each(function(){a(this).trigger("appear")})}),a(c).ready(function(){g()}),this},a.belowthefold=function(c,f){var g;return g=f.container===d||f.container===b?(b.innerHeight?b.innerHeight:e.height())+e.scrollTop():a(f.container).offset().top+a(f.container).height(),g<=a(c).offset().top-f.threshold},a.rightoffold=function(c,f){var g;return g=f.container===d||f.container===b?e.width()+e.scrollLeft():a(f.container).offset().left+a(f.container).width(),g<=a(c).offset().left-f.threshold},a.abovethetop=function(c,f){var g;return g=f.container===d||f.container===b?e.scrollTop():a(f.container).offset().top,g>=a(c).offset().top+f.threshold+a(c).height()},a.leftofbegin=function(c,f){var g;return g=f.container===d||f.container===b?e.scrollLeft():a(f.container).offset().left,g>=a(c).offset().left+f.threshold+a(c).width()},a.inviewport=function(b,c){return!(a.rightoffold(b,c)||a.leftofbegin(b,c)||a.belowthefold(b,c)||a.abovethetop(b,c))},a.extend(a.expr[":"],{"below-the-fold":function(b){return a.belowthefold(b,{threshold:0})},"above-the-top":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-screen":function(b){return a.rightoffold(b,{threshold:0})},"left-of-screen":function(b){return!a.rightoffold(b,{threshold:0})},"in-viewport":function(b){return a.inviewport(b,{threshold:0})},"above-the-fold":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-fold":function(b){return a.rightoffold(b,{threshold:0})},"left-of-fold":function(b){return!a.rightoffold(b,{threshold:0})}})}(jQuery,window,document);
/* Sidr */
(function(e){var t=false,n=false;var r={isUrl:function(e){var t=new RegExp("^(https?:\\/\\/)?"+"((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|"+"((\\d{1,3}\\.){3}\\d{1,3}))"+"(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*"+"(\\?[;&a-z\\d%_.~+=-]*)?"+"(\\#[-a-z\\d_]*)?$","i");if(!t.test(e)){return false}else{return true}},loadContent:function(e,t){e.html(t)},addPrefix:function(e){var t=e.attr("id"),n=e.attr("class");if(typeof t==="string"&&""!==t){e.attr("id",t.replace(/([A-Za-z0-9_.\-]+)/g,"sidr-id-$1"))}if(typeof n==="string"&&""!==n&&"sidr-inner"!==n){e.attr("class",n.replace(/([A-Za-z0-9_.\-]+)/g,"sidr-class-$1"))}e.removeAttr("style")},execute:function(r,s,o){if(typeof s==="function"){o=s;s="sidr"}else if(!s){s="sidr"}var u=e("#"+s),a=e(u.data("body")),f=e("html"),l=u.outerWidth(true),c=u.data("speed"),h=u.data("side"),p=u.data("displace"),d=u.data("onOpen"),v=u.data("onClose"),m,g,y,b=s==="sidr"?"sidr-open":"sidr-open "+s+"-open";if("open"===r||"toggle"===r&&!u.is(":visible")){if(u.is(":visible")||t){return}if(n!==false){i.close(n,function(){i.open(s)});return}t=true;if(h==="left"){m={left:l+"px"};g={left:"0px"}}else{m={right:l+"px"};g={right:"0px"}}if(a.is("body")){y=f.scrollTop();f.css("overflow-x","hidden").scrollTop(y)}if(p){a.addClass("sidr-animating").css({width:a.width(),position:"absolute"}).animate(m,c,function(){e(this).addClass(b)})}else{setTimeout(function(){e(this).addClass(b)},c)}u.css("display","block").animate(g,c,function(){t=false;n=s;if(typeof o==="function"){o(s)}a.removeClass("sidr-animating")});d()}else{if(!u.is(":visible")||t){return}t=true;if(h==="left"){m={left:0};g={left:"-"+l+"px"}}else{m={right:0};g={right:"-"+l+"px"}}if(a.is("body")){y=f.scrollTop();f.removeAttr("style").scrollTop(y)}a.addClass("sidr-animating").animate(m,c).removeClass(b);u.animate(g,c,function(){u.removeAttr("style").hide();a.removeAttr("style");e("html").removeAttr("style");t=false;n=false;if(typeof o==="function"){o(s)}a.removeClass("sidr-animating")});v()}}};var i={open:function(e,t){r.execute("open",e,t)},close:function(e,t){r.execute("close",e,t)},toggle:function(e,t){r.execute("toggle",e,t)},toogle:function(e,t){r.execute("toggle",e,t)}};e.sidr=function(t){if(i[t]){return i[t].apply(this,Array.prototype.slice.call(arguments,1))}else if(typeof t==="function"||typeof t==="string"||!t){return i.toggle.apply(this,arguments)}else{e.error("Method "+t+" does not exist on jQuery.sidr")}};e.fn.sidr=function(t){var n=e.extend({name:"sidr",speed:200,side:"left",source:null,renaming:true,body:"body",displace:true,onOpen:function(){},onClose:function(){}},t);var s=n.name,o=e("#"+s);if(o.length===0){o=e("<div />").attr("id",s).appendTo(e("body"))}o.addClass("sidr").addClass(n.side).data({speed:n.speed,side:n.side,body:n.body,displace:n.displace,onOpen:n.onOpen,onClose:n.onClose});if(typeof n.source==="function"){var u=n.source(s);r.loadContent(o,u)}else if(typeof n.source==="string"&&r.isUrl(n.source)){e.get(n.source,function(e){r.loadContent(o,e)})}else if(typeof n.source==="string"){var a="",f=n.source.split(",");e.each(f,function(t,n){a+='<div class="sidr-inner">'+e(n).html()+"</div>"});if(n.renaming){var l=e("<div />").html(a);l.find("*").each(function(t,n){var i=e(n);r.addPrefix(i)});a=l.html()}r.loadContent(o,a)}else if(n.source!==null){e.error("Invalid Sidr Source")}return this.each(function(){var t=e(this),n=t.data("sidr");if(!n){t.data("sidr",s);if("ontouchstart"in document.documentElement){t.bind("touchstart",function(e){var t=e.originalEvent.touches[0];this.touched=e.timeStamp});t.bind("touchend",function(e){var t=Math.abs(e.timeStamp-this.touched);if(t<200){e.preventDefault();i.toggle(s)}})}else{t.click(function(e){e.preventDefault();i.toggle(s)})}}})}})(jQuery);
/* global */
(function($) {"use strict";$(document).ready(function(){$('#navigation-toggle').sidr({name: 'sidr-main',source: '#sidr-close, #site-nav',side: 'left',displace: false});$(".sidr-class-toggle-sidr-close").click( function() {$.sidr('close', 'sidr-main');return false;});});})(jQuery);
$(function(){
    if(window.console&&window.console.info){console.info("Theme Template Name：zbpNew;\nTheme Template Design by 柏平博客;\nAuthor Url:https://www.zbpnice.cn");}
	/*导航*/
	$(window).scroll(function(){
		var before = $(window).scrollTop();
		$(window).scroll(function(){
			var after = $(window).scrollTop();
			if(before>after){
				$('.header').removeClass('header-fixed');
				before=after;
			}
			if(before<after){
				$('.header').addClass('header-fixed');
				before=after;
			}
		})
	})
	/*添加返回顶部*/
	$('<a>').attr('titls','返回顶部').attr('id','backtop').attr('href','javascript:;').appendTo('body');
	$('#backtop').html('TOP');
	$('body').on('click','#backtop',function(){
		$('body,html').animate({
			scrollTop:'0px'
		},900);
	});
	$(window).scroll(function(){
		var top = $(window).scrollTop();
		if(top>=400){
			$('#backtop').fadeIn();
		}else{
			$('#backtop').fadeOut();
		}
		return false;
	})
	/*搜索框*/
	$(".search-form input[type='text']").attr('placeholder','请输入关键词，并按回车键搜索');
	$(".search-form input[type='text']").keydown(function(event){ if(event.keyCode==13){ $(".search-form input[type='submit']").click(); }});
	$('.nav-search').click(function(){
		$(this).find('i').toggleClass("fa-close");
		$('.searchs').removeClass('searchs-fadeOut').fadeIn(233);
		$('.search-bg').removeClass('searchs-fadeOut').fadeIn(233);
		$('.search-close-bar').addClass('searchs-fadeOut').fadeIn(244);
		$('.search-form').addClass('searchs-fadeOut').fadeIn(244);
	})
	$('.search-close-bar').click(function(){
		$(this).addClass('searchs-fadeOut').fadeOut(233);
		$('.search-form').addClass('searchs-fadeOut').fadeOut(233);
		$('.search-bg').addClass('searchs-fadeOut').fadeOut('slow');
		$('.searchs').addClass('searchs-fadeOut').fadeOut('slow');
		$('.nav-search').find('i').toggleClass("fa-close");
	})
})
