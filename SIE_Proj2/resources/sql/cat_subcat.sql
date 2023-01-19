
/* Populating the Database */

/* Category */
INSERT into categoria (nome) VALUES ('Componentes');
INSERT into categoria (nome) VALUES ('Computadores');
INSERT into categoria (nome) VALUES ('Armazenamento');


/* Subcategory */
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

/* Products */
insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (1,
                'Processador Intel Core i5-12400F 6-Core 2.5GHz c/ Turbo 4.4GHz 18MB Skt1700',
                200,
                'Os processadores para desktop Intel® Core™ da 12ª Geração oferecem uma nova arquitetura híbrida de desempenho,
                combinando núcleos de desempenho com núcleos eficientes para aprimorar jogos, produtividade e criação. 
                Num avanço arrojado no desempenho do núcleo, os processadores para desktop Intel® Core™ da 12ª Geração oferecem 
                uma abordagem revolucionária da arquitetura x86.',
                184.90,
                0,
                TRUE,
                'Processadores');


insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria)
        values (2,
                'Processador Intel Core i5-13400F 10-Core c/ Turbo 4.6GHz 20MB Skt1700',
                150,
                'Diga olá aos novos processadores Raptor Lake. Os incríveis processadores da 
                13ª Geração Intel estão aqui para quebrar os limites do poder de processamento 
                moderno. Liberte o poder do desempenho de próximo nível com o processador de 
                desktop Intel® Core™ de 13ª geração.',
                239.90,
                0,
                TRUE,
                'Processadores');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria)
        values (3,
                'Processador Intel Core i7-13700KF 16-Core 2.5GHz c/ Turbo 5.4GHz 30MB Skt1700',
                100,
                'Os processadores para desktop Intel® Core™ da 13ª Geração oferecem a próxima geração 
                de desempenho de núcleo inovador. A tecnologia Intel® Turbo Boost Max 3.0 fortalece 
                ainda mais o desempenho de threading leve, identificando os Performance-cores de melhor 
                desempenho.',
                259.90,
                0,
                TRUE,
                'Processadores');
insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria)
        values (4,
                'Processador AMD Ryzen 7 5700X 8-Core 3.4GHz c/ Turbo 4.6GHz 36MB SktAM4',
                50,
                'Os processadores AMD Ryzen™ série 5000 são construídos 
                com arquitetura de 7 nm, que oferece taxas de frames extremamente altas 
                com alta qualidade de imagem. Os processadores AMD Ryzen™ série 5000 
                capacitam a próxima geração de jogos exigentes, proporcionando experiências 
                imersivas únicas e dominando qualquer tarefa multithread como 3D e renderização 
                de vídeo e compilação de software.',
                269.90,
                15,
                TRUE,
                'Processadores');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (5,
                'Processador AMD Ryzen 5 5600X 6-Core 3.7GHz c/ Turbo 4.6GHz 35MB SktAM4',
                85,
                'Os processadores AMD Ryzen™ série 5000 são construídos 
                com arquitetura de 7 nm, que oferece taxas de frames extremamente altas 
                com alta qualidade de imagem. Os processadores AMD Ryzen™ série 5000 
                capacitam a próxima geração de jogos exigentes, proporcionando experiências 
                imersivas únicas e dominando qualquer tarefa multithread como 3D e renderização 
                de vídeo e compilação de software.',
                199.90,
                0,
                TRUE,
                'Processadores');
insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (6,
                'Processador AMD Ryzen 9 7950X 16-Core 4.5GHz c/ Turbo 5.7GHz 81MB SktAM5',
                85,
                'Os processadores AMD Ryzen Série 7000 estão equipados com tecnologias de ponta 
                para um PC moderno descomplicado. Os destaques incluem memória DDR5 de alta velocidade, 
                suporte PCIe® 5.0, overclocking de memória de um toque AMD EXPO™ e fabricação 
                hipereficiente de 5 nm. Coloca uma motherboard socket AMD AM5 no coração da tua 
                configuração para dominar os jogos que amas hoje e amanhã.',
                689.90,
                3,
                FALSE,
                'Processadores');