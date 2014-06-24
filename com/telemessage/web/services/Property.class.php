<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */

class Property extends CoreClass {
    protected $name;
    protected $value;

    function __construct() {
        parent::__construct("Property");
    }

    /**
     * @return string
     */
    public function getName() { return $this->name; }

    /**
     * @param string $name
     */
    public function setName($name) { $this->name = $name; }

    /**
     * @return string
     */
    public function getValue() { return $this->value; }

    /**
     * @param string $value
     */
    public function setValue($value) { $this->value = $value; }


    function toJson() {
        return "{\"class\" : \"" . $this->class . "\", \"name\" : \"" . addcslashes($this->name, TeleMessage::ESCAPE_JSON) . "\"" . ", \"value\" : \"" . addcslashes($this->value, TeleMessage::ESCAPE_JSON) . "\"}";
    }

    function fromJson($data) {
        $this->name = $data["name"];
        $this->value = $data["value"];
    }
}
?>