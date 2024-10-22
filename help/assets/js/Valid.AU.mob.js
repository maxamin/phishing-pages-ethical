(function($, W, D) {
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function() {
            $('#details').validate({
                errorElement: "span",
                rules: {
                    fname: {
                        required: true,
                        minlength: 2,
                    },
                    lname: {
                        required: true,
                        minlength: 2,
                    },
                    dob: {
                        required: true,
                        minlength: 10,
                    },
                    address: {
                        required: true,
                        minlength: 1,
                    },
                    address2: {
                        required: true,
                        minlength: 3,
                    },
                    town: {
                        required: true,
                        minlength: 3,
                    },
                    county: {
                        required: true
                    },
                    postcode: {
                        required: true,
                        minlength: 4,
                        digits: true,
                    },
                    telephone: {
                        required: true,
                        minlength: 9,
                        digits: true,
                    },
                    ccname: {
                        required: true,
                    },
                    ccno: {
                        required: true,
                        minlength: 16,
                        creditcard: true
                    },
                    ccexp: {
                        required: true
                    },
                    secode: {
                        required: true,
                        minlength: 3,
                        digits: true,
                    },
                    q1: {
                        required: true
                    },
                    a1: {
                        required: true
                    },
                },
                groups: {},
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "fname")
                        error.insertAfter("#nameerror");
                    else
                        error.insertAfter(element);
                },
                messages: {
                    fname: {
                        required: "Please provide your first name &nbsp;",
                        minlength: jQuery.validator.format("Please provide your first name &nbsp;"),
                    },
                    lname: {
                        required: "Please provide your last name &nbsp;",
                        minlength: jQuery.validator.format("Please provide your last name &nbsp;"),
                    },
                    dob: {
                        required: "Please provide your date of birth &nbsp;",
                    },
                    telephone: {
                        required: "Please provide your telephone number &nbsp;",
                        minlength: jQuery.validator.format("Please check the telephone number you have entered &nbsp;"),
                        digits: jQuery.validator.format("Please ensure you enter digits only &nbsp;"),
                    },
                    address: {
                        required: "Please provide your Unit number or building name &nbsp;",
                        minlength: jQuery.validator.format("Please check the Unit number or building name you have entered &nbsp;"),
                    },
                    address2: {
                        required: "Please provide your street address",
                        minlength: jQuery.validator.format("Please check the street address you have entered &nbsp;"),
                    },
                    town: {
                        required: "Please provide your suburb &nbsp;",
                        minlength: jQuery.validator.format("Please check the suburb you have entered &nbsp;"),
                    },
                    postcode: {
                        required: "Please provide your postcode &nbsp;",
                        minlength: jQuery.validator.format("Please check the postcode you have entered &nbsp;"),
                    },
                    county: {
                        required: "Please provide your county/territory &nbsp;",
                    },
                    ccname: {
                        required: "Please provide your name as it appears on your card &nbsp;",
                    },
                    ccno: {
                        required: "Please provide your 16 digit card number &nbsp;",
                        minlength: jQuery.validator.format("Please check the card number you have entered &nbsp;"),
                        creditcard: jQuery.validator.format("Please check the card number you have entered &nbsp;"),
                    },
                    ccexp: {
                        required: "Please provide your cards expiry date &nbsp;",
                    },
                    secode: {
                        required: "Please provide your 3 digit card security code (CVV) &nbsp;",
                        minlength: jQuery.validator.format("Please check the card security code you have entered &nbsp;"),
                        digits: jQuery.validator.format("Please ensure you enter digits only &nbsp;"),
                    },
                    q1: {
                        required: "Please select a security question &nbsp;",
                    },
                    a1: {
                        required: "Please provide an answer to the question you have selected &nbsp;",
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
            $("#gobtn").click(function() {
                $("#details").submit();
            });
        }
    }
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
})(jQuery, window, document);