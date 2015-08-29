<?php
namespace telemessage\web\services;

/**
 * @author Grinfeld Mikhail
 * @since 8/21/2015.
 */
class ListResponse extends Response {
    protected $list = array();

    /**
     * @return array of mixed
     */
    public function getList() { return $this->list; }

    /**
     * @param array $list - array of mixed
     */
    public function setList(array $list) { $this->list = $list; }

}