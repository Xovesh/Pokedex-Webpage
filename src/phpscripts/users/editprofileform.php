<?php
		session_start(); 
                include('./phpscripts/other/DbConfig.php');
                $mysqli = mysqli_connect($dbserver,$dbuser,$dbpass,$db);
                if(!$mysqli){
					die("Fallo al conectar con Mysql: ".mysqli_connect_error());
                }
                if (isset($_SESSION['user'])){
					//si se le pasa un user trabaja con este, solo si el user es admin
					if (isset($_REQUEST['user'])&& $_SESSION['privilege']=="admin"){
						$user=$_REQUEST['user'];
					}else{
						$user=$_SESSION['user'];
					}
					
					$sql = "SELECT * FROM user WHERE email=\"".$user."\";";
					$resultado = mysqli_query($mysqli,$sql,MYSQLI_USE_RESULT);
					if(!$resultado){
						die("Error: ".mysqli_error($mysqli));
					}
					$row = mysqli_fetch_array($resultado);
					
					$username  = $row['username'];
					$email     = $row['email'];
					$name      = $row['name'];
					$lastnames = $row['lastnames'];
					$birthdate = $row['birthdate'];
					$telephone = $row['telephone'];
					$gender    = $row['gender'];
					$country   = $row['country'];
					$city      = $row['city'];
					$address   = $row['address'];
					$pass      = $row['password'];
					//echo"$username $email $name $lastnames $birthdate $telephone $gender $country $city $address";
					echo('
					<form action="phpscripts/users/editprofile.php" method="post">
                    <h3>Información básica</h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="username">Nombre de usuario</label>
                                <input type="text" required class="form-control" name="username" id="username"
                                       placeholder="Introducir nombre de usuario" value="'.$username.'">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" required class="form-control" name="email" id="email"
                                       aria-describedby="emailHelp"
                                       placeholder="Introducir correo electronico" value="'.$email.'">
                                <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu correo
                                    electrónico con terceras personas
                                </small>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h3>Información opcional</h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" value="'.$name.'" id="name"
                                       placeholder="Introducir nombre">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="surname">Apellidos</label>
                                <input type="text" class="form-control" name="surname" value="'.$lastnames.'"
                                       id="surname"
                                       placeholder="Introducir apellidos">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="birthDate">Fecha de nacimiento</label>
                                <input class="form-control" type="date" id="birthDate" value="'.$birthdate.'"
                                       name="birthDate"
                                       placeholder="Fecha de nacimiento">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="phoneNumber">Número de teléfono</label>
                                <input type="tel" class="form-control" name="phoneNumber" value="'.$telephone.'"
                                       id="phoneNumber"
                                       placeholder="Introducir número de telefono">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="sex">Sexo</label>
                                <select class="form-control" name="sex" id="sex">
                                    <option');
									$genderSel="NO"; 
									if($gender=="Male"){$genderSel="YE";echo(" selected ");} 
										echo(' value="Male">Hombre</option>
                                    <option'); 
									if($gender=="Female"){$genderSel="YE";echo(" selected ");}
										echo(' value="Female">Mujer</option>
                                    <option'); 
									if($genderSel=="NO"){echo(" selected ");}
										echo(' value="$gender">Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
							
                                <label for="country">País de residencia</label>
                                <select class="form-control" name="country" id="country">');
					$countries =
 
array(
"AF" => "Afghanistan",
"AL" => "Albania",
"DZ" => "Algeria",
"AS" => "American Samoa",
"AD" => "Andorra",
"AO" => "Angola",
"AI" => "Anguilla",
"AQ" => "Antarctica",
"AG" => "Antigua and Barbuda",
"AR" => "Argentina",
"AM" => "Armenia",
"AW" => "Aruba",
"AU" => "Australia",
"AT" => "Austria",
"AZ" => "Azerbaijan",
"BS" => "Bahamas",
"BH" => "Bahrain",
"BD" => "Bangladesh",
"BB" => "Barbados",
"BY" => "Belarus",
"BE" => "Belgium",
"BZ" => "Belize",
"BJ" => "Benin",
"BM" => "Bermuda",
"BT" => "Bhutan",
"BO" => "Bolivia",
"BA" => "Bosnia and Herzegovina",
"BW" => "Botswana",
"BV" => "Bouvet Island",
"BR" => "Brazil",
"IO" => "British Indian Ocean Territory",
"BN" => "Brunei Darussalam",
"BG" => "Bulgaria",
"BF" => "Burkina Faso",
"BI" => "Burundi",
"KH" => "Cambodia",
"CM" => "Cameroon",
"CA" => "Canada",
"CV" => "Cape Verde",
"KY" => "Cayman Islands",
"CF" => "Central African Republic",
"TD" => "Chad",
"CL" => "Chile",
"CN" => "China",
"CX" => "Christmas Island",
"CC" => "Cocos (Keeling) Islands",
"CO" => "Colombia",
"KM" => "Comoros",
"CG" => "Congo",
"CD" => "Congo, the Democratic Republic of the",
"CK" => "Cook Islands",
"CR" => "Costa Rica",
"CI" => "Cote D'Ivoire",
"HR" => "Croatia",
"CU" => "Cuba",
"CY" => "Cyprus",
"CZ" => "Czech Republic",
"DK" => "Denmark",
"DJ" => "Djibouti",
"DM" => "Dominica",
"DO" => "Dominican Republic",
"EC" => "Ecuador",
"EG" => "Egypt",
"SV" => "El Salvador",
"GQ" => "Equatorial Guinea",
"ER" => "Eritrea",
"EE" => "Estonia",
"ET" => "Ethiopia",
"FK" => "Falkland Islands (Malvinas)",
"FO" => "Faroe Islands",
"FJ" => "Fiji",
"FI" => "Finland",
"FR" => "France",
"GF" => "French Guiana",
"PF" => "French Polynesia",
"TF" => "French Southern Territories",
"GA" => "Gabon",
"GM" => "Gambia",
"GE" => "Georgia",
"DE" => "Germany",
"GH" => "Ghana",
"GI" => "Gibraltar",
"GR" => "Greece",
"GL" => "Greenland",
"GD" => "Grenada",
"GP" => "Guadeloupe",
"GU" => "Guam",
"GT" => "Guatemala",
"GN" => "Guinea",
"GW" => "Guinea-Bissau",
"GY" => "Guyana",
"HT" => "Haiti",
"HM" => "Heard Island and Mcdonald Islands",
"VA" => "Holy See (Vatican City State)",
"HN" => "Honduras",
"HK" => "Hong Kong",
"HU" => "Hungary",
"IS" => "Iceland",
"IN" => "India",
"ID" => "Indonesia",
"IR" => "Iran, Islamic Republic of",
"IQ" => "Iraq",
"IE" => "Ireland",
"IL" => "Israel",
"IT" => "Italy",
"JM" => "Jamaica",
"JP" => "Japan",
"JO" => "Jordan",
"KZ" => "Kazakhstan",
"KE" => "Kenya",
"KI" => "Kiribati",
"KP" => "Korea, Democratic People's Republic of",
"KR" => "Korea, Republic of",
"KW" => "Kuwait",
"KG" => "Kyrgyzstan",
"LA" => "Lao People's Democratic Republic",
"LV" => "Latvia",
"LB" => "Lebanon",
"LS" => "Lesotho",
"LR" => "Liberia",
"LY" => "Libyan Arab Jamahiriya",
"LI" => "Liechtenstein",
"LT" => "Lithuania",
"LU" => "Luxembourg",
"MO" => "Macao",
"MK" => "Macedonia, the Former Yugoslav Republic of",
"MG" => "Madagascar",
"MW" => "Malawi",
"MY" => "Malaysia",
"MV" => "Maldives",
"ML" => "Mali",
"MT" => "Malta",
"MH" => "Marshall Islands",
"MQ" => "Martinique",
"MR" => "Mauritania",
"MU" => "Mauritius",
"YT" => "Mayotte",
"MX" => "Mexico",
"FM" => "Micronesia, Federated States of",
"MD" => "Moldova, Republic of",
"MC" => "Monaco",
"MN" => "Mongolia",
"MS" => "Montserrat",
"MA" => "Morocco",
"MZ" => "Mozambique",
"MM" => "Myanmar",
"NA" => "Namibia",
"NR" => "Nauru",
"NP" => "Nepal",
"NL" => "Netherlands",
"AN" => "Netherlands Antilles",
"NC" => "New Caledonia",
"NZ" => "New Zealand",
"NI" => "Nicaragua",
"NE" => "Niger",
"NG" => "Nigeria",
"NU" => "Niue",
"NF" => "Norfolk Island",
"MP" => "Northern Mariana Islands",
"NO" => "Norway",
"OM" => "Oman",
"PK" => "Pakistan",
"PW" => "Palau",
"PS" => "Palestinian Territory, Occupied",
"PA" => "Panama",
"PG" => "Papua New Guinea",
"PY" => "Paraguay",
"PE" => "Peru",
"PH" => "Philippines",
"PN" => "Pitcairn",
"PL" => "Poland",
"PT" => "Portugal",
"PR" => "Puerto Rico",
"QA" => "Qatar",
"RE" => "Reunion",
"RO" => "Romania",
"RU" => "Russian Federation",
"RW" => "Rwanda",
"SH" => "Saint Helena",
"KN" => "Saint Kitts and Nevis",
"LC" => "Saint Lucia",
"PM" => "Saint Pierre and Miquelon",
"VC" => "Saint Vincent and the Grenadines",
"WS" => "Samoa",
"SM" => "San Marino",
"ST" => "Sao Tome and Principe",
"SA" => "Saudi Arabia",
"SN" => "Senegal",
"CS" => "Serbia and Montenegro",
"SC" => "Seychelles",
"SL" => "Sierra Leone",
"SG" => "Singapore",
"SK" => "Slovakia",
"SI" => "Slovenia",
"SB" => "Solomon Islands",
"SO" => "Somalia",
"ZA" => "South Africa",
"GS" => "South Georgia and the South Sandwich Islands",
"ES" => "Spain",
"LK" => "Sri Lanka",
"SD" => "Sudan",
"SR" => "Suriname",
"SJ" => "Svalbard and Jan Mayen",
"SZ" => "Swaziland",
"SE" => "Sweden",
"CH" => "Switzerland",
"SY" => "Syrian Arab Republic",
"TW" => "Taiwan, Province of China",
"TJ" => "Tajikistan",
"TZ" => "Tanzania, United Republic of",
"TH" => "Thailand",
"TL" => "Timor-Leste",
"TG" => "Togo",
"TK" => "Tokelau",
"TO" => "Tonga",
"TT" => "Trinidad and Tobago",
"TN" => "Tunisia",
"TR" => "Turkey",
"TM" => "Turkmenistan",
"TC" => "Turks and Caicos Islands",
"TV" => "Tuvalu",
"UG" => "Uganda",
"UA" => "Ukraine",
"AE" => "United Arab Emirates",
"GB" => "United Kingdom",
"US" => "United States",
"UM" => "United States Minor Outlying Islands",
"UY" => "Uruguay",
"UZ" => "Uzbekistan",
"VU" => "Vanuatu",
"VE" => "Venezuela",
"VN" => "Viet Nam",
"VG" => "Virgin Islands, British",
"VI" => "Virgin Islands, U.s.",
"WF" => "Wallis and Futuna",
"EH" => "Western Sahara",
"YE" => "Yemen",
"ZM" => "Zambia",
"ZW" => "Zimbabwe"
);	
foreach ($countries as $key => $val){
	if ($key == $country){
        	echo('<option selected value="'.$key.'">'.$val.'</option>');
	}else{
		echo('<option value="'.$key.'">'.$val.'</option>');
	}

}
				echo('</select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="city">Ciudad</label>
                                <input type="text" class="form-control" name="city" value="'.$city.'" id="city"
                                       placeholder="Introducir nombre de la ciudad">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input type="text" class="form-control" name="address" value="'.$address.'" id="address"
                                       placeholder="Introducir dirección">
                            </div>
                        </div>
                    </div>
					<input type="hidden" name="user" id="user" value="'.$email.'">
                    <button type="reset" class="btn btn-danger">Restaurar campos</button>
                    <button type="submit" class="btn btn-primary">Actualizar perfil</button>
                </form>');
				}else{
    echo"<script> alert('No tienes suficientes privilegios para entrar aquí.');window.location.href='./login.php';</script>";  
    }
?>

	</div>
            <br>
            <div class="bg-light pad">
                <h3>Cambiar contraseña</h3>
                <form action="phpscripts/users/changepassword.php" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="old password">Contraseña antigua</label>
			<?php 
				echo"
                                <input type='password' class='form-control' name='oldpassword' id='oldpassword' ";
				if ($_SESSION['privilege']=="admin"){

					echo"value=$pass ";
				}
					
                                 echo "placeholder='Introducir contraseña antigua'>";
			?>
                            </div>
                        </div>
                        <div class="col-6">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="newpassword">Contraseña nueva</label>
                                <input type="password" class="form-control" id="newpassword" name="newpassword"
                                       placeholder="Contraseña nueva">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="newrepeatpassword">Repetir Contraseña</label>
                                <input type="password" class="form-control" id="newrepeatpassword"
                                       name="newrepeatpassword"
                                       placeholder="Repetir contraseña">
                            </div>
                        </div>
                    </div>
					<?php echo'<input type="hidden" name="user" id="user" value="'.$email.'">'; ?>
                    <button type="submit" class="btn btn-danger">Actualizar contraseña</button>
                </form>
            </div>
        </div>
