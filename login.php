<?php
session_start();
// 로그인 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['userid'] ?? '';
    $pw = $_POST['userpw'] ?? '';
    $users = file_exists('users.txt') ? file('users.txt', FILE_IGNORE_NEW_LINES) : [];
    $login_success = false;
    foreach ($users as $user) {
        list($saved_id, $saved_pw) = explode('|', $user);
        if ($id === $saved_id && $pw === $saved_pw) {
            $_SESSION['userid'] = $id;
            $login_success = true;
            break;
        }
    }
    if ($login_success) {
        header('Location: board.php');
        exit;
    } else {
        $error = '아이디 또는 비밀번호가 올바르지 않습니다.';
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
    <link rel="stylesheet" href="css/login-style.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>로그인</h2>
        <?php if (!empty($error)) echo '<p style="color:red;">'.$error.'</p>'; ?>
        <form method="post">
            <input type="text" name="userid" placeholder="아이디" required><br>
            <input type="password" name="userpw" placeholder="비밀번호" required><br>
            <button type="submit">로그인</button>
        </form>
        <a href="signup.php">회원가입</a>
    </div>
</body>
</html>
