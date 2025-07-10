<?php
// 회원가입 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['userid'] ?? '';
    $pw = $_POST['userpw'] ?? '';
    $users = file_exists('users.txt') ? file('users.txt', FILE_IGNORE_NEW_LINES) : [];
    $exists = false;
    foreach ($users as $user) {
        list($saved_id, ) = explode('|', $user);
        if ($id === $saved_id) {
            $exists = true;
            break;
        }
    }
    if ($exists) {
        $error = '이미 존재하는 아이디입니다.';
    } else {
        file_put_contents('users.txt', "$id|$pw\n", FILE_APPEND);
        header('Location: login.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
    <link rel="stylesheet" href="css/signup-style.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>회원가입</h2>
        <?php if (!empty($error)) echo '<p style="color:red;">'.$error.'</p>'; ?>
        <form method="post">
            <input type="text" name="userid" placeholder="아이디" required><br>
            <input type="password" name="userpw" placeholder="비밀번호" required><br>
            <button type="submit">회원가입</button>
        </form>
        <a href="login.php">로그인</a>
    </div>
</body>
</html>
