<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 6/22/2014.
 * Class RecipientStatus
 * Recipient status contains date of status, status description and recipient information
 */
class RecipientStatus extends CoreClass {
    protected $description;
    protected $recipient;
    protected $statusDate;
    protected $status;

    /**
     * @return string
     */
    public function getDescription() { return $this->description; }

    /**
     * @param string $description
     */
    public function setDescription($description) { $this->description = $description; }

    /**
     * @return Recipient
     */
    public function getRecipient() { return $this->recipient; }

    /**
     * @param Recipient $recipient
     */
    public function setRecipient(Recipient $recipient) { $this->recipient = $recipient; }

    /**
     * @return integer
     */
    public function getStatusDate() { return $this->statusDate; }

    /**
     * @return integer
     */
    public function getStatus() { return $this->status; }

    /**
     * @param integer $status
     */
    public function setStatus($status) { $this->status = $status; }

    /**
     * @param integer $statusDate numbering representation of timestamp
     */
    public function setStatusDate($statusDate) { $this->statusDate = $statusDate; }

}