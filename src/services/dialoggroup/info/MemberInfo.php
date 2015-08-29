<?php
namespace telemessage\web\services\dialoggroup\info;

use telemessage\web\services\CoreClass;

/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
class MemberInfo extends CoreClass {

    const SYSTEM = "SYSTEM";
    const NORMAL = "NORMAL";
    const OWNER = "OWNER";

    private static $roles = array(self::SYSTEM => true, self::NORMAL => true, self::OWNER => true);

    protected $firstName;
    protected $lastName;
    protected $role;
    protected $dateAdded;
    protected $memberMobileNumber;

    /**
     * @return string
     */
    public function getFirstName() { return $this->firstName; }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName) { $this->firstName = $firstName; }

    /**
     * @return string
     */
    public function getLastName() { return $this->lastName; }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName) { $this->lastName = $lastName; }

    /**
     * @return string
     */
    public function getRole() { return $this->role; }

    /**
     * @param string $role. Allowed options are: SYSTEM,NORMAL,OWNER
     */
    public function setRole($role) { if (isset(self::$roles[$role])) $this->role = $role; }

    /**
     * @return int - timestamp as number
     */
    public function getDateAdded() { return $this->dateAdded; }

    /**
     * @param int $dateAdded - timestamp as number
     */
    public function setDateAdded($dateAdded) { $this->dateAdded = $dateAdded; }

    /**
     * @return string
     */
    public function getMemberMobileNumber() { return $this->memberMobileNumber; }

    /**
     * @param string $memberMobileNumber
     */
    public function setMemberMobileNumber($memberMobileNumber) { $this->memberMobileNumber = $memberMobileNumber; }
}