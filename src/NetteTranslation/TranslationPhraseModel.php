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

namespace Hodic\NetteTranslation;

use Nette;

/**
 * Translation phrase model for Nette Framework
 * Class TranslationPhraseModel
 * @package Hodic\NetteTranslation
 */
class TranslationPhraseModel extends BaseModel
{
    /** @var string Table name */
    protected $tableName = 'translation_phrase';
    
    /**
     * Gets a phrase
     * 
     * @param  string $phrase Phrase translation
     * 
     * @return Nette\Database\Table\ActiveRow
     */
    public function getPhrase(string $phrase)
    {
        return $this->getTable()
                ->where('phrase = ?', $phrase)
                ->fetch();
    }
}
