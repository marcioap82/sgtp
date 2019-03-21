<?php
/**
 * SentidoDaVia Active Record
 * @author  <your-name-here>
 */
class SentidoDaVia extends TRecord
{
    const TABLENAME = 'sentido_da_via';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('descricao');
    }


}
