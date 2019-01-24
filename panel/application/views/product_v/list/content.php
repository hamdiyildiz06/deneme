<div class="row">

    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün listesi
            <a href="<?= base_url("product/new_form"); ?>" class="btn pull-right btn-outline btn-primary btn-xs"><i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)){ ?>
                <div class="alert alert-info text-center ">
                    <h5 class="alert-title">Kayıt Bulunamadı</h5>
                    <p>Burada herhangi bir veri bulunamamaktadır. Eklemek için lütfen <a href="<?= base_url("product/new_form"); ?>">Tıklayınız</a></p>
                </div>
            <?php }else{ ?>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>url</th>
                            <th>Başlık</th>
                            <th>Açıklama</th>
                            <th>Durumu</th>
                            <th>işlem</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= $item->id; ?></td>
                        <td><?= $item->url; ?></td>
                        <td><?= $item->title; ?></td>
                        <td><?= $item->description; ?></td>
                        <td>
                            <input
                                    type="checkbox"
                                    data-switchery
                                    data-color="#10c469"
                                    <?= ($item->isActive) ? "checked" : "";  ?>
                            />
                        </td>
                        <td>
                            <button
                                    data-url="<?= base_url("product/delete/{$item->id}"); ?>"
                                    class="btn btn-sm btn-danger btn-outline remove-btn">
                                    <i class="fa fa-trash"></i> Sil
                            </button>
                            <a href="<?= base_url("product/update_form/{$item->id}"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>