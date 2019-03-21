<?php
/**
 * PessoaForm Registration
 * @author  <your name here>
 */
class PessoaForm extends TPage
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
        $this->setActiveRecord('Pessoa');     // defines the active record
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Pessoa');
        $this->form->setFormTitle('Pessoa');
        

        // create the form fields
        $id = new TEntry('id');
        $nome = new TEntry('nome');
        $nome_guerra = new TEntry('nome_guerra');
        $cpf = new TEntry('cpf');
        $posto_graduacao = new TEntry('posto_graduacao');
        $endereco = new TEntry('email');
        $telefone = new TEntry('telefone');


        // add the fields
        $this->form->addFields( [ new TLabel('Id') ], [ $id ] );
        $this->form->addFields( [ new TLabel('Nome') ], [ $nome ] );
        $this->form->addFields( [ new TLabel('Nome de guerra') ], [ $nome_guerra ] );
        $this->form->addFields( [ new TLabel('CPF') ], [ $cpf ] );
        $this->form->addFields( [ new TLabel('Posto / Graduação') ], [ $posto_graduacao ] );
        $this->form->addFields( [ new TLabel('Email') ], [ $endereco ] );
        $this->form->addFields( [ new TLabel('Telefone') ], [ $telefone ] );
        
        
        $cpf->setMaxLength(9);
        $cpf->setMask('999.999.999-99');
        $posto_graduacao->setCompletion(array('Coronel', 'Tenente Coronel', 'Major', 'Capitão'
                                                , '1º Tenente', '2º Tenente', 'Aluno Oficial'
                                                , '1º Sargento', '2º Sargento', '3º Sargento'
                                                , 'Cabo', 'Soldado'));
    

        // set sizes
        $id->setSize('100%');
        $nome->setSize('100%');
        $nome_guerra->setSize('100%');
        $cpf->setSize('100%');
        $posto_graduacao->setSize('100%');
        $endereco->setSize('100%');
        $telefone->setSize('100%');


        
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
