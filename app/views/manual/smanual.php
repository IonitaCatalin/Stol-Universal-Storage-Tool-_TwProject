<!DOCTYPE html>
<html lang="ro">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
		<title>Stol-Ghid de utilizare</title>
		<link rel="stylesheet" href="../page/css/scholarly.css">
		<base href="Ghidul%20de%20utilizare%20al%20aplicatiei.html">
	</head>
	<body prefix="schema: http://schema.org">

		<!-- article -->
		<article resource="#" typeof="schema:ScholarlyArticle">

			<header>
				<div class="banner">
					<img src="../page/images/logo.png" width="220" height="50" alt="Stol logo" id="logo-stol">
					<div class="status">Stol-Ghid de utilizare</div>
				</div>
				<h1 property="schema:name">Stol-Universal Storage Tool Ghid de utilizare</h1>
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
					<li><a href="#desc">1. Descriere</a></li>
					<li><a href="#register">2. Crearea unui cont</a></li>
					<li><a href="#login">3. Login - Cum se intra in cont</a></li>
					<li><a href="#files">4. Pagina de management a fisierelor</a>
						<ol>
							<li><a href="#files-overview">4.1 Privire de ansamblu</a></li>
							<li><a href="#user-bar">4.2 Bara utilizator</a></li>
							<li><a href="#upload">4.3 Meniul de upload</a></li>
							<li><a href="#nav-bar">4.4 Bara de navigare</a></li>
							<li><a href="#files-window">4.5 Fereastra cu fisiere</a></li>
							<li><a href="#contxt-menu">4.6 Meniul contextual</a>
								<ol>
									<li><a href="#general-contxt">4.6.1 Meniul contextual general</a></li>
									<li><a href="#file-contxt">4.6.2 Meniul contextual fisier</a></li>
									<li><a href="#folder-contxt">4.6.3 Meniul contextual folder</a></li>
								</ol>
							</li>
							<li><a href="#storage-info">4.7 Cutia cu statistici despre depozitare</a></li>
							<li><a href="#profile-logout">4.8 Acces la pagina de Profil si Logout</a></li>
						</ol>
					</li>
					<li><a href="#profile">5. Pagina de profil</a>
						<ol>
							<li><a href="#profile-overview">5.1 Privire de ansamblu</a></li>
							<li><a href="#user_info">5.2 Informatii utilizator</a></li>
							<li><a href="#user-change-data">5.3 Schimbare nume si parola</a></li>
							<li><a href="#auth-deauth">5.4 Adaugare sau eliminare Servicii</a></li>
						</ol>
					</li>
					<li><a href="#admin">6. Pagina de administrare a aplicatie</a>
						<ol>
							<li><a href="#admin-overview">6.1 Privire de ansamblu</a></li>
							<li><a href="#users_table_csv">6.2 Date despre utilizatori si export in format CSV</a></li>
							<li><a href="#enabling_services">6.3 Dezactivarea sau permiterea unor servicii</a></li>
						</ol>
					</li>
				</ol>

			</section>

			<div role="contentinfo">
				<dl>
					<dt>Authors</dt>
					<dd>
					  <a href="#refAutor1">Georgica Marius</a>
					  &amp;
					  <a href="#refAutor2">Ionita Mihail Catalin</a>
					</dd>
	<!-- 				<dt>License</dt>
					<dd>
						<a href="http://creativecommons.org/licenses/by/4.0/">de completat</a>
					</dd> -->
				</dl>
			</div>

			<section id="desc">
				<h2>1. Descriere</h2>
				<p>	Stol, abreviat de la (Universal) Storage Tool, un instrument care abstractizeaza operatiile uzuale cu fisiere si chiar sisteme de fisiere de mari dimensiuni. Acestea pot fi stocate atat fragmentat cat si redundant prin intermediul unor servicii disponibile de tipul "in cloud" precum Dropbox, Google Drive si Microsoft OneDrive. De asemenea Stol va ofera suport si pentru recompunerea resurselor si preluarea sigura si eficienta a acestora.</p>
			</section>

			<section id="register">
				<h2>2. Crearea unui cont</h2>
				<p>
					Inainte de a putea beneficia de serviciile oferite de aplicatia Stol, utilizatorul trebuie sa isi creeze un cont. Crearea unui cont ofera acces controlat si autorizat la fisierele proprii precum si la datele personale ori serviciile asociate.
				</p>
				<p>Pentru a creea un cont este necesara completarea urmatoarelor campuri:</p>
				<ul>
					<li>Email: Necesita folosirea unui email valid al oricarui serviciu de posta electronica preferata de utilizator.</li>
					<li>Username: Numele folosit pentru a identifica clientul.</li>
					<li>Password: Parola unic asociata cu email-ul. Are rol in accesarea ulterioara a contului. Se recomanda folosirea unei parole ce nu mai este utilizata pentru nicio alta aplicatie sau serviciu.</li>
				</ul>
				<figure typeof="sa:image">
					<img src="../page/images/register_form_guide.png" alt="Register form window.">
					<figcaption>Captura de ecran a formularului de inregistrare cu campuri pentru date obligatorii.</figcaption>
				</figure>
				<p>
					Dupa furnizarea datelor necesare, finalizarea realizarii contului se face prin apasarea butonului "Register".
				</p>
			</section>

			<section id="login">
				<h2>3. Login - Cum se intra in cont</h2>
				<p>
					Prin intermediul procesului de autentificare, utilizatorul va obtine acces la fisierele proprii precum si la datele personale ori serviciile asocite.
				</p>
				<p>Pentru a putea intra in contul deja existent, utilizatorul trebuie sa furnizeze urmatoarele informatii:</p>
				<ul>
					<li>Username: Numele folosit pentru a identifica clientul.</li>
					<li>Password: Parola folosita in momentul inregistrarii contului.</li>
				</ul>
				<figure typeof="sa:image">
					<img src="../page/images/login_form_guide.png" alt="Login form window.">
					<figcaption>Captura de ecran a formularului pentru autentificare.</figcaption>
				</figure>
				<p>	Dupa furnizarea datelor necesare, finalizarea procesului de autentificare se realizeaza prin apasarea butonului "Login" iar utilizatorul va fi redirectionat spre pagina principala de management al fisierelor</p>
				<p>Daca utilizatorul nu dispune de un cont deja existent, prin apasarea link-ului "Don't have an account?" va fi redirectionat spre pagina de Register unde isi va putea creea unul.</p>
				<p>Daca utilizatorul nu isi mai aminteste parola, prin apasarea prin apasarea link-ului "Lost your password?" va fi redirectat spre pagina pentru recuperarea parolei.</p>
			</section>

			<section id="files">
				<h2>4. Pagina de management a fisierelor</h2>

				<section id="files-overview">
					<h3>4.1 Privire de ansamblu</h3>
					<p>
						Pagina de management a fisierelor a fisierelor poate fi considerata pagina principala. De aici utilizatorul are acces la propriile fisiere, la butoane pentru actiuni rapide, la search, la statistici despre stocare si acces la pagina de profil.
					</p>
					<figure typeof="sa:image">
						<img src="../page/images/main_page_guide.png" alt="Main page window">
						<figcaption>Captura de ecran a paginii principale de management al fisierelor.</figcaption>
					</figure>
					<p>Principalele componente ale paginii principale sunt:</p>
					<ul>
						<li>Bara utilizator</li>
						<li>Bara de navigare</li>
						<li>Fereastra cu fisiere</li>
						<li>Cutia cu statistici despre depozitare</li>
						<li>Acces la pagina de Profil si Logout</li>
					</ul>
				</section>

				<section id="user-bar">
					<h3>4.2 Bara utilizator</h3>
					<p>Ofera acces la 4 functionalitati rapide:</p>
					<ul>
						<li>Butonul Back: permite revenirea cu un pas inapoi atunci cand, spre exemplu, vedem continutul unui folder.</li>
						<li>Butonul Upload: permite deschiderea meniului pentru incarcarea unui fisier</li>
						<li>Butonul "New folder": acces rapid la crearea unui dosar nou gol</li>
						<li>Bara de search: permite filtrarea rezultatelor afisate dupa nume</li>
					</ul>
					<figure typeof="sa:image">
						<img src="../page/images/user_bar_guide.png" alt="User bar.">
						<figcaption>Captura de ecran a barei utilizator ce ofera functionalitati rapide.</figcaption>
					</figure>
				</section>

				<section id="upload">
					<h3>4.3 Meniul de upload</h3>
					<p>In urma apasarii butonului de upload se deschide meniul de upload. Acesta permite incarcarea fisierelor pe serviciile de stocare in cloud autorizate.</p>
					<p>Functionalitati:</p>
					<ul>
						<li>Modul fragmentat este default si va salva fragmente din fisier pe toate serviciile autorizate.</li>
						<li>Modul Redundant: Fisierele vor fi copiate intregi pe toate serviciile autorizate.</li>
						<li>Se poate incarca orice fisiere cu reprezentare binara</li>
						<li>Click pe butonul Upload pentru a incepe procesul.</li>
						<li>Inchiderea ferestrei in timpul transferului va duce la amanarea upload-ului si stergerea fisierului partial salvat.</li>
					</ul>
					<figure typeof="sa:image">
						<img id="upload_img" src="../page/images/file_upload_guide.png" alt="file upload window">
						<figcaption>Captura de ecran a meniului de upload, permite salvarea fisierelor si in mod redundant.</figcaption>
					</figure>
				</section>

				<section id="nav-bar">
					<h3>4.4 Bara de navigare</h3>
					<p>Bara de navigare contine butoane ce permit schimbarea categoriilor de fisiere afisate in Fereastra cu fisere</p>
					<ul>
						<li>Butonul Files: Vor fi afisate fisierele de la toate serviciile atasate contului curent fara o ordine prestabilita</li>
						<li>Butonul Favourites: Vor fi afisate doar fisierele ce au fost marcate ca favorite pentru acces rapid.</li>
						<!-- <li>Butonul Trash: Vor fi afisate doar fisierele ce au fost anterior marcate ca pentru stergere.</li> -->
					</ul>
					<figure typeof="sa:image">
						<img id="nav_bar_img" src="../page/images/nav_bar_guide.png" alt="nav bar window">
						<figcaption>Captura de ecran a barei de navigare, permite comutarea intre categorii de fisiere.</figcaption>
					</figure>
				</section>
				
				<section id="files-window">
					<h3>4.5 Fereastra cu fisiere</h3>
					<p>
						Ofera o reprezentare grafica a fisierelor disponibile pe serviciile de stocare asociate contului curent.
					</p>
					<p>Functionalitati:</p>
					<ul>
						<li>Aranjare fisiere in dosare</li>
						<li>Orice fisiere cu reprezentare binara</li>
						<li>Click dreapta invoca meniul contextual</li>
						<li>Dublu click stanga pe un folder permite vizualizarea continutului</li>
					</ul>
					<figure typeof="sa:image">
						<img src="../page/images/file_view_guide.png" alt="file managing window">
						<figcaption>Captura de ecran a ferestrei cu fisiere</figcaption>
					</figure>
				</section>

				<section id="contxt-menu">
					<h3>4.6 Meniul contextual</h3>
					<p>
						Accesibil in urma apasarii click dreapta fara a selecta un fisier sau folder.
					</p>
					<p>
						Ofera acces la diverse actiuni in functie de tipul obiectului selectat.
					</p>

					<section id="general-contxt">
						<h4>4.6.1 Meniul contextual general</h4>
						<p>Functionalitati:</p>
						<ul>
							<li>Butonul New Folder: Va creea un nou folder in care pot fi puse fisiere.</li>
							<li>Butonul Refresh: Va duce la reincarcarea continutului folderului curent.</li>
							<li>Butonul Upload: Permite accesul rapid la meniul de upload.</li>
						</ul>
						<figure typeof="sa:image">
							<img id="general_menu_img" src="../page/images/general_context_menu.png" alt="general context menu">
							<figcaption>Captura de ecran a meniului contextual general.</figcaption>
						</figure>
					</section>

					<section id="file-contxt">
						<h4>4.6.2 Meniul contextual fisier</h4>
						<p>
							Accesibil in urma apasarii click dreapta pe un fisier.
						</p>
						<p>Functionalitati:</p>
						<ul>
							<li>Butonul Download: Va porni procesul de descarcare a fisierului selectat.</li>
							<li>Butonul Rename: Va deschide o cutie de input text in care puteti da noul nume.</li>
							<li>Butonul Add to Favorites: Marcheaza fisierul pentru acces rapid.</li>
							<li>Butonul Remove: Va sterge fisierul atat din baza de date cat si de pe serviciile corespunzatoare.</li>
						</ul>
						<figure typeof="sa:image">
							<img id="file_menu_img" src="../page/images/file_context_menu.png" alt="file context menu">
							<figcaption>Captura de ecran a meniului contextual pentru fisiere.</figcaption>
						</figure>
					</section>

					<section id="folder-contxt">
						<h4>4.6.3 Meniul contextual folder</h4>
						<p>
							Accesibil in urma apasarii click dreapta pe un folder.
						</p>
						<p>Functionalitati:</p>
						<ul>
							<li>Butonul Rename: Va deschide o cutie de input text in care puteti da noul nume.</li>
							<li>Butonul Add to Favorites: Marcheaza fisierul pentru acces rapid.</li>
							<li>Butonul Remove: Va sterge folderul cat si continutul sau in mod recursiv atat din baza de date cat si de pe serviciile unde sunt stocate.</li>
						</ul>
						<figure typeof="sa:image">
							<img id="folder_menu_img" src="../page/images/folder_context_menu.png" alt="folder context menu">
							<figcaption>Captura de ecran a meniului contextual pentru foldere.</figcaption>
						</figure>
					</section>

				</section>

				<section id="storage-info">
					<h3>4.7 Cutia cu statistici despre depozitare</h3>
					<p>Cutia cu statistici despre depozitare ofera informatii cu privire la</p>
					<ul>
						<li>Numele Serviciului de stocare in cloud</li>
						<li>Spatiul total de stocare disponibil pe serviciul respectiv</li>
						<li>Spatiul total folosit deja pentru stocarea fisierelor proprii</li>
						<li>O reprezentare grafica 
							<ul>
								<li>Bara gri: reprezinta spatiul total de stocare</li>
								<li>Bara albastra: reprezinta spatiul total deja folosit, raportat la spatiul de stocare</li>
							</ul>
						</li>
					</ul>
					<figure typeof="sa:image">
						<img id="storage_box_img" src="../page/images/storage_box_guide.png" alt="ceva">
						<figcaption>Captura de ecran a cutiei cu statistici despre depozitare</figcaption>
					</figure>
				</section>
			

				<section id="profile-logout">
					<h3>4.8 Acces la pagina de Profil si Logout</h3>
					<p>Accesul la pagina de profil se realizeaza prin click stanga pe Avatar.</p>
					<figure typeof="sa:image">
						<img id="profile_access_img" src="../page/images/profile_access_guide.png" alt="ceva">
						<figcaption>Captura de ecran: Accesare pagina profil din coltul dreapta sus </figcaption>
					</figure>
					<p>Pentru iesire din cont si revenire la pagina de login se va folosi butonul "Logout".</p>
					<figure typeof="sa:image">
						<img id="logout_access_img" src="../page/images/logout_access_guide.png" alt="ceva">
						<figcaption>Captura de ecran: Butonul Logout din coltul stanga jos </figcaption>
					</figure>
				</section>

			</section>


			<section id="profile">
				<h2>5. Pagina de Profil</h2>
				
				<section id="profile-overview">
					<h3>5.1 Privire de ansamblu</h3>
					<p>
						Pagina de Profil permite utilizatorului sa vizualizeze datele personale precum si sa intreprinde numeroase actiuni cu acestea.
					</p>
					<p>Principalele facilitati ale paginii de profil:</p>
					<ul>
						<li>Vizualizarea informatii utilizator</li>
						<li>Schimbarea numelui si a parolei</li>
						<li>Autorizarea unui serviciu de stocare in cloud</li>
						<li>Deautorizarea de la un serviciu de stocare in cloud</li>
					</ul>
					<figure typeof="sa:image">
						<img src="../page/images/profile_page_guide.png" alt="profile page overview">
						<figcaption>Captura de ecran a paginii de profil</figcaption>
					</figure>
					<p>Salvarea modificarilor facute se poate realiza prin apasarea butonului "Save".</p>
					<p>Revenirea inapoi la pagina de management a fisierelor are loc prin apasarea butonului "Go Back".</p>
				</section>

				
				<section id="user_info">
					<h3>5.2 Informatii utilizator</h3>
					<p>In spatiul rezervat pentru informatii utilizatorul poate vedea date despre cont precum:</p>
					<ul>
						<li>Username: Numele folosit in momentul inregistrarii contului.</li>
						<li>Email: Adresa de email folosita la crearea contului</li>
					</ul>
						<!-- Utilizatorul isi poate schimba fotografia de profil din click stanga pe avatar si select o noua fotografie din computerul propriu -->
					<figure typeof="sa:image">
						<img src="../page/images/profile_view_information_guide.png" alt="informatii despre profil">
						<figcaption>Captura de ecran a spatiului rezervat pentru detalii cont.</figcaption>
					</figure>
				</section>


				<section id="user-change-data">
					<h3>5.3 Schimbare nume si parola</h3>
					<p>Pagina de profil faciliteaza utilizatorului optiunea de a-si schimba datele credentiale, prin completarea campurilor astfel:</p>
					<ul>
						<li>New username: Se va introduce noul nume de utilizator dorit.</li>
						<li>Old password: Se va introduce vechea parola pentru verificarea identitatii.</li>
						<li>New password: Parola noua ce se doreste a fi folosita in continuare.</li>
					</ul>
					<figure typeof="sa:image">
						<img src="../page/images/change_name_password_guide.png" alt="fereastra ce permite schimbarea username si password">
						<figcaption>Captura de ecran a spatiului rezervat pentru schimbarea datelor de cont.</figcaption>
					</figure>
				</section>

				<section id="auth-deauth">
					<h3>5.4 Adaugare sau eliminare Servicii</h3>
					<p>
						Pagina de profil faciliteaza utilizatorului optiunea de a asocia servicii de stocare in cloud precum Google Drive, Microsoft OneDrive si DropBox.
					</p>

					Pasi de urmat pentru a asocia un serviciu:
					<ol>
						<li>1. Pentru fiecare serviciu dorit in parte se va apasa click pe butonul Authorize</li>
						<li>2. Dupa aceasta veti fi redirectat catre pagina serviciului in care vi se cere acordul pentru a oferi accesul catre aplicatia Stol.</li>
						<li>3. In urma acordarii autorizarii, veti fi redirectat inapoi.</li>
					</ol>
					Pentru a revoca accesul la un serviciu din contul curent, se va folosi butonul "Unauthorize" in dreptul numelui serviciului dorit.
					<figure typeof="sa:image">
						<img src="../page/images/services_authentication_guide.png" alt="autorizarea serviciilor">
						<figcaption>Captura de ecran a spatiului rezervat pentru conectarea sau renuntarea la servicii.</figcaption>
					</figure>
				</section>

			</section>


			<section id="admin">
				<h2>6. Pagina de administrare a aplicatie</h2>

				<section id="admin-overview">
					<h3>6.1 Privire de ansamblu</h3>
					<p>
						Pagina de administrarea a aplicatiei permite administratorului sa vizualizeze informatii despre utilizatori precum numele, adresa de email, numarul de fisiere precum si ce servicii au autorizat. Administratorul poate de asemenea activa sau dezactiva global anumite servicii.
					</p>
					<figure typeof="sa:image">
						<img src="../page/images/admin_page_guide.png" alt="Admin page window">
						<figcaption>Captura de ecran a paginii de administrare a aplicatiei.</figcaption>
					</figure>
					<p>Principalele componente ale paginii de administrare a aplicatiei sunt:</p>
					<ul>
						<li>Tabelul cu date despre utilizatori</li>
						<li>Butonul pentru export date csv</li>
						<li>Panoul pentru activare/dezactivare servicii</li>
					</ul>
				</section>

				<section id="users_table_csv">
					<h3>6.2 Date despre utilizatori si export in format CSV</h3>
					<p>
						Tabelul din partea superioara a ferestrei permite administratorului sa vizualizeze informatii despre utilizatori precum numele, adresa de email, numarul de fisiere precum si ce servicii au autorizat.
					</p>
					<figure typeof="sa:image">
						<img src="../page/images/users_table_guide.png" alt="tabela cu utilizatori">
						<figcaption>Captura de ecran a tabelei cu utilizatori.</figcaption>
					</figure>
					<p>
						De asemenea butonul Export va porni descarcarea unui fisier in format cu CSV cu date despre utilizatori precum numele, email, numele fisierelor, id-uri, id-urile folderului care-l contine, pe ce serviciu e stocat, id-ul de acolo precum si dimensiunea fisierului.
					</p>
				</section>

				<section id="enabling_services">
					<h3>6.3 Dezactivarea sau permiterea unor servicii</h3>
					<p>
						In partea inferioara a ferestrei, administratorul poate sa vada ce servicii de stocare in cloud sunt permise si poate, eventual, sa le interzica.
					</p>
					<figure typeof="sa:image">
						<img src="../page/images/enable_disable_services.png" alt="tabela cu utilizatori">
						<figcaption>Captura de ecran a zonei rezervate permiterii sau interzicerii unor servicii de stocare in cloud.</figcaption>
					</figure>
					<p>
						Butonul Save va salva modificarile realizate.<br>
						Butonul Back va duce administratorul pe pagina anterioara.
					</p>
				</section>
			</section>

			<!-- sectiunea pt autori -->
			<section typeof="sa:AuthorsList">
				<h2>Authors</h2>
				<ul>
					<li typeof="sa:ContributorRole" property="schema:author" id="refAutor1">
						<span property="schema:author" typeof="schema:Person" resource="https://github.com/GeorgicaMarius">
							<meta property="schema:givenName" content="Marius">
							<meta property="schema:familyName" content="Georgica">
							<a href="https://github.com/GeorgicaMarius"><span property="schema:name">Georgica Marius</span></a>
						</span>
						<a href="#refFii" property="sa:roleAffiliation" resource="https://www.info.uaic.ro/">UAIC FII</a>
<!-- 						<ul>
							<li property="schema:roleContactPoint" typeof="schema:ContactPoint">
								<a href="mailto:ce@deUnde.com" property="schema:email">example@mail.com</a>
							</li>
						</ul> -->
					</li>
					<li typeof="sa:ContributorRole" property="schema:author" id="refAutor2">
						<span property="schema:author" typeof="schema:Person" resource="https://github.com/IonitaCatalin">
							<meta property="schema:givenName" content="Catalin">
							<meta property="schema:additionalName" content="Mihail">
							<meta property="schema:familyName" content="Ionita">
							<a href="https://github.com/IonitaCatalin"><span property="schema:name">Ionita Mihail Catalin</span></a>
						</span>
						<a href="#refFii" property="sa:roleAffiliation" resource="https://www.info.uaic.ro/">UAIC FII</a>
<!-- 						<ul>
							<li property="schema:roleContactPoint" typeof="schema:ContactPoint">
								<a href="mailto:ce@deUnde.com" property="schema:email">example@mail.com</a>
							</li>
						</ul> -->
					</li>
				</ul>
			</section>


			<!-- affiliations section -->
			<section typeof="sa:Affiliations">
				<h2>Affiliations</h2>
				<ul>
					<li id="refFii">
						<span typeof="schema:Organization" resource="https://www.info.uaic.ro/">
							<a href="https://www.info.uaic.ro/">
								<span property="schema:name">FII</span>
							</a>
							<span property="schema:parentOrganization">
								<span typeof="schema:Organization">
								<span property="schema:name">Facultatea de Informatica</span>
								—
								<span property="schema:location" typeof="schema:Place">
									<span property="schema:address" typeof="schema:PostalAddress">
										<span property="schema:addressLocality">Iasi</span>,
										<span property="schema:addressRegion">Iasi</span>,
										<span property="schema:addressCountry">Romania</span>
									</span>
								</span>
								</span>
							</span>
						</span>
					</li>
				</ul>
			</section>


			<!-- references section -->
			<section>
				<h2>References</h2>
				<ol>
					<li typeof="schema:WebPage" role="doc-biblioentry" resource="https://www.flaticon.com/" property="schema:citation" id="sursa-img-file"> 
						<cite property="schema:name">
							<a href="https://www.flaticon.com/free-icon/file_716961">File Icon</a>
						</cite>, by 
						<span property="schema:author" typeof="schema:Organization">
							<span property="schema:name">DinosoftLabs</span>
						</span>; published in <time property="schema:datePublished" datatype="xsd:gYear" datetime="2019">2019</time>
						<span property="schema:potentialAction" typeof="schema:ReadAction">
							<meta property="schema:actionStatus" content="CompletedActionStatus">
								(accessed on
							<time property="schema:endTime" datatype="xsd:date" datetime="2019-03-03">02 Mar 2020</time>)
						</span>.
					</li>
					<li typeof="schema:WebPage" role="doc-biblioentry" resource="https://www.flaticon.com/" property="schema:citation" id="sursa-img-folder"> 
						<cite property="schema:name">
							<a href="https://www.flaticon.com/free-icon/folder_716784?term=folder&page=5&position=73">Folder Icon</a>
						</cite>, by 
						<span property="schema:author" typeof="schema:Organization">
							<span property="schema:name">DinosoftLabs</span>
						</span>; published in <time property="schema:datePublished" datatype="xsd:gYear" datetime="2019">2019</time>
						<span property="schema:potentialAction" typeof="schema:ReadAction">
							<meta property="schema:actionStatus" content="CompletedActionStatus">
								(accessed on
							<time property="schema:endTime" datatype="xsd:date" datetime="2019-03-03">03 Mar 2020</time>)
						</span>.
					</li>
					<li typeof="schema:WebPage" role="doc-biblioentry" resource="https://remixicon.com/" property="schema:citation"> 
						<cite property="schema:name">
							<a href="https://remixicon.com/">REMIX ICON</a>
						</cite>, by 
						<span property="schema:author" typeof="schema:Organization">
							<span property="schema:name">Jimmy Cheung and Wendy Gao</span>
						</span>	<span property="schema:potentialAction" typeof="schema:ReadAction">
							<meta property="schema:actionStatus" content="CompletedActionStatus">
								(accessed on
							<time property="schema:endTime" datatype="xsd:date" datetime="2019-03-03">05 Mar 2020</time>)
						</span>.
					</li>
					<li typeof="schema:WebPage" role="doc-biblioentry" resource="https://github.com/" property="schema:citation"> 
						<cite property="schema:name">
							<a href="https://github.com/firebase/php-jwt">PHP JWT</a>
						</cite> published in <time property="schema:datePublished" datatype="xsd:gYear" datetime="2020">25 Mar 2020</time>
						<span property="schema:potentialAction" typeof="schema:ReadAction">
							<meta property="schema:actionStatus" content="CompletedActionStatus">
								(accessed on
							<time property="schema:endTime" datatype="xsd:date" datetime="2019-03-03">17 Apr 2020</time>)
						</span>.
					</li>
					<li typeof="schema:WebPage" role="doc-biblioentry" resource="https://phpunit.de/" property="schema:citation"> 
						<cite property="schema:name">
							<a href="https://phpunit.de/getting-started/phpunit-9.html">PHP Unit</a>
						</cite>, by 
						<span property="schema:author" typeof="schema:Organization">
							<span property="schema:name">Sebastian Bergmann</span>
						</span>; published in <time property="schema:datePublished" datatype="xsd:gYear" datetime="2020">7 Feb 2020</time>
						<span property="schema:potentialAction" typeof="schema:ReadAction">
							<meta property="schema:actionStatus" content="CompletedActionStatus">
								(accessed on
							<time property="schema:endTime" datatype="xsd:date" datetime="2019-03-03">3 May 2020</time>)
						</span>.
					</li>
				</ol>
			</section>

		</article>

		<footer>
			
		</footer>
	</body>
</html>