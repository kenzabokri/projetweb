<?php
    
    class User_control{

        public static function show_users($db){
            try {
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
          
            try {
                $query = $db->prepare("DELETE FROM users WHERE user_id = :userId");
                $query->bindParam(':userId', $userIdToDelete);
                $query->execute();
            }
            catch (Exception $e) {
                echo "ERROR: ". $e->getMessage();
            }
        }
        public static function add_user($db, $user)
        {
            try {
                $first_name=$user->get_first_name();
                $last_name=$user->get_last_name();
                $email=$user->get_email();
                $role=$user->get_role();
                $password=$user->get_password();
                $token=0;
                $query = $db->prepare("INSERT INTO users VALUES (null, :firstName, :lastName, :mail, :role, :password,:token)");
                $query->bindParam(':firstName',$first_name);
                $query->bindParam(':lastName', $last_name);
                $query->bindParam(':mail', $email);
                $query->bindParam(':role', $role);
                $query->bindParam(':password', $password); 
                $query->bindParam(':token', $token); 
                $query->execute();

                

                /*$date = date('Y-m-d');
                
                $query1 = $db->prepare("SELECT COUNT(user_id) FROM users");
                $query1->execute();
                $iduser = $query1->fetchColumn();  

                $query2 = $db->prepare("INSERT INTO session (date_creation, utilisateur) VALUES (:date, :iduser)");
                $query2->bindParam(':date', $date);
                
                $query2->bindParam(':iduser', $iduser);
                $query2->execute();*/
                
            } catch (Exception $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }

        public static function update_user($db,$user,$id)
        {
            $first_name=$user->get_first_name();
            $last_name=$user->get_last_name();
            $email=$user->get_email();
            $role=$user->get_role();
            $password=$user->get_password();
            try {
                $query = $db->prepare("
                    UPDATE users
                    SET 
                    first_name = '$first_name' 
                    WHERE 
                    user_id = '$id' 
                    AND 
                    '$first_name' != ''
                ");
                $query1 = $db->prepare("
                    UPDATE users
                    SET 
                    last_name = '$last_name' 
                    WHERE 
                    user_id = '$id' 
                    AND 
                    '$last_name'  != ''
                ");
                $query3 = $db->prepare("
                    UPDATE users
                    SET 
                    email = '$email' 
                    WHERE 
                    user_id = '$id' 
                    AND 
                    '$email' != ''
                ");
                $query4 = $db->prepare("
                    UPDATE users
                    SET 
                    role = '$role' 
                    WHERE 
                    user_id = '$id'
                    AND 
                    '$role' != ''
                ");
                $query6 = $db->prepare("
                    UPDATE users
                    SET 
                    password = '$password' 
                    WHERE 
                    user_id = '$id' 
                    AND 
                    '$password' != ''
                ");
        
                $query->execute();
                $query1->execute();
                
                $query3->execute();
                $query4->execute();
               
                $query6->execute();
            } catch (Exception $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }
           
    }


?>