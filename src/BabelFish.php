<?php

namespace Codelight\BabelFish;

/**
 * Super simple container class for aliases and translations
 *
 * Class BabelFish
 *
 * @package Codelight\BabelFish
 */
class BabelFish
{
    /* @var BabelFish */
    protected static $instance;

    /* @var array */
    protected $strings = [];

    /**
     * Register key-value pairs of strings:
     * 'alias' => __('string in original language', 'textdomain')
     * 
     * Note that the string itself supports sprintf-style placeholders.
     *
     * @param array $strings
     */
    public function register(array $strings)
    {
        $this->strings = array_merge($this->strings, $strings);
    }

    /**
     * Return the registered string, passing it through sprintf() if necessary.
     *
     * @param string $alias
     * @param mixed ...$args
     * @return string
     */
    public function translate($alias, ...$args)
    {
        if (isset($this->strings[$alias])) {
            if (!empty($args)) {
                return sprintf($this->strings[$alias], ...$args);
            }
            return $this->strings[$alias];
        }

        trigger_error("Attempting to translate unregistered string: {$alias}", E_USER_WARNING);
        return $alias;
    }

    /**
     * @return BabelFish
     */
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }
}
