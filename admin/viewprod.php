<?php 
require 'header.php'; 
if(isset($_SESSION['userdata']))
{
require '../class/product.php';

$adm = new product();
$admc = new dbcon();
$show = $adm->vprod($admc->conn);
$part = $adm->categ($admc->conn);
// $part = $adm->categp($admc->conn);
?>

<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">View Products</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                  <li class="breadcrumb-item active" aria-current="page">View Products</li>
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
    <!-- Page content -->
    <div class="container-fluid mt--6">
    <div class="col-lg-11 ml-lg-5 col-md-8">
          <div class="card bg-secondary border-0">
          
              
            

            <!-- Card header -->

      <div class="row">
        <div class="col">
          <div class="card ">
          <div class="card-header border-0">
              <h3 class="mb-0">Products</h3>
            </div>
            <div class="table-responsive">
              <table id="tbl" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Product Name</th>
                    <th scope="col" class="sort" data-sort="budget">Web Space(GB)</th>
                    <th scope="col" class="sort" data-sort="budget">Bandwidth(GB)</th>
                    <th scope="col" class="sort" data-sort="budget">Free Domain</th>
                    <th scope="col" class="sort" data-sort="budget">Language/Technology</th>
                    <th scope="col" class="sort" data-sort="budget">Mailbox</th>
                    <th scope="col" class="sort" data-sort="budget">Monthly Price</th>
                    <th scope="col" class="sort" data-sort="budget">Annual Price</th>
                    <th scope="col" class="sort" data-sort="budget">SKU</th>




                    <th scope="col" class="sort" data-sort="status">link</th>
                    <th scope="col">parent</th>
                    <th scope="col">Availability</th>
                    <th scope="col" class="sort" data-sort="completion">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php foreach($show as $key=>$val) { 
                  $pid = $val['prod_parent_id'];
                  $pname = $adm->pname($pid,$admc->conn);
                  $row = $pname->fetch_assoc();
                  $desc = json_decode($val['description']);
                  
                  ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?php echo $val['prod_name']; ?></span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                    <?php echo $desc->wspace; ?>                    
                    </td>
                    <td class="budget">
                    <?php echo $desc->band; ?>                    
                    </td>
                    <td class="budget">
                    <?php echo $desc->dom; ?>                    
                    </td>
                    <td class="budget">
                    <?php echo $desc->lang; ?>                    
                    </td>
                    <td class="budget">
                    <?php echo $desc->mail; ?>                    
                    </td>
                    <td class="budget">
                    <?php echo $val['mon_price']; ?>                    
                    </td>
                    <td class="budget">
                    <?php echo $val['annual_price']; ?>                    
                    </td>
                    <td class="budget">
                    <?php echo $val['sku']; ?>                    
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status"><?php echo $val['link']; ?>  </span>
                      </span>
                    </td>
                    <td>
                    <?php echo $row['prod_name']; ?>  
                    </td>
                    <td>
                    <?php if($val['prod_available']==1){
                      echo "Available";
                    } 
                    else{
                    echo "Unavailable"; }?>  
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2"><?php echo $val['prod_launch_date']; ?>  </span>
                        
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal<?php echo $val['id']; ?>">Edit</a>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete<?php echo $val['id']; ?>">Delete</a>
                          
                        </div>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal -->
<div class="modal fade" id="myModal<?php echo $val['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="card bg-secondary border-0">
      <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-header bg-transparent pb-5">
              
             <h3 class="text-center">Edit Product</h3>
            </div>
            
            <div class="card-body px-lg-5 py-lg-5">
              
              <form role="form" action="amidd.php" method="post">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"></span>
                    </div>
                    <select class="form-control" name="parnt" id="parnt">
                    <option value="" selected disabled hidden>Service</option>
                    <?php foreach($part as $key=>$val1) { ?>
                    <option value="<?php echo $val1['id']; ?>"<?php if($val1['id']==$val['prod_parent_id']){ echo "selected"; } ?>><?php echo $val1['prod_name']; ?></option>
                    <?php } ?>
                    </select>
                    <!-- <label class="form-control" name="name" ><?php //echo $row['prod_name']; ?> </label> -->
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-dark">Name</span>
                    </div>
                    <input class="form-control" name="name" placeholder="Product Name" value="<?php echo $val['prod_name']; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-dark">Web space</span>
                    </div>
                    <input class="form-control" name="wspace" placeholder="Web Space(GB)" value="<?php echo $desc->wspace; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-dark">Bandwidth</span>
                    </div>
                    <input class="form-control" name="band" placeholder="Bandwidth(GB)" value="<?php echo $desc->band; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-dark">Domain</span>
                    </div>
                    <input class="form-control" name="dom" placeholder="Free Domain" value="<?php echo $desc->dom; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-dark">Language</span>
                    </div>
                    <input class="form-control" name="lang" placeholder="Language/Technology" value="<?php echo $desc->lang; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-dark">Mailbox</span>
                    </div>
                    <input class="form-control" name="mail" placeholder="Mailbox" value="<?php echo $desc->mail; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-dark">Monthly Price</span>
                    </div>
                    <input class="form-control" name="mprice" placeholder="Monthly Price" value="<?php echo $val['mon_price']; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-dark">Annual Price</span>
                    </div>
                    <input class="form-control" name="aprice" placeholder="Annual Price" value="<?php echo $val['annual_price']; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-dark">SKU</span>
                    </div>
                    <input class="form-control" name="sku" placeholder="SKU" value="<?php echo $val['sku']; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-dark">Product Link</span>
                    </div>
                    <input class="form-control" name="link" placeholder="Product Link" value="<?php echo $val['link']; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                <input type="hidden" name="edid" value="<?php echo $val['prod_id']; ?>">
                
                <label for="stat">Available</label>
                <input type="radio" name="stat" id="stat" value=1 <?php  if($val['prod_available']== 1) {  echo "checked" ; } ?> required>
                <label for="stat">Unavailable</label>
                <input type="radio" name="stat" id="stat" value=0 <?php if($val['prod_available']== 0) {  echo "checked" ; } ?> required>
                
                </div>
                <div class="text-center">
                  <input type="submit" name="eprod" class="btn btn-primary mt-4" value="Save">
                </div>
              </form>
            </div>
          </div>
        </div>
    
  </div>
</div>
<!-- delete modal -->
<div class="col-md-4">
      <div class="modal fade" id="delete<?php echo $val['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-warning">
        	
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
            	
                <div class="py-3 text-center">
                <i class="fas fa-exclamation-triangle"></i>
                    <h4 class="heading mt-4">Delete <?php echo $val['prod_name']; ?></h4>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <a type="button" class="btn btn-white" href="amidd.php?action=delp&id=<?php echo $val['prod_id']; ?>">Yes</a>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">No</button>
            </div>
            
        </div>
    </div>
</div>

  </div>
 
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
</div>
</div>
</div>

   </div>
  </div>
<?php require 'footer.php';}
else{
  echo '<script>alert("Login First");
  window.location.href = "../login.php";</script>';
} ?>