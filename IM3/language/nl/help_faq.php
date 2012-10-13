<?php
/**
*
* help_faq [Nederlands]
*
* @package language
* @version $Id: help_faq.php 9623 2009-06-18 18:12:28Z nickvergessen $
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
global $user, $phpbb_root_path;


/*
* The following global is needed by Download MOD to display icons in the help texts
*/
global $user;
$help = array(
	array(
		0 => '--',
		1 => 'Login en registratie vragen'
	),
	array(
		0 => 'Waarom kan ik niet inloggen?',
		1 => 'Er zijn verschillende redenen mogelijk waarom je dit probleem hebt. Controleer eerst of je gebruikersnaam en wachtwoord kloppen. Indien ze correct zijn kun je de beheerder contacteren om zeker te zijn dat je niet verbannen bent. Het is ook mogelijk dat de forum configuratie fout is, dan moet dit door de beheerder opgelost worden.'
	),
	array(
		0 => 'Waarom moet ik me registreren?',
		1 => 'De beheerder heeft bepaald of je al dan niet geregistreerd moet zijn om berichten te plaatsen. Hoe dan ook, als je geregistreerd bent, kun je meer functies gebruiken. Zo kan je bijvoorbeeld een avatar opgeven, priv&eacute; berichten sturen, andere gebruikers e-mailen, lid worden van gebruikersgroepen, enz. Het registreren duurt maar even, dus we raden het zeker aan!'
	),
	array(
		0 => 'Waarom word ik automatisch uitgelogd?',
		1 => 'Als je de optie <em>log mij automatisch in bij ieder bezoek</em> niet aanvinkt, blijf je maar voor een bepaalde tijd ingelogd. Zo wordt vermeden dat anderen je account misbruiken. Om ingelogd te blijven, moet je bij het inloggen de optie aanvinken. We raden dit echter af als je het gebruik maakt van een openbare computer, bijvoorbeeld op school, in de bibliotheek, in een internet caf&eacute;, enz. Als deze optie niet beschikbaar is, heeft de beheerder deze uitgeschakeld.'
	),
	array(
		0 => 'Hoe kan ik onzichtbaar zijn in de online gebruikers lijst?',
		1 => 'In het gebruikerspaneel onder &quot;forum instellingen&quot;, vind je de optie <em>onzichtbaar als ik online ben</em>. Als je deze optie activeert door <samp>ja</samp> aan te duiden, zal je onzichtbaar zijn voor iedereen, behalve voor beheerders, moderators en jezelf.'
	),
	array(
		0 => 'Ik weet mijn wachtwoord niet meer!',
		1 => 'Geen paniek! Je kan je huidige wachtwoord niet terug krijgen, maar er is wel een mogelijk om het te resetten. Hiervoor moet je naar de login pagina gaan en klikken op <em>wachtwoord vergeten?</em>. Volg de instructies op het scherm en wat later kan je weer inloggen.'
	),
	array(
		0 => 'Ik ben geregistreerd maar kan niet inloggen!',
		1 => 'Controleer eerst of je gebruikersnaam en wachtwoord kloppen. Indien ze correct zijn kan &eacute;&eacute;n of meerdere zaken hiervan de oorzaak zijn. Indien COPPA geactiveerd is en je tijdens het registratieproces opgaf dat je jonger bent dan 13 jaar, moet je de ontvangen instructies opvolgen. Als dit niet het geval is, moet je account dan geactiveerd worden? Sommige forums vereisen dat iedere nieuwe account geactiveerd wordt, ofwel door jezelf of door een beheerder. Wanneer je je geregistreerd hebt werd ook medegedeeld of dit al dan niet nodig is. Indien je een e-mail ontvangen hebt, moet je de daarin opgegeven instructies volgen. Als je nooit een e-mail ontvangen hebt, was het opgegeven e-mailadres dan wel juist? &Eacute;&eacute;n van de redenen van activatie is om het aantal valse accounts te doen dalen. Als je zeker bent dat je e-mailadres correct was, neem dan contact op met de beheerder.'
	),
	array(
		0 => 'Ik heb me ooit geregistreerd maar kan nu niet meer inloggen!?',
		1 => 'De meest voorkomende oorzaken hiervoor zijn je gaf een verkeerde gebruikersnaam of wachtwoord op (controleer de e-mail met je registratie gegevens) of de beheerder verwijderde je account om &eacute;&eacute;n of andere reden. Indien dit laatste het geval is, heb je dan ooit een bericht geplaatst? Het is normaal dat forums om de zoveel tijd gebruikers, die nog geen berichten geplaatst hebben, verwijderen. Dit doen ze om de database qua omvang te verkleinen. Probeer je opnieuw te registreren en vermeng je in de discussies.'
	),
	array(
		0 => 'Wat is COPPA?',
		1 => 'COPPA is de afkorting voor het Engelse &quot;Child Online Privacy and Protection Act&quot;. Dit is een Amerikaanse wet van 1998 die vereist dat iedere website die mogelijk gegevens van jongeren onder de 13 jaar verzameld, hiervoor de toestemming heeft van de ouders. Deze toestemming moet schrijftelijk of op een andere wijze gegeven worden, zodat de ouders waten dat de website persoonlijke gegevens van hun kind, jonger dan 13, heeft. Indien je niet zeker bent of deze wet al dan niet op jouw of de website waarop je wilt registreren van toepassing is, neem dan contact op met een juridisch raadgever voor meer informatie. Houdt er rekening mee dat het phpBB team geen wettelijke informatie kan verschaffen en ook niet het aanspreekpunt is voor deze wetgeving, tenzij dit hieronder vermeldt wordt.',
	),
	array(
		0 => 'Waarom kan ik niet registreren?',
		1 => 'Mogelijk heeft de beheerder je IP-adres verbannen, of de gebruikersnaam die je opgeeft verboden. Tevens is het mogelijk dat de beheerder de registratie mogelijkheid heeft uitgeschakeld om zo de registratie van nieuwe gebruikers te voorkomen. Contacteer de beheerder voor verdere hulp.',
	),	
	array(
		0 => 'Wat doet &quot;verwijder alle forum cookies&quot;?',
		1 => 'Verwijder alle forum cookies zorgt dat alle cookies die door phpBB3 aangemaakt werden, verwijdert worden. Deze cookies zorgen ervoor dat je ingelogd bent en geven ook de mogelijkheid, indien de beheerder dit inschakelde, om te zien welke onderwerpen je al gelezen hebt.',
	),
	array(
		0 => '--',
		1 => 'Gebruikers voorkeuren en instellingen'
	),
	array(
		0 => 'Hoe verander ik mijn instellingen?',
		1 => 'Als je geregistreerd bent, worden al je gegevens opgeslagen in de database. Om ze te wijzigen moet je op de <em>gebruikerspaneel</em> link klikken (deze staat meestal bovenaan op de pagina, maar dit kan verschillen), daarna kan je je instellingen wijzigen.'
	),
	array(
		0 => 'De tijden zijn niet correct!',
		1 => 'Het is mogelijk dat de tijd die gegeven wordt van een andere tijdzone is dan waarin jij woont. Als dit het geval is, moet je naar het gebruikerspaneel gaan en je tijdzone veranderen in een bepaald gebied (vb: Amsterdam, New York, Sydney, enz.). Wees er bewust van dat het veranderen van de tijdzone, zoals de meeste instellingen, alleen gedaan kunnen worden door geregistreerde gebruikers. Als je nog niet geregistreerd bent is dit een goed moment om dit te doen.'
	),
	array(
		0 => 'Ik wijzigde de tijdzone, maar de tijd is nog steeds verkeerd!',
		1 => 'Als je zeker bent dat je de correcte tijdzone en zomertijd goed hebt ingevuld en de tijd is nog steeds anders, is waarschijnlijk de tijd op de server verkeerd ingesteld en zullen de beheerders een correctie moeten maken.'
	),
	array(
		0 => 'Mijn taal zit niet in de lijst!',
		1 => 'De meest voorkomende reden hiervoor is dat de beheerder jouw taal niet ge&iuml;nstalleerd heeft, of dat nog niemand het forum in je taal vertaald heeft. Je kan altijd aan de beheerder vragen of hij het talen pakket dat jij nodig hebt wil installeren. Indien het nog niet bestaat, mag je gerust de vertaling maken. Meer informatie hieromtrent kan gevonden worden op de website van de phpBB groep (de link staat onderaan iedere pagina).'
	),
	array(
		0 => 'Hoe kan ik een afbeelding onder mijn gebruikersnaam plaatsen?',
		1 => 'Er kunnen 2 afbeeldingen onder een gebruikersnaam staan als je berichten leest. De eerste afbeelding geeft aan welke rang je hebt, meestal zijn dit sterretjes of blokjes die aangeven hoeveel berichten je geplaatst hebt of wat je status is. Hieronder kan nog een tweede afbeelding staan, beter bekend als een avatar. Deze afbeelding is meestal uniek of persoonlijk voor iedere gebruiker. De beheerder heeft de keuze om avatars al dan niet in te schakelen. Tevens beslist deze ook over de manier waarop iemand een avatar kan kiezen. Als je dus geen gebruik kan maken van avatars, heeft de beheerder dat zo ingesteld en moet je dus hem/haar contacteren met je vragen hieromtrent.'
	),
	array(
		0 => 'Hoe verander ik mijn rang?',
		1 => 'Over het algemeen kan je je rang niet wijzigen (deze staat onder je gebruikersnaam bij je berichten en op je profiel, maar dit is afhankelijk van de gebruikte stijl). De meeste forums gebruiken rangs om aan te geven hoeveel berichten je geplaatst hebt, maar bepaalde gebruikers zoals bijvoorbeeld moderators en beheerders hebben ook een aparte rang. Nu moet je natuurlijk het forum niet beginnen spammen met onzinnig veel berichten, gewoon voor een hogere rang. Dit heeft zelfs mogelijk het tegenovergestelde effect, een beheerder of moderator kan je berichten aantal doen dalen.'
	),
	array(
		0 => 'Wanneer ik op de e-mail link van een gebruiker klik, moet ik inloggen?',
		1 => 'Alleen geregistreerde gebruikers kunnen gebruik maken van het ingebouwde e-mail formulier (indien de beheerder dit heeft ingeschakeld). Dit om misbruik van het e-mail systeem door anonieme gebruikers te voorkomen.'
	),
	array(
		0 => '--',
		1 => 'Vragen in verband met het plaatsen van berichten'
	),
	array(
		0 => 'Hoe plaats ik een onderwerp in een forum?',
		1 => 'Om een nieuw onderwerp in &eacute;&eacute;n van de forums te plaatsen, klik je op de bijhorende knop op ofwel de pagina met onderwerpen of in een bepaald onderwerp. Mogelijk moet je je registreren voor je een nieuw onderwerp kan aanmaken, de rechten die je al dan niet hebt in het forum staan onderaan de pagina met onderwerpen of in een onderwerp (de lijst met <em>je mag geen nieuwe onderwerpen in dit forum plaatsen, je mag niet antwoorden op een onderwerp in dit forum, enz.</em>).'
	),
	array(
		0 => 'Hoe wijzig of verwijder ik een bericht?',
		1 => 'Tenzij je de beheerder of een moderator bent, kan je alleen je eigen berichten wijzigen en verwijderen. Je kan een bericht wijzigen (soms maar voor een beperkte tijd nadat het geplaatst is) door te klikken op de <em>wijzig</em> knop van het desbetreffende bericht. Als er al iemand op je bericht gereageerd heeft, komt er onderaan je bericht een klein tekstje dat zegt hoeveel keer en wanneer je het bericht voor het laatst je gewijzigd hebt. Dit zal niet verschijnen als nog niemand gereageerd heeft, evenmin als een beheerder of moderator je bericht gewijzigd heeft. Zij kunnen wel een mededeling toevoegen, waarom ze je bericht gewijzigd hebben. Het verwijderen van een bericht is niet meer mogelijk van zodra er iemand gereageerd heeft.'
	),
	array(
		0 => 'Hoe voeg ik een onderschrift toe aan mijn bericht?',
		1 => 'Om een onderschrift aan je bericht toe te voegen, moet je er eerst &eacute;&eacute;n maken. Dit kan je via het gebruikerspaneel doen. Vanaf je dit gedaan hebt, kan je de optie <em>voeg mijn onderschrift toe</em> aanvinken als je een bericht plaatst. Je kan er ook voor zorgen dat je onderschrift automatisch aan ieder nieuw bericht wordt toegevoegd. Dit doe je door de bijhorende optie te activeren in het gebruikerspaneel (het is nog altijd mogelijk om het onderschrift uit te schakelen als je het bericht plaatst).'
	),
	array(
		0 => 'Hoe maak ik een poll?',
		1 => 'Een poll aanmaken is heel gemakkelijk, als je een nieuw onderwerp aanmaakt (of het eerste bericht in een onderwerp bewerkt, als je daar permissie voor hebt) zou je een &quot;voeg poll toe&quot; tabblad moeten zijn onderaan het posting-gedeelte (als je dit tabblad niet kunt zien heb je niet de juiste rechten om polls aan te maken). Je moet een titel voor de poll invullen bij &quot;poll vraag&quot; en dan minstens 2 mogelijkheden invullen in het &quot;poll opties&quot;-tekstgedeelte (limiet is ingesteld door de beheerder), met elke optie gescheiden door middel van een nieuwe regel. Je kunt ook instellen hoeveel opties een gebruiker mag kiezen onder &quot;opties per gebruiker&quot; en een tijdslimiet in dagen voor de poll (0 is een poll van oneindige duur).'
	),
	array(
		0 => 'Waarom kan ik niet meer poll opties toevoegen?',
		1 => 'De poll optie limiet is door de beheerder gezet. Wanneer je vindt dat je meer opties hebt voor je poll dan het ingestelde maximum toegestane aantal, neem dan kontact op met de beheerder.'
	),
	array(
		0 => 'Hoe wijzig of verwijder ik een poll?',
		1 => 'Net zoals bij de berichten kan een poll alleen gewijzigd worden door degene die hem gemaakt heeft, een moderator of beheerder. Om de poll te wijzigen moet je het allereerste bericht van het onderwerp wijzigen (hieraan is de poll gekoppeld). Als er nog geen stmmen zijn uitgebracht kunnen gebruikers de poll verwijderen of iedere poll optie wijzigen. Maar, als er reeds gestemd is kunnen alleen moderators of beheerders hem wijzigen of verwijderen. Dit om te verkomen dat gebruikers een poll maken en deze daarna vervalsen door de opties te wijzigen.'
	),
	array(
		0 => 'Waarom kan ik een bepaald forum niet openen?',
		1 => 'Sommige forums zijn mogelijk alleen toegankelijk voor bepaalde gebruikers of gebruikersgroepen. Om berichten te zien, lezen, plaatsen, enz. heb je speciale rechten nodig. Deze rechten kan je alleen van moderators of beheerders krijgen, zij zijn dus ook degene die je hierover moet contacteren.'
	),
	array(
		0 => 'Waarom kan ik geen bijlagen toevoegen?',
		1 => 'De mogelijkheid om bijlagen toe te voegen, kan per forum, per gebruikersgroep of per gebruiker ingesteld worden. De beheerder kan het bijvoorbeeld zo ingesteld hebben dat je in een bepaald forum helemaal geen bijlagen mag toevoegen, of dat alleen de beheerders groep dit mag. Neem contact op met de beheerder als je niet zeker weet waarom je geen bijlagen kan toevoegen.'
	),
	array(
		0 => 'Waarom ontving ik een waarschuwing?',
		1 => 'Op ieder forum gelden specifieke regels, als je &eacute;&eacute;n van deze regels (volgens de beheerder) overtreedt, kun je een waarschuwing ontvangen. Het sturen van een waarschuwing naar jouw is een beslissing van de beheerder, de phpBB groep heeft hier dus in geen geval iets mee te maken.'
	),
	array(
		0 => 'Hoe kan ik berichten aan een moderator melden?',
		1 => 'Als de beheerder het toelaat, kun je op de hiervoor dienende knop klikken bij het bericht. Als je hierop geklikt hebt, moet je een paar nodige stappen volgen om de melding te versturen.'
	),
	array(
		0 => 'Waarvoor dient de &quot;opslaan&quot; knop bij het plaatsen van een bericht?',
		1 => 'Hiermee kun je berichten opslaan om ze dan later af te werken en te plaatsen. Een opgeslagen bericht kan je, via de bijhorende optie, in het gebruikerspaneel weer laden.'
	),
	array(
		0 => 'Waarom moet mijn bericht goedgekeurd worden?',
		1 => 'De beheerder kan beslist hebben dat geplaatste berichten eerst nagekeken moeten worden. Het is tevens ook mogelijk dat de beheerder je in een gebruikersgroep geplaatst heeft waarvan de berichten altijd nagelezen moeten worden. Contacteer de beheerder voor verdere informatie.'
	),
	array(
		0 => 'Hoe bump ik mijn onderwerp?',
		1 => 'Als je een een onderwep aan het bekijken bent, kan je klikken op de &quot;bump onderwerp&quot; link. Hierdoor &quot;bump&quot; je het onderwerp naar boven op de eerste pagina van de onderwerpenlijst. Als deze link er niet staat, kunnen onderwerpen niet gebumpt worden. Een onderwerp kan ook gebumpt worden door een antwoord te plaatsen, maar hou hierbij wel rekening met de regels van het forum.'
	),
	array(
		0 => '--',
		1 => 'Tekstopmaak en onderwerp soorten'
	),
	array(
		0 => 'Wat is BBCode?',
		1 => 'BBCode is een vereenvoudigde versie van html, het gebruik ervan is al dan niet toegestaan door de beheerder (je kan de BBCode ook per bericht uitschakelen, dit is een optie bij het plaatsen van je bericht). De syntax van BBCode is quasi gelijk aan die van HTML, tags worden tussen vierkante haakjes [ en ] geplaatst, dus niet &lt; en &gt;. Daarnaast geeft het ook een grotere controle over hoe iets wordt weergegeven. Meer informatie omtrent BBCode is te vinden in de handleiding die je kan openen als je een bericht plaatst.'
	),
	array(
		0 => 'Kan ik HTML gebruiken?',
		1 => 'Nee, het is niet mogelijk om je bericht op te maken met HTML code. De meeste opmaak die je via HTML kan toepassen is ook via BBCode mogelijk.'
	),
	array(
		0 => 'Wat zijn smilies?',
		1 => 'Smilies zijn kleine afbeeldingen die gebruikt kunnen worden om een gevoelstoestand uit te drukken, bijvoorbeeld :) betekent blij, :( betekent ongelukkig. Alle beschikbare smilies worden weergegeven als je een bericht plaatst. Maak geen overdadig gebruik van smilies, ze maken een bericht snel onleesbaar, wat er toe kan leiden dat een moderator je bericht aanpast of heel je bericht verwijdert. De beheerder kan ook een maximum aantal smilies, dat in een bericht gebruikt mag worden, bepaalt hebben.'
	),
	array(
		0 => 'Kan ik afbeeldingen plaatsen?',
		1 => 'Ja, je kan afbeeldingen in je bericht weergeven. Als de beeheerder bijlagen toelaat, kan je een afbeelding naar het forum uploaden. Anders moet je er voor zorgen dat de afbeelding op een andere publieke server beschikbaar is, bijvoorbeeld http://www.voorbeeld.com/mijn_afbeelding.gif. Linken naar een afbeelding op je eigen computer is onmogelijk (tenzij het een publieke server is). Ook afbeeldingen die een authentificatie vereisen zoals in: Hotmail of Yahoo mailboxen, een wachtwoord beschermde website, enz. kunnen niet worden weergegeven. Om een afbeelding weer te geven, moet je de BBCode tag [img] gebruiken.'
	),
	array(
		0 => 'Wat zijn globale mededelingen?',
		1 => 'Globale mededelingen zijn berichten die belangrijke informatie bevatten, je komt ze dan ook op verschillende plaatsen tegen zoals bovenaan ieder forum en in het gebruikerspaneel. Of je al dan niet globale mededelingen kan plaatsen hangt af van de vereiste rechten, deze zijn ingesteld door de beheerder.'
	),
	array(
		0 => 'Wat zijn mededelingen?',
		1 => 'Mededelingen bevatten vaak belangrijke informatie over het forum dat je aan het lezen bent, je kan deze berichten dan ook het best zo snel mogelijk lezen. Mededelingen verschijnen bovenaan iedere pagina van het forum waarin ze geplaatst zijn. Zoals bij globale mededelingen, hangt het van de vereiste rechten af of je al dan niet mededelingen kan plaatsen. De juiste rechten zijn bepaald door de beheerder.'
	),
	array(
		0 => 'Wat zijn sticky onderwerpen?',
		1 => 'Sticky onderwerpen staan onder de mededelingen in het forum en alleen op de eerste pagina. Meestal zijn deze berichten vrij belangrijk, dus het lezen ervan is aangeraden. Net zoals bij mededelingen bepaalt de beheerder welke rechten je moet hebben om een sticky onderwerp te plaatsen.'
	),
	array(
		0 => 'Wat zijn gesloten onderwerpen?',
		1 => 'Zowel moderators als beerders kunnen onderwerpen sluiten. Je kan niet langer antwoorden op deze berichten en als ze een poll bevatte, eindigd deze automatisch. Onderwerpen kunnen om eender welke reden gesloten worden.'
	),
	array(
		0 => 'Wat zijn onderwerp iconen?',
		1 => 'Onderwerp iconen zijn kleine afbeeldingen die met berichten geassocieerd kunnen worden, om zo hun inhoud aan te tonen. Of je al dan niet gebruik kan maken van onderwerp iconen hangt af van de door de beheerder ingestelde rechten.'
	),
	// This block will switch the FAQ-Questions to the second template column
	array(
		0 => '--',
		1 => '--'
	),
	array(
		0 => '--',
		1 => 'Gebruiker niveaus en gebruikers groepen'
	),
	array(
		0 => 'Wat zijn beheerders?',
		1 => 'Beheerders zijn gebruikers die alle rechten hebben over het gehele forum. Zij beheren alles in verband met het forum, zoals: rechten, het verbannen van gebruikers, gebruikersgroepen of moderators cre&euml;ren, enz. Hun rechten zijn natuurlijk afhankelijk van welke de eigenaar hun heeft toegewezen. Ook afhankelijk van de beslissing van de eigenaar, hebben ze mogelijk alle moderator rechten in de forums.'
	),
	array(
		0 => 'Wat zijn moderators?',
		1 => 'Moderators zijn gebruikers of gebruikersgroepen die in staan voor de dagelijkse werking van het forum. Ze kunnen, in de forums die ze modereren, berichten wijzigen en verwijderen; onderwerpen sluiten, openen, verplaatsen, splitsen en verwijderen. In het algemeen moeten ze er gewoon op toe zien dat mensen niet van het onderwerp afwijken (<em>off-topic</em>) gaan of ongepaste inhoud plaatsen.'
	),
	array(
		0 => 'Wat zijn gebruikersgroepen?',
		1 => 'Als de beheerder gebruikers wil groeperen, kan hij/zij dit doen door middel van gebruikersgroepen. Gebruikers kunnen van meerdere groepen lid zijn (dit verschilt per forum), deze groepen kunnen verschillende rechten/toegangsrechten toegewezen zijn. Op deze manier is het voor de beheerder een stuk gemakkelijker meerdere moderators aan een forum toe te wijzen, bepaalde gebruikers toegang tot een priv&eacute; forum te verlenen, enz.'
	),
	array(
		0 => 'Hoe word ik lid van een gebruikersgroep?',
		1 => 'Om lid van een gebruikersgroep te worden, moet je op de bijhorende link kliken in het gebruikerspaneel, waarna je een overzicht van alle gebruikersgroepen krijgt. Niet alle groepen zijn vrij toegankelijk, ze vereisen een goedkeuring van je lidmaatschap en hebben soms zelf verborgen gebruikers. Als het een open groep is, kan je lid worden door op de hiervoor dienende knop te klikken. Als het een gesloten groep is, kun je je lidmaatschap aanvragen door op de bijhorende knop te klikken. De groepsleider moet je aanvraag dan goedkeuren, hij of zij vraagt mogelijk waarom je lid wil worden. Indien je niet tot een groep toegelaten word, moet je de groepsleider niet lastig vallen, hij of zij heeft een reden om je te weigeren.'
	),
	array(
		0 => 'Hoe word ik een groepsleider?',
		1 => 'Gebruikersgroepen worden door de beheerder gemaakt, deze beslist dus ook wie de groepsleider is. Als je een gebruikersgroep wilt starten, moet je de beheerder contacteren, dit kan door hem/haar een priv&eacute; bericht te sturen.'
	),
	array(
		0 => 'Waarom staan verschillende gebruikersgroepen in een andere kleur?',
		1 => 'De beheerder kan een kleur aan een gebruikersgroep toegewezen hebben, dit is om de leden gemakkelijk te herkennen.'
	),
	array(
		0 => 'Wat is de &quot;standaard gebruikersgroep&quot;?',
		1 => 'Als je lid bent van meerdere gebruikersgroepen, word je standaard gebruikersgroep gebruikt om je groeps kleur en groeps rang te bepalen. De beheerder kan je de rechten geven om je standaard gebruikersgroep te wijzigen via het gebruikerspaneel.'
	),
	array(
		0 => 'Waarvoor dient de &quot;het team&quot; link?',
		1 => 'Als je op deze link klikt, kom je op een pagina die een overzicht geeft van de mensen die het forum beheren. Deze lijst bevat alle beheerders en de moderators, met bijhorende details omtrent welke forums ze modereren.'
	),
	array(
		0 => '--',
		1 => 'Priv&eacute; berichten'
	),
	array(
		0 => 'Ik kan geen priv&eacute; berichten sturen!',
		1 => 'Hiervoor zijn drie redenen mogelijk: ofwel ben je niet geregistreerd en/of ingelogd, de beheerder schakelde de priv&eacute; berichten functie uit, of de beheerder heeft ingesteld dat jij geen priv&eacute; berichten kan sturen. Indien dit laatste het geval is, tracht dan de beheerder te contacteren.'
	),
	array(
		0 => 'Ik blijf ongewenste priv&eacute; berichten ontvangen!',
		1 => 'Je kan gebruikers blokeren zodat ze je geen priv&eacute; berichten meer kunnen sturen, dit gebeurt via het gebruikerspaneel. Als je ongepaste priv&eacute; berichten ontvangt van een bepaalde gebruiker, contacteer dan de beheerder, deze kan ervoor zorgen dat hij of zij niet langer priv&eacute; berichten kan sturen.'
	),
	array(
		0 => 'Ik heb spam of een e-mail met ongepaste inhoud van iemand op dit forum ontvangen!',
		1 => 'Jammer dat we dit moeten horen. Het e-mail formulier van dit forum werkt met een aantal technieken om zenders van zulke berichten te traceren. Het beste wat je kan doen is de beheerder een kopie van het bericht e-mailen, inclusief de hoofding (hierin staan de details van de gebruiker die de e-mail stuurde). Deze zal dan de nodige stappen ondernemen.'
	),
	array(
		0 => '--',
		1 => 'Vrienden en vijanden'
	),
	array(
		0 => 'Waarvoor dient mijn vrienden en vijanden lijst?',
		1 => 'Hiermee kun je andere gebruikers op het forum sorteren. Gebruikers die in je vrienden lijst staan, worden in het gebruikerspaneel weergegeven zodat je snel kan controleren of ze online zijn, of een priv&eacute; bericht kan sturen. Tevens is het mogelijk dat hun berichten, in je huidige template, gemarkeerd worden. Als je een gebruiker aan je vijanden lijst toevoegd, worden zijn of haar berichten standaard verborgen.'
	),
	array(
		0 => 'Hoe verwijder of voeg ik gebruikers toe aan mijn vrienden en/of vijanden lijst?',
		1 => 'Het toevoegen van gebruikers kan op 2 manieren. In het profiel van iedere gebruiker staat er een link om de gebruiker aan je vrienden of vijanden lijst toe te voegen. De tweede manier is via het gebruikerspaneel, dan moet je een gebruikersnaam opgeven. Op dezelfde pagina kan je gebruikers weer van de lijst verwijderen.'
	),
	array(
		0 => '--',
		1 => 'Forums doorzoeken'
	),
	array(
		0 => 'Hoe doorzoek ik het forum?',
		1 => 'Door een zoekterm op te geven in het zoekveld, dat je vindt op de index, forum en onderwerp pagina. Uitgebreid zoeken is mogelijk door op de &quot;zoeken&quot; link te klikken, deze vind je op iedere pagina.'
	),
	array(
		0 => 'Waarom levert mijn zoekopdracht geen resultaten op?',
		1 => 'Je zoekterm was hoogstwaarschijnlijk niet specifiek genoeg en bevatte mogelijk teveel termen die niet door phpBB3 ge&iuml;ndexeerd worden. Wees specifieker en gebruik, bij uitgebreid zoeken, de beschikbare opties.'
	),
	array(
		0 => 'Waarom resulteert mijn zoekopdracht in een lege pagina?',
		1 => 'Je zoekopdracht gaf meer resultaten dan de webserver kon verwerken. Gebruik de geavanceerde zoekfunctie en wees specifieker met zowel je zoektermen als de te doorzoeken forums. '
	),
	array(
		0 => 'Hoe zoek ik een gebruiker?',
		1 => 'Ga naar de &quot;leden&quot; pagina en klik op de &quot;zoek een lid&quot; link. Eens op die pagina, vul je de voor zichzelf sprekende opties in.'
	),
	array(
		0 => 'Hoe kan ik mijn eigen berichten en onderwerpen vinden?',
		1 => 'Je kan je eigen berichten vinden door ofwel op de &quot;toon je eigen berichten&quot; link in het gebruikerspaneel te klikken, of via je eigen profiel. Om je eigen onderwerpen te zoeken, moet je de geavanceerde zoekfunctie gebruiken en de nodige opties invullen.'
	),
	array(
		0 => '--',
		1 => 'Onderwerp abonnementen en bladwijzers'
	),
	array(
		0 => 'Wat is het verschil tussen een bladwijzer en abonnement?',
		1 => 'Bladwijzers in phpBB3 zijn zoals bladwijzers (of favorieten) in je browser. Je wordt niet op de hoogte gebracht van updates, maar je kan altijd snel terugkeren. Het verschil met abonnementen ligt hem in het feit dat je hierbij automatisch op de hoogte gebracht word van updates, dit gebeurd via de door jou gekozen wijze.'
	),
	array(
		0 => 'Hoe abonneer ik me op specifieke forums of onderwerpen?',
		1 => 'Je abonneren op en forum gaat door op de &quot;abonneer je op dit forum&quot; link te klikken zodra je het forum geopend hebt. Een forum en onderwerp abonnement werken op dezelfde wijze. Om je op een onderwerp te abonneren, kan ofwel een antwoord plaatsen en de abonnements optie aanvinken, of je kan op de hiervoor dienende link in het onderwep klikken.'
	),
	array(
		0 => 'Hoe zeg ik mijn abonnement op?',
		1 => 'Om je abonnement op te zeggen, ga je naar het gebruikerspaneel en klik je op de hier voor dienende links.'
	),
	array(
		0 => '--',
		1 => 'bijlagen'
	),
	array(
		0 => 'Welke bijlagen worden toegestaan op dit forum?',
		1 => 'De beheerder bepaalt welke bestandstypes al dan niet toegestaan worden. Als je niet zeker bent welke bestanden ge&uuml;pload mogen worden, contacteer dan de beheerder voor verdere informatie.'
	),
	array(
		0 => 'Hoe vind ik al mijn bijlagen?',
		1 => 'Je vindt een lijst met al je ge&uuml;ploade bijlagen via het gebruikerspaneel, volg hier de links naar het gedeelte omtrent bijlagen.'
	),

	array(
		0 => '--',
		1 => 'Downloads'
	),
	array(
		0 => 'Waar kan ik de downloads vinden?',
		1 => 'Links to the Downloads are located in the board navigation. Directlink: [<a href="' . append_sid("{$phpbb_root_path}downloads.$phpEx") . '">Downloads</a>]'
	),
	array(
		0 => 'What means ' . $user->img('dl_blue') . '?',
		1 => 'No download possible. The overall traffic set by the administration for each download or the displayed category is used for this month.'
	),
	array(
		0 => 'What means ' . $user->img('dl_red') . '?',
		1 => 'No download possible. This can be:<br />- The download is blocked by an Administrator.<br />- The user is not logged in but the download is only allowed to registered users.<br />- The user have not enough traffic to download this file.<br />- The Administrator has entered a minimum number ob posts, the user doesn\'t have.<br />- The traffic limit for this file is completely used.'
	),
	array(
		0 => 'What means ' . $user->img('dl_grey') . '?',
		1 => 'External Source. The download will be started by an external server. This will be handled as ' . $user->img('dl_green') . '. The usertraffic and overall traffic will not be decreased.'
	),
	array(
		0 => 'What means ' . $user->img('dl_white') . '?',
		1 => 'Like ' . $user->img('Dl_green') . ' the user traffic will not be decrease. But only logged in users can download for free. The overall traffic will go down.'
	),
	array(
		0 => 'What means ' . $user->img('dl_yellow') . '?',
		1 => 'Download possible with restrictions. The download is just possible for registered users. The user must be logged in. The file size will be substrated from your traffic and also be substrated from the overall traffic.'
	),
	array(
		0 => 'What means ' . $user->img('dl_green') . '?',
		1 => 'Free Download. The download will be not restricted. This file can also be downloaded by guests. You are not needed to be logged in. Your traffic will not decreased but the overall traffic will be go down.'
	),
	array(
		0 => 'Why can I not download any file?',
		1 => 'This can have many reasons. Look under ' . $user->img('dl_blue') . ' and ' . $user->img('dl_red')
	),
	array(
		0 => 'How and when I get new traffic for my account?',
		1 => 'After the first login the user will get a timestamp. Each first day of a month the user will enter the downloads the traffic will be refreshed. Ask your administrator how much you will get.'
	),
	array(
		0 => 'I wants to download still one more file, but I have not any traffic left?',
		1 => 'In this cases ask the administrator. Only he can decide to increase the user traffic before the account will get automaticaly new traffic the next month.'
	),
	array(
		0 => 'How I can rate Downloads?',
		1 => 'Behind each download into a category or the detail view you will find a section for rating.<br />By click on "Rate" a registered user can rate the download from 1 point (very bad) to 10 points (very good). You can rate a download only one time.'
	),
	array(
		0 => '--',
		1 => 'phpBB 3 Issues'
	),
	array(
		0 => 'Who wrote this bulletin board?',
		1 => 'This software (in its unmodified form) is produced, released and is copyright <a href="http://www.phpbb.com/">phpBB Group</a>. It is made available under the GNU General Public License and may be freely distributed. See the link for more details.'
	),
	array(
		0 => 'Why isn’t X feature available?',
		1 => 'This software was written by and licensed through phpBB Group. If you believe a feature needs to be added, please visit the phpbb.com website and see what phpBB Group have to say. Please do not post feature requests to the board at phpbb.com, the group uses SourceForge to handle tasking of new features. Please read through the forums and see what, if any, our position may already be for a feature and then follow the procedure given there.'
	),
	array(
		0 => 'Who do I contact about abusive and/or legal matters related to this board?',
		1 => 'Any of the administrators listed on the “The team” page should be an appropriate point of contact for your complaints. If this still gets no response then you should contact the owner of the domain (do a <a href="http://www.google.com/search?q=whois">whois lookup</a>) or, if this is running on a free service (e.g. Yahoo!, free.fr, f2s.com, etc.), the management or abuse department of that service. Please note that the phpBB Group has <strong>absolutely no jurisdiction</strong> and cannot in any way be held liable over how, where or by whom this board is used. Do not contact the phpBB Group in relation to any legal (cease and desist, liable, defamatory comment, etc.) matter <strong>not directly related</strong> to the phpBB.com website or the discrete software of phpBB itself. If you do e-mail phpBB Group <strong>about any third party</strong> use of this software then you should expect a terse response or no response at all.'
	)
);

?>