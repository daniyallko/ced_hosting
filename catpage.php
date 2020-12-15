<?php require 'header.php'; 
if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $adm = new product();
    $admc = new dbcon();
    $show = $adm->catpage($id,$admc->conn);
    foreach($show as $key=>$val)
    {
        $page = $val['link'];
    }
    echo $page;

    $show1 = $adm->catpagev($id,$admc->conn);

?>
<div class="tab-prices" >
						<div class="container">
							<div class="bs-example bs-example-tabs" id="tab" role="tabpanel" data-example-id="togglable-tabs">
								
								<div id="myTabContent" class="tab-content">
                               <?php foreach($show1 as $key1=>$val1){
                                   $desc = json_decode($val1['description']); ?>
									<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
										<div class="linux-prices">
											<div class="col-md-3 linux-price">
												<div class="linux-top">
												<h4><?php echo $val1['prod_name'] ?></h4>
												</div>
												<div class="linux-bottom">
													<h5>Rs <?php echo $val1['mon_price'] ?><span class="month"> per month</span></h5>
                                                    <h5>Rs <?php echo $val1['annual_price'] ?><span class="month"> per Year</span></h5>
													<h6><?php echo $desc->dom ?>  Domain</h6>
													<ul>
													<li><strong><?php echo $desc->wspace ?></strong> Disk Space</li>
													<li><strong><?php echo $desc->band ?></strong> Data Transfer</li>
													<li><strong><?php echo $desc->mail ?></strong> Email Accounts</li>
                                                    <li><strong><?php echo $desc->lang ?></strong> Language/Technology</li>
													<li><strong>Includes </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/india.png"></li>
													</ul>
												</div>
												<a href="#">buy now</a>
											</div>
											<?php } ?>
											<div class="clearfix"></div>
										</div>
									</div>
									
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="clients">
					<div class="container">
						<h3>Some of our satisfied clients include...</h3>
						<ul>
							<li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
							<li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
							<li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
							<li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
							<li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
							<li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
						</ul>
					</div>
				</div>
       <!-- clients -->
					<div class="whatdo">
						<div class="container">
							<h3><?php foreach($show as $key=>$val)
								{
									echo $val['prod_name'];
								} ?> Features</h3>
							<div class="what-grids">
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="what-grids">
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-move" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-screenshot" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

				</div>
<?php }
else{
    echo '<h1 class="text-center">Kyu Kar Rahe Ho Aisa</h1>';
}
require 'footer.php';

?>