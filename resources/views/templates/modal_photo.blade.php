<div class="modal fade add-photo" id="add-photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="add-photo__content">
                    <form class="add-photo__form" action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="add-photo__upload">
                        <label class="add-photo__upload-label">
                            <input class="add-photo__upload-input" type="file" name="photo" id="photo" onchange="this.form.submit()">
                            <div class="add-photo__upload-pic">
                                <img class="add-photo__upload-img" src="https://bipbap.ru/wp-content/uploads/2017/04/0_7c779_5df17311_orig.jpg" alt="">
                            </div>
                            <span class="add-photo__upload-text">Выберите фотографию</span>
                        </label>
                        <div class="add-photo__upload-desc">
                          <textarea class="pa-textarea" placeholder="Описание фотографии"></textarea>
                        </div>

                    </div>
                    <div class="add-photo__tags">
                        <div class="pa-tag">
                          <label class="pa-tag__label">
                            <input class="pa-tag__checkbox" type="checkbox" name="" value="">
                            <span>Семейная</span>
                          </label>
                        </div>
                        <div class="pa-tag">
                          <label class="pa-tag__label">
                            <input class="pa-tag__checkbox" type="checkbox" name="" value="">
                            <span>Портрет</span>
                          </label>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
