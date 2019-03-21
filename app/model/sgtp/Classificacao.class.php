<?php
/**
 * Classificacao Active Record
 * @author  <your-name-here>
 */
class Classificacao extends TRecord
{
    const TABLENAME = 'classificacao';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('tipo');
    }


}
