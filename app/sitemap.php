<?php
    header("Content-Type: application/xml; charset=utf-8");

    echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

    // Ici vous pouvez ajouter les URLs de votre site
    // Par exemple, si vous avez une page d'accueil et une page de contact:
    generateUrl('https://c2d4-77-132-167-143.ngrok-free.app/', 'daily', '1.0');
    generateUrl('https://yourwebsite.com/contact', 'monthly', '0.8');

    echo '</urlset>' . PHP_EOL;

    function generateUrl($url, $frequency, $priority, $lastmod = '2023-06-30') {
        echo '<url>' . PHP_EOL;
        echo '<loc>' . htmlspecialchars($url) . '</loc>' . PHP_EOL;
        echo '<lastmod>' . htmlspecialchars($lastmod) . '</lastmod>' . PHP_EOL;
        echo '<changefreq>' . htmlspecialchars($frequency) . '</changefreq>' . PHP_EOL;
        echo '<priority>' . htmlspecialchars($priority) . '</priority>' . PHP_EOL;
        echo '</url>' . PHP_EOL;
    }
?>
