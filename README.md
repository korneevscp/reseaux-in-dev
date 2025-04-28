
# Fonctionnalité	a faire 

Design sobre gris foncé	

Multi-langues (20 langues) avec lang.php	

Sélecteur de langue dans la navbar	

RGPD conforme (bannière cookies, mentions)	

Stories (publication photo + légende + réponse)	

Posts (texte/photo) + commentaires + likes + réactions multiples

Chat temps réel (WebSocket) + écriture "en train d’écrire"	

Appels vocaux (WebRTC) + sonnerie réaliste	

Bloquer/débloquer utilisateurs	

Notifications live (likes, amis, réponses story...)	

Système d'amis et demandes	

Messages privés et de groupe	

Mode nuit automatique	20h> 6h

Protection CSRF + filtrage upload images	

Admin Panel (ban/supprimer user)	

Responsive (téléphones/tablettes)	

Galerie photos utilisateurs	

Voir qui a vu un post/story ("Vu par 4 personnes")	

Edition/Suppression posts et commentaires	

Nom du site : ...	





# site web

**site web** est une plateforme sociale complète, sobre, sécurisée et conforme RGPD 🇫🇷.  
Inspirée des meilleures fonctionnalités de Facebook, Instagram et Messenger, tout en restant légère et élégante.

---

## ✨ Fonctionnalités principales

- Publier des posts (texte, photo, hashtags)
- Voir et interagir avec le mur d'actualité
- Commenter, liker, modifier, supprimer ses posts
- Système d'amis, demandes d'amis et blocage d'utilisateurs
- Messagerie privée en temps réel + groupes
- Indicateurs de "vu", "en train d’écrire", notifications sonores
- Appels vocaux (WebRTC prêt pour vidéo + appels de groupe)
- Stories temporaires (24h) visibles par tous ou amis uniquement
- Réagir aux posts avec plusieurs émotions 😍 😢 😡 ...
- Galerie photos automatique pour les utilisateurs
- Système d'administration : bannir/supprimer utilisateurs
- Multilingue (20 langues) avec sélecteur dans la navbar
- Mode nuit automatique (selon heure locale)
- Responsive : mobile/tablette/Desktop
- Sécurité renforcée : Anti-CSRF, Anti-XSS, Anti-SQL Injection

---

## 🚀 Technologies utilisées

- **Front-end** : HTML5, CSS3 (Dark Theme), JavaScript
- **Back-end** : PHP 8.x
- **Base de données** : MySQL / MariaDB
- **WebSockets** : pour chat temps réel
- **WebRTC** : pour appels vocaux (et vidéo bientôt)
- **Gestion des fichiers** : Upload sécurisé de PDF, images, vidéos
- **Conformité RGPD** : Protection des données + suppression compte

---

## 📁 Structure du projet

```
korneevscp_web/
├── api/
├── assets/
├── css/
├── includes/
├── js/
├── lang/
├── uploads/
├── home.php
├── profile.php
├── login.php
├── register.php
├── logout.php
├── installer.php
├── mydb.sql
├── README.md
├── INSTALL.md
└── .htaccess
```

---

## 🛠 Instructions rapides

- Dézippez, envoyez sur votre serveur.
- Lancez `installer.php` pour tout configurer automatiquement.
- Connectez-vous avec les identifiants fournis.
- Personnalisez votre site comme vous le souhaitez.

---

## 🔒 Avertissements

- Pensez à **configurer HTTPS** pour une sécurité renforcée.
- Modifiez les identifiants Admin par défaut après installation.
- Assurez-vous d’avoir des permissions correctes sur `uploads/`.

---

# 🚀 site web : Créez votre réseau social privé en toute simplicité.

---

> Développé pour des projets respectueux des libertés individuelles ✊
