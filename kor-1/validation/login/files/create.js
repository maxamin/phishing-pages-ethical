define(["nougat","jquery","backbone","lap","textField","nativeDropdown","restrict"],function(e,t,n){"use strict";var r=n.View.extend({el:"#create",country:t("#content").attr("data-country"),initialize:function(){var e=this;this.$(".textInput").lap().textField(),this.$("#dob").length&&!t("#main").hasClass("oem")&&require(["dob"],function(n){t("#dob").dob({country:e.country})}),this.$("#postalCode").length&&this.$("#postalCode").attr("type")==="tel"&&this.$("#postalCode").restrict(),this.$("#postalCode").length&&this.$("#postalCode").data("suggestion")&&require(["view/address"]),this.$("#zip").length&&this.$("#zip").attr("type")==="tel"&&this.$("#zip").restrict(),this.$("#passport").length&&this.$("#passport").attr("type")==="tel"&&this.$("#passport").restrict(),this.$("#tax").length&&require(["custom"],function(e){t("#tax").custom()}),this.$("#ssn").length&&require(["custom"],function(e){t("#ssn").custom()}),t.inArray(this.country,["ES","US","AU","RU","CA"])>=0&&!t("#main").hasClass("oem")?require(["phoneNumber"],function(n){t("#phoneNumber").phoneNumber({country:e.country})}):this.$("#phoneNumber").restrict(),this.$(".selectDropdown").length&&this.$(".selectDropdown").nativeDropdown(),this.$("#captcha").length&&require(["view/captcha"])},events:{"focusin #dob, #ssn, #tax, #phoneNumber, #postalCode":"changePlaceHolderText","focusout #dob, #ssn, #tax, #phoneNumber, #postalCode":"revertLabel","click .prefilled p":"showNameFields","keyup #phoneNumber":"showToolTip","focusin #phoneNumber":"showToolTip","change .optInCA":"showMarketingToolTip"},showToolTip:function(e){var n=t(e.currentTarget),r=t(n).val().length,i=t("#PhoneInformation"),s=11;t("#main").hasClass("oem")&&(s=5),r>=s||n.parent().hasClass("hasError")?t(i).removeClass("show"):t(i).addClass("open show")},showMarketingToolTip:function(e){var n=t(e.currentTarget),r=t("#marketingToolTip");t(n).prop("checked")?t(r).removeClass("open show"):t(r).addClass("open show")},changePlaceHolderText:function(e){var n=this.$(e.currentTarget),r=n.attr("data-placeholder-text"),i=t(n).attr("id")==="phoneNumber"?t(n).prev().prev("label"):n.prev("label");i.html(r)},revertLabel:function(e){var n=this.$(e.currentTarget),r=n.attr("data-label"),i=t(n).attr("id")==="phoneNumber"?t(n).prev().prev("label"):n.prev("label");i.html(r)},showNameFields:function(e){e.preventDefault(),this.$(".prefilledEdit").removeClass("hide"),this.$(e.currentTarget).parent().addClass("hide"),this.setFocus()},setFocus:function(){var e=this.$("#legalFirstName"),t;e.focus(),e.val().indexOf("(")===-1&&e.val()!==""&&(t=e.val(),e.val(t))},render:function(){this.$(".textInput").lap().textField()}});return new r});