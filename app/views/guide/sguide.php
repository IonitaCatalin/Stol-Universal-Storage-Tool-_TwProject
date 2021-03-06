<!DOCTYPE html>
<html lang="ro">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
		<title>Stol-Manualul Dezvoltatorului</title>
		<link rel="stylesheet"  href="../page/css/scholarly.css">
		<base href="Manualul%20dezvolatorului.html">
	</head>
	<body prefix="schema: http://schema.org">

		<!-- article -->
		<article resource="#" typeof="schema:ScholarlyArticle">

			<header>
				<div class="banner">
					<img src="../page/images/logo.png" width="220" height="50" alt="Stol logo" id="logo-stol">
					<div class="status">Stol-Manualul Dezvoltatorului</div>
				</div>
				<h1 property="schema:name">Stol-Universal Storage Tool Manualul Dezvoltatorului</h1>
				<p role="doc-subtitle" property="schema:alternateName">
						The Future of Managing Cloud Storage
				</p>
			</header>
			<meta property="schema:accessibilityFeature" content="alternativeText">
			<meta property="schema:accessibilityHazard" content="noFlashingHazard">
			<meta property="schema:accessMode" content="textual">

			<section>
				<h2>Continuturi</h2>
				<ol>
					<li><a href="#architecture">1. Arhitectura Aplicatiei</a></li>
					<li><a href="#overview">2. Privire de ansamblu asupra API-ului</a></li>
					<li><a href="#login">3. Login si register</a>
						<ul>
							<li><a href="#login">Login</a></li>
							<li><a href="#register">Register</a></li>
						</ul>
					</li>
					<li><a href="#info_prof">4. Profile si Storage</a>
						<ul>
							<li><a href="#info_prof">Informatii despre profile</a></li>
							<li><a href="#info_stor">Informatii despre storage</a></li>
							<li><a href="#updt_user">Modificare profile user</a></li>
						</ul>
					</li>
					<li><a href="#auth_serv">5. Servicii</a>
						<ul>
							<li><a href="#auth_serv">Autorizarea unui serviciu</a></li>
							<li><a href="#deauth_serv">Deautorizarea unui serviciu</a></li>
						</ul>
					</li>
					<li><a href="#fld_to_fld">6. Lucrul cu fisiere</a>
						<ul>
							<li><a href="#fld_to_fld">Crearea unui folder in alt folder</a></li>
							<li><a href="#fld_to_root">Crearea unui folder in root</a></li>
							<li><a href="#get_fld">Obtinere continut al unui folder</a></li>
							<li><a href="#get_root">Obtinere fisiere din root</a></li>
							<li><a href="#rename">Redenumire fisiere sau foldere</a></li>
							<li><a href="#delete_itm">Stergere fisiere sau foldere</a></li>
							<li><a href="#move_itm">Mutare fisier sau folder sub alt parinte</a></li>
						</ul>
					</li>
					<li><a href="#upld_create">7. Upload</a>
						<ul>
							<li><a href="#upld_create">Crearea unei sesiuni de upload</a></li>
							<li><a href="#upld_file">Incarcarea unui fisier pe chunk-uri</a></li>
							<li><a href="#upld_cancel">Anularea unui upload</a></li>
						</ul>
					</li>
					<li><a href="#dwnld_create">8. Download</a>
						<ul>
							<li><a href="#dwnld_create">Crearea unei sesiuni de download</a></li>
							<li><a href="#dwnld_file">Descarcarea fisierului</a></li>
						</ul>
					</li>
					<li><a href="#dwnlod_csv_create">9. Administrarea aplicatiei</a>
						<ul>
							<li><a href="#dwnlod_csv_create">Obtinere link download fisier CSV cu date despre o multime de utilizatori</a></li>
							<li><a href="#dwnlod_csv">Descarcarea fisierului CSV</a></li>
							<li><a href="#get_users">Obtinerea datelor despre utilizatori</a></li>
							<li><a href="#get_services">Obtine lista de servicii si daca sunt allowed sau nu</a></li>
							<li><a href="#chge_service">Schimba disponibilitatii unui serviciu particular</a></li>
						</ul>
					</li>
					<li><a href="#search">10. Search and Favourites</a>
						<ul>
							<li><a href="#search">Cautare fisiere si foldere dupa nume</a></li>
							<li><a href="#get_fav">Obtinere lista fisiere de la favorites</a></li>
							<li><a href="#add_fav">Adaugarea unui item la favorites</a></li>
							<li><a href="#rmv_fav">Eliminarea unui item din favorites</a></li>
						</ul>
					</li>

				</ol>

			</section>

			<section id="architecture">
				<h2>Arhitectura Aplicatiei</h2>
				<p>In dezvoltarea aplicatiei am folosit software design-ul MVC(Model-View-Controller) deoarece este util in dezvoltarea aplicatiei noastre complexe prin "separation of concerns" intre front-end si back-end.</p>
				<ul>
				<li>Modelele reprezinta logica de business: au rolul de a interactiona cu baza de date, de a obtine datele dorite si a face procesari.</li>
				<li>View-urile au rolul de a oferi interfata catre utilizator reprezentate prin sabloane completate ulterior prin apeluri Ajax.</li>
				<li>Controller-ele au responsabilitatea de a oferi coordonarea intre view-uri si modele intrucat decid ce view-uri sa afiseze si cu ce date.</li>
				</ul>
				<figure typeof="sa:image">
					<a href="file:///C:/xampp/htdocs/ProiectTW/docs/resources/classes_diagram.png">
						<img src="../page/images/classes_diagram.png" alt="profile usecase">
					</a>
					<figcaption>Diagrama de clase pentru aplicatie(click pentru a mari)</figcaption>
				</figure>


				<p>Diagrama de Use Case pentru Administrarea Profilului prezinta functionalitatile sistemului in vederea managerierii profilului.</p>
				<ul>
					<li>Utilizatorul poate sa se inregistreze, sa se autentifice, sa ceara autorizarea sau deautorizarea serviciilor de stocare in cloud precum GoogleDrive, Onedrive si Dropbox, sau sa isi schimbe datele de profil precum numele sau parola</li>
					<li>Serviciul: primeste si confirma inregistrarea sau autentificarea, primeste cereri pe care le indeplineste doar daca sunt autorizate si este responsabil de comunicarea cu servicii externe in vederea autorizarii serviciilor de stocare in cloud</li>
				</ul>
				<figure typeof="sa:image">
					<a href="file:///C:/xampp/htdocs/ProiectTW/docs/resources/usecase_profile.png">
						<img src="../page/images/usecase_profile.png" alt="profile usecase">
					</a>
					<figcaption>Diagrama UseCase pentru administrarea profilului(click pentru a mari)</figcaption>
				</figure>


				<p>Diagrama de Use Case pentru Managementul fisierelor prezinta functionalitat sistemului in vederea lucrului cu fisiere</p>
				<ul>
					<li>Utilizatorul vrea sa administreze fisierele prin creare de foldere, stergere de fisiere, redenumire sau mutare in alte foldere. De asemenea vrea sa incarce fisiere in mod fragmentat sau redundant. Ulterior va vrea sa descarce fisierele din contul sau.</li>
					<li>Sistemul va accepta si trata cereri autentificate pentru crearea de foldere, stergere, redenumire sau mutare de fisiere. De asemenea se va folosi de servicii externe pentru a incarca fisierele fragmentat sau redundant, ori pentru a le descarca si recompune.</li>
					<li>Serviciile externe GoogleDrive, Onedrive si Dropbox pot primi si stoca fisiere sau, la cerere, le pot oferi spre descarcare.</li>
				</ul>
				<figure typeof="sa:image">
					<a href="file:///C:/xampp/htdocs/ProiectTW/docs/resources/usecase_filesystem.png">
						<img src="../page/images/usecase_filesystem.png" alt="profile usecase">
					</a>
					<figcaption>Diagrama UseCase pentru managementul fisierelor(click pentru a mari)</figcaption>
				</figure>

			</section>

			<section id="overview">
				<h2>STOL API v0.9</h2>
				<p>API-ul STOL permite dezvoltatorilor sa lucreze cu fisiere in Stol, incluzand functionalitate avansata precum incarcarea de fisiere fragmentate, incarcarea de fisiere redundante sau cautare full-text. Manualul Dezvoltatorului Stol API este calea cea mai usoara de a incepe sa faceti apeluri catre API.</p>
			</section>

			<section>
				<h3>Formate pentru Cereri si Raspunsuri</h3>
				<p>In general, API-ul Stol foloseste cereri HTTP POST cu argumente JSON si raspunsuri JSON. Autentificarea cererilor se face via JWT Token folosind header-ul Authorization din request-uri.</p>

				<section>
					<h4>Endpoint-uri RPC</h4>
					<p>Aceste endpoint-uri accepta argumente precum JSON in body-ul cererii si returneaza rezultate sub format JSON in body-ul raspunsului. Endpoint-urile RPC sunt la domeniul http://localhost/ProiectTW ¯\_(ツ)_/¯ .</p>
				</section>

				<section>
					<h4>Endpoint-urile pentru Content-upload</h4>
					<p>Aceste endpoint-uri accepta continut fisier in body-ul cererii. Argumentele lor sunt trimise inainte intr-o cerere diferita de upload, sub forma de JSON. Doar token-ul jwt este necesar in header-ul Authorization al cererii.</p>
				</section>

				<section>
					<h4>Endpoint-urile pentru Content-download</h4>
					<p>La fel ca endpoint-urile pentru upload, argumentele sunt transmise in body-ul unei cereri anterioare. Body-ul raspunsului contine continutul fisierului.</p>
				</section>

				<section>
					<h4>Formate pentru cale</h4>
					<p>Fiecare fisier si folder din Stol are de asemenea un ID (ex. "c9526e3221d689b48c621d1babe0bb87") care poate fi obtinut de la orice endpoint care returneaza metadate. Aceste ID-uri sunt case sensitive, deci ar trebui mereu stocate tinand cont de aceasta, si trebuie mereu comparate intr-o maniera case-sensitive.</p>
				</section>
			</section>

			<section>
				<h3>Autorizarea</h3>
				<p>Stol suporta JWT pentru autorizarea cererilor API. Cererile autorizate catre API ar trebui sa foloseasca un header Authorization cu valoarea <code>Bearer &#60;TOKEN&#62;</code>, unde <code>&#60;TOKEN&#62;</code> este un token JWT obtinut prin flow-ul de login.</p>
			</section>

			<section id="login">
				<h3>Login</h3>
				<h4>/api/user/login</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Permite unui utilizator sa intre in cont. De asemenea furnizeaza un acces token folosit pentru request-uri ulterioare.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/user/login</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Fara</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X POST http://localhost/ProiectTW/api/user/login \
	--header "Content-Type: application/json" \
	--data "{\"username\": \"abcdef\",\"password\": \"abcdef\"}"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div><b>username</b> <i>String</i> Numele de cont folosit.</div>
						<div><b>password</b> <i>String</i> Parola asociata contului folosit.</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "data": {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJTdG9sX1VuaXZlcnNhbCIsImF1ZCI6IlN0b2xfVW5pdmVyc2FsIiwiaWF0IjpudWxsLCJuYmYiOm51bGwsImV4cCI6bnVsbCwiZGF0YSI6eyJ1c2VyX2lkIjoiYzk1MjZlMzIyMWQ2ODliNDhjNjIxZDFiYWJlMGJiODcifX0.lR4W2VWrjRX7C1TItN3RawYfSH-FQMdRV-Ryu7IsNuo"
    },
    "message": "User succesfully logged in, access token was provided"
}</pre>
						<div><b>access_token</b> <i>String</i> Token ce va fi folosit pentru autorizarea cererilor viitoare.</div>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu parola incorecta: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Invalid credentials or user does not exist"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Invalid credentials or user does not exist</li>
						</ul>
					</dd>
				</dl>
			</section>

			<section id="register">
				<h3>Register</h3>
				<h4>/api/user/register</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Permite unui utilizator sa isi creeze un cont.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/user/register</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Fara</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X POST http://localhost/ProiectTW/api/user/register \
	--header "Content-Type: application/json" \
	--data "{\"email\": \"example@mail.com\",\"username\": \"David32\",\"password\": \"123456abcdef\"}"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div><b>email</b> <i>String</i> Email-ul asociat contului.</div>
						<div><b>username</b> <i>String</i> Numele de cont.</div>
						<div><b>password</b> <i>String</i> Parola asociata contului.</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "message": "User account successfully created"
}</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu nume prea scurt: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "The provided username is too short."
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>The email field cannot be empty.</li>
							<li>The email is not valid.</li>
							<li>The username field cannot be empty.</li>
							<li>The password field cannot be empty.</li>
							<li>The provided email is already in use.</li>
							<li>The provided username is already in use.</li>
							<li>The provided username is too short.</li>
							<li>The provided password is too short.</li>
						</ul>
					</dd>
				</dl>
			</section>

			<section id="info_prof">
				<h3>Informatii despre profile</h3>
				<h4>GET /api/user</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Ofera informatii despre un utilizator precum username-ul, email-ul, si daca a autorizat sau nu fiecare din serviciile: GoogleDrive, Onedrive si Dropbox.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/user</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X GET http://localhost/ProiectTW/api/user \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "data": "{\"username\":\"abcdef\",\"email\":\"abcdef@yahoo.com\",\"onedrive\":true,\"googledrive\":false,\"dropbox\":true}",
    "message": "User retrieval succesfully"
}</pre>
						<div><b>username</b> <i>String</i> Username-ul contului.</div>
						<div><b>email</b> <i>String</i> Emai-ul contului.</div>
						<div><b>onedrive</b> <i>String</i> Daca serviciul Onedrive este autorizat pe cont.</div>
						<div><b>googledrive</b> <i>String</i> Daca serviciul GoogleDrive este autorizat pe cont.</div>
						<div><b>dropbox</b> <i>String</i> Daca serviciul Dropbox este autorizat pe cont.</div>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu access token invalid: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Invalid access token"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Missing access token</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="info_stor">
				<h3>Informatii despre storage</h3>
				<h4>GET /api/user/storage</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Ofera informatii despre daca un utilizator a autorizat sau nu unul din serviciile: GoogleDrive, Onedrive si Dropbox. Pentru serviciile autorizate se ofera informatii precum spatiul total de stocare si spatiul folosit.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/user/storage</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X GET http://localhost/ProiectTW/api/user/storage \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "data": "{\"googledrive\":{\"available\":false},\"onedrive\":{\"available\":true,\"total\":5368709120,\"used\":398083},\"dropbox\":{\"available\":true,\"total\":2147483648,\"used\":1102571}}",
    "message": "User's storage data succesfully retrieved"
}</pre>
						<div><b>onedrive</b> <i>String</i> Daca serviciul Onedrive este autorizat pe cont.</div>
						<div><b>googledrive</b> <i>String</i> Daca serviciul GoogleDrive este autorizat pe cont.</div>
						<div><b>dropbox</b> <i>String</i> Daca serviciul Dropbox este autorizat pe cont.</div>
						<div><b>total</b> <i>String</i> Spatiul total de stocare disponibil pe serviciul respectiv.</div>
						<div><b>used</b> <i>String</i> Spatiul total folosit pe serviciul respectiv.</div>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu access token invalid: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Invalid access token"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Missing access token</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>

			<section id="updt_user">
				<h3>Modificare profile user</h3>
				<h4>PATCH /api/user</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Permite modificarea profilului unui utilizator prin schimbarea username-ului sau parolei.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/user</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X PATCH http://localhost/ProiectTW/api/user \
	--header "Authorization: Bearer &#60;access_token&#62;" \
	--header "Content-Type: application/json" \
	--data "{\"username\": \"NewName\",\"oldpassword\": \"abcdef\",\"newpassword\": \"q1w2e3r4\"}"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div><b>username</b> <i>String</i> Noul nume de utilizator dorit pentru cont.</div>
						<div><b>oldpassword</b> <i>String</i> Parola veche folosita pentru verificarea identitatii.</div>
						<div><b>newpassword</b> <i>String</i> Parola noua dorita a o inlocui pe cea veche.</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "message": "Data updated succesfully"
}</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu parola veche gresita: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Given password is incorrect"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Username is taken</li>
							<li>Given password is incorrect</li>
							<li>Both old password and new password are needed to update user password field</li>
							<li>Missing access token</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="auth_serv">
				<h3>Autorizarea unui serviciu</h3>
				<h4>GET /api/user/authorize/:service</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Ofera un link spre a fi folosit pentru redirectare. Folosit pentru autorizare OAuth pentru unul din serviciile de stocare in cloud.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/user/authorize/:service</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X GET http://localhost/ProiectTW/api/user/authorize/googledrive \
	sau
	GET http://localhost/ProiectTW/api/user/authorize/dropbox \
	sau
	GET http://localhost/ProiectTW/api/user/authorize/onedrive \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "data": "https://www.dropbox.com/oauth2/authorize?response_type=code&client_id=yakh16kscg1cb6o&redirect_uri=http%3A%2F%2Flocalhost%2FProiectTW%2Fapi%2Fuser%2Fauthorize%2Fdropbox&state=c9526e3221d689b48c621d1babe0bb87",
    "message": "Dropbox Authorization Link"
}</pre>
					<div><b>data</b> <i>String</i> Contine un URL care duce catre pagina pentru a confirma autorizarea serviciului Stol pe unul din servicii de stocare in cloud.</div>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu access token invalid: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Invalid access token"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Missing access token</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>



			<section id="deauth_serv">
				<h3>Deautorizarea unui serviciu</h3>
				<h4>DELETE /api/user/deauthorize/:service</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Prin deautorizare, un serviciu nu va mai fi asociat contului deci nu va mai putea fi folosit pentru a incarca sau descarca fisiere.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/user/deauthorize/:service</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X DELETE http://localhost/ProiectTW/api/user/deauthorize/googledrive \
	sau
	DELETE http://localhost/ProiectTW/api/user/deauthorize/dropbox \
	sau
	DELETE http://localhost/ProiectTW/api/user/deauthorize/onedrive \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "message": "Service succesfully unauthorized"
}</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu access token invalid: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Invalid access token"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Missing access token</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>



			<section id="fld_to_fld">
				<h3>Crearea unui folder in alt folder</h3>
				<h4>POST /api/items/:parent_id</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Permite crearea unui folder atunci cand se stie parintele acestuia.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/items/:parent_id</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X POST http://localhost/ProiectTW/api/items/e86edca146bbefd773838a7e7955b521 \
	--header "Authorization: Bearer &#60;access_token&#62;" \
	--header "Content-Type: application/json" \
	--data "{\"foldername\": \"Poze vacanta\"}"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div><b>foldername</b> <i>String</i> Numele noului folder creat.</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "message": "Folder item created succesfully"
}</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu folosirea id-ului unui folder inexistent: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Specified reference parent id is invalid"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Folder name already taken in the respective container</li>
							<li>Specified reference parent id is invalid</li>
							<li>Missing access token</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="fld_to_root">
				<h3>Crearea unui folder in root</h3>
				<h4>POST /api/items</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Permite crearea unui folder in root atunci cand nu se cunoaste id-ul acestuia.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/items/</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X POST http://localhost/ProiectTW/api/items \
	--header "Authorization: Bearer &#60;access_token&#62;" \
	--header "Content-Type: application/json" \
	--data "{\"foldername\": \"Folder teme\"}"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div><b>foldername</b> <i>String</i> Numele noului folder creat.</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "message": "Folder item created succesfully"
}</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu folosirea unui nume de folder deja existent: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Folder name already taken in the respective container with specified id"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Folder name already taken in the respective container</li>
							<li>Missing access token</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="get_fld">
				<h3>Obtinere continut al unui folder</h3>
				<h4>GET /api/items/:item_id</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Ofera o lista cu fisierele si folderele continute in directorul identificat prin id. Se ofera id-ul item-ului, numele si tipul acestuia fisier/folder.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/items/:item_id</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X GET http://localhost/ProiectTW/api/items/3dc768efdc11f3282b8829de71fb6c7b \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "data": "[{\"item_id\":\"d99afce554f4e11902e0b2e24b0dde5f\",\"name\":\"Tema1.pdf\",\"content_type\":\"file\"},{\"item_id\":\"76c12d74b316e100c3d7a838d36af91d\",\"name\":\"Tema2.pdf\",\"content_type\":\"file\"}]",
    "message": "Item successfully retrieved"
}</pre>
						<div><b>item_id</b> <i>String</i> Id-ul item-ului.</div>
						<div><b>name</b> <i>String</i> Numele item-ului.</div>
						<div><b>content_type</b> <i>String</i> Daca este fisier sau folder.</div>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu folosirea unui id gresit: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Specified reference item id is invalid"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Missing access token</li>
							<li>Invalid access token</li>
							<li>Specified reference item id is invalid</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="get_root">
				<h3>Obtinere fisiere din root</h3>
				<h4>GET /api/items</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Ofera o lista cu fisierele si folderele continute in directorul root. Include informatii si despre folderul root in sine. Se ofera id-ul item-ului, numele si tipul acestuia fisier/folder.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/items</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X GET http://localhost/ProiectTW/api/items \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "data": "[{\"item_id\":\"e86edca146bbefd773838a7e7955b521\",\"name\":\"root\",\"content_type\":\"folder\"},{\"item_id\":\"3da7018c61bdb622880194f9f8290ab9\",\"name\":\"Poze vacanta\",\"content_type\":\"folder\"},{\"item_id\":\"3dc768efdc11f3282b8829de71fb6c7b\",\"name\":\"Folder teme\",\"content_type\":\"folder\"}]",
    "message": "Items succesfully retrieved"
}</pre>
						<div><b>item_id</b> <i>String</i> Id-ul item-ului.</div>
						<div><b>name</b> <i>String</i> Numele item-ului.</div>
						<div><b>content_type</b> <i>String</i> Daca este fisier sau folder.</div>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu folosirea unui id gresit: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Specified reference item id is invalid"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Missing access token</li>
							<li>Invalid access token</li>
							<li>Specified reference item id is invalid</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="rename">
				<h3>Redenumire fisiere sau foldere</h3>
				<h4>PATCH /api/items/:item_id</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Permite redenumirea unui fisier sau folder identificate prin ID.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/items/:item_id</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X PATCH http://localhost/ProiectTW/api/items/3da7018c61bdb622880194f9f8290ab9 \
	--header "Authorization: Bearer &#60;access_token&#62;" \
	--header "Content-Type: application/json" \
	--data "{\"newname\": \"Poze vacanta(excursie)\"}"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div><b>newname</b> <i>String</i> Noul nume pentru folder sau fisier.</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "message": "Data updated successfully"
}</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu folosirea unui nume de folder deja existent: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "New name for specified item is already taken"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>New name for specified item is already taken</li>
							<li>Missing access token</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="delete_itm">
				<h3>Stergere fisiere sau foldere</h3>
				<h4>DELETE /api/items/:item_id</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Permite stergerea unui fisier sau folder identificate prin ID. Pentru foldere, stergerea are loc recursiv, sterg toate fisierele din sub-arbore.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/items/:item_id</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X DELETE http://localhost/ProiectTW/api/items/76c12d74b316e100c3d7a838d36af91d \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "message": "Items succesfully deleted"
}</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu folosirea unui id de item inexistent: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Specified reference parent id is invalid"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Specified reference parent id is invalid</li>
							<li>Missing access token</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="move_itm">
				<h3>Mutare fisier sau folder sub alt parinte</h3>
				<h4>PUT /api/items/:item_id/:new_parent_id</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Permite mutarea unui fisier sau folder identificate prin ID intr-un nou folder.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/items/:item_id/:new_parent_id</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X PUT http://localhost/ProiectTW/api/items/d99afce554f4e11902e0b2e24b0dde5f/e86edca146bbefd773838a7e7955b521 \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "message": "Item succesfully moved"
}</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu folosirea id-ului unui fisier in loc de folder drept parent_id: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Specified reference new parent id is invalid or not a folder"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Specified reference new parent id is invalid or not a folder</li>
							<li>There is already an item with same name and type in target directory</li>
							<li>Missing access token</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>



			<section id="upld_create">
				<h3>Crearea unei sesiuni de upload</h3>
				<h4>POST /api/upload/:parent_id</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Este apelata inainte de trimiterea propriu-zisa a fisierului. Va returna o adresa la care se poate incarca fisierul precum si dimensiunea primului chunk asteptat.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/upload/:parent_id</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X POST http://localhost/ProiectTW/api/upload/e86edca146bbefd773838a7e7955b521 \
	--header "Authorization: Bearer &#60;access_token&#62;" \
	--header "Content-Type: application/json" \
	--data "{\"filename\": \"Tema3.pdf\",\"filesize\": \"2731\",\"mode\": \"fragmented\"}"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div><b>filename</b> <i>String</i> Numele fisierului ce urmeaza a fi incarcat.</div>
						<div><b>filesize</b> <i>String</i> Dimensiunea fisierului ce urmeaza a fi incarcat.</div>
						<div><b>mode</b> <i>String</i> Modul in care va fi incarcat fisierul(redundant/fragmentat).</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "data": {
        "url": "http://localhost/ProiectTW/api/upload/5eda89d8bc44f4.58624273",
        "chunk": 10000000
    },
    "message": "Upload endpoint generated succesfully"
}</pre>
						<div><b>url</b> <i>String</i> Adresa la care va fi incarcat fisierul.</div>
						<div><b>chunk</b> <i>String</i> Dimensiunea primului chunk din fisier asteptat de server.</div>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu folosirea unui id invalid drept parent_id: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Specified parent id is invalid"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Specified parent id is invalid</li>
							<li>Item name is already taken</li>
							<li>Missing access token</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>



			<section id="upld_file">
				<h3>Incarcarea unui fisier pe chunk-uri</h3>
				<h4>PUT /api/upload/:upload_id</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Pentru incarcarea pe chunk-uri a fisierului pentru care s-a creat anterior o sesiune de upload.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/upload/:upload_id</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Fara</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X PUT http://localhost/ProiectTW/api/upload/5eda89d8bc44f4.58624273 \
	--data "&#60;file_chunk&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "message": "Data file uploaded succesfully"
}</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu incercarea de a incarca un fisier in mod redundant cand nu sunt 2 servicii de stocare in cloud autorizate: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Using redundancy mode for a file requires at least two services"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Storage space insufficient to complete request</li>
							<li>Upload could not be complete since there are no storage services linked</li>
							<li>GoogleDrive service failed due to internal issues</li>
							<li>Onedrive service failed due to internal issues</li>
							<li>Dropbox service failed due to internal issues</li>
							<li>Invalid upload endpoint</li>
							<li>Chunk size not supported by the server instance</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="upld_cancel">
				<h3>Anularea unui upload</h3>
				<h4>DELETE /api/upload/:upload_id</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Apelata atunci cand se doreste anularea unui upload in progres. Invalideaza sesiunea de upload si sterge fragmentele deja incarcate.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/upload/:upload_id</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Fara</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X DELETE http://localhost/ProiectTW/api/upload/5eda89d8bc44f4.58624273</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "message": "Upload revoked successfully"
}</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu anularea unui upload dupa ce fisierul a inceput a fi impartit si incarcat pe serviciile de stocare in cloud: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Deleting a file in the process of splitting to associated services is not permitted"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Invalid upload id supplied</li>
							<li>Deleting a file in the process of splitting to associated services is not permitted</li>
						</ul>
					</dd>
				</dl>
			</section>



			<section id="dwnld_create">
				<h3>Crearea unei sesiuni de download</h3>
				<h4>POST /api/download/:file_id</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Este apelata inainte de primirea propriu-zisa a fisierului. Va returna o adresa de la care se poate prelua fisierul.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/download/:file_id</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X POST http://localhost/ProiectTW/api/download/d99afce554f4e11902e0b2e24b0dde5f \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "data": {
        "url": "http://localhost/ProiectTW/api/download/5eda9ae4600e50.82295199"
    },
    "message": "Download is starting. Please wait for collecting services fragments"
}</pre>
						<div><b>url</b> <i>String</i> Adresa de la care va putea fi descarcat fisierul.</div>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu incercarea de a descarca un fisier fragmentat atunci cand fragmentul de pe Onedrive a fost sters: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "The file fragment from OneDrive is missing"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>The provided file id is invalid</li>
							<li>Retrieving the file requires OneDrive authorization</li>
							<li>Retrieving the file requires Dropbox authorization</li>
							<li>Retrieving the file requires Googledrive authorization</li>
							<li>The file fragment from OneDrive is missing</li>
							<li>The file fragment from Dropbox is missing</li>
							<li>The file fragment from Googledrive is missing</li>
							<li>The redundant file was deleted from all services: &#60;list&#62;</li>
							<li>Please authorize one of the following: &#60;list&#62;</li>
							<li>File was deleted from: &#60;list&#62;, please try to authorize: &#60;list&#62;</li>
							<li>Service temporarly unavailable</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="dwnld_file">
				<h3>Descarcarea fisierului</h3>
				<h4>GET /api/download/:download_id</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Pentru descarcarea ca flux de octeti a fisierului pentru care s-a creat anterior o sesiune de download.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/download/:download_id</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Fara</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X GET http://localhost/ProiectTW/api/download/5eda9ae4600e50.82295199</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">&#60;flux_octeti&#62; ce poate fi salvat intr-un fisier</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu incercarea de folosi o sesiune de download invalida: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Specified download id is invalid"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Specified download id is invalid</li>
							<li>Service temporarly unavailable</li>
						</ul>
					</dd>
				</dl>
			</section>



			<section id="dwnlod_csv_create">
				<h3>Obtinere link download fisier CSV cu date despre o multime de utilizatori</h3>
				<h4>POST /api/admin/download_csv</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Este apelata inainte de primirea propriu-zisa a fisierului. Se va transmite un array cu o lista de nume de utilizatori. Va returna o adresa de la care se poate prelua fisierul.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/admin/download_csv</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token de Administrator</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X POST http://localhost/ProiectTW/api/admin/download_csv \
	--header "Authorization: Bearer &#60;access_token&#62;" \
	--header "Content-Type: application/json" \
	--data "{\"users\":\["\abcdef\",\"sysadmin\"\]}"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div><b>users</b> <i>String Array</i> Un array cu nume de utilizatori pentru care se doresc datele.</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "data": {
        "url": "http://localhost/ProiectTW/api/admin/download_csv/5edd331ba1ceb7.78267792"
    },
    "message": "Download is starting."
}</pre>
						<div><b>url</b> <i>String</i> Adresa de la care va putea fi descarcat fisierul.</div>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu incercarea de a accesa endpoint-ul de catre un user care nu este administrator: </div>
						<pre class="literal-block">{
    "status": 409,
    "message": "Provided authorization token does not belong to an administrator"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Service temporarly unavailable</li>
							<li>Provided authorization token does not belong to an administrator</li>
						</ul>
					</dd>
				</dl>
			</section>



			<section id="dwnlod_csv">
				<h3>Descarcarea fisierului CSV</h3>
				<h4>GET /api/admin/download_csv/:download_id</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Pentru descarcarea ca flux de octeti a fisierului CSV pentru care s-a creat anterior o sesiune de download.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/admin/download_csv/:download_id</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Fara</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X GET http://localhost/ProiectTW/api/admin/download_csv/5edd331ba1ceb7.78267792</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">&#60;flux_octeti&#62; ce poate fi salvat intr-un fisier</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu incercarea de folosi o sesiune de download invalida: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Specified download id is invalid"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Specified download id is invalid</li>
							<li>Service temporarly unavailable</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="get_users">
				<h3>Obtinerea datelor despre utilizatori</h3>
				<h4>GET /api/admin/users</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Ofera o lista cu date despre utilizatori. Pentru fiecare se primesc date precum username-ul, email-ul, numarul de fisiere, daca a autorizat GoogleDrive, Dropbox sau Onedrive.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/admin/users</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X GET http://localhost/ProiectTW/api/admin/users \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "data": "[{\"username\":\"abcdef\",\"email\":\"abcdef@yahoo.com\",\"number\":2,\"onedrive\":true,\"dropbox\":true,\"googledrive\":false},{\"username\":\"sysadmin\",\"email\":\"admin@admin.com\",\"number\":0,\"onedrive\":false,\"dropbox\":false,\"googledrive\":false}]",
    "message": "Users successfully retrieved"
}</pre>
						<div><b>username</b> <i>String</i> Numele utilizatorului.</div>
						<div><b>email</b> <i>String</i> Email-ul utilizatorului.</div>
						<div><b>number</b> <i>String</i> Numarul de fisiere din cont.</div>
						<div><b>onedrive</b> <i>String</i> Daca a autorizat serviciul Onedrive</div>
						<div><b>googledrive</b> <i>String</i> Daca a autorizat serviciul GoogleDrive</div>
						<div><b>dropbox</b> <i>String</i> Daca a autorizat serviciul Dropbox</div>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu incercarea de a accesa endpoint-ul de catre un user care nu este administrator: </div>
						<pre class="literal-block">{
    "status": 409,
    "message": "Provided authorization token does not belong to an administrator"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Missing access token</li>
							<li>Service temporarly unavailable</li>
							<li>Provided authorization token does not belong to an administrator</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="get_services">
				<h3>Obtinere lista de servicii si daca sunt allowed sau nu</h3>
				<h4>GET /api/admin/services</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Ofera o lista cu serviciile GoogleDrive, Dropbox si Onedrive si pentru fiecare din acestea daca este permis sau nu.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/admin/services</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token de Administrator</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X GET http://localhost/ProiectTW/api/admin/services \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "data": {
        "dropbox": true,
        "googledrive": true,
        "onedrive": true
    },
    "message": "Statuses for allowed services retrieved succesfully"
}</pre>
						<div><b>dropbox</b> <i>String</i> Daca a permis serviciul Dropbox</div>
						<div><b>googledrive</b> <i>String</i> Daca a permis serviciul GoogleDrive</div>
						<div><b>onedrive</b> <i>String</i> Daca a permis serviciul Onedrive</div>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu incercarea de a accesa endpoint-ul de catre un user care nu este administrator: </div>
						<pre class="literal-block">{
    "status": 409,
    "message": "Provided authorization token does not belong to an administrator"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Missing access token</li>
							<li>Service temporarly unavailable</li>
							<li>Provided authorization token does not belong to an administrator</li>
						</ul>
					</dd>
				</dl>
			</section>



			<section id="chge_service">
				<h3>Schimba disponibilitatii unui serviciu particular</h3>
				<h4>POST /api/admin/services/:service</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Ofera o lista cu serviciile GoogleDrive, Dropbox si Onedrive si pentru fiecare din acestea daca este permis sau nu.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/admin/services/:service</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token de Administrator</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X POST http://localhost/ProiectTW/api/admin/services/googledrive \
	--header "Authorization: Bearer &#60;access_token&#62;" \
	--header "Content-Type: application/json" \
	--data "{\"allow\": \"false\"}"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div><b>allow</b> <i>String Array</i> Daca se permite sau nu serviciul specificat in url.</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "message": "Allow rule updated succesfully"
}</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu incercarea de a accesa endpoint-ul de catre un user care nu este administrator: </div>
						<pre class="literal-block">{
    "status": 409,
    "message": "Provided authorization token does not belong to an administrator"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Missing access token</li>
							<li>Service temporarly unavailable</li>
							<li>Provided authorization token does not belong to an administrator</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="search">
				<h3>Cautare fisiere si foldere dupa nume</h3>
				<h4>GET /api/search/:search_name</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Returneaza o lista de iteme care contin in nume parametrul dat. Pentru fiecare item se obtine id-ul sau, id-ul parintelui, numele si tipul continutului(fisiere sau folder)</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/search/:search_name</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X GET http://localhost/ProiectTW/api/search/Tema \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "data": "[{\"item_id\":\"d99afce554f4e11902e0b2e24b0dde5f\",\"parent_id\":\"e86edca146bbefd773838a7e7955b521\",\"name\":\"Tema1.pdf\",\"content_type\":\"file\"},{\"item_id\":\"787efc3002d4073d2d2ca025550a2c57\",\"parent_id\":\"e86edca146bbefd773838a7e7955b521\",\"name\":\"Tema2.pdf\",\"content_type\":\"file\"}]",
    "message": "Items with specified search criteria retrieved successfully!"
}</pre>
						<div><b>item_id</b> <i>String</i> Id-ul unui item.</div>
						<div><b>parent_id</b> <i>String</i> Id-ul parintelui item-ului.</div>
						<div><b>name</b> <i>String</i> Numele item-ului.</div>
						<div><b>content_type</b> <i>String</i> Daca este fisier sau folder.</div>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu cand serviciul nu este disponibil: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Service temporarly unavailable"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Missing access token</li>
							<li>Service temporarly unavailable</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="get_fav">
				<h3>Obtinere lista fisiere de la favorites</h3>
				<h4>GET /api/favorites/get</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Ofera o lista cu fisierele si folderele marcate ca fiind favorite. Se ofera id-ul item-ului, numele si tipul acestuia fisier/folder.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/favorites/get</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X GET http://localhost/ProiectTW/api/favorites/get \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "data": "[{\"item_id\":\"0777a4c473c76217a7bbae0348100b92\",\"name\":\"Poze Vacanta\",\"content_type\":\"folder\",\"favorited\":1},{\"item_id\":\"390877dc021d393f6e5aad5fab2a1762\",\"name\":\"Tema2.pdf\",\"content_type\":\"file\",\"favorited\":1}]",
    "message": "Favorited items successfully retrieved"
}</pre>
						<div><b>item_id</b> <i>String</i> Id-ul item-ului.</div>
						<div><b>name</b> <i>String</i> Numele item-ului.</div>
						<div><b>content_type</b> <i>String</i> Daca este fisier sau folder.</div>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu cand serviciul nu este disponibil: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Service temporarly unavailable"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Missing access token</li>
							<li>Invalid access token</li>
							<li>Service temporarly unavailable</li>
						</ul>
					</dd>
				</dl>
			</section>



			<section id="add_fav">
				<h3>Adaugarea unui item la favorites</h3>
				<h4>POST /api/favorites/add/:item_id</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Pentru utilizatorul curent adauga fisierul sau folderul specificat in url in lista de iteme favorite.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/favorites/add/:item_id</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X POST http://localhost/ProiectTW/api/favorites/add/390877dc021d393f6e5aad5fab2a1762 \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "message": "Item added to favorites successfully"
}</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu incercarea de a adauga la favorite un id de fisier inexistent: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Specified item id is invalid"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Specified item id is invalid</li>
							<li>Missing access token</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>


			<section id="rmv_fav">
				<h3>Eliminarea unui item din favorites</h3>
				<h4>DELETE /api/favorites/remove/:item_id</h4>
				<dl>
					<dt>Descriere</dt>
					<dd><p>Pentru utilizatorul curent sterge fisierul sau folderul specificat in url din lista de iteme favorite.</p></dd>

					<dt>Structura URL</dt>
					<dd>
						<pre class="literal-block">http://localhost/ProiectTW/api/favorites/remove/:item_id</pre>
					</dd>

					<dt>Autentificare</dt>
					<dd>Da, folosind Access Token</dd>

					<dt>Exemplu</dt>
					<dd>
						<pre class="literal-block documentation__curl-example">curl -X DELETE http://localhost/ProiectTW/api/favorites/remove/390877dc021d393f6e5aad5fab2a1762 \
	--header "Authorization: Bearer &#60;access_token&#62;"</pre>
					</dd>

					<dt>Parametrii</dt>
					<dd>
						<div>Fara</div>
					</dd>

					<dt>Returneaza</dt>
					<dd>
						<pre class="literal-block">{
    "status": "success",
    "message": "Item removed from favorites successfully"
}</pre>
					</dd>

					<dt>Erori</dt>
					<dd>
						<div>Exemplu incercarea de a sterge de la favorite un fisier inexistent: </div>
						<pre class="literal-block">{
    "status": "error",
    "message": "Specified item id is invalid"
}</pre>
						<p>Erori posibile:</p>
						<ul>
							<li>Specified item id is invalid</li>
							<li>Missing access token</li>
							<li>Invalid access token</li>
						</ul>
					</dd>
				</dl>
			</section>

		</article>

		<footer>
			
		</footer>
	</body>
</html>