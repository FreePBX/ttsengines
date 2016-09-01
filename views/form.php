
<form class="fpbx-submit" name="frm_ttsengines" action="" method="post" data-fpbx-delete="<?php echo $delurl?>" role="form">
  <?php
    if ($edit)
    {
      echo '<input type="hidden" name="edit" value="1">';
      echo '<input type="hidden" name="engineid" value="' . $edit . '">';
    }
    else
    {
      echo '<input type="hidden" name="addengine" value="1">';
    }
    ?>
    <!--Engine Name-->
    <div class="element-container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label" for="enginename"><?php echo _("Engine Name") ?></label>
                <i class="fa fa-question-circle fpbx-help-icon" data-for="enginename"></i>
              </div>
              <div class="col-md-9">
                <select class="form-control" id="enginename" name="enginename" data-value="<?php echo isset($enginename)?$enginename:''?>">
                  <option value="text2wave" <?php echo !empty($enginename) && $enginename == "text2wave" ?'selected':''?>>text2wave</option>
                  <option value="flite" <?php echo !empty($enginename) && $enginename == "flite" ?'selected':''?>>flite</option>
                  <option value="swift" <?php echo !empty($enginename) && $enginename == "swift" ?'selected':''?>>swift</option>
                  <option value="pico" <?php echo !empty($enginename) && $enginename == "pico" ?'selected':''?>>pico</option>
                  <option value="custom" <?php echo !empty($enginename) && !in_array($enginename,array("text2wave","flite","swift","pico")) ?'selected':''?>>custom</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <span id="enginename-help" class="help-block fpbx-help-block"><?php echo _("The name you enter will be shown in a drop down box on the Text to Speech page so you can select which engine you want to play your")?></span>
        </div>
      </div>
    </div>
    <!--END Engine Name-->
    <!--Engine Path-->
    <div class="element-container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label" for="enginepath"><?php echo _("Engine Path") ?></label>
                <i class="fa fa-question-circle fpbx-help-icon" data-for="enginepath"></i>
              </div>
              <div class="col-md-9">
                <input type="text" class="form-control" id="enginepath" name="enginepath" value="<?php echo isset($enginepath)?$enginepath:''?>">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <span id="enginepath-help" class="help-block fpbx-help-block"><?php echo _("The full path to the binary of your text to speech engine. For example: /usr/sbin/magic_speech_engine.")?></span>
        </div>
      </div>
    </div>
    <!--END Engine Path-->
</form>
