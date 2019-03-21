<?php
/**
 * SituacaoCondutor Active Record
 * @author  <your-name-here>
 */
class SituacaoCondutor extends TRecord
{
    const TABLENAME = 'situacao_condutor';
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
