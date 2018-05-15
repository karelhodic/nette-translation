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
 * Translation Extension for Nette Framework
 * Class TranslatorExtension
 * @package Hodic\NetteTranslation
 */   
class TranslatorExtension extends Nette\DI\CompilerExtension
{
    public function loadConfiguration()
    {
        // Register extension services
        $builder = $this->getContainerBuilder();
        
        // Register LangiageModel
        $builder->addDefinition($this->prefix('language'))
                ->setClass('Hodic\NetteTranslation\LanguageModel', []);
        
        // Register TranslateModel
        $builder->addDefinition($this->prefix('translate'))
                ->setClass('Hodic\NetteTranslation\TranslateModel', []);
        
        // Register TranslationPhraseModel
        $builder->addDefinition($this->prefix('translationPhrase'))
                ->setClass('Hodic\NetteTranslation\TranslationPhraseModel', []);
        
        // Register translation service
        $builder->addDefinition($this->prefix('service'))
                ->setClass('Hodic\NetteTranslation\Translator', []);
        
    }
}
