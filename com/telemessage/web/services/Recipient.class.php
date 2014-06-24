<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */

class Recipient extends CoreClass {

    CONST MOBILE = "MOBILE";
    CONST BUSINESS_PHONE = "BUSINESS_PHONE";
    CONST HOME_PHONE = "HOME_PHONE";
    CONST EMAIL = "EMAIL";
    CONST SMS = "SMS";
    CONST FAX = "FAX";
    CONST MMS = "MMS";

    protected $type;
    protected $addresType = 0;
    protected $value;
    protected $description;


    function __construct() {
        parent::__construct("Recipient");
    }

    /**
     * @return mixed
     */
    public function getDescription() { return $this->description; }

    /**
     * @param mixed $description
     */
    public function setDescription($description) { $this->description = $description; }

    /**
     * @return mixed
     */
    public function getType() { return $this->type; }

    /**
     * @param mixed $type
     */
    public function setType($type) { $this->type = $type; }

    /**
     * @return mixed
     */
    public function getValue() { return $this->value; }

    /**
     * @param mixed $value
     */
    public function setValue($value) { $this->value = $value; }


    function toJson() {
        return "{\"class\" : \"" . $this->class . "\", \"addresType\": " . $this->addresType . ", \"type\" : \"" . $this->type . "\"" . ", \"value\" : \"" . addcslashes($this->value, TeleMessage::ESCAPE_JSON) . "\"" . ", \"description\" : \"" . addcslashes($this->description, TeleMessage::ESCAPE_JSON) . "\"}";
    }

    function fromJson($data) {
        $this->type = $data["type"];
        $this->addresType = $data["addresType"];
        $this->value = $data["value"];
        $this->description = $data["description"];
    }
}