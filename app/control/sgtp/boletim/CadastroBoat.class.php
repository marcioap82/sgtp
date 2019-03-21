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
class CadastroBoat extends TPage
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
        $this->form->setFormTitle('Boletim de Ocorrência de Acidente de Trânsito');
        $this->form->setColumnClasses(2, ['col-sm-3', 'col-sm-9']);
        
        
        
        
        // create the form fields
        $id = new TEntry('id');
        $id->setEditable(FALSE);          
        $data     = new TDate('datadecadastro');
        $hora     = new TEntry('hora');
        $viatura = new TEntry('numero_viatura');
        new TCalendar;
       
        //adiciona ao form
        $this->form->addFields(['Id'], [$id] );             
        $this->form->addFields(['Data'], [$data] );
        $this->form->addFields(['hora'], [$hora] );
        $this->form->addFields(['Numero Viatura'], [$viatura] );
        
        $hora->setMaxLength(4);
        $hora->setMask('99:99');
        $data->setMask('dd/mm/yyyy');

        // validations
       // $email->addValidation('Email', new TRequiredValidator);
        //$email->addValidation('Email', new TEmailValidator);
        //$password->addValidation('Password', new TRequiredValidator);
        //$confirm->addValidation('Confirm password', new TRequiredValidator);

        // add a form action
       
        //$this->form->addAction('Voltar', new TAction(array($this, 'onBackForm')), 'fa:chevron-circle-left orange');
        $this->form->addAction('Adicionar', new TAction(array($this, 'onSalvar')), 'fa:check-circle-o greenn');
       
        
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
   
    
    public static function Numeric()
      {
          $length=10;
          $chars = "1234567890";
          $clen   = strlen( $chars )-1;
          $id  = '';

          for ($i = 0; $i < $length; $i++) {
                  $id .= $chars[mt_rand(0,$clen)];
          }
          return ($id);
      }
      public static function TransformeDataus($data){
      $date =   TDate::date2us($dados);
      return $date;
      }
      public static function TransformeDatabr($data){
      $date =   TDate::date2br($dados);
      return $date;
      }
    
    /**
     * onNextForm
     */
   
    public function onSalvar(){
       try
        {
           $this->form->validate();            
           TTransaction::open('sgtp');
           $dados= $this->form->getData('Boat');
           $dados->numero = self::Numeric();           
           $dados->datadecadastro =  TDate::date2us($dados->datadecadastro);
           //$dados->datadecadastro = $data;
           $dados->id_unidade = 1;           
           $dados->store();
           TTransaction::close();
           //$dados->datadecadastro = self::TransformeDatabr($dados->datadecadastro);
             TSession::setValue('form_data_boat', $dados);
              $dados->datadecadastro =  TDate::date2br($dados->datadecadastro);
             $this->form->setData($dados);   
             $this->form->addAction('Proximo', new TAction(array($this, 'onNextForm')), 'fa:chevron-circle-right green');    
                      
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
     public function onLoadFromSession()
    {
        $data = TSession::getValue('form_data_boat');
        $this->form->setData($data);
       
    }
    
     public function onNextForm()
    {
              $this->form->setData($dados);        
           
            // store data in the session
          
            
            // Load another page
           AdiantiCoreApplication::loadPage('CadastroEndereco', 'onLoadFromSession', (array) $data);
             
    }
   

}
