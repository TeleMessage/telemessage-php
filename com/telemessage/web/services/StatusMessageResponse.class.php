<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/22/2014.
 */

/**
 * Class StatusMessageResponse
 * Message status with list of recipients and its specific status
 */
class StatusMessageResponse extends MessageResponse {
    protected $recipientStatus = array();

    function __construct(){
        parent::__construct("StatusMessageResponse");
    }

    /**
     * @return array of RecipientStatus
     */
    public function getRecipientStatus() { return $this->recipientStatus; }

    /**
     * @param array $recipientStatus array of RecipientStatus
     */
    public function setRecipientStatus($recipientStatus) { $this->recipientStatus = $recipientStatus; }

    function toJson() {
        $str = "{\"class\" : \"" . $this->class . "\", ";
        $str .= "\"messageID\": " . $this->messageID . ", \"resultCode\": " . $this->resultCode . ", \"resultDescription\" : \"" . addcslashes($this->resultDescription, TeleMessage::ESCAPE_JSON) . "\"" . ", \"messageKey\" : \"" . addcslashes($this->messageKey, TeleMessage::ESCAPE_JSON) . "\",";
        $len = $this->recipientStatus ? count($this->recipientStatus) : 0;
        for ($i=0; $i < $len && $len > 0; $i++) {
            if ($i==0) {
                $str .= ",";
            }
            $str .= $this->recipientStatus[$i]->toJson();
        }
        $str .= "}";

        return $str;
    }

    function fromJson($data) {
        parent::fromJson($data);
        $this->recipientStatus = array();
        if (isset($data["recipients"]) && is_array($data["recipients"])) {
            while(list($key, $rst) = each($data["recipients"])) {
                $status = new RecipientStatus();
                $status->fromJson($rst);
                array_push($this->recipientStatus, $status);
            }
        }
    }
}
?>