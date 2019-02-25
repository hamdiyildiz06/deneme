<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            "<strong><?= $item->company_name; ?></strong>" Kaydını Düzenliyorsunuz...
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <form action="<?= base_url("settings/update/{$item->id}"); ?>" method="post" enctype="multipart/form-data">
            <div class="widget">
                <div class="m-b-lg nav-tabs-horizontal">
                    <!-- tabs list -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab">Site Bilgileri</a></li>
                        <li role="presentation"><a href="#tab-6" aria-controls="tab-6" role="tab" data-toggle="tab">Adres Bilgisi</a></li>
                        <li role="presentation"><a href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab">Hakkımızda</a></li>
                        <li role="presentation"><a href="#tab-3"  aria-controls="tab-3" role="tab" data-toggle="tab">Misyon</a></li>
                        <li role="presentation"><a href="#tab-4"  aria-controls="tab-4" role="tab" data-toggle="tab">Vizyon</a></li>
                        <li role="presentation"><a href="#tab-5"  aria-controls="tab-5" role="tab" data-toggle="tab">Sosyal Media</a></li>
                        <li role="presentation"><a href="#tab-7"  aria-controls="tab-7" role="tab" data-toggle="tab">Logo</a></li>
                    </ul><!-- .nav-tabs -->

                    <!-- Tab panes -->

                    <div class="tab-content p-md">
                        <div role="tabpanel" class="tab-pane in active fade" id="tab-1">
                            <h4 class="m-b-md">Site Bilgilerim</h4>

                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="company_name">Şirket Adı</label>
                                    <input type="text" class="form-control" id="company_name" placeholder="Şirket veya Sitenizin Adı" name="company_name" value="<?= isset($form_error) ? set_value("company_name") : $item->company_name; ?>">
                                    <?php if (isset($form_error)){ ?>
                                        <small class="input-form-error pull-right"><?= form_error("company_name"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="phone_1">Telefon 1</label>
                                    <input type="tel" class="form-control" id="phone_1" placeholder="Telefon Numaranız" name="phone_1" value="<?= isset($form_error) ? set_value("phone_1") : "$item->phone_1"; ?>">
                                    <?php if (isset($form_error)){ ?>
                                        <small class="input-form-error pull-right"><?= form_error("phone_1"); ?></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="phone_2">Telefon 2</label>
                                    <input type="tel" class="form-control" id="phone_2" placeholder="Diğer Telefon Numaranız ( Opsiyonel )" name="phone_2" value="<?= isset($form_error) ? set_value("phone_2") : "$item->phone_2"; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="fax_1">Fax 1</label>
                                    <input type="tel" class="form-control" id="fax_1" placeholder="Fax Numaranız" name="fax_1" value="<?= isset($form_error) ? set_value("fax_1") : "$item->fax_1"; ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="fax_2">Fax 2</label>
                                    <input type="tel" class="form-control" id="fax_2" placeholder="Diğer Fax Numaranız ( Opsiyonel )" name="fax_2" value="<?= isset($form_error) ? set_value("fax_2") : "$item->fax_2"; ?>">
                                </div>
                            </div>

                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-6">
                            <h4 class="m-b-md">Adres Bilgilerim</h4>
                            <div class="form-group">
                                <label for="address">Adres Bilgilerim</label>
                                <textarea  class="m-0" data-plugin="summernote" data-options="{height: 250}" name="address">
                                    <?= isset($form_error) ? set_value("company_name") : $item->address; ?>
                                </textarea>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-2">
                            <h4 class="m-b-md">Hakkımızda</h4>
                            <div class="form-group">
                                <label for="about_us">Hakkımızda</label>
                                <textarea  class="m-0" data-plugin="summernote" data-options="{height: 250}" name="about_us">
                                    <?= isset($form_error) ? set_value("company_name") : $item->about_us; ?>
                                </textarea>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-3">
                            <h4 class="m-b-md">Misyonumuz</h4>
                            <div class="form-group">
                                <label for="mission">Misyon</label>
                                <textarea  class="m-0" data-plugin="summernote" data-options="{height: 250}" name="mission">
                                    <?= isset($form_error) ? set_value("company_name") : $item->mission; ?>
                                </textarea>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-4">
                            <h4 class="m-b-md">Vizyonumuz</h4>
                            <div class="form-group">
                                <label for="vision">Vizyon</label>
                                <textarea  class="m-0" data-plugin="summernote" data-options="{height: 250}" name="vision">
                                    <?= isset($form_error) ? set_value("company_name") : $item->vision; ?>
                                </textarea>
                            </div>
                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-5">
                            <h4 class="m-b-md">Sosyal Medya</h4>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="email">E-Posta Adresiniz</label>
                                    <input type="email" class="form-control" id="email" placeholder="Şirketinize Ait E-Posta Adresiniz" name="email" value="<?= isset($form_error) ? set_value("email") : "$item->email"; ?>">
                                    <?php if (isset($form_error)){ ?>
                                        <small class="input-form-error pull-right"><?= form_error("email"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control" id="facebook" placeholder="Facebook Adresiniz" name="facebook" value="<?= isset($form_error) ? set_value("facebook") : "$item->facebook"; ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" class="form-control" id="twitter" placeholder="Twitter Adresiniz" name="twitter" value="<?= isset($form_error) ? set_value("twitter") : "$item->twitter"; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="instagram">İnstagram</label>
                                    <input type="text" class="form-control" id="instagram" placeholder="İnstagram Adresiniz" name="instagram" value="<?= isset($form_error) ? set_value("instagram") : "$item->instagram"; ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="linkedin">Linkedin </label>
                                    <input type="text" class="form-control" id="linkedin" placeholder="Linkedin Adresiniz" name="linkedin" value="<?= isset($form_error) ? set_value("linkedin") : "$item->linkedin"; ?>">
                                </div>
                            </div>
                        </div><!-- .tab-pane  -->

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
                    </div><!-- .tab-content  -->
                </div><!-- .nav-tabs-horizontal -->
            </div><!-- .widget -->
            <button type="submit" class="btn btn-primary btn-md">Güncelle</button>
            <a href="<?= base_url("settings"); ?>" class="btn btn-md btn-danger">İptal</a>
        </form>
    </div><!-- END column -->
</div>