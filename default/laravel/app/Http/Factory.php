<?php

namespace App\Http;

class Factory {

    static public function __callStatic($class, $param) {
        $type = self::getLastWord($class);
        $namespace = '';
        switch ($type) {
            case 'Model':
                $namespace = "\\App\\Http\\Model\\$class";
                break;
            case 'Service':
                $namespace = "\\App\\Http\\Service\\$class";
                break;
            default:
                throw new \Exception('错误');
        }
        return new $namespace();
    }

    static private function getLastWord($str) {
        $i = strlen($str) - 1;
        while ($i >= 0 and ( $str[$i] < 'A' or $str[$i] > 'Z')) {
            $i--;
        }

        return mb_substr($str, $i);
    }

}
