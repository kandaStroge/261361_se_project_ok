<?php

function login($username, $password , $mysqli){
    $sql = "SELECT uid, username, password, role, sid FROM tbl_members WHERE username=? LIMIT 1";
    if ($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $username, $db_password, $role, $sid);
        $stmt->fetch();
        echo "Can exc";

        if($stmt->num_rows == 1){
            echo "found user";
            if ( checkbrute($user_id, $mysqli) == true ){
                // Account is locked
                echo "Accout locked";
                return true;
            }else{
                if (password_verify($password, $db_password)) {
                    echo "pass correct";
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    echo "$user_browser";
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/",
                        "",
                        $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = $role;

                    //TODO for secure plz new imprement session data
                    $_SESSION['sid'] = ($sid == "")?"":$sid;
                    $_SESSION['login_string'] = hash('sha512',
                        $db_password . $user_browser);
                    // Login successful.
                    return true;
                }else{
                    // Password is not correct
                    // We record this attempt in the database
                    echo "pass incoorct";
                    $now = time();
                    $mysqli->query("INSERT INTO tbl_login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        }
    }else {
        // No user exists.
        echo "dd";
        return false;
    }

}


function checkbrute($user_id, $mysqli){
    // Get timestamp of current time
    $now = time();

    // All login attempts are counted from the past 2 hours.
    $valid_attempts = $now - (2 * 60 * 60);

    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM tbl_login_attempts 
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);

        // Execute the prepared query.
        $stmt->execute();
        $stmt->store_result();

        // If there have been more than 5 failed logins
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}

?>

