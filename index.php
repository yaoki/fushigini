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
class fushigini{
	private $phpmarkdown = 'markdown.php';
	private $config = 'config.php';
	private $chapters_path = 'chapters/';


	public function ruby($body){
		$patterns = array( "/｜/", "/《/", "/》/");
		$replacements = array( "<ruby><rp>（</rp><rb>", "<rt>", "</rt><rp>）</rp></ruby>" );
		$body = preg_replace($patterns, $replacements, $body);	
		return $body;
	}
	public function novelmarkdown($data){
		$data = preg_replace( "/\n.\n/","\n\n<p><br></p>\n\n", $data);
		$data = preg_replace( "/\n.\n/","\n\n<p><br></p>\n\n", $data);
		$data = preg_replace( "/\n/","\n\n", $data);
		return $data;
	}
	public function getChapter($chapter){
		include_once( $this->phpmarkdown );//マークダウンするためのファンクションを読み込みます
		include( $this->config );
		include( $this->chapters_path.$chapter );
		$data = $this->ruby($data);
		$data = $this->novelmarkdown($data);
		return Markdown($data);
	}
}
$fs = new fushigini();
echo $fs->getChapter("chapter01.php");
echo $fs->getChapter("chapter02.php");
echo $fs->getChapter("chapter03.php");
echo $fs->getChapter("chapter04.php");
echo $fs->getChapter("chapter05.php");
echo $fs->getChapter("chapter06.php");
echo $fs->getChapter("chapter07.php");
echo $fs->getChapter("chapter08.php");
echo $fs->getChapter("chapter09.php");
echo $fs->getChapter("chapter10.php");
echo $fs->getChapter("chapter11.php");
echo $fs->getChapter("chapter12.php");
echo $fs->getChapter("chapter13.php");

?>
</div>
</body>
</html>
