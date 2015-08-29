<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */
class Schedule extends CoreClass {

    protected $sendAt;
    protected $expiredAt;

    /**
     * @return int Timestamp value
     */
    public function getExpiredAt() { return $this->expiredAt; }

    /**
     * @param int $expiredat  Timestamp value
     */
    public function setExpiredAt($expiredat) { $this->expiredAt = $expiredat; }

    /**
     * @return int Timestamp value
     */
    public function getSendAt() { return $this->sendAt; }

    /**
     * @param int $sendat Timestamp value
     */
    public function setSendAt($sendat) { $this->sendAt = $sendat; }

}