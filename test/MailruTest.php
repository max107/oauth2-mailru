<?php

namespace Max107\OAuth2\Client\Test\Provider;

use Max107\OAuth2\Client\Provider\MailruUser;

class MailruTest extends \PHPUnit_Framework_TestCase
{
    protected $response;
    protected $provider;
    protected $token;

    protected function setUp()
    {
        $this->response = json_decode('[{"uid":"1234567890123456789","email":"username@mail.ru","sex":0,'
            . '"has_pic":1,"pic":"http://mock.ph/oto.jpg","first_name":"First","last_name":"Last",'
            . '"location":{"country":{"name":"Россия","id":"24"},"city":{"name":"Тольятти","id":"561"},'
            . '"region":{"name":"Самарская обл.","id":"246"}},"link":"http://my.mail.ru/mail/username/"}]', true);
        $this->provider = new \Max107\OAuth2\Client\Provider\Mailru([
            'clientId' => 'mock',
            'clientSecret' => 'mock_secret',
            'redirectUri' => 'none',
        ]);
        $this->token = new \League\OAuth2\Client\Token\AccessToken([
            'access_token' => 'mock_token',
        ]);
    }

    public function testUserDetails()
    {
        $user = new MailruUser($this->response);
        $res = $this->response[0];
        $this->assertInstanceOf(MailruUser::class, $user);
        $this->assertEquals($res['uid'], $user->getId());
        $this->assertEquals($res['first_name'] . ' ' . $res['last_name'], $user->getName());
        $this->assertEquals($res['email'], $user->getEmail());
        $this->assertEquals($res['sex'], $user->getGender());
        $this->assertEquals($res['first_name'], $user->getFirstName());
        $this->assertEquals($res['last_name'], $user->getLastName());
        $this->assertEquals($res['pic'], $user->getImageUrl());
    }

    public function testUrlUserDetails()
    {
        $query = parse_url($this->provider->getResourceOwnerDetailsUrl($this->token), PHP_URL_QUERY);
        parse_str($query, $param);

        $this->assertEquals($this->token->getToken(), $param['session_key']);
        $this->assertNotEmpty($param['sig']);
    }
}
