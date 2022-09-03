<?php 
  require_once("./inc/numbersHash.inc.php");
  require_once("./modules/parseTxtFile.php");

  $file1 = $_FILES['file'] ?? "";

  if( $file1 === "" ){
    echo "We havn't got any file";
    exit;
  }

  $openFile = file_get_contents($_FILES['file']['tmp_name']);
  $string2Array = ParseTxtFile::split2lines($openFile);

  $invoice = '';
  foreach($string2Array as $key => $value){
    $invoice .= ParseTxtFile::convertAscii2Number($value) . "\n" .PHP_EOL;
  }
  //
    # if you choose to see the answer inside iframe
  //
  if(isset($_POST['showIframe'])){
    echo '<pre>';
    echo $invoice;
    exit;
  }
  //
    # if you choose to download txt file
  //
  $file = "output_".$_FILES['file']['name'];
  header('Content-Disposition: attachment; filename='.basename($file));
  header("Content-Type: text/plan");
  echo $invoice;
?>