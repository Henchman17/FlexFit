<?php
function getTotalUsers() {
    // Assuming you have a database connection established
    $db = mysqli_connect("localhost", "admin", "2003", "gym");

    // Check connection
    if (!$db) {
        die("Connection failed: ". mysqli_connect_error());
    }

    // Query to get the total number of users
    $query = "SELECT COUNT(*) as total_users FROM users";
    $result = mysqli_query($db, $query);

    // Get the total number of users
    $row = mysqli_fetch_assoc($result);
    $total_users = $row['total_users'];

    // Close the database connection
    mysqli_close($db);

    return $total_users;
}

function getTotalActivePlans() {
    // Assuming you have a database connection established
    $db = mysqli_connect("localhost", "admin", "2003", "gym");

    // Check connection
    if (!$db) {
        die("Connection failed: ". mysqli_connect_error());
    }

    // Query to get the total number of users with active plans
    $query = "SELECT COUNT(*) as total_active_plans FROM users WHERE planid = 'active'";
    $result = mysqli_query($db, $query);

    // Get the total number of users with active plans
    $row = mysqli_fetch_assoc($result);
    $total_active_plans = $row['total_active_plans'];

    // Close the database connection
    mysqli_close($db);

    return $total_active_plans;
}

?>