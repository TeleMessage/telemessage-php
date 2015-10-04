<?php
require "vendor/autoload.php";

$composer = \grinfeld\phpjsonable\parsers\json\Json::decode(new \grinfeld\phpjsonable\utils\streams\StringInputStream(file_get_contents("composer.json")));
$name = preg_replace("/[\\/]/", "_", $composer["name"]);
$sources = array();
if (isset($composer["autoload"]) && isset($composer["autoload"]["psr-4"])) {
    $sources = $composer["autoload"]["psr-4"];
}
$pharName = $name . '.phar';
$phar = new Phar($pharName);
$dirName = dirname(__FILE__);
while(list($suffix, $src) = each($sources)) {
    $dir = $dirName . "\\" . $src;
    $rp = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($rp as $file) {
        if ($file->isFile() && $file->getFilename() != ".." && $file->getFilename() != ".") {
            $pathBefore = substr($file->getPath(), 0, strlen($dir));
            $pathAfter = substr($file->getPath(), strlen($dir) + 1);
            $pathTo = "\\" . $suffix . ($pathAfter !== false ? ($pathAfter . "\\") : "") . $file->getFilename();
            $phar->addFromString($pathTo, file_get_contents($file->getPath() . "/" . $file->getFilename()));
        }
    }
}

if (isset($composer["require"])) {
    while(list($library, $ver) = each($composer["require"])) {
        if (file_exists($dirName . "\\vendor\\" . $library)) {
            $dir = $dirName . "\\vendor\\" . $library . "\\src";
            $rp = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

            foreach ($rp as $file) {
                if ($file->isFile() && $file->getFilename() != ".." && $file->getFilename() != ".") {
                    $pathBefore = substr($file->getPath(), 0, strlen($dir));
                    $pathAfter = substr($file->getPath(), strlen($dir) + 1);
                    $pathTo = "\\" . $library . "\\" . ($pathAfter !== false ? ($pathAfter . "\\") : "") . $file->getFilename();
                    $phar->addFromString($pathTo, file_get_contents($file->getPath() . "/" . $file->getFilename()));
                }
            }
        }
    }
}

$stubSource = "<?php\r\n" .
    "class TMLoader {\r\n" .
    "    public static function get() {\r\n" .
    "        spl_autoload_register(function (\$class) {\r\n" .
    "            \$fileName = \"phar://$pharName/\" . \$class . \".php\";\r\n" .
    "            if (file_exists(\$fileName)) {\r\n" .
    "                include_once (\$fileName);\r\n" .
    "            }\r\n" .
    "        })\r\n;" .
    "    }\r\n" .
    "}";
$phar->addFromString("TMLoader.php", $stubSource);
$phar->setStub($phar->createDefaultStub('TMLoader.php'));
