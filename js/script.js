$("#mobile").bind("keypress", function (e) {
    var keyCode = e.which ? e.which : e.keyCode
    if (!(keyCode >= 48 && keyCode <= 57)) {
        return false;
    }
});


$("#mobile").bind("keyup", function (e) {

    mobile_no = $("#mobile").val();

    var fchar = $("#mobile").val().substr(0, 1);
    var schar = $("#mobile").val().substr(1, 1);

    console.log(schar);

    if (fchar == 0) {
        var num = $('#mobile').val().substr(1, 10);
        $('#mobile').attr('maxlength', '11');
        $('#mobile').attr('minlength', '11');
        
        if (schar == 0) {
            $("#mobile").val(0);
            if (fchar == "") {
                $("#mobile").val("");
            }
        }
    }
    else {
        $('#mobile').attr('maxlength', '10');
        $('#mobile').attr('minlength', '10');
    }

});

function Validate() {
    if ($('#password').val() != $('#password2').val()) {
        return false;
    }
    else {
        return true;
    }

}
