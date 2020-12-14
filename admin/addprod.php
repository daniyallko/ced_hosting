<?php 

require 'header.php'; 

require '../class/product.php';
$adm = new product();
$admc = new dbcon();
$show = $adm->categ($admc->conn);

?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Add Product</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    <div class="container-fluid mt--6">
    <div class="col-lg-11 ml-lg-5 col-md-8">
          <div class="card bg-secondary border-0">
            <div class="card-header bg-transparent pb-5">


<div class="col-xl-12 order-xl-1">
    <div class="card-body">
        <form id="frm" action="amidd.php" method="post">
            <h1 class="text-center  mb-4">Enter Product Details</h1>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Select Product Category</label>
                            <!-- <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse"> -->
                            <select  name="pcat" id="pcat" class="form-control" required>
                            <option value="" selected disabled hidden>Select Category</option>
                            <?php foreach($show as $key=>$val) { ?>
                            <option value="<?php echo $val['id'] ?>"><?php echo $val['prod_name'] ?></option>
                            <?php } ?>
                            

                                <!-- <option value="">Select Category</option>
                                <option value="">Linux hosting</option>
                                <option value="">Windows hosting</option>
                                <option value="">CMSHosting</option>
                                <option value="">WordPress hosting</option> -->
                            </select>
                            <p id="prCat"></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Enter Product Name</label>
                            <input type="text" name="pname" id="pname" class="form-control" placeholder="Enter Product Name" required>
                            <h6 class="heading-small text-muted mb-4">Enter in Alphanumeric</h6>
                            <p id="prna"></p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Page URL</label>
                            <input type="text" name="link" id="input-first-name" class="form-control" placeholder="Page URL">
                            <h6 class="heading-small text-muted mb-4">Page Url</h6>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4" />
            <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Product Description (Enter Product Description Below)</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Enter Monthly Price</label>
                            <input type="text" name="mprice" maxlength="15" id="mpriceid" class="form-control" placeholder="ex: 23" required>
                            <h6 class="heading-small text-muted mb-4">Enter in Rs</h6>
                            <p id="lampri"></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Enter Annual Price</label>
                            <input type="text" name="aprice" maxlength="15" id="apriceid" class="form-control" placeholder="ex: 23" required>
                            <h6 class="heading-small text-muted mb-4">Enter in Rs</h6>
                            <p id="laapri"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">SKU</label>
                            <input type="text" name="sku" id="skuid" class="form-control" placeholder="SKU" required>
                            <h6 class="heading-small text-muted mb-4">Enter in this format GBFGH-923923</h6>
                            <p id="lasku"></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4" />
            <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Features</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" maxlength="5" for="input-username">Web Space(in GB)</label>
                            <input type="text" name="wspace" id="webid" class="form-control" placeholder="Web Space(in GB)" required>
                            <h6 class="heading-small text-muted mb-4">Enter 0.5 for 512 MB</h6>
                            <p id="laweb"></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" maxlength="5" for="input-email">Bandwidth (in GB)</label>
                            <input type="text" name="band" id="bandid" class="form-control" placeholder="Bandwidth (in GB)" required>
                            <h6 class="heading-small text-muted mb-4">Enter 0.5 for 512 MB</h6>
                        <p id="laband"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Free Domain</label>
                            <input type="text" name="dom" id="domid" class="form-control" placeholder="Free Domain" required>
                            <h6 class="heading-small text-muted mb-4">Enter 0 if no domain available in this service</h6>
                            <p id="ladom"></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Language / Technology
                                Support</label>
                            <input type="text" name="lang" id="langid" class="form-control" placeholder="Language/Technology" required>
                            <h6 class="heading-small text-muted mb-4">Separate by (,) Ex: PHP, MySQL, MongoDB</h6>
                            <p id="lalang"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Mailbox</label>
                            <input type="text" name="mail" id="mailid" class="form-control" placeholder="Free Domain" required>
                            <h6 class="heading-small text-muted mb-4">Enter Number of mailbox will be provided, enter 0 if none</h6>
                            <p id="lamail"></p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" name="prdct" id="apbtn" value="Add Product" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <!-- Footer -->
    
    <?php include('footer.php'); ?>
    <script>
        $('#apbtn').attr('disabled',true);
$pc=0;
    $("#pcat").focusout(function() {
        $categoryid = $("#pcat").val();
        if ($categoryid == "" || $categoryid == null) {
            $("#prCat").html("*Select Category");
            $("#prCat").show();
            $(this).css('border', 'solid 3px red');
            $pc=0;
        } else {
            $("#prCat").hide();
            $(this).css('border', 'solid 3px green');
            $pc=1;
        }
        check();
    });

$pn=0;
    $("#pname").focusout(function() {
        $pname = $("#pname").val();
        var ans1 = $pname.replace(/ /g, '');
        var ans2 = Number(ans1);
        if ($pname == "" || $pname == null) {
            $("#prna").html("*Enter Product Name");
            $("#prna").show();
            $(this).css('border', 'solid 3px red');
            $pn=0;
        } else if (!$pname.match(/^([a-zA-Z]+\s+[a-zA-Z])*[(a-zA-Z)]*(-[0-9]+(?!-)+)*$/)) {
            $("#prna").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
            $("#prna").show();
            $(this).css('border', 'solid 3px red');
            $pn=0;
        } else if (Number.isInteger(ans2)) {
            $("#prna").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
            $("#prna").show();
            $(this).css('border', 'solid 3px red');
            $pn=0;
        } else {
            $("#prna").hide();
            $(this).css('border', 'solid 3px green');
            $pn=1;
        }
        check();
    });

$mp=0;
    $("#mpriceid").focusout(function() {
        $mprice = $("#mpriceid").val();
        $first = $mprice.substr(0, 1);
        $second = $mprice.substr(1, 1);
        if ($mprice == "" || $mprice == 0) {
            $("#lampri").html("*Enter Monthly Price");
            $("#lampri").show();
            $(this).css('border', 'solid 3px red');
            $mp=0;
        } else if (!$mprice.match(/^[0-9]\d*(\.\d+)?$/)) {
            $("#lampri").html("*Price can be only integer and only one dot(.) allowed");
            $("#lampri").show();
            $(this).css('border', 'solid 3px red');
            $mp=0;
        } else if ($first == 0 && $second == 0) {
            $("#lampri").html("*In starting you cant have two zero");
            $("#lampri").show();
            $(this).css('border', 'solid 3px red');
            $mp=0;
        } else {
            $("#lampri").hide();
            $(this).css('border', 'solid 3px green');
            $mp=1;
        }
        check();
    });

    $ap=0;
    $("#apriceid").focusout(function() {
        $aprice = $("#apriceid").val();
        $first = $aprice.substr(0, 1);
        $second = $aprice.substr(1, 1);
        if ($aprice == "" || $aprice == 0) {
            $("#laapri").html("*Enter annual Price");
            $("#laapri").show();
            $(this).css('border', 'solid 3px red');
            $ap=0;
        } else if (!$aprice.match(/^[0-9]\d*(\.\d+)?$/)) {
            $("#laapri").html("*Price can be only integer and only one dot(.) allowed");
            $("#laapri").show();
            $(this).css('border', 'solid 3px red');
            $ap=0;
        } else if ($first == 0 && $second == 0) {
            $("#laapri").html("*In starting you cant have two zero");
            $("#laapri").show();
            $(this).css('border', 'solid 3px red');
            $ap=0;
        } else {
            $("#laapri").hide();
            $(this).css('border', 'solid 3px green');
            $ap=1;
        }
        check();
    });

 $su=0;
$("#skuid").focusout(function() {
    $prosku = $("#skuid").val();
    if ($prosku == "") {
        $("#lasku").html("*Select sku");
        $("#lasku").show();
        $(this).css('border', 'solid 3px red');
        $su=0;
    }  
    else if(!$prosku.match(/^[a-zA-z0-9]+[a-zA-Z0-9#-]+$/))
    {
        $("#lasku").html("*Select Valid sku");
        $("#lasku").show();
        $(this).css('border', 'solid 3px red'); 
        $su=0;
    }
    else {
        $("#lasku").hide();
        $(this).css('border', 'solid 3px green');
        $su=1;
    }
    check();
});

$we=0;
    $("#webid").focusout(function() {
        $web = $("#webid").val();
        $first = $web.substr(0, 1);
        $second = $web.substr(1, 1);
        if ($web == "" || $web == 0) {
            $("#laweb").html("*Enter web space.");
            $("#laweb").show();
            $(this).css('border', 'solid 3px red');
            $we=0;
        } else if (!$web.match(/^[0-9]\d*(\.\d+)?$/)) {
            $("#laweb").html("*Web Space can be only integer and only one dot(.) allowed");
            $("#laweb").show();
            $(this).css('border', 'solid 3px red');
            $we=0;
        } else if ($first == 0 && $second == 0) {
            $("#laweb").html("*In starting you cant have two zero");
            $("#laweb").show();
            $(this).css('border', 'solid 3px red');
            $we=0;
        } else {
            $("#laweb").hide();
            $(this).css('border', 'solid 3px green');
            $we=1;
        }
        check();
    });

$ba=0;
    $("#bandid").focusout(function() {
    $band = $("#bandid").val();
    $first = $band.substr(0, 1);
    $second = $band.substr(1, 1);
    if ($band == "" || $band == 0) {
        $("#laband").html("*Enter  bandwidth.");
        $("#laband").show();
        $(this).css('border', 'solid 3px red');
        $ba=0;
    } else if (!$band.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#laband").html("*Bandwidth can be only integer and only one dot(.) allowed");
        $("#laband").show();
        $(this).css('border', 'solid 3px red');
        $ba=0;
    } else if ($first == 0 && $second == 0) {
        $("#laband").html("*In starting you cant have two zero");
        $("#laband").show();
        $(this).css('border', 'solid 3px red');
        $ba=0;
    } else {
        $("#laband").hide();
        $(this).css('border', 'solid 3px green');
        $ba=1;
    }
    check();
});

$do=0;
$("#domid").focusout(function() {
    $domain = $("#domid").val();
     $first = $band.substr(0, 1);
    // $second = $band.substr(1, 1);
    if ($domain == "" || $domain == null) {
        $("#ladom").html("*Enter  No of domain.");
        $("#ladom").show();
        $(this).css('border', 'solid 3px red');
        $do=0;
    } else if (!$domain.match(/^[0-9]\d*?$/)) {
        $("#ladom").html("*Domain can be only Numeric and dot(.) not allowed");
        $("#ladom").show();
        $(this).css('border', 'solid 3px red');
        $do=0;
    } else {
        $("#ladom").hide();
        $(this).css('border', 'solid 3px green');
        $do=1;
    }
    check();
});

$la=0;
$("#langid").focusout(function() {
    $prolang = $("#langid").val();
    if ($prolang == "") {
        $("#lalang").html("*Select lang Space in G.B");
        $("#lalang").show();
        $(this).css('border', 'solid 3px red');
        $la=0;
    }  
    else if(!$prolang.match(/^[a-zA-Z,]+[a-zA-Z]+$/))
    {
        $("#lalang").html("*Select Valid language");
        $("#lalang").show();
        $(this).css('border', 'solid 3px red'); 
        $la=0;
    }
    else if($prolang<.5)
    {
        $("#lalang").html("*Select Valid language");
        $("#lalang").show();
        $(this).css('border', 'solid 3px red'); 
        $la=0;
    }
    else {
        $("#lalang").hide();
        $(this).css('border', 'solid 3px green');
        $la=1;
    }
    check();
});

$mi=0;
$("#mailid").focusout(function() {
    $promail = $("#mailid").val();
    if ($promail == "") {
        $("#lamail").html("*Select Mail");
        $("#lamail").show();
        $(this).css('border', 'solid 3px red');
        $mi=0;
    }  
    else if(!$promail.match(/^[0-9]+$/))
    {
        $("#lamail").html("*Select Valid Mail box");
        $("#lamail").show();
        $(this).css('border', 'solid 3px red');
        $mi=0;
    }
    else {
        $("#lamail").hide();
        $(this).css('border', 'solid 3px green');
        $mi=1;
    }
    check();
});

function check()
{ 
    $fa=$do+$ba+$su+$we+$ap+$mp+$pc+$pn+$mi+$la;
    console.log($fa);
    if($fa==10)
    {
        $('#apbtn').attr('disabled',false);
    }
    else{
        $('#apbtn').attr('disabled',true);
    }
}

    </script>