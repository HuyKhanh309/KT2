<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h3 class="text-primary mb-4">DANH SÁCH HỌC PHẦN</h3>

    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>Mã Học Phần</th>
                <th>Tên Học Phần</th>
                <th>Số Tín Chỉ</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hocphans as $hp): ?>
                <tr>
                    <td><?php echo htmlspecialchars($hp->MaHP); ?></td>
                    <td><?php echo htmlspecialchars($hp->TenHP); ?></td>
                    <td><?php echo $hp->SoTinChi; ?></td>
                    <td>
                        <a href="/KT2/DangKy/create/<?php echo $hp->MaHP; ?>" class="btn btn-success btn-sm">
                            Đăng Kí
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'app/views/shares/footer.php'; ?>
