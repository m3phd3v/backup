<?php
    namespace Lib\Abstraction;

    use \Lib\Classes as cls;
    use \Lib\Interfaces as ifc;

    abstract class Folder extends cls\Singleton implements ifc\Folder {
        abstract public static function scan(
            string $path
        );
    }
?>
