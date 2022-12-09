<?php

$host = "localhost";
$dbname = "register_db";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname
);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_errno);
}else{
    $SELECT = "SELECT email From user Where email = ? Limit 1";
    $INSERT = "INSERT Into user (firstname, lastname, email, password_hash, gender, sourceIncome, income, phoneCode, phone, age)
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $mysqli->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;  

    if($rnum==0){
        $stmt->close();

        $stmt = $mysqli->prepare($INSERT);
        $stmt->bind_param("ssssssiisi",
                        $_POST["firstname"],
                        $_POST["lastname"],
                        $_POST["email"],
                        $password_hash,
                        $_POST["gender"],
                        $_POST["sourceIncome"],
                        $_POST["income"],
                        $_POST["phoneCode"],
                        $_POST["phone"],
                        $_POST["age"]
        );
        $stmt->execute();
        echo "Registration successfull!";
    }
    else{
        echo "Email already exists";
    }
    $stmt->close();
    $mysqli->close();
}

return $mysqli;