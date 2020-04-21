<?php
require "config.php";
$word = str_replace(' ','-',$_REQUEST['word']);
$url = "https://scrabbly-dictionary.herokuapp.com/?define=".$word;
$json = file_get_contents($url);
$json = json_decode($json, true);
if(is_array($json)){
    $meaning = $json[0]['meaning']['noun'][0]['definition'];
}else{
    $meaning = "Word meaning not found in dictionary, but it's a valid scrabble word.";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?=$title?></title>
        <meta name="description" content="<?=$description?>">
        <meta name="author" content="NodeTent">
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/style.css">
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300" type="text/css">
        <script src="<?=BASE_URL?>assets/js/jquery.min.js"></script>
        <script src="<?=BASE_URL?>assets/js/jquery-ui.min.js"></script>
        <script src="<?=BASE_URL?>assets/js/jquery.wizard.js"></script>
    </head>
    <body>
        <div id="particles"></div>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-3" id="logo"><a href="<?=BASE_URL?>"><?=strtoupper($title)?></a></div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-12 main-title">
                    <h1><?=$title?></h1>
                    <p><?=$description?></p>
                </div>
       		</div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?=$ads_top?>
                </div>
       		</div>
        </div>
        <section class="container" id="main">
            <div id="stage">
            	<form id="wrapped">
            		<div id="middle-wizard">
            			<div class="step">
            				<div class="row">
            					<h3 class="col-md-12"><?php echo strtoupper($word); ?></h3>
            					<div class="col-md-12">
            						<h5><?=$meaning?></h5>
            					</div>
            				</div>
            			</div>
            		</div>
            		<div id="bottom-wizard">
            		</div>
            	</form>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?=$ads_bottom?>
                </div>
       		</div>
        </div><br>
        <footer>
        	<section class="container"></section>
            <section id="footer_2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <ul id="footer-nav">
                                	<li><a href="https://nodetent.com/">NodeTent</a></li>
                                </ul>
                            </center>
                        </div>
                    </div>
        		</div>
            </section>
        </footer>
        <script src="<?=BASE_URL?>assets/js/jquery.validate.js"></script>
        <script src="<?=BASE_URL?>assets/js/particles.min.js"></script>
        <script src="<?=BASE_URL?>assets/js/main.js"></script>
    </body>
</html>