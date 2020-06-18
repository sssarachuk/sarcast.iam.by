<hr class="line_login">
<div class="row" style="background:#ECECEC">
    <div class="container">
            <h1 class="login">Авторизуйтесь</h1>
    </div>
</div>

<div class="container">
    <div class="col-lg-4 col-md-4">
        <form id="login-form" action="<?=Yii::app()->createUrl('/site/login')?>" method="post">
        <div class="form_login">           
            <input name="LoginForm[username]" class="form-control" placeholder="Логин" type="text">
            <input name="LoginForm[password]" class="form-control" placeholder="Пароль" type="password">
                
            <button type="submit" class="btn btn-default custom-button btn-lg green"><a>Вход</a></button>
        </div>
        </form>
    </div>
</div>