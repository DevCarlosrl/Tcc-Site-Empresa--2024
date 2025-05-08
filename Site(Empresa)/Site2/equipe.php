<!DOCTYPE html>
<html lang="pt=br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
                    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/equipe.css" />
    <title>Equipe</title>
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
          <li><a href="#">Equipe</a></li>
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
        <div class="header__content">
          <h1>Conheça os Integrantes da nossa empresa</h1>
        </div>
      </div>
    </header>
    <section class="service" id="service">
        <div class="section__container service__container">
          <p class="section__subheader">Equipe</p>
          <h2 class="section__header">Conheça o nosso time</h2>
          <p class="section__description">
              Uma equipe repleta de profissionais dedicados.
          </p>
          <div class="service__grid">
            <div class="service__card">
              <img src="assets/img/Carlos.png" alt="service" />
              <h4>Carlos Eduardo</h4>
              <p>
                  CEO / Programador
              </p>
            </div>
            <div class="service__card">
              <img src="assets/img/Joao.png" alt="service" />
              <h4>João Lucas</h4>
              <p>
                Programador
              </p>
            </div>
            <div class="service__card">
              <img src="assets/img/Isaac.png" alt="service" />
              <h4>Isaac Soares</h4>
              <p>
                Designer 
              </p>
            </div>
            <div class="service__card">
              <img src="assets/img/Miguelf.png" alt="service" />
              <h4>Miguel Faustino</h4>
              <p>
                  Designer
              </p>
            </div>
          </div>
        </div>
        
      </section>
      
      <section class="service" id="service">
        <div class="section__container service__container">
          <div class="service__grid">
            <div class="service__card">
              <img src="assets/img/lipe.png" alt="service" />
              <h4>Luiz Felipe</h4>
              <p>
                  Designer</p>
            </div>
            <div class="service__card">
              <img src="assets/img/Miguela.png" alt="service" />
              <h4>Miguel Angelo</h4>
              <p>
                Analista
              </p>
            </div>
            <div class="service__card">
              <img src="assets/img/RuanL.png" alt="service" />
              <h4>Ruan Leonardo</h4>
              <p>
                  Análista 
              </p>
            </div>

            <div class="service__card">
              <img src="assets/img/Juan.png" alt="service" />
              <h4>Juan Victor</h4>
              <p>
                  Analista 
              </p>
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
              <p>Phone: <span>+xx xxxxx-xxxx</span></p>
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