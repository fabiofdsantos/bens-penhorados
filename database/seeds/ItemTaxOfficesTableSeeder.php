<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Seeder;

/**
 * This is the item's tax offices table seeder class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ItemTaxOfficesTableSeeder extends Seeder
{
    public function run()
    {
        $municipalityId = DB::table('pt_municipalities')->where('name', 'Agueda')->pluck('id');
        $taxOffices = [
            ['code' => '0019', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Albergaria-a-Velha')->pluck('id');
        $taxOffices = [
            ['code' => '0027', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Anadia')->pluck('id');
        $taxOffices = [
            ['code' => '0035', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Arouca')->pluck('id');
        $taxOffices = [
            ['code' => '0043', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Aveiro')->pluck('id');
        $taxOffices = [
            ['code' => '0051', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3417', 'number' => 2, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Castelo de Paiva')->pluck('id');
        $taxOffices = [
            ['code' => '0060', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Espinho')->pluck('id');
        $taxOffices = [
            ['code' => '0078', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Estarreja')->pluck('id');
        $taxOffices = [
            ['code' => '0086', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Santa Maria da Feira')->pluck('id');
        $taxOffices = [
            ['code' => '3441', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '0094', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '4170', 'number' => 4, 'municipality_id' => $municipalityId],
            ['code' => '3735', 'number' => 3, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ilhavo')->pluck('id');
        $taxOffices = [
            ['code' => '0108', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Mealhada')->pluck('id');
        $taxOffices = [
            ['code' => '0116', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Murtosa')->pluck('id');
        $taxOffices = [
            ['code' => '0124', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Oliveira de Azemeis')->pluck('id');
        $taxOffices = [
            ['code' => '0132', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Oliveira do Bairro')->pluck('id');
        $taxOffices = [
            ['code' => '0140', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ovar')->pluck('id');
        $taxOffices = [
            ['code' => '0159', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'S. João da Madeira')->pluck('id');
        $taxOffices = [
            ['code' => '0167', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Sever do Vouga')->pluck('id');
        $taxOffices = [
            ['code' => '0175', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vagos')->pluck('id');
        $taxOffices = [
            ['code' => '0183', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vale de Cambra')->pluck('id');
        $taxOffices = [
            ['code' => '0191', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Aljustrel')->pluck('id');
        $taxOffices = [
            ['code' => '0205', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Almodovar')->pluck('id');
        $taxOffices = [
            ['code' => '0213', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Alvito')->pluck('id');
        $taxOffices = [
            ['code' => '0221', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Barrancos')->pluck('id');
        $taxOffices = [
            ['code' => '0230', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Beja')->pluck('id');
        $taxOffices = [
            ['code' => '0248', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Castro Verde')->pluck('id');
        $taxOffices = [
            ['code' => '0256', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Cuba')->pluck('id');
        $taxOffices = [
            ['code' => '0264', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ferreira do Alentejo')->pluck('id');
        $taxOffices = [
            ['code' => '0272', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Mertola')->pluck('id');
        $taxOffices = [
            ['code' => '0280', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Moura')->pluck('id');
        $taxOffices = [
            ['code' => '0299', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Odemira')->pluck('id');
        $taxOffices = [
            ['code' => '0302', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ourique')->pluck('id');
        $taxOffices = [
            ['code' => '0310', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Serpa')->pluck('id');
        $taxOffices = [
            ['code' => '0329', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vidigueira')->pluck('id');
        $taxOffices = [
            ['code' => '0337', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Amares')->pluck('id');
        $taxOffices = [
            ['code' => '0345', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Barcelos')->pluck('id');
        $taxOffices = [
            ['code' => '0353', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Braga')->pluck('id');
        $taxOffices = [
            ['code' => '0361', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3425', 'number' => 2, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Cabeceiras de Basto')->pluck('id');
        $taxOffices = [
            ['code' => '0370', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Celorico de Basto')->pluck('id');
        $taxOffices = [
            ['code' => '0388', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Esposende')->pluck('id');
        $taxOffices = [
            ['code' => '0396', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Fafe')->pluck('id');
        $taxOffices = [
            ['code' => '0400', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Guimarães')->pluck('id');
        $taxOffices = [
            ['code' => '3476', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '0418', 'number' => 1, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Povoa de Lanhoso')->pluck('id');
        $taxOffices = [
            ['code' => '0426', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Terras de Bouro')->pluck('id');
        $taxOffices = [
            ['code' => '0434', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vieira do Minho')->pluck('id');
        $taxOffices = [
            ['code' => '0442', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Nova de Famalicão')->pluck('id');
        $taxOffices = [
            ['code' => '0450', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3590', 'number' => 2, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Verde')->pluck('id');
        $taxOffices = [
            ['code' => '0469', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vizela')->pluck('id');
        $taxOffices = [
            ['code' => '4200', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Alfandega da Fe')->pluck('id');
        $taxOffices = [
            ['code' => '0477', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Bragança')->pluck('id');
        $taxOffices = [
            ['code' => '0485', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Carrazeda de Ansiães')->pluck('id');
        $taxOffices = [
            ['code' => '0493', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Freixo de Espada a Cinta')->pluck('id');
        $taxOffices = [
            ['code' => '0507', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Macedo de Cavaleiros')->pluck('id');
        $taxOffices = [
            ['code' => '0515', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Miranda do Douro')->pluck('id');
        $taxOffices = [
            ['code' => '0523', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Mirandela')->pluck('id');
        $taxOffices = [
            ['code' => '0531', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Mogadouro')->pluck('id');
        $taxOffices = [
            ['code' => '0540', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Torre de Moncorvo')->pluck('id');
        $taxOffices = [
            ['code' => '0558', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Flor')->pluck('id');
        $taxOffices = [
            ['code' => '0566', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vimioso')->pluck('id');
        $taxOffices = [
            ['code' => '0574', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vinhais')->pluck('id');
        $taxOffices = [
            ['code' => '0582', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Belmonte')->pluck('id');
        $taxOffices = [
            ['code' => '0590', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Castelo Branco')->pluck('id');
        $taxOffices = [
            ['code' => '3794', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '0604', 'number' => 1, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Covilhã')->pluck('id');
        $taxOffices = [
            ['code' => '0612', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Fundão')->pluck('id');
        $taxOffices = [
            ['code' => '0620', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Idanha-a-Nova')->pluck('id');
        $taxOffices = [
            ['code' => '0639', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Oleiros')->pluck('id');
        $taxOffices = [
            ['code' => '0647', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Penamacor')->pluck('id');
        $taxOffices = [
            ['code' => '0655', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Proença-a-Nova')->pluck('id');
        $taxOffices = [
            ['code' => '0663', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Sertã')->pluck('id');
        $taxOffices = [
            ['code' => '0671', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila de Rei')->pluck('id');
        $taxOffices = [
            ['code' => '0680', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Velha de Rodão')->pluck('id');
        $taxOffices = [
            ['code' => '0698', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Arganil')->pluck('id');
        $taxOffices = [
            ['code' => '0701', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Cantanhede')->pluck('id');
        $taxOffices = [
            ['code' => '0710', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Coimbra')->pluck('id');
        $taxOffices = [
            ['code' => '0728', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3050', 'number' => 2, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Condeixa-a-Nova')->pluck('id');
        $taxOffices = [
            ['code' => '0736', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Figueira da Foz')->pluck('id');
        $taxOffices = [
            ['code' => '0744', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3824', 'number' => 2, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Gois')->pluck('id');
        $taxOffices = [
            ['code' => '0752', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Lousã')->pluck('id');
        $taxOffices = [
            ['code' => '0760', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Mira')->pluck('id');
        $taxOffices = [
            ['code' => '0779', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Miranda do Corvo')->pluck('id');
        $taxOffices = [
            ['code' => '0787', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Montemor-o-Velho')->pluck('id');
        $taxOffices = [
            ['code' => '0795', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Oliveira do Hospital')->pluck('id');
        $taxOffices = [
            ['code' => '0809', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Pampilhosa da Serra')->pluck('id');
        $taxOffices = [
            ['code' => '0817', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Penacova')->pluck('id');
        $taxOffices = [
            ['code' => '0825', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Penela')->pluck('id');
        $taxOffices = [
            ['code' => '0833', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Soure')->pluck('id');
        $taxOffices = [
            ['code' => '0850', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Tabua')->pluck('id');
        $taxOffices = [
            ['code' => '0868', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Nova de Poiares')->pluck('id');
        $taxOffices = [
            ['code' => '0841', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Alandroal')->pluck('id');
        $taxOffices = [
            ['code' => '0876', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Arraiolos')->pluck('id');
        $taxOffices = [
            ['code' => '0884', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Borba')->pluck('id');
        $taxOffices = [
            ['code' => '0892', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Estremoz')->pluck('id');
        $taxOffices = [
            ['code' => '0906', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Evora')->pluck('id');
        $taxOffices = [
            ['code' => '0914', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Montemor-o-Novo')->pluck('id');
        $taxOffices = [
            ['code' => '0922', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Mora')->pluck('id');
        $taxOffices = [
            ['code' => '0930', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Mourão')->pluck('id');
        $taxOffices = [
            ['code' => '0949', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Portel')->pluck('id');
        $taxOffices = [
            ['code' => '0957', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Redondo')->pluck('id');
        $taxOffices = [
            ['code' => '0965', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Reguengos de Monsaraz')->pluck('id');
        $taxOffices = [
            ['code' => '0973', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vendas Novas')->pluck('id');
        $taxOffices = [
            ['code' => '3042', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Viana do Alentejo')->pluck('id');
        $taxOffices = [
            ['code' => '0981', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Viçosa')->pluck('id');
        $taxOffices = [
            ['code' => '0990', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Albufeira')->pluck('id');
        $taxOffices = [
            ['code' => '1007', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Alcoutim')->pluck('id');
        $taxOffices = [
            ['code' => '1015', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Aljezur')->pluck('id');
        $taxOffices = [
            ['code' => '1023', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Castro Marim')->pluck('id');
        $taxOffices = [
            ['code' => '1040', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Faro')->pluck('id');
        $taxOffices = [
            ['code' => '1058', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Lagoa (Algarve)')->pluck('id');
        $taxOffices = [
            ['code' => '1066', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Lagos')->pluck('id');
        $taxOffices = [
            ['code' => '1074', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Loule')->pluck('id');
        $taxOffices = [
            ['code' => '1082', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3859', 'number' => 2, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Monchique')->pluck('id');
        $taxOffices = [
            ['code' => '1090', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Olhão')->pluck('id');
        $taxOffices = [
            ['code' => '1104', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Portimão')->pluck('id');
        $taxOffices = [
            ['code' => '1112', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'S. Bras de Alportel')->pluck('id');
        $taxOffices = [
            ['code' => '1031', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Silves')->pluck('id');
        $taxOffices = [
            ['code' => '1120', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Tavira')->pluck('id');
        $taxOffices = [
            ['code' => '1139', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila do Bispo')->pluck('id');
        $taxOffices = [
            ['code' => '1147', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Real de Santo Antonio')->pluck('id');
        $taxOffices = [
            ['code' => '1155', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Aguiar da Beira')->pluck('id');
        $taxOffices = [
            ['code' => '1163', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Almeida')->pluck('id');
        $taxOffices = [
            ['code' => '1171', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Celorico da Beira')->pluck('id');
        $taxOffices = [
            ['code' => '1180', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Figueira de Castelo Rodrigo')->pluck('id');
        $taxOffices = [
            ['code' => '1198', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Fornos de Algodres')->pluck('id');
        $taxOffices = [
            ['code' => '1201', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Gouveia')->pluck('id');
        $taxOffices = [
            ['code' => '1210', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Guarda')->pluck('id');
        $taxOffices = [
            ['code' => '1228', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Manteigas')->pluck('id');
        $taxOffices = [
            ['code' => '1236', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Meda')->pluck('id');
        $taxOffices = [
            ['code' => '1244', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Pinhel')->pluck('id');
        $taxOffices = [
            ['code' => '1252', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Sabugal')->pluck('id');
        $taxOffices = [
            ['code' => '1260', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Seia')->pluck('id');
        $taxOffices = [
            ['code' => '1279', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Trancoso')->pluck('id');
        $taxOffices = [
            ['code' => '1287', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Nova de Foz Coa')->pluck('id');
        $taxOffices = [
            ['code' => '1295', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Alcobaça')->pluck('id');
        $taxOffices = [
            ['code' => '1309', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Alvaiazere')->pluck('id');
        $taxOffices = [
            ['code' => '1317', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ansião')->pluck('id');
        $taxOffices = [
            ['code' => '1325', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Batalha')->pluck('id');
        $taxOffices = [
            ['code' => '1333', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Bombarral')->pluck('id');
        $taxOffices = [
            ['code' => '1341', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Caldas da Rainha')->pluck('id');
        $taxOffices = [
            ['code' => '1350', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Castanheira de Pera')->pluck('id');
        $taxOffices = [
            ['code' => '1368', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Figueiro dos Vinhos')->pluck('id');
        $taxOffices = [
            ['code' => '1376', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Leiria')->pluck('id');
        $taxOffices = [
            ['code' => '3603', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '1384', 'number' => 1, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Marinha Grande')->pluck('id');
        $taxOffices = [
            ['code' => '1392', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Nazare')->pluck('id');
        $taxOffices = [
            ['code' => '1406', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Obidos')->pluck('id');
        $taxOffices = [
            ['code' => '1414', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Pedrogão Grande')->pluck('id');
        $taxOffices = [
            ['code' => '1422', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Peniche')->pluck('id');
        $taxOffices = [
            ['code' => '1430', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Pombal')->pluck('id');
        $taxOffices = [
            ['code' => '1449', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Porto de Mos')->pluck('id');
        $taxOffices = [
            ['code' => '1457', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Alenquer')->pluck('id');
        $taxOffices = [
            ['code' => '1465', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Arruda dos Vinhos')->pluck('id');
        $taxOffices = [
            ['code' => '1473', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Azambuja')->pluck('id');
        $taxOffices = [
            ['code' => '1481', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Cadaval')->pluck('id');
        $taxOffices = [
            ['code' => '1490', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Cascais')->pluck('id');
        $taxOffices = [
            ['code' => '1503', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3433', 'number' => 2, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Lisboa')->pluck('id');
        $taxOffices = [
            ['code' => '3239', 'number' => 7, 'municipality_id' => $municipalityId],
            ['code' => '3328', 'number' => 9, 'municipality_id' => $municipalityId],
            ['code' => '3263', 'number' => 5, 'municipality_id' => $municipalityId],
            ['code' => '3255', 'number' => 10, 'municipality_id' => $municipalityId],
            ['code' => '3344', 'number' => 11, 'municipality_id' => $municipalityId],
            ['code' => '3336', 'number' => 6, 'municipality_id' => $municipalityId],
            ['code' => '3107', 'number' => 8, 'municipality_id' => $municipalityId],
            ['code' => '3069', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3301', 'number' => 4, 'municipality_id' => $municipalityId],
            ['code' => '3247', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '3085', 'number' => 3, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Loures')->pluck('id');
        $taxOffices = [
            ['code' => '1520', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3158', 'number' => 3, 'municipality_id' => $municipalityId],
            ['code' => '3492', 'number' => 4, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Lourinhã')->pluck('id');
        $taxOffices = [
            ['code' => '1538', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Mafra')->pluck('id');
        $taxOffices = [
            ['code' => '1546', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Oeiras')->pluck('id');
        $taxOffices = [
            ['code' => '3654', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '3522', 'number' => 3, 'municipality_id' => $municipalityId],
            ['code' => '1554', 'number' => 1, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Sintra')->pluck('id');
        $taxOffices = [
            ['code' => '3549', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '1562', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3166', 'number' => 4, 'municipality_id' => $municipalityId],
            ['code' => '3557', 'number' => 3, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Sobral de Monte Agraço')->pluck('id');
        $taxOffices = [
            ['code' => '1570', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Torres Vedras')->pluck('id');
        $taxOffices = [
            ['code' => '1589', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Franca de Xira')->pluck('id');
        $taxOffices = [
            ['code' => '3573', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '1597', 'number' => 1, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Amadora')->pluck('id');
        $taxOffices = [
            ['code' => '3611', 'number' => 3, 'municipality_id' => $municipalityId],
            ['code' => '3140', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '3131', 'number' => 1, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Odivelas')->pluck('id');
        $taxOffices = [
            ['code' => '4227', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Alter do Chão')->pluck('id');
        $taxOffices = [
            ['code' => '1600', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Arronches')->pluck('id');
        $taxOffices = [
            ['code' => '1619', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Avis')->pluck('id');
        $taxOffices = [
            ['code' => '1627', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Campo Maior')->pluck('id');
        $taxOffices = [
            ['code' => '1635', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Castelo de Vide')->pluck('id');
        $taxOffices = [
            ['code' => '1643', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Crato')->pluck('id');
        $taxOffices = [
            ['code' => '1651', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Elvas')->pluck('id');
        $taxOffices = [
            ['code' => '1660', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Fronteira')->pluck('id');
        $taxOffices = [
            ['code' => '1678', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Gavião')->pluck('id');
        $taxOffices = [
            ['code' => '1686', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Marvão')->pluck('id');
        $taxOffices = [
            ['code' => '1694', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Monforte')->pluck('id');
        $taxOffices = [
            ['code' => '1708', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Nisa')->pluck('id');
        $taxOffices = [
            ['code' => '1716', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ponte de Sor')->pluck('id');
        $taxOffices = [
            ['code' => '1724', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Portalegre')->pluck('id');
        $taxOffices = [
            ['code' => '1732', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Sousel')->pluck('id');
        $taxOffices = [
            ['code' => '1740', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Amarante')->pluck('id');
        $taxOffices = [
            ['code' => '1759', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Baião')->pluck('id');
        $taxOffices = [
            ['code' => '1767', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Felgueiras')->pluck('id');
        $taxOffices = [
            ['code' => '1775', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Gondomar')->pluck('id');
        $taxOffices = [
            ['code' => '1783', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3468', 'number' => 2, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Lousada')->pluck('id');
        $taxOffices = [
            ['code' => '1791', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Maia')->pluck('id');
        $taxOffices = [
            ['code' => '1805', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Marco de Canaveses')->pluck('id');
        $taxOffices = [
            ['code' => '1813', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Matosinhos')->pluck('id');
        $taxOffices = [
            ['code' => '3514', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '1821', 'number' => 1, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Paços de Ferreira')->pluck('id');
        $taxOffices = [
            ['code' => '1830', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Paredes')->pluck('id');
        $taxOffices = [
            ['code' => '1848', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Penafiel')->pluck('id');
        $taxOffices = [
            ['code' => '1856', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Porto')->pluck('id');
        $taxOffices = [
            ['code' => '3174', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3360', 'number' => 3, 'municipality_id' => $municipalityId],
            ['code' => '3387', 'number' => 4, 'municipality_id' => $municipalityId],
            ['code' => '3182', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '3190', 'number' => 5, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Povoa de Varzim')->pluck('id');
        $taxOffices = [
            ['code' => '1872', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Santo Tirso')->pluck('id');
        $taxOffices = [
            ['code' => '1880', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Valongo')->pluck('id');
        $taxOffices = [
            ['code' => '3565', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '1899', 'number' => 1, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila do Conde')->pluck('id');
        $taxOffices = [
            ['code' => '1902', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Nova de Gaia')->pluck('id');
        $taxOffices = [
            ['code' => '3204', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '1910', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3964', 'number' => 3, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Trofa')->pluck('id');
        $taxOffices = [
            ['code' => '4219', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Abrantes')->pluck('id');
        $taxOffices = [
            ['code' => '1929', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Alcanena')->pluck('id');
        $taxOffices = [
            ['code' => '1937', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Almeirim')->pluck('id');
        $taxOffices = [
            ['code' => '1945', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Alpiarça')->pluck('id');
        $taxOffices = [
            ['code' => '1953', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Benavente')->pluck('id');
        $taxOffices = [
            ['code' => '1970', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Cartaxo')->pluck('id');
        $taxOffices = [
            ['code' => '1988', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Chamusca')->pluck('id');
        $taxOffices = [
            ['code' => '1996', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Constancia')->pluck('id');
        $taxOffices = [
            ['code' => '2003', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Coruche')->pluck('id');
        $taxOffices = [
            ['code' => '2011', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Entroncamento')->pluck('id');
        $taxOffices = [
            ['code' => '2020', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ferreira do Zezere')->pluck('id');
        $taxOffices = [
            ['code' => '2038', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Golegã')->pluck('id');
        $taxOffices = [
            ['code' => '2046', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Mação')->pluck('id');
        $taxOffices = [
            ['code' => '2054', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Rio Maior')->pluck('id');
        $taxOffices = [
            ['code' => '2062', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Salvaterra de Magos')->pluck('id');
        $taxOffices = [
            ['code' => '2070', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Santarem')->pluck('id');
        $taxOffices = [
            ['code' => '2089', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Sardoal')->pluck('id');
        $taxOffices = [
            ['code' => '2097', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Tomar')->pluck('id');
        $taxOffices = [
            ['code' => '2100', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Torres Novas')->pluck('id');
        $taxOffices = [
            ['code' => '2119', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Nova da Barquinha')->pluck('id');
        $taxOffices = [
            ['code' => '1961', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ourem')->pluck('id');
        $taxOffices = [
            ['code' => '2127', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Alcacer do Sal')->pluck('id');
        $taxOffices = [
            ['code' => '2135', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Alcochete')->pluck('id');
        $taxOffices = [
            ['code' => '2143', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Almada')->pluck('id');
        $taxOffices = [
            ['code' => '3409', 'number' => 3, 'municipality_id' => $municipalityId],
            ['code' => '2151', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3212', 'number' => 2, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Barreiro')->pluck('id');
        $taxOffices = [
            ['code' => '2160', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Grandola')->pluck('id');
        $taxOffices = [
            ['code' => '2178', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Moita')->pluck('id');
        $taxOffices = [
            ['code' => '2186', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Montijo')->pluck('id');
        $taxOffices = [
            ['code' => '2194', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Palmela')->pluck('id');
        $taxOffices = [
            ['code' => '2208', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Santiago do Cacem')->pluck('id');
        $taxOffices = [
            ['code' => '2216', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Seixal')->pluck('id');
        $taxOffices = [
            ['code' => '3697', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '2224', 'number' => 1, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Sesimbra')->pluck('id');
        $taxOffices = [
            ['code' => '2240', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Setubal')->pluck('id');
        $taxOffices = [
            ['code' => '2232', 'number' => 1, 'municipality_id' => $municipalityId],
            ['code' => '3530', 'number' => 2, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Sines')->pluck('id');
        $taxOffices = [
            ['code' => '2259', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Arcos de Valdevez')->pluck('id');
        $taxOffices = [
            ['code' => '2267', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Caminha')->pluck('id');
        $taxOffices = [
            ['code' => '2275', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Melgaço')->pluck('id');
        $taxOffices = [
            ['code' => '2283', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Monção')->pluck('id');
        $taxOffices = [
            ['code' => '2291', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Paredes de Coura')->pluck('id');
        $taxOffices = [
            ['code' => '2305', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ponte da Barca')->pluck('id');
        $taxOffices = [
            ['code' => '2313', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ponte de Lima')->pluck('id');
        $taxOffices = [
            ['code' => '2321', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Valença')->pluck('id');
        $taxOffices = [
            ['code' => '2330', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Viana do Castelo')->pluck('id');
        $taxOffices = [
            ['code' => '2348', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Nova de Cerveira')->pluck('id');
        $taxOffices = [
            ['code' => '2356', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Alijo')->pluck('id');
        $taxOffices = [
            ['code' => '2364', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Boticas')->pluck('id');
        $taxOffices = [
            ['code' => '2372', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Chaves')->pluck('id');
        $taxOffices = [
            ['code' => '2380', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Mesão Frio')->pluck('id');
        $taxOffices = [
            ['code' => '2399', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Mondim de Basto')->pluck('id');
        $taxOffices = [
            ['code' => '2402', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Montalegre')->pluck('id');
        $taxOffices = [
            ['code' => '2410', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Murça')->pluck('id');
        $taxOffices = [
            ['code' => '2429', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Peso da Regua')->pluck('id');
        $taxOffices = [
            ['code' => '2437', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ribeira de Pena')->pluck('id');
        $taxOffices = [
            ['code' => '2445', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Sabrosa')->pluck('id');
        $taxOffices = [
            ['code' => '2453', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Santa Marta de Penaguião')->pluck('id');
        $taxOffices = [
            ['code' => '2461', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Valpaços')->pluck('id');
        $taxOffices = [
            ['code' => '2470', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Pouca de Aguiar')->pluck('id');
        $taxOffices = [
            ['code' => '2488', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Real')->pluck('id');
        $taxOffices = [
            ['code' => '2496', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Armamar')->pluck('id');
        $taxOffices = [
            ['code' => '2500', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Carregal do Sal')->pluck('id');
        $taxOffices = [
            ['code' => '2518', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Castro Daire')->pluck('id');
        $taxOffices = [
            ['code' => '2526', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Cinfães')->pluck('id');
        $taxOffices = [
            ['code' => '2534', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Lamego')->pluck('id');
        $taxOffices = [
            ['code' => '2542', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Mangualde')->pluck('id');
        $taxOffices = [
            ['code' => '2550', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Moimenta da Beira')->pluck('id');
        $taxOffices = [
            ['code' => '2569', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Mortagua')->pluck('id');
        $taxOffices = [
            ['code' => '2577', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Nelas')->pluck('id');
        $taxOffices = [
            ['code' => '2585', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Oliveira de Frades')->pluck('id');
        $taxOffices = [
            ['code' => '2593', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Penalva do Castelo')->pluck('id');
        $taxOffices = [
            ['code' => '2607', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Penedono')->pluck('id');
        $taxOffices = [
            ['code' => '2615', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Resende')->pluck('id');
        $taxOffices = [
            ['code' => '2623', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Santa Comba Dão')->pluck('id');
        $taxOffices = [
            ['code' => '2658', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'S. João da Pesqueira')->pluck('id');
        $taxOffices = [
            ['code' => '2631', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'S. Pedro do Sul')->pluck('id');
        $taxOffices = [
            ['code' => '2640', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Satão')->pluck('id');
        $taxOffices = [
            ['code' => '2666', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Sernancelhe')->pluck('id');
        $taxOffices = [
            ['code' => '2674', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Tabuaço')->pluck('id');
        $taxOffices = [
            ['code' => '2682', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Tarouca')->pluck('id');
        $taxOffices = [
            ['code' => '2690', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Tondela')->pluck('id');
        $taxOffices = [
            ['code' => '2704', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Nova de Paiva')->pluck('id');
        $taxOffices = [
            ['code' => '2712', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Viseu')->pluck('id');
        $taxOffices = [
            ['code' => '2720', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vouzela')->pluck('id');
        $taxOffices = [
            ['code' => '2739', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Angra do Heroismo')->pluck('id');
        $taxOffices = [
            ['code' => '2747', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Calheta (Açores)')->pluck('id');
        $taxOffices = [
            ['code' => '2755', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Santa Cruz da Graciosa')->pluck('id');
        $taxOffices = [
            ['code' => '2771', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Velas')->pluck('id');
        $taxOffices = [
            ['code' => '2780', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Praia da Vitoria')->pluck('id');
        $taxOffices = [
            ['code' => '2763', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Corvo')->pluck('id');
        $taxOffices = [
            ['code' => '2909', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Horta')->pluck('id');
        $taxOffices = [
            ['code' => '2917', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Lajes das Flores')->pluck('id');
        $taxOffices = [
            ['code' => '2925', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Lajes do Pico')->pluck('id');
        $taxOffices = [
            ['code' => '2933', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Madalena')->pluck('id');
        $taxOffices = [
            ['code' => '2941', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Santa Cruz das Flores')->pluck('id');
        $taxOffices = [
            ['code' => '2968', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'S. Roque do Pico')->pluck('id');
        $taxOffices = [
            ['code' => '2950', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Lagoa (Açores)')->pluck('id');
        $taxOffices = [
            ['code' => '2976', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Nordeste')->pluck('id');
        $taxOffices = [
            ['code' => '2984', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ponta Delgada')->pluck('id');
        $taxOffices = [
            ['code' => '2992', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Povoação')->pluck('id');
        $taxOffices = [
            ['code' => '3000', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ribeira Grande')->pluck('id');
        $taxOffices = [
            ['code' => '3018', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila Franca do Campo')->pluck('id');
        $taxOffices = [
            ['code' => '3026', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Vila do Porto')->pluck('id');
        $taxOffices = [
            ['code' => '3034', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Calheta (Madeira)')->pluck('id');
        $taxOffices = [
            ['code' => '2798', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Camara de Lobos')->pluck('id');
        $taxOffices = [
            ['code' => '2801', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Funchal')->pluck('id');
        $taxOffices = [
            ['code' => '3450', 'number' => 2, 'municipality_id' => $municipalityId],
            ['code' => '2810', 'number' => 1, 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Machico')->pluck('id');
        $taxOffices = [
            ['code' => '2828', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ponta do Sol')->pluck('id');
        $taxOffices = [
            ['code' => '2836', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Porto Moniz')->pluck('id');
        $taxOffices = [
            ['code' => '2844', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Porto Santo')->pluck('id');
        $taxOffices = [
            ['code' => '2852', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Ribeira Brava')->pluck('id');
        $taxOffices = [
            ['code' => '2860', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Santa Cruz')->pluck('id');
        $taxOffices = [
            ['code' => '2887', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'Santana')->pluck('id');
        $taxOffices = [
            ['code' => '2895', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);

        $municipalityId = DB::table('pt_municipalities')->where('name', 'S. Vicente')->pluck('id');
        $taxOffices = [
            ['code' => '2879', 'municipality_id' => $municipalityId],
        ];
        DB::table('item_tax_offices')->insert($taxOffices);
    }
}
