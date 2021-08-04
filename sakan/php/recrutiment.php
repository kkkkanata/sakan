<?php
//変数初期化
$name = '';
$mail = '';
$job = '';
$shop ='';
$request ='';
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
     if(isset($_POST['name']) === TRUE){
       $name = $_POST['name'];
     }
     //メールアドレス取得
     if(isset($_POST['mail']) === TRUE){
       $mail = $_POST['mail'];
     }
     //職種取得
     if(isset($_POST['job']) === TRUE){
       $job = $_POST['job'];
     }
     //店鋪取得
     if(isset($_POST['shop']) === TRUE){
       $shop = $_POST['shop'];
     }
     //要望取得
     if(isset($_POST['request']) === TRUE){
       $request = $_POST['request'];
     }
     //名前チェック
     if(mb_strlen(trim(mb_convert_kana($name,'s'))) === 0){
       $err_message[] = '名前を入力してください';
     }
     //メールアドレスチェック
     if(mb_strlen(trim(mb_convert_kana($mail,'s'))) === 0){
       $err_message[] = 'メールアドレスを入力してください';
     }
     if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\?\*\[|\]%'=~^\{\}\/\+!#&\$\._-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)+$/",$mail) !== 1){
       $err_message[] = 'メールアドレスの形式が正しくありません';
     }
     //要望チェック
     if(mb_strlen(trim(mb_convert_kana($request,'s'))) >100){
       $err_message[] = '要望は１００文字以内でお願いします';
     }
   //sql
   $query=" INSERT INTO recrutiment_table(name,mail,job,shop,request)
                   VALUES('$name','$mail','$job','$shop','$request')";
    //クエリ実行
    if(count($err_message) === 0){
      if(mysqli_query($link,$query) === TRUE){
              print '受け付けました';
      }else{
             print '受付失敗';
      }
    }
}
    //db切断
    mysqli_close($link);
//db接続失敗した場合
}else{
  print 'db接続失敗';
}

include_once'../html/recrutiment.html';
