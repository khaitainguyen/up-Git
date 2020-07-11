<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<?php
/**
 * Cách kết nối đến CSDL mysql theo hướng hàm
 * function
 */

// tên máy chủ CSDL hay IP của nó
// nếu gõ ip ở localhost có thể 127.0.0.1
$serverName = "localhost";
// username truy cập đến mysql
$userName = "root";
// password truy cập đến mysql
$password = "";
// tên cơ sở dữ liệu
$databaseName = "book";

// tạo ra 1 kết nối đến CSDL
$connection = mysqli_connect($serverName, $userName, $password, $databaseName);

// kiểm tra kết nối đến CSDl có thành công không
// khi viết thế này có thể hiểu là $connection chứa giá trị có thể là false hay null , hay 0 hoặc rỗng ''
if (!$connection) {
    // không kết nối được đến CSDL
    die("Không thể kết nối đến CSDL " . mysqli_connect_error());
}


// khi chạy xuống dưới thì có nghĩa là kết nối CSDL thành công
echo "Kết nối thành công đến CSDL";

?>
<div class="container">
    <h1>Thông tin chi tiết</h1>
    <div class="row">
        <div class="col-md-12">
            <p>
                Id sách :
            </p>
            <p>
                Tên sách :
            </p>
            <p>
                Giá tiền :
            </p>
            <p>
                Mô tả :
            </p>

        </div>

    </div>

</div>
</body>
</html>