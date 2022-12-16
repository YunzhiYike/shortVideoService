<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: ks.proto

namespace KuaishouPubf;

use UnexpectedValueException;

/**
 * Protobuf type <code>kuaishouPubf.CompressionType</code>
 */
class CompressionType
{
    /**
     * Generated from protobuf enum <code>COMPRESSION_TYPE_UNKNOWN = 0;</code>
     */
    const COMPRESSION_TYPE_UNKNOWN = 0;
    /**
     * Generated from protobuf enum <code>NONE = 1;</code>
     */
    const NONE = 1;
    /**
     * Generated from protobuf enum <code>GZIP = 2;</code>
     */
    const GZIP = 2;
    /**
     * Generated from protobuf enum <code>AES = 3;</code>
     */
    const AES = 3;

    private static $valueToName = [
        self::COMPRESSION_TYPE_UNKNOWN => 'COMPRESSION_TYPE_UNKNOWN',
        self::NONE => 'NONE',
        self::GZIP => 'GZIP',
        self::AES => 'AES',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}
