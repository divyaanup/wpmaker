<?php include('filepart/header.php');
require_once('dinlib/recaptchalib.php');
$publickey = "6LcbwfwSAAAAAIaIMeSoB5aEqqf4bZ4AFSQtECdJ";
$privatekey = "6LcbwfwSAAAAAOjJz_mWMY7pfJkKn-UXUuzSJpiG";

$msg= '';
$msg_suc = '';
$contact_name = '';
$contact_email = '';
$contact_skype = '';
$contact_country = '';
$contact_msg = '';
if(isset($_POST['frm_btn']))
{
   // $resp = recaptcha_check_answer ($privatekey,
                          //      $_SERVER["REMOTE_ADDR"],
                              //  $_POST["recaptcha_challenge_field"],
                             //   $_POST["recaptcha_response_field"]);
    $contact_name = $_POST['contact_name'];
	$contact_email = $_POST['contact_email'];
	$contact_skype = $_POST['contact_skype'];
	$contact_country = $_POST['contact_country'];
	$contact_msg = $_POST['contact_msg'];
	if(empty($contact_name))
	{
	    $msg = 'Please enter your name';
	}
	else if(empty($contact_email))
	{	    $msg = 'Please enter your email';
	}
	else if(!filter_var($contact_email, FILTER_VALIDATE_EMAIL))
	{
		$msg  = 'Please enter your valid email';
	}
	else if(empty($contact_msg))
	{
	    $msg = 'Please enter your message';
	}
	//else if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
	//$msg="The reCAPTCHA wasn't entered correctly. Please try it again." .
      //   "(reCAPTCHA said: " . $resp->error . ")";
   // }
	else
	{
		$query ="INSERT INTO `contact_msg`(`contact_name`, `contact_email`, `contact_skype`, `contact_country`, `contact_request`, `contact_date`) VALUES ('".addslashes($contact_name)."', '".addslashes($contact_email)."', '".addslashes($contact_skype)."', '".addslashes($contact_country)."' , '".addslashes($contact_msg)."', '".date('Y-m-d')."')";
		$db->insertQuery($query);
		$template = $comm->email_template('contact_msg');
		$message = str_replace('{name}',$contact_name,$template['message']);
		$message = str_replace('{email}',$contact_email,$message);
		$message = str_replace('{skype}',$contact_skype,$message);
		$message = str_replace('{country}',$contact_country,$message);
		$message = str_replace('{message}',$contact_msg,$message);
		$template['message'] = $message;
		$comm->send_mail($template);
		$msg_suc = 'Thank you for contacting us. Our team get back you asap.';
	}
}
?>
 <script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'clean'
 };
 </script>
<!-- Start Banner Section -->

<div class="banner">
	<?php echo stripslashes($comm->get_cms_part('inner_banner'));?>
</div>
<div class="container-fluid">
	<div class="mid_banner">
        <div class="row-fluid">
            <?php echo stripslashes($comm->get_cms_part('get_start'));?>
        </div>
    </div>
    
<!-- Start Conent Section -->
	<div class="content_area">
    	<h2>We would love to hear from you...</h2>
        <p>If you have any questions or inquiries, please feel free to contact us. We would love to hear from you and be a part of your next project. Please fill out the form below, or e-mail us at <a href="mailto:mail.wordpressmaker@gmail.com">mail.wordpressmaker@gmail.com</a>. </p>
        <p>For your convenience with international calls/chats please note our Skype account <a href="skype:wordpressmaker?add">wordpressmaker</a>.</p>
        <div class="contact">
        	<div class="row-fluid">
                <div class="span12">
                	<ul>
                        <li><a href="skype:wordpressmaker?add" target="_blank"><i class="icon-skype"></i> </a></li>
                        <li><a href="mailto:mail.wordpressmaker@gmail.com" target="_blank"><i class="icon-envelope"></i></a></li>
                        <li><a href="https://www.facebook.com/Wordpressmaker" target="_blank"><i class="icon-facebook"></i></a></li>
                       <!-- <li><a href="https://twitter.com/WordPressMaker" target="_blank"><i class="icon-twitter"></i></a></li>-->
                    </ul>
                    <h3><span>Contact us</span></h3>
                    <div class="contact-error"  id="contact-error" <?php if(empty($msg)) { ?> style="display:none"<?php } ?> ><?php echo $msg;?></div>
                    <?php if(!empty($msg_suc)) { ?> <div class="contact-success" id="contact-success" ><?php echo $msg_suc;?></div><?php }?>
                   <form name="contact"  action="contact.php" method="post" id="contact_frm" >
                   		<div class="controls">
                            <div class="span6">
                                <input type="text" name="contact_name" id="contact_name" value="<?php echo $contact_name;?>" placeholder="Your Name: *" class="span12">
                             </div>
                              <div class="span6">
                                <input type="text" name="contact_email" id="contact_email" value="<?php echo $contact_email;?>" placeholder="Your Email: *" class="span12">
                              </div>
                        </div>
                        <div class="controls">
                        	<div class="span6">
                        		<input type="text" name="contact_skype" id="contact_skype" value="<?php echo $contact_skype;?>" placeholder="Your Skype:" class="span12">
                            </div>
                             <div class="span6">
                                <select name="contact_country" id="contact_country" class="span12">
                                    <option value=""  selected >Your Country:</option>
<?php
	$res = $db->selectQuery("SELECT * FROM `country` ORDER BY `country_name` ASC");
	for($i=0;$i<count($res);$i++)
	{
		$selected = '';
		if($contact_country ==$res[$i]['country_name'])
		{
			$selected = 'selected';
		}
?>
                                    <option value="<?php echo $res[$i]['country_name'];?>" <?php echo $selected;?> ><?php echo $res[$i]['country_name'];?></option>
<?php
	}
	unset($res);
?>
                                </select>
                             </div>
                        </div>
                        <div class="controls">
                        	<textarea  name="contact_msg" id="contact_msg" placeholder="Your Message: *" class="span12" rows="50"><?php echo $contact_msg;?></textarea>
                        </div>
						 <div class="controls">
						 <?php
         // echo recaptcha_get_html($publickey);
        ?>
		</div>
		<br/>
                        <div class="controls">
                        	 <input type="submit" name="frm_btn" value="Submit">
                        </div>
                   </form>
                </div>
        	</div>
     	</div>
    </div>
</div>
<!-- End content Section -->
<script type="text/javascript">
$(document).ready(function(e) {
$('#contact_frm input,#contact_frm textarea').click(function(e) {
	   $(this).removeClass('error');	
       $('#contact-error').css('display','none').html(''); 
       $('#contact-success').css('display','none').html(''); 
    });
		$('#contact_frm').submit(function() {
		if($('#contact_name').val() =='')
		{
			$('#contact-error').css('display','block').html('Please enter your name.');
			$('#contact_name').focus().addClass('error');
			return false;
		}
		else if($('#contact_email').val() =='')
		{
			$('#contact-error').css('display','block').html('Please enter your email.');
			$('#contact_email').focus().addClass('error');
			return false;
		}
		else if(!validate_email($('#contact_email').val()))
		{
			$('#contact-error').css('display','block').html('Please enter your vaild email.');
			$('#contact_email').focus().addClass('error');
			return false;
		}
		else if($('#contact_msg').val() =='')
		{
			$('#contact-error').css('display','block').html('Please enter your message.');
			$('#contact_msg').focus().addClass('error');
			return false;
		}
		else
		{
			return true;
		}
	});
});
dk_tab_selction('#top-menu-contact');
</script>
<?php include('filepart/footer.php');?>
