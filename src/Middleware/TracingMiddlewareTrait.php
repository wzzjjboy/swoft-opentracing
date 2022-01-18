<?php


namespace swoft\opentracing\Middleware;

use Jaeger;
use OpenTracing\GlobalTracer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\NullLogger;
use Swoft\Http\Message\Response;
use swoft\opentracing\SpanStarter;

trait TracingMiddlewareTrait
{
    use SpanStarter;

    public $tags = [];

    public $dispatchMode = Jaeger\Config::JAEGER_OVER_BINARY_UDP;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $config = new Jaeger\Config(
            [
                'sampler' => [
                    'type' => Jaeger\SAMPLER_TYPE_CONST,
                    'param' => true,
                ],
                'logging' => true,
                "tags" => $this->tags,
                "local_agent" => [
                    "reporting_host" => env('JAEGER_REPORTING_HOST'),
                    "reporting_port" => env('JAEGER_REPORTING_PORT')
                ],
                'dispatch_mode' => $this->dispatchMode,
            ],
            env('JAEGER_SERVICE_NAME'),
            new NullLogger()
        );
        $config->initializeTracer();
        $span = $this->startSpan('root');
        try {
            /** @var Response $response */
            $response = $handler->handle($request);
            return $response;
        }catch (Exception $exception){
            throw $exception;
        } finally {
            $span->finish();
            GlobalTracer::get()->flush();
        }
    }
}
