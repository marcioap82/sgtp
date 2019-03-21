<?php
/**
 * Boattemp Active Record
 * @author  <your-name-here>
 */
class Boattemp extends TRecord
{
    const TABLENAME = 'boattemp';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('numero');
        parent::addAttribute('datadecadastro');
        parent::addAttribute('hora');
    }


}
