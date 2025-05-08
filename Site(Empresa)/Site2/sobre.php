<!DOCTYPE html>
<html lang="pt=br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
                    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/sobre.css" />
    <title>Sobre Nós</title>
    <style>
      
          .services-section {
            text-align: center;
            margin: auto;
            max-width: 1200px;
            margin-top: 50px;
            height: 80vh;
        }

        .services-section h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .services-section p {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .service-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: left;
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-card-icon {
            background-color: #ffcc00;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .service-card-icon img {
            width: 24px;
            height: 24px;
        }

        .service-card-title {
            font-size: 18px;
            margin: 0 0 10px;
            font-weight: bold;
        }

        .service-card-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
            flex-grow: 1;
        }

        .read-more {
            font-size: 14px;
            color: #007BFF;
            text-decoration: none;
            margin-top: auto;
        }

        .read-more:hover {
            text-decoration: underline;
        }

        .service-card:nth-child(2) .service-card-icon {
            background-color: #00cc66;
        }

        .service-card:nth-child(3) .service-card-icon {
            background-color: #8a3ab9;
        }

        .service-card:nth-child(4) .service-card-icon {
            background-color: #ff6633;
        }

        .projects-section {
            max-width: 1200px;
            padding-bottom: 50px;
            margin: auto;
        }

        .projects-section h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .project-card {
            background-color: #1E1E1E;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s;
        }

        .project-card:hover {
            transform: translateY(-5px);
        }

        .project-card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .project-card-content {
            padding: 15px;
        }

        .project-card-title {
            font-size: 18px;
            margin: 0 0 10px;
            font-weight: bold;
            color: #fff;
        }

        .project-card-description {
            font-size: 14px;
            margin-bottom: 10px;
            color: #aaa;
        }

        .project-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .project-tag {
            background-color: #333;
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 12px;
            color: #bbb;
        }

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



    </style>
  </head>
  <body>
    <header class="header">
      <nav>
        <div class="nav__bar">
          <div class="logo nav__logo"><img src="assets/img/8.png" alt="logo" /></div>
          <div class="nav__menu__btn" id="menu-btn">
            <i class="ri-menu-3-line"></i>
          </div>
        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="index.php">Início</a></li>
          <li><a href="sobre.php">Sobre</a></li>
          <li><a href="equipe.php">Equipe</a></li>
          <li><a href="contato.php">Contato</a></li>
          <ul>
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
      </div>
    </header>

    <section class="services-section">
        <h2>Missão, Visão e Valores</h2>
        <p>Entenda um pouco mais sobre a Missão, Visão e Valores da nossa empresa.</p>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-card-icon">
                    <img src="assets/img/benefits-4.svg" alt="SEO Icon">
                </div>
                <h3 class="service-card-title">Missão</h3>
                <p class="service-card-description">
                Promover a criação de sites que ajudam
                nossos clientes a atingir seus objetivos.
                </p>
                <a href="#" class="read-more">Saiba Mais</a>
            </div>
            <div class="service-card">
                <div class="service-card-icon">
                    <img src="assets/img/benefits-5.svg" alt="Marketing Icon">
                </div>
                <h3 class="service-card-title">Visão</h3>
                <p class="service-card-description">
                Ser reconhecida como uma empresa líder na criação de sites inovadores e funcionail. 
                </p>
                <a href="#" class="read-more">Saiba Mais</a>
            </div>
            <div class="service-card">
                <div class="service-card-icon">
                    <img src="assets/img/benefits-6.svg" alt="Viral Campaign Icon">
                </div>
                <h3 class="service-card-title">Valores</h3>
                <p class="service-card-description">
                Trabalhamos de forma colaborativa com nossos clientes, entendendo suas necessidades e objetivos.

                </p>
                <a href="#" class="read-more">Saiba Mais</a>
            </div>
            <div class="service-card">
                <div class="service-card-icon">
                    <img src="assets/img/benefits-1.svg" alt="Others Icon">
                </div>
                <h3 class="service-card-title">Objetivo</h3>
                <p class="service-card-description">
                Promover negócios e
aumentar a credibilidade e visibilidade
da nossa empresa.

                </p>
                <a href="#" class="read-more">Saiba Mais</a>
            </div>
        </div>
    </section>
    
    <section class="projects-section">
        <h2>Portfólio </h2>
        <div class="projects-grid">
            <div class="project-card">
                <img src="assets/img/2022.jpeg" alt="Site2022">
                <div class="project-card-content">
                    <h3 class="project-card-title">Website (1G ao 5G)</h3>
                    <p class="project-card-description">Website da Primeira Série</p>
                    <div class="project-tags">
                        <span class="project-tag">UX Design</span>
                        <span class="project-tag">UI Design</span>
                        <span class="project-tag">Motion Design</span>
                        <span class="project-tag">Art Direction</span>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <img src="assets/img/2023.jpeg" alt="Site2023">
                <div class="project-card-content">
                    <h3 class="project-card-title">Website (Jogos)</h3>
                    <p class="project-card-description">Website da Segunda Série</p>
                    <div class="project-tags">
                        <span class="project-tag">Web Design</span>
                        <span class="project-tag">Branding</span>
                        <span class="project-tag">Motion Design</span>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <img src="assets/img/2024.jpeg" alt="Site2024">
                <div class="project-card-content">
                    <h3 class="project-card-title">Website (Empresa Cliente)</h3>
                    <p class="project-card-description">Website da empresa cliente</p>
                    <div class="project-tags">
                        <span class="project-tag">UI Design</span>
                        <span class="project-tag">Motion Design</span>
                        <span class="project-tag">Web Design</span>
                    </div>
                </div>
            </div>
        
        </div>
    </section>

    

    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="logo footer__logo">
            <a href="#"><img src="assets/img/8.png" alt="logo" /></a>
          </div>
          <p class="section__description">
            Com um rico legado que abrange 3 anos, o nosso compromisso com a excelência na criação de websites é inabalável.

          </p>
          <ul class="footer__socials">
            <li>
              <a href="#"><i class="ri-facebook-fill"></i></a>
            </li>
            <li>
              <a href="#"><i class="ri-google-fill"></i></a>
            </li>
            <li>
              <a href="#"><i class="ri-instagram-line"></i></a>
            </li>
            <li>
              <a href="#"><i class="ri-youtube-line"></i></a>
            </li>
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
              <p>
                Experimente a magia de um site rejuvenescido enquanto cuidamos do seu projeto com cuidado preciso.
              </p>
            </li>
            <li>
              <p>Phone: <span>+91 9876543210</span></p>
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