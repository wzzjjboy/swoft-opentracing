<?php


namespace swoft\opentracing\Aspect\Redis;

use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\PointBean;
use Swoft\Aop\Annotation\Mapping\PointExecution;
use Swoft\Aop\Point\ProceedingJoinPoint;
use swoft\opentracing\SpanStarter;
use Swoft\Redis\Connection\PhpRedisClusterConnection;
use Swoft\Aop\Annotation\Mapping\Around;
use Swoft\Log\Helper\CLog;
use Swoft\Redis\Connection\Connection;
use Swoft\Aop\Annotation\Mapping\Before;
use swoft\opentracing\Redis\PhpRedisConnection;

/**
 * @Aspect(order=1)
 *
 * @PointBean (include={PhpRedisConnection::class})
 *
 * @PointExecution(include={},exclude={"PhpRedisConnection::getRedisDb"})
 *
 */
class RedisAspect
{
    use SpanStarter;

    /**
     * 环绕通知
     *
     * @Around()
     *
     * @param ProceedingJoinPoint $proceedingJoinPoint
     *
     * @return mixed
     * @throws \Throwable
     */
    public function aroundAdvice(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $arguments = [
            'name' => strtolower($proceedingJoinPoint->getMethod()),
            'arguments' => $proceedingJoinPoint->getArgs()
        ];
        /** @var PhpRedisConnection $target */
        $target = $proceedingJoinPoint->getTarget();
        $span = $this->startSpan('redis' . '::' . $arguments['name']);
        $span->setTag('component', env('JAEGER_SERVICE_NAME'));
        $span->setTag('redis.host', $target->getRedisDb()->getHost());
        $span->setTag('redis.db', $target->getRedisDb()->getDatabase());
        $span->setTag('redis.command', $arguments['name']);
        $span->setTag('redis.arguments', json_encode($arguments['arguments']));
        $rsp = $proceedingJoinPoint->proceed();
//        $span->log(['resp' => $rsp]);
        $span->finish();
        // 后置通知
        return $rsp;
    }
}
