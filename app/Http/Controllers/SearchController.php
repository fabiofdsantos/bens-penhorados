<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;

/**
 * This is the search controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class SearchController extends Controller
{
    public function properties()
    {
        $data = [
            'title'             => 'Imóveis Penhorados',
            'seoTitle'          => 'Venda de Imóveis Penhorados em Portugal',
            'metaDescription'   => 'Encontre apartamentos, prédios, terrenos, lojas e outros imóveis penhorados pelas Finanças em Portugal Continental, Açores e Mandeira.',
            'category_lc'       => 'imóveis',
            'category_c'        => 'Imóveis',
            'category_slug'     => 'imoveis',
            'keyword_search_ex' => 'ex. Terreno',
        ];

        return view('properties.index', $data);
    }

    public function vehicles()
    {
        $data = [
            'title'             => 'Veículos Penhorados',
            'seoTitle'          => 'Venda de Veículos Penhorados em Portugal',
            'metaDescription'   => 'Encontre automóveis ligeiros, pesados, motociclos e outros veículos penhorados pelas Finanças em Portugal Continental, Açores e Mandeira.',
            'category_lc'       => 'veículos',
            'category_c'        => 'Veículos',
            'category_slug'     => 'veiculos',
            'keyword_search_ex' => 'ex. Peugeot 206',
        ];

        return view('vehicles.index', $data);
    }

    public function others()
    {
        $data = [
            'title'             => 'Outros Bens Penhorados',
            'seoTitle'          => 'Venda de Outros Bens Penhorados em Portugal',
            'metaDescription'   => 'Encontre outros bens (p. ex. jóias, material de escritório, etc.) penhorados pelas Finanças em Portugal Continental, Açores e Mandeira.',
            'category_lc'       => 'outros bens',
            'category_c'        => 'Outros bens',
            'category_slug'     => 'outros',
            'keyword_search_ex' => 'ex. Frigorífico',
        ];

        return view('others.index', $data);
    }
}
