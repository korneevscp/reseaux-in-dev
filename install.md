
# 📦 INSTALLATION - du site web 

Bienvenue dans l'installation de **site web** — un réseau social complet, élégant et sécurisé ! 🚀  
Suivez ces étapes simples pour avoir votre propre réseau social en ligne.

---

## 📥 1. Télécharger et extraire

- Téléchargez le fichier ZIP final.
- Décompressez-le sur votre ordinateur.

Vous obtiendrez la structure suivante :

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
├── README.md
├── INSTALL.md
└── mydb.sql
```

---

## 🌐 2. Envoyer sur votre hébergeur

- Connectez-vous à votre FTP (FileZilla par exemple).
- Envoyez **tout le dossier** (sauf README.md et INSTALL.md si vous voulez rester propre) sur votre serveur.

**Exemple d’URL après upload :**  
`https://votre-site.com/`

---

## 🛠 3. Lancer l'installation

- Ouvrez votre navigateur et allez sur :  
`https://votre-site.com/installer.php`

- Suivez les instructions :  
  - Entrez les informations SQL.
  - Le script va créer automatiquement la base de données et insérer les utilisateurs admin de base.
  - Après l'installation, **`installer.php`** se supprimera tout seul (sécurité).

---

## 🔑 4. Connexion Admin

**Dès l’installation terminée :**

- Email : `mydead2013@proton.me`
- Mot de passe : `Korneev.2`

*Pensez à changer le mot de passe ensuite pour plus de sécurité !*

---

## 📚 5. Configurations importantes

- 🔥 **Mode Nuit** est automatique selon l’heure locale de l’utilisateur.
- 🌎 **Changer la langue** via le sélecteur en haut de la barre de navigation.
- 📂 **Upload fichiers** (PDF, images, vidéos) est autorisé dans les messages privés.
- 🔒 **Sécurité** : CSRF, XSS, injections SQL → tout est protégé d'origine.

---

## 🎯 Infos techniques

- Compatible PHP 7.4 à 8.2
- Fonctionne avec MySQL/MariaDB
- Optimisé pour mobile et tablette (responsive)
- Conforme RGPD 🇫🇷

---

## 🛡 Important pour le RGPD

- Une bannière Cookies est déjà incluse.
- Suppression manuelle possible des comptes depuis leur profil.
- Toutes les données personnelles sont stockées dans la base sécurisée.
- Les admins doivent afficher une page "Mentions légales" pour finaliser la conformité.

---

# 🎉 Bravo !

Vous êtes prêt à utiliser **le site web** !  
Amusez-vous, personnalisez, et faites grandir votre réseau social 🌟

---

> *Besoin d’aide ? Un souci à l’installation ?*  
> ➔ Contactez votre développeur ou relisez ce guide !
