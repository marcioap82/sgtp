<?php
/**
 * BoatEnvolvidos Active Record
 * @author  <your-name-here>
 */
class BoatCondicaoVia extends TRecord
{
    const TABLENAME = 'boat_codicao_da_via';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);    
     
        parent::addAttribute('id_tipo_codicao_da_via');
        parent::addAttribute('id_boat');
    }


}

