<?php

namespace \Services\SmsService;


use \Services\SmsService\SendResponse;

interface SmsServiceInterface {
    /**
     * @param $phoneNumber
     * @param $smsText
     * @return SendResponse
     */
    public function send($phoneNumber, $smsText);
    public function smsStatus($id);
}
