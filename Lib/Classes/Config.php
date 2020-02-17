<?php
    namespace Lib\Classes;

    use \Lib\Abstraction as act;

    /**
     * class Config
     *
     * Read configuration files
     *
     * @package Lib\Classes
     * @author Wilwert Claude
     */
    class Config extends act\Config {
        /**
         * Reads the configuration files and stores the
         * data into internal class variables defined in
         * abstraction class
         *
         * @access protected
         * @return null
         */
        protected static function init() {
            $path = Yaml::decode(ROOT . 'Config/path.yml');
            $source = Yaml::decode(ROOT . 'Config/source.yml');
            $ids = array();

            foreach($source as $dir => $cfg) {
                if (Check::sourceExists($dir)) {
                    if (isset($ids[$cfg['id']])) {
                        echo 'Fatal error: The id ', $cfg['id'], ' mustn\'t exist';
                        echo ' multiple times!', "\n";

                        exit;
                    } else {
                        $ids[$cfg['id']] = true;

                        self::$config[$cfg['id']] = array(
                            'id' => sha1($cfg['id']),
                            'path' => $dir,
                            'keep' => $cfg['keep'],
                            'int' => $cfg['interval'],
                            'need' => false,
                        );
                    }
                }
            }

            if (Check::dirExists($path['destination'])) {
                self::$destination = $path['destination'] . '/';
            }

            unset($ids);
        }

        /**
         * Return the sources configuration
         *
         * @access public
         * @return array
         */
        public static function getConfig() {
            return self::$config;
        }

        /**
         * Return the backup destination path
         *
         * @access public
         * @return array
         */
        public static function getDestination() {
            return self::$destination;
        }

        /**
         * Override runtime configuration
         *
         * @access public
         * @return null
         */
        public static function setConfig(array $config) {
            self::$config = $config;
        }
    }
?>
