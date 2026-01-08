#!/bin/bash
# ============================================
# Script de déploiement SFTP vers OVH
# KFTM Green - Site Web
# ============================================

# Configuration
SFTP_HOST="ssh.cluster042.hosting.ovh.net"
SFTP_PORT="22"
SFTP_USER="kftmgreedt"
REMOTE_PATH="/home/kftmgreedt/www"
LOCAL_PATH="$(dirname "$0")/static/dist"

# Couleurs pour l'affichage
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo "============================================"
echo "  KFTM Green - Déploiement OVH"
echo "============================================"
echo ""

# Vérifier que le dossier dist existe
if [ ! -d "$LOCAL_PATH" ]; then
    echo -e "${RED}Erreur: Le dossier $LOCAL_PATH n'existe pas.${NC}"
    echo "Exécutez d'abord: cd static && npm run build"
    exit 1
fi

# Compter les fichiers à uploader
FILE_COUNT=$(find "$LOCAL_PATH" -type f | wc -l)
echo -e "${YELLOW}Fichiers à déployer: $FILE_COUNT${NC}"
echo ""

# Afficher les informations de connexion
echo "Configuration:"
echo "  Host:   $SFTP_HOST"
echo "  Port:   $SFTP_PORT"
echo "  User:   $SFTP_USER"
echo "  Remote: $REMOTE_PATH"
echo "  Local:  $LOCAL_PATH"
echo ""

# Demander confirmation
read -p "Continuer le déploiement? (o/n) " -n 1 -r
echo ""
if [[ ! $REPLY =~ ^[Oo]$ ]]; then
    echo "Déploiement annulé."
    exit 0
fi

echo ""
echo -e "${YELLOW}Connexion SFTP en cours...${NC}"

# Méthode 1: Utiliser lftp (recommandé)
if command -v lftp &> /dev/null; then
    echo "Utilisation de lftp..."
    lftp -u "$SFTP_USER" -p "$SFTP_PORT" "sftp://$SFTP_HOST" << EOF
set sftp:auto-confirm yes
set ssl:verify-certificate no
cd $REMOTE_PATH
lcd $LOCAL_PATH
mirror --reverse --delete --verbose --include-glob=.htaccess --include-glob=.htpasswd .
bye
EOF

    if [ $? -eq 0 ]; then
        echo ""
        echo -e "${GREEN}Déploiement réussi!${NC}"
    else
        echo ""
        echo -e "${RED}Erreur lors du déploiement.${NC}"
        exit 1
    fi

# Méthode 2: Utiliser sftp avec batch file
elif command -v sftp &> /dev/null; then
    echo "Utilisation de sftp..."

    # Créer un fichier batch temporaire
    BATCH_FILE=$(mktemp)

    # Générer les commandes sftp
    echo "cd $REMOTE_PATH" > "$BATCH_FILE"

    # Uploader tous les fichiers
    find "$LOCAL_PATH" -type f | while read file; do
        # Calculer le chemin relatif
        REL_PATH="${file#$LOCAL_PATH/}"
        DIR_PATH=$(dirname "$REL_PATH")

        # Créer le répertoire distant si nécessaire
        if [ "$DIR_PATH" != "." ]; then
            echo "-mkdir $DIR_PATH" >> "$BATCH_FILE"
        fi

        # Ajouter la commande put
        echo "put $file $REL_PATH" >> "$BATCH_FILE"
    done

    echo "bye" >> "$BATCH_FILE"

    # Exécuter sftp
    sftp -P "$SFTP_PORT" -b "$BATCH_FILE" "$SFTP_USER@$SFTP_HOST"

    # Nettoyer
    rm -f "$BATCH_FILE"

    if [ $? -eq 0 ]; then
        echo ""
        echo -e "${GREEN}Déploiement réussi!${NC}"
    else
        echo ""
        echo -e "${RED}Erreur lors du déploiement.${NC}"
        exit 1
    fi

# Méthode 3: Utiliser rsync over SSH
elif command -v rsync &> /dev/null; then
    echo "Utilisation de rsync..."
    rsync -avz --progress --delete \
        -e "ssh -p $SFTP_PORT" \
        "$LOCAL_PATH/" \
        "$SFTP_USER@$SFTP_HOST:$REMOTE_PATH/"

    if [ $? -eq 0 ]; then
        echo ""
        echo -e "${GREEN}Déploiement réussi!${NC}"
    else
        echo ""
        echo -e "${RED}Erreur lors du déploiement.${NC}"
        exit 1
    fi

else
    echo -e "${RED}Erreur: Aucun outil SFTP disponible (lftp, sftp, rsync).${NC}"
    echo "Installez lftp avec: apt-get install lftp"
    exit 1
fi

echo ""
echo "============================================"
echo "  Vérification post-déploiement"
echo "============================================"
echo ""
echo "Testez le site sur: https://kftmgreen.cm"
echo ""
echo "Checklist:"
echo "  [ ] Site accessible"
echo "  [ ] HTTPS fonctionnel"
echo "  [ ] Toutes les pages chargent"
echo "  [ ] Fichiers .htaccess actif"
echo ""
