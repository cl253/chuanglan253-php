<?php
/* *
 * 功能：创蓝发送变量短信DEMO
 * 版本：1.3
 * 日期：2017-04-12
 * 说明：
 * 以下代码只是为了方便客户测试而提供的样例代码，客户可以根据自己网站的需要，按照技术文档自行编写,并非一定要使用该代码。
 * 该代码仅供学习和研究创蓝接口使用，只是提供一个参考。
 * 
 */
//【幽枫科技】岁月如流水，{$var}，多少习惯成自然。{$var}，但{$var}的生活，则是{$var}的{$var}。养活{$var}只需要{$var}，让自己{$var}却需要{$var}。幸福{$var}感受{$var}不同，{$var}不同，{$var}的{$var}不同，{$var}不同，{$var}就不同。{$var}的智慧，{$var}让你懂得{$var}，更是让你{$var}何时该执着，{$var}放手。
require_once 'ChuanglanSmsHelper/ChuanglanSmsApi.php';
$clapi  = new ChuanglanSmsApi();
$msg = '【253云通讯】{$var},您好，您发送的内容是{$var}';

// $params = '18917407239,多少付出成习惯,生命是自然的赏赐,幸福,智慧,赏赐,自己,勤劳,幸福,智慧,是一种,处境,追求,追求,结果,心态,感受,真正,不仅是,追求,明白,何时该';
$params = '18317156692,001,001;18917407239,122,115;15333333333,123,555';

$result = $clapi->sendVariableSMS($msg, $params);

if(!is_null(json_decode($result))){
	
	$output=json_decode($result,true);

	if(isset($output['code'])  && $output['code']=='0'){
		echo $result;
	}else{
		echo $result;
		// echo $output['errorMsg'];
	}
}else{
		echo $result;
}
