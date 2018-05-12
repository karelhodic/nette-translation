<?php

/**
 * This file is part of the nette-translation (https://github.com/karelhodic/nette-translation)
 * Copyright (c) 2018 Karel Hodic (https://hodic.cz/)
 *
 * @author Karel Hodic
 * @email  karel@hodic.cz
 * @link   https://hodic.cz/
 * @link   https://www.facebook.com/Karel.hodic
 * @link   https://twitter.com/karel_hodic
 * 
 * @copyright 2018
 */

namespace Hodic\Translation;

use Nette;

/**
 * Translation extension for Nette
 * Class Translator
 * @package Hodic\Translation
 */
class Translator implements Nette\Localization\ITranslator
{
    /**
     * Translates the given string.
     * 
     * @param  string   message
     * @param  int      plural count
     * 
     * @return string
     */
    public function translate($message, $count = null)
    {
        return $message;
    }
}
