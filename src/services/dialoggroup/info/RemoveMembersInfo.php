<?php
namespace telemessage\web\services\dialoggroup\info;

/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
class RemoveMembersInfo extends GroupOperationInfo {
    protected $memberMobileNumbers = array();

    /**
     * @return array
     */
    public function getMemberMobileNumbers() { return $this->memberMobileNumbers; }

    /**
     * @param array $memberMobileNumbers
     */
    public function setMemberMobileNumbers($memberMobileNumbers) { $this->memberMobileNumbers = $memberMobileNumbers; }


}