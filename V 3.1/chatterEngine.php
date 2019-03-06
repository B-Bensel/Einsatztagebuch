<?php
class Chatter
{
                //change this according to your database setup
        protected $server = 'SERVER';
        protected $username = 'USERNAME';
        protected $password = 'PASSWORD';
        protected $database = 'DATABASE';
	protected $conn = null;
                //leave this as our database connection later
        public function __construct()
        {
               $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);

                if ($this->conn->connect_error) {
			die("Verbindung Fehlgeschlagen: ". $this->conn->connect_error);
                }

                $mode = $this->fetch('mode');

                switch ($mode) {
                        case 'get':
                                $this->getMessage();
                                break;
                        case 'post':
                                $this->postMessage();
                                break;
                        default:
                                $this->output(false, 'Falscher Modus.');
                                break;
                }

                return;
        }

        protected function getMessage()
        {
                $endtime = time() + 20;
                $lasttime = $this->fetch('lastTime');
                $id = $this->fetch('id');
                $curtime = null;


                while (time() <= $endtime) {
                        $rs = $this->conn->query("
                                        SELECT username, text, insertDate
                                        FROM Lagemeldungen WHERE Status = 0 AND Einsatz = $id
                                        ORDER BY insertDate desc
                                ");

                        if ($rs) {
                                $messages = array();

                                while ($row = $rs->fetch_assoc()) {
                                        $messages[] = array(
                                                'user' => $row['username'],
                                                'text' => $row['text'],
                                                'time' => $row['insertDate']
                                        );
                                }

                                $curtime = strtotime($messages[0]['time']);
                        }

                        if (!empty($messages) && $curtime != $lasttime) {
                                $this->output(true, '', array_reverse($messages), $curtime);
                                break;
                        } else {
                                sleep(1);
                        }
                }
        }

        protected function postMessage()
        {
                $user = $this->fetch('user');
                $text = $this->fetch('text');
                $id = $this->fetch('id');
                $Status = $this->fetch('status');

                if (empty($user) || empty($text)) {
                        $this->output(false, 'Es muss ein Text eingegeben werden.');
                } else {
                        $sql = "INSERT INTO Lagemeldungen(Einsatz,username,text,insertDate,Status)
                        VALUES('$id','$user','$text', CURRENT_TIMESTAMP,'$Status')";

                        if ($this->conn->query($sql) === TRUE) {
                                $this->output(true, '');
                        } else {
                                $this->output(false, 'Fehler bei der Übertragung. Bitte erneut versuchen.');
                        }
                }
        }

        protected function fetch($name)
        {
                $val = isset($_POST[$name]) ? $_POST[$name] : '';
                return $this->conn->real_escape_string($val);
        }

        protected function output($result, $output, $message = null, $latest = null)
        {
                echo json_encode(array(
                        'result' => $result,
                        'message' => $message,
                        'output' => $output,
                        'latest' => $latest
                ));
        }
}

new Chatter();
