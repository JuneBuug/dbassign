<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("char_id", $_GET)) {
    $char_id = $_GET["char_id"];
    $query = "select * from character_info natural join manufacturer where char_id = $char_id";
    $res = mysql_query($query, $conn);
    $character = mysql_fetch_assoc($res);
    if (!$character) {
        msg("물품이 존재하지 않습니다.");
    }
}
?>
    <div class="container fullwidth">

        <h3>상품 정보 상세 보기</h3>

        <p>
            <label for="char_id">상품 코드</label>
            <input readonly type="text" id="char_id" name="char_id" value="<?= $character['char_id'] ?>"/>
        </p>

        <p>
            <label for="manufacturer_id">제조사 코드</label>
            <input readonly type="text" id="manufacturer_id" name="manufacturer_id" value="<?= $character['manufacturer_id'] ?>"/>
        </p>

        <p>
            <label for="manufacturer_name">제조사</label>
            <input readonly type="text" id="manufacturer_name" name="manufacturer_name" value="<?= $character['manufacturer_name'] ?>"/>
        </p>

        <p>
            <label for="char_name">상품명</label>
            <input readonly type="text" id="char_name" name="char_name" value="<?= $character['char_name'] ?>"/>
        </p>

        <p>
            <label for="char_desc">상품설명</label>
            <textarea readonly id="char_desc" name="char_desc" rows="10"><?= $character['char_desc'] ?></textarea>
        </p>

        <p>
            <label for="price">가격</label>
            <input readonly type="number" id="price" name="price" value="<?= $character['price'] ?>"/>
        </p>
    </div>
<? include("footer.php") ?>
