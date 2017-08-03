<?php

namespace Min\Controller;

use Think\Controller;

class MsgController extends Controller 
{

	public function index()
	{
		// signature=496c927ea12738bce85cc178abe4e9adfe6b21d2&timestamp=1501737009&nonce=384134589&openid=oTY3_0F_TrAuM5oX5qxzAIXPJi8c

		    // file_put_contents('./test.txt',$_POST);


		    // exit;
		$echoStr = $_GET["echostr"];
		 if ($this->checkSignature()) {
		 echo $echoStr;
		 exit;
		 }

	}


	//检验signature
    private function checkSignature()
    {
    	 	$signature = $_GET["signature"];
		    $timestamp = $_GET["timestamp"];
		    $nonce = $_GET["nonce"];

		    $token = '13539993040';
		    $tmpArr = array($token, $timestamp, $nonce);
		    sort($tmpArr, SORT_STRING);
		    $tmpStr = implode( $tmpArr );
		    $tmpStr = sha1( $tmpStr );

		    if( $tmpStr == $signature ){
		    // file_put_contents('./test.txt',$signature.'_'.$timestamp.'_'.$nonce.'_'.$tmpStr);
		        return true;
		    }else{
		        return false;
		    }


	}





}