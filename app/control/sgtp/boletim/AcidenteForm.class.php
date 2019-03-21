<?php
/**
 * AcidenteForm Form
 * @author  <your name here>
 */
class AcidenteForm extends TPage
{
    protected $form; // form
    
    /**
     * Form constructor
     * @param $param Request
     */
    public function __construct( $param )
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Acidente');
        $this->form->setFormTitle('Acidente');
        

        // create the form fields
        $id = new TEntry('id');
        $endereco = new TDBUniqueSearch('endereco', 'sgtp', 'Endereco', 'id', 'logradouro');
        $hora = new TEntry('hora');
        $data = new TDate('data');
        $dia_da_semana = new TText('dia_da_semana');
        $classificacao = new TText('classificacao');
        $envolvidos = new TText('envolvidos');
        $tipo_de_acidente = new TText('tipo_de_acidente');
        $tipo_de_pavimento = new TText('tipo_de_pavimento');
        $condicoes_da_via = new TText('condicoes_da_via');
        $condicoes_do_tempo = new TText('condicoes_do_tempo');
        $controle_do_trafego = new TText('controle_do_trafego');


        // add the fields
        $this->form->addFields( [ new TLabel('Id') ], [ $id ] );
        $this->form->addFields( [ new TLabel('Endereco') ], [ $endereco ] );
        $this->form->addFields( [ new TLabel('Hora') ], [ $hora ] );
        $this->form->addFields( [ new TLabel('Data') ], [ $data ] );
        $this->form->addFields( [ new TLabel('Dia Da Semana') ], [ $dia_da_semana ] );
        $this->form->addFields( [ new TLabel('Classificacao') ], [ $classificacao ] );
        $this->form->addFields( [ new TLabel('Envolvidos') ], [ $envolvidos ] );
        $this->form->addFields( [ new TLabel('Tipo De Acidente') ], [ $tipo_de_acidente ] );
        $this->form->addFields( [ new TLabel('Tipo De Pavimento') ], [ $tipo_de_pavimento ] );
        $this->form->addFields( [ new TLabel('Condicoes Da Via') ], [ $condicoes_da_via ] );
        $this->form->addFields( [ new TLabel('Condicoes Do Tempo') ], [ $condicoes_do_tempo ] );
        $this->form->addFields( [ new TLabel('Controle Do Trafego') ], [ $controle_do_trafego ] );



        // set sizes
        $id->setSize('100%');
        $endereco->setSize('100%');
        $hora->setSize('100%');
        $data->setSize('100%');
        $dia_da_semana->setSize('100%');
        $classificacao->setSize('100%');
        $envolvidos->setSize('100%');
        $tipo_de_acidente->setSize('100%');
        $tipo_de_pavimento->setSize('100%');
        $condicoes_da_via->setSize('100%');
        $condicoes_do_tempo->setSize('100%');
        $controle_do_trafego->setSize('100%');



        if (!empty($id))
        {
            $id->setEditable(FALSE);
        }
        
        /** samples
         $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
         $fieldX->setSize( '100%' ); // set size
         **/
         
        // create the form actions
        $btn = $this->form->addAction(_t('Save'), new TAction([$this, 'onSave']), 'fa:floppy-o');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction(_t('New'),  new TAction([$this, 'onEdit']), 'fa:eraser red');
        
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 90%';
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        
        parent::add($container);
    }

    /**
     * Save form data
     * @param $param Request
     */
    public function onSave( $param )
    {
        try
        {
            TTransaction::open('sgtp'); // open a transaction
            
            /**
            // Enable Debug logger for SQL operations inside the transaction
            TTransaction::setLogger(new TLoggerSTD); // standard output
            TTransaction::setLogger(new TLoggerTXT('log.txt')); // file
            **/
            
            $this->form->validate(); // validate form data
            $data = $this->form->getData(); // get form data as array
            
            $object = new Acidente;  // create an empty object
            $object->fromArray( (array) $data); // load the object with data
            $object->store(); // save the object
            
            // get the generated id
            $data->id = $object->id;
            
            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction
            
            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    /**
     * Clear form data
     * @param $param Request
     */
    public function onClear( $param )
    {
        $this->form->clear(TRUE);
    }
    
    /**
     * Load object to form data
     * @param $param Request
     */
    public function onEdit( $param )
    {
        try
        {
            if (isset($param['key']))
            {
                $key = $param['key'];  // get the parameter $key
                TTransaction::open('sgtp'); // open a transaction
                $object = new Acidente($key); // instantiates the Active Record
                $this->form->setData($object); // fill the form
                TTransaction::close(); // close the transaction
            }
            else
            {
                $this->form->clear(TRUE);
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
}
