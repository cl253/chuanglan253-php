## chuanglan-php
**chuanglan-php-demo**



**---------------------------------------------短信发送示例-------------------------------------------------**

1、单发
```php
header(
"Content-type:text/html; charset=UTF-8"
);

require_once 'sendSMSAPI.php';
$clapi  = new ChuanglanSmsApi();
$code = mt_rand(100000,999999);

//设置您要发送的内容：其中“【】”中括号为运营商签名符号，多签名内容前置添加提交
$result = $clapi->sendSMS('189*****139','【253云通讯】您好！验证码是:'.$code);

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
```
**注释**：sendSMS方法中包含phone //手机号码，msg //短信内容；其中 msg=签名+短信模板


2、批量发送（手机号码使用英文逗号间隔）
 ```php
header(
"Content-type:text/html; charset=UTF-8"
);
require_once 'sendSMSAPI.php';
$clapi  = new ChuanglanSmsApi();
$code = mt_rand(100000,999999);

//设置您要发送的内容：其中“【】”中括号为运营商签名符号，多签名内容前置添加提交
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
```
**注释**：sendSMS方法中包含phone //手机号码，msg //短信内容；其中 msg=签名+短信模板



**------------------------------------------------文件说明-----------------------------------------------------**

sendSMS.zip-----普通短信发送

balanceQuery.zip------余额查询

sendVariableSMS.zip--------变量短信发送 

依据您需求选择对应功能文件，参考示例说明操作

下载完成 将demo放入到项目环境中、填写示例中的参数 请求API账号密码以及接口地址请登录zz.253.com获取

具体详情请阅读-->253云通讯PaaS短信云接口说明（JSON版）.docx



## 联系我们



[创蓝客服 链接](https://kefu253.udesk.cn/im_client/?web_plugin_id=47820={"name":"github"})



## 文档链接
- [api文档](https://www.253.com/#/document/api_doc/zz)
