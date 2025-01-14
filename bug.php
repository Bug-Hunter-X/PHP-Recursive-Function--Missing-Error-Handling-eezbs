```php
function processData(array $data): array {
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = processData($value); // Recursive call
    } else {
      // Process individual data points here.  If there's an error handling
      // expectation this would be where you do that.
    }
  }
  return $data;
}

$myData = ['a' => 1, 'b' => [2, 3, ['c' => 4]]];

$processedData = processData($myData);
print_r($processedData);
```