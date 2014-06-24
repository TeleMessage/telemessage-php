<?php
    // includes TeleMessage.
    require_once ("../../com/TeleMessage.class.php");
    // initializing data and autoloading required files
    $tm = TeleMessage::get();

    $auth = new AuthenticationDetails();
    $auth->setUsername("grinfeld");
    $auth->setPassword("1946");

    $recp = new Recipient();
    $recp->setType("SMS");
    $recp->setValue("+972544403945");

    $m = new Message();
    $m->addRecipient($recp);
    $m->setSubject("Hello");
    $m->setTextmessage("My message");

    $data = $tm->generateSend($auth, $m);

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
    curl_setopt($ch, CURLOPT_URL, TeleMessage::SEND_URL);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $myHeader);
    $postResult = curl_exec($ch);
    curl_close($ch);

    if ($postResult != "") {
        $res = $tm->getResponse($postResult);
        echo "Result code: " . $res->getResultCode();
        if ($res->getResultCode() == TeleMessage::SUCCESS_SEND) {
            echo ", Message key: " . $res->getMessageKey() . ", message id: " . $res->getMessageID();
        } else {
            echo ", Result description: " . $res->getResultDescription();
        }
    }
?>