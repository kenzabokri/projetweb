<?php
    //include ('../config.php');
    class User_control{
        public static function show_users($db){
            try {
                
                //$db=config::getConnexion();

                $query = $db->prepare("SELECT * FROM users");
                $query->execute(); 
                $results = $query->fetchAll($db::FETCH_ASSOC);
                return $results;
            } 
            catch (Exception $e) {
                    echo "ERROR: ". $e->getMessage();
            }
        }
        public static function delete_user($db,$userIdToDelete)
        {
            //$db = config::getConnexion();
            try {
                $query = $db->prepare("DELETE FROM session WHERE utilisateur = :userId");
                $query->bindParam(':userId', $userIdToDelete);
                $query->execute();

                $query = $db->prepare("DELETE FROM users WHERE id_user = :userId");
                $query->bindParam(':userId', $userIdToDelete);
                $query->execute();
            }
            catch (Exception $e) {
                echo "ERROR: ". $e->getMessage();
            }
        }
        public static function add_user($db, $firstName, $lastName, $username, $mail, $role, $description, $password)
        {
            try {
                // Insert user data
                $id = 0;
                $query = $db->prepare("INSERT INTO users VALUES (:id, :firstName, :lastName, :mail, :role, :description, :password, :username)");
                $query->bindParam(':id', $id);
                $query->bindParam(':firstName', $firstName);
                $query->bindParam(':lastName', $lastName);
                $query->bindParam(':mail', $mail);
                $query->bindParam(':role', $role);
                $query->bindParam(':description', $description);  // Corrected parameter name
                $query->bindParam(':password', $password);  // Corrected parameter name
                $query->bindParam(':username', $username);
                $query->execute();

                // Insert session data
                $jeton = 0;
                $date = date('Y-m-d');
                
                // Get the count of users
                $query1 = $db->prepare("SELECT COUNT(id_user) FROM users");
                $query1->execute();
                $iduser = $query1->fetchColumn();  // Fetch the count

                $query2 = $db->prepare("INSERT INTO session (date_creation, jetons, utilisateur) VALUES (:date, :jetons, :iduser)");
                $query2->bindParam(':date', $date);
                $query2->bindParam(':jetons', $jeton);
                $query2->bindParam(':iduser', $iduser);
                $query2->execute();
                
            } catch (Exception $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }

        public static function update_user($db, $userIdToUpdate, $firstName, $lastName, $username, $mail, $role, $description, $password)
        {
            try {
                $query = $db->prepare("
                    UPDATE users
                    SET 
                    first_name = '$firstName' 
                    WHERE 
                    id_user = $userIdToUpdate 
                    AND 
                    '$firstName' != ''
                ");
                $query1 = $db->prepare("
                    UPDATE users
                    SET 
                    last_name = '$lastName' 
                    WHERE 
                    id_user = $userIdToUpdate 
                    AND 
                    '$lastName'  != ''
                ");
                $query2 = $db->prepare("
                    UPDATE users
                    SET 
                    username = '$username' 
                    WHERE 
                    id_user = $userIdToUpdate 
                    AND 
                    '$username' != ''
                ");
                $query3 = $db->prepare("
                    UPDATE users
                    SET 
                    mail = '$mail' 
                    WHERE 
                    id_user = $userIdToUpdate 
                    AND 
                    '$mail' != ''
                ");
                $query4 = $db->prepare("
                    UPDATE users
                    SET 
                    role = '$role' 
                    WHERE 
                    id_user = $userIdToUpdate 
                    AND 
                    '$role' != ''
                ");
                $query5 = $db->prepare("
                    UPDATE users
                    SET 
                    description = '$description' 
                    WHERE 
                    id_user = $userIdToUpdate 
                    AND 
                    '$description' != ''
                ");
                $query6 = $db->prepare("
                    UPDATE users
                    SET 
                    password = '$password' 
                    WHERE 
                    id_user = $userIdToUpdate 
                    AND 
                    '$password' != ''
                ");
        
                $query->execute();
                $query1->execute();
                $query2->execute();
                $query3->execute();
                $query4->execute();
                $query5->execute();
                $query6->execute();
            } catch (Exception $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }
           
    }


?>