var ciudades = new Vue({
    el: '#ciudad',
    data: {
        paisSelect: '',
        departamentoSelect: '',
        municipioSelect: '',
        registroHotel:{
            nombre:'',
            dpto:'',
            direccion:'',
            numero:'',
            telefono:'',
        },
        //   todos  los paises
        paises: [
            { pais: "Afghanistan" }, { pais: "Albania" }, { pais: "Algeria" }, { pais: "American Samoa" }, { pais: "Andorra" },
            { pais: "Angola" },
            { pais: "Anguilla" }, { pais: "Antarctica" }, { pais: "Antigua and Barbuda" }, { pais: "Argentina" },
            { pais: "Armenia" }, { pais: "Aruba" },
            { pais: "Australia" }, { pais: "Austria" }, { pais: "Azerbaijan" }, { pais: "Bahamas" }, { pais: "Bahrain" },
            { pais: "Bangladesh" }, { pais: "Barbados" },
            { pais: "Belarus" }, { pais: "Belgium" }, { pais: "Belize" }, { pais: "Benin" }, { pais: "Bermuda" }, { pais: "Bhutan" },
            { pais: "Bolivia" },
            { pais: "Bosnia and Herzegowina" }, { pais: "Botswana" }, { pais: "Bouvet Island" }, { pais: "Brazil" },
            { pais: "British Indian Ocean Territory" }, { pais: "Brunei Darussalam" },
            { pais: "Bulgaria" }, { pais: "Burkina Faso" }, { pais: "Burundi" }, { pais: "Cambodia" },
            { pais: "Cameroon" }, { pais: "Canada" }, { pais: "Cape Verde" }, { pais: "Cayman Islands" },
            { pais: "Central African Republic" }, { pais: "Chad" }, { pais: "Chile" }, { pais: "China" },
            { pais: "Christmas Island" }, { pais: "Cocos (Keeling) Islands" }, { pais: "Colombia" },
            { pais: "Comoros" }, { pais: "Congo" }, { pais: "Congo, the Democratic Republic of the" },
            { pais: "Cook Islands" }, { pais: "Costa Rica" }, { pais: "Cote d'Ivoire" }, { pais: "Croatia (Hrvatska)" },
            { pais: "Cuba" }, { pais: "Cyprus" }, { pais: "Czech Republic" }, { pais: "Denmark" }, { pais: "Djibouti" },
            { pais: "Dominica" },
            { pais: "Dominican Republic" }, { pais: "East Timor" }, { pais: "Ecuador" }, { pais: "Egypt" }, { pais: "El Salvador" },
            { pais: "Equatorial Guinea" }, { pais: "Eritrea" }, { pais: "Estonia" }, { pais: "Ethiopia" },
            { pais: "Falkland Islands (Malvinas)" }, { pais: "Faroe Islands" }, { pais: "Fiji" }, { pais: "Finland" },
            { pais: "France" }, { pais: "France Metropolitan" }, { pais: "French Guiana" }, { pais: "French Polynesia" },
            { pais: "French Southern Territories" }, { pais: "Gabon" }, { pais: "Gambia" }, { pais: "Georgia" }, { pais: "Germany" },
            { pais: "Ghana" }, { pais: "Gibraltar" },
            { pais: "Greece" }, { pais: "Greenland" }, { pais: "Grenada" }, { pais: "Guadeloupe" }, { pais: "Guam" }, { pais: "Guatemala" },
            { pais: "Guinea" }, { pais: "Guinea-Bissau" },
            { pais: "Guyana" }, { pais: "Haiti" }, { pais: "Heard and Mc Donald Islands" }, { pais: "Holy See (Vatican City State)" },
            { pais: "Honduras" }, { pais: "Hong Kong" }, { pais: "Hungary" }, { pais: "Iceland" },
            { pais: "India" }, { pais: "Indonesia" }, { pais: "Iran (Islamic Republic of)" }, { pais: "Iraq" }, { pais: "Ireland" },
            { pais: "Israel" }, { pais: "Italy" }, { pais: "Jamaica" }, { pais: "Japan" }, { pais: "Jordan" }, { pais: "Kazakhstan" }, { pais: "Kenya" }, { pais: "Kiribati" }, { pais: "Korea, Democratic People's Republic of" },
            { pais: "Korea, Republic of" }, { pais: "Kuwait" }, { pais: "Kyrgyzstan" }, { pais: "Lao, People's Democratic Republic" },
            { pais: "Latvia" }, { pais: "Lebanon" }, { pais: "Lesotho" }, { pais: "Liberia" }, { pais: "Libyan Arab Jamahiriya" }, { pais: "Liechtenstein" },
            { pais: "Lithuania" }, { pais: "Luxembourg" }, { pais: "Macau" }, { pais: "Macedonia, The Former Yugoslav Republic of" },
            { pais: "Madagascar" },
            { pais: "Malawi" }, { pais: "Malaysia" }, { pais: "Maldives" }, { pais: "Mali" }, { pais: "Malta" }, { pais: "Marshall Islands" },
            { pais: "Martinique" }, { pais: "Mauritania" },
            { pais: "Mauritius" }, { pais: "Mayotte" }, { pais: "Mexico" }, { pais: "Micronesia, Federated States of" }, { pais: "Moldova, Republic of" },
            { pais: "Monaco" },
            { pais: "Mongolia" }, { pais: "Montserrat" }, { pais: "Morocco" }, { pais: "Mozambique" }, { pais: "Myanmar" }, { pais: "Namibia" },
            { pais: "Nauru" }, { pais: "Nepal" }, { pais: "Netherlands" },
            { pais: "Netherlands Antilles" }, { pais: "New Caledonia" }, { pais: "New Zealand" }, { pais: "Nicaragua" }, { pais: "Niger" },
            { pais: "Nigeria" }, { pais: "Niue" }, { pais: "Norfolk Island" },
            { pais: "Northern Mariana Islands" }, { pais: "Norway" }, { pais: "Oman" }, { pais: "Pakistan" }, { pais: "Palau" }, { pais: "Panama" }, { pais: "Papua New Guinea" }, { pais: "Paraguay" }, { pais: "Peru" },
            { pais: "Philippines" }, { pais: "Pitcairn" }, { pais: "Poland" }, { pais: "Portugal" }, { pais: "Puerto Rico" }, { pais: "Qatar" }, { pais: "Reunion" }, { pais: "Romania" }, { pais: "Russian Federation" },
            { pais: "Rwanda" }, { pais: "Saint Kitts and Nevis" }, { pais: "Saint Lucia" }, { pais: "Saint Vincent and the Grenadines" }, { pais: "Samoa" },
            { pais: "San Marino" }, { pais: "Sao Tome and Principe" },
            { pais: "Saudi Arabia" }, { pais: "Senegal" }, { pais: "Seychelles" }, { pais: "Sierra Leone" }, { pais: "Singapore" }, { pais: "Slovakia (Slovak Republic)" },
            { pais: "Slovenia" }, { pais: "Solomon Islands" }, { pais: "Somalia" },
            { pais: "South Africa" }, { pais: "South Georgia and the South Sandwich Islands" }, { pais: "Spain" }, { pais: "Sri Lanka" }, { pais: "St. Helena" },
            { pais: "St. Pierre and Miquelon" }, { pais: "Sudan" }, { pais: "Suriname" },
            { pais: "Svalbard and Jan Mayen Islands" }, { pais: "Swaziland" }, { pais: "Sweden" }, { pais: "Switzerland" }, { pais: "Syrian Arab Republic" },
            { pais: "Taiwan, Province of China" }, { pais: "Tajikistan" }, { pais: "Tanzania, United Republic of" },
            { pais: "Thailand" }, { pais: "Togo" }, { pais: "Tokelau" }, { pais: "Tonga" }, { pais: "Trinidad and Tobago" }, { pais: "Tunisia" }, { pais: "Turkey" }, { pais: "Turkmenistan" }, { pais: "Turks and Caicos Islands" }, { pais: "Tuvalu" }, { pais: "Uganda" }, { pais: "Ukraine" }, { pais: "United Arab Emirates" }, { pais: "United Kingdom" },
            { pais: "United States" }, { pais: "United States Minor Outlying Islands" }, { pais: "Uruguay" }, { pais: "Uzbekistan" }, { pais: "Vanuatu" }, { pais: "Venezuela" }, { pais: "Vietnam" }, { pais: "Virgin Islands (British)" }, { pais: "Virgin Islands (U.S.)" }, { pais: "Wallis and Futuna Islands" },
            { pais: "Western Sahara" }, { pais: "Yemen" }, { pais: "Yugoslavia" }, { pais: "Zambia" }, { pais: "Zimbabwe" }
        ],
        // departamentos de  colombia  
        departamentos: [
            { departamento: "Amazonas" }, { departamento: "Antioquia" }, { departamento: "Arauca" }, { departamento: "Atlántico" }, { departamento: "Bolívar" }, { departamento: "Boyacá" }, { departamento: "Caldas" }, { departamento: "Caquetá" }, { departamento: "Casanare" }, { departamento: "Cauca" },
            { departamento: "Cesar" }, { departamento: "Chocó" }, { departamento: "Córdoba" }, { departamento: "Cundinamarca" }, { departamento: "Guainía" },
            { departamento: "Guaviare" }, { departamento: "Huila" }, { departamento: "La Guajira" }, { departamento: "Magdalena" }, { departamento: "Meta" }, { departamento: "Nariño" }, { departamento: "Norte de Santander" }, { departamento: "Putumayo" }, { departamento: "Quindío" }, { departamento: "Risaralda" }, { departamento: "San Andrés y Providencia" },
            { departamento: "Santander" }, { departamento: "Sucre" }, { departamento: "Tolima" }, { departamento: "Valle del Cauca" }, { departamento: "Vaupés" }, { departamento: "Vichada" },
        ],
        // municipios de amazonas
        municipiosAmazonas: [
            { municipio: "El Encanto" },
            { municipio: "La Chorrera" }, { municipio: "La Pedrera" }, { municipio: "La Victoria" }, { municipio: "La Victoria" }, { municipio: "Puerto Alegría" },
            { municipio: "Puerto Arica" }, { municipio: "Puerto Nariño" }, { municipio: "Puerto Santander" }, { municipio: "Tarapacá" },
        ],
        //municipios de antioquia
        municipiosAntioquia: [
            { municipio: "Cáceres" }, { municipio: "Caucasia" }, { municipio: "El Bagre" }, { municipio: "Nechí" }, { municipio: "Tarazá" }, { municipio: "Zaragoza" }, { municipio: "Caracolí" }, { municipio: "Maceo" },
            { municipio: "Puerto Berrío" }, { municipio: "Puerto Nare" }, { municipio: "Puerto Triunfo" }, { municipio: "Yondó" }, { municipio: "Amalfi" }, { municipio: "Anorí" }, { municipio: "Cisneros" }, { municipio: "Remedios" },
            { municipio: "San Roque" }, { municipio: "Santo Domingo" }, { municipio: "Segovia" }, { municipio: "Vegachí" }, { municipio: "Yalí" }, { municipio: "Yolombó" }, { municipio: "Angostura" }, { municipio: "Belmira" },
            { municipio: "Briceño" }, { municipio: "Campamento" }, { municipio: "Carolina del Príncipe" }, { municipio: "Donmatías" }, { municipio: "Entrerríos" }, { municipio: "Gómez Plata" }, { municipio: "Guadalupe" }, { municipio: "Ituango" },
            { municipio: "San Andrés de Cuerquia" }, { municipio: "San José de la Montaña" }, { municipio: "San Pedro de los Milagros" }, { municipio: "Santa Rosa de Osos" }, { municipio: "Toledo" }, { municipio: "Valdivia" }, { municipio: "Yarumal" }, { municipio: "Abriaquí" },
            { municipio: "Antioquia" }, { municipio: "Anzá" }, { municipio: "Armenia" }, { municipio: "Buriticá" }, { municipio: "Caicedo" }, { municipio: "Cañasgordas" }, { municipio: "Dabeiba" }, { municipio: "Ebéjico" },
            { municipio: "Frontino" }, { municipio: "Giraldo" }, { municipio: "Heliconia" }, { municipio: "Liborina" }, { municipio: "Olaya" }, { municipio: "Peque" }, { municipio: "Sabanalarga" }, { municipio: "San Jerónimo" },
            { municipio: "Sopetrán" }, { municipio: "Uramita" }, { municipio: "Abejorral" }, { municipio: "Alejandría" }, { municipio: "Argelia" }, { municipio: "El Carmen de Viboral" }, { municipio: "Cocorná" }, { municipio: "Concepción" },
            { municipio: "El Peñol" }, { municipio: "El Retiro" }, { municipio: "El Santuario" }, { municipio: "Granada" }, { municipio: "Guarne" }, { municipio: "Guatapé" }, { municipio: "La Ceja" }, { municipio: "La Unión" },
            { municipio: "Marinilla" }, { municipio: "Nariño" }, { municipio: "Rionegro" }, { municipio: "San Carlos" }, { municipio: "San Francisco" }, { municipio: "San Luis" }, { municipio: "San Rafael" }, { municipio: "San Vicente" },
            { municipio: "Sonsón" }, { municipio: "Amagá" }, { municipio: "Andes" }, { municipio: "Angelópolis" }, { municipio: "Betania" }, { municipio: "Betulia" }, { municipio: "Caramanta" }, { municipio: "Ciudad Bolívar" },
            { municipio: "Concordia" }, { municipio: "Fredonia" }, { municipio: "Hispania" }, { municipio: "Jardín" }, { municipio: "Jericó" }, { municipio: "La Pintada" }, { municipio: "Montebello" }, { municipio: "Pueblorrico" },
            { municipio: "Salgar" }, { municipio: "Santa Bárbara" }, { municipio: "Támesis" }, { municipio: "Tarso" }, { municipio: "Titiribí" }, { municipio: "Urrao" }, { municipio: "Valparaíso" }, { municipio: "Venecia" },
            { municipio: "Apartadó" }, { municipio: "Arboletes" }, { municipio: "Carepa" }, { municipio: "Chigorodó" }, { municipio: "Murindó" }, { municipio: "Mutatá" }, { municipio: "Necoclí" }, { municipio: "San Juan de Urabá" },
            { municipio: "San Pedro de Urabá" }, { municipio: "Turbo" }, { municipio: "Vigía del Fuerte" }, { municipio: "Barbosa" }, { municipio: "Bello" }, { municipio: "Caldas" }, { municipio: "Copacabana" }, { municipio: "Envigado" },
            { municipio: "Girardota" }, { municipio: "Itagüí" }, { municipio: "La Estrella" }, { municipio: "Medellín" }, { municipio: "Sabaneta" },
        ],
        //municipios de arauca
        municipiosArauca: [
            { municipio: "Arauca" }, { municipio: "Arauquita" }, { municipio: "Cravo Norte" }, { municipio: "Fortul" }, { municipio: "Puerto Rondón" }, { municipio: "Saravena" }, { municipio: "Tame" },
        ],
        // municipios de Atlántico
        municipiosAtlántico: [
            { municipio: "Barranquilla" }, { municipio: "Baranoa" }, { municipio: "Campo de la Cruz" },
            { municipio: "Candelaria" }, { municipio: "Galapa" }, { municipio: "Juan de Acosta" }, { municipio: "Luruaco" },
            { municipio: "Malambo" }, { municipio: "Manatí" }, { municipio: "Palmar de Varela" },
            { municipio: "Piojó" }, { municipio: "Polonuevo" }, { municipio: "Ponedera" }, { municipio: "Puerto Colombia" }, { municipio: "Repelón" }, { municipio: "Sabanagrande" }, { municipio: "Sabanalarga" }, { municipio: "Santa Lucía" }, { municipio: "Santo Tomás" }, { municipio: "Soledad" }, { municipio: "Suán" }, { municipio: "Tubará" }, { municipio: "Usiacurí" },
        ],
        //municipios de bolivar
        municipiosBolivar: [
            { municipio: "Achí" }, { municipio: "Altos del Rosario" }, { municipio: "Arenal" }, { municipio: "Arjona" },
            { municipio: "Arroyohondo" }, { municipio: "Barranco de Loba" }, { municipio: "Calamar" }, { municipio: "Cantagallo" },
            { municipio: "El Carmen de Bolívar" }, { municipio: "Cartagena de Indias" }, { municipio: "Cicuco" }, { municipio: "Clemencia" },
            { municipio: "Córdoba" }, { municipio: "El Guamo" }, { municipio: "El Peñón" }, { municipio: "Hatillo de Loba" },
            { municipio: "Magangué" }, { municipio: "Mahates" }, { municipio: "Margarita" },
            { municipio: "María La Baja" }, { municipio: "Montecristo" }, { municipio: "Morales" }, { municipio: "Pinillos" },
            { municipio: "Regidor" }, { municipio: "Río Viejo" }, { municipio: "San Cristóbal" }, { municipio: "San Estanislao" },
            { municipio: "San Fernando" }, { municipio: "San Jacinto" }, { municipio: "San Jacinto del Cauca" }, { municipio: "San Juan Nepomuceno" },
            { municipio: "San Martín de Loba" }, { municipio: "San Pablo" }, { municipio: "Santa Catalina" }, { municipio: "Santa Cruz de Mompox" },
            { municipio: "Santa Rosa" }, { municipio: "Santa Rosa del Sur" }, { municipio: "Simití" }, { municipio: "Soplaviento" },
            { municipio: "Talaigua Nuevo" }, { municipio: "Tiquisio" }, { municipio: "Turbaco" }, { municipio: "Turbaná" },
            { municipio: "Villanueva" }, { municipio: "Zambrano" },
        ],

        //municipios de Boyaca
        municipiosBoyacá: [
            { municipio: "Tunja" }, { municipio: "Chíquiza" }, { municipio: "Chivatá" }, { municipio: "Cómbita" }, { municipio: "Cucaita" }, { municipio: "Motavita" }, { municipio: "Oicatá" },
            { municipio: "Samacá" }, { municipio: "Siachoque" }, { municipio: "Sora" }, { municipio: "Soracá" }, { municipio: "Sotaquirá" }, { municipio: "Toca" }, { municipio: "Tuta" }, { municipio: "Ventaquemada" },
            { municipio: "Chiscas" }, { municipio: "El cocuy" }, { municipio: "El espino" }, { municipio: "Guacamayas" }, { municipio: "Güicán" }, { municipio: "Panqueba" }, { municipio: "Berbeo" }, { municipio: "Campo hermoso" },
            { municipio: "Miraflores" }, { municipio: "Páez" }, { municipio: "San Eduardo" }, { municipio: "Zetaquira" }, { municipio: "Boyacá" }, { municipio: "Ciénega" }, { municipio: "Jenesano" }, { municipio: "Nuevo Colón" },
            { municipio: "Ramiquirí" }, { municipio: "Rondón" }, { municipio: "Tibaná" }, { municipio: "Turmequé" }, { municipio: "Úmbita" }, { municipio: "Viracachá" }, { municipio: "Chinavita" }, { municipio: "Garagoa" },
            { municipio: "Macanal" }, { municipio: "Pachavita" }, { municipio: "San Luis de Gaceno" }, { municipio: "Santa María" },
            { municipio: "Boavita" }, { municipio: "Covarachía" }, { municipio: "La Uvita" }, { municipio: "San Mateo" }, { municipio: "Sativanorte" }, { municipio: "Sativasur" }, { municipio: "Soatá" }, { municipio: "Susacón" },
            { municipio: "Tipacoque" }, { municipio: "Briceño" }, { municipio: "Buenavista" }, { municipio: "Caldas" }, { municipio: "Chiquinquirá" }, { municipio: "Coper" }, { municipio: "La victoria" }, { municipio: "Maripí" },
            { municipio: "Muzo" }, { municipio: "Otanche" }, { municipio: "Pauna" }, { municipio: "Quípama" }, { municipio: "Saboyá" }, { municipio: "San Miguel de Sema" }, { municipio: "San Pablo de Borbur" }, { municipio: "Tununguá" }, { municipio: "Almeida" },
            { municipio: "Chivor" }, { municipio: "Guateque" }, { municipio: "Guayatá" }, { municipio: "La capilla" }, { municipio: "Somondoco" }, { municipio: "Sutatenza" }, { municipio: "Tenza" }, { municipio: "Arcabuco" },
            { municipio: "Chitaraque" }, { municipio: "Gachantivá" }, { municipio: "Moniquirá" }, { municipio: "Ráquira" }, { municipio: "Sáchica" }, { municipio: "San Jose de Pare" }, { municipio: "Santa Sofía" }, { municipio: "Santana" },
            { municipio: "Sutamarchán" }, { municipio: "Tijancá" }, { municipio: "Togüí" }, { municipio: "Villa de Leyva" }, { municipio: "Aquitania" }, { municipio: "Cuítiva" }, { municipio: "Firavitoba" }, { municipio: "Gámeza" },
            { municipio: "Iza" }, { municipio: "Mongua" }, { municipio: "Monguí" }, { municipio: "Nobsa" }, { municipio: "Pesca" }, { municipio: "Sogamoso" }, { municipio: "Tibasosa" }, { municipio: "Tópaga" },
            { municipio: "Tota" }, { municipio: "Belén" }, { municipio: "Busbanzá" }, { municipio: "Cerinza" }, { municipio: "Corrales" }, { municipio: "Duitama" }, { municipio: "Floresta" }, { municipio: "Paipa" },
            { municipio: "Santa Rosa de Viterbo" }, { municipio: "Tutazá" }, { municipio: "Betéitiva" }, { municipio: "Chita" }, { municipio: "Jericó" }, { municipio: "Paz de Río" }, { municipio: "Socha" }, { municipio: "Socotá" }, { municipio: "Tasco" }, { municipio: "Cubará" }, { municipio: "Puerto Boyacá" },

        ],
        // municipio de Caldas
        municipiosCaldas: [
            { municipio: "Manizales" }, { municipio: "Chinchiná" }, { municipio: "Neira" }, { municipio: "Palestina" },
            { municipio: "Villamaría" }, { municipio: "Filadelfia" }, { municipio: "La Merced" }, { municipio: "Marmato" },
            { municipio: "Riosucio" }, { municipio: "Supía" }, { municipio: "Manzanares" }, { municipio: "Marquetalia" },
            { municipio: "Marulanda" }, { municipio: "Pensilvania" }, { municipio: "Anserma" }, { municipio: "Belalcazár" },
            { municipio: "Risaralda" }, { municipio: "San José" }, { municipio: "Viterbo" }, { municipio: "La Dorada" },
            { municipio: "Norcasia" }, { municipio: "Samaná" }, { municipio: "Victoria" }, { municipio: "Aguadas" },
            { municipio: "Aranzazu" }, { municipio: "Pácora" },
            { municipio: "Salamina" },
        ],
        //municipios de Caqueta
        municipiosCaquetá: [
            { municipio: "Inspección de Berlín" }, { municipio: "Inspeccion de Maguare" }, { municipio: "Inspección de Peñas Negras" }, { municipio: "Inspección de Puerto Hungría" },
            { municipio: "Inspección de Puerto Manrique" }, { municipio: "La aguililla" }, { municipio: "La esmeralda" }, { municipio: "La paz" },
            { municipio: "Lusitania" }, { municipio: "Rionegro" }, { municipio: "Santana Ramos" }, { municipio: "Fraquita" },
            { municipio: "Puerto bello" }, { municipio: "Yurayaco" }, { municipio: "Zabaleta" }, { municipio: "Araracuara" },
            { municipio: "Campo alegre" }, { municipio: "Coemani" }, { municipio: "La Mana" }, { municipio: "Mononguete" },
            { municipio: "Peñas blancas" }, { municipio: "Puerto tejada" },
        ],
        // muncipios de Casanare
        municipiosCasanare: [
            { municipio: "Yopal" }, { municipio: "Aguazul" }, { municipio: "Chámeza" }, { municipio: "Hato Corozal" },
            { municipio: "La Salina" }, { municipio: "Maní" }, { municipio: "Monterrey" }, { municipio: "Nunchía" },
            { municipio: "Orocué" }, { municipio: "Paz de Ariporo" }, { municipio: "Pore" }, { municipio: "Recetor" },
            { municipio: "Sabanalarga" }, { municipio: "Sácama" }, { municipio: "San Luis de Palenque" }, { municipio: "Támara" },
            { municipio: "Tauramena" }, { municipio: "Trinidad" }, { municipio: "Villanueva" },

        ],
        // mucicipios de cauca
        municipiosCauca: [
            { municipio: "Popayán" }, { municipio: "Cajibío" }, { municipio: "El tambo" },
            { municipio: "La Sierra" }, { municipio: "Morales" }, { municipio: "Piendamó" }, { municipio: "Rosas" },
            { municipio: "Soatá" }, { municipio: "Timbío" }, { municipio: "Buenos aires" }, { municipio: "Caloto" },
            { municipio: "Corintio" }, { municipio: "Guachené" }, { municipio: "Miranda" }, { municipio: "Padilla" },
            { municipio: "Puerto Tejada" }, { municipio: "Santander de Quilichao" }, { municipio: "Suárez" }, { municipio: "Villa rica" },
            { municipio: "Almaguer" }, { municipio: "Argelia" }, { municipio: "Balboa" }, { municipio: "Bolívar" },
            { municipio: "Florencia" }, { municipio: "La vega" }, { municipio: "Mercaderes" }, { municipio: "Patía" },
            { municipio: "Piamonte" }, { municipio: "San Sebastián" }, { municipio: "Santa Rosa" }, { municipio: "Sucre" },
            { municipio: "Guapí" }, { municipio: "López de micay" }, { municipio: "Timbiquí" }, { municipio: "Caldono" },
            { municipio: "Inzá" }, { municipio: "Jambaló" }, { municipio: "Páez" }, { municipio: "Puracé" },
            { municipio: "Silvia" }, { municipio: "Toribío" }, { municipio: "Torotó" },
        ],
        // municipios de cesar
        municipiosCesar: [
            { municipio: "Valledupar" }, { municipio: "Aguachica" }, { municipio: "Agustín Codazzi" }, { municipio: "Bosconia" },
            { municipio: "Chimichagua" }, { municipio: "El Copey" }, { municipio: "San Alberto" }, { municipio: "Curumaní" },
            { municipio: "El Paso" }, { municipio: "La Paz Robles" }, { municipio: "Pueblobello" }, { municipio: "La Jagua de Ibirico" },
            { municipio: "Chiriguaná" }, { municipio: "Astrea" }, { municipio: "San Martin" }, { municipio: "Pelaya" },
            { municipio: "Pailitas" }, { municipio: "Gamarra" }, { municipio: "Manaure" }, { municipio: "Río de Oro" },
            { municipio: "Tamalameque" }, { municipio: "Becerril" }, { municipio: "San Diego" }, { municipio: "La Gloria" },
            { municipio: "González" },
        ],
        // municipios de choco
        municipiosChocó: [
            { municipio: "Quibdó" }, { municipio: "Acandí" }, { municipio: "Alto Baudó" }, { municipio: "Atrato" },
            { municipio: "Bagadó" }, { municipio: "Bahía Solano" }, { municipio: "Bajo Baudó" }, { municipio: "Bojayá" },
            { municipio: "Cértegui" }, { municipio: "Condoto" }, { municipio: "El Cantón de San Pablo" }, { municipio: "El Carmen de Atrato" },
            { municipio: "El Carmen del Darién" }, { municipio: "Litoral del San Juan" }, { municipio: "Istmina" }, { municipio: "Juradó" }, { municipio: "Lloró" },
            { municipio: "Medio Atrato" }, { municipio: "Medio Baudó" }, { municipio: "Medio San Juan" }, { municipio: "Nóvita" },
            { municipio: "Nuquí" }, { municipio: "Río Iró" }, { municipio: "Río Quito" }, { municipio: "Riosucio" },
            { municipio: "San José del Palmar" }, { municipio: "Sipí" }, { municipio: "Tadó" }, { municipio: "Unguía" },
            { municipio: "Unión Panamericana" },
        ],
        //municipio de Córdoba
        municipiosCórdoba: [
            { municipio: "Montería" }, { municipio: "Ayapel" }, { municipio: "Buenavista" }, { municipio: "Canalete" },
            { municipio: "Cereté" }, { municipio: "Chimá" }, { municipio: "Chinú" }, { municipio: "Ciénaga de Oro" },
            { municipio: "Cotorra" }, { municipio: "La Apartada" }, { municipio: "Los Córdobas" }, { municipio: "Momil" },
            { municipio: "Montelíbano" }, { municipio: "Moñitos" }, { municipio: "Planeta Rica" }, { municipio: "Pueblo Nuevo" }, { municipio: "Puerto Escondido" }, { municipio: "Puerto Libertador" },
            { municipio: "Purísima" }, { municipio: "Sahagún" }, { municipio: "San Andrés de Sotavento" }, { municipio: "San Antero" },
            { municipio: "San Bernardo del Viento" }, { municipio: "San Carlos" }, { municipio: "San José de Uré" }, { municipio: "San Pelayo" },
            { municipio: "Santa Cruz de Lorica" }, { municipio: "Tierralta" }, { municipio: "Tuchín" }, { municipio: "Valencia" },
        ],
        //municipios  de  Cundinamarca
        municipiosCundinamarca: [

            { municipio: "Bogota" }, { municipio: "Chocontá" }, { municipio: "Machetá" }, { municipio: "Manta" }, { municipio: "Sesquilé" }, { municipio: "Suesca" }, { municipio: "Tibirita" }, { municipio: "Villapinzón" },
            { municipio: "Agua de Dios" }, { municipio: "Girardot" }, { municipio: "Guataquí" }, { municipio: "Jerusalén" }, { municipio: "Nariño" }, { municipio: "Nilo" }, { municipio: "Ricaurte" }, { municipio: "Tocaima" },
            { municipio: "Caparrapí" }, { municipio: "Guaduas" }, { municipio: "Puerto Salgar" }, { municipio: "Albán" }, { municipio: "La Peña" }, { municipio: "La Vega" }, { municipio: "Nimaima" }, { municipio: "Nocaima" },
            { municipio: "Quebradanegra" }, { municipio: "San Francisco" }, { municipio: "Sasaima" }, { municipio: "Supatá" }, { municipio: "Útica" }, { municipio: "Vergara" }, { municipio: "Villeta" }, { municipio: "Gachalá" },
            { municipio: "Gachetá" }, { municipio: "Gama" }, { municipio: "Guasca" }, { municipio: "Guatavita" }, { municipio: "Junín" }, { municipio: "La Calera" }, { municipio: "Ubalá" }, { municipio: "Beltrán" },
            { municipio: "Bituima" }, { municipio: "Chaguaní" }, { municipio: "Guayabal de Síquima" }, { municipio: "Pulí" }, { municipio: "San Juan de Rioseco" }, { municipio: "Vianí" }, { municipio: "Medina" }, { municipio: "Paratebueno" },
            { municipio: "Cáqueza" }, { municipio: "Chipaque" }, { municipio: "Choachí" }, { municipio: "Fómeque" }, { municipio: "Fosca" }, { municipio: "Guayabetal" }, { municipio: "Gutiérrez" }, { municipio: "Quetame" },
            { municipio: "Ubaque" }, { municipio: "Une" }, { municipio: "El peñón" }, { municipio: "La palma" }, { municipio: "Pacho" }, { municipio: "Paime" }, { municipio: "San Cayetano" }, { municipio: "Toaipí" }, { municipio: "Villagómez" },
            { municipio: "Yacopí" }, { municipio: "Cajicá" }, { municipio: "Chía" }, { municipio: "Cota" }, { municipio: "Cogua" }, { municipio: "Gachancipá" }, { municipio: "Nemocón" }, { municipio: "Sopó" },
            { municipio: "Tabio" }, { municipio: "Tenjo" }, { municipio: "Tocancipá" }, { municipio: "Zipaquirá" }, { municipio: "Bojacá" }, { municipio: "El Rosal" }, { municipio: "Facatativá" }, { municipio: "Funza" },
            { municipio: "Madrid" }, { municipio: "Mosquera" }, { municipio: "Subachoque" }, { municipio: "Zipacón" }, { municipio: "Sibaté" }, { municipio: "Soacha" }, { municipio: "Arbeláez" }, { municipio: "Cabrera" },
            { municipio: "Fusagasugá" }, { municipio: "Granada" }, { municipio: "Pandi" }, { municipio: "Pasca" }, { municipio: "San Bernardo" }, { municipio: "Silvania" }, { municipio: "Tibacuy" }, { municipio: "Anapoima" },
            { municipio: "Analaima" }, { municipio: "Cachipay" }, { municipio: "El colegio" }, { municipio: "La mesa" }, { municipio: "Quipile" }, { municipio: "San Antonio del Tequendama" }, { municipio: "Tena" }, { municipio: "Viotá" },
            { municipio: "Carmen de Carupa" }, { municipio: "Cucunubá" }, { municipio: "Fúneque" }, { municipio: "Guachetá" }, { municipio: "Lenguazaque" },
            { municipio: "Simijaca" }, { municipio: "Susa" }, { municipio: "Sutatausa" }, { municipio: "Tausa" }, { municipio: "Ubaté" },

        ],
        //municipios de Guainia
        municipiosGuainia: [
            { municipio: "Inirida" }, { municipio: "Barrancominas" }, { municipio: "Cacahual" }, { municipio: "La Guadalupe" },
            { municipio: "Mapiripana" }, { municipio: "Morichal Nuevo" }, { municipio: "Pana Pana" }, { municipio: "Puerto Colombia" },
            { municipio: "San Felipe" },
        ],
        //municipios de Guaviare
        municipiosGuaviare: [
            { municipio: "San José del Guaviare" }, { municipio: "Calamar" },
            { municipio: "El Retorno" },{ municipio: "Miraflores" },
            { municipio: "Morichal" },{ municipio: "El Capricho" },
            { municipio: "Charras-Boqueron" },
        ],
 
        
        //municipios de Huila
        municipiosHuila: [
            { municipio: "Neiva" }, { municipio: "Aipe" }, { municipio: "Algeciras" }, { municipio: "Baraya" },
            { municipio: "Campoalegre" }, { municipio: "Colombia" }, { municipio: "Hobo" }, { municipio: "Íquira" },
            { municipio: "Palermo" }, { municipio: "Rivera" }, { municipio: "Santa María" }, { municipio: "Tello" },
            { municipio: "Teruel" }, { municipio: "Villavieja" }, { municipio: "Yaguará" },
            { municipio: "Agrado" }, { municipio: "Altamira" }, { municipio: "Garzón" }, { municipio: "Gigante" },
            { municipio: "Guadalupe" }, { municipio: "Pital" }, { municipio: "Suaza" }, { municipio: "Tarqui" },
            { municipio: "La Argentina" }, { municipio: "La Plata" }, { municipio: "Nátaga" }, { municipio: "Paicol" },
            { municipio: "Tesalia" }, { municipio: "Acevedo" }, { municipio: "Elías" },
            { municipio: "Isnos" }, { municipio: "Oporapa" }, { municipio: "Palestina" }, { municipio: "Pitalito" },
            { municipio: "Saladoblanco" }, { municipio: "San Agustín" }, { municipio: "Timaná" },

        ],
        //municipios de La Guajira
        municipiosLaGuajira: [
            { municipio: "Riohacha" }, { municipio: "Albania" }, { municipio: "Barrancas" }, { municipio: "Dibulla" },
            { municipio: "Distracción" }, { municipio: "El Molino" }, { municipio: "Fonseca" }, { municipio: "Hatonuevo" },
            { municipio: "La Jaguar del Pilar" }, { municipio: "Maicao" }, { municipio: "Manaure" }, { municipio: "San Juan del César" },
            { municipio: "Uribia" }, { municipio: "Urumita" }, { municipio: "Villanueva" }, { municipio: "Morichal" },
            { municipio: "Barbacoas" }, { municipio: "Camarones" }, { municipio: "Matitas" }, { municipio: "Monguí" },
            { municipio: "Tomarrazón" }, { municipio: "Cuestecita" }, { municipio: "Los Remedios" }, { municipio: "Ware Waren" },
            { municipio: "Carretalito" }, { municipio: "Guayacanal" }, { municipio: "Oreganal" }, { municipio: "Papayal" },
            { municipio: "Pozohondo" }, { municipio: "San Pedro" }, { municipio: "Buena vista" }, { municipio: "Chorreras" },
            { municipio: "La Duda" }, { municipio: "Los Hornitos" }, { municipio: "Conejo" }, { municipio: "El Hatico" },
            { municipio: "Sitionuevo" }, { municipio: "El Plan" }, { municipio: "Aremasain" }, { municipio: "El Pájaro" },
            { municipio: "La Gloria" }, { municipio: "La Paz" }, { municipio: "Manzana" }, { municipio: "Mayapo" }, { municipio: "Musichi" },
            { municipio: "San Antonio de Pacho" }, { municipio: "Shiruria" }, { municipio: "Cañaverales" }, { municipio: "Caracoli" },
            { municipio: "Corral de piedras" }, { municipio: "El Totumo" }, { municipio: "Guayacanal" }, { municipio: "La junta" },
            { municipio: "La Peña" }, { municipio: "Los Haticos" }, { municipio: "Los Pondores" }, { municipio: "Villa del río" },
            { municipio: "Bahía Honda" }, { municipio: "Puerto  Estrella" }, { municipio: "Punta Gallinas" },
        ],
        //municipios de Magdalena
        municipiosMagdalena: [
            { municipio: "Santa Marta" }, { municipio: "Algarrobo" }, { municipio: "Aracataca" }, { municipio: "Ariguaní" },
            { municipio: "Cerro de San Antonio" }, { municipio: "Chibolo" }, { municipio: "Ciénaga" }, { municipio: "Concordia" },
            { municipio: "El Banco" }, { municipio: "El Piñon" }, { municipio: "El Retén" }, { municipio: "Fundación" },
            { municipio: "Guamal" }, { municipio: "Nueva Granada" }, { municipio: "Pedraza" }, { municipio: "Pijino del Carmen" },
            { municipio: "Pivijai" }, { municipio: "Plato" }, { municipio: "Pueblo viejo" }, { municipio: "Remolino" },
            { municipio: "Sabanas de San Ángel" }, { municipio: "Salamina" }, { municipio: "San Sebastián de Buenavista" }, { municipio: "Santa Ana" },
            { municipio: "Santa Bárbara de Pinto" }, { municipio: "San Zenón" }, { municipio: "Sitionuevo" }, { municipio: "Tenerife" },
            { municipio: "Zapayán" }, { municipio: "Zona Bananera" },
        ],
        //municipios de  Meta
        municipiosMeta: [

            { municipio: "Villavicencio " },
            { municipio: "Acacías" },
            { municipio: "Barranca de Upía" },
            { municipio: "Castilla La Nueva" },
            { municipio: "Cubarral" },
            { municipio: "Cumaral" },
            { municipio: "El Calvario" },
            { municipio: "Guamal" },
            { municipio: "Restrepo" },
            { municipio: "San Carlos de Guaroa" },
            { municipio: "San Juanito" },
            { municipio: "San Martín" },


            { municipio: "Cabuyaro" },
            { municipio: "Puerto Gaitán" },
            { municipio: "Puerto López" },

            { municipio: "El Castillo" },
            { municipio: "El Dorado" },
            { municipio: "Fuente de Oro" },
            { municipio: "Granada" },
            { municipio: "La Macarena" },
            { municipio: "La Uribe" },
            { municipio: "Lejanías" },
            { municipio: "Mapiripan" },
            { municipio: "Mesetas" },
            { municipio: "Puerto Concordia" },
            { municipio: "Puerto Lleras" },
            { municipio: "Puerto Rico" },
            { municipio: "San Juan de Arama" },
            { municipio: "Vista hermosa" },
        ],
        //municipios de Nariño
        municipiosNariño: [
            { municipio: "Pasto" },
            { municipio: "Buesaco" },
            { municipio: "Chachagüí" },
            { municipio: "Consacá" },
            { municipio: "El Peñol" },
            { municipio: "El Tambo" },
            { municipio: "La Florida" },
            { municipio: "Nariño" },
            { municipio: "Sandoná" },
            { municipio: "Tangua" },
            { municipio: "Yacuanquer" },

            { municipio: "Barbacoas" },
            { municipio: "El Charco" },
            { municipio: "Francisco Pizarro" },
            { municipio: "La Tola" },
            { municipio: "Magüí" },
            { municipio: "Mosquera" },
            { municipio: "Olaya Herrera" },
            { municipio: "Roberto Payán" },
            { municipio: "Santa Bárbara" },
            { municipio: "Tumaco" },





            { municipio: "Aldana" },
            { municipio: "Contadero" },
            { municipio: "Córdoba" },
            { municipio: "Cuaspud" },
            { municipio: "Cumbal" },
            { municipio: "Funes" },
            { municipio: "Guachucal" },
            { municipio: "Gualmatán" },
            { municipio: "Iles" },
            { municipio: "Ipiales" },
            { municipio: "Potosí" },
            { municipio: "Puerres" },
            { municipio: "Pupiales" },

            { municipio: "Albán" },
            { municipio: "Arboleda" },
            { municipio: "Belén" },
            { municipio: "Colón" },
            { municipio: "El Rosario" },
            { municipio: "El Tablón de Gómez" },
            { municipio: "La Cruz" },
            { municipio: "La Unión" },
            { municipio: "Leiva" },
            { municipio: "Policarpa" },
            { municipio: "San Bernardo" },
            { municipio: "San Lorenzo" },
            { municipio: "San Pablo" },
            { municipio: "San Pedro de Cartago" },
            { municipio: "Taminango" },


            { municipio: "Ancuyá" },
            { municipio: "Cumbitara" },
            { municipio: "Guaitarilla" },
            { municipio: "Imués" },
            { municipio: "La Llanada" },
            { municipio: "Linares" },
            { municipio: "Los Andes" },
            { municipio: "Mallama" },
            { municipio: "Ospina" },
            { municipio: "Providencia" },
            { municipio: "Ricaurte" },
            { municipio: "Samaniego" },
            { municipio: "Santacruz" },
            { municipio: "Sapuyes" },
            { municipio: "Túquerres" },

        ],
        //municipios de Norte de Santander
        municipiosNortedeSantander: [
            { municipio: "Cúcuta" },
            { municipio: "El Zulia" },
            { municipio: "Los Patios" },
            { municipio: "Puerto Santander" },
            { municipio: "San Cayetano" },
            { municipio: "Villa del Rosario" },

            { municipio: "Bucarasica" },
            { municipio: "El Tarra" },
            { municipio: "Sardinata" },
            { municipio: "Tibú" },

            { municipio: "Arboledas" },
            { municipio: "Cucutilla" },
            { municipio: "Gramalote" },
            { municipio: "Lourdes" },
            { municipio: "Salazar de las Palmas" },
            { municipio: "Santiago" },
            { municipio: "Villa Caro" },

            { municipio: "Ábrego" },
            { municipio: "Cáchira" },
            { municipio: "Convención" },
            { municipio: "El Carmén" },
            { municipio: "Hacarí" },
            { municipio: "La Esperanza" },
            { municipio: "La Playa de Belén" },
            { municipio: "Ocaña" },
            { municipio: "San Calixto" },
            { municipio: "Teorama" },

            { municipio: "Cácota" },
            { municipio: "Chitagá" },
            { municipio: "Mutiscua" },
            { municipio: "Pamplona" },
            { municipio: "Pamplonita" },
            { municipio: "Santo Domingo de Silos" },

            { municipio: "Bochalema" },
            { municipio: "Chinácota" },
            { municipio: "Durania" },
            { municipio: "Herrán" },
            { municipio: "Labateca" },
            { municipio: "Ragonvalia" },
            { municipio: "Toledo" },
        ],

        //municipios de Putumayo
        municipiosPutumayo: [
            { municipio: "Mocoa" },

            { municipio: "Colón" },

            { municipio: "Orito" },

            { municipio: "Puerto Asís" },

            { municipio: "Puerto Caicedo" },

            { municipio: "Puerto Guzmán" },

            { municipio: "Puerto Leguízamo" },

            { municipio: "San Francisco" },

            { municipio: "San Miguel" },

            { municipio: "Santiago" },

            { municipio: "Sibundoy" },

            { municipio: "Valle del Guamuez" },

            { municipio: "Villagarzón" },
        ],

        //municipios de  Quindio
        municipiosQuindio: [

            { municipio: "Armenia" },
            { municipio: "Buenavista" },
            { municipio: "Calarcá" },
            { municipio: "Circasia" },
            { municipio: "Córdoba" },
            { municipio: "Finlandia" },
            { municipio: "Génova" },
            { municipio: "La Tebaida" },
            { municipio: "Montenegro" },
            { municipio: "Pijao" },
            { municipio: "Quimbaya" },
            { municipio: "Salento" },
            { municipio: "Corregimientos" },
            { municipio: "Rio verde" },
            { municipio: "La india" },
            { municipio: "Centro poblado la Silvia" },
        ],
        //munnicipios de Risaralda
        municipiosRisaralda: [
            { municipio: "Pereira" }, { municipio: "Apía" }, { municipio: "Balboa" }, { municipio: "Belén de Umbría" },
            { municipio: "Dosquebradas" }, { municipio: "Guática" }, { municipio: "La Celia" }, { municipio: "La Virginia" },
            { municipio: "Marsella" }, { municipio: "Mistrató" }, { municipio: "Pueblo Rico" }, { municipio: "Quinchía" },
            { municipio: "Santa Rosa de Cabal" }, { municipio: "Santuario" },

        ],

        //municipios  de  San Andres y Providencia
        municipiosSanAndrésyProvidencia: [
            { municipio: "San Andres" },
            { municipio: "Providencia y Santa Calina Islas" },
        ],
        // municipios  de  santander
        municipiosSantander: [
            { municipio: "Aguada" }, { municipio: "Albania" }, { municipio: "Aratoca" }, { municipio: "Barbosa" }, { municipio: "Barichara" }, { municipio: "BarrancaBermeja" }, { municipio: "Betulia" }, { municipio: "Bolivar" }, { municipio: "Bucaramanga" }, { municipio: "Cabrera" }, { municipio: "California" }, { municipio: "Capitanejo" },
            { municipio: "Carcasi" }, { municipio: "Cepita" }, { municipio: "Cerrito" }, { municipio: "Charala" }, { municipio: "Charta" }, { municipio: "Chima" },
            { municipio: "Cimitarra" }, { municipio: "Concepcion" }, { municipio: "Confines" }, { municipio: "Contratacion" }, { municipio: " Coromoro" }, { municipio: "Curiti" }, { municipio: "El carmen de Chucuri" }, { municipio: "El Guacamayo" }, { municipio: "El peñon" }, { municipio: "El Playon" },
            { municipio: "Encino" }, { municipio: "Enciso" }, { municipio: "Florián" }, { municipio: "Floridablanca" }, { municipio: "Galán" }, { municipio: "Gámbita" }, { municipio: "Girón" },
            { municipio: "Guaca" }, { municipio: "Guadalupe" }, { municipio: "Guapotá" }, { municipio: " Guavatá" }, { municipio: " Güepsa" }, { municipio: " Hato" }, { municipio: " Jesús María" }, { municipio: "Jordán" }, { municipio: " La Belleza" },
            { municipio: " La Paz" }, { municipio: " Landázuri" }, { municipio: " Lebrija" }, { municipio: " Los Santos" }, { municipio: " Macaravita" }, { municipio: " Málaga" }, { municipio: " Matanza" }, { municipio: "Mogotes" }, { municipio: " Molagavita" },
            { municipio: "Ocamonte" }, { municipio: "Oiba" }, { municipio: " Onzaga" }, { municipio: " Palmar" }, { municipio: " Palmas del Socorro" }, { municipio: " Páramo" }, { municipio: "Piedecuesta" }, { municipio: " Pinchote" }, { municipio: " Puente Nacional" },
            { municipio: " Puerto Parra" }, { municipio: " Puerto Wilches" }, { municipio: " Rionegro" }, { municipio: " Sabana de Torres" }, { municipio: " San Andrés" }, { municipio: " San Benito" }, { municipio: " San Gil" }, { municipio: " San Joaquín" },
            { municipio: " San José de Miranda" }, { municipio: " San Miguel" }, { municipio: " San Vicente de Chucurí" }, { municipio: "Santa Bárbara" }, { municipio: "Santa Helena del Opón" }, { municipio: " Simacota" }, { municipio: " Socorro" }, { municipio: " Suaita" },
            { municipio: " Sucre" }, { municipio: "Suratá" }, { municipio: " Tona" }, { municipio: " Valle de San José" }, { municipio: " Vélez" }, { municipio: " Vetas" }, { municipio: "Villanueva" }, { municipio: "Zapatoca" },
        ],

        //municipios de Sucre
        municipiosSucre: [
            { municipio: "Sincelejo" }, { municipio: "Chalán" }, { municipio: "Colosó" }, { municipio: "Morroa" },
            { municipio: "Ovejas" }, { municipio: "La Mojana" }, { municipio: "Guaranda" }, { municipio: "Majagual" },
            { municipio: "Sucre" }, { municipio: "Morrosquillo" }, { municipio: "Coveñas" }, { municipio: "Palmito" },
            { municipio: "San Onofre" }, { municipio: "Santiago de Tolú" }, { municipio: "Tolú viejo" }, { municipio: "Sabanas" },
            { municipio: "Buenavista" }, { municipio: "Corozal" }, { municipio: "El Roble" }, { municipio: "Galeras" },
            { municipio: "Los Palmitos" }, { municipio: "Sampués" }, { municipio: "San Juan de Betulia" }, { municipio: "San Pedro" },
            { municipio: "Sincé" }, { municipio: "San Jorge" }, { municipio: "Caimito" }, { municipio: "La Unión" },
            { municipio: "San Benito" }, { municipio: "San Marcos" },
        ],
        //municipios de Tolima
        municipiosTolima: [
            { municipio: "Ibagué" }, { municipio: "Alvarado" }, { municipio: "Anzoátegui" }, { municipio: "Cajamarca" },
            { municipio: "Coello" }, { municipio: "Espinal" }, { municipio: "Flandes" }, { municipio: "Piedras" },
            { municipio: "Rovira" }, { municipio: "San Luis" }, { municipio: "Valle de San Juan" },
            { municipio: "Casablanca" }, { municipio: "Herveo" }, { municipio: "Lérida" }, { municipio: "Líbano" },
            { municipio: "Murillo" }, { municipio: "Santa Isabel" }, { municipio: "Venadillo" }, { municipio: "Villahermosa" },
            { municipio: "Ambalema" }, { municipio: "Armero" }, { municipio: "Falán" }, { municipio: "Fresno" },
            { municipio: "Honda" }, { municipio: "Mariquita" }, { municipio: "Palocabildo" },
            { municipio: "Carmen de Apicalá" }, { municipio: "Cunday" }, { municipio: "Icononzo" }, { municipio: "Melgar" },
            { municipio: "Villarica" }, { municipio: "Ataco" }, { municipio: "Chaparral" }, { municipio: "Coyaima" },
            { municipio: "Natagaima" }, { municipio: "Ortega" }, { municipio: "Planadas" }, { municipio: "Rioblanco" },
            { municipio: "Roncesvalle" }, { municipio: "San Antonio" },
            { municipio: "Alpujarra" }, { municipio: "Dolores" }, { municipio: "Guamo" }, { municipio: "Prado" },
            { municipio: "Purificación" }, { municipio: "Saldaña" }, { municipio: "Suárez" },

        ],
        //municipios de Valle
        municipiosValle: [
            { municipio: "Cali" }, { municipio: "Candelaria" }, { municipio: "Dagua" }, { municipio: "Florida" },
            { municipio: "Jamundí" }, { municipio: "La Cumbre" }, { municipio: "Palmira" }, { municipio: "Pradera" },
            { municipio: "Vijes" }, { municipio: "Yumbo" }, { municipio: "Andalucía" }, { municipio: "Buga" },
            { municipio: "Bugalagrande" }, { municipio: "Calima- El Darién" }, { municipio: "El Cerrito" }, { municipio: "Ginebra" },
            { municipio: "Guacarí" }, { municipio: "Restrepo" }, { municipio: "Riofrío" }, { municipio: "San Pedro" },
            { municipio: "Trujillo" }, { municipio: "Tuluá" }, { municipio: "Yotoco" }, { municipio: "Buenaventura" }, { municipio: "Caicedonia" }, { municipio: "Sevilla" },
            { municipio: "Cartago" }, { municipio: "El águila" }, { municipio: "El Cairo" }, { municipio: "El Dovio" }, { municipio: "La Unión" }, { municipio: "La Victoria" }, { municipio: "Obando" }, { municipio: "Restrepo" },
            { municipio: "Rodalnillo" }, { municipio: "Toro" }, { municipio: "Ulloa" },
            { municipio: "Versalles" }, { municipio: "Zarzal" }, { municipio: "Alcalá" },
        ],
        //municipios de  Vaupés
        municipiosVaupés: [
            { municipio: "Mitu" }, { municipio: "Carurú" }, { municipio: "Taraira" }, { municipio: "Pacoa" },
            { municipio: "Papunaua" }, { municipio: "Yavaraté" },
        ],
        //municipios de Vichada
        municipiosVichada: [
            { municipio: "Puerto" }, { municipio: "La Primavera" }, { municipio: "Santa Rosalía" }, { municipio: "Cumaribo" },
            { municipio: "Inspeccion Buenavista" }, { municipio: "Inspeccion Santa Cecilia" }, { municipio: "Inspeccion de Santa Barbara" }, { municipio: "Cabecera municipal" },
            { municipio: "Inspeccion Amanaven" }, { municipio: "Inspeccion Caño Ajota" }, { municipio: "Inspeccion Chaparral" }, { municipio: "Inspeccion Chupave" },
            { municipio: "Inspeccion El Tuparro" }, { municipio: "Inspeccion" },
        ],

    },
    methods:{     

        

    },
    mounted() {
        $("#departamento").val("");
        // $("#departamento").change("Amazonas");
       /*  $(selector).click(function (e) { 
            e.preventDefault();
            if(registroHotel.nombre.length>0 && registroHotel.dpto.length > 0) {
                $(this).attr("disabled","disabled");
            }else{
                $(this).removeAttr("disabled");
            }
        }); */
    },


    
    
   
})

