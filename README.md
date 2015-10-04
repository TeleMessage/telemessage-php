telemessage-php
===============

A PHP library for communicating with the TeleMessage REST API for sending and querying status for sent messages

# Using composer

## Sending Message

First we need to import telemessage classes:

    use grinfeld\phpjsonable\utils\streams\StringInputStream;
    use grinfeld\phpjsonable\utils\streams\StringOutputStream;
    use telemessage\web\services\AuthenticationDetails;
    use telemessage\web\services\FileMessage;
    use telemessage\web\services\Message;
    use telemessage\web\services\Recipient;
    use telemessage\web\TeleMessage;

Than we need to create object with **TeleMessage** account credentials:

    $auth = new AuthenticationDetails();
    $auth->setUsername("john_donne");
    $auth->setPassword("12345678");
    
Let’s fill in the message data.

Now, we set text and subject:

    $m = new Message();
    $m->setSubject("Hello");
    $m->setTextmessage("My message");
    
Than we create recipient and add it to message:

    $recp = new Recipient();
    $recp->setType("SMS");
    $recp->setValue("+1xxxxxxxx");
    $m->addRecipient($recp);
    
Message is ready. Now we need to convert it to JSON format and send to **TeleMessage** REST Gateway.

First we generate object which will store JSON output: `$output = new StringOutputStream();`

Than we encode our request data into JSON, by calling `TeleMessage::encode(array($auth, $m), $output);` 

Now JSON is ready and we send it to **TeleMessage** REST Gateway. In our example we use CURL, but you can use your favourite 
package to send http post requests:

    $myHeader = array(
        "MIME-Version: 1.0",
        "Content-type: text/json; charset=utf-8" // define content type JSON
    );
    //creating and initiating curl
    $ch = curl_init();
    //setting curl/http headers
    curl_setopt($ch, CURLOPT_POST,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $myHeader);
    
Next lines we add **TeleMessage** REST Gateway URL and JSON request:    
        
    curl_setopt($ch, CURLOPT_POSTFIELDS, $output->toString());
    curl_setopt($ch, CURLOPT_URL, TeleMessage::getSendURL());
    $postResult = curl_exec($ch); 
    curl_close($ch);
    
Now `$postResult` contains response received **from TeleMessage**. The last small step is to parse response and find TeleMessage messageId and messageKey:

    if ($postResult != "") {
        $res = TeleMessage::decode(new StringInputStream($postResult));
        echo "Result code: " . $res->getResultCode();
        if ($res->getResultCode() == TeleMessage::SUCCESS_SEND) {
            echo ", Message key: " . $res->getMessageKey() . ", message id: " . $res->getMessageID();
        } else {
            echo ", Result description: " . $res->getResultDescription();
        }
    }
    
We received response from TeleMessage and executed `TeleMessage::decode(new StringInputStream($postResult))` to receive `MessageResponse`.
 
That’s it – message is sent!

## Sending Messages with Attachments

Sending message with attachments is very similar to sending a simple message. The only thing you need to do is add your file by using the addFileMessage method:

    $fm = new FileMessage();
    $fm->setFilename("file.png");
    $fm->setMimetype("image/png");
    $imgPath = pathinfo(__FILE__, PATHINFO_DIRNAME) . "/file.png";
    $fm->setValue(base64_encode(file_get_contents($imgPath)));

    $m->addFilemessage($fm);
    
_Note:_
1. Some file types won’t be supported by your destination, e.g. if you are sending tiff file to SMS, the attachment won’t be added, however the same file will be delivered to a fax recipient.
2. You must encode your attachment file into Base64. Find more [here](https://www.google.com/?#q=base64+encode+online).
    
## Query Status

Great! Message is sent, but status you've just received, saying that message "Not delivered yet". 
Sending message could take few seconds, so we added `queryStatus` in our REST API and you can use it with our PHP API Library. See how:

First, we assume that *messageId* and *message key* are stored in `$messageId` and `$messageKey` variables after message has been sent. 

Again we need to create object with TeleMessage account credentials:

    $auth = new AuthenticationDetails();
    $auth->setUsername("john_donne");
    $auth->setPassword("12345678");
    
We generate object which will store JSON output: `$output = new StringOutputStream();`

We encode our request data into JSON, by calling `TeleMessage::encode(array($auth, $messageId, $messageKey), $output);`
     
Again we are using CURL for POSTing request to TeleMessage gateway, but you can use your favourite 
package to send http post requests:

    $myHeader = array(
        "MIME-Version: 1.0",
        "Content-type: text/json; charset=utf-8" // define content type JSON
    );
    //creating and initiating curl
    $ch = curl_init();
    //setting curl/http headers
    curl_setopt($ch, CURLOPT_POST,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $myHeader);
    
Next lines we add **TeleMessage** REST Gateway URL and JSON request:    
        
    curl_setopt($ch, CURLOPT_POSTFIELDS, $output->toString());
    curl_setopt($ch, CURLOPT_URL, TeleMessage::getStatusURL());
    $postResult = curl_exec($ch); 
    curl_close($ch);
    
Now, we need to parse response and print it out:

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
    
We received response from TeleMessage and executed `TeleMessage::decode(new StringInputStream($postResult))` to receive `MessageStatusResponse`.   
 
# Include TeleMessage PHP library without using composer

Using PHP library without composer is almost the same as with composer.
First download project release from Github, extract and find telemessage_web.phar
Since, we have dependancy on [grinfeld/phpjsonable](https://github.com/grinfeld/phpjsonable), we need to download its phar file, too: https://github.com/grinfeld/phpjsonable/releases

The main difference is: at the beginning of your script instead of `require "vendor/autoload.php"` used by *composer* write following lines:

    require "telemessage_web.phar";
    require "grinfeld_phpjsonable.phar";
    TMLoader::get();

After those lines use same code as in composer example 

That’s it. We hope it was helpful and now you can use TeleMessage services more easily.

_Note:_
* Older version without composer you can find [here](https://github.com/TeleMessage/telemessage-php/tree/telemessage-php1)
