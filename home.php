<?php
    session_start();
    if (!isset($_SESSION['user_id'])){
        header("Location: /login.php?error=not_logged_in");
    }
    $PageTitle="Device Records";
    function customPageHeader(){?>
        <!--Arbitrary HTML Tags-->
    <?php }
    include_once('header.php');

    $dbh = include_once('php/connection.php');

    // Retrieve the records from the database
    $stmt = $dbh->prepare("SELECT records.recordID, records.recordTime, records.recordValue, rd.*
FROM records 
INNER JOIN registered_devices rd 
ON records.associatedDeviceID = rd.deviceID
WHERE rd.associatedUserID = :userID");
    $stmt->bindParam(':userID', $_SESSION['user_id']);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="container centered-parent">
        <div class="card z-depth-5 login-box">
            <p>Home page</p>
            <div class="container">
                <h3>Device Records</h3>
                <table class="striped">
                    <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>Time of Record</th>
                        <th>Device Name</th>
                        <th>Device Location</th>
                        <th>Recorded Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($records as $record) { ?>
                        <tr>
                            <td><?php echo $record['recordID']; ?></td>
                            <td><?php echo $record['recordTime']; ?></td>
                            <td><?php echo $record['deviceName']; ?></td>
                            <td><?php echo $record['deviceLocation']; ?></td>
                            <td><?php echo $record['recordValue']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
    include_once('footer.php');
?>