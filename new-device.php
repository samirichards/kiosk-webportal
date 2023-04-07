<?php
    session_start();
    if (!isset($_SESSION['user_id'])){
        header("Location: /login.php?error=not_logged_in");
    }
    $PageTitle="New Device";
    function customPageHeader(){?>
        <!--Arbitrary HTML Tags-->
    <?php }
    include_once('header.php'); ?>
    <div class="container centered-parent">
        <div class="card z-depth-5 login-box">
            <div class="card-title">
                Add a Device
            </div>
            <div class="card-content">
                <form name="login" method="post" action="php/adddevicescript.php">
                    <div class="input-field">
                        <input id="devName" name="devName" type="text" class="validate">
                        <label for="devName">Device Name</label>
                    </div>
                    <div class="input-field">
                        <input id="devLocation" name="devLocation" type="text" class="validate">
                        <label for="devLocation">Device Location</label>
                    </div>
                    <div class="input-field">
                        <input id="apiKey" name="apiKey" type="text" class="validate" maxlength="255" minlength="16">
                        <label for="apiKey">API Key</label>
                    </div>
                    <button class="btn waves-effect waves-light orange darken-3" type="submit" name="action">Add</button>
                    <a class="btn waves-effect red waves-light" type="button" href="home.php">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#apiKey').val(Math.random().toString().substr(2, 32));
        });
    </script>
<?php
    include_once('footer.php');
?>