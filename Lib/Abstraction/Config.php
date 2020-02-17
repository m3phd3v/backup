<?php
    namespace Lib\Abstraction;

    use \Lib\Classes as cls;
    use \Lib\Interfaces as ifc;

    abstract class Config extends cls\Singleton implements ifc\Config {
        protected static $config = array();
        protected static $destination;

        abstract public static function getConfig();

        abstract public static function getDestination();

        abstract public static function setConfig(
            array $config
        );
    }
?>
