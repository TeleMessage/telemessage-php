<?php
namespace telemessage\web\services\dialoggroup\info\result;

use telemessage\web\services\CoreClass;

/**
 * @author Grinfeld Mikhail
 * @since 8/22/2015.
 */
abstract class GroupOperationResultInfo extends CoreClass {

    const SUCCESS = "SUCCESS";
    const FAIL = "FAIL";

    private static $results_list = array(self::SUCCESS => true, self::FAIL => true);

    protected $resDesc;
    protected $executionDate;

    /**
     * @return string
     */
    public function getResDesc() { return $this->resDesc; }

    /**
     * @param string $resDesc
     */
    public function setResDesc($resDesc) { if (isset(self::$results_list[$resDesc])) $this->resDesc = $resDesc; }

    /**
     * @return int
     */
    public function getExecutionDate() { return $this->executionDate; }

    /**
     * @param int $executionDate
     */
    public function setExecutionDate($executionDate) { $this->executionDate = $executionDate; }


}