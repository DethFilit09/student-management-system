{{-- Self-contained theme + micro-interactions. Works with or without Tailwind/Vite. --}}
<style>
@view-transition{navigation:auto}
html{background:#f1f5f9}
:root{--p:#6366f1;--p2:#8b5cf6;--p3:#06b6d4;--ink:#0f172a;--mut:#64748b;--line:#e2e8f0;--ok:#10b981;--warn:#f59e0b;--bad:#ef4444;--r:18px;--ease:cubic-bezier(.22,1,.36,1)}
*,*::before,*::after{box-sizing:border-box}
body.sms{margin:0;font-family:'Inter',system-ui,-apple-system,'Segoe UI',sans-serif;color:var(--ink);background:transparent;min-height:100vh;overflow-x:hidden;-webkit-font-smoothing:antialiased}
body.sms::before{content:"";position:fixed;inset:-20%;z-index:-1;pointer-events:none;
  background:radial-gradient(40% 40% at 18% 20%,rgba(99,102,241,.22),transparent 60%),radial-gradient(35% 35% at 82% 8%,rgba(6,182,212,.18),transparent 60%),radial-gradient(40% 40% at 70% 92%,rgba(139,92,246,.2),transparent 60%);
  }
@keyframes up{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:none}}
@keyframes pop{from{opacity:0;transform:scale(.94)}to{opacity:1;transform:none}}
@keyframes grow{from{transform:scaleX(0)}to{transform:scaleX(1)}}
body.sms a{color:inherit;text-decoration:none}
body.sms h1,body.sms h2,body.sms h3,body.sms p{margin:0}
.sms-wrap{max-width:1180px;margin:0 auto;padding:0 20px}
.sms-page{padding-bottom:60px}

/* nav */
.sms-nav{position:sticky;top:0;z-index:40;backdrop-filter:blur(14px);background:rgba(255,255,255,.72);border-bottom:1px solid rgba(226,232,240,.8)}
.sms-nav .in{display:flex;align-items:center;gap:26px;height:66px}
.sms-brand{display:flex;align-items:center;gap:10px;font-weight:800;font-size:18px;letter-spacing:-.02em}
.sms-logo{width:36px;height:36px;border-radius:11px;display:grid;place-items:center;color:#fff;background:linear-gradient(135deg,var(--p),var(--p2));box-shadow:0 8px 20px -6px rgba(99,102,241,.7);transition:transform .4s var(--ease)}
.sms-brand:hover .sms-logo{transform:rotate(-8deg) scale(1.08)}
.sms-links{display:flex;gap:6px;flex:1}
.sms-links a{position:relative;padding:8px 14px;border-radius:10px;font-weight:600;font-size:14px;color:var(--mut);transition:color .25s,background .25s}
.sms-links a::after{content:"";position:absolute;left:14px;right:14px;bottom:3px;height:2px;border-radius:2px;background:linear-gradient(90deg,var(--p),var(--p3));transform:scaleX(0);transform-origin:left;transition:transform .35s var(--ease)}
.sms-links a:hover,.sms-links a.on{color:var(--ink)}
.sms-links a:hover::after,.sms-links a.on::after{transform:scaleX(1)}
.sms-user{display:flex;align-items:center;gap:10px;font-size:14px;font-weight:600}
.sms-avatar{width:34px;height:34px;border-radius:50%;display:grid;place-items:center;font-weight:700;font-size:13px;background:hsl(var(--h,245) 85% 92%);color:hsl(var(--h,245) 60% 38%);flex:none}
.sms-burger{display:none;background:none;border:0;font-size:24px;cursor:pointer}
@media(max-width:760px){.sms-burger{display:block;margin-left:auto}.sms-links,.sms-user{display:none}.sms-nav.open .sms-links,.sms-nav.open .sms-user{display:flex}.sms-nav.open .in{flex-wrap:wrap;height:auto;padding:12px 0}.sms-nav.open .sms-links{flex-direction:column;width:100%}}

/* hero */
.sms-hero{margin:26px 0 24px;border-radius:26px;color:#fff;padding:34px 36px;position:relative;overflow:hidden;
  background:linear-gradient(120deg,#4f46e5,#7c3aed 55%,#0891b2);background-size:100% 100%;animation:pop .6s var(--ease) backwards;box-shadow:0 30px 60px -28px rgba(79,70,229,.7)}
.sms-hero::before,.sms-hero::after{content:"";position:absolute;border-radius:50%;background:rgba(255,255,255,.12);}
.sms-hero::before{width:220px;height:220px;right:-60px;top:-80px}
.sms-hero::after{width:140px;height:140px;right:160px;bottom:-70px}
.sms-hero h1{font-size:30px;font-weight:800;letter-spacing:-.03em}
.sms-hero p{opacity:.85;margin-top:6px}
.sms-hero .row{display:flex;justify-content:space-between;align-items:center;gap:20px;flex-wrap:wrap;position:relative;z-index:1}
.sms-chips{display:flex;gap:12px;flex-wrap:wrap;margin-top:22px;position:relative;z-index:1}
.sms-chip{background:rgba(255,255,255,.16);border:1px solid rgba(255,255,255,.25);border-radius:14px;padding:10px 18px;backdrop-filter:blur(6px);transition:transform .3s var(--ease),background .3s}
.sms-chip:hover{transform:translateY(-3px);background:rgba(255,255,255,.24)}
.sms-chip b{display:block;font-size:22px}.sms-chip span{font-size:12px;opacity:.85}

/* cards */
.sms-card{background:rgba(255,255,255,.86);backdrop-filter:blur(10px);border:1px solid rgba(226,232,240,.9);border-radius:var(--r);box-shadow:0 12px 34px -20px rgba(15,23,42,.35);padding:22px;animation:up .6s var(--ease) backwards;transition:transform .35s var(--ease),box-shadow .35s}
.sms-card.lift:hover{transform:translateY(-4px);box-shadow:0 22px 44px -22px rgba(79,70,229,.45)}
.sms-card h3{font-size:16px;font-weight:700;margin-bottom:14px}
.sms-grid{display:grid;gap:18px}.g4{grid-template-columns:repeat(4,1fr)}.g3{grid-template-columns:repeat(3,1fr)}.g2{grid-template-columns:1.4fr 1fr}
@media(max-width:900px){.g4{grid-template-columns:repeat(2,1fr)}.g3,.g2{grid-template-columns:1fr}}
.sms-stat .n{font-size:34px;font-weight:800;letter-spacing:-.03em;background:linear-gradient(120deg,var(--p),var(--p3));-webkit-background-clip:text;background-clip:text;color:transparent}
.sms-stat .l{color:var(--mut);font-size:13px;font-weight:600}
.sms-stat .ic{width:42px;height:42px;border-radius:13px;display:grid;place-items:center;font-size:20px;background:rgba(99,102,241,.12);margin-bottom:12px}
.sms-bars .r{margin-bottom:14px}.sms-bars .t{display:flex;justify-content:space-between;font-size:13px;font-weight:600;margin-bottom:6px}
.sms-bars .b{height:10px;border-radius:99px;background:#eef2ff;overflow:hidden}
.sms-bars .b i{display:block;height:100%;width:var(--w);border-radius:99px;transform-origin:left;background:linear-gradient(90deg,var(--p),var(--p3));animation:grow 1.1s var(--ease) backwards;animation-delay:calc(var(--i,0)*120ms + .3s)}

/* buttons */
.sms-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;border:0;cursor:pointer;font:inherit;font-weight:700;font-size:14px;padding:11px 20px;border-radius:12px;color:#fff;background:linear-gradient(135deg,var(--p),var(--p2));box-shadow:0 10px 22px -10px rgba(99,102,241,.8);transition:transform .25s var(--ease),box-shadow .25s,filter .25s}
.sms-btn:hover{transform:translateY(-2px);box-shadow:0 16px 28px -10px rgba(99,102,241,.85);filter:brightness(1.05)}
.sms-btn:active{transform:translateY(0) scale(.98)}
.sms-btn.sm{padding:7px 13px;font-size:13px;border-radius:10px;box-shadow:none}
.sms-btn.ghost{background:#fff;color:var(--ink);border:1px solid var(--line);box-shadow:none}
.sms-btn.white{background:#fff;color:var(--p);box-shadow:0 10px 24px -10px rgba(0,0,0,.4)}
.sms-btn.ok{background:rgba(16,185,129,.12);color:#047857;box-shadow:none}
.sms-btn.info{background:rgba(99,102,241,.12);color:#4338ca;box-shadow:none}
.sms-btn.bad{background:rgba(239,68,68,.12);color:#b91c1c;box-shadow:none}
.sms-btn.sm.ok:hover,.sms-btn.sm.info:hover,.sms-btn.sm.bad:hover{box-shadow:none;filter:brightness(.95)}
.sms-btn.full{width:100%}

/* forms */
.sms-field{margin-bottom:16px}
.sms-label{display:block;font-size:13px;font-weight:700;margin-bottom:6px;color:#334155}
.sms-input,.sms-select,.sms-textarea{width:100%;font:inherit;font-size:14px;padding:12px 14px;border-radius:12px;border:1.5px solid var(--line);background:#fff;color:var(--ink);outline:0;transition:border-color .25s,box-shadow .25s,transform .25s}
.sms-input:focus,.sms-select:focus,.sms-textarea:focus{border-color:var(--p);box-shadow:0 0 0 4px rgba(99,102,241,.16)}
.sms-input.err,.sms-select.err{border-color:var(--bad)}
.sms-error{color:var(--bad);font-size:12.5px;margin-top:5px;animation:up .3s var(--ease)}
.sms-row{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}@media(max-width:760px){.sms-row{grid-template-columns:1fr}}
.sms-actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:8px}

/* filters */
.sms-filters{display:grid;grid-template-columns:2fr 1.3fr 1fr 1fr auto;gap:10px;align-items:center}
@media(max-width:900px){.sms-filters{grid-template-columns:1fr 1fr}}
.sms-search{position:relative}.sms-search .sms-input{padding-left:40px}
.sms-search svg{position:absolute;left:13px;top:50%;transform:translateY(-50%);width:18px;height:18px;color:var(--mut);pointer-events:none;transition:color .25s}
.sms-search:focus-within svg{color:var(--p)}

/* table */
.sms-tablewrap{overflow-x:auto;margin-top:18px}
.sms-table{width:100%;border-collapse:separate;border-spacing:0 8px;font-size:14px}
.sms-table th{text-align:left;font-size:11.5px;text-transform:uppercase;letter-spacing:.06em;color:var(--mut);padding:0 14px 4px}
.sms-table td{padding:14px;background:#fff;border-top:1px solid var(--line);border-bottom:1px solid var(--line);transition:background .25s}
.sms-table td:first-child{border-left:1px solid var(--line);border-radius:14px 0 0 14px}
.sms-table td:last-child{border-right:1px solid var(--line);border-radius:0 14px 14px 0;text-align:right;white-space:nowrap}
.sms-table tbody tr{animation:up .55s var(--ease) backwards;animation-delay:calc(var(--i,0)*55ms + .15s);transition:transform .3s var(--ease),filter .3s}
.sms-table tbody tr:hover{transform:translateY(-2px) scale(1.003)}
.sms-table tbody tr:hover td{background:#f8faff}
.sms-who{display:flex;align-items:center;gap:12px}.sms-who b{display:block}.sms-who small,.sms-sub{color:var(--mut);font-size:12.5px}
.sms-badge{display:inline-block;padding:4px 11px;border-radius:99px;font-size:12px;font-weight:700;background:rgba(99,102,241,.12);color:#4338ca}
.sms-badge.mute{background:#f1f5f9;color:var(--mut)}
.sms-empty{text-align:center;color:var(--mut);padding:34px!important}
.sms-foot{display:flex;justify-content:space-between;align-items:center;margin-top:14px;flex-wrap:wrap;gap:10px;color:var(--mut);font-size:13px}
.sms-pager{display:flex;gap:6px}
.sms-pager a,.sms-pager span{min-width:36px;height:36px;display:grid;place-items:center;border-radius:10px;font-weight:700;font-size:13px;background:#fff;border:1px solid var(--line);transition:all .25s var(--ease)}
.sms-pager a:hover{transform:translateY(-2px);border-color:var(--p);color:var(--p)}
.sms-pager .active{background:linear-gradient(135deg,var(--p),var(--p2));color:#fff;border-color:transparent}
.sms-pager .disabled,.sms-pager .dots{opacity:.45}
.sms-detail li{list-style:none;display:flex;justify-content:space-between;gap:20px;padding:13px 0;border-bottom:1px dashed var(--line)}.sms-detail{margin:0;padding:0}.sms-detail span{color:var(--mut)}

/* toast + modal */
.sms-toast{position:fixed;right:20px;top:84px;z-index:80;background:#fff;border-left:5px solid var(--ok);padding:14px 18px;border-radius:14px;box-shadow:0 20px 40px -16px rgba(15,23,42,.45);font-weight:600;font-size:14px;animation:toastIn .5s var(--ease) backwards;transition:opacity .4s,transform .4s}
.sms-toast.out{opacity:0;transform:translateX(30px)}
@keyframes toastIn{from{opacity:0;transform:translateX(40px)}to{opacity:1;transform:none}}
.sms-modal{position:fixed;inset:0;z-index:90;display:grid;place-items:center;background:rgba(15,23,42,.45);backdrop-filter:blur(4px);opacity:0;pointer-events:none;transition:opacity .3s}
.sms-modal.show{opacity:1;pointer-events:auto}
.sms-modal .box{background:#fff;border-radius:22px;padding:28px;width:min(92vw,400px);text-align:center;transform:scale(.9) translateY(10px);transition:transform .4s var(--ease);box-shadow:0 40px 80px -30px rgba(0,0,0,.5)}
.sms-modal.show .box{transform:none}
.sms-modal .em{font-size:40px;margin-bottom:6px}.sms-modal p{color:var(--mut);margin:8px 0 20px}
.sms-modal .sms-actions{justify-content:center}

/* auth */
.sms-auth{min-height:100vh;display:grid;grid-template-columns:1.05fr 1fr}
@media(max-width:860px){.sms-auth{grid-template-columns:1fr}.sms-side{display:none}}
.sms-side{position:relative;overflow:hidden;color:#fff;padding:60px;display:flex;flex-direction:column;justify-content:center;background:linear-gradient(135deg,#4338ca,#7c3aed 55%,#0891b2);background-size:100% 100%}
.sms-side h2{font-size:42px;font-weight:800;letter-spacing:-.03em;line-height:1.1;animation:up .8s var(--ease) backwards}
.sms-side p{margin-top:14px;opacity:.85;max-width:380px;animation:up .8s .15s var(--ease) backwards}
.sms-side ul{margin:30px 0 0;padding:0;list-style:none}.sms-side li{margin:10px 0;font-weight:600;animation:up .8s var(--ease) backwards}.sms-side li:nth-child(1){animation-delay:.3s}.sms-side li:nth-child(2){animation-delay:.42s}.sms-side li:nth-child(3){animation-delay:.54s}
.sms-blob{position:absolute;border-radius:50%;background:rgba(255,255,255,.12);}
.sms-blob.a{width:300px;height:300px;right:-90px;top:-70px}.sms-blob.b{width:180px;height:180px;left:-50px;bottom:60px}.sms-blob.c{width:90px;height:90px;right:25%;bottom:12%}
.sms-formside{display:grid;place-items:center;padding:30px 20px}
.sms-authcard{width:min(100%,430px);animation:pop .7s var(--ease) backwards}
.sms-authcard h1{font-size:28px;font-weight:800;letter-spacing:-.03em}.sms-authcard .sub{color:var(--mut);margin:6px 0 24px}
.sms-foot2{text-align:center;margin-top:18px;color:var(--mut);font-size:14px}.sms-foot2 a{color:var(--p);font-weight:700}
.sms-check{display:flex;align-items:center;gap:8px;font-size:14px;color:var(--mut);margin-bottom:16px}

/* static login: no animation or motion on the guest layout */
.sms-static,.sms-static *,.sms-static::before,.sms-static *::before,.sms-static *::after{animation:none!important;transition:none!important}
.sms-static .sms-btn:hover{transform:none}

@media(prefers-reduced-motion:reduce){*,*::before,*::after{animation-duration:.01ms!important;animation-delay:0ms!important;transition-duration:.01ms!important}.sms-table tbody tr{opacity:1}}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
  // Count-up numbers
  document.querySelectorAll('[data-count]').forEach(el => {
    const end = parseFloat(el.dataset.count) || 0, dec = el.dataset.dec ? +el.dataset.dec : 0, t0 = performance.now(), dur = 1000;
    const tick = t => { const k = Math.min((t - t0) / dur, 1), e = 1 - Math.pow(1 - k, 3);
      el.textContent = (end * e).toFixed(dec); if (k < 1) requestAnimationFrame(tick); };
    requestAnimationFrame(tick);
  });
  // Toast auto-dismiss
  document.querySelectorAll('.sms-toast').forEach(t => setTimeout(() => { t.classList.add('out'); setTimeout(() => t.remove(), 450); }, 3800));
  // Mobile menu
  const nav = document.querySelector('.sms-nav'), burger = document.querySelector('.sms-burger');
  if (nav && burger) burger.addEventListener('click', () => nav.classList.toggle('open'));
  // Auto-submit filter selects
  document.querySelectorAll('form[data-autosubmit] select').forEach(s => s.addEventListener('change', () => s.form.submit()));
  // Delete confirm modal
  const modal = document.getElementById('smsModal'); let pending = null;
  if (modal) {
    const msg = modal.querySelector('[data-msg]');
    const close = () => { modal.classList.remove('show'); pending = null; };
    document.addEventListener('click', e => {
      const b = e.target.closest('[data-confirm]');
      if (b) { e.preventDefault(); pending = b.closest('form'); msg.textContent = b.dataset.confirm; modal.classList.add('show'); }
    });
    modal.querySelector('[data-cancel]').addEventListener('click', close);
    modal.addEventListener('click', e => { if (e.target === modal) close(); });
    modal.querySelector('[data-ok]').addEventListener('click', () => { if (pending) pending.submit(); });
    document.addEventListener('keydown', e => { if (e.key === 'Escape') close(); });
  }
});
</script>