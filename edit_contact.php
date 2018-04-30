<?php
    // เรียกใช้ไฟล์ เชื่อมต่อ  database
    include("conf/connect_db.php");
    
    $contact_id         = $_POST['contact_id'];
    $contact_name       = $_POST['Name'];
    $contact_email      = $_POST['Email'];
    $contact_phone      = $_POST['Phone'];
    $contact_message    = $_POST['Message'];


    $sql = "UPDATE tb_contact SET contact_name='$contact_name', contact_email='$contact_email', contact_phone='$contact_phone', contact_message='$contact_message', updated_at=NOW() WHERE contact_id = '".$contact_id."'";
    $query  = $conn->query($sql); 
    if($query){
        echo "successfully <br>";
        echo "<a href='index.php'>ย้อนกลับ</a>";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
?>