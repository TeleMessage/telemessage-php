<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
class MessagePresentationInfo extends CoreClass {
    protected $id ;
    protected $size;
    protected $date;
    protected $subject;
    protected $messageType;
    protected $text;
    protected $dialogGroupId;
    protected $fileMessages = array();
    protected $senderFirstName;
    protected $senderLastName;
    protected $ttl;
    protected $isRead;
    protected $from;
    protected $originalMsgId;
    protected $hadSMSFallback;

    /**
     * @return int
     */
    public function getId() { return $this->id; }

    /**
     * @param int $id
     */
    public function setId($id) { $this->id = $id; }

    /**
     * @return int
     */
    public function getSize() { return $this->size; }

    /**
     * @param int $size
     */
    public function setSize($size) { $this->size = $size; }

    /**
     * @return int
     */
    public function getDate() { return $this->date; }

    /**
     * @param int $date
     */
    public function setDate($date) { $this->date = $date; }

    /**
     * @return string
     */
    public function getSubject() { return $this->subject; }

    /**
     * @param string $subject
     */
    public function setSubject($subject) { $this->subject = $subject; }

    /**
     * @return int
     */
    public function getMessageType() { return $this->messageType; }

    /**
     * @param int $messageType
     */
    public function setMessageType($messageType) { $this->messageType = $messageType; }

    /**
     * @return string
     */
    public function getText() { return $this->text; }

    /**
     * @param string $text
     */
    public function setText($text) { $this->text = $text; }

    /**
     * @return int
     */
    public function getDialogGroupId() { return $this->dialogGroupId; }

    /**
     * @param int $dialogGroupId
     */
    public function setDialogGroupId($dialogGroupId) { $this->dialogGroupId = $dialogGroupId; }

    /**
     * @return array
     */
    public function getFileMessages() { return $this->fileMessages; }

    /**
     * @param array $fileMessages
     */
    public function setFileMessages(array $fileMessages) { $this->fileMessages = $fileMessages; }

    /**
     * @return string
     */
    public function getSenderFirstName() { return $this->senderFirstName; }

    /**
     * @param string $senderFirstName
     */
    public function setSenderFirstName($senderFirstName) { $this->senderFirstName = $senderFirstName; }

    /**
     * @return string
     */
    public function getSenderLastName() { return $this->senderLastName; }

    /**
     * @param string $senderLastName
     */
    public function setSenderLastName($senderLastName) { $this->senderLastName = $senderLastName; }

    /**
     * @return int
     */
    public function getTtl() { return $this->ttl; }

    /**
     * @param int $ttl
     */
    public function setTtl($ttl) { $this->ttl = $ttl; }

    /**
     * @return boolean
     */
    public function getIsRead() { return $this->isRead; }

    /**
     * @param boolean $isRead
     */
    public function setIsRead($isRead) { $this->isRead = $isRead; }

    /**
     * @return string
     */
    public function getFrom() { return $this->from; }

    /**
     * @param string $from
     */
    public function setFrom($from) { $this->from = $from; }

    /**
     * @return int
     */
    public function getOriginalMsgId() { return $this->originalMsgId; }

    /**
     * @param int $originalMsgId
     */
    public function setOriginalMsgId($originalMsgId) { $this->originalMsgId = $originalMsgId; }

    /**
     * @return boolean
     */
    public function getHadSMSFallback() { return $this->hadSMSFallback; }

    /**
     * @param boolean $hadSMSFallback
     */
    public function setHadSMSFallback($hadSMSFallback) { $this->hadSMSFallback = $hadSMSFallback; }
    
    
}