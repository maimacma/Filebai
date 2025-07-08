<!DOCTYPE html>
<?php
$con = require_once("connection.php");
$rowsPerPage = 5;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $rowsPerPage;
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
if ($search !== '') {
    $stmt = $con->prepare("SELECT COUNT(*) FROM NHANVIEN WHERE HOTEN LIKE ?");
    $stmt->execute(['%' . $search . '%']);
    $totalRows = $stmt->fetchColumn();
} else {
    $totalRows = $con->query("SELECT COUNT(*) FROM NHANVIEN")->fetchColumn();
}
$totalPages = ceil($totalRows / $rowsPerPage);
if ($search !== '') {
    $stmt = $con->prepare("SELECT * FROM NHANVIEN WHERE HOTEN LIKE ? LIMIT $rowsPerPage OFFSET $offset");
    $stmt->execute(['%' . $search . '%']);
    $dacoduieu = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $dulieuss = "SELECT * FROM NHANVIEN LIMIT $rowsPerPage OFFSET $offset";
    $dulieu = $con->query($dulieuss);
    $dacoduieu = $dulieu->fetchAll(PDO::FETCH_ASSOC);
}
$xoa = $_GET['xoa'] ?? null;
if(isset($_GET['xoa'])){
    if ($xoa === 'khongthanhcong') {
        echo "<script>alert('Xóa thành công');</script>";
    } else {
        echo "<script>alert('Xoá không thành công');</script>";
    }
}
?>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Danh sách nhân viên</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {
      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Danh sách nhân viên</h2>  
      <form class="d-flex" method="get" action="">
        <input class="form-control me-2" type="search" name="search" placeholder="Tìm theo tên" value="<?php echo htmlspecialchars($search); ?>">
        <button class="btn btn-outline-primary" type="submit">Tìm kiếm</button>
      </form>
    </div>

    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>Mã nv</th>
          <th>Họ tên</th>
          <th>Giới tính</th>
          <th>Ngày sinh</th>
          <th>Lương</th>
          <th>Mã Phòng</th>
          <th>Hình</th>
          <th>Ngày BC</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($dacoduieu as $hang):?>
        <tr>
          <td><?php echo $hang['MANV']?></td>
          <td><?php echo $hang['HOTEN']?></td>
          <td><?php echo $hang['GIOITINH']?></td>
          <td><?php echo $hang['NGAYSINH']?></td>
          <td><?php echo $hang['LUONG']?></td>
          <td><?php echo $hang['MAPHONG']?></td>
          <td><?php echo "<img src='./IMGLab04/".  $hang['HINH']. "' width='100'/>"?></td>
          <td><?php echo $hang['NGAYBC']?></td>
          <td>
            <button onclick="window.location.href='sua.php?manv=<?php echo $hang['MANV']; ?>'" type="button">Sửa</button>
            <button onclick="if(confirm('Bạn có chắc muốn xóa?')) window.location.href='xoa.php?manv=<?php echo $hang['MANV']; ?>'" type="button">Xóa</button>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

    <!-- PHÂN TRANG -->
    <nav>
      <ul class="pagination justify-content-center">
        <?php if($page > 1): ?>
          <li class="page-item">
            <a class="page-link" href="?<?php echo http_build_query(array_merge($_GET, ['page' => $page-1])); ?>">Trước</a>
          </li>
        <?php endif; ?>
        <?php for($i = 1; $i <= $totalPages; $i++): ?>
          <li class="page-item <?php if($i == $page) echo 'active'; ?>">
            <a class="page-link" href="?<?php echo http_build_query(array_merge($_GET, ['page' => $i])); ?>"><?php echo $i; ?></a>
          </li>
        <?php endfor; ?>
        <?php if($page < $totalPages): ?>
          <li class="page-item">
            <a class="page-link" href="?<?php echo http_build_query(array_merge($_GET, ['page' => $page+1])); ?>">Sau</a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
    <!-- HẾT PHÂN TRANG -->

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>