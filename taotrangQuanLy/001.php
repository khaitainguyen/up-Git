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


$sql = "SELECT * FROM book";

// thực hiện câu truy vấn sql mysqli_query
// tham số 1 vần là tên biến chưa kết nối MYSQL
// tham só 2 là câu ssql
// kết quả truy vấn trả về $result
$result = mysqli_query($connection, $sql);

echo "<pre>";
print_r($result);
echo "</pre>";

?>

<div class="container">
    <h1>Quản lý sách CNTT</h1>
    <a href="" class="btn btn-info">Thêm sách mới</a>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th> ID</th>
                    <th>Tên sách</th>
                    <th>Giá tiền</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>


                <?php
                // mysqli_num_rows() trả về số bản ghi của $result
                if (mysqli_num_rows($result) > 0) {
                    /**
                     * mysqli_fetch_assoc($result) lấy ra từng phần tử trong biến
                     * $result gán cho $row cứ như thế cho đến khi $result
                     * không còn dữ liệu
                     * chú ý mỗi lần chạy vòng lặp  mysqli_fetch_assoc($result) chỉ
                     * trả về 1 bản ghi duy nhất
                     *
                     */
                    while($row = mysqli_fetch_assoc($result)) { // ngoặc nhọn mở
                        echo "<pre>";
                        print_r($row);
                        echo "</pre>"; ?>

                        <tr>
                            <td><?php echo $row['ID'] ?></td>
                            <td><?php echo $row['book_name'] ?></td>
                            <td><?php echo $row['book_price'] ?></td>
                            <td><?php echo $row['book_desc'] ?></td>
                            <td>
                                <a href="edit.php?ID=<?php echo $row['ID']?>" class="btn btn-warning">Sửa</a>
                                <a href="delete.php?ID=<?php echo $row['ID']?>" class="btn btn-danger deleteBook">Xóa</a>
                            </td>
                        </tr>
                        <?php
                    } // ngoặc nhọn đóng của vòng lặp while
                    ?>

                    <?php
                } else {
                    ?> Không tìm thấy bản ghi nào phù hợp <?php
                }
                ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".deleteBook").on("click", function (e) {

            // thẻ a khi click vào nó chuyển hướng ngay lập tức
            // chặn sự kiện chuyển hướng mặc định của thẻ a thì
            // phải sử dụng e.preventDefault();
            e.preventDefault();

            var r = confirm("Đồng ý xoá sách !");
            //ấn oke để xác nhận
            if (r == true){
                var href = $(this).attr("href");
                window.location.href = href;
            }
        });
    });
    
</script>
</body>
</html>