# Guide de Contenu - KFTM Green

Ce guide explique comment modifier le contenu du site KFTM Green.

## Site Statique (Astro)

### Structure des Pages

Chaque page est un fichier `.astro` dans `static/src/pages/`.

```
src/pages/
├── index.astro           # Page d'accueil
├── a-propos.astro        # À propos
├── produits.astro        # Catalogue produits
├── contact.astro         # Formulaire de contact
└── ...
```

### Modifier du Texte

1. Ouvrez le fichier `.astro` correspondant
2. Trouvez le texte dans la partie HTML (après le `---`)
3. Modifiez directement

**Exemple** - Changer le titre de la page d'accueil :

```astro
<!-- Dans index.astro -->
<h1>
    Transformons ensemble<br>
    <span class="text-gradient">la banane plantain</span>
</h1>
```

Devient :

```astro
<h1>
    Votre nouveau titre<br>
    <span class="text-gradient">ici</span>
</h1>
```

### Ajouter une Image

1. Placez l'image dans `static/public/images/`
2. Référencez avec le chemin absolu

```html
<img src="/images/mon-image.jpg" alt="Description de l'image">
```

**Formats recommandés :**
- Photos : JPEG ou WebP
- Logos/icônes : SVG ou PNG
- Tailles max : 1920px de large, < 500KB

### Modifier les Métadonnées SEO

Dans chaque page, modifiez les props du `BaseLayout` :

```astro
<BaseLayout
    title="Nouveau Titre - KFTM Green"
    description="Nouvelle description pour les moteurs de recherche"
>
```

### Ajouter une Nouvelle Page

1. Créez un fichier dans `src/pages/`, ex : `nouvelle-page.astro`
2. Utilisez ce template :

```astro
---
import BaseLayout from '../layouts/BaseLayout.astro';
---

<BaseLayout
    title="Ma Nouvelle Page - KFTM Green"
    description="Description de la page"
>
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Titre de la Page</h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <!-- Votre contenu ici -->
        </div>
    </section>
</BaseLayout>
```

3. Ajoutez le lien dans `Header.astro` si nécessaire

### Modifier le Menu

Ouvrez `src/components/Header.astro` et modifiez la navigation :

```html
<nav class="nav-menu">
    <a href="/" class="nav-link">Accueil</a>
    <a href="/nouvelle-page" class="nav-link">Nouvelle Page</a>
    <!-- Ajoutez vos liens ici -->
</nav>
```

### Modifier les Coordonnées

Les coordonnées apparaissent dans :
- `Header.astro` (téléphone)
- `Footer.astro` (tous les contacts)
- Pages de contact

Cherchez et remplacez :
- Téléphone : `+237 654 39 74 50`
- Email : `infos@kftmgreen.cm`
- Adresse : `Kribi, Région du Sud, Cameroun`

---

## WordPress

### Ajouter/Modifier un Produit

1. Allez dans **Produits > Tous les produits**
2. Cliquez sur un produit existant ou **Ajouter**

**Champs à remplir :**

| Champ | Description | Exemple |
|-------|-------------|---------|
| Titre | Nom du produit | Farine de Banane-Plantain "Mère Anto" |
| Contenu | Description longue | Texte riche avec mise en forme |
| Extrait | Description courte | 2-3 phrases pour les listings |
| Image à la une | Photo principale | 800x600px minimum |
| Format | Type d'emballage | Sachet plastique alimentaire |
| Poids | Poids net | 1 kg |
| Sans gluten | Case à cocher | ✓ |
| Caractéristiques | Liste | Sans conservateurs, 100% naturel |

### Modifier les Pages

1. Allez dans **Pages > Toutes les pages**
2. Cliquez sur la page à modifier
3. Utilisez l'éditeur Gutenberg

**Blocs utiles :**
- Paragraphe : texte simple
- Titre : H2, H3, H4
- Image : photos avec légende
- Colonnes : mise en page multi-colonnes
- Bouton : appels à l'action

### Modifier les Coordonnées

1. Allez dans **Apparence > Personnaliser**
2. Section **KFTM Green - Coordonnées**
3. Modifiez les champs
4. Cliquez **Publier**

### Modifier les Réseaux Sociaux

1. Allez dans **Apparence > Personnaliser**
2. Section **KFTM Green - Réseaux sociaux**
3. Entrez les URLs complètes
4. Cliquez **Publier**

### Ajouter un Article de Blog

1. Allez dans **Articles > Ajouter**
2. Remplissez :
   - Titre
   - Contenu
   - Catégorie
   - Image à la une
   - Extrait
3. Cliquez **Publier**

### Modifier le Menu

1. Allez dans **Apparence > Menus**
2. Sélectionnez le menu à modifier
3. Glissez-déposez pour réorganiser
4. Cliquez **Enregistrer le menu**

### Modifier le Footer

Les widgets du footer se configurent dans :
**Apparence > Widgets**

Zones disponibles :
- Footer 1 : Première colonne
- Footer 2 : Deuxième colonne
- Footer 3 : Troisième colonne

---

## Images - Spécifications

### Tailles Recommandées

| Usage | Dimensions | Format | Taille max |
|-------|------------|--------|------------|
| Hero | 1920 x 1080 px | JPEG/WebP | 300 KB |
| Produit | 800 x 600 px | JPEG/WebP | 150 KB |
| Thumbnail | 400 x 300 px | JPEG/WebP | 50 KB |
| Logo | 200 x 60 px | SVG/PNG | 20 KB |
| Icône | 64 x 64 px | SVG/PNG | 5 KB |

### Optimisation

Avant upload, optimisez avec :
- [TinyPNG](https://tinypng.com/) - compression PNG/JPEG
- [Squoosh](https://squoosh.app/) - conversion WebP

### Nommage des Fichiers

Utilisez des noms descriptifs en minuscules :
- ✅ `farine-mere-anto-1kg.jpg`
- ❌ `IMG_20240115_143022.jpg`

---

## Bonnes Pratiques

### Textes

- Phrases courtes (< 25 mots)
- Paragraphes courts (3-4 lignes max)
- Utilisez des listes à puces
- Évitez le jargon technique

### SEO

- Chaque page a un titre unique
- Descriptions de 150-160 caractères
- Utilisez les mots-clés naturellement
- Ajoutez des alt-texts aux images

### Accessibilité

- Toujours renseigner l'attribut `alt` des images
- Utiliser des liens descriptifs ("En savoir plus sur nos produits" plutôt que "Cliquez ici")
- Maintenir un contraste suffisant

---

## FAQ Contenu

### Comment changer le logo ?

**Astro :** Remplacez `/public/images/logo.svg` ou modifiez `Header.astro`

**WordPress :** Apparence > Personnaliser > Identité du site > Logo

### Comment ajouter une nouvelle catégorie de produits ?

**WordPress uniquement :**
1. Allez dans **Produits > Catégories**
2. Ajoutez une nouvelle catégorie
3. Assignez des produits à cette catégorie

### Comment modifier les couleurs ?

**Astro :** Modifiez les variables CSS dans `src/styles/global.css` :

```css
:root {
    --color-primary: #4CAF50;      /* Vert principal */
    --color-primary-dark: #388E3C; /* Vert foncé */
    --color-secondary: #8BC34A;    /* Vert clair */
    --color-accent: #FFC107;       /* Or/Jaune */
}
```

**WordPress :** Modifiez les mêmes variables dans `style.css` du thème.

### Le formulaire de contact ne fonctionne pas ?

**Astro :** Le formulaire nécessite un backend (Formspree, Netlify Forms, ou votre propre serveur).

**WordPress :** Installez Contact Form 7 et configurez les destinataires.

---

## Support

Pour toute question :
- Email : infos@kftmgreen.cm
- Documentation technique : `/docs/DEPLOYMENT.md`
