<?php
header("Content-type:text/html; charset=UTF-8");
/* *
 * 功能：创蓝查询余额DEMO
 * 版本：1.3
 * 日期：2017-04-12
 * 说明：
 * 以下代码只是为了方便客户测试而提供的样例代码，客户可以根据自己网站的需要，按照技术文档自行编写,并非一定要使用该代码。
 * 该代码仅供学习和研究创蓝接口使用，只是提供一个参考。
 */
require_once 'ChuanglanSmsHelper/ChuanglanSmsApi.php';
$clapi  = new ChuanglanSmsApi();
$result = $clapi->queryBalance();

if(!is_null(json_decode($result))){
	
	$output=json_decode($result,true);
	if(isset($output['balance'])){
		echo '余额	' . $output['balance'].'	条' ;
	}else{
		echo $output['errorMsg'];
	}
}else{
		echo $result;
}
