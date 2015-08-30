telemessage-php
===============

A PHP library for communicating with the TeleMessage REST API

Here you can find TeleMessage PHP library with examples

1. Using telemessage.phar file (tested with Windows and PHP 5.6.2)
2. Including src files as is   (tested with Windows and PHP 5.2.9, Windows and 5.6.2)

Using the Library
===================

There are 2 ways to use TeleMessage PHP Library:

Using phar archive (since PHP 5.2.0). Find it in github root folder: telemessage.phar. 
Using Library source code by including files in your own project.

Sending Messages
================

The first step is to include TeleMessage in your project: 

using phar: `require_once "telemessage.phar";`

using sources: `require_once ("com/TeleMessage.class.php");`


Next step is to initialize TeleMessage object: `$tm = TeleMessage::get();`

Now we need to create object with TeleMessage account credentials:

	$auth = new AuthenticationDetails();
	$auth->setUsername("john_donne");
	$auth->setPassword("12345678");

Let’s fill in the message data.

First, we set text and subject:

	$m = new Message();
	$m->setSubject("Hello");
	$m->setTextmessage("My message");
	
Than we create recipient and add it to Message:

	$recp = new Recipient();
	$recp->setType("SMS");
	$recp->setValue("+1xxxxxxxx");
	$m->addRecipient($recp);
	
and the next step, we generate REST to be send to TeleMessage: `$data = $tm->generateSend($auth, $m);`

Message is ready and now we need to send it to TeleMessage. In our example we use CURL for sending message to TeleMessage gateway:

First, let’s create headers:

    $myHeader = array(
        "MIME-Version: 1.0",
        "Content-type: text/json; charset=utf-8"
    );
	
Finally, we initialize CURL and POST `$data` to `TeleMessage::SEND_URL`:

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

The last small step is to parse response and find **TeleMessage** messageId and messageKey:

    if ($postResult != "") {
        $res = $tm->getResponse($postResult);
        echo "Result code: " . $res->getResultCode();
        if ($res->getResultCode() == TeleMessage::SUCCESS_SEND) {
            echo ", Message key: " . $res->getMessageKey() . ", message id: " . $res->getMessageID();
        } else {
            echo ", Result description: " . $res->getResultDescription();
        }
    }

That’s it – message is sent!


Sending Messages with Attachments
============================

Sending message with attachments is very similar to sending a simple message. The only thing you need to do is add your file by using the addFileMessage method:

    $fm = new FileMessage();
    $fm->setFilename("file.png");
    $fm->setMimetype("image/png");
    $imgPath = pathinfo(__FILE__, PATHINFO_DIRNAME) . "/file.png";
    $fm->setValue(base64_encode(file_get_contents($imgPath)));

    $m->addFilemessage($fm);

*Note:*

Some file types won’t be supported by your destination, e.g. if you are sending tiff file to SMS, the attachment won’t be added, however the same file will be delivered to a fax recipient.
You must encode your attachment file into Base64. Find more [here](https://www.google.com/?#q=base64+encode+online).

Query Status
============

Great! Message is sent, but status you’ve just received, saying that message "Not delivered yet". Sending message could take few seconds, so we added queryStatus in our REST API and you can use it with our PHP API Library. See how:

If you are using different from “Sending Message” script, first you need to include TeleMessage in your project: 

using phar: `require_once "telemessage.phar";`

using sources: `equire_once ("com/TeleMessage.class.php");`
 

Next step is to initialize TeleMessage object: `$tm = TeleMessage::get();`

Now we need to create object with **TeleMessage** account credentials:

	$auth = new AuthenticationDetails();
	$auth->setUsername("john_donne");
	$auth->setPassword("12345678");

and the next step, we generate REST to be send to TeleMessage: `$data = $tm->generateQueryStatus($auth, $messsageId, $messageKey);`

*Note:* Use `$messageID` and `$messageKey` from response to Sending Message

Again we are using CURL for POSTing request to TeleMessage gateway:

First, let’s create headers:

    $myHeader = array(
        "MIME-Version: 1.0",
        "Content-type: text/json; charset=utf-8"
    );
	
Finally, we initialize CURL and POST `$data` to `TeleMessage::STATUS_URL`:

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
	
Now, we need to parse response and print it out:

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
	
 That’s it. We hope it was helpful and now you can use TeleMessage services more easily
