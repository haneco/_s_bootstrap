\_s_bootstrap
===

This theme is a starter theme for using Bootstrap based on Underscores. Like Underscores, this theme is not used as a parent theme, but it is assumed to be hacking and used.

Getting Started
---------------

If you want to keep it simple, head over to https://underscores.me and generate your `_s` based theme from there. You just input the name of the theme you want to create, click the "Generate" button, and you get your ready-to-awesomize starter theme.

If you want to set things up manually, download `_s` from GitHub. The first thing you want to do is copy the `_s` directory and change the name to something else (like, say, `megatherium-is-awesome`), and then you'll need to do a five-step find and replace on the name in all the templates.

1. Search for: `'_s_bootstrap'` and replace with: `'megatherium-is-awesome'`
2. Search for: `_s_bootstrap_` and replace with: `megatherium_is_awesome_`
3. Search for: `Text Domain: _s_bootstrap` and replace with: `Text Domain: megatherium-is-awesome` in `src/scss/style.scss`.
4. Search for: <code>&nbsp;_s_bootstrap</code> and replace with: <code>&nbsp;Megatherium_is_Awesome</code>
5. Search for: `_s_bootstrap-` and replace with: `megatherium-is-awesome-`

Then, update the stylesheet header in `src/scss/style.scss`, the links in `footer.php` with your own information and rename `_s_bootstrap.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme.

webpack
-------

For watch SCSS and JS, run `npm run watch`.

For production, run `npm run build`.