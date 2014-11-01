<?php

    // initializing data and autoloading required files
    $tm = TeleMessage::get();

    $auth = new AuthenticationDetails();
    $auth->setUsername("john_donne");
    $auth->setPassword("12345678");

    $messsageId = 352866230;
    $messageKey = "392449495831987710820990896274";

    $data = $tm->generateQueryStatus($auth, $messsageId, $messageKey);

    //var_dump($data);

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
    curl_setopt($ch, CURLOPT_URL, TeleMessage::STATUS_URL);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $myHeader);
    $postResult = curl_exec($ch);
    curl_close($ch);

    if ($postResult != "") {
        $res = $tm->getResponse($postResult);
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

?>