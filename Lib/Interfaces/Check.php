<?php
    namespace Lib\Interfaces;

    interface Check {
        public static function fileExists(
            string $path        
        );

        public static function dirExists(
            string $path
        );

        public static function sourceExists(
            string $path
        );
    }
?>
