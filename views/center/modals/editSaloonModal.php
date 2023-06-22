<!-- Modal -->
<div class="modal fade"  data-backdrop="static" data-keyboard="false"  id="editSaloonModal" role="dialog" style="text-align: right;">
    <div class="modal-dialog modal-lg" style="max-width:450px;">
        <div class="modal-content" style="border:1px solid greenyellow;">

            <div class="modal-header" style="background-color: #555;border:none; color:white">
                <h4 class="modal-title">ویرایش/حذف سالن</h4>
            </div>
            <form method="post" action=<?= Yii::$app->request->baseUrl . "/center/edit_remove_saloon"; ?> >
                <div class="modal-body" style="background-color: #555;border:none;">
                    <!-- body -->
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                    <input type="hidden" id="modalEdRemSaloonId" name="saloon[id]" value="-1" />

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="modalEdRemSaloonCenter" name="saloon[center]" class="form-control" style="text-align: center;height:50px;width:200px;"  required readonly>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">مرکز</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="modalEdRemSaloonBuilding"  name="saloon[building_name]" class="form-control" style="direction: rtl;text-align: right;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">ساختمان</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="number" id="modalEdRemSaloonFloor" name="saloon[floor_no]" class="form-control" style="text-align: left;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">طبقه</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="modalEdRemSaloonName" name="saloon[name]" class="form-control" style="text-align: right;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">نام سالن</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="modalEdRemSaloonApChar" name="saloon[append_char]" class="form-control" style="text-align: left;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">کاراکتر الصاقی</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="number" min="1" id="modalEdRemSaloonWidth" name="saloon[width]" class="form-control" style="text-align: left;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">(متر)عرض سالن</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="number" min="1" id="modalEdRemSaloonHeight" name="saloon[height]" class="form-control" style="text-align: left;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">(متر)طول سالن</span>
                    </div>

                </div>
                <div class="modal-footer" style="background-color: #555;border:none;">
                    <button name="saloon[action]" value="update" type="submit" style="min-width: 100px;float:left;" class="btn btn-success" >تایید</button>
                    <button style="float:left;" data-dismiss="modal" class="btn btn-warning" >بستن</button>
                    <button name="saloon[action]" value="remove" style="float:right;" class="btn btn-danger" >حذف</button>
                    <br style="clear: both;" />
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->