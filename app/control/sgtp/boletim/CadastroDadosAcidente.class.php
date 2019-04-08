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
        $this->form->setFormTitle('Dados do acidente');
        $this->form->setColumnClasses(2, ['col-sm-3', 'col-sm-9']);
        
        
        
        // create the form fields
        $classificacao = new TDBRadioGroup('classificacao_id', 'sgtp', 'Classificacao', 'id', 'tipo');
        $envolvidos = new TDBCheckGroup('envolvidos_id', 'sgtp', 'Envolvidos', 'id', 'nome');
        $tipo_acidente    = new TDBCheckGroup('tipo_de_acidente_id', 'sgtp', 'TipoDeAcidente', 'id', 'tipo');
        $tipo_pavimento = new TDBCheckGroup('tipo_de_pavimento_id', 'sgtp', 'TipoDePavimento', 'id', 'descricao');
        $condicao_via = new TDBCheckGroup('codicao_da_via_id', 'sgtp', 'CodicaoDaVia', 'id', 'descricao');
        $condicao_tempo = new TDBRadioGroup('codicao_do_tempo_id', 'sgtp', 'CodicaoDoTempo', 'id', 'descricao');
        $controle_trafego = new TDBCheckGroup('controle_do_trafego_id', 'sgtp', 'ControleDoTrafego', 'id', 'descricao');
        
        
        
        $this->form->addFields(['<b>Classificação</b>'], [$classificacao] );
        
        //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        $this->form->addFields(['<b>Envolvidos</b>'], [$envolvidos] );
        
        //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        $this->form->addFields(['<b>Tipo de acidente</b>'], [$tipo_acidente] );
        
        //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        $this->form->addFields(['<b>Tipo de pavimento</b>'], [$tipo_pavimento] );
        
        //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        $this->form->addFields(['<b>Condição da via</b>'], [$condicao_via] );
        
        //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        $this->form->addFields(['<b>Condição do Tempo</b>'], [$condicao_tempo] );
        
        //divisão de grupos
        $label = new TLabel('', '#7D78B6', 12, 'bi');
        $label->style='text-align:left;border-bottom:1px solid #c0c0c0;width:100%';
        $this->form->addContent( [$label] );
        
        $this->form->addFields(['<b>Controle do Tráfego</b>'], [$controle_trafego] );
        
        /** define valores default
        $classificacao->setValue(1);       
        $envolvidos->setValue(array(1));
        $tipo_acidente->setValue(array(1));
        $tipo_pavimento->setValue(array(1));
        $condicao_via->setValue(array(1));
        $condicao_tempo->setValue(array(1));
        $controle_trafego->setValue(array(1));**/
        
        
        
        //transforma os campos em botões
        $classificacao->setUseButton();
        $envolvidos->setUseButton();
        $tipo_acidente->setUseButton();
        $tipo_pavimento->setUseButton();
        $condicao_via->setUseButton();
        $condicao_tempo->setUseButton();
        $controle_trafego->setUseButton();
        
        //tamanho dos botões
        $classificacao->setSize(130);
        $envolvidos->setSize(130);
        $tipo_acidente->setSize(130);
        $tipo_pavimento->setSize(190);
        $condicao_via->setSize(130);
        $condicao_tempo->setSize(130);
        $controle_trafego->setSize(190);
        
       

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
        $data = TSession::getValue('form_data_acidente');
        
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
            TSession::setValue('form_data_acidente', $data);
           TSession::setValue('form_data_envolvidos', $data->envolvidos_id);
            
            
            // Carregar outra página
            AdiantiCoreApplication::loadPage('CadastroPericia', 'onLoadFromSession', (array) $data);
           
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
