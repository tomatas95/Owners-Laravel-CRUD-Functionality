<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ShortCode;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplaceShortCodes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $content = $response->getContent();

        preg_match_all('/\[\[(.*?)\]\]/', $content, $matches);

        foreach ($matches[1] as $shortcode) {
            $shortCode = ShortCode::where('shortcode', $shortcode)->first();

            if ($shortCode) {
                $content = str_replace("[[{$shortcode}]]", $shortCode->replace, $content);
            }
        }

        $response->setContent($content);

        return $response;
    }
}
