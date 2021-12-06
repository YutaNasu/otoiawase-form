<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli( 'mysql_memo_app', 'docker', 'docker', 'test_database');

    $stmt = $mysqli->prepare("INSERT INTO form(name,furigana,email,tel,item,qa) VALUES (?,?,?,?,?,?)");

    $name = $_POST["name"]; //名前
    $furi = $_POST["furigana"]; //ふりがな
    $email = $_POST["email"]; //メールアドレス
    $tel = "{$_POST["tel"]}"; //電話番号
    $item = $_POST["item"]; //お問い合わせ項目
    $qa = $_POST["qa"]; //お問い合わせ内容

    $stmt -> bind_param("ssssss",$name,$furi,$email,$tel,$item,$qa); //値をバインド
    $stmt -> execute(); //prepareの値を実行

    ///////メールの送信////////
    $atesaki = $email; //宛先
    $kenmei = "お問い合わせについて"; //件名
    $honbun = "お問い合わせを受け付けました¥n" //本文
    . "名前" . $_POST["name"] . "¥n"
    . "ふりがな" . $_POST["furi"] . "¥n"
    . "email" . $_POST["email"] . "¥n"
    . "電話番号" . $_POST["tel"] . "¥n"
    . "お問い合わせ項目" . $_POST["item"] . "¥n"
    . "お問い合わせ内容:". $_POST["qa"] . "¥n"
    . "お問い合わせありがとうございました。";

    //メール送信の関数
    mb_send_mail($atesaki, $kenmei, $honbun);

?>
