<?php
echo "<pre>";
print_r("this is api_test.php start\n");
echo "</pre>";

$curl = curl_init();

// 设置 User-Agent 20240328 移除設置
// $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3';
// curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);

// CURLOPT_URL => 'https://tosakalinky.elidot-cloud.com/jsonapi/get_time',
// CURLOPT_URL => 'https://ezweb360.xyz',
// 确保启用了 HEADER_OUT 选项
curl_setopt($curl, CURLINFO_HEADER_OUT, true);

curl_setopt_array($curl, array(
  
  CURLOPT_URL => 'https://tosakalinky.elidot-cloud.com/jsonapi/get_time',
  
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: text/plain'
  ),
));

$response = curl_exec($curl);
$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE); // 获取 HTTP 状态码

// 获取请求头部
$requestHeaders = curl_getinfo($curl, CURLINFO_HEADER_OUT);
echo "<pre>Request Headers: \n";
echo print_r($requestHeaders);
echo "</pre>";


if (curl_errno($curl)) {
    // 如果请求出错，显示错误信息
    print_r("cURL Error: " . htmlspecialchars(curl_error($curl)));
} else {
    // 显示响应状态码
    echo "HTTP Status Code: " . $status_code . "\n";
    if ($status_code == 403) {
        print_r("就是403 啥都沒回..... 這是我自記寫的 是因為 curl_errno 沒東西才寫。 (無法訪問 API。這可能是由於缺少或無效的憑證、IP地址被封鎖、伺服器配置錯誤，或觸發了安全規則。)\n");
    }
}

curl_close($curl);

echo "<pre>";
echo "Response: \n";
echo htmlspecialchars($response); // 使用 htmlspecialchars 来避免 HTML 被渲染
echo "</pre>";

echo "<pre>";
print_r("this is api_test.php end\n");
echo "</pre>";

echo "Hello World";
