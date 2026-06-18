# tjdomask23.github.io

My personal portfolio. Hand-built static site — no framework, no template,
no build step. Just HTML, one shared CSS file, and a little vanilla JS.

## Structure

```
index.html          home / landing
about.html          longer bio
experience.html     work history + résumé download
education.html      degree, certs, skills
projects.html       FORMA, the TTRPG system, Tixplorer, this site
testimonials.html   (collecting these)
contact.html        contact info + message form
404.html            custom not-found page
assets/
  style.css         all the styling, design tokens in :root
  site.js           nav, scroll reveals, footer year
  Thomas_Domask_Resume.pdf
```

## One setup step: the contact form

GitHub Pages serves static files only — it can't run PHP — so the contact
form uses [Web3Forms](https://web3forms.com) instead of a backend script.

To turn it on:

1. Go to https://web3forms.com, enter my email, and copy the Access Key they send.
2. Open `contact.html`, find `PASTE_YOUR_WEB3FORMS_ACCESS_KEY_HERE`, and paste the key in.

Until then the form politely tells visitors to email directly. The `mailto:`
link always works regardless.

## Deploying

Push to the `main` branch of the `tjdomask23.github.io` repo. GitHub Pages
serves it automatically at https://tjdomask23.github.io.

## Notes to self

- Design tokens all live at the top of `style.css` (`:root`). Change a color
  there, it changes everywhere.
- The hero photo is `thomas.jpg`, cropped via `object-position` in the
  `.portrait-img` rule. To re-aim the crop, tweak those two percentages.
- Fill in real testimonials in `testimonials.html` as they come in — the
  template block is set up to copy.
