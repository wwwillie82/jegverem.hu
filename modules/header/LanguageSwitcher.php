<?php

class HeaderLanguageSwitcher {
    private static function detectRouteContext() {
        $path = URI::GetCurrentRoutePath();
        $currentLang = 'hu';
        $basePath = $path;

        if ($path === '' || $path === '/') {
            $basePath = '/index';
        } elseif ($path === '/en') {
            $basePath = '/index';
            $currentLang = 'en';
        } elseif (strpos($path, '/en/') === 0) {
            $basePath = substr($path, 3);
            $currentLang = 'en';
        } elseif ($path === '/de') {
            $basePath = '/index';
            $currentLang = 'de';
        } elseif (strpos($path, '/de/') === 0) {
            $basePath = substr($path, 3);
            $currentLang = 'de';
        }

        if ($basePath === '' || $basePath === '/') {
            $basePath = '/index';
        }

        return array($path, $currentLang, $basePath);
    }

    public static function build($db) {
        list($path, $currentLang, $basePath) = self::detectRouteContext();

        if ($basePath === '/index') {
            $huUrl = '/index';
            $enUrl = '/en';
            $deUrl = '/de';
        } else {
            $huUrl = $basePath;
            $enUrl = '/en' . $basePath;
            $deUrl = '/de' . $basePath;
        }

        $filterSlug = URI::GetNamedParam('filter');
        if (strpos($basePath, '/ettermunk_kinalata') === 0 && $filterSlug) {
            $huUrl = '/ettermunk_kinalata';
            $enUrl = '/en/ettermunk_kinalata';
            $deUrl = '/de/ettermunk_kinalata';
        }

        return array(
            'path' => $path,
            'currentLang' => $currentLang,
            'basePath' => $basePath,
            'langPrefix' => $currentLang === 'hu' ? '' : '/' . $currentLang,
            'homeUrl' => $currentLang === 'hu' ? '/index' : '/' . $currentLang,
            'huUrl' => $huUrl,
            'enUrl' => $enUrl,
            'deUrl' => $deUrl
        );
    }
}
