<?php
namespace telemessage\web\services\dialoggroup\info\result;

/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
class CreateDialogGroupResultInfo extends GroupOperationResultInfo {
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