<?php
class oxlang_ext extends oxlang_ext_parent {
  public function getMultiLangTables() {
    $arr = parent::getMultiLangTables();
    array_push($arr, "mstabs");
    return $arr;
  }
}
