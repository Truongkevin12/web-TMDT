<?php 
require_once '../../global.php';
require_once '../../dao/hang-hoa.php';
require_once '../../dao/loai.php';
require_once '../../dao/pdo.php';

extract($_REQUEST);
if (exist_param("ma_loai")) {
    $items = hang_hoa_select_by_loai($ma_loai);

}else if (exist_param("kyw")) {
    $items =  hang_hoa_select_keyword($kyw);
}else {
    $items=hang_selectall();
}
$VIEW_NAME="liet-ke-ui.php";
$dsloai=loai_selectall();

require_once '../layout.php';




?>