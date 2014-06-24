<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */

class Schedule extends CoreClass {

    protected $sendAt;
    protected $expiredAt;

    function __construct() {
        parent::__construct("Schedule");
    }

    /**
     * @return integer Timestamp value
     */
    public function getExpiredAt() { return $this->expiredAt; }

    /**
     * @param integer $expiredat  Timestamp value
     */
    public function setExpiredAt($expiredat) { $this->expiredAt = $expiredat; }

    /**
     * @return integer Timestamp value
     */
    public function getSendAt() { return $this->sendAt; }

    /**
     * @param integer $sendat Timestamp value
     */
    public function setSendAt($sendat) { $this->sendAt = $sendat; }


    function toJson() {
        return "{\"class\" : \"" . $this->class . "\", \"sendAt\": " . $this->sendAt . ", \"expiredAt\" : " . $this->expiredAt . "}";
    }

    function fromJson($data) {
        $this->sendAt = $data["sendAt"];
        $this->expiredAt = $data["expiredAt"];
    }
}
?>