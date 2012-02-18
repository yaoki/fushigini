<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>フシギにステキな素早いヤバさ</title>
<style>
body {
background: #fffefd;
font-family: "ＭＳ 明朝","Hiragino Mincho Pro",Osaka,monospace;
font-size: 16px;
}
div#contents{
font-family: "ＭＳ 明朝","Hiragino Mincho Pro",Osaka,monospace;
font-size: 16px;
width: 42em;/*折り返し字数を設定します*/
padding: 0;
margin: 10px auto;
background: #fffefd;
text-align: left;
}
h2{
color: #735344;
}
p{
font-family: "ＭＳ 明朝","Hiragino Mincho Pro",Osaka,monospace;
font-size: 16px;
margin: 0em;
padding: 0;
line-height: 1.7em;
color: #735344;
}
</style>
</head>

<body>
<div id="contents">

<?php
include_once( 'markdown.php' );//マークダウンするためのファンクションを読み込みます

function ruby($body){
	$patterns = array( "/｜/", "/《/", "/》/");
	$replacements = array( "<ruby><rp>（</rp><rb>", "<rt>", "</rt><rp>）</rp></ruby>" );
	$body = preg_replace($patterns, $replacements, $body);	
	return $body;
}
function novelmarkdown($data){
	$data = preg_replace( "/\n.\n/","\n\n<p><br></p>\n\n", $data);
	$data = preg_replace( "/\n.\n/","\n\n<p><br></p>\n\n", $data);
	$data = preg_replace( "/\n/","\n\n", $data);
	return $data;
}
function chap($chapter){
	include( 'config.php' );
	include("chapters/".$chapter);
	$data = ruby($data);
	$data = novelmarkdown($data);
	echo Markdown($data);
}
chap("chapter01.php");
chap("chapter02.php");
chap("chapter03.php");
chap("chapter04.php");
chap("chapter05.php");
chap("chapter06.php");
chap("chapter07.php");
chap("chapter08.php");
chap("chapter09.php");
chap("chapter10.php");
chap("chapter11.php");
chap("chapter12.php");
chap("chapter13.php");

?>
</div>
</body>
</html>
