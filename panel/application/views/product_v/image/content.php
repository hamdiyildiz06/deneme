<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürünün Fotoğrafları
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="../api/dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '../api/dropzone'}">
                    <div class="dz-message">
                        <h3 class="m-h-lg">Drop files here or click to upload.</h3>
                        <p class="m-b-lg text-muted">(This is just a demo dropzone. Selected files are not actually uploaded.)</p>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>

<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürünün Fotoğrafları
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#id</th>
                        <th>Görsel</th>
                        <th>Resim Adı</th>
                        <th>Durumu</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1</th>
                        <td>
                            <img width="30" src="http://hamdiyildiz.net/assets/image/sertifika/resim1.jpg" alt="" class="img-responsive">
                        </td>
                        <td>deneme-urun.jpg</td>
                        <td>
                            <input
                                    data-url="<?= base_url("product/isActiveSetter/"); ?>"
                                    class="isActive"
                                    type="checkbox"
                                    data-switchery
                                    data-color="#10c469"
                                <?= (true) ? "checked" : "";  ?>
                            />
                        </td>
                        <td>
                            <button
                                    data-url="<?= base_url("product/delete/"); ?>"
                                    class="btn btn-sm btn-danger btn-outline remove-btn">
                                <i class="fa fa-trash-o"></i> Sil
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th>1</th>
                        <td>
                            <img width="30" src="http://hamdiyildiz.net/assets/image/sertifika/resim1.jpg" alt="" class="img-responsive">
                        </td>
                        <td>deneme-urun.jpg</td>
                        <td>
                            <input
                                    data-url="<?= base_url("product/isActiveSetter/"); ?>"
                                    class="isActive"
                                    type="checkbox"
                                    data-switchery
                                    data-color="#10c469"
                                <?= (true) ? "checked" : "";  ?>
                            />
                        </td>
                        <td>
                            <button
                                    data-url="<?= base_url("product/delete/"); ?>"
                                    class="btn btn-sm btn-danger btn-outline remove-btn">
                                <i class="fa fa-trash-o"></i> Sil
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th>1</th>
                        <td>
                            <img width="30" src="http://hamdiyildiz.net/assets/image/sertifika/resim1.jpg" alt="" class="img-responsive">
                        </td>
                        <td>deneme-urun.jpg</td>
                        <td>
                            <input
                                    data-url="<?= base_url("product/isActiveSetter/"); ?>"
                                    class="isActive"
                                    type="checkbox"
                                    data-switchery
                                    data-color="#10c469"
                                <?= (true) ? "checked" : "";  ?>
                            />
                        </td>
                        <td>
                            <button
                                    data-url="<?= base_url("product/delete/"); ?>"
                                    class="btn btn-sm btn-danger btn-outline remove-btn">
                                <i class="fa fa-trash-o"></i> Sil
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th>1</th>
                        <td>
                            <img width="30" src="http://hamdiyildiz.net/assets/image/sertifika/resim1.jpg" alt="" class="img-responsive">
                        </td>
                        <td>deneme-urun.jpg</td>
                        <td>
                            <input
                                    data-url="<?= base_url("product/isActiveSetter/"); ?>"
                                    class="isActive"
                                    type="checkbox"
                                    data-switchery
                                    data-color="#10c469"
                                <?= (true) ? "checked" : "";  ?>
                            />
                        </td>
                        <td>
                            <button
                                    data-url="<?= base_url("product/delete/"); ?>"
                                    class="btn btn-sm btn-danger btn-outline remove-btn">
                                <i class="fa fa-trash-o"></i> Sil
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>