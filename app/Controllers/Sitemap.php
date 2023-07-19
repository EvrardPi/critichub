<?php

namespace App\Controllers;

class Sitemap
{
    public function sitemap()
    {
        if (!extension_loaded('yaml')) {
            die("L'extension YAML pour PHP est requise.");
        }

        $baseURL = "https://critichub.fr";
        $routesFile = "../routes.yml";
        $sitemapFile = "../sitemap.xml";

        $yaml = yaml_parse_file($routesFile);

        if ($yaml === false) {
            die("Erreur dans la lecture de routes.yml");
        }

        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($yaml as $slug => $route) {

            if(strpos($slug, 'back-') === 0) {
                continue; // Ignore les routes qui commencent par "back-..."
            }
            
            $sitemap .= "\t<url>" . PHP_EOL;
            $sitemap .= "\t\t<loc>";
            $sitemap .= htmlspecialchars(($slug == 'default') ? $baseURL : $baseURL . '/' . $slug);
            $sitemap .= "</loc>" . PHP_EOL;
            $sitemap .= "\t\t<lastmod>" . date('Y-m-d') . "</lastmod>" . PHP_EOL;
            $sitemap .= "\t\t<changefreq>daily</changefreq>" . PHP_EOL;
            $sitemap .= "\t\t<priority>0.5</priority>" . PHP_EOL;
            $sitemap .= "\t</url>" . PHP_EOL;
        }

        $sitemap .= '</urlset>' . PHP_EOL;

        if (file_put_contents($sitemapFile, $sitemap)) {
            header("Content-type: text/xml");
            echo $sitemap;
            // echo "Sitemap généré avec succès !";
        } else {
            // echo "Erreur lors de la génération de la sitemap.";
        }
    }
}
