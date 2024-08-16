<?php

session_start();
require_once 'funcs.php';
loginCheck();

//1. POST取得
$id = $_GET['id'];

//2. DB接続します
$pdo = db_conn();

//３．登録SQL作成
$stmt = $pdo->prepare('DELETE FROM contents WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}