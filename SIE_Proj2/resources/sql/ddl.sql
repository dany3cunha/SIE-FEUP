/*******************************************************************************
   Create Tables
********************************************************************************/

CREATE TABLE utilizador (
    id SERIAL NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(300) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    morada VARCHAR(50) NOT NULL,
    cp VARCHAR(50) NOT NULL,
    telemovel VARCHAR(9) NOT NULL,
    nif VARCHAR(9) NOT NULL,
    funcionario BOOLEAN,
    CONSTRAINT PK_utilizador PRIMARY KEY (id)
);

CREATE TABLE encomenda (
    id INT NOT NULL,
    data TIMESTAMP,
    pagamento VARCHAR(50) NOT NULL,
    FK_utilizador INT NOT NULL,
    FK_status VARCHAR(50) NOT NULL,
    CONSTRAINT PK_encomenda PRIMARY KEY (id)
);

CREATE TABLE status (
    descricao VARCHAR(50) NOT NULL,
    CONSTRAINT PK_status PRIMARY KEY (descricao)
);


CREATE TABLE enc_prod (
    quantidade INT NOT NULL,
    FK_encomenda INT NOT NULL,
    FK_produto INT NOT NULL
);


CREATE TABLE produto (
    ref INT NOT NULL,
    nome VARCHAR(500) NOT NULL,
    quantidade INT NOT NULL,
    descricao TEXT NOT NULL,
    preco FLOAT(6),
    desconto INT NOT NULL,
    destaque BOOLEAN,
    FK_subcategoria VARCHAR(50) NOT NULL,
    CONSTRAINT PK_produto PRIMARY KEY (ref)
);

CREATE TABLE subcategoria (
    nome VARCHAR(50) NOT NULL,
    FK_categoria VARCHAR(50) NOT NULL,
    CONSTRAINT PK_subcategoria PRIMARY KEY (nome)
);

CREATE TABLE categoria (
    nome VARCHAR(50) NOT NULL,
    CONSTRAINT PK_categoria PRIMARY KEY (nome)
);




/*******************************************************************************
   Create Foreign Keys
********************************************************************************/

/*      utilizador(1) -- (*)encomenda      */
ALTER TABLE encomenda ADD CONSTRAINT FK_encomenda_id_utilizador
    FOREIGN KEY (FK_utilizador) REFERENCES utilizador (id) ON DELETE CASCADE ON UPDATE NO ACTION;

/*      encomenda(*) -- (1)status          */
ALTER TABLE encomenda ADD CONSTRAINT FK_encomenda_desc_status
    FOREIGN KEY (FK_status) REFERENCES status (descricao) ON DELETE CASCADE ON UPDATE NO ACTION;

/*      enc_prod                           */
ALTER TABLE enc_prod ADD CONSTRAINT FK_enc_prod_id_encomenda
    FOREIGN KEY (FK_encomenda) REFERENCES encomenda (id) ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE enc_prod ADD CONSTRAINT FK_enc_prod_ref_produto
    FOREIGN KEY (FK_produto) REFERENCES produto (ref) ON DELETE CASCADE ON UPDATE NO ACTION;

/*      produto(*) -- (1)subcategoria      */
ALTER TABLE produto ADD CONSTRAINT FK_produto_nome_subcategoria
    FOREIGN KEY (FK_subcategoria) REFERENCES subcategoria (nome) ON DELETE CASCADE ON UPDATE NO ACTION;

/*      subcategoria(*) -- (1)categoria    */
ALTER TABLE subcategoria ADD CONSTRAINT FK_subcategoria_nome_categoria
    FOREIGN KEY (FK_categoria) REFERENCES categoria (nome) ON DELETE CASCADE ON UPDATE NO ACTION;