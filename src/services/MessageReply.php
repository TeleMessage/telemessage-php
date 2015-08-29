<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
class MessageReply extends Message {
    protected $originalMessageId;

    /**
     * @return int
     */
    public function getOriginalMessageId() { return $this->originalMessageId; }

    /**
     * @param int $originalMessageId
     */
    public function setOriginalMessageId($originalMessageId) { $this->originalMessageId = $originalMessageId; }


}