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
 * This is the static page controller class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class StaticPageController extends Controller
{
    const PAGES = [
        'politica-de-privacidade' => [
            'seoTitle'        => 'Política de Privacidade',
            'metaDescription' => 'Política de privacidade do website BensPenhorados.pt',
            'metaRobots'      => 'noindex',
        ],
    ];

    /**
     * Show both latest and items ending soon.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function load($slug)
    {
        try {
            $markdown = file_get_contents(base_path('resources/pages/').$slug.'.md');
        } catch (\Exception $ex) {
            abort(404);
        }

        $data = self::PAGES[$slug];
        $data['content'] = app('Parsedown')->text($markdown);

        return view('generic', $data);
    }
}
