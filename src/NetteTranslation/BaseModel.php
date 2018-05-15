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
 * Base model for Nette Framework
 * Class BaseModel
 * @package Hodic\NetteTranslation
 */ 
class BaseModel
{
    
    use Nette\SmartObject;
    
    /** @var Nette\Database\Context */
    protected $context;
    
    /** @var string Table name */
    protected $tableName = '';
    
    public function __construct(Nette\Database\Context $context)
    {
        $this->context = $context;
    }
    
    /**
     * Gets the table from $tableName
     * 
     * @return Nette\Database\Table\Selection
     */
    public function getTable()
    {
        return $this->context->table($this->tableName);
    }
}
