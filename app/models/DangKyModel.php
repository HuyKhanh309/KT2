<?php
class DangKyModel {
    private $maDK;
    private $ngayDK;
    private $maSV;

    public function __construct($maDK, $ngayDK, $maSV) {
        $this->maDK = $maDK;
        $this->ngayDK = $ngayDK;
        $this->maSV = $maSV;
    }

    public function getMaDK() { return $this->maDK; }
    public function getNgayDK() { return $this->ngayDK; }
    public function getMaSV() { return $this->maSV; }

    public function setNgayDK($ngayDK) { $this->ngayDK = $ngayDK; }
    public function setMaSV($maSV) { $this->maSV = $maSV; }
}
?>
