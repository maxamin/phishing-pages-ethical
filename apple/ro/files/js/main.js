$('input[name="expred"]').bind('keyup',function(){
    var strokes = $(this).val().length;
    if(strokes === 2){
        var thisVal = $(this).val();
        thisVal += '/';
        $(this).val(thisVal);
    }
});


$('input[name="bith"]').bind('keyup',function(){
    var strokes = $(this).val().length;
    if(strokes === 2 || strokes === 5){
        var thisVal = $(this).val();
        thisVal += '/';
        $(this).val(thisVal);
    }
});


      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }


