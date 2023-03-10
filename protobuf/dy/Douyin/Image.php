<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: dy.proto

namespace Douyin;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>douyin.Image</code>
 */
class Image extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated string urlListList = 1;</code>
     */
    private $urlListList;
    /**
     * Generated from protobuf field <code>string uri = 2;</code>
     */
    protected $uri = '';
    /**
     * Generated from protobuf field <code>uint64 height = 3;</code>
     */
    protected $height = 0;
    /**
     * Generated from protobuf field <code>uint64 width = 4;</code>
     */
    protected $width = 0;
    /**
     * Generated from protobuf field <code>string avgColor = 5;</code>
     */
    protected $avgColor = '';
    /**
     * Generated from protobuf field <code>uint32 imageType = 6;</code>
     */
    protected $imageType = 0;
    /**
     * Generated from protobuf field <code>string openWebUrl = 7;</code>
     */
    protected $openWebUrl = '';
    /**
     * Generated from protobuf field <code>.douyin.ImageContent content = 8;</code>
     */
    protected $content = null;
    /**
     * Generated from protobuf field <code>bool isAnimated = 9;</code>
     */
    protected $isAnimated = false;
    /**
     * Generated from protobuf field <code>.douyin.NinePatchSetting FlexSettingList = 10;</code>
     */
    protected $FlexSettingList = null;
    /**
     * Generated from protobuf field <code>.douyin.NinePatchSetting TextSettingList = 11;</code>
     */
    protected $TextSettingList = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $urlListList
     *     @type string $uri
     *     @type int|string $height
     *     @type int|string $width
     *     @type string $avgColor
     *     @type int $imageType
     *     @type string $openWebUrl
     *     @type \Douyin\ImageContent $content
     *     @type bool $isAnimated
     *     @type \Douyin\NinePatchSetting $FlexSettingList
     *     @type \Douyin\NinePatchSetting $TextSettingList
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Dy::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated string urlListList = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getUrlListList()
    {
        return $this->urlListList;
    }

    /**
     * Generated from protobuf field <code>repeated string urlListList = 1;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setUrlListList($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->urlListList = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string uri = 2;</code>
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Generated from protobuf field <code>string uri = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->uri = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint64 height = 3;</code>
     * @return int|string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Generated from protobuf field <code>uint64 height = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setHeight($var)
    {
        GPBUtil::checkUint64($var);
        $this->height = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint64 width = 4;</code>
     * @return int|string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Generated from protobuf field <code>uint64 width = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setWidth($var)
    {
        GPBUtil::checkUint64($var);
        $this->width = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string avgColor = 5;</code>
     * @return string
     */
    public function getAvgColor()
    {
        return $this->avgColor;
    }

    /**
     * Generated from protobuf field <code>string avgColor = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setAvgColor($var)
    {
        GPBUtil::checkString($var, True);
        $this->avgColor = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 imageType = 6;</code>
     * @return int
     */
    public function getImageType()
    {
        return $this->imageType;
    }

    /**
     * Generated from protobuf field <code>uint32 imageType = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setImageType($var)
    {
        GPBUtil::checkUint32($var);
        $this->imageType = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string openWebUrl = 7;</code>
     * @return string
     */
    public function getOpenWebUrl()
    {
        return $this->openWebUrl;
    }

    /**
     * Generated from protobuf field <code>string openWebUrl = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setOpenWebUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->openWebUrl = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.douyin.ImageContent content = 8;</code>
     * @return \Douyin\ImageContent|null
     */
    public function getContent()
    {
        return $this->content;
    }

    public function hasContent()
    {
        return isset($this->content);
    }

    public function clearContent()
    {
        unset($this->content);
    }

    /**
     * Generated from protobuf field <code>.douyin.ImageContent content = 8;</code>
     * @param \Douyin\ImageContent $var
     * @return $this
     */
    public function setContent($var)
    {
        GPBUtil::checkMessage($var, \Douyin\ImageContent::class);
        $this->content = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool isAnimated = 9;</code>
     * @return bool
     */
    public function getIsAnimated()
    {
        return $this->isAnimated;
    }

    /**
     * Generated from protobuf field <code>bool isAnimated = 9;</code>
     * @param bool $var
     * @return $this
     */
    public function setIsAnimated($var)
    {
        GPBUtil::checkBool($var);
        $this->isAnimated = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.douyin.NinePatchSetting FlexSettingList = 10;</code>
     * @return \Douyin\NinePatchSetting|null
     */
    public function getFlexSettingList()
    {
        return $this->FlexSettingList;
    }

    public function hasFlexSettingList()
    {
        return isset($this->FlexSettingList);
    }

    public function clearFlexSettingList()
    {
        unset($this->FlexSettingList);
    }

    /**
     * Generated from protobuf field <code>.douyin.NinePatchSetting FlexSettingList = 10;</code>
     * @param \Douyin\NinePatchSetting $var
     * @return $this
     */
    public function setFlexSettingList($var)
    {
        GPBUtil::checkMessage($var, \Douyin\NinePatchSetting::class);
        $this->FlexSettingList = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.douyin.NinePatchSetting TextSettingList = 11;</code>
     * @return \Douyin\NinePatchSetting|null
     */
    public function getTextSettingList()
    {
        return $this->TextSettingList;
    }

    public function hasTextSettingList()
    {
        return isset($this->TextSettingList);
    }

    public function clearTextSettingList()
    {
        unset($this->TextSettingList);
    }

    /**
     * Generated from protobuf field <code>.douyin.NinePatchSetting TextSettingList = 11;</code>
     * @param \Douyin\NinePatchSetting $var
     * @return $this
     */
    public function setTextSettingList($var)
    {
        GPBUtil::checkMessage($var, \Douyin\NinePatchSetting::class);
        $this->TextSettingList = $var;

        return $this;
    }

}

