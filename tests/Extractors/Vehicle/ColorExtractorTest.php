<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Models\Attributes\Vehicle\VehicleColor;

/**
 * This is the color extractor test class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class ColorExtractorTest extends AbstractVehicleExtractorTest
{
    public function testExtractColor()
    {
        $text = [
            'preto'         => 'Preto',
            'preta'         => 'Preto',
            'branco'        => 'Branco',
            'esbranquiçado' => 'Branco',
            'esbranquiçada' => 'Branco',
            'cinzento'      => 'Cinzento',
            'cinzenta'      => 'Cinzento',
            'cinza'         => 'Cinzento',
            'acinzentado'   => 'Cinzento',
            'acinzentada'   => 'Cinzento',
            'azul'          => 'Azul',
            'azulado'       => 'Azul',
            'azulada'       => 'Azul',
            'vermelho'      => 'Vermelho',
            'vermelha'      => 'Vermelho',
            'avermelhado'   => 'Vermelho',
            'encarnado'     => 'Vermelho',
            'encarnada'     => 'Vermelho',
            'verde'         => 'Verde',
            'esverdeado'    => 'Verde',
            'esverdeada'    => 'Verde',
            'amarelado'     => 'Amarelo',
            'amarelada'     => 'Amarelo',
            'castanho'      => 'Castanho',
            'castanha'      => 'Castanho',
            'acastanhada'   => 'Castanho',
            'acastanhado'   => 'Castanho',
            'prateado'      => 'Prateado',
            'prateada'      => 'Prateado',
            'dourado'       => 'Dourado',
            'dourada'       => 'Dourado',
            'rosa'          => 'Rosa',
            'roxo'          => 'Roxo',
            'roxa'          => 'Roxo',
            'bege'          => 'Bege',
        ];

        foreach ($text as $input => $expected) {
            $colorId = $this->extractor->color($input);

            $this->assertNotNull($colorId, "Input: $input");
            $this->assertSame($expected, VehicleColor::find($colorId)->name);
        }
    }
}
