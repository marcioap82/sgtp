<?php
/**
 * DadosDoEtilometro Active Record
 * @author  <your-name-here>
 */
class DadosDoEtilometro extends TRecord
{
    const TABLENAME = 'dados_do_etilometro';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome');
        parent::addAttribute('numero');
        parent::addAttribute('sinais');
        
    }


}
