<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 10-12-2018 15:15
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Utils;

use ReflectionClass;

/**
 * Class Enum
 * @package App\Utils
 */
abstract class Enum
{
    private static $constCacheArray = null;

    private static function getConstants()
    {
        if ( self::$constCacheArray === null ) {
            self::$constCacheArray = [];
        }
        $calledClass = \get_called_class();
        if ( !array_key_exists( $calledClass, self::$constCacheArray ) ) {
            $reflect = new ReflectionClass( $calledClass );
            self::$constCacheArray[ $calledClass ] = $reflect->getConstants();
        }
        return self::$constCacheArray[ $calledClass ];
    }

    public static function isValidName( $name, $strict = false )
    {
        $constants = self::getConstants();

        if ( $strict ) {
            return array_key_exists( $name, $constants );
        }

        $keys = array_map( 'strtolower', array_keys( $constants ) );
        return in_array( strtolower( $name ), $keys );
    }

    public static function isValidValue( $value, $strict = true )
    {
        $values = array_values( self::getConstants() );
        return in_array( $value, $values, $strict );
    }

    public static function compareTo( Enum $enum )
    {
        //todo implement this
    }

    public static function getDeclaringClass()
    {
        return new ReflectionClass( \get_called_class() );
    }

    public static function valueOf()
    {

    }
}