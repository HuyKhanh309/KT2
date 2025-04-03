<?php
require_once('app/config/database.php');
require_once('app/models/SinhVienModel.php');

class SinhVienController
{
    private $sinhVienModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->sinhVienModel = new SinhVienModel($this->db);
    }

    public function index()
    {
        $limit = 4;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $total = $this->sinhVienModel->countSinhViens();
        $totalPages = ceil($total / $limit);

        $sinhviens = $this->sinhVienModel->getSinhViensByPage($limit, $offset);
        include 'app/views/sinhvien/list.php';
    }

    public function show($ma_sv)
    {
        $sinhvien = $this->sinhVienModel->getSinhVienById($ma_sv);
        if ($sinhvien) {
            include 'app/views/sinhvien/show.php';
        } else {
            echo "Không tìm thấy sinh viên.";
        }
    }

    public function add()
    {
        // Lấy danh sách ngành học
        $stmt = $this->db->prepare("SELECT * FROM NganhHoc");
        $stmt->execute();
        $nganhhocs = $stmt->fetchAll(PDO::FETCH_OBJ);

        include 'app/views/sinhvien/add.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_sv    = $_POST['MaSV'];
            $ho_ten   = $_POST['HoTen'];
            $gioi_tinh = $_POST['GioiTinh'];
            $ngay_sinh = $_POST['NgaySinh'];
            $ma_nganh = $_POST['MaNganh'];

            // Xử lý upload hình
            $hinhFile = $_FILES['Hinh'];
            $hinhName = basename($hinhFile['name']);
            $uploadDir = 'app/public/images/';
            $uploadPath = $uploadDir . $hinhName;

            // Nếu file hợp lệ và upload thành công
            if (move_uploaded_file($hinhFile['tmp_name'], $uploadPath)) {
                // Kiểm tra mã sinh viên đã tồn tại chưa
                $query = $this->sinhVienModel->getSinhVienById($ma_sv);
                if ($query) {
                    echo "Mã sinh viên đã tồn tại.";
                    return;
                }

                // Lưu tên file vào DB, không lưu cả đường dẫn
                $result = $this->sinhVienModel->addSinhVien(
                    $ma_sv,
                    $ho_ten,
                    $gioi_tinh,
                    $ngay_sinh,
                    $hinhName,
                    $ma_nganh
                );

                if ($result) {
                    header('Location: /KT2/SinhVien');
                } else {
                    echo "Thêm sinh viên thất bại.";
                }
            } else {
                echo "Tải ảnh lên thất bại.";
            }
        }
    }


    public function edit($ma_sv)
    {
        $sinhvien = $this->sinhVienModel->getSinhVienById($ma_sv);

        // Lấy danh sách ngành học
        $stmt = $this->db->prepare("SELECT * FROM NganhHoc");
        $stmt->execute();
        $nganhhocs = $stmt->fetchAll(PDO::FETCH_OBJ);

        if ($sinhvien) {
            include 'app/views/sinhvien/edit.php';
        } else {
            echo "Không tìm thấy sinh viên.";
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_sv    = $_POST['MaSV'];
            $ho_ten   = $_POST['HoTen'];
            $gioi_tinh = $_POST['GioiTinh'];
            $ngay_sinh = $_POST['NgaySinh'];
            $ma_nganh = $_POST['MaNganh'];
            $hinh_cu = $_POST['HinhCu'];

            // Xử lý upload hình mới nếu có
            $hinh_moi = $hinh_cu;
            if (isset($_FILES['Hinh']) && $_FILES['Hinh']['error'] === UPLOAD_ERR_OK) {
                $hinh_moi = basename($_FILES['Hinh']['name']);
                move_uploaded_file($_FILES['Hinh']['tmp_name'], 'app/public/images/' . $hinh_moi);
            }

            $result = $this->sinhVienModel->updateSinhVien($ma_sv, $ho_ten, $gioi_tinh, $ngay_sinh, $hinh_moi, $ma_nganh);

            if ($result) {
                header('Location: /KT2/SinhVien');
            } else {
                echo "Cập nhật sinh viên thất bại.";
            }
        }
    }


    public function delete($ma_sv)
    {
        $result = $this->sinhVienModel->deleteSinhVien($ma_sv);

        if ($result) {
            header('Location: /KT2/SinhVien');
        } else {
            echo "Xóa sinh viên thất bại.";
        }
    }
}
?>
