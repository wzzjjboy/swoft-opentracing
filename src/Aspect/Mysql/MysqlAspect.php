<?php


namespace swoft\opentracing\Aspect\Mysql;

use OpenTracing\Span;
use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\PointBean;
use Swoft\Aop\Annotation\Mapping\PointExecution;
use Swoft\Aop\Point\ProceedingJoinPoint;
use Swoft\Db\Connection\Connection;
use Swoft\Aop\Annotation\Mapping\Around;
use Swoft\Log\Helper\CLog;
use Swoft\Db\Eloquent\Builder;
use App\Model\Entity\TaxEquipment;
use swoft\opentracing\Mysql\MySqlConnection;
use swoft\opentracing\SpanStarter;
use Swoft\Validator\Annotation\Mapping\Length;

/**
 * @Aspect
 *
 * @PointExecution (
 *     include={"MySqlConnection::select","MySqlConnection::update","MySqlConnection::delete"},
 *     exclude={"MySqlConnection::getDb","MySqlConnection::getDatabase"}
 * )
 *
 * Class MysqlAspect
 * @package swoft\opentracing\Aspect\Mysql
 */
class MysqlAspect
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
     * @throws Throwable
     */
    public function aroundAdvice(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $target = $proceedingJoinPoint->getTarget();
        $args = [
            'statement' => $this->getRawSql($proceedingJoinPoint),
            'method' => strtolower($proceedingJoinPoint->getMethod()),
            'db' => $target->getDb(),
            'user' => $target->getDatabase()->getUsername(),
        ];
        var_dump($args);
        $span = $this->startSpan('db.' . $args['method']);
        /** @var MySqlConnection $target */
        $span->setTag('component', env('JAEGER_SERVICE_NAME'));
        $span->setTag('db.statement', $args['statement']);
        $span->setTag('db.method', $args['method']);
        $span->setTag('db.db', $args['db']);
        $span->setTag('db.user', $args['user']);
        $span->setTag('db.type', 'sql');
        $rsp = $proceedingJoinPoint->proceed();
//        $span->log(['rsp' => $rsp]);
        $span->finish();
        // 后置通知
        return $rsp;
    }


    private function getRawSql(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $args = $proceedingJoinPoint->getArgs();
        if (count($args) < 2) {
            return $args[0];
        }
        list($sql, $bind) = $args;
        return sprintf(str_replace('?', '%s', $sql), ...$bind);
    }
}
