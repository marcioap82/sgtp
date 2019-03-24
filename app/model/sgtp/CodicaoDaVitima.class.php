<?php
/**
 * CodicaoDaVitima Active Record
 * @author  <your-name-here>
 */
class CodicaoDaVitima extends TRecord
{
    const TABLENAME = 'codicao_da_vitima';
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
