const fs = require('fs');
const file = 'c:/Users/Alfie Lynard/OneDrive/Desktop/archive/Personal/portfolio/resources/views/welcome.blade.php';

let content = fs.readFileSync(file, 'utf8');

const mainContentIndex = content.indexOf('<div class="mx-auto max-w-2xl px-6">');
const hackathonModalIndex = content.indexOf('<!-- Hackathon Modal -->');

const mainContent = content.substring(mainContentIndex, hackathonModalIndex);

const newContent = '<x-layout>\n    ' + mainContent.trim() + '\n</x-layout>\n';

fs.writeFileSync(file, newContent);

console.log('welcome.blade.php updated.');
