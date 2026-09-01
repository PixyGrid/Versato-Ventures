<?php
/* ---- Versato gallery: curated set of real event photos already in img/home/ ---- */
$CATS = array(
  'prewedding'=>'Pre-Wedding','engagement'=>'Engagement','devarasamaaradhane'=>'Devarasamaaradhane',
  'haldi'=>'Haldi','mehendi'=>'Mehendi','sangeet'=>'Sangeet','muhurtham'=>'Muhurtham',
  'reception'=>'Reception','honeymoon'=>'Honeymoon','naamakarana'=>'Naamakarana','upanayana'=>'Upanayana',
  'seemantham'=>'Seemantham','shashti'=>'Shashti Poorthi','grihapravesha'=>'Griha Pravesha','birthday'=>'Birthday'
);
$COLORS = array('var(--rose)','var(--orange)','var(--amber)','var(--emerald)','var(--cyan)','var(--magenta)');
/* Each entry: array(file-in-img/home, category-key-or-empty, caption). Empty category = shows under "All" only. */
$G = array(
  array('nc-gate.jpg','',              'Grand Entrance Gate'),
  array('ds-welcome.jpg','',           'Welcome Signboard'),
  array('ds-entrance.jpg','',          'Entrance Walkway'),
  array('kaira-arch.jpg','',           'Marigold Walkway'),
  array('ds-rangoli.jpg','',           'Floor Rangoli'),
  array('ds-decor.jpg','',             'Woven Leaf Decor'),
  array('nc-procession.jpg','',        'Umbrella Procession'),
  array('kaira-engagement.jpg','engagement', 'Engagement at the Floral Arch'),
  array('sharanya-engagement.jpg','engagement','Garden Engagement'),
  array('vinuthan-couple.jpg','engagement',  'Couple Portrait'),
  array('kaira-candid.jpg','prewedding',     'Pre-Wedding Candid'),
  array('kaira-guns.jpg','prewedding',       'Pre-Wedding Prop Shoot'),
  array('vinuthan-firstdance.jpg','prewedding','Pre-Wedding Dance'),
  array('ds-drape.jpg','haldi',        'Haldi Drape Hall'),
  array('ds-hall.jpg','haldi',         'Haldi Mandap Hall'),
  array('sharanya-sangeet.jpg','sangeet',    'Sangeet Night'),
  array('nc-sangeet.jpg','sangeet',    'Sangeet Welcome Sign'),
  array('nc-mandap.jpg','muhurtham',   'Muhurtham Mandap'),
  array('kaira-mandap.jpg','muhurtham','Mandap Pavilion'),
  array('kaira-stage.jpg','muhurtham', 'Muhurtham Stage'),
  array('kaira-reception.jpg','reception',   'Reception Stage'),
  array('kaira-recstage.jpg','reception',    'White Ring-Arch Reception'),
  array('ds-reception.jpg','reception',      'Reception with Fairy Lights'),
  array('vinuthan-stage.jpg','reception',    'Neon Stage Reception'),
  array('nc-stage.jpg','reception',    'Marigold Stage'),
  array('ds-stage.jpg','reception',    'Dry-Ice Reception Stage'),
  array('kaira-gauri.jpg','seemantham','Seemantham with Gauri Dolls'),
);
$items = array();
foreach ($G as $g) {
  if (!is_file(__DIR__.'/img/home/'.$g[0])) continue;   // skip any not present on server
  $items[] = array('path'=>'img/home/'.$g[0], 'cat'=>$g[1], 'cap'=>$g[2]);
}

/* ---- append every other genuine event/celebration photo present in img/home ---- */
$have = array();
foreach ($items as $it) { $have[basename($it['path'])] = true; }
$capmap = array('kaira'=>'The KaiRa Wedding','nc'=>'Nithin & Chaitra','ds'=>'Divya & Sachith','vinuthan'=>'The Vinuthan Wedding','sharanya'=>'The Sharanya','birthday'=>'Birthday Celebration','home'=>'Versato Ventures');
$scan = glob(__DIR__.'/img/home/*.jpg'); sort($scan);
foreach ($scan as $p) {
  $b = basename($p);
  if (isset($have[$b])) continue;                       // already in the curated set
  if (!preg_match('/^(kaira|nc|ds|vinuthan|sharanya|birthday|mb-ds|mb-wp|home-about)-/', $b)) continue; // genuine photos only
  $pref = explode('-', $b)[0];
  $cap = (strpos($b,'mb-')===0) ? 'Decor Moodboard' : (isset($capmap[$pref]) ? $capmap[$pref] : 'Versato Ventures');
  $items[] = array('path'=>'img/home/'.$b, 'cat'=>'', 'cap'=>$cap);
}
$present = array();
foreach ($items as $it) { if ($it['cat']!=='') $present[$it['cat']]=true; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gallery | Event Films & Photos | Versato Ventures Bengaluru</title>
<meta name="description" content="Watch real Versato Ventures event films and browse photos from weddings, social celebrations, cultural evenings and milestone celebrations across Bengaluru.">
<meta name="theme-color" content="#FDFCFA">
<meta name="author" content="Versato Ventures">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://versatoventures.com/gallery.html">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Versato Ventures">
<meta property="og:title" content="Gallery | Event Films & Photos | Versato Ventures Bengaluru">
<meta property="og:description" content="Watch real Versato Ventures event films and browse photos from weddings, social celebrations, cultural evenings and milestone celebrations across Bengaluru.">
<meta property="og:url" content="https://versatoventures.com/gallery.html">
<meta property="og:image" content="https://versatoventures.com/img/og-cover.jpg">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Gallery | Event Films & Photos | Versato Ventures Bengaluru">
<meta name="twitter:description" content="Real event films and photos from weddings, social and cultural celebrations by Versato Ventures, Bengaluru.">
<meta name="twitter:image" content="https://versatoventures.com/img/og-cover.jpg">
<link rel="icon" type="image/png" href="img/favicon.png">
<link rel="apple-touch-icon" href="img/favicon.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..700;1,9..144,300..600&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ProfessionalService",
  "@id": "https://versatoventures.com/#business",
  "name": "Versato Ventures",
  "description": "End-to-end event management company in Bengaluru handling curation, creation and execution for weddings, social celebrations and cultural experiences.",
  "url": "https://versatoventures.com/",
  "logo": "https://versatoventures.com/img/versato-logo.png",
  "image": "https://versatoventures.com/img/og-cover.jpg",
  "slogan": "Endless ideas, ingenious execution",
  "areaServed": "Bengaluru, India",
  "priceRange": "$$$",
  "telephone": "+91-9187080181",
  "founder": [
    {"@type":"Person","name":"Sourabh Kulkarni","jobTitle":"Co-founder, Creative Director","description":"Celebrity actor, director, anchor and theatre artist"},
    {"@type":"Person","name":"Namratha Tejkiran","jobTitle":"Co-founder, Planning & Experience","description":"Classical dancer and event planner"}
  ],
  "knowsAbout": ["Wedding planning","Social celebrations","Cultural events","Event decor","Event photography","Event catering"],
  "address": {"@type":"PostalAddress","streetAddress":"No. 18/A, 5th Floor, 4th A Main Road, 6th Block, BSK 3rd Stage, 3rd Phase, Kathriguppe","addressLocality":"Bengaluru","addressRegion":"Karnataka","postalCode":"560085","addressCountry":"IN"},
  "sameAs": ["https://www.instagram.com/versato.ventures","https://www.facebook.com/share/194b4kUQDB/","https://www.youtube.com/@versatoventures4111"],
  "aggregateRating": {"@type":"AggregateRating","ratingValue":"4.9","reviewCount":"38"}
}
</script>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"https://versatoventures.com/"},{"@type":"ListItem","position":2,"name":"Gallery","item":"https://versatoventures.com/gallery.html"}]}
</script>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="prog"></div>
<div id="cur"></div><div id="curd"></div>
<div id="vmodal" class="vmodal"><div class="vm-back"></div><div class="vm-inner"><button class="vm-close" aria-label="Close">&times;</button><div class="vm-frame" id="vmFrame"></div></div></div>
<div id="pre"><div class="pl"></div><div class="bar"><i></i></div></div>

<nav id="nav">
  <div class="wrap in">
    <a href="index.html" class="brand" data-cur aria-label="Versato Ventures"><span class="navlogo"></span></a>
    <div class="nlinks"><a href="index.html">Home</a><a href="about.html">About</a><a href="events.html">Events</a><a href="services.html">Services</a><a href="gallery.html" class="active">Gallery</a><a href="projects.html">Projects</a><a href="blog.html">Blogs</a></div>
    <a href="contact.html" class="nav-cta" data-cur>Contact us</a>
    <div class="burger" id="burger"><span></span><span></span><span></span></div>
  </div>
</nav>
<div id="mmenu">
  <div class="mm-head"><span class="mm-logo"></span><button class="mm-close" id="mmClose" aria-label="Close">&times;</button></div>
  <div class="mm-links"><a href="index.html">Home</a><a href="about.html">About</a><a href="events.html">Events</a><a href="services.html">Services</a><a href="gallery.html">Gallery</a><a href="projects.html">Projects</a><a href="blog.html">Blogs</a><a href="contact.html" class="mm-cta">Contact us</a></div>
  <div class="mm-foot"><a href="https://wa.me/919187080181" target="_blank" rel="noopener">WhatsApp</a><a href="https://www.instagram.com/versato.ventures" target="_blank" rel="noopener">Instagram</a><a href="https://www.youtube.com/@versatoventures4111" target="_blank" rel="noopener">YouTube</a></div>
</div>
<header class="phero">
  <div class="pbg" style="background-image:url('img/home/gallery-01.jpg')"></div>
  <div class="pscrim"></div>
  <div class="wrap">
    <div class="crumb"><a href="index.html">Home</a><i>/</i><span>Gallery</span></div>
    <span class="eyebrow od"><span class="dot"></span>The film gallery</span>
    <h1>Press play, <span class="hl">stay a while.</span></h1>
    <p>Our films, not our portfolio. Real celebrations unfolding in real time. Hit play on any of them, then scroll down for the stills.</p>
    <div class="pmeta"><div class="pill clr" style="--pc:var(--magenta)"><span class="picon"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></span><div><b class="num">6</b><s>films to watch</s></div></div><div class="pill clr" style="--pc:var(--cyan)"><span class="picon"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 5v14M17 5v14M3 12h18"/></svg></span><div><b class="num">1080p</b><s>full celebrations</s></div></div></div>
  </div>
</header>
<section class="sec"><div class="wrap">
  <div class="sec-head reveal"><span class="eyebrow"><span class="dot"></span>Our films</span><h2 class="big" style="margin-top:18px">Straight from <span class="hl">the celebration.</span></h2><p class="lead">Press play to watch a celebration unfold. For the full project stories, head to Projects.</p></div>
  <div class="gal-grid reveal"><div class="gtile" data-yt="GHupIQ7w70c" data-cur><img loading="lazy" decoding="async" data-fb src="https://i.ytimg.com/vi/GHupIQ7w70c/hqdefault.jpg" alt="KaiRa Wedding Highlights"><div class="grd"></div><div class="play"><span class="pc">&#9658;</span></div><span class="lbl"><b>KaiRa Wedding Highlights</b><s>Full ceremony to reception</s></span></div><div class="gtile" data-yt="pe8eyVwUi8E" data-cur><img loading="lazy" decoding="async" data-fb src="https://i.ytimg.com/vi/pe8eyVwUi8E/hqdefault.jpg" alt="Event @ J K Grand Arena"><div class="grd"></div><div class="play"><span class="pc">&#9658;</span></div><span class="lbl"><b>Event @ J K Grand Arena</b><s>Bengaluru</s></span></div><div class="gtile" data-yt="xLGKh9zVqbk" data-cur><img loading="lazy" decoding="async" data-fb src="https://i.ytimg.com/vi/xLGKh9zVqbk/hqdefault.jpg" alt="Ramesh @ 60"><div class="grd"></div><div class="play"><span class="pc">&#9658;</span></div><span class="lbl"><b>Ramesh @ 60</b><s>Shashtipoorthi</s></span></div><div class="gtile" data-yt="5ikSnxGGGm8" data-cur><img loading="lazy" decoding="async" data-fb src="https://i.ytimg.com/vi/5ikSnxGGGm8/hqdefault.jpg" alt="KaiRa Bespoke Pre-Wed Shoot"><div class="grd"></div><div class="play"><span class="pc">&#9658;</span></div><span class="lbl"><b>KaiRa Bespoke Pre-Wed Shoot</b><s>A short film</s></span></div><div class="gtile" data-yt="3ChzCi8jYsA" data-cur><img loading="lazy" decoding="async" data-fb src="https://i.ytimg.com/vi/3ChzCi8jYsA/hqdefault.jpg" alt="Save The Date"><div class="grd"></div><div class="play"><span class="pc">&#9658;</span></div><span class="lbl"><b>Save The Date</b><s>A poem penned by the groom</s></span></div><div class="gtile" data-yt="n_uWqXQL-30" data-cur><img loading="lazy" decoding="async" data-fb src="https://i.ytimg.com/vi/n_uWqXQL-30/hqdefault.jpg" alt="Bhimarathi Shanti"><div class="grd"></div><div class="play"><span class="pc">&#9658;</span></div><span class="lbl"><b>Bhimarathi Shanti</b><s>Sri Prahlad V Kulkarni</s></span></div></div>
</div></section>
<section class="sec tint"><div class="wrap">
  <div class="sec-head reveal"><span class="eyebrow"><span class="dot"></span>The stills</span><h2 class="big" style="margin-top:18px">Moments we <span class="hl">managed to catch.</span></h2><p class="lead">A few frames from weddings, social and cultural events across Bengaluru. Real celebrations, real detail.</p></div>
  <div class="gfilter reveal"><button class="gchip on" data-f="all" style="--fc:var(--rose)">All</button><?php $ci=0; foreach ($CATS as $key=>$label): if (empty($present[$key])) continue; $ci++; ?><button class="gchip" data-f="<?php echo $key; ?>" style="--fc:<?php echo $COLORS[$ci%6]; ?>"><?php echo $label; ?></button><?php endforeach; ?></div>
  <div class="pgrid"><?php $gi=0; foreach ($items as $it): $gi++;
      $full = htmlspecialchars($it['path'], ENT_QUOTES);
      $cat = htmlspecialchars($it['cat']!==''? $it['cat'] : 'wedding', ENT_QUOTES);
      $cap = htmlspecialchars($it['cap'], ENT_QUOTES);
  ?><a class="pg<?php echo $gi>27?' gh':''; ?>"<?php echo $gi>27?' style="display:none"':''; ?> data-cat="<?php echo $cat; ?>" href="<?php echo $full; ?>" target="_blank" rel="noopener"><img loading="lazy" decoding="async" src="<?php echo $full; ?>" alt="<?php echo $cap; ?>, Versato Ventures Bengaluru"><span class="pcap"><?php echo $cap; ?></span></a><?php endforeach; ?><?php if (empty($items)): ?><p class="lead" style="grid-column:1/-1;text-align:center;padding:40px 0">Photos coming soon.</p><?php endif; ?></div>
  <div class="gmore-wrap" style="text-align:center;margin-top:32px"><button type="button" id="galMore" class="btn btn-d" data-cur><span class="ico">&#8595;</span>See more photos</button></div>
  <script>(function(){var b=document.getElementById('galMore');if(!b)return;var hid=[].slice.call(document.querySelectorAll('.pgrid .pg.gh'));if(!hid.length){b.parentNode.style.display='none';return;}b.addEventListener('click',function(){hid.forEach(function(p){p.classList.remove('gh');p.style.display='';});b.parentNode.style.display='none';});})();</script>
</section>
<section class="sec"><div class="wrap">
  <div class="sec-head reveal"><span class="eyebrow"><span class="dot"></span>Keep exploring</span><h2 class="big" style="margin-top:18px">Beyond the <span class="hl">gallery.</span></h2></div>
  <div class="ltiles reveal"><a class="ltile" href="projects.html" data-cur><img data-fb src="img/home/gallery-02.jpg" alt="The full stories"><div class="lo"></div><span class="lk">Projects</span><h3>The full stories <span class="go">&#8599;</span></h3><p>Case studies behind each film and shoot.</p></a><a class="ltile" href="events.html" data-cur><img data-fb src="img/home/gallery-03.jpg" alt="What we plan"><div class="lo"></div><span class="lk">Events</span><h3>What we plan <span class="go">&#8599;</span></h3><p>Every function we bring to life.</p></a><a class="ltile" href="contact.html" data-cur><img data-fb src="img/home/gallery-04.jpg" alt="Start yours"><div class="lo"></div><span class="lk">Contact</span><h3>Start yours <span class="go">&#8599;</span></h3><p>Tell us the date and let us film your day.</p></a></div>
</div></section>
<section class="sec"><div class="wrap">
  <div class="lband reveal">
    <div class="lbg" style="background-image:url('img/home/gallery-05.jpg')"></div><div class="lsc"></div>
    <span class="eyebrow"><span class="dot"></span>Let's get in touch</span>
    <h2>Tell us the date. <em>We'll take it from there.</em></h2>
    <p>Send us your dates and a little about the celebration you are dreaming of. We will come back with a first-cut plan and a clear budget, usually within the week.</p>
    <div class="lcta">
      <a href="https://wa.me/919187080181?text=Hi%20Versato%20Ventures%2C%20I%27d%20like%20to%20plan%20an%20event." target="_blank" rel="noopener" class="btn btn-p" data-cur><span class="ico">&#10148;</span>Chat on WhatsApp</a>
      <a href="contact.html" class="btn btn-g" data-cur><span class="ico">&#8594;</span>Send an enquiry</a>
    </div>
  </div>
</div></section>
<footer>
  <div class="wrap">
    <div class="foot-grid">
      <div class="foot-brand">
        <div class="logo-w"></div>
        <p>End-to-end event management in Bengaluru. Weddings, social and cultural events, curated, created and executed by one in-house team.</p>
        <div class="tag">Creativity is our credibility.</div>
        <form class="foot-sub" onsubmit="return false"><label>Leave your number, we'll call you back</label><div class="fs-row"><input type="tel" name="phone" placeholder="Your phone number" aria-label="Your phone number" pattern="[0-9+ ()-]{7,}" required><button type="submit" aria-label="Request a callback">&#8594;</button></div><span class="fs-note">We'll call or WhatsApp you back, usually the same day.</span></form>
      </div>
      <div class="fcol"><h4>Explore</h4><a href="index.html">Home</a><a href="about.html">About</a><a href="services.html">Services</a><a href="gallery.html">Gallery</a><a href="projects.html">Projects</a></div>
      <div class="fcol"><h4>Company</h4><a href="blog.html">Blogs</a><a href="contact.html">Contact</a><a href="about.html">About us</a><a href="events.html">Events</a></div>
      <div class="fcol"><h4>Reach us</h4><a href="https://wa.me/919187080181" target="_blank" rel="noopener">WhatsApp</a><a href="https://www.instagram.com/versato.ventures" target="_blank" rel="noopener">Instagram</a><a href="https://www.youtube.com/@versatoventures4111" target="_blank" rel="noopener">YouTube</a><a href="https://wa.me/919187080181" target="_blank" rel="noopener">+91 91870 80181</a><a href="https://maps.app.goo.gl/3iK3NEh5u8QP77Jc7" target="_blank" rel="noopener">No. 18/A, 5th Floor, 4th A Main Road,<br>6th Block, BSK 3rd Stage, 3rd Phase,<br>Kathriguppe, Bengaluru, Karnataka 560085 &#8599;</a></div>
    </div>
    <div class="foot-bottom">
      <p>&copy; 2026 Versato Ventures. Bengaluru, India. All rights reserved.</p>
      <div class="foot-soc">
        <a href="https://www.instagram.com/versato.ventures" target="_blank" rel="noopener" aria-label="Instagram"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17.5 6.5v.01"/></svg></a>
        <a href="https://www.youtube.com/@versatoventures4111" target="_blank" rel="noopener" aria-label="YouTube"><svg viewBox="0 0 24 24"><path d="M22 12s0-3.5-.4-5a2.5 2.5 0 00-1.8-1.8C18 5 12 5 12 5s-6 0-7.8.2A2.5 2.5 0 002.4 7C2 8.5 2 12 2 12s0 3.5.4 5a2.5 2.5 0 001.8 1.8C6 19 12 19 12 19s6 0 7.8-.2a2.5 2.5 0 001.8-1.8c.4-1.5.4-5 .4-5z"/><path d="M10 15l5-3-5-3z"/></svg></a>
        <a href="https://wa.me/919187080181" target="_blank" rel="noopener" aria-label="WhatsApp"><svg viewBox="0 0 24 24"><path d="M21 11.5a8.5 8.5 0 01-12.6 7.4L3 21l2.1-5.4A8.5 8.5 0 1121 11.5z"/></svg></a>
      </div>
    </div>
  </div>
</footer>
<script src="script.js"></script>
</body>
</html>
