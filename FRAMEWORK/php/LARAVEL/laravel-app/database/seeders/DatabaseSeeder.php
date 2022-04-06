<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Rifal Nurjamil',
            'email' => 'rifal@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::create([
            'title' => 'Post 1',
            'slug' => 'post-1',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque harum similique adipisci ab quidem delectus sed saepe culpa ex dicta, natus voluptate! Blanditiis quae ipsam vero commodi incidunt doloremque. Hic!',
            'body' => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi soluta ducimus rem nam eaque voluptatibus, dolorum quo. Non suscipit nihil facilis iusto corporis minus distinctio laboriosam nobis, quasi cum alias? Deserunt illo iusto vel? Fuga corrupti voluptas maiores provident modi debitis dolor, perspiciatis et ipsum consectetur vitae quisquam, quos hic voluptates. Incidunt hic optio debitis facere fuga asperiores alias, praesentium reiciendis. Vero magni architecto impedit fugit eligendi? Excepturi enim cum debitis temporibus veritatis commodi iusto repellendus dignissimos neque harum magni deserunt, autem odio at est quos maiores soluta quam. Tenetur, sequi. Odit accusamus asperiores explicabo minus rerum incidunt nemo quos!</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati quas totam provident doloremque assumenda possimus odit ut impedit animi placeat nobis incidunt magni quidem at sequi vitae nihil inventore cumque quae quaerat, culpa doloribus tempore. Esse, minima maiores. Asperiores dolore tempora quasi perspiciatis vel tempore culpa laborum consectetur architecto corrupti, ex dolorem expedita numquam voluptatibus velit, modi ut magnam perferendis esse. Soluta pariatur numquam accusamus deleniti, sint nihil consequuntur! Similique odit cumque labore eaque maiores sint deserunt. Molestias voluptatum facere molestiae quis provident laboriosam illo, ipsam unde nisi iure similique maxime et, natus ad corporis pariatur, doloribus alias perspiciatis aliquid velit ipsum! Voluptas dolor placeat deserunt ratione, et iusto molestias officiis corrupti officia deleniti eligendi ducimus dolorem quae magni, vitae fugit soluta est nam! Veritatis nostrum odio nisi iste consectetur amet et delectus est provident ipsam consequuntur aut corporis ab adipisci, blanditiis libero doloremque. Facilis sed tempore deleniti voluptatem aliquid.</p>",
            'category_id' => 1,
            'user_id' => 1,
        ]);

        Post::create([
            'title' => 'Post 2',
            'slug' => 'post-2',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque harum similique adipisci ab quidem delectus sed saepe culpa ex dicta, natus voluptate! Blanditiis quae ipsam vero commodi incidunt doloremque. Hic!',
            'body' => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi soluta ducimus rem nam eaque voluptatibus, dolorum quo. Non suscipit nihil facilis iusto corporis minus distinctio laboriosam nobis, quasi cum alias? Deserunt illo iusto vel? Fuga corrupti voluptas maiores provident modi debitis dolor, perspiciatis et ipsum consectetur vitae quisquam, quos hic voluptates. Incidunt hic optio debitis facere fuga asperiores alias, praesentium reiciendis. Vero magni architecto impedit fugit eligendi? Excepturi enim cum debitis temporibus veritatis commodi iusto repellendus dignissimos neque harum magni deserunt, autem odio at est quos maiores soluta quam. Tenetur, sequi. Odit accusamus asperiores explicabo minus rerum incidunt nemo quos!</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati quas totam provident doloremque assumenda possimus odit ut impedit animi placeat nobis incidunt magni quidem at sequi vitae nihil inventore cumque quae quaerat, culpa doloribus tempore. Esse, minima maiores. Asperiores dolore tempora quasi perspiciatis vel tempore culpa laborum consectetur architecto corrupti, ex dolorem expedita numquam voluptatibus velit, modi ut magnam perferendis esse. Soluta pariatur numquam accusamus deleniti, sint nihil consequuntur! Similique odit cumque labore eaque maiores sint deserunt. Molestias voluptatum facere molestiae quis provident laboriosam illo, ipsam unde nisi iure similique maxime et, natus ad corporis pariatur, doloribus alias perspiciatis aliquid velit ipsum! Voluptas dolor placeat deserunt ratione, et iusto molestias officiis corrupti officia deleniti eligendi ducimus dolorem quae magni, vitae fugit soluta est nam! Veritatis nostrum odio nisi iste consectetur amet et delectus est provident ipsam consequuntur aut corporis ab adipisci, blanditiis libero doloremque. Facilis sed tempore deleniti voluptatem aliquid.</p>",
            'category_id' => 1,
            'user_id' => 1,
        ]);
    }
}
