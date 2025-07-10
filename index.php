<?php
session_start();
$userid = $_SESSION['userid'] ?? null;
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>메인 페이지</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container" style="margin-top:80px; text-align:center;">
        <h1>PHP 게시판 예제 메인</h1>
        <?php if ($userid): ?>
            <p><strong><?php echo htmlspecialchars($userid); ?></strong> 님 환영합니다!</p>
            <a href="board.php" class="btn-blue">게시판 바로가기</a>
            <a href="logout.php" class="btn-purple">로그아웃</a>
        <?php else: ?>
            <a href="login.php" class="btn-blue">로그인</a>
            <a href="signup.php" class="btn-purple">회원가입</a>
        <?php endif; ?>
        <hr style="margin:40px 0;">
        <p>이 페이지는 <strong>로그인, 회원가입, 게시판</strong> 기능을 PHP로 구현한 예제입니다.<br>상단 버튼을 통해 각 기능을 이용해보세요.</p>
    </div>
</body>
</html>
