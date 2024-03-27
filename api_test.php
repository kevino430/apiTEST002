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
  // CURLOPT_POSTFIELDS 應該在 POST 請求中使用，在 GET 請求中這行是不必要的。
  // CURLOPT_POSTFIELDS =>'{}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: text/plain'
  ),
));

$response = curl_exec($curl);
$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE); // 獲取 HTTP 狀態碼

curl_close($curl);

echo "<pre>";
echo "HTTP Status Code: " . $status_code . "\n"; // 輸出 HTTP 狀態碼
echo "</pre>";

echo "<pre>";
echo "Response: \n";
echo htmlspecialchars($response); // 確保 HTML 格式的回應被適當顯示
echo "</pre>";

echo "<pre>";
print_r("this is api_test.php end\n");
echo "</pre>";
