<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'third_party/php-binance-api.php';

class Demo extends CI_Controller {

    public function index() {
      $api = new Binance\API("<api key>","<secret>");
      $candlesticks = $api->candlesticks("BNBBTC", "5m");
      $ticker = $api->prices();
        $this->json([
            'statusCode' => 200,
            'data' => [
                //'msg' => $ticker,
                'k_lines' => $candlesticks
                // 'post' => $_POST,
                // 'get' => $_GET,
                // 'setver' => $_SERVER,
                // 'this' => $this,
                // 'k_lines' => $ticker['BNBBTC']
            ]
        ]);
    }
}