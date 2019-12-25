<?php
// No direct access.
defined('_JEXEC') or die;

// check modules
$showRightColumn = ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom      = ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft        = ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
        $showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
$logo               = $this->params->get('logo');
$app                = JFactory::getApplication();
$doc        = JFactory::getDocument();
$templateparams     = $app->getTemplate(true)->params;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<!-- Joomla code voor het laden van meta data en/of stylesheets en javascript files -->
<jdoc:include type="head" />
<!-- De CSS stylesheet voor de layout van de template -->
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/style.css" type="text/css" />
</head>
<body>
<!-- De hoofd container voor het centreren van de website -->
<div id="wrap">
  <div id="balk">
    <!-- Module positie voor het kruimelpad -->
    <div class="pathway"><jdoc:include type="modules" name="position-7" /></div>
  </div> 
  <!-- De header container -->
  <div id="header">
	<div id="title">
	<h1>The Hobbit</h1>
	<h2>Adventures of Bilbo Baggins</h2>
	</div>
  </div>
 
  <!-- Linkerkolom -->
  <div id="leftmargin">
    <!-- Diverse moduleposities linkerkolom -->
      <jdoc:include type="modules" name="sidebar-left" style="xhtml" />
  </div>
  <!-- De content container -->
  <div id="mainbody">    
      <!-- Joomla code voor het tonen van succes melding of foutmeldingen na het versturen van een formulier -->
      <jdoc:include type="message" />
      <!-- Joomla code voor het tonen van content zoals bijvoorbeeld artikelen -->
      <jdoc:include type="component" />
    <div id="below-content">
      <!-- Module positie voor het tonen van banners -->
      <jdoc:include type="modules" name="below-content" style="xhtml" />
    </div>
  </div>
  <!-- Rechterkolom -->
  <div id="rightmargin">
    <!-- Diverse moduleposities rechterkolom -->
    <jdoc:include type="modules" name="sidebar-right" style="xhtml" />
    <br /><br />
  </div>  
  <!-- Footer -->
  <div id="footer"><br /><br /><div class="tekst"></div></div>
</div>
</body>
</html>

