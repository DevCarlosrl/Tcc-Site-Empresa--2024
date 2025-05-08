                <?php
                session_start();
                ?>

                <!DOCTYPE html>
                <html lang="pt-br">
                <head>
                    <meta charset="UTF-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                    <meta name="description" content="Future Tech - Transforme suas ideias em realidade. Oferecemos serviços web de alta qualidade para impulsionar seu negócio online." />
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
                    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
                    <link rel="stylesheet" href="assets/css/style.css" />
                    <title>Inicio | Future Tech</title>
                    <style>
                        .status-circle {
                            position: absolute;
                            right: 0;
                            bottom: 0.3rem;
                            font-size: 0.5rem;
                            border-radius: 50%;
                            width: 0.8rem;
                            height: 0.8rem;
                            background-color: red; /* Padrão para não logado */
                        }

                        .status-circle.logged-in {
                            background-color: var(--green); /* Verde quando logado */
                        }
                    
                :root {
                --primary: #eeeeee;
                --secondary: #227c70;
                --green: #82cd47;
                --secondary-light: rgb(34, 124, 112, 0.2);
                --secondary-light-2: rgb(127, 183, 126, 0.1);
                --white: #fff;
                --black: #393e46;

                --shadow: 0px 2px 8px 0px var(--secondary-light);
                }
                .profile-dropdown {
                            margin-right: -40px;
                            position: relative;
                            width: fit-content;
                        }

                .profile-dropdown-btn {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding-right: 1rem;
                font-size: 0.9rem;
                font-weight: 500;
                width: 150px;
                border-radius: 50px;
                color: var(--primary);
                /* background-color: white;
                box-shadow: var(--shadow); */

                cursor: pointer;
                border: 1px solid var(--secondary);
                transition: box-shadow 0.2s ease-in, background-color 0.2s ease-in,
                    border 0.3s;
                }

                .profile-dropdown-btn:hover {
                background-color: var(--secondary-light-2);
                box-shadow: var(--shadow);
                }

                .profile-img {
                position: relative;
                width: 3rem;
                height: 3rem;
                border-radius: 50%;
                background-color: white;
                background-size: cover;
                }

                .profile-img i {
                position: absolute;
                right: 0;
                bottom: 0.3rem;
                font-size: 0.5rem;
                color: var(--green);
                }

                .profile-dropdown-btn span {
                margin: 0 0.5rem;
                margin-right: 0;
                }

                .profile-dropdown-list {
                            position: absolute;
                            top: 68px;
                            width: 220px;
                            right: 0;
                            background-color: var(--white);
                            border-radius: 10px;
                            max-height: 0;
                            overflow: hidden;
                            box-shadow: var(--shadow);
                            transition: max-height 0.5s;
                        }

                .profile-dropdown-list hr {
                border: 0.5px solid var(--primary);
                }
                .profile-dropdown-list.active {
                            max-height: 500px;
                        }

                .profile-dropdown-list-item {
                padding: 0.5rem 0rem 0.5rem 1rem;
                transition: background-color 0.2s ease-in, padding-left 0.2s;
                }

                .profile-dropdown-list-item a {
                display: flex;
                align-items: center;
                text-decoration: none;
                font-size: 0.9rem;
                font-weight: 500;
                color: var(--black);
                }

                .profile-dropdown-list-item a i {
                margin-right: 0.8rem;
                font-size: 1.1rem;
                width: 2.3rem;
                height: 2.3rem;
                background-color: var(--secondary);
                color: var(--white);
                line-height: 2.3rem;
                text-align: center;
                margin-right: 1rem;
                border-radius: 50%;
                transition: margin-right 0.3s;
                }

                .profile-dropdown-list-item:hover {
                padding-left: 1.5rem;
                background-color: var(--secondary-light);
                }

                    .nav__greeting {
                            color: white; /* Garante que o texto seja branco */
                            font-weight: bold;
                        }
                        .nav__bar {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    padding: 0 2rem; /* Ajuste o padding conforme necessário */
                }

                .logo {
                    display: flex;
                    align-items: center;
                    margin-left: -10px;
                }

                .nav__welcome {
                    color: white;
                    font-size: 1rem;
                    font-weight: 500;
                    margin-left: 1rem; /* Espaçamento entre a logo e a mensagem */
                    display: inline-block;
                }

                .nav__links {
                    display: flex;
                    gap: 2rem;
                    margin-left: -180px; /* Empurra os links para a direita */
                }
                .btn {
                    background-color: #6a1b9a; /* Ajuste a cor para a cor desejada */
                    color: var(--white);
                    font-size: 1rem;
                    font-weight: 600;
                    padding: 0.8rem 1.5rem;
                    border: none;
                    border-radius: 25px; /* Deixa o botão com cantos arredondados */
                    cursor: pointer;
                    transition: background-color 0.3s ease, transform 0.2s ease;
                }

                .btn:hover {
                    background-color: #6a1b9a; /* Altera a cor ao passar o mouse */
                    transform: translateY(-3px); /* Efeito de leve elevação */
                }

                .btn:active {
                    background-color: var(--secondary-light); /* Cor ao ser clicado */
                    transform: translateY(0); /* Remove a elevação ao clicar */
                }

                    </style>
                </head>
                <body>
                <header class="header">
                    <nav>
                    <div class="nav__bar">
                    <div class="logo nav__logo">
                        <img src="assets/img/8.png" alt="Future Tech Logo" />
                        <?php 
                        if (isset($_SESSION['nome'])) {
                            echo '<span class="nav__welcome">Seja bem-vindo(a), ' . htmlspecialchars($_SESSION['nome']) . '</span>';
                        }
                        ?>
                        </div>
                    <div class="nav__menu__btn" id="menu-btn" aria-label="Menu">
                        <i class="ri-menu-3-line"></i>
                    </div>
                </div>
                <ul class="nav__links" id="nav-links">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="sobre.php">Sobre</a></li>
                        <li><a href="equipe.php">Equipe</a></li>
                        <li><a href="contato.php">Contato</a></li>
                    </ul>
                    <div class="profile-dropdown">
                        <div onclick="toggle()" class="profile-dropdown-btn">
                            <div class="profile-img">
                                <i class="status-circle <?php echo isset($_SESSION['nome']) ? 'logged-in' : ''; ?>"></i>
                            </div>
                            <span>
                                <?php 
                                echo isset($_SESSION['nome']) ? 'Logado' : 'Login'; 
                                ?>
                                <i class="fa-solid fa-angle-down"></i>
                            </span>
                        </div>
                            <ul class="profile-dropdown-list">
                                <?php if (isset($_SESSION['nome'])): ?>
                                    <li class="profile-dropdown-list-item">
                                        <a href="<?php echo ($_SESSION['nivel'] === 'adm') ? 'perfil.php' : 'editarperfil.php'; ?>">
                                            <i class="fa-regular fa-user"></i>
                                            Editar Perfil
                                        </a>
                                        </li>
                                        <li class="profile-dropdown-list-item">
                                            <a href="#">
                                                <i class="fa-regular fa-envelope"></i>
                                                Caixa de entrada
                                            </a>
                                        </li>
                                        <li class="profile-dropdown-list-item">
                                            <a href="#">
                                                <i class="fa-solid fa-chart-line"></i>
                                                Análise
                                            </a>
                                        </li>
                                        <li class="profile-dropdown-list-item">
                                            <a href="#">
                                                <i class="fa-solid fa-sliders"></i>
                                                Configurações
                                            </a>
                                        </li>
                                        <li class="profile-dropdown-list-item">
                                            <a href="#">
                                                <i class="fa-regular fa-circle-question"></i>
                                                Ajuda & Suporte
                                            </a>
                                        </li>
                                        <hr />
                                        <li class="profile-dropdown-list-item">
                                            <a href="logout.php">
                                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                                Sair
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li class="profile-dropdown-list-item">
                                            <a href="login.php">
                                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                                Login
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </nav>
                        <div class="section__container header__container" id="home">
                            <div class="header__content">
                                <h1>Transforme suas ideias em realidade</h1>
                                <div class="header__btn">
                                    <button class="btn">Saiba Mais</button>
                                </div>
                            </div>
                        </div>
                    </header>

                    <section class="banner__container">
                        <div class="banner__card">
                            <h4>Satisfação garantida.</h4>
                        </div>
                        <div class="banner__card">
                            <h4>Cuidando do seu projeto do jeito que você faria.</h4>
                        </div>
                        <div class="banner__image">
                            <img src="assets/img/banner.jpg" alt="Banner" />
                        </div>
                    </section>

                    <section class="section__container experience__container" id="about">
                        <div class="experience__image">
                            <img src="assets/img/experience.jpg" alt="Experience" />
                        </div>
                        <div class="experience__content">
                            <p class="section__subheader">QUEM NÓS SOMOS</p>
                            <h2 class="section__header">Temos 3 anos de experiência neste campo</h2>
                            <p class="section__description">
                                Atualmente a Future Tech está se preparando para o projeto de conclusão de curso (TCC) que tem como o objetivo a criação de um site para uma empresa cliente, para que ela divulgue seus serviços através dele. O site é voltado para o cliente para que ele consiga ter uma boa visibilidade e ajude na divulgação de seus produtos.
                            </p>
                            <button class="btn">Saiba Mais</button>
                        </div>
                    </section>

                    <section class="service" id="service">
                        <div class="section__container service__container">
                            <p class="section__subheader">PORQUE ESCOLHER-NOS</p>
                            <h2 class="section__header">Ótimo Serviço Web</h2>
                            <p class="section__description">Confie em nós para manter seu projeto funcionando de maneira suave e confiável.</p>
                            <div class="service__grid">
                                <div class="service__card">
                                    <img src="assets/img/service-1.jpg" alt="Site institucional" />
                                    <h4>Site institucional</h4>
                                    <p>Um site institucional nada mais é do que um espaço para a sua empresa na web.</p>
                                </div>
                                <div class="service__card">
                                    <img src="assets/img/service-2.jpg" alt="Site de ecommerce" />
                                    <h4>Site de ecommerce</h4>
                                    <p>É um tipo de negócio em que há a compra e venda de produtos totalmente através da internet.</p>
                                </div>
                                <div class="service__card">
                                    <img src="assets/img/service-3.jpg" alt="Site de portfólio" />
                                    <h4>Site de portfólio</h4>
                                    <p>É uma forma única de mostrar seu trabalho e permitir que outras pessoas saibam mais sobre você.</p>
                                </div>
                                <div class="service__card">
                                    <img src="assets/img/service-4.jpg" alt="Landing Page" />
                                    <h4>Landing Page</h4>
                                    <p>Uma página da web exibida quando um cliente clica em um anúncio ou em um link de resultado de mecanismo de pesquisa.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="customisation">
                        <div class="section__container customisation__container">
                            <p class="section__subheader">NOSSA PERSONALIZAÇÃO</p>
                            <h2 class="section__header">Serviço de Projeto com ótimo Design</h2>
                            <p class="section__description">Nossa equipe dedicada de Designers e Programadores qualificados se orgulha de oferecer serviços de primeira linha para seu amado Site.</p>
                            <div class="customisation__grid">
                                <div class="customisation__card">
                                    <h4>65+</h4>
                                    <p>Total de Projetos</p>
                                </div>
                                <div class="customisation__card">
                                    <h4>165</h4>
                                    <p>Transparência</p>
                                </div>
                                <div class="customisation__card">
                                    <h4>463+</h4>
                                    <p>Projetos concluídos</p>
                                </div>
                                <div class="customisation__card">
                                    <h4>5063</h4>
                                    <p>Prêmios recebidos</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="section__container price__container" id="price">
                        <p class="section__subheader">MELHORES PACOTES</p>
                        <h2 class="section__header">Nossos planos</h2>
                        <p class="section__description">Oferecemos uma variedade de opções de preços acessíveis e flexíveis.</p>
                        <div class="price__grid">
                                <div class="price__card">
                                <h4>Pacote Basico</h4>
                            <h3><sup>R$</sup>89,00</h3>
                            <p>Criação de Site Responsivo</p>
                            <p>SEO Básico</p>
                            <p>Suporte Técnico</p>
                            <p>Manutenção Mensal</p>
                            <p>Manutenção Mensal</p>
                            <p>Formulário de Contato</p>
                            <form action="processa_pedido.php" method="POST">
                    <input type="hidden" name="pacote_id" value="1"> <!-- Pacote Básico -->
                    <button type="submit" name="comprar" class="btn">Comprar</button>
                </form>


                    </div>
                            <div class="price__card">
                                <div class="price__card__ribbon">Mais vendido</div>
                                <h4>Pacote Intermediário</h4>
                                <h3><sup>R$</sup>140,00</h3>
                                <p>Galeria de Imagens/Portfólio</p>
                                <p>E-commerce Integrado</p>
                                <p>Blog e Conteúdo Dinâmico</p>
                                <p>SEO Avançado</p>
                                <p>Análise de Desempenho</p>
                                <p>Integração com Redes Sociais</p>
                                <form action="processa_pedido.php" method="POST">
                    <input type="hidden" name="pacote_id" value="2"> <!-- Pacote Intermediário -->
                    <button type="submit" name="comprar" class="btn">Comprar</button>
                </form>

                        </div>
                            <div class="price__card">
                                <h4>Pacote Avançado</h4>
                                <h3><sup>R$</sup>430,00</h3>
                                <p>Chat ao Vivo</p>
                                <p>Desenvolvimento Personalizado</p>
                                <p>Marketing Digital Completo</p>
                                <p>Suporte Dedicado</p>
                                <p>Otimização de Velocidade do Site</p>
                                <p>Segurança Avançada</p>
                                <form action="processa_pedido.php" method="POST">
                    <input type="hidden" name="pacote_id" value="3"> <!-- Pacote Avançado -->
                    <button type="submit" name="comprar" class="btn">Comprar</button>
                </form>


                            </div>
                        </div>
                    </section>

                    <section class="contact">
                        <div class="section__container contact__container">
                            <div class="contact__content">
                                <p class="section__subheader">CONTATE-NOS</p>
                                <h2 class="section__header">Imagine seu projeto parecendo novo de novo</h2>
                                <p class="section__description">Experimente a magia de um site rejuvenescido enquanto cuidamos do seu projeto com cuidado preciso, deixando-o como novo.</p>
                                <div class="contact__btns">
                                    <button class="btn">Nossos serviços</button>
                                    <button class="btn">Contate-Nos</button>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="section__container testimonial__container" id="client">
                        <p class="section__subheader">DEPOIMENTOS DE CLIENTES</p>
                        <h2 class="section__header">100% aprovado pelos clientes</h2>
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial__card">
                                        <img src="assets/img/testimonial-1.jpg" alt="Depoimento de Sarah T." />
                                        <p>Eu não pude acreditar no que via quando peguei meu site do serviço. Parecia como se tivesse acabado de sair da linha de produção. A equipe fez um trabalho incrível e sou cliente para o resto da vida!</p>
                                        <h4>- Sarah T.</h4>
                                    </div>
                                </div>
                                
                            <div class="swiper-pagination"></div>
                        </div>
                    </section>

                    <footer class="footer">
                        <div class="section__container footer__container">
                            <div class="footer__col">
                                <div class="logo footer__logo">
                                    <a href="#"><img src="assets/img/8.png" alt="Future Tech Logo" /></a>
                                </div>
                                <p class="section__description">Com um rico legado que abrange 3 anos, o nosso compromisso com a excelência na criação de websites é inabalável.</p>
                                <ul class="footer__socials">
                                    <li><a href="#"><i class="ri-facebook-fill" aria-label="Facebook"></i></a></li>
                                    <li><a href="#"><i class="ri-google-fill" aria-label="Google"></i></a></li>
                                    <li><a href="#"><i class="ri-instagram-line" aria-label="Instagram"></i></a></li>
                                    <li><a href="#"><i class="ri-youtube-line" aria-label="YouTube"></i></a></li>
                                </ul>
                            </div>
                            <div class="footer__col">
                                <h4>Nossos serviços</h4>
                                <ul class="footer__links">
                                    <li><a href="#">Site institucional</a></li>
                                    <li><a href="#">Site de ecommerce</a></li>
                                    <li><a href="#">Site de portfólio</a></li>
                                    <li><a href="#">Landing Page</a></li>
                                    <li><a href="#">Blog</a></li>
                                </ul>
                            </div>
                            <div class="footer__col">
                                <h4>Informações de contato</h4>
                                <ul class="footer__links">
                                    <li>
                                        <p>Experimente a magia de um site rejuvenescido enquanto cuidamos do seu projeto com cuidado preciso.</p>
                                    </li>
                                    <li>
                                        <p>Telefone: <span>+xx xxxxx-xxxx</span></p>
                                    </li>
                                    <li>
                                        <p>Email: <span>gfuture.ti123@gmail.com</span></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                    <div class="footer__bar">
                        Copyright © 2024 Future Technology. Todos os direitos reservados.
                    </div>

                    <script src="https://unpkg.com/scrollreveal"></script>
                    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
                    <script src="assets/js/main.js"></script>
                    <script>
                    
                    
                    let profileDropdownList = document.querySelector(".profile-dropdown-list");
                    let btn = document.querySelector(".profile-dropdown-btn");

                    const toggle = () => profileDropdownList.classList.toggle("active");

                    window.addEventListener("click", function (e) {
                        if (!btn.contains(e.target)) {
                            profileDropdownList.classList.remove("active");
                        }
                    });

                    </script>
                </body>
                </html>
