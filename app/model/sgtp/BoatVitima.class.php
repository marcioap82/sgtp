<?php
/**
 * BoatVitima Active Record
 * @author  <your-name-here>
 */
class BoatVitima extends TRecord
{
    const TABLENAME = 'boat_vitima';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('vitima_id');
        parent::addAttribute('boat_id');
    }


}
