<?php
class SinhVienModel
{
    private $conn;
    private $table_name = "sinhvien";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getSinhViensByPage($limit, $offset)
    {
        $query = "SELECT 
                    sv.MaSV,
                    sv.HoTen,
                    sv.GioiTinh,
                    sv.NgaySinh,
                    sv.Hinh,
                    sv.MaNganh,
                    nh.TenNganh
                FROM sinhvien sv
                JOIN nganhhoc nh ON sv.MaNganh = nh.MaNganh
                LIMIT :limit OFFSET :offset";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function countSinhViens()
    {
        $query = "SELECT COUNT(*) as total FROM sinhvien";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }

    public function getSinhVienById($ma_sv)
    {
        $query = "SELECT 
                    sv.MaSV,
                    sv.HoTen,
                    sv.GioiTinh,
                    sv.NgaySinh,
                    sv.Hinh,
                    sv.MaNganh,
                    nh.TenNganh
                FROM sinhvien sv
                JOIN nganhhoc nh ON sv.MaNganh = nh.MaNganh
                WHERE sv.MaSV = :ma_sv";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ma_sv', $ma_sv);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addSinhVien($ma_sv, $ho_ten, $gioi_tinh, $ngay_sinh, $hinh, $ma_nganh)
    {
        $query = "INSERT INTO sinhvien 
                    (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh)
                  VALUES 
                    (:ma_sv, :ho_ten, :gioi_tinh, :ngay_sinh, :hinh, :ma_nganh)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ma_sv', $ma_sv);
        $stmt->bindParam(':ho_ten', $ho_ten);
        $stmt->bindParam(':gioi_tinh', $gioi_tinh);
        $stmt->bindParam(':ngay_sinh', $ngay_sinh);
        $stmt->bindParam(':hinh', $hinh);
        $stmt->bindParam(':ma_nganh', $ma_nganh);

        return $stmt->execute();
    }

    // public function updateSinhVien($ma_sv, $ho_ten, $gioi_tinh, $ngay_sinh, $hinh, $ma_nganh)
    // {
    //     $query = "UPDATE sinhvien SET 
    //                 HoTen = :ho_ten,
    //                 GioiTinh = :gioi_tinh,
    //                 NgaySinh = :ngay_sinh,
    //                 Hinh = :hinh,
    //                 MaNganh = :ma_nganh
    //               WHERE MaSV = :ma_sv";

    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindParam(':ma_sv', $ma_sv);
    //     $stmt->bindParam(':ho_ten', $ho_ten);
    //     $stmt->bindParam(':gioi_tinh', $gioi_tinh);
    //     $stmt->bindParam(':ngay_sinh', $ngay_sinh);
    //     $stmt->bindParam(':hinh', $hinh);
    //     $stmt->bindParam(':ma_nganh', $ma_nganh);

    //     return $stmt->execute();
    // }

    public function deleteSinhVien($ma_sv)
    {
        $query = "DELETE FROM sinhvien WHERE MaSV = :ma_sv";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ma_sv', $ma_sv);
        return $stmt->execute();
    }
}
?>
