<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?= base_url("product/image_update/{$item->id}"); ?>" class="dropzone" data-plugin="dropzone" data-options="{ url: '<?= base_url("product/image_update/{$item->id}"); ?>'}">
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
            <strong>" <?= $item->title; ?> "</strong> kaydına ait resimler
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <?php if (empty($item_images)){ ?>
                    <div class="alert alert-info text-center ">
                        <h5 class="alert-title">Kayıt Bulunamadı</h5>
                        <p>Burada herhangi bir resim bulunamamaktadır.</p>
                    </div>
                <?php }else{ ?>
                    <table class="table table-bordered table-striped table-hover pictures_list">
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
                        <?php foreach ($item_images as $image): ?>

                        <tr>
                            <th class="w100 text-center"><?= $image->id; ?></th>
                            <td class="w100 text-center">
                                <img width="30" src="<?php echo base_url("uploads/{$viewFolder}/{$image->img_url}"); ?>" alt="" class="img-responsive">
                            </td>
                            <td><?= $image->img_url; ?></td>
                            <td class="w100 text-center">
                                <input
                                        data-url="<?= base_url("product/isActiveSetter/$image->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                    <?= ($image->id) ? "checked" : "";  ?>
                                />
                            </td>
                            <td class="w100 text-center">
                                <button
                                        data-url="<?= base_url("product/delete/$image->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn btn-block">
                                    <i class="fa fa-trash-o"></i> Sil
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>