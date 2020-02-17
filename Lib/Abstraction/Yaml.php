<?php
    namespace Lib\Abstraction;

    use \Lib\Interfaces as ifc;

    abstract class Yaml implements ifc\Yaml {
        abstract public static function decode(
            string $path
        );

        abstract public static function encode(
            string $path,
            array $data
        );

        abstract protected function generateYaml(
            array $data,
            string $spacer=''
        );
    }
?>
