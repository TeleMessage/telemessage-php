<?php
namespace telemessage\web\services\dialoggroup\info\update;

use telemessage\web\services\dialoggroup\info\DialogGroupInfo;

/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
class CreateDialogGroupUpdateInfo extends GroupUpdateInfo {

    protected $fetchedDate;
    protected $groupInfo;

    /**
     * @return int timestamp number
     */
    public function getFetchedDate() { return $this->fetchedDate; }

    /**
     * @param int $fetchedDate timestamp number
     */
    public function setFetchedDate($fetchedDate) { $this->fetchedDate = $fetchedDate; }

    /**
     * @return DialogGroupInfo
     */
    public function getGroupinfo() { return $this->groupInfo; }

    /**
     * @param DialogGroupInfo $groupinfo
     */
    public function setGroupinfo(DialogGroupInfo $groupinfo) { $this->groupInfo = $groupinfo; }
}