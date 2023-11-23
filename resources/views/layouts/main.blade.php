<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    
    <div class="modal fade" id="auth" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('login') }}" method="post" id="authForm" onsubmit="ajaxForm(this, event)">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Войти</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="login" placeholder="Логин" id="loginInput" class="form-control mt-2" pattern="^[A-Za-z0-9\s]+$">
                            <div class="invalid-feedback" id="loginError"></div>
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" placeholder="Пароль" id="passwordInput" class="form-control mt-2">
                            <div class="invalid-feedback" id="passwordError"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" name="auth" class="btn btn-warning">Войти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('register') }}" method="post" id="registerForm" onsubmit="ajaxForm(this, event)">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="name" placeholder="Имя" id="nameInput" class="form-control mt-2" pattern="^[А-Яа-яЁё\s]+$">
                            <div class="invalid-feedback" id="nameError"></div>
                        </div>
                        <div class="input-group">
                            <input type="text" name="surname" placeholder="Фамилия" id="surnameInput" class="form-control mt-2" pattern="^[А-Яа-яЁё\s]+$">
                            <div class="invalid-feedback" id="surnameError"></div>
                        </div>
                        <div class="input-group">
                            <input type="text" name="patronymic" placeholder="Отчество" id="patronymicInput" class="form-control mt-2" pattern="^[А-Яа-яЁё\s]+$">
                            <div class="invalid-feedback" id="patronymicError"></div>
                        </div>
                        <div class="input-group">
                            <input type="text" name="login" placeholder="Логин" id="loginInput" class="form-control mt-2" pattern="^[A-Za-z0-9\s]+$">
                            <div class="invalid-feedback" id="loginError"></div>
                        </div>
                        <div class="input-group">
                            <input type="email" name="email" placeholder="Email" id="emailInput" class="form-control mt-2">
                            <div class="invalid-feedback" id="emailError"></div>
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" placeholder="Пароль" id="passwordInput" class="form-control mt-2">
                        </div>
                        <div class="input-group">
                            <input type="password" name="password_repeat" placeholder="Повторите пароль" id="password_repeatInput" class="form-control mt-2">
                            <div class="invalid-feedback" id="passwordError"></div>
                        </div>
                        <label for="rules" class="mt-2">
                            <input type="checkbox" name="rules" id="rules" class="form-check-input"> Согласие с правилами регистрации
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" name="register" class="btn btn-warning">Зарегистрироваться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <h5>Copy Star</h5>
                </a>
                
                <ul class="nav col-12 col-lg-auto ms-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('home') }}" class="nav-link px-2 text-secondary">Главная</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">О нас</a></li>
                    <li><a href="{{ route('home') }}" class="nav-link px-2 text-white">Каталог</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Где нас найти?</a></li>
                </ul>
                
                <div class="text-end">
                    @if (Auth::check())
                    <a href="#" class="btn btn-warning">Корзина</a>
                    <a href="{{ route('logout') }}" class="btn btn-outline-light">Выход</a>
                    @else
                    <button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#auth">Вход</button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#register">Регистрация</button>
                    @endif
                </div>
            </div>
        </div>
    </header>
    
    @yield('body')
    
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="d-flex align-items-center justify-content-between">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <h5>Copy Star</h5>
                </a>
            </div>
            <span class="text-muted">© 2022 Copy Star</span>
        </footer>
    </div>
    
    <script src="/public/js/jquery-3.6.0.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/public/js/main.js"></script>
</body>
</html>