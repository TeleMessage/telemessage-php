<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 8/21/2015.
 */
class UserField extends CoreClass {
    protected $name;
    protected $value;
    protected $date;
    protected $options = array();

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

    /**
     * @return int - timestamp value GMT
     */
    public function getDate() { return $this->date; }

    /**
     * @param int $date - timestamp value GMT
     */
    public function setDate($date) { $this->date = $date; }

    /**
     * @return array of Option
     */
    public function getOptions() { return $this->options; }

    /**
     * @param array $options - array of telemessage/web/service/Option
     */
    public function setOptions(array $options) { $this->options = $options; }
}