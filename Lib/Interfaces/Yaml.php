<?php
    namespace Lib\Interfaces;

    interface Yaml {
        public static function decode(
            string $path
        );

        public static function encode(
            string $path,
            array $data
        );
    }
?>
