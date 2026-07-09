---
title: Why I Still Choose Vanilla CSS over Frameworks
excerpt: Tailwind is great, but there's a certain elegance to mastering pure CSS and CSS variables for completely custom design systems.
date: Jun 2026
readTime: 3 min
image: images/blog/thumb2.jpg
---

Utility-first frameworks like Tailwind CSS have revolutionized frontend development. I use Tailwind in almost every project because of the speed and developer experience it offers. However, there's a growing trend of developers who have *only* used Tailwind and have never written a raw CSS stylesheet.

## The Power of CSS Variables

When you need to build a highly bespoke, unique, and dynamic theme (like a seamless dark mode that morphs colors rather than just swapping them), pure CSS with CSS custom properties (variables) is unmatched.

```css
:root {
    --bg-primary: #ffffff;
    --text-primary: #101010;
}

html.dark {
    --bg-primary: #121215;
    --text-primary: #f4f4f5;
}

body {
    background-color: var(--bg-primary);
    color: var(--text-primary);
    transition: background-color 0.3s ease, color 0.3s ease;
}
```

This level of control is exactly how I built the theme switcher for my own portfolio. It allows for perfectly smooth color transitions and logical abstractions that utility classes sometimes make muddy.

## The Hybrid Approach

My philosophy isn't "Vanilla CSS vs. Tailwind." It's "Tailwind for layout and spacing, Vanilla CSS for complex theming and micro-interactions." By understanding CSS deeply, you can write better Tailwind, and know exactly when to break out of it.
