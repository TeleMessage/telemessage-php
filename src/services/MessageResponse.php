<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */
class MessageResponse extends Response {

    protected $messageID;
    protected $messageKey;

    /**
     * @return mixed
     */
    public function getMessageID() { return $this->messageID; }

    /**
     * @param mixed $messageid
     */
    public function setMessageID($messageid) { $this->messageID = $messageid; }

    /**
     * @return mixed
     */
    public function getMessageKey() { return $this->messageKey; }

    /**
     * @param mixed $messagekey
     */
    public function setMessageKey($messagekey) { $this->messageKey = $messagekey; }

}