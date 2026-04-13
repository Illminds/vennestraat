# Vennestraat `wp-content`

This repository contains the WordPress `wp-content` directory for the Vennestraat site.

It is a content-focused repository rather than a full application repository, so WordPress core files and environment-level configuration live outside this directory. In the current local setup, `wp-config.php` sits one level above `wp-content`.

## Repository Scope

The repository currently tracks the full `wp-content` tree, including:

- `themes/` for the active and bundled themes
- `plugins/` for installed WordPress plugins
- `uploads/` for media library content and plugin-generated assets
- `languages/` for WordPress, theme, and plugin translations
- `fonts/`, `gallery/`, `ngg/`, and `litespeed/` for site assets and plugin/runtime data

Because the repository includes generated and uploaded content, commits may contain large binary diffs.

## Notable Contents

- `themes/inspiro/` contains the Inspiro theme present in this workspace
- `themes/twentytwentyfour/` and `themes/twentytwentyfive/` are also included
- `plugins/` includes third-party plugins such as Akismet, LiteSpeed Cache, NextGEN Gallery, Popup Maker, WPForms Lite, and others

## Local Development Context

This repository appears to be used from a local WordPress installation structured like:

```text
app/public/
  wp-config.php
  wp-content/
```

To run the site locally, use the surrounding WordPress environment that owns this `wp-content` directory.

## Working In This Repo

- Keep changes scoped to the specific theme, plugin, or asset being updated
- Be careful when committing `uploads/` or cache-like plugin output, since those changes can be noisy
- If plugin or theme code is vendor-managed, prefer documenting local overrides before editing upstream files directly

## Git Notes

The current git history starts from an initial commit that includes the existing `wp-content` contents. Treat this repository as the source of truth for site-specific content and customization inside `wp-content`.
