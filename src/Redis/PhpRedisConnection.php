<?php declare(strict_types=1);


namespace swoft\opentracing\Redis;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Redis\Connection\Connection;

/**
 * Class PhpRedisConnection
 *
 * @since 2.0
 *
 * @Bean()
 */
class PhpRedisConnection extends Connection
{
    public function getRedisDb()
    {
        return $this->redisDb;
    }

    private function getMethodName($fullName)
    {
        return strtolower(substr($fullName, stripos($fullName, '::') + 2));
    }

    public function hGet($key, $hashKey)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function hGetAll($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function append($key, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function bitCount($key, $start, $end)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function blPop($keys, $timeout)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function brPop($keys, $timeout)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function brpoplpush($srcKey, $dstKey, $timeout)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function decr($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function decrBy($key, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function eval($script, $args = [], $numKeys = 0)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function evalSha($scriptSha, $args = [], $numKeys = 0)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function exists($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function geoAdd($key, $longitude, $latitude, $member)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function geoDist($key, $member1, $member2, $unit = 'm')
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function geohash($key, $member1, $member2 = null, $memberN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function geopos($key, $member1, $member2 = null, $memberN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function getBit($key, $offset)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function getOption($name)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function getRange($key, $start, $end)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function getSet($key, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function hDel($key, $hashKey1, $hashKey2 = null, $hashKeyN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function hExists($key, $hashKey)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function hIncrBy($key, $hashKey, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function hIncrByFloat($key, $field, $increment)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function hKeys($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function hLen($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function hSet($key, $hashKey, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function hSetNx($key, $hashKey, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function hVals($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function hScan($key, &$iterator, $pattern = null, $count = 0)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function incr($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function incrBy($key, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function incrByFloat($key, $increment)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function info($option = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function lGet($key, $index)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function lInsert($key, $position, $pivot, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function lPop($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function lPush($key, $value1, $value2 = null, $valueN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function lPushx($key, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function lSet($key, $index, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function msetnx($array)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function persist($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function pExpire($key, $ttl)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function pExpireAt($key, $timestamp)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function psetex($key, $ttl, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function pttl($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function rPop($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function rPush($key, $value1, $value2 = null, $valueN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function rPushx($key, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function rawCommand(...$args)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function renameNx($srcKey, $dstKey)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function restore($key, $ttl, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function rpoplpush($srcKey, $dstKey)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sAdd($key, $value1, $value2 = null, $valueN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sAddArray($key, $valueArray)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sDiff($key1, $key2, $keyN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sDiffStore($dstKey, $key1, $key2, $keyN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sInter($key1, $key2, $keyN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sInterStore($dstKey, $key1, $key2, $keyN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sMembers($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sMove($srcKey, $dstKey, $member)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sPop($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function RandMember($key, $count = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sUnion($key1, $key2, $keyN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sUnionStore($dstKey, $key1, $key2, $keyN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function scan($iterator, ?string $pattern = NULL, int $count = 0): array
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function script($nodeParams, $command, $script)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function setBit($key, $offset, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function setRange($key, $offset, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function setex($key, $ttl, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function setnx($key, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sort($key, $option = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sScan($key, &$iterator, $pattern = null, $count = 0)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function strlen($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function ttl($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function type($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function unwatch()
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function watch($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zCard($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zCount($key, $start, $end)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zIncrBy($key, $value, $member)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zLexCount($key, $min, $max)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zRange($key, $start, $end, bool $withscores = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zRangeByLex($key, $min, $max, $offset = null, $limit = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zRangeByScore($key, $start, $end, $options = [])
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zRank($key, $member)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zRemRangeByLex($key, $min, $max)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zRevRange($key, $start, $end, bool $withscore = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zRevRangeByLex($key, $min, $max, $offset = null, $limit = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zRevRangeByScore($key, $start, $end, $options = [])
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zRevRank($key, $member)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zScore($key, mixed $member)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zScan($key, &$iterator, $pattern = null, $count = 0)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function del($key1, $key2 = null, $key3 = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function expire($key, $ttl)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function keys($pattern)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function lLen($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function lIndex($key, $index)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function lRange($key, $start, $end)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function lRem($key, $value, $count)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function lTrim($key, $start, $stop)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function rename($srcKey, $dstKey)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sCard($key)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sIsMember($key, $value)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function sRem($key, $member1, $member2 = null, $memberN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zRem($key, $member1, $member2 = null, $memberN = null)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zRemRangeByRank($key, $start, $end)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zRemRangeByScore($key, $start, $end)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zInterStore($Output, $ZSetKeys, $Weights = null, $aggregateFunction = 'SUM')
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function zUnionStore($Output, $ZSetKeys, $Weights = null, $aggregateFunction = 'SUM')
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function hMSet($key, $keyValues)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function psubscribe($patterns, $callback)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function subscribe($channels, $callback)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function geoRadius($key, $longitude, $latitude, $radius, $radiusUnit, $options)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }

    public function expireAt($key, $timestamp)
    {
        return $this->__call($this->getMethodName(__METHOD__), func_get_args());
    }
}
