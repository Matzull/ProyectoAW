<?php
namespace parallelize_namespace;

class Transaction
{

    private $transaction_timestamp;
    private $quantity;
    private $user_email;
    private $description;

    public static function buscaTransacionesDeUsuario(Usuario $user)
    { // User $user
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf("SELECT * FROM token_transactions K WHERE K.user_email = '%s'", $conn->real_escape_string($user->getEmail()));
        $rs = $conn->query($query);

        $raw_results = $rs->fetch_all(MYSQLI_ASSOC);
        $ret = [];
        foreach ($raw_results as $t) {
            $ret[] = new Transaction(
                $t['transaction_timestamp'],
                $t['quantity'],
                $t['user_email'],
                $t['description']

            );
        }
        return $ret;
    }

    public static function submit($quantity, $user_email, $description)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf(
            'INSERT INTO token_transactions (user_email, quantity ,description ) VALUES (\'%s\', \'%s\', \'%s\')',
            $conn->real_escape_string($user_email),
            $conn->real_escape_string($quantity),
            $conn->real_escape_string($description)
        );
        if (!$conn->query($query)) {
            echo $query;
            echo "Error SQL ({$conn->errno}):  {$conn->error}";
            return false;
        }
        return true;
    }


    public function __construct($transaction_timestamp, $quantity, $user_email, $description)
    {
        $this->user_email = $user_email;
        $this->transaction_timestamp = $transaction_timestamp;
        $this->quantity = $quantity;
        $this->description = $description;
    }

    public function getJson()
    {
        return "{ 
            'transaction_timestamp': '$this->transaction_timestamp',
            'quantity': '$this->quantity',
            'description': '$this->description',
            'user_email': '$this->user_email',
        }";
    }

}