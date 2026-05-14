<?php
// POSTされたデータをPHPが受け取る
$employee_name = $_POST['employee_name'];
$employee_age = $_POST['employee_age'];
$department = $_POST['department'];

// バリデーション
$errors = [];

if (empty($employee_name)) {
  $errors[] = '社員名を入力してください。';
}

if (empty($employee_age)) {
  $errors[] = '年齢を入力してください。';
} elseif (!is_numeric($employee_age)) {
  $errors[] = '年齢は数値で入力してください。';
}
?>

<!DOCTYPE html>
<html lang="ja">
  
<head>
  <meta charset="UTF-8">
  <title>社員情報確認画面</title>
</head>

<body>
  <h2>入力内容をご確認ください。</h2>
  <table>
  <table border="1">
    <tr>
      <td>社員名</td>
      <td><?php echo $employee_name; ?></td>
    </tr>
    <tr>
      <td>年齢</td>
      <td><?php echo $employee_age; ?></td>
    </tr>
    <tr>
      <td>所属</td>
      <td><?php echo $department; ?></td>
    </tr>
  </table>

  <p>
    <button id="confirm-btn" onclick="location.href='complete.php';">確定</button>
    <button id="camcel-btn" onclick="history.back();">キャンセル</button>
  </p>

  <?php 
  // エラーがある場合JSの連携
  if (!empty($errors)) {
    foreach ($errors as $errors) {
      echo '<p style="color: red;">' . $errors .'</p>';
    }

    // JSの命令。タイポ注意
    echo '<script> 
      document.getElementById("confirm-btn").disabled = true; 
    </script>';
  }
  ?>
</body>
</html>