<?php
namespace telemessage\web\services\dialoggroup\info\result;

/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
class AddMembersResultInfo extends GroupOperationResultInfo {

    protected $results  = array();

    /**
     * @return array
     */
    public function getResults() { return $this->results; }

    /**
     * @param array $results
     */
    public function setResults($results) { $this->results = $results; }


}