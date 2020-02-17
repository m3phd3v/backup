<?php
    namespace Lib\Abstraction;

    use \Lib\Interfaces as ifc;
    use \Lib\Classes as cls;

    abstract class Check extends cls\Singleton implements ifc\Check {
        abstract public static function fileExists(
            string $path
        );

        abstract public static function sourceExists(
            string $path
        );

        abstract public static function dirExists(
            string $path
        );

        abstract protected function error(
            string $type,
            string $content
        );
    }
?>
