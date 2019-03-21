<?php
/**
 * Envolvidos Active Record
 * @author  <your-name-here>
 */
class Envolvidos extends TRecord
{
    const TABLENAME = 'envolvidos';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome');
    }


}
