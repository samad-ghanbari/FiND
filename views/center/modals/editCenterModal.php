<!-- Modal -->
<div class="modal fade"  data-backdrop="static" data-keyboard="false"  id="editCenterModal" role="dialog" style="text-align: right;">
    <div class="modal-dialog modal-lg" style="max-width:450px;">
        <div class="modal-content" style="border:1px solid greenyellow;">

            <div class="modal-header" style="background-color: #555;border:none; color:white">
                <h4 class="modal-title">ویرایش/حذف مرکز</h4>
            </div>
            <form method="post" action=<?= Yii::$app->request->baseUrl . "/center/edit_remove_center"; ?>>
                <div class="modal-body" style="background-color: #555;border:none;">
                    <!-- body -->
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                    <input type="hidden" id="centerId" name="center[id]" value="-1" />

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <select type="text" id="centerDistrictId" name="center[district]" class="form-control" style="text-align: center;height:50px;width:200px;"  value="-1" required >
                        </select>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">منطقه</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="centerNameId"  name="center[name]" class="form-control" style="direction: rtl;text-align: right;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">نام</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="centerAbbrId" name="center[abbr]" class="form-control" style="text-align: left;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">اختصار</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="centerLatId" name="center[lat]" class="form-control" style="text-align: left;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">عرض جغرافیایی</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="centerLongId" name="center[long]" class="form-control" style="text-align: left;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">طول جغرافیایی</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <textarea name="center[address]" id="centerAddressId" class="form-control" style="text-align: right;direction: rtl;width:200px;" rows="3" ></textarea>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">آدرس</span>
                    </div>

                </div>
                <div class="modal-footer" style="background-color: #555;border:none;">
                    <button type="submit" name="center[action]" value="update" style="min-width: 100px;float:left;" class="btn btn-success" >تایید</button>
                    <button style="float:left;" class="btn btn-warning" data-dismiss="modal" >بستن</button>
                    <button type="submit" name="center[action]" value="remove" style="float:right;" class="btn btn-danger"  >حذف</button>
                    <br style="clear: both;" />
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->