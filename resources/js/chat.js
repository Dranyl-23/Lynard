const cell = 32;
const scale = 1.2; // draw scale (player ≈ 38px)
const animRow = { IDLE_DOWN: 0, IDLE_RIGHT: 32, IDLE_UP: 64, WALK_DOWN: 96, WALK_RIGHT: 128, WALK_UP: 160 };

const assets = {};
let assetsLoaded = false;
let imagesToLoad = 0;

function loadImage(name, src) {
    imagesToLoad++;
    const img = new Image();
    img.onload = () => {
        imagesToLoad--;
        if (imagesToLoad === 0) assetsLoaded = true;
    };
    img.onerror = () => {
        console.error("Failed to load sprite: " + src);
        imagesToLoad--;
        if (imagesToLoad === 0) assetsLoaded = true;
    };
    img.src = src;
    assets[name] = img;
}

loadImage('hero', '/images/game/character.png');
loadImage('shadow', '/images/game/character_shadow.png');
loadImage('desk', '/images/game/desk.png');
loadImage('computer', '/images/game/computer.png');
loadImage('server1', '/images/game/cabinet_1.png');
loadImage('server2', '/images/game/cabinet_2.png');
loadImage('table', '/images/game/table.png');

const sfx = {
    step: new Audio('/audio/game/step.wav'),
    collision: new Audio('/audio/game/collision.wav')
};
sfx.step.volume = 0.13;
sfx.collision.volume = 0.13;
sfx.step.preload = 'auto';
sfx.collision.preload = 'auto';

function playSfx(name) {
    try { sfx[name].currentTime = 0; sfx[name].play(); } catch(e) {}
}

const registerCommunityChat = () => {
    Alpine.data('communityChat', () => ({
        isOpen: false,
        gameActive: false,
        messages: [],
        newMessage: '',
        currentUser: {},
        viewers: [],
        players: {},
        ctx: null,
        myPos: { x: 1200, y: 1200 },
        keys: {},
        animationFrame: null,
        worldWidth: 2400,
        worldHeight: 2400,
        cameraX: 800,
        cameraY: 800,
        direction: 'down',
        isMoving: false,
        animTime: 0,
        animFrame: 0,
        hasMore: false,
        oldestId: null,
        loadingMore: false,
        npcs: [],
        nearbyInteract: null,
        sfxUnlocked: false,
        lastStepTime: 0,
        lastCollTime: 0,
        lastCollDir: '',
        obstacles: [
            // === RECEPTION (center, 1100-1300, 900-1100) ===
            { id: 'rec_desk', type: 'desk', x: 1150, y: 1000, w: 128, h: 64, interact: { label: 'About Me', url: '/' } },
            
            // === DEV FLOOR (top-left, 200-800, 200-600) ===
            { id: 'dev1', type: 'desk', x: 200, y: 250, w: 128, h: 64, interact: { label: 'Projects', url: '/projects' } },
            { id: 'dev2', type: 'desk', x: 400, y: 250, w: 128, h: 64 },
            { id: 'dev3', type: 'desk', x: 600, y: 250, w: 128, h: 64 },
            { id: 'dev4', type: 'desk', x: 200, y: 450, w: 128, h: 64 },
            { id: 'dev5', type: 'desk', x: 400, y: 450, w: 128, h: 64 },
            { id: 'dev6', type: 'desk', x: 600, y: 450, w: 128, h: 64 },
            
            // === SERVER ROOM (bottom-left, 200-600, 900-1400) ===
            { id: 'srv1', type: 'server', x: 220, y: 950, w: 64, h: 64, v: 1 },
            { id: 'srv2', type: 'server', x: 300, y: 950, w: 64, h: 64, v: 2 },
            { id: 'srv3', type: 'server', x: 380, y: 950, w: 64, h: 64, v: 1 },
            { id: 'srv4', type: 'server', x: 460, y: 950, w: 64, h: 64, v: 2 },
            { id: 'srv5', type: 'server', x: 220, y: 1100, w: 64, h: 64, v: 1, interact: { label: 'Tech Stack', url: '/stack' } },
            { id: 'srv6', type: 'server', x: 300, y: 1100, w: 64, h: 64, v: 2 },
            { id: 'srv7', type: 'server', x: 380, y: 1100, w: 64, h: 64, v: 1 },
            { id: 'srv8', type: 'server', x: 460, y: 1100, w: 64, h: 64, v: 2 },
            
            // === MEETING ROOM (top-right, 1400-2000, 200-600) ===
            { id: 'meet_tbl1', type: 'table', x: 1550, y: 300, w: 128, h: 64, interact: { label: 'Experience', url: '/experience' } },
            { id: 'meet_tbl2', type: 'table', x: 1550, y: 400, w: 128, h: 64 },
            { id: 'meet_tbl3', type: 'table', x: 1750, y: 300, w: 128, h: 64 },
            { id: 'meet_tbl4', type: 'table', x: 1750, y: 400, w: 128, h: 64 },
            
            // === BREAK ROOM (bottom-right, 1400-2000, 900-1400) ===
            { id: 'brk_tbl1', type: 'table', x: 1500, y: 1000, w: 128, h: 64, interact: { label: 'Resources', url: '/resources' } },
            { id: 'brk_tbl2', type: 'table', x: 1750, y: 1000, w: 128, h: 64 },
            
            // === CEO OFFICE (bottom-center, 800-1300, 1600-2100) ===
            { id: 'ceo_desk', type: 'desk', x: 1000, y: 1750, w: 128, h: 64, interact: { label: 'Certifications', url: '/certifications' } },
            { id: 'ceo_cab1', type: 'server', x: 900, y: 1650, w: 64, h: 64, v: 1 },
            { id: 'ceo_cab2', type: 'server', x: 1150, y: 1650, w: 64, h: 64, v: 2 },
            
            // === BLOG CORNER (far top-center, 900-1100, 100-300) ===
            { id: 'blog_desk', type: 'desk', x: 950, y: 200, w: 128, h: 64, interact: { label: 'Blog', url: '/blog' } },
            
            // === GEAR NOOK (far bottom-right, 1800-2100, 1600-1900) ===
            { id: 'gear_desk', type: 'desk', x: 1850, y: 1750, w: 128, h: 64, interact: { label: 'Gear', url: '/gear' } },
            { id: 'gear_tbl', type: 'table', x: 1850, y: 1900, w: 128, h: 64 },
            
            // === COLLABS AREA (far left-center, 100-400, 1600-1900) ===
            { id: 'collab_tbl1', type: 'table', x: 200, y: 1750, w: 128, h: 64, interact: { label: 'Collabs', url: '/collabs' } },
            { id: 'collab_tbl2', type: 'table', x: 200, y: 1900, w: 128, h: 64 }
        ],

        async initEcho() {
            try {
                // Fetch initial messages and current user
                const [msgsRes, meRes] = await Promise.all([
                    axios.get('/messages'),
                    axios.get('/me')
                ]);
                this.messages = msgsRes.data.messages || [];
                this.hasMore = msgsRes.data.has_more || false;
                this.oldestId = msgsRes.data.oldest_id || null;
                this.currentUser = meRes.data || {};
                
                // Scroll to bottom
                this.$nextTick(() => { this.scrollToBottom() });
            } catch (e) {
                // Failed to load initial data silently
            }

            // Await Echo to be available (from bootstrap.js) with 5 second timeout
            let echoAttempts = 0;
            this.checkEcho = setInterval(() => {
                if (window.Echo) {
                    clearInterval(this.checkEcho);
                    this.setupChannels();
                } else if (++echoAttempts > 50) {
                    clearInterval(this.checkEcho);
                }
            }, 100);
        },

        setupChannels() {
            // Join global presence channel to get current user info and site viewers
            window.Echo.join('site')
                .here((users) => {
                    this.viewers = users;
                })
                .joining((user) => {
                    this.viewers.push(user);
                })
                .leaving((user) => {
                    this.viewers = this.viewers.filter(u => u.id !== user.id);
                });

            // Join chat channel
            window.Echo.join('chat')
                .listen('MessageSent', (e) => {
                    if (!this.messages.find(m => m.id === e.message.id)) {
                        this.messages.push(e.message);
                        this.$nextTick(() => { this.scrollToBottom() });
                    }
                    // Refresh NPC names from latest chat messages
                    if (this.npcs.length) {
                        const names = this.getRecentChatNames();
                        this.npcs.forEach((n, i) => { if (names[i]) n.name = names[i]; });
                    }
                });

            // Join game channel
            const gameChannel = window.Echo.join('game')
                .here((users) => {
                    users.forEach(u => {
                        this.players[u.id] = { ...u.user_info, x: 400, y: 400, tx: 400, ty: 400 };
                    });
                })
                .joining((user) => {
                    this.players[user.id] = { ...user.user_info, x: 400, y: 400, tx: 400, ty: 400 };
                })
                .leaving((user) => {
                    delete this.players[user.id];
                })
                .listenForWhisper('move', (e) => {
                    if (this.players[e.id]) {
                        this.players[e.id].tx = e.x;
                        this.players[e.id].ty = e.y;
                    }
                });

            // Set up local user id from local storage or generated
            this.myId = localStorage.getItem('chat_uid');
            if(!this.myId) {
                this.myId = 'uuid-' + crypto.randomUUID();
                localStorage.setItem('chat_uid', this.myId);
            }

            // Start game loop
            this.initGame();
        },

        async setName() {
            if (!this.newMessage.trim()) return;
            try {
                const res = await axios.post('/set-name', { name: this.newMessage.trim() });
                this.currentUser = res.data;
                this.newMessage = '';
                // Reconnect presence channels to broadcast new name
                window.Echo.leave('site');
                window.Echo.leave('game');
                this.setupChannels();
            } catch (e) {
                // Silently handle failure
            }
        },

        async sendMessage() {
            if (!this.currentUser.name) {
                return this.setName();
            }

            if (!this.newMessage.trim()) return;
            
            const content = this.newMessage.trim();
            this.newMessage = ''; // clear immediately

            // Optimistic UI update
            const tempId = 'temp-' + Date.now();
            const optimisticMsg = {
                id: tempId,
                username: this.currentUser.name,
                avatar: this.currentUser.avatar || 'https://api.dicebear.com/9.x/pixel-art/svg?seed=' + encodeURIComponent(this.currentUser.name),
                location: this.currentUser.location || 'Unknown',
                content: content,
                created_at: new Date().toISOString()
            };
            this.messages.push(optimisticMsg);
            this.$nextTick(() => { this.scrollToBottom() });

            try {
                const res = await axios.post('/messages', { content });
                
                // Replace optimistic message with actual data from server
                const idx = this.messages.findIndex(m => m.id === tempId);
                if (idx !== -1) {
                    // Update object in place so Alpine reactivity catches it
                    Object.assign(this.messages[idx], res.data);
                } else if (!this.messages.find(m => m.id === res.data.id)) {
                    this.messages.push(res.data);
                }
                
                // We also learn who we are (if server updated it)
                this.currentUser = { name: res.data.username, avatar: res.data.avatar, location: res.data.location };
            } catch (e) {
                // If it fails, remove the optimistic message
                this.messages = this.messages.filter(m => m.id !== tempId);
            }
        },

        scrollToBottom() {
            const el = document.getElementById('chat-messages');
            if (el) el.scrollTop = el.scrollHeight;
        },

        formatTime(dateStr) {
            const d = new Date(dateStr);
            const now = new Date();
            const diffSecs = Math.floor((now - d) / 1000);
            
            if (diffSecs < 60) return 'just now';
            const diffMins = Math.floor(diffSecs / 60);
            if (diffMins < 60) return diffMins + 'm ago';
            const diffHours = Math.floor(diffMins / 60);
            if (diffHours < 24) return diffHours + 'h ago';
            const diffDays = Math.floor(diffHours / 24);
            return diffDays + 'd ago';
        },
        
        renderLocation(loc) {
            if (!loc) return 'Unknown';
            let safeLoc = loc.replace(/</g, '&lt;').replace(/>/g, '&gt;');
            
            const desktopIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 inline-block ml-1 opacity-70 relative -top-[1px]" viewBox="0 0 24 24" fill="currentColor"><path d="M4 6h16v10H4zm2 2v6h12V8H6zM2 18h20v2H2z"/></svg>`;
            const mobileIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 inline-block ml-1 opacity-70 relative -top-[1px]" viewBox="0 0 24 24" fill="currentColor"><path d="M6 2h12v20H6V2zm2 2v14h8V4H8zm2 16h4v2h-4v-2z"/></svg>`;
            
            safeLoc = safeLoc.replace('💻', desktopIcon);
            safeLoc = safeLoc.replace('📱', mobileIcon);
            
            return safeLoc;
        },

        async loadMore() {
            if (!this.hasMore || this.loadingMore) return;
            this.loadingMore = true;
            try {
                const res = await axios.get('/messages', { params: { before: this.oldestId } });
                const older = res.data.messages || [];
                this.messages = [...older, ...this.messages];
                this.hasMore = res.data.has_more || false;
                this.oldestId = res.data.oldest_id || this.oldestId;
            } catch (e) {
                // Silently handle failure
            }
            this.loadingMore = false;
        },

        spawnNPCs() {
            const names = this.getRecentChatNames();
            this.npcs = [];
            const placed = [{ x: this.myPos.x, y: this.myPos.y }];
            const farEnough = (tx, ty) => placed.every(p => Math.abs(p.x - tx) > 80 || Math.abs(p.y - ty) > 80);
            for (let i = 0; i < 5; i++) {
                let nx, ny, tries = 0, ok = false;
                do {
                    nx = 100 + Math.random() * (this.worldWidth - 200);
                    ny = 100 + Math.random() * (this.worldHeight - 200);
                    ok = farEnough(nx, ny) && !this.isBlocked(nx, ny);
                    tries++;
                } while (!ok && tries < 300);
                placed.push({ x: nx, y: ny });
                this.npcs.push({
                    x: nx, y: ny, direction: ['up','down','left','right'][Math.floor(Math.random()*4)],
                    isMoving: false, animFrame: Math.floor(Math.random()*4), animTime: 0,
                    name: names[i] || ('guest ' + (i + 1)),
                    brain: { dir: null, steps: 0, pauseUntil: Date.now() + Math.random() * 1800 }
                });
            }
        },

        isBlocked(x, y) {
            const r = 15;
            return this.obstacles.some(obs => x + r > obs.x && x - r < obs.x + obs.w && y + r > obs.y && y - r < obs.y + obs.h);
        },

        getRecentChatNames() {
            const names = [];
            for (let i = this.messages.length - 1; i >= 0 && names.length < 5; i--) {
                const n = this.messages[i].username;
                if (n && n !== (this.currentUser?.name) && !names.includes(n)) names.push(n);
            }
            return names;
        },

        updateNPCs() {
            const speed = 2;
            this.npcs.forEach(npc => {
                const now = Date.now();
                const b = npc.brain;
                if (now < b.pauseUntil) { npc.isMoving = false; return; }
                if (b.steps <= 0 || !b.dir) {
                    if (Math.random() < 0.34) {
                        b.pauseUntil = now + 700 + Math.random() * 2600;
                        b.dir = null; npc.isMoving = false; return;
                    }
                    b.dir = ['up','down','left','right'][Math.floor(Math.random()*4)];
                    b.steps = 2 + Math.floor(Math.random() * 6);
                }
                npc.direction = b.dir;
                let dx = 0, dy = 0;
                if (b.dir === 'up') dy = -speed;
                else if (b.dir === 'down') dy = speed;
                else if (b.dir === 'left') dx = -speed;
                else dx = speed;
                const nx = npc.x + dx, ny = npc.y + dy;
                if (nx < 30 || nx > this.worldWidth - 30 || ny < 30 || ny > this.worldHeight - 30 || this.isBlocked(nx, ny)) {
                    b.steps = 0; b.dir = null;
                    b.pauseUntil = now + 250 + Math.random() * 800;
                    npc.isMoving = false; return;
                }
                npc.x = nx; npc.y = ny;
                npc.isMoving = true; b.steps--;
                npc.animTime++;
                if (npc.animTime > 12) { npc.animFrame++; npc.animTime = 0; }
            });
        },

        // GAME LOGIC
        focusGame() {
            this.gameActive = true;
        },

        handleTouch(key, state) {
            if (!this.gameActive) this.gameActive = true;
            this.keys[key] = state;
            if (!this.sfxUnlocked) {
                this.sfxUnlocked = true;
                Object.values(sfx).forEach(a => { try { a.muted = true; a.play().then(() => { a.pause(); a.currentTime = 0; a.muted = false; }).catch(() => { a.muted = false; }); } catch(e) {} });
            }
        },

        triggerInteract() {
            if (this.nearbyInteract && this.gameActive) {
                this.isOpen = false;
                window.location.href = this.nearbyInteract.url;
            }
        },

        initGame() {
            const canvas = this.$refs.gameCanvas;
            this.ctx = canvas.getContext('2d');
            
            const resizeCanvas = () => {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            };
            window.addEventListener('resize', resizeCanvas);
            resizeCanvas();

            this.keydownHandler = (e) => {
                if (['INPUT', 'TEXTAREA'].includes(e.target.tagName)) return;
                // Interaction key
                if ((e.key === 'e' || e.key === 'E') && this.nearbyInteract && this.gameActive) {
                    this.isOpen = false;
                    window.location.href = this.nearbyInteract.url;
                    return;
                }
                // Focus canvas on first movement
                if (!this.gameActive && ['ArrowUp', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'w', 'a', 's', 'd'].includes(e.key)) {
                    this.gameActive = true;
                    e.preventDefault();
                }
                // Unlock audio on first keypress
                if (!this.sfxUnlocked) {
                    this.sfxUnlocked = true;
                    Object.values(sfx).forEach(a => { try { a.muted = true; a.play().then(() => { a.pause(); a.currentTime = 0; a.muted = false; }).catch(() => { a.muted = false; }); } catch(e) {} });
                }
                if(this.gameActive && ['ArrowUp', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'w', 'a', 's', 'd'].includes(e.key)) {
                    e.preventDefault();
                }
                this.keys[e.key] = true;
            };

            this.keyupHandler = (e) => {
                if (['INPUT', 'TEXTAREA'].includes(e.target.tagName)) return;
                this.keys[e.key] = false;
            };

            this.clickHandler = (e) => {
                if (this.isOpen && !canvas.contains(e.target) && e.target.closest('#communityChat') !== null) {
                    if(e.target.closest('.w-full.md\\:w-1\\/2') !== canvas.closest('.w-full.md\\:w-1\\/2')) {
                        this.gameActive = false;
                    }
                }
            };

            window.addEventListener('keydown', this.keydownHandler);
            window.addEventListener('keyup', this.keyupHandler);
            window.addEventListener('click', this.clickHandler);

            let lastBroadcast = 0;
            
            this.spawnNPCs();
            
            const loop = (timestamp) => {
                this.updateGame();
                this.drawGame();

                // Whisper pos 15 times a second
                if (timestamp - lastBroadcast > 66 && this.gameActive) {
                    if (window.Echo) {
                        window.Echo.join('game').whisper('move', {
                            id: this.myId,
                            x: this.myPos.x,
                            y: this.myPos.y
                        });
                    }
                    lastBroadcast = timestamp;
                }

                this.animationFrame = requestAnimationFrame(loop);
            };
            this.animationFrame = requestAnimationFrame(loop);
        },

        updateGame() {
            if (!this.gameActive) return;
            const speed = 2;
            let dx = 0;
            let dy = 0;
            let dir = null;

            if (this.keys['ArrowUp'] || this.keys['w'] || this.keys['W']) { dy -= speed; dir = 'up'; }
            if (this.keys['ArrowDown'] || this.keys['s'] || this.keys['S']) { dy += speed; dir = 'down'; }
            if (this.keys['ArrowLeft'] || this.keys['a'] || this.keys['A']) { dx -= speed; dir = 'left'; }
            if (this.keys['ArrowRight'] || this.keys['d'] || this.keys['D']) { dx += speed; dir = 'right'; }

            if (dir) {
                this.direction = dir;
                this.isMoving = true;
                this.animTime++;
                if (this.animTime > 10) {
                    this.animFrame++;
                    this.animTime = 0;
                }
            } else {
                this.isMoving = false;
                this.animTime = 0;
            }

            const pRadius = 15;
            
            // X-axis collision
            let canMoveX = true;
            this.obstacles.forEach(obs => {
                if (this.myPos.x + dx + pRadius > obs.x && this.myPos.x + dx - pRadius < obs.x + obs.w &&
                    this.myPos.y + pRadius > obs.y && this.myPos.y - pRadius < obs.y + obs.h) {
                    canMoveX = false;
                }
            });
            if (canMoveX) this.myPos.x += dx;

            // Y-axis collision
            let canMoveY = true;
            this.obstacles.forEach(obs => {
                if (this.myPos.x + pRadius > obs.x && this.myPos.x - pRadius < obs.x + obs.w &&
                    this.myPos.y + dy + pRadius > obs.y && this.myPos.y + dy - pRadius < obs.y + obs.h) {
                    canMoveY = false;
                }
            });
            if (canMoveY) this.myPos.y += dy;

            // Sound effects
            if (this.isMoving && this.sfxUnlocked) {
                const now = Date.now();
                if (now - this.lastStepTime > 200) { playSfx('step'); this.lastStepTime = now; }
            }
            if ((dx !== 0 && !canMoveX && this.sfxUnlocked) || (dy !== 0 && !canMoveY && this.sfxUnlocked)) {
                const now = Date.now();
                if (now - this.lastCollTime > 350) { playSfx('collision'); this.lastCollTime = now; }
            }

            // Constrain to world bounds
            this.myPos.x = Math.max(20, Math.min(this.worldWidth - 20, this.myPos.x));
            this.myPos.y = Math.max(20, Math.min(this.worldHeight - 20, this.myPos.y));

            // Update NPCs
            this.updateNPCs();

            // Interaction detection
            this.nearbyInteract = null;
            this.obstacles.forEach(obs => {
                if (obs.interact && Math.abs(this.myPos.x - (obs.x + obs.w/2)) < 80 && Math.abs(this.myPos.y - (obs.y + obs.h/2)) < 80) {
                    this.nearbyInteract = obs.interact;
                }
            });

            // Camera follow logic
            const targetCamX = this.myPos.x - (window.innerWidth / 2);
            const targetCamY = this.myPos.y - (window.innerHeight / 2);
            
            this.cameraX += (targetCamX - this.cameraX) * 0.1;
            this.cameraY += (targetCamY - this.cameraY) * 0.1;

            this.cameraX = Math.max(0, Math.min(this.worldWidth - window.innerWidth, this.cameraX));
            this.cameraY = Math.max(0, Math.min(this.worldHeight - window.innerHeight, this.cameraY));
        },

        drawGame() {
            if (!this.ctx) return;
            const cw = window.innerWidth;
            const ch = window.innerHeight;
            this.ctx.clearRect(0, 0, cw, ch);
            this.ctx.save();
            this.ctx.translate(-this.cameraX, -this.cameraY);

            // Draw grid
            const isDark = document.documentElement.classList.contains('dark');
            this.ctx.strokeStyle = isDark ? 'rgba(255,255,255,0.06)' : 'rgba(0,0,0,0.08)';
            this.ctx.lineWidth = 1;
            this.ctx.beginPath();
            for (let x = 0; x <= this.worldWidth; x += 40) {
                this.ctx.moveTo(x, 0); this.ctx.lineTo(x, this.worldHeight);
            }
            for (let y = 0; y <= this.worldHeight; y += 40) {
                this.ctx.moveTo(0, y); this.ctx.lineTo(this.worldWidth, y);
            }
            this.ctx.stroke();

            if (!assetsLoaded) {
                this.ctx.fillStyle = 'red';
                this.ctx.font = '24px monospace';
                this.ctx.fillText(`LOADING ASSETS... (${imagesToLoad} remaining)`, this.cameraX + 50, this.cameraY + 50);
                this.ctx.restore();
                return;
            }

            let drawables = [];
            const ghostH = 32;

            // Add obstacles to render queue
            this.obstacles.forEach(obs => {
                drawables.push({ type: 'obstacle', obj: obs, y: obs.y + obs.h });
            });

            // Add other players to render queue
            Object.values(this.players || {}).forEach(p => {
                if (p.x !== undefined) {
                    drawables.push({ type: 'other', obj: p, y: p.y + ghostH/2 });
                }
            });

            // Add NPCs to render queue
            this.npcs.forEach(npc => {
                drawables.push({ type: 'npc', obj: npc, y: npc.y + ghostH/2 });
            });

            // Add player
            drawables.push({
                y: this.myPos.y + ghostH/2, // Player's base depth
                type: 'player',
                obj: this.myPos
            });

            // Sort by depth (Y position)
            drawables.sort((a, b) => a.y - b.y);

            // Draw everything in order
            drawables.forEach(d => {
                if (d.type === 'player') {
                    this.drawPlayer(this.myPos.x, this.myPos.y, this.currentUser?.name || 'You');
                } else if (d.type === 'other') {
                    this.drawPlayer(d.obj.x, d.obj.y, d.obj.name || 'Guest');
                } else if (d.type === 'npc') {
                    this.drawNPC(d.obj);
                } else if (d.type === 'obstacle') {
                    this.drawObstacle(d.obj);
                }
            });

            this.ctx.restore();

            // Draw interaction prompt (screen space)
            if (this.nearbyInteract) {
                const bob = Math.sin(Date.now() / 300) * 2;
                const px = this.myPos.x - this.cameraX;
                const py = this.myPos.y - this.cameraY - 60 + bob;
                const label = 'Press E — ' + this.nearbyInteract.label;
                this.ctx.save();
                this.ctx.font = '600 12px "Geist Mono", ui-monospace, monospace';
                this.ctx.textAlign = 'center';
                const tw = this.ctx.measureText(label).width + 24;
                const isDark = document.documentElement.classList.contains('dark');
                // Pill background
                this.ctx.fillStyle = isDark ? 'rgba(39,39,42,0.9)' : 'rgba(255,255,255,0.95)';
                this.ctx.shadowColor = 'rgba(0,0,0,0.15)'; this.ctx.shadowBlur = 8;
                this.ctx.beginPath();
                this.ctx.roundRect(px - tw/2, py - 10, tw, 24, 12);
                this.ctx.fill();
                // Text
                this.ctx.shadowBlur = 0;
                this.ctx.fillStyle = isDark ? '#f4f4f5' : '#0a0a0a';
                this.ctx.fillText(label, px, py + 5);
                this.ctx.restore();
            }
        },

        drawPlayer(x, y, name) {
            if (!assetsLoaded) return;
            const d = this.direction;
            const moving = this.isMoving;
            
            let rowY, count;
            if (moving) { 
                rowY = d === 'up' ? animRow.WALK_UP : d === 'down' ? animRow.WALK_DOWN : animRow.WALK_RIGHT; 
                count = 4; 
            } else { 
                rowY = d === 'up' ? animRow.IDLE_UP : d === 'down' ? animRow.IDLE_DOWN : animRow.IDLE_RIGHT; 
                count = 2; 
            }
            
            const cf = this.animFrame % count;
            const flip = d === 'left';
            const w = cell * scale;
            const h = cell * scale;
            
            // Draw shadow
            const cx = x - w/2;
            const cy = y - h/2 - 16;
            
            if (flip) {
                this.ctx.save();
                this.ctx.scale(-1, 1);
                this.ctx.drawImage(assets.shadow, cf * cell, rowY, cell, cell, -cx - w, cy, w, h);
                this.ctx.restore();
            } else {
                this.ctx.drawImage(assets.shadow, cf * cell, rowY, cell, cell, cx, cy, w, h);
            }

            // Draw character
            if (flip) {
                this.ctx.save();
                this.ctx.scale(-1, 1);
                this.ctx.drawImage(assets.hero, cf * cell, rowY, cell, cell, -cx - w, cy, w, h);
                this.ctx.restore();
            } else {
                this.ctx.drawImage(assets.hero, cf * cell, rowY, cell, cell, cx, cy, w, h);
            }

            // Draw Name
            if (name) {
                this.ctx.save();
                this.ctx.font = '600 11px "Geist Mono", ui-monospace, monospace';
                this.ctx.textAlign = 'center'; 
                this.ctx.textBaseline = 'middle';
                this.ctx.shadowColor = document.documentElement.classList.contains('dark') ? 'rgba(0,0,0,0.85)' : 'rgba(255,255,255,0.9)';
                this.ctx.shadowBlur = 3; 
                this.ctx.shadowOffsetY = 1;
                this.ctx.fillStyle = document.documentElement.classList.contains('dark') ? '#f4f4f5' : '#0a0a0a';
                this.ctx.fillText(name, x, cy - 8);
                this.ctx.restore();
            }
        },

        drawObstacle(obj) {
            if (!assetsLoaded) return;
            
            if (obj.type === 'desk') {
                this.ctx.drawImage(assets.desk, obj.x, obj.y, obj.w, obj.h);
                this.ctx.drawImage(assets.computer, obj.x + 32, obj.y - 16, 64, 32);
            } else if (obj.type === 'server') {
                const img = obj.v === 2 ? assets.server2 : assets.server1;
                this.ctx.drawImage(img, obj.x, obj.y, obj.w, obj.h);
            } else if (obj.type === 'table') {
                this.ctx.drawImage(assets.table, obj.x, obj.y, obj.w, obj.h);
            }

            // Dark Mode Tint Overlay
            if (document.documentElement.classList.contains('dark')) {
                this.ctx.fillStyle = 'rgba(0, 0, 10, 0.45)';
                this.ctx.fillRect(obj.x, obj.y - 16, obj.w, obj.h + 16);
            }
        },

        drawNPC(npc) {
            // ... (keep exact contents, don't change this method, just adding destroy below) ...
            if (!assetsLoaded) return;
            const d = npc.direction;
            const moving = npc.isMoving;
            let rowY, count;
            if (moving) {
                rowY = d === 'up' ? animRow.WALK_UP : d === 'down' ? animRow.WALK_DOWN : animRow.WALK_RIGHT;
                count = 4;
            } else {
                rowY = d === 'up' ? animRow.IDLE_UP : d === 'down' ? animRow.IDLE_DOWN : animRow.IDLE_RIGHT;
                count = 2;
            }
            const cf = npc.animFrame % count;
            const flip = d === 'left';
            const w = cell * scale, h = cell * scale;
            const cx = npc.x - w/2, cy = npc.y - h/2 - 16;

            this.ctx.save();
            this.ctx.globalAlpha = 0.6;
            // Shadow
            if (flip) { this.ctx.save(); this.ctx.scale(-1,1); this.ctx.drawImage(assets.shadow, cf*cell, rowY, cell, cell, -cx-w, cy, w, h); this.ctx.restore(); }
            else this.ctx.drawImage(assets.shadow, cf*cell, rowY, cell, cell, cx, cy, w, h);
            // Character
            if (flip) { this.ctx.save(); this.ctx.scale(-1,1); this.ctx.drawImage(assets.hero, cf*cell, rowY, cell, cell, -cx-w, cy, w, h); this.ctx.restore(); }
            else this.ctx.drawImage(assets.hero, cf*cell, rowY, cell, cell, cx, cy, w, h);
            this.ctx.restore();

            // Name
            if (npc.name) {
                this.ctx.save();
                this.ctx.font = '600 11px "Geist Mono", ui-monospace, monospace';
                this.ctx.textAlign = 'center'; this.ctx.textBaseline = 'middle';
                this.ctx.globalAlpha = 0.7;
                const isDark = document.documentElement.classList.contains('dark');
                this.ctx.shadowColor = isDark ? 'rgba(0,0,0,0.85)' : 'rgba(255,255,255,0.9)';
                this.ctx.shadowBlur = 3; this.ctx.shadowOffsetY = 1;
                this.ctx.fillStyle = isDark ? '#a6a6ad' : '#6d6d72';
                this.ctx.fillText(npc.name, npc.x, cy - 8);
                this.ctx.restore();
            }
        },

        destroy() {
            if (this.checkEcho) clearInterval(this.checkEcho);
            if (this.animationFrame) {
                cancelAnimationFrame(this.animationFrame);
            }
            if (this.keydownHandler) window.removeEventListener('keydown', this.keydownHandler);
            if (this.keyupHandler) window.removeEventListener('keyup', this.keyupHandler);
            if (this.clickHandler) window.removeEventListener('click', this.clickHandler);
            
            if (window.Echo) {
                window.Echo.leave('site');
                window.Echo.leave('chat');
                window.Echo.leave('game');
            }
        }
    }));
};

if (window.Alpine) {
    registerCommunityChat();
} else {
    document.addEventListener('alpine:init', registerCommunityChat);
}
