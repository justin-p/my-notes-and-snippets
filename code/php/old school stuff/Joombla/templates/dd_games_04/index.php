<?php
defined('_JEXEC') or die;
/**
 *-------------------------------------------
 * Szablon został wypalony w  Diablodesign.
 * Kontakt Tel.kom 666 977 944
 * www.diablodesign.eu
 * biuro@diablodesign.eu
 *-------------------------------------------
 */
 /** panel konfoguracyjny */
 JHTML::_('behavior.framework', true);

/* The following line gets the application object for things like displaying the site name */
$app = JFactory::getApplication();
$tplparams	= $app->getTemplate(true)->params;


//Template details

$facebook	=	htmlspecialchars($tplparams->get('facebook'));
$twitter = htmlspecialchars($tplparams->get('twitter'));
$digg	=	htmlspecialchars($tplparams->get('digg'));
$flickr	=	htmlspecialchars($tplparams->get('flickr'));
$youtube =	htmlspecialchars($tplparams->get('youtube'));
$skype	=	htmlspecialchars($tplparams->get('skype'));
/**logo strony */
$logo	=	htmlspecialchars($tplparams->get('logo'));
$logotext	=	htmlspecialchars($tplparams->get('logotext'));
/**koniec logo strony */
/**footer*/
$footer	=	htmlspecialchars($tplparams->get('footer'));
$footer_link =	htmlspecialchars($tplparams->get('footer_link'));
/**koniec footer */
/**info */
$info_text	=	htmlspecialchars($tplparams->get('info_text'));
$infotext_link =	htmlspecialchars($tplparams->get('infotext_link'));
/**koniec info */
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions.php';

$document = & $this;

$templateUrl = $document->baseurl . '/templates/' . $document->template;

$view = $this->artx = new ArtxPage($this);

$view->componentWrapper();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $document->language; ?>" lang="<?php echo $document->language; ?>" dir="ltr">
<head>
 <jdoc:include type="head" />
 <link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/system.css" type="text/css" />
 <link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/general.css" type="text/css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $templateUrl; ?>/css/template.css" media="screen" />
 <!--[if IE 6]><link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.ie6.css" type="text/css" media="screen" /><![endif]-->
 <!--[if IE 7]><link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.ie7.css" type="text/css" media="screen" /><![endif]-->
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">if ('undefined' != typeof jQuery) document._artxJQueryBackup = jQuery;</script>
<script type="text/javascript" src="<?php echo $templateUrl; ?>/jquery.js"></script>
<script type="text/javascript">jQuery.noConflict();</script>
<script type="text/javascript" src="<?php echo $templateUrl; ?>/script.js"></script>
<script type="text/javascript">if (document._artxJQueryBackup) jQuery = document._artxJQueryBackup;</script>
<link href="css/template.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="dd-main">
    <div class="cleared reset-box"></div>
<div id="dd-hmenu-bg" class="dd-bar dd-nav">
</div>
<div class="cleared reset-box"></div>
<div class="dd-header">
<div class="dd-header-position">
    <div class="dd-header-wrapper">
        <div class="cleared reset-box"></div>
        <div class="dd-header-inner">
<div class="dd-headerobject"><!--logo strony-->
     
     <div class="logo"><a href="index.php">
       <?php if ($logo != null ): ?>
		<img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>" style="margin:0 auto; max-width:458px; max-height:88px;"/>
		<?php endif; ?>
		
     </a></div>
        
<!-- koniec logo strony-->  </div>
<div class="dd-logo"><div class="info"><marquee><!--wstawia link z panelu konfiguracyjnego-->	 
	 <?php if ( isset( $infotext_link ) && strlen( $infotext_link) > 0 ) : ?>
							<a href="<?php echo $infotext_link ?>">
							<?php endif; ?>
<!-- koniec wstawia link z panelu  konfiguracyjnego-->
                  <?php if ($info_text!= null ): ?>
		<?php echo htmlspecialchars($info_text); ?>
		<?php endif; ?>
                  </a> </marquee></div><div class="dym">
  <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="45" height="308">
    <param name="movie" value="templates/dd_games_04/flash/dym.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="transparent" />
    <param name="swfversion" value="6.0.65.0" />
    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="templates/dd_games_04/flash/dym.swf" width="45" height="308">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="transparent" />
      <param name="swfversion" value="6.0.65.0" />
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
      <div>
        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
</div>
<!--ikony spolecznosciowe-->

     
     <div class="szukaj"><div class="pole"><?php echo $view->position('position-0'); ?><?php echo $view->position('szukaj'); ?><?php echo $view->position('user4'); ?></div></div>
     <div class="ikony"><div class="iko">
     <!--wstawia link z panelu konfiguracyjnego-->	 
	 <?php if ( isset( $facebook ) && strlen( $facebook) > 0 ) : ?>
				<a href="<?php echo $facebook; ?>">
							<?php endif; ?>
<!-- koniec wstawia link z panelu  konfiguracyjnego--><img src="templates/dd_games_04/images/share_icon/facebook_icon.png" width="31" height="31" /></a></div><div class="iko">
 <!--wstawia link z panelu konfiguracyjnego-->	 
	 <?php if ( isset( $twitter ) && strlen( $twitter) > 0 ) : ?>
				<a href="<?php echo $twitter; ?>">
							<?php endif; ?>
<!-- koniec wstawia link z panelu  konfiguracyjnego--><img src="templates/dd_games_04/images/share_icon/twitter_icon.png" width="31" height="31" /></a></div><div class="iko"> <!--wstawia link z panelu konfiguracyjnego-->	 
	 <?php if ( isset( $digg ) && strlen( $digg) > 0 ) : ?>
				<a href="<?php echo $digg; ?>">
							<?php endif; ?>
<!-- koniec wstawia link z panelu  konfiguracyjnego--><img src="templates/dd_games_04/images/share_icon/digg_icon.png" width="31" height="31" /></a></div><div class="iko"> <!--wstawia link z panelu konfiguracyjnego-->	 
	 <?php if ( isset( $flickr ) && strlen( $flickr) > 0 ) : ?>
				<a href="<?php echo $flickr; ?>">
							<?php endif; ?>
<!-- koniec wstawia link z panelu  konfiguracyjnego--><img src="templates/dd_games_04/images/share_icon/flickr_icon.png" width="31" height="31" /></a></div><div class="iko"><!--wstawia link z panelu konfiguracyjnego-->	 
	 <?php if ( isset( $youtube) && strlen( $youtube) > 0 ) : ?>
				<a href="<?php echo $youtube; ?>">
							<?php endif; ?>
<!-- koniec wstawia link z panelu  konfiguracyjnego--><img src="templates/dd_games_04/images/share_icon/youtube_icon.png" width="31" height="31" /></a></div><div class="iko"><!--wstawia link z panelu konfiguracyjnego-->	 
	 <?php if ( isset( $skype ) && strlen( $skype) > 0 ) : ?>
							<a href="<?php echo $skype; ?>">
							<?php endif; ?>
<!-- koniec wstawia link z panelu  konfiguracyjnego--><img src="templates/dd_games_04/images/share_icon/skype_icon.png" width="31" height="31" /></a></div>
<!--koniec ikony-->
</div></div>

        </div>
    </div>
</div>

<?php if ($view->containsModules('position-1', 'position-28', 'position-29')) : ?>
<div class="dd-bar dd-nav">
<div class="dd-nav-outer">
<div class="dd-nav-wrapper">
<div class="dd-nav-inner">
	<?php if ($view->containsModules('position-28')) : ?>
	<div class="dd-hmenu-extra1"><?php echo $view->position('position-28'); ?></div>
	<?php endif; ?>
	<?php if ($view->containsModules('position-29')) : ?>
	<div class="dd-hmenu-extra2"><?php echo $view->position('position-29'); ?></div>
	<?php endif; ?>
	<?php echo $view->position('position-1'); ?>
</div>
</div>
</div>
</div>
<div class="cleared reset-box"></div>
<?php endif; ?>

</div>
<div class="cleared reset-box"></div>
<div class="dd-box dd-sheet">
    <div class="dd-box-body dd-sheet-body">
<?php echo $view->position('position-15', 'dd-nostyle'); ?>
<?php echo $view->positions(array('position-16' => 33, 'position-17' => 33, 'position-18' => 34), 'dd-block'); ?>
<div class="dd-layout-wrapper">
    <div class="dd-content-layout">
        <div class="dd-content-layout-row">
<?php if ($view->containsModules('position-7', 'position-4', 'position-5')) : ?>
<div class="dd-layout-cell dd-sidebar1">
<?php echo $view->position('position-7', 'dd-block'); ?>
<?php echo $view->position('position-4', 'dd-block'); ?>
<?php echo $view->position('position-5', 'dd-block'); ?>

  <div class="cleared"></div>
</div>
<?php endif; ?>
<div class="dd-layout-cell dd-content">

<?php
  echo $view->position('position-19', 'dd-nostyle');
  if ($view->containsModules('position-2'))
    echo artxPost($view->position('position-2'));
  echo $view->positions(array('position-20' => 50, 'position-21' => 50), 'dd-article');
  echo $view->position('position-12', 'dd-nostyle');
  if ($view->hasMessages())
    echo artxPost('<jdoc:include type="message" />');
  echo '<jdoc:include type="component" />';
  echo $view->position('position-22', 'dd-nostyle');
  echo $view->positions(array('position-23' => 50, 'position-24' => 50), 'dd-article');
  echo $view->position('position-25', 'dd-nostyle');
?>

  <div class="cleared"></div>
</div>

        </div>
    </div>
</div>
<div class="cleared"></div>


<?php echo $view->positions(array('position-9' => 33, 'position-10' => 33, 'position-11' => 34), 'dd-block'); ?>
<?php echo $view->position('position-26', 'dd-nostyle'); ?>

		<div class="cleared"></div>
    </div>
</div>
<div class="dd-footer">
    <div class="dd-footer-body">
        <div class="dd-footer-center">
            <div class="dd-footer-wrapper">
                <div class="dd-footer-text">
                    <?php if ($view->containsModules('position-27')): ?>
                    <?php echo $view->position('position-27', 'dd-nostyle'); ?>
                    <?php else: ?>
                    <?php ob_start(); ?>
</a>Copyright © 2012.<!--wstawia link z panelu konfiguracyjnego-->	 
	 <?php if ( isset( $footer_link ) && strlen( $footer_link) > 0 ) : ?>
							<a href="<?php echo $footer_link ?>">
							<?php endif; ?>
<!-- koniec wstawia link z panelu  konfiguracyjnego-->
                  <?php if ($footer!= null ): ?>
		<?php echo htmlspecialchars($footer); ?>
		<?php endif; ?>
                  </a> 
<div class="cleared"></div>
<p class="dd-page-footer">Designed by <a href="http://www.diablodesign.eu" target="_blank">www.diablodesign.eu</a>.</p>

                    <?php echo str_replace('%YEAR%', date('Y'), ob_get_clean()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="cleared"></div>
    </div>
</div>

    <div class="cleared"></div>
</div>

<?php echo $view->position('debug'); ?>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>