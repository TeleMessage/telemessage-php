<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */

class MessageResponse extends Response {

    protected $messageID;
    protected $messageKey;

    function __construct() {
        parent::__construct("MessageResponse");
    }

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


    function toJson() {
        return "{\"class\" : \"" . $this->class . "\", \"messageID\": " . $this->messageID . ", \"resultCode\": " . $this->resultCode . ", \"resultDescription\" : \"" . addcslashes($this->resultDescription, TeleMessage::ESCAPE_JSON) . "\"" . ", \"messageKey\" : \"" . addcslashes($this->messageKey, TeleMessage::ESCAPE_JSON) . "\"}";
    }

    function fromJson($data){
        $this->messageID = $data["messageID"];
        $this->messageKey = $data["messageKey"];
        parent::fromJson($data);
    }


} 