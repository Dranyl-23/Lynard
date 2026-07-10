const https = require('https');
https.get('https://lynard.vercel.app/certifications', (res) => {
    let data = '';
    res.on('data', chunk => data += chunk);
    res.on('end', () => {
        const match = data.match(/src="(.*?app-.*?\.js)"/);
        console.log("Script src:", match ? match[1] : "not found");
    });
});
