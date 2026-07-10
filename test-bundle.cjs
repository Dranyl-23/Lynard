const { JSDOM } = require('jsdom');
const fs = require('fs');
const path = require('path');

const html = `<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="test-token">
</head>
<body x-data="communityChat" x-init="initEcho()">
</body>
</html>`;

const dom = new JSDOM(html, {
    url: 'http://localhost/',
    runScripts: 'dangerously',
    resources: 'usable'
});

const window = dom.window;
global.window = window;
global.document = window.document;
global.navigator = window.navigator;

window.addEventListener('error', (event) => {
    console.error('Window Error:', event.error);
});

// find the built app.js file
const buildDir = path.join(__dirname, 'public/build/assets');
const files = fs.readdirSync(buildDir);
const jsFile = files.find(f => f.startsWith('app-') && f.endsWith('.js'));

if (jsFile) {
    console.log('Testing bundle:', jsFile);
    const jsContent = fs.readFileSync(path.join(buildDir, jsFile), 'utf8');
    try {
        window.eval(jsContent);
        console.log('Evaluation completed without synchronous crash.');
        
        setTimeout(() => {
            console.log('Alpine initialized?', window.Alpine ? 'Yes' : 'No');
            console.log('setTheme defined?', typeof window.setTheme === 'function' ? 'Yes' : 'No');
            console.log('Pusher created?', window.Echo ? 'Yes' : 'No');
        }, 1000);
    } catch (e) {
        console.error('Sync Eval Error:', e);
    }
} else {
    console.error('Could not find JS bundle.');
}
