<?php
/**
 * RemovidoPor Active Record
 * @author  <your-name-here>
 */
class RemovidoPor extends TRecord
{
    const TABLENAME = 'removido_por';
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
