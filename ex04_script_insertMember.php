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


        $fname = $_POST['fname']; //ชื่อที่เราดึงมาจากฟอร์ม
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    


        $sql = "INSERT INTO tb_insertdt (fname, lname,email,password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $fname);
        $stmt->bindParam(2, $lname);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $password);


        $result = $stmt->execute();



        // if ($result !== false) {
        //     echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
        // } else {
        //     echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล";
        // }

        // SweetAlert
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        if ($result) {

            echo '<script>
setTimeout(function() {
Swal.fire({
position: "center",
icon: "success",
title: "เพิ่มข้อมูลสําเร็จ",
showConfirmButton: false,
timer: 1500
}).then(function() {
window.location = "ex05_showMember.php"; // Redirect to.. ปรับแก้ชื่อไฟล์ตามที่ต้องการให้ไป
});
}, 1000);
</script>';
        } else {
            echo '<script>
setTimeout(function() {
Swal.fire({
position: "center",
icon: "error",
title: "เกิดข้อผิดพลาด",
showConfirmButton: false,
timer: 1500
}).then(function() {
window.location = "index.php"; // Redirect to.. ปรับแก้ชื่อไฟล์ตามที่ต้องการให้ไป
});
}, 1000);
</script>';
        }






        ?>
        <!-- <hr>
        <a href="index.php" class="btn btn-primary">กลับหน้าหลัก</a>
 -->

    </div>
</body>

</html>