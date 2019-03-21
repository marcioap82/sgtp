<?php
/**
 * EstadoDaVitma Active Record
 * @author  <your-name-here>
 */
class EstadoDaVitma extends TRecord
{
    const TABLENAME = 'estado_da_vitma';
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
