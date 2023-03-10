<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: ks.proto

namespace KuaishouPubf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>kuaishouPubf.SCWebFeedPush</code>
 */
class SCWebFeedPush extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string displayWatchingCount = 1;</code>
     */
    protected $displayWatchingCount = '';
    /**
     * Generated from protobuf field <code>string displayLikeCount = 2;</code>
     */
    protected $displayLikeCount = '';
    /**
     * Generated from protobuf field <code>uint64 pendingLikeCount = 3;</code>
     */
    protected $pendingLikeCount = 0;
    /**
     * Generated from protobuf field <code>uint64 pushInterval = 4;</code>
     */
    protected $pushInterval = 0;
    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebCommentFeed commentFeeds = 5;</code>
     */
    private $commentFeeds;
    /**
     * Generated from protobuf field <code>string commentCursor = 6;</code>
     */
    protected $commentCursor = '';
    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebComboCommentFeed comboCommentFeed = 7;</code>
     */
    private $comboCommentFeed;
    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebLikeFeed likeFeeds = 8;</code>
     */
    private $likeFeeds;
    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebGiftFeed giftFeeds = 9;</code>
     */
    private $giftFeeds;
    /**
     * Generated from protobuf field <code>string giftCursor = 10;</code>
     */
    protected $giftCursor = '';
    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebSystemNoticeFeed systemNoticeFeeds = 11;</code>
     */
    private $systemNoticeFeeds;
    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebShareFeed shareFeeds = 12;</code>
     */
    private $shareFeeds;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $displayWatchingCount
     *     @type string $displayLikeCount
     *     @type int|string $pendingLikeCount
     *     @type int|string $pushInterval
     *     @type array<\KuaishouPubf\WebCommentFeed>|\Google\Protobuf\Internal\RepeatedField $commentFeeds
     *     @type string $commentCursor
     *     @type array<\KuaishouPubf\WebComboCommentFeed>|\Google\Protobuf\Internal\RepeatedField $comboCommentFeed
     *     @type array<\KuaishouPubf\WebLikeFeed>|\Google\Protobuf\Internal\RepeatedField $likeFeeds
     *     @type array<\KuaishouPubf\WebGiftFeed>|\Google\Protobuf\Internal\RepeatedField $giftFeeds
     *     @type string $giftCursor
     *     @type array<\KuaishouPubf\WebSystemNoticeFeed>|\Google\Protobuf\Internal\RepeatedField $systemNoticeFeeds
     *     @type array<\KuaishouPubf\WebShareFeed>|\Google\Protobuf\Internal\RepeatedField $shareFeeds
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Ks::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string displayWatchingCount = 1;</code>
     * @return string
     */
    public function getDisplayWatchingCount()
    {
        return $this->displayWatchingCount;
    }

    /**
     * Generated from protobuf field <code>string displayWatchingCount = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setDisplayWatchingCount($var)
    {
        GPBUtil::checkString($var, True);
        $this->displayWatchingCount = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string displayLikeCount = 2;</code>
     * @return string
     */
    public function getDisplayLikeCount()
    {
        return $this->displayLikeCount;
    }

    /**
     * Generated from protobuf field <code>string displayLikeCount = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setDisplayLikeCount($var)
    {
        GPBUtil::checkString($var, True);
        $this->displayLikeCount = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint64 pendingLikeCount = 3;</code>
     * @return int|string
     */
    public function getPendingLikeCount()
    {
        return $this->pendingLikeCount;
    }

    /**
     * Generated from protobuf field <code>uint64 pendingLikeCount = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setPendingLikeCount($var)
    {
        GPBUtil::checkUint64($var);
        $this->pendingLikeCount = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint64 pushInterval = 4;</code>
     * @return int|string
     */
    public function getPushInterval()
    {
        return $this->pushInterval;
    }

    /**
     * Generated from protobuf field <code>uint64 pushInterval = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setPushInterval($var)
    {
        GPBUtil::checkUint64($var);
        $this->pushInterval = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebCommentFeed commentFeeds = 5;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCommentFeeds()
    {
        return $this->commentFeeds;
    }

    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebCommentFeed commentFeeds = 5;</code>
     * @param array<\KuaishouPubf\WebCommentFeed>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCommentFeeds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \KuaishouPubf\WebCommentFeed::class);
        $this->commentFeeds = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string commentCursor = 6;</code>
     * @return string
     */
    public function getCommentCursor()
    {
        return $this->commentCursor;
    }

    /**
     * Generated from protobuf field <code>string commentCursor = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setCommentCursor($var)
    {
        GPBUtil::checkString($var, True);
        $this->commentCursor = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebComboCommentFeed comboCommentFeed = 7;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getComboCommentFeed()
    {
        return $this->comboCommentFeed;
    }

    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebComboCommentFeed comboCommentFeed = 7;</code>
     * @param array<\KuaishouPubf\WebComboCommentFeed>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setComboCommentFeed($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \KuaishouPubf\WebComboCommentFeed::class);
        $this->comboCommentFeed = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebLikeFeed likeFeeds = 8;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLikeFeeds()
    {
        return $this->likeFeeds;
    }

    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebLikeFeed likeFeeds = 8;</code>
     * @param array<\KuaishouPubf\WebLikeFeed>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLikeFeeds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \KuaishouPubf\WebLikeFeed::class);
        $this->likeFeeds = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebGiftFeed giftFeeds = 9;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getGiftFeeds()
    {
        return $this->giftFeeds;
    }

    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebGiftFeed giftFeeds = 9;</code>
     * @param array<\KuaishouPubf\WebGiftFeed>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setGiftFeeds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \KuaishouPubf\WebGiftFeed::class);
        $this->giftFeeds = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string giftCursor = 10;</code>
     * @return string
     */
    public function getGiftCursor()
    {
        return $this->giftCursor;
    }

    /**
     * Generated from protobuf field <code>string giftCursor = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setGiftCursor($var)
    {
        GPBUtil::checkString($var, True);
        $this->giftCursor = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebSystemNoticeFeed systemNoticeFeeds = 11;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSystemNoticeFeeds()
    {
        return $this->systemNoticeFeeds;
    }

    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebSystemNoticeFeed systemNoticeFeeds = 11;</code>
     * @param array<\KuaishouPubf\WebSystemNoticeFeed>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSystemNoticeFeeds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \KuaishouPubf\WebSystemNoticeFeed::class);
        $this->systemNoticeFeeds = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebShareFeed shareFeeds = 12;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getShareFeeds()
    {
        return $this->shareFeeds;
    }

    /**
     * Generated from protobuf field <code>repeated .kuaishouPubf.WebShareFeed shareFeeds = 12;</code>
     * @param array<\KuaishouPubf\WebShareFeed>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setShareFeeds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \KuaishouPubf\WebShareFeed::class);
        $this->shareFeeds = $arr;

        return $this;
    }

}

