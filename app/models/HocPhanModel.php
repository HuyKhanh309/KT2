<?php
class HocPhanModel
{
    private $conn;
    private $table = "hocphan";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy toàn bộ học phần
    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM hocphan");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Lấy học phần theo mã
    public function getById($maHP)
    {
        $stmt = $this->conn->prepare("SELECT * FROM hocphan WHERE MaHP = :maHP");
        $stmt->bindParam(':maHP', $maHP);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
?>
