function readURL(e){if(e.files&&e.files[0]){var o=new FileReader;o.onload=function(e){var o=jQuery(".entry-content .l-container #image-preview .image-preview");o.css({"background-image":'url("'+e.target.result+'")',"background-repeat":"no-repeat","background-size":"cover","background-position":"center bottom","padding-bottom":"100%"})},o.readAsDataURL(e.files[0])}}!function(e){var o;if("function"==typeof define&&define.amd&&(define(e),o=!0),"object"==typeof exports&&(module.exports=e(),o=!0),!o){var n=window.Cookies,t=window.Cookies=e();t.noConflict=function(){return window.Cookies=n,t}}}(function(){function e(){for(var e=0,o={};e<arguments.length;e++){var n=arguments[e];for(var t in n)o[t]=n[t]}return o}function o(n){function t(o,i,c){if("undefined"!=typeof document){if(arguments.length>1){c=e({path:"/"},t.defaults,c),"number"==typeof c.expires&&(c.expires=new Date(1*new Date+864e5*c.expires)),c.expires=c.expires?c.expires.toUTCString():"";try{var r=JSON.stringify(i);/^[\{\[]/.test(r)&&(i=r)}catch(a){}i=n.write?n.write(i,o):encodeURIComponent(String(i)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,decodeURIComponent),o=encodeURIComponent(String(o)).replace(/%(23|24|26|2B|5E|60|7C)/g,decodeURIComponent).replace(/[\(\)]/g,escape);var s="";for(var u in c)c[u]&&(s+="; "+u,c[u]!==!0&&(s+="="+c[u].split(";")[0]));return document.cookie=o+"="+i+s}for(var d={},l=function(e){return e.replace(/(%[0-9A-Z]{2})+/g,decodeURIComponent)},f=document.cookie?document.cookie.split("; "):[],p=0;p<f.length;p++){var g=f[p].split("="),k=g.slice(1).join("=");this.json||'"'!==k.charAt(0)||(k=k.slice(1,-1));try{var m=l(g[0]);if(k=(n.read||n)(k,m)||l(k),this.json)try{k=JSON.parse(k)}catch(a){}if(d[m]=k,o===m)break}catch(a){}}return o?d[o]:d}}return t.set=t,t.get=function(e){return t.call(t,e)},t.getJSON=function(e){return t.call({json:!0},e)},t.remove=function(o,n){t(o,"",e(n,{expires:-1}))},t.defaults={},t.withConverter=o,t}return o(function(){})}),jQuery(document).ready(function(e){if(e(".js-menu-toggle").on("click",function(){e("body").toggleClass("is-menu-on")}),jQuery(document).on("change","#input_1_12",function(){readURL(this)}),!Cookies.get("cookie_notice_accepted")){var o='<div id="cookie-notice" role="banner" class="cn-top wp-default" style="color: rgb(255, 255, 255); background-color: rgb(0, 0, 0); display: block;"><div class="cookie-notice-container"><span id="cn-notice-text">Lekker-kontje.nl uses cookies and collects information about the website usage to analyse and improve. By using this website you approve your behaviour is tracked.</span><a href="#" id="cn-accept-cookie" data-cookie-set="accept" class="cn-set-cookie button wp-default">Confirm</a><a href="/cookies/" target="_blank" id="cn-more-info" class="cn-more-info button wp-default">Leave</a></div></div>';jQuery(window).scroll(function(){var e=jQuery(window).scrollTop();!Cookies.get("cookie_notice_accepted")&&0==jQuery("#cookie-notice").length&&e>10&&jQuery("#cn-wrapper").html(o)})}jQuery(document).on("click","#cn-accept-cookie",function(e){e.preventDefault(),jQuery("#cookie-notice").remove(),Cookies.set("cookie_notice_accepted","1",{expires:365})}),jQuery(document).on("click","#cn-more-info",function(e){e.preventDefault(),window.location.href="https://www.google.com"})});
//# sourceMappingURL=scripts.js.map
