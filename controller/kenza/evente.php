<?php

require '../../../config.php';

class eventc
{

    public function list()
    {
        $sql = "SELECT * FROM events";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function delete($idevent)
    {
        $sql = "DELETE FROM events WHERE idevent = :idevent";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idevent', $idevent);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function add($event)
{
    $sql = "INSERT INTO events (nomevent, description, date, heuredebut, heurefin, capacite, image, lieu, idtype)  
            VALUES (:nomevent, :description, :date, :heuredebut, :heurefin, :capacite, :image, :lieu, :idtype)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nomevent' => $event->getnomevent(),
            'description' => $event->description(),
            'date' => $event->getdate()->format('Y-m-d'),
            'heuredebut' => $event->getheuredebut(),
            'heurefin' => $event->getheurefin(),
            'capacite' => $event->getcapacite(),
            'image' => $event->getimage(),
            'lieu' => $event->getlieu(),
            'idtype' => $event->getidtype()
        ]);

        echo "Event added successfully"; // Ajout de message pour le débogage
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}



    
    function show($idevent)
    {
        $sql = "SELECT * FROM events WHERE idevent = :idevent";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idevent', $idevent, PDO::PARAM_INT);
            $query->execute();
            $event = $query->fetch();
            return $event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function update($event, $idevent)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE events SET
                    nomevent = :nomevenement,
                    description = :descriptionevenement,
                    lieu = :lieux,
                    date = :datevenement,
                    heuredebut = :heuredebute,
                    heurefin = :heurefine, 
                    capacite = :capacitee,
                    image = :images,
                    idtype = :idtype
                WHERE idevent= :idevent'
            );
            $query->execute([
                'nomevenement' => $event->getnomevent(),
                'descriptionevenement' => $event->description(),
                'lieux' => $event->getlieu(),
                'datevenement' => $event->getdate()->format('Y-m-d'),
                'heuredebute' => $event->getheuredebut(),
                'heurefine' => $event->getheurefin(),
                'capacitee' => $event->getcapacite(),
                'images' => $event->getimage(),
                'idtype'=> $event->getidtype(),
                'idevent' => $idevent,
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}