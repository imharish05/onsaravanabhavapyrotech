<div class="cracker-canvas-wrap" aria-hidden="true">
    <canvas class="cracker-petal-canvas"></canvas>
    <canvas class="cracker-fireworks-canvas"></canvas>
    <div class="cracker-smoke-overlay"></div>
    <div class="cracker-ground-layer"></div>
</div>

<style>
    .cracker-canvas-wrap,
    .cracker-petal-canvas,
    .cracker-fireworks-canvas,
    .cracker-smoke-overlay,
    .cracker-ground-layer {
        position: fixed;
        inset: 0;
        pointer-events: none;
    }

    .cracker-canvas-wrap {
        z-index: 3;
        overflow: hidden;
    }

    .cracker-petal-canvas,
    .cracker-fireworks-canvas,
    .cracker-ground-layer {
        z-index: 3;
    }

    .cracker-smoke-overlay {
        z-index: 0;
        background: radial-gradient(circle at 50% 40%, rgba(212, 134, 10, 0.05), transparent 62%);
        animation: crackerSmokeDrift 22s linear infinite alternate;
    }

    .cracker-ground-layer {
        top: auto;
        height: 120px;
    }

    .premium-hero .container,
    .article-hero .container,
    .seo-hero-content,
    .terms-hero-content,
    .estimate-hero .container,
    .success-hero-content,
    .premium-blog-section .container,
    .article-body-section .container,
    .seo-container,
    .terms-container,
    .estimate-content .container,
    .success-container {
        position: relative;
        z-index: 4;
    }

    .cracker-smoke-puff {
        position: fixed;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(200, 180, 140, 0.25) 0%, transparent 70%);
        pointer-events: none;
        z-index: 3;
        animation: crackerPuffUp var(--sd, 2s) ease-out forwards;
    }

    .cracker-chakkar {
        position: absolute;
        bottom: 18px;
        width: 34px;
        height: 34px;
    }

    .cracker-chakkar-inner {
        width: 100%;
        height: 100%;
        border: 3px solid var(--gold-light, #F0A832);
        border-top-color: #fff;
        border-radius: 50%;
        animation: crackerSpin 0.32s linear infinite;
        box-shadow: 0 0 20px rgba(240, 168, 50, 0.52);
    }

    @keyframes crackerSmokeDrift {
        from { transform: scale(1) translate(0, 0); }
        to { transform: scale(1.08) translate(-18px, 10px); }
    }

    @keyframes crackerPuffUp {
        0% { opacity: 0.7; transform: scale(0.5) translateY(0); }
        100% { opacity: 0; transform: scale(1.8) translateY(var(--sy, -80px)); }
    }

    @keyframes crackerSpin {
        to { transform: rotate(360deg); }
    }
</style>

@push('scripts')
<script>
(function () {
    document.querySelectorAll('.cracker-canvas-wrap').forEach((wrap) => {
        if (wrap.dataset.ready === '1') return;
        wrap.dataset.ready = '1';

        const petalCanvas = wrap.querySelector('.cracker-petal-canvas');
        const fwCanvas = wrap.querySelector('.cracker-fireworks-canvas');
        const groundEl = wrap.querySelector('.cracker-ground-layer');
        
        // Robust Mobile Check: Disable entire canvas effects on mobile/touch
        if (window.innerWidth <= 850 || window.matchMedia('(pointer: coarse)').matches) {
            wrap.remove();
            return;
        }

        if (!petalCanvas || !fwCanvas) return;

        const pctx = petalCanvas.getContext('2d');
        const ctx = fwCanvas.getContext('2d');
        const PI2 = Math.PI * 2;
        const rand = (min, max) => Math.random() * (max - min) + min;
        const randI = (min, max) => Math.floor(rand(min, max + 1));
        const particles = [];
        const petals = [];
        const petalColors = ['#FFD700', '#FFA500', '#FF8C00', '#FF4500'];
        let W = 0;
        let H = 0;
        let pW = 0;
        let pH = 0;

        function resize() {
            W = fwCanvas.width = window.innerWidth;
            H = fwCanvas.height = window.innerHeight;
            pW = petalCanvas.width = window.innerWidth;
            pH = petalCanvas.height = window.innerHeight;
        }
        resize();
        window.addEventListener('resize', resize);

        class Petal {
            constructor() { this.reset(true); }
            reset(randomY = false) {
                this.x = Math.random() * pW;
                this.y = randomY ? Math.random() * pH : -20;
                this.size = Math.random() * 5 + 2;
                this.speed = Math.random() * 1.2 + 0.45;
                this.swing = Math.random() * 1.6;
                this.swingSpeed = Math.random() * 0.045 + 0.018;
                this.angle = Math.random() * PI2;
                this.color = petalColors[Math.floor(Math.random() * petalColors.length)];
                this.opacity = Math.random() * 0.36 + 0.18;
            }
            update() {
                this.y += this.speed;
                this.x += Math.sin(this.angle) * this.swing;
                this.angle += this.swingSpeed;
                if (this.y > pH + 20) this.reset();
            }
            draw() {
                pctx.beginPath();
                pctx.ellipse(this.x, this.y, this.size, this.size / 1.5, this.angle, 0, PI2);
                pctx.fillStyle = this.color;
                pctx.globalAlpha = this.opacity;
                pctx.fill();
                pctx.globalAlpha = 1;
            }
        }

        for (let i = 0; i < 46; i++) petals.push(new Petal());

        function spark(x, y) {
            const angle = rand(0, PI2);
            const speed = rand(1, 4);
            particles.push({
                kind: 'spark',
                x, y,
                vx: Math.cos(angle) * speed,
                vy: Math.sin(angle) * speed,
                hue: rand(30, 58),
                life: rand(12, 24),
                maxLife: 24,
                size: rand(1, 2.2),
                gravity: 0.07,
                friction: 0.94
            });
        }

        function launchAerial(sx, sy, tx, ty) {
            particles.push({
                kind: 'rocket',
                x: sx,
                y: sy,
                vx: (tx - sx) / 55,
                vy: (ty - sy) / 55,
                hue: randI(0, 360),
                life: 55,
                maxLife: 55,
                size: rand(2.3, 3.2),
                trail: []
            });
        }

        function explode(x, y, hue) {
            const count = randI(60, 105);
            for (let i = 0; i < count; i++) {
                const angle = (PI2 / count) * i + rand(-0.1, 0.1);
                const speed = rand(1.4, 5.5);
                particles.push({
                    kind: 'shell',
                    x, y,
                    vx: Math.cos(angle) * speed,
                    vy: Math.sin(angle) * speed,
                    hue: hue + rand(-20, 20),
                    life: rand(34, 68),
                    maxLife: 68,
                    size: rand(1.1, 2.6),
                    gravity: 0.055,
                    friction: 0.975
                });
            }
            addSmoke(x, y);
        }

        function addSmoke(x, y) {
            const puff = document.createElement('div');
            const size = rand(30, 76);
            puff.className = 'cracker-smoke-puff';
            puff.style.cssText = `left:${x - size / 2}px;top:${y - size / 2}px;width:${size}px;height:${size}px;--sy:-${rand(60,120)}px;--sd:${rand(1.5,3)}s;`;
            document.body.appendChild(puff);
            setTimeout(() => puff.remove(), 3100);
        }

        function addChakkar() {
            if (!groundEl) return;
            const el = document.createElement('div');
            el.className = 'cracker-chakkar';
            el.style.left = rand(6, 90) + '%';
            el.innerHTML = '<div class="cracker-chakkar-inner"></div>';
            groundEl.appendChild(el);
            const duration = rand(3600, 6500);
            const iv = setInterval(() => {
                const rect = el.getBoundingClientRect();
                for (let i = 0; i < 4; i++) spark(rect.left + 17, rect.top + 17);
            }, 46);
            setTimeout(() => {
                clearInterval(iv);
                el.style.transition = 'opacity .5s';
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 600);
            }, duration);
        }

        function render() {
            requestAnimationFrame(render);
            if (document.hidden) return;

            pctx.clearRect(0, 0, pW, pH);
            petals.forEach((petal) => {
                petal.update();
                petal.draw();
            });

            ctx.globalCompositeOperation = 'destination-out';
            ctx.fillStyle = 'rgba(0,0,0,0.38)';
            ctx.fillRect(0, 0, W, H);
            ctx.globalCompositeOperation = 'lighter';

            if (particles.length > 850) particles.splice(0, 170);

            for (let i = particles.length - 1; i >= 0; i--) {
                const p = particles[i];
                p.life--;

                if (p.kind === 'rocket') {
                    p.trail.push({ x: p.x, y: p.y });
                    if (p.trail.length > 8) p.trail.shift();
                    p.x += p.vx;
                    p.y += p.vy;
                    p.trail.forEach((point, idx) => {
                        ctx.beginPath();
                        ctx.arc(point.x, point.y, p.size * (idx / p.trail.length) * 0.5, 0, PI2);
                        ctx.fillStyle = `hsla(${p.hue},100%,72%,${(idx / p.trail.length) * 0.45})`;
                        ctx.fill();
                    });
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.size, 0, PI2);
                    ctx.fillStyle = `hsla(${p.hue},100%,90%,1)`;
                    ctx.fill();
                    if (p.life <= 0) {
                        explode(p.x, p.y, p.hue);
                        particles.splice(i, 1);
                    }
                    continue;
                }

                p.vx *= p.friction;
                p.vy *= p.friction;
                p.vy += p.gravity;
                p.x += p.vx;
                p.y += p.vy;
                const alpha = Math.max(0, p.life / p.maxLife);

                if (p.kind === 'spark') {
                    ctx.save();
                    ctx.globalAlpha = alpha;
                    ctx.strokeStyle = `hsl(${p.hue},100%,72%)`;
                    ctx.lineWidth = p.size * 0.7;
                    ctx.beginPath();
                    ctx.moveTo(p.x - 3, p.y);
                    ctx.lineTo(p.x + 3, p.y);
                    ctx.stroke();
                    ctx.restore();
                } else {
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.size, 0, PI2);
                    ctx.fillStyle = `hsla(${p.hue},100%,70%,${alpha})`;
                    ctx.fill();
                }

                if (p.life <= 0) particles.splice(i, 1);
            }
        }
        render();

        setInterval(() => launchAerial(rand(W * 0.25, W * 0.75), H, rand(W * 0.08, W * 0.92), rand(H * 0.08, H * 0.42)), 2400);
        setInterval(() => { if (Math.random() > 0.45) addChakkar(); }, 4300);

        document.addEventListener('mousemove', (event) => {
            if (window.innerWidth <= 850 || window.matchMedia('(pointer: coarse)').matches) return;
            if (Math.random() > 0.86) spark(event.clientX, event.clientY);
        });

        window.addEventListener('click', (event) => {
            if (window.innerWidth <= 850 || window.matchMedia('(pointer: coarse)').matches) return;
            if (event.target.closest('a,button,input,textarea,select,.cart-drawer,.order-modal-overlay,.premium-modal')) return;
            launchAerial(W / 2, H, event.clientX, event.clientY);
        });
    });
})();
</script>
@endpush
