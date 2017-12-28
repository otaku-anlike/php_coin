<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'third_party/php-binance-api.php';

class Binance extends CI_Controller {

  // private $api;

  // public function __construct()
  //   {
  //       parent::__construct();
  //       // Your own constructor code
  //       $api = new Binance\API("<api key>","<secret>");
  //   }
  

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

    public function kline() {
      $api = new Binance\API("<api key>","<secret>");
      $symbol = $_POST['symbol_id'];
      $period = $_POST['period'];
      $candlesticks = $api->candlesticks( $symbol, $period);
      $ticker = $api->prices();
        $this->json([
            'statusCode' => 200,
            'data' => [
                //'msg' => $ticker,
                'k_lines' => $candlesticks,
                'post' => $_POST,
                // 'get' => $_GET,
                // 'setver' => $_SERVER,
                // 'this' => $this,
                // 'k_lines' => $ticker['BNBBTC']
            ]
        ]);
    }
}