<?php

namespace App\Http;
use App\Http\Factory;

class IOC {
    static public $ioc = [];
    
    /*
     * set 将实例存入到容器中
     * @param string $key 实例在容器中的标识
     * @param object $object 实例本身
     */
    public function set($key, $object){
        self::$ioc[$key] = $object;
    }
     /*
     * get 获取实例
     * @param string $key 实例在容器中的标识
     * @return object
     */
    public function get($key){
        return self::$ioc[$key]();
    }
    /*
     * 销毁容器中的实例 释放空间
     * @param string $key 实例在容器中的标识
     */
    public function ioc_unset($key){
        unset(self::$ioc[$key]);
    }
    
    public function __call($key, $data){
        $this->initParam($data);
        list($action, $param) = $data;
        if(isset(self::$ioc[$key])){
            $this->get($key)->$action(...$param);
        }
        $this->set($key, function() use ($key){
            return Factory::$key();
        });
        return $this->get($key)->$action(...$param);
    }
    
    private function initParam(&$data){
        //判断左侧的表达式是否为真 ，如果为真 接着执行右边的表达式
        (count($data) == 1) && $data[] = [];
        //判断左侧表达式是否为真，如果为假，就会执行右边的表达式
        is_array($data[1]) || $data[1] = [$data[1]];
    }
}
