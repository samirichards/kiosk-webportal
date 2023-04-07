<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: /login.php");
        exit();
    }
    $dbh = include_once('connection.php');

    if (isset($_POST['devName']) && isset($_POST['devLocation']) && isset($_POST['apiKey'])) {
        $devName = htmlspecialchars($_POST['devName']);
        $devLocation = htmlspecialchars($_POST['devLocation']);
        $apiKey = htmlspecialchars($_POST['apiKey']);

        // Insert the new device into the database
        $stmt = $dbh->prepare("INSERT INTO registered_devices (deviceName, deviceLocation, deviceAPIKey, associatedUserID) VALUES (:devName, :devLocation, :apiKey, :userID)");
        $stmt->bindParam(':devName', $devName);
        $stmt->bindParam(':devLocation', $devLocation);
        $stmt->bindParam(':apiKey', $apiKey);
        $stmt->bindParam(':userID', $_SESSION['user_id']);
        $stmt->execute();

        // Successful insertion
        header("Location: /home.php");
        exit();
    }
    header("Location: /newdevice.php?error=data_not_set");
    exit();