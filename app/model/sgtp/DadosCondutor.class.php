<?php
/**
 * DadosCondutor Active Record
 * @author  <your-name-here>
 */
class DadosCondutor extends TRecord
{
    const TABLENAME = 'dados_condutor';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    private $veiculo;
    private $objetos_na_via;
    private $sentido_da_via;
    private $mobras_realizadas;
    private $endereco_condutor;
    private $dados_do_etilometro;
    private $declaracao_do_condutor;
    private $estado_do_condutor;
    private $removido_para;
    private $removido_por;
    private $procedimentos;
    private $aparelho_etilometro;
    private $situcao_condutor;

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('cpf');
        parent::addAttribute('nome');
        parent::addAttribute('genero');
        parent::addAttribute('estado');
        parent::addAttribute('idade');
        parent::addAttribute('id_situacao_do_habilitado');
        parent::addAttribute('numero_habilitacao');
        parent::addAttribute('categoria_habilitacao');
        parent::addAttribute('vencimento');
        parent::addAttribute('uf_habilitacao');       
        parent::addAttribute('telefone');
        parent::addAttribute('id_situacao_condutor');
        parent::addAttribute('veiculo_id');
        parent::addAttribute('id_boat');
        parent::addAttribute('id_etilometro');
        parent::addAttribute('id_estado_condutor');
        parent::addAttribute('id_removido_para');
        parent::addAttribute('id_removido_por');
        parent::addAttribute('id_declaracao_condutor');
        parent::addAttribute('id_manobras_realizadas');
        parent::addAttribute('sentido_da_via_id');
        parent::addAttribute('objetos_na_via_id');
        parent::addAttribute('id_procedimentos');
        parent::addAttribute('id_aparelho_etilometro');
        parent::addAttribute('endereco_condutor_id');
        
         
    }

    
    /**
     * Method set_veiculo
     * Sample of usage: $dados_condutor->veiculo = $object;
     * @param $object Instance of Veiculo
     */
    public function set_veiculo(Veiculo $object)
    {
        $this->veiculo = $object;
        $this->veiculo_id = $object->id;
    }
    
    /**
     * Method get_veiculo
     * Sample of usage: $dados_condutor->veiculo->attribute;
     * @returns Veiculo instance
     */
    public function get_veiculo()
    {
        // loads the associated object
        if (empty($this->veiculo))
            $this->veiculo = new Veiculo($this->veiculo_id);
    
        // returns the associated object
        return $this->veiculo;
    }
    
     public function set_situcao_condutor(SituacaoCondutor $object)
    {
        $this->situcao_condutor = $object;
        $this->id_situacao_condutor = $object->id;
    }
    
    /**
     * Method get_veiculo
     * Sample of usage: $dados_condutor->veiculo->attribute;
     * @returns Veiculo instance
     */
    public function get_situcao_condutor()
    {
        // loads the associated object
        if (empty($this->situcao_condutor))
            $this->situcao_condutor = new SituacaoCondutor($this->id_situacao_condutor);
    
        // returns the associated object
        return $this->situcao_condutor;
    }
    
    
    /**
     * Method set_objetos_na_via
     * Sample of usage: $dados_condutor->objetos_na_via = $object;
     * @param $object Instance of ObjetosNaVia
     */
    public function set_objetos_na_via(ObjetosNaVia $object)
    {
        $this->objetos_na_via = $object;
        $this->objetos_na_via_id = $object->id;
    }
    
    /**
     * Method get_objetos_na_via
     * Sample of usage: $dados_condutor->objetos_na_via->attribute;
     * @returns ObjetosNaVia instance
     */
    public function get_objetos_na_via()
    {
        // loads the associated object
        if (empty($this->objetos_na_via))
            $this->objetos_na_via = new ObjetosNaVia($this->objetos_na_via_id);
    
        // returns the associated object
        return $this->objetos_na_via;
    }
    
    public function set_AparelhoEtilomentro(Aparelhodeetilometro $object)
    {
        $this->aparelho_etilometro = $object;
        $this->idaparelho_etilometro = $object->id;
    }
    
    //etilomentro
     public function get_AparelhoEtilomentro()
      {
        // loads the associated object
            if (empty($this->aparelho_etilometro)){
            
                $this->aparelho_etilometro = new Aparelhodeetilometro($this->id_aparelho_etilometro);
            }
                // returns the associated object
                return $this->aparelho_etilometro;
                
            
      }
    /**
     * Method set_sentido_da_via
     * Sample of usage: $dados_condutor->sentido_da_via = $object;
     * @param $object Instance of SentidoDaVia
     */
    public function set_sentido_da_via(SentidoDaVia $object)
    {
        $this->sentido_da_via = $object;
        $this->sentido_da_via_id = $object->id;
    }
    
    /**
     * Method get_sentido_da_via
     * Sample of usage: $dados_condutor->sentido_da_via->attribute;
     * @returns SentidoDaVia instance
     */
    public function get_sentidoDaVia()
    {
        // loads the associated object
        if (empty($this->sentido_da_via))
        {
            $this->sentido_da_via = new SentidoDaVia($this->sentido_da_via_id);
        }
        // returns the associated object
        return $this->sentido_da_via;
    }
    
    
    /**
     * Method set_mobras_realizadas
     * Sample of usage: $dados_condutor->mobras_realizadas = $object;
     * @param $object Instance of MobrasRealizadas
     */
    public function set_manobras_realizadas(MobrasRealizadas $object)
    {
        $this->mobras_realizadas = $object;
        $this->id_manobras_realizadas = $object->id;
    }
    
    /**
     * Method get_mobras_realizadas
     * Sample of usage: $dados_condutor->mobras_realizadas->attribute;
     * @returns MobrasRealizadas instance
     */
    public function get_manobras_realizadas()
    {
        // loads the associated object
        if (empty($this->mobras_realizadas))
            $this->mobras_realizadas = new MobrasRealizadas($this->id_manobras_realizadas);
    
        // returns the associated object
        return $this->mobras_realizadas;
    }
    
    
    /**
     * Method set_endereco_condutor
     * Sample of usage: $dados_condutor->endereco_condutor = $object;
     * @param $object Instance of EnderecoCondutor
     */
    public function set_endereco_condutor(EnderecoCondutor $object)
    {
        $this->endereco_condutor = $object;
        $this->endereco_condutor_id = $object->id;
    }
    
    /**
     * Method get_endereco_condutor
     * Sample of usage: $dados_condutor->endereco_condutor->attribute;
     * @returns EnderecoCondutor instance
     */
    public function get_endereco_condutor()
    {
        // loads the associated object
        if (empty($this->endereco_condutor))
            $this->endereco_condutor = new EnderecoCondutor($this->endereco_condutor_id);
    
        // returns the associated object
        return $this->endereco_condutor;
    }
    
    
    /**
     * Method set_dados_do_etilometro
     * Sample of usage: $dados_condutor->dados_do_etilometro = $object;
     * @param $object Instance of DadosDoEtilometro
     */
    public function set_dados_do_etilometro(DadosDoEtilometro $object)
    {
        $this->dados_do_etilometro = $object;
        $this->id_etilometro = $object->id;
    }
    
    /**
     * Method get_dados_do_etilometro
     * Sample of usage: $dados_condutor->dados_do_etilometro->attribute;
     * @returns DadosDoEtilometro instance
     */
    public function get_dados_do_etilometro()
    {
        // loads the associated object
        if (empty($this->dados_do_etilometro))
            $this->dados_do_etilometro = new DadosDoEtilometro($this->id_etilometro);
    
        // returns the associated object
        return $this->dados_do_etilometro;
    }
    
    
    /**
     * Method set_declaracao_do_condutor
     * Sample of usage: $dados_condutor->declaracao_do_condutor = $object;
     * @param $object Instance of DeclaracaoDoCondutor
     */
    public function set_declaracao_do_condutor(DeclaracaoDoCondutor $object)
    {
        $this->declaracao_do_condutor = $object;
        $this->id_declaracao_condutor= $object->id;
    }
    
    
    
    /**
     * Method get_declaracao_do_condutor
     * Sample of usage: $dados_condutor->declaracao_do_condutor->attribute;
     * @returns DeclaracaoDoCondutor instance
     */
    public function get_declaracao_do_condutor()
    {
        // loads the associated object
        if (empty($this->declaracao_do_condutor))
            $this->declaracao_do_condutor = new DeclaracaoDoCondutor($this->id_declaracao_condutor);
    
        // returns the associated object
        return $this->declaracao_do_condutor;
    }
    
    
    /**
     * Method set_estado_do_condutor
     * Sample of usage: $dados_condutor->estado_do_condutor = $object;
     * @param $object Instance of EstadoDoCondutor
     */
    public function set_estado_do_condutor(EstadoDoCondutor $object)
    {
        $this->estado_do_condutor = $object;
        $this->id_estado_condutor= $object->id;
    }
    
    /**
     * Method get_estado_do_condutor
     * Sample of usage: $dados_condutor->estado_do_condutor->attribute;
     * @returns EstadoDoCondutor instance
     */
    public function get_estado_do_condutor()
    {
        // loads the associated object
        if (empty($this->estado_do_condutor))
            $this->estado_do_condutor = new EstadoDoCondutor($this->id_estado_condutor);
    
        // returns the associated object
        return $this->estado_do_condutor;
    }
    
     public function set_removido_para(RemovidoPara $object)
    {
        $this->removido_para = $object;
        $this->id_removido_para= $object->id;
    }
    
    /**
     * Method get_estado_do_condutor
     * Sample of usage: $dados_condutor->estado_do_condutor->attribute;
     * @returns EstadoDoCondutor instance
     */
    public function get_removido_para()
    {
        // loads the associated object
        if (empty($this->removido_para))
            $this->removido_para = new RemovidoPara($this->id_removido_para);
    
        // returns the associated object
        return $this->removido_para;
    }
    
     public function set_removido_por(RemovidoPor $object)
    {
        $this->removido_por = $object;
        $this->id_removido_por= $object->id;
    }
    
    /**
     * Method get_estado_do_condutor
     * Sample of usage: $dados_condutor->estado_do_condutor->attribute;
     * @returns EstadoDoCondutor instance
     */
    public function get_removido_por()
    {
        // loads the associated object
        if (empty($this->removido_por))
            $this->removido_por = new RemovidoPor($this->id_removido_por);
    
        // returns the associated object
        return $this->removido_por;
    }
    
     public function set_Procedimentos(Procedimentos $object)
    {
        $this->procedimentos = $object;
        $this->id_procedimentos= $object->id;
    }
    
    /**
     * Method get_estado_do_condutor
     * Sample of usage: $dados_condutor->estado_do_condutor->attribute;
     * @returns EstadoDoCondutor instance
     */
     
    public function get_Procedimentos()
    {
        // loads the associated object
        if (empty($this->procedimentos))
            $this->procedimentos= new Procedimentos($this->id_procedimentos);
    
        // returns the associated object
        return $this->procedimentos;
    }
    
    


}
