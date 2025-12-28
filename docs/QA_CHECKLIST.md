# Checklist QA - KFTM Green

Utilisez cette checklist avant chaque mise en production.

---

## 📱 Responsive Design

### Mobile (< 768px)

- [ ] Header : menu hamburger fonctionnel
- [ ] Navigation mobile : ouverture/fermeture fluide
- [ ] Hero : texte lisible, CTA cliquables
- [ ] Grilles produits : 1 colonne
- [ ] Formulaires : champs pleine largeur
- [ ] Footer : colonnes empilées
- [ ] Pas de scroll horizontal
- [ ] Touch targets ≥ 44px

### Tablette (768px - 991px)

- [ ] Grilles : 2 colonnes où approprié
- [ ] Images : pas de débordement
- [ ] Espacement cohérent

### Desktop (≥ 992px)

- [ ] Header : navigation complète visible
- [ ] Grilles : 3-4 colonnes
- [ ] Largeur max container respectée (1200px)
- [ ] Hover states fonctionnels

---

## 📝 Formulaires

### Formulaire de Contact

- [ ] Tous les champs obligatoires marqués (*)
- [ ] Validation HTML5 (required, type="email")
- [ ] Messages d'erreur clairs
- [ ] Honeypot présent (champ caché anti-spam)
- [ ] Confirmation après envoi
- [ ] Email reçu correctement

### Champs à Tester

| Champ | Validation |
|-------|------------|
| Nom | Required, min 2 caractères |
| Email | Required, format email valide |
| Sujet | Select avec options |
| Message | Required, min 10 caractères |
| Honeypot | Doit rester vide |

---

## 🔗 Liens

### Navigation

- [ ] Tous les liens du menu fonctionnels
- [ ] Liens actifs mis en évidence
- [ ] Smooth scroll vers ancres (#)
- [ ] Logo redirige vers accueil

### Liens Internes

- [ ] Aucun lien mort (404)
- [ ] Liens vers toutes les pages fonctionnels
- [ ] Breadcrumbs corrects (si présents)

### Liens Externes

- [ ] Réseaux sociaux : ouvrent dans nouvel onglet
- [ ] WhatsApp : lien `https://wa.me/` fonctionnel
- [ ] Email : lien `mailto:` fonctionnel
- [ ] Téléphone : lien `tel:` fonctionnel

---

## ⚡ Performance

### Métriques Cibles

| Métrique | Cible | Outil |
|----------|-------|-------|
| LCP (Largest Contentful Paint) | < 2.5s | Lighthouse |
| FID (First Input Delay) | < 100ms | Lighthouse |
| CLS (Cumulative Layout Shift) | < 0.1 | Lighthouse |
| Score Performance | > 90 | Lighthouse |

### Vérifications

- [ ] Images optimisées (< 500KB)
- [ ] Lazy loading activé
- [ ] CSS minifié
- [ ] JavaScript minifié
- [ ] Compression Gzip/Brotli
- [ ] Cache navigateur configuré
- [ ] Pas de render-blocking resources critiques

### Outils de Test

- [Google PageSpeed Insights](https://pagespeed.web.dev/)
- [GTmetrix](https://gtmetrix.com/)
- Chrome DevTools > Lighthouse

---

## ♿ Accessibilité (WCAG 2.1)

### Navigation

- [ ] Skip link présent
- [ ] Navigation clavier complète (Tab)
- [ ] Focus visible sur tous les éléments interactifs
- [ ] Ordre de tabulation logique

### Images

- [ ] Toutes les images ont un alt=""
- [ ] Alt descriptif pour images informatives
- [ ] Alt vide pour images décoratives

### Formulaires

- [ ] Labels associés à chaque input
- [ ] Messages d'erreur liés (aria-describedby)
- [ ] Focus automatique sur erreur

### Couleurs & Contraste

- [ ] Contraste texte/fond ≥ 4.5:1 (AA)
- [ ] Contraste grands textes ≥ 3:1
- [ ] Information pas transmise par couleur seule

### ARIA

- [ ] aria-label sur liens icônes
- [ ] aria-expanded sur menus dépliants
- [ ] aria-hidden sur éléments décoratifs

### Outils de Test

- [WAVE](https://wave.webaim.org/)
- [axe DevTools](https://www.deque.com/axe/)
- Chrome DevTools > Lighthouse > Accessibility

---

## 🔍 SEO

### Balises Meta

- [ ] `<title>` unique par page (50-60 caractères)
- [ ] `<meta description>` unique (150-160 caractères)
- [ ] `<meta viewport>` présent
- [ ] `<html lang="fr">` défini

### Open Graph

- [ ] og:title
- [ ] og:description
- [ ] og:image (1200x630px)
- [ ] og:url

### Structure

- [ ] Un seul `<h1>` par page
- [ ] Hiérarchie H1 > H2 > H3 respectée
- [ ] URLs propres et descriptives

### Fichiers

- [ ] robots.txt accessible
- [ ] sitemap.xml généré
- [ ] favicon.ico présent

### Outils de Test

- [Rich Results Test](https://search.google.com/test/rich-results)
- [OpenGraph Debugger](https://developers.facebook.com/tools/debug/)

---

## 🌐 Navigateurs

### Desktop

- [ ] Chrome (dernière version)
- [ ] Firefox (dernière version)
- [ ] Safari (dernière version)
- [ ] Edge (dernière version)

### Mobile

- [ ] Chrome Android
- [ ] Safari iOS
- [ ] Samsung Internet

---

## 🔒 Sécurité

### HTTPS

- [ ] Certificat SSL valide
- [ ] Redirection HTTP → HTTPS
- [ ] Pas de mixed content

### Headers

- [ ] X-Content-Type-Options: nosniff
- [ ] X-Frame-Options: DENY
- [ ] Content-Security-Policy (CSP)

### Formulaires

- [ ] Protection CSRF (si applicable)
- [ ] Honeypot anti-spam
- [ ] Validation côté serveur

---

## 📊 Checklist par Page

### Page d'Accueil

- [ ] Hero : image, titre, CTA
- [ ] Section produits : 3 produits affichés
- [ ] Section à propos : contenu, image
- [ ] Section CTA : bouton fonctionnel
- [ ] Animations AOS fluides

### Page Produits

- [ ] Tous les produits affichés
- [ ] Images de qualité
- [ ] Badges (Sans Gluten) corrects
- [ ] Liens "Découvrir" fonctionnels

### Page Contact

- [ ] Formulaire complet
- [ ] Coordonnées visibles
- [ ] FAQ présente
- [ ] Carte (si intégrée)

### Pages Légales

- [ ] Mentions légales complètes
- [ ] Politique de confidentialité
- [ ] Informations RGPD

---

## ✅ Validation Finale

### Avant Go-Live

- [ ] Contenu relu et validé par le client
- [ ] Toutes les images finales uploadées
- [ ] Formulaires testés avec vraies données
- [ ] Analytics configuré (si applicable)
- [ ] Backup créé

### Après Go-Live

- [ ] Site accessible publiquement
- [ ] HTTPS fonctionnel
- [ ] Formulaires envoient les emails
- [ ] Aucune erreur console JS
- [ ] Submit sitemap à Google Search Console

---

## 📝 Notes de Test

| Date | Testeur | Environnement | Résultats |
|------|---------|---------------|-----------|
| | | | |
| | | | |
| | | | |

---

## Contact QA

Pour signaler un bug ou une amélioration :
- Email : infos@kftmgreen.cm
- Créez un ticket détaillé avec :
  - Page concernée
  - Navigateur/appareil
  - Étapes de reproduction
  - Capture d'écran
