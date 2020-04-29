<?php


class CProfile extends Controller {

	private $model;
	private $auth_error;

	public function __construct() {
		$this->model = $this->model('mprofile');	
	}

	public function authorizeServiceOneDrive()
	{
		if(isset($_SESSION['USER_ID']))
		{
			$auth_code = $_GET['code'];
			try
			{
				$this->model->insertAuthToken(OneDriveService::getAccesRefreshToken($auth_code),$_SESSION['USER_ID'],'onedrive');
				header('Location:'.'http://localhost/ProiectTW/public/cprofile');
			}
			catch(OnedriveAuthException $exception)
			{
				//Propagam textul de eroare la nivel de sesiune,cu fiecare redirect acesta se va pierde
				$_SESSION['AUTH_ERROR']='Authorization for Onedrive service failed';
				header('Location:'.'http://localhost/ProiectTW/public/cprofile');

			}
			catch(PDOException $exception)
			{
				header('Location:'.'http://localhost/ProiectTW/public/cprofile');
			}
		}
		else
		{
			header('Location:'.'http://localhost/ProiectTW/public/clogin');
		}
	}

	public function onedriveAuth()
	{
		if(isset($_SESSION['USER_ID'])) {
			header('Location:'.OneDriveService::authorizationRedirectURL());
		} else {
			header('Location:'.'http://localhost/ProiectTW/public/clogin');
		}
	}

	public function googledriveAuth()
	{
		// click pe Unauthorize dupa ce esti logat pt a vedea fisierele
		// if( $this->model->getUserDataArray($_SESSION['USER_ID'])['googledrive'] == true) {
		// 	echo 'Unauthorize is not yet functional. Using this button for tests:)<br>';
		// 	//GoogleDriveService::listAllFiles($this->model->getAccessToken($_SESSION['USER_ID'], 'googledrive'));
		// 	//GoogleDriveService::getFileMetadataById($this->model->getAccessToken($_SESSION['USER_ID'], 'googledrive'), '1jBeVdo4YYPoxrNOVYp3PoCy3NSlQyoiQ');
		// 	// foloseste mai intai list pt a gasi un id
		// 	//GoogleDriveService::downloadFileById($this->model->getAccessToken($_SESSION['USER_ID'], 'googledrive'), '1bVVzi2wwEtx3Xq45l0c7PA2uBwYzlQOk');
		// 	GoogleDriveService::uploadFile($this->model->getAccessToken($_SESSION['USER_ID'], 'googledrive'), null);
		// }

		if(isset($_SESSION['USER_ID'])) {
			header('Location:'.GoogleDriveService::authorizationRedirectURL());
		} else {
			header('Location:'.'http://localhost/ProiectTW/public/clogin');
		}
	}

	public function authorizeServiceGoogleDrive()
	{
		$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		if(isset($_GET['code'])){
			$decoded_json = GoogleDriveService::getAccesRefreshToken($_GET['code']);
			$this->model->insertAuthToken($decoded_json, $_SESSION['USER_ID'], 'googledrive');
			header('Location:'.'http://localhost/ProiectTW/public/cprofile');
		}

		if(isset($_GET['error'])){
			echo "Eroare: " . $_GET['error'] . "<br>";
			die("Nu s-a putut obtine codul pentru cerere.");
		}
	}

	public function dropboxAuth()
	{
		if(isset($_SESSION['USER_ID'])) {
			header('Location:'. DropboxService::authorizationRedirectURL());
		} else {
			header('Location:'.'http://localhost/ProiectTW/public/clogin');
		}
	}

	public function authorizeServiceDropbox()
	{
		if(isset($_GET['code'])){
			$decoded_json = DropboxService::getAccesRefreshToken($_GET['code']);
			$this->model->insertAuthToken($decoded_json, $_SESSION['USER_ID'], 'dropbox');
			header('Location:'.'http://localhost/ProiectTW/public/cprofile');
		}
		if(isset($_GET['error'])){
			echo "Eroare: " . $_GET['error'] . "<br>";
			echo "Cod eroare: " . $_GET['error_description'] . "<br>";
			die("Nu s-a putut obtine codul pentru cerere.");
		}
	}

	public function getUser()
	{	
		try
		{
			$data_json=json_encode($this->model->getUserDataArray($_SESSION['USER_ID']));
			$json=new JsonResponse('success',$data_json,'User retrieval succesfully',200);
			echo $json->response();

		}
		catch(PDOException $exception)
		{
			$json=new JsonResponse('error',null,'Service temporarly unavailable',500);
			echo $json->response();
		}

	}
	public function changeUserData()
	{
			$post_array=json_decode(file_get_contents('php://input'),true);
			if(!is_array($post_array))
            {
                $json=new JsonResponse('error',null,'Malformed request,JSON could not be interpreted',400);
                echo $json->response();
			}
			else
			{
			 try{
				if(isset($post_array['username']))
				{
					try
					{	
						$this->model->updateUsername($post_array['username'],$_SESSION['USER_ID']);
					}
					catch(UsernameTakenException $exception)
					{
						$json=new JsonResponse('error',null,'Username is taken',409);
						echo $json->response();
					}
				}
				if(isset($post_array['newpassword']) && isset($post_array['oldpassword']))
				{
					try
					{
						$this->model->updatePassword($post_array['oldpassword'],$post_array['newpassword'],$_SESSION['USER_ID']);
					}
					catch(IncorrectPasswordException $exception)
					{
						$json=new JsonResponse('error',null,'Given password is incorrect');
						echo $json->response();
					}
				}
				else 
				{
					$json=new JsonResponse('error',null,'Both old password and new password are required',422);
					echo $json->response();
				}
			}
			catch(PDOException $exception)
			{
				$json=new JsonResponse('error',null,'Service temporarly unavailable',500);
			}
			$json=new JsonResponse('succes',null,'Data updated succesfully',200);
			echo $json->response();
		}
	}
	public function deAuth()
	{
		$query = array();
		parse_str($_SERVER['QUERY_STRING'], $query);
		if(isset($query['service']))
		{
			if($query['service']=='onedrive')
			{
				$this->model->invalidateService($_SESSION['USER_ID'],'onedrive');
				header('Location:'.OneDriveService::signOutRedirectURL());
			}
			elseif($query['service']=='googledrive')
			{
				$this->model->invalidateService($_SESSION['USER_ID'],'googledrive');
				header('Location:'.'http://localhost/ProiectTW/public/cprofile');
			}
			elseif($query['service']=='dropbox')
			{
				$this->model->invalidateService($_SESSION['USER_ID'],'dropbox');
				header('Location:'.'http://localhost/ProiectTW/public/cprofile');
			}
		}
		else
		{
			header('Location:'.'http://localhost/ProiectTW/public/cprofile');
		}
	}

}

?>