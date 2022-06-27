# EasySql
 
### 1) Installition
```$ composer require kayega/easiersql:dev-main```
#### then use the below code in your php file
```php
use KAYEGA\EasySql;

require __DIR__ . "/vendor/kayega/easiersql/src/EasySql.php";
require __DIR__ . "/vendor/autoload.php";

$sql = new EasySql("localhost", "root", "", "test");
if ($sql) {
    echo "Connection successfully!";
}
```
