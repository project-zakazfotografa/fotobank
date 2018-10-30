@extends('layouts.dashboard')
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
                        <form method="post" action="{{ route('photograph.save') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <div class="row">
                                <div class="col-3">
                                    <div class="user-page__sidebar">
                                        <div class="user-page__sidebar-content">
                                            <div class="user-page__user user-page__block">
                                                <div class="pa-user__pic">
                                                    <label>
                                                        <input class="user-page__user-input" type="file" name="avatar">
                                                        {{--<img src="{{ asset('img/user-no-photo.svg') }}" alt="">--}}
                                                        <img src="{{ $user[0]->userData && $user[0]->userData->avatar !== null ? asset($user[0]->userData->avatar) : asset('img/user-no-photo.svg') }}" alt="">
                                                    <!-- </label> -->
                                                    <div class="pa-user__pic-change">
                                                      <button type="button" class="button pa-user__pic-change-btn">Обновить фотографию</button>
                                                    </div>
                                                        <div class="pa-user__pic-change">
                                                          <div class="pa-user__pic-change-btn">Обновить фотографию</div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <script>
                                                    $( function() {
                                                        $( "#pa-birthday" ).datepicker();
                                                        $.datepicker.setDefaults({
                                                            showOn: "both",
                                                            buttonImageOnly: true,
                                                            buttonImage: "calendar.gif",
                                                            buttonText: "Calendar"
                                                        });
                                                    } );
                                                </script>
                                                <div class="pa-user__info">
                                                    <input class="pa-input" name="first_name" type="text" placeholder="Имя" value="{{ $user[0]->userData !== null ? $user[0]->userData->first_name : '' }}">
                                                    <input class="pa-input" type="text" placeholder="Фамилия" name="last_name" value="{{ $user[0]->userData !== null ? $user[0]->userData->last_name : '' }}">
                                                    <div class="pa-user__birthday">
                                                        {{--<input id="pa-birthday" class="pa-input pa-user__birthday" type="text" name="birth_date" placeholder="Дата рождения" value="{{ $user[0]->userData !== null ? $user[0]->userData->birth_date : '' }}">--}}
                                                        {{--<input id="pa-birthday" class="pa-input pa-user__birthday" type="text" name="birth_date" placeholder="Дата рождения" value="{{ $user[0]->userData !== null ? $user[0]->userData->birth_date : '' }}">--}}
                                                        <input id="pa-birthday" type="date" name="birth_date" placeholder="Дата рождения" value="{{ $user[0]->userData !== null ? $user[0]->userData->birth_date : '' }}">
                                                    </div>
                                                </div>
                                                <div class="pa-user__experience">
                                                    <span>Опыт, лет</span>
                                                    <input class="pa-input" type="text" name="experience" value="{{ $user[0]->userData !== null ? $user[0]->userData->experience : 0}}">
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
                                                            <option value="2" {{ $user[0]->userData !== null && $user[0]->userData->show_orders_distance == 2 ? 'selected' : '' }}>2 км</option>
                                                            <option value="3" {{ $user[0]->userData !== null && $user[0]->userData->show_orders_distance == 3 ? 'selected' : '' }}>3 км</option>
                                                            <option value="4" {{ $user[0]->userData !== null && $user[0]->userData->show_orders_distance == 4 ? 'selected' : '' }}>4 км</option>
                                                            <option value="5" {{ $user[0]->userData !== null && $user[0]->userData->show_orders_distance == 5 ? 'selected' : '' }}>5 км</option>
                                                        </select>
                                                    </div>
                                                    <div class="pa-user__worktime">
                                                        <div class="pa-user__worktime-caption">Время работы</div>
                                                        <div class="pa-user__worktime-content">
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Пн</span>
                                                                    @if($user[0]->userData !== null)
                                                                    <input type="checkbox" name="mon" {{ $user[0]->userData->mon == 1 ? 'checked' : '' }}>
                                                                        @else
                                                                        <input type="checkbox" name="mon">
                                                                        @endif
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Вт</span>
                                                                    @if($user[0]->userData !== null)
                                                                    <input type="checkbox" name="tue" {{ $user[0]->userData->tue == 1 ? 'checked' : '' }}>
                                                                    @else
                                                                    <input type="checkbox" name="tue">
                                                                        @endif
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Ср</span>
                                                                    @if($user[0]->userData !== null)
                                                                    <input type="checkbox" name="wed" {{ $user[0]->userData->wed == 1 ? 'checked' : '' }}>
                                                                    @else
                                                                    <input type="checkbox" name="wed">
                                                                        @endif
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Чт</span>
                                                                    @if($user[0]->userData !== null)
                                                                    <input type="checkbox" name="thu" {{ $user[0]->userData->thu == 1 ? 'checked' : '' }}>
                                                                    @else
                                                                    <input type="checkbox" name="thu">
                                                                        @endif
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Пт</span>
                                                                    @if($user[0]->userData !== null)
                                                                    <input type="checkbox" name="fri" {{ $user[0]->userData->fri == 1 ? 'checked' : '' }}>
                                                                    @else
                                                                    <input type="checkbox" name="fri">
                                                                        @endif
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Сб</span>
                                                                    @if($user[0]->userData !== null)
                                                                    <input type="checkbox" name="sut" {{ $user[0]->userData->sut == 1 ? 'checked' : '' }}>
                                                                    @else
                                                                    <input type="checkbox" name="sut">
                                                                        @endif
                                                                </label>
                                                            </div>
                                                            <div class="pa-user__worktime-item">
                                                                <label>
                                                                    <span>Вс</span>
                                                                    @if($user[0]->userData !== null)
                                                                    <input type="checkbox" name="sun" {{ $user[0]->userData->sun == 1 ? 'checked' : '' }}>
                                                                    @else
                                                                    <input type="checkbox" name="sun">
                                                                        @endif
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
                                                                <input class="pa-input" name="min_price" type="text" value="{{ $user[0]->userData !== null ? $user[0]->userData->min_price : '' }}">
                                                            </div>
                                                            <div class="pa-user__price-pay">
                                                                <select class="pa-select" name="currency">
                                                                    <option value="руб" {{ $user[0]->userData !== null && $user[0]->userData->currency == 'руб' ? 'selected' : '' }}>Руб</option>
                                                                    <option value="руб / услуга" {{ $user[0]->userData !== null && $user[0]->userData->currency == 'руб / услуга' ? 'selected' : '' }}>Руб/услуга</option>
                                                                    <option value="руб / час" {{ $user[0]->userData !== null && $user[0]->userData->currency == 'руб / час' ? 'selected' : '' }}>Руб/час</option>
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
                                                                <input class="pa-input" type="text" name="price_for_hour" value="{{ $user[0]->userData !== null ? $user[0]->userData->price_for_hour : '' }}">
                                                            </div>
                                                            <div class="pa-user__price-pay">
                                                                <select class="pa-select" name="currency_h">
                                                                    <option value="руб" {{ $user[0]->userData !== null && $user[0]->userData->currency_h == 'руб' ? 'selected' : '' }}>Руб</option>
                                                                    <option value="руб / услуга" {{ $user[0]->userData !== null && $user[0]->userData->currency_h == 'руб / услуга' ? 'selected' : '' }}>Руб/услуга</option>
                                                                    <option value="руб / час" {{ $user[0]->userData !== null && $user[0]->userData->currency_h == 'руб / час' ? 'selected' : '' }}>Руб/час</option>
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

                                                        @if(empty($user[0]->bullet[0]) === false)
                                                        @foreach($user[0]->bullet[0]->photo as $photo)
                                                        <div class="pa-user__portfolio-item pa-item-action">
                                                            <img src="{{ asset($photo->photo) }}" alt="">
                                                            <div class="pa-item-icon del-icon"><span>+</span></div>
                                                        </div>
                                                        @endforeach
                                                        @endif
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
                            <h3>Находится в стадии разработки</h3>
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
