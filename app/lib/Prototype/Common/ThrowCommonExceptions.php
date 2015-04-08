<?php
namespace Prototype\Common;


class ThrowCommonExceptions
{
    public static function throwUnAuthenticate() {
        throw new \Prototype\Exceptions\UnAuthenticatedException("Please login first");
    }  
}
