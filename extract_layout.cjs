const fs = require('fs');
const file = 'c:/Users/Alfie Lynard/OneDrive/Desktop/archive/Personal/portfolio/resources/views/welcome.blade.php';
const layoutFile = 'c:/Users/Alfie Lynard/OneDrive/Desktop/archive/Personal/portfolio/resources/views/components/layout.blade.php';

let content = fs.readFileSync(file, 'utf8');

const mainContentIndex = content.indexOf('<div class="mx-auto max-w-2xl px-6">');
const topPart = content.substring(0, mainContentIndex);

const hackathonModalIndex = content.indexOf('<!-- Hackathon Modal -->');
const bottomPart = content.substring(hackathonModalIndex);

const layoutContent = topPart + '{{ $slot }}\n    </main>\n\n    ' + bottomPart;

fs.writeFileSync(layoutFile, layoutContent);

console.log('Layout created successfully.');
