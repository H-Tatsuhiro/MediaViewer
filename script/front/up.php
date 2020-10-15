<?php
$upDir = '/usr/share/nginx/html/uploaded-img_';
 if (isset($_FILES['upfile']['error'])) {
              try {
                               $filePath = $upDir . $_FILES["upfile"]["name"];

         if(move_uploaded_file($_FILES["upfile"]["tmp_name"], $filePath)) {
             echo 'ファイルは正常にアップロードされました';
         } else {
             throw new RuntimeException('ファイル保存時にエラーが発生しました');
         }
     } catch (RuntimeException $e) {
         echo $e->getMessage();
     }
 }
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>画像アップロード</title>
</head>
<body>
  <form enctype="multipart/form-data" method="post" action="">
      <input type="file" name="upfile" /><br />
      <input type="submit" value="送信" />
  </form>
</body>
</html>
