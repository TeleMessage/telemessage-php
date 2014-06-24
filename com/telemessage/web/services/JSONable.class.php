<?php
/**
 * @author Grinfeld Mikhail
 * @since 6/20/2014.
 */

interface JSONable {
    function toJson();
    function fromJson($data);
}
?>