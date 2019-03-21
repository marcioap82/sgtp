<?php
/**
 * Aparelhodeetilometro Active Record
 * @author  <your-name-here>
 */
class Aparelhodeetilometro extends TRecord
{
    const TABLENAME = 'aparelhodeetilometro';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('numero_serie');
    }


}
