<?php
    // เรียกใช้ไฟล์ เชื่อมต่อ  database
    include("conf/connect_db.php");
    
    $contact_id = $_GET['id'];

    $sql    = "DELETE FROM tb_contact WHERE contact_id = '".$contact_id."'";
    $query  = $conn->query($sql); 
    if($query){
        echo "successfully <br>";
        echo "<a href='index.php'>ย้อนกลับ</a>";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
?>