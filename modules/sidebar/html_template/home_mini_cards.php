<?php
$lang = isset($lang) ? strtolower((string)$lang) : 'hu';
if ($lang === '') {
    $lang = 'hu';
}

$order = (isset($order) && is_array($order) && count($order) > 0)
    ? $order
    : array('accommodation', 'menu', 'delivery');

$cards = array(
    'hu' => array(
        'accommodation' => array(
            'class' => 'home-card-accommodation-mini',
            'image' => '/images/skin_v2/jegverem_fogado_sopron_panzio_szallas.png',
            'alt' => 'Szállás',
            'link' => '/a_panziorol',
            'title' => 'Szállás',
            'text' => 'A panzióban 6 autentikus stílusú, modern felszereltséggel ellátott szoba várja a vendégeket. Ez a szálláshely ideális kiindulópont Sopron felfedezéséhez, hiszen a történelmi belváros közvetlen szomszédságában, a régi poncichter-negyedben található.',
            'cta' => 'A panzióról >>',
            'external' => false,
        ),
        'menu' => array(
            'class' => 'home-card-menu-mini',
            'image' => '/images/skin_v2/jegverem_fogado_sopron_ettermunk_kinalata.png',
            'alt' => 'Éttermünk kínálata',
            'link' => '/ettermunk_kinalata',
            'title' => 'Éttermünk kínálata',
            'text' => 'Étlapunk a hagyományos magyar ízekből merít inspirációt, amelyeket kreatívan újragondolt klasszikusok és a nemzetközi konyhaművészet izgalmas fogásai egészítenek ki. Kínálatunk a minőségi alapanyagokra és a harmonikus ízélményre épül.',
            'cta' => 'ÉTLAPUNK >>',
            'external' => false,
        ),
        'delivery' => array(
            'class' => 'home-card-delivery-mini',
            'image' => '/images/skin_v2/jegverem_fogado_sopron_kiszallitas_web.png',
            'alt' => 'Házhozszállítás',
            'link' => 'https://mobilpincer.net/hu/jegverem-fogado',
            'title' => 'Házhozszállítás',
            'text' => 'Minden hétköznap 11.00-21.00 között a Jégverem pincér házhoz megy!',
            'cta' => 'Online Ételrendelés',
            'external' => true,
        ),
    ),
    'en' => array(
        'accommodation' => array(
            'class' => 'home-card-accommodation-mini',
            'image' => '/images/skin_v2/jegverem_fogado_sopron_panzio_szallas.png',
            'alt' => 'Accommodation',
            'link' => '/en/a_panziorol',
            'title' => 'Accommodation',
            'text' => 'The guesthouse offers 6 authentic-style rooms equipped with modern amenities. This accommodation is an ideal starting point for exploring Sopron, as it is located in the immediate vicinity of the historic Old Town, in the heart of the old Poncichter district.',
            'cta' => 'About the guesthouse >>',
            'external' => false,
        ),
        'menu' => array(
            'class' => 'home-card-menu-mini',
            'image' => '/images/skin_v2/jegverem_fogado_sopron_ettermunk_kinalata.png',
            'alt' => 'Our Restaurant’s Menu',
            'link' => '/en/ettermunk_kinalata',
            'title' => 'Our Restaurant’s Menu',
            'text' => 'Our menu draws inspiration from traditional Hungarian flavors, complemented by creatively reimagined classics and exciting dishes from international cuisine. Our selection is built on quality ingredients and a harmonious taste experience.',
            'cta' => 'VIEW OUR MENU >>',
            'external' => false,
        ),
        'delivery' => array(
            'class' => 'home-card-delivery-mini',
            'image' => '/images/skin_v2/jegverem_fogado_sopron_kiszallitas_web.png',
            'alt' => 'Delivery',
            'link' => 'https://mobilpincer.net/hu/jegverem-fogado',
            'title' => 'Delivery',
            'text' => 'Every weekday between 11:00 AM and 9:00 PM, the Jégverem waiter delivers right to your door!',
            'cta' => 'Online Ordering',
            'external' => true,
        ),
    ),
    'de' => array(
        'accommodation' => array(
            'class' => 'home-card-accommodation-mini',
            'image' => '/images/skin_v2/jegverem_fogado_sopron_panzio_szallas.png',
            'alt' => 'Unterkunft',
            'link' => '/de/a_panziorol',
            'title' => 'Unterkunft',
            'text' => 'In der Pension erwarten 6 Zimmer im authentischen Stil, ausgestattet mit modernem Komfort, die Gäste. Diese Unterkunft ist ein idealer Ausgangspunkt für die Entdeckung von Ödenburg (Sopron), da sie sich in unmittelbarer Nähe der historischen Altstadt, im alten Poncichter-Viertel, befindet.',
            'cta' => 'Über die Pension >>',
            'external' => false,
        ),
        'menu' => array(
            'class' => 'home-card-menu-mini',
            'image' => '/images/skin_v2/jegverem_fogado_sopron_ettermunk_kinalata.png',
            'alt' => 'Das Angebot unseres Restaurants',
            'link' => '/de/ettermunk_kinalata',
            'title' => 'Das Angebot unseres Restaurants',
            'text' => 'Unsere Speisekarte lässt sich von traditionellen ungarischen Aromen inspirieren, die durch kreativ neu interpretierte Klassiker und spannende Gerichte der internationalen Kochkunst ergänzt werden. Unser Angebot basiert auf hochwertigen Zutaten und einem harmonischen Geschmackserlebnis.',
            'cta' => 'ZUR SPEISEKARTE >>',
            'external' => false,
        ),
        'delivery' => array(
            'class' => 'home-card-delivery-mini',
            'image' => '/images/skin_v2/jegverem_fogado_sopron_kiszallitas_web.png',
            'alt' => 'Lieferung',
            'link' => 'https://mobilpincer.net/hu/jegverem-fogado',
            'title' => 'Lieferung',
            'text' => 'An jedem Wochentag von 11:00 bis 21:00 Uhr kommt der Jégverem-Kellner direkt zu Ihnen nach Hause!',
            'cta' => 'Online Bestellung',
            'external' => true,
        ),
    ),
);

if (!isset($cards[$lang])) {
    $lang = 'hu';
}

foreach ($order as $key) {
    if (!isset($cards[$lang][$key])) {
        continue;
    }

    $card = $cards[$lang][$key];
    $externalAttrs = $card['external'] ? ' target="_blank" rel="noopener noreferrer"' : '';
    ?>
    <div class="item home-card-mini <?= $card['class'] ?>">
        <div class="home-card-mini-media">
            <a href="<?= $card['link'] ?>"<?= $externalAttrs ?>><img src="<?= $card['image'] ?>" alt="<?= htmlspecialchars($card['alt'], ENT_QUOTES, 'UTF-8') ?>" /></a>
        </div>

        <div class="home-card-mini-body">
            <h3 class="home-card-mini-title"><a href="<?= $card['link'] ?>"<?= $externalAttrs ?>><?= htmlspecialchars($card['title'], ENT_QUOTES, 'UTF-8') ?></a></h3>

            <p class="home-card-mini-text"><?= htmlspecialchars($card['text'], ENT_QUOTES, 'UTF-8') ?></p>

            <a class="home-card-mini-btn" href="<?= $card['link'] ?>"<?= $externalAttrs ?>><?= htmlspecialchars($card['cta'], ENT_QUOTES, 'UTF-8') ?></a>
        </div>
    </div>
    <?php
}
?>
