<?php

require dirname(__DIR__). '/vendor/autoload.php';


$accessKey = "testAccessKey";
$secretKey = "testSecretKey";
$options = [
    'endpoint' => 'https://live-dev.edusoho.cn/', // 测试环境接口地址， 生产环境不需要传此参数
];

$roomId = 25549;

$sdk = new \ESLive\SDK\ESLiveApi($accessKey, $secretKey, $options);

try {
    $pushUrl = $sdk->createRtmpPushUrl($roomId, 3600*48); // 48小时

    echo "\n Push Server: {$pushUrl['server']}";
    echo "\n Push Key: {$pushUrl['key']}";

    echo "\n ===";

    $playUrl = $sdk->getRtmpPlayUrl($roomId, 3600*8); // 8小时

    echo "\n Play status: {$playUrl['status']}";
    echo "\n Play flv url: {$playUrl['flvUrl']}";
    echo "\n Play hls url: {$playUrl['hlsUrl']}";

} catch (\ESLive\SDK\SDKException $e) {
    echo "\nError Code: {$e->getErrorCode()}";
    echo "\nError Message: {$e->getMessage()}";
    echo "\nTrace Id: {$e->getTraceId()}";
}
