SET foreign_key_checks = 0;

CREATE TABLE boat (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    numero varchar(80),
    folha int,
    data int,
    observacao varchar(600),
    hora varchar(30),
    numero_viatura varchar(80),
    endereco_ocorrencia_id BIGINT UNSIGNED NOT NULL,
    classificacao_id BIGINT UNSIGNED NOT NULL,
    tipo_de_acidente_id BIGINT UNSIGNED NOT NULL,
    codicao_da_via_id BIGINT UNSIGNED NOT NULL,
    codicao_do_tempo_id BIGINT UNSIGNED NOT NULL,
    controle_do_trafego_id BIGINT UNSIGNED NOT NULL,
    pericia_id BIGINT UNSIGNED NOT NULL,
    dados_do_etilometro_id BIGINT UNSIGNED NOT NULL NOT NULL,
    estado_do_condutor_id BIGINT UNSIGNED NOT NULL NOT NULL,
    veiculo_removido_id BIGINT UNSIGNED NOT NULL NOT NULL,
    veiculo_apresentado_id BIGINT UNSIGNED NOT NULL NOT NULL,
    estado_da_vitma_id BIGINT UNSIGNED NOT NULL NOT NULL,
    codicao_da_vitima_id BIGINT UNSIGNED NOT NULL NOT NULL,
    situacao_condutor_id BIGINT UNSIGNED NOT NULL,
    declaracao_do_condutor_id BIGINT UNSIGNED NOT NULL NOT NULL,
    veiculo_entregue_id BIGINT UNSIGNED NOT NULL NOT NULL,
    procedimentos_id BIGINT UNSIGNED NOT NULL NOT NULL,
    sentido_da_via_id BIGINT UNSIGNED NOT NULL,
    situacao_vitima_id BIGINT UNSIGNED NOT NULL,
    mobras_realizadas_id BIGINT UNSIGNED NOT NULL NOT NULL,
    tipo_de_pavimento_id BIGINT UNSIGNED NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    envolvidos_id BIGINT UNSIGNED NOT NULL,
    declaracao_do_condutor_id BIGINT UNSIGNED NOT NULL NOT NULL,
    procedimentos_id BIGINT UNSIGNED NOT NULL NOT NULL,
    objetos_na_via_id BIGINT UNSIGNED NOT NULL,
    estado_da_vitma_id BIGINT UNSIGNED NOT NULL NOT NULL,
    veiculo_apresentado_id BIGINT UNSIGNED NOT NULL NOT NULL,
    veiculo_entregue_id BIGINT UNSIGNED NOT NULL NOT NULL,
    mobras_realizadas_id BIGINT UNSIGNED NOT NULL NOT NULL,
    veiculo_removido_id BIGINT UNSIGNED NOT NULL NOT NULL,
    codicao_da_vitima_id BIGINT UNSIGNED NOT NULL NOT NULL,
    estado_do_condutor_id BIGINT UNSIGNED NOT NULL NOT NULL,
    vitima_id BIGINT UNSIGNED NOT NULL,
    dados_do_etilometro_id BIGINT UNSIGNED NOT NULL NOT NULL,
    removido_por_id BIGINT UNSIGNED NOT NULL)ENGINE=INNODB;

CREATE TABLE endereco_ocorrencia (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    endereco varchar(100),
    municipio varchar(100),
    estado varchar(80),
    complemento varchar(80),
    bairro varchar(100),
    hora_da_chegada varchar(80),
    data int,
    dia_da_semana int,
    ) ENGINE=INNODB;

CREATE TABLE classificacao (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    tipo varchar(100)) ENGINE=INNODB;

CREATE TABLE tipo_ocorrencia (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    nome varchar(100)) ENGINE=INNODB;

CREATE TABLE situacao_vitima (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    nome varchar(100)) ENGINE=INNODB;

CREATE TABLE envolvidos (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    nome varchar(100)) ENGINE=INNODB;

CREATE TABLE tipo_de_acidente (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    tipo varchar(100)) ENGINE=INNODB;

CREATE TABLE tipo_de_pavimento (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descricao varchar(100)) ENGINE=INNODB;

CREATE TABLE pericia (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    data int,
    horario varchar(30),
    nome varchar(100)) ENGINE=INNODB;

CREATE TABLE dados_condutor (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    cpf varchar(20),
    nome varchar(100),
    genero varchar(100),
    estado int,
    habilitacao varchar(80),
    numero_habilitacao int,
    categoria varchar(20),
    vencimento int,
    uf_habilitacao int,
    endereco_condutor_id BIGINT UNSIGNED NOT NULL,
    estado_do_condutor_id BIGINT UNSIGNED NOT NULL,
    dados_do_etilometro_id BIGINT UNSIGNED NOT NULL,
    veiculo_id BIGINT UNSIGNED NOT NULL,
    declaracao_do_condutor_id BIGINT UNSIGNED NOT NULL,
    mobras_realizadas_id BIGINT UNSIGNED NOT NULL,
    objetos_na_via_id BIGINT UNSIGNED NOT NULL,
    sentido_da_via_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;



CREATE TABLE veiculo (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    placa varchar(100),
    chassi varchar(80),
    especie varchar(100),
    categoria varchar(30),
    categoria_do_veiculo_id BIGINT UNSIGNED NOT NULL,
    removido_para_id BIGINT UNSIGNED NOT NULL,
    removido_por_id BIGINT UNSIGNED NOT NULL,
    sentido_da_via_id BIGINT UNSIGNED NOT NULL,
    veiculo_apresentado_id BIGINT UNSIGNED NOT NULL,
    veiculo_entregue_id BIGINT UNSIGNED NOT NULL,
    veiculo_removido_id BIGINT UNSIGNED NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE estado_do_condutor (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    nome varchar(80),
    estado_do_condutor_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE dados_do_etilometro (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    nome varchar(30),
    numero int,
    sinais varchar(100),
    boat_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE estado_da_vitma (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    nome varchar(30)) ENGINE=INNODB;

CREATE TABLE removido_para (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    nome varchar(100),
    boat_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE removido_por (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    nome varchar(80),
    boat_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE declaracao_do_condutor (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descricao varchar(100),
    boat_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE sentido_da_via (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descricao varchar(100),
    boat_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE mobras_realizadas (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descricao varchar(100)) ENGINE=INNODB;

CREATE TABLE objetos_na_via (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descriacao varchar(100),
    boat_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE procedimentos (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descricao varchar(100),
    lugar varchar(30),
    artigo_legislacao int,
    numero int,
    boat_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE veiculo_removido (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descricao varchar(100)) ENGINE=INNODB;

CREATE TABLE veiculo_apresentado (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descricao varchar(100),
    boat_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE veiculo_entregue (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    nome varchar(100),
    tipo_documento varchar(100),
    numero varchar(100),
    telefone varchar(30),
    boat_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE vitima (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    nome varchar(100),
    idade int,
    genero varchar(100),
    telefone varchar(100),
    removido_para_id BIGINT UNSIGNED NOT NULL,
    removido_por_id BIGINT UNSIGNED NOT NULL,
    estado_da_vitma_id BIGINT UNSIGNED NOT NULL,
    codicao_da_vitima_id BIGINT UNSIGNED NOT NULL,
    situacao_vitima_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE codicao_da_vitima (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descricao varchar(100)) ENGINE=INNODB;

CREATE TABLE codicao_da_via (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descricao varchar(100),
    boat_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE codicao_do_tempo (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descricao varchar(100),
    boat_id BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY(boat_id) REFERENCES boat(id)) ENGINE=INNODB;

CREATE TABLE controle_do_trafego (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descricao varchar(100),
    boat_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE categoria_do_veiculo (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descricao varchar(100)) ENGINE=INNODB;

CREATE TABLE endereco_condutor (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    endereco varchar(100),
    bairro varchar(80)) ENGINE=INNODB;

CREATE TABLE situacao_condutor (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    descricao varchar(100)) ENGINE=INNODB;

CREATE TABLE boattipo_de_acidente (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    tipo_de_acidente_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatclassificacao (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    classificacao_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatsituacao_vitima (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    situacao_vitima_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatsituacao_do_habilitado (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    situacao_do_habilitado_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatremovido_para (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    removido_para_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatremovido_por (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    removido_por_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boattipo_de_pavimento (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    tipo_de_pavimento_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatsentido_da_via (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    sentido_da_via_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatboat (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL NOT NULL) ENGINE=INNODB;

CREATE TABLE boatveiculo_apresentado (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    veiculo_apresentado_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatveiculo_removido (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    veiculo_removido_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatestado_da_vitma (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    estado_da_vitma_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatdados_condutor (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    dados_condutor_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatcodicao_da_vitima (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    codicao_da_vitima_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatvitima (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    vitima_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatestado_do_condutor (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    estado_do_condutor_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatenvolvidos (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    envolvidos_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatcontrole_do_trafego (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    controle_do_trafego_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatcodicao_do_tempo (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    codicao_do_tempo_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatcodicao_da_via (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    codicao_da_via_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE categoria_do_veiculocategoria_do_veiculo (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    categoria_do_veiculo_id BIGINT UNSIGNED NOT NULL NOT NULL,
    categoria_do_veiculo_id BIGINT UNSIGNED NOT NULL NOT NULL) ENGINE=INNODB;

CREATE TABLE categoria_do_veiculoboat (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    categoria_do_veiculo_id BIGINT UNSIGNED NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatcategoria_do_veiculo (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    categoria_do_veiculo_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

CREATE TABLE boatveiculo (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL,
    boat_id BIGINT UNSIGNED NOT NULL,
    veiculo_id BIGINT UNSIGNED NOT NULL) ENGINE=INNODB;

