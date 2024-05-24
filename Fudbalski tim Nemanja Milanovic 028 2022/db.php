<?php
    class Db
    {
        const hostName = "localhost";
        const dbName = "fudbalski_tim";
        const username = "root";
        const pass = "";
        private $dbh;
        
        public function __construct() 
        {
            try 
            {
                $connStr = "mysql:host=" . self::hostName . ";dbname=" . self::dbName;
                $this->dbh = new PDO($connStr, self::username, self::pass);
            } 
            catch (Exception $exc) 
            {
                die("Connection error");
            }
        }
        
        public function __destruct() 
        {
            $this->dbh = null;
        }

        public function getAllPlayers($title = null)
        {
            try {
                $sql = "SELECT * FROM igraci";
                
                if(isset($title))
                    $sql .= " WHERE ime LIKE '%$title%' or prezime LIKE '%$title%'";

                $res = $this->dbh->query($sql);
                $rows = $res->fetchAll(PDO::FETCH_ASSOC);

                $players = [];
                foreach ($rows as $row)
                {
                    $player['id'] = $row['id'];
                    $player['ime'] = $row['ime'];
                    $player['prezime'] = $row['prezime'];
                    $player['id_tima'] = $row['id_tima'];
                    
                    $players[] = $player;
                }

                return $players;
            } 
            catch (Exception $ex) 
            {
                die("Greska getAllPlayers");
            }
        }

        public function deletePlayer($id_igraca)
        {
            try {
                $sql = "DELETE FROM igraci WHERE id=$id_igraca";
                $res = $this->dbh->exec($sql);
                if($res)
                    return true;
                return false;
                
            } catch (Exception $exc) {
                die("Greska DELETE" . $exc->getTraceAsString());
            }
        }

        public function updatePlayer($id, $ime, $prezime, $id_tima)
        {
            try 
            {
                $sql = "UPDATE igraci SET ime= :ime1, prezime= :prezime1, id_tima= :id_tima1 WHERE id= :id1";
                $res = $this->dbh->prepare($sql);
                
                $res->bindParam(":ime1", $ime);
                $res->bindParam(":prezime1", $prezime);
                $res->bindParam("id_tima1", $id_tima);
                $res->bindParam(":id1", $id);
                
                $res->execute();
                
                return true;
            } 
            catch (Exception $exc) 
            {
                echo $exc->getTraceAsString();
                return false;
            }
        }

        public function getPlayerById($id_igraca)
        {
            try 
            {
                $sql = "SELECT * FROM igraci WHERE id=$id_igraca";
                $res = $this->dbh->query($sql);
                
                return $res->fetch(PDO::FETCH_ASSOC);
            } 
            catch (Exception $exc) 
            {
                echo $exc->getTraceAsString();
                die ("Greska kod getPlayerById");
            }
        }

        public function addPlayer($ime, $prezime, $id_tima)
        {
            try 
            {
                $sql = "INSERT INTO igraci (ime, prezime, id_tima) VALUES('$ime', '$prezime', $id_tima)";
                $res = $this->dbh->exec($sql);
                if($res)
                    return true;
                return false;
            } 
            catch (Exception $exc)
            {
                echo $exc->getTraceAsString();
                die("Greska addPlayer");
            }
        }

        public function getAllTeams($title = null)
        {
            try {
                $sql = "SELECT * FROM timovi";
                
                if(isset($title))
                    $sql .= " WHERE naziv LIKE '%$title%'";

                $res = $this->dbh->query($sql);
                $rows = $res->fetchAll(PDO::FETCH_ASSOC);

                $teams = [];
                foreach ($rows as $row)
                {
                    $team['id'] = $row['id'];
                    $team['naziv'] = $row['naziv'];
                    $team['grad'] = $row['grad'];
                    
                    $teams[] = $team;
                }

                return $teams;
            } 
            catch (Exception $ex) 
            {
                die("Greska getAllTeams");
            }
        }

        public function addTeam($naziv, $grad)
        {
            try 
            {
                $sql = "INSERT INTO timovi (naziv, grad) VALUES('$naziv', '$grad')";
                $res = $this->dbh->exec($sql);
                if($res)
                    return true;
                return false;
            } 
            catch (Exception $exc)
            {
                echo $exc->getTraceAsString();
                die("Greska addTeam");
            }
        }

        public function deleteTeam($id_tima)
        {
            try {
                $sql = "DELETE FROM timovi WHERE id=$id_tima";
                $res = $this->dbh->exec($sql);
                if($res)
                    return true;
                return false;
                
            } catch (Exception $exc) {
                die("Greska DELETE" . $exc->getTraceAsString());
            }
        }

        public function updateTeam($id, $naziv, $grad)
        {
            try 
            {
                $sql = "UPDATE timovi SET naziv= :naziv1, grad= :grad1 WHERE id= :id1";
                $res = $this->dbh->prepare($sql);
                
                $res->bindParam(":naziv1", $naziv);
                $res->bindParam(":grad1", $grad);
                $res->bindParam("id1", $id);
                
                $res->execute();
                
                return true;
            } 
            catch (Exception $exc) 
            {
                echo $exc->getTraceAsString();
                return false;
            }
        }

        public function getTeamById($id_tima)
        {
            try
            {
                $sql = "SELECT * FROM timovi WHERE id=$id_tima";
                $res = $this->dbh->query($sql);
                
                return $res->fetch(PDO::FETCH_ASSOC);
            }
            catch (Exception $exc)
            {
                echo $exc->getTraceAsString();
                die ("Greska kod getTeamById");
            }
        }

        public function registracija($ime, $prezime, $sifra, $username)
        {
            
            try 
            {
                $sql = "SELECT * FROM registracija WHERE username='$username'";
                $res = $this->dbh->query($sql);

                $proveri=-1;
                if ($res->rowCount() > 0) {
                    
                    $proveri = 1;
                } else {
                   
                    $proveri= 0;
                }
                if($proveri != 1) {
                    
                    $sql = "INSERT INTO registracija (ime, prezime, sifra, username) VALUES('$ime', '$prezime', '$sifra', '$username')";
                    $res = $this->dbh->exec($sql);
                    if($res)
                        return true;
                    return false;
                }
                else return false; 
            } 
            catch (Exception $exc)
            {
                echo $exc->getTraceAsString();
                die("Greska registracija");
            }
        }
        

        public function login($username, $sifra)
        {
            try 
            {
                $sql = "SELECT * FROM registracija WHERE username='$username' and sifra='$sifra'";
                $res = $this->dbh->query($sql);
                
                if ($res->rowCount() > 0) {
                    
                    return 1;
                } else {
                    
                    return 0;
                }
               // return $res->fetch(PDO::FETCH_ASSOC); 
            } 
            catch (Exception $exc) 
            {
                echo $exc->getTraceAsString();
                die ("Greska kod login");
            }
        }

        public function dodajUtakmicu($id_tima_1, $id_tima_2, $golovi_1, $golovi_2)
        {
            try 
            {
                $sql = "INSERT INTO utakmice (id_tima_1, id_tima_2, golovi_1, golovi_2) VALUES($id_tima_1, $id_tima_2, $golovi_1, $golovi_2)";
                $res = $this->dbh->exec($sql);
                if($res)
                    return true;
                return false;
            } 
            catch (Exception $exc)
            {
                echo $exc->getTraceAsString();
                die("Greska dodajUtakmicu");
            }
        }
        
        public function getAllUtakmice()
        {
            try {
                $sql = "SELECT * FROM utakmice";
                $res = $this->dbh->query($sql);
                $rows = $res->fetchAll(PDO::FETCH_ASSOC);

                $utakmice = [];
                foreach ($rows as $row)
                {
                    $utakmica['id'] = $row['id'];
                    $utakmica['id_tima_1'] = $row['id_tima_1'];
                    $utakmica['id_tima_2'] = $row['id_tima_2'];
                    $utakmica['golovi_1'] = $row['golovi_1'];
                    $utakmica['golovi_2'] = $row['golovi_2'];

                    $utakmice[] = $utakmica;
                }

                return $utakmice;
            } 
            catch (Exception $ex) 
            {
                die("Greska getAllUtakmice");
            }
        }

        public function deleteUtakmica($id_utakmice)
        {
            try {
                $sql = "DELETE FROM utakmice WHERE id=$id_utakmice";
                $res = $this->dbh->exec($sql);
                if($res)
                    return true;
                return false;
            } catch (Exception $exc) {
                die("Greska DELETE" . $exc->getTraceAsString());
            }
        }
    }
?>