<?php
/**
 * This file is part of PHP DotEnv
 * @author Vitor Reis <vitor@d5w.com.br>
 */

namespace DotEnv\Adaptor;

use DotEnv\DotEnv;
use DotEnv\Exception\Runtime;
use DotEnv\Utils\IAdaptor;

/**
 * Class ApacheGetEnv Adaptor
 * @package DotEnv\Adaptor
 */
class ApacheGetEnv implements IAdaptor
{
    /**
     * Method for adaptor put value
     * @param  string $key   Env Key
     * @param  mixed  $value Env Value
     * @return bool          If success "true", else "false"
     * @throws Runtime
     */
    public static function put($key, $value)
    {
        if (!function_exists('\apache_setenv')) {
            if (DotEnv::isDebug()) {
                throw new Runtime("ApacheGetEnv Adaptor not supported");
            } else {
                return false;
            }
        }

        return apache_setenv($key, $value);
    }
}
