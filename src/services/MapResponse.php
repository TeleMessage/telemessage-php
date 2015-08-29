<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 8/21/2015.
 */
class MapResponse extends Response {
    protected $map = array();

    /**
     * @return array with assoc keys
     */
    public function getMap() { return $this->map; }

    /**
     * @param array $map
     */
    public function setMap(array $map) { $this->map = $map; }

}