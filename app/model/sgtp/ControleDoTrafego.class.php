<?php
/**
 * ControleDoTrafego Active Record
 * @author  <your-name-here>
 */
class ControleDoTrafego extends TRecord
{
    const TABLENAME = 'controle_do_trafego';
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
