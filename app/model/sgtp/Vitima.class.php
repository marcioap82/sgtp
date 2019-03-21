<?php
/**
 * Vitima Active Record
 * @author  <your-name-here>
 */
class Vitima extends TRecord
{
    const TABLENAME = 'vitima';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    private $estado_da_vitma;
    private $situacao_vitima;
    private $codicao_da_vitima;
    private $removido_para;
    private $removido_por;
    private $veiculo;

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome');
        parent::addAttribute('idade');
        parent::addAttribute('genero');
        parent::addAttribute('telefone');
        parent::addAttribute('removido_para_id');
        parent::addAttribute('removido_por_id');
        parent::addAttribute('estado_da_vitma_id');
        parent::addAttribute('codicao_da_vitima_id');
        //parent::addAttribute('situacao_vitima_id');
        parent::addAttribute('id_veiculo');
        parent::addAttribute('passageiro');
        parent::addAttribute('id_boat');
    }

    
    /**
     * Method set_estado_da_vitma
     * Sample of usage: $vitima->estado_da_vitma = $object;
     * @param $object Instance of EstadoDaVitma
     */
    public function set_estado_da_vitma(EstadoDaVitma $object)
    {
        $this->estado_da_vitma = $object;
        $this->estado_da_vitma_id = $object->id;
    }
    public function set_veiculo(Veiculo $object)
    {
        $this->veiculo = $object;
        $this->id_veiculo = $object->id;
    }
    
    /**
     * Method get_estado_da_vitma
     * Sample of usage: $vitima->estado_da_vitma->attribute;
     * @returns EstadoDaVitma instance
     */
    public function get_estado_da_vitma()
    {
        // loads the associated object
        if (empty($this->estado_da_vitma))
            $this->estado_da_vitma = new EstadoDaVitma($this->estado_da_vitma_id);
    
        // returns the associated object
        return $this->estado_da_vitma;
    }
    
    
    /**
     * Method set_situacao_vitima
     * Sample of usage: $vitima->situacao_vitima = $object;
     * @param $object Instance of SituacaoVitima
     */
    public function set_situacao_vitima(SituacaoVitima $object)
    {
        $this->situacao_vitima = $object;
        $this->situacao_vitima_id = $object->id;
    }
    
    /**
     * Method get_situacao_vitima
     * Sample of usage: $vitima->situacao_vitima->attribute;
     * @returns SituacaoVitima instance
     */
    public function get_situacao_vitima()
    {
        // loads the associated object
        if (empty($this->situacao_vitima))
            $this->situacao_vitima = new SituacaoVitima($this->situacao_vitima_id);
    
        // returns the associated object
        return $this->situacao_vitima;
    }
    
     public function get_veiculo()
    {
        // loads the associated object
        if (empty($this->veiculo))
            $this->veiculo = new Veiculo($this->id_veiculo);
    
        // returns the associated object
        return $this->veiculo;
    }
    
    
    /**
     * Method set_codicao_da_vitima
     * Sample of usage: $vitima->codicao_da_vitima = $object;
     * @param $object Instance of CodicaoDaVitima
     */
    public function set_codicao_da_vitima(CodicaoDaVitima $object)
    {
        $this->codicao_da_vitima = $object;
        $this->codicao_da_vitima_id = $object->id;
    }
    
    /**
     * Method get_codicao_da_vitima
     * Sample of usage: $vitima->codicao_da_vitima->attribute;
     * @returns CodicaoDaVitima instance
     */
    public function get_codicao_da_vitima()
    {
        // loads the associated object
        if (empty($this->codicao_da_vitima))
            $this->codicao_da_vitima = new CodicaoDaVitima($this->codicao_da_vitima_id);
    
        // returns the associated object
        return $this->codicao_da_vitima;
    }
    
    
    /**
     * Method set_removido_para
     * Sample of usage: $vitima->removido_para = $object;
     * @param $object Instance of RemovidoPara
     */
    public function set_removido_para(RemovidoPara $object)
    {
        $this->removido_para = $object;
        $this->removido_para_id = $object->id;
    }
    
    /**
     * Method get_removido_para
     * Sample of usage: $vitima->removido_para->attribute;
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
     * Method set_removido_por
     * Sample of usage: $vitima->removido_por = $object;
     * @param $object Instance of RemovidoPor
     */
    public function set_removido_por(RemovidoPor $object)
    {
        $this->removido_por = $object;
        $this->removido_por_id = $object->id;
    }
    
    /**
     * Method get_removido_por
     * Sample of usage: $vitima->removido_por->attribute;
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
    


}
