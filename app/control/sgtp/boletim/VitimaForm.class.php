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
class VitimaForm extends TPage
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
        $this->form->setFormTitle('Dados da Vítima');
        $this->form->setColumnClasses(2, ['col-sm-3', 'col-sm-9']);
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid());
        
        //listagem
        
        //criação de listagem
        $codigo = new TDataGridColumn('id', 'ID', 'center', 10);
        $nome = new TDataGridColumn('nome', 'NOME', 'center', 400);
        $veiculo = new TDataGridColumn('veiculo->placa', 'VEICULO', 'center', 100);
        $chassi = new TDataGridColumn('veiculo->chassi', 'CHASSI', 'center', 100);
        //adiciona as listagem
        $this->datagrid->addColumn($codigo);
        $this->datagrid->addColumn($nome);
        $this->datagrid->addColumn($veiculo);
         $this->datagrid->addColumn($chassi);
        
        //adicionando ações ao datagrid
        $acao1 = new TDataGridAction(array($this, 'onDelete'));
        $acao1->setLabel('Deletar');
        $acao1->setImage('ico_delete.png');
        $acao1->setField('id');
        $acao2= new TDataGridAction(array($this, 'onEditar'));
        $acao2->setLabel('Editar');
        $acao2->setImage('ico_edit.png');
        $acao2->setField('id');
        
        //adicionando ação ao datagrid
        $this->datagrid->addAction($acao1);
        $this->datagrid->addAction($acao2);
        
        $this->datagrid->createModel();
        
        // Dados Vítima
        $boat = TSession::getValue('form_data_boat');
        $boatid =  $boat->id;
        $id = new TEntry('id');
        $id->setEditable(FALSE);
        $nome = new TEntry('nome');
        $idade = new TEntry('idade');
        $genero = new TEntry('genero');
        $telefone = new TEntry('telefone');
        $filtro = new TFilter('id_boat', '=', $boatid);
        $criterio= new TCriteria();
        $criterio->add($filtro);
        $veiculo = new TDBCombo('id_veiculo', 'sgtp', 'Veiculo', 'id', 'placa','id', $criterio);
        $removido_para_id = new TDBRadioGroup('removido_para_id', 'sgtp', 'RemovidoPara', 'id', 'nome');
        $removido_por_id = new TDBRadioGroup('removido_por_id', 'sgtp', 'RemovidoPor', 'id', 'nome');
        $estado_da_vitma_id = new TDBRadioGroup('estado_da_vitma_id', 'sgtp', 'EstadoDaVitma', 'id', 'nome');
        $codicao_da_vitima_id = new TDBRadioGroup('codicao_da_vitima_id', 'sgtp', 'CodicaoDaVitima', 'id', 'descricao');
       
        $idade->setMaxLength(2);
        $idade->setMask('99');
        $genero->setCompletion(array('MASCULINO', 'FEMININO'));
        $telefone->setMaxLength(11);
        $telefone->setMask('(99)99999-9999');
        
        
        
         // adiciona os campos ao formulário 
          $this->form->addFields( [ new TLabel('Id') ], [ $id ] );       
        $this->form->addFields( [ new TLabel('Nome') ], [ $nome ] );
        $this->form->addFields( [ new TLabel('Idade') ], [ $idade ] );
        $this->form->addFields( [ new TLabel('Genero') ], [ $genero ] );       
        $this->form->addFields( [ new TLabel('Telefone') ], [ $telefone ] );
        $this->form->addFields( [ new TLabel('ligada ao Veiculo') ], [ $veiculo ] );
        
        
        
          //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        
        $this->form->addFields( [ new TLabel('Removido para') ], [ $removido_para_id ] );
        
            // define valores default
        //$removido_para_id->setValue(1);
        
        //transforma os campos em botões
        $removido_para_id->setUseButton();
        
        //tamanho dos botões
        $removido_para_id->setSize(130);
        
        
          //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        
        $this->form->addFields( [ new TLabel('Removido por') ], [ $removido_por_id ] );
        
         // define valores default
        //$removido_por_id->setValue(1);
        
        //transforma os campos em botões
        $removido_por_id->setUseButton();
        
        //tamanho dos botões
        $removido_por_id->setSize(130);
        
        
          //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        
        $this->form->addFields( [ new TLabel('Estado da vítma') ], [ $estado_da_vitma_id ] );
        
         // define valores default
        //$estado_da_vitma_id ->setValue(1);
        
        //transforma os campos em botões
        $estado_da_vitma_id ->setUseButton();
        
        //tamanho dos botões
        $estado_da_vitma_id ->setSize(130);
        
          //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        
        $this->form->addFields( [ new TLabel('Condição da vítma') ], [ $codicao_da_vitima_id ] );
        
       
        
        //transforma os campos em botões
        $codicao_da_vitima_id ->setUseButton();
        
        //tamanho dos botões
        $codicao_da_vitima_id ->setSize(130);
        
        
       
        
        
        


        // validations
       // $email->addValidation('Email', new TRequiredValidator);
        //$email->addValidation('Email', new TEmailValidator);
        //$password->addValidation('Password', new TRequiredValidator);
        //$confirm->addValidation('Confirm password', new TRequiredValidator);

        // add a form action        
        $this->form->addAction('Voltar', new TAction(array($this, 'onBackForm')), 'fa:chevron-circle-left orange');
        $this->form->addAction('Próximo', new TAction(array($this, 'onNextForm')), 'fa:chevron-circle-right green');
        $this->form->addAction('Adicinar Vítima', new TAction(array($this, 'onSalvarCondutor')), 'fa:fas fa-plus blue');
       
        
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);
         $vbox->add($this->datagrid);
        // add the form to the page
        parent::add($vbox);
    }
    
    /**
     * Load form from session
     */
    public function onLoadFromSession()
    {
        $data = TSession::getValue('form_data_vitima');
        $this->form->setData($data);
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
            TSession::setValue('form_data_vitima', $data);
            
            
            // Carregar outra página
           AdiantiCoreApplication::loadPage('CadastroObservacao', 'onLoadFromSession', (array) $data);
            
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
    public function onBackForm()
    {
        // volta para o formulário anterior
        AdiantiCoreApplication::loadPage('CadastroDadosCondutor','onLoadFromSession');
    }
    
   public function onSalvarCondutor()
    {
      try{
       $boat = TSession::getValue('form_data_boat');
       TTransaction::open('sgtp');
        $dados = $this->form->getData();
        //cria o objeto vitmima
        
        $vitima = new Vitima($dados->id);
        $vitima->nome = $dados->nome;
        $vitima->idade = $dados->idade;
        $vitima->genero = $dados->genero;
        $vitima->telefone = $dados->telefone;
        $vitima->removido_por_id = $dados->removido_por_id;
        $vitima->removido_para_id = $dados->removido_para_id;
        $vitima->estado_da_vitma_id = $dados->estado_da_vitma_id;
        $vitima->codicao_da_vitima_id = $dados->codicao_da_vitima_id;
        $vitima->id_veiculo = $dados->id_veiculo;
        $vitima->passageiro = $dados->passageiro;
        $vitima->id_boat = $boat->id;
        $vitima->store();
       // $dados->id_boat = $boat->id;
       
        TTransaction::close();
        new TMessage('info', 'dados armazenados com sucesso!');
        $this->form->setData('');
        $this->onReload();
       } catch(Exception $e){
          new TMessage('erro', $e->getMessage());
        }
        
    }

  
     public function onReload($param = NULL){
        $boat = TSession::getValue('form_data_boat');
        if(isset($param['order']))
        {
        $order = $param['order'];
        }
        else{
         $order = NULL;
        }
        //inicia o banco de dados
        TTransaction::open('sgtp');
        $repositorio = new TRepository('Vitima');
        //criar um criterio de ordenação
        $criterio = new TCriteria;
        $filtro = new TFilter('id_boat', '=', $boat->id);
        $criterio->setProperty('order', $order);
      
        $criterio->add($filtro);
        $vitimas = $repositorio->load($criterio);
      
                    $this->datagrid->clear();
            if($vitimas)
             {

               foreach($vitimas as $vitima)
               {
              
                 $this->datagrid->addItem($vitima);
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
        
        public function onEditar($param){
         
          TTransaction::open('sgtp');
          $vitima = new Vitima($param['id']);
          $objeto = new stdClass;
          $objeto->id = $vitima->id;
          $objeto->nome = $vitima->nome;
          $objeto->idade = $vitima->idade;
          $objeto->genero = $vitima->genero;
          $objeto->telefone = $vitima->telefone;
          $objeto->id_veiculo = $vitima->veiculo->id;
          $objeto->removido_para_id = $vitima->removido_para->id;
          $objeto->removido_por_id = $vitima->removido_por->id;
          $objeto->estado_da_vitma_id = $vitima->estado_da_vitma->id;
          $objeto->codicao_da_vitima_id= $vitima->codicao_da_vitima->id;
         
         
          $this->form->setData($objeto);
          
          
          TTransaction::close();
        }
        
    public static function onDelete($param)
    {
        // define the delete action
        $action = new TAction(array(__CLASS__, 'Delete'));
        $action->setParameters($param); // pass the key parameter ahead
        
        // shows a dialog to the user
        new TQuestion('deseja realmente deletar esse cadastro ?', $action);
    }
    public static function Delete($param)
    {
        try
        {
            $key=$param['key']; // get the parameter $key
            TTransaction::open('sgtp'); // open a transaction with database
            $object = new Vitima($key, FALSE); // instantiates the Active Record
            $object->delete(); // deletes the object from the database
            TTransaction::close(); // close the transaction
            
            $pos_action = new TAction([__CLASS__, 'onReload']);
            new TMessage('info', AdiantiCoreTranslator::translate('Record deleted'), $pos_action); // success message
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }

}











