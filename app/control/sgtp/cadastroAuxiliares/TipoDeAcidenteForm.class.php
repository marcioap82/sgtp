<?php
/**
 * TipoDeAcidenteForm Registration
 * @author  <your name here>
 */
class TipoDeAcidenteForm extends TPage
{
    protected $form; // form
    
    use Adianti\Base\AdiantiStandardFormTrait; // Standard form methods
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        $this->setDatabase('sgtp');              // defines the database
        $this->setActiveRecord('TipoDeAcidente');     // defines the active record
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_TipoDeAcidente');
        $this->form->setFormTitle('TipoDeAcidente');
        

        // create the form fields
        $id = new TEntry('id');
        $tipo = new TEntry('tipo');


        // add the fields
        $this->form->addFields( [ new TLabel('Id') ], [ $id ] );
        $this->form->addFields( [ new TLabel('Tipo') ], [ $tipo ] );



        // set sizes
        $id->setSize('100%');
        $tipo->setSize('100%');


        
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
}
