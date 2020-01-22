<?php

/**
 * @return \Codelight\BabelFish\BabelFish
 */
function babelfish() {
    return \Codelight\BabelFish\BabelFish::getInstance();
}

/**
 * Translate a string
 *
 * @param string $alias
 * @param mixed ...$args
 * @return string
 */
function _t($alias, ...$args) {
    return babelfish()->translate($alias, ...$args);
}
