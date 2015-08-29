<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 8/21/2015.
 */
class ValidationMode extends CoreClass {

    protected $activeAppIsMandatory = false;

    /**
     * @return boolean
     */
    public function getActiveAppIsMandatory() { return $this->activeAppIsMandatory; }

    /**
     * @param boolean $activeAppIsMandatory
     */
    public function setActiveAppIsMandatory($activeAppIsMandatory) { $this->activeAppIsMandatory = $activeAppIsMandatory; }


}