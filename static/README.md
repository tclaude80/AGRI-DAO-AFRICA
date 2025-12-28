# KFTM Green - Site Web Statique

Site web vitrine pour **KFTM Green SARL**, entreprise agro-industrielle camerounaise spécialisée dans la transformation de la banane plantain.

## 🚀 Démarrage Rapide

```bash
# Installation des dépendances
npm install

# Lancement du serveur de développement
npm run dev

# Construction pour production
npm run build
```

Le site sera accessible sur `http://localhost:4321`

## 📁 Structure du Projet

```
static/
├── public/
│   ├── images/           # Images du site (à ajouter)
│   ├── favicon.svg       # Favicon SVG
│   ├── robots.txt        # Fichier robots pour SEO
│   └── site.webmanifest  # Manifest PWA
├── src/
│   ├── components/
│   │   ├── Header.astro  # En-tête avec navigation
│   │   └── Footer.astro  # Pied de page
│   ├── layouts/
│   │   └── BaseLayout.astro  # Layout principal
│   ├── pages/
│   │   ├── index.astro           # Page d'accueil
│   │   ├── a-propos.astro        # À propos
│   │   ├── produits.astro        # Nos produits
│   │   ├── contact.astro         # Contact
│   │   ├── process-qualite.astro # Process & Qualité
│   │   ├── durabilite.astro      # Durabilité
│   │   ├── tracabilite.astro     # Traçabilité
│   │   ├── filiere.astro         # Filière
│   │   ├── export.astro          # Export
│   │   ├── bourse-plantain.astro # Bourse du Plantain
│   │   ├── mentions-legales.astro        # Mentions légales
│   │   └── politique-confidentialite.astro # Politique de confidentialité
│   └── styles/
│       └── global.css    # Styles globaux
├── astro.config.mjs      # Configuration Astro
├── package.json          # Dépendances
└── tsconfig.json         # Configuration TypeScript
```

## 🎨 Design System

### Couleurs

| Variable | Valeur | Usage |
|----------|--------|-------|
| `--color-primary` | `#4CAF50` | Vert principal |
| `--color-primary-dark` | `#388E3C` | Vert foncé |
| `--color-secondary` | `#8BC34A` | Vert clair |
| `--color-accent` | `#FFC107` | Or/Jaune accent |

### Typographies

- **Titres** : Montserrat (700, 800)
- **Corps** : Poppins (400, 500, 600)

### Points de rupture

- Mobile : < 768px
- Tablette : 768px - 991px
- Desktop : ≥ 992px
- Large : ≥ 1200px

## 📝 Modification du Contenu

### Textes

Tous les textes sont dans les fichiers `.astro` correspondants dans `src/pages/`. Modifiez directement le contenu HTML.

### Images

1. Ajoutez vos images dans `public/images/`
2. Référencez-les avec `/images/nom-image.jpg`

### Styles

Les styles globaux sont dans `src/styles/global.css`. Chaque composant peut avoir ses propres styles dans une balise `<style>`.

## 🔧 Scripts Disponibles

| Commande | Description |
|----------|-------------|
| `npm run dev` | Serveur de développement avec hot-reload |
| `npm run build` | Build de production dans `dist/` |
| `npm run preview` | Prévisualisation du build |

## 📦 Technologies

- **[Astro](https://astro.build/)** - Framework de génération statique
- **[AOS](https://michalsnik.github.io/aos/)** - Animations au scroll
- **CSS Custom Properties** - Design system
- **Google Fonts** - Poppins & Montserrat

## ✅ SEO & Performance

- Balises meta optimisées
- Open Graph pour réseaux sociaux
- Schema.org (Organization)
- Sitemap XML automatique
- Images lazy-loading
- CSS critique inline

## 📱 Responsive

Le site est entièrement responsive avec une approche mobile-first.

## ♿ Accessibilité

- Skip links
- Labels ARIA
- Focus states visibles
- Contraste suffisant
- Navigation clavier

## 📄 Licence

© 2024 KFTM Green SARL. Tous droits réservés.

---

**Tagline** : *Healthy Living, Healthy Farming*
