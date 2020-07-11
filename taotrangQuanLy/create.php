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

// tạo dữ liệu mẫu cho các ô input để hiển thị ra khi mà validate thất bại
$book_name = $book_desc = $book_price = '';


$error = [];

echo '<br> Hiển thị mảng $_POST';
echo "<pre>";
print_r($_POST);
echo "</pre>";

if (isset($_POST) && !empty($_POST)) {
    if (isset($_POST['book_name']) && strlen($_POST['book_name']) > 5) {
        // trim cắt bỏ dấu cách ở hai đầu của chuỗi
        $book_name = trim($_POST['book_name']);
    } else {
        $error[] = "Tên sách không hợp lệ";
    }

    // is_numeric kiểm trả 1 biến có phải số nếu ko phải số thi trả về false
    if (isset($_POST['book_price']) && is_numeric($_POST['book_price']) && $_POST['book_price'] > 0) {
        $book_price = (int)$_POST['book_price'];
    } else {
        $error[] = "Giá cuốn sách không hợp lệ";
    }

    if (isset($_POST['book_desc']) && strlen($_POST['book_desc']) > 5) {
        // trim cắt bỏ dấu cách ở hai đầu của chuỗi
        $book_desc = trim($_POST['book_desc']);
    } else {
        $error[] = "Mô tả cuốn sách không hợp lệ";
    }

    if (empty($error)) {
        // không bị lỗi
        if (isset($book_name) && isset($book_price) && isset($book_desc)) {
            $sql = "INSERT INTO book(book_name,book_price,book_desc) VALUES ('$book_name',$book_price,'$book_desc')";
            echo "<br> câu SQL : " . $sql;


            // thực hiện câu query bằng php
            // bằng hàm mysqli_query()
            // trong đó tham số đầu tiên là tên biến chứa kết nối đến CSDL
            // tham só thứ 2 là biến chứa câu SQL
            $ketqua = mysqli_query($connection, $sql);

            // kiểm tra dữ liệu và giá trị $ketqua
            var_dump($ketqua);

            // cách viết này có nghĩa là if ($ketqua) khác false , null , rỗng , 0 , khác âm
            if ($ketqua) {
                // thành công chuyển hướng về trang 001.php
                // câu lệnh header là câu lệnh chuyển hướng url
                // truyền url theo cú pháp header("Location: $url");
                header("Location: 001.php");
                // sau header chuyển hướng thì phải exit
                exit;
            } else {
                // thất bại
                echo "<div style='color:red'>Thêm sách thất bại</div>";
            }
        }

    } else {
        // implode chuyển 1 mảng thành 1 chuỗi
        // tham số đầu tiền là ký tự phân tách của các phần tử trong mảng
        // khi chuyển thành chuỗi
        $error_string = implode(", ", $error);
        // hiển thị lỗi ra
        echo "<div style='color:red'>$error_string</div>";
    }
}


?>

<div class="container">
    <h1>Thêm mới 1 cuốn sách CNTT</h1>
    <div class="row">
        <div class="col-md-12">
            <form name="createbook" action="" method="post">
                <div class="form-group">
                    <label>Tên cuốn sách:</label>
                    <input type="text" class="form-control" name="book_name" value="<?php echo $book_name ?>">
                </div>
                <div class="form-group">
                    <label>Giá tiền:</label>
                    <input type="text" class="form-control" name="book_price" value="<?php echo $book_price ?>">
                </div>
                <div class="form-group">
                    <label>Mô tả:</label>
                    <textarea class="form-control" rows="5" name="book_desc"><?php echo $book_desc ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Thêm sách" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>