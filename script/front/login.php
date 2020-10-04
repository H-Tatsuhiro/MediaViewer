<?php

require_once __DIR__ . '/functions.php';
require_unlogined_session();
$hashes = [
    'user1' => '$2y$10$clyF/fV8SOZMT43oE/0sW.LNr4b.2qWz3Myz4BHbjowtw7ybL9qdq',
    'user2' => '$2y$10$fskEcnUaQiQV66X8WUaWRus2tVEp81RUrKnVBwQWJnRcbZIZhWz3K',
];
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        validate_token(filter_input(INPUT_POST, 'token')) &&
        password_verify(
            $password,
            isset($hashes[$username])
                ? $hashes[$username]
                : '$2y$10$abcdefghijklmnopqrstuv'
        )
    ) {
        session_start();
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        header('Location: /index.php');
        exit;
    }
    http_response_code(403);
}
header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE html>
<title>ログインページ</title>
<h1>ログインしてください</h1>
<form method="post" action="">
    ユーザ名: <input type="text" name="username" value="">
    パスワード: <input type="password" name="password" value="">
    <input type="hidden" name="token" value="<?=h(generate_token())?>">
    <input type="submit" value="ログイン">
</form>
<?php if (http_response_code() === 403): ?>
<p style="color: red;">ユーザ名またはパスワードが違います</p>
<?php endif; ?>