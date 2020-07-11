<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 29/6/2020
 * Time: 7:28 PM
 */

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

echo "<pre>";
print_r($_GET);
echo "</pre>";
// khi chạy xuống dưới thì có nghĩa là kết nối CSDL thành công
echo "<br> Kết nối thành công đến CSDL";

if (isset($_GET['ID']) && ($_GET['ID'] > 0)){
    $id = (int) $_GET['ID'];
    $sql = "DELETE FROM book WHERE ID=$id";

    $ketquaSQL = mysqli_query($connection, $sql);

    if($ketquaSQL){
        echo "<br> xoá thành công";
        //header ("Location: 001.php");
        //exit;

    }else{
        echo "<br> Có lỗi xảy ra : " . mysqli_error($connection);
    }
}