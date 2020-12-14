$(document).ready(function() {
    $('.ctable').DataTable();


    $("#pcat").focusout(function() {
        $categoryid = $("#pcat").val();
        if ($categoryid == "" || $categoryid == null) {
            $("#prCat").html("*Select Category");
            $("#prCat").show();
            $(this).css('border', 'solid 3px red');
        } else {
            $("#prCat").hide();
            $(this).css('border', 'solid 3px green');
        }
    })

$("#pname").focusout(function() {
    $pname = $("#pname").val();
    var ans1 = $pname.replace(/ /g, '');
    var ans2 = Number(ans1);
    if ($pname == "" || $pname == null) {
        $("#prna").html("*Enter Product Name");
        $("#prna").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$pname.match(/^[a-zA-Z0-9]+( [a-zA-Z0-9]+)*$/)) {
        $("#prna").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
        $("#prna").show();
        $(this).css('border', 'solid 3px red');
    } else if (Number.isInteger(ans2)) {
        $("#prna").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
        $("#prna").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#prna").hide();
        $(this).css('border', 'solid 3px green');
    }
})

//  $("#url").focusout(function() {
//     $url = $("#url").val();
//     if ($url == "" || $url == null) {
//         $("#urlid").html("*Enter Product Name");
//         $("#urlid").show();
//         $(this).css('border', 'solid 3px red');
//     } else {
//         $("#urlid").hide();
//         $(this).css('border', 'solid 3px green');
//     }
// })

$("#mpriceid").focusout(function() {
    $mprice = $("#mpriceid").val();
    $first = $mprice.substr(0, 1);
    $second = $mprice.substr(1, 1);
    if ($mprice == "" || $mprice == 0) {
        $("#lablemprice").html("*Enter Monthly Price");
        $("#lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$mprice.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lablemprice").html("*Price can be only integer and only one dot(.) allowed");
        $("#lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lablemprice").html("*In starting you cant have two zero");
        $("#lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lablemprice").hide();
        $(this).css('border', 'solid 3px green');
    }
})


$("#apriceid").focusout(function() {
    $aprice = $("#apriceid").val();
    $first = $aprice.substr(0, 1);
    $second = $aprice.substr(1, 1);
    if ($aprice == "" || $aprice == 0) {
        $("#lableaprice").html("*Enter annual Price");
        $("#lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$aprice.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lableaprice").html("*Price can be only integer and only one dot(.) allowed");
        $("#lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableaprice").html("*In starting you cant have two zero");
        $("#lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableaprice").hide();
        $(this).css('border', 'solid 3px green');
    }
})


$("#skuid").focusout(function() {
    $sku = $("#skuid").val();
    if ($sku == "" || $sku == null) {
        $("#lablesku").html("*Enter SKU");
        $("#lablesku").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$sku.match(/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[#-]).{1,}$/)) {
        $("#lablesku").html("*SKU can be combination of Alphanumeric/specail character Not only Special character");
        $("#lablesku").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lablesku").hide();
        $(this).css('border', 'solid 3px green');
    }
})


$("#webid").focusout(function() {
    $web = $("#webid").val();
    $first = $web.substr(0, 1);
    $second = $web.substr(1, 1);
    if ($web == "" || $web == 0) {
        $("#lableweb").html("*Enter web space.");
        $("#lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$web.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lableweb").html("*Web Space can be only integer and only one dot(.) allowed");
        $("#lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableweb").html("*In starting you cant have two zero");
        $("#lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableweb").hide();
        $(this).css('border', 'solid 3px green');
    }
})

$("#bandid").focusout(function() {
    $band = $("#bandid").val();
    $first = $band.substr(0, 1);
    $second = $band.substr(1, 1);
    if ($band == "" || $band == 0) {
        $("#lableband").html("*Enter  bandwidth.");
        $("#lableband").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$band.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lableband").html("*Bandwidth can be only integer and only one dot(.) allowed");
        $("#lableband").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableband").html("*In starting you cant have two zero");
        $("#lableband").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableband").hide();
        $(this).css('border', 'solid 3px green');
    }
})


$("#domainid").focusout(function() {
    $domain = $("#domainid").val();
     $first = $band.substr(0, 1);
    // $second = $band.substr(1, 1);
    if ($domain == "" || $domain == null) {
        $("#labledomain").html("*Enter  No of domain.");
        $("#labledomain").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$domain.match(/^[0-9]\d*?$/)) {
        $("#labledomain").html("*Domain can be only Numeric and dot(.) not allowed");
        $("#labledomain").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#labledomain").hide();
        $(this).css('border', 'solid 3px green');
    }
})


function validateUpdateForm() {
    $("#prodCategory").hide();
    $("#prodname").hide();
    // $("#emailMsg").hide();
    // $("#passMsg").hide();
    // $("#repassMsg").hide();
    // $("#quesMsg").hide();
    // $("#ansMsg").hide();
    var categoryid = document.forms["productform"]["categoryid"].value;
    var pname = document.forms["productform"]["pname"].value;
    var url = document.forms["productform"]["url"].value;
    // var pass = document.forms["productform"]["pass"].value;
    // var repass = document.forms["productform"]["repass"].value;
    // var ques = document.forms["productform"]["ques"].value;
    // var ans = document.forms["productform"]["ans"].value;

    if (categoryid == "") {
        $("#prodCategory").html("*Select Category");
        $("#prodCategory").show();
        return false;
    }

    if (pname == "" || pname == null) {
        $("#prodname").html("*Enter Product Name");
        $("#prodname").show();
        return false;
    }
    //  else if (!name.match(/^[a-zA-Z]+( [a-zA-Z]+)*$/)) {
    //     $("#nameMsg").html("*Name should be alphabetic and one space between words");
    //     $("#nameMsg").show();
    //     return false;
    // }

    if (url == "" || url == null) {
        $("#urlid").html("*Enter Product Name");
        $("#urlid").show();
        return false;
    }

    // if (mob == "" || mob == 0) {
    //     $("#mobMsg").html("*Enter valid mob no.!");
    //     $("#mobMsg").show();
    //     return false;
    // } else if (firstmob == 0 && secondmob == 0) {
    //     $("#mobMsg").html("*In starting you cant have two zero");
    //     $("#mobMsg").show();
    //     return false;
    // }

    // if (firstmob == 0) {
    //     var x = 0;
    //     for (var i = 2; i <= 10; i++) {

    //         var firstchar = mob.substr(1, 1);
    //         var secondchar = mob.substr(i, 1);
    //         if (firstchar != secondchar) {
    //             var x = 1;
    //         }
    //     }
    //     if (x == 0) {
    //         $("#mobMsg").html("*All no can't be same");
    //         $("#mobMsg").show();
    //         return false;
    //     }
    // } else if (firstmob != 0) {
    //     var x = 0;
    //     for (var i = 1; i <= 9; i++) {

    //         var firstchar = mob.substr(0, 1);
    //         var secondchar = mob.substr(i, 1);
    //         if (firstchar != secondchar) {
    //             var x = 1;
    //         }
    //     }
    //     if (x == 0) {
    //         $("#mobMsg").html("*All no can't be same");
    //         $("#mobMsg").show();
    //         return false;
    //     }
    // }

    // // (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/))

    // if (email == "") {
    //     $("#emailMsg").html("*Enter mail");
    //     $("#emailMsg").show();
    //     return false;
    // } else if (!email.match(/^(?!.*\.{2})[a-z0-9]+[a-z0-9.]+[a-z0-9]+@[a-z]{1,}[.]+[a-z]*$/)) {
    //     $("#emailMsg").html("*Enter valid mail id ,mail id should be in lowercase, i.e- ex.ex@ex.com");
    //     $("#emailMsg").show();
    //     return false;
    // }
    // $x = $("#varify").val();
    // if ($x == "invalidMob") {
    //     $("#mobMsg").html("*Mobile no. already exists");
    //     $("#mobMsg").show();
    //     return false;
    // } else if ($x == "invalidEmail") {
    //     $("#emailMsg").html("*Email already exists");
    //     $("#emailMsg").show();
    //     return false;
    // }

    // if (pass == "") {
    //     $("#passMsg").show();
    //     return false;
    // } else if (!pass.match(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,16}$/)) {
    //     $("#passMsg").html("*Password must contain uppercase, lowercase, special character and numeric value AND length is 8 to 12.");
    //     $("#passMsg").show();
    //     return false;
    // }
    // if (repass == "") {
    //     $("#repassMsg").show();
    //     return false;
    // }

    // if (pass != repass) {
    //     $("#repassMsg").html("*Password doesn't match");
    //     $("#repassMsg").show();
    //     return false;
    // }
    // if (ques == "") {
    //     $("#quesMsg").show();
    //     return false;
    // }
    // if (ans == "") {
    //     $("#ansMsg").show();
    //     return false;
    // } else if (!ans.match(/^[a-zA-Z0-9_]+( [a-zA-Z0-9_]+)*$/)) {
    //     $("#ansMsg").html("*Ans can be alpha-numeric / only alphabetic,.");
    //     $("#ansMsg").show();
    //     return false;
    // }
    // var ans1 = ans.replace(/ /g, '');
    // var ans2 = Number(ans1);
    // if (Number.isInteger(ans2)) {
    //     $("#ansMsg").html("*Ans can be alpha-numeric / only alphabetic,.");
    //     $("#ansMsg").show();
    //     return false;
    // }
    // return true;
}

$("#prolang").focusout(function() {
    $prolang = $("#prolang").val();
    if ($prolang == "") {
        $("#prodlang").html("*Select lang Space in G.B");
        $("#prodlang").show();
       $("#submit10").attr("disabled",true);

        $(this).css('border', 'solid 3px red');
    }  
    else if(!$prolang.match(/^[a-zA-Z,]+[a-zA-Z]+$/))
    {
        $("#prodlang").html("*Select Valid language");
        $("#prodlang").show();
       $("#submit10").attr("disabled",true);

        $(this).css('border', 'solid 3px red'); 
    }
    else if($prolang<.5)
    {
        $("#prodlang").html("*Select Valid language");
        $("#prodlang").show();
       $("#submit10").attr("disabled",true);

        $(this).css('border', 'solid 3px red'); 
    }
    else {
        $("#submit10").attr("disabled",false);
        $("#prodlang").hide();
        $(this).css('border', 'solid 3px green');
    }
});



$("#promail").focusout(function() {
    $promail = $("#promail").val();
    if ($promail == "") {
        $("#prodmail").html("*Select Mail");
        $("#prodmail").show();
       $("#submit10").attr("disabled",true);

        $(this).css('border', 'solid 3px red');
    }  
    else if(!$promail.match(/^[0-9]+$/))
    {
        $("#prodmail").html("*Select Valid Mail box");
        $("#prodmail").show();
       $("#submit10").attr("disabled",true);

        $(this).css('border', 'solid 3px red'); 
    }
  
    
    
    else {
        $("#submit10").attr("disabled",false);
        $("#prodmail").hide();
        $(this).css('border', 'solid 3px green');
    }



});


$("#prosku").focusout(function() {
    $prosku = $("#prosku").val();
    if ($prosku == "") {
        $("#prodsku").html("*Select sku");
        $("#prodsku").show();
       $("#submit10").attr("disabled",true);

        $(this).css('border', 'solid 3px red');
    }  
    else if(!$prosku.match(/^[a-zA-z0-9]+[a-zA-Z0-9#-]+$/))
    {
        $("#prodsku").html("*Select Valid sku");
        $("#prodsku").show();
       $("#submit10").attr("disabled",true);

        $(this).css('border', 'solid 3px red'); 
    }
  
    
    
    else {
        $("#submit10").attr("disabled",false);
        $("#prodsku").hide();
        $(this).css('border', 'solid 3px green');
    }



});


});