<?php
// Maak een instantie van de template-engine
require_once  "Template_engine.php";
$templateEngine = new TemplateEngine();

// Stel variabelen in voor gebruik in de template
$templateEngine->assign('title', 'Mijn website');
$templateEngine->assign('content', 'Welkom op mijn website!');

// Render de template
echo $templateEngine->render('index.php');