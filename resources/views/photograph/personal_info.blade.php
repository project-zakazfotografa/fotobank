@extends('layouts.app')
@section('content')
<div class="page-container">

    <section class="pa">

        <div class="container">

            <div class="pa-menu">
                <div class="pa-menu__nav">
                    <div class="pa-menu__nav-item pa-menu__nav-item--active">Настройки</div>
                    <div class="pa-menu__nav-item">Заявки</div>
                    <a class="pa-menu__nav-item pa-menu__profile" href="/user-page.html">На сайт</a>
                    <div class="pa-menu__nav-item pa-menu__exit">Выйти</div>
                </div>

                <div class="pa-menu__tabs-content">
                    <div class="pa-menu__tabs-item">
                        <form method="get" action="{{ route('photograph.save') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <div class="row">
                                <div class="col-3">
                                    <div class="user-page__sidebar">
                                        <div class="user-page__sidebar-content">
                                            <div class="user-page__user user-page__block">
                                                <div class="pa-user__pic">
                                                    <!-- <label>
                                                        <input class="user-page__user-input" type="file"> -->
                                                        <img src="{{ asset('img/user-no-photo.svg') }}" alt="">
                                                    <!-- </label> -->
                                                    <div class="pa-user__pic-change">
                                                      <button class="button pa-user__pic-change-btn">Обновить фотографию</button>
                                                    </div>
                                                </div>

                                                <div class="pa-user__info">
                                                    <input class="pa-input" name="name" type="text" placeholder="Имя" value="{{ $user[0]->name }}">
                                                    <input class="pa-input" type="text" placeholder="Фамилия" name="last_name" value="{{ $user[0]->userData !== null ? $user[0]->userData->last_name : '' }}">
                                                    <div class="pa-user__birthday">
                                                        <input id="pa-birthday" class="pa-input pa-user__birthday" type="text" name="birth_date" placeholder="Дата рождения" value="{{ $user[0]->userData !== null ? $user[0]->userData->birth_date : '' }}">
                                                    </div>
                                                </div>
                                                <div class="pa-user__experience">
                                                    <span>Опыт, лет</span>
                                                    <input class="pa-input" type="text" name="experience">
                                                </div>

                                            </div>
                                            <!-- /user-page__user -->

                                            <div class="user-page__contacts user-page__block">
                                                <div class="user-page__block-content">
                                                    <div class="pa-user__contacts">
                                                        <input class="pa-input" type="phone" name="phone" placeholder="Телефон для связи" value="{{ $user[0]->userData !== null ? $user[0]->userData->phone : '' }}">
                                                        <input class="pa-input" name="email" type="email" placeholder="email" value="{{ $user[0]->email }}">
                                                        <input class="pa-input" type="text" name="site" placeholder="Сайт" value="{{ $user[0]->userData !== null ? $user[0]->userData->site : '' }}">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /user-page__contacts -->

                                            <div class="user-page__buttons">
                                                <button type="submit" class="button button-blue">Сохранить</button>
                                            </div>

                                        </div>
                                        <!-- /user-page__sidebar-content -->



                                    </div>
                                    <!-- /user-page__sidebar -->
                                </div>
                                <div class="col-8">
                                    <div class="user-page__content">

                                        <div class="user-page__content-info">

                                            <div class="user-page__about pa-user__about user-page__block">
                                                <div class="user-page__block-content">
                                                    <div class="user-page__block-caption">Обо мне</div>
                                                    <textarea name="about_me" id="" cols="30" rows="10" class="pa-textarea" placeholder="Добавьте краткое описание (не более 72 символов)">{{ $user[0]->userData !== null ? $user[0]->userData->about_me : '' }}</textarea>
                                                    <div class="pa-user__features">
                                                        <div class="pa-user__features-caption">Выберите соответствующие пункты (не более 5-ти)</div>
                                                        <div class="pa-user__features-content sortable">
                                                            <div class="pa-user__features-item">Есть фотостудия</div>
                                                            <div class="pa-user__features-item">Со светом</div>
                                                            <div class="pa-user__features-item">Костюмы</div>
                                                            <div class="pa-user__features-item">Мейк ап</div>
                                                            <div class="pa-user__features-item">Мартышки</div>
                                                            <div class="pa-user__features-item">Аэросъемка</div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- /user-page__about -->


                                            <div class="pa-user__city user-page__block">
                                                <div class="user-page__block-content">
                                                    <div class="user-page__block-caption">Ваш город</div>
                                                    <div class="pa-user__city-info">
                                                        <input class="pa-input" type="text" name="city" placeholder="Ваш город" value="{{ $user[0]->userData !== null ? $user[0]->userData->city : ''}}">
                                                        <input class="pa-input" type="text" name="address" placeholder="Адрес" value="{{ $user[0]->userData !== null ? $user[0]->userData->address : '' }}">
                                                    </div>
                                                    <div class="pa-user__city-radius">
                                                        <span class="pa-user__city-radius-text">Показывать заявки в радиусе: </span>
                                                        <select class="pa-select" name="show_orders_distance">
                                                            <option selected value="1">1 км</option>
                                                            <option value="2">2 км</option>
                                                            <option value="3">3 км</option>
                                                            <option value="4">4 км</option>
                                                            <option value="5">5 км</option>
                                                        </select>
                                                    </div>
                                                    <div class="pa-user__worktime">
                                                        <div class="pa-user__worktime-caption">Время работы</div>
                                                        <div class="pa-user__worktime-content">
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Пн</span>
                                                                    <input type="checkbox" checked>
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Вт</span>
                                                                    <input type="checkbox" checked>
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Ср</span>
                                                                    <input type="checkbox" checked>
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Чт</span>
                                                                    <input type="checkbox" checked>
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Пт</span>
                                                                    <input type="checkbox" checked>
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Сб</span>
                                                                    <input type="checkbox" checked>
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Вс</span>
                                                                    <input type="checkbox" checked>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /pa-user__city -->



                                            <div class="user-page__price">
                                                <div class="user-page__block-content">
                                                    <div class="user-page__block-caption">Цены</div>
                                                    <div class="pa-user__price-top">

                                                        <div class="pa-user__price-item">
                                                            <div class="pa-user__price-name">
                                                                <label>
                                                                    <input type="checkbox" checked>
                                                                    <span>Минимальный заказ от</span>
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__price-count">
                                                                <input class="pa-input" name="min_price" type="text">
                                                            </div>
                                                            <div class="pa-user__price-pay">
                                                                <select class="pa-select">
                                                                    <option>Руб</option>
                                                                    <option>Руб/услуга</option>
                                                                    <option>Руб/час</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="pa-user__price-item">
                                                            <div class="pa-user__price-name">
                                                                <label>
                                                                    <input type="checkbox" checked>
                                                                    <span>Час работы от</span>
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__price-count">
                                                                <input class="pa-input" type="text" value="1500">
                                                            </div>
                                                            <div class="pa-user__price-pay">
                                                                <select class="pa-select">
                                                                    <option>Руб</option>
                                                                    <option>Руб/услуга</option>
                                                                    <option>Руб/час</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- /pa-user__price-top -->
                                                    <div class="pa-user__price-bottom sortable">

                                                        <div class="pa-user__price-item">
                                                            <div class="pa-user__price-name">
                                                                <label>
                                                                    <input class="pa-checkbox" type="checkbox" checked>
                                                                </label>
                                                                <input class="pa-input" type="text" value="Портретная съемка">
                                                            </div>
                                                            <div class="pa-user__price-free">
                                                                <label>
                                                                    <span>Бесплатно</span>
                                                                    <input type="checkbox" checked>
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__price-count">
                                                                <input class="pa-input" type="text" disabled>
                                                            </div>
                                                            <div class="pa-user__price-pay">
                                                                <select class="pa-select">
                                                                    <option selected>Руб/услуга</option>
                                                                    <option>Руб/час</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="pa-user__price-item">
                                                            <div class="pa-user__price-name">
                                                                <label>
                                                                    <input class="pa-checkbox" type="checkbox" checked>
                                                                </label>
                                                                <input class="pa-input" type="text" value="Семейная съемка">
                                                            </div>
                                                            <div class="pa-user__price-free">
                                                                <label>
                                                                    <span>Бесплатно</span>
                                                                    <input type="checkbox">
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__price-count">
                                                                <input class="pa-input" type="text" value="1500">
                                                            </div>
                                                            <div class="pa-user__price-pay">
                                                                <select class="pa-select">
                                                                    <option selected>Руб/услуга</option>
                                                                    <option>Руб/час</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="pa-user__price-item">
                                                            <div class="pa-user__price-name">
                                                                <label>
                                                                    <input class="pa-checkbox" type="checkbox" checked>
                                                                </label>
                                                                <input class="pa-input" type="text" value="Свадебная съемка">
                                                            </div>
                                                            <div class="pa-user__price-free">
                                                                <label>
                                                                    <span>Бесплатно</span>
                                                                    <input type="checkbox">
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__price-count">
                                                                <input class="pa-input" type="text" value="250">
                                                            </div>
                                                            <div class="pa-user__price-pay">
                                                                <select class="pa-select">
                                                                    <option>Руб/услуга</option>
                                                                    <option selected>Руб/час</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="pa-user__price-item pa-user__price-item-new">
                                                            <div class="pa-user__price-name">
                                                                <label>
                                                                    <input class="pa-checkbox" type="checkbox" checked>
                                                                </label>
                                                                <input class="pa-input" type="text" value="">
                                                            </div>
                                                            <div class="pa-user__price-free">
                                                                <label>
                                                                    <span>Бесплатно</span>
                                                                    <input type="checkbox">
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__price-count">
                                                                <input class="pa-input" type="text" value="">
                                                            </div>
                                                            <div class="pa-user__price-pay">
                                                                <select class="pa-select">
                                                                    <option>Руб/услуга</option>
                                                                    <option selected>Руб/час</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /pa-user__price-bottom -->
                                                    <div class="pa-user__price-add">
                                                        <div class="pa-user__price-add-container">
                                                            <div class="pa-user__price-add-icon">
                                                                <span>+</span>
                                                            </div>
                                                            <div class="pa-user__price-add-text">Добавить ещё</div>
                                                        </div>
                                                    </div>
                                                    <!-- /pa-user__price-add -->

                                                </div>
                                                <!-- /user-page__block-content -->
                                            </div>
                                            <!-- /user-page__price -->


                                            <div class="user-page__portfolio user-page__block">
                                                <div class="user-page__portfolio-content">
                                                    <div class="user-page__block-caption">Фотографии</div>
                                                    <div class="pa-user__portfolio">
                                                        <div class="pa-user__portfolio-item pa-item-action">
                                                            <img src="https://natworld.info/wp-content/uploads/2018/01/%D0%A1%D0%BE%D1%87%D0%B8%D0%BD%D0%B5%D0%BD%D0%B8%D0%B5-%D0%BD%D0%B0-%D1%82%D0%B5%D0%BC%D1%83-%D0%9F%D1%80%D0%B8%D1%80%D0%BE%D0%B4%D0%B0.jpeg"
                                                              alt="">
                                                            <div class="pa-item-icon del-icon"><span>+</span></div>
                                                        </div>
                                                        <div class="pa-user__portfolio-item pa-item-action">
                                                            <img src="http://nesiditsa.ru/wp-content/uploads/2012/07/Priroda-Valaama.jpg" alt="">
                                                            <div class="pa-item-icon del-icon"><span>+</span></div>
                                                        </div>
                                                        <div class="pa-user__portfolio-item pa-user__portfolio-item-add" data-toggle="modal" data-target="#add-photo">
                                                            <div class="pa-item-icon add-icon"><span>+</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="pa-user__portfofio">
                                                        <div class="pa-user__portfofio-item"></div>
                                                    </div>
                                                    <div class="pa-user__portfofio">
                                                        <div class="pa-user__portfofio-item"></div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="user-page__diplomas user-page__block">
                                                <div class="user-page__block-content">
                                                    <div class="user-page__block-caption">Дипломы</div>
                                                    <div class="pa-user__diplomas">
                                                        <div class="pa-user__diplomas-item pa-item-action">
                                                            <img src="{{ asset('img/temp/diplom.jpg') }}" alt="">
                                                            <div class="pa-item-icon del-icon"><span>+</span></div>
                                                        </div>
                                                        <div class="pa-user__diplomas-item pa-item-action">
                                                            <img src="{{ asset('img/temp/diplom.jpg') }}" alt="">
                                                            <div class="pa-item-icon del-icon"><span>+</span></div>
                                                        </div>
                                                        <div class="pa-user__diplomas-item pa-user__diplomas-item-add">
                                                            <div class="pa-item-icon add-icon"><span>+</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /user-page__diplomas -->


                                        </div>
                                        <!-- /user-page__content-info -->

                                    </div>
                                    <!-- /user-page__content -->
                                </div>
                                <!-- /col -->
                            </div>
                            <!-- /row -->

                        </form>
                    </div>
                    <!-- /pa-menu__tabs-item -->
                    <div class="pa-menu__tabs-item">
                        <div class="pa-orders">
                            <h3>Находится в стадии разработки</h2>
                        </div>
                        <!-- /pa-orders -->
                    </div>
                    <!-- /pa-menu__tabs-item -->
                </div>
                <!-- /pa-menu__tabs-content -->

            </div>
            <!-- /pa-menu -->

        </div>
        <!-- /container -->

    </section>

</div>
@endsection
