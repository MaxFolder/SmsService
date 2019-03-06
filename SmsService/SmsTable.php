<?php

namespace \Services\SmsService;


use Bitrix\Main\Entity\BooleanField;
use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;

class SmsTable extends DataManager {

    public static function getTableName() {

        return "marvelous_sms";
    }

    public static function getMap() {
        return array(
            new IntegerField(
                "ID",
                array(
                    "primary" => true,
                    "autocomplete" => true,
                )
            ),
            new StringField("PHONE"),
            new StringField("MESSAGE"),
            new BooleanField("SUCCESS", array("values" => array("Y", "N"))),
        );
    }
}