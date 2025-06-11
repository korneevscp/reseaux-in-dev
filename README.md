
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

Nom du site : NEXORA	





# NEXORA

Nexora est une plateforme sociale complète, sobre, sécurisée et conforme RGPD 🇫🇷.  
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
│
├── api/                <-- tout ce qui est appels AJAX/API REST
│
├── assets/             <-- images, sons, icônes, vidéos
│   ├── images/
│   ├── sounds/
│   ├── uploads/
│   └── icons/
│
├── css/                <-- tes fichiers de style
│   ├── main.css
│   ├── darkmode.css
│   └── animations.css
│
├── js/                 <-- tes scripts JavaScript
│   ├── script.js
│   ├── chat.js
│   ├── call.js (WebRTC)
│   └── stories.js
│
├── includes/           <-- toutes les fonctions et connexions serveur
│   ├── db.php
│   ├── functions.php
│   ├── auth.php
│   └── notifications.php
│
├── languages/          <-- le fichier multilingue
│   ├── lang.php
│   ├── en.php
│   ├── fr.php
│   ├── es.php
│   └── (et 20 langues)
│
├── uploads/            <-- stockage temporaire des fichiers uploadés
│
├── installer.php       <-- installe le site + base SQL + compte admin
│
├── mydb.sql            <-- base de données complète à importer
│
├── .htaccess           <-- sécuriser les accès (Apache)
│
├── index.php           <-- page d'accueil / flux de posts
├── login.php           <-- page connexion
├── register.php        <-- page inscription
├── profile.php         <-- profil utilisateur
├── settings.php        <-- réglages (photo profil, statut)
├── home.php            <-- page principale après connexion
├── logout.php          <-- déconnexion
├── search.php          <-- recherche d'amis / utilisateurs
├── story.php           <-- voir une story
├── create_story.php    <-- publier une story
├── messages.php        <-- page de chat
├── call.php            <-- appel vocal (WebRTC)
├── notifications.php   <-- voir ses notifications
├── admin_panel.php     <-- accès administrateur
├── friends.php         <-- gestion des demandes d'amis
├── blocked.php         <-- liste de personnes bloquées
│
└── README.md           <-- fichier expliquant l'installation

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
