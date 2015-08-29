<?php
namespace telemessage\web\services\dialoggroup\info;

/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
class SetNameInfo extends GroupOperationInfo {
    protected $name;

    /**
     * @return string
     */
    public function getName() { return $this->name; }

    /**
     * @param string $name
     */
    public function setName($name) { $this->name = $name; }


}