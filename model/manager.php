<?php

// Ici, vous retrouverez toutes les fonctionnalités en rapport avec l'interaction d'un utilisateur.

require_once 'user.php';
require_once 'bdd.php';
require_once 'Functions.php';


class manager
{

    public function Connexion(Utilisateur $user){ // Fonction de connexion d'un utilisateur présent dans sign-in.php
        session_start();
        $bdd = new bdd();
        $Functions = new Functions();

        $req=$bdd->getStart()->prepare('SELECT * FROM user WHERE username = :username'); // Requête qui récupèrent toutes les informations en rapport avec le username seulement
        $req->execute(array(
            'username' => $user->getUsername()
        ));

        $resultat = $req->fetch();

        $Functions->Errors($user);

        $isPasswordCorrect = password_verify($user->getPassword(), $resultat['password']); // test de la compatibilité du mot de passe et du mot de passe crypté

        if (!$resultat)
        {
            $_SESSION['errors'][0] = "Utilisateur n'existe pas"; // gestion d'erreur
            header("Location: ../views/sign-in.php");
        }
        else
        {
            if ($isPasswordCorrect && empty($_SESSION['errors'])) {
                $_SESSION['id'] = $resultat['id'];   //création de la session utilisateur
                $_SESSION['username'] = $resultat['username'];
                $_SESSION['role'] = $resultat['role'];
                if($resultat['role'] == 1){ //redirection si c'est un admin
                    header("Location: ../views/admin.php ");
                }
                elseif($resultat['role'] == 2){
                    header("Location: ../");
                }
            }
            else {
                $_SESSION['errors'][1] = "Mauvais identifiant ou mot de passe !";  // gestion d'erreur
                header("Location: ../views/sign-in.php");
            }
        }
    }

    public function Inscription(Utilisateur $user){ // Fonction d'inscription d'un utilisateur présent dans sign-up.php

        session_start();

        $bdd = new bdd();
        $Functions = new Functions();

        $req=$bdd->getStart()->prepare('SELECT * FROM user WHERE username = :username OR email = :email'); // Requête qui récupèrent toutes les informations pour voir si l'utilisateur n'existe ou non
        $req->execute(array(
            'username'=>$user->getUsername(),
            'email'=>$user->getEmail()
        ));

        $donne = $req->fetch();

        if ($donne){
            $Functions->setDonne($donne);
        }

        $Functions->Errors($user); // gestion d'erreur

        if (empty($_SESSION['errors'])){
            $req1=$bdd->getStart()->prepare('INSERT INTO user (username, password, email, role) VALUES (:username, :password, :email, :role)'); // Création de l'utilisateur dans la bdd

            $pass_hache = password_hash($user->getPassword(), PASSWORD_DEFAULT);

            $req1->execute(array(
                'username'=>$user->getUsername(),
                'password'=> $pass_hache,
                'email'=>$user->getEmail(),
                'role'=> $user->getRole()
            ));

            //$Functions->Mail_ins($user); //envoi du mail d'inscription (Non fonctionnel)

            $_SESSION['username'] = $user->getUsername(); //création d'un Session
            $_SESSION['role'] = $user->getRole();

            header("Location: ../");

        }
        else{
            header("Location: ../views/sign-up.php");
        }

    }

    public function fetch_user_info(){
        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('SELECT * FROM user WHERE username = :username');
        $req->execute(array(
            'username'=> $_SESSION['username']
        ));
        $donne = $req->fetchAll();

        return $donne;
    }

    public function Modification(Utilisateur $user){ // Fonction qui permet à l'utilsateur de modifier ses informations présent dans espace-membre.php

        $bdd = new bdd();
        session_start();
        $Functions = new Functions();
        $Functions->Errors($user);

        if (empty($_SESSION['errors'])){
            $pass_hache = password_hash($user->getPassword(), PASSWORD_DEFAULT); // hachage du mot du nouveau mot de passe

            $req=$bdd->getStart()->prepare('UPDATE user SET username = :username, password =:password, email = :email WHERE username = :user');
            $req->execute(array(
                'user' => $_SESSION['username'],
                'username'=>$user->getUsername(),
                'password'=> $pass_hache,
                'email'=>$user->getEmail()
            ));
            $_SESSION['username'] = $user->getUsername();
            header("Location: ../views/profile.php");
        }
    }

    public function Supression(string $id){ // Fonction qui permet à l'admin de supprimer un utilisateur présent dans admin.php

        $bdd = new bdd();

        $id = (int)$id;

        $req = $bdd->getStart()->prepare("DELETE FROM user WHERE id= :id");
        $req->execute(array(
            'id'=> $id
        ));
    }

}