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
        
        // Dados condutor
        $nome     = new TEntry('nome');
        $idade    = new TEntry('idade');
        $genero   = new TEntry('genero');
        $cpf      = new TEntry('cpf');
        $endereco   = new TEntry('endereco');
        $bairro   = new TEntry('bairro');        
        $situacao_condutor = new TDBRadioGroup('descricao', 'sgtran', 'SituacaoCondutor', 'id', 'descricao');
        
        
         // adiciona os campos ao formulário        
        $this->form->addFields(['Nome'], [$nome] );
        $this->form->addFields(['Idade'], [$idade] );
        $this->form->addFields(['Gênero'], [$genero] );
        $this->form->addFields(['CPF'], [$cpf] );
        $this->form->addFields(['Endereço'], [$endereco] );
        $this->form->addFields(['Bairro'], [$bairro] );
        
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
        $categoria          = new TEntry('categoria');       
        $vencimento         = new TDate('vencimento');        
        $uf_habilitacao     = new TEntry('uf_habilitacao');
        
        
       
        // adiciona os campos ao formulário
        $this->form->addFields(['Condutor habilitado?'], [$situacao_do_habilitado] );
        
        //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        $this->form->addFields(['Número registro (CNH/PPD/PID/LADV/ACC)'], [$numero_habilitacao]);
        $this->form->addFields(['Categoria'], [$categoria] );
        $this->form->addFields(['Vencimento'], [$vencimento] );
        $this->form->addFields(['UF'], [$uf_habilitacao] );
      
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
        $categoria = new TDBRadioGroup('descricao5', 'sgtran', 'CategoriaDoVeiculo', 'id', 'descricao');
        
        
        
         // adiciona os campos ao formulário        
        $this->form->addFields(['Placa'], [$placa] );
        $this->form->addFields(['Chassi'], [$chassi] );
        $this->form->addFields(['Espécie / Tipo'], [$especie] );
        
        //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        $this->form->addFields(['Categoria'], [$categoria] );
        
                
        //transforma os campos em botões
        $categoria->setUseButton();
        
        //tamanho dos botões
        $categoria->setSize(150);
        
        
        //Separa os campos do formulário
        $this->form->addContent( [new TFormSeparator('<b>Dados sinais de embriaguez</b>')] );
        
        // create the form fields
        $sinais     = new TRadioGroup('sinais');
        $nome    = new TRadioGroup('nome2');
        $numero   = new TEntry('numero');
        
        
         // adiciona os campos ao formulário        
        $this->form->addFields(['Apresenta sinais de embriaguez?'], [$sinais] );
        $this->form->addFields(['Realizou teste de etilômetro?'], [$nome] );
        $this->form->addFields(['Número do teste'], [$numero] );
        
      
       $items = ['a'=>'SIM', 'b'=>'NÃO'];
       $nomes = ['a'=>'SIM', 'b'=>'NÃO', 'c'=>'RECUSOU-SE'];
       
       // adiciona os itens aos objetos
        $sinais->addItems($items);
        $nome->addItems($nomes);
       
       // define valores default dos componentes
        $sinais->setValue('b');
        $nome->setValue('b');
       
       //transforma os campos em botões
       $sinais->setUseButton();
       $sinais->setLayout('horizontal');
       $nome->setUseButton();
       $nome->setLayout('horizontal');
        
       //tamanho dos botões
       $sinais->setSize(130);
       $nome->setSize(130);
        
        
        
        //Separa os campos do formulário
        $this->form->addContent( [new TFormSeparator('<b>Dados do estado do condutor</b>')] );
        
        // create the form fields
        $estado     = new TDBRadioGroup('nome3', 'sgtran', 'EstadoDoCondutor', 'id', 'nome');
                       
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
        $removido_para     = new TDBRadioGroup('nome4', 'sgtran', 'RemovidoPara', 'id', 'nome');
        
       
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
        $removido_por     = new TDBRadioGroup('nome5', 'sgtran', 'RemovidoPor', 'id', 'nome');
        
       
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
        $declaracao_do_condutor     = new TText('descricao6');
        $sentido_da_via     = new TDBRadioGroup('descricao7', 'sgtran', 'SentidoDaVia', 'id', 'descricao');
        $mobras_realizadas     = new TDBRadioGroup('descricao8', 'sgtran', 'MobrasRealizadas', 'id', 'descricao');
        $objetos_na_via     = new TEntry('descricao9');
        
        
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
        $apresentado  = new TRadioGroup('descricao10'); 
        $lugar      = new TEntry('lugar');
        $artigo     = new TEntry('artigo');
        $numero     = new TEntry('numero2');
        $veiculo    = new TRadioGroup('veiculo');
        
        
        
         // adiciona os campos ao formulário        
        $this->form->addFields(['Condutor apresentado'], [$apresentado] );
        $this->form->addFields(['Número do BO'], [$lugar] );
        $this->form->addFields(['Condutor autuado nos artigos'], [$artigo] );
        $this->form->addFields(['Número dos autos'], [$numero] );
        $this->form->addFields(['Procedimento com veículo'], [$veiculo] );
                                        
      $apresentados = ['a'=>'NÃO', 'b'=>'CIOSP ', 'c'=>'DEIAI', 'd'=>'DELEGACIA MULHER'];
       
       // adiciona os itens aos objetos
       $apresentado->addItems($apresentados);
       
       // define valores default dos componentes
       $apresentado->setValue('a');
       
       //transforma os campos em botões
       $apresentado->setUseButton();
       $apresentado->setLayout('horizontal');
        
       //tamanho dos botões
       $apresentado->setSize(170);
      
      
       $veiculos = ['a'=>'VEÍCULO REMOVIDO', 'b'=>'VEÍCULO APRESENTADO ', 'c'=>'VEÍCULO ENTREGUE'];
       
       // adiciona os itens aos objetos
       $veiculo->addItems($veiculos);
       
       // define valores default dos componentes
       $veiculo->setValue('b');
       
       //transforma os campos em botões
        $veiculo->setUseButton();
        $veiculo->setLayout('horizontal');
        
       //tamanho dos botões
       $veiculo->setSize(170);
        
       




        // validations
       // $email->addValidation('Email', new TRequiredValidator);
        //$email->addValidation('Email', new TEmailValidator);
        //$password->addValidation('Password', new TRequiredValidator);
        //$confirm->addValidation('Confirm password', new TRequiredValidator);

        // add a form action        
        $this->form->addAction('Voltar', new TAction(array($this, 'onBackForm')), 'fa:chevron-circle-left orange');
        $this->form->addAction('Proximo', new TAction(array($this, 'onNextForm')), 'fa:chevron-circle-right green');
        $this->form->addAction('Adicinar Condutor', new TAction(array($this, 'onSalvarCondutor')), 'fa:chevron-circle-right green');
       
        
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);
        
        // add the form to the page
        parent::add($vbox);
    }
    
    /**
     * Load form from session
     */
    public function onLoadFromSession()
    {
        $data = TSession::getValue('form_step2_data');
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
            TSession::setValue('form_step2_data', $data);
            
            
            // Carregar outra página
            AdiantiCoreApplication::loadPage('CadastroSituacaoHabilitacao', 'onLoadFromForm1', (array) $data);
            
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

}




