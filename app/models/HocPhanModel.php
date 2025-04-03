<?php
class HocPhanModel {
    private $maHP;
    private $tenHP;
    private $soTinChi;

    public function __construct($maHP, $tenHP, $soTinChi) {
        $this->maHP = $maHP;
        $this->tenHP = $tenHP;
        $this->soTinChi = $soTinChi;
    }

    public function getMaHP() { return $this->maHP; }
    public function getTenHP() { return $this->tenHP; }
    public function getSoTinChi() { return $this->soTinChi; }

    public function setTenHP($tenHP) { $this->tenHP = $tenHP; }
    public function setSoTinChi($soTinChi) { $this->soTinChi = $soTinChi; }
}
?>
