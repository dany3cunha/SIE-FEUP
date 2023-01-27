
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
                'Os processadores para desktop Intel® Core™ da 12ª Geração oferecem uma nova arquitetura híbrida de desempenho, combinando núcleos de desempenho com núcleos eficientes para aprimorar jogos, produtividade e criação. Num avanço arrojado no desempenho do núcleo, os processadores para desktop Intel® Core™ da 12ª Geração oferecem uma abordagem revolucionária da arquitetura x86.

                TECNOLOGIA DE NÚCLEO INOVADORA
                Num avanço arrojado no desempenho do núcleo, os processadores para desktop Intel® Core™ da 12ª Geração oferecem uma abordagem revolucionária da arquitetura x86. Os seus núcleos de desempenho, ou “P-cores”, são otimizados para desempenho com thread único ou leve, enquanto os seus núcleos eficientes, ou “E-cores”, são otimizados para escalar cargas de trabalho com threading pesado. O Intel® Thread Director ajuda a monitorizar e analisar dados de desempenho em tempo real para colocar ininterruptamente o thread de aplicação ideal no núcleo certo e otimizar o desempenho por watt. Isso significa que os jogadores, criadores e profissionais podem aproveitar a inteligência e a potência para aprimorar as experiências mais importantes.

                A ACELERAÇÃO NA INOVAÇÃO DA PLATAFORMA
                Aproveite as mais recentes tecnologias de plataforma que impulsionam jogos, fluxo de trabalho e criação. Os processadores para desktop Intel® Core™ da 12ª Geração oferecem até 20 lanes (16 PCIe 5.0 e 4 PCIe 4.0) para impulsionar o desempenho ideal de gráficos dedicados e armazenamento, por possibilitar pontos de conexão de largura de banda mais alta. O DDR5 oferece velocidades rápidas de até 4800 MT/s, o que permite maior velocidade de largura de banda da memória em comparação com as gerações anteriores que usam a memória DDR4 3200 MT/s. Ajuste o desempenho e a potência de computação com processadores para desktop Intel® Core™ da 12ª Geração desbloqueados com capacidade de overclocking avançado e suporte de ajuste avançado com a Intel® Extreme Tuning Utility (XTU). Com esses e outros aprimoramentos da plataforma, você poderá trabalhar, jogar e criar com controlo e confiança impressionantes.',
                184.90,
                0,
                TRUE,
                'Processadores');


insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria)
        values (2,
                'Processador Intel Core i5-13400F 10-Core c/ Turbo 4.6GHz 20MB Skt1700',
                150,
                'DESEMPENHO NEXT LEVEL
                Diga olá aos novos processadores Raptor Lake. Os incríveis processadores da 13ª Geração Intel estão aqui para quebrar os limites do poder de processamento moderno. Liberte o poder do desempenho de próximo nível com o processador de desktop Intel® Core™ de 13ª geração.

                DESEMPENHO E MULTITARES REVOLUCIONÁRIOS
                A nova arquitetura híbrida de desempenho da Intel levará a sua jogabilidade além do desempenho e a sua experiência mais imersiva até agora. Tenha o poder de fazer tudo!

                INTEL THREAD DIRECTOR
                Mantém os seus jogos livres de interrupções, garantindo que as suas tarefas em segundo plano nunca o atrapalhem.

                PRONTO PARA O QUE VEM A SEGUIR
                Os processadores de desktop Intel Core de 13ª Geração oferecem suporte de amplo espectro para permitir que você personalize e otimize o seu sistema para atender às suas necessidades usando as mais recentes tecnologias de jogos.

                OPÇÕES DE MEMÓRIA EXPANDIDA
                O suporte para memória DDR4 e DDR5 oferece controlo total sobre as suas configurações de memória.

                DESENVOLVA A SUA CONFIGURAÇÃO
                O suporte para a tecnologia Thunderbolt™ 4 oferece uma maneira simples e rápida de conectar os seus periféricos.',
                239.90,
                0,
                TRUE,
                'Processadores');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria)
        values (3,
                'Processador Intel Core i7-13700KF 16-Core 2.5GHz c/ Turbo 5.4GHz 30MB Skt1700',
                100,
                'Com um aumento na contagem de núcleos, estes processadores continuam a utilizar a arquitetura híbrida de desempenho Intel para otimizar os seus jogos, criação de conteúdo e produtividade. Aproveite a largura de banda líder do setor de até 16 vias PCIe 5.0 e memória DDR5 de até 5600 MT/s. Turbine o desempenho do seu CPU com um poderoso conjunto de ferramentas de ajuste e overclocking. Desfrute das suas experiências favoritas em até 4 monitores 4K60 simultâneos ou vídeo HDR de até 8K60 com supressão de ruído dinâmico. O suporte para chipsets da série Intel® 700 e a compatibilidade retroativa com os chipsets da série Intel® 600 permitem aceder aos recursos de que você precisa para qualquer tarefa. Esteja você a trabalhar, transmitir, jogar ou criar, os processadores para desktop Intel® Core™ da 13ª Geração oferecem a próxima geração de desempenho inovador.

                DESEMPENHO DE ÚLTIMA GERAÇÃO
                Os processadores para desktop Intel® Core™ da 13ª Geração oferecem a próxima geração de desempenho de núcleo inovador. A tecnologia Intel® Turbo Boost Max 3.0 fortalece ainda mais o desempenho de threading leve, identificando os Performance-cores de melhor desempenho. Enquanto isso, os E-cores adicionais permitem um aumento na Cache Inteligente Intel® (L3) para um processamento mais eficiente de conjuntos de dados maiores e um melhor desempenho. A cache L2 dos P-cores e E-cores também aumentou em comparação com a geração anterior de processadores Intel®, minimizando a quantidade de tempo usada para transferir dados entre o cache e a memória, para acelerar o seu fluxo de trabalho Liberte a potência do desempenho de próximo nível com a vantagem dos processadores para desktop Intel® Core™ da 13ª Geração.

                RECURSOS DE PLATAFORMA DINÂMICOS
                Carregados com as tecnologias de plataforma mais recentes, os processadores para desktop Intel® Core™ da 13ª Geração aceleram o desempenho do sistema. Até 16 vias PCIe 5.0 duplicam a taxa de transferência de E/S para uma potência de processamento acelerada. Aproveite o mais recente suporte para DDR5 que está a transformar o setor para velocidades rápidas de até 5600 MT/s, alta largura de banda e maior produtividade, bem como o suporte contínuo para DDR4 de até 3200 MT/s. Suporte abrangente para ajuste avançado e overclocking — incluindo o Intel® Extreme Tuning Utility, Intel® Extreme Memory Profile, e Intel® Dynamic Memory Boost — oferecem desempenho de overclocking inteligente, para que overclockers novatos e experientes possam obter mais dos seus processadores desbloqueados. E a compatibilidade retroativa com os chipsets série Intel 600 e 700 oferece a flexibilidade de atualizar sem comprometer o desempenho ou os recursos.

                CONSTRUÍDOS PARA JOGOS MODERNOS
                Criado para jogadores que procuram o máximo desempenho para jogar os jogos mais recentes, além de ter recursos para lidar com outras cargas de trabalho. Os novos PCs baseados no processador Intel Core de 13ª geração tornam tudo isso possível.',
                459.90,
                0,
                TRUE,
                'Processadores');
insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria)
        values (4,
                'Processador AMD Ryzen 7 5700X 8-Core 3.4GHz c/ Turbo 4.6GHz 36MB SktAM4',
                50,
                'Quando você tem a arquitetura de processador mais avançada do mundo para jogadores e criadores de conteúdo, as possibilidades são infinitas. Esteja você a jogar os jogos mais recentes, a projetar o próximo projeto ou a processador uma enorme quantidade de dados, você precisa de um processador poderoso que possa lidar com tudo - e muito mais. Sem dúvida, os processadores AMD Ryzen™ série 5000 definem o padrão para jogadores e artistas.

                OS PROCESSADORES DA SÉRIE 5000 TÊM TODOS OS MELHORES RECURSOS PARA MANTÊ-LO NO JOGO
                O núcleo de processador mais rápido do mundo para os processadores mais rápidos do mundo. Os processadores AMD Ryzen™ série 5000 são construídos com arquitetura de 7 nm, que oferece taxas de frames extremamente altas com alta qualidade de imagem. Os processadores AMD Ryzen™ série 5000 capacitam a próxima geração de jogos exigentes, proporcionando experiências imersivas únicas e dominando qualquer tarefa multithread como 3D e renderização de vídeo e compilação de software.

                AS ÚLTIMAS TECNOLOGIAS - OS PROCESSADORES AMD RYZEN™ POSSUEM OS MELHORES RECURSOS PARA MANTÊ-LO NO JOGO
                Com grande poder de processamento, vêm as tecnologias de ponta para oferecer suporte. Todos os processadores AMD Ryzen™ série 5000 vêm com um conjunto completo de tecnologias projetadas para elevar a capacidade de processamento do seu PC, incluindo Precision Boost, Precision Boost Overdrive e PCIe® 4.0.

                ARQUITETURA "ZEN 3" DE 7NM
                O núcleo de processador mais rápido do mundo para os processadores de jogos mais rápidos do mundo.',
                269.90,
                15,
                TRUE,
                'Processadores');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (5,
                'Processador AMD Ryzen 5 5600X 6-Core 3.7GHz c/ Turbo 4.6GHz 35MB SktAM4',
                85,
                'Quando tem a arquitetura de processador mais avançada do mundo para jogadores e criadores de conteúdo, as possibilidades são infinitas. Esteja você a jogar os jogos mais recentes, a projetar o próximo projeto ou a processador uma enorme quantidade de dados, você precisa de um processador poderoso que possa lidar com tudo - e muito mais. Sem dúvida, os processadores AMD Ryzen™ série 5000 definem o padrão para jogadores e artistas.

                OS PROCESSADORES DA SÉRIE 5000 TÊM TODOS OS MELHORES RECURSOS PARA MANTÊ-LO NO JOGO
                O núcleo de processador mais rápido do mundo para os processadores mais rápidos do mundo. Os processadores AMD Ryzen™ série 5000 são construídos com arquitetura de 7 nm, que oferece taxas de frames extremamente altas com alta qualidade de imagem. Os processadores AMD Ryzen™ série 5000 capacitam a próxima geração de jogos exigentes, proporcionando experiências imersivas únicas e dominando qualquer tarefa multithread como 3D e renderização de vídeo e compilação de software.

                AS ÚLTIMAS TECNOLOGIAS - OS PROCESSADORES AMD RYZEN™ POSSUEM OS MELHORES RECURSOS PARA MANTÊ-LO NO JOGO
                Com grande poder de processamento, vêm as tecnologias de ponta para oferecer suporte. Todos os processadores AMD Ryzen™ série 5000 vêm com um conjunto completo de tecnologias projetadas para elevar a capacidade de processamento do seu PC, incluindo Precision Boost, Precision Boost Overdrive e PCIe® 4.0.

                ARQUITETURA "ZEN 3" DE 7NM
                O núcleo de processador mais rápido do mundo para os processadores de jogos mais rápidos do mundo.',
                199.90,
                0,
                TRUE,
                'Processadores');
insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (6,
                'Processador AMD Ryzen 9 7950X 16-Core 4.5GHz c/ Turbo 5.7GHz 81MB SktAM5',
                85,
                'Bem-vindo à nova era do desempenho. O processador AMD Ryzen Série 7000 traz a velocidade do “Zen 4” para gamers e criadores com poder puro para enfrentar qualquer jogo ou fluxo de trabalho no playground digital. O processador para desktop mais avançado do mundo para gamers e criadores estende a liderança em desempenho da AMD para alimentar o teu PC.

                MUDA A FORMA COMO TU JOGAS
                Quando o teu PC tem o processador para desktop mais avançado do mundo para gamers, podes concentrar-te no que realmente importa: ser vitorioso no campo de batalha digital. Estejas a jogar os títulos mais recentes ou revisitando um clássico, os processadores AMD Ryzen™ Série 7000 são uma potência de jogos com núcleos “Zen 4” de alto desempenho.

                AS TECNOLOGIAS MAIS RECENTES
                Estejas renderizar em 3D uma cena com alto número de polígonos, exportando arquivos de vídeo massivos ou a visualizar um sonho arquitetónico, os processadores AMD Ryzen™ Série 7000 são construídos para vencer o relógio. Com conectividade que economiza tempo, como suporte de armazenamento PCIe® 5.0, tecnologia AMD EXPO™, muitas threads de processamento e aceleradores de vídeo dedicados, eleva a tua experiência com os processadores AMD Ryzen Série 7000.

                OVERCLOCK FACILITADO
                Acelera os teus jogos com a tecnologia AMD EXPO™. Frequências de memória mais altas e configurações mais agressivas podem desbloquear taxas de frames mais altas e suaves nos teus jogos favoritos.

                OBTÉM O DESEMPENHO RÁPIDO DO "ZEN 4" COM MOTHERBOARDS SOCKET AMD AM5
                Os processadores AMD Ryzen Série 7000 estão equipados com tecnologias de ponta para um PC moderno descomplicado. Os destaques incluem memória DDR5 de alta velocidade, suporte PCIe® 5.0, overclocking de memória de um toque AMD EXPO™ e fabricação hipereficiente de 5 nm. Coloca uma motherboard socket AMD AM5 no coração da tua configuração para dominar os jogos que amas hoje e amanhã.',
                709.90,
                3,
                FALSE,
                'Processadores');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (7,
                'Caixa ATX Nox Hummer Quantum RGB Full Tempered Glass Preta',
                74,
                'Uma caixa robusta com um design original e inovador que permite criar efeitos de cores espetaculares graças às quatro ventoinhas ARGB de 120 mm que ela inclui e que você pode contemplar o tempo todo graças ao seu painel lateral de vidro temperado.

                PAINEL FRONTAL
                No painel frontal superior, você pode controlar a cor das ventoinhas, além de conectar até 3 USB, uma vez que possui duas conexões 2.0. e uma de alta velocidade 3.0, bem como conexões de áudio.

                OPÇÕES DE ARMAZENAMENTO
                A Hummer Quantum oferece amplas possibilidades para uma configuração de alto desempenho. É compatível com motherboards ATX, Micro ATX e ITX e possui espaço suficiente para montar dois HDDs de 3,5" e sete SSDs de 2,5". Além disso, para uma configuração mais limpa, possui um sistema de roteamento de cabos de 29 mm para montagem segura e ordenada.

                REFRIGERAÇÃO
                Uma caixa projetada para instalar opções diferentes em termos de refrigeração e ventilação. Permite instalar até 6 ventoinhas ARGB: três delas no painel frontal que estão incluídas junto com a traseira de 120 mm e a possibilidade de instalar mais duas no painel superior de 120 ou 140 mm. Da mesma forma, os sistemas de refrigeração líquida com radiadores 240/280 podem ser instalados nos painéis frontal e superior e traseiro de 120 mm.

                CAPACIDADE INTERNA
                A Hummer Quantum possui um amplo espaço interno que permite a montagem de grandes componentes, como placas gráficas de até 325 mm de comprimento e Cooler para CPU com uma altura máxima de 168 mm.',
                76.90,
                5,
                FALSE,
                'Caixas');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (8,
                'Placa Gráfica Asus TUF Gaming GeForce RTX 3070 V2 8GB GDDR6 OC Edition LHR',
                0,
                'As placas gráficas GeForce RTX™ Série 30 oferecem o melhor desempenho para jogadores e criadores. Elas são alimentados por Ampere - a arquitetura RTX de 2ª geração da NVIDIA - com novos núcleos RT, núcleos Tensor e multiprocessadores de streaming para gráficos Ray Tracing mais realistas e recursos de AI de ponta.

                RTX. IT’S ON. RAY TRACING E INTELIGÊNCIA ARTIFICIAL IMPRESSIONANTES.
                Joga os melhores jogos da atualidade como nunca antes, com a fidelidade visual do ray tracing em tempo real e o desempenho avançado da tecnologia DLSS com suporte de Inteligência Artificial. RTX. It’s On.

                ACELERAÇÃO DE INTELIGÊNCIA ARTIFICIAL DLSS.
                Utilizando os Núcleos Tensor de processamento de Inteligência Artificial dedicados da GeForce RTX, NVIDIA DLSS é uma tecnologia inovadora em termos de renderização de Inteligência artificial que aumenta a velocidade de fotogramas em 1,5 vezes ou mais com uma qualidade de imagem rigorosa. Isto oferece-te a capacidade de desempenho necessária para poderes aumentar as definições e resoluções de modo a obteres uma experiência visual incrível. A revolução da Inteligência Artificial chegou ao gaming.

                VITÓRIA MEDIDA EM MILÉSIMOS DE SEGUNDOS
                O NVIDIA Reflex proporciona a derradeira vantagem competitiva. A latência mais baixa. A melhor capacidade de resposta. Com GPUs GeForce RTX Série 30 e monitores de gaming NVIDIA® G-SYNC®. Descobre alvos mais rapidamente, aumenta a tua capacidade de reação e melhora a tua precisão através de um conjunto revolucionário de tecnologias para medir e otimizar a latência do sistema para jogos competitivos.

                AUMENTA A TUA CRIATIVIDADE
                Eleva os teus projetos criativos para um novo patamar com as GPU GeForce RTX Série 30. Desfruta de aceleração através de Inteligência Artificial nas principais aplicações criativas. Tudo isto com o apoio da plataforma NVIDIA Studio de controladores dedicados e ferramentas exclusivas. E desenvolvido para apresentar resultados em tempo recorde. Quer estejas a renderizar cenas complexas em 3D, a editar vídeo de 8K ou a fazer livestreams com a melhor qualidade de imagem e codificação, as GPU GeForce RTX oferecem-te o desempenho para dares o teu melhor.

                FAZ STREAMS COMO NINGUÉM
                Assume o protagonismo com livestreams sem interrupções, fluídas e com gráficos incríveis. A codificação e descodificação de hardware de próxima geração juntam-se para apresentar todos os teus melhores momentos com detalhes refinados. E a nova aplicação NVIDIA Broadcast eleva as tuas livestreams para um novo patamar com capacidades avançadas de Inteligência Artificial para melhorar a qualidade de áudio e vídeo com efeitos como fundo virtual, quadro automático de Webcam e remoção de ruído do microfone. As GPU GeForce RTX Série 30 proporcionam o desempenho e a qualidade de imagem de que necessitas para ofereceres o melhor possível a quem te vê, sempre.

                DIRECTX 12 ULTIMATE
                Os programadores podem agora acrescentar ainda mais efeitos gráficos espetaculares aos jogos para PC executáveis no Microsoft Windows. As placas gráficas GeForce RTX oferecem funcionalidades DX12 avançadas, como o ray tracing e o sombreamento de frequência variável, criando jogos dotados de efeitos visuais ultrarrealistas e velocidades de fotogramas ainda mais rápidas.',
                669.0,
                0,
                FALSE,
                'Placas Gráficas');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (9,
                'Placa Gráfica MSI Geforce RTX 4070 Ti Gaming X Trio 12G',
                0,
                'BEYOND FAST
                A NVIDIA® GeForce RTX® 4070 Ti oferece o ultra desempenho e as características que os jogadores e criadores entusiastas exigem. Dê vida aos seus jogos e projetos criativos com Ray Tracing e gráficos alimentados por IA. É alimentado pela arquitectura ultra-eficiente NVIDIA Ada Lovelace e 12GB de memória G6X super-rápida.

                RAY TRACING - HIPERREALISTA. HIPERRÁPIDO.
                A arquitetura Ada liberta toda a glória do ray tracing, que simula como a luz se comporta no mundo real. Com o poder da série RTX 40 e RT Cores de terceira geração, podes usufruir de mundos virtuais incrivelmente detalhados como nunca antes.

                NVIDIA DLSS 3 - O MULTIPLICADOR DE DESEMPENHO, ALIMENTADO POR AI.
                O DLSS é um avanço revolucionário em gráficos com tecnologia de AI que aumenta enormemente o desempenho. Alimentado pelos novos Tensor Cores de quarta geração e Optical Flow Accelerator nas GPUs GeForce RTX 40 Series, o DLSS 3 usa AI para criar frames adicionais de alta qualidade.

                NVIDIA REFLEX - VITÓRIA MEDIDA EM MILISSEGUNDOS
                Reflex e os GPUs GeForce RTX 40 Series oferecem a menor latência e a melhor capacidade de resposta para obter a melhor vantagem competitiva. Construído para otimizar e medir a latência do sistema, o Reflex fornece aquisição de alvos mais rápida, tempos de reação mais rápidos e a melhor precisão de mira para jogos competitivos.

                NVIDIA STUDIO - A TUA CRIATIVIDADE
                Leva os teus projetos criativos para o próximo nível com o NVIDIA Studio. Alimentado por um novo hardware dedicado, a série RTX 40 oferece desempenho inigualável em renderização 3D, edição de vídeo e design gráfico. Usufrui de acelerações RTX ricas em recursos nos principais aplicativos criativos, drivers NVIDIA Studio de classe mundial projetados para fornecer estabilidade máxima num conjunto de ferramentas exclusivas que aproveitam o poder da RTX para fluxos de trabalho criativos assistidos por AI.

                NVIDIA ENCODER - STREAMING DE ALTA QUALIDADE
                Rouba a show com gráficos incríveis e transmissão ao vivo de alta qualidade e sem interrupções. Equipada com o codificador NVIDIA de 8ª geração (NVENC), a série GeForce RTX 40 inaugura uma nova era de transmissão de alta qualidade com suporte a codificação AV1 de última geração, projetada para oferecer maior eficiência do que H.264, desbloqueando fluxos gloriosos em resoluções mais altas. Além disso, otimizações exclusivas nos teus aplicativos favoritos de transmissão ao vivo oferecem o melhor ao teu público, sempre.',
                999.90,                
                0,
                FALSE,
                'Placas Gráficas');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (10,
                'Placa Gráfica Sapphire Pulse Radeon RX 6800 XT 16GB GDDR6',
                0,
                'A placa gráfica AMD Radeon™ RX 6800 XT, alimentada pela arquitetura AMD RDNA™ 2, oferece 72 unidades avançadas de computação poderosas, 128 MB do mais recente AMD Infinity Cache e 16GB de memória GDDR6 dedicada. Criada para oferecer taxas de frames ultra elevadas e jogos em resolução 4K de alto nível.

                MODERNA. ACESSÍVEL. PODEROSA.
                Eleve a sua experiência de jogos com o software Radeon™. Aproveite recursos que oferecem uma experiência verdadeiramente imersiva nos jogos, com visuais deslumbrantes, sem tremulação e sem falhas, latência de entrada reduzida e drives otimizados para o dia 0.

                VISUAIS VÍVIDOS
                As placas gráficas AMD Radeon™ RX 6800 Series colocam você em ação com tecnologias de jogo envolventes e suporte para DirectX® 12 Ultimate. Usufrua de jogos com iluminação, sombras e reflexos realistas, juntamente com ricos detalhes graças ao DirectX® Raytracing (DXR), sombreamento de taxa variável (VRS) e recursos AMD FidelityFX, otimizados para a arquitetura AMD RDNA™ 2.

                JOGABILIDADE ELEVADA A NOVOS NÍVEIS
                A capacidade de resposta definitiva e jogos suaves são aprimorados com a tecnologia de jogos de baixa latência da AMD Radeon Anti-Lag e AMD Radeon Boost.

                O MESMO ADN DE JOGO PARA PCS E CONSOLAS
                A arquitetura AMD RDNA™ 2 é a base dos PCs e consolas de jogos da próxima geração. É a base da revolução que se aproxima em gráficos de jogos para PC e jogos em nuvem. O AMD RDNA™ 2 eleva e unifica os efeitos visuais e a jogabilidade em plataformas de vários jogos, como nenhuma outra arquitetura gráfica antes.',
                719.90,
                16,
                FALSE,
                'Placas Gráficas');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (11,
                'Caixa ATX Asus TUF Gaming GT301 Preta',
                45,
                'Caixa compactada ATX mid-tower ASUS TUF Gaming GT301 com painel lateral de vidro temperado, painel frontal em favo de mel, ventoinha RGB endereçável AURA de 120 mm e suporte para radiador de 360 mm.

                PERFORMANCE COMBAT-READY
                Um design de favo de mel perfurado espalhado pela parte frontal e superior do chassi ajuda o fluxo de ar e também empresta algum estilo a uma estética já exclusiva.

                LIGHT IT UP
                As ventoinhas RGB endereçáveis permitem trabalhar com as motherboards suportadas pela Aura. Com a exclusiva tecnologia de iluminação ASUS Aura Sync, a TUF Gaming GT301 fornece iluminação ambiente que pode ser sincronizada com outros componentes habilitados para o Aura Sync.

                JOGO COMPACTO EXCELENTE
                A TUF Gaming GT301 é uma caixa repleta de recursos e feita para as massas. A caixa compacta otimizada suporta SSDs de até 4 x 2,5”, HDDs de 2 x 3,5” e filtro de poeira de remoção rápida na frente, em cima e em baixo.',
                99.90,
                0,
                TRUE,
                'Caixas');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (12,
                'Caixa ATX Fractal Design Meshify 2 Compact Black TG Dark Tint',
                40,
                'A Meshify 2 Compact é uma caixa de alto desempenho com uma estética ousada de inspiração furtiva. O seu impressionante exterior apresenta vidro temperado nivelado sem parafusos, um painel superior totalmente removível que garante excelente acesso ao interior e uma porta USB 3.1 Tipo C frontal. O filtro de nylon frontal pode ser removido para fluxo de ar extra, permitindo que a malha frontal cuide da filtragem. A utilização inteligente do espaço permite que a Meshify 2 Compact ostente o desempenho e a capacidade de caixas maiores, apesar do seu tamanho de torre média incrivelmente compacto, e o design do fluxo de ar filtrado torna a refrigeração uma brisa.',
                169.90,
                0,
                TRUE,
                'Caixas');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (13,
                'Caixa Micro-ATX 1Life cm:pack Preta',
                120,
                'A 1Life cm:pack é uma caixa para PC Micro-ATX. A solução ideal para espaços corporativos ou escritórios domésticos.

                SOLUÇÃO FUNCIONAL
                Funcionalidade num design compacto. A solução ideal para espaços corporativos ou escritórios domésticos.

                VENTOINHA INCLUÍDA
                1Life cm:pack inclui 1 ventoinha. Poderá expandir o sistema de ventilação com instalação adicional para um total de 2 ventoinhas.',
                24.90,
                0,
                TRUE,
                'Caixas');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (14,
                'Cooler CPU Arctic Freezer i13 X 92mm',
                79,
                'O ARCTIC Freezer i13 X é um cooler compacto para CPU com uma ventoinha de 92 mm. Beneficia de um design aprimorado do dissipador de calor e um layout de heatpipes retrabalhado. Em conjunto com a ventoinha otimizada para alta pressão estática, a ARCTIC conseguiu melhorar significativamente o desempenho de refrigeração do Freezer i13 X. Com o uso de um rolamento de esferas duplo, ele é projetado para operação contínua e, portanto, também é adequado para operações 24/7. É fornecido com o composto térmico ARCTIC MX-2 pré-aplicado e possui um sistema de montagem simples.',
                23.90,
                0,
                TRUE,
                'Coolers CPU');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (15,
                'Water Cooler CPU Nox H-240 ARGB',
                199,
                'O H-240 ARGB é um kit de refrigeração líquida completo, fácil de instalar e com alto desempenho com baixo nível de ruído, graças ao radiador duplo (277 x 120 x 27 mm) e às ventoinhas com função PWM que reduzem temperatura do equipamento eficaz.

                REFRIGERAÇÃO EFICAZ
                O radiador de 240 mm e as alhetas aerodinâmicas (que reduzem a turbulência entre a ventoinha e o radiador) fornecem ao H-240 ARGB alta eficiência na troca de calor e na refrigeração de todos os seus equipamentos. Além disso, graças à função PWM, os ventoinhas ajustam automaticamente a sua velocidade às necessidades do microprocessador, garantindo uma operação sempre excelente de até 1500 RPM.

                DESIGN E ILUMINAÇÃO RGB
                O Hummer H-240 ARGB possui um sistema de iluminação LED RGB com 16,8 milhões de cores. Graças à sua compatibilidade com as tecnologias de sincronização dos principais fabricantes de motherboard, você não só poderá personalizar a sua iluminação, mas também sincronizar as suas cores com as do seu equipamento.

                ELEVADO RENDIMENTO
                O Hummer H-240 ARGB possui uma bomba com base de cobre (para alta condutividade) capaz de mover um grande fluxo de refrigerante (2100 RPM) e poder baixar instantaneamente a temperatura do processador.',
                82.90,
                0,
                FALSE,
                'Coolers CPU');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (16,
                'Fonte de Alimentação Seasonic Focus GX-650W 80 PLUS Gold Full Modular',
                87,
                'Devido ao seu pequeno fator de forma, a fonte de alimentação Focus+ Gold da Seasonic é uma ótima solução para aqueles que querem construir sistemas mais pequeno e que se preocupam com um interior arejado dentro da caixa do seu computador. Os cabos pretos totalmente modulares e pretos são fáceis de instalar, economizam espaço dentro da caixa do computador e proporcionam uma ampla personalização e possibilidades de atualização ao mesmo tempo. Possui a maior densidade de potência da sua classe e também apresenta características notáveis de estabilidade e saída durante o funcionamento.

                CERTIFICAÇÃO 80 PLUS® GOLD
                A Seasonic criou a primeira fonte de alimentação com certificação 80 PLUS® Gold no mercado e, desde então, construiu uma linha de série Gold muito popular que abrange uma gama completa de fontes de alimentação com desempenho e eficiência impecável. A certificação 80 PLUS® Gold altamente eficiente garante maior eficiência de 87%, 90% e 87% em cargas operacionais de 20%, 50% e 100%, respectivamente. A clara vantagem de comprar uma fonte de energia com a classificação 80 PLUS® Gold é o fato de que quanto menos energia for desperdiçada durante a conversão de energia, menor será o custo operacional para o utilizador.

                ROLAMENTO FLUID DYNAMIC
                A ventoinha de rolamento Flui Dynamic de alto desempenho (FDB) é projetada para tirar proveito dos efeitos de absorção do impacto do óleo. Elas são extremamente fiáveis e geram muito menos ruído e calor operacional do que as ventoinhas de rolamento de esferas. A lubrificação da superfície de apoio reduz o atrito e a vibração e, portanto, reduz o consumo geral de energia. Devido às rotações sem esforço, mais silenciosas e à sua construção robusta, esta tecnologia confiável também aumenta consideravelmente a vida útil da ventoinha.

                DESIGN COMPACTO
                Esta fonte de alimentação tem uma pequena pegada (140 mm de profundidade), sendo uma escolha ideal para toda o tipo de caixas, especialmente as mais compactas.',
                94.90,
                0,
                TRUE,
                'Fontes de Alimentação');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (17,
                'Fonte de Alimentação MSI MAG A650BN 650W 80 PLUS Bronze',
                98,
                'A MAG A650BN fornece aos jogadores uma opção de fonte de alimentação de nível básico segura, fiável e eficiente. Os seus principais recursos incluem certificação 80 PLUS Bronze, design de circuito DC para DC, single rail de 12V, PFC ativo e ventoinha de baixo ruído. A MAG A650BN será uma das melhores opções para jogadores inciantes. Após a instalação, os jogadores podem desfrutar imediatamente de uma experiência de desempenho fiável sem configurações adicionais.

                CERTIFICAÇÃO 80 PLUS BRONZE
                A eficiência da sua fonte de alimentação influencia diretamente o desempenho do sistema e o consumo de energia. A certificação 80 PLUS BRONZE promete menor consumo de energia e maior eficiência.

                VENTOINHA DE BAIXO RUÍDO DE 120MM
                O rolamento da ventoinha reduz o ruído gerado, mantendo uma excelente dissipação de calor.

                DESIGN DE CIRCUITO DC PARA DC
                O design de circuito DC-DC adotado reduz a instabilidade da tensão de saída e adiciona estabilidade ao fornecimento de energia.

                PROTEÇÃO ABRANGENTE DO CIRCUITO
                Suporta os mecanismos de proteção OCP, OVP, SCP, OPP, OTP e fornece proteção abrangente.',
                55.90,
                0,
                TRUE,
                'Fontes de Alimentação');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (18,
                'Fonte de Alimentação Corsair AX1600i Full Modular',
                25,
                'A MELHOR PSU DO MUNDO APRIMORADA
                A CORSAIR AX1600i é a mais moderna fonte de alimentação ATX digital, produzida com os melhores componentes e transistores de nitreto de gálio para oferecer mais de 94% de eficiência.

                1600W DA MELHOR ENERGIA
                Fornece 1600W de energia eficiente e contínua extremamente estável com a certificação 80 PLUS Titanium.

                COMPONENTES DE QUALIDADE SUPERIOR
                Os condensadores de 105°C 100% japoneses, os componentes internos com as melhores especificações e o design digital proporcionam uma eficiência superior a 94%.

                A ÚNICA PSU COM TRANSISTORES DE NITRETO DE GÁLIO DISPONÍVEL PARA CONSUMIDORES
                Transistores de nitreto de gálio PFC Totem Pole para eficiência superior e fator forma menor.

                DESEMPENHO ELÉTRICO DE NÍVEL INTERNACIONAL
                Voltagens incrivelmente estáveis e ruído e ondulações extremamente baixos.

                MONITORIZAÇÃO VIA SOFTWARE
                O software CORSAIR LINK permite que você monitorize vários aspectos da PSU, como a temperatura, a velocidade da ventoinha, os níveis de tensão, a corrente, a eficiência e a voltagem CA/CC, com a possibilidade de registar tudo para facilitar a solução de problemas.

                MODO DE VENTOINHA ZERO RPM
                Para uma operação praticamente silenciosa em cargas baixas e médias.

                CABOS TOTALMENTE MODULARES
                Para uma instalação mais rápida e fácil, use apenas os cabos necessários. Aqueles que não forem usados podem ser guardados na bolsa para cabos.',
                558.90,
                0,
                FALSE,
                'Fontes de Alimentação');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (19,
                'Memória RAM Kingston Fury Beast 32GB (2x16GB) DDR5-5200MHz CL40 Preta',
                55,
                'VISUALIZE. SINCRONIZE. MEMORIZE.
                As memórias DDR4 VENGEANCE RGB PRO Series com overclocking iluminam o seu PC com luzes RGB dinâmicas multizona enquanto oferece o melhor desempenho.

                LARGURA DE BANDA MÁXIMA E TEMPOS DE RESPOSTA RÁPIDOS
                Otimizadas para apresentar um excelente desempenho em momentos de pico com as mais modernas motherboards DDR4 AMD e Intel.

                CORSAIR CUE
                Ilumine o seu sistema com os diversos perfis de iluminação predefinidos ou crie os seus próprios perfis com opções de personalização praticamente ilimitadas. Sincronize a sua iluminação para todos os seus produtos iCUE compatíveis e acompanhe o desempenho com as leituras em tempo real de temperatura e frequência do poderoso software iCUE da CORSAIR.

                PCB COM DESEMPENHO PERSONALIZADO
                Oferece a mais alta qualidade de sinal para proporcionar desempenho e estabilidade superiores.

                DISSIPADOR DE CALOR EM ALUMÍNIO
                Melhora a condutividade térmica para oferecer uma excelente refrigeração da memória, mesmo com overclocking.',
                109.90,
                7,
                TRUE,
                'Memórias RAM');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (20,
                'Memória RAM Corsair Vengeance RGB Pro 32GB (2x16GB) DDR4-3200MHz CL16 Preta',
                13,
                'MAIOR DESEMPENHO JÁ NA VELOCIDADE INICIAL
                Com uma velocidade inicial agressiva, a DDR5 é 50% mais rápida do que a DDR4.

                MAIOR ESTABILIDADE PARA OVERCLOCK
                On-die ECC (ODECC) ajuda a manter a integridade dos dados para apoiar um desempenho de última geração enquanto ultrapassa os limites!

                MAIOR EFICIÊNCIA
                Com o impulso do dobro de bancos e do comprimento de "burst" e dois subcanais 32-bit independentes, a excepcional gestão dos dados da DDR5 brilha nos mais recentes jogos, programas e aplicações exigentes.

                COMPATÍVEL COM INTEL® XMP 3.0
                Timings pré-otimizados avançados, velocidade e voltagem para desempenho de overclock, possibilidades de se salvarem novos perfis XMP de usuário personalizáveis utilizando um PMIC programável.

                DISSIPADOR DE CALOR DE PERFIL BAIXO
                Um dissipador de calor com novo design combina estilo e extraordinária funcionalidade de refrigeração.',
                211.10,
                0,
                FALSE,
                'Memórias RAM');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (21,
                'Motherboard ATX Asus TUF Gaming B650-Plus',
                120,
                'TUF GAMING B650-PLUS
                A ASUS TUF GAMING B650-PLUS toma todos os elementos essenciais dos mais recentes processadores da série AMD Ryzen 7000 e combina-os com características prontas para o jogo e durabilidade comprovada. Concebida com componentes de qualidade militar, uma solução de potência atualizada e um sistema de arrefecimento abrangente, esta motherboard vai além das expectativas com um desempenho sólido e estável para jogos de maratona.

                CONTROLO INTELIGENTE
                Os controlos abrangentes formam a base da série ASUS TUF GAMING. A TUF GAMING B650 dispõe de ferramentas flexíveis para afinar todos os aspetos do seu sistema, permitindo que os ajustes de desempenho correspondam perfeitamente à forma como trabalha para maximizar a produtividade.

                DESEMPENHO SÓLIDO
                Com fornecimento de energia atualizada e opções de arrefecimento abrangentes para alimentar as mais recentes CPUs da AMD, mais suporte para memória e armazenamento mais rápidos, as TUF GAMING B650 são a base perfeita para a sua próxima plataforma de batalha AMD de alta contagem de núcleos.

                JOGO IMERSIVO
                As TUF GAMING B650 fornecem um pacote de jogos de alto desempenho, com redes ultra-rápidas para uma jogabilidade online mais suave, áudio intacto com tacos posicionais para FPS Gaming, e iluminação RGB a bordo que se sincroniza com o equipamento anexado para personalizar a sua atmosfera de jogo.',
                239.90,
                0,
                TRUE,
                'Motherboards');
insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (22,
                'Motherboard ATX MSI MAG B550 Tomahawk',
                155,
                'CONQUISTE O CAMPO DE BATALHA
                A série MAG teve origem em rigorosos testes de qualidade e foi desenhada para ser um símbolo de robustez e durabilidade. Focada em fornecer a melhor experiência do utilizador, a série MAG possui um processo de instalação simples, juntamente com uma interface amigável, tornando-a a melhor escolha para jogadores iniciantes.

                DESIGN DE HARDWARE PREMIUM
                Com anos de experiência, a MSI já está habituada à construção de motherboards de alto desempenho. As nossas equipas de P&D e engenharia conferem inúmeros projetos, avaliaram uma ampla seleção de componentes de alta qualidade e desenvolveram produtos para confiabilidade, mesmo sob condições extremas.

                SOLUÇÃO TÉRMICA PARA MAIS NÚMEROS E DESEMPENHO MAIS ALTO
                Com os processadores de mais núcleos, o design térmico e de energia é mais importante para garantir que a temperatura continue mais baixa. O dissipador de calor PWM estendido da MSI e design de circuito aprimorado garantem que a CPU de alto desempenho funcione a toda velocidade com as motherboards MSI.

                DESEMPENHO MELHORADO
                As motherboards MSI de alto desempenho são carregadas com recursos avançados e a mais recente tecnologia para superar qualquer desafio em questão, independentemente de ser um jogador, um prosumer ou um entusiasta de PC.

                CONECTIVIDADE
                As motherboards MSI são construídas com uma variedade de conectores para satisfazer os jogadores. Áudio aprimorado, recursos avançados de rede LAN, USB e Mystic Light tornam qualquer experiência de jogo imersa.

                REDE DE ALTA LARGURA DE BANDA E BAIXA LATÊNCIA
                O MAG B550 TOMAHAWK possui alta largura de banda e baixa latência de 2,5 G, além de LAN Gigabit para utilizadores avançados. A conectividade integrada de 2,5 Gbps fornece uma velocidade de transferência de dados incrível mais rápida do que nunca.',
                199.90,
                0,
                TRUE,
                'Motherboards');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (23,
                'Motherboard Micro-ATX MSI Pro B550M-P Gen3',
                85,
                'DESENHO DE FÁCIL UTILIZAÇÃO
                As motherboards MSI apresentam toneladas de design conveniente e inteligente para os utilizadores de bricolage, inúmeras ferramentas de afinação do sistema e de resolução de problemas estão à sua disposição para levar o seu sistema a novas alturas e satisfazer até o tweaker mais exigente. Torna tão fácil a instalação da sua própria motherboard sem qualquer problema.

                TOTALMENTE CONTROLÁVEL EM BIOS E SOFTWARE
                As motherboards MSI permitem-lhe gerir velocidades e temperaturas para todos os ventiladores do seu sistema e CPU. O Total Fan Control permite-lhe verificar as características do seu sistema primário numa interface gráfica simplificada. Também pode definir até 4 objetivos de temperatura para CPU e motherboard, que ajustarão automaticamente as velocidades dos ventiladores.

                CONECTIVIDADE
                A coisa mais importante da bricolage é a expansibilidade. As motherboards da série MSI PRO apresentam muitas possibilidades para as necessidades dos prosumers. LAN estável, armazenamento mais rápido e velocidade de transferência USB e outros conectores expansível estão prontos para aumentar a sua flexibilidade.

                ARMAZENAMENTO RÁPIDO E PRONTO PARA O FUTURO
                As motherboards da série MSI PRO suportam todas as mais recentes normas de armazenamento, o que permite aos utilizadores ligar qualquer dispositivo de armazenamento ultra-rápido. Maior eficiência torna o seu trabalho mais fácil.',
                109.90,
                0,
                FALSE,
                'Motherboards');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (24,
                'Motherboard ATX MSI MAG B650 Tomahawk WiFi',
                35,
                'UNIDO COMO UM
                A série MAG luta ao lado dos jogadores em busca de honra. Com elementos adicionais de inspiração militar nestes produtos de jogo, eles renasceram como símbolo de robustez e durabilidade.

                PCI-E GEN 4
                O MSI Lightning Gen 4 PCI-E representa a largura de banda de uma interface x16 a 64GB/s que duplicou em comparação com a sua geração anterior.

                ALARGUE A SUA EXPERIÊNCIA RGB COM FACILIDADE
                Adicione mais cor se quiser! O Mystic Light Extension pin header fornece uma forma intuitiva de controlar tiras RGB adicionais e outros periféricos RGB adicionados a um sistema, sem necessidade de um controlador RGB separado.

                REDE DE ALTA LARGURA DE BANDA E BAIXA LATÊNCIA
                A solução de rede premium da MSI fornece uma incrível velocidade de transferência de dados para utilizadores exigentes, com Wi-Fi 6e, Bluetooth 5.2 e conexão LAN de 2.5GbE.',
                289.90,
                20,
                TRUE,
                'Motherboards');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (25,
                'Ventoinha 120mm Corsair 1500RPM SP120 RGB ELITE White 4 Pinos PWM (Triple Pack c/ Lighting Node CORE)',
                90,
                'O kit de três ventoinhas de alto desempenho CORSAIR iCUE SP120 RGB ELITE possui oito LEDs RGB brilhantes e individualmente configuráveis em cada ventoinha, para uma atualização de iluminação RGB vívida em qualquer PC.

                TECNOLOGIA CORSAIR AIRGUIDE
                As ventoinhas SP RGB Elite Series usam paletas antivórtice para direcionar o fluxo de ar e concentrar a refrigeração, melhorando o efeito quer sejam usadas para entrada, exaustão ou montadas num radiador de refrigeração líquida ou dissipador de calor.

                FASCINANTE ILUMINAÇÃO RGB
                Oito LEDs RGB individualmente configuráveis preenchem o hub da ventoinha, espalhando-se para fora pelas lâminas semiopacas para um efeito de brilho sutil e elegante.

                CONTROLO TOTAL DO SEU EQUIPAMENTO
                Com o iCUE Lighting Node CORE incluído, você pode criar efeitos de iluminação vibrantes, dando vida ao seu sistema com uma iluminação RGB dinâmica usando o incrível software Corsair, o iCUE.

                SILENCIOSA, MAS DE ALTO DESEMPENHO
                Com níveis de ruído baixos de 18 dBA, as lâminas translúcidas da ventoinha SP RGB ELITE fornecem amplo fluxo de ar deixando a sua iluminação RGB brilhar.',
                58.90,
                0,
                TRUE,
                'Ventoinha');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (26,
                'Ventoinha 120mm Arctic P12 PWM PST RGB 0dB 2000RPM 4 Pinos PWM Preta',
                0,
                'RGB PARA CONTROLE TOTAL DE COR
                A P12 PWM PST RGB 0dB tem 12 LEDs RGB analógicos no cilindro da ventoinha. Eles podem ser controlados uniformemente e são compatíveis com os padrões RGB comuns dos principais fabricantes de motherboard. A ventoinha pode ser totalmente iluminada diretamente através da conexão RGB da motherboard ou através de um controlador externo e sincronizado com a iluminação de outro hardware.

                MODO 0DB MODE - ZERO RPM
                A velocidade da ventoinha pode ser reduzida até a paralisação via PWM. Isso permite uma operação silenciosa em IDLE e ao mesmo tempo garante o máximo desempenho quando necessário.

                SUAVIDADE MÁXIMA, VIBRAÇÃO MÍNIMA.
                O ruído operacional do motor ARCTIC recentemente desenvolvido é quase imperceptível, mesmo na velocidade mais baixa. Além disso, a P12 PWM PST A-RGB 0dB tem superfícies de contato emborrachadas e, portanto, reduz as vibrações audíveis ao mínimo.

                OTIMIZADO PARA ALTA PRESSÃO ESTÁTICA
                A P12 PWM PST RGB 0dB opera com fluxo de ar focalizado e alta pressão estática. A ventoinha garante assim uma refrigeração extremamente eficiente, mesmo com maior resistência do ar, e portanto adequado para uso em dissipadores de calor, radiadores e filtros.',
                11.90,
                0,
                FALSE,
                'Ventoinha');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (27,
                'Ventoinha 140mm Corsair 1150RPM AF140 LED Vermelho (2018) 3 Pinos (Twin Pack)',
                40,
                'ILUMINAÇÃO LED DIFUSA 
                A lâmina opaca da ventoinha produz um efeito de luz difusa para oferecer iluminação LED brilhante.

                ALTO FLUXO DE AR
                Até 62 CFM de fluxo de ar na velocidade máxima de 1.150 RPM.

                OPERAÇÃO SILENCIOSA
                As lâminas especialmente projetadas e o rolamento hidráulico oferecem uma operação silenciosa.

                O MELHOR EM FLUXO DE AR E PRESSÃO ESTÁTICA 
                A ventoinha AF 140 oferece a combinação perfeita de fluxo de ar potente e pressão estática robusta para possibilitar a instalação em gabinetes ou nos coolers de CPU CORSAIR Hydro Series com resfriamento a líquido.',
                26.90,
                1,
                TRUE,
                'Ventoinha');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (30,
                'Portátil MSI 17.3 Katana GF76 12UE-425XPT',
                10,
                'FINO COMO UMA KATANA
                Com processador Intel Core de 12ª geração e equipado com gráficos da série NVIDIA GeForce RTX 30, o Katana GF está otimizado para libertar o verdadeiro desempenho durante o jogo. O Katana GF é construído com a mesma qualidade de construção requintada usada para forjar uma lâmina. Corra com desempenho ideal e brilhe no campo de batalha.

                POTENTE DESEMPENHO PARA JOGAR
                Equipa um processador Intel Core de 12ª geração, com ganhos de desempenho de até 40% em relação à geração anterior. Obtenha mais potência com este processador e maximize a eficiência no jogo, trabalho multitarefa e produtividade.

                LAPTOPS GEFORCE RTX SÉRIE 30 - A MELHOR PERFORMANCE GAMING
                Os GPUs GeForce RTX Série 30 oferecem o melhor desempenho para jogadores e criadores. Eles são alimentados por Ampere - a arquitetura RTX de 2ª geração da NVIDIA - com novos RT Cores, Tensor Cores e multiprocessadores de streaming para os gráficos ray tracing mais realistas e recursos AI de ponta.

                TECLADO GAMING DESENVOLVIDO PARA JOGADORES
                Vem com iluminação vermelha exclusiva e construído numa blindagem de metal sólido com 1,7 mm de curso das teclas para melhor resposta tátil e responsiva. O novo teclado ergonomicamente projetado atenderá a todas as necessidades.

                SUPORTE TOTAL PARA TODAS AS POSSIBILIDADES
                Está equipado com portas I/O completas para suportar todos os tipos de transmissão de dados ou saída de exibição, maximizando a sua conectividade.',
                1549.90,
                20,
                FALSE,
                'Laptop');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (31,
                'Portátil HP Laptop 15s-eq2016np 15.6',
                20,
                'A POTÊNCIA NECESSÁRIA PARA ENFRENTAR O SEU DIA
                Mantenha-se ligado ao que é mais importante com uma bateria de longa duração e um ecrã de moldura fina. Concebido para o manter produtivo e entretido em qualquer lugar, o portátil HP de 39,6 cm (15,6 pol.) cm oferece um desempenho fiável e incorpora um ecrã de grandes dimensões, para que possa fazer streaming, navegar e executar rapidamente tarefas desde o nascer ao pôr do sol.

                PROCESSADOR AMD RYZEN
                Desfrute do desempenho impressionante do portátil. A revolucionária arquitetura e a incrível autonomia da bateria permitem um desempenho excecional de vários threads e desempenho gráfico Vega para executar tarefas multimédia exigentes.

                VEJA MAIS, TRANSPORTE MENOS.
                Fino, leve e concebido para a vida em constante mobilidade. Veja mais fotografias, vídeos e projetos num ecrã de moldura fina de 6,5 mm.

                DESEMPENHO FIÁVEL.
                Encare facilmente os dias mais atarefados com o desempenho de um processador fiável. Graças à elevada capacidade de armazenamento, pode guardar ainda mais fotografias, vídeos e documentos.

                FAÇA MUITO MAIS
                Com uma bateria de longa duração e Tecnologia HP Fast Charge, este portátil permite-lhe trabalhar, assistir a conteúdos multimédia e manter-se ligado todo o dia. O touchpad de precisão integrado com capacidade multitoque acelera a navegação e aumenta a produtividade.

                ARMAZENAMENTO SSD PCIE
                O armazenamento flash baseado em PCIe é até 17x mais rápido do que uma unidade de disco rígido tradicional de 5400 rpm de um portátil.

                PAINEL ANTIRREFLEXO
                Desfrute do sol e dos seus conteúdos favoritos com este painel antirreflexo. O facto de ser antirreflexo e de apresentar brilho reduzido significa que poderá visualizar os conteúdos com menos brilho quando estiver no exterior.

                DESIGN ELEGANTE
                Transporte facilmente este fino e leve PC de divisão para divisão ou em viagem. Quando o seu PC o acompanha onde quer que vá, nunca foi tão fácil manter-se produtivo e entretido.

                HP FAST CHARGE
                Ninguém gosta de esperar horas para carregar a bateria do seu portátil. Desligue o seu dispositivo e carregue 50% da bateria em aproximadamente 45 minutos.',
                599.90,
                5,
                FALSE,
                'Laptop');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (32,
                'Portátil Victus by HP Laptop 16-e0028np 16.1',
                15,
                'Equipado com um processador AMD, o Portátil Victus by HP (16,1 pol.) oferece tudo o que precisas para o gaming e para as necessidades diárias. Aumenta a tua flexibilidade de gaming com um teclado multiusos de gaming e desfruta de uma experiência de visualização com uma taxa de atualização rápida e sem cortes na imagem. Domina em cada jogo com um sistema de arrefecimento que impede o sobreaquecimento. Eleva a tua experiência de gaming ao máximo com o OMEN Gaming Hub. O Portátil de gaming Victus by HP (16,1 pol.) oferece tudo o que precisas para jogar e dominar. Está equipado com um potente processador AMD, uma excelente placa gráfica e um sistema de arrefecimento melhorado. E incorpora um ecrã rápido de alta resolução e o OMEN Gaming Hub. Um portátil que te oferece tudo isto.',
                1199.90,
                20,
                FALSE,
                'Laptop');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (33,
                'Computador All-in-One HP 27-dp0005np',
                9,
                'O fiável PC All-in-One HP combina a potência de um desktop com a beleza de um monitor elegante com moldura fina em três lados, tendo sido concebido para as necessidades do seu dia a dia. Com atualizações fáceis em três passos simples, pode ter a certeza de que a sua tecnologia estará sempre atualizada.

                UM PC POTENTE
                Procura um PC All-in-One potente que lhe permita encarar facilmente os dias mais atarefados com o desempenho de um processador fiável? Graças à elevada capacidade de armazenamento, pode guardar ainda mais fotografias, vídeos e documentos.

                CONCEBIDO DE FORMA ENGENHOSA
                Um ecrã de moldura fina em três lados permite-lhe ver muito mais e incorpora uma câmara de privacidade pop-up que retrai em segurança quando não está a ser usada. As portas convenientemente localizadas permitem manter o seu espaço de trabalho devidamente organizado, sem a confusão de cabos.

                ECRÃ FULL HD IPS
                Desfrute de imagens nítidas a partir de qualquer ângulo. Com amplos ângulos de visualização de 178º e uma vibrante resolução de 1920 x 1080, desfrutará sempre de uma incrível experiência de visualização dos seus conteúdos favoritos.

                PROCESSADOR MÓVEL AMD RYZEN 4000 SERIE U COM RADEON GRAPHICS
                Com o maior número de núcleos disponíveis para portáteis ultrafinos e uma incrível capacidade de resposta para jogar e trabalhar, os processadores móveis AMD Ryzen™ 4000 oferecem-lhe o desempenho para fazer muito mais, a partir de qualquer lugar – mais rápido do que nunca.',
                599.90,
                10,
                FALSE,
                'Desktop');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (34,
                'Computador Desktop Lenovo Ideacentre Gaming 5 17IAB7-903',
                10,
                'Acelera a tua entrada no gaming e esports com o computador desktop Lenovo IdeaCentre™ Gaming 5 17IAB7, equipado com processador Intel® Core™ de 12ª geração. Uma máquina verdadeiramente poderosa e preparada para o futuro que acompanha o ritmo dos melhores jogos nos próximos anos, com a capacidade de atualizar para ires ainda mais longe. Complementa o teu escritório em casa ou estação de batalha de elite com a estética funcional do generoso chassi de 17L acentuado pela iluminação azul ao longo dos painéis e padrões de listras 2D/3D na frente, melhorando a ventilação e com ótima aparência.',
                949.90,
                0,
                FALSE,
                'Desktop');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (35,
                'Mochila Lenovo Laptop Backpack 15.6 B210 Cinza',
                20,
                'A Mochila Casual B210 da Lenovo utiliza um tecido repelente de água e um design limpo e aerodinâmico para criar uma mochila perfeitamente adequada à vida moderna. Ela oferece um compartimento para laptop integrado que suporta até portáteis de até 15,6 polegadas.',
                17.90,
                0,
                FALSE,
                'Acessórios');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (36,
                'Base Ewent Notebook Cooling EW1258 c/ 2 x USB',
                5,
                'Arrefecer e prolongue a vida útil do seu portátil
                Adequado para portáteis até 17 polegadas
                5 ângulos de visão ajustáveis e ventoinha silenciosa
                Alimentado por USB e 2 portas USB adicionais
                Botão ON / OFF para ativar e desativar a ventoinha
                Pés de borracha antiderrapante
                A base de arrefecimento Ewent EW1258 para portátil com vários ângulos apresenta uma superfície de malha de metal com uma poderosa e silenciosa ventoinha de 12,5 cm para impedir o sobreaquecimento dos dispositivos. Esta base versátil pode ser usada como suporte para portátil ou como bloco de arrefecimento. O EW1258 é alimentado por USB, portanto você não precisa de uma fonte de alimentação externa. O EW1258 pode ser ajustado para 5 ângulos de visão diferentes para criar a altura de trabalho ideal. Além disso, o EW1258 adiciona 2 portas USB adicionais ao seu portátil. Os pés de borracha antiderrapante manterão o portátil no seu lugar.',
                12.90,
                0,
                FALSE,
                'Acessórios');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (37,
                'Adaptador de Alimentação Lenovo 65W AC',
                3,
                'O adaptador AC Lenovo 65W oferece acesso conveniente à alimentação onde você precisar. Mantenha-o guardado em casa ou no escritório para garantir o máximo tempo de atividade. Executa as mesmas especificações que o adaptador AC padrão de 60W fornecido com os notebooks.',
                29.90,
                0,
                FALSE,
                'Acessórios');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (38,
                'Mochila Lenovo Legion 15.6 Recon Gaming Preta',
                7,
                'A mochila gaming Legion Recon foi projetada para jogadores casuais / tradicionais que pretendem usar esta mochila não apenas para jogos, mas como um acessórios de transporte para o seu laptop diário. A mochila foi consistentemente projetada com a nova linguagem da marca Legion. Em comparação com a mochila gaming anterior, esta mochila é adequada para portáteis gaming de 15,6” e permite um ótimo equilíbrio entre proteção e design. Ela utiliza materiais duráveis e um conjunto robusto de recursos para atender ao público-alvo.
                PROTEÇÃO INCOMPARÁVEL
                Você não terá problemas em proteger o seu equipamento da vida cotidiana. Feita de um material leve que sobrevive ao desgaste diário e desafia os elementos.

                CONFORTO IMBATÍVEL
                Evite o volume com um design fino e contornado que garante conforto e proteção em movimento. Além disso, desfrute de compartimentos de acesso rápido e um circuito adicional para óculos.

                ARMAZENAMENTO INACREDITÁVEL
                Com espaço para um portátil gaming de 15,6, combinado com um grande compartimento principal, com bolsos dedicados para todos os equipamentos e acessórios para jogos.',
                59.90,
                0,
                FALSE,
                'Acessórios');

insert into produto (ref,nome,quantidade,descricao,preco,desconto,destaque,fk_subcategoria) 
        values (39,
                'Servidor Dell PowerEdge T150 M83C9 Mini Tower (4U)',
                7,
                'AUMENTAR A EFICIÊNCIA E ACELERAR AS OPERAÇÕES COM COLABORAÇÃO AUTÓNOMA
                O portfólio de gestão de sistemas OpenManage da Dell EMC domina a  complexidade da gestão e segurança das infra-estruturas TI. Utilizando as ferramentas intuitivas de ponta a ponta da Dell Technologies, as TI podem proporcionar uma experiência segura e integrada através reduzindo silos de processamento e informação para se concentrar no crescimento do negócio. O portfólio OpenManage da Dell EMC é a chave do seu motor de inovação, desbloqueando as ferramentas e automatização que o ajudam a dimensionar, gerir e proteger o seu ambiente tecnológico.

                PROTEJA OS SEUS BENS E INFRA-ESTRUTURAS DE DADOS COM RESILIÊNCIA PRÓ-ACTIVA
                O servidor Dell EMC PowerEdge T150 foi concebido com uma arquitectura ciber-resiliente, integrando profundamente a segurança em cada fase do ciclo de vida, desde a concepção até à reforma. Opere as suas cargas de trabalho numa plataforma segura ancorada por um sistema de arranque criptográfico de confiança e raiz de silício de confiança

                Mantenha a segurança do firmware do servidor com assinatura digital de pacotes de firmware
                Impeça configurações não autorizadas ou alterações de firmware com bloqueio do sistema
                Limpe de forma segura e rápida todos os dados dos suportes de armazenamento, incluindo discos rígidos, SSDs, e memória do sistema com Apagamento do Sistema
                UEFI Secure Boot evita que os sistemas inicializem sem assinatura ou firmware, aplicações e SO de dispositivos de pré-arranque não autorizados carregadores de arranque, protegendo os sistemas contra malware que corrompe o processo de arranque',
                959.90,
                10,
                FALSE,
                'Servidores');