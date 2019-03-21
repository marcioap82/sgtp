<?php
/**
 * BoatEnvolvidos Active Record
 * @author  <your-name-here>
 */
class BoatEnvolvidos extends TRecord
{
    const TABLENAME = 'boatenvolvidos';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);    
     
        parent::addAttribute('envolvidos_id');
        parent::addAttribute('boat_id');
    }


}
