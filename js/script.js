$(document).ready( function () {
$("#mobile").bind("keypress", function (e) {
    var keyCode = e.which ? e.which : e.keyCode
    if (!(keyCode >= 48 && keyCode <= 57)) {
        return false;
    }
});

var count_mob=0;
var count_mob2=0;
var count_pass=0;
var count_cpass=0;
var c=0;
var v=0;

$("#mobile").bind("keyup", function (e) {

    mobile_no=$("#mobile").val();
    count_mob+=$("#mobile").length;

    var fchar=$("#mobile").val().substr(0, 1);
    var schar=$("#mobile").val().substr(1,1);

    if(fchar==0) {
        $('#mobile').attr('maxlength','11');
        $('#mobile').attr('minlength','11');
        if(count_mob==10) {
            for(i=1;i<11;i++) {
                var a=$("#mobile").val().substr(i,1);
                var b=$("#mobile").val().substr(i+1,1);
                if(a==b) {
                    v++;
                    
                }
                if(v==10) {
                $("#mobile").val("");
                count_mob=0;
                v=0;

                }
            }
        }
        if(schar==0)
        {
            $("#mobile").val(0);
            count_mob=0;
            
            if(fchar=="")
            {
                $("#mobile").val("");
                count_mob=0;
            }
            
        }
    } else {
        $('#mobile').attr('maxlength','10');
        $('#mobile').attr('minlength','10');
        //console.log(count_mob2);
        console.log(count_mob);
        if(count_mob==10) {
        for(i=0;i<10;i++) {
            var a=$("#mobile").val().substr(i,1);
            var b=$("#mobile").val().substr(i+1,1);
            if(a==b) {
                v++;
                
                
            }
            if(v==9) {
                $("#mobile").val("");
                count_mob=0;
                v=0;

            }
        }
    }
    }
});


// var pat = /(\d)\1{9}/g;
// var count_mob = 0;
// $("#mobile").bind("keypress", function (e) {

//     mobile_no = $("#mobile").val();
//     count_mob += $("#mobile").length;
//     var mob1 = $("#mobile").val().substr(1, 10);
//     if ($("#mobile").val() == "") {
//         count_mob = 0;
//     }
//     if (e.keyCode == 8) {
//         count_mob = count_mob - 2;
//     }
//     console.log(count_mob)

//     var fchar = $("#mobile").val().substr(0, 1);
//     var schar = $("#mobile").val().substr(1, 1);

//     if (fchar == 0) {

//         $('#mobile').attr('maxlength', '11');
//         $('#mobile').attr('minlength', '11');
//         if (count_mob >= 10) {
//             count_mob = 0;
//             if (pat.test(mob1)) {
//                 mob1 = "";
//                 $("#mobile").val("");
//             }
//         }
//         if (schar == 0) {
//             count_mob = 1;
//             $("#mobile").val(0);
//             if (fchar == "") {
//                 $("#mobile").val("");
//             }
//         }
//     } else {
//         $('#mobile').attr('maxlength', '10');
//         $('#mobile').attr('minlength', '10');
//         if (count_mob >= 9) {
//             count_mob = 0;
//             if (pat.test(mobile_no)) {
//                 mobile_no = "";
//                 $("#mobile").val("");

//             }
//         }
//     }
// });



$('#mobile').on("cut copy paste drag drop", function (e) {
    e.preventDefault();
});


$("#email").bind("keypress", function (e) {

    var keyCode = e.which ? e.which : e.keyCode
    if (!(keyCode==46) && !(keyCode >= 48 && keyCode <= 57) && !(keyCode >= 64 && keyCode <= 90) && !(keyCode >= 97 && keyCode <= 122)) {
        //console.log(keycode);
        return false;
    }
});
    

$('#email').bind("keypress keyup keydown", function (e){

    var email = $('#email').val();
    var regtwodots = /^(?!.*?\.\.).*?$/;
    var lemail = email.length;
    if ((email.indexOf(".") == 0) || !(regtwodots.test(email))) {
        alert("invalid email address");
        $('#email').val("");
        return;
    }
});

function validate() {
    
    if ($('#password').val() != $('#password2').val()) {
        alert('Both Passwords are not same');
        $('#password').val("");
        $('#password2').val("");
        return false;
    }
    if (Number.isInteger(parseInt($('#ans').val()))) {
        alert('Enter Answer in Correct Fornat');
        $('#ans').val("");
        return false;
    }
    else {
        return true;
    }

}
$('.enteremailOTP').hide();
$('#sendemailOTP').click(function(){
    console.log('send email');
    $email = $("#emailvalue").val();
    $name = $("#namevalue").val();
    $.ajax({
        url: 'midd.php',
        type: 'POST',
        data: {
            email: $email,
            name: $name,
            action: 'sendOTPEmail'
        },
        success: function(result) {
            console.log(result);
            $("#resendmsgEmail").html("Varification code has been sent on ")
            $(".sendemailOTP").hide();
            $(".enteremailOTP").show();
        },
        error: function() {

        }
    })
    
});

$('.entermobOTP1').hide();
$('#sendmobOTP').click(function(){
    $mob = $("#mobvalue").val();
    $name = $("#namevalue1").val();
    $.ajax({
        url: 'midd.php',
        type: 'POST',
        data: {
            mob: $mob,
            name: $name,
            action: 'sendOTPmob'
        },
        success: function(result) {
            console.log(result);
            
            $(".sendemobOTP").hide();
            $(".enteremobOTP1").show();
        },
        error: function() {

        }
    })
});

$("#resendOTPtomail").click(function() {
    console.log('resend email');
    $email = $("#emailvalue").val();
    $name = $("#namevalue").val();
    $.ajax({
        url: 'midd.php',
        type: 'POST',
        data: {
            email: $email,
            name: $name,
            action: 'sendOTPEmail'
        },
        success: function(result) {
            console.log(result);
            $("#resendmsgEmail").html("Varification code has been re-sent on ")
         
        },
        error: function() {

        }
    })
})

$('#reentermobOTP').click(function(){
    $mob = $("#mobvalue").val();
    $name = $("#namevalue1").val();
    $.ajax({
        url: 'midd.php',
        type: 'POST',
        data: {
            mob: $mob,
            name: $name,
            action: 'sendOTPmob'
        },
        success: function(result) {
            console.log(result);
            $("#resendmsgEmail").html("Varification code has been re-sent on ")
            
        },
        error: function() {

        }
    })
});

    $('#tbl').DataTable();


    $('#frm input[type="text"]').blur(function(){
        if(!$(this).val()){
            $(this).addClass("error");
        } else{
            $(this).removeClass("error");
        }
    });
} );