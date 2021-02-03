Exercice de création d'une BDD pour une bibliothèque

<!-- Il faut un catalogue de livres -->

# Book
- bookTitle
- bookCategory
- author
- editionYear
- pages
- editor
- bookIsbn
- bookCondition

<!-- Il doit y avoir une liste de livre
le livre est marqué d'un drapeau s'il est déjà emprunté -->

# Borrower
- borrowerName
- borrowerContact
- borrowerLogin (mail)
- borrowerStatus
- borrowerCard

<!-- Ne peut pas se connecter mais peut s'inscrire grâce à un mail via un formulaire
Système de vérification de mail qui ne doit pas avoir déjà été utilisé -->

# Loan
- loanDate
- loanBackDate
- numberOfBooksAllowed
- lateFees

# User 
- name
- email
- password
<!-- le user est le bibliothécaire qui va avoir le pouvoir d'accorder l'emprunt demandé par le borrower. 
Il faut donc un formulaire d'authentification -->