# WebsiteNI Master Theme Changelog

This file records significant changes made to the WebsiteNI master WordPress starter theme.

The README documents how the current theme works.  
This changelog documents what changed between versions.

---

## V3 — Unreleased

Development started September 2026.

### Build System

- Replaced the legacy Gulp build process with Vite.
- Removed `gulpfile.js`.
- Removed legacy Gulp dependencies from `package.json`.
- Added `vite.config.mjs`.
- Added `postcss.config.mjs`.
- Added `assets/scripts/src/main.js` as the main JavaScript entry point.
- SCSS is now compiled through Vite.
- Foundation is bundled through Vite.
- What Input is bundled through Vite.
- WebsiteNI `functions.js` is bundled into the main JavaScript output.
- Compiled assets are now generated inside:

```text
assets/dist/