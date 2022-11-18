<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pacientes_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i <= 10; $i++){
            DB::table('pacientes')->insert([
                'user_id'=> 1,
                'name'=> 'Moi'.$i,
                'historiaClinica'=>'123456',
                'sexo'=>'M',
                'grupoSanguineo'=>'0+',
                'fechaNacimiento'=>'23/03/98',
                'edad'=>'23',
                'peso'=>'90kg',
                'talla'=> '1.80',
                'indiceMC'=> '45',
                'PresionArterial'=>'30'

            ]);
         }
         $this->command->info('La tabla de pacientes ha sido rellenada');
    }
}
