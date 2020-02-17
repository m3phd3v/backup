<?php
    namespace Lib\Interfaces;

    interface Data {
        public static function persist(
            string $id,
            string $path
        );

        public static function remove(
            string $id
        );

        public static function check(
            string $id,
            string $path
        );
    }
?>
