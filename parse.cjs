const fs = require('fs');
const html = fs.readFileSync('C:\\\\Users\\\\Alfie Lynard\\\\.gemini\\\\antigravity\\\\brain\\\\14a4c6a8-b11b-469d-b370-b8f1f4b8e8fd\\\\.system_generated\\\\steps\\\\1039\\\\content.md', 'utf8');
const sectionIdx = html.indexOf('id="awards"');
if(sectionIdx > -1) { 
    console.log(html.substring(sectionIdx, sectionIdx + 4000).replace(/<[^>]+>/g, '\n').replace(/\n+/g, '\n')); 
}
