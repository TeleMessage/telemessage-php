<?php
namespace telemessage\web\services\dialoggroup\info\update;

use telemessage\web\services\CoreClass;
use telemessage\web\services\dialoggroup\info\MemberInfo;


/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
abstract class GroupUpdateInfo extends CoreClass {

    protected $id;
    protected $initiator;
    protected $initiatorIdentifier;
    protected $explicitMobileNumber;
    protected $executionDate;
    protected $updateAddedDate;
    protected $imageId;

    /**
     * @return int
     */
    public function getId() { return $this->id; }

    /**
     * @param int $id
     */
    public function setId($id) { $this->id = $id; }

    /**
     * @return MemberInfo
     */
    public function getInitiator() { return $this->initiator; }

    /**
     * @param MemberInfo $initiator
     */
    public function setInitiator(MemberInfo $initiator) { $this->initiator = $initiator; }

    /**
     * @return int
     */
    public function getInitiatorIdentifier() { return $this->initiatorIdentifier; }

    /**
     * @param int $initiatorIdentifier
     */
    public function setInitiatorIdentifier($initiatorIdentifier) { $this->initiatorIdentifier = $initiatorIdentifier; }

    /**
     * @return string
     */
    public function getExplicitMobileNumber() { return $this->explicitMobileNumber; }

    /**
     * @param string $explicitMobileNumber
     */
    public function setExplicitMobileNumber($explicitMobileNumber) { $this->explicitMobileNumber = $explicitMobileNumber; }

    /**
     * @return mixed
     */
    public function getExecutionDate() { return $this->executionDate; }

    /**
     * @param mixed $executionDate
     */
    public function setExecutionDate($executionDate) { $this->executionDate = $executionDate; }

    /**
     * @return mixed
     */
    public function getUpdateAddedDate() { return $this->updateAddedDate; }

    /**
     * @param mixed $updateAddedDate
     */
    public function setUpdateAddedDate($updateAddedDate) { $this->updateAddedDate = $updateAddedDate; }

    /**
     * @return mixed
     */
    public function getImageId() { return $this->imageId; }

    /**
     * @param mixed $imageId
     */
    public function setImageId($imageId) { $this->imageId = $imageId; }


}