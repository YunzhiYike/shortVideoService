<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: dy.proto

namespace Douyin;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>douyin.CommonTextMessage</code>
 */
class CommonTextMessage extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.douyin.Common common = 1;</code>
     */
    protected $common = null;
    /**
     * Generated from protobuf field <code>.douyin.User user = 2;</code>
     */
    protected $user = null;
    /**
     * Generated from protobuf field <code>string scene = 3;</code>
     */
    protected $scene = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Douyin\Common $common
     *     @type \Douyin\User $user
     *     @type string $scene
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Dy::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.douyin.Common common = 1;</code>
     * @return \Douyin\Common|null
     */
    public function getCommon()
    {
        return $this->common;
    }

    public function hasCommon()
    {
        return isset($this->common);
    }

    public function clearCommon()
    {
        unset($this->common);
    }

    /**
     * Generated from protobuf field <code>.douyin.Common common = 1;</code>
     * @param \Douyin\Common $var
     * @return $this
     */
    public function setCommon($var)
    {
        GPBUtil::checkMessage($var, \Douyin\Common::class);
        $this->common = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.douyin.User user = 2;</code>
     * @return \Douyin\User|null
     */
    public function getUser()
    {
        return $this->user;
    }

    public function hasUser()
    {
        return isset($this->user);
    }

    public function clearUser()
    {
        unset($this->user);
    }

    /**
     * Generated from protobuf field <code>.douyin.User user = 2;</code>
     * @param \Douyin\User $var
     * @return $this
     */
    public function setUser($var)
    {
        GPBUtil::checkMessage($var, \Douyin\User::class);
        $this->user = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string scene = 3;</code>
     * @return string
     */
    public function getScene()
    {
        return $this->scene;
    }

    /**
     * Generated from protobuf field <code>string scene = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setScene($var)
    {
        GPBUtil::checkString($var, True);
        $this->scene = $var;

        return $this;
    }

}
