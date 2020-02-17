<?php
    namespace Lib\Abstraction;

    use \Lib\Classes as cls;
    use \Lib\Interfaces as ifc;

    abstract class Data extends cls\Singleton implements ifc\Data {
        abstract public static function persist(
            string $id,
            string $path
        );

        abstract public static function remove(
            string $id
        );

        abstract public static function check(
            string $id,
            string $path
        );
    }
?>
