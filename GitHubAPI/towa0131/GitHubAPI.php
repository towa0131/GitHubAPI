<?php

namespace GitHubAPI\towa0131;

/*
こちらのGitHubAPIはtowa0131が作成しました。
尚、すべての関数は所得失敗時にnullを返します。
又、設定されていない項目(例: 住所が未設定)を所得した場合もnullを返します。
二次配布は厳禁です。
このAPIを使ったものを配布する場合はtowa0131とお書きください。
*/

class GitHubAPI{
	private function getFile($name){
	define('GitHub_ACCOUNT', $name);
	ini_set('user_agent', 'MyUserAgent');
	$user_name = GitHub_ACCOUNT;
	$json = file_get_contents('https://api.github.com/users/'.$user_name);
	$profile = json_decode($json, true);
		return $profile;
		}
//idを所得
	public function getID($name){
		$profile = $this->getFile($name);
	if(!isset($profile['id'])){
		return null;
			}else{
		return $profile['id'];
			}
		}

//プロフィールに設定してあるURLを所得
	public function getURL($name){
		$profile = $this->getFile($name);
	if(!isset($profile['blog'])){
		return null;
			}else{
		if($profile['blog'] == null){
		return null;
				}else{
		return $profile['blog'];
				}
			}
		}

//Emailを所得
	public function getEMail($name){
		$profile = $this->getFile($name);
	if(!isset($profile['email'])){
		return null;
			}else{
		if($profile['email'] == null){
		return null;
				}else{
		return $profile['email'];
				}
			}
		}

//プロフィール文を所得
	public function getBio($name){
		$profile = $this->getFile($name);
	if(!isset($profile['bio'])){
		return null;
			}else{
		if($profile['bio'] == null){
		return null;
				}else{
		return $profile['bio'];
				}
			}
		}

//フォロワー数を所得
	public function getFollowers($name){
		$profile = $this->getFile($name);
	if(!isset($profile['followers'])){
		return null;
			}else{
		return $profile['followers'];
			}
		}

//フォロー数を所得
	public function getFollowing($name){
		$profile = $this->getFile($name);
	if(!isset($profile['following'])){
		return null;
			}else{
		return $profile['following'];
			}
		}

//住所を所得
	public function getLocation($name){
		$profile = $this->getFile($name);
	if(!isset($profile['location'])){
		return null;
			}else{
		if($profile['location'] == null){
		return null;
				}else{
		return $profile['location'];
				}
			}
		}

//会社名を所得
	public function getCompany($name){
		$profile = $this->getFile($name);
	if(!isset($profile['company'])){
		return null;
			}else{
		if($profile['company'] == null){
		return null;
				}else{
		return $profile['company'];
				}
			}
		}

//レポジトリ数を所得
	public function getRepository($name){
		$profile = $this->getFile($name);
	if(!isset($profile['public_repos'])){
		return null;
			}else{
		return $profile['public_repos'];
			}
		}

//アカウントの作成日を所得
	public function getCreateAccount($name){
		$profile = $this->getFile($name);
	if(!isset($profile['created_at'])){
		return null;
			}else{
        $create = substr($profile['created_at'], 0, 10);
		return $create;
			}
		}

//アカウントの更新日を所得
	public function getUpdateAccount($name){
		$profile = $this->getFile($name);
	if(!isset($profile['updated_at'])){
		return null;
			}else{
        $create = substr($profile['updated_at'], 0, 10);
		return $create;
			}
		}
	}//Class