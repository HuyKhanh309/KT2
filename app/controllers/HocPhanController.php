<?php
require_once('app/config/database.php');
require_once('app/models/HocPhanModel.php');

class HocPhanController
{
    private $hocPhanModel;

    public function __construct()
    {
        $db = (new Database())->getConnection();
        $this->hocPhanModel = new HocPhanModel($db);
    }

    // Hiển thị danh sách học phần
    public function index()
    {
        $hocphans = $this->hocPhanModel->getAll();
        include 'app/views/hocphan/list.php';
    }
}
?>
