<?php
namespace App\Helpers;
/**   
 * Sn name generator
 * The names and first names used in this file,
 * comes from http://www.planete-senegal.com/senegal/noms_et_prenoms.php
 * 
 * PHP version 5
 * 
 * @category Utility
 * 
 * @package SN
 * 
 * @author Mouhamed Fadel Diagana <mouhamedfd>
 *
 * @license GPL 3.
 * 
 * @link http://github.com/mouhamedfd
 */
//namespace Dmf\Generator;
/**   
 * Class That generate Random Senegalese Name and FirstName
 * 
 * @category Utility
 * 
 * @package Dmf
 * 
 * @author Mouhamed Fadel Diagana <mouhamedfd@gmail.com>
 *
 * @license GPL 3.
 * 
 * @link http://github.com/mouhamedfd
 */

 
class SnNameGenerator
{

    public static $direction = array(

        "Direction Général",
        "Direction de l'Evaluation et de la Certification",
        "Direction de la planification des projets",
        "Direction Administrative et Financiere",
        "Direction de l'Ingenierie et des Operations de Formation",
    );
    public static $sigledirection = array(

        "DG",
        "DEC",
        "DPP",
        "DAF",
        "DIOF",
    );

    public static $civilite = array(

        "M.",
        "Mme",
    );

    public static $statut = array(

        "GIE",
        "Association",
        "Entreprise",
        "Institut publique",
        "Institut privée",
        "Amicale Etudiants/Elèves",
    );

    public static $situation = array(
        "Elève",
        "Etudiant(e)",
        "Employé(e)",
        "Recherche d'emploi",

    );

    public static $niveaux = array(
        "Primaire",
        "Collège",
        "Secondaire",
        "Supérieur",

    );

    public static $sexe = array(

        "M",
        "F",
    );
    public static $etablissement = array(

        "UCAD (université Cheikh Anta Diop) - Dakar",
        "UGB (université Gaston Berger) - Saint-Louis",
        "UDZ (université de Ziguinchor) - Ziguinchor",
        "UT (université de Thiès) - Thiès",
        "UB-CUR (université de Bambey) - Bambey",
        "UVS (université Virtuelle du Sénégal)",
        "ESP et UCAD - École supérieure polytechnique de Dakar et École polytechnique de Thiès",
        "ENA - haute fonction publique - Dakar",
        "ENSETP - École normale supérieure d'enseignement technique et professionnel",
        "ENDSS - médecine (formation technique et professionnelle) - Dakar",
        "ENS (UCAD) - enseignement - Dakar",
        "INSEPS (UCAD) - enseignement du sport - Dakar",
        "IUPA (UCAD) - pêche et aquaculture - Dakar",
        "DIT - Dakar Institute of Technology - Informatique - Dakar",
        "ESMT (École supérieure multinationale des télécommunications)",
        "CESAG - Centre africain d'études supérieures en gestion - Dakar",
        "EIA - École internationale des affaires Depuis 1998, formation en management avec diverses spécialités",
        "ENCR - (École nationale des Cadres ruraux) agriculture et élevage - Bambey",
        "ENSA - agronomie - Thiès",
        "ENTSS - (École nationale des travailleurs sociaux spécialisés) - Dakar",
        "ENEA - statistiques/ planification/ gestion urbaine - Dakar",
        "EBAD (UCAD) - École de bibliothécaires archivistes et documentalistes - Dakar",
        "CESTI (UCAD) - journalisme/ communication - Dakar",
        "ILEA (UCAD) - Langues étrangères appliquées au Tourisme et aux Affaires - Dakar",
        "ESMT - École supérieure multinationale des télécommunications - Dakar",
        "ESG Dakar - École supérieure de gestion - Dakar - commerce et management",
        "IST (UCAD) - formation d’ingénieurs géologues - Dakar",
        "ISE (UCAD) - environnement - Dakar",
        "ISED (UCAD) - santé et développement - Dakar",
        "IPDSR (UCAD) - population / développement / santé de la reproduction -Dakar",
        "ISG (UCAD) - finance/ comptabilité/ gestion - Dakar",
        "IAM - (Institut africain de management)",
        "ISI - (Institut supérieur d'informatique)",
        "ISM - (Institut supérieur de management)",
        "Groupe Supdeco Dakar (École supérieure de commerce de Dakar)",
        "AFI-L'UE - (L'université de l'Entreprise) - Dakar",
        "ESTM (École supérieure de technologie et de management)",
        "UEA (université Euro - Afrique), en partenariat avec l'université Jules Verne de Picardie - Dakar",
        
    );

    public static $deja = array(

        "Oui",
        "Non",
    );

    public static $familiale = array(

        "Célibataire",
        "Marié(e)",
        "Divorcé(e)",
    );

    public static $lieunaissance = array(
        "Tambacounda",
        "Bakel",
        "Goudiry",
        "Koumpentoum",
        "Bignona",
        "Oussouye",
        "Ziguinchor",
        "Bambey",
        "Diourbel",
        "Mbacké",
        "Dagana",
        "Podor",
        "Saint-Louis",
        "Dakar",
        "Pikine",
        "Rufisque",
        "Guédiawaye",
        "Kaolack",
        "Nioro du rip",
        "Guinguinéo",
        "Mbour",
        "Thiès",
        "Tivaouane",
        "Kémémer",
        "Linguère",
        "Louga",
        "Fatick",
        "Foundiougne",
        "Gossas",
        "Kolda",
        "Vélingara",
        "Médina",
        "Kanel",
        "Matam",
        "Ranérou",
        "Kaffrine",
        "Birkelane",
        "Koungheul",
        "Malem-Hodar",
        "Kedougou",
        "Salemata",
        "Saraya",
        "Sédhiou",
        "Bounkiling",
        "Goudomp",
    );

    public static $diplome = array(

        "Certificat de fin d'étude élémentaire",
        "Brevet de fin d'étude moyen",
        "Baccalauréat",
        "Licence 1",
        "Licence 2",
        "Licence 3",
        "Master 1",
        "Master 2",
    );

    public static $domaine = array(

        "Accueil - Secrétariat",
        "Agriculture - Agroalimentaire",
        "Architecture - Urbanisme",
        "Artisanat",
        "Arts - Audiovisuel",
        "Banque - Assurance",
        "Bâtiment - Travaux publics",
        "Bureautique",
        "Commerce - Vente",
        "Comptabilité - Finance - Gestion",
        "Développement personnel",
        "Droit - Juridique",
        "Édition - Presse - Médias",
        "Enseignement - Formation",
        "Esthétique - Beauté",
        "Graphisme - PAO CAO DAO",
        "Immobilier",
        "Industrie",
        "Informatique - Réseaux - Télécom",
        "Internet - Web",
        "Langues",
        "Lettres - Sciences humaines et sociales",
        "Management - Direction d'entreprise",
        "Marketing - Communication",
        "Mode - Textile",
        "Qualité - Sécurité - Environnement",
        "Ressources humaines",
        "Santé - Social",
        "Sciences",
        "Sport - Loisirs",
        "Tourisme - Hôtellerie - Restauration",
        "Transport - Achat - Logistique",



    );


    public static $name = array(
        "Badiane",
        "Badiatte",
        "Badji",
        "Biagui",
        "Bassène",
        "Bodian",
        "Coly",
        "Diamacoune",
        "Diatta",
        "Diadhiou",
        "Diédhiou",
        "Diémé",
        "Djiba",
        "Ehemba",
        "Goudiaby",
        "Himbane",
        "Mané",
        "Manga",
        "Sagna",
        "Sambou",
        "Sané",
        "Sonko",
        "Tamba",
        "Tendeng",
        "Badiane",
        "Bop",
        "Diaher",
        "Diène",
        "Dieye",
        "Dioh",
        "Diome",
        "Dione",
        "Diong",
        "Dior",
        "Diouf",
        "Dogue",
        "Faye",
        "Kital",
        "Kitane",
        "Mbaye",
        "Mbengue",
        "Ndiaye",
        "Ndiolène",
        "Ndione",
        "Ndong",
        "Ndour",
        "Ngom",
        "Niane",
        "Pouye",
        "Sagne",
        "Sarr",
        "Seck",
        "Sene",
        "Senghor",
        "Seye",
        "Thiandoum",
        "Thiaw",
        "Thiombane",
        "Thione",
        "Tine",
        "Youm",
        "Aïdara",
        "Athie",
        "Aw",
        "Ba",
        "Baby",
        "Baldé",
        "Barro",
        "Barry",
        "Bathily",
        "Boussou",
        "Camara",
        "Cissé",
        "Deme",
        "Dia",
        "Diamanka",
        "Diallo",
        "Diao",
        "Diaw",
        "Dimé",
        "Fassa",
        "Fofana",
        "Gadio",
        "Galadio",
        "Goloko",
        "Kâ",
        "Kane",
        "Maal",
        "Mbow",
        "Lo",
        "Ly",
        "Sall",
        "Seydi",
        "Sow",
        "Sy",
        "Sylla",
        "Tall",
        "Thiam",
        "Wane",
        "Wath",
        "Wone",
        "Yock",
        "Badjinka",
        "Coly",
        "Diandy",
        "Djighaly",
        "Dioma",
        "Diendiame",
        "Nango",
        "Badji",
        "Gomis",
        "Mané",
        "Vieira",
        "Carvalho",
        "Mendy",
        "Mané",
        "Preira",
        "Correia",
        "Basse",
        "Sylva",
        "Da Sylva",
        "Fernandez",
        "Da Costa",
        "Darmanko",
        "Amar",
        "Babou",
        "Diagne",
        "Diakhoumpa",
        "Goumbala",
        "Saady",
        "Sabara",
        "Sougou",
        "Sougoufara",
        "Tandiné",
        "Tandini",
        "Touré",
        "Bakhoum",
        "Diop",
        "Diagne",
        "Gaye",
        "Gueye",
        "Ndoye",
        "Ndiour",
        "Ndir",
        "Samb",
        "Sadio",
        "Vieira",
        "Lopez",
        "Marques",
        "Yalla",
        "Preira",
        "Boubane",
        "Bonang",
        "Bianquinch",
        "Bindian",
        "Bendian",
        "Bangonine",
        "Bapinye",
        "Bidiar",
        "Bangar",
        "Biès",
        "Boye",
        "Cobar",
        "Demba",
        "Dembelé",
        "Diack",
        "Diarra",
        "Diaw",
        "Dieng",
        "Diong",
        "Diop",
        "Fall",
        "Gning",
        "Guène",
        "Hanne",
        "Kane",
        "Kassé",
        "Lèye",
        "Loum",
        "Marone",
        "Mbacké",
        "Mbathié",
        "Mbaye",
        "Mbengue",
        "Mbodj",
        "Mbodji",
        "Mboup",
        "Mbow",
        "Ndao",
        "Ndaw",
        "Nder",
        "Ndiaye",
        "Ndiongue",
        "Ndour",
        "Nger",
        "Niane",
        "Niang",
        "Niass",
        "Niasse",
        "Seck",
        "Sock",
        "Taye",
        "Thiam",
        "Thiongane",
        "Wade",
        "Aïdara",
        "Bathily",
        "Bayo",
        "Camara",
        "Cissé",
        "Cissoko",
        "Coulibaly",
        "Dabo",
        "Demba",
        "Doumbia",
        "Doumbouya",
        "Diabang",
        "Diabira",
        "Diagana",
        "Diakhaby",
        "Diakhaté",
        "Diakité",
        "Dansokho",
        "Diakho",
        "Diarra",
        "Diawara",
        "Dibané",
        "Djimera",
        "Dramé",
        "Doucouré",
        "Fadiga",
        "Faty",
        "Fofana",
        "Gakou",
        "Gandega",
        "Gassama",
        "Kanté",
        "Kanouté",
        "Kébé",
        "Keïta",
        "Koïta",
        "Konaté",
        "Koroboume",
        "Marega",
        "Niangane",
        "Sabaly",
        "Sadio",
        "Sakho",
        "Samassa",
        "Sané",
        "Sawane",
        "Sidibé",
        "Sissoko",
        "Soukho",
        "Soumaré",
        "Tamba",
        "Tambadou",
        "Tambedou",
        "Tandia",
        "Tandian",
        "Tandjigora",
        "Timera",
        "Traoré",
        "Touré",
        "Wagué",
        "Yatéra",
        "Bacourine",
        "Badiete",
        "Bakilane",
        "Baloucoune",
        "Bampoky",
        "Bandagny",
        "Bandiacky",
        "Banko",
        "Baraye",
        "Bathé",
        "Boissy",
        "Cabateau",
        "Campal",
        "Damany",
        "Diompy",
        "Dionou",
        "Dupa",
        "Kabely",
        "Kadiagal",
        "Kadionane",
        "Kagnaly",
        "Kaly",
        "Kanfany",
        "Kanfome",
        "Kanfoudy",
        "Kanpintane",
        "Kantoussan",
        "Kassoka",
        "Kayounga",
        "Keny",
        "Malack",
        "Malèle",
        "Maleumane",
        "Malomar",
        "Malou",
        "Mandika",
        "Mandiouban",
        "Mancabou",
        "Mancore",
        "Mandiamé",
        "Manel",
        "Mansall",
        "Manta",
        "Mantanne",
        "Maty",
        "Mbampassy",
        "Médou",
        "Minkette",
        "Mpamy",
        "Nabaline",
        "Nadiack",
        "Nakouye",
        "Namatane",
        "Nankasse",
        "Nanssalan",
        "Napel",
        "Nataye",
        "Nawoutane",
        "Ndecky",
        "Ndeye",
        "Ndione",
        "Ndô",
        "Ndouikane",
        "Niouky",
        "Ntab",
        "Nzale",
        "Oudiane",
        "Panduppy",
        "Samy",
        "Sanka",
    );
    public static $firstName = array (
    "Abba",
    "Abdallah",
    "Abdou",
    "Abdoulatif",
    "Abdoulaye",
    "Abdourahmane",
    "Ablaye",
    "Abou",
    "Adama",
    "Adiouma",
    "Agouloubene",
    "Aïdara",
    "Aïnina",
    "Aladji",
    "Alassane",
    "Albouri",
    "Alfa",
    "Alfousseyni",
    "Aliou",
    "Alioune",
    "Allé",
    "Almamy",
    "Amadou",
    "Amara",
    "Amath",
    "Amidou",
    "Ansoumane",
    "Anta",
    "Arfang",
    "Arona",
    "Assane",
    "Asse",
    "Aziz",
    "Baaba",
    "Babacar",
    "Babou",
    "Badara",
    "Badou",
    "Bacar",
    "Baïdi",
    "Baila",
    "Bakari",
    "Ballago",
    "Bamba",
    "Banta",
    "Bara",
    "Bassirou",
    "Bathie",
    "Bayo",
    "Becaye",
    "Bilal",
    "Biram",
    "Birane",
    "Birima",
    "Biry",
    "Bocar",
    "Bodiel",
    "Bolikoro",
    "Boubacar",
    "Boubou",
    "Bougouma",
    "Bouly",
    "Bouna",
    "Bourkhane",
    "Bransan",
    "Cheikh",
    "Chérif",
    "Ciré",
    "Daly",
    "Damé",
    "Daouda",
    "Daour",
    "Demba",
    "Dényanké",
    "Diakhou",
    "Dial",
    "Dialamba",
    "Dialegueye",
    "Dianco",
    "Dicory",
    "Diégane",
    "Diène",
    "Dierry",
    "Diewo",
    "Diokel",
    "Diokine",
    "Diomaye",
    "Dior",
    "Djibo",
    "Djibril",
    "Djiby",
    "Djily",
    "Doudou",
    "Dramane",
    "El Hadj",
    "Elimane",
    "Facourou",
    "Fadel",
    "Falilou",
    "Fallou",
    "Famara",
    "Farba",
    "Fédior",
    "Fatel",
    "Fodé",
    "Fodey",
    "Fodié",
    "Foulah",
    "Galaye",
    "Gaoussou",
    "Gora",
    "Gorgui",
    "Goumbo",
    "Goundo",
    "Guidado",
    "Habib",
    "Hadiya",
    "Hady",
    "Hamidou",
    "Hammel",
    "Hatab",
    "Iba",
    "Ibrahima",
    "Ibou",
    "Idrissa",
    "Insa",
    "Ismaïl",
    "Ismaïla",
    "Issa",
    "Isshaga",
    "Jankebay",
    "Jamuyon",
    "Kader",
    "Kainack",
    "Kalidou",
    "Kalilou",
    "Kambia",
    "Kao",
    "Kaourou",
    "Karamo",
    "Kéba",
    "Khadim",
    "Khadir",
    "Khalifa",
    "Khamby",
    "Khary",
    "Khoudia",
    "Khoule",
    "Kor",
    "Koutoubo",
    "Lamine",
    "Lamp",
    "Landing",
    "Lat",
    "Latif",
    "Latsouck",
    "Latyr",
    "Lémou",
    "Léou",
    "Leyti",
    "Libasse",
    "Limane",
    "Loumboul",
    "Maba",
    "Macky",
    "Macodou",
    "Madia",
    "Madické",
    "Mady",
    "Mactar",
    "Maffal",
    "Maguette",
    "Mahécor",
    "Makan",
    "Malal",
    "Malamine",
    "Malang",
    "Malanh",
    "Malaw",
    "Malick",
    "Mallé",
    "Mamadou",
    "Mamour",
    "Mansour",
    "Maodo",
    "Mapaté",
    "Mar",
    "Massamba",
    "Massar",
    "Masseck",
    "Mbagnick",
    "Mbakhane",
    "Mbamoussa",
    "Mbar",
    "Mbaye",
    "Mébok",
    "Médoune",
    "Meïssa",
    "Mody",
    "Modou",
    "Moktar",
    "Momar",
    "Mor",
    "Mountaga",
    "Moussa",
    "Moustapha",
    "Namori",
    "Ndane",
    "N deupp",
    "Ndiack",
    "Ndiaga",
    "Ndiankou",
    "Ndiasse",
    "Ndiaw",
    "Ndiawar",
    "Ndiaya",
    "Ndiogou",
    "Ndiouga",
    "Ndongo",
    "Ngagne",
    "Ngor",
    "Nguénar",
    "Niakar",
    "Niankou",
    "Niokhor",
    "Nouh",
    "Nouha",
    "Npaly",
    "Ogo",
    "Omar",
    "Opa",
    "Oumar",
    "Oury",
    "Ousmane",
    "Ousseynou",
    "Papa",
    "Pape",
    "Papis",
    "Pathé",
    "Racine",
    "Sadibou",
    "Sacoura",
    "Saër",
    "Sahaba",
    "Saïdou",
    "Seydou",
    "Sakhir",
    "Salam",
    "Salif",
    "Saliou",
    "Saloum",
    "Samba",
    "Samori",
    "Samsidine",
    "Sandigui",
    "Sankoun",
    "Sanokho",
    "Sécouba",
    "Sédar",
    "Sékou",
    "Semou",
    "Senghane",
    "Serigne",
    "Seyba",
    "Seydina",
    "Seydou",
    "Sibiloumbaye",
    "Sidate",
    "Sidy",
    "Siéka",
    "Sihalébé",
    "Sihounke",
    "Silly",
    "Socé",
    "Sogui",
    "Soireba",
    "Solal",
    "Sonar",
    "Souleymane",
    "Soundjata",
    "Sounkarou",
    "Souty",
    "Tafsir",
    "Talla",
    "Tamsir",
    "Tanor",
    "Tayfor",
    "Tekheye",
    "Tété",
    "Thiarro",
    "Thiawlo",
    "Thierno",
    "Thione",
    "Tijane",
    "Tidjane",
    "Toumani",
    "Vieux",
    "Wagane",
    "Waly",
    "Wandifing",
    "Wasis",
    "Woula",
    "Woury",
    "Yacine",
    "Yacouba",
    "Yafaye",
    "Yakou",
    "Yamar",
    "Yankhoba",
    "Yerim",
    "Yero",
    "Yoro",
    "Yougo",
    "Younouss",
    "Youssou",
    "Youssouf",
    "Youssoufa",
    "Abibatou",
    "Aby",
    "Absa",
    "Adama",
    "Adiouma",
    "Adji",
    "Adja",
    "Aïcha",
    "Aïda",
    "Aïssatou",
    "Akinumelob",
    "Alima",
    "Alimatou",
    "Alinsiitowe",
    "Aloendisso",
    "Altine",
    "Ama",
    "Aminata",
    "Amincta",
    "Amy",
    "Anta",
    "Arame",
    "Assa",
    "Assietou",
    "Astou",
    "Ata",
    "Atia",
    "Awa",
    "Awentorébé",
    "Ayimpen",
    "Banel",
    "Batouly",
    "Bigué",
    "Billé",
    "Bincta",
    "Bineta",
    "Binette",
    "Binta",
    "Bintou",
    "Birame",
    "Biram",
    "Boirika",
    "Bougouma",
    "Boury",
    "Bousso",
    "Ciramadi",
    "Codou",
    "Combé",
    "Coudouution",
    "Coumba",
    "Coumboye",
    "Coura",
    "Daba",
    "Dado",
    "Daka",
    "Daly",
    "Debbo",
    "Défa",
    "Dewel",
    "Dewene",
    "Diadji",
    "Diaga",
    "Diakher",
    "Diakhou",
    "Dialikatou",
    "Diama",
    "Diangou",
    "Dianké",
    "Diariatou",
    "Diarra",
    "Diara",
    "Diary",
    "Dibor",
    "Dieourou",
    "Dior",
    "Diouma",
    "Djaly",
    "Djébou",
    "Djeynaba",
    "Dkikel",
    "Djilane",
    "Enfadima",
    "Fabala",
    "Fabinta",
    "Fadima",
    "Fakane",
    "Fama",
    "Fanta",
    "Farmata",
    "Fatima",
    "Fatou",
    "Fatoumatou",
    "Fily",
    "Garmi",
    "Gnagna",
    "Gnilane",
    "Gnima",
    "Gouya",
    "Guignane",
    "Guissaly",
    "Haby",
    "Hawa",
    "Heinda",
    "Holèl",
    "Issate",
    "Kankou",
    "Karimatou",
    "Kenbougoul",
    "Kéwé",
    "Kadiali",
    "Khadija",
    "Khadijatou",
    "Khady",
    "Khar",
    "Khary",
    "Khayfatte",
    "Khoudia",
    "Khoudjedji",
    "Khoumbaré",
    "Kiné",
    "Korka",
    "Laf",
    "Laff",
    "Laffia",
    "Lama",
    "Léna",
    "Lika",
    "Lissah",
    "Liwane",
    "Mada",
    "Madior",
    "Madjiguène",
    "Maguette",
    "Mahawa",
    "Mame",
    "Mamina",
    "Manthita",
    "Marème",
    "Mariama",
    "Mamassa",
    "Mane",
    "Maty",
    "Mayatta",
    "Maymouna",
    "Mbacké",
    "Mbarou",
    "Mbayeng",
    "Mbissine",
    "Mbossé",
    "Meïssa",
    "Mingue",
    "Mouskéba",
    "Nafi",
    "Nbieumbet",
    "Ndebane",
    "Ndella",
    "Ndeye",
    "Ngoundj",
    "Ndiarenioul",
    "Ndiarka",
    "Ndiasse",
    "Ndiaty",
    "Ndiémé",
    "Ndioba",
    "Ndiolé",
    "Ndioro",
    "Ndoffène",
    "Ndombo",
    "Néné",
    "Neyba",
    "Ngoné",
    "Ngosse",
    "Nguenar",
    "Nguissaly",
    "Niakuhufosso",
    "Niali",
    "Nialine",
    "Ningou",
    "Nini",
    "Niouma",
    "Oulèye",
    "Oulimata",
    "Oumou",
    "Oumy",
    "Oureye",
    "Penda",
    "Peye",
    "Peye",
    "Raby",
    "Raki",
    "Rama",
    "Ramata",
    "Ramatoulaye",
    "Rokhaya",
    "Roubba",
    "Roughy",
    "Sadio",
    "Safiétou",
    "Safi",
    "Sagar",
    "Sahaba",
    "Salimata",
    "Salamata",
    "Sanakha",
    "Sarratou",
    "Saoudatou",
    "Sawdiatou",
    "Selbé",
    "Sell",
    "Seynabou",
    "Seyni",
    "Sibett",
    "Siga",
    "Sira",
    "Sirabiry",
    "Soda",
    "Sofiatou",
    "Sofietou",
    "Sokhna",
    "Sonar",
    "Souadou",
    "Soukeye",
    "Soukeyna",
    "Tabara",
    "Tacko",
    "Taki",
    "Tening",
    "Téwa",
    "Tiné",
    "Thiame",
    "Thiomba",
    "Thiony",
    "Thioro",
    "Thioumbane",
    "Tocka",
    "Tokoselle",
    "Toly",
    "Walty",
    "Yadicone",
    "Yacine",
    "Yandé",
    "Yandou",
    "Yaye",
    "Adama",
    "Adiouma",
    "Anta",
    "Birame",
    "Bodiel",
    "Bougouma",
    "Ciré",
    "Daly",
    "Diéry",
    "Khar",
    "Lika",
    "Maguette",
    "Meïssa",
    "Ndiasse",
    "Sagar",
    "Sanou",
    "Yacine",
    );

    /**
     *  Name generator
     *  
     * @function to generate random name
     * @return   name(String)
     */
    static function getName()
    {
        $dimension=count(self::$name);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$name[$random_index];


    }
    /**
     * FirstName generator
     * 
     * @function to generate random firstName
     * @return   firstName(String)
     */
    static function getFirstName()
    {
        $dimension=count(self::$firstName);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$firstName[$random_index];


    }

    static function getCivilite()
    {
        $dimension=count(self::$civilite);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$civilite[$random_index];


    }
    static function getDirection()
    {
        $dimension=count(self::$direction);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$direction[$random_index];


    }
    static function getSigledirection()
    {
        $dimension=count(self::$sigledirection);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$sigledirection[$random_index];


    }
    
    static function getSituation()
    {
        $dimension=count(self::$situation);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$situation[$random_index];


    }

    static function getStatut()
    {
        $dimension=count(self::$statut);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$statut[$random_index];


    }

    static function getNiveaux()
    {
        $dimension=count(self::$niveaux);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$niveaux[$random_index];


    }
    
    static function getSexe()
    {
        $dimension=count(self::$sexe);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$sexe[$random_index];


    }

    static function getEtablissement()
    {
        $dimension=count(self::$etablissement);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$etablissement[$random_index];
    }

    static function getDeja()
    {
        $dimension=count(self::$deja);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$deja[$random_index];
    }
    
    static function getFamiliale()
    {
        $dimension=count(self::$familiale);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$familiale[$random_index];

    }

    static function getLieunaissance()
    {
        $dimension=count(self::$lieunaissance);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$lieunaissance[$random_index];

    }

    static function getDomaine()
    {
        $dimension=count(self::$domaine);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$domaine[$random_index];


    }

    static function getDiplome()
    {
        $dimension=count(self::$diplome);
        $random_index=random_int(0, (int)$dimension-1);
        return self::$diplome[$random_index];

    }
}

