<?php

echo json_encode(getImg(getImges()));
exit;

//履歴ファイル読み込み
function getImges(){
	$fileContents = file("./history.txt",FILE_IGNORE_NEW_LINES);
	return $fileContents;
}

//使用する画像を返す
function getImg($params){
	$maxNum = 0;
	$retVal;
	//とりあえず、10回にしとく
	for($maxNum; $maxNum < 10; $maxNum++){
		$idx = 0;
		$updParams = $params;
		foreach($params as $param){
			$line = explode("\t",$param);
			if($line[0] > $maxNum){ 
				$idx++;
				continue;
			}else{
				$line[0] = $maxNum + 1;
				$updLine = implode("\t", $line);
				$updParams[$idx] = $updLine;
				UpdateHistory($updParams);
				$retVal[0] = $line[1];
				$retVal[1] = unserialize($line[2]);
				$idx++;
				return $retVal;
			}
		}
	}
	return null;
}

//ファイル更新処理
function updateHistory($params){
	$file = "./history.txt";
	deleteHistory($file);
	$handle = fopen($file,"a");
	foreach($params as $param)
	{
		fwrite($handle,$param.PHP_EOL);
	}
	fclose($handle);
}

function deleteHistory($filename){
  $handler = fopen($filename,"r+");

   //ファイルを0に丸める
   ftruncate($handler,0);

   //ファイルポイントを先頭に戻す
   fseek($handler,0);
   fclose($handler);
}
