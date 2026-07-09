import './bootstrap';
import './chat';

(function () {
    const KEY = 'theme';
    const root = document.documentElement;
    const mq = window.matchMedia ? window.matchMedia('(prefers-color-scheme: dark)') : null;
    const reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let animT;

    function pref() {
        try {
            const v = localStorage.getItem(KEY);
            return (v === 'dark' || v === 'light' || v === 'system') ? v : 'light';
        } catch (e) {
            return 'light';
        }
    }

    function isDark(p) {
        return p === 'dark' || (p === 'system' && !!mq && mq.matches);
    }

    function setClass(p) {
        root.classList.toggle('dark', isDark(p));
        try {
            document.querySelectorAll('[data-theme-opt]').forEach(function (el) {
                el.classList.toggle('is-active', el.getAttribute('data-theme-opt') === p);
            });
        } catch (e) {}
    }

    function crossfade(p) {
        root.classList.add('theme-anim');
        setClass(p);
        clearTimeout(animT);
        animT = setTimeout(function () { root.classList.remove('theme-anim'); }, 520);
    }

    function reveal(p, x, y) {
        if (!document.startViewTransition) return crossfade(p);
        const r = Math.hypot(Math.max(x, innerWidth - x), Math.max(y, innerHeight - y));
        const vt = root.__vt = document.startViewTransition(function () { setClass(p); });
        vt.ready.then(function () {
            root.animate(
                { clipPath: ['circle(0px at ' + x + 'px ' + y + 'px)', 'circle(' + r + 'px at ' + x + 'px ' + y + 'px)'] },
                { duration: 540, easing: 'cubic-bezier(.32,.08,.24,1)', pseudoElement: '::view-transition-new(root)' }
            );
        }).catch(function () {});
    }

    window.setTheme = function (p, ev) {
        try { localStorage.setItem(KEY, p); } catch (e) {}
        if (isDark(p) === root.classList.contains('dark')) { setClass(p); return; }
        if (reduce || !document.startViewTransition) { crossfade(p); return; }
        const x = (ev && ev.clientX) || innerWidth, y = (ev && ev.clientY) || innerHeight;
        reveal(p, x, y);
    };

    setClass(pref());
    if (mq) mq.addEventListener('change', function () { if (pref() === 'system') crossfade('system'); });
    document.addEventListener('DOMContentLoaded', function () { setClass(pref()); });

    window.openMobileNav = function() {
        const m = document.getElementById('mobileNav');
        m.classList.remove('hidden');
        m.classList.add('flex');
        document.documentElement.style.overflow = 'hidden';
        requestAnimationFrame(() => {
            m.classList.add('is-open');
        });
    };

    window.closeMobileNav = function() {
        const m = document.getElementById('mobileNav');
        m.classList.remove('is-open');
        document.documentElement.style.overflow = '';
        setTimeout(() => { m.classList.add('hidden'); m.classList.remove('flex'); }, 300);
    };

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const m = document.getElementById('mobileNav');
            if (m && !m.classList.contains('hidden')) window.closeMobileNav();
        }
    });
})();
