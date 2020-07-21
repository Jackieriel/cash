<?php 
  require("../includes/config.php");
  require_once(ROOT_PATH . "core/backEnd-wrapper.php");
  //Privilege Settings
  $accounting = 'false';
  $editor = 'true';
  require_once(ROOT_PATH . "core/adminSession.php");

  //
  if(isset($_POST['signupBonus'])) {
    $signupBonus = strip_tags($_POST['signupBonus']);
    $phPerc = strip_tags($_POST['phPerc']);
    $phMaturity = strip_tags($_POST['phMaturity']);
    $phTimer = strip_tags($_POST['phTimer']);
    $autoReMerge = strip_tags($_POST['autoReMerge']);
    $popConfirm = strip_tags($_POST['popConfirm']);
    $phNote = strip_tags($_POST['phNote']);
    $ghNote = strip_tags($_POST['ghNote']);
    $refBonus = strip_tags($_POST['refBonus']);
    $refPayout = strip_tags($_POST['refPayout']);
    $creditValue = strip_tags($_POST['creditValue']);
    $creditPayout = strip_tags($_POST['creditPayout']);
    $popUpload = strip_tags($_POST['popUpload']);
    $creditPOPConfirm = strip_tags($_POST['creditPOPConfirm']);
    $profilePic = strip_tags($_POST['profilePic']);
    $testimony = strip_tags($_POST['testimony']);
    $testimonyVideo = strip_tags($_POST['testimonyVideo']);
    $refCredit = strip_tags($_POST['refCredit']);
    $autoMerging = strip_tags($_POST['autoMerging']);
    $emailNote = strip_tags($_POST['emailNote']);
    $smsNote = strip_tags($_POST['smsNote']);
    $smsUrl = strip_tags($_POST['smsUrl']);
    $smsUsername = strip_tags($_POST['smsUsername']);
    $smsPassword = strip_tags($_POST['smsPassword']);
    $recommitPerc = strip_tags($_POST['recommitPerc']);
    $smsSender = strip_tags($_POST['smsSender']);
    $smsPort = strip_tags($_POST['smsPort']);


    try {
      $stmt = $genInfo->runQuery("UPDATE configuration 
        SET  signup_bonus=:signupBonus, 
            ph_percentage=:phPerc, 
            ph_maturity=:phMaturity,
            ph_timer=:phTimer,
            ph_auto_merge_timer=:autoReMerge,
            pop_confirm=:popConfirm,
            pay_instructions=:phNote,
            pay_confirmation_instr=:ghNote,
            referral_bonus=:refBonus,
            min_referral_payout=:refPayout,
            creditbility=:creditValue,
            min_credit_payout=:creditPayout,
            credit_pop_upload=:popUpload,
            credit_pop_confirm=:creditPOPConfirm,
            credit_profile_photo=:profilePic,
            credit_testimony=:testimony,
            credit_video_testimony=:testimonyVideo,
            credit_referral=:refCredit,
            auto_merge=:autoMerging,
            email_note=:emailNote,
            sms_note=:smsNote,
            sms_gateway_url=:smsUrl,
            sms_gateway_user=:smsUsername,
            sms_gateway_pass=:smsPassword,
            recommit_perc=:recommitPerc,
            sms_sender=:smsSender,
            sms_port=:smsPort

        WHERE id='1'");     
      $stmt->execute(array(   
        ':signupBonus'=>$signupBonus, 
        ':phPerc'=>$phPerc,  
        ':phMaturity'=>$phMaturity, 
        ':phTimer'=>$phTimer, 
        ':autoReMerge'=>$autoReMerge, 
        ':popConfirm'=>$popConfirm, 
        ':phNote'=>$phNote, 
        ':ghNote'=>$ghNote, 
        ':refBonus'=>$refBonus, 
        ':refPayout'=>$refPayout, 
        ':creditValue'=>$creditValue, 
        ':creditPayout'=>$creditPayout, 
        ':popUpload'=>$popUpload, 
        ':creditPOPConfirm'=>$creditPOPConfirm, 
        ':profilePic'=>$profilePic, 
        ':testimony'=>$testimony, 
        ':testimonyVideo'=>$testimonyVideo, 
        ':refCredit'=>$refCredit, 
        ':autoMerging'=>$autoMerging,
        ':emailNote'=>$emailNote,
        ':smsNote'=>$smsNote,
        ':smsUrl'=>$smsUrl,
        ':smsUsername'=>$smsUsername,
        ':smsPassword'=>$smsPassword,
        ':recommitPerc'=>$recommitPerc,
        ':smsSender'=>$smsSender,
        ':smsPort'=>$smsPort)); 
    }
    catch(PDOException $e) {
      echo $e->getMessage();
    }
    $genInfo->redirect(BASE_URL.'administrator/configuration?updated');
    exit();
  }

  $pageTitle = "Admin: Configuration";
  $pageDesc = "Description";
  $pageKeywords = "Keywords";

  include(ROOT_PATH."administrator/includes/header.php"); 
  include(ROOT_PATH."administrator/includes/navMenu.php"); 
?>
 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb">
            <li><a href="<?php echo BASE_URL;?>administrator">Dashboard</a></li>
            <li><a href="<?php echo BASE_URL;?>administrator/configuration">Settings</a></li>
            <li class="active">Configuration</li>
        </ol>
    </div>
</div>
                        
<div class="row">
<?php
      if(isset($error)){
          foreach($error as $error){?>
           <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle"></i> &nbsp; <?php echo $error; ?>
           </div>
  <?php } }elseif(isset($_GET['updated'])){?>
   <div class="alert alert-success">
      <i class="fa fa-check-square"></i> &nbsp; Configuration updated!
   </div>
<?php }?>
<form action="#" method="post" action="" data-parsley-validate novalidate>
<div class="col-lg-12">
  <div class="card-box">
    <div class="table-responsive">
      <table class="table table-hover mails m-0 table table-actions-bar">      
        <thead>
          <tr>
            <th></th>
            <th style="min-width:250px"></th>
            <th style="width:55%"></th>
          </tr>
        </thead>
        <tbody>
        	
          
          
          <tr>  
            <td style="text-align: right;"><label for="signupBonus">Signup Bonus</label></td>
            <td>
              <input type="number" name="signupBonus" parsley-trigger="change" required 
              class="form-control" id="signupBonus" value="<?php if(isset($configInfo['signup_bonus'])){echo $configInfo['signup_bonus'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="signupBonus">Enter signup bonus by percentage (%), enter 0 for no bonus</label></td> 
          </tr>


          <tr>  
            <td style="text-align: right;"><label for="refBonus">Referral Bonus</label></td>
            <td>
              <input type="number" name="refBonus" parsley-trigger="change" required 
              class="form-control" id="refBonus" value="<?php if(isset($configInfo['referral_bonus'])){echo $configInfo['referral_bonus'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="refBonus">Enter referral bonus by percentage (%), enter 0 for no bonus</label></td> 
          </tr>




          <tr>  
            <td style="text-align: right;"><label for="refPayout">Referral Bonus Payout</label></td>
            <td>
              <input type="number" name="refPayout" parsley-trigger="change" required 
              class="form-control" id="refPayout" value="<?php if(isset($configInfo['min_referral_payout'])){echo $configInfo['min_referral_payout'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="refPayout">Enter minimum referral payout amount (In <?php echo $defaultCurrency['c_symbol'].' - '.$defaultCurrency['c_code'];?>)</label></td> 
          </tr>



          <tr>  
            <td style="text-align: right;"><label for="creditValue">Credibility Value</label></td>
            <td>
              <input type="number" name="creditValue" parsley-trigger="change" required 
              class="form-control" id="creditValue" value="<?php if(isset($configInfo['creditbility'])){echo $configInfo['creditbility'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="creditValue">Enter Credibility Score value by percentage (%), eg: 200, for 1 credit score equal to <?php echo $defaultCurrency['c_symbol'];?>2</label></td> 
          </tr>



          <tr>  
            <td style="text-align: right;"><label for="creditPayout">Credibility Payout</label></td>
            <td>
              <input type="number" name="creditPayout" parsley-trigger="change" required 
              class="form-control" id="creditPayout" value="<?php if(isset($configInfo['min_credit_payout'])){echo $configInfo['min_credit_payout'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="creditPayout">Enter minimum Credibility payout amount (In <?php echo $defaultCurrency['c_symbol'].' - '.$defaultCurrency['c_code'];?>)</label></td> 
          </tr>



          <tr>  
            <td style="text-align: right;"><label for="popUpload">POP Upload Reward</label></td>
            <td>
              <input type="number" name="popUpload" parsley-trigger="change" required 
              class="form-control" id="popUpload" value="<?php if(isset($configInfo['credit_pop_upload'])){echo $configInfo['credit_pop_upload'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="popUpload">Enter Credibility score reward for user who paid for PH order on time</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="creditPOPConfirm">POP Confirmation</label></td>
            <td>
              <input type="number" name="creditPOPConfirm" parsley-trigger="change" required 
              class="form-control" id="creditPOPConfirm" value="<?php if(isset($configInfo['credit_pop_confirm'])){echo $configInfo['credit_pop_confirm'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="creditPOPConfirm">Enter Credibility score reward for user who confirm Uploaded POP/GH Payment on time</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="profilePic">Profile Picture</label></td>
            <td>
              <input type="number" name="profilePic" parsley-trigger="change" required 
              class="form-control" id="profilePic" value="<?php if(isset($configInfo['credit_profile_photo'])){echo $configInfo['credit_profile_photo'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="profilePic">Enter Credibility score reward for user who uploaded profile picture</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="testimony">Testimony</label></td>
            <td>
              <input type="number" name="testimony" parsley-trigger="change" required 
              class="form-control" id="testimony" value="<?php if(isset($configInfo['credit_testimony'])){echo $configInfo['credit_testimony'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="testimony">Enter Credibility score reward for user who submitted Letter of Happiness</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="testimonyVideo">Testimony + Video</label></td>
            <td>
              <input type="number" name="testimonyVideo" parsley-trigger="change" required 
              class="form-control" id="testimonyVideo" value="<?php if(isset($configInfo['credit_video_testimony'])){echo $configInfo['credit_video_testimony'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="testimonyVideo">Enter Credibility score reward for user who submitted Letter of Happiness with Video</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="refCredit">Referral Credibility</label></td>
            <td>
              <input type="number" name="refCredit" parsley-trigger="change" required 
              class="form-control" id="refCredit" value="<?php if(isset($configInfo['credit_referral'])){echo $configInfo['credit_referral'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="refCredit">Enter Credibility score reward for referral</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="phPerc">PH Percent (%)</label></td>
            <td>
              <input type="number" name="phPerc" parsley-trigger="change" required 
              class="form-control" id="phPerc" value="<?php if(isset($configInfo['ph_percentage'])){echo $configInfo['ph_percentage'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="phPerc">Enter PH benefit by Percentage (%)</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="phMaturity">PH Maturity Period</label></td>
            <td>
              <select name="phMaturity" required class="form-control">
                <option value="<?php echo $configInfo['ph_maturity'];?>"><?php echo $configInfo['ph_maturity'];?></option>
                <option value="+24 hours">+24 hours</option>
                <option value="+2 days">+2 days</option>
                <option value="+5 days">+5 days</option>
                <option value="+10 days">+10 days</option>
                <option value="+15 days">+15 days</option>
                <option value="+20 days">+20 days</option>
                <option value="+30 days">+30 days</option>
                <option value="+40 days">+40 days</option>
                <option value="+60 days">+60 days</option>
              </select>
              
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="phMaturity">PH maturity period, eg: 7 days</label></td> 
          </tr>
          
          <tr>  
            <td style="text-align: right;"><label for="phMaturity">PH Order Timer</label></td>
            <td>
              <select name="phTimer" required class="form-control">
                <option value="<?php echo $configInfo['ph_timer'];?>"><?php echo $configInfo['ph_timer'];?></option>
                <option value="+30 minutes">+30 minutes</option>
                <option value="+60 minutes">+60 minutes</option>
                <option value="+3 hours">+3 hours</option>
                <option value="+6 hours">+6 hours</option>
                <option value="+12 hours">+12 hours</option>
                <option value="+24 hours">+24 hours</option>
                <option value="+48 hours">+48 hours</option>
                <option value="+72 hours">+72 hours</option>
                <option value="+144 hours">+144 hours</option>
              </select>
              
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="phTimer">PH order timer, order automatically deleted and defaulter user blocked if this timer elapses</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="autoReMerge">Auto-merge Interval</label></td>
            <td>
              <select name="autoReMerge" required class="form-control">
                <option value="<?php echo $configInfo['ph_auto_merge_timer'];?>"><?php echo $configInfo['ph_auto_merge_timer'];?></option>
                <option value="+10 minutes">+30 minutes</option>
                <option value="+30 minutes">+30 minutes</option>
                <option value="+60 minutes">+60 minutes</option>
                <option value="+3 hours">+3 hours</option>
                <option value="+6 hours">+6 hours</option>
                <option value="+12 hours">+12 hours</option>
                <option value="+24 hours">+24 hours</option>
                <option value="+48 hours">+48 hours</option>
                <option value="+72 hours">+72 hours</option>
                <option value="+144 hours">+144 hours</option>
              </select>
              
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="autoReMerge">Time Interval for user to receive a new match automaitcally</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="popConfirm">POP Confirmation</label></td>
            <td>
              <select name="popConfirm" id="popConfirm" required class="form-control">
                <option value="<?php echo $configInfo['pop_confirm'];?>"><?php echo $configInfo['pop_confirm'];?></option>
                <option value="+30 minutes">+30 minutes</option>
                <option value="+60 minutes">+60 minutes</option>
                <option value="+3 hours">+3 hours</option>
                <option value="+6 hours">+6 hours</option>
                <option value="+12 hours">+12 hours</option>
                <option value="+24 hours">+24 hours</option>
                <option value="+48 hours">+48 hours</option>
                <option value="+72 hours">+72 hours</option>
                <option value="+144 hours">+144 hours</option>
              </select>
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="popConfirm">Submitted POP automatically confirmed if not confirmed by the receiver within this period</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="phNote">PH Order Note</label></td>
            <td>
              <textarea class="form-control" id="phNote" name="phNote"><?php if(isset($configInfo['pay_instructions'])){echo $configInfo['pay_instructions'];}?></textarea>
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="phNote">Instruction on PH order</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="ghNote">GH Order Note</label></td>
            <td>
              <textarea class="form-control" id="ghNote" name="ghNote"><?php if(isset($configInfo['pay_confirmation_instr'])){echo $configInfo['pay_confirmation_instr'];}?></textarea>
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="ghNote">Instruction on GH POP confirmation</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="autoMerging">Auto Merging</label></td>
            <td>
              <select name="autoMerging" id="autoMerging" required class="form-control">
                <option value="<?php echo $configInfo['auto_merge'];?>"><?php echo $configInfo['auto_merge'];?></option>
                <option value="Enabled">Enabled</option>
                <option value="Disabled">Disabled</option>
              </select>
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="autoMerging">You can control merging method here, if enabled, available PH participants would be merged to pay available GH participants automatically</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="emailNote">Email Notification</label></td>
            <td>
              <select name="emailNote" id="emailNote" required class="form-control">
                <option value="<?php echo $configInfo['email_note'];?>"><?php echo $configInfo['email_note'];?></option>
                <option value="Enabled">Enabled</option>
                <option value="Disabled">Disabled</option>
              </select>
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="emailNote">Enable or disable sms notification</label></td> 
          </tr>


          <tr>  
            <td style="text-align: right;"><label for="smsNote">SMS Notification</label></td>
            <td>
              <select name="smsNote" id="smsNote" required class="form-control">
                <option value="<?php echo $configInfo['sms_note'];?>"><?php echo $configInfo['sms_note'];?></option>
                <option value="Enabled">Enabled</option>
                <option value="Disabled">Disabled</option>
              </select>
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="smsNote">Enable or disable sms notification</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="smsSender">SMS Sender</label></td>
            <td>
              <input type="text" name="smsSender" parsley-trigger="change" required maxlength="11" 
              class="form-control" id="smsSender" value="<?php if(isset($configInfo['sms_sender'])){echo $configInfo['sms_sender'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="smsSender">Enter sender's name that shows on receiver's end as sender, eg: sitename</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="smsPort">SMS Gateway Port</label></td>
            <td>
              <input type="text" name="smsPort" parsley-trigger="change" required 
              class="form-control" id="smsPort" value="<?php if(isset($configInfo['sms_port'])){echo $configInfo['sms_port'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="smsPort">Enter port number of your SMS sending Gateway</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="smsUrl">SMS Gateway URL</label></td>
            <td>
              <input type="text" name="smsUrl" parsley-trigger="change" required 
              class="form-control" id="smsUrl" value="<?php if(isset($configInfo['sms_gateway_url'])){echo $configInfo['sms_gateway_url'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="smsUrl">Enter url of your SMS sending Gateway</label></td> 
          </tr>

          <tr>  
            <td style="text-align: right;"><label for="smsUsername">SMS Gateway Username</label></td>
            <td>
              <input type="text" name="smsUsername" parsley-trigger="change" required 
              class="form-control" id="smsUsername" value="<?php if(isset($configInfo['sms_gateway_user'])){echo $configInfo['sms_gateway_user'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="smsUsername">Enter username of your SMS sending Gateway</label></td> 
          </tr>


          <tr>  
            <td style="text-align: right;"><label for="smsPassword">SMS Gateway Password</label></td>
            <td>
              <input type="text" name="smsPassword" parsley-trigger="change" required 
              class="form-control" id="smsPassword" value="<?php if(isset($configInfo['sms_gateway_pass'])){echo $configInfo['sms_gateway_pass'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="smsPassword">Enter Password of your SMS sending Gateway</label></td> 
          </tr>


          <tr>  
            <td style="text-align: right;"><label for="recommitPerc">Recommitment %</label></td>
            <td>
              <input type="number" name="recommitPerc" parsley-trigger="change" max="100" required 
              class="form-control" id="recommitPerc" value="<?php if(isset($configInfo['recommit_perc'])){echo $configInfo['recommit_perc'];}?>">
            </td>        
            <td><label style="font-style: italic;font-weight:300" for="recommitPerc">Enter Recommitment by percentage (%), (eg: 50 for 50% payment of selected recommitment package)</label></td> 
          </tr>

          
        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br><br>
<div class="form-group text-center m-b-0">
  <button class="btn btn-primary waves-effect waves-light" type="submit">
    Update
  </button>
</div>
</form>

</div>
  </div> <!-- container -->             
</div> <!-- content -->

<?php include(ROOT_PATH."administrator/includes/footer.php");?>

<!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script src="assets/plugins/switchery/dist/switchery.min.js"></script>
        <script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="assets/plugins/select2/select2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>


        <script>
            jQuery(document).ready(function() {

                //advance multiselect start
                $('#my_multi_select3').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });

                // Select2
                $(".select2").select2();
                
                $(".select2-limiting").select2({
          maximumSelectionLength: 2
        });
        
         $('.selectpicker').selectpicker();
              $(":file").filestyle({input: false});
              });
              
              //Bootstrap-TouchSpin
              $(".vertical-spin").TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'ion-plus-round',
                verticaldownclass: 'ion-minus-round'
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
    
            $("input[name='demo1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='demo2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='demo3']").TouchSpin();
            $("input[name='demo3_21']").TouchSpin({
                initval: 40
            });
            $("input[name='demo3_22']").TouchSpin({
                initval: 40
            });
    
            $("input[name='demo5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
            $("input[name='demo0']").TouchSpin({});
            
            
            //Bootstrap-MaxLength
            $('input#defaultconfig').maxlength()
            
            $('input#thresholdconfig').maxlength({
                threshold: 20
            });

            $('input#moreoptions').maxlength({
                alwaysShow: true,
                warningClass: "label label-success",
                limitReachedClass: "label label-danger"
            });

            $('input#alloptions').maxlength({
                alwaysShow: true,
                warningClass: "label label-success",
                limitReachedClass: "label label-danger",
                separator: ' out of ',
                preText: 'You typed ',
                postText: ' chars available.',
                validate: true
            });

            $('textarea#textarea').maxlength({
                alwaysShow: true
            });

            $('input#placement') .maxlength({
                    alwaysShow: true,
                    placement: 'top-left'
                });
        </script>


