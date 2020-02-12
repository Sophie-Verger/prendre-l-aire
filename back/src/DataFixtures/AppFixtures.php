<?php

namespace App\DataFixtures;

use App\Entity\Area;
use App\Entity\User;
use App\Entity\Comment;
use App\Entity\GasType;
use App\Entity\Highway;
use App\Entity\Service;
use App\Entity\GasPrice;
use App\Entity\GasStation;
use App\Entity\Restaurant;
use App\Entity\Destination;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create some highways
        $highway10 = new Highway;
        $highway10->setName('A10');
        $manager->persist($highway10);

        $highway6 = new Highway;
        $highway6->setName('A6');
        $manager->persist($highway6);

        // create some destinations
        $destinationParisLyon = new Destination;
        $destinationParisLyon->setName('Paris - Lyon');
        $destinationParisLyon->setHighways($highway6);
        $manager->persist($destinationParisLyon);

        $destinationLyonParis = new Destination;
        $destinationLyonParis->setName('Lyon - Paris');
        $destinationLyonParis->setHighways($highway6);
        $manager->persist($destinationLyonParis);
        
        $destinationParisBordeaux = new Destination;
        $destinationParisBordeaux->setName('Paris - Bordeaux');
        $destinationParisBordeaux->setHighways($highway10);
        $manager->persist($destinationParisBordeaux);
        
        $destinationBordeauxParis = new Destination;
        $destinationBordeauxParis->setName('Bordeaux - Paris');
        $destinationBordeauxParis->setHighways($highway10);
        $manager->persist($destinationBordeauxParis);


        // Create type of gas
        $gasGazole = new GasType();
        $gasGazole->setName ('Gazole');
        $manager->persist($gasGazole);

        $gasGpl = new GasType();
        $gasGpl->setName ('GPLc');
        $manager->persist($gasGpl);

        $gasE85 = new GasType();
        $gasE85->setName ('E85');
        $manager->persist($gasE85);

        $gasE10 = new GasType();
        $gasE10->setName ('E10');
        $manager->persist($gasE10);

        $gasSp98 = new GasType();
        $gasSp98->setName ('SP98');
        $manager->persist($gasSp98);

        $gasSp95 = new GasType();
        $gasSp95->setName ('SP95');
        $manager->persist($gasSp95);


        //create Service fixtures
        $nurserie = new Service();
        $nurserie->setName('Nurserie');
        $manager->persist($nurserie);

        $douche = new Service();
        $douche->setName('Douche');
        $manager->persist($douche);

        $toilettesPubliques = new Service();
        $toilettesPubliques->setName('Toilettes publiques');
        $manager->persist($toilettesPubliques);

        $dab = new Service();
        $dab->setName('Dab');
        $manager->persist($dab);

        $restauration = new Service();
        $restauration->setName('Restauration');
        $manager->persist($restauration);

        $aireDeJeux = new Service();
        $aireDeJeux->setName('Aire de jeux');
        $manager->persist($aireDeJeux);

        
        // create some restaurants
        $flunch = new Restaurant;
        $flunch->setName('Flunch');
        $manager->persist($flunch);

        $arche = new Restaurant;
        $arche->setName('L\'Arche');
        $manager->persist($arche);

        $boeuf = new Restaurant;
        $boeuf->setName('Le Boeuf Jardinier');
        $manager->persist($boeuf);

        $paul = new Restaurant;
        $paul->setName('Paul');
        $manager->persist($paul);

        $autogrill = new Restaurant;
        $autogrill->setName('Autogrill');
        $manager->persist($autogrill);

        $pomme = new Restaurant;
        $pomme->setName('Pomme de pin');
        $manager->persist($pomme);

        $quick = new Restaurant;
        $quick->setName('Quick');
        $manager->persist($quick);

        $mcdo = new Restaurant;
        $mcdo->setName('McDonald');
        $manager->persist($mcdo);


        // Create user
        $userLaetitia = new User();
        $userLaetitia->setUsername('Laetitia');
        $userLaetitia->setPassword('$argon2id$v=19$m=65536,t=4,p=1$3cHx7GaIZ5qTuNsvKe43mw$hiW9P8BlrVKqEmKX9/FtUmTd4LJ6EF3DjRNr7zcim8k');
        $userLaetitia->setEmail('laetitia@gmail.com');
        $userLaetitia->setRoles(["ROLE_ADMIN"]);
        $manager->persist($userLaetitia);

        $userSophie = new User();
        $userSophie->setUsername('Sophie');
        $userSophie->setPassword('$argon2id$v=19$m=65536,t=4,p=1$MAKauNm7fk+YSHVYLJ7M/Q$2DihOORBeSlzJ/7QPbZxfmsclLHHNdZPTFwrJSndwuo');
        $userSophie->setEmail('sophie@gmail.com');
        $userSophie->setRoles(["ROLE_ADMIN"]);
        $manager->persist($userSophie);

        $userMarion = new User();
        $userMarion->setUsername('Marion');
        $userMarion->setPassword('$argon2id$v=19$m=65536,t=4,p=1$/qTIksT9KrWxc6Lb9OLxHw$1DsyArw8r+WilUR0xH03z+GiGR/i0xylMjAA7RTnoAI');
        $userMarion->setEmail('marion@gmail.com');
        $userMarion->setRoles(["ROLE_ADMIN"]);
        $manager->persist($userMarion);

        $userKevin = new User();
        $userKevin->setUsername('Kevin');
        $userKevin->setPassword('$argon2id$v=19$m=65536,t=4,p=1$GjKp7k04g0qpk5Ear0BIUg$IH+zOtG70uRbio6uJLAX3BIVloV0nZP1+K1md8VG3P4');
        $userKevin->setEmail('kevin@gmail.com');
        $userKevin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($userKevin);


        $userMaxime = new User();
        $userMaxime->setUsername('Maxime');
        $userMaxime->setPassword('$argon2id$v=19$m=65536,t=4,p=1$SH+NwJIx0LQeZYgLX0TyBA$3wsslaJguOXaIYDkT0p2A8mixI2eYeDAfF6PDpc0Aag');
        $userMaxime->setEmail('maxime@gmail.com');
        $userMaxime->setRoles(["ROLE_ADMIN"]);
        $manager->persist($userMaxime);



        //create some GasStation Fixtures
        $total = new GasStation();
        $total->setName('Total');
        $manager->persist($total);
        
        $shell = new GasStation();
        $shell->setName('Shell');
        $manager->persist($shell);
        
        $esso = new GasStation();
        $esso->setName('Esso');
        $manager->persist($esso);
        
    

        // create some area
        $area1 = new Area();
        $area1->setName('Les Lisses');
        $area1->setZipCode(91100);
        $area1->setCity('Corbeil Essonnes');
        $area1->setKilometers('26');
        $area1->setLatitude('48.594189');
        $area1->setLongitude('2.442461');
        $area1->addDestination($destinationParisLyon);
        $area1->setGasStation($total);
        $area1->addRestaurant($autogrill);
        $area1->addService($restauration);
        $area1->addService($dab);
        $area1->addService($toilettesPubliques);
        $manager->persist($area1);

        $area2 = new Area();
        $area2->setName('Tours - Val de Loire');
        $area2->setZipCode(37380);
        $area2->setCity('Monnaie');
        $area2->setKilometers('196');
        $area2->setLatitude('47.473369');
        $area2->setLongitude('0.775936');
        $area2->addDestination($destinationBordeauxParis);
        $area2->setGasStation($total);
        $area2->addRestaurant($autogrill);
        $area2->addService($restauration);
        $area2->addService($aireDeJeux);
        $area2->addService($toilettesPubliques);
        $manager->persist($area2);

        $area3 = new Area();
        $area3->setName('La Dauneuse');
        $area3->setZipCode(28140);
        $area3->setCity('Dambron');
        $area3->setKilometers('75');
        $area3->setLatitude('48.1092');
        $area3->setLongitude('1.8508');
        $area3->addDestination($destinationBordeauxParis);
        $area3->addService($toilettesPubliques);
        $manager->persist($area3);

        $area4 = new Area();
        $area4->setName('Venoy Grosse Pierre');
        $area4->setZipCode(89290);
        $area4->setCity('Venoy');
        $area4->setKilometers('167');
        $area4->setLatitude('47.7882');
        $area4->setLongitude('3.6721');
        $area4->addDestination($destinationLyonParis);
        $area4->setGasStation($total);
        $area4->addService($toilettesPubliques);
        $area4->addService($aireDeJeux);
        $area4->addService($restauration);
        $area4->addService($dab);
        $area4->addRestaurant($arche);
        $area4->addRestaurant($pomme);
        $manager->persist($area4);

        // Create prices
        $priceGazoleArea1 = new GasPrice();
        $priceGazoleArea1->setPrice('1.644');
        $priceGazoleArea1->setGasType($gasGazole);
        $priceGazoleArea1->setArea($area1);
        $manager->persist($priceGazoleArea1);

        $priceE85Area1 = new GasPrice();
        $priceE85Area1->setPrice('0.839');
        $priceE85Area1->setGasType($gasE85);
        $priceE85Area1->setArea($area1);
        $manager->persist($priceE85Area1);

        $priceGplArea1 = new GasPrice();
        $priceGplArea1->setPrice('0.979');
        $priceGplArea1->setGasType($gasGpl);
        $priceGplArea1->setArea($area1);
        $manager->persist($priceGplArea1);

        $priceE10Area1 = new GasPrice();
        $priceE10Area1->setPrice('1.664');
        $priceE10Area1->setGasType($gasE10);
        $priceE10Area1->setArea($area1);
        $manager->persist($priceE10Area1);

        $priceSp98Area1 = new GasPrice();
        $priceSp98Area1->setPrice('1.774');
        $priceSp98Area1->setGasType($gasSp98);
        $priceSp98Area1->setArea($area1);
        $manager->persist($priceSp98Area1);

        $priceGazoleArea2 = new GasPrice();
        $priceGazoleArea2->setPrice('1.634');
        $priceGazoleArea2->setGasType($gasGazole);
        $priceGazoleArea2->setArea($area2);
        $manager->persist($priceGazoleArea2);

        $priceGplArea2 = new GasPrice();
        $priceGplArea2->setPrice('0.979');
        $priceGplArea2->setGasType($gasGpl);
        $priceGplArea2->setArea($area2);
        $manager->persist($priceGplArea2);

        $priceE10Area2 = new GasPrice();
        $priceE10Area2->setPrice('1.664');
        $priceE10Area2->setGasType($gasSp95);
        $priceE10Area2->setArea($area2);
        $manager->persist($priceE10Area2);

        $priceSp98Area2 = new GasPrice();
        $priceSp98Area2->setPrice('1.774');
        $priceSp98Area2->setGasType($gasSp98);
        $priceSp98Area2->setArea($area2);
        $manager->persist($priceSp98Area2);

        $priceGazoleArea4 = new GasPrice();
        $priceGazoleArea4->setPrice('1.629');
        $priceGazoleArea4->setGasType($gasGazole);
        $priceGazoleArea4->setArea($area4);
        $manager->persist($priceGazoleArea4);

        $priceE85Area4 = new GasPrice();
        $priceE85Area4->setPrice('0.839');
        $priceE85Area4->setGasType($gasE85);
        $priceE85Area4->setArea($area4);
        $manager->persist($priceE85Area4);

        $priceE10Area4 = new GasPrice();
        $priceE10Area4->setPrice('1.659');
        $priceE10Area4->setGasType($gasE10);
        $priceE10Area4->setArea($area4);
        $manager->persist($priceE10Area4);

        $priceSp98Area4 = new GasPrice();
        $priceSp98Area4->setPrice('1.769');
        $priceSp98Area4->setGasType($gasSp98);
        $priceSp98Area4->setArea($area4);
        $manager->persist($priceSp98Area4);

        $commentArea1UserLaetitia = new Comment();
        $commentArea1UserLaetitia->setDescription('Ceci est un test bidon');
        $commentArea1UserLaetitia->setPicture('assets/images/Cracovie_Nov2007 021.1.jpg');
        $commentArea1UserLaetitia->setRate(1);
        $commentArea1UserLaetitia->setArea($area1);
        $commentArea1UserLaetitia->setUser($userLaetitia);
        $manager->persist($commentArea1UserLaetitia);

        $commentArea2UserSophie = new Comment();
        $commentArea2UserSophie->setDescription('Cette aire est trop cool !!! (oui j\'y suis jamais allée)');
        $commentArea2UserSophie->setPicture('assets/images/Cracovie_Nov2007 021.1.jpg');
        $commentArea2UserSophie->setRate(5);
        $commentArea2UserSophie->setArea($area2);
        $commentArea2UserSophie->setUser($userSophie);
        $manager->persist($commentArea2UserSophie);

        $manager->flush();
    }
}
