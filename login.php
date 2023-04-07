<?php
    $PageTitle="Login";
    function customPageHeader(){?>
        <!--Arbitrary HTML Tags-->
    <?php }
    include_once('header.php'); ?>
    <div class="container centered-parent">
        <div class="card z-depth-5 login-box">
            <div class="card-title">
                Login
            </div>
            <div class="card-content">
                <form name="login" method="post" action="php/loginscript.php">
                    <div class="input-field">
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                    <button class="btn waves-effect waves-light orange darken-3 white-text" type="submit" name="action">Submit</button>
                </form>
                <a class="waves-effect waves-orange btn-flat" href="register.php">Create an Account</a>
            </div>
        </div>
    </div>
<?php
    include_once('footer.php');
?>