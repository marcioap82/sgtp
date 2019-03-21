<?php
/**
 * BoatDadosCondutor Active Record
 * @author  <your-name-here>
 */
class BoatDadosCondutor extends TRecord
{
    const TABLENAME = 'boat_dados_condutor';
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
        parent::addAttribute('envolvidos_id');
        parent::addAttribute('boat_id');
        parent::addAttribute('dados_condutor_id');
        parent::addAttribute('boat_id');
    }


}
