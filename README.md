# WebsiteNI Master Theme 

---

## ⚙️ Default Theme Settings

- **Grid Width** → `1740px` max width  
- **Gutters** → `20px` default across all screen sizes  
- **Breakpoints** → Added **xlarge (≥1200px)** and **xxlarge (≥1440px)**  

---

## 🎨 Colours

- Define colour variables in `settings.scss`:
  - `primary`
  - `secondary`
  - `tertiary`
- Default utility classes in `colours.scss`:
  - `.primarybg` → sets background to `get-color(primary)`
  - `.secondarybg` → sets background to `get-color(secondary)`
  - `.twocolour` → linear gradient: **half primary / half white** (template for split backgrounds)

---

## 📐 Spacing

- **Utilities**: `.ptopsml`, `.pbottomxlrg`, `.mtopmed`, etc.    
- **Mobile-only classes**: `.mtopsml-only`, `.mbottomxsml-only` reset at `sm` breakpoint  

---

## 🔘 Buttons

- `.spacingtop` → adds top margin across all screen sizes  
- `.spacingtop-res` → margin increases from mobile → larger screens  
- `.resbutton` → full-width buttons on mobile (`width: 100%`), revert to `auto` on ≥640px (or 1024px if preferred)  

---

## ✍️ Typography

- `.fontcolourwhite` → now applies white text to **all nested elements** (`h1, h2, p, a`, etc.)

---

## 📑 Forms

- New `forms.scss` file added 
- Styled select, inputs, textareas, checkboxes, and dropzones  
- Includes ACF/Formidable form styling support  

---

## 🍪 Navigation & Effects

- **Close button** in `functions.js` updated with `alt` tag for accessibility  
- **Cookie notice** carried over (HTML + SVG styled like Down Developments)  
- **Mobile Nav Fix** (`effects.scss`): prevent scroll when hamburger is active:  
