<?php
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];

    //Database connection
    //$conn = new mysqli("sql6.freemysqlhosting.net","sql6461531","8Ic2DsitKp","sql6461531");
    $conn = new mysqli('localhost','root','','portfolio');
    if($conn->connect_error){
        die("Failed to conect : ".$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO contact(firstname, email, subject, description)
        values(?,?,?,?)");
        $stmt->bind_param("ssss",$firstname, $email, $subject, $description);
        $stmt->execute();
        echo "Message sent.....";
        $stmt->close();
        $conn->close();
    }
?>