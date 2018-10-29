@extends('layouts.app')

@section('content')
    <section id="main" class="main position-relative">
        <div class="container">
            <div class="row">
                @include('templates.left_filter')
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
                        @foreach($users as $user)
                        @include('layouts.user-short', ['user' => $user])
                            @endforeach
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
