<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */

abstract class CoreClass implements JSONable {

    protected $class;

    function __construct($className) {
        $this->setClassName($className);
    }

    protected function setClassName($className) {
        $this->class = TeleMessage::TM_NAMESPACE . $className;
    }


}
?>