<?php
namespace telemessage\web\services\dialoggroup\response;

use telemessage\web\services\Response;

/**
 * @author Grinfeld Mikhail
 * @since 8/21/2015.
 */
class GetGroupOperationsResponse extends Response {
    protected $operationsInfos = array();
    protected $lastTimeStamp;
    protected $lastId;

    /**
     * @return array
     */
    public function getOperationsInfos() { return $this->operationsInfos; }

    /**
     * @param array $operationsInfos
     */
    public function setOperationsInfos(array $operationsInfos) { $this->operationsInfos = $operationsInfos; }

    /**
     * @return int
     */
    public function getLastTimeStamp() { return $this->lastTimeStamp; }

    /**
     * @param int $lastTimeStamp
     */
    public function setLastTimeStamp($lastTimeStamp) { $this->lastTimeStamp = $lastTimeStamp; }

    /**
     * @return int
     */
    public function getLastId() { return $this->lastId; }

    /**
     * @param int $lastId
     */
    public function setLastId($lastId) { $this->lastId = $lastId; }


}