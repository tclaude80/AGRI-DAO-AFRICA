# KFTM Green - Site Web & Thème WordPress

Site web complet pour **KFTM Green SARL**, entreprise agro-industrielle camerounaise spécialisée dans la transformation de la banane plantain.

> 🌿 *Healthy Living, Healthy Farming*

## À Propos du Projet

KFTM Green SARL, fondée en 2019 à Kribi par M. AWONO Landry Gaëtan et Dr. Claude TCHONKO, valorise la banane plantain camerounaise en produits alimentaires de qualité.

**Produits phares :**
- Farine de Banane-Plantain "Mère Anto" (1 kg)
- Croquant de Plantain Nature (500 g)
- Croquant de Plantain Choco (500 g)

## Structure du Projet

```
AGRI-DAO-AFRICA/
├── static/                    # Site statique Astro
│   ├── src/
│   │   ├── components/        # Composants réutilisables
│   │   ├── layouts/           # Layouts de base
│   │   ├── pages/             # Pages du site (10+)
│   │   └── styles/            # Styles globaux
│   ├── public/                # Assets statiques
│   ├── package.json
│   └── README.md
├── wordpress/
│   └── kftm-green-theme/      # Thème WordPress personnalisé
│       ├── assets/            # CSS et JS
│       ├── style.css          # Styles du thème
│       ├── functions.php      # Fonctionnalités
│       └── *.php              # Templates
└── docs/
    ├── DEPLOYMENT.md          # Guide de déploiement
    ├── CONTENT_GUIDE.md       # Guide de contenu
    └── QA_CHECKLIST.md        # Checklist qualité
```

## Démarrage Rapide (Site Statique)

```bash
# 1. Aller dans le dossier static
cd static

# 2. Installer les dépendances
npm install

# 3. Lancer le serveur de développement
npm run dev
```

Le site sera accessible sur `http://localhost:4321`

### Build Production

```bash
npm run build
```

Les fichiers de production seront dans `static/dist/`

## Livrables

### LIVRABLE 1 - Site Statique (Astro)

- 12 pages complètes
- Design responsive (mobile-first)
- Animations au scroll (AOS)
- SEO optimisé (meta, Open Graph, Schema.org)
- Formulaire de contact avec honeypot
- Sitemap XML automatique

**Pages incluses :**
- Accueil
- À propos
- Produits
- Process & Qualité
- Durabilité
- Traçabilité
- Filière
- Export
- Bourse du Plantain
- Contact
- Mentions légales
- Politique de confidentialité

### LIVRABLE 2 - Thème WordPress

- Thème complet et fonctionnel
- Custom Post Type "Produits"
- Options de personnalisation (Customizer)
- Zones de widgets
- Support des menus
- Même design que le site statique

### LIVRABLE 3 - Documentation

- README.md (ce fichier)
- docs/DEPLOYMENT.md - Procédures de déploiement
- docs/CONTENT_GUIDE.md - Guide de modification du contenu
- docs/QA_CHECKLIST.md - Checklist d'assurance qualité

## Design System

### Couleurs

| Couleur | Hex | Usage |
|---------|-----|-------|
| Vert principal | `#4CAF50` | Marque, CTA primaires |
| Vert foncé | `#388E3C` | Hover, accents |
| Vert clair | `#8BC34A` | Backgrounds |
| Or/Accent | `#FFC107` | Highlights, badges |

### Typographies

- **Titres** : Montserrat (700, 800)
- **Corps** : Poppins (400, 500, 600)

## Responsive

Le site est entièrement responsive avec trois points de rupture :
- Mobile : < 768px
- Tablette : 768px - 991px
- Desktop : ≥ 992px

## Contact

**KFTM Green SARL**
- Kribi, Région du Sud, Cameroun
- +237 654 39 74 50
- infos@kftmgreen.cm

## Licence

© 2024 KFTM Green SARL. Tous droits réservés.

---

Développé pour l'agro-industrie camerounaise
