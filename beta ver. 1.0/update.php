<?php
require('../dbconnect.php');

session_start();
if(!isset($_SESSION["accid"])){	// ログインしているか確認
  header("Location: /login.php");
  exit();
}
//取得する画像のリンク
$img_url = '$_FILES["upfile"]["tmp_name"]';

// 画像の取得
$img_file = file_get_contents( $_FILES["upfile"]["tmp_name"] );

//画像取得が成功した場合
if($img_file){

	//画像、idをバイナリに変換
	$img_binary = mysqli_real_escape_string( $db, $img_file );
	$id = mysqli_real_escape_string( $db, $_SESSION['accid']);
	
	//画像、idを保存するSQL文の実行
			$result = mysqli_query( $db, 'INSERT INTO img_table (id, img_col) VALUES ( "'.$id.'", "'.$img_binary.'" )');
	//$result = mysqli_query( $db, 'INSERT INTO img_table (img_col) VALUES ( "'.$img_binary.'" )');
	

	//idを保存
	/*if($result){

		$sql = sprintf($db, 'INSERT INTO img_table SET id = "%s"');

		mysqli_real_escape_string( $db, $_SESSION['accid']);
		 $add = mysqli_query($db, $sql);
	}*/


	//結果の表示
	if($result){
		echo "画像をデータベースに保存しました。";}
		else{
		echo "保存できませんでした。";
		}
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>結果画面</title>
</head>
<body>
	<p><a href="../hoge.php">管理画面に戻る</a></p>
</body>
</html>