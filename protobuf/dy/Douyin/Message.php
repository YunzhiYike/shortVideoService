<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: dy.proto

namespace Douyin;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>douyin.Message</code>
 */
class Message extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string method = 1;</code>
     */
    protected $method = '';
    /**
     * Generated from protobuf field <code>bytes payload = 2;</code>
     */
    protected $payload = '';
    /**
     * Generated from protobuf field <code>int64 msgId = 3;</code>
     */
    protected $msgId = 0;
    /**
     * Generated from protobuf field <code>int32 msgType = 4;</code>
     */
    protected $msgType = 0;
    /**
     * Generated from protobuf field <code>int64 offset = 5;</code>
     */
    protected $offset = 0;
    /**
     * Generated from protobuf field <code>bool needWrdsStore = 6;</code>
     */
    protected $needWrdsStore = false;
    /**
     * Generated from protobuf field <code>int64 wrdsVersion = 7;</code>
     */
    protected $wrdsVersion = 0;
    /**
     * Generated from protobuf field <code>string wrdsSubKey = 8;</code>
     */
    protected $wrdsSubKey = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $method
     *     @type string $payload
     *     @type int|string $msgId
     *     @type int $msgType
     *     @type int|string $offset
     *     @type bool $needWrdsStore
     *     @type int|string $wrdsVersion
     *     @type string $wrdsSubKey
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Dy::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string method = 1;</code>
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Generated from protobuf field <code>string method = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setMethod($var)
    {
        GPBUtil::checkString($var, True);
        $this->method = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes payload = 2;</code>
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Generated from protobuf field <code>bytes payload = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setPayload($var)
    {
        GPBUtil::checkString($var, False);
        $this->payload = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 msgId = 3;</code>
     * @return int|string
     */
    public function getMsgId()
    {
        return $this->msgId;
    }

    /**
     * Generated from protobuf field <code>int64 msgId = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setMsgId($var)
    {
        GPBUtil::checkInt64($var);
        $this->msgId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 msgType = 4;</code>
     * @return int
     */
    public function getMsgType()
    {
        return $this->msgType;
    }

    /**
     * Generated from protobuf field <code>int32 msgType = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setMsgType($var)
    {
        GPBUtil::checkInt32($var);
        $this->msgType = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 offset = 5;</code>
     * @return int|string
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Generated from protobuf field <code>int64 offset = 5;</code>
     * @param int|string $var
     * @return $this
     */
    public function setOffset($var)
    {
        GPBUtil::checkInt64($var);
        $this->offset = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool needWrdsStore = 6;</code>
     * @return bool
     */
    public function getNeedWrdsStore()
    {
        return $this->needWrdsStore;
    }

    /**
     * Generated from protobuf field <code>bool needWrdsStore = 6;</code>
     * @param bool $var
     * @return $this
     */
    public function setNeedWrdsStore($var)
    {
        GPBUtil::checkBool($var);
        $this->needWrdsStore = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 wrdsVersion = 7;</code>
     * @return int|string
     */
    public function getWrdsVersion()
    {
        return $this->wrdsVersion;
    }

    /**
     * Generated from protobuf field <code>int64 wrdsVersion = 7;</code>
     * @param int|string $var
     * @return $this
     */
    public function setWrdsVersion($var)
    {
        GPBUtil::checkInt64($var);
        $this->wrdsVersion = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string wrdsSubKey = 8;</code>
     * @return string
     */
    public function getWrdsSubKey()
    {
        return $this->wrdsSubKey;
    }

    /**
     * Generated from protobuf field <code>string wrdsSubKey = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setWrdsSubKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->wrdsSubKey = $var;

        return $this;
    }

}
