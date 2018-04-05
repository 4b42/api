<?php
/*----------------------------------------------------------------------+
| Copyright 2006-2018 by Kevin Buehl <kevin.buehl@4b42.com>             |
+-----------------------------------------------------------------------+
|  __          __    _____________    __          __    ______________  |
| |  |  2006  |  |  |   _______   \  |  |        |  |  |___________   | |
| |  |  2018  |  |  |  |       \  |  |  |        |  |              |  | |
| |  |___ ____|  |  |  |_______/  /  |  |___ ____|  |   ___________|  | |
| |______ ____   |  |   _______  |   |______ ____   |  |   ___________| |
|  by         |  |  |  |       \  \  Content     |  |  |  |             |
|    Kevin    |  |  |  |_______/  |   Management |  |  |  |___________  |
|      Buehl  |__|  |_____________/     System   |__|  |______________| |
|                                                                       |
+-----------------------------------------------------------------------+
| 2018-04-05	Kevin Buehl	created					|
+----------------------------------------------------------------------*/
namespace 4b42;
class curl
{
	function request($url)
	{
		$socket		=	curl_init();
						curl_setopt($socket,CURLOPT_URL,$url);
						curl_setopt($socket,CURLOPT_HEADER,false);
						curl_setopt($socket,CURLOPT_RETURNTRANSFER,true);
						curl_setopt($socket,CURLOPT_FOLLOWLOCATION,true);
						curl_setopt($socket,CURLOPT_SSL_VERIFYHOST,2);
						curl_setopt($socket,CURLOPT_SSL_VERIFYPEER,false);
						curl_setopt($socket,CURLOPT_TIMEOUT,10);
						curl_setopt($socket,CURLOPT_HTTPHEADER,array(
							'Content-Type: application/json'
						));
		$return		=	curl_exec($socket);
					curl_close($socket);
		if($return===false)
			return false;
		return json_decode($return,true);
	}
}
?>
