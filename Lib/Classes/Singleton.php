<?php
    namespace Lib\Classes;

    use \Lib\Abstraction as act;

    /**
     * class Singleton
     *
     * Return always the same instance of a class
     *
     * @package Lib\Classes
     * @author Wilwert Claude
     */
    class Singleton extends act\Singleton {
        /**
         * Block constructor
         *
         * @access private
         * @return null
         */
        private function __construct() {}

        /**
         * Generate a class instance
         *
         * @access public
         * @return null
         */
        public static function getInstance() {
            $class = get_called_class();

            if (!isset(self::$instances[$class])) {
                self::$instances[$class] = new $class();

                if (method_exists(self::$instances[$class], 'init')) {
                    self::$instances[$class]->init();
                }
            }

            return self::$instances[$class];
        }
    }
?>
