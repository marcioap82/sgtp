<?php

/**
 * MultiStepMultiFormView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CadastroDadosCondutor extends TPage
{
    protected $form; // form
    protected $datagrid;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_account');
        $this->form->setFormTitle('Dados do condutor');
        $this->form->setColumnClasses(2, ['col-sm-3', 'col-sm-9']);
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid());
        
        
        //criação de listagem
        $codigo = new TDataGridColumn('id', 'ID', 'center', 10);
        $nome = new TDataGridColumn('nome', 'NOME', 'center', 500);
        $cpf = new TDataGridColumn('cpf', 'CPF', 'center', 100);
        //adiciona as listagem
        $this->datagrid->addColumn($codigo);
        $this->datagrid->addColumn($nome);
        $this->datagrid->addColumn($cpf);
        
        //adicionando ações ao datagrid
        $acao = new TDataGridAction(array($this, 'onDelete'));
        $acao->setLabel('Deletar');
        $acao->setImage('ico_delete.png');
        $acao->setField('nome');
        
        //adicionando ação ao datagrid
        $this->datagrid->addAction($acao);
        
        $this->datagrid->createModel();
         
        
        
        // Dados condutor
        $nome     = new TEntry('nome');
        $idade    = new TEntry('idade');
        $genero   = new TEntry('genero');
        $cpf      = new TEntry('cpf');
        $endereco   = new TEntry('endereco');
        $bairro   = new TEntry('bairro');        
        $situacao_condutor = new TDBRadioGroup('situacao_condutor', 'sgtp', 'SituacaoCondutor', 'id', 'descricao');
        
        
         // adiciona os campos ao formulário        
        $this->form->addFields(['Nome'], [$nome] );
        $this->form->addFields(['Idade'], [$idade] );
        $this->form->addFields(['Gênero'], [$genero] );
        $this->form->addFields(['CPF'], [$cpf] );
        $this->form->addFields(['Endereço'], [$endereco] );
        $this->form->addFields(['Bairro'], [$bairro] );
        
        $cpf->setMaxLength(9);
        $cpf->setMask('999.999.999-99');
        $genero->setCompletion(array('Masculino', 'Feminino'));
        
        $this->form->addContent( [new TFormSeparator('<b>Situação do condutor</b>')] );
        
        $this->form->addFields(['Situação do condutor'], [$situacao_condutor] );
       
        // define valores default
        $situacao_condutor->setValue(1);
        
        //transforma os campos em botões
        $situacao_condutor->setUseButton();
        
        //tamanho dos botões
        $situacao_condutor->setSize(130);
        
        //Separa os campos do formulário
        $this->form->addContent( [new TFormSeparator('<b>Dados habilitação</b>')] );
        
        // create the form fields             
        $situacao_do_habilitado = new TRadioGroup('situacao_do_habilitado');
        
        $numero_habilitacao = new TEntry('numero_habilitacao');        
        $categoria_habilitacao          = new TEntry('categoria_habilitacao');       
        $vencimento         = new TDate('vencimento');        
        $uf_habilitacao     = new TEntry('uf_habilitacao');
        
        
       
        // adiciona os campos ao formulário
        $this->form->addFields(['Condutor habilitado?'], [$situacao_do_habilitado] );
        
        //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        $this->form->addFields(['Número registro (CNH/PPD/PID/LADV/ACC)'], [$numero_habilitacao]);
        $this->form->addFields(['Categoria'], [$categoria_habilitacao] );
        $this->form->addFields(['Vencimento'], [$vencimento] );
        $this->form->addFields(['UF'], [$uf_habilitacao] );
      
        $vencimento->setMask('dd/mm/yyyy');
        $uf_habilitacao->setValue('AP');
        $uf_habilitacao->setSize(190);
      
       $items = ['1'=>'SIM', '2'=>'NÃO', '3'=>'NÃO EXIGIDO ', '4'=>'NÃO INFORMADO'];
       
       // adiciona os itens aos objetos
       $situacao_do_habilitado->addItems($items);
                     
       // define valores default dos componentes
       $situacao_do_habilitado->setValue('1');
       
       //transforma os campos em botões
        $situacao_do_habilitado->setUseButton();
        
       //tamanho dos botões
       $situacao_do_habilitado->setSize(130);
                     
       $situacao_do_habilitado->setChangeAction( new TAction( array($this, 'onChangeRadio')) );
       self::onChangeRadio( array('situacao_do_habilitado'=>1) );
        
        
        //Separa os campos do formulário
        $this->form->addContent( [new TFormSeparator('<b>Dados veículo</b>')] );
        
        // create the form fields
        $placa     = new TEntry('placa');
        $chassi    = new TEntry('chassi');
        $especie   = new TEntry('especie');
        $categoria_veiculo = new TDBRadioGroup('categoria_veiculo', 'sgtp', 'CategoriaDoVeiculo', 'id', 'descricao');
        
        
        
         // adiciona os campos ao formulário        
        $this->form->addFields(['Placa'], [$placa] );
        $this->form->addFields(['Chassi'], [$chassi] );
        $this->form->addFields(['Espécie / Tipo'], [$especie] );
        
        //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        $this->form->addFields(['Categoria'], [$categoria_veiculo] );
        
                
        //transforma os campos em botões
       $categoria_veiculo->setUseButton();
        
        //tamanho dos botões
        $categoria_veiculo->setSize(150);
        
        
        //Separa os campos do formulário
        $this->form->addContent( [new TFormSeparator('<b>Dados sinais de embriaguez</b>')] );
        
        // create the form fields
        $sinais     = new TRadioGroup('sinais');
        $etilometro    = new TRadioGroup('etilometro');//esta como nome
        $numero_teste   = new TEntry('numero_teste');//esta como numero
        
        
         // adiciona os campos ao formulário        
        $this->form->addFields(['Apresenta sinais de embriaguez?'], [$sinais] );
        $this->form->addFields(['Realizou teste de etilômetro?'], [$etilometro] );
        $this->form->addFields(['Número do teste'], [$numero_teste] );
        
      
       $items = ['a'=>'SIM', 'b'=>'NÃO'];
       $nomes = ['a'=>'SIM', 'b'=>'NÃO', 'c'=>'RECUSOU-SE'];
       
       // adiciona os itens aos objetos
        $sinais->addItems($items);
        $etilometro->addItems($nomes);
       
       // define valores default dos componentes
        $sinais->setValue('b');
        $etilometro->setValue('b');
       
       //transforma os campos em botões
       $sinais->setUseButton();
       $sinais->setLayout('horizontal');
       $etilometro->setUseButton();
       $etilometro->setLayout('horizontal');
        
       //tamanho dos botões
       $sinais->setSize(130);
       $etilometro->setSize(130);
        
        
        
        //Separa os campos do formulário
        $this->form->addContent( [new TFormSeparator('<b>Dados do estado do condutor</b>')] );
        
        // create the form fields
        $estado     = new TDBRadioGroup('estado', 'sgtp', 'EstadoDoCondutor', 'id', 'nome');
                       
        // adiciona os campos ao formulário        
        $this->form->addFields(['Estado do condutor'], [$estado] );
       
        // define valores default
        $estado->setValue(1);
        
        //transforma os campos em botões
        $estado->setUseButton();
        
        //tamanho dos botões
        $estado->setSize(130);
        
        
        
        //Separa os campos do formulário
        $this->form->addContent( [new TFormSeparator('<b>Dados do condutor removido</b>')] );
        
        // create the form fields
        $removido_para     = new TDBRadioGroup('removido_para', 'sgtp', 'RemovidoPara', 'id', 'nome');
        
       
         // adiciona os campos ao formulário        
        $this->form->addFields(['Condutor removido para'], [$removido_para] );
        
        // define valores default
        $removido_para->setValue(1);
        
        //transforma os campos em botões
        $removido_para->setUseButton();
        
        //tamanho dos botões
        $removido_para->setSize(130);
        
        //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        // create the form fields
        $removido_por     = new TDBRadioGroup('removido_por', 'sgtp', 'RemovidoPor', 'id', 'nome');
        
       
         // adiciona os campos ao formulário        
        $this->form->addFields(['Condutor removido por'], [$removido_por] );
        
        // define valores default
        $removido_por->setValue(1);
        
        //transforma os campos em botões
        $removido_por->setUseButton();
        
        //tamanho dos botões
        $removido_por->setSize(130);
        
        
        
        //Separa os campos do formulário
        $this->form->addContent( [new TFormSeparator('<b>Dados declaração do condutor</b>')] );
        
        // create the form fields
        $declaracao_do_condutor     = new TText('declaracao_do_condutor');
        $sentido_da_via     = new TDBRadioGroup('sentido_da_via', 'sgtp', 'SentidoDaVia', 'id', 'descricao');
        $mobras_realizadas     = new TDBRadioGroup('mobras_realizadas', 'sgtp', 'MobrasRealizadas', 'id', 'descricao');
        $objetos_na_via     = new TEntry('objetos_na_via');
        
        
         // adiciona os campos ao formulário        
        $this->form->addFields(['Declaração do condutor'], [$declaracao_do_condutor] );
        
        //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        $this->form->addFields(['Trafegava no sentido'], [$sentido_da_via] );
        
        // define valores default
        $sentido_da_via->setValue(1);
        
        //transforma os campos em botões
        $sentido_da_via->setUseButton();
        
        //tamanho dos botões
        $sentido_da_via->setSize(150);
        
         //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        $this->form->addFields(['Realizava manobras'], [$mobras_realizadas] );
        
        // define valores default
        $mobras_realizadas->setValue(1);
        
        //transforma os campos em botões
        $mobras_realizadas->setUseButton();
        
        //tamanho dos botões
        $mobras_realizadas->setSize(180);
        
         //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        
        $this->form->addFields(['Algum objeto atrapalhou sua trafegabilidade na via?'], [$objetos_na_via] );
        
        
        
        
        
        
        //Separa os campos do formulário
        $this->form->addContent( [new TFormSeparator('<b>Dados dos procedimentos adotados pelo policial</b>')] );
        
        // create the form fields

        $lugar      = new TEntry('lugar');
        $artigo     = new TEntry('artigo');
        $numero_bo    = new TEntry('numero_bo');
        $veiculo    = new TRadioGroup('veiculo');
        $veiculo_removido = new TDBRadioGroup('removido', 'sgtp', 'VeiculoRemovido', 'id', 'descricao');
        $veiculo_apresentado = new TDBRadioGroup('apresentado', 'sgtp', 'VeiculoApresentado', 'id', 'descricao');
        $veiculo_entregue_nome = new TEntry('nome_responsavel');
        $veiculo_entregue_tipo_documento = new TEntry('tipo_documento');
        $veiculo_entregue_numero = new TEntry('numero_documento');
        $veiculo_entregue_telefone = new TEntry('numero_telefone');
        
        
        $veiculo->setChangeAction(new TAction(array($this, 'onChangeType')));
        $combo_items = array();
        $combo_items['1'] ='VEÍCULO REMOVIDO';
        $combo_items['2'] ='VEÍCULO APRESENTADO';
        $combo_items['3'] ='VEÍCULO ENTREGUE';
        $veiculo->addItems($combo_items);
       
        
        // default value
        $veiculo->setValue(1);
                
        //transforma os campos em botões
        $veiculo->setUseButton();
        
        //tamanho dos botões
        $veiculo->setSize(180);
        
        // fire change event
        $t = $veiculo->getValue();
        self::onChangeType($t);
        
        // adiciona os campos ao formulário        
       
        $this->form->addFields(['Número do BO'], [$lugar] );
        $this->form->addFields(['Condutor autuado nos artigos'], [$artigo] );
        $this->form->addFields(['Número dos autos'], [$numero_bo] );
        $this->form->addFields(['Procedimento com veículo'], [$veiculo] );
        
             //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        
        $this->form->addFields(['Veículo removido'], [$veiculo_removido] );
        $this->form->addFields(['Veículo apresentado'], [$veiculo_apresentado] );
        $this->form->addFields(['Veículo entregue ao respondesável'], [$veiculo_entregue_nome] );
        $this->form->addFields(['Tipo de documento'], [$veiculo_entregue_tipo_documento] );
        $this->form->addFields(['Número do documento'], [$veiculo_entregue_numero] );
        $this->form->addFields(['Telefone'], [$veiculo_entregue_telefone] );
        
        
        //transforma os campos em botões
        $veiculo_removido->setUseButton();
        $veiculo_apresentado->setUseButton();
        
        //tamanho dos botões
        $veiculo_removido->setSize(180); 
        $veiculo_apresentado->setSize(180);                               
                                        
      
      /**
       $veiculos = ['a'=>'VEÍCULO REMOVIDO', 'b'=>'VEÍCULO APRESENTADO ', 'c'=>'VEÍCULO ENTREGUE'];
       
       // adiciona os itens aos objetos
       $veiculo->addItems($veiculos);
       
       // define valores default dos componentes
       $veiculo->setValue('a');
       
       //transforma os campos em botões
        $veiculo->setUseButton();
        $veiculo->setLayout('horizontal');
        
       //tamanho dos botões
       $veiculo->setSize(170);
       **/


        // validations
       // $email->addValidation('Email', new TRequiredValidator);
        //$email->addValidation('Email', new TEmailValidator);
        //$password->addValidation('Password', new TRequiredValidator);
        //$confirm->addValidation('Confirm password', new TRequiredValidator);

        // add a form action        
        $this->form->addAction('Voltar', new TAction(array($this, 'onBackForm')), 'fa:chevron-circle-left orange');
        $this->form->addAction('Proximo', new TAction(array($this, 'onNextForm')), 'fa:chevron-circle-right green');
        $this->form->addAction('Adicinar Condutor', new TAction(array($this, 'onSalvarCondutor')), 'fa:fas fa-plus blue');
       //esconde todos
         TQuickForm::hideField('form_account', 'removido');
         TQuickForm::hideField('form_account', 'apresentado');
         TQuickForm::hideField('form_account', 'nome_responsavel');
         TQuickForm::hideField('form_account', 'tipo_documento');
         TQuickForm::hideField('form_account', 'numero_documento');
         TQuickForm::hideField('form_account', 'numero_telefone');
        
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);
        
        // add the form to the page
        $vbox->add($this->datagrid);
        parent::add($vbox);
    }
    
    /**
     * Load form from session
     */
    public function onLoadFromSession()
    {
        $data = TSession::getValue('form_data_condutor');
        $this->form->setData($data);
        $boat = TSession::getValue('form_data_boat');
        print_r($boat->numero);
        
    }
    
    /**
     * onNextForm
     */
    public function onNextForm()
    {
        try
        {
            $this->form->validate();
            $data = $this->form->getData();
            
            
            // store data in the session
            TSession::setValue('form_data_condutor', $data);
            
            
            // Carregar outra página
           AdiantiCoreApplication::loadPage('VitimaForm', 'onLoadFromForm1', (array) $data);
            print_r(TSession::getValue('form_data_condutor'));
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
    public function onBackForm()
    {
        // volta para o formulário anterior
       AdiantiCoreApplication::loadPage('CadastroPericia','onLoadFromSession');
    }
    
   public function onSalvarCondutor()
    {
       
        try{
           $boat = TSession::getValue('form_data_boat');
           TTransaction::open('sgtp');
           $dados = $this->form->getData('Dadoscondutortemp');     
           $dados->id_boat=$boat->id;
           $veiculo = new Veiculo;
           $veiculo->placa = $dados->placa;
           $veiculo->chassi = $dados->chassi;
           $veiculo->especie = $dados->especie;
           $CategoriaDoVeiculo = new CategoriaDoVeiculo($dados->categoria_veiculo);
           $veiculo->set_categoria_do_veiculo($CategoriaDoVeiculo);
           $dados->store();
           
           $veiculo->id_condutor=$dados->id;
           $veiculo->id_boat=$boat->id;
           $veiculo->store();           
           $this->form->setData($dados);
           //$dados->boat_id = $boat->numero;
           
          
           new TMessage('info', 'dados armazenados com sucesso');
           TTransaction::close();
            $this->onReload();
           
        
        }catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
       
    }

    public static function onChangeRadio($param)
        {
          if ($param['situacao_do_habilitado']==1)
          {
              TEntry::enableField('form_account', 'numero_habilitacao');
              TEntry::enableField('form_account', 'categoria');
              TDate::enableField('form_account', 'vencimento');
              TEntry::enableField('form_account', 'uf_habilitacao');
              
          } else
          {
              TEntry::disableField('form_account', 'numero_habilitacao');
              TEntry::disableField('form_account', 'categoria');
              TDate::disableField('form_account', 'vencimento');
              TEntry::disableField('form_account', 'uf_habilitacao');
          }
            
                
        }
        
   public static function onChangeType($param)
    {  
       
        if ($param['veiculo'] == 1)
        {
       
           TQuickForm::showField('form_account', 'removido');
           TQuickForm::hideField('form_account', 'apresentado');
           TQuickForm::hideField('form_account', 'nome_responsavel');
           TQuickForm::hideField('form_account', 'tipo_documento');
           TQuickForm::hideField('form_account', 'numero_documento');
           TQuickForm::hideField('form_account', 'numero_telefone');
          
        }
       else if($param['veiculo']==2){
           TQuickForm::hideField('form_account', 'removido');
           TQuickForm::showField('form_account', 'apresentado');
           TQuickForm::hideField('form_account', 'nome_responsavel');
           TQuickForm::hideField('form_account', 'tipo_documento');
           TQuickForm::hideField('form_account', 'numero_documento');
           TQuickForm::hideField('form_account', 'numero_telefone');
         
       }
        else if($param['veiculo']==3){
         TQuickForm::hideField('form_account', 'removido');
         TQuickForm::hideField('form_account', 'apresentado');
         TQuickForm::hideField('form_account', 'nome_responsavel');
         TQuickForm::showField('form_account', 'tipo_documento');
         TQuickForm::showField('form_account', 'numero_documento');
         TQuickForm::showField('form_account', 'numero_telefone');
          
         
       }
    }
    public function onReload($param = NULL){
       $boat = TSession::getValue('form_data_boat');
        $order = $param['order'];
        //inicia o banco de dados
        TTransaction::open('sgtp');
        $repositorio = new TRepository('Dadoscondutortemp');
        //criar um criterio de ordenação
        $criterio = new TCriteria;
         $fitro = new TFilter('id_boat', '=',$boat->id);
         $criterio->add($fitro);
        $criterio->setProperty('order', $order);
        $condutores = $repositorio->load($criterio);
      
                    $this->datagrid->clear();
            if($condutores)
             {

               foreach($condutores as $condutor)
               {
              
                 $this->datagrid->addItem($condutor);
               }
             }
         //finalioza a transação
         TTransaction::close();
         $this->loaded = true;
    }
        public function show(){
            if(!$this->loaded){
              $this->onReload();
            }
               parent::show();
        }
        
    public function onDelete($param){
    
    
    }
 

}











