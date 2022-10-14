
<?php

class Model
{
  protected $db;

  public function __construct(PDO $db)
  {
    $this->db = $db; 
  }
    
  protected function prepare($stmt, $escape = [])
  {
      $stmt = $this->db->prepare($stmt);
      
      if($stmt){
          
            $exec = $stmt->execute($escape);

            if($exec){
                return ['boolean' => $exec, 'stmt' => $stmt];
            } else {
                print_r($this->db->errorInfo());
            }

      } else {
          
          print_r($this->db->errorInfo());
          
      }
  }

}
