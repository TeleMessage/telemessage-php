<?php
namespace telemessage\web\services\dialoggroup\info;

use telemessage\web\services\FileMessage;

/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
class CreateGroupInfo extends GroupOperationInfo {
    protected $name = "";
    protected $file;
    protected $memberMobileNumbers = array();

    /**
     * @return string
     */
    public function getName() { return $this->name; }

    /**
     * @param string $name
     */
    public function setName($name) { $this->name = $name; }

    /**
     * @return FileMessage
     */
    public function getFile() { return $this->file; }

    /**
     * @param FileMessage $file
     */
    public function setFile(FileMessage $file) { $this->file = $file; }

    /**
     * @return array
     */
    public function getMemberMobileNumbers() { return $this->memberMobileNumbers; }

    /**
     * @param array $memberMobileNumbers
     */
    public function setMemberMobileNumbers(array $memberMobileNumbers) { $this->memberMobileNumbers = $memberMobileNumbers; }


}