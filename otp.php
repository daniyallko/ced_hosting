<?php include("header.php"); ?>

<!---login--->
<div class="content">
    <!-- registration -->
    <div class="main-1">
        <div class="container">

            <?php if (isset($_SESSION['Varifyuser'])) {?>

            <div class="register">
                <div class="register-but">
                    <form action="midd.php" name="verifyemail" method="post">
                        <div class="register-top-grid">
                            <h3 class="text-center pbtm-10 font-large">Varify Yourself</h3>
                            <h3>Email Varification</h3>
                            <div>
                                <span>Email Address<label>*</label></span>
                                <p><label><?php echo $_SESSION['Varifyuser']['email'] ?></label></p>
                                <input type="hidden" name="eemail" value="<?php echo $_SESSION['Varifyuser']['email'] ?>"
                                    id="emailvalue">
                                    <input type="hidden" value="<?php echo $_SESSION['Varifyuser']['name'] ?>"
                                    id="namevalue">
                                <input type="text" name="emailOTP" placeholder="Enter OTP" class="enteremailOTP">
                                <span class="enteremailOTP">Varification code has been sent on
                                    <?php echo $_SESSION['Varifyuser']['email'] ?></span>
                            </div>

                        </div>
                        <div class="clearfix"> </div>
                        <div class="register-top-grid">
                            <input type="button" value="Varify Email" id="sendemailOTP" class="varifybtn sendemailOTP">
                            <input type="submit" value="Submit OTP" name="varifyEmail" class="enteremailOTP">
                            <input type="button" value="Resend OTP" id="resendOTPtomail" class="varifybtn enteremailOTP">
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
                <div class="register-but">
                    <form action="midd.php" name="verifymob" method="post">
                        <div class="register-bottom-grid">
                            <h3>Mobile Varification.</h3>
                            <div>
                                <span>Mobile No.<label>*</label></span>
                                <p><label><?php echo $_SESSION['Varifyuser']['mob'] ?></label></p>
                                <input type="hidden" value="<?php echo $_SESSION['Varifyuser']['name'] ?>"
                                    id="namevalue1">
                                <input type="hidden" name="vmob" value="<?php echo $_SESSION['Varifyuser']['mob'] ?>" id="mobvalue">
                                <input type="text" name="mobOTP"  class="entermobOTP1" placeholder="Enter OTP">
                                <span class="entermobOTP">Varification code has been sent on
                                    <?php echo $_SESSION['Varifyuser']['mob'] ?></span>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                        <div class="register-top-grid">
                            <input type="button" value="Varify Mob" id="sendmobOTP" class=" varifybtn sendmobOTP">
                            <input type="submit" value="Submit OTP" name="varifyMob" class="entermobOTP1">
                            <input type="button" value="Resend OTP" id="reentermobOTP" class="varifybtn entermobOTP1">
                        </div>

                    </form>
                </div>
            </div>
            <?php } else { ?>
            <h3 class="text-center pbtm-10 font-large">Please login or Register for varification</h3>
            <h3 class="text-center pbtm-10 "><a href="login.php">Click here to login</a> OR <a href="account.php">Click
                    here to Register</a></h3>
            <?php } ?>
        </div>
    </div>
    <!-- registration -->
</div>
<!-- login -->
<!---footer--->
<?php include("footer.php"); ?>