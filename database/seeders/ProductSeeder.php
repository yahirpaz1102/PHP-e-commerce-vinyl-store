<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{

    public function run(): void
    {
        $albums = [
            [
                'sku' => 'ALB001',
                'name' => 'Abbey Road - The Beatles',
                'description' => 'Classic album from The Beatles featuring iconic songs and the famous cover art.',
                'full_description' => "Tracklist:\n1. Come Together\n2. Something\n3. Maxwell's Silver Hammer\n4. Oh! Darling\n5. Octopus's Garden\n6. I Want You (She's So Heavy)\n7. Here Comes the Sun\n8. Because\n9. You Never Give Me Your Money\n10. Sun King\n11. Mean Mr. Mustard\n12. Polythene Pam\n13. She Came in Through the Bathroom Window\n14. Golden Slumbers\n15. Carry That Weight\n16. The End\n17. Her Majesty",
                'price' => 29.99,
                'image_url' => '/images/abbey_road.jpg',
                'audio_snippet_url' => '/audio/abbey_road_snippet.mp3',
                'rating' => 5
            ],
            [
                'sku' => 'ALB002',
                'name' => 'Pet Sounds - The Beach Boys',
                'description' => 'Innovative and groundbreaking album that changed the course of music history.',
                'full_description' => "Tracklist:\n1. Wouldn't It Be Nice\n2. You Still Believe in Me\n3. That's Not Me\n4. Don't Talk (Put Your Head on My Shoulder)\n5. I'm Waiting for the Day\n6. Let's Go Away for Awhile\n7. Sloop John B\n8. God Only Knows\n9. I Know There's an Answer\n10. Here Today\n11. I Just Wasn't Made for These Times\n12. Pet Sounds\n13. Caroline No",
                'price' => 27.99,
                'image_url' => '/images/pet_sounds.jpg',
                'audio_snippet_url' => '/audio/pet_sounds_snippet.mp3',
                'rating' => 5
            ],
            [
                'sku' => 'ALB003',
                'name' => 'The Miseducation of Lauryn Hill',
                'description' => 'Groundbreaking neo-soul and R&B album that blends hip-hop, soul, and reggae.',
                'full_description' => "Tracklist:\n1. Intro\n2. Lost Ones\n3. Ex-Factor\n4. To Zion (featuring Carlos Santana)\n5. Doo Wop (That Thing)\n6. Superstar\n7. Final Hour\n8. When It Hurts So Bad\n9. I Used to Love Him (featuring Mary J. Blige)\n10. Forgive Them Father\n11. Every Ghetto, Every City\n12. Nothing Even Matters (featuring D'Angelo)\n13. Everything Is Everything\n14. The Miseducation of Lauryn Hill\n15. Can't Take My Eyes Off of You\n16. Tell Him",
                'price' => 26.99,
                'image_url' => '/images/miseducation.jpg',
                'audio_snippet_url' => '/audio/miseducation_snippet.mp3',
                'rating' => 5
            ],
            [
                'sku' => 'ALB004',
                'name' => 'Un Verano Sin Ti - Bad Bunny',
                'description' => 'Record-breaking summer album blending reggaeton, Latin trap, and Caribbean sounds.',
                'full_description' => "Tracklist:\n1. Moscow Mule\n2. Después de la Playa\n3. Me Porto Bonito\n4. Tití Me Preguntó\n5. Un Ratito\n6. Yo No Soy Celoso\n7. Tarot\n8. Neverita\n9. La Corriente\n10. Efecto\n11. Party\n12. Aguacero\n13. Enséñame a Bailar\n14. Ojitos Lindos\n15. Otro Atardecer\n16. Un Coco\n17. Andrea\n18. Me Fui de Vacaciones\n19. Un Verano Sin Ti\n20. Agosto\n21. Callaita",
                'price' => 32.99,
                'image_url' => '/images/un_verano_sin_ti.jpg',
                'audio_snippet_url' => '/audio/un_verano_sin_ti_snippet.mp3',
                'rating' => 4
            ],
            [
                'sku' => 'ALB005',
                'name' => 'A Night at the Opera - Queen',
                'description' => 'Legendary Queen album featuring the iconic Bohemian Rhapsody and other classics.',
                'full_description' => "Tracklist:\n1. Death on Two Legs\n2. Lazing on a Sunday Afternoon\n3. I'm in Love with My Car\n4. You're My Best Friend\n5. '39\n6. Sweet Lady\n7. Seaside Rendezvous\n8. The Prophet's Song\n9. Love of My Life\n10. Good Company\n11. Bohemian Rhapsody\n12. God Save the Queen",
                'price' => 28.99,
                'image_url' => '/images/night_at_the_opera.jpg',
                'audio_snippet_url' => '/audio/night_at_the_opera_snippet.mp3',
                'rating' => 5
            ],
            [
                'sku' => 'ALB006',
                'name' => 'Rumours - Fleetwood Mac',
                'description' => 'One of the best-selling albums of all time with timeless hits and emotional depth.',
                'full_description' => "Tracklist:\n1. Second Hand News\n2. Dreams\n3. Never Going Back Again\n4. Don't Stop\n5. Go Your Own Way\n6. Songbird\n7. The Chain\n8. You Make Loving Fun\n9. I Don't Want to Know\n10. Oh Daddy\n11. Gold Dust Woman",
                'price' => 27.99,
                'image_url' => '/images/rumours.jpg',
                'audio_snippet_url' => '/audio/rumours_snippet.mp3',
                'rating' => 5
            ],
            [
                'sku' => 'ALB007',
                'name' => 'Blonde - Frank Ocean',
                'description' => 'Genre-defying modern masterpiece blending R&B, psychedelic soul, and experimental pop.',
                'full_description' => "Tracklist:\n1. Nikes\n2. Ivy\n3. Pink + White\n4. Be Yourself\n5. Solo\n6. Skyline To\n7. Self Control\n8. Good Guy\n9. Nights\n10. Solo (Reprise)\n11. Pretty Sweet\n12. Facebook Story\n13. Close to You\n14. White Ferrari\n15. Seigfried\n16. Godspeed\n17. Futura Free",
                'price' => 30.99,
                'image_url' => '/images/blonde.jpg',
                'audio_snippet_url' => '/audio/blonde_snippet.mp3',
                'rating' => 5
            ],
            [
                'sku' => 'ALB008',
                'name' => 'AM - Arctic Monkeys',
                'description' => 'Breakthrough album with a darker sound, combining rock with R&B and psychedelia.',
                'full_description' => "Tracklist:\n1. Do I Wanna Know?\n2. R U Mine?\n3. One for the Road\n4. Arabella\n5. I Want It All\n6. No.1 Party Anthem\n7. Mad Sounds\n8. Fireside\n9. Why'd You Only Call Me When You're High?\n10. Snap Out of It\n11. Knee Socks\n12. I Wanna Be Yours",
                'price' => 24.99,
                'image_url' => '/images/am.jpg',
                'audio_snippet_url' => '/audio/am_snippet.mp3',
                'rating' => 4
            ],
            [
                'sku' => 'ALB009',
                'name' => 'The Dark Side of the Moon - Pink Floyd',
                'description' => 'Legendary progressive rock album exploring themes of conflict, greed, and mental illness.',
                'full_description' => "Tracklist:\n1. Speak to Me\n2. Breathe (In the Air)\n3. On the Run\n4. Time\n5. The Great Gig in the Sky\n6. Money\n7. Us and Them\n8. Any Colour You Like\n9. Brain Damage\n10. Eclipse",
                'price' => 31.99,
                'image_url' => '/images/dark_side_of_the_moon.jpg',
                'audio_snippet_url' => '/audio/dark_side_snippet.mp3',
                'rating' => 5
            ],
            [
                'sku' => 'ALB010',
                'name' => 'Nevermind - Nirvana',
                'description' => 'Grunge-defining album that brought alternative rock into the mainstream.',
                'full_description' => "Tracklist:\n1. Smells Like Teen Spirit\n2. In Bloom\n3. Come as You Are\n4. Breed\n5. Lithium\n6. Polly\n7. Territorial Pissings\n8. Drain You\n9. Lounge Act\n10. Stay Away\n11. On a Plain\n12. Something in the Way",
                'price' => 28.99,
                'image_url' => '/images/nevermind.jpg',
                'audio_snippet_url' => '/audio/nevermind_snippet.mp3',
                'rating' => 5
            ],
            [
                'sku' => 'ALB011',
                'name' => 'good kid, m.A.A.d city - Kendrick Lamar',
                'description' => 'Cinematic hip-hop masterpiece telling a compelling narrative of urban life.',
                'full_description' => "Tracklist:\n1. Sherane a.k.a Master Splinter's Daughter\n2. Bitch, Don't Kill My Vibe\n3. Backseat Freestyle\n4. The Art of Peer Pressure\n5. Money Trees\n6. Poetic Justice\n7. good kid\n8. m.A.A.d city\n9. Swimming Pools (Drank)\n10. Sing About Me, I'm Dying of Thirst\n11. Real\n12. Compton",
                'price' => 29.99,
                'image_url' => '/images/good_kid_maad_city.jpg',
                'audio_snippet_url' => '/audio/good_kid_snippet.mp3',
                'rating' => 5
            ],
            [
                'sku' => 'ALB012',
                'name' => 'Thriller - Michael Jackson',
                'description' => 'The best-selling album of all time with groundbreaking production and iconic songs.',
                'full_description' => "Tracklist:\n1. Wanna Be Startin' Somethin'\n2. Baby Be Mine\n3. The Girl Is Mine\n4. Thriller\n5. Beat It\n6. Billie Jean\n7. Human Nature\n8. P.Y.T. (Pretty Young Thing)\n9. The Lady in My Life",
                'price' => 32.99,
                'image_url' => '/images/thriller.jpg',
                'audio_snippet_url' => '/audio/thriller_snippet.mp3',
                'rating' => 5
            ]
        ];

        foreach ($albums as $album) {
            Product::create($album);
        }
    }
}
