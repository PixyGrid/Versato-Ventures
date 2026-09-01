(function(){
  window.addEventListener('load',function(){var pre=document.getElementById('pre');if(pre)setTimeout(function(){pre.classList.add('gone')},1000)});

  // floating social rail (all pages)
  if(!document.querySelector('.social-rail')){
    var sr=document.createElement('div');sr.className='social-rail';sr.setAttribute('aria-label','Social links');
    sr.innerHTML=''+
      '<a class="soc ig" href="https://www.instagram.com/versato.ventures" target="_blank" rel="noopener" aria-label="Instagram" data-cur><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1.2" fill="currentColor" stroke="none"/></svg></a>'+
      '<a class="soc fb" href="https://www.facebook.com/share/194b4kUQDB/" target="_blank" rel="noopener" aria-label="Facebook" data-cur><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13.5 21v-7h2.3l.4-2.9h-2.7V9.2c0-.85.24-1.43 1.46-1.43H16.3V5.16c-.27-.04-1.2-.12-2.28-.12-2.26 0-3.8 1.38-3.8 3.9v2.18H7.9V14h2.32v7z"/></svg></a>'+
      '<a class="soc yt" href="https://www.youtube.com/@versatoventures4111" target="_blank" rel="noopener" aria-label="YouTube" data-cur><svg viewBox="0 0 24 24" fill="currentColor"><path d="M21.6 7.2s-.2-1.4-.8-2c-.75-.8-1.6-.8-2-.85C16 4.1 12 4.1 12 4.1h0s-4 0-6.8.25c-.4.05-1.25.05-2 .85-.6.6-.8 2-.8 2S2.2 8.85 2.2 10.5v1.55c0 1.65.2 3.3.2 3.3s.2 1.4.8 2c.75.8 1.75.77 2.2.86 1.6.15 6.6.2 6.6.2s4 0 6.8-.26c.4-.05 1.25-.05 2-.85.6-.6.8-2 .8-2s.2-1.65.2-3.3V10.5c0-1.65-.2-3.3-.2-3.3zM9.9 14.3V8.9l5.2 2.7z"/></svg></a>'+
      '<a class="soc wa" href="https://wa.me/919187080181" target="_blank" rel="noopener" aria-label="WhatsApp" data-cur><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 00-8.5 15.3L2 22l4.8-1.5A10 10 0 1012 2zm0 18.2a8.2 8.2 0 01-4.2-1.16l-.3-.18-2.85.9.92-2.78-.19-.29A8.2 8.2 0 1112 20.2zm4.7-6.14c-.26-.13-1.52-.75-1.75-.83s-.4-.13-.58.13-.66.82-.8 1c-.15.17-.3.19-.55.06a6.7 6.7 0 01-3.3-2.9c-.25-.42.25-.39.7-1.3.08-.16.04-.3-.02-.43s-.58-1.4-.8-1.92c-.2-.5-.42-.43-.58-.44h-.5a.96.96 0 00-.7.32 2.9 2.9 0 00-.9 2.16c0 1.27.93 2.5 1.06 2.67.13.17 1.82 2.78 4.4 3.9.61.26 1.1.42 1.47.54.62.2 1.18.17 1.63.1.5-.07 1.52-.62 1.74-1.22.21-.6.21-1.1.15-1.22-.06-.11-.24-.17-.5-.3z"/></svg></a>';
    document.body.appendChild(sr);
  }
  var nav=document.getElementById('nav'),prog=document.getElementById('prog');
  function onScroll(){var y=window.scrollY,h=document.documentElement.scrollHeight-window.innerHeight;if(prog)prog.style.width=(h>0?y/h*100:0)+'%';if(nav)nav.classList.toggle('scrolled',y>60);}
  window.addEventListener('scroll',onScroll,{passive:true});onScroll();

  // mobile menu
  var burger=document.getElementById('burger'),mmenu=document.getElementById('mmenu'),mmClose=document.getElementById('mmClose');
  function closeMenu(){if(mmenu){mmenu.classList.remove('open');document.body.style.overflow='';}}
  if(burger&&mmenu){burger.addEventListener('click',function(){mmenu.classList.add('open');document.body.style.overflow='hidden';});}
  if(mmClose)mmClose.addEventListener('click',closeMenu);
  if(mmenu)mmenu.querySelectorAll('.mm-links a').forEach(function(a){a.addEventListener('click',closeMenu)});

  var rot=document.getElementById('rot');
  if(rot){var w=rot.querySelectorAll('span'),ri=0;setInterval(function(){w[ri].classList.remove('on');ri=(ri+1)%w.length;w[ri].classList.add('on')},2100);}

  var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.14});
  document.querySelectorAll('.reveal').forEach(function(el){io.observe(el)});

  function animateCount(el){var t=parseFloat(el.dataset.count),dec=parseInt(el.dataset.dec||'0'),suf=el.dataset.suffix||'',s=null,dur=1500;
    function step(ts){if(!s)s=ts;var p=Math.min((ts-s)/dur,1),e=1-Math.pow(1-p,3),v=t*e;el.textContent=(dec?v.toFixed(dec):Math.round(v))+suf;if(p<1)requestAnimationFrame(step)}requestAnimationFrame(step);}
  var cio=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){if(e.target.dataset.count)animateCount(e.target);cio.unobserve(e.target)}})},{threshold:.6});
  document.querySelectorAll('.v[data-count]').forEach(function(el){cio.observe(el)});

  // expanding panels (why choose us + process + values)
  document.querySelectorAll('.why-panels').forEach(function(cont){
    var ps=cont.querySelectorAll('.wp');
    ps.forEach(function(p){p.addEventListener('mouseenter',function(){ps.forEach(function(x){x.classList.remove('active')});p.classList.add('active')});});
  });

  function dragify(el){if(!el)return;var down=false,sx,sl,moved=false;
    el.addEventListener('mousedown',function(e){down=true;moved=false;el.classList.add('grabbing');sx=e.pageX;sl=el.scrollLeft});
    window.addEventListener('mouseup',function(){down=false;el.classList.remove('grabbing')});
    el.addEventListener('mousemove',function(e){if(!down)return;if(Math.abs(e.pageX-sx)>6)moved=true;e.preventDefault();el.scrollLeft=sl-(e.pageX-sx)*1.6});
    el._moved=function(){return moved};}
  document.querySelectorAll('.drag,.svc-slider').forEach(dragify);
  document.querySelectorAll('.svc-slider').forEach(function(s){s.querySelectorAll('a.svc-card').forEach(function(a){a.addEventListener('click',function(e){if(s._moved&&s._moved())e.preventDefault();})})});
  // carousel arrows: scroll one card at a time
  var svcSlider=document.getElementById('svcSlider');
  if(svcSlider){
    var sPrev=document.getElementById('svcPrev'),sNext=document.getElementById('svcNext');
    var svcStep=function(){var c=svcSlider.querySelector('.svc-card');return c?Math.round(c.getBoundingClientRect().width)+20:300;};
    if(sNext)sNext.addEventListener('click',function(){svcSlider.scrollBy({left:svcStep(),behavior:'smooth'});});
    if(sPrev)sPrev.addEventListener('click',function(){svcSlider.scrollBy({left:-svcStep(),behavior:'smooth'});});
    var syncArrows=function(){var max=svcSlider.scrollWidth-svcSlider.clientWidth-4;if(sPrev)sPrev.style.opacity=svcSlider.scrollLeft<=4?'.4':'1';if(sNext)sNext.style.opacity=svcSlider.scrollLeft>=max?'.4':'1';};
    svcSlider.addEventListener('scroll',syncArrows,{passive:true});syncArrows();
  }
  document.querySelectorAll('.drag').forEach(function(s){s.querySelectorAll('a.pcard,a.ltile').forEach(function(a){a.addEventListener('click',function(e){if(s._moved&&s._moved())e.preventDefault();})})});

  // video popup modal (gallery + projects + events)
  var vmodal=document.getElementById('vmodal'),vmFrame=document.getElementById('vmFrame');
  function openModal(id){if(!vmFrame)return;vmFrame.innerHTML='<iframe src="https://www.youtube.com/embed/'+id+'?autoplay=1&rel=0&modestbranding=1&playsinline=1" allow="autoplay; encrypted-media; fullscreen" allowfullscreen></iframe>';vmodal.classList.add('open');document.body.style.overflow='hidden';}
  function openVideo(src){if(!vmFrame)return;vmFrame.innerHTML='<video src="'+src+'" controls autoplay playsinline preload="metadata" style="position:absolute;inset:0;width:100%;height:100%;object-fit:contain;background:#000"></video>';vmodal.classList.add('open');document.body.style.overflow='hidden';}
  function closeModal(){if(!vmodal)return;vmodal.classList.remove('open');vmFrame.innerHTML='';document.body.style.overflow='';}
  if(vmodal){var vb=vmodal.querySelector('.vm-back'),vc=vmodal.querySelector('.vm-close');if(vb)vb.addEventListener('click',closeModal);if(vc)vc.addEventListener('click',closeModal);}
  document.addEventListener('keydown',function(e){if(e.key==='Escape'){closeModal();closeMenu();}});
  document.querySelectorAll('[data-yt]').forEach(function(f){f.addEventListener('click',function(){openModal(f.dataset.yt)})});
  document.querySelectorAll('[data-mp4]').forEach(function(f){f.addEventListener('click',function(){openVideo(f.dataset.mp4)});f.addEventListener('keydown',function(e){if(e.key==='Enter'||e.key===' '){e.preventDefault();openVideo(f.dataset.mp4);}})});

  // reviews slider
  var track=document.getElementById('revTrack'),r=0;
  if(track){
    var pvw=function(){return window.innerWidth<=768?1:window.innerWidth<=1024?2:3};
    var go=function(){var p=pvw(),n=track.children.length,mx=Math.max(0,n-p);if(r>mx)r=mx;if(r<0)r=0;var c=track.children[0],w=c.getBoundingClientRect().width+22;track.style.transform='translateX(-'+(r*w)+'px)';};
    var rp=document.getElementById('revPrev'),rn=document.getElementById('revNext');
    if(rn)rn.addEventListener('click',function(){r++;go()});if(rp)rp.addEventListener('click',function(){r--;go()});
    window.addEventListener('resize',go);setTimeout(go,300);
  }

  // blog filters
  var chips=document.querySelectorAll('.bfilter [data-f]'),cards=document.querySelectorAll('.blog-grid .bcard[data-cat]');
  if(chips.length&&cards.length){
    chips.forEach(function(ch){ch.addEventListener('click',function(){
      chips.forEach(function(x){x.classList.remove('on')});ch.classList.add('on');
      var f=ch.dataset.f;
      cards.forEach(function(cd){var show=(f==='all'||cd.dataset.cat===f);cd.style.display=show?'':'none';});
    })});
  }

  // founders "together" click-to-zoom
  var fduo=document.getElementById('fduo');
  if(fduo){
    fduo.querySelectorAll('.fhot').forEach(function(h){
      h.addEventListener('click',function(){fduo.classList.remove('focus-a','focus-b');fduo.classList.add('focus-'+h.dataset.f);});
    });
    var fback=document.getElementById('fduoBack');
    if(fback)fback.addEventListener('click',function(){fduo.classList.remove('focus-a','focus-b');});
  }

  // occasions explorer (hover to preview)
  var occx=document.querySelector('.occx');
  if(occx){
    var oxItems=occx.querySelectorAll('.occx-item'),oxLayers=occx.querySelectorAll('.occx-layers .ol');
    var oxName=document.getElementById('occName'),oxDesc=document.getElementById('occDesc'),oxKick=occx.querySelector('.occx-k');
    oxItems.forEach(function(it,i){
      var activate=function(){
        oxItems.forEach(function(x){x.classList.remove('active')});it.classList.add('active');
        oxLayers.forEach(function(x){x.classList.remove('active')});if(oxLayers[i])oxLayers[i].classList.add('active');
        if(oxName)oxName.textContent=it.dataset.name;
        if(oxDesc)oxDesc.innerHTML=it.dataset.desc;
        if(oxKick)oxKick.textContent='Occasion '+('0'+(i+1)).slice(-2);
        occx.style.setProperty('--oc',it.dataset.color||'var(--rose)');
      };
      it.addEventListener('mouseenter',activate);
      it.addEventListener('focus',activate);
      it.addEventListener('click',function(e){e.preventDefault();activate();});
    });
  }

  // philosophy chips: tap to toggle highlight
  document.querySelectorAll('.bc-chips span').forEach(function(c){c.addEventListener('click',function(){c.classList.toggle('on');});});

  // flip cards (how-we-plan): tap to flip on touch devices
  if(window.matchMedia('(hover:none)').matches){
    document.querySelectorAll('.epoints .epoint').forEach(function(c){
      c.addEventListener('click',function(){c.classList.toggle('flipped');});
    });
  }

  // FAQ accordion (legacy .faqs + editorial .faq-list)
  document.querySelectorAll('.faqs .q').forEach(function(q){q.addEventListener('click',function(){q.parentElement.classList.toggle('open');})});
  document.querySelectorAll('.faq-list .qa .q').forEach(function(q){q.addEventListener('click',function(){q.parentElement.classList.toggle('open');})});

  // gallery: event category filter (multi-tag + deep-link via ?cat=)
  var gchips=document.querySelectorAll('.gfilter .gchip'),pgs=document.querySelectorAll('.pgrid .pg');
  if(gchips.length&&pgs.length){
    var pgrid=document.querySelector('.pgrid'),gempty=null;
    function applyFilter(f){
      var vis=0;
      gchips.forEach(function(x){x.classList.toggle('on',x.dataset.f===f)});
      pgs.forEach(function(pg){
        var cats=(pg.dataset.cat||'').split(/\s+/);
        var show=(f==='all'||cats.indexOf(f)>-1);
        pg.style.display=show?'':'none';
        if(show){vis++;pg.style.animation='none';void pg.offsetWidth;pg.style.animation='';}
      });
      if(f!=='all'&&vis===0){
        if(!gempty){gempty=document.createElement('p');gempty.className='gempty';gempty.innerHTML='Fresh photos from this function are on the way. Meanwhile, <button type="button" class="gempty-all">see the full gallery</button>.';pgrid.parentNode.insertBefore(gempty,pgrid.nextSibling);gempty.querySelector('.gempty-all').addEventListener('click',function(){applyFilter('all')});}
        gempty.style.display='block';
      }else if(gempty){gempty.style.display='none';}
    }
    gchips.forEach(function(ch){ch.addEventListener('click',function(){applyFilter(ch.dataset.f)})});
    var q=(location.search.match(/[?&]cat=([^&]+)/)||[])[1]||location.hash.replace('#','');
    if(q){q=decodeURIComponent(q);var valid=[].some.call(gchips,function(c){return c.dataset.f===q});
      if(valid){applyFilter(q);var gf=document.querySelector('.gfilter');if(gf){setTimeout(function(){gf.scrollIntoView({behavior:'smooth',block:'start'});},350);}}}
  }

  // services add-ons: see more / hide toggle
  var addonsToggle=document.getElementById('addonsToggle');
  if(addonsToggle){
    addonsToggle.addEventListener('click',function(){
      var grid=document.getElementById('svcFullGrid');
      if(!grid)return;
      var open=grid.classList.toggle('show-x');
      addonsToggle.setAttribute('aria-expanded',open?'true':'false');
      var lbl=addonsToggle.querySelector('.at-label');
      if(lbl)lbl.textContent=open?'See less':'See more';
      var ico=addonsToggle.querySelector('.at-ico');
      if(ico)ico.style.transform=open?'rotate(135deg)':'';
    });
  }

  // image fallback -> NEVER substitute another section's photo. If an image is missing,
  // show a neutral brand-gradient tile so each section only ever shows its OWN image.
  var grads=['linear-gradient(135deg,#E5306B,#F26322)','linear-gradient(135deg,#1FB2D4,#12B268)','linear-gradient(135deg,#F5A31C,#F26322)','linear-gradient(135deg,#C838CE,#E5306B)'];
  document.querySelectorAll('img').forEach(function(im,i){
    function fail(){
      var p=im.parentElement;if(p)p.style.background=grads[i%grads.length];im.style.display='none';
    }
    im.addEventListener('error',fail);
    // catch images that already failed before this script attached its listener
    if(im.complete&&im.naturalWidth===0&&(im.currentSrc||im.src))fail();
  });

  // stat cards + explore tiles: 3D pointer tilt
  if(window.matchMedia('(hover:hover)').matches){
    document.querySelectorAll('.statcard').forEach(function(c){
      c.addEventListener('mousemove',function(e){var r=c.getBoundingClientRect();var px=(e.clientX-r.left)/r.width-.5,py=(e.clientY-r.top)/r.height-.5;c.style.transform='perspective(760px) rotateX('+(-py*8)+'deg) rotateY('+(px*10)+'deg) translateY(-6px)';});
      c.addEventListener('mouseleave',function(){c.style.transform='';});
    });
    document.querySelectorAll('.ltile').forEach(function(c){
      c.addEventListener('mousemove',function(e){var r=c.getBoundingClientRect();var px=(e.clientX-r.left)/r.width-.5,py=(e.clientY-r.top)/r.height-.5;c.style.transform='perspective(900px) rotateX('+(-py*5)+'deg) rotateY('+(px*6)+'deg) translateY(-8px)';});
      c.addEventListener('mouseleave',function(){c.style.transform='';});
    });
    // about collage: 3D pointer tilt, restoring each card's resting rotation on leave
    document.querySelectorAll('.about-art .tilt3d').forEach(function(c){
      var base=c.style.transform||'';
      c.addEventListener('mousemove',function(e){var r=c.getBoundingClientRect();var px=(e.clientX-r.left)/r.width-.5,py=(e.clientY-r.top)/r.height-.5;c.style.transform='perspective(1000px) rotateX('+(-py*9)+'deg) rotateY('+(px*11)+'deg) translateY(-10px) scale(1.04)';});
      c.addEventListener('mouseleave',function(){c.style.transform=base;});
    });
    // events grid cards: 3D pointer tilt with lift
    document.querySelectorAll('.evgrid .scard').forEach(function(c){
      c.addEventListener('mousemove',function(e){var r=c.getBoundingClientRect();var px=(e.clientX-r.left)/r.width-.5,py=(e.clientY-r.top)/r.height-.5;c.style.transform='perspective(900px) rotateX('+(-py*6.5)+'deg) rotateY('+(px*8.5)+'deg) translateY(-8px)';});
      c.addEventListener('mouseleave',function(){c.style.transform='';});
    });
    // internal "about" split image: 3D pointer tilt
    document.querySelectorAll('.split .simg').forEach(function(c){
      c.addEventListener('mousemove',function(e){var r=c.getBoundingClientRect();var px=(e.clientX-r.left)/r.width-.5,py=(e.clientY-r.top)/r.height-.5;c.style.transform='perspective(1000px) rotateX('+(-py*5.5)+'deg) rotateY('+(px*7)+'deg)';});
      c.addEventListener('mouseleave',function(){c.style.transform='';});
    });
    // services "why one roof" image: 3D pointer tilt
    document.querySelectorAll('.simg-wrap .simg').forEach(function(c){
      c.addEventListener('mousemove',function(e){var r=c.getBoundingClientRect();var px=(e.clientX-r.left)/r.width-.5,py=(e.clientY-r.top)/r.height-.5;c.style.transform='perspective(1000px) rotateX('+(-py*6)+'deg) rotateY('+(px*8)+'deg)';});
      c.addEventListener('mouseleave',function(){c.style.transform='';});
    });
    // services grid (18) cards: 3D pointer tilt with lift
    document.querySelectorAll('.sgrid .scard').forEach(function(c){
      c.addEventListener('mousemove',function(e){var r=c.getBoundingClientRect();var px=(e.clientX-r.left)/r.width-.5,py=(e.clientY-r.top)/r.height-.5;c.style.transform='perspective(850px) rotateX('+(-py*6)+'deg) rotateY('+(px*7)+'deg) translateY(-7px)';});
      c.addEventListener('mouseleave',function(){c.style.transform='';});
    });
  }

  // custom cursor
  var cur=document.getElementById('cur'),curd=document.getElementById('curd'),cx=0,cy=0,tx=0,ty=0;
  if(cur&&curd&&window.matchMedia('(hover:hover)').matches){
    window.addEventListener('mousemove',function(e){tx=e.clientX;ty=e.clientY;curd.style.left=tx+'px';curd.style.top=ty+'px';});
    (function loop(){cx+=(tx-cx)*.18;cy+=(ty-cy)*.18;cur.style.left=cx+'px';cur.style.top=cy+'px';requestAnimationFrame(loop)})();
    document.querySelectorAll('a,button,[data-cur],.svc-card,.pcard,.gtile,.wp,.tcard,.founder,.mvcard,.fcard,.fhero,.mvr').forEach(function(el){
      el.addEventListener('mouseenter',function(){cur.classList.add('big')});el.addEventListener('mouseleave',function(){cur.classList.remove('big')});});
  }
})();
/* Footer callback: save the visitor's phone number to a Google Sheet.
   Paste your deployed Google Apps Script Web App URL between the quotes below. */
(function(){
  var CALLBACK_ENDPOINT="https://script.google.com/macros/s/AKfycbxAxiAyA6fn7ex6xw5ij0IQwUQ-ubneYxQ-OoCBTsgXcBwTkQAnAcl2rdp_e3XEwC9H/exec"; /* Google Sheet Web-app URL */
  document.querySelectorAll('form.foot-sub').forEach(function(f){
    var note=f.querySelector('.fs-note');
    var original=note?note.textContent:'';
    f.addEventListener('submit',function(e){
      e.preventDefault();
      var inp=f.querySelector('input');
      var num=(inp&&inp.value||'').replace(/\s+/g,' ').trim();
      if(!num){ if(inp) inp.focus(); return; }
      function done(){ inp.value=''; if(note){ note.textContent="Thanks! We'll call you back soon."; setTimeout(function(){note.textContent=original;},4500);} }
      if(!CALLBACK_ENDPOINT){ done(); return; }
      var data=new FormData();
      data.append('phone',num);
      data.append('page',(location.pathname||'').split('/').pop()||'home');
      fetch(CALLBACK_ENDPOINT,{method:'POST',body:data,mode:'no-cors'}).then(done).catch(done);
    });
  });
})();
