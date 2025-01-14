```php
function processData(array $data): array {
  $processedData = [];
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      try {
        $processedData[$key] = processData($value); 
      } catch (Exception $e) {
        error_log("Error processing sub-array: " . $e->getMessage());
        //Handle the error appropriately e.g., skip the sub-array, use a default value etc.
        $processedData[$key] = null; // Or some default value
      }
    } else if (is_numeric($value) || is_string($value) ){
        $processedData[$key] = $value; //only process if numeric or string 
    } else {
      error_log('Invalid data type encountered: ' . gettype($value));
      // Handle the error; for example, skip the element
    }
  }
  return $processedData;
}

$myData = ['a' => 1, 'b' => [2, 3, ['c' => 4], 5, 'd'], 'e' => new stdClass()];

$processedData = processData($myData);
print_r($processedData); 
```