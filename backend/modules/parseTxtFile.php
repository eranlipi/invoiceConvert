<?php

class ParseTxtFile {

  static public $invoceSplitedList = array();
  static public $numbersList = array();
  static public $line1;
  static public $line2;
  static public $line3;

  //
    # this function get the invoce list and split to lines every invoce
  //
  static public function split2lines($str){

    $txtList = explode("\n",$str);
    $counter = 0;
    $newLine = 0;
    foreach($txtList as $key => $value){
      if($counter == 4){
        $counter = 0 ;
        $newLine ++;
      }
      self::$invoceSplitedList[$newLine][] =  $value;
      $counter ++;
    }
    return self::$invoceSplitedList;
  }

 //
    # convert the ascii to numbers and add ILLEGAL
  //
  static public function convertAscii2Number($array){
    self::$line1 = $array[0] ?? ' ';
    self::$line2 = $array[1] ?? ' ';
    self::$line3 = $array[2] ?? ' ';
 
    if(self::$line1 == ' ' || self::$line2 == ' ' || self::$line3 == ' ' ){
      return '';
    }

    self::$numbersList = array();

    $list1 = str_split(self::$line1 , $length = 3);
    $list2 = str_split(self::$line2 , $length = 3);
    $list3 = str_split(self::$line3 , $length = 3);

    self::splitNumbers($list1);
    self::splitNumbers($list2);
    self::splitNumbers($list3);
   

    $invoice = '';
    $isValid= true;
    for($i = 0; $i < count(self::$numbersList); $i++){
      foreach(self::$numbersList[$i] as $key => $value){
        $string = implode(" ",self::$numbersList[$i]);
      
      }
      $result = self::convert2Number($string);
      if($result == '?'){
        $isValid = false;
      }
      $invoice .= $result;
    }
  
    if ($isValid === false AND $invoice != '?'){
      $invoice .= '  ILLEGAL';  
    }
    if($invoice == '?'){
      $invoice = '';
    }
    return $invoice;
  }

 static public function splitNumbers($list){
    $num =0;
    $counter = 0;
    for($a = 0; $a < count($list); $a++ ){
      $counter ++; 
      self::$numbersList[$num][] = $list[$a];
      $num ++;
    }
 }
 static public function convert2Number($str){
    switch ($str){
        case AsciiConverter::$ascii2Number[0]:
        return '0';
        case AsciiConverter::$ascii2Number[1]:
        return '1';
        case AsciiConverter::$ascii2Number[2]:
        return '2';
        case AsciiConverter::$ascii2Number[3]:
        return '3';
        case AsciiConverter::$ascii2Number[4]:
        return '4';
        case AsciiConverter::$ascii2Number[5]:
        return '5';
        case AsciiConverter::$ascii2Number[6]:
        return '6';
        case AsciiConverter::$ascii2Number[7]:
        return '7';
        case AsciiConverter::$ascii2Number[8]:
        return '8';
        case AsciiConverter::$ascii2Number[9]:
        return '9';
        default:
        return '?';
    } 
 }

}