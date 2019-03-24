<?php
/**
 * Dadoscondutortemp Active Record
 * @author  <your-name-here>
 */
class Dadoscondutortemp extends TRecord
{
    const TABLENAME = 'dadoscondutortemp';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome');
        parent::addAttribute('idade');
        parent::addAttribute('genero');
        parent::addAttribute('cpf');
        parent::addAttribute('endereco');
        parent::addAttribute('bairro');
        parent::addAttribute('situacao_condutor');
        parent::addAttribute('situacao_do_habilitado');
        parent::addAttribute('numero_habilitacao');
        parent::addAttribute('categoria_habilitacao');
        parent::addAttribute('vencimento');
        parent::addAttribute('uf_habilitacao');
        parent::addAttribute('placa');
        parent::addAttribute('chassi');
        parent::addAttribute('especie');
        parent::addAttribute('categoria_veiculo');
        parent::addAttribute('sinais');
        parent::addAttribute('etilometro');
        parent::addAttribute('numero_teste');
        parent::addAttribute('estado');
        parent::addAttribute('removido_para');
        parent::addAttribute('removido_por');
        parent::addAttribute('declaracao_do_condutor');
        parent::addAttribute('sentido_da_via');
        parent::addAttribute('mobras_realizadas');
        parent::addAttribute('objetos_na_via');
        parent::addAttribute('lugar');
        parent::addAttribute('artigo');
        parent::addAttribute('numero_bo');
        parent::addAttribute('veiculo');
        parent::addAttribute('removido');
        parent::addAttribute('apresentado');
        parent::addAttribute('nome_responsavel');
        parent::addAttribute('tipo_documento');
        parent::addAttribute('numero_documento');
        parent::addAttribute('numero_telefone');
        parent::addAttribute('id_boat');
        parent::addAttribute('telefone');
        
    }


}
