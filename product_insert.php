<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$char_name = $_POST['char_name'];
$char_desc = $_POST['char_desc'];
$movie_id = $_POST['movie_id'];
$year = $_POST['year'];

$ret = mysql_query("insert into character_info (char_name, char_desc, movie_id, year) values('$char_name', '$char_desc', '$movie_id', '$year')",$conn);
if(!$ret)
{
    msg('Query Error : '.mysql_error($conn));
}
else
{
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=product_list.php'>";
}

?>
