@extends('layouts.app')
@section('content')

<section class="user-page">

  <div class="container">

    <div class="user-page__container">

      <div class="row">
        <div class="col-3">
          <div class="user-page__sidebar">

            <div class="user-page__sidebar-content">

              <div class="user-page__user user-page__block">
                <div class="user-page__user-pic">
                  <img src="{{ $user->userData->avatar }}" alt="">
                </div>
                <div class="user-page__user-name">
                  <span>{{ $user->userData->first_name . ' ' . $user->userData->last_name }}</span>
                </div>
                <div class="user-page__user-info">
                  <ul>
                      <?php $now = Carbon\Carbon::now() ?>

                    <li>Возраст: <span>{{ $now->diffInYears($user->userData->birth_date) }}</span> лет</li>
                    <li>Опыт: <span>{{ $user->userData->experience }}</span> лет</li>
                    <li></li>
                  </ul>
                </div>

                <div class="user-page__user-bottom">
                  <div class="user-page__user-rating">
                    <div class="rating">
                      <div class="rating-item rating-item--plus">+4</div>
                      <div class="rating-item rating-item--minus">-1</div>
                    </div>
                  </div>
                  <div class="user-page__user-review">
                    <a href="javascript:void(0);">Оставить отзыв</a>
                  </div>
                </div>
              </div>
              <!-- /user-page__user -->

              <div class="user-page__contacts user-page__block">
                <div class="user-page__block-content">
                  <ul class="user-page__contacts-list">
                    <li class="user-page__contacts-item">
                      <a class="user-page__contacts-link contact-tel--show" href="tel:{{ $user->userData->phone }}"><span class="contact-tel--hide">{{ $user->userData->phone }}</span></a>
                    </li>
                    <li class="user-page__contacts-item">
                      <a class="user-page__contacts-link user-contacts-email" href="javascript:void(0);">{{ $user->userData->email }}</a>
                      <span class="user-contacts-email--show">Показать email</span>
                    </li>
                    <li class="user-page__contacts-item">
                      <a class="user-page__contacts-link user-contacts-site" href="javascript:void(0);">{{ $user->userData->site }}</a>
                      <span class="user-contacts-site--show">Показать сайт</span>
                    </li>
                    <!-- <li class="user-page__contacts-item">
                      <a class="user-page__contacts-link" href="javascript:void(0);">Написать</a>
                    </li>
                    <li class="user-page__contacts-item">
                      <a class="user-page__contacts-link" href="javascript:void(0);">Предложить заказ</a>
                    </li> -->
                  </ul>
                </div>

              </div>
              <!-- /user-page__contacts -->

            </div>
            <!-- /user-page__sidebar-content -->



          </div>
          <!-- /user-page__sidebar -->
        </div>
        <div class="col-8">
          <div class="user-page__content">

            <div class="user-page__content-info">
              <div class="user-page__about user-page__block">
                <div class="user-page__block-content">
                  <div class="user-page__about-price">
                    <div class="user-page__about-price-item">Мин заказ: <strong>{{ $user->userData->min_price . ' ' . $user->userData->currency }}</strong></div>
                    <div class="user-page__about-price-item">Час работы: от <strong>{{ $user->userData->price_for_hour . ' ' . $user->userData->currency_h }}</strong></div>
                  </div>
                  <div class="user-page__about-text">{{ $user->userData->description }}</div>
                  <div class="user-page__features">
                    <div class="user-page__features-list">
                        @foreach($user->tag as $tag)
                            <a class="user-page__features-item" href="javascript:void(0);">{{ $tag->name }}</a>
                            @endforeach
                    </div>
                  </div>

                </div>
              </div>


              <div class="user-page__portfolio user-page__block">
                <!-- <div class="user-page__block-header">Работы</div> -->
                <div class="user-page__portfolio-content">

                  <div class="tabs">
                    <div class="tabs-nav">
                      <div class="tabs-nav__item tabs-nav__item--active">Все</div>
                        @foreach($user->bullet as $item)
                            <div class="tabs-nav__item">{{ $item->bullet }}</div>
                            @endforeach
                    </div>

                    <div class="tabs-content">

                      <div class="tabs-content__item">
                        <div class="user-page__portfolio-photos">
                            @if($user->userData !== null)
                                @foreach($user->bullet as $item)
                                    @foreach($item->photo as $photo)
                                        @if($photo->user_id === $user->id)
                                          <a class="user-page__portfolio-item js-photo-popup" href="{{ $photo->photo }}" target="_blank">
                                            <img src="{{ $photo->photo }}" alt="">
                                          </a>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                                @if(!empty($user->bullet))
                                  <div class="user-page__portfolio-item js-photo-popup photos-more" href="http://xn--80aao6anggb.xn--p1ai/assets/galleries/1581/14746738.jpg">
                                    <img src="http://xn--80aao6anggb.xn--p1ai/assets/galleries/1581/14746738.jpg" alt="">
                                    <div class="photos-more-count">+35</div>
                                  </div>
                                @endif
                        </div>
                      </div>
                        @if($user->userData !== null)
                            @foreach($user->bullet as $item)
                              <div class="tabs-content__item">
                                <div class="user-page__portfolio-photos">
                                    @foreach($item->photo as $photo)
                                        @if($photo->user_id === $user->id)
                                          <a class="user-page__portfolio-item js-photo-popup" href="{{ $photo->photo }}" target="_blank">
                                            <img src="{{ $photo->photo }}" alt="">
                                          </a>
                                        @endif
                                    @endforeach
                                  <div class="user-page__portfolio-item js-photo-popup photos-more" href="http://xn--80aao6anggb.xn--p1ai/assets/galleries/1581/14746738.jpg">
                                    <img src="http://xn--80aao6anggb.xn--p1ai/assets/galleries/1581/14746738.jpg" alt="">
                                    <div class="photos-more-count">+35</div>
                                  </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                      <div class="tabs-content__item">
                        <div class="user-page__portfolio-photos">
                          <a class="user-page__portfolio-item js-photo-popup" href="https://bipbap.ru/wp-content/uploads/2017/04/priroda_kartinki_foto_03.jpg">
                            <img src="https://bipbap.ru/wp-content/uploads/2017/04/priroda_kartinki_foto_03.jpg" alt="">
                          </a>
                          <a class="user-page__portfolio-item js-photo-popup" href="https://cdn.fishki.net/upload/post/201411/26/1334081/57542_trava_priroda_doroga_leto_1920x1200_wwwgdefonru.jpg">
                            <img src="https://cdn.fishki.net/upload/post/201411/26/1334081/57542_trava_priroda_doroga_leto_1920x1200_wwwgdefonru.jpg" alt="">
                          </a>
                          <a class="user-page__portfolio-item js-photo-popup" href="https://i.5sfer.com/post/postImage/thumb-8ipwnn.jpg">
                            <img src="https://i.5sfer.com/post/postImage/thumb-8ipwnn.jpg" alt="">
                          </a>
                          <a class="user-page__portfolio-item js-photo-popup" href="http://xn--80aao6anggb.xn--p1ai/assets/galleries/1581/14746738.jpg">
                            <img src="http://xn--80aao6anggb.xn--p1ai/assets/galleries/1581/14746738.jpg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="tabs-content__item">
                        <div class="user-page__portfolio-photos">
                          <a class="user-page__portfolio-item js-photo-popup" href="https://cdn.fishki.net/upload/post/201411/26/1334081/57542_trava_priroda_doroga_leto_1920x1200_wwwgdefonru.jpg">
                            <img src="https://cdn.fishki.net/upload/post/201411/26/1334081/57542_trava_priroda_doroga_leto_1920x1200_wwwgdefonru.jpg" alt="">
                          </a>
                          <a class="user-page__portfolio-item js-photo-popup" href="https://bipbap.ru/wp-content/uploads/2017/04/priroda_kartinki_foto_03.jpg">
                            <img src="https://bipbap.ru/wp-content/uploads/2017/04/priroda_kartinki_foto_03.jpg" alt="">
                          </a>
                        </div>
                      </div>

                    </div>
                    <!-- /tabs-content -->

                  </div>


                </div>
              </div>

              <div class="user-page__price">
                <div class="user-page__price-content">
                    @foreach($user->servises as $servise)
                      <div class="user-page__price-item">
                        <div class="user-page__price-col1">{{ $servise->servise_name }}</div>
                        <div class="user-page__price-col2">{{ $servise->cost . ' ' }} {{ $servise->type == 'час' ? 'руб/час' : 'руб' }}</div>
                      </div>
                    @endforeach
                  {{--<div class="user-page__price-item">--}}
                    {{--<div class="user-page__price-col1">Семейная съемка</div>--}}
                    {{--<div class="user-page__price-col2">4 500 руб</div>--}}
                  {{--</div>--}}
                  {{--<div class="user-page__price-item">--}}
                    {{--<div class="user-page__price-col1">Аэросъемка</div>--}}
                    {{--<div class="user-page__price-col2">1 500 руб</div>--}}
                  {{--</div>--}}
                  {{--<div class="user-page__price-item">--}}
                    {{--<div class="user-page__price-col1">Услуги визажиста</div>--}}
                    {{--<div class="user-page__price-col2">по договоренности</div>--}}
                  {{--</div>--}}
                  {{--<div class="user-page__price-item">--}}
                    {{--<div class="user-page__price-col1">Съемка животных</div>--}}
                    {{--<div class="user-page__price-col2">2 500 руб</div>--}}
                  {{--</div>--}}
                  {{--<div class="user-page__price-item">--}}
                    {{--<div class="user-page__price-col1">Групповая фотосессия</div>--}}
                    {{--<div class="user-page__price-col2">4 500 руб</div>--}}
                  {{--</div>--}}
                  {{--<div class="user-page__price-item">--}}
                    {{--<div class="user-page__price-col1">Свадебная фотосессия</div>--}}
                    {{--<div class="user-page__price-col2">250 руб/час</div>--}}
                  {{--</div>--}}
                </div>
              </div>


              <div class="user-page__review user-page__block">
                <div class="user-page__block-content">
                  <div class="user-page__review-top">
                    <div class="user-page__review-all">
                      <div class="user-page__review-all-item">
                        <span>Положительных</span><span class="user-page__review-plus">+4</span>
                      </div>
                      <div class="user-page__review-all-item">
                        <span>Нейтральных</span><span class="user-page__review-neutral">0</span>
                      </div>
                      <div class="user-page__review-all-item">
                        <span>Отрицательных</span><span class="user-page__review-minus">-1</span>
                      </div>
                    </div>
                    <div class="user-page__review-send">
                      <div class="user-page__review-rating">
                        <div class="user-page__review-rating-item">
                          <img src="assets/img/icon/happy.svg" alt="">
                        </div>
                        <div class="user-page__review-rating-item">
                          <img src="assets/img/icon/neutral.svg" alt="">
                        </div>
                        <div class="user-page__review-rating-item">
                          <img src="assets/img/icon/sad.svg" alt="">
                        </div>
                      </div>
                      <form class="user-page__review-form" action="">
                        <textarea name="name" placeholder="Оставьте свой отзыв"></textarea>
                        <div class="user-page__review-buttons form-files">
                          <div class="form-files__icon">
                            <img src="assets/img/icon/send-file-icon.svg" alt="">
                          </div>
                          <button class="form-files__button button button-blue">Разместить заказ</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="user-page__review-bottom">

                    <div class="review">

                      <div class="review-item">
                        <div class="review-content">
                          <div class="review-author">
                            <div class="review-author__avatar">
                              <img src="assets/img/temp/user-2.jpg" alt="">
                            </div>
                            <div class="review-author__info">
                              <div class="review-author__name">Маргарита С.</div>
                              <div class="review-author__rating">
                                <img src="assets/img/icon/happy.svg" alt="">
                              </div>
                            </div>
                            <div class="review-author__date">11 апреля 2019</div>
                          </div>
                          <div class="review-text">
                            <p>Отличный мастер ! Руки откуда надо ,необходимые инструменты наличии! Качественно и быстро устранил засор я очень довольна. Отличный мастер ! Руки откуда надо, необходимые инструменты наличии!</p>
                          </div>
                          <div class="review-photos">
                            <div class="review-photos__item">
                              <img src="https://art-holst.com.ua/img/gallery/2/thumbs/thumb_ls_2991.jpg" alt="">
                            </div>
                            <div class="review-photos__item">
                              <img src="http://katyaburg.ru/sites/default/files/pictures/krasota_prirody/priroda_kartinki_foto_04.jpg" alt="">
                            </div>
                            <div class="review-photos__item">
                              <img src="https://natworld.info/wp-content/uploads/2018/04/Priroda-v-avguste.jpg" alt="">
                            </div>
                            <div class="review-photos__item">
                              <img src="http://картинамечты.рф/data/imagegallery/01a4091b-c8ef-aefe-df24-e9c35e88f02d/8003e4e3-0809-4188-84a1-d9be1e56cc9a.jpg" alt="">
                            </div>
                            <div class="review-photos__item">
                              <img src="https://img1.goodfon.ru/wallpaper/big/f/3f/tropiki-palmy-plyazh-priroda.jpg" alt="">
                            </div>
                            <div class="review-photos__item review-photos__item-more">
                              <img src="http://katyaburg.ru/sites/default/files/pictures/krasota_prirody/osen_osennyaya_priroda_01.jpg" alt="">
                              <div class="review-photos__item-more-count">+12</div>
                            </div>
                          </div>
                        </div>
                        <div class="review-answer">
                          <div class="review-answer__header">
                            <div class="review-answer__header-caption">Ответ фотографа</div>
                            <div class="review-answer__header-date">12 апреля 2019</div>
                          </div>
                          <div class="review-answer__text">
                            <p>Отличный мастер ! Руки откуда надо ,необходимые инструменты наличии! Качественно и быстро устранил засор я очень довольна. Отличный мастер ! Руки откуда надо, необходимые инструменты наличии!</p>
                          </div>
                        </div>
                      </div>
                      <div class="review-item">
                        <div class="review-content">
                          <div class="review-author">
                            <div class="review-author__avatar">
                              <img src="assets/img/temp/user-2.jpg" alt="">
                            </div>
                            <div class="review-author__info">
                              <div class="review-author__name">Маргарита С.</div>
                              <div class="review-author__rating">
                                <img src="assets/img/icon/sad.svg" alt="">
                              </div>
                            </div>
                            <div class="review-author__date">11 апреля 2019</div>
                          </div>
                          <div class="review-text">
                            <p>Ужасный фотограф!</p>
                          </div>
                          <div class="review-photos">
                            <div class="review-photos__item">
                              <img src="https://img-fotki.yandex.ru/get/48890/128154535.b1/0_24b53d_1e19bc68_XXL.jpg" alt="">
                            </div>
                            <div class="review-photos__item">
                              <img src="http://www.rusproject.org/pages/analysis/analysis_12/images/cuba/manz_zaliv.jpg" alt="">
                            </div>
                            <div class="review-photos__item">
                              <img src="http://nesiditsa.ru/wp-content/uploads/2012/07/Priroda-Valaama.jpg" alt="">
                            </div>
                          </div>
                        </div>
                        <div class="review-answer">
                          <div class="review-answer__header">
                            <div class="review-answer__header-caption">Ответ фотографа</div>
                            <div class="review-answer__header-date">12 апреля 2019</div>
                          </div>
                          <div class="review-answer__text">
                            <p>Приношу свои извинения</p>
                          </div>
                        </div>
                      </div>
                      <div class="review-all">
                        <a class="review-all__link" href="javascript:void(0);">Смотреть все отзывы</a>
                      </div>
                    </div>
                    <!-- /review -->

                  </div>
                </div>
              </div>
              <!-- /user-page__review -->

              <div class="user-page__diplomas user-page__block">
                <div class="user-page__block-content">
                  <div class="user-page__diplomas-content">
                    <div class="user-page__diplomas-item">
                      <img src="assets/img/temp/diplom.jpg" alt="">
                    </div>
                    <div class="user-page__diplomas-item">
                      <img src="assets/img/temp/diplom.jpg" alt="">
                    </div>
                    <div class="user-page__diplomas-item">
                      <img src="assets/img/temp/diplom.jpg" alt="">
                    </div>
                  </div>
                </div>
              </div>

            </div>


            <div class="user-page__specialists">
                {{--@include('layouts.user-short', ['user' => $user])--}}
              <div class="desc-more">
                <button class="desc-more__button">Показать еще фотографов</button>
              </div>
            </div>
            <!-- /user-page__specialists -->


          </div>
          <!-- /user-page__content -->
        </div>
        <!-- /col -->
      </div>
      <!-- /row -->




    </div>
    <!-- /user-page__container -->

  </div>
  <!-- /container -->

</section>
<!-- /user-page -->
@endsection
