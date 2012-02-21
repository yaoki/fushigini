<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/default.css" type="text/css">
<title>フシギにステキな素早いヤバさ</title>
</head>

<body>
<div id="contents">

<?php
#まず、変数の設定ファイルを読み込む
include('config.php');

#私オブジェクトの使用例
#インスタンスwataについて、主格を私にセット
$line = new line();

$wata = new phenomenon($watashi);
$wata->mainActive();
$line->close();

$c = $wata->getActive($watashi);
$wata->mainActive($c,'話す','犬');
$line->close();

echo "<br>";

#フミカオブジェクトの使用例
#インスタンスfumiについて、主格をフミカにセット
$fumi = new phenomenon($fumika);
$c = $fumi->getActive('犬','出す','外');
$wata->mainActive($c, '見る' );
$line->close();

echo '<br>';

#犬オブジェクトの使用例
$inu = new phenomenon('犬');
$inu->subActive('サルサ','踊る');
$line->breath();

$fumi->mainActive('穴','掘る');
$line->close();

class line{
	private $period;

	public function __construct(){
		$this->period = '。';
		$this->comma = '、';
	}
	public function setPeriod($symbol){
		$this->period = $symbol;
	}
	public function setComma($symbol){
		$this->comma = $symbol;
	}
	public function close($symbol){
		if(!isset($symbol)){
			echo $this->period;
		}else{
			echo $symbol;}
	}
	public function breath($symbol){
		if(!isset($symbol)){
			echo $this->comma;
		}else{
			echo $symbol;}
	}
}
class phenomenon{
	#小説の存在を書くクラスです
	//メンバ変数の定義
	private $subject;//主格「は」（本来は「が」だが便宜的に）

	//コンストラクタ
	//主語、対格をセット
	public function __construct($subject){
		$this->subject = $subject;
	}

	#メソッドの定義
	public function getActive($accusative,$verb,$dative){
		if(isset($accusative) && isset($verb) && !isset($dative)){
			return $this->subject.'が'.$verb.$accusative;
		}elseif(isset($accusative) && !isset($verb)){
			return $accusative;
		}elseif(!isset($accusative)){
			return $this->subject.'が';
		}else{
			return $this->subject.'が'.$dative.'に'.$verb.$accusative;
		}
	}
	public function mainActive($accusative,$verb,$dative){
		if(isset($accusative) && isset($verb) && !isset($dative)){
			echo $this->subject.'は'.$accusative.'を'.$verb;
		}elseif(isset($accusative) && !isset($verb)){
			echo $accusative;
		}elseif(!isset($accusative)){
			echo $this->subject.'は';
		}else{
			echo $this->subject.'は'.$dative.'に'.$accusative.'を'.$verb;
		}
	}
	public function subActive($accusative,$verb,$dative){
		if(isset($accusative) && isset($verb) && !isset($dative)){
			echo $this->subject.'が'.$accusative.'を'.$verb;
		}elseif(isset($accusative) && !isset($verb)){
			echo $accusative;
		}elseif(!isset($accusative)){
			echo $this->subject.'が';
		}else{
			echo $this->subject.'が'.$dative.'に'.$accusative.'を'.$verb;
		}
	}
	//自動詞を定義
	public function mainIntransitive($verb){
		if(!isset($verb)){
			echo $this->subject.'は';
		}else{
			echo $subject.'は'.$verb;
		}
	}
	public function subIntransitive($verb){
		if(!isset($verb)){
			echo $this->subject.'が';
		}else{
			echo $subject.'が'.$verb;
		}
	}
}

?>
</div>
</body>
</html>
