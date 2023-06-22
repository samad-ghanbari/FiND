<!-- Modal -->
<div class="modal fade"  data-backdrop="static" data-keyboard="false"  id="newCenterModal" role="dialog" style="text-align: right;">
    <div class="modal-dialog modal-lg" style="max-width:450px;">
        <div class="modal-content" style="border:1px solid greenyellow;">

            <div class="modal-header" style="background-color: #555;border:none; color:white">
<!--                <button type="button" class="close" data-dismiss="modal" style="float:left;">&times;</button>-->
                <h4 class="modal-title">افزودن مرکز جدید</h4>
            </div>
            <form method="post" action=<?= Yii::$app->request->baseUrl . "/base/add_new_center"; ?>>
                <div class="modal-body" style="background-color: #555;border:none;">
                    <!-- body -->
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="newCenterDistrictId" name="center[district]" class="form-control" style="text-align: center;height:50px;width:200px;"  value="-1" required readonly>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">منطقه</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="newCenterNameId"  name="center[name]" class="form-control" style="direction: rtl;text-align: right;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">نام</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="newCenterAbbrId" name="center[abbr]" class="form-control" style="text-align: left;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">اختصار</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="newCenterLatId" name="center[lat]" class="form-control" style="text-align: left;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">عرض جغرافیایی</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="newCenterLongId" name="center[long]" class="form-control" style="text-align: left;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">طول جغرافیایی</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <textarea name="center[address]" id="newCenterAddressId" class="form-control" style="text-align: right;direction: rtl;width:200px;" rows="3" ></textarea>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">آدرس</span>
                    </div>

                </div>
                <div class="modal-footer" style="background-color: #555;border:none;">
                    <button style="min-width: 100px;float:left;" class="btn btn-success" >افزودن</button>
                    <button style="float:right;" class="btn btn-danger" data-dismiss="modal" >بستن</button>
                    <br style="clear: both;" />
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->