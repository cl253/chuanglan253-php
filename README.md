## chuanglan-php
**chuanglan-php-demo**



## 发送示例

**单发**
```php
//设置编码格式为utf-8;json格式统一使用utf-8封装
header(
"Content-type:text/html; charset=UTF-8"
);
//引入 sendSMSAPI.php 文件
require_once 'sendSMSAPI.php';
//实例化 ChuanglanSmsApi 类
$clapi  = new ChuanglanSmsApi();
//生成随机数（6位数）
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
注释：sendSMS方法中包含phone 手机号码，msg 短信内容；其中 msg=签名+短信模板


**群发**
 ```php
$result = $clapi->sendSMS('189*****139,153*****584','【253云通讯】您好！验证码是:'.$code);
```
注释：单发与群发使用同一个接口地址，批量请求手机号使用英文逗号间隔。一个批量<=1000

**请求方式**
```php
//json格式
curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charset=utf-8'   
			)
		);
```
注释：此接口统一使用json格式进行封装，采用post方式提交请求

## 源码说明 

- 编码要求为utf-8,请先将编辑器底层语言设置为utf-8

- 带有特殊字符的内容无法直接提交,需先将特殊字符进行urlencode编码后方能提交

- 开发API可参考单元测试 doc/253云通讯PaaS短信云接口说明（JSON版）.docx

## 文件配置说明

1、sms_send.php----------------普通短信发送

2、sms_send_variable.php-----------变量短信发送 

3、sms_query_balance.php-----------余额查询

注释：demo/API为储存测试代码文件夹；doc为储存word文档说明；



## 联系我们


[创蓝客服 链接](https://kefu253.udesk.cn/im_client/?web_plugin_id=47820={"name":"github"})


<img src="doc/kefu.jpg" width="20%" alt="创蓝客服"/>



## 文档链接
- [api文档](https://www.253.com/#/document/api_doc/zz)
