<?php

require realpath("src/Template_engine.php");
$templateEngine = new TemplateEngine();


// Stel variabelen in voor gebruik in de template
$templateEngine->assign('title', 'Contact Us');
$templateEngine->assign('content', 'Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.');

// Render de template
echo $templateEngine->render('contact_template.php');