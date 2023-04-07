<?php
    session_start();
    $dbh = include_once('connection.php');

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // Prepare the SQL query to retrieve the user
        $stmt = $dbh->prepare("SELECT * FROM accounts WHERE emailaddress = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Fetch the user from the result set
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            // No user found with that email address
            header("Location: /login.php?error=no_user");
            exit();
        }

        if (password_verify($password, $user['passwordhash'])) {
            // Successful login
            session_start();
            $_SESSION['user_id'] = $user['idaccounts'];
            $_SESSION['user_email'] = $user['emailaddress'];
            header("Location: /home.php");
            exit();
        } else {
            // Invalid password
            header("Location: /login.php?error=invalid_password");
            exit();
        }
    }
    header("Location: /login.php?error=data_not_set");