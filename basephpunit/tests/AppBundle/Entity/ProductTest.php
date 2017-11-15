<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 23/10/17
 * Time: 12:22
 */
namespace Tests\AppBundle\Entity;
use AppBundle\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{


    // BUT :  tester toutes les sorties possible d 'une fonction
    // 1 repréer les dépendance
    // repérer le nombre de cas de sortie
    // REGLES :  faut prefixer le nom des méthode avec test
    // ÉTAPE 1 : on doit créer l 'objet necessaire pour appeler la methode que l 'one st en train de tester puis appeler le méthode
    // ÉTAPE 2 : faire appel à phpunit pour effectuer une assertion
    // REGLES : le nombre de return dans une méthode est une indication dans le nombre de cas test à créer
    // Mais le return n 'est pas la seule manière de sortir d'une focntion le code peut lever des exceptions
    // Il est imporaten de couvrire "l'ensemble du code " = les différents chemin /sortie
    // Il est aussi important de tester les cas lié à la logique = ?
    // IL est important de s'asssuraer que le code fonctionne avec une suite de valeur différente sans pour autant écrire autant de cas de test que de
    // valeur == On utilise pour cela les providers avec l 'annotation @dataProvider sur la methode


    /**
     * @dataProvider pricesForFoodProduct
     */
    public function testcomputeTVAFoodProduct(){

        //étape 1
        $product  = new Product("Un produit", Product::FOOD_PRODUCT, 20);
        $tauxTva = $product->computeTVA();
        //étape 2
        $this->assertSame(1.1,$tauxTva );

    }

  /*
   public function testcomputeTVAFoodProduct(){

        //étape 1
        $product  = new Product("Banane", Product::FOOD_PRODUCT, 20);
        $tauxTva = $product->computeTVA();
        //étape 2
        $this->assertSame(1.1,$tauxTva );

    }


   public  function testComputeTvaOtherProduct(){

        //étape 1
        $product = new Product("t-shirt",'Vetement', 15);
        $tauxTva = $product->computeTVA();
         //étape 2 l assertion
        $this->assertSame(2.94, $tauxTva);



    }

    public function testNegativePriceComputeTVA(){
        //étape création de lobjet qui nous permet d appeler la mthéod e à tester
         $product = new Product("coque chinoise", "accessoir",-1);

        //Assertions voulu: iCI il s agit de testrer l ecas ou la fonction leve une exception
        $this->expectException(\LogicException::class);

        //apppel de la méthode à tester
        $product->computeTVA();


    }*/

    public function pricesForFoodProduct(){

        return [[0,0.0],
            [20,1.1],
            [100,5.5],
        ];
    }


}