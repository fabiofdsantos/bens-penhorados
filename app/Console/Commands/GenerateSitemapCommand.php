<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

/**
 * This is the "generate sitemap" command class.
 *
 * @author Fábio Santos <ffsantos92@gmail.com>
 */
class GenerateSitemapCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a new sitemap.xml file';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        header('Content-type: text/xml');
        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?'.'>';
        $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml[] = '  <url>';
        $xml[] = '    <loc>https://www.benspenhorados.pt</loc>';
        $xml[] = '    <lastmod>'.\Carbon\Carbon::today()->toW3cString().'</lastmod>';
        $xml[] = '    <changefreq>daily</changefreq>';
        $xml[] = '    <priority>0.8</priority>';
        $xml[] = '  </url>';

        $items = \App\Models\Items\Item::all();
        foreach ($items as $item) {
            $xml[] = '  <url>';
            $xml[] = '    <loc>https://www.benspenhorados.pt/'.$item->category()->pluck('slug').'/'.$item->slug.'</loc>';
            $xml[] = '    <lastmod>'.\Carbon\Carbon::parse($item->updated_at)->toW3cString().'</lastmod>';
            $xml[] = '  </url>';
        }
        $xml[] = '</urlset>';

        $xmlOutput = implode("\n", $xml);

        if (Storage::exists('sitemap.xml')) {
            Storage::delete('sitemap.xml');
        }

        Storage::put('sitemap.xml', $xmlOutput);

        $this->info('Sitemap.xml has been generated successfully!');
    }
}
