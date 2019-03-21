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
        $this->form->setFormTitle('Cadastro de Boletim de Acidente De Trânsito');
        $this->form->setColumnClasses(2, ['col-sm-3', 'col-sm-9']);
        
        // create the form fields
        $nome     = new TEntry('nome');
        $idade    = new TEntry('idade');
        $genero   = new TEntry('genero');
        $cpf      = new TEntry('cpf');
        $endereco   = new TEntry('endereco');
        $bairro   = new TEntry('bairro');        
        $situacao_condutor = new TCheckGroup('situacao_condutor');
        
        
         // adiciona os campos ao formulário
        $this->form->addFields( [new TLabel('FALTA DADOS DO CONDUTOR NO BANCO DE DADOS E CLASSE ESPECÍFICA')]);
        $this->form->addFields(['Nome'], [$nome] );
        $this->form->addFields(['Idade'], [$idade] );
        $this->form->addFields(['Gênero'], [$genero] );
        $this->form->addFields(['CPF'], [$cpf] );
        $this->form->addFields(['Endereço'], [$endereco] );
        $this->form->addFields(['Bairro'], [$bairro] );
        $this->form->addFields(['Situacao do condutor'], [$situacao_condutor] );
       
        
       

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
    
   


}




