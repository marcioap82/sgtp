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
class CadastroObservacao extends TPage
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
        $this->form->setFormTitle('Observações');
        $this->form->setColumnClasses(2, ['col-sm-3', 'col-sm-9']);
        
               
        // cria os elementos de input
         $observacao = new THtmlEditor('observacao');
         $observacao->setSize( '100%', 200);
        
             
         // adiciona os objetos ao formulário
         $this->form->addFields( [$observacao] );
            
         

        // add a form action
        $this->form->addAction('Voltar', new TAction(array($this, 'onBackForm')), 'fa:chevron-circle-left orange');        
        $this->form->addAction('Visualizar', new TAction(array($this, 'onVisualizar')), 'fa:fas fa-search blue');
        
               
        
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
        
         $data =  TSession::getValue('form_data_observacao');
         $this->form->setData($data);
    }
    
   //Função Visualizar 
    
   public function onVisualizar()
    {
      $data =  $this->form->getData();
      TSession::setValue('form_data_observacao', $data);
      TSession::setValue('form_data_observacao', $data);
      AdiantiCoreApplication::loadPage('BoatVisualizar','onLoadFromSession',(array) $data);
        
    }
    
    public function onBackForm()
    {
        // volta para o formulário anterior
        AdiantiCoreApplication::loadPage('VitimaForm','onLoadFromSession',(array) $data);
    }

  


}













