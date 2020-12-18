<?php
session_start();
require 'class/product.php';
if(!isset($_SESSION['cart']))
{
  $_SESSION['cart']= array();
}

if(isset($_SESSION['cart']))
{
  if(isset($_GET['action']))
  {
    if($_GET['action']=='addm')
    {
      $id=$_GET['id'];

      $adm = new product();
      $admc = new dbcon();
      $pdes = $adm->proadd($id,$admc->conn);

      foreach($pdes as $key=>$val)
      {
        $name=$val['prod_name'];
        $pid = $val['prod_parent_id'];
        $desc = $val['description'];
        $mprice = $val['mon_price'];
        
      }
      $jdesc = json_decode($desc);
      $wspace= $jdesc->wspace;
      $band= $jdesc->band;
      $dom = $jdesc->dom;
      $lang = $jdesc->lang;

      $pname = $adm->pname($pid,$admc->conn);
                  $row = $pname->fetch_assoc();
                  $pn = $row['prod_name'];

      $cart=array('name'=>$name,'wspace'=>$wspace,'band'=>$band,'dom'=>$dom,'lang'=>$lang,'pn'=>$pn,'price'=>$mprice,'plan'=>'Monthly','id'=>$id);
      array_push($_SESSION['cart'],$cart);

      echo '<script>alert("Product added to cart");
            window.location.href = "catpage.php?id='.$pid.'#tab";</script>';
    }

    if($_GET['action']=='adda')
    {
      $id=$_GET['id'];

      $adm = new product();
      $admc = new dbcon();
      $pdes = $adm->proadd($id,$admc->conn);

      foreach($pdes as $key=>$val)
      {
        $name=$val['prod_name'];
        $pid = $val['prod_parent_id'];
        $desc = $val['description'];
        $aprice = $val['annual_price'];
      }
      $jdesc = json_decode($desc);
      $wspace= $jdesc->wspace;
      $band= $jdesc->band;
      $dom = $jdesc->dom;
      $lang = $jdesc->lang;

      $pname = $adm->pname($pid,$admc->conn);
                  $row = $pname->fetch_assoc();
                  $pn = $row['prod_name'];

      $cart=array('name'=>$name,'wspace'=>$wspace,'band'=>$band,'dom'=>$dom,'lang'=>$lang,'pn'=>$pn,'price'=>$aprice,'plan'=>'Annual','id'=>$id);
      array_push($_SESSION['cart'],$cart);

      echo '<script>alert("Product added to cart");
            window.location.href = "catpage.php?id='.$pid.'";</script>';
    }

    if($_GET['action']=='delc')
    {
      $d = $_GET['id'];
      unset($_SESSION['cart'][$d]);
      echo '<script>alert("Product deleted from cart");
            window.location.href = "cart.php";</script>';
      
    }
  }
}

?>