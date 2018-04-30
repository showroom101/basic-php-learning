<?php
    // เรียกใช้ไฟล์ เชื่อมต่อ  database
    include("conf/connect_db.php");
    // $insert_date = date("Y-m-d H:i:s");  
    $contact_name       = $_POST['Name'];
    $contact_email      = $_POST['Email'];
    $contact_phone      = $_POST['Phone'];
    $contact_message    = $_POST['Message'];


    $sql = "INSERT INTO tb_contact VALUES (NULL, '$contact_name', '$contact_email', '$contact_phone', '$contact_message', NOW(), NOW())";
    $query  = $conn->query($sql); //mysql_query($sql);
    if($query){
        echo "successfully <br>";
        echo "<a href='index.php'>ย้อนกลับ</a>";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
?>