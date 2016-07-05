<?php
	
	include("test.setup.php");

	$test = new Test($mysqli, "full");

	$results = $test->getAllTestsDone();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>ELSA test</title>
		<script src='../js/jquery.min.js'></script>
		<script src='js/test.js'></script>
		<script src='../js/spin.js'></script>
		<script src='../js/jquery.spin.js'></script>
		<script src="../js/bootstrap.js"></script>
		<link rel="stylesheet" href="../css/bootstrap.css">
    </head>
    <body>
		<a href="test.php" target="_self">Vai ai test completi</a> || <a href="partial.php" target="_self">Vai ai test parziali</a> || <a href="../index.php" target="_self">Torna alla home</a>
		<div class="panel-group" id="accordion">
			<?php 
			for ($i= 0; $i < count($results['id']); $i++){
					
				echo '<div class="panel panel-default">
						<div class="panel-heading">
						  <h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'">
							'.$results['titolo'][$i].' '.$results['lingua'][$i].' ('.$results['type'][$i].') il '.$results['date'][$i].' by <b>'.$results['where'][$i].'</b>
							</a>
						  </h4>
						</div>
						<div id="collapse'.$i.'" class="panel-collapse collapse">
						 <div class="panel-body">
						  <table class="table">
						   <tr>
						    <td><b>Header</b></td>
						    <td>
						     '.str_replace(";", "</td><td>", $results['header'][$i]).'
							</td>
						   </tr>
						    <td><b>Gold standard</b></td>
						    <td>
						     '.str_replace(";", "</td><td>", $results['mapping'][$i]).'
							</td>
						   </tr>
						    <td><b>API result</b></td>
						    <td>
						     '.str_replace(";", "</td><td>", $results['result'][$i]).'
							</td>
						   </tr>
						  </table>
						 </div>
						</div>
					  </div>';
			}
			?>
		</div>
    </body>
</html>