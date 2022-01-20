# swoft2.0框架接入opentracing

------

接入步骤：

1. 引入composer包 composer require alan/swoft-opentracing:^2.0.0 请注意区分swoft的版本

2. 在env文件配置Jaeger

```ini
#application name
JAEGER_SERVICE_NAME=swoft_tds
#jaeger agent host
JAEGER_REPORTING_HOST=jaeger-agent-host
#jaeger agent port
JAEGER_REPORTING_PORT=16832
```

3. 配置mysql
```php
'db'                => [
  'class'    => Database::class,
  'dsn'      => env("MYSQL_PROVIDERS_DSN"),
  'username' => env("MYSQL_PROVIDERS_USERNAME"),
  'password' => env("MYSQL_PROVIDERS_PASSWORD"),
  'charset'  => 'utf8',
  'prefix'   => 'gpi_',
  'connections' => [
    'mysql' => \bean(swoft\opentracing\Mysql\MySqlConnection::class),
  ]
],
```
4. 配置redis
```php
'redis'               => [
  'class'         => \Swoft\Redis\RedisDb::class,
  'host'          => env("TICKET_REDIS_HOST"),
  'port'          => env("TICKET_REDIS_PORT"),
  'database'      => env("TICKET_REDIS_DATABASE"),
  'retryInterval' => 10,
  'readTimeout'   => 0,
  'timeout'       => 2,
  'password'      => env("TICKET_REDIS_PASSWORD"),
  'connections'   => [
    'phpredis' => \bean(swoft\opentracing\Redis\PhpRedisConnection::class)
  ],
  'driver'        => 'phpredis'
],
```
5. 编写中间件

```php
<?php
  
namespace App\Http\Middleware;

use Psr\Http\Server\MiddlewareInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use swoft\opentracing\Middleware\TracingMiddlewareTrait;


/**
 * Class TracingMiddleware
 * @package App\Http\Middleware
 *
 * @Bean()
 */
class TracingMiddleware implements MiddlewareInterface
{
    use TracingMiddlewareTrait;
}
```

   

5. 配置中间件

```php
'httpDispatcher'    => [
  'middlewares'      => [
    \App\Http\Middleware\TracingMiddleware::class,
  ],
```

6.尽情使用。。。