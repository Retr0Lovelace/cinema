<?php

// Ici, vous retrouverez toutes les fonctionnalités en rapport avec l'interaction d'un utilisateur.

require_once 'user.php';
require_once 'bdd.php';
require_once 'Functions.php';


class manager
{

    public function Connexion(Utilisateur $user){ // Fonction de connexion d'un utilisateur présent dans sign-in.php

        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('SELECT * FROM user WHERE username = :username'); // Requête qui récupèrent toutes les informations en rapport avec le username seulement
        $req->execute(array(
            'username' => $user->getUsername()
        ));

        $resultat = $req->fetch();

        $isPasswordCorrect = password_verify($user->getPassword(), $resultat['password']); // test de la compatibilité du mot de passe et du mot de passe crypté

        if (!$resultat)
        {
            $_SESSION['errors'][0] = "Utilisateur n'existe pas"; // gestion d'erreur
            header("Location: ../views/sign-in.php");
        }
        else
        {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['id'] = $resultat['id'];   //création de la session utilisateur
                $_SESSION['username'] = $resultat['username'];
                $_SESSION['role'] = $resultat['role'];
                if($resultat['role'] == 1){ //redirection si c'est un admin
                    header("Location: ../admin.php ");
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
            'email'=>$user->getMail()
        ));

        $donne = $req->fetch();

        if ($donne){
            $Functions->setDonne($donne);
        }

        $Functions->Errors($user); // gestion d'erreur

        if (empty($_SESSION['errors'])){
            $req1=$bdd->getStart()->prepare('INSERT INTO user (username, nom, prenom, password, email, role) VALUES (:username, :nom, :prenom, :password, :email, :role)'); // Création de l'utilisateur dans la bdd

            $pass_hache = password_hash($user->getPassword(), PASSWORD_DEFAULT);

            $req1->execute(array(
                'username'=>$user->getUsername(),
                'nom'=>$user->getNom(),
                'prenom'=>$user->getPrenom(),
                'password'=> $pass_hache,
                'email'=>$user->getMail(),
                'role'=>(int)$user->getRole()
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

    public function Modification(Utilisateur $user){ // Fonction qui permet à l'utilsateur de modifier ses informations présent dans espace-membre.php

        $bdd = new bdd();
        session_start();

        if ($user->getPassword() != $user->getRepassword()){
            $Functions = new Functions();
            $Functions->Error($user); // Gestion d'erreur
        }
        else{

            $pass_hache = password_hash($user->getPassword(), PASSWORD_DEFAULT); // hachage du mot du nouveau mot de passe

            $req=$bdd->getStart()->prepare('UPDATE user SET username = :username, nom = :nom, prenom=:prenom, password =:password, email = :email, role = :role WHERE id = :id');
            $req->execute(array(
                'id' => $_SESSION['id'],
                'username'=>$user->getUsername(),
                'nom'=>$user->getNom(),
                'prenom'=>$user->getPrenom(),
                'password'=> $pass_hache,
                'email'=>$user->getMail(),
                'role'=>(int)$_SESSION['role']
            ));
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