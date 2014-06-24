<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/22/2014.
 */

/**
 * Class RecipientStatus
 * Recipient status contains date of status, status description and recipient information
 */
class RecipientStatus extends CoreClass {
    protected $description;
    protected $recipient;
    protected $statusDate;
    protected $status;

    function __construct(){
        parent::__construct("RecipientStatus");
    }

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

    function toJson() {
        $str = "{\"class\" : \"" . $this->class . "\" ,";
        if ($this->recipient) {
            $str .= $this->recipient->toJson() . ",";
        }
        $str .= "\"description\" : \"" . $this->description . "\",";
        $str .= "\"description\" : \"" . $this->description . "\",";
        $str .= "\"status\" : " . $this->status . "";

        $str .= "{";

        return $str;
    }

    function fromJson($data) {
        $this->description = $data["description"];
        $this->statusDate = $data["statusDate"];
        $this->status = $data["status"];
        if (isset($data["recipient"])) {
            $recp = new Recipient();
            $recp->fromJson($data["recipient"]);
            $this->recipient = $recp;
        }
    }
}
?>