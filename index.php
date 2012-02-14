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
include_once( 'markdown.php' );

//definition
//characters
$fumika = 'フミカ';
$watashi = '私';
$sayuri = 'さゆり';

//contents creating
if ($handle = opendir('chapters')) {
    while (false !== ($entry = readdir($handle))) {
	    if ($entry != "." && $entry != ".." && preg_match("/^\./",$entry) != 1) {
            $chapter = file_get_contents("chapters/$entry");
	    $body .= $chapter;
        }
    }
    closedir($handle);
}

//markdownに対応するために、通常改行を2回の改行にし、段落に変換させます。
$body = preg_replace("/.(\n).(\n).(\n).(\n).(\n)/", "\n<p><br></p>\n\n<p><br></p>\n\n\n\n<p><br></p>\n\n\n\n<p><br></p>\n\n", $body, -1, $count5);
$body = preg_replace("/.(\n).(\n).(\n).(\n)/", "\n<p><br></p>\n\n<p><br></p>\n\n\n\n<p><br></p>\n\n", $body, -1, $count4);
$body = preg_replace("/.(\n).(\n).(\n)/", "\n<p><br></p>\n\n<p><br></p>\n\n", $body, -1, $count3);
$body = preg_replace("/.(\n).(\n)/", "\n<p><br></p>\n\n", $body, -1, $count2);
$body = preg_replace("/(\n)/", "\n\n", $body, -1, $count1);


//echo $count5."<br>\n";
//echo $count4."<br>\n";//開発中のメモです。
//echo $count3."<br>\n";//改行を置換した回数をカウント
//echo $count2."<br>\n";
//echo $count1."<br>\n";

$body = Markdown($body);
$contents = "<?php \n echo <<<___END\n$body\n___END;\n ?>";
file_put_contents( "contents.php" , $contents );
include 'contents.php';
?>

</div>
</body>
