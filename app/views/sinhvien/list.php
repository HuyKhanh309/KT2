<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">THÔNG TIN SINH VIÊN</h2>
    
    <div class="text-end mb-3">
        <a href="/KT2/SinhVien/add" class="btn btn-success">THÊM SINH VIÊN</a>
    </div>

    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-danger">
            <tr>
                <th>Mã Sinh Viên</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>Ngày Sinh</th>
                <th>Ngành</th>
                <th>Hình</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinhviens as $sv): ?>
                <tr>
                    <td><?php echo htmlspecialchars($sv->MaSV); ?></td>
                    <td><?php echo htmlspecialchars($sv->HoTen); ?></td>
                    <td><?php echo htmlspecialchars($sv->GioiTinh); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($sv->NgaySinh)); ?></td>
                    <td><?php echo htmlspecialchars($sv->TenNganh); ?></td>
                    <td>
                        <img src="/KT2/app/public/images/<?php echo htmlspecialchars($sv->Hinh); ?>" 
                            alt="Hình SV" 
                            class="img-thumbnail" 
                            style="width: 150px; height: auto;">
                    </td>

                    <td>
                        <a href="/KT2/SinhVien/edit/<?php echo $sv->MaSV; ?>" class="btn btn-sm btn-warning me-1">
                            <i class="bi bi-pencil-fill"></i> Sửa
                        </a>
                        
                        <a href="/KT2/SinhVien/show/<?php echo $sv->MaSV; ?>" class="btn btn-sm btn-info me-1">
                            <i class="bi bi-eye-fill"></i> Chi tiết
                        </a>

                        <a href="/KT2/SinhVien/delete/<?php echo $sv->MaSV; ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?');">
                            <i class="bi bi-trash-fill"></i> Xóa
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Phân trang -->
    <nav>
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<?php include 'app/views/shares/footer.php'; ?>
