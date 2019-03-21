<?php
/**
 * SituacaoVitima Active Record
 * @author  <your-name-here>
 */
class SituacaoVitima extends TRecord
{
    const TABLENAME = 'situacao_vitima';
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
