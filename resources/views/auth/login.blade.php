<!-- Personal Area -->

<div class="modal fade show" id="sign-in-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-window sign-in" role="document">
        <div class="modal-content modal-window__window">
            <button type="button" class="btn-close close " data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-window__wrap d-flex flex-row">
                <div class="modal-window__text p-4 d-none d-sm-block">
                    <h3 class="modal-title text-white mt-3">Вход в личный кабинет</h3>
                    <p class="modal-window__text_descr text-white mt-3">Получите доступ к Личному кабинету, своим заказам, избранному и рекомендациям</p>
                </div>
                <div class="modal-window__content d-flex align-items-end flex-column text-center p-4">
                    <h3 class="modal-title text-secondary-1 mt-3 align-self-center d-block d-sm-none">Вход в личный кабинет</h3>
                    <form class="modal-window__form needs-validation" method="post" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="modal-window__form-wrap mt-4">
                            <input id="email-sign-in" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Адрес электронной почты">
                            <div class="valid-feedback">
                                Отлично!
                            </div>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    Не забывайте ставить @ и не менее двух знаков после точки
                                </div>
                            @endif
                        </div>
                        <div class="modal-window__form-wrap mt-4">
                            <input id="password-sign-in" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required type="password" name="password" placeholder="Пароль">
                            <!-- <button type="button" class="btn-eye">
                              <i class="mo-eye"></i>
                            </button> -->
                            <div class="valid-feedback">
                                Супер!
                            </div>
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    Похоже, это не ваш пароль. Постарайтесь вспомнить свой
                                </div>
                            @endif
                            <div class="invalid-feedback">
                                Похоже, это не ваш пароль. Постарайтесь вспомнить свой
                            </div>
                        </div>

                        <a class="modal-window__forget-password text-right text-secondary-3 mt-2" href="#password-recovery-modal" data-toggle="modal" data-dismiss="modal">Забыли пароль?</a>
                        <button type="submit" id="button-go-sign-in" class="btn button-blue button-big col-12 mt-3">Войти</button>
                    </form>
                    <div class="modal-window__bottom d-flex flex-column mt-auto">
                        <div class="modal-window__transition mb-3">Нет аккаунта?</div>
                        <button type="button" class="btn button-white mb-2" data-toggle="modal" data-dismiss="modal" data-target="#sign-out-modal">Зарегистрироваться</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Forget Password -->
<div class="modal fade show" id="password-recovery-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-window password-recovery" role="document">
        <div class="modal-content modal-window__window">
            <button type="button" class="btn-close close " data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-window__wrap d-flex flex-row">
                <div class="modal-window__text p-4 d-none d-sm-block">
                    <h3 class="modal-title text-white mt-3">Не нужно переживать</h3>
                    <p class="modal-window__text_descr text-white mt-3">Просто введите адрес электронной почты и письмо с инструкцией для восстановления пароля придет к вам на почту.</p>
                </div>
                <div class="modal-window__content d-flex align-items-start flex-column text-center p-4">
                    <h3 class="modal-title text-secondary-1 mt-3 align-self-center d-block d-sm-none">Восстановление пароля</h3>
                    <form class="modal-window__form needs-validation" method="post" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="modal-window__form-wrap mt-4">
                            <input id="email-sign-password" type="email" name="email" class="form-control" required placeholder="Адрес электронной почты:">
                            <div class="valid-feedback">
                                Отлично!
                            </div>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    Не забывайте ставить @ и не менее двух знаков после точки
                                </div>
                                @endif
                        </div>
                        <button type="submit" id="get-password" class="btn button-blue button-big col-12 mt-3">Получить пароль</button>
                    </form>
                    <div class="modal-window__bottom d-flex flex-column mt-auto">
                        <h5 class="modal-window__transition mb-3">Вспомнили?</h5>
                        <button type="button" class="btn button-white button-big mb-2" data-toggle="modal" data-dismiss="modal" data-target="#sign-in-modal">Войти</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade show" id="sign-out-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-window sign-out" role="document">
        <div class="modal-content modal-window__window">
            <button type="button" class="btn-close close " data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-window__wrap d-flex">
                <div class="modal-window__text p-4 d-none d-sm-block">
                    <h3 class="modal-title text-white mt-3">Регистрация нового пользователя</h3>
                    <p class="modal-window__text_descr text-white mt-3">Нажимая «Создать учетную запись», вы подтверждаете, что прочитали и соглашаетесь с <a href="#" class="text-secondary-4">Правилами порталa</a> и <a href="#" class="text-secondary-4">Политикой
                            конфиденциальности.</a></p>
                </div>
                <div class="modal-window__content d-flex align-items-start flex-column text-center p-4">
                    <h3 class="modal-title text-secondary-1 mt-3 align-self-center d-block d-sm-none">Регистрация нового пользователя</h3>
                    <form class="modal-window__form needs-validation" method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="modal-window__form-wrap mt-4">
                            <input id="email-sign-out" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="Адрес электронной почты">
                            <div class="valid-feedback">
                                Отлично!
                            </div>
                            @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                Не забывайте ставить @ и не менее двух знаков после точки
                            </div>
                                @endif
                        </div>
                        <div class="modal-window__form-wrap mt-4">
                            <input id="password-sign-out" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required type="password" name="password" placeholder="Придумайте пароль">
                            <div class="valid-feedback">
                                Отличный пароль!
                            </div>
                            @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                Этот пароль так себе. Вы можете лучше!
                            </div>
                            @endif
                            <!-- <button type="button" class="btn-eye">
                              <i class="mo-eye"></i>
                            </button> -->
                        </div>
                        <div class="modal-window__form-wrap mt-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Подтвердите пароль">
                        </div>
                        <button type="submit" id="button-registration" class="btn button-blue col-12 mt-4">Зарегистрироваться</button>
                    </form>
                    <div class="modal-window__bottom d-flex flex-column mt-auto">
                        <h5 class="modal-window__transition mb-3">Зарегистрированы?</h5><button type="button" class="btn button-white mb-2" data-toggle="modal" data-dismiss="modal" data-target="#sign-in-modal">Войти</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
