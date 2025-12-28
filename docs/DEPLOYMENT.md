# Guide de Déploiement - KFTM Green

Ce document décrit les procédures de déploiement pour le site KFTM Green.

## Scénario 1 : Site Statique (Apache/Nginx)

### Prérequis

- Serveur avec Apache 2.4+ ou Nginx 1.18+
- Accès SSH ou FTP
- Certificat SSL (Let's Encrypt recommandé)

### Étapes de Déploiement

#### 1. Build du site

```bash
cd static
npm install
npm run build
```

Le dossier `dist/` contient les fichiers à déployer.

#### 2. Configuration Apache

Créez un VirtualHost :

```apache
<VirtualHost *:443>
    ServerName kftmgreen.cm
    ServerAlias www.kftmgreen.cm
    DocumentRoot /var/www/kftmgreen/dist

    SSLEngine on
    SSLCertificateFile /etc/letsencrypt/live/kftmgreen.cm/fullchain.pem
    SSLCertificateKeyFile /etc/letsencrypt/live/kftmgreen.cm/privkey.pem

    <Directory /var/www/kftmgreen/dist>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    # Compression Gzip
    <IfModule mod_deflate.c>
        AddOutputFilterByType DEFLATE text/html text/css application/javascript
    </IfModule>

    # Cache des assets
    <IfModule mod_expires.c>
        ExpiresActive On
        ExpiresByType image/jpg "access plus 1 year"
        ExpiresByType image/jpeg "access plus 1 year"
        ExpiresByType image/png "access plus 1 year"
        ExpiresByType image/webp "access plus 1 year"
        ExpiresByType text/css "access plus 1 month"
        ExpiresByType application/javascript "access plus 1 month"
    </IfModule>

    # Redirection HTTP vers HTTPS
    ErrorDocument 404 /404.html
</VirtualHost>

<VirtualHost *:80>
    ServerName kftmgreen.cm
    ServerAlias www.kftmgreen.cm
    Redirect permanent / https://kftmgreen.cm/
</VirtualHost>
```

#### 3. Configuration Nginx

```nginx
server {
    listen 443 ssl http2;
    server_name kftmgreen.cm www.kftmgreen.cm;
    root /var/www/kftmgreen/dist;
    index index.html;

    ssl_certificate /etc/letsencrypt/live/kftmgreen.cm/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/kftmgreen.cm/privkey.pem;

    # Compression Gzip
    gzip on;
    gzip_types text/plain text/css application/json application/javascript text/xml;

    # Cache des assets
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|webp|svg)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }

    # Pages HTML
    location / {
        try_files $uri $uri/ $uri.html =404;
    }

    # Page 404
    error_page 404 /404.html;
}

server {
    listen 80;
    server_name kftmgreen.cm www.kftmgreen.cm;
    return 301 https://kftmgreen.cm$request_uri;
}
```

#### 4. Upload des fichiers

```bash
# Via rsync (recommandé)
rsync -avz --delete dist/ user@server:/var/www/kftmgreen/dist/

# Via SCP
scp -r dist/* user@server:/var/www/kftmgreen/dist/
```

#### 5. Vérifications post-déploiement

- [ ] Site accessible en HTTPS
- [ ] Redirection HTTP → HTTPS fonctionnelle
- [ ] Toutes les pages chargent correctement
- [ ] Images affichées
- [ ] Formulaires fonctionnels
- [ ] Sitemap accessible : `/sitemap-index.xml`

---

## Scénario 2 : WordPress

### Prérequis

- Serveur avec PHP 8.0+
- MySQL 5.7+ ou MariaDB 10.3+
- WordPress 6.0+
- Accès admin WordPress

### Installation du Thème

#### 1. Préparation du thème

```bash
cd wordpress
zip -r kftm-green-theme.zip kftm-green-theme/
```

#### 2. Upload via Admin WordPress

1. Connectez-vous à `/wp-admin`
2. Allez dans **Apparence > Thèmes**
3. Cliquez **Ajouter > Téléverser un thème**
4. Sélectionnez `kftm-green-theme.zip`
5. Cliquez **Installer maintenant**
6. **Activer** le thème

#### 3. Configuration initiale

##### Personnalisation

1. Allez dans **Apparence > Personnaliser**
2. Section **KFTM Green - Coordonnées** :
   - Téléphone : `+237 654 39 74 50`
   - Email : `infos@kftmgreen.cm`
   - Adresse : `Kribi, Région du Sud, Cameroun`
3. Section **KFTM Green - Réseaux sociaux** :
   - Configurez les URLs des réseaux sociaux
   - WhatsApp : `237654397450`

##### Menus

1. Allez dans **Apparence > Menus**
2. Créez un menu "Navigation principale"
3. Ajoutez les pages :
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
4. Assignez à l'emplacement "Menu principal"

##### Page d'accueil

1. Créez une page "Accueil"
2. Dans **Réglages > Lecture** :
   - Cochez "Une page statique"
   - Page d'accueil : Accueil

##### Widgets

Allez dans **Apparence > Widgets** et configurez :
- Footer 1 : À propos (texte)
- Footer 2 : Liens rapides (menu)
- Footer 3 : Contact (liste personnalisée)

#### 4. Création des produits

1. Allez dans **Produits > Ajouter**
2. Pour chaque produit :
   - Titre : Nom du produit
   - Contenu : Description détaillée
   - Image à la une : Photo du produit
   - Méta-données :
     - Format : ex. "Sachet plastique alimentaire"
     - Poids : ex. "1 kg"
     - Sans gluten : Oui/Non
     - Caractéristiques : Liste séparée par virgules

**Produits à créer :**

| Produit | Format | Poids | Sans gluten |
|---------|--------|-------|-------------|
| Farine de Banane-Plantain "Mère Anto" | Sachet plastique alimentaire | 1 kg | Oui |
| Croquant de Plantain Nature | Sachet plastique alimentaire | 500 g | Oui |
| Croquant de Plantain Choco | Sachet plastique alimentaire | 500 g | Oui |

### Configuration Serveur WordPress

#### PHP (php.ini)

```ini
upload_max_filesize = 64M
post_max_size = 64M
max_execution_time = 300
memory_limit = 256M
```

#### Plugins Recommandés

- **Yoast SEO** - Optimisation SEO
- **Contact Form 7** - Formulaires de contact
- **WP Super Cache** - Cache des pages
- **Wordfence** - Sécurité
- **UpdraftPlus** - Sauvegardes

### Maintenance

#### Sauvegardes

Programmez des sauvegardes automatiques :
- Base de données : quotidienne
- Fichiers : hebdomadaire

#### Mises à jour

- WordPress core : dès que disponible
- Thème : tester en staging d'abord
- Plugins : vérifier la compatibilité

---

## Checklist Pré-Déploiement

### Contenu

- [ ] Tous les textes relus et validés
- [ ] Mentions légales complètes
- [ ] Politique de confidentialité à jour
- [ ] Coordonnées vérifiées

### Technique

- [ ] Formulaires testés
- [ ] Liens internes vérifiés
- [ ] Images optimisées (WebP recommandé)
- [ ] Favicons en place

### SEO

- [ ] Balises title uniques par page
- [ ] Meta descriptions renseignées
- [ ] Sitemap généré
- [ ] robots.txt configuré

### Performance

- [ ] Compression Gzip activée
- [ ] Cache navigateur configuré
- [ ] Images lazy-loading
- [ ] CSS/JS minifiés

### Sécurité

- [ ] HTTPS forcé
- [ ] Headers de sécurité (CSP, HSTS)
- [ ] Formulaires avec honeypot/captcha

---

## Support

Pour toute question technique :
- Email : infos@kftmgreen.cm
- Documentation : Voir `/docs/CONTENT_GUIDE.md`
