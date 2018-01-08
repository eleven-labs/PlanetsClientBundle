<?php

namespace ElevenLabs\PlanetsClientBundle\Services;

class ApiClientService
{
    private $guzzle;
    private $email;
    private $password;
    private $clientId;
    private $clientSecret;

    public function __construct($guzzle, $email, $password, $clientId, $clientSecret)
    {
        $this->guzzle = $guzzle;
        $this->email = $email;
        $this->password = $password;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    public function getToken()
    {
        $oauth = [
            "username" => $this->email,
            "password" => $this->password,
            "grant_type" => "password",
            "client_id" => $this->clientId,
            "client_secret" => $this->clientSecret
        ];

        $res = $this->guzzle->request('post', '/oauth/v2/token',
            [
                'headers' => ['Content-type' => 'application/json'],
                'json' => $oauth,
            ]
        );

        $body = $res->getBody();
        $json = json_decode($body->getContents(), true);

        return ucfirst($json['token_type']) . ' ' . $json['access_token'];
    }

    public function getApi($url)
    {
        $token = $this->getToken();

        $res = $this->guzzle->get($url,
        [
            'headers' => [
                'Authorization' => $token,
                'Content-type' => 'application/json'
            ],
        ]);

        $body = $res->getBody();
        $json = json_decode($body->getContents(), true);

        return $json;
    }
}
