<?php
header("Content-type:text/html; charset=UTF-8");
/* *
 * 功能：创蓝发送变量短信DEMO
 * 版本：1.3
 * 日期：2018-04-17
 * 说明：
 * 以下代码只是为了方便客户测试而提供的样例代码，客户可以根据自己网站的需要，按照技术文档自行编写,并非一定要使用该代码。
 * 该代码仅供学习和研究创蓝接口使用，只是提供一个参考。
 * 
 */
 
 //设置您要发送的内容：其中“【】”中括号为运营商签名符号，多签名内容前置添加提交
require_once 'sendVariableSMSAPI.php';
$clapi  = new ChuanglanSmsApi();
$msg = '【253云通讯】尊敬的{$var},您好，您发送的内容是{$var}';

$params = '183*****652,001,005;187*****239,115,005;153*****822,005,555';
$result = $clapi->sendVariableSMS($msg, $params);

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
