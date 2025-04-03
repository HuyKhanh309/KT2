<?php
class ChiTietDangKyModel {
    private $maDK;
    private $maHP;

    public function __construct($maDK, $maHP) {
        $this->maDK = $maDK;
        $this->maHP = $maHP;
    }

    public function getMaDK() { return $this->maDK; }
    public function getMaHP() { return $this->maHP; }

    public function setMaDK($maDK) { $this->maDK = $maDK; }
    public function setMaHP($maHP) { $this->maHP = $maHP; }
}
?>
