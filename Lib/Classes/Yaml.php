<?php
    namespace Lib\Classes;

    use \Lib\Abstraction as act;

    /**
     * class Yaml
     *
     * Manage yaml files
     *
     * @package Lib\Classes
     * @author Wilwert Claude
     */
    final class Yaml extends act\Yaml {
        /**
         * Open a yaml file and convert data into array
         *
         * @access public
         * @param  string $path Path to yaml file
         * @return array
         */
        public static function decode(string $path) {
            $data = null;

            if (Check::fileExists($path)) {
                $data = \yaml_parse_file($path);
            }

            return $data;
        }

        /**
         * Generate a yaml file based on an array
         *
         * @access public
         * @param  string $path Output path
         * @param  array  $data Array to dump in yaml file
         * @return null
         */
        public static function encode(string $path, array $data) {
            $data = str_replace("\n\n", "\n", self::generateYaml($data));
            $path = pathinfo($path);

            if (Check::dirExists($path['dirname'])) {
                $data = trim($data);

                file_put_contents($path['dirname'] . '/' . $path['basename'], $data);
            }
        }

        /**
         * Encode array in yaml format
         *
         * @access protected
         * @param  array  $data   Data to encode
         * @param  string $spacer File indentation spacer
         * @return string
         */
        protected function generateYaml(array $data, string $spacer='') {
            $yaml = array();

            foreach($data as $key => $value) {
                if (is_array($value)) {
                    $yaml[] = $spacer . $key . ':';
                    $yaml[] = self::generateYaml($value, $spacer . '    ');
                } else {
                    $yaml[] = $spacer . (is_numeric($key) ? '- ' : $key . ': ') . $value;
                }
            }

            $yaml[] = '';

            return implode("\n", $yaml);
        }
    }
?>
