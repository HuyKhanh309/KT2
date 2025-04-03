<?php
class NganhHocModel {
    private $maNganh;
    private $tenNganh;

    public function __construct($maNganh, $tenNganh) {
        $this->maNganh = $maNganh;
        $this->tenNganh = $tenNganh;
    }

    public function getMaNganh() {
        return $this->maNganh;
    }

    public function getTenNganh() {
        return $this->tenNganh;
    }

    public function setTenNganh($tenNganh) {
        $this->tenNganh = $tenNganh;
    }
}
?>
