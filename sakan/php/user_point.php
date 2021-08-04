<?php
//変数初期化
$user = '';
$mail = '';
$number = '';
$user_passwd = '';
$deadine = '';
$data = [];
$id = '';
$err_message = [];
$host = 'localhost'; // データベースのホスト名又はIPアドレス
$username = 'root';  // MySQLのユーザ名
$passwd   = 'root';    // MySQLのパスワード
$dbname   = 'wp_01';    // データベース名

// 接続成功した場合
if($link = mysqli_connect($host,$username,$passwd,$dbname)){
  //文字化け防止
  mysqli_set_charset($link,'utf8');
  //ポスト通信
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //ユーザー名取得
    if(isset($_POST['user']) === TRUE){
      $user = $_POST['user'];
    }

    //メールアドレス取得取得
    if(isset($_POST['mail']) === TRUE){
      $mail = $_POST['mail'];
    }

    //会員番号取得取得
    if(isset($_POST['number']) === TRUE){
      $number = $_POST['number'];
    }

    //パスワード取得
    if(isset($_POST['user_passwd']) === TRUE){
      $user_passwd = $_POST['user_passwd'];
    }

    //ユーザー名チェック
    if(mb_strlen(trim(mb_convert_kana($user))) === 0){
      $err_message[] = 'ユーザー名を入力してください';
    }

    //メールアドレスチェック
    if(mb_strlen(trim(mb_convert_kana($mail,'s'))) === 0){
      $err_message[] = 'メールアドレスを入力してください';
    }
    if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\?\*\[|\]%'=~^\{\}\/\+!#&\$\._-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)+$/",$mail) !== 1){
      $err_message[] = 'メールアドレスの形式が正しくありません';
    }

    //会員番号チェック
    if(mb_strlen(trim(mb_convert_kana($number,'s'))) === 0){
      $err_message[] = '会員番号を入力してください';
    }
    if(preg_match("/^[0-9]*$/",$number) !== 1){
      $err_message[] = '会員番号は半角数字で入力してください';
    }

    //パスワードチェック
    if(mb_strlen($user_passwd) < 6){
        $err_message[] = 'パスワードは6文字以上で入力してください';
    }else if(preg_match('/^[0-9a-zA-Z]*$/',$user_passwd) !== 1){
        $err_message[] = 'パスワードは半角英数字で入力してください';
    }

    //ポイント取得
    //sql文
    $sql = "SELECT point,deadine FROM point_table
                WHERE number = '$number' ";

    //クエリ実行
    if(count($err_message) === 0){
      if($result  = mysqli_query($link,$sql) ){
         while($row = mysqli_fetch_assoc($result)){
           $data[] = $row;
         }
         $ent_message = 'ただいま'.$data[0]['point'].'ポイント保有しています。';
         $deadine = $data[0]['deadine'];
         mysqli_free_result($result);
      }
   }else{
       $err_message[] = '入力情報に誤りがあります';
   }

   //ユーザーID取得
   //sql文
   $sql = "SELECT id FROM user_table
               WHERE user = '$user'
               AND mail = '$mail'
               AND number = '$number'
               AND user_passwd ='$user_passwd' ";

    // クエリ実行
    if(count($err_message) === 0){
       $row = [];
       $data = [];
      if($result  = mysqli_query($link,$sql) ){
         while($row = mysqli_fetch_assoc($result)){
           $data[] = $row;
         }
         //idチェック
         if(isset($data[0]['id']) === TRUE){
           $id = $data[0]['id'];
         }else{
           $err_message[] = '入力情報に誤りがあります';
         }
         mysqli_free_result($result);
      }
   }else{
       $err_message[] = '入力情報に誤りがあります';
   }
 }
    //DB切断
    mysqli_close($link);

}else{
    //DB接続失敗
    print 'DB接続失敗';
}

include_once'../html/user_point.html';
