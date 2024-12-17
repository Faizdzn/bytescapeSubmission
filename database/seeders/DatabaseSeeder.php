<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Kelas;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        User::factory()->create([
            'name' => 'Test User1',
        ]);


        // Kelas
        for($i = 1; $i <= 2; $i++) {
            Kelas::factory()->create([
                'kelas_name' => 'Kelas Elektronika '.$i.' | IoT',
                'kelas_thumb' => '/img/kelas/elektro.jpeg'
            ]);
    
            Kelas::factory()->create([
                'kelas_name' => 'Kelas Pemrograman  '.$i.' | IT',
                'kelas_thumb' => '/img/kelas/program.jpeg'
            ]);
        }
        
        // Course
        Course::factory()->create([
            'course_name' => 'Dasar-dasar pemrograman avr melalui avr-gcc | Course #1',
            'course_about' => 'Di pertemuan kali ini kita akan membahas avr-gcc, apa itu avr-gcc? avr-gcc merupakan GNU Compiler khusus avr.<br><br>Program avr merupakan suatu hal yang sangat penting dalam lingkup Embedded System. Ingin mempelajari lebih dalam silahkan tonton course berikut...',
            'course_link' => 'https://youtube.com/playlist?list=PLA6BB228B08B03EDD&si=PrJ3RvC5Mbe9HvUM',
            'course_thumb' => '/img/kelas/avr.webp',
            'kelas_id' => 1
        ]);

        Course::factory()->create([
            'course_name' => 'Dasar-dasar pemrograman python | Course #1',
            'course_about' => 'Di pertemuan kali ini kita akan membahas python, apa itu python? Python merupakan bahasa pemrograman yang tentunya sangat dibutuhkan sekali dalam dunia teknologi ini (contohnya yaitu python dibutuhkan dalam bidang Machine Learning atau mungkin Website).<br><br>Ingin mempelajari lebih dalam silahkan tonton course berikut...',
            'course_link' => 'https://youtube.com/playlist?list=PLZS-MHyEIRo7ab0-EveSvf4CLdyOECMm0&si=_p6NstxszSEKjWn4',
            'course_thumb' => '/img/kelas/python.webp',
            'kelas_id' => 2
        ]);
        
        Course::factory()->create([
            'course_name' => 'Dasar-dasar pemrograman avr melalui avr-gcc | Course #2',
            'course_about' => 'Di pertemuan kali ini kita akan membahas avr-gcc, apa itu avr-gcc? avr-gcc merupakan GNU Compiler khusus avr.<br><br>Program avr merupakan suatu hal yang sangat penting dalam lingkup Embedded System. Ingin mempelajari lebih dalam silahkan tonton course berikut...',
            'course_link' => 'https://youtube.com/playlist?list=PLA6BB228B08B03EDD&si=PrJ3RvC5Mbe9HvUM',
            'course_thumb' => '/img/kelas/avr.webp',
            'kelas_id' => 3
        ]);
        
        Course::factory()->create([
            'course_name' => 'Dasar-dasar pemrograman python | Course #2',
            'course_about' => 'Di pertemuan kali ini kita akan membahas python, apa itu python? Python merupakan bahasa pemrograman yang tentunya sangat dibutuhkan sekali dalam dunia teknologi ini (contohnya yaitu python dibutuhkan dalam bidang Machine Learning atau mungkin Website).<br><br>Ingin mempelajari lebih dalam silahkan tonton course berikut...',
            'course_link' => 'https://youtube.com/playlist?list=PLZS-MHyEIRo7ab0-EveSvf4CLdyOECMm0&si=_p6NstxszSEKjWn4',
            'course_thumb' => '/img/kelas/python.webp',
            'kelas_id' => 4
        ]);
        
        Course::factory()->create([
            'course_name' => 'Dasar-dasar pemrograman avr melalui avr-gcc | Course #3',
            'course_about' => 'Di pertemuan kali ini kita akan membahas avr-gcc, apa itu avr-gcc? avr-gcc merupakan GNU Compiler khusus avr.<br><br>Program avr merupakan suatu hal yang sangat penting dalam lingkup Embedded System. Ingin mempelajari lebih dalam silahkan tonton course berikut...',
            'course_link' => 'https://youtube.com/playlist?list=PLA6BB228B08B03EDD&si=PrJ3RvC5Mbe9HvUM',
            'course_thumb' => '/img/kelas/avr.webp',
            'kelas_id' => 3
        ]);
        
        Course::factory()->create([
            'course_name' => 'Dasar-dasar pemrograman python | Course #3',
            'course_about' => 'Di pertemuan kali ini kita akan membahas python, apa itu python? Python merupakan bahasa pemrograman yang tentunya sangat dibutuhkan sekali dalam dunia teknologi ini (contohnya yaitu python dibutuhkan dalam bidang Machine Learning atau mungkin Website).<br><br>Ingin mempelajari lebih dalam silahkan tonton course berikut...',
            'course_link' => 'https://youtube.com/playlist?list=PLZS-MHyEIRo7ab0-EveSvf4CLdyOECMm0&si=_p6NstxszSEKjWn4',
            'course_thumb' => '/img/kelas/python.webp',
            'kelas_id' => 4
        ]);
        
        Course::factory()->create([
            'course_name' => 'Dasar-dasar pemrograman avr melalui avr-gcc | Course #4',
            'course_about' => 'Di pertemuan kali ini kita akan membahas avr-gcc, apa itu avr-gcc? avr-gcc merupakan GNU Compiler khusus avr.<br><br>Program avr merupakan suatu hal yang sangat penting dalam lingkup Embedded System. Ingin mempelajari lebih dalam silahkan tonton course berikut...',
            'course_link' => 'https://youtube.com/playlist?list=PLA6BB228B08B03EDD&si=PrJ3RvC5Mbe9HvUM',
            'course_thumb' => '/img/kelas/avr.webp',
            'kelas_id' => 3
        ]);
        
        Course::factory()->create([
            'course_name' => 'Dasar-dasar pemrograman python | Course #4',
            'course_about' => 'Di pertemuan kali ini kita akan membahas python, apa itu python? Python merupakan bahasa pemrograman yang tentunya sangat dibutuhkan sekali dalam dunia teknologi ini (contohnya yaitu python dibutuhkan dalam bidang Machine Learning atau mungkin Website).<br><br>Ingin mempelajari lebih dalam silahkan tonton course berikut...',
            'course_link' => 'https://youtube.com/playlist?list=PLZS-MHyEIRo7ab0-EveSvf4CLdyOECMm0&si=_p6NstxszSEKjWn4',
            'course_thumb' => '/img/kelas/python.webp',
            'kelas_id' => 4
        ]);
        
        Course::factory()->create([
            'course_name' => 'Dasar-dasar pemrograman avr melalui avr-gcc | Course #5',
            'course_about' => 'Di pertemuan kali ini kita akan membahas avr-gcc, apa itu avr-gcc? avr-gcc merupakan GNU Compiler khusus avr.<br><br>Program avr merupakan suatu hal yang sangat penting dalam lingkup Embedded System. Ingin mempelajari lebih dalam silahkan tonton course berikut...',
            'course_link' => 'https://youtube.com/playlist?list=PLA6BB228B08B03EDD&si=PrJ3RvC5Mbe9HvUM',
            'course_thumb' => '/img/kelas/avr.webp',
            'kelas_id' => 3
        ]);
        
        Course::factory()->create([
            'course_name' => 'Dasar-dasar pemrograman python | Course #5',
            'course_about' => 'Di pertemuan kali ini kita akan membahas python, apa itu python? Python merupakan bahasa pemrograman yang tentunya sangat dibutuhkan sekali dalam dunia teknologi ini (contohnya yaitu python dibutuhkan dalam bidang Machine Learning atau mungkin Website).<br><br>Ingin mempelajari lebih dalam silahkan tonton course berikut...',
            'course_link' => 'https://youtube.com/playlist?list=PLZS-MHyEIRo7ab0-EveSvf4CLdyOECMm0&si=_p6NstxszSEKjWn4',
            'course_thumb' => '/img/kelas/python.webp',
            'kelas_id' => 4
        ]);
        
        Course::factory()->create([
            'course_name' => 'Dasar-dasar pemrograman avr melalui avr-gcc | Course #6',
            'course_about' => 'Di pertemuan kali ini kita akan membahas avr-gcc, apa itu avr-gcc? avr-gcc merupakan GNU Compiler khusus avr.<br><br>Program avr merupakan suatu hal yang sangat penting dalam lingkup Embedded System. Ingin mempelajari lebih dalam silahkan tonton course berikut...',
            'course_link' => 'https://youtube.com/playlist?list=PLA6BB228B08B03EDD&si=PrJ3RvC5Mbe9HvUM',
            'course_thumb' => '/img/kelas/avr.webp',
            'kelas_id' => 3
        ]);
        
        Course::factory()->create([
            'course_name' => 'Dasar-dasar pemrograman python | Course #6',
            'course_about' => 'Di pertemuan kali ini kita akan membahas python, apa itu python? Python merupakan bahasa pemrograman yang tentunya sangat dibutuhkan sekali dalam dunia teknologi ini (contohnya yaitu python dibutuhkan dalam bidang Machine Learning atau mungkin Website).<br><br>Ingin mempelajari lebih dalam silahkan tonton course berikut...',
            'course_link' => 'https://youtube.com/playlist?list=PLZS-MHyEIRo7ab0-EveSvf4CLdyOECMm0&si=_p6NstxszSEKjWn4',
            'course_thumb' => '/img/kelas/python.webp',
            'kelas_id' => 4
        ]);
        
        // Course::factory()->create([
        //     'course_name' => 'Course1',
        //     'course_desc' => 'this is a test course'
        // ]);
    }
}
