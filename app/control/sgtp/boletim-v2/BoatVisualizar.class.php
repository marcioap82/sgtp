<?php
class BoatVisualizar extends TPage
{
    protected $form; // form
    protected $datagrid;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        $tabela = new TTable;
        $tabela->width="600px";
        $tabela->align="center";
        $tabela->border = 1;
        $linha = $tabela->addRow();
        $linha->addCell('sdsds');
        $linha->addCell('sdsds');
        $linha->addCell('sdsds');
        $linha->addCell('sdsds');
        
       
        $vbox = new TVBox;
        
        $vbox->style = 'width: 100%';
       
        $vbox->add($tabela);
       
        
        // add the form to the page
        parent::add($vbox);
    }
        
        
  }

?>