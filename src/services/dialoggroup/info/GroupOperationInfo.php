<?php
namespace telemessage\web\services\dialoggroup\info;

use telemessage\web\services\CoreClass;

/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
class GroupOperationInfo extends CoreClass {
    protected $groupId;

    /**
     * @return int
     */
    public function getGroupId() { return $this->groupId; }

    /**
     * @param int $groupId
     */
    public function setGroupId($groupId) { $this->groupId = $groupId; }

}