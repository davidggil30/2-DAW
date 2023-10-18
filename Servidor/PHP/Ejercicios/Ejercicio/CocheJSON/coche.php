    <?php
    class Coche
    {
        public $matricula;
        public $tipo_motor;

        public function set_matricula($matricula)
        {
            $this->matricula = $matricula;
        }
        public function set_tipo_motor($tipo_motor)
        {
            $this->tipo_motor = $tipo_motor;
        }
    }

    class Motor
    {
        public $num_cilindros;
        public $tipo_combustible;

        public function set_num_cilindros($num_cilindros)
        {
            $this->num_cilindros = $num_cilindros;
        }
        public function set_tipo_combustible($tipo_combustible)
        {
            $this->tipo_combustible = $tipo_combustible;
        }
    }

    $c = new Coche();
    $motor = new Motor();
    $c->matricula = "M2777CJ";
    $motor->num_cilindros = 4;
    $motor->tipo_combustible = "GASOLINA";
    $c->set_tipo_motor($motor);

    $json = json_encode($c);
    echo $json;

    ?>