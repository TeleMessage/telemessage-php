<?php
    $phar = new Phar('telemessage.phar', 0, 'telemessage.phar');
    $phar->buildFromDirectory(dirname(__FILE__) . '/');
    $phar->setStub($phar->createDefaultStub('src/TeleMessage.php'));
?>