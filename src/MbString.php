<?php
namespace MbString;
class MbString{
	private $_mb_encoding;	// 类使用的编码类型
	public function __construct($encoding=''){
		try{
			if(!extension_loaded('mbstring'))
				throw new \Exception('The mbstring extension is not open!');
			if($encoding && in_array($encoding,mb_list_encodings())){
				$this->_mb_encoding = $encoding;
			}elseif($encoding === ''){
				$this->_mb_encoding = mb_internal_encoding();
			}else{
				throw new \Exception('The incoming encoding is invalid!');
			}
		}catch(\Exception $e){
			echo '<b>Message</b>:'.$e->getMessage().' <b>File</b>:'.$e->getFile().' <b>Line</b>:'.$e->getLine();
			exit;
		}
	}

	// 字符串反转
	public function strRev($str){
		try{
			if(!is_string($str) || !mb_check_encoding($str,$this->_mb_encoding))	
				throw new \Exception('The incoming string is invalid!');
			$array = array();
			$l = mb_strlen($str,$this->_mb_encoding);
			for($i=0;$i<$l;$i++){
				$array[] = mb_substr($str,$i,1,$this->_mb_encoding);
			}
			krsort($array);
			$strRe = implode($array);
			return $strRe;
		}catch(\Exception $e){
			echo '<b>Message</b>:'.$e->getMessage().' <b>File</b>:'.$e->getFile().' <b>Line</b>:'.$e->getLine();
			exit;
		}
		
	}
}