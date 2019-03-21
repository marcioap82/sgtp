<?php
/**
 * Procedimentos Active Record
 * @author  <your-name-here>
 */
class Procedimentos extends TRecord
{
    const TABLENAME = 'procedimentos';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('artigo_legislacao');
        parent::addAttribute('numero_bo');       
        parent::addAttribute('numero_autos');
        parent::addAttribute('lugar');
        parent::addAttribute('condutor_apresentado');
    }


}
