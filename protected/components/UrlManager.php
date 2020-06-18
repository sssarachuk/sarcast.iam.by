<?php

class UrlManager extends CUrlManager {

	/**
	 * Constructs a URL.
	 * @param string the controller and the action (e.g. article/read)
	 * @param array list of GET parameters (name=>value). Both the name and value will be URL-encoded.
	 * If the name is '#', the corresponding value will be treated as an anchor
	 * and will be appended at the end of the URL. This anchor feature has been available since version 1.0.1.
	 * @param string the token separating name-value pairs in the URL. Defaults to '&'.
	 * @return string the constructed URL
	 */
	/*public function createUrl($route,$params=array(),$ampersand='&') {
		$url = parent::createUrl($route, $params, $ampersand);
		for ($ip = 1; $ip < 4; $ip++) {
			$url = str_replace('replacesuffix' . $ip, '', $url);
		}
		return $url;
	}*/

}