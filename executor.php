<?php

class Executor {
	protected $domain_id = '308'; // coxnews.fyre.co
	
	private $_url = [
		'domain' => 'http://admin.livefyre.com/api/v3.0/powertools/enterprise/domain/details'
	];
	
	private $_token = 'eyJhbGciOiAiSFMyNTYiLCAidHlwIjogIkpXVCJ9.eyJkb21haW4iOiAibGl2ZWZ5cmUuY29tIiwgImV4cGlyZXMiOiAxMzg5NTEwMDc0LjIzNDgwMiwgInVzZXJfaWQiOiAiX3U5NzIifQ.KDOi6zP1edsamQ16yXpnqpfe6kkWhgHFWKbZf5wsWsA';
	
	public function __construct() {
		// stub
		
	}
	
	public function getSites() {
		$url = $this->_url['domain'] . "?lftoken=$this->_token";
		
		$s = curl_init();
		
		curl_setopt($s,CURLOPT_URL,$url);
		curl_setopt($s,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($s, CURLOPT_POSTFIELDS, "{\"domains\": [{\"domain_id\": \"$this->domain_id\"}]}");
		$return = curl_exec($s);
		
		$sites = [];
		
// 		echo '<pre>';
// 		var_dump(json_decode($return)->data);
		
		foreach (json_decode($return)->data[0]->sites as $site ) {
			$sites[] = array(
				'id' => $site->site_id,
				'url' => $site->site_url
			);
		}
		
		return json_encode($sites);
		
// 		echo '<pre>'; 
// 		var_dump($sites);die;
	}
};

?>