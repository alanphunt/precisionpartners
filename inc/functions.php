<?php
	require "inc/dbcom.inc.php";
	$db->select_db("partners");
	require "inc/functions.inc.php";
	require_once "classes/vendor/autoload.php";

	const PARTNERS_URL = "/partners/";
	const TEAM_DRIVE_ID = "redacted for privacy"

	function get_client()
	{
		global $global_dir;
		$client = new Google_Client();
		$client->setAuthConfig($global_dir.'classes/gdrive_client_id.json');
		$client->setApplicationName('PP Partners');
		$client->setScopes(Google_Service_Drive::DRIVE_READONLY);
		$client->setAccessType('offline');
		//approvalprompt gets the refresh token, store it once and you're good to go
	/*	$client->setApprovalPrompt('force');
		echo $client->createAuthUrl();

		if (($code = $_GET["code"])) {
			$client->fetchAccessTokenWithAuthCode($code);
			$access_token_arr = $client->getAccessToken();
			$access_token = $access_token_arr["access_token"];
			$refresh_token = $access_token_arr["refresh_token"];

			update('google_drive_oauth', ["access_token"=>$access_token, "refresh_token"=>$refresh_token], 1);
		}
		else {*/

			$tokens = row("SELECT * FROM google_drive_oauth");
			$client->setAccessToken($tokens["access_token"]);

			if ($client->isAccessTokenExpired())
				update(
					"google_drive_oauth",
					[
						"access_token" => $client->fetchAccessTokenWithRefreshToken($tokens["refresh_token"])["access_token"]
					],
					1
				);
		//}

		return $client;
	}

	function get_Service($client){
		return new Google_Service_Drive($client);
	}

	$partner = str_replace(PARTNERS_URL, "", $_SERVER["REQUEST_URI"]);

	$client = get_client();
	$service = get_service($client);
	$files = get_top_folders();


	/**
	 * An associative array that has one entry for each file named `logo.png` in the team drive. The values are the full
	 * public URLs of the `logo.png` files and the keys are the corresponding parent folders.
	 */
	$logos = [];
	for ($i = 0; $i < count($files); $i++) {
		$file = $files[$i];
		if ($file->name == "logo.png") {
			array_splice($files->files, $i, 1);
			// https://stackoverflow.com/a/20675890/863470
			$logos[$file->parents[0]] = "https://drive.google.com/uc?id=$file->id";
			$i--;
		}
	}

	/**
	 * An asssociative array of all partners, where each key is a permalinkified version of the partner's name, and each
	 * corresponding value is an associative array with the following options:
	 * 		name	string	The human-readable name of the partner
	 * 		id		string	The ID of the partner root folder in Google Drive
	 * 		logo	string	The full public URL of this partner's logo
	 */
	$partnerConfig = [];
	foreach ($files as $file)
		if ($file->parents[0] == TEAM_DRIVE_ID) {
			$name = $file->name;
			$id = $file->id;
			$partnerConfig[preg_replace("/[^a-z\d.]/", "", strtolower($name))] = [
				"name" => $name,
				"id" => $id,
				"logo" => $logos[$id]
			];
		}


	function get_top_folders(){
		global $service;
		//includeitemsfromalldrives and supportsalldrives will be deprecated after June 1 2020. Both values will equate to true afterwards and we'll no longer need to explicitly define them as such.


		do {
			$results = $service->files->listFiles(array_merge(
				[
					"corpora" => "drive",
					"teamDriveId" => TEAM_DRIVE_ID,
					"q" => "trashed = false",
					"pageSize" => 1000, // this is the maximum page size
					"includeTeamDriveItems" => true,
					"supportsTeamDrives" => true,
					"fields" => "files(parents, name, id, mimeType, thumbnailLink, description, size, webContentLink)"
				],
				isset($next_page_token) ? [ "pageToken" => $next_page_token ] : []
			));

			/* Abraham, 2/24/20: I changed this to use the nextPageToken. However, I was unable to successfully test this
				 code, because when I manually reduced the `pageSize`, Google did not return a `nextPageToken`. I'm not sure why
				 that is. */
			if (isset($overall_results))
				$overall_results->setFiles(
					array_merge(
						...array_map(
							function (Google_Service_Drive_FileList $r): array { return $r->getFiles(); },
							[$overall_results, $results]
						)
					)
				);
			else $overall_results = $results;
		} while ($next_page_token = $results->getNextPageToken());
		return $overall_results;
	}

	function download($id, $name, $mime){
		global $service;
		$file = $service->files->get($id, ["alt" => "media"]);

		header('Content-Disposition: attachment; filename="'.$name.'"');
		header("Content-Type: $mime");
		echo $file->getBody();
		exit;
	}

	function initials($title){
		$init = "";
		foreach(explode(" ", $title) as $value) {
			$init .= substr($value,0, 1);
		}
		return strtoupper($init);
	}

	function populateHomepageGrid($topFolder)
	{
		global $partner;
		global $partnerConfig;

		$colors = [
			"#00865F",
			"#B36F5B",
			"#2F7D99",
			"#CC7C8F",
			"#CCB87C",
			"#7CB7CC",
			"#FF8075",
			"#88BFB0",
			"#5D7A98",
			"#667F62",
			"#007CBD",
			"#721C00",
			"#B2AB99"
		];
		$colorNumber = 0;
		if($partner) {
			echo "<div class='gridcontainer container'>";
			foreach ($topFolder as $key => $value) {
				$name = $value->name;
				if ($value->getParents()[0] == $partnerConfig[$partner]['id']) {
					$div = "";
					$div .= "<div data-id='" . $value->getId() . "' class='griditem'>";
					$div .= "<div style='background-color: $colors[$colorNumber];' class='cardheader'>";
					$div .= "<div class='griditemcircle'>";
					$div .= "<h3>" . initials($name) . "</h3></div>";
					$div .= "</div>";
					$div .= "<div class='cardfooter'>";
					$div .= "<h3>" . $name . "</h3></div></div>";
					echo $div;
					$colorNumber++;
				}
			}
			echo "</div>";
		}else{
			$form = "<form class='partnersearch'>";
			$form .= "<div class='search-collapsible__form'><div class='search-field'>";
			$form .= "<label class='search-field__label'>";
			$form .= "<span class='search-field__text'>Search</span>";
			$form .= "<input placeholder='Partner Name' class='search-field__input' type='text' name='q' required></label></div>";
			$form .= "<div class='search-submit-button'>";
			$form .= "<button class='background-slide-button background-slide-button--on-dark' type='submit'>";
			$form .= "<span class='background-slide-button__inner background-slide-button__inner--on-dark'>";
			$form .= "<span class='background-slide-button__text'>Search</span>";
			$form .= "<span class='background-slide-button__icon'></span>";
			$form .= "<svg class='search-icon' xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'>";
			$form .= "<path fill='inherit' fill-rule='nonzero' d='M6 12A6 6 0 1 1 6 0a6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5.293 2.707a1 1 0 0 1 1.414-1.414l3 3a1 1 0 0 1-1.414 1.414l-3-3z'></path>";
			$form .= "</svg></span></button></div></div>";
			$form .= "</form>";
			echo $form;
		}
	}

	function displayModalFolders($parentId){
		global $files;
		for($i = 0; $i < count($files); $i++){
			if($files[$i]["parents"][0] == $parentId){
				if(hasChildren($files[$i]["id"])) {
					$tn = $files[$i]["thumbnailLink"];
					$desc = $files[$i]["description"];
					$name = $files[$i]["name"];

					$div = "<div class='folder'><div class='foldertitle'>";
					$div .= "<div class='foldertext'>";
					$div .= "<h5>$name</h5>";
					$div .= "<p>" . ($desc == null ? "" : $desc) . "</p>";
					$div .= "</div>";
					$div .= "" . ($tn === null
							? "<i class='material-icons foldericon'>folder</i>"
							: "<img src='" . $tn . "' alt ='thumbnail'>");
					$div .= "</div>";
					$div .= "<div class='filelist'>";
					$div .= "<ul>";

					for ($j = 0; $j < count($files); $j++) {
						if ($files[$j]["parents"][0] == $files[$i]["id"]) {
							$tn = $files[$j]["thumbnailLink"];
							$tn = $tn ? $tn : "images/file.png";
							$size = $files[$j]["size"];
							$name = $files[$j]["name"];
							$id = $files[$j]["id"];
							$mimeType = $files[$j]["mimeType"];

							$div .= "<li>";
							$div .= "<div class='folderfiledata'>";
							$div .= "<div data-params='action=download&fileid=$id&name=$name&mime=$mimeType' class='fileimg previewwrapper' style=\"background-image:url('$tn')\">";
							$div .= "<div class='tnoverlay' data-params='action=download&fileid=$id&name=$name&mime=$mimeType'>";
							$div .= "<i class='material-icons'>find_in_page</i>";
							$div .= "</div>";
							$div .= "</div><div><p class='filename'>$name</p><p class='filesize'>File size: " . byteConversion($size) . "</p></div></div>";
							$div .= "<div data-params='action=download&fileid=$id&name=$name&mime=$mimeType' class='dlwrapper'>";
							$div .= "<i class='material-icons dl i-right'>cloud_download</i>";
							$div .= "<i class='material-icons dl'>search</i>";
							$div .= "</div></li>";
						}
					}

					$div .= "</ul></div></div>";
					echo $div;
					continue;
				}
			}
		}
	}

	function displayModalFiles($parentId){
		global $files;
			foreach ($files as $file) {
					if($file["parents"][0] == $parentId){
				$tn = $file["thumbnailLink"];
				$size = $file["size"];
				$desc = $file["description"];

				$div = "<div class='folder'>";
				$div .= "<div class='foldertitle filetitle'>";
				$div .= "<div class='fileimagebg' style='background-image: url($tn)'></div>";
				$div .= "<div class='tnwrapper'>";
				$div .= "<div class='tnoverlay' data-params='action=download&fileid=$file[id]&name=$file[name]&mime=$file[mimeType]'>";
				$div .= "<i class='material-icons'>find_in_page</i><span>Preview</span><span>(allow pop-ups)</span>";
				$div .= "</div>";
						$div .= "" . ($tn === null
					? "<i class='material-icons foldericon'>insert_drive_file</i>"
					: "<img class='fileimg' src='$tn' alt='thumbnail'>");
				$div .= "</div>";
				$div .= "</div>";
				$div .= "<div class='filetext'>";
				$div .= "<div class='filetitlewrapper'>";
				$div .= "<h5>$file[name]</h5>";
				$div .= "<p class='filesize'>Document type: $file[mimeType], ".byteConversion($size)."</p>";
				$div .= "</div>";
				$div .= "<p class='filedesc'>" . ($desc == null ? "A file may or may not have a description. It would be recommended to add one for optimal user experience." : $desc) . "</p>";
				$div .= "<div data-params='action=download&fileid=$file[id]&name=$file[name]&mime=$file[mimeType]' class='dlwrapper'>";
				$div .= "<div class='dlspan'>";
				$div .= "<i class='material-icons dl i-right'>cloud_download</i>";
				$div .= "<span>Download</span>";
				$div .= "</div>";
				$div .= "<div class='previewspan'>";
				$div .= "<i class='material-icons previewicon i-right'>search</i>";
				$div .= "<span>Preview</span>";
				$div .= "</div>";
				$div .= "</div>";
				$div .= "</div>";
				$div .= "</div>";
				echo $div;
			}
		}
	}

	function byteConversion($bytes){
		$size = "";
		if($bytes < 1024){
			$size = ($bytes == 0 ? "N/A" : $bytes." B");
		}else if($bytes > 1024 && $bytes < 1048576){
			$size = (Int)($bytes/1024)." KB";
		}else if($bytes > 1048576 && $bytes < 1073741824){
			$size = ((Int)($bytes/1048576)+1)." MB";
		}else if($bytes > 1073741824) {
			$size = ((Int)($bytes / 1073741824)) . " GB";
		}
		return $size;
	}

	function testFoldersOrFiles($files, $id){
		$type = "files";
		foreach($files as $file){
			if($file["parents"][0] == $id && $file["mimeType"] == "application/vnd.google-apps.folder") {
				$type = "folders";
			}
		}
		return $type;
	}

	function hasChildren($parentId){
		global $files;
		$hasChildren = false;
		foreach($files as $file){
			if($file["parents"][0] == $parentId)
				$hasChildren = true;
		}
		return $hasChildren;
	}
