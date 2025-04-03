<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h3 class="text-primary mb-4">Thông tin chi tiết</h3>

    <table class="table table-borderless w-50">
        <tr>
            <th>Họ Tên:</th>
            <td><?php echo htmlspecialchars($sinhvien->HoTen); ?></td>
        </tr>
        <tr>
            <th>Giới Tính:</th>
            <td><?php echo htmlspecialchars($sinhvien->GioiTinh); ?></td>
        </tr>
        <tr>
            <th>Ngày Sinh:</th>
            <td><?php echo date('d/m/Y', strtotime($sinhvien->NgaySinh)); ?></td>
        </tr>
        <tr>
            <th>Hình:</th>
            <td>
                <img src="/KT2/app/public/images/<?php echo htmlspecialchars($sinhvien->Hinh); ?>" 
                     alt="Hình sinh viên" 
                     class="img-thumbnail" 
                     style="width: 200px; height: auto;">
            </td>
        </tr>
        <tr>
            <th>Ngành:</th>
            <td><?php echo htmlspecialchars($sinhvien->TenNganh); ?></td>
        </tr>
    </table>

    <a href="/KT2/SinhVien/edit/<?php echo $sinhvien->MaSV; ?>" class="btn btn-warning me-2">
        <i class="bi bi-pencil-fill"></i> Sửa
    </a>
    <a href="/KT2/SinhVien" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Quay lại danh sách
    </a>
</div>

<?php include 'app/views/shares/footer.php'; ?>
