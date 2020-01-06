<?php 
  ob_start();
  require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
  <?php 
      require_once('admin/views/layouts/message.php');
   ?>
  <form method="POST" action="/cms-admin/trieu-chung-tham-van/store">
    <div style="text-align: center;"><button type="submit" class="btn btn-success">Tạo mới</button></div>
    <div class="form-group">
      <label for="f_result">Triệu chứng: </label>
      <select name="query" class="form-control" id="f_result">
        <?php foreach ($symptoms as $symp) { ?>
          <option value="<?php echo $symp->id ?>"><?php echo $symp->name; ?></option>";
        <?php } ?>
      </select>
    </div>
    <!-- Dùng để get javascript lấy, không có giá trị -->
    <div id="addConditionForm" style="display: none;">
      <div class="row"> 
        <div class="col-md-8">
          <select name="conditions[]" class="form-control">
            <?php foreach ($symptoms as $symp) { ?>
              <option value="<?php echo $symp->id ?>"><?php echo $symp->name; ?></option>";
            <?php } ?>
          </select>
        </div>
        <div class="col-md-4" style="text-decoration: underline;color: red;cursor: pointer;" onclick="rmElement('for_change_123321')">Remove</div>
      </div>
    </div>
    <!-- sow ra  -->
    <div class="form-group">
      <label>Tình trạng : </label>
      <div id="addBefore"></div>
    </div>
  </form>
  <br>
  <div style="clear: both; margin-top: 20px;">
    <button type="button" class="btn btn-warning" id="addCondition">Thêm ràng buộc tình trạng</button>
    <a href="cms-admin/benh-tinh-trang/index" type="button" class="btn btn-info">Quay về trang chủ</a>
  </div>
<?php
    $content = ob_get_clean();
    // extend from 
    require('admin/views/master-page.php');
?>
<script type="text/javascript">
function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}
  function rmElement(idRow) {
    $("#" + idRow).remove();
  }
  var answerClass = null;
  $( document ).ready(function() {
    answerClass = document.getElementById("addConditionForm");
    $("#addConditionForm").remove();
  })
  $( "#addCondition" ).click(function() {
    var newElement = document.createElement("div");
    var idRand = getRandomInt(12345679000);
    newElement.innerHTML = answerClass.innerHTML.replace("for_change_123321", idRand);
    newElement.id = idRand;
    $("#addBefore").before(newElement);
  });
</script>   
<!-- css -->