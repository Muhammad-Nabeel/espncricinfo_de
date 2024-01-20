<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    public function generate()
    {
        $host = "https://espncricinfo.de/";//config('app.url');
        $posts = $this->getPostList();

        $xmlContent = $this->buildXmlContent($host, $posts);

        return response($xmlContent)->header('Content-Type', 'application/xml');
    }

    private function getPostList()
    {
        // Implement the logic to get your posts
        // Example: $posts = Post::all();
        $posts = Post::with('category')->get();
       // print_r(json_encode($posts));
       return $posts;
    }

    private function buildXmlContent($host, $posts)
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startDocument('1.0', 'UTF-8');
        $xml->startElement('urlset');
        $xml->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        $this->addUrlElement($xml, $host);
        $this->addUrlElement($xml, $host . '/About');
        $this->addUrlElement($xml, $host . '/Career');
        $this->addUrlElement($xml, $host . '/Live');

        foreach ($posts as $post) {
            $url = $host . '' . $post->Category->CategoryTitle . '/' . $post->Slug;

            $lastmod = Carbon::parse($post->updated_at)->format('Y-m-d\TH:i:sP');
            $this->addUrlElement($xml, $url, $lastmod);
        }

        $xml->endElement();
        $xml->endDocument();

        return $xml->outputMemory();
    }

    private function addUrlElement($xml, $loc, $lastmod = null)
    {
        $xml->startElement('url');
        $xml->writeElement('loc', $loc);

        if ($lastmod) {
            $xml->writeElement('lastmod', $lastmod);
        }

        $xml->writeElement('priority', '1.00');
        $xml->endElement(); // </url>
    }
}
