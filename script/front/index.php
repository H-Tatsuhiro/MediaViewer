<?php

require_once __DIR__ . '/functions.php';
require_logined_session();

header('Content-Type: text/html; charset=UTF-8');

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>MediaViewer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="styles/index.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://use.typekit.net/gfu3zmk.css">

</head>

<body>
<div id="mainWrapper">
  <header>
    <!-- This is the header content. It contains Logo and links -->
    <div id="logo">  Media Viewer (ver 0.1)<a href="index.php"></a></div>
	  <div id="headerLinks"><a><?=h($_SESSION['username'])?>さん</a><a href="/logout.php?token=<?=h(generate_token())?>">ログアウト</a><a href="#" title="Item">アイテム</a></div>
  </header>
  <section id="offer">
    <!-- The offer section displays a banner text for promotions -->
    <h2>このサイトはただいま開発中です。</h2>
    <p>サイトのご利用について開発者は一切責任を負いません。「ご利用上の注意」をご確認の上ご利用ください。</p>
  </section>
  <div id="content">
    <section class="sidebar">
      <!-- This adds a sidebar with 1 searchbox,2 menusets, each with 4 links -->
      <input type="text"  id="search" value="実装中">
      <div id="menubar">
        <nav class="menu">
          <h2><!-- Title for menuset 1 -->撮影場所</h2>
          <hr>
          <ul>
            <!-- List of links under menuset 1 -->
            <li class="notimp"><!-- notimp class is applied to remove this link from the tablet and phone views --><a href="#"  title="Link">実装中</a></li>
          </ul>
        </nav>
        <nav class="menu">
          <h2>被写体</h2>
          <!-- Title for menuset 2 -->
          <hr>
          <ul>
            <!--List of links under menuset 2 -->
            <li class="notimp"><!-- notimp class is applied to remove this link from the tablet and phone views --><a href="#" title="Link">実装中</a></li>
          </ul>
        </nav>
      </div>
    </section>
    <section class="mainContent">
      <div class="productRow"><!-- Each product row contains info of 3 elements -->
        <article class="productInfo"><!-- Each individual product description -->
          <div><img alt="sample" src="images/200x200.png"></div>
          <p class="price">ファイル名</p>
          <p class="productContent">アップロード日時</p>
          <input type="button" name="button" value="アイテムに追加" class="buyButton">
        </article>
        <article class="productInfo"><!-- Each individual product description -->
          <div><img alt="sample" src="images/200x200.png"></div>
          <p class="price">ファイル名</p>
          <p class="productContent">アップロード日時</p>
          <input type="button" name="button" value="アイテムに追加" class="buyButton">
        </article>
        <article class="productInfo"> <!-- Each individual product description -->
          <div><img alt="sample" src="images/200x200.png"></div>
          <p class="price">ファイル名</p>
          <p class="productContent">アップロード日時</p>
          <input type="button" name="button" value="アイテムに追加" class="buyButton">
        </article>
      </div>
    </section>
  </div>
  <footer>
    <!-- This is the footer with default 3 divs -->
    <div class="footerlinks">
      <p><a href="https://github.com/H-Tatsuhiro/MediaViewer/blob/master/script/front/terms.md" title="Link">ご利用上の注意 </a></p>
      <p><a href="https://docs.google.com/forms/d/e/1FAIpQLSe_2R3wyzbkkEbxmX0IjBXF6Tg-9euFT7qqsHUMI5vSUoBjRQ/viewform" title="Link">お問い合わせ</a></p>
      <p><a href="https://www.h-tatsu.com" title="Link">開発者</a></p>
    </div>
  </footer>
</div>
</body>
</html>