<?php

class HeaderLanguageSwitcher {
    private static $langToMenuRoot = array('hu' => 61, 'en' => 145, 'de' => 105);

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

    private static function resolveSourceCategory($db, $filterSlug, $currentLang) {
        if (!$filterSlug) {
            return null;
        }

        $safeSlug = addslashes($filterSlug);
        $langOrder = array_unique(array($currentLang, 'hu', 'en', 'de'));

        foreach ($langOrder as $lang) {
            if (!isset(self::$langToMenuRoot[$lang])) {
                continue;
            }
            $parentId = self::$langToMenuRoot[$lang];
            $row = $db->Query("SELECT * FROM categories WHERE parent_id='$parentId' AND permalink='$safeSlug' LIMIT 0,1");
            if ($row) {
                return $row;
            }
        }

        return null;
    }

    private static function resolveMappedFilterSlug($db, $sourceCategory, $targetLang) {
        if (!$sourceCategory || !isset(self::$langToMenuRoot[$targetLang])) {
            return null;
        }

        $targetParentId = self::$langToMenuRoot[$targetLang];
        $sortOrder = addslashes($sourceCategory->sort_order);

        $mappedCategory = $db->Query("SELECT * FROM categories WHERE parent_id='$targetParentId' AND sort_order='$sortOrder' LIMIT 0,1");
        if (!$mappedCategory || empty($mappedCategory->permalink)) {
            return null;
        }

        return $mappedCategory->permalink;
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
            $sourceCategory = self::resolveSourceCategory($db, $filterSlug, $currentLang);
            $mappedHuSlug = self::resolveMappedFilterSlug($db, $sourceCategory, 'hu');
            $mappedEnSlug = self::resolveMappedFilterSlug($db, $sourceCategory, 'en');
            $mappedDeSlug = self::resolveMappedFilterSlug($db, $sourceCategory, 'de');

            $huUrl = $mappedHuSlug ? '/ettermunk_kinalata/filter:' . $mappedHuSlug : '/ettermunk_kinalata';
            $enUrl = $mappedEnSlug ? '/en/ettermunk_kinalata/filter:' . $mappedEnSlug : '/en/ettermunk_kinalata';
            $deUrl = $mappedDeSlug ? '/de/ettermunk_kinalata/filter:' . $mappedDeSlug : '/de/ettermunk_kinalata';
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
