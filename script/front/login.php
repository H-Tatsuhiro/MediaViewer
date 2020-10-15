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

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>MediaViewer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="styles/login.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://use.typekit.net/gfu3zmk.css">

</head>

<body>
<div id="mainWrapper">
  <header>
    <!-- This is the header content. It contains Logo and links -->
    <div id="logo">  Media Viewer (ver 0.1)<a href="index.php"></a></div>
  </header>
  <section id="offer">
    <!-- The offer section displays a banner text for promotions -->
    <h2>このサイトはただいま開発中です。</h2>
    <p>サイトのご利用について開発者は一切責任を負いません。利用規約をご確認の上ご利用ください。</p>
  </section>

        <div class="loginform">

        <form method="post" action="">
                ユーザ名: <input id="tform" type="text" name="username" value="">
        パスワード: <input id = "tform" type="password" name="password" value="">
           <input type="hidden" name="token" value="<?=h(generate_token())?>">
          <input id="tsubmit" type="submit" value="ログイン">
    </form>
    <?php if (http_response_code() === 403): ?>
     <p style="color: red;">ユーザ名またはパスワードが違います</p>
    <?php endif; ?>
        </div>


  <footer>
    <!-- This is the footer with default 3 divs -->
    <div class="footerlinks">
      <p><a href="https://github.com/H-Tatsuhiro/MediaViewer/blob/master/script/front/terms.md" title="Link">ご利用上の注意</a></p>
      <p><a href="https://docs.google.com/forms/d/e/1FAIpQLSe_2R3wyzbkkEbxmX0IjBXF6Tg-9euFT7qqsHUMI5vSUoBjRQ/viewform" title="Link">お問い合わせ</a></p>
      <p><a href="https://www.h-tatsu.com" title="Link">開発者</a></p>
    </div>
  </footer>
</div>
</body>
</html>[