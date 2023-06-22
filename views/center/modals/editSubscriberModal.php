<!-- Modal -->
<div class="modal fade"  data-backdrop="static" data-keyboard="false"  id="editSubscriberModal" role="dialog" style="text-align: right;">
    <div class="modal-dialog modal-lg" style="max-width:450px;">
        <div class="modal-content" style="border:1px solid greenyellow;">

            <div class="modal-header" style="background-color: #555;border:none; color:white">
                <h4 class="modal-title">ویرایش/حذف مشترک</h4>
            </div>
            <form method="post" action=<?= Yii::$app->request->baseUrl . "/center/edit_remove_subscriber"; ?>>
                <div class="modal-body" style="background-color: #555;border:none;">
                    <!-- body -->
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                    <input type="hidden" id="subsId" name="subscriber[id]" value="-1" />

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <select onchange="districtChanged()" id="subsDistrictId" name="subscriber[district]" class="form-control" style="text-align: center;height:50px;width:200px;"  value="-1" required >
                        </select>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">منطقه</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <select id="subsCenterId" name="subscriber[center]" class="form-control" style="text-align: center;height:50px;width:200px;"  value="-1" required >
                        </select>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">مرکز</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="subsNameId"  name="subscriber[name]" class="form-control" style="direction: rtl;text-align: right;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">نام</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="subsAbbrId" name="subscriber[abbr]" class="form-control" style="text-align: left;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">اختصار</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="subsLatId" name="subscriber[lat]" class="form-control" style="text-align: left;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">عرض جغرافیایی</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <input type="text" id="subsLongId" name="subscriber[long]" class="form-control" style="text-align: left;height:50px;width:200px;" required>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">طول جغرافیایی</span>
                    </div>

                    <div class="input-group" style="max-width: 400px; min-width: 100px;height: 50px;margin: auto;">
                        <textarea name="subscriber[address]" id="subsAddressId" class="form-control" style="text-align: right;direction: rtl;width:200px;" rows="3" ></textarea>
                        <span class="input-group-addon" style="height: 50px; width:120px;text-align: right;">آدرس</span>
                    </div>

                </div>
                <div class="modal-footer" style="background-color: #555;border:none;">
                    <button name="subscriber[action]" value="update" type="submit" style="min-width: 100px;float:left;" class="btn btn-success" >تایید</button>
                    <button style="float:left;" data-dismiss="modal" class="btn btn-warning" >بستن</button>
                    <button name="subscriber[action]" value="remove" style="float:right;" class="btn btn-danger" >حذف</button>
                    <br style="clear: both;" />
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->