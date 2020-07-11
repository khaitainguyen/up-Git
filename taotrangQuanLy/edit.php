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


// gán $row là một mảng rỗng mặc định
$row = [];

//lấy query string trên  url và cụ thể là biến id trong query string
// query string chính là chuỗi xuất hiện đằng sau dấu ? trên url
//in ra query string

echo "<br> in ra query string từ URL :";
echo "<pre>";
print_r($_GET);
echo "</pre>";
if (isset($_GET['id'])){
    $book_id = (int) $_GET['id'];
    echo "<br> id của cuốn sách đang cần sửa : $book_id";

    $sql = "SELECT * FROM book WHERE id = $book_id";
    echo "<br> sql : $sql ";

    //thực hiện câu truy vấn sql mysqli_query
    //tham số 1 vần là tên biến chưa kết nối MYSQL
    //tham số 2 là câu ssql
    //két quả trả về $result
    $result = mysqli_query($connection, $sql);

    echo "<pre>";
    print_r($result);
    echo"</pre>";

    // chỉ có 1 kết quả duy nhất nên ko sử dụng while
    $row = mysqli_fetch_assoc($result);


    echo "<pre>";
    print_r($row);
    echo "</pre>";
    // đổ dữ liệu cũ vào các ô input
}

// cập nhật sữ liệu mưới và trong BD
if (isset($_POST) && !empty($_POST)){
    if (isset($_POST['book_name']) && isset($_POST['book_price']) && isset($_POST['book_desc'])){
        $book_name = $_POST['book_name'];
        $book_price = $_POST['book_price'];
        $book_desc = $_POST['book_desc'];
        $book_id = (int) $_GET['id'];
        $sqlUpdate = "UPDATE book SET book_name = '$book_name' , book_price = $book_priceesc = '$book_desc' WHERE id = $book_id\";
 , book_desc = '$book_desc' WHERE id = $book_id";

        echo "<br> sql update : $sqlUpdate";

        $ketquaSQL = mysqli_query($connection, $sqlUpdate);
        if ($ketquaSQL) {
            header("Location: edit.php?id=$book_id");
            exit;
        } else {
            echo "<br> Có lỗi xảy ra : " . mysqli_error($connection);
        }
    }
}

?>
<div class="container">
    <h1>Sửa 1 cuốn sách CNTT</h1>
    <div class="row">
        <div class="col-md-12">
            <form name="createbook" action="edit.php?id=<?php echo isset($row['id']) ? (int)$row['id'] : 0;  ?>" method="post">
                <div class="form-group">
                    <label>Tên cuốn sách:</label><?php echo isset($row['book_name']) ? $row['book_name'] : '';  ?>
                    <input type="text" class="form-control" name="book_name" value="<?php echo isset($row['book_name']) ? $row['book_name'] : '';  ?>">
                </div>
                <div class="form-group">
                    <label>Giá tiền:</label>
                    <input type="text" class="form-control" name="book_price" value="<?php echo isset($row['book_price']) ? $row['book_price'] : '';  ?>">
                </div>
                <div class="form-group">
                    <label>Mô tả:</label>
                    <textarea class="form-control" rows="5" name="book_price"><?php echo isset($row['book_desc']) ? $row['book_desc'] : '';  ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Sửa sách" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>