<?php
    $phar = new Phar('telemessage.phar', 0, 'telemessage.phar');
    $phar->buildFromDirectory(dirname(__FILE__) . '/com');
    $phar->setStub($phar->createDefaultStub('TeleMessage.class.php'));
?>