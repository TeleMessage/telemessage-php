<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */

/**
 * Class TeleMessage
 * Singleton to perform request to TeleMessage REST API
 */
class TeleMessage {

    const SUCCESS_SEND = 100;
    const SUCCESS_REQUEST = 0;

    CONST TM_NAMESPACE = "telemessage.web.services.";
    CONST ESCAPE_JSON = "\"\\";
    private static $classes = array(
        "JSONable",
        "CoreClass",
        "AuthenticationDetails",
        "IPDeviceAuthenticationDetails",
        "FileMessage",
        "Message",
        "Response",
        "MessageResponse",
        "StatusMessageResponse",
        "Property",
        "Recipient",
        "RecipientStatus",
        "Schedule"
    );

    const STATUS_URL = "https://rest.telemessage.com/rest/message/status/";
    const SEND_URL = "https://rest.telemessage.com/rest/message/send/";

    private static $tm = null;

    static function get() {
        if (self::$tm == null) {
            self::$tm = new self();
        }

        return self::$tm;
    }

    private $path;

    private function __construct() {
        $this->path = dirname(__FILE__);
        foreach (self::$classes as $class) {
            if (!$this->_classExists($class)) {
                require_once ($this->path . "/" . str_replace(".", "/", self::TM_NAMESPACE) . $class . ".class.php");
            }
        }
    }


    /**
     * Utility function which wraps PHP's class_exists() function to ensure
     * consistent behavior between PHP versions 4 and 5.  Autoloading behavior
     * is always disabled.
     *
     * @param string $class     The name of the class whose existence should
     *                          be tested.
     *
     * @return bool             True if the class exists.
     *
     * @access private
     */
    private function _classExists($class) {
        if (version_compare(PHP_VERSION, '5.0.0', 'ge')) {
            return class_exists($class, false);
        }

        if (version_compare(PHP_VERSION, '5.0.1', 'ge')) {
            return interface_exists($class, false);
        }

        return class_exists($class);
    }

    private function sendRequest($data, $url) {

        //creating header for http post request
        $myHeader = array(
            "MIME-Version: 1.0",
            "Content-type: text/json; charset=utf-8"
        );
        //creating and initiating curl
        $ch = curl_init();
        //setting curl/http headers
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $myHeader);
        //executing http request and getting response. $postResult will contain response json from TeleMessage.
        $postResult = curl_exec($ch);
        if (curl_errno($ch)) {
            return null;
            /*
            * for PHP5 you can throw Exception:
            * throw new Exception("Error while sending");
            */
        }
        curl_close($ch);

        return $postResult;
    }

    /**
     * @param array $data to import
     * @return CoreClass
     */
    private function fromJson($data) {
        if (isset ($data["class"])) {
            $obj = $this->extractClass($data["class"]);
            $obj->fromJson($data);
            return $obj;
        }
        return $data;
    }

    /**
     * Querying TeleMessage REST API for status
     * @param AuthenticationDetails $auth
     * @param integer $messageID message id to check status
     * @param string $messageKey message key to check status
     * @return string
     */
    function generateQueryStatus(AuthenticationDetails $auth, $messageID, $messageKey) {
        return "[" . $auth->toJson() . ", " . $messageID . ", \"" . addcslashes($messageKey, TeleMessage::ESCAPE_JSON) . "\"]";
    }

    /**
     * Parse response from sending or querying status
     * @param $postResult
     * @return null|Response|StatusMessageResponse
     */
    function getResponse($postResult) {
        $data = json_decode($postResult, true);
        if ($data && is_array($data)) {
            $res = $data[0];
            return $this->fromJson($res);
        }
        return null;
    }

    /**
     * Sending rest message to TeleMessage REST API
     * @param AuthenticationDetails $auth
     * @param Message $message
     * @return string
     */
    function generateSend(AuthenticationDetails $auth, Message $message) {
        return "[" . $auth->toJson() . ", " . $message->toJson() . "]";
    }

    private function extractClass($classPath) {
        if (strpos($classPath, TeleMessage::TM_NAMESPACE) == 0) {
            $clName = substr($classPath, strlen(TeleMessage::TM_NAMESPACE));
            $ref = new ReflectionClass($clName);
            return $ref->newInstance();
        }
        return null;
    }
}