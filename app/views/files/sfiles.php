<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Stol(Universal Storage Manager)</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Arimo&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/remixicon@2.3.0/fonts/remixicon.css" rel="stylesheet">
		<link rel="icon" href="images/favicon.ico" type="image/ico"/>
		<link rel="stylesheet" type="text/css" href="../page/css/files.css">

	</head>
	<body>
		<div class="grid-wrapper">
			<header>
				<div>
					<h1>Stol - Universal Storage Tool</h1>
					<a href="http://localhost/ProiectTW/page/profile">
						<img src="images/avatar.png" alt="avatar">
					</a>
				</div>
			</header>
			<div class="user-bar">
				<button id="btn-back" class="btn-user-bar">Back<i class="ri-arrow-go-back-line"></i></button>
				<button id="btn-upload" class="btn-user-bar">Upload<i class="ri ri-file-upload-line"></i></button>
				<button id="btn-new-folder" class="btn-user-bar">New folder<i class="ri ri-add-fill"></i></button>
				<div class="search-container">
					<input type="text" id="search-box" placeholder="Search...">
				</div>
			</div>
			<div class="backdrop" style="display:none">
				<div class="upload-modal" role="dialog">
					<p>Select or Drag any files to upload</p>
					<div id="modal-storage">
						<input type="checkbox" id="redundant" name="storage-type" value="redundant">
						<label for="redundant">Redundant</label><br>
					</div>
					<span id="modal-btn-close">&times;</span>
					<div id="modal-file-drop">
						<input type="file" id="file-selector" multiple accept="image/*" onchange="handleFiles(this.files)">
						<div class="drop-file-preview">
						</div>	
					</div>
					<div id="modal-up-list" role="dialog">
					</div>
					<button id="modal-btn-files">Select Files</button>
					<button id="modal-btn-upload">Upload<i class="ri ri-check-line"></i></button>
				</div>
			</div>
			<nav>
				<div class="navbar-buttons">
					<button id="navbar-files">Files</button>
					<button id="navbar-favourites">Favourites</button>
					<!-- <button id="navbar-recent">Recent</button>
					<button id="navbar-trash">Trash</button> -->
					
				</div>
				<div class="navbar-collapsible">
					<input type="checkbox" id="collapsible" class="toggle"/>
					<label for="collapsible" class="col-toggle"><i class="ri-col ri-menu-line"></i></label>
					<div class="collapsible-content">
						<button class="col-btn" id="col-btn-logout"><i class="ri-col ri-logout-box-line"></i></button>
						<!-- <button class="col-btn"><i class="ri-col ri-file-line"></i></button> -->
						<button class="col-btn" id="col-btn-favourites"><i class="ri-col ri-star-line"></i></button>
						<!-- <button class="col-btn"><i class="ri-col ri-delete-bin-line"></i></button> -->
					</div>
				</div>
				<div id="storage-info-box">
					<div class="storage-text">GoogleDrive: <span id="gdrive_used">-</span>/<span id="gdrive_total">-</span></div>
					<div class="quota_background"><div id="quota_googledrive"></div></div>

					<div class="storage-text">OneDrive: <span id="onedrive_used">-</span>/<span id="onedrive_total">-</span></div>
					<div class="quota_background"><div id="quota_onedrive"></div></div>

					<div class="storage-text">DropBox: <span id="dropbox_used">-</span>/<span id="dropbox_total">-</span></div>
					<div class="quota_background"><div id="quota_dropbox"></div></div>

					<button id="btn-disconn">Logout</button>
				</div>

			</nav>
			<article class="container-wrapper">
				<div class="alert">
  					<span class="alert-close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
					<div id="alert-text"></div>
				</div>
				<h2>Files</h2>
				<hr>
				<div class="context-general-menu contxt-options">
					<button id="general_new_folder_opt" class="contxt-option"><i class="ri-folder-add-line"></i>New Folder</button>
					<button id="general_refresh_opt" class="contxt-option"><i class="ri-refresh-line"></i>Refresh</button>
					<button id="general_upload_opt" class="contxt-option"><i class="ri-file-upload-line"></i>Upload</button>
				</div>
				<div class="context-file-menu" style="display:none">
					<button id="file_download_opt" class="contxt-option"><i class="ri-folder-add-line"></i>Download</button>
					<button id="file_rename_opt" class="contxt-option"><i class="ri-text"></i>Rename</button>
					<button id="file_add_fav_opt" class="contxt-option"><i class="ri-star-line"></i>Add to Favorites</button>
					<button id="file_remove_opt" class="contxt-option"><i class="ri-eraser-line"></i>Remove</button>
				</div>
				<div class="context-folder-menu" style="display:none">
					<button id="folder_rename_opt" class="contxt-option"><i class="ri-text"></i>Rename</button>
					<button id="folder_add_fav_opt" class="contxt-option"><i class="ri-star-line"></i>Add to Favorites</button>
					<button id="folder_remove_opt" class="contxt-option"><i class="ri-eraser-line"></i>Remove</button>
				</div>
				<div class="main-container">	
				</div>
			</article>
			<footer>
				Footer
			</footer>
		</div>
		<script async src="../page/js/storage_quota.js"></script>
		<script async src="../page/js/drag_and_drop.js"></script>
		<script async src="../page/js/upload.js"></script>
		<script async src="../page/js/context_menu.js"></script>
		<script async src="../page/js/load_storage.js"></script>
		<script async src="../page/js/collapsible_menu.js"></script>
	</body>
</html>