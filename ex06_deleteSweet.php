<?php
include('condb.php');

//ลบข้อมูล - ลบจริงๆ
if ( isset($_POST['user_id'])) {
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
