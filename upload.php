<?php
include('page_header.php');
if (is_uploaded_file($_FILES["csvfile"]["tmp_name"])) {
  $file_tmp_name = $_FILES["csvfile"]["tmp_name"];
  $file_name = $_FILES["csvfile"]["name"];

  //拡張子を判定
  if (pathinfo($file_name, PATHINFO_EXTENSION) != 'csv') {
    $err_msg = 'CSVファイルのみ対応しています。';
  } else {

    //ファイルをdataディレクトリに移動
    if (move_uploaded_file($file_tmp_name, "C:\eclipse-php\xampp\htdocs\css" . $file_name)) {
      //後で削除できるように権限を644に
      chmod("C:\eclipse-php\xampp\htdocs\css" . $file_name, 0644);
      $msg = $file_name . "をアップロードしました。";
      $file = 'C:\eclipse-php\xampp\htdocs\css'.$file_name;
      $fp   = fopen($file, "r");

      //配列に変換する
      while (($data = fgetcsv($fp, 0, ",")) !== FALSE) {
        $asins[] = $data;
      }
      fclose($fp);
      //ファイルの削除
      unlink('C:\eclipse-php\xampp\htdocs\css'.$file_name);
    } else {
      $err_msg = "ファイルをアップロードできません。";
    }
  }
} else {
  $err_msg = "ファイルが選択されていません。";
}