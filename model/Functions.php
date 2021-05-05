<?php

require_once 'user.php';
require_once 'bdd.php';

class Functions
{
    private $recherche;
    private $donne;
    private $req;
    private $id;

    public function Errors(Utilisateur $user){
        require_once '../assets/vendor/autoload.php';
        $recaptcha = new ReCaptcha\ReCaptcha('6Ld89poaAAAAAJgbij9p8iwydlzHLnYZ7onz6Hsz');

        $_SESSION['errors'] = [];

        if ($user->getRecaptcha() == ''){
            array_push($_SESSION['errors'],"Captcha non rempli");
        }

        if (!empty($this->getDonne())) {
            array_push($_SESSION['errors'],"Votre Username/Mail est déjà utilisé");
        }

        if (empty($user->getUsername()) || !preg_match('/^[a-zA-Z0-9_]+$/', $user->getUsername())) {
            array_push($_SESSION['errors'],"Votre nom n'est pas alphanumérique");
        }

        if (empty($user->getEmail() || !filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL))) {
            array_push($_SESSION['errors'],"Votre mail n'est pas valide");
        }

        if ($user->getRepassword() != null){
            if (empty($user->getPassword()) || $user->getPassword() != $user->getRepassword()) {
                array_push($_SESSION['errors'],"Votre mot de passe n'est pas valide");
            }
        }

        if (empty($_SESSION['errors'])){
            unset($_SESSION['errors']);
        }
    }

    public function setDonne($donne)
    {
        $this->donne = $donne;
    }

    public function getDonne()
    {
        return $this->donne;
    }

    public function setRecherche($recherche)
    {
        $this->recherche = $recherche;
    }

    public function getRecherche()
    {
        return $this->recherche;
    }

    public function setReq($req)
    {
        $this->req = $req;
    }

    public function getReq()
    {
        return $this->req;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function fetch_media()
    {
        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('SELECT api_id FROM film');
        $req->execute();
        $donne = $req->fetchAll();
        $data = [];

        foreach ($donne as $key){

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.themoviedb.org/3/movie/'.$key['api_id'].'?api_key=cca3a19cf7481e51aad8193c7ca64cc0&language=fr-FR',
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = json_decode(curl_exec($curl), true);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                array_push($data,$response);
            }
        }
        return $data;
    }

    public function fetch_media_salle(){
        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('SELECT * FROM salle');
        $req->execute();
        $donne = $req->fetchAll();
        $data = [];

        foreach ($donne as $key){

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.themoviedb.org/3/movie/'.$key['api_id'].'?api_key=cca3a19cf7481e51aad8193c7ca64cc0&language=fr-FR',
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = json_decode(curl_exec($curl), true);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                array_push($data,$response);
            }
        }
        return $data;
    }

    public function fetch_user(){
        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('SELECT id,username,email,role FROM user ');
        $req->execute();
        $donne = $req->fetchAll();

        return $donne;
    }

    public function SearchFilm(String $search)
    { // Fonction qui permet à l'utilsateur de modifier ses informations présent dans espace-membre.php

        session_start();
        $data = [];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.themoviedb.org/3/search/tv?api_key=cca3a19cf7481e51aad8193c7ca64cc0&language=fr-FR&page=1&query='.$search,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = json_decode(curl_exec($curl), true);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            var_dump($response);
            die();
        }
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            array_push($data, $response);
        }
        $this->setReq($data);
        header("Location: ../views/NewFilm.php");
    }
    public function PermAdmin(int $id){

        $bdd = new bdd();

        $req3=$bdd->getStart()->prepare('UPDATE user SET role=:role WHERE id = :id');
        $req3->execute(array(
            'id' => $id,
            'role' => 1
        ));

        header('location: ../views/admin.php');
    }
    public function unAdmin(int $id){

        $bdd = new bdd();

        $req3=$bdd->getStart()->prepare('UPDATE user SET role=:role WHERE id = :id');
        $req3->execute(array(
            'id' => $id,
            'role' => 2
        ));

        header('location: ../views/admin.php');
    }
    public function reservation(array $param){
        $bdd = new bdd();

        $req=$bdd->getStart()->prepare('UPDATE media SET Date_emprunt = :Date_emprunt, Date_rendu = :Date_rendu WHERE id = :id');
        $req->execute(array(
            'id' => $param['id'],
            'Date_emprunt' => $param['Date_emprunt'],
            'Date_rendu' => $param['Date_rendu']
        ));
    }

    public function recherche($a){
        $bdd = new bdd();
        session_start();

          $c = $a->getRecherche()."%";

        $select_terme = $bdd->getBdd()->prepare('SELECT * FROM media WHERE ucase(titre) LIKE ucase(:search)');
        $select_terme->execute(array(
          "recherche" => $c,
        ));

        $res = $select_terme->fetchall();
        return $res;
      }

    public function Mail_Contact(Utilisateur $user)
    {
        // Replace contact@example.com with your real receiving email address
        $receiving_email_address = 'devcomclub@yahoo.com';

        if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
            include($php_email_form);
        } else {
            die('Unable to load the "PHP Email Form" Library!');
        }

        $contact = new PHP_Email_Form;
        $contact->ajax = true;

        $contact->to = $receiving_email_address;
        $contact->from_name = $_POST['name'];
        $contact->from_email = $_POST['email'];
        $contact->subject = $_POST['subject'];

        // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

        $contact->smtp = array(
          'host' => 'smtp.mail.yahoo.com',
          'username' => 'devcomclub@yahoo.com',
          'password' => 'ysMNA4hnQ9Hj',
          'port' => '587'
        );

        $contact->add_message($_POST['name'], 'From');
        $contact->add_message($_POST['email'], 'Email');
        $contact->add_message($_POST['message'], 'Message', 10);

        echo $contact->send();
    }
}
