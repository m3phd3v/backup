<?php
    namespace Lib\Interfaces;

    interface Config {
        public static function getConfig();

        public static function getDestination();
        
        public static function setConfig(
            array $config
        );
    }
?>
