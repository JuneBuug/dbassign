<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "product_insert.php";

if (array_key_exists("product_id", $_GET)) {
    $char_id = $_GET["char_id"];
    $query =  "select * from character_info where char_id = $char_id";
    $res = mysql_query($query, $conn);
    $character = mysql_fetch_array($res);
    if(!$character) {
        msg("물품이 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "product_modify.php";
}

$movies = array();

$query = "select * from movie natural join filmmaker";
$res = mysql_query($query, $conn);
while($row = mysql_fetch_array($res)) {
    $movies[$row['manufacturer_id']] = $row['manufacturer_name'];
}
?>
    <div class="container">
        <form name="product_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="product_id" value="<?=$character['char_id']?>"/>
            <h3>상품 정보 <?=$mode?></h3>
            <p>
                <label for="movie_id">출연영화</label>
                <select name="movie_id" id="movie_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($movies as $id => $name) {
                            if($id == $character['movie_id']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="char_name">캐릭터명</label>
                <input type="text" placeholder="캐릭터명 입력" id="char_name" name="char_name" value="<?=$character['char_name']?>"/>
            </p>
            <p>
                <label for="char_desc">캐릭터 설명</label>
                <textarea placeholder="캐릭터 설명 입력" id="char_desc" name="char_desc" rows="10"><?=$character['char_desc']?></textarea>
            </p>
            <p>
                <label for="year">등장 년도</label>
                <input type="number" placeholder="정수로 입력" id="year" name="year" value="<?=$character['year']?>" />
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("movie_id").value == "-1") {
                        alert ("영화를 선택해 주십시오"); return false;
                    }
                    else if(document.getElementById("char_name").value == "") {
                        alert ("캐릭터명을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("char_desc").value == "") {
                        alert ("캐릭터 설명을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("year").value == "") {
                        alert ("등장 년도를 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>
