<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "weixin");
include_once 'common.php';
include_once 'wechat.class.php';


class wechatCallbackapiTest extends wechat
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
			//调用$tmp_arr
				global $tmp_arr;
				switch($postObj->MsgType){
					case 'text':
						if($keyword == '图片'){
							//ToUserName	是	接收方帐号（收到的OpenID）
							//FromUserName	是	开发者微信号
							//CreateTime	是	消息创建时间 （整型）
							//MsgType	是	image
							//MediaId	是 通过素材管理中的接口上传多媒体文件，得到的id。
							$msgType = 'image';
							$mediaId = 'jfhZp2GDOKG2BYD7Cw5MDD5-p6f_KrgQSz_Z-72OFW0aMgsovBIsoQRklg-32N9g';
							$resultStr = sprintf($tmp_arr['image'],  $fromUsername,$toUsername, $time, $msgType, $mediaId);
						}else if($keyword == '音乐'){
							$msgType = 'music';
							$title = '原创音乐大碟';
							$description = '很好听的哦';
							$musicURL = 'http://php37.muyoushi.cn/music.mp3';
							$hqurl    = 'http://php37.muyoushi.cn/music.mp3';
							$resultStr = sprintf($tmp_arr['music'],  $fromUsername,$toUsername, $time, $msgType, $title,$description,$musicURL,$hqurl);
						}else if($keyword == '笨蛋'){
							$msgType = 'text';
							$contentStr = '!';
							$resultStr = sprintf($tmp_arr['text'],  $fromUsername,$toUsername, $time, $msgType, $contentStr);
						}else if($keyword == '图文'){
							$msgType = 'news';
							$count = 1;
							$str = '<item>
								<Title><![CDATA[猜猜我是谁]]></Title> 
								<Description><![CDATA[恩,我就是我,,,]]></Description>
								<PicUrl><![CDATA[http://php37.muyoushi.cn/images/heihei.jpg]]></PicUrl>
								<Url><![CDATA[http://php37.muyoushi.cn]]></Url>
								</item>';
							$resultStr = sprintf($tmp_arr['news'],  $fromUsername,$toUsername, $time, $msgType, $count,$str);
						}else if($keyword == '多图文'){
							$msgType = 'news';
							$count = 3;
							$str = '<item>
								<Title><![CDATA[猜猜我是谁]]></Title> 
								<Description><![CDATA[恩,我就是我,,,]]></Description>
								<PicUrl><![CDATA[http://php37.muyoushi.cn/images/heihei.jpg]]></PicUrl>
								<Url><![CDATA[http://php37.muyoushi.cn]]></Url>
								</item>
								<item>
								<Title><![CDATA[嘿嘿,看到我就开心了吧]]></Title> 
								<Description><![CDATA[我就是一张可爱的图片,不骂人的]]></Description>
								<PicUrl><![CDATA[http://php37.muyoushi.cn/images/5.jpg]]></PicUrl>
								<Url><![CDATA[http://php37.muyoushi.cn]]></Url>
								</item>
								<item>
								<Title><![CDATA[瞎弄的]]></Title> 
								<Description><![CDATA[电脑里面没啥图片,随便弄个凑凑数]]></Description>
								<PicUrl><![CDATA[http://php37.muyoushi.cn/images/2.jpg]]></PicUrl>
								<Url><![CDATA[http://php37.muyoushi.cn]]></Url>
								</item>
								';
							$resultStr = sprintf($tmp_arr['news'],  $fromUsername,$toUsername, $time, $msgType, $count,$str);
						}else{
							$msgType = 'text';
							$contentStr = '抱歉,你输入的文字没有对应的功能哦!';
							$resultStr = sprintf($tmp_arr['text'],  $fromUsername,$toUsername, $time, $msgType, $contentStr);
						}
						// file_put_contents('wx.log', $resultStr, FILE_APPEND);
						echo $resultStr;
					return;
					case 'voice':
						$msgType = 'text';
						$contentStr = '我是语言!';
						$resultStr = sprintf($tmp_arr['text'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
						echo $resultStr;
					return;
					case 'video':
						$msgType = 'text';
						$contentStr = '我是video';
						$resultStr = sprintf($tmp_arr['text'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
						echo $resultStr;
					return;
					case 'image':
						$msgType = 'text';
						$contentStr = '我是图片!';
						$resultStr = sprintf($tmp_arr['text'],  $fromUsername,$toUsername, $time, $msgType, $contentStr);
						echo $resultStr;
					return;
					case 'event':
						if($postObj->Event == 'CLICK' && $postObj->EventKey == 'letitgo'){
							$msgType = 'music';
							$title = '原创音乐大碟';
							$description = '很好听的哦';
							$musicURL = 'http://php37.muyoushi.cn/music.mp3';
							$hqurl    = 'http://php37.muyoushi.cn/music.mp3';
							$resultStr = sprintf($tmp_arr['music'],  $fromUsername,$toUsername, $time, $msgType, $title,$description,$musicURL,$hqurl);
							echo $resultStr;
						}else if($postObj->Event == 'CLICK' && $postObj->EventKey == 'lookyou'){
							$msgType = 'music';
							$title = '漂洋过海来看你';
							$description = '一首漂洋过海来看你,带给大家';
							$musicURL = 'http://php37.muyoushi.cn/lookyou.mp3';
							$hqurl    = 'http://php37.muyoushi.cn/lookyou.mp3';
							$resultStr = sprintf($tmp_arr['music'],  $fromUsername,$toUsername, $time, $msgType, $title,$description,$musicURL,$hqurl);
							echo $resultStr;
						}else if($postObj->Event == 'CLICK' && $postObj->EventKey == 'V1001_GOOD'){
							$msgType = 'text';
							$contentStr = '感谢小美女的点赞!';
							$resultStr = sprintf($tmp_arr['text'],  $fromUsername,$toUsername, $time, $msgType, $contentStr);
							echo $resultStr;
						}else{
							$msgType = 'text';
							$contentStr = '谢谢关注!';
							$resultStr = sprintf($tmp_arr['text'],  $fromUsername,$toUsername, $time, $msgType, $contentStr);
							echo $resultStr;
						}
					return;
					case 'location':
						$location_x = $postObj->Location_X;//纬度
						$location_y = $postObj->Location_Y;//经度
						$msgType = 'text';
						//调用高德地图做查询
						$keywords = urlencode('银行');
						$url = "http://restapi.amap.com/v3/place/around?key=6fe4382f22d104060f2eee17332b22ce&location={$location_y},{$location_x}&keywords={$keywords}&radius=1000&offset=1&page=1&extensions=all";

						$result = $this->url_request($url);
						$result = json_decode($result);
						$name = $result->pois[0]->name;
						$type = $result->pois[0]->type;
						$address = $result->pois[0]->address;
						$tel = $result->pois[0]->tel;
						$distance = $result->pois[0]->distance;
						$contentStr = '离你最近的银行是:'.$name.',类型是:'.$type.',地址是:'.$address.',电话是:'.$tel.',距离是:'.$distance.'m';
						$resultStr = sprintf($tmp_arr['text'],  $fromUsername,$toUsername, $time, $msgType, $contentStr);
						echo $resultStr;
				}


        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
$wechatObj->responseMsg();
?>