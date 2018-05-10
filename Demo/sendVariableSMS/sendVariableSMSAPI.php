<?php
header("Contrnt-type:text/html; charset=utf-8");

/*
* 类名：ChuanglanSmsApi
* 功能：创蓝接口请求
* 详细：构造创蓝短信接口请求，获取远程HTTP数据
* 版本：1.3
* 日起：2018-04-17
* 说明：为了方便而提供的代码，可根据自己网站需求，按照技术文档进行自行编写，并非一定要使用该代码
* 该代码仅供学习和研究创蓝接口使用，只是提供一个参考
*/


class ChuanglanSmsApi{
	//短信配置参数 请登录zz.253.com获取以下API信息
	const API_VARIABLE_URL = 'http://XXX/msg/variable/json';//创蓝变量短信接口URL
	const API_ACCOUNT='N*******';//创蓝API账号
	const API_PASSWORD='********';//创蓝API密码
	
	
	/**
	 * 发送变量短信
	 *
	 * @param string $msg 			短信内容
	 * @param string $params 	最多不能超过1000个参数组
	 */
	public function sendVariableSMS( $msg, $params) {
		
		//创蓝接口参数
		$postArr = array (
			'account'  =>  self::API_ACCOUNT,
			'password' => self::API_PASSWORD,
			'msg' => $msg,
			'params' => $params,
			'report' => 'true'
        );
		
		$result = $this->curlPost( self::API_VARIABLE_URL, $postArr);
		return $result;
	}
	
	/*
	* 通过CURL发送HTTP请求
	* @param string $url 请求的URL
	* @param array $postFields 请求的参数
	* @return mixed
	*
	*/
	private function curlPost($url,$postFields){
		$postFields=json_encode($postFields);
		$ch=curl_init();
		
		curl_setopt( $ch, CURLOPT_URL, $url ); 
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charset=utf-8'   //json版本需要填写  Content-Type: application/json;
			)
		);
		curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4); 
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_POST, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt( $ch, CURLOPT_TIMEOUT,5); 
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
		$ret = curl_exec ( $ch );
        if (false == $ret) {
            $result = curl_error(  $ch);
        } else {
            $rsp = curl_getinfo( $ch, CURLINFO_HTTP_CODE);
            if (200 != $rsp) {
                $result = "请求状态 ". $rsp . " " . curl_error($ch);
            } else {
                $result = $ret;
            }
        }
		curl_close ( $ch );
		return $result;
		
	}
	
	
}

?>
