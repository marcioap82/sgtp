<?php
/**
 * MobrasRealizadas Active Record
 * @author  <your-name-here>
 */
class MobrasRealizadas extends TRecord
{
    const TABLENAME = 'mobras_realizadas';
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
