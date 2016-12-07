<?php
session_start();
require('../dbconnect.php');

if(!isset($_SESSION["accid"])){  // ログインしているか確認
  header("Location: ../login.php");
  exit();
}

echo "現在";
echo $_SESSION["accid"]."さんがログイン中です。";

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
<body>
<form action="" method="post">
  <dd>
  </dd>
  </form>
<form action="update.php" method="post" enctype="multipart/form-data">
  ファイル:<br />
  <input type="file" name="upfile" size="30" /><br />
  <br />
  <input type="submit" value="アップロード" />
</form>
<a href="../hoge.php">戻る</a>
</body>
</html>