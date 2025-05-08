<?php
session_start();

// Verifica se o usuário está logado e se é um administrador
if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] !== 'adm') {
    // Se não for um administrador, redireciona para a mesma página (ou apenas mostra uma mensagem)
    echo "<script>alert('Acesso restrito. Você não tem permissão para acessar esta página.');</script>";
    // Opcionalmente, você pode redirecionar para outra página, descomente a linha abaixo se necessário
    // header("Location: index.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Pagina de Adm</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

a {
	text-decoration: none;
}

li {
	list-style: none;
}

:root {
	--poppins: 'Poppins', sans-serif;
	--lato: 'Lato', sans-serif;

	--light: #F9F9F9;
	--blue: #3C91E6;
	--light-blue: #CFE8FF;
	--grey: #eee;
	--dark-grey: #AAAAAA;
	--dark: #342E37;
	--red: #DB504A;
	--yellow: #FFCE26;
	--light-yellow: #FFF2C6;
	--orange: #FD7238;
	--light-orange: #FFE0D3;
}

html {
	overflow-x: hidden;
}

body.dark {
	--light: #0C0C1E;
	--grey: #060714;
	--dark: #FBFBFB;
}

body {
	background: var(--grey);
	overflow-x: hidden;
}





/* SIDEBAR */
#sidebar {
	position: fixed;
	top: 0;
	left: 0;
	width: 280px;
	height: 100%;
	background: var(--light);
	z-index: 2000;
	font-family: var(--lato);
	transition: .3s ease;
	overflow-x: hidden;
	scrollbar-width: none;
}
#sidebar::--webkit-scrollbar {
	display: none;
}
#sidebar.hide {
	width: 60px;
}
#sidebar .brand {
	font-size: 24px;
	font-weight: 700;
	height: 56px;
	display: flex;
	align-items: center;
	color: var(--blue);
	position: sticky;
	top: 0;
	left: 0;
	background: var(--light);
	z-index: 500;
	padding-bottom: 20px;
	box-sizing: content-box;
}
#sidebar .brand .bx {
	min-width: 60px;
	display: flex;
	justify-content: center;
}
#sidebar .side-menu {
	width: 100%;
	margin-top: 48px;
}
#sidebar .side-menu li {
	height: 48px;
	background: transparent;
	margin-left: 6px;
	border-radius: 48px 0 0 48px;
	padding: 4px;
}
#sidebar .side-menu li.active {
	background: var(--grey);
	position: relative;
}
#sidebar .side-menu li.active::before {
	content: '';
	position: absolute;
	width: 40px;
	height: 40px;
	border-radius: 50%;
	top: -40px;
	right: 0;
	box-shadow: 20px 20px 0 var(--grey);
	z-index: -1;
}
#sidebar .side-menu li.active::after {
	content: '';
	position: absolute;
	width: 40px;
	height: 40px;
	border-radius: 50%;
	bottom: -40px;
	right: 0;
	box-shadow: 20px -20px 0 var(--grey);
	z-index: -1;
}
#sidebar .side-menu li a {
	width: 100%;
	height: 100%;
	background: var(--light);
	display: flex;
	align-items: center;
	border-radius: 48px;
	font-size: 16px;
	color: var(--dark);
	white-space: nowrap;
	overflow-x: hidden;
}
#sidebar .side-menu.top li.active a {
	color: var(--blue);
}
#sidebar.hide .side-menu li a {
	width: calc(48px - (4px * 2));
	transition: width .3s ease;
}
#sidebar .side-menu li a.logout {
	color: var(--red);
}
#sidebar .side-menu.top li a:hover {
	color: var(--blue);
}
#sidebar .side-menu li a .bx {
	min-width: calc(60px  - ((4px + 6px) * 2));
	display: flex;
	justify-content: center;
}
/* SIDEBAR */





/* CONTENT */
#content {
	position: relative;
	width: calc(100% - 280px);
	left: 280px;
	transition: .3s ease;
}
#sidebar.hide ~ #content {
	width: calc(100% - 60px);
	left: 60px;
}




/* NAVBAR */
#content nav {
	height: 56px;
	background: var(--light);
	padding: 0 24px;
	display: flex;
	align-items: center;
	grid-gap: 24px;
	font-family: var(--lato);
	position: sticky;
	top: 0;
	left: 0;
	z-index: 1000;
}
#content nav::before {
	content: '';
	position: absolute;
	width: 40px;
	height: 40px;
	bottom: -40px;
	left: 0;
	border-radius: 50%;
	box-shadow: -20px -20px 0 var(--light);
}
#content nav a {
	color: var(--dark);
}
#content nav .bx.bx-menu {
	cursor: pointer;
	color: var(--dark);
}
#content nav .nav-link {
	font-size: 16px;
	transition: .3s ease;
}
#content nav .nav-link:hover {
	color: var(--blue);
}
#content nav form {
	max-width: 400px;
	width: 100%;
	margin-right: auto;
}
#content nav form .form-input {
	display: flex;
	align-items: center;
	height: 36px;
}
#content nav form .form-input input {
	flex-grow: 1;
	padding: 0 16px;
	height: 100%;
	border: none;
	background: var(--grey);
	border-radius: 36px 0 0 36px;
	outline: none;
	width: 100%;
	color: var(--dark);
}
#content nav form .form-input button {
	width: 36px;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	background: var(--blue);
	color: var(--light);
	font-size: 18px;
	border: none;
	outline: none;
	border-radius: 0 36px 36px 0;
	cursor: pointer;
}
#content nav .notification {
	font-size: 20px;
	position: relative;
}
#content nav .notification .num {
	position: absolute;
	top: -6px;
	right: -6px;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	border: 2px solid var(--light);
	background: var(--red);
	color: var(--light);
	font-weight: 700;
	font-size: 12px;
	display: flex;
	justify-content: center;
	align-items: center;
}
#content nav .profile img {
	width: 36px;
	height: 36px;
	object-fit: cover;
	border-radius: 50%;
}
#content nav .switch-mode {
	display: block;
	min-width: 50px;
	height: 25px;
	border-radius: 25px;
	background: var(--grey);
	cursor: pointer;
	position: relative;
}
#content nav .switch-mode::before {
	content: '';
	position: absolute;
	top: 2px;
	left: 2px;
	bottom: 2px;
	width: calc(25px - 4px);
	background: var(--blue);
	border-radius: 50%;
	transition: all .3s ease;
}
#content nav #switch-mode:checked + .switch-mode::before {
	left: calc(100% - (25px - 4px) - 2px);
}
/* NAVBAR */





/* MAIN */
#content main {
	width: 100%;
	padding: 36px 24px;
	font-family: var(--poppins);
	max-height: calc(100vh - 56px);
	overflow-y: auto;
}
#content main .head-title {
	display: flex;
	align-items: center;
	justify-content: space-between;
	grid-gap: 16px;
	flex-wrap: wrap;
}
#content main .head-title .left h1 {
	font-size: 36px;
	font-weight: 600;
	margin-bottom: 10px;
	color: var(--dark);
}
#content main .head-title .left .breadcrumb {
	display: flex;
	align-items: center;
	grid-gap: 16px;
}
#content main .head-title .left .breadcrumb li {
	color: var(--dark);
}
#content main .head-title .left .breadcrumb li a {
	color: var(--dark-grey);
	pointer-events: none;
}
#content main .head-title .left .breadcrumb li a.active {
	color: var(--blue);
	pointer-events: unset;
}
#content main .head-title .btn-download {
	height: 36px;
	padding: 0 16px;
	border-radius: 36px;
	background: var(--blue);
	color: var(--light);
	display: flex;
	justify-content: center;
	align-items: center;
	grid-gap: 10px;
	font-weight: 500;
}




#content main .box-info {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
	grid-gap: 24px;
	margin-top: 36px;
}
#content main .box-info li {
	padding: 24px;
	background: var(--light);
	border-radius: 20px;
	display: flex;
	align-items: center;
	grid-gap: 24px;
}
#content main .box-info li .bx {
	width: 80px;
	height: 80px;
	border-radius: 10px;
	font-size: 36px;
	display: flex;
	justify-content: center;
	align-items: center;
}
#content main .box-info li:nth-child(1) .bx {
	background: var(--light-blue);
	color: var(--blue);
}
#content main .box-info li:nth-child(2) .bx {
	background: var(--light-yellow);
	color: var(--yellow);
}
#content main .box-info li:nth-child(3) .bx {
	background: var(--light-orange);
	color: var(--orange);
}
#content main .box-info li .text h3 {
	font-size: 24px;
	font-weight: 600;
	color: var(--dark);
}
#content main .box-info li .text p {
	color: var(--dark);	
}





#content main .table-data {
	display: flex;
	flex-wrap: wrap;
	grid-gap: 24px;
	margin-top: 24px;
	width: 100%;
	color: var(--dark);
}
#content main .table-data > div {
	border-radius: 20px;
	background: var(--light);
	padding: 24px;
	overflow-x: auto;
}
#content main .table-data .head {
	display: flex;
	align-items: center;
	grid-gap: 16px;
	margin-bottom: 24px;
}
#content main .table-data .head h3 {
	margin-right: auto;
	font-size: 24px;
	font-weight: 600;
}
#content main .table-data .head .bx {
	cursor: pointer;
}

#content main .table-data .order {
	flex-grow: 1;
	flex-basis: 500px;
}
#content main .table-data .order table {
	width: 100%;
	border-collapse: collapse;
}
#content main .table-data .order table th {
	padding-bottom: 12px;
	font-size: 13px;
	text-align: left;
	border-bottom: 1px solid var(--grey);
}
#content main .table-data .order table td {
	padding: 16px 0;
}
#content main .table-data .order table tr td:first-child {
	display: flex;
	align-items: center;
	grid-gap: 12px;
	padding-left: 6px;
}
#content main .table-data .order table td img {
	width: 36px;
	height: 36px;
	border-radius: 50%;
	object-fit: cover;
}
#content main .table-data .order table tbody tr:hover {
	background: var(--grey);
}
#content main .table-data .order table tr td .status {
	font-size: 10px;
	padding: 6px 16px;
	color: var(--light);
	border-radius: 20px;
	font-weight: 700;
}
#content main .table-data .order table tr td .status.completed {
	background: var(--blue);
}
#content main .table-data .order table tr td .status.process {
	background: var(--yellow);
}
#content main .table-data .order table tr td .status.pending {
	background: var(--orange);
}


#content main .table-data .todo {
	flex-grow: 1;
	flex-basis: 300px;
}
#content main .table-data .todo .todo-list {
	width: 100%;
}
#content main .table-data .todo .todo-list li {
	width: 100%;
	margin-bottom: 16px;
	background: var(--grey);
	border-radius: 10px;
	padding: 14px 20px;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
#content main .table-data .todo .todo-list li .bx {
	cursor: pointer;
}
#content main .table-data .todo .todo-list li.completed {
	border-left: 10px solid var(--blue);
}
#content main .table-data .todo .todo-list li.not-completed {
	border-left: 10px solid var(--orange);
}
#content main .table-data .todo .todo-list li:last-child {
	margin-bottom: 0;
}
/* MAIN */
/* CONTENT */









@media screen and (max-width: 768px) {
	#sidebar {
		width: 200px;
	}

	#content {
		width: calc(100% - 60px);
		left: 200px;
	}

	#content nav .nav-link {
		display: none;
	}
}






@media screen and (max-width: 576px) {
	#content nav form .form-input input {
		display: none;
	}

	#content nav form .form-input button {
		width: auto;
		height: auto;
		background: transparent;
		border-radius: none;
		color: var(--dark);
	}

	#content nav form.show .form-input input {
		display: block;
		width: 100%;
	}
	#content nav form.show .form-input button {
		width: 36px;
		height: 100%;
		border-radius: 0 36px 36px 0;
		color: var(--light);
		background: var(--red);
	}

	#content nav form.show ~ .notification,
	#content nav form.show ~ .profile {
		display: none;
	}

	#content main .box-info {
		grid-template-columns: 1fr;
	}

	#content main .table-data .head {
		min-width: 420px;
	}
	#content main .table-data .order table {
		min-width: 420px;
	}
	#content main .table-data .todo .todo-list {
		min-width: 420px;
	}
}
    </style>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="index.php" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Future Tech</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
	
			<li>
				<a href="pedidos.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Pedidos</span>
				</a>
			</li>
			<li>
				<a href="painelcadastro.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Painel de Cadastro</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Configurações
                    </span>
				</a>
			</li>
			<li>
				<a href="index.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Sair</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categorias</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="data:image/jpeg;base64,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">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Inicio</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>Nova ordem</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visitantes</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Vendas totais</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Ordem recente</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Usuario</th>
								<th>Ordem de data</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Ana Silva</p>
								</td>
								<td>15-09-2024</td>
								<td><span class="status completed">Completo</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Carlos Souza</p>
								</td>
								<td>13-08-2024</td>
								<td><span class="status pending">Pendencia</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Maria Santos</p>
								</td>
								<td>11-07-2024</td>
								<td><span class="status process">Em Processo</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>João Pereira</p>
								</td>
								<td>22-06-2024</td>
								<td><span class="status pending">Pendencia</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Pedro Lima</p>
								</td>
								<td>30-05-2024</td>
								<td><span class="status completed">Completo</span></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script>
        const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})
    </script>
</body>
</html>