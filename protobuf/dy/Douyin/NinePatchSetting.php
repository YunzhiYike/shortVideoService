<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: dy.proto

namespace Douyin;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>douyin.NinePatchSetting</code>
 */
class NinePatchSetting extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated string settingListList = 1;</code>
     */
    private $settingListList;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $settingListList
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Dy::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated string settingListList = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSettingListList()
    {
        return $this->settingListList;
    }

    /**
     * Generated from protobuf field <code>repeated string settingListList = 1;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSettingListList($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->settingListList = $arr;

        return $this;
    }

}

