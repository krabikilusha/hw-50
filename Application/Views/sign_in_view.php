<h1>Вход в систему или Регистрация...</h1>

<div class="auth-container">
    <div class="auth-form__container">
        <h3>Авторизация</h3>
        <form class="auth-form" action="/sign_in" autocomplete="off" method="post">
            <div class="mb-3">
                <label for="inputLogin" class="form-label">Логин</label>
                <input type="text" class="form-control" name="login" id="inputLogin" aria-describedby="loginHelp" required>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password" id="inputPassword" required>
                <div id="passwordHelp" class="form-text">Введите пароль.</div>
            </div>
            <input type="submit" class="btn btn-primary mt-3" value="Войти" name="sign_in">
        </form>
    </div>

   <div class="auth-form__container">
        <h3>Регистрация</h3>
        <form class="auth-form" action="/sign_in" autocomplete="off" method="post">
            <div class="mb-3">
                <label for="inputLogin" class="form-label">Логин</label>
                <input type="text" class="form-control" name="login" id="inputLogin" required>
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">ФИО</label>
                <input type="text" class="form-control" name="name" id="inputName" aria-describedby="nameHelp" required>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password" id="inputPassword" aria-describedby="passwordHelp" required>
                <div id="passwordHelp" class="form-text">Введите пароль.</div>
            </div>
            <input type="submit" class="btn btn-primary mt-3" value="Зарегистрироваться" name="register">
        </form>
    </div>
</div>