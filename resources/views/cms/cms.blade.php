@extends('layouts.app')
@section('content')
<div class="cms">
  <div class="cms-container">

    <div class="cms-sidebar">
      <div class="cms-menu">
        <div class="cms-menu__item cms-menu__item--active">Фотографы</div>
        <div class="cms-menu__item">Теги (у пользователя)</div>
        <div class="cms-menu__item">Булиты (фильтры)</div>
      </div>
      <div class="cms-exit">
        <button>Выйти</button>
      </div>
    </div>
    <!-- /cms-sidebar -->

    <div class="cms-content">
      <div class="cms-content__item">
        @include('cms.photographers')
      </div>
      <!-- /cms-content__item -->
      <div class="cms-content__item">
        @include('cms.tags')
      </div>
      <!-- /cms-content__item -->
      <div class="cms-content__item">
          <bullets-component></bullets-component>
      </div>
      <!-- /cms-content__item -->
    </div>
    <!-- /cms-content -->

  </div>
  <!-- /cms-container -->
</div>
<!-- /cms -->

<div class="cms-edit-user">
  {{--//= html/personal-area/options.html--}}
</div>
<!-- /cms-edit-user -->
@endsection
