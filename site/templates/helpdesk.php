<?php snippet('header') ?>

<?php
// OPTIONS - PLEASE CONFIGURE THESE BEFORE USE!

$yourEmail = "info@detuut.be"; // the email address you wish to receive these mails through
$yourWebsite = "De tuut van tegenwoordig"; // the name of your website
$thanksPage = ''; // URL to 'thanks for sending mail' page; leave empty to keep message on the same page 
$maxPoints = 4; // max points a person can hit before it refuses to submit - recommend 4
$requiredFields = "name,email,comments"; // names of the fields you'd like to be required as a minimum, separate each field with a comma

// DO NOT EDIT BELOW HERE
$error_msg = array();
$result = null;

$requiredFields = explode(",", $requiredFields);

function clean($data) {
	$data = trim(stripslashes(strip_tags($data)));
	return $data;
}
function isBot() {
	$bots = array("Indy", "Blaiz", "Java", "libwww-perl", "Python", "OutfoxBot", "User-Agent", "PycURL", "AlphaServer", "T8Abot", "Syntryx", "WinHttp", "WebBandit", "nicebot", "Teoma", "alexa", "froogle", "inktomi", "looksmart", "URL_Spider_SQL", "Firefly", "NationalDirectory", "Ask Jeeves", "TECNOSEEK", "InfoSeek", "WebFindBot", "girafabot", "crawler", "www.galaxy.com", "Googlebot", "Scooter", "Slurp", "appie", "FAST", "WebBug", "Spade", "ZyBorg", "rabaz");

	foreach ($bots as $bot)
		if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false)
			return true;

	if (empty($_SERVER['HTTP_USER_AGENT']) || $_SERVER['HTTP_USER_AGENT'] == " ")
		return true;
	
	return false;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isBot() !== false)
		$error_msg[] = "No bots please! UA reported as: ".$_SERVER['HTTP_USER_AGENT'];
		
	// lets check a few things - not enough to trigger an error on their own, but worth assigning a spam score.. 
	// score quickly adds up therefore allowing genuine users with 'accidental' score through but cutting out real spam :)
	$points = (int)0;
	
	$badwords = array("adult", "beastial", "bestial", "blowjob", "clit", "cum", "cunilingus", "cunillingus", "cunnilingus", "cunt", "ejaculate", "fag", "felatio", "fellatio", "fuck", "fuk", "fuks", "gangbang", "gangbanged", "gangbangs", "hotsex", "hardcode", "jism", "jiz", "orgasim", "orgasims", "orgasm", "orgasms", "phonesex", "phuk", "phuq", "pussies", "pussy", "spunk", "xxx", "viagra", "phentermine", "tramadol", "adipex", "advai", "alprazolam", "ambien", "ambian", "amoxicillin", "antivert", "blackjack", "backgammon", "texas", "holdem", "poker", "carisoprodol", "ciara", "ciprofloxacin", "debt", "dating", "porn", "link=", "voyeur", "content-type", "bcc:", "cc:", "document.cookie", "onclick", "onload", "javascript");

	foreach ($badwords as $word)
		if (
			strpos(strtolower($_POST['comments']), $word) !== false || 
			strpos(strtolower($_POST['name']), $word) !== false
		)
			$points += 2;
	
	if (strpos($_POST['comments'], "http://") !== false || strpos($_POST['comments'], "www.") !== false)
		$points += 2;
	if (isset($_POST['nojs']))
		$points += 1;
	if (preg_match("/(<.*>)/i", $_POST['comments']))
		$points += 2;
	if (strlen($_POST['name']) < 3)
		$points += 1;
	if (strlen($_POST['comments']) < 15 || strlen($_POST['comments'] > 1500))
		$points += 2;
	if (preg_match("/[bcdfghjklmnpqrstvwxyz]{7,}/i", $_POST['comments']))
		$points += 1;
	// end score assignments

	foreach($requiredFields as $field) {
		trim($_POST[$field]);
		
		if (!isset($_POST[$field]) || empty($_POST[$field]) && array_pop($error_msg) != "Gelieve alle velden in de vullen.\r\n")
			$error_msg[] = "Gelieve alle velden in de vullen.";
	}

	if (!empty($_POST['name']) && !preg_match("/^[a-zA-Z-'\s]*$/", stripslashes($_POST['name'])))
		$error_msg[] = "Dit veld mag geen speciale characters bevatten.\r\n";
	if (!empty($_POST['email']) && !preg_match('/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i', strtolower($_POST['email'])))
		$error_msg[] = "Dit is geen geldig email-adres.\r\n";
	
	if ($error_msg == NULL && $points <= $maxPoints) {
		$subject = "Automatische mail";
		
		$message = "Email helpdesk de tuut van tegenwoordig: \n\n";
		$message .= "\r\n";
		$message .= "Naam: " . $_POST['name'] . "\r\n";
		$message .= "Email: " . $_POST['email'] . "\r\n";
		$message .= "Bericht: ". "\r\n"  . $_POST['comments'] . "\r\n";

		$message .= "\r\n";
		$message .= 'IP: '.$_SERVER['REMOTE_ADDR']."\r\n";
		$message .= 'Browser: '.$_SERVER['HTTP_USER_AGENT']."\r\n";
		$message .= 'Aantal pogingen: '.$points;

		if (strstr($_SERVER['SERVER_SOFTWARE'], "Win")) {
			$headers   = "From: $yourEmail\r\n";
		} else {
			$headers   = "From: $yourWebsite <$yourEmail>\r\n";	
		}
		$headers  .= "Reply-To: {$_POST['email']}\r\n";

		if (mail($yourEmail,$subject,$message,$headers)) {
			if (!empty($thanksPage)) {
				header("Location: $thanksPage");
				exit;
			} else {
				$result = 'De mail is correct verstuurd.';
				$disable = true;
			}
		} else {
			$error_msg[] = 'De mail is niet verstuurd:. ['.$points.']';
		}
	} else {
		if (empty($error_msg))
			$error_msg[] = 'Deze mail lijkt teveel op spam. De mail is niet verstuurd. ['.$points.']';
	}
}
function get_data($var) {
	if (isset($_POST[$var]))
		echo htmlspecialchars($_POST[$var]);
}
?>

  <main class="main" role="main">
  	<div class="helpdesk">
  		<h1><?php echo $page->title()->html() ?></h1>
	    <div class="intro">
	      <?php echo $page->intro()->kirbytext() ?>
	    </div>

	    <div class="container">
	      <?php echo $page->text()->kirbytext() ?>

	      	
			
			<form action="<?php echo $page->url()?>" method="post">
			<noscript>
					<p><input type="hidden" name="nojs" id="nojs" /></p>
			</noscript>
		
				<span class="left">
					<label for="name">Naam: (<strong>*</strong>)</label> <br />
					<input type="text" name="name" id="name" value="<?php get_data("name"); ?>" /><br />

				<label for="email">E-mail: (<strong>*</strong>)</label> <br />
				<input type="text" name="email" id="email" value="<?php get_data("email"); ?>" /><br />

				<?php
					if (!empty($error_msg)) {
						echo '<p class="bg-danger">* '. implode("<br />", $error_msg) . "</p>";
					}
					if ($result != NULL) {
						echo '<p class="bg-success">'. $result . "</p>";
					}
				?>
				</span>

				<span class="right">
				<label for="comments">Bericht: (<strong>*</strong>)</label> <br />
				<textarea name="comments" id="comments"><?php get_data("comments"); ?></textarea><br />
				<input type="submit" name="submit" id="submit" value="Send" <?php if (isset($disable) && $disable === true) echo ' disabled="disabled"'; ?> />
				</span>

			</form>
			
	    </div>
    </div>
  </main>

<?php snippet('footer') ?>