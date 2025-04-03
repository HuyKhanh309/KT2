<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h3 class="text-primary mb-4">THÊM SINH VIÊN</h3>

    <form action="/KT2/SinhVien/save" method="POST" enctype="multipart/form-data" class="w-50">
        <div class="mb-3">
            <label for="MaSV" class="form-label">Mã SV</label>
            <input type="text" name="MaSV" id="MaSV" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="HoTen" class="form-label">Họ Tên</label>
            <input type="text" name="HoTen" id="HoTen" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="GioiTinh" class="form-label">Giới Tính</label>
            <input type="text" name="GioiTinh" id="GioiTinh" class="form-control" placeholder="Nam hoặc Nữ" required>
        </div>

        <div class="mb-3">
            <label for="NgaySinh" class="form-label">Ngày Sinh</label>
            <input type="date" name="NgaySinh" id="NgaySinh" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Hinh" class="form-label">Hình ảnh</label>
            <input type="file" name="Hinh" id="Hinh" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="MaNganh" class="form-label">Ngành</label>
            <select name="MaNganh" id="MaNganh" class="form-select" required>
                <option value="">-- Chọn ngành học --</option>
                <?php foreach ($nganhhocs as $nganh): ?>
                    <option value="<?php echo $nganh->MaNganh; ?>">
                        <?php echo $nganh->TenNganh; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="/KT2/SinhVien" class="btn btn-secondary ms-2">Back to List</a>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>
