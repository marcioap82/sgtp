<?php
/**
 * BoatEnvolvidos Active Record
 * @author  <your-name-here>
 */
class Observacao extends TRecord
{
    const TABLENAME = 'observacao';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);    
     
        parent::addAttribute('descricao');
      } 


}


