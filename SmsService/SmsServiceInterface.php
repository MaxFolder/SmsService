<?php

namespace SmsService;

use \Services\SmsService\SendResponse;

interface SmsServiceInterface {
    /**
     * @param $phoneNumber
     * @param $smsText
     * @return mixed
     */
    public function send($phoneNumber, $smsText);
    public function smsStatus($id);
}
