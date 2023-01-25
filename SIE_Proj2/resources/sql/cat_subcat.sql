
/* Populating the Database */

/* Status */

INSERT into status (descricao) VALUES ('Aguarda Pagamento');
INSERT into status (descricao) VALUES ('Em Processamento');
INSERT into status (descricao) VALUES ('Enviada');
INSERT into status (descricao) VALUES ('Entregue');

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
                'Os processadores para desktop Intel® Core™ da 12ª Geração oferecem uma nova arquitetura híbrida 
                de desempenho, combinando núcleos de desempenho com núcleos eficientes para aprimorar jogos, 
                produtividade e criação. Num avanço arrojado no desempenho do núcleo, os processadores para desktop 
                Intel® Core™ da 12ª Geração oferecem uma abordagem revolucionária da arquitetura x86.;

                TECNOLOGIA DE NÚCLEO INOVADORA;
                Num avanço arrojado no desempenho do núcleo, os processadores para desktop Intel® Core™ da 12ª Geração 
                oferecem uma abordagem revolucionária da arquitetura x86. Os seus núcleos de desempenho, ou “P-cores”, 
                são otimizados para desempenho com thread único ou leve, enquanto os seus núcleos eficientes, ou 
                “E-cores”, são otimizados para escalar cargas de trabalho com threading pesado. O Intel® Thread 
                Director ajuda a monitorizar e analisar dados de desempenho em tempo real para colocar ininterruptamente 
                o thread de aplicação ideal no núcleo certo e otimizar o desempenho por watt. Isso significa que os 
                jogadores, criadores e profissionais podem aproveitar a inteligência e a potência para aprimorar as 
                experiências mais importantes.;

                A ACELERAÇÃO NA INOVAÇÃO DA PLATAFORMA;
                Aproveite as mais recentes tecnologias de plataforma que impulsionam jogos, fluxo de trabalho e criação. 
                Os processadores para desktop Intel® Core™ da 12ª Geração oferecem até 20 lanes (16 PCIe 5.0 e 4 PCIe 4.0) 
                para impulsionar o desempenho ideal de gráficos dedicados e armazenamento, por possibilitar pontos de 
                conexão de largura de banda mais alta. O DDR5 oferece velocidades rápidas de até 4800 MT/s, o que permite 
                maior velocidade de largura de banda da memória em comparação com as gerações anteriores que usam a memória 
                DDR4 3200 MT/s. Ajuste o desempenho e a potência de computação com processadores para desktop Intel® Core™ 
                da 12ª Geração desbloqueados com capacidade de overclocking avançado e suporte de ajuste avançado com a 
                Intel® Extreme Tuning Utility (XTU). Com esses e outros aprimoramentos da plataforma, você poderá trabalhar, 
                jogar e criar com controlo e confiança impressionantes.;',
                184.90,
                0,
                TRUE,
                'Processadores');


insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria)
        values (2,
                'Processador Intel Core i5-13400F 10-Core c/ Turbo 4.6GHz 20MB Skt1700',
                150,
                'DESEMPENHO NEXT LEVEL;
                 Diga olá aos novos processadores Raptor Lake. Os incríveis processadores da 13ª Geração Intel estão aqui 
                 para quebrar os limites do poder de processamento moderno. Liberte o poder do desempenho de próximo nível 
                 com o processador de desktop Intel® Core™ de 13ª geração.;

                DESEMPENHO E MULTITARES REVOLUCIONÁRIOS;
                A nova arquitetura híbrida de desempenho da Intel levará a sua jogabilidade além do desempenho e a sua 
                experiência mais imersiva até agora. Tenha o poder de fazer tudo!;

                INTEL THREAD DIRECTOR;
                Mantém os seus jogos livres de interrupções, garantindo que as suas tarefas em segundo plano nunca o atrapalhem.;

                PRONTO PARA O QUE VEM A SEGUIR;
                Os processadores de desktop Intel Core de 13ª Geração oferecem suporte de amplo espectro para permitir que você 
                personalize e otimize o seu sistema para atender às suas necessidades usando as mais recentes tecnologias de jogos.;

                OPÇÕES DE MEMÓRIA EXPANDIDA;
                O suporte para memória DDR4 e DDR5 oferece controlo total sobre as suas configurações de memória.;

                DESENVOLVA A SUA CONFIGURAÇÃO;
                O suporte para a tecnologia Thunderbolt™ 4 oferece uma maneira simples e rápida de conectar os seus periféricos.;',
                239.90,
                0,
                TRUE,
                'Processadores');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria)
        values (3,
                'Processador Intel Core i7-13700KF 16-Core 2.5GHz c/ Turbo 5.4GHz 30MB Skt1700',
                100,
                'Com um aumento na contagem de núcleos, estes processadores continuam a utilizar a arquitetura híbrida de desempenho 
                Intel para otimizar os seus jogos, criação de conteúdo e produtividade. Aproveite a largura de banda líder do setor de 
                até 16 vias PCIe 5.0 e memória DDR5 de até 5600 MT/s. Turbine o desempenho do seu CPU com um poderoso conjunto de 
                ferramentas de ajuste e overclocking. Desfrute das suas experiências favoritas em até 4 monitores 4K60 simultâneos ou 
                vídeo HDR de até 8K60 com supressão de ruído dinâmico. O suporte para chipsets da série Intel® 700 e a compatibilidade 
                retroativa com os chipsets da série Intel® 600 permitem aceder aos recursos de que você precisa para qualquer tarefa. 
                Esteja você a trabalhar, transmitir, jogar ou criar, os processadores para desktop Intel® Core™ da 13ª Geração oferecem 
                a próxima geração de desempenho inovador.;

                DESEMPENHO DE ÚLTIMA GERAÇÃO;
                Os processadores para desktop Intel® Core™ da 13ª Geração oferecem a próxima geração de desempenho de núcleo inovador. 
                A tecnologia Intel® Turbo Boost Max 3.0 fortalece ainda mais o desempenho de threading leve, identificando os 
                Performance-cores de melhor desempenho. Enquanto isso, os E-cores adicionais permitem um aumento na Cache Inteligente Intel® 
                (L3) para um processamento mais eficiente de conjuntos de dados maiores e um melhor desempenho. A cache L2 dos P-cores e 
                E-cores também aumentou em comparação com a geração anterior de processadores Intel®, minimizando a quantidade de tempo 
                usada para transferir dados entre o cache e a memória, para acelerar o seu fluxo de trabalho Liberte a potência do desempenho 
                de próximo nível com a vantagem dos processadores para desktop Intel® Core™ da 13ª Geração.;

                RECURSOS DE PLATAFORMA DINÂMICOS;
                Carregados com as tecnologias de plataforma mais recentes, os processadores para desktop Intel® Core™ da 13ª Geração aceleram 
                o desempenho do sistema. Até 16 vias PCIe 5.0 duplicam a taxa de transferência de E/S para uma potência de processamento 
                acelerada. Aproveite o mais recente suporte para DDR5 que está a transformar o setor para velocidades rápidas de até 5600 
                MT/s, alta largura de banda e maior produtividade, bem como o suporte contínuo para DDR4 de até 3200 MT/s. Suporte abrangente
                para ajuste avançado e overclocking — incluindo o Intel® Extreme Tuning Utility, Intel® Extreme Memory Profile, e Intel® 
                Dynamic Memory Boost — oferecem desempenho de overclocking inteligente, para que overclockers novatos e experientes possam 
                obter mais dos seus processadores desbloqueados. E a compatibilidade retroativa com os chipsets série Intel 600 e 700 oferece 
                a flexibilidade de atualizar sem comprometer o desempenho ou os recursos.;

                CONSTRUÍDOS PARA JOGOS MODERNOS;
                Criado para jogadores que procuram o máximo desempenho para jogar os jogos mais recentes, além de ter recursos para lidar 
                com outras cargas de trabalho. Os novos PCs baseados no processador Intel Core de 13ª geração tornam tudo isso possível.:',
                459.90,
                0,
                TRUE,
                'Processadores');
insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria)
        values (4,
                'Processador AMD Ryzen 7 5700X 8-Core 3.4GHz c/ Turbo 4.6GHz 36MB SktAM4',
                50,
                'Quando você tem a arquitetura de processador mais avançada do mundo para jogadores e criadores de conteúdo, as possibilidades 
                são infinitas. Esteja você a jogar os jogos mais recentes, a projetar o próximo projeto ou a processador uma enorme quantidade 
                de dados, você precisa de um processador poderoso que possa lidar com tudo - e muito mais. Sem dúvida, os processadores AMD 
                Ryzen™ série 5000 definem o padrão para jogadores e artistas.;

                OS PROCESSADORES DA SÉRIE 5000 TÊM TODOS OS MELHORES RECURSOS PARA MANTÊ-LO NO JOGO;
                O núcleo de processador mais rápido do mundo para os processadores mais rápidos do mundo. Os processadores AMD Ryzen™ série 5000 
                são construídos com arquitetura de 7 nm, que oferece taxas de frames extremamente altas com alta qualidade de imagem. Os 
                processadores AMD Ryzen™ série 5000 capacitam a próxima geração de jogos exigentes, proporcionando experiências imersivas únicas 
                e dominando qualquer tarefa multithread como 3D e renderização de vídeo e compilação de software.;

                AS ÚLTIMAS TECNOLOGIAS - OS PROCESSADORES AMD RYZEN™ POSSUEM OS MELHORES RECURSOS PARA MANTÊ-LO NO JOGO;
                Com grande poder de processamento, vêm as tecnologias de ponta para oferecer suporte. Todos os processadores AMD Ryzen™ série 5000 
                vêm com um conjunto completo de tecnologias projetadas para elevar a capacidade de processamento do seu PC, incluindo Precision Boost, 
                Precision Boost Overdrive e PCIe® 4.0.;

                ARQUITETURA "ZEN 3" DE 7NM;
                O núcleo de processador mais rápido do mundo para os processadores de jogos mais rápidos do mundo.;',
                269.90,
                15,
                TRUE,
                'Processadores');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (5,
                'Processador AMD Ryzen 5 5600X 6-Core 3.7GHz c/ Turbo 4.6GHz 35MB SktAM4',
                85,
                'Quando tem a arquitetura de processador mais avançada do mundo para jogadores e criadores de conteúdo, as possibilidades 
                 são infinitas. Esteja você a jogar os jogos mais recentes, a projetar o próximo projeto ou a processador uma enorme quantidade
                 de dados, você precisa de um processador poderoso que possa lidar com tudo - e muito mais. Sem dúvida, os processadores AMD 
                 Ryzen™ série 5000 definem o padrão para jogadores e artistas.;

                OS PROCESSADORES DA SÉRIE 5000 TÊM TODOS OS MELHORES RECURSOS PARA MANTÊ-LO NO JOGO;
                O núcleo de processador mais rápido do mundo para os processadores mais rápidos do mundo. Os processadores AMD Ryzen™ série 5000 
                são construídos com arquitetura de 7 nm, que oferece taxas de frames extremamente altas com alta qualidade de imagem. Os 
                processadores AMD Ryzen™ série 5000 capacitam a próxima geração de jogos exigentes, proporcionando experiências imersivas únicas 
                e dominando qualquer tarefa multithread como 3D e renderização de vídeo e compilação de software.;

                AS ÚLTIMAS TECNOLOGIAS - OS PROCESSADORES AMD RYZEN™ POSSUEM OS MELHORES RECURSOS PARA MANTÊ-LO NO JOGO;
                Com grande poder de processamento, vêm as tecnologias de ponta para oferecer suporte. Todos os processadores AMD Ryzen™ série 5000 
                vêm com um conjunto completo de tecnologias projetadas para elevar a capacidade de processamento do seu PC, incluindo Precision Boost, 
                Precision Boost Overdrive e PCIe® 4.0.;

                ARQUITETURA "ZEN 3" DE 7NM;
                O núcleo de processador mais rápido do mundo para os processadores de jogos mais rápidos do mundo.;',
                199.90,
                0,
                TRUE,
                'Processadores');
insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (6,
                'Processador AMD Ryzen 9 7950X 16-Core 4.5GHz c/ Turbo 5.7GHz 81MB SktAM5',
                85,
                'Bem-vindo à nova era do desempenho. O processador AMD Ryzen Série 7000 traz a velocidade do “Zen 4” para gamers e criadores 
                com poder puro para enfrentar qualquer jogo ou fluxo de trabalho no playground digital. O processador para desktop mais avançado 
                do mundo para gamers e criadores estende a liderança em desempenho da AMD para alimentar o teu PC.;

                MUDA A FORMA COMO TU JOGAS;
                Quando o teu PC tem o processador para desktop mais avançado do mundo para gamers, podes concentrar-te no que realmente importa: 
                ser vitorioso no campo de batalha digital. Estejas a jogar os títulos mais recentes ou revisitando um clássico, os processadores 
                AMD Ryzen™ Série 7000 são uma potência de jogos com núcleos “Zen 4” de alto desempenho.;

                AS TECNOLOGIAS MAIS RECENTES;
                Estejas renderizar em 3D uma cena com alto número de polígonos, exportando arquivos de vídeo massivos ou a visualizar um sonho 
                arquitetónico, os processadores AMD Ryzen™ Série 7000 são construídos para vencer o relógio. Com conectividade que economiza tempo, 
                como suporte de armazenamento PCIe® 5.0, tecnologia AMD EXPO™, muitas threads de processamento e aceleradores de vídeo dedicados, 
                eleva a tua experiência com os processadores AMD Ryzen Série 7000.;

                OVERCLOCK FACILITADO;
                Acelera os teus jogos com a tecnologia AMD EXPO™. Frequências de memória mais altas e configurações mais agressivas podem desbloquear 
                taxas de frames mais altas e suaves nos teus jogos favoritos.;

                OBTÉM O DESEMPENHO RÁPIDO DO "ZEN 4" COM MOTHERBOARDS SOCKET AMD AM5;
                Os processadores AMD Ryzen Série 7000 estão equipados com tecnologias de ponta para um PC moderno descomplicado. Os destaques incluem 
                memória DDR5 de alta velocidade, suporte PCIe® 5.0, overclocking de memória de um toque AMD EXPO™ e fabricação hipereficiente de 5 nm. 
                Coloca uma motherboard socket AMD AM5 no coração da tua configuração para dominar os jogos que amas hoje e amanhã.;',
                709.90,
                3,
                FALSE,
                'Processadores');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (7,
                'Caixa ATX Nox Hummer Quantum RGB Full Tempered Glass Preta',
                74,
                'Uma caixa robusta com um design original e inovador que permite criar efeitos de cores espetaculares graças às quatro ventoinhas ARGB de 
                120 mm que ela inclui e que você pode contemplar o tempo todo graças ao seu painel lateral de vidro temperado.;

                PAINEL FRONTAL;
                No painel frontal superior, você pode controlar a cor das ventoinhas, além de conectar até 3 USB, uma vez que possui duas conexões 2.0. e 
                uma de alta velocidade 3.0, bem como conexões de áudio.;

                OPÇÕES DE ARMAZENAMENTO;
                A Hummer Quantum oferece amplas possibilidades para uma configuração de alto desempenho. É compatível com motherboards ATX, Micro ATX e 
                ITX e possui espaço suficiente para montar dois HDDs de 3,5" e sete SSDs de 2,5". Além disso, para uma configuração mais limpa, possui um 
                sistema de roteamento de cabos de 29 mm para montagem segura e ordenada.;

                REFRIGERAÇÃO;
                Uma caixa projetada para instalar opções diferentes em termos de refrigeração e ventilação. Permite instalar até 6 ventoinhas ARGB: três 
                delas no painel frontal que estão incluídas junto com a traseira de 120 mm e a possibilidade de instalar mais duas no painel superior de 
                120 ou 140 mm. Da mesma forma, os sistemas de refrigeração líquida com radiadores 240/280 podem ser instalados nos painéis frontal e superior 
                e traseiro de 120 mm.;

                CAPACIDADE INTERNA;
                A Hummer Quantum possui um amplo espaço interno que permite a montagem de grandes componentes, como placas gráficas de até 325 mm de comprimento 
                e Cooler para CPU com uma altura máxima de 168 mm.;',
                76.90,
                5,
                FALSE,
                'Caixas');