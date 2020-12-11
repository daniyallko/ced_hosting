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
        <form action="amidd.php" method="post">
            <h1 class="text-center  mb-4">Enter Product Details</h1>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Select Product Category</label>
                            <!-- <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse"> -->
                            <select name="pcat" id="pcat" class="form-control" required>
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
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Enter Product Name</label>
                            <input type="text" name="pname" id="input-email" class="form-control" placeholder="Enter Product Name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Page URL</label>
                            <input type="text" name="link" id="input-first-name" class="form-control" placeholder="Page URL">
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
                            <input type="text" name="mprice" id="input-username" class="form-control" placeholder="ex: 23" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Enter Annual Price</label>
                            <input type="text" name="aprice" id="input-email" class="form-control" placeholder="ex: 23" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">SKU</label>
                            <input type="text" name="sku" id="input-first-name" class="form-control" placeholder="SKU" required>
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
                            <label class="form-control-label" for="input-username">Web Space(in GB)</label>
                            <input type="text" name="wspace" id="input-username" class="form-control" placeholder="Web Space(in GB)" required>
                            <h6 class="heading-small text-muted mb-4">Enter 0.5 for 512 MB</h6>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Bandwidth (in GB)</label>
                            <input type="text" name="band" id="input-email" class="form-control" placeholder="Bandwidth (in GB)" required>
                            <h6 class="heading-small text-muted mb-4">Enter 0.5 for 512 MB</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Free Domain</label>
                            <input type="text" name="dom" id="input-first-name" class="form-control" placeholder="Free Domain" required>
                            <h6 class="heading-small text-muted mb-4">Enter 0 if no domain available in this service
                            </h6>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Language / Technology
                                Support</label>
                            <input type="text" name="lang" id="input-first-name" class="form-control" placeholder="Language/Technology" required>
                            <h6 class="heading-small text-muted mb-4">Separate by (,) Ex: PHP, MySQL, MongoDB</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Mailbox</label>
                            <input type="text" name="mail" id="input-first-name" class="form-control" placeholder="Free Domain" required>
                            <h6 class="heading-small text-muted mb-4">Enter Number of mailbox will be provided, enter 0
                                if none</h6>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" name="prdct" value="Add Product" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <!-- Footer -->

    <?php include('footer.php'); ?>