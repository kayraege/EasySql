# EasySql
 
## Installition
```php
use KAYEGA\EasySql;
require __DIR__."/vendor/kayega/easiersql/src/EasySql.php";

$sql = new EasySql("localhost", "root", "", "test");
if ($sql) {
    echo "Connection successfully!";
}
```
