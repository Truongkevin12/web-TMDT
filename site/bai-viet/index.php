<?php 
require_once "../../dao/pdo.php";
require_once "../../dao/bai-viet.php";
// require_once "../../dao/hang-hoa.php";
// require_once "../../dao/loai.php";
require_once "../../global.php";

extract($_REQUEST);
if (isset($_GET['post'])) {
    $id = $_GET['post'];
 $info_post =   show_post_info($id);

    $VIEW_NAME="show-bai.php";

    
}
else{
    $info_post = show_post();
    $VIEW_NAME="list.php";
}


require_once "../layout.php";



?>