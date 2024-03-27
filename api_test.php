<?php
echo "<pre>";
print_r("this is api_test.php start\n");
echo "</pre>";

$curl = curl_init();
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

if (curl_errno($curl)) {
    // 如果请求出错，显示错误信息
    print_r("cURL Error: " . htmlspecialchars(curl_error($curl)));
} else {
    // 显示响应状态码
    echo "HTTP Status Code: " . $status_code . "\n";
    if ($status_code == 403) {
        print_r("Access to the API is forbidden. This could be due to missing/invalid credentials, IP blocking, server configuration, or triggered security rules.\n");
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
