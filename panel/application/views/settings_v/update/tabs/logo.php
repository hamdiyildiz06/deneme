<div role="tabpanel" class="tab-pane fade" id="tab-7">

    <h4 class="m-b-md">Logomuz</h4>

    <div class="row">

        <div class="col-md-3">
            <img src="<?= base_url("uploads/{$viewFolder}/{$item->logo}"); ?>" alt="<?= $item->logo ?>" class="">
        </div>

        <div class="form-group image_upload_container col-md-6">
            <label for="logo">Görsel Seçiniz</label>
            <input type="file" name="logo" id="logo" class="form-control">
        </div>
    </div>

</div><!-- .tab-pane  -->