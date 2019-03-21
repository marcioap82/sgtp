<?php
/**
 * CodicaoDaVia Active Record
 * @author  <your-name-here>
 */
class CodicaoDaVia extends TRecord
{
    const TABLENAME = 'codicao_da_via';
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
