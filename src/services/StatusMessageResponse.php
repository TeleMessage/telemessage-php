<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 6/22/2014.
 * Class StatusMessageResponse
 * Message status with list of recipients and its specific status
 */
class StatusMessageResponse extends MessageResponse {
    protected $recipients = array();

    /**
     * @return array of RecipientStatus
     */
    public function getRecipientStatus() { return $this->recipients; }

    /**
     * @param array $recipientStatus array of RecipientStatus
     */
    public function setRecipientStatus(array $recipientStatus) { $this->recipients = $recipientStatus; }

}