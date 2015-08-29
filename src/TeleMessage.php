<?php
/**
 * @author Grinfeld Mikhail
 * @since 8/28/2015.
 */

namespace telemessage\web;

use grinfeld\phpjsonable\parsers\json\Json;
use grinfeld\phpjsonable\utils\Configuration;
use grinfeld\phpjsonable\utils\strategy\LanguageStrategyFactory;
use grinfeld\phpjsonable\utils\streams\InputStream;
use grinfeld\phpjsonable\utils\streams\OutputStream;
use telemessage\web\services\Response;

class TeleMessage {
    const TeleMessage_Domain = "https://rest.telemessage.com/rest";

    const SEND_SUFFIX = "/message/send/";
    const STATUS_SUFFIX = "/message/status/";

    const SUCCESS_SEND = 100;
    const SUCCESS_REQUEST = 0;

    public static function getSendURL($domain = self::TeleMessage_Domain) {
        return $domain . self::SEND_SUFFIX;
    }

    public static function getStatusURL($domain = self::TeleMessage_Domain) {
        return $domain . self::STATUS_SUFFIX;
    }

    /**
     * Encode object int $outputTo
     * @param mixed $obj to encode
     * @param OutputStream $outputTo
     */
    public static function encode($obj, OutputStream &$outputTo) {
        Json::encode($obj, $outputTo, new Configuration(
            array(
                Configuration::INCLUDE_CLASS_NAME_PROPERTY => "true",
                Configuration::CLASS_TYPE_PROPERTY => LanguageStrategyFactory::LANG_JAVA
            )
        ));
    }

    /**
     * @param InputStream $input
     * @return Response from TeleMessage REST (or any class inherited from Response, depends on request type)
     */
    public static function decode(InputStream $input) {
        $ret = Json::decode($input);
        if (is_array($ret) && count($ret) == 1 && is_a($ret[0], "telemessage\\web\\services\\Response")) {
            return $ret[0];
        }
        return $ret;
    }
}