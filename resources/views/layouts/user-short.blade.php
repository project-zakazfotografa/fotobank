<div class="user-short">
    <div class="user-short__sidebar">
        <a class="user-short__photo" href="/user-page.html" target="_blank">
            <img src="{{ $user->userData->avatar }}" alt="{{ $user->userData->first_name . ' ' . $user->userData->last_name }}">
        </a>
        <div class="user-short__rating">
            <div class="user-short__rating-item user-short__rating-item--plus">+4</div>
            <div class="user-short__rating-item user-short__rating-item--minus">-1</div>
        </div>
    </div>
    <!-- /user-short__sidebar -->
    <div class="user-short__content">

        <div class="user-short__top">
            <div class="user-short__info">
                <a class="user-short__info-name" href="/user-page.html" target="_blank">{{ $user->userData->first_name . ' ' . $user->userData->last_name }}</a>
                <div class="user-short__info-age">20 лет</div>
            </div>
            <div class="user-short__price">
                <div class="user-short__price-item">
                    Мин заказ: <strong>{{ $user->userData->min_price . ' ' . $user->userData->currency }}</strong>
                </div>
                <div class="user-short__price-item">
                    Час работы: от <strong>{{ $user->userData->price_for_hour . ' ' . $user->userData->currency_h }}</strong>
                </div>
            </div>
        </div>

        <div class="user-short__features">
            <div class="tags">
                <div class="tags-item">Есть фотостудия</div>
                <div class="tags-item">Со светом</div>
                <div class="tags-item">Костюмы</div>
                <div class="tags-item">Мейк ап</div>
            </div>
        </div>

        <div class="user-short__about">
            {{ $user->userData->about_me }}
        </div>

        <div class="tabs">
            <div class="tabs-nav">
                <div class="tabs-nav__item tabs-nav__item--active">Все</div>
                @foreach($user->bullet as $bullet)
                <div class="tabs-nav__item">{{ $bullet->bullet }}</div>
                @endforeach
            </div>
            <div class="tabs-content">
                <div class="tabs-content__item">
                    <div class="user-short__photos">
                        @foreach($user->bullet as $bullet)
                        @foreach($bullet->photo as $photo)
                            <a class="user-short__photos-item js-photo-popup" href="{{ $photo->photo }}">
                                <img src="{{ $photo->photo }}" alt="">
                            </a>
                        @endforeach
                        @endforeach
                        <div class="user-short__photos-item user-short__photos-item-more">
                            <img src="http://katyaburg.ru/sites/default/files/pictures/krasota_prirody/osen_osennyaya_priroda_01.jpg" alt="">
                            <div class="user-short__photos-item-more-count">+12</div>
                        </div>
                    </div>
                </div>
                @foreach($user->bullet as $bullet)
                <div class="tabs-content__item">
                    <div class="user-short__photos">
                        @foreach($bullet->photo as $photo)
                        <a class="user-short__photos-item js-photo-popup" href="{{ $photo->photo }}">
                            <img src="{{ $photo->photo }}" alt="">
                        </a>
                            @endforeach
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
    <!-- /user-short__content -->
</div>
