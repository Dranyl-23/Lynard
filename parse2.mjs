import fs from 'fs';
const html = fs.readFileSync('C:\\\\Users\\\\Alfie Lynard\\\\.gemini\\\\antigravity\\\\brain\\\\14a4c6a8-b11b-469d-b370-b8f1f4b8e8fd\\\\.system_generated\\\\steps\\\\1039\\\\content.md', 'utf8');
const awardsStart = html.indexOf('id="awards"');
const end = html.length;
const awardsHtml = html.substring(awardsStart, Math.min(awardsStart + 20000, end));

// let's extract all text nodes that look like meaningful titles
const regex = />([^<]{4,100})</g;
let match;
let results = [];
while((match = regex.exec(awardsHtml)) !== null) {
    const text = match[1].trim();
    if(text.length > 5 && !text.includes('path d=') && !text.includes('svg')) {
        results.push(text);
    }
}
console.log([...new Set(results)].join('\n'));
