<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h3 class="text-primary mb-4">Hiệu chỉnh thông tin sinh viên</h3>

    <form action="/KT2/SinhVien/update" method="POST" enctype="multipart/form-data" class="w-50">
        <!-- Mã SV (không chỉnh sửa) -->
        <input type="hidden" name="MaSV" value="<?php echo $sinhvien->MaSV; ?>">

        <div class="mb-3">
            <label for="HoTen" class="form-label">Họ Tên</label>
            <input type="text" name="HoTen" class="form-control" 
                   value="<?php echo htmlspecialchars($sinhvien->HoTen); ?>" required>
        </div>

        <div class="mb-3">
            <label for="GioiTinh" class="form-label">Giới Tính</label>
            <input type="text" name="GioiTinh" class="form-control" 
                   value="<?php echo htmlspecialchars($sinhvien->GioiTinh); ?>" required>
        </div>

        <div class="mb-3">
            <label for="NgaySinh" class="form-label">Ngày Sinh</label>
            <input type="date" name="NgaySinh" class="form-control"
                   value="<?php echo date('Y-m-d', strtotime($sinhvien->NgaySinh)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="Hinh" class="form-label">Hình ảnh</label>
            <input type="file" name="Hinh" class="form-control mb-2" accept="image/*">
            <img src="/KT2/app/public/images/<?php echo htmlspecialchars($sinhvien->Hinh); ?>" 
                 alt="Hình cũ" class="img-thumbnail" style="width: 150px;">
            <!-- Giữ tên hình cũ nếu không upload mới -->
            <input type="hidden" name="HinhCu" value="<?php echo htmlspecialchars($sinhvien->Hinh); ?>">
        </div>

        <div class="mb-3">
            <label for="MaNganh" class="form-label">Ngành học</label>
            <select name="MaNganh" class="form-select" required>
                <?php foreach ($nganhhocs as $nganh): ?>
                    <option value="<?php echo $nganh->MaNganh; ?>"
                        <?php if ($nganh->MaNganh == $sinhvien->MaNganh) echo 'selected'; ?>>
                        <?php echo $nganh->TenNganh; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="/KT2/SinhVien" class="btn btn-secondary ms-2">Back to List</a>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>
