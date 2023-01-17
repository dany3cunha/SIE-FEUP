INSERT into categoria (nome) VALUES ('Componentes');
INSERT into categoria (nome) VALUES ('Computadores');
INSERT into categoria (nome) VALUES ('Armazenamento');

INSERT into subcategoria (nome, fk_categoria) VALUES ('Processadores', 'Componentes');
INSERT into subcategoria (nome, fk_categoria) VALUES ('Motherboards', 'Componentes');
INSERT into subcategoria (nome, fk_categoria) VALUES ('Placas Gráficas', 'Componentes');
INSERT into subcategoria (nome, fk_categoria) VALUES ('Memórias RAM', 'Componentes');
INSERT into subcategoria (nome, fk_categoria) VALUES ('Fontes de Alimentação', 'Componentes');
INSERT into subcategoria (nome, fk_categoria) VALUES ('Coolers CPU', 'Componentes');
INSERT into subcategoria (nome, fk_categoria) VALUES ('Caixas', 'Componentes');
INSERT into subcategoria (nome, fk_categoria) VALUES ('Ventoinha', 'Componentes');


INSERT into subcategoria (nome, fk_categoria) VALUES ('Desktop', 'Computadores');
INSERT into subcategoria (nome, fk_categoria) VALUES ('Laptop', 'Computadores');
INSERT into subcategoria (nome, fk_categoria) VALUES ('Servidores', 'Computadores');
INSERT into subcategoria (nome, fk_categoria) VALUES ('Acessórios', 'Computadores');

INSERT into subcategoria (nome, fk_categoria) VALUES ('Interno', 'Armazenamento');
INSERT into subcategoria (nome, fk_categoria) VALUES ('Externo', 'Armazenamento');
INSERT into subcategoria (nome, fk_categoria) VALUES ('Pen Drives', 'Armazenamento');
INSERT into subcategoria (nome, fk_categoria) VALUES ('Cartões de Memória', 'Armazenamento');