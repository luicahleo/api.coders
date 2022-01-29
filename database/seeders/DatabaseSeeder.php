<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Storage::deleteDirectory('posts');
        //creamos la carpeta post
        Storage::makeDirectory('posts');



        //despues de haber creado los Modelos y despues de los Factorys, recien hago uso del seeder, pero previamente 
        //hemos de haber configurado el UseSeeder.php, sino comohago la llamada al seeder?
        $this->call(UserSeeder::class);

        //tenemos que tener cuidado al momento del orden a llamar, porque primeo sera usuarios, despues categorias, etc
        Category::factory(4)->create();

        //ahora tags, porque este no depende de nadie
        Tag::factory(8)->create();

        //ahora para Post, pero este tiene que tener su seeder por la logica diferente, revisar este con calma
        $this->call(PostSeeder::class);


       
    }
}
