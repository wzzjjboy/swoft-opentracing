<?php

declare(strict_types=1);
/**
 * spanStarter
 */
namespace swoft\opentracing;

use Hyperf\Rpc;
use Hyperf\Utils\ApplicationContext;
use OpenTracing\GlobalTracer;
use OpenTracing\Span;
use Psr\Http\Message\ServerRequestInterface;
use Swoft\Http\Message\Request;
use const OpenTracing\Formats\TEXT_MAP;
use const OpenTracing\Tags\SPAN_KIND;
use const OpenTracing\Tags\SPAN_KIND_RPC_SERVER;

trait SpanStarter
{
    /**
     * Helper method to start a span while setting context.
     */
    protected function startSpan(
        string $name,
        array $option = [],
        string $kind = SPAN_KIND_RPC_SERVER
    ): Span {
        $tracer = GlobalTracer::get();
        $context = context();
        $root = $context->get('tracer.root');
        if (! $root instanceof Span) {
            /** @var ServerRequestInterface $request */
            $request = \context()->getRequest();
            if (! $request instanceof Request) {
                // If the request object is absent, we are probably in a commandline context.
                // Throwing an exception is unnecessary.
                $root = $this->tracer->startSpan($name, $option);
                $root->setTag(SPAN_KIND, $kind);
                $context->set('tracer.root', $root);
                return $root;
            }
            $carrier = array_map(function ($header) {
                return $header[0];
            }, $request->getHeaders());
            if ($request instanceof \Swoft\Rpc\Server\Request) {
                $rpcCarrier = $request->getHeader('tracer.carrier');
                if (! empty($rpcCarrier)) {
                    $carrier = $rpcCarrier;
                }
            }
            // Extracts the context from the HTTP headers
            $spanContext = $tracer->extract(TEXT_MAP, $carrier);
            if ($spanContext) {
                $option['child_of'] = $spanContext;
            }
            $root = $tracer->startSpan($name, $option);
            $root->setTag(SPAN_KIND, $kind);
            $context->set('tracer.root', $root);
            return $root;
        }
        $option['child_of'] = $root->getContext();
        $child = $tracer->startSpan($name, $option);
        $child->setTag(SPAN_KIND, $kind);
        return $child;
    }
}
