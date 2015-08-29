<?php
/**
 * @author Grinfeld Mikhail
 * @since 8/28/2015.
 */

namespace telemessage\web\examples;

use grinfeld\phpjsonable\utils\streams\StringInputStream;
use grinfeld\phpjsonable\utils\streams\StringOutputStream;
use telemessage\web\services\AuthenticationDetails;
use telemessage\web\services\FileMessage;
use telemessage\web\services\Message;
use telemessage\web\services\Recipient;
use telemessage\web\TeleMessage;

class JsonPostExample {

    public static function sendMessage() {
        $auth = new AuthenticationDetails();
        $auth->setUsername("john_donne");
        $auth->setPassword("12345678");

        $recp = new Recipient();
        $recp->setType("SMS");
        $recp->setValue("972544403945");
        $m = new Message();
        $m->addRecipient($recp);
        $m->setSubject("Hello");
        $m->setTextmessage("My message");

        $output = new StringOutputStream();

        TeleMessage::encode(array($auth, $m), $output);
        //creating header for http post request
        $myHeader = array(
            "MIME-Version: 1.0",
            "Content-type: text/json; charset=utf-8"
        );
        //creating and initiating curl
        $ch = curl_init();
        //setting curl/http headers
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $output->toString());
        curl_setopt($ch, CURLOPT_URL, TeleMessage::getSendURL());
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $myHeader);
        $postResult = curl_exec($ch);
        curl_close($ch);

        if ($postResult !== false) {
            $res = TeleMessage::decode(new StringInputStream($postResult));
            echo "Result code: " . $res->getResultCode();
            if ($res->getResultCode() == TeleMessage::SUCCESS_SEND) {
                echo ", Message key: " . $res->getMessageKey() . ", message id: " . $res->getMessageID();
            } else {
                echo ", Result description: " . $res->getResultDescription();
            }
        }

    }

    public static function sendFileMessage() {
        $auth = new AuthenticationDetails();
        $auth->setUsername("john_donne");
        $auth->setPassword("12345678");

        $recp = new Recipient();
        $recp->setType("EMAIL");
        $recp->setValue("grinfeld@gmail.com");
        $m = new Message();
        $m->addRecipient($recp);

        $fm = new FileMessage();
        $fm->setFilename("file.png");
        $fm->setMimetype("image/png");
        $imgPath = pathinfo(__FILE__, PATHINFO_DIRNAME) . "/file.png";
        $fm->setValue(base64_encode(file_get_contents($imgPath)));
        $m->addFilemessage($fm);

        $output = new StringOutputStream();

        TeleMessage::encode(array($auth, $m), $output);
        //creating header for http post request
        $myHeader = array(
            "MIME-Version: 1.0",
            "Content-type: text/json; charset=utf-8"
        );
        //creating and initiating curl
        $ch = curl_init();
        //setting curl/http headers
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $output->toString());
        curl_setopt($ch, CURLOPT_URL, TeleMessage::getSendURL());
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $myHeader);
        $postResult = curl_exec($ch);
        curl_close($ch);

        if ($postResult !== false) {
            $res = TeleMessage::decode(new StringInputStream($postResult));
            echo "Result code: " . $res->getResultCode();
            if ($res->getResultCode() == TeleMessage::SUCCESS_SEND) {
                echo ", Message key: " . $res->getMessageKey() . ", message id: " . $res->getMessageID();
            } else {
                echo ", Result description: " . $res->getResultDescription();
            }
        }
    }

    public static function getStatus() {
        //Result code: 100, Message key: 602195172328077583768441395109, message id: 404640783

        $auth = new AuthenticationDetails();
        $auth->setUsername("john_donne");
        $auth->setPassword("12345678");
        $messsageId = 404640783;
        $messageKey = "602195172328077583768441395109";

        $output = new StringOutputStream();

        TeleMessage::encode(array($auth, $messsageId, $messageKey), $output);
        //creating header for http post request
        $myHeader = array(
            "MIME-Version: 1.0",
            "Content-type: text/json; charset=utf-8"
        );
        //creating and initiating curl
        $ch = curl_init();
        //setting curl/http headers
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $output->toString());
        curl_setopt($ch, CURLOPT_URL, TeleMessage::getStatusURL());
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $myHeader);
        $postResult = curl_exec($ch);
        curl_close($ch);
        if ($postResult != "") {
            $res = TeleMessage::decode(new StringInputStream($postResult));
            echo "Result code: " . $res->getResultCode();
            if ($res->getResultCode() == TeleMessage::SUCCESS_REQUEST) {
                $recipients = $res->getRecipientStatus();
                if (count($recipients) > 0) {
                    foreach ($recipients as $status) {
                        echo ", Message sent to  " . $status->getRecipient()->getValue() .
                            " with status " . $status->getStatus() . " that means " . $status->getDescription() .
                            " at " . date("y/m/d i:h:s", $status->getStatusDate());
                    }
                }
            } else {
                echo "Result description: " . $res->getResultDescription();
            }
        }
    }
}