define(["jquery","dust","dust-helpers-supplement"],function(e,t){"use strict";function s(e,t,n){if(Array.prototype.filter)return e.filter(t);var r=[],i=e.length-1,s=null;while(i>-1)s=e[i],t.call(n,s,i,e)&&r.unshift(s),i--;return r}function o(e,t,n){if(e instanceof Array&&Array.prototype.forEach)return e.forEach(t,n);var r=Object(e),i=null,s=null;for(i in r)if(r.hasOwnProperty(i)){s=t.call(n,r[i],i,r);if(s===!1)break}}function u(e,t){var n=null;for(n in e)e.hasOwnProperty(n)&&(t[n]=e[n]);return t}function a(e){return o(Array.prototype.slice.call(arguments,1),function(t){u(t,e)}),e}var n=null,r=null,i=null;return n=function(){},n.prototype={render:function(t,n){var r=new e.Deferred;return this._doRender(t,n,function(e,n){if(e)return r.reject(e);r.resolve(n,t)}),r.promise()},_doRender:function(e,t,n){}},r=function(e){var n="/templates/%s.js";t.onLoad=function(t,r){var i=e.getContext().templatePath||n,s=i.replace("%s",t);require([s],function(){requirejs.undef(s),setTimeout(r,0)})}},r.prototype=a(n.prototype,{_doRender:function(e,n,r){var i={};n=n||{},n.content&&(i.cn=n.content,delete n.content),n=t.makeBase(i).push(n),t.render(e,n,r)}}),i=function(){this._context={},this._eventCache={},this.viewRenderer=new r(this)},i.prototype={on:function(e,t,n){var r=this._eventCache;o(e.split(/\s+/),function(e){var i=r[e]||(r[e]=[]);i.push({name:e,callback:t,context:n})})},off:function(e,t,n){var r=this._eventCache,i=e?Object(e.split(/\s+/)):null,u=null;if(i&&!t&&!n){o(i,function(e){delete r[e]});return}u={callback:t,context:n},o(r,function(e,t){if(!i||i.hasOwnProperty(t))r[t]=s(e,function(e){var t=!1;return o(u,function(n,r){return n&&n!==e[r]&&(t=!0),!t}),t})})},trigger:function(e){var t=this._eventCache,n=Array.prototype.slice.call(arguments,1),r=null;o(e.split(/\s+/),function(e){r=t[e],r&&o(r,function(e){e.callback.apply(e.context,n)})})},setContext:function(e){return u(e,this._context)},getContext:function(){return this._context}},new i});