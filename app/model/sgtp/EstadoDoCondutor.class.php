<?php
/**
 * EstadoDoCondutor Active Record
 * @author  <your-name-here>
 */
class EstadoDoCondutor extends TRecord
{
    const TABLENAME = 'estado_do_condutor';
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
