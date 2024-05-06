<?php
session_start();

include('config.php');

// Create connection
$conn = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['name']) && isset($_POST['adpass'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['name']);
    $pass = validate($_POST['adpass']);

    if (empty($uname)) {
        header("Location: login.html?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: login.html?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE fname =?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $uname);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $hashed_pass = $row['pass'];

            if (password_verify($pass, $hashed_pass)) {
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['planid'] = $row['planid'];
                header("Location: ui.php");
                exit();
            } else {
                header("Location: login.html?error=Incorrect User name or password");
                exit();
            }
        } else {
            header("Location: login.html?error=User not found");
            exit();
        }
    }
} else {
    header("Location: index.html");
    exit();
}
