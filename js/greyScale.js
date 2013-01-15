/**********************************************************
************************ Hoverizr *************************

Hoverizr is an image manipulation jQuery plug in taking 
advantage of the new canvas element which is getting more 
and more popular.

Currently it allows you to use three different, dynamic
effects:
	1. Grayscale - Default
	2. Blur
	3. Color Inversion

/**
 *
 * Version: 0.2.3
 * Author:  Gianluca Guarini
 * Contact: gianluca.guarini@gmail.com
 * Website: http://www.gianlucaguarini.com/
 * Twitter: @gianlucaguarini
 *
 * Copyright (c) 2012 Gianluca Guarini
 *
 */
;(function(a){a.fn.extend({BlackAndWhite:function(q){var b=this,m=this,i={hoverEffect:true,webworkerPath:false,responsive:true,invertHoverEffect:false,speed:500};q=a.extend(i,q);var e=q.hoverEffect,f=q.webworkerPath,k=q.invertHoverEffect,j=q.responsive,c=a.isPlainObject(q.speed)?q.speed.fadeIn:q.speed,p=a.isPlainObject(q.speed)?q.speed.fadeOut:q.speed;var h=!!document.createElement("canvas").getContext,d=a(window);var o=(function(){return(typeof(Worker)!=="undefined")?true:false}());var g=a.browser.msie&&+a.browser.version===7;var l=function(y,u,s,B){var C=u.getContext("2d"),w=y,x=0,z;C.drawImage(y,0,0,s,B);var r=C.getImageData(0,0,s,B),A=r.data,t=A.length;if(o&&f){var v=new Worker(f+"BnWWorker.js");v.postMessage(r);v.onmessage=function(D){C.putImageData(D.data,0,0)}}else{for(;x<t;x+=4){z=A[x]*0.3+A[x+1]*0.59+A[x+2]*0.11;A[x]=A[x+1]=A[x+2]=z}C.putImageData(r,0,0)}};var n=function(u,t){var r=u.src;if(h&&(!(a.browser.msie&&a.browser.version=="9.0"))){var v=a(t).find("img").width(),z=a(t).find("img").height(),y=u.width,w=u.height;a('<canvas width="'+y+'" height="'+w+'"></canvas>').prependTo(t);var s=a(t).find("canvas");a(s).css({position:"absolute",top:0,left:0,width:v,height:z,display:k?"none":"block"});l(u,s[0],y,w);if(e){a(t).mouseenter(function(){if(!k){a(this).find("canvas").stop(true,true).fadeOut(p)}else{a(this).find("canvas").stop(true,true).fadeIn(c)}});a(t).mouseleave(function(){if(!k){a(this).find("canvas").stop(true,true).fadeIn(c)}else{a(this).find("canvas").stop(true,true).fadeOut(p)}})}}else{var x=a(t).find("img").prop("width");var A=a(t).find("img").prop("height");a("<img src="+r+' width="'+x+'" height="'+A+'" class="ieFix" /> ').prependTo(t);a(".ieFix").css({position:"absolute",top:0,left:0,filter:"progid:DXImageTransform.Microsoft.BasicImage(grayscale=1)",display:k?"none":"block"});if(e){a(t).mouseenter(function(){if(!k){a(this).children(".ieFix").stop(true,true).fadeOut(p)}else{a(this).children(".ieFix").stop(true,true).fadeIn(c)}});a(t).mouseleave(function(){if(!k){a(this).children(".ieFix").stop(true,true).fadeIn(c)}else{a(this).children(".ieFix").stop(true,true).fadeOut(p)}})}}};this.init=function(r){a(b).each(function(t,u){var s=new Image();s.src=a(u).find("img").prop("src");if(!s.width){a(s).on("load",function(){n(s,u)})}else{n(s,u)}});if(j){d.on("resize orientationchange",b.resizeImages)}};this.resizeImages=function(){a(b).each(function(t,v){var s=a(v).find("img:not(.ieFix)");var r,u;if(g){r=a(s).prop("width");u=a(s).prop("height")}else{r=a(s).width();u=a(s).height()}a(this).find(".ieFix, canvas").css({width:r,height:u})})};return m.init(q)}})}(jQuery));

