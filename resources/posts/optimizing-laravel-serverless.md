---
title: "Optimizing Laravel for Serverless (Vercel)"
excerpt: How I deployed this exact developer portfolio on Vercel's edge network, and the caching gotchas I learned along the way.
date: May 2026
readTime: 4 min
image: images/blog/serverless.jpg
---

Laravel is traditionally deployed on VPS servers (like DigitalOcean or AWS EC2) using tools like Forge or Vapor. But for a simple, fast developer portfolio, I wanted the zero-config scalability of Vercel.

Getting Laravel to run on Vercel's serverless edge network is surprisingly straightforward using the `vercel-php` community runtime, but there are a few major "gotchas" when it comes to caching and file storage.

## The Read-Only Filesystem Trap

Vercel functions are stateless and ephemeral. The `/tmp` directory is the only writable location, and it's wiped constantly. 

If you try to use Laravel's default `file` cache driver, you will quickly realize that your cache disappears every time a new serverless function spins up. This causes erratic behavior where some page loads hit the cache, and others miss it entirely.

### The Solution: Database Caching

To solve this, I moved my cache store directly into my Neon Postgres database. 

By updating `vercel.json` and my `.env` variables to set `CACHE_STORE="database"`, Laravel now persists all cached data (like parsed markdown files for this blog) into the database. No matter which serverless container handles the request, the cache is preserved.

## Handling Frontend Assets

Another quirk of Vercel is that it's designed to serve static assets efficiently, but it doesn't automatically run `npm run build` for Laravel Mix or Vite out of the box unless configured carefully.

For this portfolio, I compile my Tailwind CSS locally and commit the `public/build` directory. This allows Vercel to serve the pre-compiled, highly-optimized CSS straight from its Edge Network without needing a Node.js build step in the deployment pipeline.

Serverless Laravel takes a bit of rewiring, but the result is a lightning-fast, infinitely scalable site with zero monthly server maintenance.
