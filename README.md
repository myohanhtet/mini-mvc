
# Mini mvc
**Mini mvc**.
## Requirements
- MySQL 8.0+
- PHP 8.1+
- Composer 2+
## Packages
- [Monolog](https://github.com/Seldaek/monolog)
- [Respect\Validation](https://github.com/Respect/Validation)
## Installations
```shell
composer install
```
import sql `src\demon.sql`

web root `src\publish`

edit config file `src\Config\config.php`
```php  
'timezone' => "Asia/Yangon",
'session' => 36000, //second
'db' => [
    'host' => 'localhost',
    'dbname' => 'mini',
    'username' => 'root',
    'password' => ''
],
'encryption' => [
    'key' => 'your-key',
    'cipher' => 'AES-256-CBC',
    'iv' => 'abc123'
], 
```  
## Demo user
User Code: ```DEMO001```

Password: ```Admin@123```
## Todo
- [x] encrypt get request Id
- [ ] document upload/download
- [ ] billing
- [ ] Landing Page
- [ ] role/permission
## Credits
- [Vali Admin Bootstrap Theme](https://github.com/pratikborsadiya/vali-admin)