<?php

class twitter extends model {

	public $username = 'ben_myagoo';
	public $tweetsUrl = 'http://twitter.com/statuses/user_timeline.json';
	public $userUrl = 'http://api.twitter.com/1/users/show.json';

	public function __construct() {
		return false;
	}

	/**
	 * Permet une lecture rapide d'un modèle grace à son identifiant
	 * */
	public function read($fields=null) {
		return false;
	}

	public function save($data, $html=false) {
		return false;
	}

	public function find($options = array()) {
		if (isset($options['request']) && $options['request'] == 'user') {
			$url = $this->userUrl;
		} else {
			$url = $this->tweetsUrl;
		}
		$first = true;
		if (!isset($options['screen_name']) && !isset($options['user_id'])) {
			$options['screen_name'] = $this->username;
		}
		foreach ($options as $option => $value) {
			if ($first) {
				$url .= '?';
				$first = false;
			} else {
				$url .= '&';
			}
			$url .= $option . '=' . $value;
		}
		$this->twitter = curl_init();
		curl_setopt($this->twitter, CURLOPT_URL, $url);
		curl_setopt($this->twitter, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->twitter, CURLOPT_TIMEOUT_MS, 1500);
		$data = json_decode(curl_exec($this->twitter));
		curl_close($this->twitter);
		return objectToArray($data);
	}

	public function delete($id=null) {
		return false;
	}

}
?>
