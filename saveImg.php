<?php
//main処理
$imageData = $_POST['image'];
$positions = $_POST['positions'];

$idx = getFilenameIndex();
$filename = './images/photo'.$idx.'.bmp';
$saveFilename = '/images/photo'.$idx.'.bmp';
$fp = fopen($filename, 'w');
fwrite($fp,base64_decode($imageData));
fclose($fp);
//historyファイルに書き込み
saveInfo($saveFilename,$positions);

//以下関数群

//履歴ファイルを空にする 使わなかった
function deleteHistory($filename){
  $handler = fopen($filename,"r+");

   //ファイルを0に丸める
   ftruncate($handler,0);

   //ファイルポイントを先頭に戻す
   fseek($handler,0);
   fclose($handler);
}


function getFilenameIndex(){
	$i = count(scandir("./images/")) -2;
	return $i;

}

function saveInfo($filename,$positions){

	$file = "./history.txt";
	$handle = fopen($file,"a");
		fwrite($handle,"0\t".$filename."\t".serialize($positions).PHP_EOL);
	fclose($handle);
}
