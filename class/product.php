<?php 
require 'dbcon.php';

class product
{
    function categ($conn)
    {
        $sql = "SELECT * FROM tbl_product WHERE link IS NOT NULL";
        $result = $conn->query($sql);
        $appr=array();
        while($row = $result->fetch_assoc()){
            array_push($appr, $row);
    }
    return $appr;
    }

    function categp($conn)
    {
        $sql = "SELECT * FROM tbl_product WHERE link IS NULL";
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
}
?>