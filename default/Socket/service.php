<?php

use Workerman\Worker;

require_once __DIR__ . '/Workerman/Autoloader.php';
header('content-type: text/html; charset=utf-8');

class WebIM {

    static $clients = [];
    
    public function __construct() {
        // 注意：这里与上个例子不同，使用的是websocket协议
        $ws_worker = new Worker("websocket://0.0.0.0:2000");

        // 启动4个进程对外提供服务
        $ws_worker->count = 4;
        // 当收到客户端发来的数据后返回hello $data给客户端
        $ws_worker->onMessage = function($connection, $data) {
            $actionData = json_decode($data, true);
            /*
             * $actionData[
             *  'action' => 'online|message|outline',
             *  'message' => '消息内容'
             * ]
             */
            switch ($actionData['action']) {
                case 'online'://新用户上线
                    $this->online($connection, $actionData);
                    break;
                case 'message'://用户消息
                    $this->message($connection, $actionData);
                    break;
                default:
                    break;
            }
        };

        $ws_worker->onConnect = function($connection) {
            $this->connect($connection);
        };
        
        $ws_worker->onClose = function($connection) {
            $this->outline($connection);
        };
        // 运行worker
        Worker::runAll();
    }
    
    private function connect($client){
        self::$clients[$client->id]['client'] = $client;
    }

    /*
     * 上线
     * $actionData[
     *  'action' => 'online',
     *  'nickname' => '张三'
     * ]
     */
    private function online($connection, $actionData){
        self::$clients[$connection->id]['nickname'] = $actionData['nickname'];
        $sendData = [
            'action' => 'online',
            'nickname' => $actionData['nickname'],
            'uid' => $connection->id,
            'userlist' => array_column(self::$clients, 'nickname')
        ];
        foreach(self::$clients as $client){
            $this->sendMsg($client['client'], $sendData);
        }
    }
    
    /*
     * 发送消息
     */
    private function message($connection, $actionData){
        $sendData = [
            'action' => 'message',
            'from' => $connection->id,
            'nickname' => self::$clients[$connection->id]['nickname'],
            'message' => $actionData['message'],
            'time' => date('Y-m-d H:i:s')
        ];
        foreach(self::$clients as $client){
            $this->sendMsg($client['client'], $sendData);
        }
    }


    private function sendMsg($client, $data){
        $client->send(json_encode($data));
    }
    
    private function outline($client){
        unset(self::$clients[$client->id]);
    }
}

new WebIM();
