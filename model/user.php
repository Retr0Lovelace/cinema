<?php

class Utilisateur
{
    private $id;
    private $username;
    private $password;
    private $repassword;
    private $email;
    private $role;

    public function __construct(array $donnees)
    {
       $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }


// Liste des getters

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRepassword()
    {
        return $this->repassword;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getRole()
    {
        return $this->role;
    }


    // Liste des setters

    public function setId($id)
    {
        // On convertit l'argument en nombre entier.
        // Si c'en était déjà un, rien ne changera.
        // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
        $id = (int) $id;

        // On vérifie ensuite si ce nombre est bien strictement positif.
        if ($id > 0)
        {
            // Si c'est le cas, on affecte la valeur à l'attribut id.
            $this->id = $id;
        }
    }
    
    public function setUsername($username)
    {
        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
        if (is_string($username))
        {
            $this->username = $username;
        }

    }

    public function setPassword($password)
    {
        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
        if (is_string($password))
        {
            $this->password = $password;
        }
    }

    public function setRepassword($repassword)
    {
        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
        if (is_string($repassword))
        {
            $this->repassword = $repassword;
        }
    }

    public function setEmail($email)
    {
        if (is_string($email))
        {
            $this->email = $email;
        }
    }


    public function setRole($role)
    {
        // On convertit l'argument en nombre entier.
        // Si c'en était déjà un, rien ne changera.
        // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
        $role= (int) $role;

        // On vérifie ensuite si ce nombre est bien strictement positif.
        if ($role > 0)
        {
            // Si c'est le cas, on affecte la valeur à l'attribut id.
            $this->role = $role;
        }
    }

}
