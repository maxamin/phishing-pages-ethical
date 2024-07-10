<?php

class CryptoDB {

  private $db = "";
  private $password = "";

  function __construct($db_path, $password="") {
    if($db_path != "") {
      if($password == "") {
        $this->db = $db_path;
      } else {
        $this->db = $db_path;
        $this->password = $password;
      }
    }
  }
  function getTables() {
    if($this->password == "") {
      $db = file_get_contents($this->db);
    } else {
      $db = decrypt(file_get_contents($this->db), $this->password);
    }
    $tables = Array();
    $db_extracted = Array();
    $data = preg_match_all('/\[TABLE name=\"([a-z]+)\"\](.*?)\[\/TABLE\]/', $db, $db_extracted);
    array_push($tables, $db_extracted[1]);
    return $tables;
  }
  function getRows($table) {
    if($this->password == "") {
      $db = file_get_contents($this->db);
    } else {
      $db = decrypt(file_get_contents($this->db), $this->password);
    }
    $tables = Array();
    $rows = Array();
    $rows_extracted = Array();
    $db_extracted = Array();
    preg_match_all('/\[TABLE name=\"'.$table.'\"\](.*?)\[\/TABLE\]/', $db, $db_extracted);
    preg_match_all('/\[ROW id=\"\d+\"\](.*?)\[\/ROW\]/', $db_extracted[1][0], $rows_extracted);
    foreach($rows_extracted[1] as $r) {
      array_push($tables, $r);
    }
    return $tables;
  }
  function getColumns($row, $column="") {
    if($column == "") {
      $columns = Array();
      $columns_extracted = Array();
      $data = preg_match_all('/\[COLUMN name=\"([a-z]+)\"\](.*?)\[\/COLUMN\]/', $row, $columns_extracted);
      $i = 0;
      while($i < count($columns_extracted[1])) {
        $columns[$columns_extracted[1][$i]] = $columns_extracted[2][$i];
        $i += 1;
      }
      return $columns;
    } else {
      $columns = Array();
      $columns_extracted = Array();
      $data = preg_match_all('/\[COLUMN name=\"([a-z]+)\"\](.*?)\[\/COLUMN\]/', $row, $columns_extracted);
      $i = 0;
      while($i < count($columns_extracted[1])) {
        if($columns_extracted[1][$i] == $column) {
          return $columns_extracted[2][$i];
          break;
        } else {
          $i += 1;
        }
      }
    }
  }
  function insertRow($table, $row) {
    if($this->password == "") {
      $db = file_get_contents($this->db);
    } else {
      $db = decrypt(file_get_contents($this->db), $this->password);
    }
    $tables = Array();
    $rows = Array();
    $rows_extracted = Array();
    $db_extracted = Array();
    preg_match_all('/\[TABLE name=\"'.$table.'\"\](.*?)\[\/TABLE\]/', $db, $db_extracted);
    $current_content = $db_extracted[1][0];
    $new_content = "[TABLE name=\"$table\"]".$current_content.",".$row."[/TABLE]";
    $db = preg_replace('/\[TABLE name=\"'.$table.'\"\](.*?)\[\/TABLE\]/', $new_content, $db);
    $db_file = fopen($this->db, "w");
    if($this->password == "") {
      fwrite($db_file, $db);
    } else {
      fwrite($db_file, encrypt($db, $this->password));
    }
    fclose($db_file);
  }
  function deleteRow($table, $id) {
    if($this->password == "") {
      $db = file_get_contents($this->db);
    } else {
      $db = decrypt(file_get_contents($this->db), $this->password);
    }
    $tables = Array();
    $rows = Array();
    $rows_extracted = Array();
    $db_extracted = Array();
    preg_match_all('/\[TABLE name=\"'.$table.'\"\](.*?)\[\/TABLE\]/', $db, $db_extracted);
    $current_content = $db_extracted[1][0];
    $new_data = preg_replace('/\[ROW id="'.$id.'"\](.*?)\[\/ROW\]/', "", $current_content);
    $new_content = "[TABLE name=\"$table\"]".$new_data."[/TABLE]";
    $newdb = preg_replace('/\[TABLE name=\"'.$table.'\"\](.*?)\[\/TABLE\]/', $new_content, $db);
    $db_file = fopen($this->db, "w");
    if($this->password == "") {
      fwrite($db_file, $newdb);
    } else {
      fwrite($db_file, encrypt($newdb, $this->password));
    }
    fclose($db_file);
  }
  function totalRows($table) {
    if($this->password == "") {
      $db = file_get_contents($this->db);
    } else {
      $db = decrypt(file_get_contents($this->db), $this->password);
    }
    $tables = Array();
    $rows = Array();
    $rows_extracted = Array();
    $db_extracted = Array();
    preg_match_all('/\[TABLE name=\"'.$table.'\"\](.*?)\[\/TABLE\]/', $db, $db_extracted);
    preg_match_all('/\[ROW id=\"\d+\"\](.*?)\[\/ROW\]/', $db_extracted[1][0], $rows_extracted);
    return count($rows_extracted[0]);
  }
}
?>
