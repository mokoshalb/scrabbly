<?php
require "config.php";
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
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300" type="text/css">
        <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="assets/js/jquery.wizard.js"></script>
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
            					<h3 class="col-md-10">Enter Tile Letters <small>(* for wildcard/empty tile)</small></h3>
            					<div class="col-md-12">
            						<ul class="data-list">
            							<li><input type="text" id="letters" class="required form-control" placeholder="PTA*OMW" onkeyup="changeToUpperCase(this)"></li>
            						</ul>
            					</div>
            				</div>
            				<div class="row">
            					<div class="col-md-5">
            						<ul class="data-list">
            							<li>
            							<div class="styled-select">
            								<select class="form-control" id="startLetter">
            									<option value="" selected>Start With</option>
            									<option value="A">A</option>
            									<option value="B">B</option>
            									<option value="C">C</option>
            									<option value="D">D</option>
            									<option value="E">E</option>
            									<option value="F">F</option>
            									<option value="G">G</option>
            									<option value="H">H</option>
            									<option value="I">I</option>
            									<option value="J">J</option>
            									<option value="K">K</option>
            									<option value="L">L</option>
            									<option value="M">M</option>
            									<option value="N">N</option>
            									<option value="O">O</option>
            									<option value="P">P</option>
            									<option value="Q">Q</option>
            									<option value="R">R</option>
            									<option value="S">S</option>
            									<option value="T">T</option>
            									<option value="U">U</option>
            									<option value="V">V</option>
            									<option value="W">W</option>
            									<option value="X">X</option>
            									<option value="Y">Y</option>
            									<option value="Z">Z</option>
            								</select>
            							</div>
            							</li>
            						</ul>
            					</div>
            					<div class="col-md-5">
            						<ul class="data-list">
            							<li>
            							<div class="styled-select">
            								<select class="form-control" id="endLetter">
            									<option value="" selected>End With</option>
            									<option value="A">A</option>
            									<option value="B">B</option>
            									<option value="C">C</option>
            									<option value="D">D</option>
            									<option value="E">E</option>
            									<option value="F">F</option>
            									<option value="G">G</option>
            									<option value="H">H</option>
            									<option value="I">I</option>
            									<option value="J">J</option>
            									<option value="K">K</option>
            									<option value="L">L</option>
            									<option value="M">M</option>
            									<option value="N">N</option>
            									<option value="O">O</option>
            									<option value="P">P</option>
            									<option value="Q">Q</option>
            									<option value="R">R</option>
            									<option value="S">S</option>
            									<option value="T">T</option>
            									<option value="U">U</option>
            									<option value="V">V</option>
            									<option value="W">W</option>
            									<option value="X">X</option>
            									<option value="Y">Y</option>
            									<option value="Z">Z</option>
            								</select>
            							</div>
            							</li>
            						</ul>
            					</div>
            					<div class="col-md-2">
            						<ul class="data-list">
            							<li>
                							<div class="qty-buttons">
                								<input type="button" value="-" class="qtyminus" name="quantity">
                								<input type="number" id="quantity" name="quantity" class="qty form-control" placeholder="Lenght">
                								<input type="button" value="+" class="qtyplus" name="quantity">
                							</div>
            							</li>
            						</ul>
            					</div>
            				</div>
            			</div>
            			<div class="submit step table-responsive" id="complete">
            			    <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%"></table>
            			</div>
            		</div>
            		<div id="bottom-wizard">
            			<button type="button" name="forward" class="forward" onclick="findWords()">Search</button>
            			<button type="button" name="backward" class="backward">Check Another Word</button>
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
        <script>
            var base_url = "<?=BASE_URL;?>";
        </script>
        <script src="assets/js/jquery.validate.js"></script>
        <script src="assets/js/particles.min.js"></script>
        <script src="assets/js/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/js/dataTables.responsive.min.js"></script>
        <script src="assets/js/responsive.bootstrap4.min.js"></script>
        <script src="assets/js/ScrabbleWordList.js"></script>
        <script src="assets/js/underscore.js"></script>
        <script src="assets/js/ScrabbleWordFinder.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
