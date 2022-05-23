<?php

require dirname(__DIR__). '/vendor/autoload.php';


$accessKey = "flv_self_aliyun";
$secretKey = "testSecretKey4";
$options = [
    'endpoint' => 'https://live-dev.edusoho.cn/',
];

$roomId = 25549;

$sdk = new \ESLive\SDK\ESLiveSDK($accessKey, $secretKey, $options);

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
