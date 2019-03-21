<?php
/**
 * TipoDeAcidente Active Record
 * @author  <your-name-here>
 */
class TipoDeAcidente extends TRecord
{
    const TABLENAME = 'tipo_de_acidente';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('tipo');
    }


}
