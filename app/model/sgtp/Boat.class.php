<?php
/**
 * Boat Active Record
 * @author  <your-name-here>
 */
class Boat extends TRecord
{
    const TABLENAME = 'boat';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    private $procedimentos;
    private $tipo_de_pavimento;
    private $classificacao;
    private $endereco_ocorrencia;
    private $controle_do_trafego;
    private $tipo_de_acidente;
    private $codicao_do_tempo;
    private $codicao_da_via;
    private $pericia;
    private $situacao_condutor;
    private $vitimas;
    private $envolvidos;
    private $dados_condutors;
    private $numero_viatura;
    private $observacao;
  

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('numero');
       
        parent::addAttribute('datadecadastro');
      
        parent::addAttribute('hora');
        parent::addAttribute('numero_viatura');
        parent::addAttribute('endereco_ocorrencia_id');              
        parent::addAttribute('pericia_id');      
        parent::addAttribute('id_unidade');
        parent::addAttribute('id_classificacao');    
        parent::addAttribute('id_condicao_tempo');
        parent::addAttribute('id_observacao');
        parent::addAttribute('hora_final');
     
        
       
    }

    
    
    public function set_endereco_ocorrencia(EnderecoOcorrencia $object)
    {
        $this->endereco_ocorrencia = $object;
        $this->endereco_ocorrencia_id = $object->id;
    }
    
    /**
     * Method get_endereco_ocorrencia
     * Sample of usage: $boat->endereco_ocorrencia->attribute;
     * @returns EnderecoOcorrencia instance
     */
    public function get_endereco_ocorrencia()
    {
        // loads the associated object
        if (empty($this->endereco_ocorrencia))
            $this->endereco_ocorrencia = new EnderecoOcorrencia($this->endereco_ocorrencia_id);
    
        // returns the associated object
        return $this->endereco_ocorrencia;
    }
    
    public function set_classificacao(Classificacao $object)
    {
        $this->classificacao = $object;
        $this->id_classificacao = $object->id;
    }
    
    /**
     * Method get_endereco_ocorrencia
     * Sample of usage: $boat->endereco_ocorrencia->attribute;
     * @returns EnderecoOcorrencia instance
     */
    public function get_classificacao()
      {
        // loads the associated object
        if (empty($this->classificacao))
            $this->classificacao = new Classificacao($this->id_classificacao);
    
        // returns the associated object
        return $this->classificacao;
      }
    
    public function set_pericia(Pericia $object)
    {
        $this->pericia = $object;
        $this->pericia_id = $object->id;
    }
    
    
     public function get_observacao()
      {
        // loads the associated object
            if (empty($this->observacao))
            {
                $this->observacao = new Observacao($this->id_observacao);
        
                // returns the associated object
                return $this->observacao;
            }
      }
    
    
    
    public function set_observacao(Observacao $object)
    {
        $this->observacao = $object;
        $this->id_observacao = $object->id;
    }
    /**
     * Method get_pericia
     * Sample of usage: $boat->pericia->attribute;
     * @returns Pericia instance
     */
    public function get_pericia()
    {
        // loads the associated object
        if (empty($this->pericia))
            $this->pericia = new Pericia($this->pericia_id);
    
        // returns the associated object
        return $this->pericia;
    }
    
     public function set_CodicaoTempo(CodicaoDoTempo $object)
    {
        $this->codicao_do_tempo = $object;
        $this->id_condicao_tempo = $object->id;
    }
    
    /**
     * Method get_pericia
     * Sample of usage: $boat->pericia->attribute;
     * @returns Pericia instance
     */
    public function get_CondicaoTempo()
    {
        // loads the associated object
        if (empty($this->codicao_do_tempo))
            $this->codicao_do_tempo = new Pericia($this->id_condicao_tempo);
    
        // returns the associated object
        return $this->codicao_do_tempo;
    }
   
       public function getEnvolvidos()
        {
            return $this->envolvidos;
        }
 //adiciona controle do trafego ao boat
    
    public function addEnvolvidos(Envolvidos $object)
        {
            $this->envolvidos[] = $object;
        }
     
    
    
   //retorna controle do trafego do boat
     public function getControleDoTrafego()
    {
        return $this->controle_do_trafego;
    }
 //adiciona controle do trafego ao boat
    
    public function addControleDeTrafego(ControleDoTrafego $object)
    {
        $this->controle_do_trafego[] = $object;
    }
    
     public function getTipoAcidente()
    {
        return $this->tipo_de_acidente;
    }
 //adiciona controle do trafego ao boat
    
    public function addTipoAcidente(TipoDeAcidente $object)
    {
        $this->tipo_de_acidente[] = $object;
    }
    
    
      public function geTipoPavimento()
    {
        return $this->tipo_de_pavimento;
    }
 //adiciona controle do trafego ao boat
    
    public function addTipoPavimento(TipoDePavimento $object)
    {
        $this->tipo_de_pavimento[] = $object;
    }
    
       public function geCondicaoDaVia()
    {
        return $this->codicao_da_via;
    }
 //adiciona controle do trafego ao boat
    
    public function addCondicaoDaVia(CodicaoDaVia $object)
    {
        $this->codicao_da_via[] = $object;
    }
     public function store()
    {
        // store the object itself
        parent::store();
    
        parent::saveAggregate('BoatControleDotrafego', 'id_boat', 'id_condicao_trafego', $this->id, $this->controle_do_trafego);
        parent::saveAggregate('BoatEnvolvidos','boat_id', 'envolvidos_id', $this->id, $this->envolvidos);
        parent::saveAggregate('BoatTipoAcidente', 'id_boat', 'id_tipo_acidente', $this->id, $this->tipo_de_acidente);
        parent::saveAggregate('BoatTipoPavimento', 'id_boat', 'id_tipo_pavimento', $this->id, $this->tipo_de_pavimento);
        parent::saveAggregate('BoatCondicaoVia', 'id_boat', 'id_tipo_codicao_da_via', $this->id, $this->codicao_da_via);
    }
    
    
    

}
