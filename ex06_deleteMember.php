<?php
include('condb.php');
//แสดงข้อมูลที่เราเลือกมาลบ
if (isset($_POST['delete']) && isset($_POST['user_id'])) {

    $u_id = $_POST['user_id'];

    try {

        // เรียกดูข้อมูลของนักเรียนที่จะลบ
        $sql = "SELECT * FROM tb_insertdt WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $u_id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC); //ดึงข้อมูล
        // แสดงข้อความยืนยันลบข้อมูล
        echo "Are you sure you want to delete<br>";
        echo "ID: " . $user['id'] . "<br>";
        echo "First Name: " . $user['fname'] . "<br>";
        echo "Last Name: " . $user['lname'] . "<br>";
        // สร้างปุ่มยืนยันลบข้อมูล
        echo "<form action='ex06_deleteMember.php' method='POST'>";
        echo "<input type='hidden' name='user_id' value='$u_id'>";
        echo "<input type='submit' name='confirm_delete' value='Confirm Delete'>";
        echo "</form>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


//ลบข้อมูล - ลบจริงๆ
if (isset($_POST['confirm_delete']) && isset($_POST['user_id'])) {
    $u_id = $_POST['user_id'];

    try {

        $sql = "DELETE FROM tb_insertdt WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $u_id);
        $stmt->execute();

        echo "Data deleted successfully.";
        header("Location: ex05_showMember.php"); // Redirect to ... ปรับแก้ชื่อไฟล์ตามที่ต้องการให้ไป
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
