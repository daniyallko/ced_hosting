<?php 

require 'header.php'; ?>
<!---login--->
<div class="content">
<div class="main-1">
<div class="container">
<div class="login-page">
<div class="account_grid">
<div class="col-md-6 login-left">
<h3>new customers</h3>
<p>By creating an account with our store, you will be able to move through the 
checkout process faster, store multiple shipping addresses, view and track your
 orders in your account and more.</p>
<a class="acount-btn" href="account.php">Create an Account</a>
</div>
<div class="col-md-6 login-right">
<h3>registered</h3>
<p>If you have an account with us, please log in.</p>
<form action="midd.php" method="post">
<div>
<span>Email Address<label>*</label></span>
<input type="email" for="email" name="email" required> 
</div>
<div>
<span>Password<label>*</label></span>
<input type="password" for="password" name="password" required> 
</div>
<a class="forgot" href="#">Forgot Your Password?</a>
<input type="submit" value="Login" name="log">
</form>
</div>	
<div class="clearfix"> </div>
</div>
</div>
</div>
</div>
</div>
<!-- login -->
<?php require 'footer.php'; ?>