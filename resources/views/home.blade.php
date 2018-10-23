@extends('layouts.app')

@section('content')
    <section id="main" class="main position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="sidebar-filter">
                        <div class="filter">

                            <div class="city-select">
                                <div class="city-select__caption">Выбор города</div>
                                <select>
                                    <option>Москва</option>
                                    <option>Санкт-Петербург</option>
                                </select>
                            </div>
                            <div class="filter-type">
                                <div class="filter-caption">Вид фотосессии</div>
                                <ul class="filter-list">
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">Детский</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">Новорожденные</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">На выписку</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">Свадебный</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">Беременность</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">Анималист</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">Архитектурный</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">Love story</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">На крещение</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">На корпоратив</span>
                                        </label>
                                    </li>
                                </ul>
                                <div class="filter__show-more">
                                    <span class="filter__show-more-text">ещё</span>
                                    <div class="filter__show-more-dots">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-type">
                                <div class="filter-caption">Особенности</div>
                                <ul class="filter-list">
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">Есть фотостудия</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">Со светом</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">Костюмы</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">Мейк ап</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">Мартышки</span>
                                        </label>
                                    </li>
                                    <li class="filter-item">
                                        <label>
                                            <input class="checkbox-custom" type="checkbox">
                                            <span class="checkbox-custom__icon"></span>
                                            <span class="filter-item__text">Аэросъемка</span>
                                        </label>
                                    </li>
                                </ul>
                                <div class="filter__show-more">
                                    <span class="filter__show-more-text">ещё</span>
                                    <div class="filter__show-more-dots">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <!-- /filter-type -->
                        </div>
                        <!-- /filter -->
                    </div>
                    <!-- /sidebar-filter -->
                </div>
                <!-- /col -->
                <div class="col-12 col-lg-8">

                    <div class="main-desc">


                        <div class="desc-order">
                            <div class="desc-order__header">Лень выбирать? - Оставь заявку! </div>
                            <div class="desc-order__content">
                                <textarea name="name" rows="8" cols="80" placeholder="Опишите заявку в свободной форме"></textarea>
                                <div class="desc-order__buttons">
                                    <div class="desc-order__buttons-file">
                                        <img src="{{ asset('img/icon/send-file-icon.svg') }}" alt="">
                                    </div>
                                    <button class="desc-order__buttons-send button button-blue">Разместить заказ</button>
                                </div>
                            </div>

                        </div>
                        <!-- /desc-order -->
                        @include('layouts.user-short')
                        @include('layouts.user-short')
                        @include('layouts.user-short')
                    </div>
                    <!-- /main-desc -->

                    <div class="desc-more">
                        <button class="desc-more__button">Показать еще фотографов</button>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
