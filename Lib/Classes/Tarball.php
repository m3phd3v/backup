<?php
    namespace Lib\Classes;

    use \Lib\Abstraction as act;

    /**
     * class Tarball
     *
     * Compress and uncompress tarball files
     *
     * @package Lib\Classes
     * @author Wilwert Claude
     */
    class Tarball extends act\Tarball {
        /**
         * Compress data into a new tarball file
         *
         * @access public
         * @param  string $input  Files to compress
         * @param  string $output Tarball file path
         * @return null
         */
        public static function compress(
            string $input,
            string $output
        ) {
            $tgz = new \PharData($output);

            $tgz->buildFromDirectory($input);
            $tgz->compress(\Phar::GZ);

            unset($tgz);

            unlink($output);
        }
    }
?>
