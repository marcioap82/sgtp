<?php
/**
 * VeiculoEntregue Active Record
 * @author  <your-name-here>
 */
class VeiculoEntregue extends TRecord
{
    const TABLENAME = 'veiculo_entregue';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome');
        parent::addAttribute('tipo_documento');
        parent::addAttribute('numero');
        parent::addAttribute('telefone');
    }


}
