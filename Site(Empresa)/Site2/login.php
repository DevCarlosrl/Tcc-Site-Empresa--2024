<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#phone').mask('(00) 00000-0000');
            $('#cpf').mask('000.000.000-00');
        });

        function togglePasswordVisibility() {
            const passwordField = document.getElementById('senha');
            const toggleIcon = document.getElementById('toggle-password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordField.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }
    </script>
    <style>
        .toggle-password {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 35px;
            transform: translateY(40%);
        }
        .text-field {
            position: relative;
        }
        .back-button {
            position: relative;
            right: 39em;
            top: 1em;
        }
        .back-button img {
            width: 20px;
            height: 20px;
        }
        .back-button:hover {
            opacity: 0.5;
        }

        .info-side {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2rem;
    max-height: 80rem;
    border-radius: 2rem;
    background: 
        url('assets/img/background.jpg') repeat 
        center center;
    background-position: 55% 30%;
}

    </style>
</head>
<body>
<div class="back-button">
        <a href="index.php" title="Voltar para a página inicial"><img src="assets/icons/house.svg" alt="Voltar para a página inicial"></a>
    </div>
    <div class="form-wrapper">
        <main class="form-side">
            <form class="my-form" method="POST" action="logar.php">
                <div class="form-welcome-row">
                    <h1>Login! &#128079;</h1>
                    <h2>Como eu começo?</h2>
                </div>
                <div class="socials-row">
                    <a href="#" title="Use Google">
                        <img src="assets/img/google.png" alt="Google"> Faça login no Google
                    </a>
                </div>
                <div class="socials-row">
                    <a href="#" title="Use Apple">
                        <img src="assets/img/apple.png" alt="Apple"> Faça login na Apple
                    </a>
                </div>
                <div class="divider">
                    <div class="divider-line"></div>
                    ou faça login com e-mail
                    <div class="divider-line"></div>
                </div>
                <?php if (isset($error_message)): ?>
                    <div class="error-message"><?= $error_message ?></div>
                <?php endif; ?>
                <div class="text-field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" autocomplete="off" required>
                </div>
                <div class="text-field">
                    <label for="password">Senha</label>
                    <input id="senha" type="password" name="senha" placeholder="Senha" title="Mínimo 6 caracteres, pelo menos 1 letra e 1 número" autocomplete="off" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" required>
                    <span id="toggle-password" class="toggle-password" onclick="togglePasswordVisibility()">👁️</span>
                </div>
                <button class="my-form__button" type="submit">Entrar</button>
                <div class="my-form__actions">
                    <div class="my-form__row">
                        <span>Não tem uma conta?</span>
                        <a href="register.php" title="Register">Inscreva-se agora</a>
                    </div>
                </div>
            </form>
        </main>
        <aside class="info-side">
            <article class="blockquote-wrapper">
                <h2>Por que devo fazer login?</h2>
                <p>Ao fazer login, você pode acessar seu painel pessoal, onde poderá gerenciar sua conta, visualizar seu perfil e muito mais.</p>
                <img src="assets/img/dashboard.png" alt="Dashboard">
            </article>
        </aside>
    </div>
</body>
</html>
