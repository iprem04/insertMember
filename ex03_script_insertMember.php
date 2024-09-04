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


        $fname = $_POST['fname']; //ชื่อที่เราดึงมาจากฟอร์ม
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
     


        $sql = "INSERT INTO tb_insertdt(fname, lname,email,password) VALUES (:fname, :lname, :email,:password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fname',$fname);
        $stmt->bindParam(':lname',$lname);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
   

        $result = $stmt->execute();
     





        if ($result !== false) {
            echo "สมัครสมาชิกเรียบร้อย";
        } else {
            echo "เกิดข้อผิดพลาดในการสมัครสมาชิก";
        }
        ?>
        <hr>
        <a href="index.php" class="btn btn-primary">กลับหน้าหลัก</a>


    </div>
</body>

</html>