<?php
/**
 * WelcomeView
 *
 * @version    1.0
 * @package    control
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class WelcomeView extends TPage
{
    /**
     * Class constructor
     * Creates the page
     */
     private $usuario;
    function __construct()
    {
        parent::__construct();
       
        
        $html1 = new THtmlRenderer('app/resources/system_welcome_en.html');
        $html2 = new THtmlRenderer('app/resources/system_welcome_pt.html');
        $html3 = new THtmlRenderer('app/resources/system_welcome_es.html');
         try{
          $id= TSession::getValue('userunitid');
         //TTransaction::open('permission');
          $replaces_valor = array();
          //pega a data atual
           $dataatual= date('Y-m-d'); 
         $somaAtual = explode('-',$dataatual);
         $somada  = $somaAtual[1];   
       
         TTransaction::open('sgtp');
         $this->usuario = new SystemUser();
         $usuarios = $this->usuario->all();
        
          foreach($usuarios as $user)
           {          
                       
             //retorna o mes e transforma para inteiro
            $datanascimento = explode("-",$user->datanascimento);
            //verifica se existe a data
            $data = isset($datanascimento[1]) ? $datanascimento[1] : null;
        
                 if($data== $somada)
                  
                {
                     $replaces_valor[] = array('nome'=>$user->nomeguerra,
                                               'postograduacao'=>$user->graduacao,
                                               'datanascimento'=>$user->datanascimento);              
                }
             }
        
         TTransaction::close();
         
         } catch(Exception $e)
         {
             new TMessage('error', $e->getMessage);
         }
        // replace the main section variables
        $html1->enableSection('main', array());
        $html2->enableSection('main', array());
        $html1->enableSection('aniversariante', $replaces_valor, TRUE);
        
        $panel1 = new TPanelGroup('Sistema de Gestão de Trânsito e Pessoas');
        $panel1->add($html1);
        
        $panel2 = new TPanelGroup('Breves relatórios');
        $panel2->add($html2);
		
        $panel3 = new TPanelGroup('Autuações');
        $panel3->add($html3);
        
        $vbox = TVBox::pack($panel1, $panel2, $panel3);
        $vbox->style = 'display:block; width: 90%';
        
        // add the template to the page
        parent::add( $vbox );
    }
}
