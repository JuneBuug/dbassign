<!DOCTYPE html>
<html lang='ko'>
<head>
    <title>ANIMOVIE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="product_list.php" method="post">
    <div class='navbar fixed'>
        <div class='container'>
            <a class='pull-left title' href="index.php">애니메이션 캐릭터</a>
            <ul class='pull-right'>
                <li>
                    <input type="text" name="search_keyword" placeholder="캐릭터 통합검색">
                </li>
                <li><a href='product_list.php'>캐릭터 목록</a></li>
                <li><a href='product_form.php'>캐릭터 등록</a></li>
                <li><a href='site_info.php'>소개</a></li>
            </ul>
        </div>
    </div>
</form>
