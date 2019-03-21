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
class CadastroDadosAcidente extends TPage
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
        $classificacao = new TCheckGroup('classificacao');
        $envolvidos = new TCheckGroup('envolvidos');
        $tipo_acidente    = new TCheckGroup('tipo_de_acidente');
        $tipo_pavimento = new TCheckGroup('tipo_de_pavimento');
        $condicao_via = new TCheckGroup('codicao_da_via');
        $condicao_tempo = new TCheckGroup('codicao_do_tempo');
        $controle_trafego = new TCheckGroup('controle_do_trafego');

        $this->form->addFields(['Classificacao'], [$classificacao] );
        $this->form->addFields(['Envolvidos'], [$envolvidos] );
        $this->form->addFields(['Tipo de acidente'], [$tipo_acidente] );
        $this->form->addFields(['Tipo de pavimento'], [$tipo_pavimento] );
        $this->form->addFields(['Condição da via'], [$condicao_via] );
        $this->form->addFields(['Condição do Tempo'], [$condicao_tempo] );
        $this->form->addFields(['Controle do Tráfego'], [$controle_trafego] );

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
            AdiantiCoreApplication::loadPage('CadastroPericia', 'onLoadFromForm1', (array) $data);
            
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
    public function onBackForm()
    {
        // volta para o formulário anterior
        AdiantiCoreApplication::loadPage('CadastroEndereco','onLoadFromSession');
    }
    
   


}
