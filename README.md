

<?php
$conn = mysqli_connect("localhost", "root", "", "QuanLySanPham");
mysqli_set_charset($conn, "utf8");
$loaiSP = isset($_GET['loai']) ? $_GET['loai'] : '';
$tuKhoa = isset($_GET['search']) ? $_GET['search'] : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 6;
$start = ($page - 1) * $limit;
$count_sql = "SELECT COUNT(*) AS total FROM SANPHAM sp JOIN NHAN_HIEU th ON sp.MaTH = th.MaTH WHERE (sp.TenSP LIKE '%$tuKhoa%')";
if ($loaiSP != '') {
    $count_sql .= " AND th.TenTH = '$loaiSP'";
}
$count_result = mysqli_query($conn, $count_sql);
$totalRow = mysqli_fetch_assoc($count_result)['total'];
$totalPage = ceil($totalRow / $limit);
$sql = "SELECT sp.*, th.TenTH FROM SANPHAM sp JOIN NHAN_HIEU th ON sp.MaTH = th.MaTH WHERE (sp.TenSP LIKE '%$tuKhoa%')";
if ($loaiSP != '') {
    $sql .= " AND th.TenTH = '$loaiSP'";
}
$sql .= " LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Sản Phẩm</title>
    <link rel="stylesheet" href=".\style.css">
</head>
<body>
<body style="padding: 0px 0px 0px 0px;margin: 0px 0px 0px 0px;">

<div style="background-color: darkturquoise;width: 100%;height: 10px;">
</div>
<div style="background-color: black;height: 78px;">
<img src="DuLieu/logo.png" />
</div>
<div class="" role="" aria-label="" style="padding-top: 5px;background-color: darkslategray;" >
    <a href="#" class="list-group-item list-group-item-action active" style="padding-left: 10px;padding-right: 10px;text-decoration: none;color: gray;">TRANG CHỦ</a> <a style="color:gray">|</a>
    <a href="#" class="list-group-item list-group-item-action" style="padding-left: 10px;padding-right: 10px;text-decoration: none;color: gray;">GIỚI THIỆU</a><a style="color:gray">|</a>
    <a href="#" class="list-group-item list-group-item-action disabled" style="padding-left: 10px;padding-right: 10px;text-decoration: none;color: gray;">TIN TỨC</a><a style="color:gray">|</a>
    <a href="#" class="list-group-item list-group-item-action disabled"style="padding-left: 10px;padding-right: 10px;text-decoration: none;color: gray;">QUẢN LÝ SẢN PHẦM</a><a style="color:gray">|</a>
    <button type="button" class="btn btn-primary" style="background-color: deepskyblue;border-radius: 5px;margin-left: 10px;margin-bottom: 5px;border:none;height: 30px;width:120px">🛒 Giỏ hàng <input type="text" readonly value="0" style="width: 10px;"/></button>
</div>
    <form method="GET" >
    
        <A style="font-weight: bold;color: black;font-family: Arial, Helvetica, sans-serif;padding-left: 15px;margin-top: 30px;">Loại sản phẩm:</A>
<br/>
        <select style="height: 30px;width: 200px;margin-left: 10px;padding-left: 10px;margin-right: 300px;">
            <option value="">Loại sản phẩm</option>
            <option value="Iphone" <?= $loaiSP=="Iphone"?"selected":"" ?>>Iphone</option>
            <option value="Macbook" <?= $loaiSP=="Macbook"?"selected":"" ?>>Macbook</option>
            <option value="Kingwear" <?= $loaiSP=="Kingwear"?"selected":"" ?>>Kingwear</option>
        </select>
        <input type="text" name="search" style="border-radius: 15px;border-color: black;height: 40px;width: 300px;" placeholder="Tìm kiếm sản phẩm..." value="<?php htmlspecialchars($tuKhoa) ?>">
        <button type="submit">Tìm</button>
    </form>

    <div class="product-list">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="product">
            <img src="DuLieu/<?= $row['HinhAnh'] ?>" alt="<?= $row['TenSP'] ?>">
            <h3><?= $row['TenSP'] ?></h3>
            <p><strong>Giá:</strong> <?= number_format($row['DonGia']) ?>₫</p>
            <p>Trả góp 0%</p>
        </div>
        <?php } ?>
    </div>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPage; $i++) {
            $active = ($i == $page) ? "active" : "";
            echo "<a class='$active' href='?page=$i&loai=$loaiSP&search=$tuKhoa'>$i</a>";
        } ?>
    </div>

    <footer>
        <p>All rights reserved, eBusiness Solutions Inc,2025. Equal opportunity empolyer.</p>
    </footer>
</body>
</html>
+
CREATE database quanlysanpham;
use quanlysanpham;
CREATE TABLE NHAN_HIEU (
    MaTH INT(5) NOT NULL,
    TenTH VARCHAR(50) NOT NULL,
    PRIMARY KEY (MaTH)
);

-- Tạo bảng SANPHAM
CREATE TABLE SANPHAM (
    MaSP INT(5) NOT NULL,
    TenSP VARCHAR(255) NOT NULL,
    HinhAnh CHAR(255),
    DonGia INT(10),
    SoLuong INT(10),
    MoTa VARCHAR(500),
    MaTH INT(5),
    PRIMARY KEY (MaSP),
    FOREIGN KEY (MaTH) REFERENCES NHAN_HIEU(MaTH)
);

-- Chèn dữ liệu mẫu vào bảng NHAN_HIEU
INSERT INTO NHAN_HIEU (MaTH, TenTH) VALUES
(2, 'Iphone'),
(5, 'Macbook'),
(6, 'Kingwear');

-- Chèn dữ liệu mẫu vào bảng SANPHAM
INSERT INTO SANPHAM (MaSP, TenSP, HinhAnh, DonGia, SoLuong, MoTa, MaTH) VALUES
(4, 'Iphone 14 pro max', 'iphone-14-002.jpg', 29500000, 5,
 'Iphone là điện thoại thông minh được sản xuất bởi Apple - một trong những tập đoàn công nghệ hàng đầu nước Mỹ...', 2),
(6, 'Đồng hồ Kingwear', 'dongho-Kingwear-GT88.jpg', 5500000, 12,
 'Đồng hồ Kingwear là một trong những chiếc đồng hồ thông minh đáng sở hữu nhất hiện nay...', 6),
(7, 'Macbook Air', 'huawei-macbook-14-2022-kv.jpg', 19500000, 22,
 'MacBook Air 13 inch có thiết kế tuyệt đẹp, màn hình Retina Truetone đẳng cấp và trải nghiệm bàn phím tuyệt vời nhất từ trước đến nay...', 5);
