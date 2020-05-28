<?php
	require('inc/functions.php');

	if(isset($_GET["action"])) {

		if(isset($_GET["folderid"])){
			$id = $_GET["folderid"];
		}

		switch($_GET["action"]){
			case "displayResults":
				echo json_encode($files);
				break;
			case "fileorfolder":
				$type = testFoldersOrFiles($files, $id);
				echo $type;
				if($type == "files"){
					displayModalFiles($id);
				}else{
					displayModalFolders($id);
				}
				break;
			case "download":
				download($_GET["fileid"], $_GET["name"], $_GET["mime"]);
				break;
			case "partners":
				echo json_encode($partnerConfig);
				break;
			default:
				break;
		}
	}
