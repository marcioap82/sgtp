<?php
/**
 * BoatEnvolvidos Active Record
 * @author  <your-name-here>
 */
class BoatTipoPavimento extends TRecord
{
    const TABLENAME = 'boat_tipo_pavimento';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);    
     
        parent::addAttribute('id_tipo_pavimento');
        parent::addAttribute('id_boat');
    }


}


