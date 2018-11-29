<div class="user-short">
    <div class="user-short__sidebar">
        <a class="user-short__photo" href="{{ url('/photograph/' . $user->id) }}" target="_blank">
            <img src="{{ $user->userData !== null ? $user->userData->avatar : ''}}" alt="{{ $user->userData !== null ? $user->userData->first_name . ' ' . $user->userData->last_name : ''}}">
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
                <a class="user-short__info-name" href="{{ url('/photograph/' . $user->id) }}" target="_blank">{{ $user->userData !== null ? $user->userData->first_name . ' ' . $user->userData->last_name : ''}}</a>
                <div class="user-short__info-age">{{ $user->userData !== null ? $user->userData->experience : ''}} лет</div>
            </div>
            <div class="user-short__price">
                <div class="user-short__price-item">
                    Мин заказ: <strong>{{$user->userData !== null ? $user->userData->min_price . ' ' . $user->userData->currency : ''}}</strong>
                </div>
                <div class="user-short__price-item">
                    Час работы: от <strong>{{ $user->userData !== null ? $user->userData->price_for_hour . ' ' . $user->userData->currency_h : ''}}</strong>
                </div>
            </div>
        </div>

        <div class="user-short__features">
            <div class="tags">
                @foreach($user->tag as $item)
                    <div class="tags-item">{{ $item->name }}</div>
                    @endforeach
            </div>
        </div>

        <div class="user-short__about">
            {{ $user->userData !== null ? $user->userData->about_me : ''}}
        </div>

        <div class="tabs">
            <div class="tabs-nav">
                <div class="tabs-nav__item tabs-nav__item--active">Все</div>
                @foreach($user->bullet as $item)
                <div class="tabs-nav__item">{{ $item->bullet }}</div>
                    @endforeach
            </div>
            <div class="tabs-content">
                <div class="tabs-content__item">
                    <div class="user-short__photos">
                        @if($user->userData !== null)
                            @foreach($user->bullet as $item)
                                @foreach($item->photo as $photo)
                                    @if($photo->user_id === $user->id)
                                        <a class="user-short__photos-item js-photo-popup" href="{{ $photo->photo }}">
                                            <img src="{{ $photo->photo }}" alt="">
                                        </a>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                        @if(!empty($user->bullet))
                            <div class="user-short__photos-item user-short__photos-item-more">
                                <a href="{{ url('/photograph/' . $user->id) }}" target="_blank">
                                    <img src="http://katyaburg.ru/sites/default/files/pictures/krasota_prirody/osen_osennyaya_priroda_01.jpg" alt="">
                                    <div class="user-short__photos-item-more-count">+12</div>
                                </a>
                            </div>
                            @endif
                    </div>
                </div>
                @if($user->userData !== null)
                    @foreach($user->bullet as $item)
                        <div class="tabs-content__item">
                            <div class="user-short__photos">
                                @foreach($item->photo as $photo)
                                    @if($photo->user_id === $user->id)
                                        <a class="user-short__photos-item js-photo-popup" href="{{ $photo->photo }}">
                                            <img src="{{ $photo->photo }}" alt="">
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                 @endif

            </div>
        </div>

    </div>
    <!-- /user-short__content -->
</div>
