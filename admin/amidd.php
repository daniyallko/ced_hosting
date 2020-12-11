<?php

require '../class/product.php';
if(isset($_POST['categ']))
{
    $cname = $_POST['name'];
    $link = $_POST['link'];
    $id = $_POST['parnt'];
    

    $adm = new product();
    $admc = new dbcon();
    $show = $adm->addcat($cname,$link,$id,$admc->conn);
}

if(isset($_POST['ecateg']))
{
    $cname = $_POST['name'];
    $link = $_POST['link'];
    $id = $_POST['edid'];
    $ava = $_POST['stat'];
    

    $adm = new product();
    $admc = new dbcon();
    $show = $adm->edcat($cname,$link,$ava,$id,$admc->conn);
}

if(isset($_GET['action']))
{
    if($_GET['action']=='del')
    {
        $id=$_GET['id'];
        $adm = new product();
        $admc = new dbcon();
        $show = $adm->delcat($id,$admc->conn);
    }
}

if(isset($_POST['prdct']))
{
    $id = $_POST['pcat'];
    $cname = $_POST['pname'];
    $link = $_POST['link'];
    $mprice = $_POST['mprice'];
    $aprice = $_POST['aprice'];
    $sku = $_POST['sku'];
    $wspace = $_POST['wspace'];
    $band = $_POST['band'];
    $dom = $_POST['dom'];
    $lang = $_POST['lang'];
    $mail = $_POST['mail'];
    
    $desc = array('wspace'=>$wspace,'band'=>$band,'dom'=>$dom,'lang'=>$lang,'mail'=>$mail);
    $jdesc = json_encode($desc);

    $adm = new product();
    $admc = new dbcon();

    $pdes = $adm->addp($cname,$link,$id,$mprice,$aprice,$sku,$jdesc,$admc->conn);
}


?>