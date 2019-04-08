<?php
/**
 * Veiculo Active Record
 * @author  <your-name-here>
 */
class Veiculo extends TRecord
{
    const TABLENAME = 'veiculo';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    private $veiculo_entregue;
    private $veiculo_removido;
    private $removido_por;
    private $removido_para;
    private $veiculo_apresentado;
    private $categoria_do_veiculo;

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('placa');
        parent::addAttribute('chassi');
        parent::addAttribute('especie');      
        parent::addAttribute('categoria_do_veiculo_id');
        parent::addAttribute('removido_para_id');
        parent::addAttribute('removido_por_id');
        parent::addAttribute('sentido_da_via_id');
        parent::addAttribute('veiculo_apresentado_id');
        parent::addAttribute('veiculo_entregue_id');
        parent::addAttribute('veiculo_removido_id');
        parent::addAttribute('id_boat');
        parent::addAttribute('veiculo_tipo_procedimento');
       
      
        
    }

    
    /**
     * Method set_veiculo_entregue
     * Sample of usage: $veiculo->veiculo_entregue = $object;
     * @param $object Instance of VeiculoEntregue
     */
    public function set_veiculo_entregue(VeiculoEntregue $object)
    {
        $this->veiculo_entregue = $object;
        $this->veiculo_entregue_id = $object->id;
    }
    
    /**
     * Method get_veiculo_entregue
     * Sample of usage: $veiculo->veiculo_entregue->attribute;
     * @returns VeiculoEntregue instance
     */
    public function get_veiculo_entregue()
    {
        // loads the associated object
        if (empty($this->veiculo_entregue))
            $this->veiculo_entregue = new VeiculoEntregue($this->veiculo_entregue_id);
    
        // returns the associated object
        return $this->veiculo_entregue;
    }
    
    
    /**
     * Method set_veiculo_removido
     * Sample of usage: $veiculo->veiculo_removido = $object;
     * @param $object Instance of VeiculoRemovido
     */
    public function set_veiculo_removido(VeiculoRemovido $object)
    {
        $this->veiculo_removido = $object;
        $this->veiculo_removido_id = $object->id;
    }
    
    /**
     * Method get_veiculo_removido
     * Sample of usage: $veiculo->veiculo_removido->attribute;
     * @returns VeiculoRemovido instance
     */
    public function get_veiculo_removido()
    {
        // loads the associated object
        if (empty($this->veiculo_removido))
            $this->veiculo_removido = new VeiculoRemovido($this->veiculo_removido_id);
    
        // returns the associated object
        return $this->veiculo_removido;
    }
    
    
    /**
     * Method set_removido_por
     * Sample of usage: $veiculo->removido_por = $object;
     * @param $object Instance of RemovidoPor
     */
    public function set_removido_por(RemovidoPor $object)
    {
        $this->removido_por = $object;
        $this->removido_por_id = $object->id;
    }
    
    /**
     * Method get_removido_por
     * Sample of usage: $veiculo->removido_por->attribute;
     * @returns RemovidoPor instance
     */
    public function get_removido_por()
    {
        // loads the associated object
        if (empty($this->removido_por))
            $this->removido_por = new RemovidoPor($this->removido_por_id);
    
        // returns the associated object
        return $this->removido_por;
    }
    
    
    /**
     * Method set_removido_para
     * Sample of usage: $veiculo->removido_para = $object;
     * @param $object Instance of RemovidoPara
     */
    public function set_removido_para(RemovidoPara $object)
    {
        $this->removido_para = $object;
        $this->removido_para_id = $object->id;
    }
    
    /**
     * Method get_removido_para
     * Sample of usage: $veiculo->removido_para->attribute;
     * @returns RemovidoPara instance
     */
    public function get_removido_para()
    {
        // loads the associated object
        if (empty($this->removido_para))
            $this->removido_para = new RemovidoPara($this->removido_para_id);
    
        // returns the associated object
        return $this->removido_para;
    }
    
    
    /**
     * Method set_veiculo_apresentado
     * Sample of usage: $veiculo->veiculo_apresentado = $object;
     * @param $object Instance of VeiculoApresentado
     */
    public function set_veiculo_apresentado(VeiculoApresentado $object)
    {
        $this->veiculo_apresentado = $object;
        $this->veiculo_apresentado_id = $object->id;
    }
    
    /**
     * Method get_veiculo_apresentado
     * Sample of usage: $veiculo->veiculo_apresentado->attribute;
     * @returns VeiculoApresentado instance
     */
    public function get_veiculo_apresentado()
    {
        // loads the associated object
        if (empty($this->veiculo_apresentado))
            $this->veiculo_apresentado = new VeiculoApresentado($this->veiculo_apresentado_id);
    
        // returns the associated object
        return $this->veiculo_apresentado;
    }
    
    
    /**
     * Method set_categoria_do_veiculo
     * Sample of usage: $veiculo->categoria_do_veiculo = $object;
     * @param $object Instance of CategoriaDoVeiculo
     */
    public function set_categoria_do_veiculo(CategoriaDoVeiculo $object)
    {
        $this->categoria_do_veiculo = $object;
        $this->categoria_do_veiculo_id = $object->id;
    }
    
    /**
     * Method get_categoria_do_veiculo
     * Sample of usage: $veiculo->categoria_do_veiculo->attribute;
     * @returns CategoriaDoVeiculo instance
     */
    public function get_categoria_do_veiculo()
    {
        // loads the associated object
        if (empty($this->categoria_do_veiculo))
            $this->categoria_do_veiculo = new CategoriaDoVeiculo($this->categoria_do_veiculo_id);
    
        // returns the associated object
        return $this->categoria_do_veiculo;
    }
    


}
