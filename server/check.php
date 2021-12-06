
<?php
    //htmlspecialchars・・・特殊文字の変換
    $name = $_POST["name"];
    $name = htmlspecialchars($name,ENT_QUOTES,'UTF-8');
    $furi = $_POST["furigana"];
    $furi = htmlspecialchars($furi,ENT_QUOTES,'UTF-8');
    $email = $_POST["email"];
    $email = htmlspecialchars($email,ENT_QUOTES,'UTF-8');
    $tel = $_POST["tel"];
    $tel = htmlspecialchars($tel,ENT_QUOTES,'UTF-8');
    $item = $_POST["item"];
    $item = htmlspecialchars($item,ENT_QUOTES,'UTF-8');
    $qa = $_POST["qa"];
    $qa = htmlspecialchars($qa,ENT_QUOTES,'UTF-8');

    // 入力のエラーチェック（バリデーションチェック）
    $isError = false;
    // 名前が空でないことをチェック
    if($name == ""){
        $isError = true;
        $Errornum1 = true;
    }
    // ふりがなが空でないことをチェック
    if($furi == ""){
        $isError = true;
        $Errornum2 = true;
    }
    // メールアドレスが空でないことをチェック
    if($email == ""){
        $isError = true;
        $Errornum3 = true;
    }
    // 電話番号が空でないこと
    // 電話番号が空でないかつ電話番号の正規チェック
    if(preg_match('/^[0-9]{9,10}$/', $tel)){
        $isError = true;
    }
    //
?>
<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href="./css/form.css">
    </head>
    <title>CHECK FORM</title>
    <body>
        <?php if( $isError == false) { ?>
            <!-- PHPのエラー内容を表示 -->
            <form method="POST" action="./check.php">
            <div class = "toi">
                <label class = "label">お名前</label><br><br>
                <input class = "input" type = "text" name = "name" placeholder="例）山田太郎" value="<?php echo $name; ?>">
                <br><br><br>
                <label class = "label">ふりがな</label><br><br>
                <input class = "input" type = "text" name = "furigana" placeholder="例）やまだたろう" value="<?php echo $furi; ?>">
                <br><br><br>
                <label class = "label">E-mail</label><br><br>
                <input class = "input" type = "email" name = "email" placeholder="例）sample@example.com" value="<?php echo $email; ?>">
                <br><br><br>
                <div class = "erc">
                    <p>※電話番号が正しく入力されていません。</p>
                </div>
                <label class = "label">電話番号</label><brs><br>
                <input class = "input" type="tel" name="tel" maxlength="20" placeholder="例）0000000000" value="<?php echo $tel; ?>">
                <br><br><br>
                <label class = "label">お問い合わせ項目</label><br><br>
                <select name="item">
                <option value="">お問い合わせ項目を選択してください</option>
                <option value="ご予約">ご予約</option>
                <option value="ご質問・お問い合わせ">ご質問・お問い合わせ</option>
                <option value="ご意見・ご感想">ご意見・ご感想</option>
                </select>
                <br><br><br>
                <label class = "label">お問い合わせ内容</label><br><br>
                <textarea class = "text1" rows="5" name = "qa" placeholder="お問合せ内容を入力" value="<?php echo $qa; ?>"></textarea>
                <br><br><br>
            </div>
            <div class="btn-area">
                <input type="submit" value="送信">
                <input type="reset" value="クリア">
              </div>
        </form>
        <?php } else { ?>
        <form method="POST" action="./toiawase.php">
            <div class = "toi">
                <h2>確認画面</h2>
                <label class = "label">お名前</label><br><br>
                <strong><?php echo $name; ?></strong>
                <input type="hidden" name="name" value="<?php echo $name; ?>">
                <br><br><br>
                <label class = "label">ふりがな</label><br><br>
                <strong><?php echo $furi; ?></strong>
                <input type="hidden" name="furigana" value="<?php echo $furi; ?>">
                <br><br><br>
                <label class = "label">E-mail</label><br><br>
                <strong><?php echo $email; ?></strong>
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <br><br><br>
                <label class = "label">電話番号</label><br><br>
                <strong><?php echo $tel; ?></strong>
                <input type="hidden" name="tel" value="<?php echo $tel; ?>">
                <br><br><br>
                <label class = "label">お問い合わせ項目</label><br><br>
                <strong><?php echo $item; ?></strong>
                <input type="hidden" name="item" value="<?php echo $item; ?>">
                <br><br><br>
                <label class = "label">お問い合わせ内容</label><br><br>
                <strong><?php echo $qa; ?></strong>
                <input type="hidden" name="qa" value="<?php echo $qa; ?>">
                <br><br><br>
            </div>
            <div class="btn-area">
                <input type="submit" value="確定">
                <button type="button" onclick="history.back()">戻る</button>
            </div>
        </form>
        <?php } ?>
    </body>
</html>
