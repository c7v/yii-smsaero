<?php

namespace c7v\yii_smsaero;

use yii\base\Component;
use yii\httpclient\Client;

/**
 * Class SmsAero
 *
 * @property string $username
 * @property string $password
 * @property integer $timeout
 * @package c7v\yii_smsaero
 * @author Artem Sokolovsky <artem@sokolovsky.dev>
 */
final class SmsAero extends Component
{
    const BASE_API_URL = 'https://gate.smsaero.ru/v2/';

    /** @var string */
    public $username;

    /** @var string */
    public $password;

    /** @var integer */
    public $timeout = 3;

    /** @var Client */
    private $_httpClient;

    /**
     * @param string $username Имя пользователя
     * @param string $password Пароль или Access token
     * @param array $config Опциональные параметры
     */
    public function __construct(string $username, string $password, array $config = [])
    {
        /** @var string username */
        $this->username = $config['username'];

        /** @var string password */
        $this->password = $config['password'];

        if (!empty($config['timeout']) && is_int($config['timeout'])) {
            $this->timeout = $config['timeout'];
        } else {
            throw new SmsAeroException('Timeout param is not int');
        }

        parent::__construct($config);
        $this->_httpClient = $this->initHttpClient();
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return Client
     */
    private function initHttpClient()
    {
        return new Client([
            'baseUrl' => self::BASE_API_URL,
        ]);
    }
}