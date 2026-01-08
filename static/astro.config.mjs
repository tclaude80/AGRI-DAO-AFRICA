import { defineConfig } from 'astro/config';

// https://astro.build/config
export default defineConfig({
  site: 'https://kftmgreen.cm',
  integrations: [],
  build: {
    assets: 'assets',
    inlineStylesheets: 'auto'
  },
  compressHTML: true,
  vite: {
    build: {
      cssMinify: true,
      minify: 'esbuild'
    }
  }
});
