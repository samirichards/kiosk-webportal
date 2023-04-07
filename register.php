<?php
    $PageTitle="Register";
    function customPageHeader(){?>
        <!--Arbitrary HTML Tags-->
    <?php }
    include_once('header.php'); ?>
    <div class="container centered-parent">
        <div class="card z-depth-5 login-box">
            <div class="card-title">
                Register
            </div>
            <div class="card-content">
                <form name="register" method="post" action="php/registeraccountscript.php">
                    <div class="input-field">
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field">
                        <input id="passwordConf" name="passwordConf" type="password" class="validate">
                        <label for="passwordConf">Confirm Password</label>
                    </div>
                    <div class="input-field">
                        <input id="orgName" name="orgName" type="text" class="validate">
                        <label for="orgName">Organisation Name</label>
                    </div>
                    <button class="btn waves-effect waves-light orange darken-3 white-text" type="submit" name="action">Register</button>
                </form>
            </div>
        </div>
    </div>
<?php
    include_once('footer.php');
?>