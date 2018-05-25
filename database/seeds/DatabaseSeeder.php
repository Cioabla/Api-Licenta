<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options[] = ['Furniture' , 'Appliance' , 'Electronic' , 'Decoration' , 'Garden' , 'Building materials' , 'Electrical'];
        $subcategory[] = ['Kitchen furniture' , '1' , 'Bathroom furniture' , '1' , 'Bedroom furniture', '1' , 'Living room furniture' , '1' , 'Other', '1' ,
            'Washing machine' , '2' , 'Dishwasher' , '2' , 'Gas cooker' , '2' , 'TV' , '3' , 'Vacuum cleaner' , '3' , 'Audio system' , '3' , 'Pictures' , '4' ,
            'Curtains' , '4' , 'Curtain galleries' , '4' , 'Rame pictures' , '4', 'Barbeque' , '5' , 'Table' , '5' , 'Seat' , '5' , 'Pots' , '5' ,
            'Cement' , '6' , 'Ceramic tiles' , '6','Wallpaper' ,'6' , 'Lamps' , '7' , 'Plugs' , '7'];

        factory(App\Category::class,7)->create();
        factory(App\Subcategory::class,20)->create();
//        factory(App\User::class,20)->create();


        factory(App\Product::class,300)->create(
            [

                'img' => 'data:image/jpeg;base64,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'

            ]);
    }
}
