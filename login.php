<?php
    $PageTitle="Home";
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
                <form>
                    <div class="input-field">
                        <input id="username" type="email" class="validate">
                        <label for="username">Email</label>
                    </div>
                    <div class="input-field">
                        <input id="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
                </form>
                <a class="waves-effect waves-teal btn-flat" href="register.php">Create an Account</a>
            </div>
        </div>
    </div>
<?php
    include_once('footer.php');
?>