# Yii2 VK market

## Description
This is a market server for [vk.com](https://vk.com) applications which processes [payment](https://vk.com/dev/payments) notifications.

## Configuration

### Basic configuration

#### Application credentials
Set application credentials in [`app\configurations\parameters\parameters.php`](https://github.com/Kolyunya/yii2-vk-market/blob/master/configurations/parameters/parameters.php).
~~~php
return [
    'application-id' => 42,
    'application-secret' => 'fourty-two',
];
~~~

#### Database connection
Configure database connection options in [`app\configurations\database\database.php`](https://github.com/Kolyunya/yii2-vk-market/blob/master/configurations/database/database.php).
~~~php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql: host=localhost; dbname=market;',
    'username' => 'username',
    'password' => 'password',
    'charset' => 'utf8',
];
~~~

#### Database schema
Above configuration is sufficient for the minimal working example if database schema corresponds the default models implementation. You can inspect default models for further information: [DatabaseClient](https://github.com/Kolyunya/yii2-vk-market/blob/master/models/client/DatabaseClient.php), [DatabaseOrder](https://github.com/Kolyunya/yii2-vk-market/blob/master/models/order/DatabaseOrder.php) and [DatabaseProduct](https://github.com/Kolyunya/yii2-vk-market/blob/master/models/product/DatabaseProduct.php).

### Extended configuration

#### Custom models and proxies
You are free to implement custom models and proxies for your application. Three models and three corresponding proxies are required for the application to work correctly. You must implement the following interfaces:
* Client [model](https://github.com/Kolyunya/yii2-vk-market/blob/master/models/client/ClientInterface.php) and [proxy](https://github.com/Kolyunya/yii2-vk-market/blob/master/proxies/client/ClientProxyInterface.php)
* Order [model](https://github.com/Kolyunya/yii2-vk-market/blob/master/models/order/OrderInterface.php) and [proxy](https://github.com/Kolyunya/yii2-vk-market/blob/master/proxies/order/OrderProxyInterface.php)
* Product [model](https://github.com/Kolyunya/yii2-vk-market/blob/master/models/product/ProductInterface.php) and [proxy](https://github.com/Kolyunya/yii2-vk-market/blob/master/proxies/product/ProductProxyInterface.php)

After implementing custom proxies you must specify them in corresponding configuration files:
* [`app\configurations\client\proxy.php`](https://github.com/Kolyunya/yii2-vk-market/blob/master/configurations/client/proxy.php)
* [`app\configurations\order\proxy.php`](https://github.com/Kolyunya/yii2-vk-market/blob/master/configurations/order/proxy.php)
* [`app\configurations\product\proxy.php`](https://github.com/Kolyunya/yii2-vk-market/blob/master/configurations/product/proxy.php)

#### Custom listeners
You can also implement your custom event listeners. They will allow you to perform arbitrary actions before and after client requests. Listeners must implement the following interfaces:
* [`app\listeners\order\OrderListenerInterface`](https://github.com/Kolyunya/yii2-vk-market/blob/master/listeners/order/OrderListenerInterface.php)
* [`app\listeners\produc\ProductListenerInterface`](https://github.com/Kolyunya/yii2-vk-market/blob/master/listeners/product/ProductListenerInterface.php)

After implementing custom listeners you must specify them in corresponding configuration files:
* [`app\configurations\order\listener.php`](https://github.com/Kolyunya/yii2-vk-market/blob/master/configurations/order/listener.php)
* [`app\configurations\product\listener.php`](https://github.com/Kolyunya/yii2-vk-market/blob/master/configurations/product/listener.php)
