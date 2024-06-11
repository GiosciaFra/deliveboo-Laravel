<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {


        $dishes = [
            [
                'name' => 'Pasta alla Carbonara',
                'description' => 'Spaghetti cotti al dente con pancetta croccante, uova fresche, formaggio pecorino romano e pepe nero macinato.',
                'price' => 10.50,
                'viewable' => true,
            ],
            [
                'name' => 'Insalata Caprese',
                'description' => 'Mozzarella di bufala fresca, pomodori maturi, basilico fresco, condita con olio extra vergine di oliva e riduzione di aceto balsamico.',
                'price' => 8.00,
                'viewable' => true,
            ],
            [
                'name' => 'Lasagna al Forno',
                'description' => 'Strati di pasta fresca, ragù di carne, besciamella e formaggio parmigiano, cotto lentamente al forno.',
                'price' => 12.00,
                'viewable' => true,
            ],
            [
                'name' => 'Risotto ai Funghi Porcini',
                'description' => 'Riso carnaroli cotto lentamente con funghi porcini freschi, scalogno, vino bianco e brodo di carne, finemente mantecato con burro e parmigiano.',
                'price' => 14.00,
                'viewable' => true,
            ],
            [
                'name' => 'Tiramisù',
                'description' => 'Strati di savoiardi inzuppati nel caffè, crema di mascarpone leggera e cacao amaro.',
                'price' => 6.50,
                'viewable' => true,
            ],
            [
                'name' => 'Pasta alla Carbonara',
                'description' => 'Spaghetti cotti al dente con pancetta croccante, uova fresche, formaggio pecorino romano e pepe nero macinato.',
                'price' => 10.50,
                'viewable' => true,
            ],
            [
                'name' => 'Pasta al Pomodoro',
                'description' => 'Spaghetti con salsa di pomodoro fresco, basilico e parmigiano grattugiato.',
                'price' => 8.50,
                'viewable' => false,
            ],
            [
                'name' => 'Lasagna alla Bolognese',
                'description' => 'Strati di pasta all\'uovo con ragù di carne, besciamella e parmigiano.',
                'price' => 12.00,
                'viewable' => false,
            ],
            [
                'name' => 'Ravioli di Ricotta e Spinaci',
                'description' => 'Ravioli ripieni di ricotta fresca e spinaci, conditi con burro e salvia.',
                'price' => 11.00,
                'viewable' => false,
            ],
            [
                'name' => 'Risotto ai Funghi',
                'description' => 'Riso carnaroli cotto al punto giusto con funghi porcini e parmigiano.',
                'price' => 13.00,
                'viewable' => true,
            ],
            [
                'name' => 'Gnocchi al Pesto',
                'description' => 'Gnocchi di patate con salsa al pesto di basilico e pinoli.',
                'price' => 9.50,
                'viewable' => true,
            ],
            [
                'name' => 'Fettuccine Alfredo',
                'description' => 'Fettuccine condite con una cremosa salsa Alfredo a base di burro e parmigiano.',
                'price' => 10.00,
                'viewable' => false,
            ],
            [
                'name' => 'Tagliatelle al Ragù',
                'description' => 'Tagliatelle all\'uovo con ragù di carne alla bolognese.',
                'price' => 11.50,
                'viewable' => true,
            ],
            [
                'name' => 'Penne all\'Arrabbiata',
                'description' => 'Penne condite con una salsa piccante di pomodoro, aglio e peperoncino.',
                'price' => 8.00,
                'viewable' => false,
            ],
            [
                'name' => 'Tortellini in Brodo',
                'description' => 'Tortellini di carne serviti in un saporito brodo di carne.',
                'price' => 9.00,
                'viewable' => true,
            ],
            [
                'name' => 'Spaghetti alle Vongole',
                'description' => 'Spaghetti con vongole fresche, aglio, olio d\'oliva e prezzemolo.',
                'price' => 14.00,
                'viewable' => true,
            ],
            [
                'name' => 'Pasta alla Norma',
                'description' => 'Pasta con melanzane fritte, pomodoro, ricotta salata e basilico.',
                'price' => 10.00,
                'viewable' => false,
            ],
            [
                'name' => 'Orecchiette alle Cime di Rapa',
                'description' => 'Orecchiette con cime di rapa, aglio, acciughe e peperoncino.',
                'price' => 11.00,
                'viewable' => true,
            ],
            [
                'name' => 'Linguine allo Scoglio',
                'description' => 'Linguine con frutti di mare misti, aglio, pomodorini e prezzemolo.',
                'price' => 15.00,
                'viewable' => true,
            ],
            [
                'name' => 'Farfalle al Salmone',
                'description' => 'Farfalle con salmone affumicato, panna e aneto.',
                'price' => 12.50,
                'viewable' => true,
            ],
        
        ];

        foreach($dishes as $dish){

            $newDish = new Dish();

            $newDish->name = $dish['name'];
            $newDish->description = $dish['description'];
            $newDish->price = $dish['price'];
            $newDish->viewable = $dish['viewable']; 
            $newDish->restaurant_id = $faker->randomNumber(1, true); 

            $newDish->save();

        }

    }
}
