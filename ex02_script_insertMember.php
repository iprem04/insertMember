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
   

        <?php


        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];



        $sql = "INSERT INTO  tb_insertdt (fname, lname,email,password) VALUES ('$fname', '$lname', '$email','$password')";
        $result = $conn->exec($sql);


        if ($result !== false) {
            echo "สมัครสมาชิกเรียบร้อย";
        } else {
            echo "เกิดข้อผิดพลาดในการสมัครสมาชิก";
        }
        ?>
       
    </div>
</body>

</html>