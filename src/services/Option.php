<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 8/21/2015.
 */
class Option extends CoreClass {

    protected $name;
    protected $value;

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


}