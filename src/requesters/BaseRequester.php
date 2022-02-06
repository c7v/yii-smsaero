<?php

namespace c7v\yii_smsaero\requesters;

use yii\httpclient\Client;

/**
 * Class BaseRequester
 *
 * @property Client $_httpClient
 * @package c7v\yii_smsaero
 * @author Artem Sokolovsky <artem@sokolovsky.dev>
 */
abstract class BaseRequester
{
    /** @var Client */
    protected static $_httpClient;

    /**
     * @param Client $httpClient
     * @return void
     */
    public static function setHttpClient(Client $httpClient)
    {
        self::$_httpClient = $httpClient;
    }
}