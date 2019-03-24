<?php
/**
 * EnderecoCondutor Active Record
 * @author  <your-name-here>
 */
class EnderecoCondutor extends TRecord
{
    const TABLENAME = 'endereco_condutor';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('endereco');
        parent::addAttribute('bairro');
    }


}
