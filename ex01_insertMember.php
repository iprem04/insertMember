<?php
include('header.php');
include('condb.php');
include('footer.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert member</title>
</head>

<body>
    <div class="container">
        <h1>Insert User</h1>

        <?php


        $fname = "Prem";
        $lname = "Yimjaidee";
        $email = "654230053@webmail.npru.ac.th";
        $password = "12345";
  


        $sql = "INSERT INTO  tb_insertdt (fname, lname,email,password ) VALUES ('$fname', '$lname', '$email','$password')";
        $result = $conn->exec($sql);


        if ($result !== false) {
            echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล";
        }
        ?>
        <hr>
        <a href="index.php" class="btn btn-primary">กลับหน้าหลัก</a>

    
    </div>
</body>

</html>