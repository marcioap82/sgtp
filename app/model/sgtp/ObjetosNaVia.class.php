<?php
/**
 * ObjetosNaVia Active Record
 * @author  <your-name-here>
 */
class ObjetosNaVia extends TRecord
{
    const TABLENAME = 'objetos_na_via';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('descriacao');
    }


}
