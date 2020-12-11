<?php



require 'header.php';?>
<!---login--->
<div class="content">
<!-- registration -->
<div class="main-1">
<div class="container">
<div class="register">
<div class="register-but">
<form action="midd.php" method="post" onsubmit="return validate()"> 
<div class="register-top-grid">
<h3>personal information</h3>
<div>
<span>Name<label>*</label></span>
<input type="text" for="name" name="name" id="name"
 pattern="^[a-zA-Z]+( [a-zA-Z]+)*$" autocomplete="off" required> 
</div>


<div>
<span>Mobile<label>*</label></span>
<input type="text" for="mobile" name="mobile" 
id="mobile" autocomplete="off" required> 
</div>
<div class="clearfix"> </div>
<a class="news-letter" href="#">

</a>

</div>
<div class="register-bottom-grid">
<h3>login information</h3>
<div>
<span>Email Address<label>*</label></span>
<input type="email" for="email" name="email" id="email" autocomplete="off" required> 
</div>
</div>
<div class="clearfix"> </div>
<div class="register-top-grid">
<div>
<span>Password<label>*</label></span>
<input type="password"
 pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
title="Password must contain:-No whites spaces,-Range 8-16 character,-Combination 
of UPPERCASE, lowercase, special character and numeric value."
 minlength="8" maxlength="16" for="password" name="password" id="password" required>
</div>
<div>
<span>Confirm Password<label>*</label></span>
<input type="password" 
pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
title="Password must contain:-No whites spaces,-Range 8-16 character,
-Combination of UPPERCASE, lowercase, special character and numeric value."
for="password2" minlength="8" maxlength="16"
 name="password2" id="password2" required>
</div>
</div>
<div class="clearfix"> </div>
<div class="register-bottom-grid">
<h3>Security information</h3>
<div>
<span>Security Question<label>*</label></span>
<select name="ques" id="ques" required>
<option value="" selected disabled hidden>Select Security Question</option>
<option value="What was your childhood nickname?"
>What was your childhood nickname?</option>
<option value="What is the name of your favourite childhood friend?"
>What is the name of your favourite childhood friend?</option>
<option value="What was your favourite place to visit as a child?"
>What was your favourite place to visit as a child?</option>
<option value="What was your dream job as a child?"
>What was your dream job as a child?</option>
<option value="What is your favourite teacher's nickname?"
>What is your favourite teacher's nickname?</option>
</select>
</div>
<div>
<span>Answer<label>*</label></span>
<input type="text" for="ans" name="ans" id="ans"
 pattern="^([a-zA-Z0-9]+[a-zA-Z0-9])*$" required> 
</div>
</div>



<div class="clearfix"> </div>


<input type="submit" value="submit" name="reg">
<div class="clearfix"> </div>
</form>
</div>
</div>
</div>
</div>
<!-- registration -->

</div>
<!-- login -->
<?php require 'footer.php'; ?>