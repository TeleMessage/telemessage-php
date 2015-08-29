<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 8/21/2015.
 */
class UserResponse extends Response {
    protected $userFields = array();

    /**
     * @return array of UserField
     */
    public function getUserFields() { return $this->userFields; }

    /**
     * @param array $userFields
     */
    public function setUserFields(array $userFields) { $this->userFields = $userFields; }



}