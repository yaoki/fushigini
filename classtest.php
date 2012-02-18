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
$nov = new fushigini();
$nov->show('chapters/chapter01.php');
$nov->show('chapters/chapter02.php');

class fushigini
{
	//メンバ変数の定義
	//キャラクター
	private $fumika = 'フミカ';
	private $watashi = '私';
	private $kimi = 'きみ';
	private $sayuri = 'さゆり';


	//メソッドの定義
	//文章のデータを表示する
	public function show($fname){

		$fumika = $this->fumika;
		$watashi = $this->watashi;
		$kimi = $this->kimi;
		$sayuri = $this->sayuri;

		include_once('markdown.php');
		include($fname);
		echo Markdown($data);

	}
}
?>
</div>
</body>
</html>
