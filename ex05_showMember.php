<?php
require_once 'condb.php';
$sql = "SELECT * FROM tb_insertdt";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <h1>Member</h1>


        <div align="right">

            <a href="ex04_script_insertMember.php" class="btn btn-success  ">Add Member</a>
        </div>

        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $us) : ?>

                    <tr>

                        <td><?php echo $us['id']; ?></td>
                        <td><?php echo $us['fname']; ?></td>
                        <td><?php echo $us['lname']; ?></td>
                        <td><?php echo $us['email']; ?></td>
                        <td><?php echo $us['password']; ?></td>
                        <td>
                            <?php
                            if ($us['password'] == 1) {
                                echo "Admin";
                            } else {
                                echo "User";
                            }

                            ?>
                        </td>

                        <td>

                            <form action="ex07_form_updateMember.php" method="POST" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?php echo $us['id']; ?>">
                                <input type="submit" name="edit" value="Edit" class="btn btn-warning btn-sm">
                            </form>

                            <form action="ex06_deleteSweet_Member.php" method="POST" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?php echo $us['id']; ?>">
                                <!-- <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm"> -->
                                <button type="button" class="delete-button btn btn-danger btn btn-sm " data-user-id="<?php echo $us['id']; ?>">Delete</button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <a href="index.php">ย้อนกลับไปหน้าหลัก</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>

    <script>
        // ฟังก์ชันสาหรับแสดงกล่องยืนยัน ํ SweetAlert2
        function showDeleteConfirmation(userId) {
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: 'คุณจะไม่สามารถเรียกคืนข้อมูลกลับได ้!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ลบ',
                cancelButtonText: 'ยกเลิก',
            }).then((result) => {
                if (result.isConfirmed) {
                    // หากผู้ใชยืนยัน ให ้ส ้ งค่าฟอร์มไปยัง ่ delete.php เพื่อลบข ้อมูล
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'ex06_deleteSweet_Member.php';
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'user_id';
                    input.value = userId;
                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
        // แนบตัวตรวจจับเหตุการณ์คลิกกับองค์ปุ่ มลบทั้งหมดที่มีคลาส delete-button
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const userId = button.getAttribute('data-user-id');
                showDeleteConfirmation(userId);
            });
        });
    </script>

    <script>
        let table = new DataTable('#myTable');
    </script>

</body>

</html>