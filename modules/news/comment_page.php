<?php
/**
 *
 * @category        modules
 * @package         news
 * @author          WebsiteBaker Project
 * @copyright       2009-2011, Website Baker Org. e.V.
 * @link			http://www.websitebaker2.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         $Id: comment_page.php 1538 2011-12-10 15:06:15Z Luisehahne $
 * @filesource		$HeadURL: svn://isteam.dynxs.de/wb_svn/wb280/tags/2.8.3/wb/modules/news/comment_page.php $
 * @lastmodified    $Date: 2011-12-10 16:06:15 +0100 (Sa, 10. Dez 2011) $
 *
 */



// Must include code to stop this file being access directly
/* -------------------------------------------------------- */
if(defined('WB_PATH') == false)
{
	// Stop this file being access directly
		die('<head><title>Access denied</title></head><body><h2 style="color:red;margin:3em auto;text-align:center;">Cannot access this file directly</h2></body></html>');
}
/* -------------------------------------------------------- */

/* check if frontend.css file needs to be included into the <body></body> of page  */
if ( (!function_exists('register_frontend_modfiles') || !defined('MOD_FRONTEND_CSS_REGISTERED')) && file_exists(WB_PATH .'/modules/news/frontend.css')) {
	echo '<style type="text/css">';
	include(WB_PATH .'/modules/news/frontend.css');
	echo "\n</style>\n";
}

// check if module language file exists for the language set by the user (e.g. DE, EN)
if(!file_exists(WB_PATH .'/modules/news/languages/'.LANGUAGE .'.php'))
{
	// no module language file exists for the language set by the user, include default module language file EN.php
	require_once(WB_PATH .'/modules/news/languages/EN.php');
}
else
{
	// a module language file exists for the language defined by the user, load it
	require_once(WB_PATH .'/modules/news/languages/'.LANGUAGE .'.php');
}

require_once(WB_PATH.'/include/captcha/captcha.php');



// Get comments page template details from db
$query_settings = $database->query("SELECT comments_page,use_captcha,commenting FROM ".TABLE_PREFIX."mod_news_settings WHERE section_id = '".SECTION_ID."'");
if($query_settings->numRows() == 0)
{
	header("Location: ".WB_URL.PAGES_DIRECTORY."");
	exit( 0 );
}


else
{


	$settings = $query_settings->fetchRow();

	// Print comments page
    echo '<div class="mod-form skin-news-form-add">';
	$vars = array('[POST_TITLE]','[TEXT_COMMENT]');
	$values = array(POST_TITLE, $MOD_NEWS['TEXT_COMMENT']);
	echo str_replace($vars, $values, ($settings['comments_page']));





	?>



	<form name="comment" action="<?php echo WB_URL.'/modules/news/submit_comment.php?page_id='.PAGE_ID.'&amp;section_id='.SECTION_ID.'&amp;post_id='.POST_ID; ?>" method="post">
	<?php if(ENABLED_ASP) { // add some honeypot-fields
	?>
	<input type="hidden" name="submitted_when" value="<?php $t=time(); echo $t; $_SESSION['submitted_when']=$t; ?>" />
	<p class="nixhier">
	email address:
	<label for="email">Leave this field email blank:</label>
	<input id="email" name="email" size="60" value="" /><br />
	Homepage:
	<label for="homepage">Leave this field homepage blank:</label>
	<input id="homepage" name="homepage" size="60" value="" /><br />
	URL:
	<label for="url">Leave this field url blank:</label>
	<input id="url" name="url" size="60" value="" /><br />
	Comment:
	<label for="comment">Leave this field comment blank:</label>
	<input id="comment" name="comment" size="60" value="" /><br />
	</p>
	<?php }
	// echo $admin->getFTAN();


    ?>

	<div class="form-group">
	    <label class="control-label">
            <?php echo $TEXT['TITLE']; ?>:
        </label>
        <input  class       = "form-control"
                type        = "text"
                name        = "title"
                maxlength   = "255"
                <?php if(isset($_SESSION['comment_title'])) { echo ' value="'.$_SESSION['comment_title'].'"'; unset($_SESSION['comment_title']); } ?>
            />
    </div>

    <div class="form-group">
	    <label><?php echo $TEXT['COMMENT'];?>: </label>
	    <?php if(ENABLED_ASP) { ?>
            <textarea class="form-control" name="comment_<?php echo date('W'); ?>" rows="10" cols="1" ><?php if(isset($_SESSION['comment_body'])) { echo $_SESSION['comment_body']; unset($_SESSION['comment_body']); } ?></textarea>
        <?php } else { ?>
            <textarea class="form-control" name="comment" rows="10" cols="1" ><?php if(isset($_SESSION['comment_body'])) { echo $_SESSION['comment_body']; unset($_SESSION['comment_body']); } ?></textarea>
        <?php } ?>
    </div>


	<?php
	if(isset($_SESSION['captcha_error'])) { ?>

    <div class="row">
        <div class="col-md-12">
            <p>
                <?php   echo  $_SESSION['captcha_error'];
                        $_SESSION['captcha_retry_news'] = true;
                ?>
            </p>
        </div>
    </div>

     <?php } ?>

    <?php
	// Captcha
	if($settings['use_captcha']) {
	?>

        <div class="row">
            <div class="col-md-2">
                <p class="captcha-heading"><?php echo $TEXT['VERIFICATION']; ?>:</p>
            </div>
            <div class="col-md-10">
                <?php call_captcha(); ?>
            </div>

        </div>

	<?php
	if(isset($_SESSION['captcha_error'])) {
		unset($_SESSION['captcha_error']);
		?><script>document.comment.captcha.focus();</script><?php
	}?>
	<?php
	}
	?>

        <div class="row news-table comments__add__actions">
            <div class="col-md-4 col-xs-12 comments__add__action__cell comments__add__action__cell--submit">
                 <input type="submit" class="btn btn-default" name="submit" value="<?php echo $MOD_NEWS['TEXT_ADD_COMMENT']; ?>" />
            </div>
            <div class="col-md-4 col-xs-12">
            </div>
            <div class="col-md-4 col-xs-12 comments__add__action__cell comments__add__action__cell--cancel">
                <input type="button" class="btn btn-danger" value="<?php echo $TEXT['CANCEL']; ?>" onclick="history.go(-1)"  />
            </div>
        </div>
	</form>
</div>

<?php }
