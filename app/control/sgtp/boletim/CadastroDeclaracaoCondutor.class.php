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
class CadastroDeclaracaoCondutor extends TPage
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
        $this->form->setFormTitle('Dados declaração do condutor');
        $this->form->setColumnClasses(2, ['col-sm-3', 'col-sm-9']);
        
        // create the form fields
        $declaracao_do_condutor     = new TText('descricao');
        $sentido_da_via     = new TDBRadioGroup('descricao2', 'sgtran', 'SentidoDaVia', 'id', 'descricao');
        $mobras_realizadas     = new TDBRadioGroup('descricao3', 'sgtran', 'MobrasRealizadas', 'id', 'descricao');
        $objetos_na_via     = new TEntry('descricao4');
        
        
        
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
            AdiantiCoreApplication::loadPage('CadastroProcedimentos', 'onLoadFromForm1', (array) $data);
            
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
    public function onBackForm()
    {
        // volta para o formulário anterior
        AdiantiCoreApplication::loadPage('CadastroRemovidoPor','onLoadFromSession');
    }
    
   


}








