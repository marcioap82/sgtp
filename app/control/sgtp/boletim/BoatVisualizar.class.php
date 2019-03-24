<?php
/**
 * WelcomeView
 *
 * @version    1.0
 * @package    control
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class BoatVisualizar extends TPage
{
    /**
     * Class constructor
     * Creates the page
     */
     private $from;
     private $compareceu;
    function __construct()
    {
        parent::__construct();
        //pega os objetos da sessão
        $this->form = new TForm;
        $boat = TSession::getValue('form_data_boat');
        $endereco = TSession::getValue('form_data_endereco');
        $acidente = TSession::getValue('form_data_acidente');
        $Pericia=TSession::getValue('form_data_pericia'); 
        $vitima = TSession::getValue('form_data_vitima'); 
        $observacao = TSession::getValue('form_data_observacao');
        $condutor = TSession::getValue('form_data_condutor');
        $logado = TSession::getValue('username');
        $graduacao = TSession::getValue('graduacao');
        $id = TSession::getValue('userid');
       // print_r($graduacao);
        
        $hora  = date('h:i:s');
        
         //abre conexao com o banco
         TTransaction::open('sgtp');
         $classificacao = new Classificacao($acidente->classificacao_id);
         
         //pegar os envolvidos no acidente
         $envolvidos = $acidente->envolvidos_id;
         $tipo_acidentes = $acidente->tipo_de_acidente_id;
         $tipo_pavimentos = $acidente->tipo_de_pavimento_id;
         $condicao_da_vias = $acidente->codicao_da_via_id;
         $condicao_do_tempos = $acidente->codicao_do_tempo_id;
         $controle_trafego = $acidente->controle_do_trafego_id;
         
         ///cria array para armazenamento dos dados do formlario
         $arrayEnvolvidos = array();
         $arrayTipoAcidentes = array();
         $arrayTipoPavimentos = array();
         $arrayCondicaoDaVias = array();
         $arraycondicao_do_tempos = array();
         $arrayControleDeTrafego = array();
         $save  = TButton::create('save',  array($this, 'onSave'), 'SALVAR', 'fa:save blue');
         $pdf = TButton::create('PDF',  array($this, 'onPdf'), 'PDF', 'fa:file-pdf-o green');
         
         //percorre os obejtos envolvidos no acidente
         foreach($envolvidos as $envolvido){
              $obj = new Envolvidos($envolvido);
              $arrayEnvolvidos[] = $obj->nome;
            }
            //transforma em string com quebra de linha          
            $stringEnvolvidos = implode('<br>', $arrayEnvolvidos);
        
        //percorre o tipo acidente
        foreach($tipo_acidentes as $tipo){
              $obj = new TipoDeAcidente($tipo);
              $arrayTipoAcidentes[] = $obj->tipo;
            }
            //transforma em string com quebra de linha          
            $stringTipo_acidentes = implode('<br>', $arrayTipoAcidentes);
            
             //percorre o tipo de pavimento
        foreach($tipo_pavimentos as $tipo_pavimento){
              $obj = new TipoDePavimento($tipo_pavimento);
              $arrayTipoPavimentos[] = $obj->descricao;
            }
            //transforma em string com quebra de linha          
            $stringTipo_pavimentos = implode('<br>', $arrayTipoPavimentos);
            
            //percorre codição da via
        foreach($condicao_da_vias as  $condicao_da_via){
              $obj = new CodicaoDaVia($condicao_da_via);
              $arrayCondicaoDaVias[] = $obj->descricao;
            }
            //transforma em string com quebra de linha          
            $stringCondicaoVia = implode('<br>', $arrayCondicaoDaVias);
            
              //pega codição do tempo    
          
              $obj = new CodicaoDoTempo($acidente->codicao_do_tempo_id);
              $arraycondicao_do_tempos[] = $obj->descricao;
            
            //transforma em string com quebra de linha          
            $stringCondicaoTempo = implode('<br>', $arraycondicao_do_tempos);
            
            //percorre controle de trafego
        foreach($controle_trafego as  $controle){
          
              $obj = new ControleDoTrafego($controle);
              $arrayControleDeTrafego[] = $obj->descricao;
            }
            //transforma em string com quebra de linha          
            $stringControleTrafego= implode('<br>', $arrayControleDeTrafego);
            if(!empty($Pericia->nome)){
             $this->compareceu = "Sim";
            }else{
               $this->compareceu = "Não";
            }
            
        $html1 = new THtmlRenderer('app/resources/boat.html');
        $replaces_valor = array('numeroboat'=>$boat->numero, 
        'endereco'=>$endereco->endereco,'municipio'=>$endereco->municipio,
        'estado'=>$endereco->estado, 'bairro'=>$endereco->bairro, 'complemento'=>$endereco->complemento, 
        'classificacao'=>trim($classificacao->tipo),'envolvidos'=>trim($stringEnvolvidos),
        'tipoAcidente'=>trim($stringTipo_acidentes),'tipoPavimento'=>trim($stringTipo_pavimentos),
         'condicaoVia'=>trim($stringCondicaoVia), 'condicaotempo'=>trim($stringCondicaoTempo),'controle'=>trim($stringControleTrafego),
         'dataPericia'=>$Pericia->data,'horarioPericia'=>$Pericia->horario,'nomePericia'=>$Pericia->nome,
         'horaChegada'=>$boat->hora, 'dataBoat'=>$boat->datadecadastro, 'numero_viatura'=>$boat->numero_viatura,
         'observacao'=>$observacao->observacao,'hora_final'=>$hora, 'compareceu'=>$this->compareceu, 'botao'=>$save, 'botao2'=>$pdf,
         'encarregado'=>$logado, 'graduacao'=>$graduacao);
         
         //pegar os dados do condutor atraveis de um filtro do boat_id
         $criterio = new TCriteria();
         
         $filtro = new TFilter('id_boat', '=', $boat->id);
         $criterio->add($filtro);
         $condutor = new TRepository('DadosCondutor');
         $condutores = $condutor->load($criterio);
         
         $Vetorcondutor = array();
       //verifica se retornou algo
            if($condutores){
                 
               //percorre os dados do condutor e adiciona ao layaut
                 foreach($condutores as $cond){
                 // $situacao = new SituacaoCondutor($cond->id_situacao_conduto);
                 
                  $situacaoV = $cond->situacao_condutor = 1 ? "Sim": "Não";
                  $sinais = $cond->dados_do_etilometro->sinais = 1 ? "Sim": "Não";
                  $apresentado = $cond->Procedimentos->condutor_apresentado = 1 ? "Sim": "Não";
               //verifica se realizou o teste do etilometro
                     if(!empty($cond->dados_do_etilometro->numero)){
                       $teste = "Sim";
                     }else {
                       $teste = "Não";
                     }
                      //verifica se foi autuado
                     if(!empty($cond->Procedimentos->numero_autos)){
                       $auto = "Sim";
                     }else {
                       $auto = "Não";
                     }
                     
                  $Vetorcondutor[] = array('nomecondutor'=>$cond->nome,'situacaocondutor'=>$cond->situcao_condutor->descricao,
                  'idade'=>$cond->idade, 'genero'=>$cond->genero, 'cpf'=>$cond->cpf, 'bairro'=>$cond->endereco_condutor->bairro,
                  'endereco'=>$cond->endereco_condutor->endereco,'situacaohabilitado'=> $situacaoV, 'numerohabilitacao'=>$cond->numero_habilitacao,
                  'categoria'=>$cond->categoria_habilitacao,'vencimento'=>$cond->vencimento,'uf'=>$cond->uf_habilitacao,
                  'placa'=>$cond->veiculo->placa, 'chassi'=>$cond->veiculo->chassi, 'especie'=>$cond->veiculo->especie, 'categoriaveiculo'=>$cond->veiculo->categoria_do_veiculo->descricao,
                  'declaracao_condutor'=>$cond->declaracao_do_condutor, 'sentido'=>$cond->sentidoDaVia->descricao, 'manobras'=>$cond->mobras_realizadas,
                  'objeto'=>$cond->objetos_na_via, 'apresentado'=>$cond->lugar,'artigo'=>$cond->artigo,'veiculo_entregue'=>$cond->nome_responsavel,
                  'tipo_documeto_responsavel'=>$cond->tipo_documento, 'documento_responsavel'=>$cond->numero_documento, 'telefone_responsavel'=>$cond->numero_telefone,
                  'embriaguez'=>$sinais, 'etilometro'=>$teste, 'estado_condutor'=>$cond->estado_do_condutor->nome, 'removido_para'=>$cond->removido_para->nome,
                  'removido_por'=>$cond->removido_por->nome, 
                  'declaracao_condutor'=>$cond->declaracao_do_condutor->descricao,
                  'manobras'=>$cond->manobras_realizadas->descricao, 'objeto'=>$cond->objetos_na_via->descriacao, 
                  'condutor_apresentado'=>$apresentado,'local_apresentacao'=>$cond->Procedimentos->lugar, 'numero_bo'=>$cond->Procedimentos->numero_bo, 'autuado'=>$auto,'artigo'=>$cond->Procedimentos->artigo_legislacao,
                  'autos'=>$cond->Procedimentos->numero_autos,'veiculo_removido'=>$cond->veiculo->removido_para->nome,
                   'veiculo_apresentado'=>$cond->veiculo->veiculo_apresentado->descricao, 'veiculo_entregue'=>$cond->veiculo->veiculo_entregue->nome,
                   'tipo_documeto_responsavel'=>$cond->veiculo->veiculo_entregue->tipo_documento,
                   'documento_responsavel'=>$cond->veiculo->veiculo_entregue->numero,'telefone_responsavel'=>$cond->veiculo->veiculo_entregue->telefone,
                   'aparelhoetilometro'=>$cond->AparelhoEtilomentro->numero_serie);
                 
             
             }
         
               
              
        }
          //pegar os dados do condutor atraveis de um filtro do boat_id
         $criterio = new TCriteria();
         $filtro = new TFilter('id_boat', '=', $boat->id);
         $criterio->add($filtro);
         $Vitima = new TRepository('Vitima');
         $Vitimas = $Vitima->load($criterio);
         if(!empty($Vitimas)){
         $VetorVitima= array();
             foreach($Vitimas as $vitima){
              
             
              $VetorVitima[] = array('nomeVitima'=>$vitima->nome, 'idade_vitima'=>$vitima->idade,
              'genero_vitima'=>$vitima->genero, 'estado_vitima'=>$vitima->estado_da_vitma->nome,
              'condicao_vitima'=>$vitima->codicao_da_vitima->descricao, 
              'vitima_removido_para'=>$vitima->removido_para->nome,'vitima_removido_por'=>$vitima->removido_por->nome);
             
            
         }
          $html1->enableSection('vitima', $VetorVitima, TRUE);
         }
        // $condutor = array();
      //  $html1->enableSection('condutor', $Vetorcondutor,TRUE);
        // replace the main section variables
      
        $html1->enableSection('main', $replaces_valor);
        $html1->enableSection('condutor', $Vetorcondutor, TRUE);
       
      
        $frame = new TFrame;
        $this->form->add($frame);       
        $frame->add($html1);
        $this->form->setFields(array($save, $pdf));
        
        // add the template to the page
        parent::add($this->form);
    }
    public function onSave(){
    
        
         $boat = TSession::getValue('form_data_boat');
         $enderecos = TSession::getValue('form_data_endereco');
         $acidente = TSession::getValue('form_data_acidente');
         $pericia=TSession::getValue('form_data_pericia'); 
         $vitima = TSession::getValue('form_data_vitima'); 
         $observacao = TSession::getValue('form_data_observacao');
         $condutor = TSession::getValue('form_data_condutor');
         $logado = TSession::getValue('username');
         $graduacao = TSession::getValue('graduacao');
         $id = TSession::getValue('userid');
        
            if($boat)
            {
              try{
               TTransaction::open('sgtp');
               $boat = new Boat($boat->id);
               $endereco = new EnderecoOcorrencia;
               $endereco->endereco = $enderecos->endereco;
               $endereco->bairro = $enderecos->bairro;
               $endereco->municipio = $enderecos->municipio;
               $endereco->estado = $enderecos->estado;
               $endereco->complemento = $enderecos->complemento;
                  //CADASTRO DE CLASSIFICAÇÃO
               $boat->id_classificacao = $acidente->classificacao_id;
               $boat->id_usuario = $id;
               //cadastro condicao do tempo
               $boat->id_condicao_tempo = $acidente->codicao_do_tempo_id;
               $endereco->store();
               $boat->set_endereco_ocorrencia($endereco);
               //CADASTRO DE PERICIA
               $periciaObj = new Pericia;
               $periciaObj->datapericia = TDate::date2us($pericia->data);
               $periciaObj->horario = $pericia->horario;
               $periciaObj->nome = $pericia->nome;
               $periciaObj->store();
               $boat->set_pericia($periciaObj);
               //adiciona os envolvidos na ocorrencia
               $envolvidos = $acidente->envolvidos_id;
               foreach($envolvidos as $env){
                  $ObjEnvolvidos = new Envolvidos($env);
                  $boat->addEnvolvidos($ObjEnvolvidos);
               }
               //adiciona tipo acidente 
                $tipos = $acidente->tipo_de_acidente_id;
               foreach($tipos as $tipo){
                  $ObjTipo = new TipoDeAcidente($tipo);
                  $boat->addTipoAcidente($ObjTipo);
               }
               //adiciona tipo Pavimento
                $pavimentos = $acidente->tipo_de_pavimento_id;
               foreach($pavimentos as $pavimento){
                  $ObjPavimento = new TipoDePavimento($pavimento);
                  $boat->addTipoPavimento($ObjPavimento);
               }
               //cadastro codicao da via
               $condicaoVias = $acidente->codicao_da_via_id;
               foreach($condicaoVias as $via){
                  $ObjCondVia = new CodicaoDaVia($via);
                  $boat->addCondicaoDaVia($ObjCondVia);
               }
               $boat->id_condicao_tempo = $acidente->codicao_do_tempo_id;
                 //cadastro controle de tarafego
               $controles = $acidente->controle_do_trafego_id;
               foreach($controles as $controle){
                  $ObjControle = new ControleDoTrafego($controle);
                  $boat->addControleDeTrafego($ObjControle);
               }
               //cadastro de observacao
               $Objobservacao = new Observacao;
               $Objobservacao->descricao = $observacao->observacao;
               $Objobservacao->store();               
               $boat->set_observacao($Objobservacao);
               //hora final 
               $boat->hora_final = date('h:i:s');           
             
               $boat->store();           
             
               TTransaction::close();    
               new TMessage('info', 'dados armazenados com sucesso');
               
              
              } catch (Exception $e)
                {
                    new TMessage('error', $e->getMessage());
                }
            }
    
    }
    public function onPdf(){
      try
        {
           $boat = TSession::getValue('form_data_boat');
          
            $this->form->validate();
            
            $designer = new TPDFDesigner;
            $designer->fromXml('app/reports/boat.pdf.xml');
            $designer->replace('{name}', $data->name );
            $designer->generate();
            
            $designer->gotoAnchorXY('anchor1');
            $designer->SetFontColorRGB('#FF0000');
            $designer->SetFont('Arial', 'B', 18);
            $designer->Write(20, '');
            
            $file = 'app/output/pdf_boat.pdf';            
            if (!file_exists($file) OR is_writable($file))
            {
                $designer->save($file);
                // parent::openFile($file);
                
                $window = TWindow::create(_t('Designed PDF shapes'), 0.9, 0.9);
                $object = new TElement('object');
                $object->data  = $file;
                $object->type  = 'application/pdf';
                $object->style = "width: 100%; height:calc(100% - 10px)";
                $window->add($object);
                $window->show();
            }
            else
            {
                throw new Exception(_t('Permission denied') . ': ' . $file);
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage());
        }
    
    }
}
