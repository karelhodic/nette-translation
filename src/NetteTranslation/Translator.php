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
use Hodic\Exception;

/**
 * Translator service for Nette Framework
 * Class Translator
 * @package Hodic\Translation
 */
class Translator implements Nette\Localization\ITranslator
{
    
    use Nette\SmartObject;
    
    /** @var int language id */
    protected $langId;
    
    /** @var LanguageModel */
    protected $language;
    
    /** @var TranslateModel */
    protected $translate;
    
    /** @var TranslationPhraseModel */
    protected $translationPhrase;
    
    /** @var array translation variables */
    protected $variables;
    
    public function __construct(
            LanguageModel $language,
            TranslateModel $translate,
            TranslationPhraseModel $translationPhrase)
    {
        $this->language = $language;
        $this->translate = $translate;
        $this->translationPhrase = $translationPhrase;
        
        // initialization array in variables
        $this->variables = [];
    }

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
        $text =  $this->getTranslation($message);
        return $this->fillVariables($text);
        
    }
    
    /**
     * Set language
     * 
     * @param  string $lang language code from language table
     * 
     * @throws Hodic\Exception\Translation
     */
    public function setLang(string $lang)
    {
        $lang = $this->language->getTable()
                        ->where('code = ?', $lang)
                        ->fetch();
        
        if ($lang === false)
        {
            throw new Exception\NetteTranslation("Language not found");
        }
        
        $this->langId = $lang->id;
    }
    
    /**
     * Gets a phrase translation
     * 
     * @param  string $phrase Phrase translation
     * 
     * @return string
     * 
     * @throws Hodic\Exception\Translation
     */
    protected function getTranslation(string $phrase)
    {
        
        $translate = $this->translationPhrase->getPhrase($phrase);
        
        if ($translate === false)
        {
            throw new Exception\NetteTranslation("Phrase {$phrase} not found");
        }
        
        $translate = $translate->related('translate')
                        ->where('lang = ?', $this->langId)
                        ->fetch();
        
        if ($translate === false)
        {
            throw new Exception\NetteTranslation("Phrase {$phrase} doesn't have translation");
        }
        
        return $translate->translation;
    }
    
    /**
     * Adds new variable for translation
     * 
     * @param string $key Name of variable
     * @param string $value
     * 
     * @throws Hodic\Exception\Translation
     */
    public function addVariable(string $key, string $value)
    {
        if (isset($this->variables[$key]))
        {
            throw new Exception\NetteTranslation("Duplicate {$key} variable");
        }
        
        $this->variables[$key] = $value;
    }
    
    /**
     * Fills all variables
     * 
     * @param string $text
     */
    protected function fillVariables(string $text)
    {
        foreach ($this->variables as $key => $variable)
        {
            $text = str_replace('{' . $key . '}', $variable, $text);
        }
        
        return $text;
    }
}
