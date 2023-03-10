<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: dy.proto

namespace Douyin;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>douyin.TextPieceGift</code>
 */
class TextPieceGift extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint64 giftId = 1;</code>
     */
    protected $giftId = 0;
    /**
     * Generated from protobuf field <code>.douyin.PatternRef nameRef = 2;</code>
     */
    protected $nameRef = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $giftId
     *     @type \Douyin\PatternRef $nameRef
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Dy::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>uint64 giftId = 1;</code>
     * @return int|string
     */
    public function getGiftId()
    {
        return $this->giftId;
    }

    /**
     * Generated from protobuf field <code>uint64 giftId = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setGiftId($var)
    {
        GPBUtil::checkUint64($var);
        $this->giftId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.douyin.PatternRef nameRef = 2;</code>
     * @return \Douyin\PatternRef|null
     */
    public function getNameRef()
    {
        return $this->nameRef;
    }

    public function hasNameRef()
    {
        return isset($this->nameRef);
    }

    public function clearNameRef()
    {
        unset($this->nameRef);
    }

    /**
     * Generated from protobuf field <code>.douyin.PatternRef nameRef = 2;</code>
     * @param \Douyin\PatternRef $var
     * @return $this
     */
    public function setNameRef($var)
    {
        GPBUtil::checkMessage($var, \Douyin\PatternRef::class);
        $this->nameRef = $var;

        return $this;
    }

}

