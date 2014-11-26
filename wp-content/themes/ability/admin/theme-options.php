<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){

$short = "ab";
	
// Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "All");    
       
// Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->ID] = $of_page->post_name;
}
$of_pages_tmp = array_unshift($of_pages, "");       
 
$of_options_skin_select = array(
	"light",
	"dark"
); 

$of_options_one_page_blocks = array( 
	"disabled" => array (
		"placebo" 		=> "placebo", //REQUIRED!
		"custom_page_one"	=> "Custom Page One",
		"custom_page_two"	=> "Custom Page Two",
		"custom_page_three"	=> "Custom Page Three"
	), 
	"enabled" => array (
		"placebo" => "placebo", //REQUIRED!
		"home"	=> "Home",
		"portfolio" => "Portfolio",
		"blog" => "Blog",
		"about" => "About",
		"contact" => "Contact"
	),
);
$of_options_fonts = array(
	'Abel' => 'Abel',
	'Abril Fatface' => 'Abril Fatface',
	'Aclonica' => 'Aclonica',
	'Acme' => 'Acme', 
	'Actor' => 'Actor',
	'Adamina' => 'Adamina', 
	'Aguafina Script' => 'Aguafina Script',
	'Aladin' => 'Aladin', 
	'Aldrich' => 'Aldrich', 
	'Alegreya' => 'Alegreya', 
	'Alegreya SC' => 'Alegreya SC', 
	'Alex Brush' => 'Alex Brush',
	'Alfa Slab One' => 'Alfa Slab One', 
	'Alice' => 'Alice',
	'Alike' => 'Alike', 
	'Alike Angular' => 'Alike Angular',
	'Allan' => 'Allan', 
	'Allerta' => 'Allerta',
	'Allura' => 'Allura', 
	'Almendra' => 'Almendra',
	'Almendra SC' => 'Almendra SC', 
	'Amaranth' => 'Amaranth', 
	'Amatic SC' => 'Amatic SC',
	'Amethysta' => 'Amethysta', 
	'Andada' => 'Andada',
	'Andika' => 'Andika', 
	'Angkor' => 'Angkor', 
	'Annie Use Your Telescope' => 'Annie Use Your Telescope', 
	'Anonymous Pro' => 'Anonymous Pro', 
	'Antic' => 'Antic',
	'Anton' => 'Anton', 
	'Arapey' => 'Arapey',
	'Arbutus' => 'Arbutus', 
	'Architects Daughter' => 'Architects Daughter', 
	'Arimo' => 'Arimo', 
	'Arizonia' => 'Arizonia',
	'Armata' => 'Armata', 
	'Artifika' => 'Artifika', 
	'Arvo' => 'Arvo', 
	'Asap' => 'Asap',
	'Asset' => 'Asset', 
	'Astloch' => 'Astloch',
	'Asul' => 'Asul', 
	'Atomic Age' => 'Atomic Age',
	'Aubrey' => 'Aubrey', 
	'Bad Script' => 'Bad Script',
	'Balthazar' => 'Balthazar', 
	'Bangers' => 'Bangers',
	'Basic' => 'Basic', 
	'Battambang' => 'Battambang',
	'Baumans' => 'Baumans', 
	'Bayon' => 'Bayon',
	'Belgrano' => 'Belgrano', 
	'Bentham' => 'Bentham',
	'Bevan' => 'Bevan', 
	'Bigshot One' => 'Bigshot One',
	'Bilbo' => 'Bilbo', 
	'Bilbo Swash Caps' => 'Bilbo Swash Caps', 
	'Bitter' => 'Bitter', 
	'Black Ops One' => 'Black Ops One',
	'Bokor' => 'Bokor', 
	'Bonbon' => 'Bonbon',
	'Boogaloo' => 'Boogaloo', 
	'Bowlby One' => 'Bowlby One',
	'Brawler' => 'Brawler', 
	'Bree Serif' => 'Bree Serif',
	'Bubblegum Sans' => 'Bubblegum Sans', 
	'Buda' => 'Buda',
	'Buenard' => 'Buenard', 
	'Cabin' => 'Cabin', 
	'Cabin Condensed' => 'Cabin Condensed', 
	'Cabin Sketch' => 'Cabin Sketch', 
	'Caesar Dressing' => 'Caesar Dressing',
	'Cagliostro' => 'Cagliostro', 
	'Calligraffitti' => 'Calligraffitti',
	'Cambo' => 'Cambo', 
	'Candal' => 'Candal', 
	'Cantarell' => 'Cantarell', 
	'Cardo' => 'Cardo',
	'Carme' => 'Carme', 
	'Carter One' => 'Carter One', 
	'Caudex' => 'Caudex', 
	'Cedarville Cursive' => 'Cedarville Cursive', 
	'Ceviche One' => 'Ceviche One', 
	'Changa One' => 'Changa One',
	'Chango' => 'Chango', 
	'Chelsea Market' => 'Chelsea Market',
	'Chenla' => 'Chenla', 
	'Cherry Cream Soda' => 'Cherry Cream Soda',
	'Chewy' => 'Chewy', 
	'Chicle' => 'Chicle', 
	'Chivo' => 'Chivo', 
	'Coda' => 'Coda', 
	'Comfortaa' => 'Comfortaa', 
	'Coming Soon' => 'Coming Soon',
	'Concert One' => 'Concert One', 
	'Condiment' => 'Condiment',
	'Content' => 'Content', 
	'Contrail One' => 'Contrail One',
	'Convergence' => 'Convergence', 
	'Cookie' => 'Cookie',
	'Copse' => 'Copse', 
	'Corben' => 'Corben', 
	'Cousine' => 'Cousine', 
	'Coustard' => 'Coustard', 
	'Covered By Your Grace' => 'Covered By Your Grace', 
	'Crafty Girls' => 'Crafty Girls', 
	'Crete Round' => 'Crete Round', 
	'Crimson Text' => 'Crimson Text', 
	'Crushed' => 'Crushed',
	'Cuprum' => 'Cuprum', 
	'Damion' => 'Damion',
	'Dancing Script' => 'Dancing Script', 
	'Dangrek' => 'Dangrek', 
	'Dawning of a New Day' => 'Dawning of a New Day', 
	'Days One' => 'Days One',
	'Delius' => 'Delius', 
	'Delius Swash Caps' => 'Delius Swash Caps', 
	'Delius Unicase' => 'Delius Unicase', 
	'Devonshire' => 'Devonshire',
	'Didact Gothic' => 'Didact Gothic', 
	'Diplomata' => 'Diplomata',
	'Diplomata SC' => 'Diplomata SC', 
	'Dorsa' => 'Dorsa',
	'Dr Sugiyama' => 'Dr Sugiyama', 
	'Duru Sans' => 'Duru Sans',
	'Dynalight' => 'Dynalight', 
	'EB Garamond' => 'EB Garamond',
	'Eater' => 'Eater', 
	'Electrolize' => 'Electrolize',
	'Emblema One' => 'Emblema One', 
	'Engagement' => 'Engagement',
	'Enriqueta' => 'Enriqueta', 
	'Erica One' => 'Erica One',
	'Esteban' => 'Esteban', 
	'Euphoria Script' => 'Euphoria Script',
	'Ewert' => 'Ewert', 
	'Exo' => 'Exo', 
	'Expletus Sans' => 'Expletus Sans', 
	'Fanwood Text' => 'Fanwood Text', 
	'Fascinate' => 'Fascinate',
	'Fascinate Inline' => 'Fascinate Inline', 
	'Federant' => 'Federant',
	'Federo' => 'Federo', 
	'Felipa' => 'Felipa',
	'Fjord One' => 'Fjord One', 
	'Flamenco' => 'Flamenco',
	'Flavors' => 'Flavors', 
	'Fondamento' => 'Fondamento', 
	'Fontdiner Swanky' => 'Fontdiner Swanky',
	'Forum' => 'Forum', 
	'Francois One' => 'Francois One', 
	'Fredericka the Great' => 'Fredericka the Great', 
	'Freehand' => 'Freehand',
	'Fresca' => 'Fresca', 
	'Frijole' => 'Frijole',
	'Fugaz One' => 'Fugaz One', 
	'Galdeano' => 'Galdeano', 
	'Gentium Basic' => 'Gentium Basic', 
	'Gentium Book Basic' => 'Gentium Book Basic', 
	'Geo' => 'Geo', 'Geostar' => 'Geostar', 
	'Germania One' => 'Germania One', 
	'Give You Glory' => 'Give You Glory',
	'Glegoo' => 'Glegoo', 
	'Gloria Hallelujah' => 'Gloria Hallelujah', 
	'Goblin One' => 'Goblin One',
	'Gochi Hand' => 'Gochi Hand', 
	'Goudy Bookletter 1911' => 'Goudy Bookletter 1911', 
	'Gravitas One' => 'Gravitas One',
	'Gruppo' => 'Gruppo', 
	'Gudea' => 'Gudea',
	'Habibi' => 'Habibi', 
	'Hammersmith One' => 'Hammersmith One',
	'Handlee' => 'Handlee', 
	'Hanuman' => 'Hanuman', 
	'Herr Von Muellerhoff' => 'Herr Von Muellerhoff', 
	'Holtwood One SC' => 'Holtwood One SC', 
	'Homemade Apple' => 'Homemade Apple',
	'Homenaje' => 'Homenaje', 
	'Iceberg' => 'Iceberg',
	'Iceland' => 'Iceland', 
	'Inconsolata' => 'Inconsolata',
	'Inder' => 'Inder', 
	'Indie Flower' => 'Indie Flower',
	'Inika' => 'Inika', 
	'Irish Grover' => 'Irish Grover', 
	'Istok Web' => 'Istok Web', 
	'Italianno' => 'Italianno',
	'Jim Nightshade' => 'Jim Nightshade', 
	'Jockey One' => 'Jockey One', 
	'Josefin Sans' => 'Josefin Sans', 
	'Josefin Slab' => 'Josefin Slab', 
	'Judson' => 'Judson',
	'Julee' => 'Julee', 
	'Junge' => 'Junge',
	'Jura' => 'Jura', 
	'Just Another Hand' => 'Just Another Hand', 
	'Just Me Again Down Here' => 'Just Me Again Down Here', 
	'Kameron' => 'Kameron', 
	'Kaushan Script' => 'Kaushan Script',
	'Kelly Slab' => 'Kelly Slab', 
	'Kenia' => 'Kenia',
	'Khmer' => 'Khmer', 
	'Knewave' => 'Knewave',
	'Kotta One' => 'Kotta One', 
	'Koulen' => 'Koulen',
	'Kranky' => 'Kranky', 
	'Kreon' => 'Kreon',
	'Kristi' => 'Kristi', 
	'La Belle Aurore' => 'La Belle Aurore',
	'Lancelot' => 'Lancelot', 
	'Lato' => 'Lato', 
	'League Script' => 'League Script',
	'Leckerli One' => 'Leckerli One', 
	'Lekton' => 'Lekton',
	'Lemon' => 'Lemon', 
	'Lilita One' => 'Lilita One',
	'Limelight' => 'Limelight', 
	'Linden Hill' => 'Linden Hill',
	'Lobster' => 'Lobster', 
	'Lobster Two' => 'Lobster Two', 
	'Lora' => 'Lora', 
	'Love Ya Like A Sister' => 'Love Ya Like A Sister', 
	'Loved by the King' => 'Loved by the King', 
	'Luckiest Guy' => 'Luckiest Guy',
	'Lusitana' => 'Lusitana', 
	'Lustria' => 'Lustria',
	'Macondo' => 'Macondo', 
	'Macondo Swash Caps' => 'Macondo Swash Caps', 
	'Magra' => 'Magra',
	'Maiden Orange' => 'Maiden Orange', 
	'Mako' => 'Mako',
	'Marck Script' => 'Marck Script', 
	'Marko One' => 'Marko One',
	'Marmelad' => 'Marmelad', 
	'Marvel' => 'Marvel', 
	'Mate' => 'Mate',
	'Mate SC' => 'Mate SC', 
	'Maven Pro' => 'Maven Pro', 
	'Meddon' => 'Meddon',
	'MedievalSharp' => 'MedievalSharp', 
	'Medula One' => 'Medula One',
	'Megrim' => 'Megrim', 
	'Merienda One' => 'Merienda One', 
	'Merriweather' => 'Merriweather', 
	'Metal' => 'Metal',
	'Metamorphous' => 'Metamorphous', 
	'Metrophobic' => 'Metrophobic',
	'Michroma' => 'Michroma', 
	'Miltonian' => 'Miltonian',
	'Miniver' => 'Miniver', 
	'Miss Fajardose' => 'Miss Fajardose', 
	'Modern Antiqua' => 'Modern Antiqua',
	'Molengo' => 'Molengo', 
	'Monofett' => 'Monofett',
	'Monoton' => 'Monoton', 
	'Monsieur La Doulaise' => 'Monsieur La Doulaise', 
	'Montaga' => 'Montaga',
	'Montez' => 'Montez', 
	'Montserrat' => 'Montserrat',
	'Moul' => 'Moul', 
	'Moulpali' => 'Moulpali', 
	'Mountains of Christmas' => 'Mountains of Christmas', 
	'Mr Bedfort' => 'Mr Bedfort',
	'Mr Dafoe' => 'Mr Dafoe', 
	'Mr De Haviland' => 'Mr De Haviland', 
	'Mrs Saint Delafield' => 'Mrs Saint Delafield', 
	'Mrs Sheppards' => 'Mrs Sheppards', 
	'Muli' => 'Muli',
	'Neucha' => 'Neucha', 
	'Neuton' => 'Neuton', 
	'News Cycle' => 'News Cycle',
	'Niconne' => 'Niconne', 
	'Nixie One' => 'Nixie One', 
	'Nobile' => 'Nobile', 
	'Nokora' => 'Nokora', 'Norican' => 'Norican', 
	'Nosifer' => 'Nosifer', 
	'Nothing You Could Do' => 'Nothing You Could Do', 
	'Noticia Text' => 'Noticia Text', 
	'Numans' => 'Numans', 'Odor Mean Chey' => 'Odor Mean Chey', 
	'Oldenburg' => 'Oldenburg', 
	'Open Sans' => 'Open Sans', 
	'Orbitron' => 'Orbitron', 
	'Original Surfer' => 'Original Surfer', 
	'Over the Rainbow' => 'Over the Rainbow', 
	'Overlock' => 'Overlock', 
	'Overlock SC' => 'Overlock SC',
	'Ovo' => 'Ovo', 
	'PT Sans' => 'PT Sans', 
	'PT Serif' => 'PT Serif', 
	'Pacifico' => 'Pacifico',
	'Parisienne' => 'Parisienne', 
	'Passero One' => 'Passero One', 
	'Passion One' => 'Passion One', 
	'Patrick Hand' => 'Patrick Hand',
	'Patua One' => 'Patua One', 
	'Paytone One' => 'Paytone One', 
	'Permanent Marker' => 'Permanent Marker',
	'Petrona' => 'Petrona', 
	'Philosopher' => 'Philosopher', 
	'Piedra' => 'Piedra',
	'Pinyon Script' => 'Pinyon Script', 
	'Plaster' => 'Plaster',
	'Play' => 'Play', 
	'Playball' => 'Playball', 
	'Playfair Display' => 'Playfair Display', 
	'Podkova' => 'Podkova',
	'Poller One' => 'Poller One', 
	'Poly' => 'Poly', 'Pompiere' => 'Pompiere', 
	'Port Lligat Sans' => 'Port Lligat Sans', 
	'Port Lligat Slab' => 'Port Lligat Slab',
	'Prata' => 'Prata', 
	'Preahvihear' => 'Preahvihear',
	'Prociono' => 'Prociono', 
	'Puritan' => 'Puritan', 
	'Quantico' => 'Quantico', 
	'Quattrocento' => 'Quattrocento', 
	'Quattrocento Sans' => 'Quattrocento Sans', 
	'Questrial' => 'Questrial', 
	'Quicksand' => 'Quicksand', 
	'Qwigley' => 'Qwigley',
	'Radley' => 'Radley', 
	'Raleway' => 'Raleway',
	'Rammetto One' => 'Rammetto One', 
	'Rancho' => 'Rancho',
	'Rationale' => 'Rationale', 
	'Redressed' => 'Redressed',
	'Reenie Beanie' => 'Reenie Beanie', 
	'Ribeye' => 'Ribeye',
	'Ribeye Marrow' => 'Ribeye Marrow', 
	'Righteous' => 'Righteous',
	'Rochester' => 'Rochester', 
	'Rock Salt' => 'Rock Salt',
	'Rokkitt' => 'Rokkitt', 
	'Ropa Sans' => 'Ropa Sans', 
	'Rosario' => 'Rosario', 
	'Rouge Script' => 'Rouge Script', 
	'Ruda' => 'Ruda',
	'Ruge Boogie' => 'Ruge Boogie', 
	'Ruluko' => 'Ruluko',
	'Ruslan Display' => 'Ruslan Display', 
	'Ruthie' => 'Ruthie',
	'Sail' => 'Sail',
	'Salsa' => 'Salsa', 
	'Sancreek' => 'Sancreek',
	'Sansita One' => 'Sansita One', 
	'Sarina' => 'Sarina',
	'Satisfy' => 'Satisfy', 
	'Schoolbell' => 'Schoolbell', 
	'Shadows Into Light' => 'Shadows Into Light',
	'Shanti' => 'Shanti', 
	'Share' => 'Share', 
	'Shojumaru' => 'Shojumaru',
	'Short Stack' => 'Short Stack', 
	'Siemreap' => 'Siemreap',
	'Sigmar One' => 'Sigmar One', 
	'Signika' => 'Signika', 
	'Signika Negative' => 'Signika Negative', 
	'Sirin Stencil' => 'Sirin Stencil',
	'Six Caps' => 'Six Caps', 
	'Slackey' => 'Slackey',
	'Smokum' => 'Smokum', 
	'Smythe' => 'Smythe',
	'Sniglet' => 'Sniglet', 
	'Snippet' => 'Snippet',
	'Sofia' => 'Sofia', 
	'Sonsie One' => 'Sonsie One', 
	'Sorts Mill Goudy' => 'Sorts Mill Goudy', 
	'Special Elite' => 'Special Elite',
	'Spicy Rice' => 'Spicy Rice', 
	'Spinnaker' => 'Spinnaker',
	'Spirax' => 'Spirax', 
	'Squada One' => 'Squada One', 
	'Stardos Stencil' => 'Stardos Stencil', 
	'Stint Ultra Condensed' => 'Stint Ultra Condensed', 
	'Stoke' => 'Stoke',
	'Sue Ellen Francisco' => 'Sue Ellen Francisco', 
	'Sunshiney' => 'Sunshiney',
	'Supermercado One' => 'Supermercado One', 
	'Suwannaphum' => 'Suwannaphum', 
	'Swanky and Moo Moo' => 'Swanky and Moo Moo', 
	'Syncopate' => 'Syncopate',
	'Tangerine' => 'Tangerine',
	'Taprom' => 'Taprom', 
	'Telex' => 'Telex',
	'Tenor Sans' => 'Tenor Sans', 
	'Terminal Dosis' => 'Terminal Dosis', 
	'The Girl Next Door' => 'The Girl Next Door', 
	'Tienne' => 'Tienne', 
	'Tinos' => 'Tinos', 
	'Titan One' => 'Titan One', 
	'Trade Winds' => 'Trade Winds', 
	'Trochut' => 'Trochut',
	'Trykker' => 'Trykker', 
	'Tulpen One' => 'Tulpen One', 
	'Ubuntu' => 'Ubuntu', 
	'Ubuntu Mono' => 'Ubuntu Mono', 
	'Ultra' => 'Ultra',
	'Uncial Antiqua' => 'Uncial Antiqua', 
	'UnifrakturCook' => 'UnifrakturCook', 
	'UnifrakturMaguntia' => 'UnifrakturMaguntia', 
	'Unkempt' => 'Unkempt',
	'Unlock' => 'Unlock', 
	'Unna' => 'Unna',
	'VT323' => 'VT323',
	'Varela' => 'Varela', 
	'Varela Round' => 'Varela Round',
	'Vast Shadow' => 'Vast Shadow', 
	'Vibur' => 'Vibur',
	'Vidaloka' => 'Vidaloka', 
	'Viga' => 'Viga', 
	'Volkhov' => 'Volkhov', 
	'Vollkorn' => 'Vollkorn', 
	'Voltaire' => 'Voltaire', 
	'Waiting for the Sunrise' => 'Waiting for the Sunrise', 
	'Wallpoet' => 'Wallpoet',
	'Walter Turncoat' => 'Walter Turncoat', 
	'Wellfleet' => 'Wellfleet',
	'Wire One' => 'Wire One', 
	'Yellowtail' => 'Yellowtail',
	'Yeseva One' => 'Yeseva One', 
	'Yesteryear' => 'Yesteryear',
	'Zeyada' => 'Zeyada' 
);

// Stylesheets Reader
$alt_stylesheet_path = LAYOUT_PATH;
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

// Portfolio Background Images Reader
$portfolio_bg_images_path = STYLESHEETPATH. '/images/portfolio_bg/'; // change this to where you store your bg images
$portfolio_bg_images_url = get_bloginfo('template_url').'/images/portfolio_bg/'; // change this to where you store your bg images
$portfolio_bg_images = array();

if ( is_dir($portfolio_bg_images_path) ) {
    if ($portfolio_bg_images_dir = opendir($portfolio_bg_images_path) ) { 
        while ( ($portfolio_bg_images_file = readdir($portfolio_bg_images_dir)) !== false ) {
            if(stristr($portfolio_bg_images_file, ".png") !== false || stristr($portfolio_bg_images_file, ".jpg") !== false) {
                $portfolio_bg_images[] = $portfolio_bg_images_url . $portfolio_bg_images_file;
            }
        }    
    }
}


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();


// ************** STYLING OPTIONS

$of_options[] = array( "name" => "Styling Options",
					"type" => "heading");

$of_options[] = array( "name" => "Skin select",
					"desc" => "Select the default colour scheme here.",
					"id" => $short."_skin_select",
					"std" => "light",
					"type" => "select",
					"options" => $of_options_skin_select);
					
$of_options[] = array( "name" =>  "Header background color",
					"desc" => "Pick a background color for the header.",
					"id" => $short."_header_background",
					"std" => "",
					"type" => "color");   

$of_options[] = array( "name" =>  "Footer background color",
					"desc" => "Pick a background color for the footer.",
					"id" => $short."_footer_background",
					"std" => "",
					"type" => "color");
	
$of_options[] = array( "name" =>  "Styling colour",
					"desc" => "Pick a color that is used as the themes primary styling colour.",
					"id" => $short."_styling_colour",
					"std" => "",
					"type" => "color");

$of_options[] = array( "name" => "Use Google Fonts (Default)",
					"desc" => "Select this if you wish to choose your own font for the theme using the google font selector box below.",
					"id" => $short."_use_custom_font",
					"std" => false,
					"type" => "checkbox");

$of_options[] = array( "name" => "Default Font",
					"desc" => "The font that is used sitewide. If you'd like to see examples of the fonts, please visit <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",
					"id" => $short."_standard_font",
					"std" => "Open Sans",
					"type" => "select",
					"options" => $of_options_fonts);

$of_options[] = array( "name" => "Use Google Fonts (Tagline)",
					"desc" => "Select this if you wish to choose your own font for the tagline using the google font selector box below.",
					"id" => $short."_use_custom_tagline_font",
					"std" => false,
					"type" => "checkbox");

$of_options[] = array( "name" => "Tagline Text Font",
					"desc" => "The font that is used for the tagline. If you'd like to see examples of the fonts, please visit <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",
					"id" => $short."_tagline_font",
					"std" => "Goudy Bookletter 1911",
					"type" => "select",
					"options" => $of_options_fonts); 
					
$of_options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $short."_custom_css",
                    "std" => "",
                    "type" => "textarea");


// ************** GENERAL OPTIONS
					
$of_options[] = array( "name" => "General Options",
					"type" => "heading");

$of_options[] = array( "name" => "Logo",
					"desc" => "Upload your logo here, ideally this should be 215px x 95px.",
					"id" => $short."_logo_upload",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "Custom favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $short."_custom_favicon",
					"std" => "",
					"type" => "media");

$of_options[] = array( "name" => "banner_boutique",
        			"desc" => "Upload your banner for all boutique page, ideally this should be 940px in width.",
					"id" => $short."_banner_boutique",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "Enable dynamic header",
					"desc" => "Enable the dynamic header resizing on desktop browsers.",
					"id" => $short."_enable_dynamic_header",
					"std" => true,
					"type" => "checkbox");
                                               
$of_options[] = array( "name" => "Tracking code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $short."_google_analytics",
					"std" => "",
					"type" => "textarea"); 

$of_options[] = array( "name" => "JavaScript disabled message",
					"desc" => "The alert that is displayed to the user when they have javascript disabled.",
					"id" => $short."_no_js_message",
					"std" => "Please enable JavaScript to view this website.",
					"type" => "text"); 

$of_options[] = array( "name" => "Portfolio - View All Link",
					"desc" => "Select the page that the view all link in the portfolio controls should go to.",
					"id" => $short."_portfolio_page",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);

$of_options[] = array( "name" => "Blog - View All Link",
					"desc" => "Select the page that the view all link in the blog controls should go to.",
					"id" => $short."_blog_page",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);

$of_options[] = array( "name" => "Footer copyright text",
                    "desc" => "The copyright text at the bottom of the footer. Tip: You can use the following shortcodes: [wp-link] [the-year]",
                    "id" => $short."_footer_text",
                    "std" => "Copyright [the-year] | Ability by Ed Cousins | Powered by [wp-link]",
                    "type" => "textarea");                                                          


// ************** ONE PAGE OPTIONS

$of_options[] = array( "name" => "One Page Options",
					"type" => "heading");

$of_options[] = array( "name" => "Layout manager",
					"desc" => "Organize how you want the sections to appear and be ordered",
					"id" => $short."_one_page_blocks",
					"std" => $of_options_one_page_blocks,
					"type" => "sorter");

$of_options[] = array( "name" => "About Page",
					"desc" => "If you have enabled custom page one in the homepage layout manager, then please select the page to load here.",
					"id" => $short."_about_page",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);

$of_options[] = array( "name" => "Contact Page",
					"desc" => "Please select the page that you have set up with the contact page template. This is important to ensure that the contact form works.",
					"id" => $short."_contact_page",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);

$of_options[] = array( "name" => "Custom Page One",
					"desc" => "If you have enabled custom page one in the homepage layout manager, then please select the page to load here.",
					"id" => $short."_custom_page_one",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);

$of_options[] = array( "name" => "Custom Page Two",
					"desc" => "If you have enabled custom page two in the homepage layout manager, then please select the page to load here.",
					"id" => $short."_custom_page_two",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);

$of_options[] = array( "name" => "Custom Page Three",
					"desc" => "If you have enabled custom page three in the homepage layout manager, then please select the page to load here.",
					"id" => $short."_custom_page_three",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);

// ************** HOME OPTIONS

$of_options[] = array( "name" => "Home Options",
					"type" => "heading");

$of_options[] = array( "name" => "Show the showcase slider",
					"desc" => "Show the showcase slider within the home section",
					"id" => $short."_show_showcase",
					"std" => true,
					"type" => "checkbox");			

$of_options[] = array( "name" => "Show the showcase slider left / right controls",
					"desc" => "Show the showcase slider left / right controls (these only show when you hover the image).",
					"id" => $short."_show_showcase_nav",
					"std" => true,
					"type" => "checkbox");	

$of_options[] = array( "name" => "Show the showcase slider pagination controls",
					"desc" => "Show the showcase slider pagination bullets",
					"id" => $short."_show_showcase_controls",
					"std" => true,
					"type" => "checkbox");	

$of_options[] = array( "name" => "Show tagline",
					"desc" => "Show the tagline within the home section",
					"id" => $short."_show_tagline",
					"std" => true,
					"type" => "checkbox");

$of_options[] = array( "name" => "Tagline text",
                    "desc" => "The text in the tagline section. Tip: use <span>text here</span> tags make text your styling colour.",
                    "id" => $short."_tagline_normal_text",
                    "std" => "Ability is an <span>incredibly powerful</span> theme, built upon a <span>slick</span> framework with a <span>super clean</span> & <span>responsive</span> design.",
                    "type" => "text");					

// $of_options[] = array( "name" => "Show home section feature widgets",
// 					"desc" => "Show the feature widgets within the home section",
// 					"id" => $short."_show_home_widgets",
// 					"std" => true,
// 					"type" => "checkbox");

// $of_options[] = array( "name" => "Homepage Widgets",
// 					"desc" => "Add homepage widgets using the manager on the left. Ideally you want to use either 4 or 8 items, so that it keeps in order with the design.",
// 					"id" => $short."_home_widgets",
// 					"std" => "",
// 					"type" => "slider");


// ************** PORTFOLIO OPTIONS

$of_options[] = array( "name" => "Portfolio Options",
					"type" => "heading");

$of_options[] = array( "name" => "Custom portfolio showcase background image",
					"desc" => "Either upload or provide a link to your own background here, or choose from the presets below.",
					"id" => $short."_portfolio_bg_upload",
					"std" => "",
					"type" => "media");

$of_options[] = array( "name" => "Preset portfolio showcase background image",
					"desc" => "Select a background image that is displayed as the backdrop for the portfolio detail item.",
					"id" => $short."_preset_portfolio_bg",
					"std" => "",
					"type" => "tiles",
					"options" => $portfolio_bg_images,
					);

$of_options[] = array( "name" => "Number of portfolio items on homepage",
					"desc" => "The number of portfolio items on the homepage template.",
					"id" => $short."_prortfolio_items_home",
					"std" => "12",
					"type" => "text");

$of_options[] = array( "name" => "Enabled Portfolio Filtering",
					"desc" => "Select this if you wish to enable portfolio filtering.",
					"id" => $short."_portfolio_filtering",
					"std" => true,
					"type" => "checkbox");


// ************** BLOG OPTIONS

$of_options[] = array( "name" => "Blog Options",
					"type" => "heading");                            

$of_options[] = array( "name" => "Number of blog posts per page",
					"desc" => "The number of blog posts to show per page.",
					"id" => $short."_number_blog_items",
					"std" => "10",
					"type" => "text"); 

$of_options[] = array( "name" => "Number of recent blog posts on article page",
					"desc" => "The number of recent blog posts shown below the article on the article page.",
					"id" => $short."_more_blog_items",
					"std" => "4",
					"type" => "text"); 
					
$of_options[] = array( "name" => "One Page Blog Category",
					"desc" => "Select the category you want to the blog to use on the one page template.",
					"id" => $short."_one_page_blog_cat",
					"std" => "",
					"type" => "select",
					"options" => $of_categories);					


// ************** CONTACT OPTIONS

$of_options[] = array( "name" => "Contact Options",
					"type" => "heading"); 

$of_options[] = array( "name" => "Contact form text",
					"desc" => "The text that is shown above the contact form.",
					"id" => $short."_contact_text_str",
					"std" => "If you'd like to hire us, or even just say hello, then please use the form below. We aim to get back to all emails within 24 hours.",
					"type" => "textarea"); 

$of_options[] = array( "name" => "Contact form email address",
					"desc" => "The email address that contact forme emails are sent to",
					"id" => $short."_contact_email_address_str",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Contact form from name",
					"desc" => "The name that your emails are sent from",
					"id" => $short."_contact_from_name_str",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Contact form subject",
					"desc" => "The subject that your emails are sent with",
					"id" => $short."_contact_form_subject_str",
					"std" => "Contact form email",
					"type" => "text");


// ************** SOCIAL PROFILES

$of_options[] = array( "name" => "Social Profiles",
					"type" => "heading"); 
					
$of_options[] = array( "name" => "Social Profiles",
					"desc" => "",
					"id" => $short."_introduction",
					"std" => "These social profile links are used to power the social icon shortcode. If you include a link/username here, then the icon will be included in the shortcode's output.",
					"icon" => true,
					"type" => "info");      

$of_options[] = array( "name" => "Twitter",
					"desc" => "Your Twitter username (no @).",
					"id" => $short."_twitter_username",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Facebook",
					"desc" => "Your facebook page/profile url",
					"id" => $short."_facebook_page_url",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Dribbble",
					"desc" => "Your Dribbble username",
					"id" => $short."_dribbble_username",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Vimeo",
					"desc" => "Your Vimeo username",
					"id" => $short."_vimeo_username",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Tumblr",
					"desc" => "Your Tumblr username",
					"id" => $short."_tumblr_username",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Spotify",
					"desc" => "Your spotify username",
					"id" => $short."_spotify_username",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Skype",
					"desc" => "Your Skype username",
					"id" => $short."_skype_username",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "LinkedIn",
					"desc" => "Your LinkedIn page/profile url",
					"id" => $short."_linkedin_page_url",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Last.fm",
					"desc" => "Your Last.fm username",
					"id" => $short."_lastfm_username",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Google+",
					"desc" => "Your Google+ page/profile URL",
					"id" => $short."_googleplus_page_url",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Flickr",
					"desc" => "Your Flickr page url",
					"id" => $short."_flickr_page_url",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "YouTube",
					"desc" => "Your YouTube username",
					"id" => $short."_youtube_username",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Behance",
					"desc" => "Your Behance username",
					"id" => $short."_behance_username",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Pinterest",
					"desc" => "Your Pinterest username",
					"id" => $short."_pinterest_username",
					"std" => "",
					"type" => "text"); 


// ************** TRANSLATION OPTIONS

$of_options[] = array( "name" => "Translation",
					"type" => "heading"); 	   

$of_options[] = array( "name" => "Translation Options",
					"desc" => "",
					"id" => $short."_introduction",
					"std" => "You can use these input boxes to specify names for various strings across the theme. You can also use this to provide strings in your desired language for the site.",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => "Portfolio title",
					"desc" => "",
					"id" => $short."_portfolio_title_str",
					"std" => "Portfolio",
					"type" => "text");

$of_options[] = array( "name" => "Portfolio tagline",
					"desc" => "",
					"id" => $short."_portfolio_tag_str",
					"std" => "A selection of our client work, and internal experiments.",
					"type" => "text"); 

$of_options[] = array( "name" => "Portfolio view all button text",
					"desc" => "",
					"id" => $short."_portfolio_view_btn_str",
					"std" => "View all &rarr;",
					"type" => "text"); 

$of_options[] = array( "name" => "Blog title",
					"desc" => "",
					"id" => $short."_blog_title_str",
					"std" => "Blog",
					"type" => "text");

$of_options[] = array( "name" => "Blog tagline",
					"desc" => "",
					"id" => $short."_blog_tag_str",
					"std" => "Our thoughts, feelings, and interesting news.",
					"type" => "text"); 

$of_options[] = array( "name" => "Blog view all button text",
					"desc" => "",
					"id" => $short."_blog_view_btn_str",
					"std" => "View all &rarr;",
					"type" => "text");

$of_options[] = array( "name" => "Older entries button text",
					"desc" => "",
					"id" => $short."_older_entries_btn_str",
					"std" => "&larr; Older Entries",
					"type" => "text");

$of_options[] = array( "name" => "Newer entries button text",
					"desc" => "",
					"id" => $short."_newer_entries_btn_str",
					"std" => "Newer Entries &rarr;",
					"type" => "text");

$of_options[] = array( "name" => "Back to blog button text",
					"desc" => "",
					"id" => $short."_blog_back_btn_str",
					"std" => "Back to blog &rarr;",
					"type" => "text");


$of_options[] = array( "name" => "Recent posts title",
					"desc" => "",
					"id" => $short."_recent_posts_title_str",
					"std" => "Recent Posts",
					"type" => "text");

$of_options[] = array( "name" => "Contact title",
					"desc" => "",
					"id" => $short."_contact_title_str",
					"std" => "Contact",
					"type" => "text");

$of_options[] = array( "name" => "Contact tagline",
					"desc" => "",
					"id" => $short."_contact_tag_str",
					"std" => "Send us a message, we'd love to hear from you!",
					"type" => "text"); 

$of_options[] = array( "name" => "Contact form success text",
					"desc" => "The text that is shown when the contact for has successfully sent",
					"id" => $short."_contact_success_text_str",
					"std" => "Thank you for your email, we will get back to you shortly.",
					"type" => "text");

$of_options[] = array( "name" => "Contact form name field label",
					"desc" => "",
					"id" => $short."_contact_name_field_str",
					"std" => "Name",
					"type" => "text"); 

$of_options[] = array( "name" => "Contact form email field label",
					"desc" => "",
					"id" => $short."_contact_email_field_str",
					"std" => "Email",
					"type" => "text"); 

$of_options[] = array( "name" => "Contact form message field label",
					"desc" => "",
					"id" => $short."_contact_message_field_str",
					"std" => "Message",
					"type" => "text");

$of_options[] = array( "name" => "Contact form send button text",
					"desc" => "",
					"id" => $short."_contact_send_btn_str",
					"std" => "Send",
					"type" => "text"); 

$of_options[] = array( "name" => "404 not found message",
					"desc" => "The message that is displayed when no page can be found.",
					"id" => $short."_404_message_str",
					"std" => "The page you were looking for could not be found, please use the navigation above to navigate further.",
					"type" => "text"); 
					
// Backup Options
$of_options[] = array( "name" => "Backup Options",
					"type" => "heading");
					
$of_options[] = array( "name" => "Backup and Restore Options",
                    "desc" => "",
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"options" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
					);
					
	}
}

?>