<?php
	require_once '../app/core/Db.php';
	require_once '../app/core/Exceptions/CredentialsExceptions.php';

	class MProfile {

		public function insertAuthToken($data, $id, $service)
		{
			$expires=$data['expires_in'];
			array_key_exists('refresh_token', $data) ? $refresh_token = $data['refresh_token'] : $refresh_token = null; // cei de la google sunt zgarciti cu refresh token-urile
			$access_token=$data['access_token'];	
			$user_id=$id;
			switch ($service) {
				case 'onedrive':
					$sql = "INSERT INTO onedrive_service (user_id,refresh_token,access_token,expires_in) VALUES (:id, :refresh, :access, :expires)";
					break;
				case 'googledrive':
					$sql = "INSERT INTO googledrive_service (user_id,refresh_token,access_token,expires_in) VALUES (:id, :refresh, :access, :expires)";
					break;
			}
			$insert_request = DB::getConnection()->prepare($sql);
			return $insert_request -> execute([
				'id' => $user_id,
				'refresh' => $refresh_token,
				'access' => $access_token,
				'expires' => $expires
			]);
		}

		private function isOneDriveAuthorized($id)
		{
			$get_onedrive_query = "SELECT user_id FROM onedrive_service WHERE user_id = ${id}";
			$get_onedrive_stmt = DB::getConnection()->prepare($get_onedrive_query);
			$get_onedrive_stmt->execute();
			if($get_onedrive_stmt->rowCount() > 0)
				return true;
			else
				return false;
		}

		private function isGoogleDriveAuthorized($id)
		{
			$get_googledrive_query = "SELECT user_id FROM googledrive_service WHERE user_id = ${id}";
			$get_googledrive_stmt = DB::getConnection()->prepare($get_googledrive_query);
			$get_googledrive_stmt->execute();
			if($get_googledrive_stmt->rowCount()>0)
				return true;
			else
				return false;
		}

		public function getAccessToken($id, $service)
		{
			$sql = '';
			switch ($service) {
				case 'onedrive':
					$sql = "SELECT access_token FROM onedrive_service WHERE user_id = ${id}";
					break;
				case 'googledrive':
					$sql = "SELECT access_token FROM googledrive_service WHERE user_id = ${id}";
					break;
			}
			$stmt = DB::getConnection()->prepare($sql);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				$result = $stmt->fetch();
				return $result['access_token'];
			}
			else
				echo 'Id-ul nu are niciun token asociat';
		}

		public function getRefreshToken($id, $service)
		{
			$sql = '';
			switch ($service) {
				case 'onedrive':
					$sql = "SELECT refresh_token FROM onedrive_service WHERE user_id = ${id}";
					break;
				case 'googledrive':
					$sql = "SELECT refresh_token FROM googledrive_service WHERE user_id = ${id}";
					break;
			}
			$stmt = DB::getConnection()->prepare($sql);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				$result = $stmt->fetch();
				return $result['refresh_token'];
			}
			else
				echo 'Id-ul nu are niciun refresh token asociat';
		}

		public function getUserDataArray($user_id)
		{
			$result_array = array();

			$get_query = "SELECT username, email FROM accounts WHERE id = ${user_id}";
			$get_stmt=DB::getConnection()->prepare($get_query);
			$get_stmt->execute();
			$result_array += $get_stmt->fetch(PDO::FETCH_ASSOC);

			$onedrive_status=$this->isOneDriveAuthorized($user_id);
			$google_status=$this->isGoogleDriveAuthorized($user_id);
			$dropbox_status=false;

			$result_array['onedrive'] = $onedrive_status;
			$result_array['googledrive'] = $google_status;
			$result_array['dropbox'] = $dropbox_status;
			return $result_array;
		}
		public function checkExistingUsername($username) {
			$check_username = $username;
			$sql = "SELECT id  FROM accounts WHERE username = :username";
			$check_username_stmt = DB::getConnection()->prepare($sql);
			$check_username_stmt -> execute([
				'username' => $check_username
			]);

			if($check_username_stmt->rowCount() != 0)
				return true;
			else
				return false;
		}
		public function updateUsername($username,$id)
		{

			if($this->checkExistingUsername($username))
			{
				throw new UsernameTakenException('Username is already taken!');
			}
			else
			{
				$sql="UPDATE accounts SET username=:username,updated_at=:updated WHERE id=:id";
				$update_username_stmt=DB::getConnection()->prepare($sql);
				$update_username_stmt->execute([
						'username'=>htmlentities($username),
						'updated'=>date("Y-m-d H:i:s"),
						'id' => $id
				]);
			}
		}
		public function updatePassword($oldpass,$newpass,$id)
		{
			$get_sql="SELECT password FROM ACCOUNTS WHERE id=:userid";
			$get_pass_stmt=DB::getConnection()->prepare($get_sql);
			$get_pass_stmt->execute([
				'userid'=>$id
			]);
			$old_password=$get_pass_stmt->fetch(PDO::FETCH_ASSOC);
			if(strcmp($old_password['password'],$oldpass)==0)
			{
				$update_sql="UPDATE accounts SET password=:newpass WHERE id=:userid";
				$update_pass_stmt=DB::getConnection()->prepare($update_sql);
				$update_pass_stmt->execute([
					'newpass'=>$newpass,
					'userid'=>$id
				]);
			}
			else
			{
				throw new IncorrectPasswordException('The old password introduced is incorrect!');
			}
		}
		
	}

?>