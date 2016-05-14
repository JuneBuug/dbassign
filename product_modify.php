<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$char_id = $_POST['char_id'];
$char_name = $_POST['char_name'];
$char_desc = $_POST['char_desc'];
$manufacturer_id = $_POST['manufacturer_id'];
$price = $_POST['price'];

$ret = mysql_query("update character_info set char_name = '$char_name', char_desc = '$char_desc', manufacturer_id = $manufacturer_id, price = $price where char_id = $char_id", $conn);

if(!$ret)
{
    msg('Query Error : '.mysql_error($conn));
}
else
{
    s_msg ('성공적으로 수정 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=product_list.php'>";
}

?>
