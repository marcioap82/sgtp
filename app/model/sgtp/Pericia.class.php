<?php
/**
 * Pericia Active Record
 * @author  <your-name-here>
 */
class Pericia extends TRecord
{
    const TABLENAME = 'pericia';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('datapericia');
        parent::addAttribute('horario');
        parent::addAttribute('nome');
    }


}
