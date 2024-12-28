
---

### فایل `src/api_connector.php`
```php
<?php

// Set your API details here
define('API_URL', 'https://api.example.com/v1/resource');
define('API_KEY', 'your_api_key');

/**
 * Send a GET request to the API.
 */
function getData() {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => API_URL,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . API_KEY
        ]
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    if ($error) {
        echo "Error during GET request: $error\n";
    } else {
        echo "GET Response:\n$response\n";
    }
}

/**
 * Send a POST request to the API.
 *
 * @param array $data The data to send in the POST request.
 */
function postData(array $data) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => API_URL,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . API_KEY,
            'Content-Type: application/json'
        ]
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    if ($error) {
        echo "Error during POST request: $error\n";
    } else {
        echo "POST Response:\n$response\n";
    }
}

// Example usage
echo "Performing GET request...\n";
getData();

echo "\nPerforming POST request...\n";
$data = ['key' => 'value']; // Replace with your data
postData($data);

?>
