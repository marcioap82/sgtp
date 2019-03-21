<?php
/**
 * VeiculoRemovido Active Record
 * @author  <your-name-here>
 */
class VeiculoRemovido extends TRecord
{
    const TABLENAME = 'veiculo_removido';
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
