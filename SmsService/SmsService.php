<?php

namespace Marvelous\Services\SmsService;

use Bitrix\Main\Web\HttpClient;
use Marvelous\Base;

class SmsService extends Base implements SmsServiceInterface {

    private $accessKey;
    private $secretKey;

    /**
     * SmsService constructor.
     * @param string $access_key
     * @param string $secret_key_hash
     */
    public function __construct($access_key, $secret_key_hash) {
        $this->accessKey = $access_key;
        $this->secretKey = $secret_key_hash;

    }

    /**
     * @param $phoneNumber
     * @param $smsText
     * @return SendResponse
     */

    private function sendRequest($url, $postData) {

        $httpClient = new HttpClient();
        $data = $httpClient->post($url, $postData);
        $data = json_decode($data, true);
        return $data;
    }

    public function send($phoneNumber, $smsText) {

        $postData = array(
            "access_key" => $this->accessKey,
            "secret_key_hash" => sha1($this->secretKey),
            "target" => $phoneNumber,
            "content" => $smsText,
        );

        $data = $this->sendRequest("http://ps.p0w.ru/api1/send_sms", $postData );
        return new SendResponse($data["id"], $data["error"]);
    }

    public function smsStatus($id) {

        $postData = array(
            "access_key" => $this->accessKey,
            "secret_key_hash" => sha1($this->secretKey),
            "id" => $id,
        );

        $data = $this->sendRequest("http://ps.p0w.ru/api1/info", $postData );

        return new StatusResponse($data["info"]["created"],$data["info"]["active"], $data["info"]["delivered"], $data["info"]["target"], $data["info"]["error"]);

    }
}
