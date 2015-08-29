<?php
namespace telemessage\web\services\dialoggroup\response;
use telemessage\web\services\Response;
use telemessage\web\services\dialoggroup\info\DialogGroupInfo;

/**
 * @author Grinfeld Mikhail
 * @since 8/21/2015.
 */
class GetGroupsResponse extends Response {

    protected $groups = array();
    protected $fetchedDate;

    /**
     * @return array of DialogGroupInfo
     */
    public function getGroups() { return $this->groups; }

    /**
     * @param array $groups of DialogGroupInfo
     */
    public function setGroups(array $groups) { $this->groups = $groups; }

    /**
     * @return int - timestamp as number
     */
    public function getFetchedDate() { return $this->fetchedDate; }

    /**
     * @param mixed $fetchedDate - timestamp as number
     */
    public function setFetchedDate($fetchedDate) { $this->fetchedDate = $fetchedDate; }

}