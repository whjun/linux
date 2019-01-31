<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class BaseController extends Controller {

    protected $ioc;

    const CODE = [
        200 => 'SUCCESS',
        500 => 'ERROR',
    ];
    const SUCCESS_CODE = 200;
    const ERROR_CODE = 500;

    protected $returnData = [
        'code' => 200,
        'data' => [],
        'msg' => ''
    ];
    protected $is_ajax;

    public function __construct(\App\Http\IOC $ioc) {
        $this->ioc = $ioc;
        $this->is_ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHTTPREQUEST';
    }

    protected function returnData($code = null, $data = [], $msg = '') {
        is_null($code) && $this->returnData['code'] = self::SUCCESS_CODE;
        empty($msg) && $this->returnData['msg'] = self::CODE[$this->returnData['code']];
        $this->returnData['data'] = $data;
        return $this->returnData;
    }

    public function uploaded() {
        $file = $_FILES['file'];
        $ext = substr(strchr($file['name'], '.'), 1);
        $filename = date('YmdHis') . rand(1111, 999) . '.' . $ext;
        // Storage::put($filename, $contents, 'public/uploaded');
        Storage::disk('local')->put($filename, file_get_contents($_FILES['file']['tmp_name']));
        return $filename;
    }

}
