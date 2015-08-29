<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
class GetMessagesResponse extends Response {
    protected $timeStamp;
    protected $invalidToken;
    protected $endOfMessages;
    protected $messagePresentationInfos = array();
    protected $lastId;

    /**
     * @return int
     */
    public function getTimeStamp() { return $this->timeStamp; }

    /**
     * @param int $timeStamp
     */
    public function setTimeStamp($timeStamp) { $this->timeStamp = $timeStamp; }

    /**
     * @return boolean
     */
    public function getInvalidToken() { return $this->invalidToken; }

    /**
     * @param boolean $invalidToken
     */
    public function setInvalidToken($invalidToken) { $this->invalidToken = $invalidToken; }

    /**
     * @return boolean
     */
    public function getEndOfMessages() { return $this->endOfMessages; }

    /**
     * @param boolean $endOfMessages
     */
    public function setEndOfMessages($endOfMessages) { $this->endOfMessages = $endOfMessages; }

    /**
     * @return array
     */
    public function getMessagePresentationInfos() { return $this->messagePresentationInfos; }

    /**
     * @param array $messagePresentationInfos
     */
    public function setMessagePresentationInfos(array $messagePresentationInfos) { $this->messagePresentationInfos = $messagePresentationInfos; }

    /**
     * @return int
     */
    public function getLastId() { return $this->lastId; }

    /**
     * @param int $lastId
     */
    public function setLastId($lastId) { $this->lastId = $lastId; }
}