# chuanglan-php
chuanglan-php-demo



---------------------------------------------创蓝 php 短信发送示例-------------------------------------------------

1、普通发送(批量发送短信使用英文逗号间隔，示例如下)

require_once 'sendSMSAPI.php';
$clapi  = new ChuanglanSmsApi();
$code = mt_rand(100000,999999);

//设置您要发送的内容：其中“【】”中括号为运营商签名符号，多签名内容前置添加提交
$result = $clapi->sendSMS('18900000139,15300000584','【253云通讯】您好！验证码是:'.$code);
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

注释：sendSMS方法中包含手机号码，短信内容，msg=签名+短信模板


2、变量发送（批量发送短信，参数组使用英文分好间隔，示例如下）
 
require_once 'sendVariableSMSAPI.php';
$clapi  = new ChuanglanSmsApi();

//设置您要发送的内容：其中“【】”中括号为运营商签名符号，多签名内容前置添加提交
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
注释：params参数包含手机号码,变量1,变量2；


----------------------------------------------创蓝php demo php文件说明---------------------------------------------

sendSMS.zip-----普通短信发送

balanceQuery.zip------余额查询

sendVariableSMS.zip--------变量短信发送 

依据您需求选择对应功能文件，参考示例说明操作

下载完成 将demo放入到项目环境中、填写示例中的参数 请求API账号密码以及接口地址请登录zz.253.com获取

具体详情请阅读-->253云通讯PaaS短信云接口说明（JSON版）.docx

----------------------------------------------发送短信接入流程：--------------------------------------------------

1.登录 https://zz.253.com

2.获取接口API账号，密码：选择任意产品>激活>企业认证（上传公司营业执照）

3.申请签名（以公司简称或缩写命名）备注：平台申请签名，API接口加上申请签名

4.模板申请（自定义编辑内容）：选择任意应用>短息编辑栏目{模板管理}>添加模板  

备注：申请模板可达到短信免审作用

## 联系我们



[创蓝客服 链接](https://kefu253.udesk.cn/im_client/?web_plugin_id=47820={"name":"github"})



## 文档链接
- [api文档](https://www.253.com/#/document/1)
