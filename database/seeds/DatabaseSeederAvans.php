<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //information
        DB::table('informatie')->insert([
            'naam' => 'Hoofdpagina',
            'titel' => 'Over ons',
            'informatie' => 'Wij zijn ruilkring Den Bosch, ook wel bekend als Niks voor Niks. Wij zijn een hechte groep van allemaal verschillende mensen die graag diensten of waren van anderen in huis nemen, maar hier liever toch niet voor betalen, vandaar dat wij de niks hebben gemaakt.


            Op dit moment telt de ruilkring ongeveer 100 leden, een aardig aantal. Toch kennen de meeste mensen elkaar erg goed, we zijn bekend met mekaar en kunnen daarom ook altijd zonder problemen even op de koffie of leuk wat gaan doen.


            We hebben allemaal een passie voor iets anders, maar Niks voor Niks geeft ons de optie om deze passie te uiten en tot bloei te laten komen.'
        ]);

        DB::table('informatie')->insert([
            'naam' => 'Overons',
            'titel' => 'Ruilen zonder geld? Hoe gaat dat?',
            'informatie' =>

                'We ruilen onderling onze diensten en goederen. Nancy doet de boekhouding voor Mark. Mark verft het plafond voor Robin. Robin poetst het huis voor Petra. Petra verstelt een broek voor Yvonne. En Yvonne geeft een massage aan Nancy. Het bijzondere van een ruilkring is dat je voor de diensten en goederen zonder geld betaalt. We betalen onze diensten en goederen met een eigen ruilmiddel. In Den Bosch en omstreken is dat de Niks. Dat is geen tastbaar voorwerp of een munt, maar een administratieve manier om de waarde van diensten of goederen vast te leggen. We ruilen dus met Niksen!

            Onze ruilkring startte in 1995. In onze kring ontmoeten de deelnemers elkaar tijdens maandelijkse activiteiten. Daarbij kun je diensten en goederen ruilen. Dat kan ook via onze speciale Niksmail. Dat is een gebruikersgroep op internet, waaraan bijna alle deelnemers meedoen. De ruilkring heeft een sociale functie. We vormen een regionaal, duurzaam en zelfstandig economisch systeem. Door te ruilen zonder geld stellen we mensen in staat om zowel hun talenten te benutten en diensten, kennis en goederen aan te schaffen zonder euros.

            Leuk dat je je misschien wil inschrijven bij onze club! We zijn altijd erg enthusiast om nieuwe deelnemers aan te mogen nemen en kijken daarom ook erg uit naar jouw bijdrage. Om deel te nemen vragen we alleen een paar simpele dingen van je en dan ben je binnen een week voolwaardig lid van onze ruilkring. Eerst vragen we je om naar de Deelnemer worden knop te navigeren op deze website. Daar vind je de mogelijkheid om een van onze leden te mailen en op die manier kun je je dan aanmelden. Na een paar dagen zul je gevraagd worden om langs te komen voor een kop koffie en een gesprek, zodat je al wat mensen kan leren kennen! Als dat allemaal gebeurt is zul je binnen dezelfde week nog horen of je mee kan doen, je krijgt dan je account voor de website en bent officieel lid! Laat het ruilen beginnen'
        ]);

        DB::table('informatie')->insert([
            'naam' => 'Contact',
            'titel' => 'Wil je contact met ons opnemen?',
            'informatie' =>
                '
            Wij begrijpen dat het niet altijd even makkelijk is om precies het concept van een ruilgroep te begrijpen, of misschien zijn er andere vragen die niet worden beantwoord op deze site.
            Achter de ruilkring zit hierom een groep mensen die altijd bereidt is om te helpen wanneer nodig. Voel u vrij om contact op te nemen met een van deze mensen en vraag er op los, wij antwoorden graag!

            Als je informatie wilt, kun je bellen met het secretariaat, te bereiken op: tel. 06 - 22 899 114.
            Voor algemene vragen via de mail kun je ons ook altijd een berichtje sturen op: info.letsdb@gmail.com.

            Betalingen van de contributie zijn mogelijk via ING-rekening

            NL43 INGB 0008 3279 57 ten name van de Lokale Ruilkring \'s-Hertogenbosch.

            Als er vragen zijn over de site of de informatie hierop kun je de webmaster van deze site vragen stell op: info.letsdb@gmail.com.

            Vragen of reacties aan de kerngroep
            Je kunt vragen stellen aan de kerngroep via info.letsdb@gmail.com
            '
        ]);

        //places
        DB::table('plaats')->insert([
            'naam' => 'Rosmalen'
        ]);
        DB::table('plaats')->insert([
            'naam' => 'Den Bosch Centrum'
        ]);
        DB::table('plaats')->insert([
            'naam' => 'Den Bosch Oost'
        ]);
        DB::table('plaats')->insert([
            'naam' => 'Den Bosch West'
        ]);
        DB::table('plaats')->insert([
            'naam' => 'Hambaken'
        ]);
        DB::table('plaats')->insert([
            'naam' => 'Kruiskamp'
        ]);
        DB::table('plaats')->insert([
            'naam' => 'Den Bosch Zuidoost'
        ]);
        DB::table('plaats')->insert([
            'naam' => 'Graafsepoort'
        ]);
        DB::table('plaats')->insert([
            'naam' => 'Muntel/Vliert'
        ]);
        DB::table('plaats')->insert([
            'naam' => 'Empel'
        ]);
        DB::table('plaats')->insert([
            'naam' => 'Maaspoort'
        ]);
        DB::table('plaats')->insert([
            'naam' => 'De Groote Wielen'
        ]);
        DB::table('plaats')->insert([
            'naam' => 'Nuland'
        ]);
        DB::table('plaats')->insert([
            'naam' => 'Vinkel'
        ]);
        //roles
        DB::table('rol')->insert([
            'naam' => 'in_afwachting',
            'beschrijving' => 'Een afwachtende deelnemer van NiksVoorNiks'
        ]);
        DB::table('rol')->insert([
            'naam' => 'administrator',
            'beschrijving' => 'Een beheerder van NiksVoorNiks'
        ]);
        DB::table('rol')->insert([
            'naam' => 'deelnemer',
            'beschrijving' => 'Een standaard deelnemer van NiksVoorNiks'
        ]);

        //activities
        DB::table('activiteit')->insert([
            'naam' => 'Spelletjes avond',
            'beschrijving' => 'Spelletjes avond met bordspellen',
            'datum' => '2020-4-1',
            'max_deelnemers' => 8
        ]);
        DB::table('activiteit')->insert([
            'naam' => 'Bakpartij',
            'beschrijving' => 'Samen gezellig bakken #taartjes',
            'datum' => '2020-05-12',
            'max_deelnemers' => 8

        ]);
        DB::table('activiteit')->insert([
            'naam' => 'Schilderen',
            'beschrijving' => 'Wees de kunstenaar die je altijd al wilde zijn! Leuk!',
            'datum' => '2020-05-12',
            'max_deelnemers' => 12
        ]);
        DB::table('activiteit')->insert([
            'naam' => 'Pannenkoeken bakken',
            'beschrijving' => 'Oom berend en zuster Suzan maken samen met jou de lekkerste Pfannkuchen',
            'datum' => '2021-01-05',
            'max_deelnemers' => 8
        ]);
        DB::table('activiteit')->insert([
            'naam' => 'Skypen',
            'beschrijving' => 'Gezellig met de meiden',
            'datum' => '2021-01-05',
            'max_deelnemers' => 8
        ]);
        DB::table('activiteit')->insert([
            'naam' => 'Boswandeling',
            'beschrijving' => 'Wandeling om het Sint Pieters bos',
            'datum' => '2021-01-05',
            'max_deelnemers' => 6
        ]);

        //categories
        DB::table('categorie')->insert([
            'naam' => 'Koken',
            'beschrijving' => 'Alles in de keuke ',
        ]);
        DB::table('categorie')->insert([
            'naam' => 'Technologie',
            'beschrijving' => 'Alles met telefoontjes en computers',
        ]);
        DB::table('categorie')->insert([
            'naam' => 'Kunst',
            'beschrijving' => 'Alles met schilderen, tekenen en knutselen ',
        ]);
        DB::table('categorie')->insert([
            'naam' => 'Sport',
            'beschrijving' => 'Alles met beweging',
        ]);

        //participants
        DB::table('deelnemer')->insert([
            'email' => 'fhendrik1@avans.nl',
            'wachtwoord' => '$2y$10$dwvl9pwnt8UP36WFcByVNO3LaDDkXtbYHhShvRbTcwqJPi8qMNw4m',
            'voornaam' => 'Ferran',
            'achternaam' => 'Hendriks',
            'geboortedatum' => '1999-08-15',
            'telefoonnummer' => '066666666',
            'postcode' => '5211AC',
            'huisnummer' => '473G',
            'foto' => 'https://townsquare.media/site/366/files/2012/01/adamgontier.jpg?w=980&q=75',
            'niksen' => '66',
            'beschrijving' => 'Student Avans Hogeschool',
            'rol_naam' => 'administrator',
        ]);

        DB::table('deelnemer')->insert([
            'email' => 'jonah@avans.nl',
            'wachtwoord' => 'jonah1234',
            'voornaam' => 'Jonah',
            'achternaam' => 'Dirksen',
            'geboortedatum' => '1998-1-1',
            'telefoonnummer' => '06777777',
            'postcode' => '3584LA',
            'huisnummer' => '55',
            'niksen' => '55',
            'beschrijving' => 'Student Avans Hogeschool',
            'rol_naam' => 'administrator',
        ]);

        DB::table('deelnemer')->insert([
            'email' => 'admin@niksvoorniks.nl',
            'wachtwoord' => 'admin1234',
            'voornaam' => 'Admin',
            'achternaam' => 'Admin',
            'geboortedatum' => '2020-04-01',
            'telefoonnummer' => '069876543',
            'postcode' => '5111AE',
            'huisnummer' => '69',
            'foto' => 'https://yt3.ggpht.com/a/AGF-l7_pLghJ9ZjJzCRmPlw512Ytx_eeIhNChP2jWw=s900-c-k-c0xffffffff-no-rj-mo',
            'niksen' => '66',
            'beschrijving' => 'Admin',
            'rol_naam' => 'administrator',
        ]);

        DB::table('deelnemer')->insert([
            'email' => 'deelnemer@niksvoorniks.nl',
            'wachtwoord' => 'deelnemer1234',
            'voornaam' => 'Deelnemer',
            'tussenvoegsel' => '',
            'achternaam' => 'Deelnemer',
            'geboortedatum' => '2020-04-01',
            'telefoonnummer' => '061234567',
            'postcode' => '5061PA',
            'huisnummer' => '69',
            'foto' => 'https://yt3.ggpht.com/a/AGF-l79nrvVuCiaaTdlZrxnAX6RTFKyXI1idCMUp5A=s900-c-k-c0xffffffff-no-rj-mo',
            'niksen' => '66',
            'beschrijving' => 'Deelnemer',
            'rol_naam' => 'deelnemer',
        ]);

        DB::table('deelnemer')->insert([
            'email' => 'nick@avans.nl',
            'wachtwoord' => 'nick1234',
            'voornaam' => 'Nick',
            'tussenvoegsel' => 'van',
            'achternaam' => 'Hoesel',
            'geboortedatum' => '1998-04-01',
            'telefoonnummer' => '06115569',
            'postcode' => '4817LL',
            'huisnummer' => '69',
            'niksen' => '180',
            'beschrijving' => 'Heeft veel niksen',
            'rol_naam' => 'deelnemer',
        ]);

        DB::table('deelnemer')->insert([
            'email' => 'niks@niksvoorniks.nl',
            'wachtwoord' => Hash::make('niksvoorniks'),
            'voornaam' => 'Niks',
            'tussenvoegsel' => 'voor',
            'achternaam' => 'Niks',
            'geboortedatum' => '2020-05-13',
            'telefoonnummer' => '0616666666',
            'postcode' => '1234AB',
            'huisnummer' => '69',
            'niksen' => '69',
            'beschrijving' => 'Developer account',
            'rol_naam' => 'administrator',
        ]);

        DB::table('deelnemer')->insert([
            'email' => 'nick@niksvoorniks.cf',
            'wachtwoord' => Hash::make('Welkom01'),
            'voornaam' => 'Nick',
            'tussenvoegsel' => 'van',
            'achternaam' => 'Hoesel',
            'geboortedatum' => '2020-05-13',
            'telefoonnummer' => '0616666666',
            'postcode' => '1234AB',
            'huisnummer' => '69',
            'niksen' => '69',
            'beschrijving' => 'Developer account',
            'rol_naam' => 'administrator',
        ]);

        DB::table('deelnemer')->insert([
            'email' => 'maarten@niksvoorniks.nl',
            'wachtwoord' => Hash::make('maarten1234'),
            'voornaam' => 'Maarten',
            'tussenvoegsel' => 'van',
            'achternaam' => 'Mensvoort',
            'geboortedatum' => '2020-05-13',
            'telefoonnummer' => '0616666666',
            'postcode' => '1234AB',
            'huisnummer' => '69',
            'niksen' => '69',
            'beschrijving' => 'Developer account',
            'rol_naam' => 'administrator',
        ]);

        DB::table('deelnemer')->insert([
            'email' => 'jonah@niksvoorniks.nl',
            'wachtwoord' => Hash::make('jonah1234'),
            'voornaam' => 'Jonah',
            'achternaam' => 'Dirksen',
            'geboortedatum' => '2020-05-13',
            'telefoonnummer' => '0616666666',
            'postcode' => '1234AB',
            'huisnummer' => '69',
            'niksen' => '69',
            'beschrijving' => 'Developer account',
            'rol_naam' => 'administrator',
        ]);

        DB::table('deelnemer')->insert([
            'email' => 'inafwachting@avans.nl',
            'wachtwoord' => 'jonah1234',
            'voornaam' => 'Jonah',
            'achternaam' => 'Dirksen',
            'geboortedatum' => '1998-1-1',
            'telefoonnummer' => '06777777',
            'postcode' => '3584LA',
            'huisnummer' => '55',
            'niksen' => '55',
            'beschrijving' => 'Student Avans Hogeschool',
            'rol_naam' => 'in_afwachting',
        ]);

        DB::table('deelnemer')->insert([
            'email' => 'inafwachting2@avans.nl',
            'wachtwoord' => 'jonah1234',
            'voornaam' => 'Jonah',
            'achternaam' => 'Dirksen',
            'geboortedatum' => '1998-1-1',
            'telefoonnummer' => '06777777',
            'postcode' => '3584LA',
            'huisnummer' => '55',
            'niksen' => '55',
            'beschrijving' => 'Student Avans Hogeschool',
            'rol_naam' => 'in_afwachting',
        ]);

        DB::table('deelnemer')->insert([
            'email' => 'stef@avans.nl',
            'wachtwoord' => '$2y$12$03NiMiIFnwWG.d9NHkxXZu6UQcCOoTs30wgYd.SanWufURvr6.1Fe',
            'voornaam' => 'Stef',
            'tussenvoegsel' => 'van',
            'achternaam' => 'Osch',
            'geboortedatum' => '2001-4-6',
            'telefoonnummer' => '0687654321',
            'postcode' => '6677PC',
            'huisnummer' => '23',
            'niksen' => '80',
            'beschrijving' => 'Student Avans Hogeschool Informatica SO',
            'rol_naam' => 'administrator',
        ]);

        //advertisements
        DB::table('advertentie')->insert([
            'deelnemer_email' => 'nick@avans.nl',
            'titel' => 'Koken met Nick',
            'vraag' => 0,
            'bieden' => 1,
            'beschrijving' => 'Wie wil er met mij koken?',
            'aanmaakdatum' => '2020-04-01',
            'prijs' => '2',
            'plaats' => 'Rosmalen',
            'categorie' => 'Koken',
        ]);

        DB::table('advertentie')->insert([
            'deelnemer_email' => 'jonah@avans.nl',
            'titel' => 'Skypen met Jonah',
            'vraag' => 1,
            'bieden' => 0,
            'beschrijving' => 'Wie wil er met mij skypen?',
            'aanmaakdatum' => '2020-04-01',
            'prijs' => '0',
            'plaats' => 'Rosmalen',
            'categorie' => 'Technologie',
        ]);

        DB::table('advertentie')->insert([
            'deelnemer_email' => 'nick@avans.nl',
            'titel' => 'Eten met Nick',
            'vraag' => 1,
            'bieden' => 0,
            'beschrijving' => 'Wie wil er met mij samen eten?',
            'aanmaakdatum' => '2020-04-01',
            'prijs' => '0',
            'plaats' => 'Rosmalen',
            'categorie' => 'Koken',
        ]);

        DB::table('advertentie')->insert([
            'deelnemer_email' => 'jonah@avans.nl',
            'titel' => 'Fietsenmaker in den Bosch',
            'vraag' => 0,
            'bieden' => 0,
            'beschrijving' => 'Ik maak je fiets voor bijna niks',
            'aanmaakdatum' => '2020-04-01',
            'foto' => '\uploads\DdqYozVX4AA9PjC.jpg',
            'prijs' => '4',
            'plaats' => 'Rosmalen',
            'categorie' => 'Sport',
        ]);
        DB::table('advertentie')->insert([
            'deelnemer_email' => 'jonah@avans.nl',
            'titel' => 'Laptop repareren',
            'vraag' => 0,
            'bieden' => 0,
            'beschrijving' => 'Ik maak je laptop voor bijna niks',
            'aanmaakdatum' => '2020-04-01',
            'foto' => '\uploads\DdqYozVX4AA9PjC.jpg',
            'prijs' => '20',
            'plaats' => 'Rosmalen',
            'categorie' => 'Technologie',
        ]);
        DB::table('advertentie')->insert([
            'deelnemer_email' => 'nick@avans.nl',
            'titel' => 'Motor rijles',
            'vraag' => 1,
            'bieden' => 0,
            'beschrijving' => 'Ik help je met de les',
            'aanmaakdatum' => '2020-04-01',
            'foto' => '\uploads\hqdefault.jpg',
            'prijs' => '40',
            'plaats' => 'Rosmalen',
            'categorie' => 'Sport',
        ]);

        //messages
        DB::table('bericht')->insert([
            'inhoud' => 'Hoi, dit is het eerste bericht',
            'onderwerp' => 'Test bericht',
            'datum' => '2020-04-01 14:35:44',
            'zender_email' => 'jonah@avans.nl',
            'ontvanger_email' => 'nick@avans.nl',
        ]);

        DB::table('bericht')->insert([
            'inhoud' => 'Hey Jonah, dit is het tweede bericht',
            'onderwerp' => 'Test bericht',
            'datum' => '2020-04-01 21:36:44',
            'zender_email' => 'nick@avans.nl',
            'ontvanger_email' => 'jonah@avans.nl',
        ]);

        //activity has participant
        DB::table('activiteit_heeft_deelnemer')->insert([
            'deelnemer_email' => 'nick@avans.nl',
            'activiteit_id' => 1,
        ]);
        DB::table('activiteit_heeft_deelnemer')->insert([
            'deelnemer_email' => 'jonah@avans.nl',
            'activiteit_id' => 1,
        ]);
        DB::table('activiteit_heeft_deelnemer')->insert([
            'deelnemer_email' => 'nick@avans.nl',
            'activiteit_id' => 2,
        ]);
        DB::table('activiteit_heeft_deelnemer')->insert([
            'deelnemer_email' => 'nick@avans.nl',
            'activiteit_id' => 3,
        ]);
        DB::table('activiteit_heeft_deelnemer')->insert([
            'deelnemer_email' => 'jonah@avans.nl',
            'activiteit_id' => 2,
        ]);
        DB::table('activiteit_heeft_deelnemer')->insert([
            'deelnemer_email' => 'nick@avans.nl',
            'activiteit_id' => 4,
        ]);

        //News
        DB::table('nieuws')->insert([
            'naam' => 'Nieuwe website!',
            'beschrijving' => 'De ruilkring Den Bosch heeft een nieuwe website. Nu is er één plek voor al uw advertenties, transacties en communicatie bij elkaar',
            'foto' => 'https://picjumbo.com/wp-content/uploads/diamond-beach-indonesia-2210x1300.jpg',
        ]);
    }
}
