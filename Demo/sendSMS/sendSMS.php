<?php
header("Content-type:text/html; charset=UTF-8");
/* *
 * 功能：创蓝发送信息DEMO
 * 版本：1.3
 * 日期：2017-04-12
 * 说明：
 * 以下代码只是为了方便客户测试而提供的样例代码，客户可以根据自己网站的需要，按照技术文档自行编写,并非一定要使用该代码。
 * 该代码仅供学习和研究创蓝接口使用，只是提供一个参考。
 */
//设置您要发送的内容：其中“【】”中括号为运营商签名符号，多签名内容前置添加提交
require_once 'sendSMSAPI.php';
$clapi  = new ChuanglanSmsApi();
$code = mt_rand(100000,999999);
$result = $clapi->sendSMS('189*****139,153*****584','【253云通讯】您好！验证码是:'.$code);
if(!is_null(json_decode($result))){

	$output=json_decode($result,true);

	if(isset($output['code'])  && $output['code']=='0'){
		echo $result;
	}else{
		echo $output['errorMsg'];
	}
}else{
		echo $result; 
}




?>
