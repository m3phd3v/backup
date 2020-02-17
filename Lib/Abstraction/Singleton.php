<?php
    namespace Lib\Abstraction;

    use \Lib\Interfaces as ifc;

    abstract class Singleton implements ifc\Singleton {
        protected static $instances;

        abstract public static function getInstance();
    }
?>
