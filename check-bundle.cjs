const https = require('https');
https.get('https://lynard.vercel.app/build/assets/app-DLXx45ij.js', (res) => {
    let data = '';
    res.on('data', chunk => data += chunk);
    res.on('end', () => {
        if (data.includes('try{window.Echo=new') || data.includes('console.error("Echo/Pusher initialization failed"')) {
            console.log("TRY CATCH IS PRESENT");
        } else {
            console.log("TRY CATCH IS MISSING");
        }
        if (data.includes('empty-key')) {
            console.log("EMPTY-KEY IS PRESENT");
        }
    });
});
