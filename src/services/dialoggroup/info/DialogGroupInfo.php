<?php
namespace telemessage\web\services\dialoggroup\info;
use telemessage\web\services\CoreClass;

/**
 * @author Grinfeld Mikhail
 * @since 8/21/2015.
 */
class DialogGroupInfo extends CoreClass {

    const PENDING = "PENDING";
    const ACTIVE = "ACTIVE";
    const DELETED = "DELETED";

    private static $members_list = array(self::PENDING => true, self::ACTIVE => true, self::DELETED => true);

    protected $name;
    protected $id;
    protected $members = array();
    protected $status;
    protected $creationDate;
    protected $fetchedDate;
    protected $imageId;


    /**
     * @return string
     */
    public function getName() { return $this->name; }

    /**
     * @param string $name
     */
    public function setName($name) { $this->name = $name; }

    /**
     * @return int
     */
    public function getId() { return $this->id; }

    /**
     * @param int $id
     */
    public function setId($id) { $this->id = $id; }

    /**
     * @return array of MemberRole
     */
    public function getMembers() { return $this->members; }

    /**
     * @param array $members of MemberRole
     */
    public function setMembers(array $members) { $this->members = $members; }

    /**
     * @return string
     */
    public function getStatus() { return $this->status; }

    /**
     * @param string $status
     */
    public function setStatus($status) { if (isset(self::$members_list[$status])) $this->status = $status; }

    /**
     * @return int - timestamp as number
     */
    public function getCreationDate() { return $this->creationDate; }

    /**
     * @param int $creationDate - timestamp as number
     */
    public function setCreationDate($creationDate) { $this->creationDate = $creationDate; }

    /**
     * @return int - timestamp as number
     */
    public function getFetchedDate() { return $this->fetchedDate; }

    /**
     * @param int $fetchedDate - timestamp as number
     */
    public function setFetchedDate($fetchedDate) { $this->fetchedDate = $fetchedDate; }

    /**
     * @return int
     */
    public function getImageId() { return $this->imageId; }

    /**
     * @param int $imageId
     */
    public function setImageId($imageId) { $this->imageId = $imageId; }

}