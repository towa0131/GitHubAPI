<?php

namespace githubapi;

class API{

	protected $account;

	public function __construct(string $name){
		$this->account = $this->getAccountData($name);
	}

	private function getAccountData(string $name){
		$json = $this->getCurlData("https://api.github.com/users/" . $name);
		$profile = json_decode($json, true);
		return $profile;
	}

	public function getName(){
		return $this->account["name"] ?? null;
	}

	public function getId(){
		return $this->account["id"] ?? null;
	}

	public function getBlog(){
		return $this->account["blog"] ?? null;
	}

	public function getEMail(){
		return $this->account["email"] ?? null;
	}

	public function getBio(){
		return $this->account["bio"] ?? null;
	}

	public function getFollowers(){
		return $this->account["followers"] ?? null;
	}

	public function getFollowing(){
		return $this->account["following"] ?? null;
	}

	public function getLocation(){
		return $this->account["location"] ?? null;
	}

	public function getCompany(){
		return $this->account["company"] ?? null;
	}

	public function getRepositoryCount(){
		return $this->account["public_repos"] ?? null;
	}

	public function getGistCount(){
		return $this->account["public_gists"] ?? null;
	}

	public function getCreatedAt(){
		if(isset($this->account["created_at"])){
			return substr($this->account["created_at"], 0, 10);
		}
		return null;
	}

	public function getUpdatedAt(){
		if(isset($this->account["updated_at"])){
			return substr($this->account["updated_at"], 0, 10);
		}
		return null;
	}

	protected function getCurlData(string $url){
		$ch = curl_init();
		$header = ["User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36"];
		curl_setopt_array($ch, [CURLOPT_URL => $url,
								CURLOPT_SSL_VERIFYPEER =>false,
								CURLOPT_RETURNTRANSFER =>true,
								CURLOPT_HTTPHEADER => $header
								]);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
}