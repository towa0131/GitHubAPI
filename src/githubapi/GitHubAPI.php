<?php

namespace githubapi;

class GitHubAPI
{
    protected $account;

    public function __construct(string $name)
    {
        $this->account = $this->getAccountData($name);
    }

    public function getName(): string
    {
        return $this->account["name"];
    }

    public function getId(): int
    {
        return $this->account["id"];
    }

    public function getBlog(): ?string
    {
        return $this->account["blog"] ?? null;
    }

    public function getEMail(): ?string
    {
        return $this->account["email"];
    }

    public function getBio(): ?string
    {
        return $this->account["bio"];
    }

    public function getFollowers(): int
    {
        return $this->account["followers"];
    }

    public function getFollowing(): int
    {
        return $this->account["following"];
    }

    public function getLocation(): ?string
    {
        return $this->account["location"];
    }

    public function getCompany(): ?string
    {
        return $this->account["company"];
    }

    public function getTwitter(): ?string
    {
        return $this->account["twitter_username"];
    }

    public function getRepositoryCount(): int
    {
        return $this->account["public_repos"];
    }

    public function getGistCount(): int
    {
        return $this->account["public_gists"];
    }

    public function getCreatedAt(): string
    {
        return $this->account["created_at"];
    }

    public function getUpdatedAt(): string
    {
        return $this->account["updated_at"];
    }

    public function getAccountData(string $name)
    {
        $json = $this->getCurlData("https://api.github.com/users/" . $name);
        $profile = json_decode($json, true);

        if (isset($profile["message"]) && $profile["message"] == "Not Found") {
            throw new AccountNotFoundException($name . " is not found", 1);
        }

        return $profile;
    }

    protected function getCurlData(string $url): string
    {
        $ch = curl_init();
        $header = ["User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36"];
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $header
        ]);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
