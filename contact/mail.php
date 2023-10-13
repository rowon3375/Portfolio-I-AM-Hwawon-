<?php
$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$message = $_POST['message'];

date_default_timezone_set('Asia/Tokyo');

if (!file_exists("mail-log")) {
    @mkdir("mail-log", 0777);
}

//ip修得
$ip = getenv("REMOTE_ADDR");

// ログファイルに書き込むデータ
$logdata = [
    date('[d日 H:i:s]'),
    $name,
    '"' . $tel . '"', // エクセルで開いた際に先頭の0が消えるで""で囲って対処
    $emial,
    $message,
    $ip
];

$today = date("Y-m-d");
$fp = fopen("mail-log/{$today}.csv", "a");
stream_filter_prepend($fp, 'convert.iconv.utf-8/cp932'); // エクセル用の文字コードに変換
fputcsv($fp, $logdata);
fclose($fp);


/************************************
          管理者用のメール
**************************************/
// 言語、文字コードを指定
mb_language("Ja");
mb_internal_encoding("UTF-8");

$manager_email_string = "ilove4622@naver.com";


$headers = "From:" . mb_encode_mimeheader("朴　和元(Park Hwawon)") . "<ilove4622@naver.com>\n";
$manager_title = "ポートフォリオからお問い合わせがありました";
$date = date("Y年m月d日");
$manager_message = <<< EOM

----------------------------------------------------------------

{$date}

【 name 】: {$name}

【 tel 】: {$tel}

【 email 】: {$email}

【 message 】: {$message}

【 ホストIP 】: {$ip}

----------------------------------------------------------------

@site http://hwawonpark.com/
@mail ilove4622@gmail.com
@tel 080-9104-5163

made by hwawon.park
EOM;

//メール送信（管理者）
$manager = mb_send_mail($manager_email_string, $manager_title, $manager_message, $headers);


/************************************
          お客様用のメール
**************************************/
$customer_email = $email;
$headers = "From:" . mb_encode_mimeheader("朴　和元(Park Hwawon)") . "<ilove4622@gmail.com>\n";
$customer_title = "お問い合わせありがとうございます。";
$customer_message = <<< EOM

----------------------------------------------------------------

後日、お問い合せいただいたメールアドレスよりご連絡を差し上げます。
お問い合わせをありがとうございました。

【 name 】: {$name}

【 tel 】: {$tel}

【 email 】: {$email}

【 message 】: {$message}

----------------------------------------------------------------

@site http://hwawonpark.com/
@mail ilove4622@gmail.com
@tel 080-9104-5163

made by hwawon.park
EOM;

//メール送信（お客様）
$customer = mb_send_mail($customer_email, $customer_title, $customer_message, $headers);

header('Location:./thanks.php');
exit();
?>