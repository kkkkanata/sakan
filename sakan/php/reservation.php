<?php
//変数初期化
$guest = '';
$mail = '';
$date = '';
$time = '';
$shop ='';
$err_message = [];
$host = 'localhost'; // データベースのホスト名又はIPアドレス
$username = 'root';  // MySQLのユーザ名
$passwd   = 'root';    // MySQLのパスワード
$dbname   = 'wp_01';    // データベース名
// 接続成功した場合
if ($link = mysqli_connect($host, $username, $passwd, $dbname) ){
   // 文字化け防止
   mysqli_set_charset($link, 'utf8');
   //ポスト通信
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
     //名前取得
     if(isset($_POST['guest']) === TRUE){
       $guest = $_POST['guest'];
     }
     //メールアドレス取得
     if(isset($_POST['mail']) === TRUE){
       $mail = $_POST['mail'];
     }
     //店鋪取得
     if(isset($_POST['shop']) === TRUE){
       $shop = $_POST['shop'];
     }
     //日付取得
     if(isset($_POST['date']) === TRUE){
       $date = $_POST['date'];
     }
     //時間取得
     if(isset($_POST['time']) === TRUE){
       $time = $_POST['time'];
     }
     //名前チェック
     if(mb_strlen(trim(mb_convert_kana($guest,'s'))) === 0){
       $err_message[] = '名前を入力してください';
     }
     //メールアドレスチェック
     if(mb_strlen(trim(mb_convert_kana($mail,'s'))) === 0){
       $err_message[] = 'メールアドレスを入力してください';
     }
     if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\?\*\[|\]%'=~^\{\}\/\+!#&\$\._-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)+$/",$mail) !== 1){
       $err_message[] = 'メールアドレスの形式が正しくありません';
     }
     //日付チェック
     if(mb_strlen(trim(mb_convert_kana($date,'s'))) === 0){
       $err_message[] = '日付を選択してください';
     }
        $query = "INSERT INTO reservations(name,mail,shop,date,time) VALUES('$guest','$mail','$shop','$date','$time')";
        // クエリを実行します
        if(count($err_message) === 0){
             if (mysqli_query($link, $query) === TRUE) {
                print '予約しました';
            } else {
                print '失敗';
            }
      }
  }
   // 接続を閉じます
   mysqli_close($link);
// 接続失敗した場合
} else {
   print 'DB接続失敗';
}

include_once'../html/reservation.html';
