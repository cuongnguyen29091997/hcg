<?php 
  $data['benh-tinh-trang']['condition'] = explode(";", $data['benh-tinh-trang']['condition']);
  ob_start();
  require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
  <?php 
      require_once('admin/views/layouts/message.php');
   ?>
  <form method="POST" action="/cms-admin/benh-tinh-trang/update/<?php echo $data['benh-tinh-trang']['id'] ?>">
    <div style="text-align: center;"><button type="submit" class="btn btn-success">Cập nhật</button></div>
    <div class="form-group">
      <label for="f_result">Bệnh : </label>
      <select name="result" class="form-control" id="f_result">
        <?php foreach ($data['illness'] as $ill) { 
          $checked = ($ill->id == $data['benh-tinh-trang']['result'] ? "selected" : "");
        ?>
          <option value="<?php echo $ill->id ?>" <?php echo $checked ?>><?php echo $ill->summary; ?></option>";
        <?php } ?>
      </select>
    </div>
    <!-- Dùng để get javascript lấy, không có giá trị -->
    <div id="addConditionForm" style="display: none;">
      <div class="row"> 
        <div class="col-md-8">
          <select name="condition[]" class="form-control">
            <?php foreach ($data['answers'] as $ans) { ?>
              <option value="<?php echo $ans->id ?>"><?php echo $ans->summary; ?></option>";
            <?php } ?>
          </select>
        </div>
        <div class="col-md-4" style="text-decoration: underline;color: red;cursor: pointer;" onclick="rmElement('for_change_123321')">Remove</div>
      </div>
    </div>
    <!-- sow ra  -->
    <div class="form-group">
      <label>Tình trạng : </label>
      <?php 
        foreach ($data['benh-tinh-trang']['condition'] as $tt) {
          $idRow = rand(0,12345679000);
      ?>
      <div id="<?php echo($idRow); ?>" class="row">
        <div class="col-md-8">
          <select name="condition[]" class="form-control">
            <?php foreach ($data['answers'] as $ans) { 
               $checked = ($ans->id == $tt ? "selected" : "");
            ?>
              <option value="<?php echo $ans->id ?>" <?php echo $checked; ?>><?php echo $ans->summary; ?></option>";
            <?php } ?>
          </select>
        </div>
        <div class="col-md-4" style="text-decoration: underline;color: red;cursor: pointer;" onclick="rmElement(<?php echo $idRow; ?>)">Remove</div>
      </div>
      <?php } ?>
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