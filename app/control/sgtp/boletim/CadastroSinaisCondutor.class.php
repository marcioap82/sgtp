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
class CadastroSinaisCondutor extends TPage
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
        $this->form->setFormTitle('Dados sinais de embriaguez');
        $this->form->setColumnClasses(2, ['col-sm-3', 'col-sm-9']);
        
        // create the form fields
        $sinais     = new TRadioGroup('sinais');
        $nome    = new TEntry('nome');
        $numero   = new TEntry('numero');
        
        
        
         // adiciona os campos ao formulário        
        $this->form->addFields(['Apresenta sinais de embriaguez?'], [$sinais] );
        $this->form->addFields(['Realizou teste de etilômetro?'], [$nome] );
        $this->form->addFields(['Número do teste'], [$numero] );
        
      
       $items = ['a'=>'SIM', 'b'=>'NÃO'];
       
       // adiciona os itens aos objetos
        $sinais->addItems($items);
       
       // define valores default dos componentes
        $sinais->setValue('b');
       
       //transforma os campos em botões
       $sinais->setUseButton();
       $sinais->setLayout('horizontal');
        
       //tamanho dos botões
       $sinais->setSize(130);
        
       

        // validations
       // $email->addValidation('Email', new TRequiredValidator);
        //$email->addValidation('Email', new TEmailValidator);
        //$password->addValidation('Password', new TRequiredValidator);
        //$confirm->addValidation('Confirm password', new TRequiredValidator);

        // add a form action        
        $this->form->addAction('Voltar', new TAction(array($this, 'onBackForm')), 'fa:chevron-circle-left orange');
        $this->form->addAction('Proximo', new TAction(array($this, 'onNextForm')), 'fa:chevron-circle-right green');
       
        
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
            AdiantiCoreApplication::loadPage('CadastroEstadoCondutor', 'onLoadFromForm1', (array) $data);
            
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
    public function onBackForm()
    {
        // volta para o formulário anterior
        AdiantiCoreApplication::loadPage('CadastroVeiculo','onLoadFromSession');
    }
    
   


}







