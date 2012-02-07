<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>フシギにステキな素早いヤバさ</title>
<style>
div#contents{
width: 800px;
margin: 10px auto;
}
p{
font-size: 16px;
margin: 1em;
line-height: 1.7em;
}
</style>
</head>

<body>
<div id="contents">
<?php
include_once( 'markdown.php' );

//definition
//characters
$fumika = 'フミカ';
$watashi = '私';
$sayuri = 'さゆり';

$body = file_get_contents( 'chapter01.md' );
$body .= file_get_contents( 'chapter02.md' );
$html = Markdown( $body );
echo $html;
?>
</div>
</body>
