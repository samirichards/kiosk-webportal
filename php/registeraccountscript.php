<?php
    session_start();
    $dbh = include_once('connection.php');

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $passwordConf = htmlspecialchars($_POST['passwordConf']);
        $orgName = htmlspecialchars($_POST['orgName']);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($password != $passwordConf){
            header("Location: /register.php?error=password_not_match");
            exit();
        }

        // Prepare the SQL query to check if the email is already in use
        $stmt = $dbh->prepare("SELECT * FROM accounts WHERE emailaddress = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if the email is already in use
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            // Email is already in use
            header("Location: /register.php?error=email_in_use");
            exit();
        }

        // Insert the new user into the database
        $stmt = $dbh->prepare("INSERT INTO accounts (emailaddress, passwordHash, orgname) VALUES (:email, :password, :orgname)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':orgname', $orgName);
        $stmt->execute();

        // Successful registration
        header("Location: /login.php");
        exit();
    }
    header("Location: /register.php?error=data_not_set");
    exit();