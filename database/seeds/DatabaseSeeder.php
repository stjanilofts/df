<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory;


function getImages($number) {
    $images = [];

    $dir = scandir(public_path('tmp'));

    $repository = [];

    foreach($dir as $k => $v) {
        if($v != '.' && $v != '..') {
            $arr = explode('.', $v);
            $extension = end($arr);
            $name = $arr[0];

            if(is_numeric($name)) {
                $repository[] = $v;
            }
        }
    }

    for($i = 1; $i < $number; $i++) {
        $repoCount = count($repository);

        $rand = (mt_rand(1, $repoCount) - 1);

        $filename = $repository[$rand];

        $file = public_path('tmp/'.$filename);

        $images[] = [
            'name' => $filename,
            'title' => $filename
        ];
    }

    return $images;
}


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Notendur
        \App\User::create([
            'name' => 'Netvistun',
            'email' => 'vinna@netvistun.is',
            'password' => bcrypt(env('NETVISTUN')),
            'remember_token' => str_random(10),
        ]);



        $faker = Faker\Factory::create();

        function makePage($page = []) {
            $page['slug'] = isset($page['slug']) ? $page['slug'] : str_slug($page['title']);
            $page['images'] = isset($page['images']) ? $page['images'] : [];

            return factory(\App\Page::class)->create($page);
        }

        function makeProduct($page = []) {
            $page['slug'] = isset($page['slug']) ? $page['slug'] : str_slug($page['title']);
            $page['images'] = isset($page['images']) ? $page['images'] : [];
            $page['tech'] = isset($page['tech']) ? $page['tech'] : '';

            return factory(\App\Product::class)->create($page);
        }

        function makeCategory($page = []) {
            $page['slug'] = isset($page['slug']) ? $page['slug'] : str_slug($page['title']);
            $page['images'] = isset($page['images']) ? $page['images'] : [];

            return factory(\App\Category::class)->create($page);
        }


        /*foreach($pages as $page) {
            makePage(['title' => $page]);
        }*/

        makePage([
            'title' => 'Vörur'
        ]);

        makePage([
            'title' => 'Hreinsun',
            'content' => '<p>Meginmarkmiðið með hreinsun á dúnsængum er að ná öllum svita og utanaðkomandi raka úr dúninum. Dúnninn lyftist upp inní sænginni og ef þetta er gert á um það bil 3 ára fresti þá lengist endingartími sængurinnar um mörg ár.</p>
<p>Efnið sem notað er við hreinsunina er vistvænt og brotnar niður í náttúrunni á innan við einum sólarhring. Þetta er auðvitað undirstaða heilbrigðis og þess að þú sofir betur.</p>
<p>Við hreinsum sængur og kodda og einnig bætum við nýjum dún í anda-, svana-, snjógæsa- og æðardúnsængur.</p>
<p>Skiptum einnig um utanyfir-ver ef þess er þörf.</p>
<p>Við höfum 50 ára reynslu í faginu</p>'
        ]);

$um_okkur = makePage(['title' => 'Fyrirtækið', 'slug' => 'um-okkur',
            'content' => '<p>Dún og fiður er leiðandi fyrirtæki í framleiðslu, endurnýjun og hreinsun á sængum, koddum, púðum, pullum og skyldum vörum úr náttúrlegum dún og fiðri.</p>
<p>Dún og fiður byggir á um 50 ára gömlum merg, í eigu sömu fjölskyldu allan tímann. Á þessum tíma hefur safnast saman mjög mikilvæg þekking og reynsla á öllu sem lýtur að dún og fiðri, efnum því tengdu og meðhöndlun sængurfatnaðar.</p>
<p>Dún og fiður var stofnað 1. febrúar 1959 og var fyrst til húsa að Kirkjuteig 29 í Reykjavík, en 3. ágúst 1963 flutti fyrirtækið í eigið húsnæði að Vatnsstíg 3, Reykjavík. Dún og fiður er nú til húsa á Laugavegi 86.</p>
<p>Dún og fiður hefur með áratuga starfsemi skapað sér fastan sess í hugum borgarbúa og annarra landsmanna. Því hefur það verið stefna fyrirtækisins að breyta engu þar um né að vera með útsölur eða útibú á öðrum stöðum.</p>
        ']);

        makePage(['slug' => 'starfsfolk', 'title' => 'Starfsfólk', 'parent_id' => $um_okkur->id]);
        makePage([
            'slug' => 'stadsetning',
            'title' => 'Staðsetning',
            'parent_id' => $um_okkur->id,
            'content' => '<iframe width="100%" height="400" frameborder="0" src="http://ja.is/kort/embedded/?zoom=10&x=359824&y=406933&layer=map&q=Kleifar%C3%A1s+ehf+heildverslun%2C+%C3%81rm%C3%BAla+22"></iframe>',
        ]);


        $pics = ['myndBjarni01.jpg', '12.jpg', '10.jpg'];
        $forsidumyndir = makePage(['title' => 'Forsíðumyndir', 'slug' => '_forsidumyndir', 'status' => 0]);
        foreach($pics as $k => $v) {
            makePage(['title' => $v, 'parent_id' => $forsidumyndir->id, 'images' => [['name'=>$v]]]);
        }

        $flokkur1 = makeCategory(['title' => 'Flokkur 1', 'images' => getImages(3)]);
        $flokkur2 = makeCategory(['title' => 'Flokkur 2', 'images' => getImages(3)]);

        /*foreach($vorur as $vara) {
            makeProduct($vara);
        }*/

        Model::reguard();
    }
}