<?php
/**
 * ControleDoTrafego Active Record
 * @author  <your-name-here>
 */
class BoatControleDotrafego extends TRecord
{
    const TABLENAME = 'boat_condicao_trafego';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('id_condicao_trafego');
        parent::addAttribute('id_boat');
    }


}

