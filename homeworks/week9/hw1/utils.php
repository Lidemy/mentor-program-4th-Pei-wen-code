<?php
    require_once('conn.php');

    function generateToken() {
        $s = '';
        for($i = 1; $i<=16; $i++) {
            $s .= chr(rand(65, 90));
        }
        return $s;
    }

    function getUserFromUsername($username) {
        global $conn;
        // $sql = sprintf("SELECT username From tokens WHERE token = '%s'", $token);
        // $result = $conn->query($sql);
        // $row = $result->fetch_assoc();
        // $username = $row['username'];

        $sql = sprintf("SELECT * From peipei_users WHERE username = '%s'", $username);
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;// nickname username id
    }
?>