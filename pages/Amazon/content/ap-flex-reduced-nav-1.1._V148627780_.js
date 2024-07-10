/**
 * AP Global JS
 */
var popover_object;
function close_popover() {
    popover_object.close();
    return false;
}

jQuery(document).ready(function() {
    // BEGIN - focus on the first empty field of the form
    // if we are framed, do not mess with the focus
    if ( window != window.parent )
        return;
    // if it looks like the user or ua changed the focus, do not mess with the focus
    if ( document.activeElement && document.activeElement.tabIndex > 1 )
        return;
    var q = jQuery('#centerSlots form input[tabIndex][value=""]:visible:not(:button):first');
    if ( q.size() > 0 ) q.focus();
    // END - focus on the first empty field of the form

    // BEGIN - create the popover trigger
    var refmarkerUrl = "/ap/nocontent/ref=";
    jQuery(".ap_popover_trigger").each(function() {
        var trigger = jQuery(this);
        var trigger_link = trigger;
        if (!trigger_link.is("a")) {
            trigger_link = trigger_link.children("a");
        }
        trigger_link.amazonPopoverTrigger({
            modal: true,
            showCloseButton: true,
            width: trigger.attr("ap_popover:width") || 600,
            localContent: "#" + trigger.attr("ap_popover:content"),
            title: jQuery("#" + trigger.attr("ap_popover:title")).html(),
            onHide: function(popover) {
                if (trigger.attr("ap_popover:on_hide_reftag")) {
                    jQuery.ajax({
                            url: refmarkerUrl + trigger.attr("ap_popover:on_hide_reftag"),
                            cache: false
                        });
                }
            },
            onShow: function(popover) {
                popover_object = popover;
                if (trigger.attr("ap_popover:on_show_reftag")) {
                    jQuery.ajax({
                            url: refmarkerUrl + trigger.attr("ap_popover:on_show_reftag"),
                            cache: false
                        });
                }
            }
        });
    });
    // END - create the popover trigger
});

function toggle(targetId, speed) { return true;
		if (document.getElementById){
		target = document.getElementById( targetId );
			if (target.style.display == "none") {
			jQuery(document.getElementById(targetId)).show(speed);
				target.style.display = "";
			} else {
			jQuery(document.getElementById(targetId)).hide(speed);
			}
		}
};

function displayCapsWarning(e, id, box) {
      e = (e) ? e : window.event;
      
      var charCode = false;
      if (e.which) {
        charCode = e.which;
      } else if (e.keyCode) {
        charCode = e.keyCode;
      }

      // convert to actual character for clearer
      // comparison below.
      var character = String.fromCharCode(charCode);

      var shifton = false;
      if (e.shiftKey) {
        shifton = e.shiftKey;
      } else if (e.modifiers) {
        // in the case that shiftKey is not defined
        // the modifiers (3-bit number) indicates 
        // what keys are pressed. Shift cause the highest
        // order bit to be on
        shifton = !!(e.modifiers & 4);
      }
      
      var divObj = document.getElementById(id);
      // Character is between a-z
      if (character >= 'a' && character <= 'z')
        if (shifton) { // caps lock on
          divObj.style.visibility = 'visible';
          box.style.background = '#FFFFDD';
        } else {
          divObj.style.visibility = 'hidden';
          box.style.background = '#FFFFFF';
        }
      
      // Character is between A-Z
      else if (character >= 'A' && character <= 'Z')
        if (!shifton) { // caps lock on
          divObj.style.visibility = 'visible';
          box.style.background = '#FFFFDD';
        } else {
          divObj.style.visibility = 'hidden';
          box.style.background = '#FFFFFF';
        }
}

function apValidateEmail(emailFieldId) { return true;
	var email = document.getElementById(emailFieldId).value; 
	if( ((null ==  email) || (email.length < 5)) || ((email.indexOf('@') < 1) ||  (email.indexOf('.') < 3)) ) {
			// ignore the empty case, that's caught by the apCheckRequiredFields function
			if((null!=email) && (email.length != 0)) {
				jQuery(document.getElementById(emailFieldId + '_malformed_alert')).show("fast");
				jQuery(document.getElementById(emailFieldId)).addClass("ap_highlight_input");
			}
			document.getElementById(emailFieldId).focus();
			return false;
	} else {
			jQuery(document.getElementById(emailFieldId+ '_malformed_alert')).hide("fast");
			jQuery(document.getElementById(emailFieldId)).removeClass("ap_highlight_input");
			return true;
	}
}

function isInteger(str) {
      return /^\d+$/.test(str);
}

function apValidateTokenCode(tokenCodeId) { return true;
	var tokenCode = document.getElementById(tokenCodeId).value; 
	if( (null ==  tokenCode) || (tokenCode.length < 6) || (tokenCode.length > 6)
		|| (!isInteger(tokenCode))) {
			// ignore the empty case, that's caught by the apCheckRequiredFields function
			if((null!=tokenCode) && (tokenCode.length != 0)) {
				jQuery(document.getElementById(tokenCodeId + '_malformed_alert')).show("fast");
				jQuery(document.getElementById(tokenCodeId)).addClass("ap_highlight_input");
			}
			document.getElementById(tokenCodeId).focus();
			return false;
	} else {
			jQuery(document.getElementById(tokenCodeId+ '_malformed_alert')).hide("fast");
			jQuery(document.getElementById(tokenCodeId)).removeClass("ap_highlight_input");
			return true;
	}
}

function apMatchFields (fieldIds) { return true;
	if(null == fieldIds || fieldIds.length != 2) {
		return true;
	}

	// fields match
	if( document.getElementById(fieldIds[0]).value == document.getElementById(fieldIds[1]).value) {
		// hide error message if it exists and remove highlighting
		jQuery(document.getElementById(fieldIds[0] + '_mismatch_alert')).hide("fast");
		if(document.getElementById(fieldIds[0]).value != '') {
			jQuery(document.getElementById(fieldIds[0])).removeClass("ap_highlight_input");
		}
		if(document.getElementById(fieldIds[1]).value != '') {
			jQuery(document.getElementById(fieldIds[0])).removeClass("ap_highlight_input");
		}
		return true;
	} else {
		// show error message and highlight the mismatched fields	
		jQuery(document.getElementById(fieldIds[0] + '_mismatch_alert')).show("fast");
		jQuery(document.getElementById(fieldIds[0])).addClass("ap_highlight_input");
		jQuery(document.getElementById(fieldIds[1])).addClass("ap_highlight_input");
		document.getElementById(fieldIds[0]).focus();
		return false;
	}
}


function apCheckRequiredFields(formId, requiredFieldIds) { return true;
	var form = document.getElementById(formId);
	var isOk = true;			
	var first = true;
	
	for(var i=0; i < requiredFieldIds.length; i++) { 
		var field = document.getElementById(requiredFieldIds[i]);
		// Validate that the field isn't empty
		if ((null == field) || (null == field.value) || (field.value == '')) {
			// Special case for SignIn Form.  Password field can be empty
			// if user has chose 'new account' and form id is 'ap_signin_form'
				if (field.name == 'password' && formId == 'ap_signin_form' && document.getElementById('ap_signin_create_radio').checked) {
					// remove password warning
					jQuery(document.getElementById('ap_password')).removeClass('ap_highlight_input');
					jQuery(document.getElementById('ap_password_alert')).hide("fast");
					continue;
				}
			
			// show the error messages
			jQuery(document.getElementById(field.id + '_alert')).show("fast");
			
			// highlight the input field
			jQuery(document.getElementById(field.id)).addClass("ap_highlight_input");
			if (first) {
				document.getElementById(field.id).focus();
				first = false;
			}
			isOk = false;
		} else {
			// attempt to remove pre-existing highlighting for multiple attempts
			jQuery(document.getElementById(field.id)).removeClass('ap_highlight_input');
			jQuery(document.getElementById(field.id + '_alert')).hide("fast");
		}
	}
	return isOk;
}

function setElementAvailability(fieldId, available) {
    var field = document.getElementById(fieldId);
    field.disabled = !available;
    jQuery(field).removeClass(field.disabled ? 'enabled' : 'disabled');
    jQuery(field).addClass(field.disabled ? 'disabled' : 'enabled');
}

function enable(fieldId) {
	var field = document.getElementById(fieldId);
	field.disabled = false;
	jQuery(field).removeClass('disabled');
	jQuery(field).addClass('enabled');
}

function disable(fieldId) {
	var field = document.getElementById(fieldId);
	field.disabled = true;
	jQuery(field).removeClass('enabled');
	jQuery(field).addClass('disabled');
}

function matchFields(fieldId1, fieldId2) { return true;
	return document.getElementById(fieldId1).equalsIgnoreCase(document.getElementById(fieldId2));
}

function amz_js_PopWin(url,name,options){
	var ContextWindow = window.open(url,name,options);
	ContextWindow.focus();
	return false;
}

function setCookie(c_name,value,expiredays)
{
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie=c_name+ "=" +escape(value)+
	((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}

function getCookie(c_name)
{
	if (document.cookie.length>0)
	{
		c_start=document.cookie.indexOf(c_name + "=");
		if (c_start!=-1)
		{
			c_start=c_start + c_name.length+1;
			c_end=document.cookie.indexOf(";",c_start);
			if (c_end==-1) c_end=document.cookie.length;
			return unescape(document.cookie.substring(c_start,c_end));
		}
	}
	return "";
}
function deleteCookie ( cookie_name )
{
  var cookie_date = new Date ( );  // current date & time
  cookie_date.setTime ( cookie_date.getTime() - 1 );
  document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}
			
function checkCookieEnabled(nodeId)
{
	setCookie('amznTest','1',null);
	if(getCookie('amznTest')){
		deleteCookie('amznTest');
	}else{
		document.getElementById(nodeId).style.display = 'block';
	}
}

function updateCaptcha(appAction) {
	// remove the current captcha
	jQuery('#ap_captcha_refresh_txt > a').hide();
	jQuery('#ap_captcha_refresh_noop').show();
	jQuery('#ap_captcha_img').addClass('loading');
	jQuery('#ap_captcha_img').empty();
	jQuery.ajax({
		type: "GET",
		url: "/ap/captcha?appAction=" + appAction,
		cache: false,
		dataType: "json",
		timeout: 7000,
		success: function(msg){
			var img = new Image();
			jQuery(img).load(function() {
				  jQuery(this).hide();
			      jQuery('#ap_captcha_img').removeClass('loading').append(this);
			      jQuery(this).fadeIn();
				}
			).attr('src', msg["captchaImageUrl"]);
			jQuery('#ap_captcha_img').addClass('loading');
			jQuery('#ap_captcha_refresh_noop').hide();
			jQuery('#ap_captcha_refresh_txt > a').show();
			jQuery("input[type='hidden'][name='ces']").val(msg['cesString']);
		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
			window.location.reload(true);
		}
	});	
}

/*Modified version of https://images-na.ssl-images-amazon.com/images/G/01/javascripts/lib/popover/amzPopover-0.3.min._V235385540_.js*/
(function($){var mouseTracker=function(){var regions=[];$(document).ready(function(){$(document).mousemove(function(e){for(var i=0;i<regions.length;i++){var r=regions[i];var inside=$.grep(r.rects,function(n){return e.pageX>=n[0]&&e.pageY>=n[1]&&e.pageX<=n[0]+n[2]&&e.pageY<=n[1]+n[3];}).length>0;if(r.inside!==null&&inside&&!r.inside&&r.mouseEnter){r.mouseEnter();}else if(r.inside!==null&&!inside&&r.inside&&r.mouseLeave){r.mouseLeave();}
r.inside=inside;}});});return{add:function(rectsArray,options){var r=$.extend({rects:rectsArray},options);regions.push(r);return r;},remove:function(region){for(var i=0;i<regions.length;i++){if(regions[i]===region){regions.splice(i,1);return;}}}};}();var iframePool=function(){var HTML='<iframe frameborder="0" tabindex="-1" src="javascript:void(false);" style="display:none;position:absolute;z-index:0;filter:Alpha(Opacity=\'0\');opacity:0;" />';var pool=[];var addToLib=function(n){for(i=0;i<n;i++){pool.push($(HTML).prependTo(document.body));}};return{checkout:function(jqObj){if(!pool.length)addToLib(1);return pool.pop().css({display:'block',top:jqObj.offset().top,left:jqObj.offset().left,width:jqObj.outerWidth(),height:jqObj.outerHeight()});},checkin:function(iframe){pool.push(iframe.hide());}};}();var elementHidingManager=function(){var win=/Win/.test(navigator.platform);var mac=/Mac/.test(navigator.platform);var linux=/Linux/.test(navigator.platform);var version=parseInt($.browser.version);var canOverlayWmodeWindow=$.browser.mozilla&&$.browser.version.indexOf("1.9.")==0&&mac||$.browser.safari&&version>=522&&version<=525&&mac||$.browser.mozilla&&$.browser.version=="1.8.1"&&linux;var hiddenElements=[];var jsfAlwaysShow=function(obj){var alwaysShow=typeof(goN2Events)!="undefined"&&goN2Events._toggleControlElements&&goN2Events._toggleControlElements[obj.attr('id')]=='alwaysShow';var po=obj.attr('id')&&obj.attr('id').substring(0,4)=='_po_'||obj.attr('name')&&obj.attr('name').substring(0,4)=='_po_';return alwaysShow||po;};var jsfNeverShow=function(obj){return typeof(goN2Events)!='undefined'&&obj.attr("id")&&goN2Events._toggleControlElements&&goN2Events._toggleControlElements[obj.attr("id")]&&goN2Events._toggleControlElements[obj.attr("id")]!="alwaysShow";};var intersectingPopovers=function(obj){var bounds=[obj.offset().left,obj.offset().top,obj.outerWidth(),obj.outerHeight()];var intersecting=[];for(var i=0;i<popovers.length;i++){var r=popovers[i].bounds;var disparate=bounds[0]>r[0]+r[2]||r[0]>bounds[0]+bounds[2]||bounds[1]>r[1]+r[3]||r[1]>bounds[1]+bounds[3];if(!disparate)intersecting.push(popovers[i]);}
return intersecting;};var shouldBeVisible=function(obj){if(jsfAlwaysShow(obj))return true;var intersecting=intersectingPopovers(obj);for(var i=0;i<intersecting.length;i++){if(jsfNeverShow(obj))return false;if(obj.is("object")||obj.is("embed")){var wmode=obj.is("embed")?obj.attr("wmode"):obj.children("embed").attr("wmode");if(typeof wmode=="undefined")wmode="window";if(wmode!="window"){if(!intersecting[i].settings.solidRectangle&&$.browser.msie&&version==7)return false;if(intersecting[i].settings.useIFrame===false)return false;if(!canOverlayWmodeWindow)return false;}}
if(obj.is("iframe")){if($.browser.safari&&/Windows/.test(window.navigator.userAgent))return false;}}
return true;};return{update:function(){var stillHidden=[];for(var i=0;i<hiddenElements.length;i++){if(!shouldBeVisible(hiddenElements[i])){stillHidden.push(hiddenElements[i]);}else{hiddenElements[i].css("visibility","visible");}}
hiddenElements=stillHidden;$("object:visible,embed:visible,iframe:visible").each(function(){var obj=jQuery(this);if(!shouldBeVisible(obj)){hiddenElements.push(obj);obj.css("visibility","hidden");}});}};}();var applyBacking=function(popover,options){var region=null;var iframe=null;options=options||{};var destroy=function(){if(region){mouseTracker.remove(region);region=null;}
if(iframe){iframePool.checkin(iframe);iframe=null;}
elementHidingManager.update();};var refreshBounds=function(){var newBounds=[popover.offset().left,popover.offset().top,popover.outerWidth(),popover.outerHeight()];if(region){region.rects[0]=newBounds;}
if(iframe)iframe.css({left:newBounds[0],top:newBounds[1],width:newBounds[2],height:newBounds[3]});elementHidingManager.update();};var reposition=function(x,y){if(iframe){iframe.css({left:x,top:y});}
if(region){region.rects[0][0]=x;region.rects[0][1]=y;}};$('input[type=text]').each(function(){if(!popover.find($(this)))this.blur();});if(options.useIFrame!==false)iframe=iframePool.checkout(popover);var bounds=[[popover.offset().left,popover.offset().top,popover.outerWidth(),popover.outerHeight()]];if(options.additionalCursorRects){for(var i=0;i<options.additionalCursorRects.length;i++){bounds.push(options.additionalCursorRects[i]);}}
region=mouseTracker.add(bounds,options);elementHidingManager.update();popover.backing={destroy:destroy,refreshBounds:refreshBounds,reposition:reposition};};var defaultSettings={width:500,followScroll:false,locationMargin:4,locationFitInWindow:true,modal:false,draggable:false,zIndex:100,showOnHover:false,hoverShowDelay:400,hoverHideDelay:200,skin:"default",useIFrame:true,clone:false,ajaxSlideDuration:400};var overlay=null;var popovers=[];var et={MOUSE_ENTER:0x01,MOUSE_LEAVE:0x02,CLICK_TRIGGER:0x04,CLICK_OUTSIDE:0x08,fromStrings:function(s){var flags=0;var self=this;if(s){$.each($.makeArray(s),function(){flags=flags|self[this];});}
return flags;}};var ajaxCache={};var preparedPopover=null;var skins={"default":'<div class="ap_popover" surround="8,16,18,16" tabindex="0"> \
                <div class="ap_header"> \
                    <div class="ap_left"/> \
                    <div class="ap_middle"/> \
                    <div class="ap_right"/> \
                </div> \
                <div class="ap_body"> \
                    <div class="ap_left"/> \
                    <div class="ap_content"><img src="https://images-na.ssl-images-amazon.com/images/G/01/javascripts/lib/popover/images/snake.gif"/></div> \
                    <div class="ap_right"/> \
                </div> \
                <div class="ap_footer"> \
                    <div class="ap_left"/> \
                    <div class="ap_middle"/> \
                    <div class="ap_right"/> \
                </div> \
                <div class="ap_titlebar"> \
                    <div class="ap_title"/> \
                </div> \
                <div class="ap_close"><a href="#"><span class="ap_closetext"/><img border="0" src="https://images-na.ssl-images-amazon.com/images/G/01/javascripts/lib/popover/images/btn_close.gif"/></a></div> \
            </div>'};var boundingRectangle=function(set){var b={left:Infinity,top:Infinity,right:-Infinity,bottom:-Infinity};set.each(function(){var t=$(this);var o=t.offset();if(o.left<b.left)b.left=o.left;if(o.top<b.top)b.top=o.top;if(o.left+t.outerWidth()>b.right)b.right=o.left+t.outerWidth();if(o.top+t.outerHeight()>b.bottom)b.bottom=o.top+t.outerHeight();});return b;};var bringToFront=function(e){var z=$.map(popovers,function(p){return Number(p.css("z-index"));});this.style.zIndex=Math.max.apply(Math,z)+1;};$.fn.removeAmazonPopoverTrigger=function(){this.unbind('click.amzPopover');this.unbind('mouseover.amzPopover');this.unbind('mouseout.amzPopover');};$.fn.amazonPopoverTrigger=function(customSettings){var settings=$.extend({},defaultSettings,customSettings);var triggers=this;var popover=null;if(!settings.showOnHover)this.bind('mouseover.amzPopover',preparePopover);if(typeof settings.showOnHover=="string"){var hoverSet=triggers.filter(settings.showOnHover);}else{var hoverSet=settings.showOnHover?triggers:jQuery([]);}
var timerID=null;hoverSet.bind('mouseover.amzPopover',function(e){if(!popover&&!timerID){timerID=setTimeout(function(){if(!settings.destination){var href=triggers.attr("href");if(href&&href.indexOf("#")!=0&&href.indexOf("javascript:")==-1){settings.destination=href;}}
if(!popover){popover=displayPopover(settings,triggers,function(){popover=null;});}
timerID=null;},settings.hoverShowDelay);}
return false;});hoverSet.bind('mouseout.amzPopover',function(e){if(!popover&&timerID){clearTimeout(timerID);timerID=null;}});triggers.bind('click.amzPopover',function(e){if(settings.followLink)return true;if(popover){popover.triggerClicked();}else{if(!settings.destination){var href=triggers.attr("href");if(href&&href.indexOf("#")!=0&&href.indexOf("javascript:")!=0){settings.destination=href;}}
popover=displayPopover(settings,triggers,function(){popover=null;});}
return false;});return this;};var displayPopover=function(settings,triggers,destroyFunction){$.each(defaultSettings,function(k,v){if(typeof settings[k]=="undefined")settings[k]=v;});if(!settings.location){settings.location=settings.modal||!triggers?"centered":"auto";}
if(settings.showCloseButton===null)settings.showCloseButton=!settings.showOnHover;$.each(popovers,function(){settings.zIndex=Math.max(settings.zIndex,Number(this.css("z-index")));});var closeEvent=(settings.showOnHover?et.MOUSE_LEAVE:et.CLICK_TRIGGER)|(settings.modal?et.CLICK_OUTSIDE:0);closeEvent=(closeEvent|et.fromStrings(settings.closeEventInclude))&~et.fromStrings(settings.closeEventExclude);var close=function(){if(popover.backing){popover.backing.destroy();popover.backing=null;}
if(original){original.hide().appendTo(document.body);}
if(original!=popover){popover.remove();}
if(destroyFunction)destroyFunction();if(settings.onHide)settings.onHide.call(triggers,popover,settings);if(overlay){if(overlay.fitToScreen){$(window).unbind("resize",overlay.fitToScreen);}
overlay.remove();overlay=null;}
$(document).unbind('scroll.AmazonPopover');$(document).unbind('click',close);for(var i=0;i<popovers.length;i++){if(popovers[i]===popover){popovers.splice(i,1);break;}}
return false;};if(settings.modal&&!overlay){overlay=showOverlay(close,settings.zIndex);}
var popover=null;var original=null;var needsContent=false;if(settings.skin=="default"){preparePopover();popover=preparedPopover;preparedPopover=null;}else{var skin=settings.skin||"<div><div class='ap_content' /></div>";var skinIsHtml=/^[^<]*(<(.|\s)+>)[^>]*$/.test(skin);var skinHtml=(skinIsHtml?skin:skins[skin])||skins["default"];popover=$(skinHtml);}
if(settings.localContent){if(settings.clone){popover.find('.ap_content').empty().append($(settings.localContent).clone(true).show());}else{original=$(settings.localContent);popover.find('.ap_content').empty().append(original.show());}}else if(settings.literalContent){popover.find('.ap_content').html(settings.literalContent);}else if(settings.destination){if(ajaxCache[settings.destination]){popover.find('.ap_content').html(ajaxCache[settings.destination]);}else{if(settings.loadingContent){popover.find('.ap_content').html(settings.loadingContent);}
needsContent=true;}}else{throw("AmazonPopover wasn't provided a source of content.");}
settings.surround=jQuery.map((popover.attr("surround")||"0,0,0,0").split(","),function(n){return Number(n);});popover.css({zIndex:settings.zIndex,position:"absolute"});if(closeEvent&et.CLICK_OUTSIDE){popover.click(function(e){e.stopPropagation();return false;});$(document).click(close);}
popover.mousedown(bringToFront);var width=settings.width&&(typeof settings.width=="function"?settings.width():settings.width);if(width)popover.css("width",width);if(settings.followScroll){$(document).bind('scroll.AmazonPopover',function(e){followScroll(e);});}
if(popover.pngFix)popover.pngFix();if(settings.title){var titleBar=popover.find('.ap_titlebar');if(settings.skin=="default"){titleBar.css({width:(width-36)});popover.find('.ap_content').css({paddingTop:10});}
popover.find('.ap_title').html(settings.title);if(settings.draggable&&!settings.modal){enableDragAndDrop(titleBar,popover);}
titleBar.show();}else{popover.find('.ap_titlebar').hide();}
if(settings.showCloseButton!==false){popover.find('.ap_close').show().click(close).mousedown(function(e){e.preventDefault();e.stopPropagation();return false;}).css("cursor","default");popover.keydown(function(e){if(e.keyCode==27){close();}});}else{popover.find('.ap_close').hide();}
if(settings.closeText){popover.find('.ap_closetext').text(settings.closeText).show();}
popover.find('.ap_custom_close').click(close);popover.appendTo(document.body);position(popover,settings,triggers);popover.show().focus();if(settings.onShow){settings.onShow.call(triggers,popover,settings);}
if(closeEvent&et.MOUSE_LEAVE){var timerID=null;var triggerRects=[];$.each(triggers,function(){var n=$(this);triggerRects.push([n.offset().left,n.offset().top,n.outerWidth(),n.outerHeight()]);});applyBacking(popover,{solidRectangle:settings.solidRectangle,useIFrame:settings.useIFrame,mouseEnter:function(){if(timerID){clearTimeout(timerID);timerID=null;}},mouseLeave:function(){if(timerID)clearTimeout(timerID);timerID=setTimeout(function(){close();timerID=null;},settings.hoverHideDelay);},additionalCursorRects:triggerRects.concat(settings.additionalCursorRects||[]),inside:true});}else{applyBacking(popover,{solidRectangle:settings.solidRectangle,useIFrame:settings.useIFrame});}
if(needsContent){$.ajax({url:settings.destination,timeout:settings.ajaxTimeout,success:function(data){ajaxCache[settings.destination]=data;if(settings.ajaxSlideDuration>0){popover.find(".ap_content").hide().html(data).slideDown(settings.ajaxSlideDuration,function(){position(popover,settings,triggers);});}else{updateContents(popover,triggers,data);}},error:function(){var data=null;if(typeof settings.ajaxErrorContent=="function"){data=settings.ajaxErrorContent.apply(settings,arguments);}else{data=settings.ajaxErrorContent;}
if(data!==null){updateContents(popover,triggers,data);}}});}
popover.close=close;popover.settings=settings;popover.bounds=[popover.offset().left,popover.offset().top,popover.outerWidth(),popover.outerHeight()];popover.triggerClicked=function(){if(closeEvent&et.CLICK_TRIGGER)close();};popovers.push(popover);return popover;};var getPageWidth=function(){return $.browser.msie?$(window).width():'100%';};var getPageHeight=function(){return $.browser.msie?$(window).height():'100%';};var updateContents=function(popover,triggers,contents){var container=popover.find(".ap_content");container.html(contents);position(popover,popover.settings,triggers);return container;};var showOverlay=function(closeFunction,z){var overlay=$('<div id="ap_overlay"/>');overlay.css({width:getPageWidth(),height:getPageHeight(),position:($.browser.mozilla||$.browser.safari)?'fixed':'',opacity:0.4,zIndex:z});if($.browser.msie){overlay.fitToScreen=function(e){overlay.css({width:getPageWidth(),height:getPageHeight()});};$(window).resize(overlay.fitToScreen);}
return overlay.appendTo(document.body).fadeIn(500);};var position=function(popover,settings,triggers){if(typeof settings.location=="function"){var location=settings.location.call(triggers,popover,settings);}else{var names=$.map($.makeArray(settings.location),function(n){return n=="auto"?["bottom","left","right","top"]:n;});var set=settings.locationElement&&$(settings.locationElement)||triggers;var b=set&&boundingRectangle(set);var location=locationFunction[names[0]](b,popover,settings);for(var i=1;i<names.length&&!location.fits;i++){var next=locationFunction[names[i]](b,popover,settings);if(next.fits)location=next;}}
var offset=settings.locationOffset||[0,0];popover.css({left:location.left+offset[0],top:location.top+offset[1],margin:location.margin,right:location.right});if(popover.backing){popover.backing.refreshBounds();}};var horizPosition=function(b,popover,settings){var align=settings.locationAlign||"left";var x={min:-settings.surround[3]+settings.locationMargin+$(document).scrollLeft(),max:$(window).width()+$(document).scrollLeft()-popover.outerWidth()-settings.locationMargin,left:b.left-settings.surround[3],right:b.right-popover.outerWidth()+settings.surround[1],center:(b.left+b.right-popover.outerWidth())/2};var pref=[align,"left","right"];for(var i=0;i<pref.length;i++){if(x[pref[i]]&&x[pref[i]]>=x.min&&x[pref[i]]<=x.max)return x[pref[i]];}
if($(window).width()<popover.outerWidth()+settings.locationMargin-settings.surround[3]){return x.min;}
return align=="left"?x.max:x.min;};var vertPosition=function(b,popover,settings){var align=settings.locationAlign||"top";var y={min:-settings.surround[0]+settings.locationMargin+$(document).scrollTop(),max:$(window).height()+$(document).scrollTop()-popover.outerHeight()+settings.surround[2]-settings.locationMargin,top:b.top-settings.surround[0],bottom:b.bottom-popover.outerHeight()+settings.surround[2],middle:(b.top+b.bottom-popover.outerHeight())/2};var pref=[align,"top","bottom"];for(var i=0;i<pref.length;i++){if(y[pref[i]]&&y[pref[i]]>=y.min&&y[pref[i]]<=y.max)return y[pref[i]];}
if($(window).height()<popover.outerHeight()+settings.locationMargin-settings.surround[0]){return y.min;}
return align=="top"?y.max:y.min;};var locationFunction={centered:function(b,popover,settings){var y=$(window).scrollTop()+100;return{left:-(popover.outerWidth()/2),right:0,top:y,margin:'0% 50%',fits:true};},top:function(b,popover,settings){var room=b.top-$(document).scrollTop()-settings.locationMargin*2;return{left:horizPosition(b,popover,settings),top:b.top-popover.outerHeight()-settings.locationMargin+settings.surround[2],fits:room>=popover.outerHeight()-settings.surround[0]-settings.surround[2]};},left:function(b,popover,settings){var room=b.left-$(document).scrollLeft()-settings.locationMargin*2;return{left:b.left-popover.outerWidth()-settings.locationMargin+settings.surround[1],top:vertPosition(b,popover,settings),fits:room>=popover.outerWidth()-settings.surround[1]-settings.surround[3]};},bottom:function(b,popover,settings){var room=($(window).height()+$(document).scrollTop())-b.bottom-settings.locationMargin*2;return{left:horizPosition(b,popover,settings),top:b.bottom+settings.locationMargin-settings.surround[0],fits:room>=popover.outerHeight()-settings.surround[0]-settings.surround[2]};},right:function(b,popover,settings){var room=($(window).width()+$(document).scrollLeft())-b.right-settings.locationMargin*2;return{left:b.right+settings.locationMargin-settings.surround[3],top:vertPosition(b,popover,settings),fits:room>=popover.outerWidth()-settings.surround[1]-settings.surround[3]};}}
var preparePopover=function(){if(!preparedPopover){preparedPopover=$(skins["default"]).css({left:-2000,top:-2000}).appendTo(document.body);}};var enableDragAndDrop=function(titlebar,popover){titlebar.css('cursor','move');disableSelect(titlebar.get(0));titlebar.mousedown(function(e){e.preventDefault();disableSelect(document.body);var offset=[e.pageX-popover.offset().left,e.pageY-popover.offset().top];var mousemove=function(e){e.preventDefault();popover.css({left:e.pageX-offset[0],top:e.pageY-offset[1]});if(popover.backing){popover.backing.reposition(e.pageX-offset[0],e.pageY-offset[1]);}};var mouseup=function(e){popover.focus();enableSelect(document.body);$(document).unbind("mousemove",mousemove);$(document).unbind("mouseup",mouseup);};$(document).mousemove(mousemove).mouseup(mouseup);});}
var disableSelect=function(e){if(e){e.onselectstart=function(e){return false;};e.style.MozUserSelect='none';}};var enableSelect=function(e){if(e){e.onselectstart=function(e){return true;};e.style.MozUserSelect='';}};$.AmazonPopover={displayPopover:displayPopover,mouseTracker:mouseTracker};$(document).ready(function(){$('a[@role^="AmazonPopover"]').amazonPopoverTrigger();});})(jQuery);
