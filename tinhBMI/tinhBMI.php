<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

//Tạo một mảng lỗi
$errors = [];

//câu lệnh điều kiện trong php tương tự câu lệnh điều trong js
    // isset() trong PHP để kiểm tra xem 1 biến hay 1 phần tử trong mảng có tồn
    // tại hay không
    // nếu tồn tại isset() trả về true
    // nếu không tồn tại thì trả về false
    // && toán từ AND thỏa mãn 2 điều kiện
if (isset($_POST['cannang']) && isset($_POST['chieucao']) ){
    $cannang = $_POST['cannang'];
    $chieucao = $_POST['chieucao'];
    if ($cannang > 0 && $chieucao > 0){
        $bmi = $cannang/($chieucao*$chieucao);
    }else {
        $errors[] = 'Chiều cao hay cân nặng không hợp lệ';
    }
}

if (isset($bmi)){
echo "<div style='color: red'>Chỉ số MBI là :$bmi</div>";

$phanloai = '';
    if($bmi > 0 && $bmi < 18.5){
        $phanloai = 'dưới chuẩn';
    }elseif ($bmi > 18.5 && $bmi <= 24.9){
        $phanloai = ' Bình thường';
    }elseif ($bmi >= 25 && $bmi <= 29.9){
        $phanloai = 'Thừ cân';
    }elseif ($bmi >= 29.9 && $bmi <= 34.9){
        $phanloai = 'béo phì cấp độ 1';
    }elseif ($bmi >= 34.9 && $bmi <= 39.9){
        $phanloai = 'béo phì cấp độ 2';
    }elseif ($bmi >= 40){
        $phanloai = 'béo phì cấp độ 3';
    }else{
        $phanloai = 'chỉ số bmi không hợp lệ';
    }
    echo "<div style =\"color:red\"> Phân loại theo BMI : $phanloai</div>";



}

?>


<pre>
    Làm bài toán tính chỉ số MNI bằng PHP
    Sử dụng kiến thức phương thức  POST giải bài này
    $_POST này lấy dữ liệu gửi đi từ form có methor="post
    khi 1 form có action="" thì nó sẽ gửi dữ liệu đến chính file đó
</pre>


<?php
// in ra thông báo lỗi nếu có
// count() trả về số phần tử của 1 mảng array trong php
if (isset($errors) && count($errors) > 0){
    // không thể in mảng bằng lệnh echo
    // chuyển 1 mảng thành 1 chuỗi bằng hàm implode()
    // implode('ký tự phân tách các phần tử của mảng', $mangPHP)
    echo"<pre>";
    print_r($errors);
    echo "</pre>";
    echo  "<div style='color: orange'>Thông báo lõi: " . implode(' <br>', $errors) . "</div>";


}
?>
<div>
    <form name="bmi" action="" method="post">
        <p>
            <label>Nhập chiều cao (mét)</label>
            <input name="chieucao" value="" type="text">
        </p>
        <p>
            <label>Nhập cân nặng (kg)</label>
            <input name="cannang" value=""type="text">
        </p>
        <p>
            <input type="submit" name="submit" value="Tính BMI">
        </p>

    </form>
</div>

</body>
</html>