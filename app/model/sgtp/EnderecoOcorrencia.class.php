<?php
/**
 * EnderecoOcorrencia Active Record
 * @author  <your-name-here>
 */
class EnderecoOcorrencia extends TRecord
{
    const TABLENAME = 'endereco_ocorrencia';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('endereco');
        parent::addAttribute('municipio');
        parent::addAttribute('estado');
        parent::addAttribute('complemento');
        parent::addAttribute('bairro');
      
    }


}
