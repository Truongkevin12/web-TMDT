<?php
session_start(); // Khai báo hàm session cho File logout trước
session_destroy(); // hàm hủy tất cả các session trên trang web
header('location: /index-gg.php');
?>