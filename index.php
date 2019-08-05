<?php
include("includes/header.php");
 
?>

<div class="user_details column">
     <img class="loading" src="assets/images/icons/loading.gif">
<p id="upgrade_fail"> Failed to do the Upgrade. Check your network connection. Refresh the page to try again. </p>
    <img id="update_button" alt="update_button" src="assets/images/buttons/update.jpg">

</div>
<div class="main_column column">
    

    <div class="posts_area">
    <img class="loading" src="assets/images/icons/loading.gif">
<p id="downgrade_fail"> Failed to do the Downgrade. Check your network connection. Refresh the page to try again. </p>
<div id="hard_refresh">
<p><span style="font-size: 14pt;"><strong><span style="text-decoration: underline;">Upgrade/Downgrade done. Please hard refresh your browser, to clear cache and refresh. Instrctions for different browser given below:-</span></strong></span></p>
<p><strong>For chrome:-</strong><br /><strong>Windows/Linux:</strong></p>
<p>Hold down Ctrl and click the Reload button.<br />Or, Hold down Ctrl and press F5.</p>
<p><br /><strong>Mac</strong>:</p>
<p>Hold ⇧ Shift and click the Reload button.<br />Or, hold down ⌘ Cmd and ⇧ Shift key and then press R.<br />...............................................................................<br /><strong>Mozilla Firefox and Related Browsers:-</strong></p>
<p><strong>Windows/Linux:</strong></p>
<p>Hold the Ctrl key and press the F5 key.<br />Or, hold down Ctrl and ⇧ Shift and then press R.<br /><strong>Mac</strong>:</p>
<p>Hold down the ⇧ Shift and click the Reload button.<br />Or, hold down ⌘ Cmd and ⇧ Shift and then press R.<br />................................................................................<br /><strong>Internet Explorer:</strong></p>
<p>Hold the Ctrl key and press the F5 key.<br />Or, hold the Ctrl key and click the Refresh button.<br />................................................................................</p>
</div>
 
   <input id="downgrade_version" type="text" name="ha_version" placeholder="Homeassistant Version" required> <BR> <BR>
 <input id="downgrade_button"  type="image" value="submit" src="assets/images/buttons/downgrade.jpg" alt="downgrade_button" name="downgrade_button" >

</div>
</div>
 

<script>

$(document).ready(function() {
$('.loading').hide();
$('#upgrade_fail').hide();
$('#downgrade_fail').hide();
$('#hard_refresh').hide();

    $('#downgrade_button').click(function () {
var ha_version = $('.posts_area').find('#downgrade_version').val();
 if (ha_version == "") {
                alert('Fill Correct Old Homeassistant version first');
return false;
} 
var ha_version = ha_version.replace(" ", "");
var ha_version = ha_version.replace("	", "");



$('.loading').show();
$('#upgrade_fail').hide();
$('#downgrade_fail').hide();
$('#downgrade_version').hide();
$('#downgrade_button').hide();
$('#update_button').hide();
$('#hard_refresh').hide();

       $.ajax({
            type: "POST",
            url: "includes/handlers/ajax_downgrade_hass.php",
            data:  "HAVersion="+ha_version,
 
            cache: false,
            success: function (msg) {
$('.loading').hide();

  if (msg == "0") {
$('#hard_refresh').show();
} else {
$('#downgrade_fail').show();
 
  }
 
            },
            error: function () {
$('.loading').hide();
 
                alert('Failed to do the Downgrade. Check your network connection. Refresh the page to try again. ');
            }
        });
  return false;
    });

 $('#update_button').click(function () {
 
$('.loading').show();
$('#upgrade_fail').hide();
$('#downgrade_fail').hide();
$('#downgrade_version').hide();
$('#downgrade_button').hide();
$('#update_button').hide();
$('#hard_refresh').hide();
        $.ajax({
            type: "POST",
            url: "includes/handlers/ajax_update_hass.php",
 
            cache: false,
            success: function (msg) {
$('.loading').hide();

  if (msg == "0") {
$('#hard_refresh').show();
} else {
$('#upgrade_fail').show();
 

  }
 
            },
            error: function () {
$('.loading').hide();
 
                alert('Failed to do the Update. Check your network connection. Refresh the page to try again. ');
            }
        });
  return false;
    });

});
</script>
</div>
</body>

</html>
