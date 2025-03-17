<?php
// Kết nối cơ sở dữ liệu
$mysqli = new mysqli("localhost", "root", "", "test1");

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Lấy danh sách sinh viên
$sql = "SELECT * FROM SinhVien";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Sinh Viên</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #ffffff;
            padding: 20px 0;
            margin: 0;
            background-color: #343a40;
            font-size: 32px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        table {
            width: 90%;
            margin: 40px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 20px;
            text-align: center;
            border: 1px solid #dee2e6;
            color: #495057;
        }

        th {
            background-color: #007bff;
            color: #ffffff;
            font-size: 18px;
            text-transform: uppercase;
        }

        td {
            font-size: 16px;
        }

        img {
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-container {
            text-align: center;
            margin-bottom: 40px;
        }

        .btn {
            padding: 12px 28px;
            margin: 10px;
            font-size: 16px;
            text-decoration: none;
            color: white;
            border-radius: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-register {
            background-color: #28a745;
        }

        .btn-register:hover {
            background-color: #218838;
            transform: translateY(-3px);
        }

        .btn-login {
            background-color: #007bff;
        }

        .btn-login:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        .btn-hocphan {
            background-color: #17a2b8;
        }

        .btn-hocphan:hover {
            background-color: #138496;
            transform: translateY(-3px);
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        td a {
            margin: 0 5px;
        }

        td a.edit {
            color: #007bff;
        }

        td a.details {
            color: #17a2b8;
        }

        td a.delete {
            color: #dc3545;
        }

        td a.delete:hover {
            color: #c82333;
        }

        table tr:nth-child(even) {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <h1>Danh Sách Sinh Viên</h1>

    <div class="btn-container">
        <a href="add_student.php" class="btn btn-register">Thêm Sinh Viên</a> 
        <a href="hocphan.php" class="btn btn-hocphan">Học Phần</a>
        <a href="register.php" class="btn btn-register">Đăng Ký</a>
        <a href="login.php" class="btn btn-login">Đăng Nhập</a>
    </div>

    <table>
        <tr>
            <th>MaSV</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Ảnh</th>
            <th>Mã Ngành</th>
            <th>Chức Năng</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['MaSV']; ?></td>
                <td><?php echo $row['HoTen']; ?></td>
                <td><?php echo $row['GioiTinh']; ?></td>
                <td><?php echo $row['NgaySinh']; ?></td>
                <td><img src="data:image/jpeg;base64,<?php echo base64_encode($row['Hinh']); ?>" width="50" height="50"></td>
                <td><?php echo $row['MaNganh']; ?></td>
                <td>
                    <a href="edit_student.php?id=<?php echo $row['MaSV']; ?>" class="edit">Edit</a> |
                    <a href="details_student.php?id=<?php echo $row['MaSV']; ?>" class="details">Details</a> |
                    <a href="delete_student.php?id=<?php echo $row['MaSV']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>

<?php $mysqli->close(); ?>
