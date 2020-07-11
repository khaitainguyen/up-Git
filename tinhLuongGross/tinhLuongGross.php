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
//
// tạo ra 2 biến mặc định
$thu_nhap = '';
$so_nguoi_phu_thuoc = '';


// mảng thuế thu nhập cá nhân
$taxs = [
    ['title' => 'Đến 5 triệu VNĐ', 'tax' => 5, 'money' => 0],
    ['title' => 'Trên 5 triệu VNĐ đến 10 triệu VNĐ', 'tax' => 10, 'money' => 0],
    ['title' => 'Trên 10 triệu VNĐ đến 18 triệu VNĐ', 'tax' => 15, 'money' => 0],
    ['title' => 'Trên 18 triệu VNĐ đến 32 triệu VNĐ', 'tax' => 20, 'money' => 0],
    ['title' => 'Trên 32 triệu VNĐ đến 52 triệu VNĐ	', 'tax' => 25, 'money' => 0],
    ['title' => 'Trên 52 triệu VNĐ đến 80 triệu VNĐ	', 'tax' => 30, 'money' => 0],
    ['title' => 'Trên 80 triệu VNĐ', 'tax' => 35, 'money' => 0],

];


function getMoneyTax($thu_nhap_chiu_thue, $taxs) {
    $tong_thue = 0;

    $kq = [];

    if ($thu_nhap_chiu_thue > 0) {
        if ($thu_nhap_chiu_thue > 5000000) {
            $thue_muc_1 = 5000000*5/100;
            $taxs[0]['money'] = $thue_muc_1;
            $tong_thue += $thue_muc_1;
            $thu_nhap_chiu_thue = $thu_nhap_chiu_thue-5000000;
        } else {
            $thue_muc_1 = $thu_nhap_chiu_thue*5/100;
            $taxs[0]['money'] = $thue_muc_1;
            $tong_thue += $thue_muc_1;

            $kq['taxs'] = $taxs;
            $kq['tong_thue'] = $tong_thue;
            return $kq;
        }

        if ($thu_nhap_chiu_thue > 5000000) {
            $thue_muc_2 = 5000000*10/100;
            $taxs[1]['money'] = $thue_muc_2;
            $tong_thue += $thue_muc_2;
            $thu_nhap_chiu_thue = $thu_nhap_chiu_thue-5000000;
        } else {
            $thue_muc_2 = $thu_nhap_chiu_thue*10/100;
            $taxs[1]['money'] = $thue_muc_2;
            $tong_thue += $thue_muc_2;
            $kq['taxs'] = $taxs;
            $kq['tong_thue'] = $tong_thue;
            return $kq;
        }

        if ($thu_nhap_chiu_thue > 8000000) {
            $thue_muc_3 = 8000000*15/100;
            $taxs[2]['money'] = $thue_muc_3;
            $tong_thue += $thue_muc_3;
            $thu_nhap_chiu_thue = $thu_nhap_chiu_thue-8000000;
        } else {
            $thue_muc_3 = $thu_nhap_chiu_thue*15/100;
            $taxs[2]['money'] = $thue_muc_3;
            $tong_thue += $thue_muc_3;
            $kq['taxs'] = $taxs;
            $kq['tong_thue'] = $tong_thue;
            return $kq;
        }

        if ($thu_nhap_chiu_thue > 14000000) {
            $thue_muc_4 = 14000000*20/100;
            $taxs[3]['money'] = $thue_muc_4;
            $tong_thue += $thue_muc_4;
            $thu_nhap_chiu_thue = $thu_nhap_chiu_thue-14000000;
        } else {
            $thue_muc_4 = $thu_nhap_chiu_thue*20/100;
            $taxs[3]['money'] = $thue_muc_4;
            $tong_thue += $thue_muc_4;
            $kq['taxs'] = $taxs;
            $kq['tong_thue'] = $tong_thue;
            return $kq;
        }

        if ($thu_nhap_chiu_thue > 20000000) {
            $thue_muc_5 = 20000000*25/100;
            $taxs[4]['money'] = $thue_muc_5;
            $tong_thue += $thue_muc_5;
            $thu_nhap_chiu_thue = $thu_nhap_chiu_thue-20000000;
        } else {
            $thue_muc_5 = $thu_nhap_chiu_thue*25/100;
            $taxs[4]['money'] = $thue_muc_5;
            $tong_thue += $thue_muc_5;
            $kq['taxs'] = $taxs;
            $kq['tong_thue'] = $tong_thue;
            return $kq;
        }

        if ($thu_nhap_chiu_thue > 28000000) {
            $thue_muc_6 = 28000000*30/100;
            $taxs[5]['money'] = $thue_muc_6;
            $tong_thue += $thue_muc_6;
            $thu_nhap_chiu_thue = $thu_nhap_chiu_thue-28000000;
        } else {
            $thue_muc_6 = $thu_nhap_chiu_thue*30/100;
            $taxs[5]['money'] = $thue_muc_6;
            $tong_thue += $thue_muc_6;
            $kq['taxs'] = $taxs;
            $kq['tong_thue'] = $tong_thue;
            return $kq;
        }

        if ($thu_nhap_chiu_thue > 0) {
            $thue_muc_7 = $thu_nhap_chiu_thue*35/100;
            $taxs[6]['money'] = $thue_muc_7;
            $tong_thue += $thue_muc_7;
            $kq['taxs'] = $taxs;
            $kq['tong_thue'] = $tong_thue;
            return $kq;
        }
    }

    $kq['taxs'] = $taxs;
    $kq['tong_thue'] = $tong_thue;
    return $kq;
}


// xây dựng hàm
function grossToNet($input = ['gross' => 0, 'bhxh' => 0.08, 'bhyt' => 0.015, 'bhtn' => 0.01, 'so_nguoi_phu_thuoc' => 0, 'giam_tru_ca_nhan' => 9000000, 'giam_tru_moi_nguoi_phu_thuoc' => 3600000]) {


    $dataReturn = [];
    $net = 0;

    if (isset($input['gross']) && isset($input['bhxh']) && isset($input['bhyt']) && isset($input['bhtn'])
        && isset($input['so_nguoi_phu_thuoc']) && isset($input['giam_tru_ca_nhan']) && isset($input['giam_tru_moi_nguoi_phu_thuoc'])) {
        // đủ input để tính toán

        // lương gross
        $gross = $input['gross'];
        $tax_bhxh = $input['bhxh'];
        $tax_bhyt = $input['bhyt'];
        $tax_bhtn = $input['bhtn'];
        $so_nguoi_phu_thuoc = $input['so_nguoi_phu_thuoc'];
        $giam_tru_ca_nhan = $input['giam_tru_ca_nhan'];
        $giam_tru_moi_nguoi_phu_thuoc = $input['giam_tru_moi_nguoi_phu_thuoc'];

        // số tiền phải đóng bảo hiểm xã hội
        $money_bhxh = $tax_bhxh*$gross;

        // số tiền phải đóng bảo hiểm y tế
        $money_bhyt = $tax_bhyt*$gross;

        // số tiền phải đóng bảo hiểm thất nghiệp
        $money_bhtn = $tax_bhtn*$gross;

        // tổng số tiền phải đóng cho bảo hiểm
        $tong_bao_hiem = $money_bhxh + $money_bhyt + $money_bhtn;

        // tính thu nhập trước thuế
        $thu_nhap_truoc_thue = $gross - $tong_bao_hiem;

        // giảm trừ gia cảnh người phụ thuộc
        $giam_tru_phu_thuoc = $so_nguoi_phu_thuoc*$giam_tru_moi_nguoi_phu_thuoc;

        // thu nhập chịu thuế là
        $thu_nhap_chiu_thue = $gross - ($tong_bao_hiem + $giam_tru_phu_thuoc + $giam_tru_ca_nhan);

        // thu nhập trước thuế
        $thu_nhap_truoc_thue = $gross - $tong_bao_hiem;


        // mảng thuế thu nhập cá nhân
        $taxs = [
            ['title' => 'Đến 5 triệu VNĐ', 'tax' => 5, 'money' => 0],
            ['title' => 'Trên 5 triệu VNĐ đến 10 triệu VNĐ', 'tax' => 10, 'money' => 0],
            ['title' => 'Trên 10 triệu VNĐ đến 18 triệu VNĐ', 'tax' => 15, 'money' => 0],
            ['title' => 'Trên 18 triệu VNĐ đến 32 triệu VNĐ', 'tax' => 20, 'money' => 0],
            ['title' => 'Trên 32 triệu VNĐ đến 52 triệu VNĐ	', 'tax' => 25, 'money' => 0],
            ['title' => 'Trên 52 triệu VNĐ đến 80 triệu VNĐ	', 'tax' => 30, 'money' => 0],
            ['title' => 'Trên 80 triệu VNĐ', 'tax' => 35, 'money' => 0],
        ];

        // thuế thu nhập phải đóng
        $tax_return = getMoneyTax($thu_nhap_chiu_thue, $taxs);
        $thue = $tax_return['tong_thue'];
        $net = $gross - ($tong_bao_hiem + $thue);

        $dataReturn['bhxh'] = $money_bhxh;
        $dataReturn['bhyt'] = $money_bhyt;
        $dataReturn['bhtn'] = $money_bhtn;
        $dataReturn['tong_bao_hiem'] = $tong_bao_hiem;
        $dataReturn['thue'] = $thue;
        $dataReturn['thu_nhap_truoc_thue'] = $thu_nhap_truoc_thue;
        $dataReturn['thu_nhap_chiu_thue'] = $thu_nhap_chiu_thue;
        $dataReturn['giam_tru_phu_thuoc'] = $giam_tru_phu_thuoc;
        $dataReturn['taxs'] = $tax_return['taxs'];
        $dataReturn['net'] = $net;

        return $dataReturn;
    }

    return false;

}





// isset() kiểm tra xem có tồn tại hay không
// !empty() kiểm tra xem có rỗng hay không
// !empty() trả về true nêu không rỗng và trả về false nếu có rỗng
if (isset($_POST) && !empty($_POST)) {
    $thu_nhap = isset($_POST['thu_nhap']) ? (int)$_POST['thu_nhap'] : 0;
    $so_nguoi_phu_thuoc = isset($_POST['so_nguoi_phu_thuoc']) ? (int)$_POST['so_nguoi_phu_thuoc'] : 0;


    $luong_gross = $thu_nhap;


    $inputData = [];
    $inputData['gross'] = $luong_gross;
    $inputData['bhxh'] = 8/100;
    $inputData['bhyt'] = 1.5/100;
    $inputData['bhtn'] = 1/100;
    $inputData['so_nguoi_phu_thuoc'] = $so_nguoi_phu_thuoc;
    $inputData['giam_tru_ca_nhan'] = 9000000;
    $inputData['giam_tru_moi_nguoi_phu_thuoc'] = 3600000;
    $ketqua = grossToNet($inputData);

    echo "<pre>";
    print_r($ketqua);
    echo "</pre>";

    var_dump($ketqua);
}



?>

<div class="container">
    <div class="row">
        <h1>Công cụ tính lương Gross sang Net / Net sang Gross chuẩn 2020</h1>
        <form name="gross" action="" method="post">
            <div class="form-group">
                <label for="thunhap" style="color: red">Thu nhập : chỉ nhập từ 0 đến 29800000</label>
                <input type="text" name="thu_nhap" class="form-control" placeholder="Nhập thu nhập" id="thunhap" autocomplete="off" value="<?php echo $thu_nhap ?>">
            </div>
            <div class="form-group">
                <label for="so_nguoi_phu_thuoc">Số người phụ thuộc :</label>
                <input type="text" name="so_nguoi_phu_thuoc" class="form-control" placeholder="Số người phụ thuộc" id="so_nguoi_phu_thuoc" value="<?php echo $so_nguoi_phu_thuoc ?>">
            </div>

            <button type="submit" class="btn btn-primary">GROSS -> NET</button>
        </form>
    </div>
</div>

<div class="container" style="margin-top: 20px">
    <div class="row">
        <table class="table">

            <thead>
            <tr>
                <th>Lương Gross</th>
                <th>Bảo hiểm</th>
                <th>Thuế TNCN</th>
                <th>Lương Net</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <?php echo isset($luong_gross) ? number_format($luong_gross) . ' VND' : ''; ?>
                </td>
                <td>
                    <?php echo isset($ketqua['tong_bao_hiem']) ? number_format($ketqua['tong_bao_hiem']) . ' VND' : ''; ?>
                </td>
                <td>
                    <?php echo isset($ketqua['thue']) ? number_format($ketqua['thue']) . ' VND' : ''; ?>
                </td>
                <td>
                    <?php echo isset($ketqua['net']) ? number_format($ketqua['net']) . ' VND' : ''; ?>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</div>


<div class="container" style="margin-top: 20px">
    <div class="row">
        <h2>Diễn giải chi tiết</h2>
        <table class="table">

            <tbody>
            <tr>
                <td>Lương GROSS</td>
                <td><?php echo isset($luong_gross) ? number_format($luong_gross) . ' VND' : ''; ?></td>
            </tr>

            <tr>
                <td>Bảo hiểm xã hội (8%)</td>
                <td><?php echo isset($ketqua['bhxh']) ? number_format($ketqua['bhxh']) . ' VND' : ''; ?></td>
            </tr>

            <tr>
                <td>Bảo hiểm y tế (1.5%)</td>
                <td><?php echo isset($ketqua['bhyt']) ? number_format($ketqua['bhyt']) . ' VND' : ''; ?></td>
            </tr>

            <tr>
                <td>Bảo hiểm thất nghiệp (1%)</td>
                <td><?php echo isset($ketqua['bhtn']) ? number_format($ketqua['bhtn']) . ' VND' : ''; ?></td>
            </tr>



            <tr>
                <td>Thu nhập trước thuế	</td>
                <td><?php echo isset($ketqua['thu_nhap_truoc_thue']) ? number_format($ketqua['thu_nhap_truoc_thue']) . ' VND' : ''; ?></td>
            </tr>


            <tr>
                <td>Giảm trừ gia cảnh bản thân	</td>
                <td> <?php echo number_format(9000000) . ' VND'; ?> </td>
            </tr>


            <tr>
                <td>Giảm trừ gia cảnh người phụ thuộc</td>
                <td><?php echo isset($ketqua['giam_tru_phu_thuoc']) ? number_format($ketqua['giam_tru_phu_thuoc']) . ' VND' : ''; ?></td>
            </tr>

            <tr>
                <td>Thu nhập chịu thuế	</td>
                <td><?php echo isset($ketqua['thu_nhap_chiu_thue']) ? number_format($ketqua['thu_nhap_chiu_thue']) . ' VND' : ''; ?></td>
            </tr>

            <tr>
                <td>Thuế thu nhập cá nhân(*)</td>
                <td><?php echo isset($ketqua['thue']) ? number_format($ketqua['thue']) . ' VND' : ''; ?></td>
            </tr>


            <tr>
                <td>
                    Lương NET <br>
                    (Thu nhập trước thuế - Thuế thu nhập cá nhân)
                </td>
                <td><?php echo isset($ketqua['net']) ? number_format($ketqua['net']) . ' VND' : ''; ?></td>
            </tr>



            </tbody>
        </table>
    </div>
</div>


<div class="container" style="margin-top: 20px">
    <div class="row">
        <h2>(*) Chi tiết thuế thu nhập cá nhân (VNĐ)</h2>
        <table class="table">

            <thead>
            <tr>
                <th>Mức chịu thuế</th>
                <th>Thuế suất</th>
                <th>Tiền nộp</th>
            </tr>
            </thead>

            <tbody>

            <?php if(isset($ketqua['taxs'])) : ?>
                <?php foreach($ketqua['taxs'] as $taxItem) : ?>
                    <tr>
                        <td><?php echo $taxItem['title'] ?></td>
                        <td><?php echo $taxItem['tax'] ?>%</td>
                        <td><?php echo number_format($taxItem['money'])  ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>


            </tbody>
        </table>
    </div>
</div>



<div class="container" style="margin-top: 20px">
    <div class="row">
        <h2>Người sử dụng lao động trả (VNĐ)</h2>
        <table class="table">

            <tbody>
            <tr>
                <td>Lương GROSS</td>
                <td></td>
            </tr>

            <tr>
                <td>Bảo hiểm xã hội (17%)	</td>
                <td></td>
            </tr>

            <tr>
                <td>Bảo hiểm Tai nạn lao động - Bệnh nghề nghiệp (0.5%)	</td>
                <td></td>
            </tr>

            <tr>
                <td>Bảo hiểm y tế (3%)	</td>
                <td></td>
            </tr>



            <tr>
                <td>Bảo hiểm thất nghiệp (1%)	</td>
                <td></td>
            </tr>


            <tr>
                <td>Tổng cộng</td>
                <td></td>
            </tr>




            </tbody>
        </table>
    </div>
</div>




</body>
</html>