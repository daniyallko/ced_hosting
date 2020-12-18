<?php 
require 'dbcon.php';

class product
{
    function categ($conn)
    {
        $sql = "SELECT * FROM tbl_product WHERE prod_parent_id=1 ";
        $result = $conn->query($sql);
        $appr=array();
        while($row = $result->fetch_assoc()){
            array_push($appr, $row);
    }
    return $appr;
    }

    function categp($conn)
    {
        $sql = "SELECT * FROM tbl_product WHERE prod_parent_id=0";
        $result = $conn->query($sql);
        $appr=array();
        while($row = $result->fetch_assoc()){
            array_push($appr, $row);
    }
    return $appr;
    }

    function catpage($id,$conn)
    {
        $sql = "SELECT * FROM tbl_product WHERE id=$id";
        $result = $conn->query($sql);
        $appr=array();
        while($row = $result->fetch_assoc()){
            array_push($appr, $row);
    }
    return $appr;
    }

    function pname($pid,$conn)
    {
        $sql = "SELECT * FROM tbl_product WHERE id=$pid";
        $result = $conn->query($sql);
        
        return $result;
    }

    function delcat($id,$conn)
    {
        $sql = "DELETE FROM tbl_product WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Category Deleted Successful");
            window.location.href = "categ.php";</script>';
                
        } else {
          echo "Error updating record: " . $conn->error;
        }
    }

    function addcat($cname,$link,$id,$conn)
    {
        $date =date('y-m-d h:i:s');
        $sql = "INSERT INTO tbl_product(`prod_name`,`link`,`prod_available`,`prod_parent_id`,`prod_launch_date`)
         VALUES('".$cname."', '".$link."', 1, '".$id."','".$date."')";
         if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Category Added Successful");
            window.location.href = "categ.php";</script>';
                
        } else {
          echo "Error updating record: " . $conn->error;
        }
    }

    function addp($cname,$link,$id,$mprice,$aprice,$sku,$jdesc,$conn)
    {
        $date =date('y-m-d h:i:s');
        $sql = "INSERT INTO tbl_product(`prod_name`,`link`,`prod_available`,`prod_parent_id`,`prod_launch_date`)
         VALUES('".$cname."', '".$link."', 1, '".$id."','".$date."')";

        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
        } 
        else{
            return $conn->error;
        }


         $sql1 = "INSERT INTO tbl_product_description(`prod_id`,`description`,`mon_price`,`annual_price`,`sku`)
         VALUES('".$last_id."', '".$jdesc."', '".$mprice."', '".$aprice."','".$sku."')";

         if ($conn->query($sql1) === TRUE) {
            echo '<script>alert("Product Added Successful");
            window.location.href = "addprod.php";</script>';
                
        } else {
          echo "Error updating record: " . $conn->error;
          $sql = "DELETE FROM tbl_product WHERE id=$last_id";
        }
    }

    function edcat($cname,$link,$ava,$id,$conn)
    {
        $sql = "UPDATE tbl_product SET prod_name='$cname' , link='$link' , prod_available=$ava WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Category Edited Successful");
            window.location.href = "categ.php";</script>';
        } else {
          echo "Error updating record: " . $conn->error;
        }
    }

    function vprod($conn)
    {
        $sql = "SELECT * FROM tbl_product INNER JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id";
        $result = $conn->query($sql);
        $appr=array();
        while($row = $result->fetch_assoc()){
            array_push($appr, $row);
        }
        return $appr;
    }

    function catpagev($id,$conn)
    {
        $sql = "SELECT * FROM tbl_product INNER JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id WHERE tbl_product.prod_parent_id=$id AND tbl_product.prod_available=1";
        $result = $conn->query($sql);
        $appr=array();
        while($row = $result->fetch_assoc()){
            array_push($appr, $row);
        }
        return $appr;
    }

    function proadd($id,$conn)
    {
        $sql = "SELECT * FROM tbl_product INNER JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id WHERE tbl_product.id=$id AND tbl_product.prod_available=1";
        $result = $conn->query($sql);
        $appr=array();
        while($row = $result->fetch_assoc()){
            array_push($appr, $row);
        }
        return $appr;
    }

    function eprod($cname,$parnt,$link,$id,$mprice,$aprice,$sku,$jdesc,$ava,$conn)
    {
        $sql = "UPDATE tbl_product SET prod_name='$cname' , link = '$link' , prod_parent_id=$parnt , prod_available = $ava WHERE id = $id";

       if ($conn->query($sql) === TRUE) {
        
        } 
        else{
            echo $conn->error;
        }

        $sql1 = "UPDATE tbl_product_description SET description = '$jdesc' , mon_price = $mprice , annual_price = $aprice , sku = '$sku' WHERE prod_id = $id";
        if ($conn->query($sql1) === TRUE) {
            echo '<script>alert("Product Edited Successful");
            window.location.href = "viewprod.php";</script>';
                
        } else {
          echo "Error updating record: " . $conn->error;
         
        }


    }

    function delp($id,$conn)
    {
        $sql = "DELETE tbl_product , tbl_product_description from tbl_product JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id WHERE tbl_product_description.prod_id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Product Deleted Successful");
            window.location.href = "viewprod.php";</script>';
                
        } else {
          echo "Error updating record: " . $conn->error;
        }
    }


}
?>